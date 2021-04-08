<?php
    class Location{

        // declare the connection
        private $conn;

        // decalre the database table as local variable
        private $db_table = "location";

        // columns from the database table declared as variables
        public $id;
        public $city_name;
        public $planet_name;
        public $spaceport_capacity;

        // database connection function
        public function __construct($db){
            $this->conn = $db;
        }

        // read function achieved here
        public function getLocations(){
            $query = "SELECT id, city_name, planet_name, spaceport_capacity FROM " . $this->db_table;
            $statement = $this->conn->prepare($query);
            $statement->execute();
            return $statement;
        }
        //create spaceships at first
        public function createLocations(){
            $query = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        city_name = :city_name, 
                        planet_name = :planet_name, 
                        spaceport_capacity = :spaceport_capacity";
            
            //prepare sql
            $statement = $this->conn->prepare($query);
        
            // sanitize by stripping out the html tags
            $this->city_name=htmlspecialchars(strip_tags($this->city_name));
            $this->planet_name=htmlspecialchars(strip_tags($this->planet_name));
            $this->spaceport_capacity=htmlspecialchars(strip_tags($this->spaceport_capacity));
        
            // bind data to insert into the database
            $statement->bindParam(":city_name", $this->city_name);
            $statement->bindParam(":planet_name", $this->planet_name);
            $statement->bindParam(":spaceport_capacity", $this->spaceport_capacity);
        
            if($statement->execute()){
               return true;
            }
            return false;
        }
        
        // UPDATE
        public function updateLocations(){
            $query = "UPDATE
                        ". $this->db_table ."
                    SET
                    city_name = :city_name, 
                    planet_name = :planet_name, 
                    spaceport_capacity = :spaceport_capacity 
                    WHERE 
                        id = :id";

            //prepare the sql query here
            $statement = $this->conn->prepare($query);
        
            $this->city_name=htmlspecialchars(strip_tags($this->city_name));
            $this->planet_name=htmlspecialchars(strip_tags($this->planet_name));
            $this->spaceport_capacity=htmlspecialchars(strip_tags($this->spaceport_capacity));
            $this->id=htmlspecialchars(strip_tags($this->id));
        
            // bind data by binParam funtion here
            $statement->bindParam(":city_name", $this->city_name);
            $statement->bindParam(":planet_name", $this->planet_name);
            $statement->bindParam(":spaceport_capacity", $this->spaceport_capacity);
            $statement->bindParam(":id", $this->id);
        
            if($statement->execute()){
               return true;
            }
            return false;
        }

        // DELETE
        function deleteLocations(){
            $sql = "DELETE FROM " . $this->db_table . " WHERE id = ?";
            $statement = $this->conn->prepare($sql);
        
            $this->id=htmlspecialchars(strip_tags($this->id));
        
            $statement->bindParam(1, $this->id);
        
            if($statement->execute()){
                return true;
            }
            return false;
        }

    }
?>


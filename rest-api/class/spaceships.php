<?php
    class Spaceships{

        // declare the connection
        private $conn;

        // decalre the database table as local variable
        private $db_table = "spaceships";

        // columns from the database table declared as variables
        public $id;
        public $name;
        public $model;
        public $location;
        public $status;

        // database connection function
        public function __construct($db){
            $this->conn = $db;
        }
        // read function achieved here
        public function getMessages(){
            $query = "SELECT id, name, model, location, status FROM " . $this->db_table;
            $statement = $this->conn->prepare($query);
            $statement->execute();
            return $statement;
        }
        //create spaceships at first
        public function createSpaceships(){
            $query = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        name = :name, 
                        model = :model, 
                        location = :location, 
                        status = :status";
            
            //prepare sql
            $statement = $this->conn->prepare($query);
        
            // sanitize by stripping out the html tags
            $this->name=htmlspecialchars(strip_tags($this->name));
            $this->model=htmlspecialchars(strip_tags($this->model));
            $this->location=htmlspecialchars(strip_tags($this->location));
            $this->status=htmlspecialchars(strip_tags($this->status));
        
            // bind data to insert into the database
            $statement->bindParam(":name", $this->name);
            $statement->bindParam(":model", $this->model);
            $statement->bindParam(":location", $this->location);
            $statement->bindParam(":status", $this->status);
        
            if($statement->execute()){
               return true;
            }
            return false;
        }
        
        // UPDATE
        public function updateSpaceships(){
            $query = "UPDATE
                        ". $this->db_table ."
                    SET
                        name = :name, 
                        model = :model, 
                        location = :location, 
                        status = :status 
                    WHERE 
                        id = :id";

            //prepare the sql query here
            $statement = $this->conn->prepare($query);
        
            $this->name=htmlspecialchars(strip_tags($this->name));
            $this->model=htmlspecialchars(strip_tags($this->model));
            $this->location=htmlspecialchars(strip_tags($this->location));
            $this->status=htmlspecialchars(strip_tags($this->status));
            $this->id=htmlspecialchars(strip_tags($this->id));
        
            // bind data by binParam funtion here
            $statement->bindParam(":name", $this->name);
            $statement->bindParam(":model", $this->model);
            $statement->bindParam(":location", $this->location);
            $statement->bindParam(":status", $this->status);
            $statement->bindParam(":id", $this->id);
        
            if($statement->execute()){
               return true;
            }
            return false;
        }

        // DELETE
        function deleteSpaceships(){
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


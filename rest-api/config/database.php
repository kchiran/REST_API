<?php 
    class GetDatabase {
        private $host = "127.0.0.1";
        private $dbname = "interstellardb";
        private $username = "root";
        private $password = "";

        //Let's declare a variable
        public $connection;

        //Define the function here
        public function retrieve_connection(){
            $this->connection = null;
            try{
                $this->connection = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->username, $this->password);
                $this->connection->exec("set names utf8");
            }catch(PDOException $exception){
                echo "Connection to the Database Failed: " . $exception->getMessage();
            }
            return $this->connection;
        }
    }  
?>
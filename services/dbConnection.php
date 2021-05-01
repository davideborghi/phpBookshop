<?php


    
    
    

        
    

    function openConnection(){
        $dbserver = "localhost";
        $databaseName = "MondaMari";
        $sqlUser="root";
        $sqlPassword="";
        //$this->conn = new PDO("mysql:host=$this->servername;dbname=$this->datanaseName", $sqlUser, $sqlPassword);
        $connection = new mysqli($dbserver, $sqlUser, $sqlPassword, $databaseName);
        // Check connection
        if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
        }
        return $connection;
    }
    function closeConnection(){
        $connection->close();
    }


?>
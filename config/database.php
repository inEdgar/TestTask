<?php
class Database{
 
    // specify your own database credentials
    private $host = "localhost";
    private $db_name = "test_db";
    private $username = "root";
    private $password = "root";
    public $conn;
 
    // get the database connection
    public function getConnection(){
 
        $this->conn = null;
 
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
 
        return $this->conn;
    }

    /**
     * Delete table
     * 
     * @return response
     */
    public function delete(){

        $conn = $this->getConnection();

        try{
            $query = $conn->prepare("TRUNCATE TABLE intervals");
            $query->execute();
            return true;
        }
        catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
    }
}
?>
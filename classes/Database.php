<?php

class Database
{

    private $server = "mysql:host=localhost;dbname=db_frog_app";

    private $user = "root";

    private $pass = "";

    private $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    );

    protected $con;

    /* Function for opening connection */
    public function openConnection()
    
    {
        try 
        {
            
            $this->con = new PDO($this->server, $this->user, $this->pass, $this->options);
            
            return $this->con;
        } 
        catch (PDOException $e) 
        {
            
            echo "There is some problem in connection: " . $e->getMessage();
        }
    }

    /* Function for closing connection */
    public function closeConnection()
    {
        $this->con = null;
    }
}
?>
<?php

//Class DbConnect
class DbConnect
{
    //Variable to store database link
    private $con;
    private $pgcon;

    //Class constructor
    public function __construct()
    {

    }

    //This method will connect to the database
    public function connect()
    {
        //Including the config.php file to get the database constants
        include_once dirname(__FILE__) . '/Config.php';

        //connecting to mysql database
        $this->con = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

        //Checking if any error occured while connecting
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        //finally returning the connection link
        return $this->con;
    }

    public function pg_connect()
    {
        //Including the config.php file to get the database constants
        include_once dirname(__FILE__) . '/Config.php';

        //connecting to mysql database
        $this->con = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

        //Checking if any error occured while connecting
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        $this->pgcon = pg_connect("host=" . DBPG_HOST . " dbname=" . DBPG_NAME . " user=" . DBPG_USERNAME . " password=" . DBPG_PASSWORD . "");
        if ($pgcon) {
            echo 'Connection attempt failed.';
        }

        //finally returning the connection link
        return $this->con;
    }

}

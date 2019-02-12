<?php 

 
class Database
{
   private $host = HOST_NAME;
   private $db = DATABASE_NAME;
   private $user = USER_NAME;
   private $pwd = DATABASE_PASSWORD;

   private $databaseHandler; // db handler
   private  $errors;
   private $stmt;


    public function __construct()
    {
          $dsn = "mysql:host=".$this->host.";dbname=".$this->db;    

          //sset optiion
          $options = array(
                   PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                   PDO::ATTR_PERSISTENT => true,
          );

           try {
           	      // get pdoo intance
          $this->databaseHandler = new PDO($dsn, $this->user, $this->pwd, $options);

           } catch (PDOException $e) {
              die("connection errors ".$e->getMessage()); 	
           }


    }

    public function query($query)
    {
    	$this->stmt = $this->databaseHandler->prepare( $query );
    }


    public function bind($params, $value, $type=null  )
    {
    	     if (is_null($type)) {
    	     	    switch (true) {
    	     	    	case is_int($value):
    	     	    	    $type =  PDO::PARAM_INT;
    	     	    		break;
    	     	    	case is_bool($value):
    	     	    	    $type =  PDO::PARAM_BOOL;
    	     	    		break;
    	     	    	
    	     	    	case is_null($value):
    	     	    	    $type =  PDO::PARAM_NULL;
    	     	    		break;
    	     	    	
    	     	    	default:
    	     	    		$type = PDO::PARAM_STR; 
    	     	    		break;
    	     	    }
    	     }

    	     $this->stmt->bindValue($params,$value,$type);
    }

    public function execute()
    {
    	return $this->stmt->execute();
    }


    public function resultSet()
    {
    	$this->execute();
    	return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }


    public function singleResultSet()
    {
    	$this->execute();
    	return $this->stmt->fetch(PDO::FETCH_OBJ);
    }













}


 ?>
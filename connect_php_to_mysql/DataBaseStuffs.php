<?php 
/*

Author: Femi Bello
Email: femibel@gmail.com
Mobile: +2348068212113
Website: www.femiblue.com

*/
?>

<?php
//create database connection class for PDO
class DataBaseStuffs
{
	public $isConnected;
        protected $datab;
        public function __construct($username, $password, $host, $dbname, $options=array()){
            $this->isConnected = true;
            try { 
			//connect to database via PDO
                $this->datab = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password, $options); 
                $this->datab->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
                $this->datab->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            } 
            catch(PDOException $e) { 
                $this->isConnected = false;
                throw new Exception($e->getMessage());
            }
        }
        public function Disconnect(){
            $this->datab = null;
            $this->isConnected = false;
        }
       
	
	
	
	
	
} // end of class DatabaseStuffs











?>
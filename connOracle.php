<?php
	class DBO{
		// require 'config-tns.php';

		private $username = "DBNAME";
		private $password = "1234";
		private $tns = "  
						(DESCRIPTION =
						    (ADDRESS_LIST =
						      (ADDRESS = (PROTOCOL = TCP)(HOST = DESKTOP-QFC308H)(PORT = 1521))
						    )
						    (CONNECT_DATA =
						      (SERVICE_NAME = XE)
						    )
						  )
						       ";
						       
		public function connect(){
			try{
				$base = new PDO("oci:dbname=".$this->tns,$this->username,$this->password);
				$base->exec("Set character utf8");

				if($base){
					// echo "Connect Success";
					return $base;
				}
			}
			catch(Exception $e){
				echo "Connect error: ". $e->getMessage();
			}
			
		}
	}

?>
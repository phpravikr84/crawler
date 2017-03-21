<?php
	
	class dbConn{
		public function($hostname, $uname, $password){
				
				$conn = mysql_connect($hostname, $username, $password) or die('0');

				if($conn!='0'){
				
					mysql_select_db($news, $conn);
				}

				else{

					echo "database not connected";

				}

		}
	}
?>
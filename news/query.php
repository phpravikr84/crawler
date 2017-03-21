<?php
	
	include('db.php');

	class dbquery{
		
		public function getData(){
			
			$query = mysqli_query("SELECT * from md_media_contact");

			$results = mysqli_fetch_array($query);
			
			return $results;
		}
	}
?>
<?php 


class articlescripts
{
	
	
	function getArticles($request_data){

				$servername = "localhost";
				$username = "kimbadan_tech";
				$password = "Ravi@1986";
				$dbname = "kimbadan_worldtech";
                                
                              

				$article_data = array();

				 date_default_timezone_set('asia/kolkata');

				// Create connection
				$conn = new mysqli($servername, $username, $password, $dbname);
				// Check connection
				if ($conn->connect_error) {
    					die("Connection failed: " . $conn->connect_error);
				} 


		if(isset($request_data) && !empty($request_data) && ($request_data!=0)){


				$sql = "SELECT mc.media_contact_id, mc.media_contact_name, mcat.media_category_name, mc.media_contact_designation, md.desk_name, mo.media_organization_website, mo.media_organization_name FROM 5_md_media_contact AS mc LEFT JOIN 3_md_desk AS md ON mc.desk_id = md.desk_id LEFT JOIN 2_md_media_organization AS mo ON md.media_organization_id = mo.media_organization_id LEFT JOIN 1_md_media_category AS mcat ON mo.media_category_id=mcat.media_category_id WHERE media_contact_id='".$request_data."'";

				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
    					// output data of each row
   				         $row = $result->fetch_array(MYSQLI_ASSOC);
        		

                        $authname = strtolower($row['media_contact_name']);
                         $authorg = strtolower($row['media_organization_name']);
                         $authorname = str_replace(' ', '+', $authname);
                         $authororgnaisation = str_replace(' ', '+', $authorg);

                //PREPARE SEARCH URL**************************************************
                    $url = 'https://www.google.co.in/search?hl=en&tbm=nws&authuser=0&q='.$authorname.',+'.$authororgnaisation.'&oq='.$authorname.',+'.$authororgnaisation;
                //*******************************************************************//

                                                    $html = file_get_contents($url);
                                                    libxml_use_internal_errors(true); //Prevents Warnings, remove if desired
                                                    $dom = new DOMDocument();
                                                    $dom->loadHTML($html);

                                                    //***** DEFINE ARRAY *******//

                                                        $body = "";
                                                        $articlessArray =  array();
                                                        $titleArray =  array();
                                                        $postdateArray =  array();
                                                        $anchorsArray = array();
                                                        $contentsArray =  array();
                                                       


                                                    //**GET HTML DATA **//

                                                        foreach($dom->getElementsByTagName("body") as $element) {
                                                        
                                                            $body .= $dom->saveHTML($element);         
                                                            }


                                                     //**GET ANCHORS DATA **//      

                                                        $divs = $dom->getElementsByTagName('h3'); 
                                                        for($i=0;$i<$divs->length;$i++){  
                                                                $div = $divs->item($i);
                                                            if ($div->getAttribute("class") == "r") {
                                                            $link = $div->getElementsByTagName('a');
                                                            $links= str_replace('/url?q=', '',$link->item(0)->getAttribute("href"));

                                                                $split = explode('&', $links);
                                                            array_push($anchorsArray, $split[0]);
                                                            if(count($split) > 1){
                                                                $field = $split[1];
                                                                }
                                                                    else{
                                                                            $field = NULL;
                                                                        }
                                                            }
                                                        }

                                                        //**GET TITLES DATA **// 

                                                             $classname = 'r';
                                                        $dom = new DOMDocument;
                                                        $dom->loadHTML($body);
                                                        $xpath = new DOMXPath($dom);
                                                        $results = $xpath->query("//*[@class='" . $classname . "']");

                                                            if ($results->length > 0) {
                                                            
                                                                foreach($results as $result){
                                                                array_push($titleArray, strip_tags($dom->saveHTML($result)));

                                                                }
                                                        
                                                            }


                                                        
                                                            //**GET Articles Post DATA **//



                                                                   $classname = 'slp';
                                                        $dom = new DOMDocument;
                                                        $dom->loadHTML($body);
                                                        $xpath = new DOMXPath($dom);
                                                        $results = $xpath->query("//*[@class='" . $classname . "']");

                                                            if ($results->length > 0) {
                                                           
                                                                foreach($results as $result){

                                                                   
                                                                    $split = explode('-', strip_tags($dom->saveHTML($result)));
                                                                    $func = $split[0];
                                                                    if(count($split) > 1){
                                                                    $field = $split[1];
                                                                        $time = strtotime($field);

                                                                        $newformat = date('Y-m-d',$time);

                                                                    }
                                                                    else{
                                                                    $field = NULL;
                                                                    }

                                                                 array_push($postdateArray, $newformat);

                                                                }
                                                        
                                                            }

                                                    //**GET Articles Contents DATA **//

                                                             $classname = 'st';
                                                        $dom = new DOMDocument;
                                                        $dom->loadHTML($body);
                                                        $xpath = new DOMXPath($dom);
                                                        $results = $xpath->query("//*[@class='" . $classname . "']");

                                                            if ($results->length > 0) {
                                                        
                                                                foreach($results as $result){

                                                               
                                                                 array_push($contentsArray, strip_tags($dom->saveHTML($result)));

                                                                }
                                                        
                                                            }

                                                
                                                        //**INSERT SEARCH DATA **//
                                                                $loop = count($contentsArray);
                                                                
                                                                for($j=0; $j<$loop; $j++){

                                                            $sql = "INSERT IGNORE INTO md_latest_articles SET media_contact_id ='".(int)$request_data."',
                                                            article_title ='".addslashes($titleArray[$j])."' ,
                                                           
                                                            article_summary ='".addslashes($contentsArray[$j])."',
                                                            atricle_link ='".strip_tags($anchorsArray[$j])."',
                                                            article_published_date ='".$postdateArray[$j]."',
                                                            article_create_date = '".date('Y-m-d h:i:s')."',
                                                            article_created_by ='".$row['media_contact_name']."'";

                                                                $conn->query($sql);
                                                            }


                                                     //**SHOW SEARCH DATA **//
                                                                
                                                        $data = "SELECT * FROM md_latest_articles WHERE media_contact_id ='".(int)$request_data."'";
                                                        $res = $conn->query($data);
                                                        $row_cnt = $res->num_rows;

                                                        //echo $row_cnt;

                                                            if($row_cnt!=0){

                                                                return $conn->query($data);
                                                            }

                                                            else { return 0; }


        													
    				
				} else {
    					   return "0 results";
						}
		} else{

            return 'Author not exist';
                }


		$conn->close();
	}
}







//echo $sql;

 ?>
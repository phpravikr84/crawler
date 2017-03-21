<?php 
class searchengine
{
	
	
	function getArticles($request_data){

				$servername = "localhost";
				$username = "root";
				$password = "naveen123";
				$dbname = "newsdb";

                

				

				// Create connection
				$conn = new mysqli($servername, $username, $password, $dbname);
				// Check connection
				if ($conn->connect_error) {
    					die("Connection failed: " . $conn->connect_error);
				} 


		  if(isset($request_data) && !empty($request_data) && ($request_data!=0)){

				    $sql = "SELECT media_contact_name FROM 5_md_media_contact WHERE media_contact_id=".$request_data;

				    $result = $conn->query($sql);
				
                    if ($result->num_rows > 0) {
    					           // output data of each row

                                    //SEARCH VIEW BEGIN

                       

                                    $conn->query("CREATE OR REPLACE VIEW CurrentAuthors AS SELECT mc.media_contact_id, mc.media_contact_name, mcat.media_category_name, mc.media_contact_designation, md.desk_name, mo.media_organization_website, mo.media_organization_name FROM 5_md_media_contact AS mc LEFT JOIN 3_md_desk AS md ON mc.desk_id = md.desk_id LEFT JOIN 2_md_media_organization AS mo ON md.media_organization_id = mo.media_organization_id LEFT JOIN 1_md_media_category AS mcat ON mo.media_category_id=mcat.media_category_id WHERE mcat.media_category_id = 2 AND is_quick_link='Y'");

                                        $searchView = $conn->query("SELECT * FROM CurrentAuthors WHERE media_contact_id='".$request_data."'");

                                             //echo $searchView->num_rows;

                                    if($searchView->num_rows > 0){

                                            while($viewData=$searchView->fetch_array(MYSQLI_ASSOC))
                                            {
                                                    //echo $viewData['media_contact_name'];

                                                    // http://www.malaysiakini.com/search/en?q=*&category=&author=Rk%20Anand&dateFrom=1998-01-01&dateTo=2016-10-15
                                                    $searchstring=str_replace(" ", "%20", $viewData['media_contact_name']);

                                                    $url="http://www.malaysiakini.com/search/en?q=*&category=&author=$searchstring";

                                                    //echo $url;

                                            
                                                    $html = file_get_contents($url);
                                                    libxml_use_internal_errors(true); //Prevents Warnings, remove if desired
                                                    $dom = new DOMDocument();
                                                    $dom->loadHTML($html);

                                                        $body = "";
                                                        $articles = "";

                                                        $article_data = array();

                                                        $titleArray =  array();
                                                        $postdateArray =  array();
                                                        $anchorsArray = array();
                                                        $contentsArray =  array();
                                                   
                                            
                                                    $authorName = $viewData['media_contact_name'];

                                                    // foreach($dom->getElementsByTagName("body")->item(0)->childNodes as $child) {
                                                    //     $body .= $dom->saveHTML($child);
                                                    // }

                                                    //$loop = $dom->getElementsByTagName('article')->length;

                                                     //  foreach($dom->getElementsByTagName("article")->item(0)->childNodes as $child) {
                                                    //     $body .= $dom->saveHTML($child);
                                                    // }

                                                         foreach($dom->getElementsByTagName("article") as $element) {
                                                        
                                                            $articles .= $dom->saveHTML($element);         
                                                            }

                                                        //echo $articles;

                                                        $dom->loadHTML($articles);
                                                        foreach($dom->getElementsByTagName('h3') as $heading){
                                                            //$body .= $dom->saveHTML($heading);
                                                            array_push($titleArray, strip_tags($dom->saveHTML($heading)));

                                                            
                                                        }

                                                        foreach($dom->getElementsByTagName('time') as $postdate){
                                                        //$body .= $dom->saveHTML($postdate);
                                                        array_push($postdateArray, strip_tags($dom->saveHTML($postdate)));

                                                            
                                                        }


                                                        foreach($dom->getElementsByTagName('a') as $anchors){
                                                        //$body .= $dom->saveHTML($postdate);
                                                        array_push($anchorsArray, 'http://www.malaysiakini.com'.$anchors->getAttribute( 'href' ));

                                                            
                                                        }

                                                

       

                                                  
                                                        $classname = 'uk-text-truncate';
                                                        $dom = new DOMDocument;
                                                        $dom->loadHTML($articles);
                                                        $xpath = new DOMXPath($dom);
                                                        $results = $xpath->query("//*[@class='" . $classname . "']");

                                                            if ($results->length > 0) {
                                                            //echo $review = $results->item(0)->nodeValue;
                                                             //$body .= $dom->saveHTML($results->item(0));
                                                                foreach($results as $result){

                                                                //$body .= $dom->saveHTML($result);
                                                                array_push($contentsArray, strip_tags($dom->saveHTML($result)));

                                                                }
                                                        
                                                            }


                                                            
                                                           

                                                

                                            }
                                    }


                                                            $loop = count($contentsArray);
                                                            //echo $loop;
                                                            //exit;
                                                            for($j=0; $j<$loop; $j++){

                                                            $sql = "INSERT IGNORE INTO md_latest_articles SET media_contact_id ='".(int)$request_data."',
                                                            article_title ='".$titleArray[$j]."' ,
                                                            atricle_link ='".$anchorsArray[$j]."',
                                                            article_summary ='".$contentsArray[$j]."',
                                                            article_published_date ='".$postdateArray[$j]."',
                                                            article_create_date = '".date('Y-m-d h:i:s')."',
                                                            article_created_by ='".$authorName."'";
                                                            

                                                            $conn->query($sql);

                                                            }

                                                            //echo $sql;

                                                                // echo "<pre>";
                                                                // echo $titleArray[$j]."<br/>";
                                                                // echo $anchorsArray[$j]."<br/>";
                                                                //  echo $contentsArray[$j]."<br/>";
                                                                // echo $postdateArray[$j]."<br/>";
                                                                // echo "</pre>";
                                                                // exit;
                                                        $data = "SELECT * FROM md_latest_articles WHERE media_contact_id ='".(int)$request_data."'";
                                                        $res = $conn->query($data);
                                                        $row_cnt = $res->num_rows;

                                                        //echo $row_cnt;

                                                            if($row_cnt!=0){

                                                                return $conn->query($data);
                                                            }

                                                            else { return 0; }


                    }


                                                            

                                                         
                               

            }




		$conn->close();
	}
}







//echo $sql;

 ?>
<?php 


class articlescripts
{
	
	
	function getArticles($request_data){

				$servername = "localhost";
				$username = "root";
				$password = "naveen123";
				$dbname = "newsdb";

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

            


    //             echo $sql;
    //             exit;

				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
    					// output data of each row
   				         $row = $result->fetch_array(MYSQLI_ASSOC);
        			//return $row['media_contact_name'];

        						// $authname = strtolower($row['media_contact_name']);
              //                   $authorg = strtolower($row['media_organization_name']);
                                $authname = str_replace(' ', '+', $row['media_contact_name']);
                                $authorg = str_replace(' ', '+', $row['media_organization_name']);
								//$searchstring = str_replace(' ', '+', $row['media_contact_name']);
        						$url = 'https://news.google.com/news?q='.$authname.'+%2C+'.$authorg.'&output=rss';
                                                $api_endpoint = 'http://rss2json.com/api.json?rss_url=';
                                    $articles = json_decode( file_get_contents($api_endpoint . urlencode($url)) , true );
        						
    										                  $titleArray =  array();
                                                        $postdateArray =  array();
                                                        $anchorsArray = array();
                                                        $contentsArray =  array();
    									
    									                      foreach($articles as $article_list)
                                                    {
                                                        if(isset($article_list)){
                                                        foreach($article_list as $article)
                                                                {
                                                                   
                                                                    // $article_data['pubdata'][] = $article['pubDate'];

                                                                    // $article_data['title'][] = $article['title'];

                                                                    // $article_data['content'][] = $article['content'];

                                                                    if(isset($article['title']) && isset($article['pubDate']) && isset($article['description'])){
                                                                    // $article_data = array('title'=>$article['title'],
                                                                    //     'pubdate' => $article['pubDate'],
                                                                    //     'description' => $article['description']
                                                                    //     );

                                                                         array_push($titleArray, strip_tags($article['title']));
                                                                        
                                                                        array_push($postdateArray, strip_tags($article['pubDate']));

                                                                         array_push($contentsArray, strip_tags($article['description']));
                                                                    }


                                                                } }
                                                    }

                                                    //return $article_data;

                                                        // echo "<pre>";
                                                        //          echo $titleArray[1]."<br/>";
                                                        //         echo $anchorsArray[1]."<br/>";
                                                        //          echo $contentsArray[1]."<br/>";
                                                        //         echo $postdateArray[1]."<br/>";
                                                        //         echo "</pre>";

                                                            $loop = count($contentsArray);
                                                            //echo $loop."<br/>";
                                                            //exit;
                                                            for($j=0; $j<$loop; $j++){

                                                            $sql = "INSERT INTO md_latest_articles SET media_contact_id ='".(int)$request_data."',
                                                            article_title ='".addslashes($titleArray[$j])."' ,
                                                           
                                                            article_summary ='".addslashes($contentsArray[$j])."',
                                                            atricle_link ='',
                                                            article_published_date ='".$postdateArray[$j]."',
                                                            article_create_date = '".date('Y-m-d h:i:s')."',
                                                            article_created_by ='".$row['media_contact_name']."'";

                                                                
                                                            }

                                                            
                                                            $conn->query($sql);
                                                            //echo $sql;

                                                                
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
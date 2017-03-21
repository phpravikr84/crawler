<?php 


class searchengine
{
	
	
	function getArticles($request_data){

				$servername = "localhost";
				$username = "root";
				$password = "naveen123";
				$dbname = "newsdb";

				$article_data = array();

				

				// Create connection
				$conn = new mysqli($servername, $username, $password, $dbname);
				// Check connection
				if ($conn->connect_error) {
    					die("Connection failed: " . $conn->connect_error);
				} 


		if(isset($request_data) && !empty($request_data) && ($request_data!=0)){

				$sql = "SELECT * FROM 5_md_media_contact WHERE media_contact_id=".$request_data;
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
    					// output data of each row
   				while($row = $result->fetch_assoc()) {
        			//return $row['media_contact_name'];

        						$authname = strtolower($row['media_contact_name']);
								$searchstring = str_replace(' ', '%2520', $row['media_contact_name']);
        						$rss_url = 'https://news.google.com/news?q='.$authname.'%20articles malaysia&output=rss';
        						$api_endpoint = 'http://rss2json.com/api.json?rss_url=';
    								$articles = json_decode( file_get_contents($api_endpoint . urlencode($rss_url)) , true );
    										
    									
    									//return $articles;

    										foreach($articles as $article_list)
                                                    {
                                                        if(isset($article_list)){
                                                        foreach($article_list as $article)
                                                                {
                                                                   
                                                                    // $article_data['pubdata'][] = $article['pubDate'];

                                                                    // $article_data['title'][] = $article['title'];

                                                                    // $article_data['content'][] = $article['content'];

                                                                    if(isset($article['title']) && isset($article['pubDate']) && isset($article['description'])){
                                                                    $article_data = array('title'=>$article['title'],
                                                                    	'pubdate' => $article['pubDate'],
                                                                    	'description' => $article['description']
                                                                    	);
                                                                	}


                                                                } }
                                                    }

                                                    return $article_data;

    				}
						} else {
    								echo "0 results";
								}
					}


		$conn->close();
	}
}







//echo $sql;

 ?>
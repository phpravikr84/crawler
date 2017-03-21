<?php
//echo $_POST['authid'];
$authid = strtolower($_POST['authid']);
$searchstring = str_replace(' ', '%2520', $_POST['authid']);
//echo $searchstring;
//$searchurl = "http://rss2json.com/api.json?rss_url=http%3A%2F%2Fnews.google.com%2Fnews%3Fq%3D".$searchstring."output%3Drss";

// $searchurl = "http://rss2json.com/api.json?rss_url=https%3A%2F%2Fnews.google.com%2Fnews%3Fq%3DZainal%2520Abidin%2520Zainul%2520Azhar%2520news%26output%3Drss";

$rss_url = 'https://news.google.com/news?q='.$authid.'%20news&output=rss';

$searchurl = 'http://rss2json.com/api.json?rss_url='.$rss_url;

//print_r($searchurl);

//echo $searchurl;



    $api_endpoint = 'http://rss2json.com/api.json?rss_url=';
    $data = json_decode( file_get_contents($api_endpoint . urlencode($rss_url)) , true );



                
                $ch = curl_init();
                curl_setopt($ch,CURLOPT_URL, $searchurl);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                $result = curl_exec($ch);
                curl_close($ch);
                $results=json_decode($result, true);

                //echo $results;
                
                echo "<pre>";
                print_r($data);
                echo "</pre>";
               
                
               
                // // exit;




?>

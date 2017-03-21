<?php
//AIzaSyAwwgtElvnTMLRDIl8dWguqq8zQozRy0CY
	//$url="http://ajax.googleapis.com/ajax/services/search/web?v=1.0&q=apple&key=AIzaSyAwwgtElvnTMLRDIl8dWguqq8zQozRy0CY&userip=116.193.140.77";

// $url = "https://ajax.googleapis.com/ajax/services/search/news?" .
//        "v=1.0&q=barack%20obama&userip=116.193.140.77";

       //http://news.google.com/news?q=apple&output=rss
//http://rss2json.com/api.json?rss_url=http%3A%2F%2Fnews.google.com%2Fnews%3Fq%3Dbarack%26amp%3Bobama%26output%3Drss

      $url = "http://rss2json.com/api.json?rss_url=http%3A%2F%2Fnews.google.com%2Fnews%3Fq%3Dapple%26output%3Drss";





                
                $ch = curl_init();
                curl_setopt($ch,CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                $result = curl_exec($ch);
                curl_close($ch);
                $results=json_decode($result, true);
                
                echo "<pre>";
                print_r($results);
                echo "</pre>";
               
                
               
                exit;


    //              $rss_url = 'http://news.google.com/news?q=apple&output=rss';
    // $api_endpoint = 'http://rss2json.com/api.json?rss_url=';
    // $data = json_decode( file_get_contents($api_endpoint . urlencode($rss_url)) , true );

    // if($data['status'] == 'ok'){

    //     echo "==== {$data['feed']['title']} ====\n";
    //     foreach ($data['items'] as $item) {
    //         echo "{$item['title']}\n";
    //     }


    // }


                Array
(
    [title] => Malaysia's top performers honoured at MET10 Awards - Malay Mail Online
    [link] => http://news.google.com/news/url?sa=t&fd=R&ct2=us&usg=AFQjCNFNCnDg4drET82UU1syV81ZxWt3ow&clid=c3a7d30bb8a4878e06b80cf16b898331&ei=3zb5V7jpOJXY4QKm6rmYDQ&url=http://www.themalaymailonline.com/showbiz/article/malaysias-top-performers-honoured-at-the-met10-awards
    [guid] => tag:news.google.com,2005:cluster=http://www.themalaymailonline.com/showbiz/article/malaysias-top-performers-honoured-at-the-met10-awards
    [pubDate] => Mon, 18 Jan 2016 07:22:03 GMT
    [categories] => Array
        (
        )

    [author] => 
    [thumbnail] => 
    [description] => 

Malay Mail Online   
Malaysia's top performers honoured at MET10 Awards
Malay Mail Online
De Fam walked away with Best Song and Best Breakthrough Act. — TheHive.Asia picNetwork Content Manager of hitz fm and ERA fm, Raqeem Brian mentioned, “We thought this might be an interesting combo; to pitch them against each other. So, we took a ...


    [content] => 

Malay Mail Online   
Malaysia's top performers honoured at MET10 Awards
Malay Mail Online
De Fam walked away with Best Song and Best Breakthrough Act. — TheHive.Asia picNetwork Content Manager of hitz fm and ERA fm, Raqeem Brian mentioned, “We thought this might be an interesting combo; to pitch them against each other. So, we took a ...


)




?>

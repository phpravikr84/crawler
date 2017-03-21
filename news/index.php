<?php 

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


$sql = "SELECT * from 5_md_media_contact";
$result = $conn->query($sql);

//echo $sql;

 ?>
<!DOCTYPE html>
<html>

   <head>
      <meta charset="utf-8">
      <title>code</title>
   </head>
	
   <body>

      <header role="banner">
         <h1>Article Search</h1>
         <select name="author" id="author">

         <?php if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) { ?>
                  
                  <option value="<?php echo $row["media_contact_name"]; ?>"> <?php echo $row["media_contact_name"]; ?> </option>
                  <?php }
                     } else {
                              echo " No results exist!";
                        }
                  $conn->close();
               ?>

               
         </select>
      </header>

               <div id="contents"> </div>
      
      <footer>
         <p></p>
      </footer>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <script type="text/javascript">
            $(document).ready(function(){

                  $('#author').on('change', function() {
                     //alert( this.value ); // or $(this).val()
                     var auth = $(this).val();
                        $.ajax({
                                 url: 'articles.php',
                                 type: 'post',
                               
                                 data:'authid='+auth,
                                 success: function(data) {
                                   //console.log(data);
                                    $("#contents").html(data);
                                 },
                                    error: function() {
                                          console.log('not get');
                                 }
                              });
                  });

            });

            </script>
      
   </body>   
</html>
<html>
   <head>
      <title>Create a MariaDB Database</title>
   </head>

   <body>
      <?php
         $dbhost = 'localhost:3036';
         $dbuser = 'root';
         $dbpass = 'rootpassword';
         $conn = mysql_connect($dbhost, $dbuser, $dbpass);
      
         if(! $conn ) {
            die('Could not connect: ' . mysql_error());
         }

         echo 'Connected successfully<br />';
         $sql = 'CREATE DATABASE PRODUCTS';
         $retval = mysql_query( $sql, $conn );
      
         if(! $retval ) {
            die('Could not create database: ' . mysql_error());
         }

         echo "Database PRODUCTS created successfully\n";
         mysql_close($conn);
      ?>
   </body>
</html>
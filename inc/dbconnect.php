<?php 

// PROCEDURAL FORMAT current one we are using right now
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "";
//you must be considerate of your double connection files in case of changes
    $dbconn = mysqli_connect($servername, $username, $password, $dbname);
     if (!$dbconn) {
      header('location: errors.html');
   }

// OBJECT ORIENTED
//DEFINE ('DB_HOST', 'localhost');
//DEFINE ('DB_USER', 'root');
//DEFINE ('DB_PASSWORD', '');
//DEFINE ('DB_NAME', '');

// Create connection
//$conn = new mysqli($servername, $username, $password);

/* Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
*/

/* PDO FORMAT
//$servername = "localhost";
//$username = "username";
//$password = "password";

try {
    $conn = new PDO("mysql:host=$servername;dbname=myDB", $username, $password);
   // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

*/
?>
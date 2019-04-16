<?php
ignore_user_abort(true);
error_reporting(E_ERROR | E_PARSE);
// $nick = $_GET["id"];
// $i = 1;


do{
echo "1";
flush();
ob_flush();
$nick = $_GET["id"];
// sleep(1);
}while(!connection_aborted());

file_put_contents('log.txt', sprintf("Conn Closed\nTime spent with connection open: %01.5f sec\nLoop itterations: %s\n\n", microtime(true) - $GLOBALS[SERVER_NAME], $GLOBALS[SERVER_NAME]), FILE_APPEND);
    $nick = $_GET["id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mmorpg";


    $con = mysqli_connect('localhost', 'root', '', 'mmorpg');

    $sql = "DELETE FROM Gamers WHERE nick='$nick'";

    if ($con->query($sql) === TRUE) {

    } else {

    }

?>
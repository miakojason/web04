<?php
session_start();
echo ($_SESSION['ans']==$_GET['ans'])?1:0;
// if($_SESSION['ans']==$_GET['ans']){
//     echo 1;
// }else{
//     echo 0;
// }

?>
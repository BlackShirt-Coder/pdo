<?php
require_once "database/DAL.php";
class index{
    public function __construct()
    {
//        $db1=new dbGen();
//        var_dump($db1);
//        echo "<hr>";
//        $db2=new dbGen();
//        var_dump($db2);
//        echo "<hr>";
//        $db3=new dbGen();
//        var_dump($db3);
       $db= new DAL();

//       var_dump($db1);
//       echo "<hr>";
//       $db2= dbGen::getInstance();
//        var_dump($db2);
//        echo "<hr>";
//       $db3= dbGen::getInstance();
//        var_dump($db3);
//        echo "<hr>";

    }
}
new index();
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
       echo "<hr>";
//        $db->getSingleShop(2);
        $items=[
            ["Nokia", "192,168.4.100", "nokia", "123", 1],
            ["One Plus", "192,168.5.100", "one plus", "123", 1],
            ["Lenovo", "192,168.6.100", "lenovo", "123", 1]
        ];
//        $db->updateName("LG",21);
        $db->multiDelete();
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
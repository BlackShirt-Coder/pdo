<?php
require_once "database/dbGen.php";
class index{
    public function __construct()
    {
        new dbGen();
    }
}
new index();
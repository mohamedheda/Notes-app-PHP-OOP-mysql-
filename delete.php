<?php
require_once "db.php";
require_once "notes.php";
$deleteNote=new Notes();
if($_POST){
        $deleteNote->delete($_POST['id']);
    header("LOCATION:index.php");
}
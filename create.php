<?php
require_once "index.php";
if($_POST){
    if($_POST['id']==""){
        if($_POST['title']!=""&&$_POST['description']!=""){
            $addNote=new Notes();
            $addNote->addNote($_POST);
            header("Refresh:0");
        }elseif($_POST['title']!=""&&$_POST['description']==""){
            echo "<div class=message>please enter description</div>";
        }elseif($_POST['title']==""&&$_POST['description']!=""){
            echo "<div class=message>please enter tiltle</div>";
        }
    }
    else{
        $update=new Notes();
        $update->updateData($_POST);
        header("Refresh:0");
    }}


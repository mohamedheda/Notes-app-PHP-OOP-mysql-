<?php
require_once "db.php";
require_once "notes.php";
require_once "create.php";
$newNote=new Notes();
$resultNotes=$newNote->getNotes();
$noteForUpdate=[
    'id'=>'',
    'title'=>'',
    'discription'=>''
];
if($_GET)
{      $updateNote=new Notes();
    $noteForUpdate=$updateNote->getNotesById($_GET['id']);
}


?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="app.css">
</head>
<body>
    <div>
    <form class="new-note" action="create.php" method="post">
        <input type="hidden" name="id" value="<?=$noteForUpdate['id'] ?>" >
        <input type="text" name="title" placeholder="Note title" autocomplete="off" 
        value="<?= $noteForUpdate['title']?>">
        <textarea name="description" cols="30" rows="4"
                  placeholder="Note Description"><?= $noteForUpdate['discription']?></textarea>
                  
                  <button>
                      <?php if($noteForUpdate['id']){?>    
        Update
        <?php }else{ ?>
            New note
            <?php } ?>
        </button>
    </form>
    <?php 
    if($resultNotes!=null){
        foreach($resultNotes as $note){
            ?>
    <div class="notes">
        <div class="note">
            <div class="title">
                <a title="EDIT" href="?id=<?=$note['id']?>"><?= $note['title']  ?></a>
            </div>
            <div class="description">
            <?= $note["discription"] ?>
            </div>
            <small><?= $note["creat_date"] ?></small>
            <form action="delete.php" method="post" >
                <input type="hidden" name="id" value="<?=$note['id']?>">
                <button class="close">X</button>
            </form>
        </div>
    </div>
</div>
    <?php    
}
    }
    ?>
</body>
</html>

<?php
class Notes extends DB {
    //function to get notes from db
    public function getNotes(){
        $sql="SELECT * FROM `notes` ORDER BY `creat_date` DESC";
        $stm=$this->connect()->query($sql);
        $row=$stm->fetchAll();
        return $row;
    }
    //function to get note by id when updating 
    public function getNotesById($id){
        $sql="SELECT * FROM `notes` where id=:id";
        $stm=$this->connect()->prepare($sql);
        $stm->bindValue('id',$id);
        $stm->execute();
        return $stm->fetch();
    }
    // function to add notes
    public function addNote($data){
        //insert using bindvalue and execute
        $sql="INSERT INTO notes (title,discription,creat_date)
                         VALUES (:title,:discription,:creat_date)";
        $stm=$this->connect()->prepare($sql);
        $stm->bindValue('title',$data["title"]);
        $stm->bindValue('discription',$data["description"]);
        $stm->bindValue('creat_date',date('Y-m-d H:i:s'));
        $stm->execute();
        /*insert using ? and execute with sending array
        $sql="INSERT INTO `notes`(title,discription,creat_date) VALUES (?,?,?)";
        $stm=$this->connect()->prepare($sql);
        $stm->execute([$data["title"],$data["description"],date('Y-m-d H:i:s')]);*/
    }
    //function to update data of notes
    public function updateData($data){
        $sql="UPDATE `notes` SET `title`=:title,`discription`=:discription WHERE id=:id";
$stm=$this->connect()->prepare($sql);
$stm->bindValue('title',$data["title"]);
$stm->bindValue('discription',$data["description"]);
$stm->bindValue('id',$data["id"]);
$stm->execute();
    }
    //function to delele notes from db
    public function delete($id){
                $sql="DELETE FROM `notes` WHERE id=:id";
                $stm=$this->connect()->prepare($sql);
                $stm->bindValue('id',$id);
                $stm->execute();
    }
}

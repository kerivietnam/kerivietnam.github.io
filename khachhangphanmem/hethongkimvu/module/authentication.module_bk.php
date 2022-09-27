<?php
require 'connectDB/connectdb.module.php';
class Authentication extends ConnectDB{
    public function getAllType(){
        $this->connect();
        $sql = "SELECT * FROM `typeauthen`";
        $value = mysqli_query($this->__connec, $sql);
        if($value){
            return $value;
        }else{
            return "400";
        }
        $this->disConnect();
    }

    public function getAllUser(){
        $this->connect();
        $sql = "SELECT * FROM `authentication`";
        $value = mysqli_query($this->__connec, $sql);
        if($value){
            return $value;
        }else{
            return "400";
        }
        $this->disConnect();
    }


    public function insertAuthen($nameScreen , $urlSrceen, $userId, $listAuthen){
        $this->connect();
        $sql = "INSERT INTO `authentication` (`idUser`, `nameScreen`, `urlScreen`, `authenticationUser`) VALUES ('$userId', '$nameScreen', '$urlSrceen', '$listAuthen')";

        $value = mysqli_query($this->__connec, $sql);
        if($value){
            return "200";
        }else{
            return "400";
        }
        $this->disConnect();
    }


    public function updateAuthen($userId, $listAuthen){
        $this->connect();
        $sql = "UPDATE `authentication` SET `authenticationUser` = '$listAuthen' WHERE `authentication`.`idUser` = $userId;";
        $value = mysqli_query($this->__connec, $sql);
        if($value){
            return "200";
        }else{
            return "400";
        }
        $this->disConnect();
    }

}

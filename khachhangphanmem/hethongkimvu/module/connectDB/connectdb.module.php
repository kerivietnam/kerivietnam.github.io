<?php

require 'config.php';

class ConnectDB{

    protected $__connec ;

    protected function connect(){

        if (!$this->__connec){
            $this->__connec = mysqli_connect(DB_HOST, DB_ADMINNAME, DB_ADMINPASS, DB_NAME) or die ('Lỗi kết nối');
            mysqli_query($this->__connec, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
        }
    }
    protected function disConnect(){
        if ($this->__connec){
            mysqli_close($this->__connec);
        }
    }

    public function getArrayList($sql){
        
        $this->connect();
        $result = mysqli_query($this->__connec, $sql);
        $return = array();
        while ($row = mysqli_fetch_assoc($result)){
            $return[] = $row;
        }
        mysqli_free_result($result);
        return $return;
    }
    

}
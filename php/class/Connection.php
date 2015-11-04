<?php
class Connection {
    protected $host;
    protected $db;
    protected $user;
    protected $password;
    public function connect(){
        if(server("SERVER_ADDR")=="::1"||server("SERVER_ADDR")=="127.0.0.1"){
            $this->host="localhost";
            $this->db="deway";
            $this->user="root";
            $this->password="";
        }else{
            $this->host="mysql.hostinger.com.br";
            $this->db="u398318873_deway";
            $this->user="u398318873_dw";
            $this->password="Knowledge1";
        }
        $conn=mysqli_connect($this->host,$this->user,$this->password,$this->db);
        if(mysqli_connect_errno()) AJAXReturn("{'type':'error','msg':'Falha ao se conectar ao MySQL:<p>($conn->connect_errno)</p><p>$conn->connect_error</p>'}");
        else return $conn;
    }
    public function checkExistence($target,$field,$value){
        $mysqli=$this->connect();
        $query=$mysqli->prepare("select * from $target where $field=?");
        $query->bind_param("s",$value);
        $query->execute();
        $query->store_result();
        if($query->num_rows==0) return false;
        else return true;
    }
}
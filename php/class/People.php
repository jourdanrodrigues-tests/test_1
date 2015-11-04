<?php
class People extends Connection{
    private $name;
    private $email;
    private $age;
    public function setAttr($var){
        $obj=json_decode(fixJSON($var));
        $this->name=$obj->name;
        $this->email=$obj->email;
        $this->age=$obj->age;
    }
    public function signUp(){
        if($this->checkExistence("people","email",$this->email)===true){
            AJAXReturn("{'type':'error','msg':'Já existe cadastro com esse nome ou e-mail!'}");
            return;
        }
        $conn=$this->connect();
        $signUp=$conn->prepare("insert into people(name,email,age) values (?,?,?)");
        $signUp->bind_param("ssd",$this->name,$this->email,$this->age);
        if(!$signUp->execute()) AJAXReturn("{'type':'error','msg':'Não foi possível realizar o cadastro:<p>($signUp->errno) $signUp->error</p>'}");
        else AJAXReturn("{'type':'success','msg':'Cadastro realizado com sucesso!'}");
    }
    public function getPeople(){
        $conn=$this->connect();
        $query=$conn->prepare("select * from people");
        $query->execute();
        $query->bind_result($colName,$colEmail,$colAge,$colId);
        $result="{'people':[";
        while($query->fetch()) $result.="{'name':'$colName','email':'$colEmail','age':'$colAge'},";
        return fixJSON(str_replace(",]}","]}",$result."]}"));
    }
}
<?php

class TypesManager {
    private $db;
    public function __construct() {
        $dbName="pokedex";
        $port="3306";
        $username="root";
        $password="";
        try {
            $this->db=new PDO("mysql:host=localhost;dbname=$dbName;port=$port",$username,$password);
        }catch (PDOException $exception){
            echo $exception->getMessage();
        }
    }
    public function create(Type $type):void {
        $req=$this->db->prepare("INSERT INTO type (name,color) VALUES (:name,:color);");
        $req->bindValue(":color",$type->getColor(),PDO::PARAM_STR);
        $req->bindValue(":name",$type->getName(),PDO::PARAM_STR);

        $req->execute();
    }
    public function get($id):type{
        $req=$this->db->prepare("SELECT * FROM type WHERE id=:id");
        $req->bindValue(":id",$id,PDO::PARAM_INT);
        $data=$req->fetch();
        return new type($data);
    }
    public function getAll():array {
        $types=[];
        $req=$this->db->query("SELECT * FROM type ORDER BY name");
        $datas=$req->fetchAll();
        foreach ($datas as $data){
            $type=new type($data);
            $types[] = $type;
        }
        return $types;
    }
    public function getAllByString(string $input) {
        $types=[];
        $req=$this->db->prepare("SELECT * FROM type WHERE name LIKE :name ORDER BY name");
        $req->bindValue(":name",$input,PDO::PARAM_STR);
        $datas=$req->fetchAll();
        foreach ($datas as $data){
            $type=new type($data);
            $types[] = $type;
        }
        return $types;
    }
    public function getAllByType(string $input) {
        $types=[];
        $req=$this->db->prepare("SELECT * FROM type WHERE name LIKE :name ORDER BY name");
        $req->bindValue(":type", $input, PDO::PARAM_STR);
        $datas = $req->fetchAll();
        foreach ($datas as $data) {
            $type = new type($data);
            $types[] = $type;
        }
        return $types;
    }
    public function update(type $type) {
        $req=$this->db->prepare("UPDATE type SET name=:name, color=:color");
        $req->bindValue(':color',$type->getColor(),PDO::PARAM_STR);
        $req->bindValue(':name',$type->getName(),PDO::PARAM_STR);
        $req->execute();
    }
    public function delete(int $id) {
        $req=$this->db->prepare("DELETE FROM type WHERE id=:id");
        $req->bindValue(':id',$id,PDO::PARAM_INT);
        $req->execute();
    }

}
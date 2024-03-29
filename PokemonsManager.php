<?php

class PokemonsManager {
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
    public function create(Pokemon $pokemon):void {
        $req=$this->db->prepare("INSERT INTO pokemon (number,name,description,type1,type2,url_image) VALUES (:number,:name,:description,:type1,:type2,:url_image);");
        $req->bindValue(":number",$pokemon->getNumber(),PDO::PARAM_INT);
        $req->bindValue(":name",$pokemon->getName(),PDO::PARAM_STR);
        $req->bindValue(":description",$pokemon->getDescription(),PDO::PARAM_STR);
        $req->bindValue(":type1",$pokemon->getType1(),PDO::PARAM_STR);
        $req->bindValue(":type2",$pokemon->getType2(),PDO::PARAM_STR);
        $req->bindValue(":url_image",$pokemon->getUrl_image(),PDO::PARAM_STR);

        $req->execute();
    }
    public function get($id):Pokemon{
        $req=$this->db->prepare("SELECT * FROM pokemon WHERE id=:id");
        $req->bindValue(":id",$id,PDO::PARAM_INT);
        $req->execute();
        $data=$req->fetch();
        return new Pokemon($data);
    }
    public function getAll():array {
        $pokemons=[];
        $req=$this->db->query("SELECT * FROM pokemon ORDER BY number");
        $datas=$req->fetchAll();
        foreach ($datas as $data){
            $pokemon=new Pokemon($data);
            $pokemons[] = $pokemon;
        }
        return $pokemons;
    }
    public function getAllByString(string $input) {
        $pokemons=[];
        $req=$this->db->prepare("SELECT * FROM pokemon WHERE name LIKE :name ORDER BY number");
        $req->bindValue(":name",$input,PDO::PARAM_STR);
        $req->execute();
        $datas=$req->fetchAll();
        foreach ($datas as $data){
            $pokemon=new Pokemon($data);
            $pokemons[] = $pokemon;
        }
        return $pokemons;
    }
    public function getAllByType(string $input) {
        $pokemons=[];
        $req=$this->db->prepare("SELECT * FROM pokemon WHERE type1 LIKE :type or type2 LIKE :type ORDER BY number");
            $req->bindValue(":type", $input, PDO::PARAM_STR);
            $req->execute();
            $datas = $req->fetchAll();
            foreach ($datas as $data) {
                $pokemon = new Pokemon($data);
                $pokemons[] = $pokemon;
        }
            return $pokemons;
    }
    public function update(Pokemon $pokemon):void {
        $req=$this->db->prepare("UPDATE pokemon SET number=:number, name=:name, description=:description,type1=:type1,type2=:type2,url_image=:url_image WHERE id=:old_id");
        $req->bindValue(':old_id',$pokemon->getId(),PDO::PARAM_INT);
        $req->bindValue(':number',$pokemon->getNumber(),PDO::PARAM_INT);
        $req->bindValue(':name',$pokemon->getName(),PDO::PARAM_STR);
        $req->bindValue(':description',$pokemon->getDescription(),PDO::PARAM_STR);
        $req->bindValue(':type1',$pokemon->getType1(),PDO::PARAM_STR);
        $req->bindValue(':type2',$pokemon->getType2(),PDO::PARAM_STR);
        $req->bindValue(':url_image',$pokemon->getUrl_image(),PDO::PARAM_STR);
        $req->execute();
    }
    public function delete(int $id):void {
        $req=$this->db->prepare("DELETE FROM pokemon WHERE id=:id");
        $req->bindValue(':id',$id,PDO::PARAM_INT);
        $req->execute();
    }

}
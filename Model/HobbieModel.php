<?php

class HobbieModel{
    private $pdo;
    function __construct($pdo){
        $this->pdo = $pdo;
    }
    function criarHobbie($id_user,$nome,$descricao,$proficiencia){
        $sql = "INSERT INTO hobbies(id_user,nome,descricao,proficiencia) VALUES (?,?,?,?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_user,$nome,$descricao,$proficiencia]);
    }
    function criarMeta($nome,$descricao,$prazo,$completada){
        $sql = "INSERT INTO metas(nome,descricao,prazo,completada) VALUES (?,?,?,?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nome,$descricao,$prazo,$completada]);
    }
    function pegarHobbies($id_user){
        $sql = "SELECT * FROM hobbies WHERE id_user = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_user]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function pegarMetas($id_hobbie){
        $sql = "SELECT * FROM metas WHERE id_hobbie = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_hobbie]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
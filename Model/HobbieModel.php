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
        $sql = "SELECT * FROM metas WHERE id_hobbie = ? ORDER BY completada DESC ,prazo ASC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_hobbie]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function updateHobbie($id_hobbie,$proficiencia){
        $sql = "UPDATE hobbies SET proficiencia = ? WHERE id_hobbie = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$proficiencia,$id_hobbie]);
    }
    function updateMeta($id_meta,$completada){
        $sql = "UPDATE metas SET completada = ? WHERE id_meta = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$completada,$id_meta]);
    }
    function deletarHobbie($id_hobbie){
        $sql = "DELETE FROM hobbies WHERE id_hobbie = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_hobbie]);

        $sql = "DELETE FROM metas WHERE id_hobbie = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_hobbie]);
    }
    function deletarMeta($id_meta){
        $sql = "DELETE FROM metas WHERE id_meta = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_meta]);
    }
}
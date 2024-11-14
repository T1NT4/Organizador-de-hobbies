<?php
include_once __DIR__."/../model/HobbieModel.php";
class HobbieController{
    private $HobbieModel;
    function __construct($pdo){
        $this->HobbieModel = new HobbieModel($pdo);
    }
    function criarHobbie($id_user,$nome,$descricao,$proficiencia){
        $this->HobbieModel->criarHobbie($id_user,$nome,$descricao,$proficiencia);
    }
    function criarMeta($nome,$descricao,$prazo,$completada){
        $this->HobbieModel->criarMeta($nome,$descricao,$prazo,$completada);
    }
    function pegarHobbies($id_user){
        return $this->HobbieModel->pegarHobbies($id_user);
    }
    function pegarMetas($id_hobbie){
        return $this->HobbieModel->pegarMetas($id_hobbie);
    }
    function updateHobbie($id_hobbie, $proficiencia){
        $this->HobbieModel->updateHobbie($id_hobbie,$proficiencia);
    }
    function updateMeta($id_meta, $completada){
        $this->HobbieModel->updateMeta($id_meta,$completada);
    }
    function deletarHobbie($id_hobbie){
        $this->HobbieModel->deletarHobbie($id_hobbie);
    }
    function deletarMeta($id_meta){
        $this->HobbieModel->deletarMeta($id_meta);
    }
}
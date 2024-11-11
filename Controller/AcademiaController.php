<?php
require_once __DIR__.'/../model/AcademiaModel.php';

class AcademiaController{
    private $AcademiaModel;
    function __construct($pdo){
        $this->AcademiaModel = new AcademiaModel($pdo);
    }
    function cadastrarConta($username,$password){
        return $this->AcademiaModel->cadastrarConta($username,$password);
    }
    public function listarContaPorUsername($username) {
        return $this->AcademiaModel->listarContaPorUsername($username);
    }
    public function logIn($username, $password){
        return $this->AcademiaModel->logIn($username,$password);
    }
    public function atualizarPlanoDoUsuario($username,$plano){
        return $this->AcademiaModel->atualizarPlano($username,$plano);
    }
    public function listarPlanos(){
        return $this->AcademiaModel->listarPlanos();
    }
    public function listarPlanoPorId($plano_id){
        return $this->AcademiaModel->listarPlanoPorId($plano_id);
    }
    public function treinosDoPlano($plano_id){
        return $this->AcademiaModel->treinosDoPlano($plano_id);
    }
    public function listarTreinoPorId($id_treino){
        return $this->AcademiaModel->listarTreinoPorId($id_treino);
    }
    public function listarTreinosPorIds($id_treino_array){
        $array = [];
        foreach($id_treino_array as $id_treino){
            array_push($array,$this->listarTreinoPorId($id_treino)[0]);
        }
        return $array;
    }
}
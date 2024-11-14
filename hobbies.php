<?php
include_once __DIR__ . "/Controller/LoginController.php";
include_once __DIR__ . "/Controller/HobbieController.php";
include_once __DIR__ . "/config.php";

$Controller = new LoginController($pdo);
$HobbieController = new HobbieController($pdo);

if(!isset($_COOKIE['id_user'])){
    header("location: index.php");
}

$hobbies = $HobbieController->pegarHobbies($_COOKIE['id_user']);

if(!empty($_POST)){
    if($_POST['operacao'] == "criar_hobbie"){
        $HobbieController->criarHobbie($_COOKIE['id_user'],$_POST['nome'],$_POST['descricao'],$_POST['proficiencia']);
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Hobbies</title>
    <style>
        .container {
            display: flex;
            flex-direction: column;
            border: 1px solid black;
            padding: 5px;
        }

        .vertical {
            border: none !important;
            padding: 0 !important;
            flex-direction: row !important;
            justify-content: space-between;
        }

        i{
            font-size: 15px;
        }
        #criar_hobbie{
            border:none;
            appearance: none;
            width: 40px;
            height: 40px;
            margin-right:-100%;
            position: absolute;
            transform: translateX(-15%) translateY(-10%);
        }
        form.hobbie{
            display: none;
        }
        div:has(#criar_hobbie) i{
            font-size: 40px;
        }
        body:has(#criar_hobbie:checked) form.hobbie{
            display: flex;
        }
        textarea{
            resize: none;
        }

        .criar_meta{
            border:none;
            appearance: none;
            width: 20px;
            height: 20px;
            margin-right:-100%;
            position: absolute;
            transform: translateX(-15%) translateY(-10%);
        }
        form.hobbie{
            display: none;
        }
        
        body:has(#criar_hobbie:checked) form.hobbie{
            display: flex;
        }
    </style>
</head>

<body>
    <?php
    include __DIR__ . "/View/perfil.php";
    ?>

    <h1>hobbies</h1><div><input type="checkbox" id="criar_hobbie"><i class="fa-solid fa-plus"></i></div>


    <div class="hobbies">
        <form method="POST" class="container hobbie">
            <h3>criar hobbie novo</h3>
                <input type="text" name="nome" placeholder="nome do hobbie">
                <textarea name="descricao" placeholder="descrição do hobbie"></textarea>
                <label for="proficiencia">nivel de proficiencia</label>
                <select name="proficiencia">
                    <option value="Curioso">Curioso</option>
                    <option value="Iniciante">Iniciante</option>
                    <option value="Praticante">Praticante</option>
                    <option value="Avançado">Avançado</option>
                </select>
                <input type="hidden" name="operacao" value="criar_hobbie">
                <button type="submit">criar hobbie</button>
        </form>

        <?php
        foreach($hobbies as $hobbie){
            $id_hobbie = $hobbie['id_hobbie'];
            $nome_hobbie = $hobbie['nome'];
            $descricao_hobbie = $hobbie['descricao'];
            $hobbie_proficiencia = $hobbie['proficiencia'];
            
            $hobbie_metas = $HobbieController->pegarMetas($id_hobbie);
            
            include __DIR__.'/view/hobbie.php';
        }
        
        ?>
        <!-- <div class="container hobbie">
            <h3>nome do hobbie</h3>
            <p> descrição do hobbie Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vitae sunt incidunt assumenda illo aperiam quae, accusamus tenetur, voluptate quibusdam ratione soluta modi voluptas, repudiandae molestiae quis impedit nam illum! In, ipsum. Esse expedita deleniti sint porro reiciendis est, voluptatem a iusto debitis, officia cum explicabo molestias cupiditate. Non, quasi nesciunt?</p>
            <label for="proficiencia">nivel de proficiencia</label>
            <form method="POST" id="proficiencia">
                <select  name="proficiencia" onchange="submitform('proficiencia')">
                    <option value="Curioso">Curioso</option>
                    <option selected value="Iniciante">Iniciante</option>
                    <option value="Praticante">Praticante</option>
                    <option value="Avançado">Avançado</option>
                </select>
            </form>
            <div class="container vertical"><h4>metas do hobbie</h4><button><i class="fa-solid fa-plus"></i></button></div>
            <div class="metas-container container">
                <div class="container">
                    <div class="container vertical"><h4>fazer coisa</h4><button alt="deletar meta"><i class="fa-solid fa-trash"></i></button></div>
                    <p>fazer aquela coisa lá com tal coisa e tal coisado perfavor</p>
                    <p>data limite: 18/11/2024 (em 4 dias)</p>
                    <form id="meta-completada">
                        <label for="completada">meta completada?:</label>
                        <input onchange="submitform('meta-completada')" type="checkbox" name="completada">
                    </form>
                </div>
            </div>
        </div> -->
        </f>
</body>
<script src="https://kit.fontawesome.com/e6ced328af.js" crossorigin="anonymous"></script>
<script>
    function submitform(formname) {
        document.forms[formname].submit();
    }
</script>

</html>
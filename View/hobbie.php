<div class="container hobbie">
        <h3><?=$nome_hobbie?></h3>
        <p><?=$descricao_hobbie?></p>
        <form method="POST" id="proficiencia_<?=$hobbie_id?>">
            <label for="proficiencia">nivel de proficiencia</label>
            <select  name="proficiencia" onchange="submitform('proficiencia_<?=$hobbie_id?>')">
                <option <?php if($hobbie_proficiencia=="Curioso"){echo"selected";}?> value="Curioso">Curioso</option>
                <option <?php if($hobbie_proficiencia=="Iniciante"){echo"selected";}?> value="Iniciante">Iniciante</option>
                <option <?php if($hobbie_proficiencia=="Praticante"){echo"selected";}?> value="Praticante">Praticante</option>
                <option <?php if($hobbie_proficiencia=="Avançado"){echo"selected";}?> value="Avançado">Avançado</option>
            </select>
        </form>
        <div class="container vertical"><h4>metas do hobbie</h4><button ><i class="fa-solid fa-plus"></i></button></div>
        <div class="metas-container container">
            <?php
                foreach($hobbie_metas as $meta){
                    $meta_id = $meta['meta-id'];
                    $meta_nome = $meta['nome'];
                    $meta_descricao = $meta['descricao'];
                    $meta_prazo = $meta['prazo'];
                    $meta_completada = $meta['completada'];

                    include(__DIR__."meta.php");
                }
            ?>
        </div>
    </div>
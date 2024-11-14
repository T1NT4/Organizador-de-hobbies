<div class="container meta">
    <div class="container vertical">
        <h4><?=$meta_nome?></h4>
        <form method="POST">
            <input type="hidden" name="operacao" value="deletar_meta_<?=$meta_id?>">
            <button type="submit"><i class="delete fa-solid fa-trash"></i></button>
        </form>
    </div>
    <p><?=$meta_descricao?></p>
    <?php
        
        $data_real = new DateTime($meta_prazo);
        $data_agora = new DateTime("now");
        
        $diferenca = $data_agora->diff($data_real);

        $tempo = "em $diferenca->days dias";
        
        if($diferenca->days == 0){
            $tempo = "HOJE!";
        }

        $tempoagora = strtotime($data_agora->format("Y-m-d"));
        $tempoprazo =strtotime($data_real->format("Y-m-d"));
        if($tempoprazo < $tempoagora){
            $tempo = "Já passou do prazo :(, foi $diferenca->days dias atrás... ";
        }

        $data_real_real = $data_real->format("d/m/Y");
        $checked = "";

        if($diferenca->days == 1){
            $tempo = str_replace("dias","dia",$tempo);
        }

        if($meta_completada == 'Sim'){
            $checked = "checked";
        }
    ?>
    <p>data limite: <?=$data_real_real?> (<?=$tempo?>)</p>
    <form id="meta-completada-<?=$meta_id?>" method="POST">
        <label for="completada">meta completada?:</label>
        <input onchange="submitform('meta-completada-<?=$meta_id?>')" type="checkbox" name="completada" <?=$checked?>>
        <input type="hidden" name="operacao" value="mudar_completada_<?=$meta_id?>">
    </form>
</div>
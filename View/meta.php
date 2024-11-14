<div class="container">
    <div class="container vertical">
        <h4>$meta_nome</h4><button><i class="fa-solid fa-trash"></i></button>
    </div>
    <p>fazer aquela coisa lá com tal coisa e tal coisado perfavor</p>
    <?php
        $data_real = new DateTime($meta_prazo);
        $data_agora = new DateTime("now");
        $diferenca = $data_agora->diff($data_agora);
        
        $tempo = "em $diferenca->d dias";
        if($diferenca->d == 0){
            $tempo = "HOJE!";
        }

        $data_real_real = $data_real->format("d/m/Y");
    ?>
    <p>data limite: <?=$data_real_real?> (<?=$tempo?>)</p>
    <form id="meta-completada">
        <label for="completada">meta completada?:</label>
        <input onchange="submitform('meta-completada')" type="checkbox" name="completada" value="$meta_completada == 'Sim'">
    </form>
</div>
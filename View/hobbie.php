
    <div class="container hobbie stretch">
        <div class="container vertical">
            <h4><?= $nome_hobbie ?></h4>
            <form method="POST">
                <input type="hidden" name="operacao" value="deletar_hobbie_<?= $id_hobbie ?>">
                <button type="submit"><i class="delete fa-solid fa-trash"></i></button>
            </form>
        </div>
        <p><?= $descricao_hobbie ?></p>
        <form method="POST" id="proficiencia_<?= $id_hobbie ?>" class="stretch">
            <label for="proficiencia">nivel de proficiencia</label>
            <select name="proficiencia" onchange="submitform('proficiencia_<?= $id_hobbie ?>')">
                <option <?php if ($hobbie_proficiencia == "Curioso") {
                    echo "selected";
                } ?> value="Curioso">Curioso</option>
                <option <?php if ($hobbie_proficiencia == "Iniciante") {
                    echo "selected";
                } ?> value="Iniciante">Iniciante
                </option>
                <option <?php if ($hobbie_proficiencia == "Praticante") {
                    echo "selected";
                } ?> value="Praticante">Praticante
                </option>
                <option <?php if ($hobbie_proficiencia == "Avançado") {
                    echo "selected";
                } ?> value="Avançado">Avançado</option>
            </select>
            <input type="hidden" name="operacao" value="mudar_proficiencia_<?= $id_hobbie ?>">
        </form>
        <div class="container vertical">
            <h4>metas do hobby</h4>
            <div class="add"><input type="checkbox" class="criar_meta"><i class="fa-solid fa-plus"></i></div>
        </div>
        <div class="metas-container container">
            <form method="POST" class="container meta">
                <input type="text" placeholder="nome da meta" name="nome">
                <textarea name="descricao"
                    placeholder="descrição da meta, como você ira fazer, instruções, planos, etc..."></textarea>

                <label for="prazo">prazo para completação</label>
                <input type="date" name="prazo">
                <input type="hidden" name="operacao" value="criar_meta_<?= $id_hobbie ?>">
                <button class="submit" type="submit">criar meta</button>
            </form>
            <?php
            foreach ($hobbie_metas as $meta) {
                $meta_id = $meta['id_meta'];
                $meta_nome = $meta['nome'];
                $meta_descricao = $meta['descricao'];
                $meta_prazo = $meta['prazo'];
                $meta_completada = $meta['completada'];

                include __DIR__ . "\meta.php";
            }
            ?>
        </div>
    </div>


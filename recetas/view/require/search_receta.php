<section class='w-50 mb-4'>
    <form method="post" enctype="multipart/form-data" class="d-flex flex-column align-items-center justify-content-center w-100">
        <div class='form-group d-flex justify-content-center align-items-center p-1 mx-2 w-100'>
            <input name="input_search_recipe" class="form-control" type="text" placeholder="Buscar receta" list="recipeList">
            <datalist id="recipeList">
                <?php foreach ($data['recetas'] as $key => $value) { ?>
                    <option value="<?php echo $value['titulo']; ?>" data-id="<?php echo $value['id']; ?>"></option>
                <?php } ?>
            </datalist>
            <button type="submit" name="btn_search_recipe" class="btn btn-secondary rounded-pill px-2 my-1 mx-2"><span class="material-symbols-outlined">
                    search
                </span></button>
        </div>
    </form>
</section>
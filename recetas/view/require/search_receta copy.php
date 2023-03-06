<section class='w-50 mb-4'>
    <form method="post" enctype="multipart/form-data" class="d-flex flex-column align-items-center justify-content-center w-100">
        <div class='d-flex w-50 my-2 w-100'>
            <input name="input_search_recipe" class="form-control" type="text" placeholder="Buscar receta">
            <button type="submit" name="btn_search_recipe" class="btn btn-secondary rounded-pill px-2 my-1 mx-2"><span class="material-symbols-outlined">
search
</span></button>
        </div>
    </form>
</section>

<section class='w-100 my-3'>
                    <div class='form-group d-flex justify-content-center align-items-center p-1 mx-2 w-100'>
                        <input name="input_search_book" class="form-control" type="text" placeholder="Buscar usuario" list="userList">
                        <datalist id="userList">
                            <?php
                            foreach ($data['usuarios'] as $key => $value) {
                                echo "<option value='" . $value['nombre'] . " " . $value['apellidos'] . " - " . $value['id'] . "'>";
                            }
                            ?>
                        </datalist>
                        <button type="submit" name="btn_search_user" class="btn btn-primary rounded-pill px-4 my-1 mx-2">Seleccionar</button>
                    </div>
                </section>
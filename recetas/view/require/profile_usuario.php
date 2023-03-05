<form action="" method="post" class='card w-50 d-flex flex-column text-white align-items-start' style='padding: 1rem'>
    <div class="form-group d-flex justify-content-center align-items-center p-1 mx-2 w-100">
        <label for="username" class="text-dark w-25">Nombre</label>
        <div class="d-flex p-1 justify-content-center align-items-center w-75">
            <input type="text" class="form-control mx-1" name="name" value='<?php echo $data['usuario']['nombre'];
                                                                                ?>'>
        </div>
    </div>

    <div class="form-group d-flex justify-content-center align-items-center p-1 mx-2 w-100">
        <label for="username" class="text-dark w-25">Username</label>
        <div class="d-flex p-1 justify-content-center align-items-center w-75">
            <input type="text" class="form-control mx-1" name="username" value='<?php echo $data['usuario']['usuario'];
                                                                                ?>'>
        </div>
    </div>

    <div class="form-group d-flex justify-content-center align-items-center p-1 mx-2 w-100">
        <label for="username" class="text-dark w-25">Password</label>
        <div class="d-flex p-1 justify-content-center align-items-center w-75">
            <input type="text" class="form-control mx-1" name="password" value='<?php echo $data['usuario']['password'];
                                                                                ?>'>
        </div>
    </div>

    <div class="form-group d-flex justify-content-center align-items-center pb-2 w-100 mt-3">
        <button type="submit" class="btn btn-primary" name="btn_edit_user">Modificar</button>
    </div>
</form>
<table class="table">
    <thead class="thead-light">
        <tr>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    <?php
$i = $data['show_users']-1;
while ($i >= 0 && isset($data['usuarios'][$i])) {
    $value = $data['usuarios'][$i];
?>
    <tr>
        <td><?php echo $value['nombre'] ?></td>
        <td>
            <form method='post'>
                <?php
                if ($value['estado']  == 'Activo') { ?>
                <a href='<?php echo DIRBASEURL . "/usuarios/bloquear/" . $value['id'] ?>' class='btn btn-warning rounded-pill px-4 my-1'>Bloquear</a>
                    <button type='submit' name='edit' class='btn btn-primary rounded-pill px-4 my-1'>Editar</button>
                    <input type='hidden' name='edit_hidden' value='<?php echo $value['id'] ?>'>
                <?php
                } else { ?>
                <a href='<?php echo DIRBASEURL . "/usuarios/desbloquear/" . $value['id'] ?>' class='btn btn-success rounded-pill px-4 my-1'>Desbloquear</a>
                <?php
                }
                ?>
                <button type='submit' name='delete' class='btn btn-danger rounded-pill px-4 my-1'>Eliminar</button>
                <input type='hidden' name='edit_hidden' value='<?php echo $value['id'] ?>'>
            </form>
        </td>
    </tr>
<?php
    $i--;
}
?>
    </tbody>
</table>
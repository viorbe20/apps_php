<section class='d-flex flex-column align-items-center' style='margin: 3rem'>
<table class="table">
    <thead class="thead-light">
        <tr>
            <th>Título</th>
            <th>Autor</th>
            <th>Editorial</th>
            <th>Disponible</th>
            <?php if ($_SESSION['user']['profile'] == 'employee') { ?>
                <th>Acciones</th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
        <?php
        if (isset($data['obras_prestamos'])) {

            //print_r($data['obras_prestamos']);

            foreach ($data['obras_prestamos'] as $key => $value) { ?>
                <tr>
                    <td><?php echo $value['titulo'] ?></td>
                    <td><?php echo $value['apellidos_autor']. ", " .$value['nombre_autor']?></td>
                    <td><?php echo $value['editorial'] ?></td>
                    <td><?php echo $value['estado_prestamo'] == 1 ? "En préstamo" : "Disponible"  ?></td>
                    <?php if ($_SESSION['user']['profile'] == 'employee') { ?>
                <td>
                    <a href="<?php echo DIRBASEURL; ?>/obras/prestar/<?php echo $value['id'] ?>" class="btn btn-success">Prestar</a>
                    <a href="<?php echo DIRBASEURL; ?>/obras/editar/<?php echo $value['id'] ?>" class="btn btn-primary">Editar</a>
                    <a href="<?php echo DIRBASEURL; ?>/obras/eliminar/<?php echo $value['id'] ?>" class="btn btn-danger">Eliminar</a>
                </td>
            <?php } ?>
                </tr>
        <?php
            }
        }
        ?>

    </tbody>
</table>
<section>
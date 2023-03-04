<section class='d-flex flex-column align-items-center' style='margin-left: 2rem; margin-right: 2rem'>
<h4 class='card d-flex text-center py-2 my-2 text-secondary bg-light w-25'>Obras</h4>
<table class="table">
    <thead class="thead-light">
        <tr>
            <th>Título</th>
            <th>Autor</th>
            <th>Editorial</th>
            <th>Disponible</th>
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
                </tr>
        <?php
            }
        }
        ?>

    </tbody>
</table>
<section>
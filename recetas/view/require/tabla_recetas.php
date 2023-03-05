<table class="table">
            <thead class="thead-light">
                <tr>
                    <th>Imagen</th>
                    <th>Título</th>
                    <th>Etiquetas</th>
                    <th>Colaborador</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php

                foreach ($data['recetas'] as $key => $value) { ?>
                    <tr>
                        <td class='' width='15%'><img src="<?php echo DIRBASE ?>/assets/img/<?php echo $value['imagen'] ?>" width='100%' height='100%'></td>
                        <td><?php echo $value['titulo'] ?></td>
                        <td><?php echo $value['etiquetas'] ?></td>
                        <td><?php echo $value['cuenta'] ?></td>
                        <td>
                            <?php
                            if($_SESSION['user']['profile'] == 'User'){?>
                                <form method='post'>
                                <button  type='submit' name='votar' class='btn btn-primary rounded-pill px-4 my-1'>Votar</button>
                                <input type='hidden' name='votar_hidden' value='<?php echo $value['id'] ?>'>
                                <button  type='submit'  name='recomendar' class='btn btn-warning rounded-pill px-4 my-1'>Recomendar</button>
                                <input type='hidden' name='recomendar_hidden' value='<?php echo $value['id'] ?>'>
                                <button  type='submit' name='favorita' class='btn btn-success rounded-pill px-4 my-1'>Favorita</button>
                                <input type='hidden' name='favorita_hidden' value='<?php echo $value['id'] ?>'>    
                            </form>
                            <?php
                            }
                            ?>
                        </td>
                    </tr>
                <?php
                }
                ?>

            </tbody>
        </table>
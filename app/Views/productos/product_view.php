<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product List</title>
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/style.css">
</head>

<body>
    <a class="css-boton boton-exito" href="<?= base_url('/product/add_new') ?>">Add New</a>
    <table>
        <thead>
            <tr>
                <th><input class="cha" id="selectAll" type="checkbox"><label for='selectAll'>Todos</label></th>
                <!-- <th>Id</th>
                <th>Name</th>
                <th>Price</th> -->
                <th>Crear</th>
                <th>editar</th>
                <th>Eliminar</th>
                <th>Action</th>
            </tr>
        </thead>
        <!-- <tbody > Solución con php
            <?php $i = 0;
            foreach ($product as $row) : ?>
                <tr>
                    la clase de chall es para obtener todos los que tienen esa clase
                    <td><input class="chall ch-<?= $row['product_id']; ?>" id="nivel[0]-<?= $i ?>" type="checkbox"  /></td>
                    <td onclick="check(<?= $row['product_id']; ?>)"><?= $row['product_id']; ?></td>
                    <td><?= $row['product_name']; ?></td>
                    <td><?= $row['product_price']; ?></td>
                    <td><input class="chall ch<?= $row['product_id']; ?>" id="nivel[0][0]-<?= $i ?>" type="checkbox"  /></td>
                    <td><input class="chall ch<?= $row['product_id']; ?>" id="nivel[0][1]-<?= $i ?>" type="checkbox"  /></td>
                    <td><input class="chall ch<?= $row['product_id']; ?>" id="nivel[0][2]-<?= $i ?>" type="checkbox"  /></td>
                    <td>
                        <a class="css-boton boton-primario" href="<?= base_url() ?>/product/edit/<?= $row['product_id']; ?>">Edit</a>
                        <a class="css-boton boton-advertencia" href="<?= base_url() ?>/product/delete/<?= $row['product_id']; ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody> -->
        <tbody id="tabla_tbody">

        </tbody>
    </table>
               
</body>
<script>
         var url = "<?= base_url() ?>/";
</script>
<script src="<?= base_url() ?>/assets/js/jquery.min.js"></script>
<script src="<?= base_url() ?>/assets/js/product.js"></script>

</html>

    

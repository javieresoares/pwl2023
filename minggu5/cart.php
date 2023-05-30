<?php 
//Mulai session

session_start();
//include "list-produk.php";

include "aksi.php";
include "form-input.php";

?>

<!-- Tampilkan cart -->
<h3>Shopping cart</h3>

<a href="cart.php?action=deleteall">Kosongkan cart</a>
<table>
    <tr>
        <th>id</th>
        <th>Nama Produk</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Total Harga</th>
        <th>Aksi</th>
    </tr>
    <?php
    if(!empty($_SESSION["cart"])) {
        $total = 0;
        foreach($_SESSION["cart"] as $key => $value) {
        ?>
        <tr>
            <td><?php echo $value["product_id"]; ?></td>
            <td><?php echo $value["product_name"]; ?></td>
            <td><?php echo $value["product_price"]; ?></td>
            <td><?php echo $value["item_quantity"]; ?></td>
            <td><?php echo number_format($value["product_price"] * $value["item_quantity"], 0);?></td>
            <td><a href="cart.php?action=delete&id=<?php echo $value["product_id"]; ?>">Hapus</a></td>
        </tr>
        <?php
        $total = $total + ($value["product_price"] * $value["item_quantity"]);
        }
        ?>
        <tr>
            <td colspan="3" align="right">Total</td>
            <td align="right"><?php echo number_format($total, 0); ?></td>
            <td></td>
        </tr>
        <?php
    } else {
        ?>
        <tr>
            <td colspan="5" align="center">Cart masih kosong</td>
        </tr>
        <?php
    }
    ?>
</table>
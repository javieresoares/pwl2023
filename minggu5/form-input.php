<!-- Tampilkan produk -->
<?php include "list-produk.php"; ?>

<table>
    <tr>
        <th>Nama Produk</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Aksi</th>
    </tr>
    <?php foreach($products as $product): ?>
    <tr>
        <td><?php echo $product["name"]; ?></td>
        <td><?php echo $product["price"]; ?></td>
        <form method="post">
        <td>
            <input type="number" name="quantity" value="1" min="1" max="10">
            <input type="hidden" name="id" value="<?php echo $product["id"]; ?>">
            <input type="hidden" name="name" value="<?php echo $product["name"]; ?>">
            <input type="hidden" name="price" value="<?php echo $product["price"]; ?>">
        </td>
        <td>
            <input type="submit" name="add_to_cart" value="Tambah ke Cart">
        </td>
        </form>
    </tr>
    <?php endforeach; ?>
</table>
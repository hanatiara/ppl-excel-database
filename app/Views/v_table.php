<div class="h-100">
<div class="container w-100">
<table border="1" cellpadding="2" cellspacing="2" class="table table-striped">
        <tr>
            <th>Id Barang</th>
            <th>Nama Barang</th>
            <th>Harga Barang</th>
            <th>Stok</th>
        </tr>
        <?php foreach ($data as $value => $row) :?>
        <tr>
            <td class="align-middle"><?= $row['id_barang']; ?></td>
            <td class="align-middle"><?= $row['nama_barang']; ?></td>
            <td class="align-middle"><?= $row['stok']; ?></td>
            <td class="align-middle"><?= $row['harga']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
</div>
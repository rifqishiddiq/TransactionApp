<!DOCTYPE html>
<html lang="en">

<head>
    <title>RIF SHOP</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
<center>
    <br><br><br><br><br><br><br><br>
    <form method="post" action="transaksi.php">
    <table border="1" width="500">
        <tr>
            <td colspan="3" align="center"><h2>FORM PEMBELIAN</h2></td>
        </tr>
        <tr align="center">
            <td style="width: 300px"><b>NAMA PRODUK</b></td>
            <td style="width: 140px"><b>HARGA</b></td>
            <td style="width: 60px"><b>QTY</b></td>
        </tr>

        <?php
            include 'config.php'; 
            $sql='SELECT * FROM items'; 
            $query=mysqli_query($conn, $sql); 
            while ($row = mysqli_fetch_array($query)){ 
            ?> 
            <tr>
                <td><?php echo $row['nama']; ?></td> 
                <td> Rp. <?php echo number_format((float)$row['harga'], 0); ?></td> 
                <td>
                    <input type="number" name="qty[]" style="width: 60px" value="" />
                </td> 
                <input type="hidden" name="nama[]" value=" <?php echo $row['nama']; ?> " />
                <input type="hidden" name="harga[]" value=" <?php echo $row['harga']; ?> " />            
            </tr>
        <?php } ?>
 
        <tr>
            <td colspan="3" align="center" style="padding: 5px 0;">
                <button type="submit" name="submit" value="" style="width: 60px;">beli</button>
            </td>
        </tr>
    </table>
    </form>
</center>
</body>
</html>
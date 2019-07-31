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
    <div style="padding-right: 447px; padding-bottom: 2px">
        <a href="index.php">
            <button type="back">BACK</button>
        </a>
    </div>
    <form method="post" target="_blank()" action="export_to_pdf.php">
    <table border="1" width="500">
        <tr>
            <td colspan="4" align="center"><h2>TRANSAKSI</h2></td>
        </tr>

        <tr align="center">
            <td><b>Nama produk</b></td>
            <td><b>Harga</b></td>
            <td><b>Quantity</b></td>
            <td><b>Sub Total</b></td>
        </tr>

        <?php
            $total=0;
            $subtotal=0;
            $totqty=0;
            $jumlah_produk = count($_POST["nama"]); 
            for($i=0;$i<$jumlah_produk;$i++)
            {
                $qty=$_POST["qty"][$i];
                $nama=$_POST["nama"][$i];
                $harga=(float)$_POST["harga"][$i];
                if($qty!=0)
                {
                    $subtotal=(float)$harga*$qty;
                    echo "<tr>
                            <td>$nama</td>
                            <td>Rp. ". number_format($harga, 0) ."</td>
                            <td>$qty</td>
                            <td>Rp. ". number_format($subtotal, 0) ."</td>
                         </tr>";
                         $totqty= $qty + $totqty;
                         $total= $total + $subtotal;
                         ?>
                        <input type="hidden" name="nama[]" value=" <?php echo $nama; ?> " />
                        <input type="hidden" name="harga[]" value=" <?php echo $harga; ?> " />
                        <input type="hidden" name="qty[]" value=" <?php echo $qty; ?> " />
                        <input type="hidden" name="subtotal[]" value=" <?php echo $subtotal; ?> " />
                <?php        
               }
            }
        ?>

        <tr>
            <td colspan="3" align="right"><b>Total</b></td>
            <!-- <td><?php echo number_format($totqty, 0); ?></td> -->
            <td><b>Rp. <?php echo number_format($total, 0); ?></b></td>
        </tr>

        <tr>
            <td colspan="4" align="center">Terima Kasih Atas Kunjungannya</td>
        </tr>
    </table>

    <input type="hidden" name="totqty" value=" <?php echo $totqty; ?> " />
    <input type="hidden" name="total" value=" <?php echo $total; ?> " />
    <div align="center" style="padding-top: 2px">
        <button type="submit">CETAK</button>
    </form>
    </div>
</center>
</body>
</html>
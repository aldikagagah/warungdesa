<?php 
    include'db.php';
    $kontak = mysqli_query($conn, "SELECT admin_telp, admin_gmail, admin_address FROM tb_admin
        WHERE admin_id = 1 ");
    $a = mysqli_fetch_object($kontak);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Depan | warungdesa</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <header>
    <!-- header -->
    <div class="container">
        <h1><a href="index.php">warungdesa</a></h1>
      <ul>
        <li><a href="produk.php">Produk</a></li>
      </ul>
      </div>
  </header>
     <!-- Bagian Search -->
      <div class="search">
        <div class="container">
          <form action="produk.php">
            <input type="text" name="search" placeholder="cari produk">
            <input type="submit" name="cari" value="cari produk">
          </form>
        </div>
      </div>

       <!-- new produk -->
        <div class="section">
          <div class="container">
            <h3>Produk</h3>
            <div class="box">
              <?php 
              $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_status = 1 ORDER BY product_id 
                      DESC LIMIT 8");
              if(mysqli_num_rows($produk) > 0){
                while($p = mysqli_fetch_array($produk)){
              ?>
                <a href="detail-produk.php?id=<?php echo $p['product_id'] ?>">
                <div class="col-4">
                  <img src="produk/<?php echo $p['product_image'] ?>">
                  <p class="nama"><?php echo $p['product_name'] ?></p>
                  <p class="harga">Rp. <?php echo $p['product_price'] ?></p>
                </div>
                </a>
                <?php }}else{ ?>
                <p>Produk Tidak Ada</p>
               <?php } ?>
            </div>
          </div>
        </div>

        <!-- Footer -->
         <div class="footer">
          <div class="container">
            <h4>Alamat</h4>
            <p><?php echo $a->admin_address ?></p>
            <h4>Email</h4>
            <p><?php echo $a->admin_gmail ?></p>
            <h4>No. Hp</h4>
            <p><?php echo $a->admin_telp ?></p>
            <small>Copyright &copy;2024 - warungdesa</small>
          </div>
         </div>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <title>Table Sistem Percetakan</title>
    <style>
        body {font-family: tahoma, arial;}
        table {border-collapse: collapse;}
        th, td {font-size: 13px; border: 1px solid #DEDEDE; padding: 3px 5px; color: #303030;}
        th {background: #CCCCCC; font-size: 12px; border-color: #B0B0B0;}
        .container {display: flex; flex-wrap: wrap; justify-content: space-between;}
        .table-wrapper {flex: 1 1 calc(50% - 10px); margin-bottom: 20px;}
        .header {display: flex; align-items: center; margin-bottom: 20px;}
        .header img {width: 100px; height: auto; margin-right: 20px;}
    </style>
</head>
<body>
    <div class="header">
        <img src="print.jpg" alt="Logo Percetakan">
        <h1>Sistem Percetakan</h1>
    </div>

    <div class="container">
        <div class="table-wrapper">
            <h3>Tabel Pelanggan</h3>
            <table>
                <thead>
                    <tr>
                        <th>ID Pelanggan</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Tanggal Lahir</th>
                        <th>Nomor Telepon</th>
                    </tr>
                </thead>
                <?php
                include 'koneksi.php';        
                $sql = 'SELECT * FROM Pelanggan';
                $query = mysqli_query($koneksi, $sql);        
                while ($row = mysqli_fetch_array($query)) {
                    ?>
                    <tbody>
                        <tr>
                            <td><?php echo $row['ID_Pelanggan']; ?></td>
                            <td><?php echo $row['Nama']; ?></td>
                            <td><?php echo $row['Alamat']; ?></td>
                            <td><?php echo $row['Tanggal_Lahir']; ?></td>
                            <td><?php echo $row['Nomor_Telepon']; ?></td>
                        </tr>
                    </tbody>
                    <?php
                }
                ?>
            </table>
        </div>

        <div class="table-wrapper">
            <h3>Tabel Pegawai</h3>
            <table>
                <thead>
                    <tr>
                        <th>ID Pegawai</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Nomor Telepon</th>
                    </tr>
                </thead>
                <?php
                $sql = 'SELECT * FROM Pegawai';
                $query = mysqli_query($koneksi, $sql);        
                while ($row = mysqli_fetch_array($query)) {
                    ?>
                    <tbody>
                        <tr>
                            <td><?php echo $row['ID_Pegawai']; ?></td>
                            <td><?php echo $row['Nama']; ?></td>
                            <td><?php echo $row['Jabatan']; ?></td>
                            <td><?php echo $row['Nomor_Telepon']; ?></td>
                        </tr>
                    </tbody>
                    <?php
                }
                ?>
            </table>
        </div>

        <div class="table-wrapper">
            <h3>Tabel Keanggotaan</h3>
            <table>
                <thead>
                    <tr>
                        <th>ID Keanggotaan</th>
                        <th>ID Pelanggan</th>
                        <th>Nama Keanggotaan</th>
                        <th>Tanggal Bergabung</th>
                    </tr>
                </thead>
                <?php
                $sql = 'SELECT * FROM Keanggotaan';
                $query = mysqli_query($koneksi, $sql);        
                while ($row = mysqli_fetch_array($query)) {
                    ?>
                    <tbody>
                        <tr>
                            <td><?php echo $row['ID_Keanggotaan']; ?></td>
                            <td><?php echo $row['ID_Pelanggan']; ?></td>
                            <td><?php echo $row['Nama_Keanggotaan']; ?></td>
                            <td><?php echo $row['Tanggal_Bergabung']; ?></td>
                        </tr>
                    </tbody>
                    <?php
                }
                ?>
            </table>
        </div>

        <div class="table-wrapper">
            <h3>Tabel Layanan</h3>
            <table>
                <thead>
                    <tr>
                        <th>Nama_Layanan</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <?php
                $sql = 'SELECT * FROM Layanan';
                $query = mysqli_query($koneksi, $sql);        
                while ($row = mysqli_fetch_array($query)) {
                    ?>
                    <tbody>
                        <tr>
                            <td><?php echo $row['Nama_Layanan']; ?></td>
                            <td><?php echo $row['Harga']; ?></td>
                        </tr>
                    </tbody>
                    <?php
                }
                ?>
            </table>
        </div>


        <div class="table-wrapper">
            <h3>Tabel Pesanan</h3>
            <table>
                <thead>
                    <tr>
                        <th>ID Pesanan</th>
                        <th>ID Pelanggan</th>
                        <th>ID Pegawai</th>
                        <th>Tanggal Pesanan</th>
                        <th>Total Biaya</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <?php
                $sql = 'SELECT * FROM Pesanan';
                $query = mysqli_query($koneksi, $sql);        
                while ($row = mysqli_fetch_array($query)) {
                    ?>
                    <tbody>
                        <tr>
                            <td><?php echo $row['ID_Pesanan']; ?></td>
                            <td><?php echo $row['ID_Pelanggan']; ?></td>
                            <td><?php echo $row['ID_Pegawai']; ?></td>
                            <td><?php echo $row['Tanggal_Pesanan']; ?></td>
                            <td><?php echo $row['Total_Biaya']; ?></td>
                            <td><?php echo $row['Status']; ?></td>
                        </tr>
                    </tbody>
                    <?php
                }
                ?>
            </table>
        </div>

        <div class="table-wrapper">
            <h3>Tabel Detail Pesanan</h3>
            <table>
                <thead>
                    <tr>
                        <th>ID Pesanan</th>
                        <th>ID Layanan</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <?php
                $sql = 'SELECT * FROM Detail_Pesanan';
                $query = mysqli_query($koneksi, $sql);        
                while ($row = mysqli_fetch_array($query)) {
                    ?>
                    <tbody>
                        <tr>
                            <td><?php echo $row['ID_Pesanan']; ?></td>
                            <td><?php echo $row['ID_Layanan']; ?></td>
                            <td><?php echo $row['Jumlah']; ?></td>
                        </tr>
                    </tbody>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>
</body>
</html>

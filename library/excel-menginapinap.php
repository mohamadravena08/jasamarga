<?php 
include "../config/koneksi.php";
include "../config/fungsi_rupiah.php";
$iduser=@$_SESSION['iduser'];
$user = @$_SESSION['namauser'];


$sql1 = "SELECT * 
FROM ps2016_member
JOIN ps2016_menginap ON ps2016_member.id = ps2016_menginap.id_user";
$check1 = mysqli_query($con,$sql1);
date_default_timezone_set('Asia/Jakarta');
$catch = date("Y-m-d H:i:s");
$date = date("j F Y H.i.s", strtotime($catch)); 
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/x-msdownload");
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=Rekap Data Penginapan - Update ".$date." WIB - PSN2016.xls");
header("Pragma : no-cache");
header("Expires :0"); $i=0;
?>
    <p>Semua Data Penginapan</p>
    <table border="1">
        <?php while ($container = mysqli_fetch_assoc($check1)) { $iduser=$container['id'];
        $idpesan=$container['id_pesan']?>
            <tbody>
                <strong>
                <tr>
                    <td>
                        <?php echo $container['nama_sekolah'];?>
                    </td>
                    <td>
                        <?php echo "'".$container['va_bayar'];?>
                    </td>
                    <td>
                        Tipe <?php echo $container['tipe'];?>
                    </td>
                    <td>
                        <?php echo $container['L']?> laki-laki</td>
                    <td>
                        <?php echo $container['P']?> perempuan</td>
                    <td>
                        <?php echo $container['hari_menginap'];?> malam
                    </td>
                    <td>
                        <?php echo $container['tanggal'];?>
                    </td>
                    <td>
                        <?php echo rupiah($container['total_harga']);?>
                    </td>
                </tr>
</strong>
                    <?php $penginaps=mysqli_query($con,"select * from ps2016_detailmenginap where pesan_id='$idpesan'");
        $no=0;
        while($penginap=mysqli_fetch_assoc($penginaps)){$no++;?>
                        <tr>
                            <td>
                                <?php echo $penginap['nama_orang']?>
                            </td>
                            <td>
                                <?php echo $penginap['jenis_kelamin']?>
                            </td>
                            <td>
                                <?php echo $penginap['status']?>
                            </td>
                        </tr>
                        <?php }} ?>
            </tbody>
    </table>
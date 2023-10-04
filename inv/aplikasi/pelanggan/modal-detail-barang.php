<?php
    include '../../koneksi/koneksi.php';
    $id_barang = $_GET['id_barang'];
    $sql = mysqli_query($koneksi,"SELECT * from tb_barang b inner join tb_user u on b.id_user=u.id_user inner join tb_kondisi_barang k on b.id_kondisi_barang=k.id_kondisi_barang inner join tb_ruangan r on b.id_ruangan=r.id_ruangan inner join tb_jenis_barang j on b.id_jenis_barang=j.id_jenis_barang inner join tb_artikel a on b.id_artikel=a.id_artikel inner join tb_detail_gambar g on b.id_barang=g.id_lain where b.id_barang='$id_barang' group by b.id_barang");
    while($row=mysqli_fetch_array($sql)){
?>

<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Detail Produk</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <div class="col-lg-12" align="center">
                    <img src="../assets/all/image/<?php echo $row['file_gambar']; ?>" width='180' height='180'>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-6 control-label">Nama Produk</label>
                <div class="col-lg-12">
                    <input class="form-control" type="text" readonly name="id_banner" value="<?php echo $row['nama_barang']; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">Jenis Produk</label>
                <div class="col-lg-12">
                    <input class="form-control" type="text" readonly name="id_banner" value="<?php echo $row['nama_jenis_barang']; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">Ruangan</label>
                <div class="col-lg-12">
                    <input class="form-control" type="text" readonly name="id_banner" value="<?php echo $row['nama_ruangan']; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-5 control-label">Bahan</label>
                <div class="col-lg-12">
                    <input class="form-control" type="text" readonly name="id_banner" value="<?php echo $row['bahan_barang']; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-5 control-label">Lebar</label>
                <div class="col-lg-12">
                    <input class="form-control" type="text" readonly name="id_banner" value="<?php echo $row['lebar_barang']; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">Tinggi</label>
                <div class="col-lg-12">
                    <input class="form-control" type="text" readonly name="id_banner" value="<?php echo $row['tinggi_barang']; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">Berat</label>
                <div class="col-lg-12">
                    <input class="form-control" type="text" readonly name="id_banner" value="<?php echo $row['berat_barang']; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-5 control-label">Stok Produk</label>
                <div class="col-lg-12">
                    <input class="form-control" type="text" readonly name="id_banner" value="<?php echo $row['stok_barang']; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">Harga</label>
                <div class="col-lg-12">
                    <input class="form-control" type="text" readonly name="id_banner" value="<?php echo $row['harga_barang']; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-6 control-label">Kondisi Produk</label>
                <div class="col-lg-12">
                    <input class="form-control" type="text" readonly name="id_banner" value="<?php echo $row['nama_kondisi_barang']; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-5 control-label">Tanggal Masuk</label>
                <div class="col-lg-12">
                    <input class="form-control" type="text" readonly name="id_banner" value="<?php echo $row['tgl_masuk_barang']; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">Publikasi</label>
                <div class="col-lg-12">
                    <input class="form-control" type="text" readonly name="id_banner" value="<?php echo $row['nama_user']; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-5 control-label">Deskripsi</label>
                <div class="col-lg-12">
                    <textarea class="form-control" type="text" readonly name="id_banner" value="<?php echo $row['keterangan_barang']; ?>"><?php echo $row['keterangan_barang']; ?></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" data-dismiss="modal" aria-hidden="true">Keluar</button>
            </div>
        </div>
    </div>
</div>
    <?php
    }
?>

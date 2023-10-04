<?php
    include '../../koneksi/koneksi.php';
    $id_user = $_GET['id_user'];
    $sql = mysqli_query($koneksi,"SELECT * from tb_user u inner join tb_hak_akses h on u.id_hak_akses=h.id_hak_akses inner join tb_jenis_kelamin k on u.id_jenis_kelamin=k.id_jenis_kelamin inner join tb_status s on u.id_status=s.id_status inner join tb_detail_gambar g on u.id_user=g.id_lain where u.id_user='$id_user'");
    
    while($row=mysqli_fetch_array($sql)){
?>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Detail Profile</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <div class="col-lg-12" align="center">
                    <img src="../assets/all/image/<?php echo $row['file_gambar']; ?>" width="150px">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-12 control-label">NIP Administator</label>
                <div class="col-lg-12">
                    <input class="form-control" type="text" readonly name="id_banner" value="<?php echo $row['nip_user']; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-12 control-label">Nama Administator</label>
                <div class="col-lg-12">
                    <input class="form-control" type="text" readonly name="id_banner" value="<?php echo $row['nama_user']; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-5 control-label">Jenis Kelamin</label>
                <div class="col-lg-12">
                    <input class="form-control" type="text" readonly name="id_banner" 
                    value="<?php if($row['id_jenis_kelamin']=='JK0001'){
                        echo "Laki-Laki";
                    }else if($row['id_jenis_kelamin']=='JK0002'){
                        echo "Perempuan";
                    }else{echo "Error";}
                    ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-5 control-label">Status</label>
                <div class="col-lg-12">
                    <input class="form-control" type="text" readonly name="id_banner" 
                    value="<?php if($row['id_status']=='ST0001'){
                        echo "Single";
                    }else if($row['id_status']=='ST0002'){
                        echo "Menikah";
                    }else{echo "Error";}
                    ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-5 control-label">Alamat</label>
                <div class="col-lg-12">
                    <input class="form-control" type="text" readonly name="id_banner" value="<?php echo $row['alamat_user']; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">Email</label>
                <div class="col-lg-12">
                    <input class="form-control" type="text" readonly name="id_banner" value="<?php echo $row['email_user']; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">Telepon</label>
                <div class="col-lg-12">
                    <input class="form-control" type="text" readonly name="id_banner" value="<?php echo $row['telp_user']; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-5 control-label">Tanggal Lahir</label>
                <div class="col-lg-12">
                    <input class="form-control" type="text" readonly name="id_banner" value="<?php echo $row['ttl_user']; ?>">
                </div>
            </div>
            <div class="modal-footer">
                <a href="../../forget-pass.php" class="btn btn-warning" data-dismiss="modal" aria-hidden="true">Lupa Password?</a>
                <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Keluar</button>
            </div>
        </div>
    </div>
</div>
    <?php
    }
?>

<style type="text/css">
	
.zonne{
    margin:5px auto;
    height: 200px;
    padding:5px;
    border: 1px solid #9e9e9e;
    z-index: 12;
    overflow-y: scroll;
  }
  .upload input.btn-file{
    position: absolute;
    width: 100px;
    top: -3px;
    left: -3px;
    cursor: pointer;
    opacity: 0;
    background-color: #fff;
    height: 100px;
  }
  .m-img {
  float: left;
  display: flex;
  cursor: pointer;
  margin:10px;
  }
  div.upload{
    display: flex;
    cursor: pointer;
    width: 100px;
    height: 100px;
    position: relative;
    overflow: hidden;
    margin: 20px;
    display: inline-block;
    padding: 18px 33px;
    border: 3px solid #909090;
    font-size: 50px;
    border-style: dashed;
    color: #909090;
    border-radius: 5px;
  }
    div.upload > span{
      margin:0;
    }
  .product-image{
    width: 100px;
    height: 100px;
    border-radius: 10px;
    margin: 10px;
    margin-right: 17px;
    box-shadow: 0px 0px 10px 2px #707070;
  }
  .remove {
  color: rgb(255, 0, 0);
  background: white;
  cursor: pointer;
  height: 25px;
  border-radius: 30px;
  margin-top: 15px;
  margin-left: -50px;
  }
  .fa-remove{
    color: rgb(255, 0, 0);
    font-size: 15px;
    padding: 5px 7px;

  }
  #output-image{
    text-align: center;
    width:150px;
    height:150px;
    border: 1px solid grey;
    border-radius: 160px;
  }
  input[type="file"]{
    display:none;
  }
</style>

<div class="col-md-12">
	<div class="zonne">
		<div id="preview">
		<?php
			include '../../koneksi/koneksi.php';
			$kode = 'B';
            $query = mysqli_query($koneksi,"SELECT MAX(id_barang) as idnew FROM tb_barang");
            $row = mysqli_fetch_array($query);

			$max_id = $row['idnew'];
            $max_ids = (int) substr($max_id,3,3);
            $id_berita = $max_ids+1;
            echo $auto = $kode.sprintf("%05s", $id_berita);

			$query = mysqli_query($koneksi,"SELECT * FROM tb_detail_gambar WHERE id_barang = '$auto' ORDER BY id_gambar DESC ");
			$rows = mysqli_num_rows($query);

			if($rows > 0){
				while($data = mysqli_fetch_array($query)){?>
					<span class="m-img"><img src="../assets/all/image/<?php echo $data["file_gambar"];?>" class="product-image"/>
					<a onclick="deleteImage(<?php echo $data['id_gambar']; ?>)" class="remove"><i class="fa fa-remove"></i></a>
					</span>
				<?php }
			}else{
				$output = 'upload image';
			}
		?>
		</div>
		<div class="upload">
			<span>+
				<input type="file" class="btn-file" name="multiple_files" id="multiple_files" multiple / style="display:block">
			</span>
		</div>
	</div>
</div>
<script src="../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../assets/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../assets/js/demo/datatables-demo.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
			 $('#multiple_files').change(function(){
			  var error_images = '';
			  var form_data = new FormData();
			  var files = $('#multiple_files')[0].files;
			  if(files.length > 10)
			  {
			   error_images += 'You can not select more than 10 files';
			  }
			  else
			  {
			   for(var i=0; i<files.length; i++)
			   {
			    var name = document.getElementById("multiple_files").files[i].name;
			    var ext = name.split('.').pop().toLowerCase();
			    if(jQuery.inArray(ext, ['png','jpg','jpeg']) == -1)
			    {
			     error_images += 'Invalid type file';
			    }
			    var oFReader = new FileReader();
			    oFReader.readAsDataURL(document.getElementById("multiple_files").files[i]);
			    var f = document.getElementById("multiple_files").files[i];
			    var fsize = f.size||f.fileSize;
			    if(fsize > 2000000)
			    {
			     error_images += 'File Size is very big';
			    }
			    else
			    {
			     form_data.append("file[]",document.getElementById('multiple_files').files[i]);
			    }
			   }
			  }
			  if(error_images == '')
			  {
			   $.ajax({
			    url:"upload.php?barang=<?php echo $auto;?>",
			    method:"POST",
			    data: form_data,
			    contentType: false,
			    cache: false,
			    processData: false,
			    success:function(data)
			    {
			     $('#preview').load('oke.php?id=<?php echo $max_id; ?>'+' #preview');
			    }
			   });
			  }
			  else
			  {
			   alert(error_images);
			   return false;
			  }
			 });
			});


	function deleteImage(id_gambar) {
				$.ajax({
						url: "delete.php",
						type: "GET",
						data:{id_gambar:id_gambar},
						success: function () {
							$('#preview').load('oke.php?id_gambar=<?php echo $max_id; ?>'+' #preview');
						}
				});
			}

</script>
							 
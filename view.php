<?php
if(!isset($_SESSION['id_admin'])) {
   header('location: ../');
}

$id = strip_tags(mysqli_real_escape_string($con, $_GET['id']));
$sql = $con->prepare("SELECT * FROM t_kandidat WHERE id_kandidat = ?") or die($con->error);
$sql->bind_param('i', $id);
$sql->execute();
$sql->store_result();
$sql->bind_result($id, $nama, $foto, $visi, $misi, $suara, $periode);
$sql->fetch();
?>
<h3>Detail Kandidat</h3>
<hr />
<div class="row">
   <div class="col-md-3">
      <div class="callout text-center">
         <img src="../assets/img/kandidat/<?php echo $foto; ?>" alt="<?php echo $foto; ?>" class="img-responsive">
      </div>
   </div>
   <div class="col-md-9" style="padding-top:20px;">
      <table class="table table-striped">
         <tbody>
            <tr>
               <td width="150">Nomor Kandidat</td>
               <td>: <?php echo $nama; ?></td>
            </tr>
            <tr>
               <td>Visi</td>
               <td>: <?php echo $visi; ?></td>
            </tr>
            <tr>
               <td>Misi</td>
               <td>: <?php echo $misi; ?></td>
            </tr>
            <tr>
               <td>Jumlah Suara</td>
               <td>: <?php echo $suara; ?></td>
            </tr>
            <tr>
               <td>Periode</td>
               <td>: <?php echo $periode; ?></td>
            </tr>
         </tbody>
      </table>
   </div>
   <div class="col-md-9 col-md-offset-3">
        <a href="?page=kandidat&action=edit&id=<?php echo $id; ?>" class="btn btn-warning">Edit</a>
        <a href="?page=kandidat" class="btn btn-danger">Kembali</a>
   </div>
</div>

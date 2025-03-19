<script language="javascript">
function simpanjenisproduk()
{
	var NamaJenis=$('#NamaJenis').val();
	if(NamaJenis=="")
	{
		alert("Nama jenis masih kosong...");
		$('#NamaJenis').focus();
		return false;	
	}	
	
	var Keterangan=$('#Keterangan').val();
	if(Keterangan=="")
	{
		alert("Keterangan masih kosong...");
		$('#Keterangan').focus();
		return false;	
	}
	
	$('#formjenisproduk').submit();
	
		
}
</script>
<div class="card mb-4">
    <div class="card-header bg-primary text-white">
   Form Data Jenis Produk
    </div>
     <div class="card-body"> 


<?php
	$pesan=$this->session->flashdata('pesan');
	if ($pesan=="")
	{
		echo "";	
	}
	else
	{

	?>
	
	<div class="alert alert-success alert-dismissible fade show" role="alert">
   <button type="button" class="btn btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close">
  </button>
	<?php echo $pesan; ?>                        
	</div>
	
	<?php
	}
	?>





<form name="formjenisproduk" id="formjenisproduk" method="post" action="<?php echo base_url('jenisproduk/simpandata') ?>">
<input type="hidden" name="KodeJenisProduk" id="KodeJenisProduk"/>

<div class="form-group">
<div class="row mb-3">
    <div class="col-sm-2">
       Masukkan Nama Jenis
    </div>
    <div class="col-sm-10">
       <input type="text" name="NamaJenis" id="NamaJenis" class="form-control"/>
    </div>
</div>
</div>

<div class="form-group">
<div class="row mb-3">
    <div class="col-sm-2">
       Keterangan
    </div>
    <div class="col-sm-10">
       <textarea name="Keterangan"  id="Keterangan" class="form-control" rows="3"></textarea>
    </div>
</div>
</div>



<div class="form-group">
<div class="row mb-3">
    <div class="col-sm-2">
        
    </div>
    <div class="col-sm-10">
       <input type="button" value="Simpan" class="btn btn-primary btn-sm" onClick="simpanjenisproduk();">
       <input type="reset" value="Batal" class="btn btn-warning btn-sm">
       
    </div>
</div>
</div>
</form>


</div>   
</div>


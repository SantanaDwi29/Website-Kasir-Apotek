<script language="javascript">
function simpanproduk()
{
	$('#formproduk').submit();
}
</script>
<div class="card mb-4">
    <div class="card-header bg-primary text-white">
   Form Data Produk
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





<form name="formproduk" id="formproduk" method="post" action="<?php echo base_url('produk/simpandata') ?>">
<input type="hidden" name="KodeProduk" id="KodeProduk"/>

<div class="form-group">
<div class="row mb-3">
    <div class="col-sm-2">
      Pilih Jenis Produk
    </div>
    <div class="col-sm-10">
    <?php echo $this->mcaricombo->combojenisproduk('KodeJenisProduk'); ?>
    </div>
</div>
</div>


<div class="form-group">
<div class="row mb-3">
    <div class="col-sm-2">
       Barcode
    </div>
    <div class="col-sm-10">
    	<input type="text" name="Barcode" id="Barcode" class="form-control"/>
    </div>
</div>
</div>

<div class="form-group">
<div class="row mb-3">
    <div class="col-sm-2">
       Nama Produk
    </div>
    <div class="col-sm-10">
    	<input type="text" name="NamaProduk" id="NamaProduk" class="form-control"/>
    </div>
</div>
</div>

<div class="form-group">
<div class="row mb-3">
    <div class="col-sm-2">
       Harga
    </div>
    <div class="col-sm-10">
    	<input type="text" name="Harga" id="Harga" class="form-control"/>
    </div>
</div>
</div>

<div class="form-group">
<div class="row mb-3">
    <div class="col-sm-2">
       Jumlah
    </div>
    <div class="col-sm-10">
    	<input type="text" name="Jumlah" id="Jumlah" class="form-control"/>
    </div>
</div>
</div>

<div class="form-group">
<div class="row mb-3">
    <div class="col-sm-2">
       Tgl Expired
    </div>
    <div class="col-sm-10">
    	<input type="date" name="TglExpired" id="TglExpired" class="form-control"/>
    </div>
</div>
</div>

<div class="form-group">
<div class="row mb-3">
    <div class="col-sm-2">
       Foto Produk
    </div>
    <div class="col-sm-10">
    	<input type="file" name="FotoProduk" id="FotoProduk" class="form-control"/>
    </div>
</div>
</div>

<div class="form-group">
<div class="row mb-3">
    <div class="col-sm-2">
      Keterangan
    </div>
    <div class="col-sm-10">
    	<textarea name="Keterangan" id="Keterangan" class="form-control" rows="3"></textarea>
    </div>
</div>
</div>



<div class="form-group">
<div class="row mb-3">
    <div class="col-sm-2">
        
    </div>
    <div class="col-sm-10">
       <input type="button" value="Simpan" class="btn btn-primary btn-sm" onClick="simpanproduk();">
       <input type="reset" value="Batal" class="btn btn-warning btn-sm">
       
    </div>
</div>
</div>
</form>


</div>   
</div>


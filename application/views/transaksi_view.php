<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script language="javascript">
	function simpantranskasi()
	{
		var JumlahBeli=$('#JumlahBeli').val();
		if(JumlahBeli=="")
		{
			alert("Jumlah beli masih kosong...");
			$('#JumlahBeli').focus();
			return false;	
		}	
		$('#formtransaksi').submit();
	}
</script>


<script>
$(document).ready(function(){
  $("#KodeProduk").change(function(){
   	 var KodeProduk=$('#KodeProduk').val();
	 if(KodeProduk=="")
	 {
		 $('#Harga').val('');
		 $('#Jumlah').val('');
	 }
	 else
	 {
		load ("transaksi/caridataproduk/"+KodeProduk,"#script");	 
	 }
  });
});
</script>





<div class="card mb-4">
    <div class="card-header bg-primary text-white">
   Transaksi Penjualan
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
	formtransaksi
	<?php
	}
	?>





<form name="" id="formtransaksi" method="post" action="<?php echo base_url('transaksi/simpantransaksi') ?>">
<input type="hidden" name="KodeTransaksi" id="KodeTransaksi"/>



<div class="form-group">
<div class="row mb-3">
    <div class="col-sm-2">
       Pilih Nama Barang
    </div>
    <div class="col-sm-10">
    	<?php echo $this->mcaricombo->comboproduk('KodeProduk'); ?>
    </div>
</div>
</div>


<hr/>


<div class="form-group">
<div class="row mb-3">
    <div class="col-sm-2">
       Harga
    </div>
    <div class="col-sm-10">
    	<input type="text" name="Harga" id="Harga" class="form-control" readonly="readonly"/>
    </div>
</div>
</div>

<div class="form-group">
<div class="row mb-3">
    <div class="col-sm-2">
       Jumlah
    </div>
    <div class="col-sm-10">
    	<input type="text" name="Jumlah" id="Jumlah" class="form-control" readonly="readonly"/>
    </div>
</div>
</div>


<hr/>

<div class="form-group">
<div class="row mb-3">
    <div class="col-sm-2">
       Jumlah di Beli
    </div>
    <div class="col-sm-10">
    	<input type="text" name="JumlahBeli" id="JumlahBeli" class="form-control"/>
    </div>
</div>
</div>


<div class="form-group">
<div class="row mb-3">
    <div class="col-sm-2">
       Tgl Transaksi
    </div>
    <div class="col-sm-10">
    	<input type="date" name="TglTransaksi" id="TglTransaksi" value="<?php echo date('Y-m-d'); ?>" class="form-control" readonly="readonly"/>
    </div>
</div>
</div>



<div class="form-group">
<div class="row mb-3">
    <div class="col-sm-2">
        
    </div>
    <div class="col-sm-10">
       <input type="button" value="Simpan Transaksi" class="btn btn-primary btn-sm" onClick="simpantranskasi();">
       <input type="reset" value="Batal" class="btn btn-warning btn-sm">
       
    </div>
</div>
</div>
</form>


</div>   
</div>


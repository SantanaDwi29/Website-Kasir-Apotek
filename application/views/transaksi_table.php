<script>
$(document).ready(function(){
  $("#Kembalian").click(function(){
     var UangKonsumen = $('#UangKonsumen').val();
	 var TotalBayar = $('#TotalBayar').val();
	 if(UangKonsumen=="")
	 {
		alert('Uang konsumen kosong');
		$('#UangKonsumen').focus();
		return false;	 
	 }
	 
	 var Kembalian = parseInt(UangKonsumen - TotalBayar);
	 $('#Kembalian').val(Kembalian);
  });
});
</script>


<h3>Data Produk</h3>
  <p>Daftar Transaksi Pembelian</p>   
  
   <div class="mb-3">
        	<input type="text" id="searchInput" class="form-control" placeholder="Pencarian...">
  		</div>  
           
  <table class="table table-bordered" id="productTable">
    <thead>
      <tr class="table-secondary">
        <th>No</th>
        <th>Tgl Transaksi</th>
        <th>Nama Produk</th>
        <th>Harga</th>
        <th>Jumlah Beli</th>
        <th>Total</th>
        
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
    <?php
	if(empty($hasil))
	{
		echo "";
		$TotalBayar=0;	
	}
	else
	{
		$no=1;
		$TotalBayar=0;
		foreach($hasil as $data):
	?>
    
      <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $data->TglTransaksi; ?></td>
        <td><?php echo $data->NamaProduk; ?></td>
        <td><?php echo "Rp " . number_format($data->Harga, 0, ',', '.'); ?></td>
        <td><?php echo $data->JumlahBeli; ?></td>
        <td width="200"><?php echo "Rp " . number_format($data->TotalHarga, 0, ',', '.'); ?></td>
        
        <td width="150">
        <input type="button" value="Hapus" class="btn bnt-sm btn-danger" onclick="hapustransaksi('<?php echo $data->KodeTransaksi ?>')"/>
        </td>
      </tr>
    <?php
		$TotalBayar = $TotalBayar + $data->TotalHarga;
		$no++;
		endforeach;
	}
	?> 
    <tr>
    	<td colspan="5" align="right"><b>Total Bayar</b></td>
        <td><b><?php echo "Rp " . number_format($TotalBayar, 0, ',', '.'); ?></b></td>
        <td></td>
    </tr>

    
    <input type="hidden" name="TotalBayar"  id="TotalBayar" value="<?php echo $TotalBayar; ?>"/>
    
     <tr>
    	<td colspan="5" align="right"><b>Uang Konsumen</b></td>
        <td><input type="text" name="UangKonsumen" id="UangKonsumen" class="form-control"/></td>
        <td></td>
    </tr>
    
    <tr>
    	<td colspan="5" align="right"><b>Kembalian</b></td>
        <td><input type="text" name="Kembalian" id="Kembalian" class="form-control"/></td>
        <td><input type="button" value="Selesai dan Cetak" class="btn btn-sm btn-primary" onclick="selesaidancetak();"/></td>
    </tr>
    
      
    </tbody>
  </table>
  <script language="javascript">
  	function hapustransaksi(KodeTransaksi)
	{
		if(confirm("Apakah yakin menghapus data ini?"))
		{
			window.open("<?php echo base_url()?>transaksi/hapustransaksi/"+KodeTransaksi, "_self");
		}	
	}
	
	function selesaidancetak()
	{
		var Kembalian=$('#Kembalian').val();
		if(Kembalian=="")
		{
			alert ('Data belum lengkap');
			return false;	
		}
		
		if(confirm("Apakah yakin selesaikan transaksi ini?"))
		{
			window.open("<?php echo base_url()?>transaksi/selesaidancetak", "_self");
		}	
	}

  </script>
  
  
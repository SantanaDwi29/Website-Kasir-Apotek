<h3>Data Jenis Produk</h3>
  <p>Berbagai jenis produk pada toko MPA</p>            
  <table class="table table-bordered table-hover">
    <thead>
      <tr class="table-secondary">
        <th>No</th>
        <th>Nama Jenis</th>
        <th>Keterangan</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
    <?php
	if(empty($hasil))
	{
		echo "";	
	}
	else
	{
		$no=1;
		foreach($hasil as $data):
	?>
    
      <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $data->NamaJenis; ?></td>
        <td><?php echo $data->Keterangan; ?></td>
        <td width="150">
        <input type="button" value="Edit" class="btn btn-sm btn-primary" onclick="editdata('<?php echo $data->KodeJenisProduk; ?>')"/>
        <input type="button" value="Hapus" class="btn bnt-sm btn-danger" onclick="hapusdata('<?php echo $data->KodeJenisProduk; ?>')"/>
        </td>
      </tr>
    <?php
		$no++;
		endforeach;
	}
	?> 
      
    </tbody>
  </table>
  <script language="javascript">
  	function hapusdata(KodeJenisProduk)
	{
		if(confirm("Apakah yakin menghapus data ini?"))
		{
			window.open("<?php echo base_url()?>jenisproduk/hapusdata/"+KodeJenisProduk, "_self");
		}	
	}
	
	function editdata(KodeJenisProduk)
	{
		load("jenisproduk/editdata/"+KodeJenisProduk,"#script");	
	}
  </script>
  
  
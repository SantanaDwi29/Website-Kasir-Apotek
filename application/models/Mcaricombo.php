<?php
	class Mcaricombo extends CI_Model
	{
		function combojenisproduk($namafield)
		{
			$sql="select * from tbjenisproduk";
			$query=$this->db->query($sql);

			$data[""]="Pilih";
			$no=1;
			foreach ($query->result() as $row )
			{
				$data[$row->KodeJenisProduk]=$no.") ".$row->NamaJenis;
				$no++;
			}
			echo form_dropdown($namafield,$data,"","class='form-control' id='".$namafield."'");

		}
		
		
		function comboproduk($namafield)
		{
			$sql="select * from tbproduk order by KodeJenisProduk";
			$query=$this->db->query($sql);

			$data[""]="Pilih";
			$no=1;
			foreach ($query->result() as $row )
			{
				$data[$row->KodeProduk]=$no.") ".$row->NamaProduk;
				$no++;
			}
			echo form_dropdown($namafield,$data,"","class='form-control' id='".$namafield."'");

		}
	
	}
?>
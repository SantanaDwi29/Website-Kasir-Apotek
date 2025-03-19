<?php
	class Produk extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('mcaricombo');
			$this->load->model('validasi');
			$this->validasi->validasiakun();
		}
		
		function index()
		{
			$datalist['hasil']=$this->tampildata();
			$data['konten']=$this->load->view('produk_view','',TRUE);
			$data['table']=$this->load->view('produk_table',$datalist,TRUE);
			$this->load->view('admin_view',$data);	
		}
		
		function simpandata()
		{
			$KodeProduk=$this->input->post('KodeProduk');
			$KodeJenisProduk=$this->input->post('KodeJenisProduk');
			$NamaProduk=$this->input->post('NamaProduk');
			$Harga=$this->input->post('Harga');
			$Jumlah=$this->input->post('Jumlah');
			$TglExpired=$this->input->post('TglExpired');
			$FotoProduk="";
			$Keterangan=$this->input->post('Keterangan');
			
			$data=array(
				'KodeJenisProduk'=>$KodeJenisProduk,
				'NamaProduk'=>$NamaProduk,
				'Harga'=>$Harga,
				'Jumlah'=>$Jumlah,
				'TglExpired'=>$TglExpired,
				'FotoProduk'=>$FotoProduk,
				'Keterangan'=>$Keterangan
			);
			
			if($KodeProduk=="")
			{
				$this->db->insert('tbproduk',$data);
				$this->session->set_flashdata('pesan','Data sudah disimpan...');
			}
			else
			{
				$update=array(
					'KodeProduk'=>$KodeProduk
				);	
				$this->db->where($update);
				$this->db->update('tbproduk',$data);
				$this->session->set_flashdata('pesan','Data sudah diedit...');

			}
			redirect('produk','refresh');
				
		}	
		
		function tampildata()
		{
			$sql="SELECT
				  `tbproduk`.`KodeJenisProduk`, `tbjenisproduk`.`NamaJenis`, `tbproduk`.*
				FROM
				  `tbproduk` INNER JOIN
				  `tbjenisproduk` ON `tbproduk`.`KodeJenisProduk` =
					`tbjenisproduk`.`KodeJenisProduk` ";	
			$query=$this->db->query($sql);
			if($query->num_rows()>0)
			{
				foreach($query->result() as $data)
				{
					$hasil[]=$data;	
				}
			}
			else
			{
				$hasil="";	
			}
			return $hasil;
		}
		
		function hapusdata($KodeJenisProduk)
		{
			$sql="delete from tbjenisproduk where KodeJenisProduk='".$KodeJenisProduk."'";
			$this->db->query($sql);
			
			redirect('jenisproduk','refresh');
				
		}
		
		function editdata($KodeJenisProduk)
		{
			$sql="select * from tbjenisproduk where ";
			$sql.="KodeJenisProduk='".$KodeJenisProduk."'";	
			$query=$this->db->query($sql);
			if($query->num_rows()>0)
			{
				$data=$query->row();
				echo "<script>$('#KodeJenisProduk').val('".$data->KodeJenisProduk."')</script>";
				echo "<script>$('#NamaJenis').val('".$data->NamaJenis."')</script>";
				echo "<script>$('#Keterangan').val('".$data->Keterangan."')</script>";

			}
			
		}
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	}
?>
<?php
	class Jenisproduk extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('validasi');
			$this->validasi->validasiakun();
		}
		
		function index()
		{
			$datalist['hasil']=$this->tampildata();
			$data['konten']=$this->load->view('jenisproduk_view','',TRUE);
			$data['table']=$this->load->view('jenisproduk_table',$datalist,TRUE);
			$this->load->view('admin_view',$data);	
		}
		
		function simpandata()
		{
			$KodeJenisProduk=$this->input->post('KodeJenisProduk');
			$NamaJenis=$this->input->post('NamaJenis');
			$Keterangan=$this->input->post('Keterangan');
			
			$data=array(
				'NamaJenis'=>$NamaJenis,
				'Keterangan'=>$Keterangan
			);
			
			if($KodeJenisProduk=="")
			{
				$this->db->insert('tbjenisproduk',$data);
				$this->session->set_flashdata('pesan','Data sudah disimpan...');
			}
			else
			{
				$update=array(
					'KodeJenisProduk'=>$KodeJenisProduk
				);	
				$this->db->where($update);
				$this->db->update('tbjenisproduk',$data);
				$this->session->set_flashdata('pesan','Data sudah diedit...');

			}
			redirect('jenisproduk','refresh');
				
		}	
		
		function tampildata()
		{
			$sql="select * from tbjenisproduk";	
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
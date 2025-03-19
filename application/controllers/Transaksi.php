<?php
	class Transaksi extends CI_Controller
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
			$data['konten']=$this->load->view('transaksi_view','',TRUE);
			$data['table']=$this->load->view('transaksi_table',$datalist,TRUE);
			$this->load->view('admin_view',$data);	
		}
		
		function caridataproduk($KodeProduk)
		{
			$sql="select * from tbproduk where KodeProduk='".$KodeProduk."'";
			$query=$this->db->query($sql);
			if($query->num_rows()>0)
			{
				$data=$query->row();
				echo "<script>$('#Harga').val('".$data->Harga."')</script>";	
				echo "<script>$('#Jumlah').val('".$data->Jumlah."')</script>";
			}	
		}
		
		function simpantransaksi()
		{
			$KodeProduk=$this->input->post('KodeProduk');
			$Harga=$this->input->post('Harga');
			$JumlahBeli=$this->input->post('JumlahBeli');
			$TglTransaksi=$this->input->post('TglTransaksi');
			$TotalHarga = $Harga * $JumlahBeli;
			
			$data=array(
				'KodeProduk'=>$KodeProduk,
				'NoTransaksi'=>'',
				'Harga'=>$Harga,
				'JumlahBeli'=>$JumlahBeli,
				'TotalHarga'=>$TotalHarga,
				'TglTransaksi'=>$TglTransaksi,
				'Status'=>"Belum"
			);
			
			$this->db->insert('tbtransaksi',$data);
			redirect('transaksi','refresh');
			
		}
		
		function tampildata()
		{
			$sql="SELECT
			  `tbtransaksi`.`KodeProduk`, `tbproduk`.`NamaProduk`, `tbtransaksi`.*
			FROM
			  `tbtransaksi` INNER JOIN
			  `tbproduk` ON `tbtransaksi`.`KodeProduk` = `tbproduk`.`KodeProduk` ";	
			$sql.="where Status='Belum'";
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
		
		function hapustransaksi($KodeTransaksi)
		{
			$sql="delete from tbtransaksi where KodeTransaksi='".$KodeTransaksi."'";	
			$this->db->query($sql);
			redirect('transaksi','refresh');
		}
		
		
		function buatnotransaksi()
		{
			$kata="ABCDEFGHIJKLMNPQRSTUVWXYZ123456789";
			$Tahun=date('Y');
			$Bulan=date('m');
			$nomoracak=substr(str_shuffle($kata),0,4);	
			$NoTransaksi="MPA-".$Tahun.$Bulan."-".$nomoracak;
			return $NoTransaksi;
		}
		

		function selesaidancetak()
		{
			$NoTransaksi=$this->buatnotransaksi();
			$sql="update tbtransaksi set NoTransaksi='".$NoTransaksi."',Status='Lunas' where ";
			$sql.="NoTransaksi=''";	
			$this->db->query($sql);	
			$this->cetaknota();
			
			
		}
		
		function cetaknota()
		{
			require_once(APPPATH . 'libraries/dompdf/autoload.inc.php');
			$pdf = new Dompdf\Dompdf();
			$pdf->setPaper('A4', 'landscape');
			$pdf->set_option('isRemoteEnabled', TRUE);
			$pdf->set_option('isHtml5ParserEnabled', true);
			$pdf->set_option('isPhpEnabled', true);
			$pdf->set_option('isFontSubsettingEnabled', true);
			
			$pdf->loadHtml($this->load->view('cetaknota_pdf','', true));
			
			$pdf->render();
			$pdf->stream('Nota Pembelian', ['Attachment' => false]);
	
		}
		
		
		
	}
?>
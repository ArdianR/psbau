<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	protected function zerofill ($num, $zerofill)
	{
		return str_pad($num, $zerofill, '0', STR_PAD_LEFT);
	}
	public function index()
	{
		$this->load->library('session');
		$email = $this->session->userdata('email');
		$login = $this->session->userdata('login');
		if ($login==false)
		{

		$data;

		//title head
		$data['title']='Login | MAU-MBI Amanatul Ummah Surabaya';

		//pesan berhasil
		$data['logout_berhasil'] = $this->session->flashdata('logout_berhasil');
		//pesan gagal
		$data['username_email_password_salah'] = $this->session->flashdata('username_email_password_salah');

		$this->load->view('admin/v_login', $data);

		}
		
		else
		{
			//$this->session->set_flashdata('login_berhasil','Login berhasil');
			$this->load->helper('url');
			redirect('admin/dashboard','location');
		}  
	}

	public function do_login()
	{

		$this->load->model('M_admin');

		$this->M_admin->setUsername($this->input->post('inputUserEmail'));
		$this->M_admin->setEmail($this->input->post('inputUserEmail'));
		$this->M_admin->setPassword(md5($this->input->post('inputPassword')));
		
		$query = $this->M_admin->getAdmin();
		if ($query->num_rows()>0)
		{
			foreach ($query->result() as $row)
			{
				$newdata = array(
					'username' => $row->username,
					'email' => $row->email,
					'nama' => $row->nama,
					'login' => TRUE
					);
				$this->session->set_userdata($newdata);
			}
						//notifikasi login
			//$query = $this->Alumni->setNotificationLogin();
						//header('location : ../home'); nggak bisa gini kalo di CodeIgniter
			$this->load->helper('url');
			redirect('admin','location');
		}
		else 
		{
			$this->session->set_flashdata('username_email_password_salah','Maaf ! Email/Username & Password Anda Salah');
			//header('location : ../home'); nggak bisa gini kalo di CodeIgniter
			$this->load->helper('url');
			redirect('admin','location');
		}

	}

	public function logout()
	{
		$login = $this->session->userdata('login');
			$this->session->unset_userdata('login');
			$this->session->set_flashdata('logout_berhasil','Anda berhasil logout');
			//header('location : ../home'); nggak bisa gini kalo di CodeIgniter
			$this->load->helper('url');
			redirect('admin','location');
	}

	public function dashboard()
	{
		$this->load->library('session');
		$login = $this->session->userdata('login');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$data="";
			$this->load->model('M_calonsiswa');
			$this->load->model('M_referensi');
			$this->load->model('M_log');

			$data=array(	
				'dashboard_active' 			=> 'class="active"',
				'datasiswa_active' 			=> 'class=""',
				'pencariansiswa_active' 	=> 'class=""',
				'referensi_active' 			=> 'class=""',
				'admin_active' 				=> 'class=""',
				'tambahadmin_active' 		=> 'class=""',
				'profil_active' 			=> 'class=""',
				'resetpassword_active' 		=> 'class=""'
				);

			//title head
			$data['title']='Dashboard | PSB MAU-MBI Amanatul Ummah Surabaya';
			//session nama lengkap
			$data['namaadmin'] = $this->session->userdata('nama');
			
			//tahunmasuk aktif
			$data['tahunmasukaktif'] = $this->M_referensi->getTahunMasukAktif();
			$tahunmasukaktif = $data['tahunmasukaktif'];
			$this->M_calonsiswa->setTahunMasuk($tahunmasukaktif);

			$data['jumlahpsb'] = $this->M_calonsiswa->getJumlahPSB();
			$data['jumlahlakilaki'] = $this->M_calonsiswa->getJumlahLakiLaki();
			$data['jumlahperempuan'] = $this->M_calonsiswa->getJumlahPerempuan();
			//grafik psb per lembaga
			$data['psbmau'] = $this->M_calonsiswa->getPSBMAU();
			$data['psbmbi'] = $this->M_calonsiswa->getPSBMBI();

			//grafik psb per kelompok tiap lembaga
			//mau
			$this->M_calonsiswa->setLembaga('MA Unggulan Amanatul Ummah');
			$this->M_calonsiswa->setKelompok('Gelombang 1');
			$query = $this->M_calonsiswa->getKelompokLembaga();
			if ($query->num_rows()>0){
					foreach ($query->result() as $row)
						$data['kelompok1mau'] = $row->kelompoklembaga;
				}
			
			$this->M_calonsiswa->setKelompok('Gelombang 2');
			$query = $this->M_calonsiswa->getKelompokLembaga();
			if ($query->num_rows()>0){
					foreach ($query->result() as $row)
						$data['kelompok2mau'] = $row->kelompoklembaga;
				}	
			
			//mbi
			$this->M_calonsiswa->setLembaga('MBI Amanatul Ummah');
			$this->M_calonsiswa->setKelompok('Gelombang 1');
			$query = $this->M_calonsiswa->getKelompokLembaga();
			if ($query->num_rows()>0){
					foreach ($query->result() as $row)
						$data['kelompok1mbi'] = $row->kelompoklembaga;
				}
			
			$this->M_calonsiswa->setKelompok('Gelombang 2');
			$query = $this->M_calonsiswa->getKelompokLembaga();
			if ($query->num_rows()>0){
					foreach ($query->result() as $row)
						$data['kelompok2mbi'] = $row->kelompoklembaga;
				}	

			//Jumlah Login Sistem sampai saat ini
			$query = $this->M_log->getAllCountLogin();
			if ($query->num_rows()>0){
					foreach ($query->result() as $row)
						$data['jumlahlogin'] = $row->jumlahlogin;
				}	
			
			//grafik pengunjung login tiap hari
			$data['pengunjunglogin'] = $this->M_log->getCountVisitorLogin();

			$this->load->view('admin/v_dashboard', $data);
		}
	}

	public function datasiswa()
	{
		$this->load->library('session');
		$login = $this->session->userdata('login');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$data="";
			//menu active
			$data=array(	
				'dashboard_active' 			=> 'class=""',
				'datasiswa_active' 			=> 'class="active"',
				'pencariansiswa_active' 	=> 'class=""',
				'referensi_active' 			=> 'class=""',
				'admin_active' 				=> 'class=""',
				'tambahadmin_active' 		=> 'class=""',
				'profil_active' 			=> 'class=""',
				'resetpassword_active' 		=> 'class=""'
				);

			//title head
			$data['title'] = 'Data Siswa | PSB MAU-MBI Amanatul Ummah Surabaya';
			$data['namaadmin'] = $this->session->userdata('nama');

			//notifikasi
			$data['tambah_calonsiswa_berhasil'] = $this->session->flashdata('tambah_calonsiswa_berhasil');
			$data['hapus_siswa_berhasil'] = $this->session->flashdata('hapus_siswa_berhasil');
			$data['update_datasiswa_berhasil'] = $this->session->flashdata('update_datasiswa_berhasil');

			//gagal upload foto
			$data['upload_foto_gagal'] = $this->session->flashdata('upload_foto_gagal');

			$this->load->model('M_referensi');
			$this->load->model('M_calonsiswa');

			$data['_lembaga'] = $this->M_referensi->getLembaga();
			$lembaga = $this->input->get('lembaga');

			$queryproses = $this->M_referensi->getProsesPenerimaanAktif($lembaga);
			if($queryproses->num_rows()>0)
			{
				foreach ($queryproses->result() as $row) {
					$data['idprosespenerimaan'] = $row->idprosespenerimaan;
					$data['proses'] = $row->proses;
				}
			}
			$data['_kelompok'] = $this->M_referensi->getKelompok('1');
			$data['_tahunmasuk'] = $this->M_referensi->getTahunMasuk($lembaga);
			
			$data['status'] = 0;

			if (($data['_kelompok']->num_rows()>0) && ($queryproses->num_rows()>0)){
				$this->load->view('admin/ajax/ajax_select_datasiswa', $data);
			}
			else{
				$data['status'] = 1;
				$kelompok = $this->input->post('inputKelompok');
				$tahunmasuk = $this->input->post('inputTahunMasuk');
				$lembaga = $this->input->post('inputLembaga');

				$data['carilembaga'] = $lembaga;
				$data['carikelompok'] = $kelompok;
				$data['caritahunmasuk'] = $tahunmasuk;

				$this->M_calonsiswa->setLembaga($lembaga);
				$this->M_calonsiswa->setKelompok($kelompok);
				$this->M_calonsiswa->setTahunMasuk($tahunmasuk);
				$data['query'] = $this->M_calonsiswa->cariDataSiswa();

				$this->load->view('admin/v_datasiswa', $data);
			}	
		}
	}

	public function tambahcalonsiswa()
	{
		$this->load->library('session');
		$login = $this->session->userdata('login');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$data="";
			//menu active
			$data=array(	
				'dashboard_active' 			=> 'class=""',
				'datasiswa_active' 			=> 'class="active"',
				'pencariansiswa_active' 	=> 'class=""',
				'referensi_active' 			=> 'class=""',
				'admin_active' 				=> 'class=""',
				'tambahadmin_active' 		=> 'class=""',
				'profil_active' 			=> 'class=""',
				'resetpassword_active' 		=> 'class=""'
				);

			//title head
			$data['title'] = 'Tambah Calon Siswa | PSB MAU-MBI Amanatul Ummah Surabaya';
	
			$data['namaadmin'] = $this->session->userdata('nama');

			$this->load->model('M_referensi');

			$data['_lembaga'] = $this->M_referensi->getLembaga();
			$lembaga = $this->input->get('lembaga'); 

			$queryproses = $this->M_referensi->getProsesPenerimaanAktif($lembaga);
			if($queryproses->num_rows()>0)
			{
				foreach ($queryproses->result() as $row) {
					$data['idprosespenerimaan'] = $row->idprosespenerimaan;
					$data['proses'] = $row->proses;
				}
			}

			$data['_kelompok'] = $this->M_referensi->getKelompok('1');
			$data['_tahunmasuk'] = $this->M_referensi->getTahunMasuk($lembaga);

			$data['_agama'] = $this->M_referensi->getAgama();
			$data['_pekerjaan'] = $this->M_referensi->getPekerjaan();
			$data['_kondisi'] = $this->M_referensi->getKondisi();
			$data['_penghasilan'] = $this->M_referensi->getPenghasilan();
			$data['_statusortu'] = $this->M_referensi->getStatusOrtu();
			$data['_suku'] = $this->M_referensi->getSuku();
			$data['_pendidikan'] = $this->M_referensi->getPendidikan();


			if (($data['_kelompok']->num_rows()>0) && ($queryproses->num_rows()>0))
				$this->load->view('admin/ajax/ajax_select_formsiswa', $data);
			else
				$this->load->view('admin/v_tambahcalonsiswa', $data);
		}
	}

	protected function do_unggahfoto($nopendaftaran)
	{
		    //$this->load->model('M_calonsiswa');
			$nama = $this->input->post('inputNama');

			$namaedit =  str_replace(" ", "_", $nama);

			//UPLOAD FOTO
			$this->load->library('upload');
	        $namafile = $nopendaftaran.'-'.$namaedit.'-'.time(); //nama file saya beri nama langsung dan diikuti fungsi time
	        $path = './assets/profpic/';
	        $config['upload_path'] = $path; //path folder
	        $config['allowed_types'] = 'jpg'; //type yang dapat diakses bisa anda sesuaikan
	        $config['max_size'] = '1048'; //maksimum besar file 1M
	        $config['max_width']  = '450'; //lebar maksimum 400 px
	        $config['max_height']  = '650'; //tinggi maksimu 600 px
	        $config['file_name'] = $namafile; //nama yang terupload nantinya
	 
	        $this->upload->initialize($config);
	         
	        if(!empty($_FILES['fileFoto']['name']))
	        {
	            if ($this->upload->do_upload('fileFoto'))
	            {
		            $this->upload->data();
		            $linkfoto = $namafile.'.jpg';
		 			$data['linkfoto'] = $this->M_calonsiswa->setLinkFoto($linkfoto);
	              
	            }else{
	                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
	                $this->session->set_flashdata("upload_foto_gagal", "Format atau Ukuran Foto Tidak Sesuai");
	            }
	        }
	        else{
	        	$data['foto'] = $this->M_calonsiswa->getFotoFromAdmin($nopendaftaran);
	        	$linkfoto = $data['foto'];
	        	$data['linkfoto'] = $this->M_calonsiswa->setLinkFoto($linkfoto);
	        }	

	        //END UPLOAD FOTO
	} 

	public function do_tambahcalonsiswa()
	{
		$this->load->library('session');
		$login = $this->session->userdata('login');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$this->load->model('M_calonsiswa');

			//input penerimaan calon siswa		
			$this->M_calonsiswa->setLembaga($this->input->post('inputLembaga'));
			$this->M_calonsiswa->setKelompok($this->input->post('inputKelompok'));
			$this->M_calonsiswa->setTahunMasuk($this->input->post('inputTahunMasuk'));

			//input data diri calon siswa
			$this->M_calonsiswa->setNISN($this->input->post('inputNISN'));
			$this->M_calonsiswa->setNIK($this->input->post('inputNIK'));
			$this->M_calonsiswa->setNoUN($this->input->post('inputNoUN'));
			$this->M_calonsiswa->setNama($this->input->post('inputNama'));
			$this->M_calonsiswa->setPanggilan($this->input->post('inputPanggilan'));
			$this->M_calonsiswa->setJenisKelamin($this->input->post('inputJenisKelamin'));
			$this->M_calonsiswa->setTempatLahir($this->input->post('inputTempatLahir'));

			$this->M_calonsiswa->setTanggalLahir($this->input->post('inputTanggalLahir'));
			$this->M_calonsiswa->setAgama($this->input->post('inputAgama'));
			$this->M_calonsiswa->setSuku($this->input->post('inputSuku'));
			$this->M_calonsiswa->setKondisi($this->input->post('inputKondisi'));
			$this->M_calonsiswa->setKewarganegaraan($this->input->post('inputKewarganegaraan'));
			$this->M_calonsiswa->setAnakKe($this->input->post('inputAnakKe'));
			$this->M_calonsiswa->setJumlahSaudara($this->input->post('inputJumlahSaudara'));

			$this->M_calonsiswa->setAlamatSiswa($this->input->post('inputAlamatSiswa'));
			$this->M_calonsiswa->setDesa($this->input->post('inputDesa'));
			$this->M_calonsiswa->setRT($this->input->post('inputRT'));
			$this->M_calonsiswa->setRW($this->input->post('inputRW'));
			$this->M_calonsiswa->setKecamatan($this->input->post('inputKecamatan'));
			$this->M_calonsiswa->setKota($this->input->post('inputKota'));
			$this->M_calonsiswa->setProvinsi($this->input->post('inputProvinsi'));
			$this->M_calonsiswa->setKodePos($this->input->post('inputKodePos'));
			$this->M_calonsiswa->setJarak($this->input->post('inputJarak'));
			$this->M_calonsiswa->setHPSiswa($this->input->post('inputHPSiswa'));
			$this->M_calonsiswa->setEmailSiswa($this->input->post('inputEmailSiswa'));
			$this->M_calonsiswa->setAsalSekolah($this->input->post('inputAsalSekolah'));
			$this->M_calonsiswa->setNoIjasah($this->input->post('inputNoIjasah'));
			$this->M_calonsiswa->setTanggalIjasah($this->input->post('inputTanggalIjasah'));
			$this->M_calonsiswa->setKeteranganSekolah($this->input->post('inputKeteranganSekolah'));

			//input fisik calon siswa
			$this->M_calonsiswa->setDarah($this->input->post('inputDarah'));
			$this->M_calonsiswa->setBerat($this->input->post('inputBerat'));
			$this->M_calonsiswa->setTinggi($this->input->post('inputTinggi'));
			$this->M_calonsiswa->setUkuranSepatu($this->input->post('inputUkuranSepatu'));
			$this->M_calonsiswa->setUkuranBaju($this->input->post('inputUkuranBaju'));
			$this->M_calonsiswa->setUkuranCelana($this->input->post('inputUkuranCelana'));
			$this->M_calonsiswa->setKesehatan($this->input->post('inputKesehatan'));
			$this->M_calonsiswa->setHobi($this->input->post('inputHobi'));

			//input data orang tua
			$this->M_calonsiswa->setNamaAyah($this->input->post('inputNamaAyah'));
			$this->M_calonsiswa->setNamaIbu($this->input->post('inputNamaIbu'));
			$this->M_calonsiswa->setAlmAyah($this->input->post('inputAlmAyah'));
			$this->M_calonsiswa->setAlmIbu($this->input->post('inputAlmIbu'));
			$this->M_calonsiswa->setStatusAyah($this->input->post('inputStatusAyah'));
			$this->M_calonsiswa->setStatusIbu($this->input->post('inputStatusIbu'));
			$this->M_calonsiswa->setTempatLahirAyah($this->input->post('inputTempatLahirAyah'));
			$this->M_calonsiswa->setTempatLahirIbu($this->input->post('inputTempatLahirIbu'));

			$this->M_calonsiswa->setTanggalLahirAyah($this->input->post('inputTanggalLahirAyah'));
			$this->M_calonsiswa->setTanggalLahirIbu($this->input->post('inputTanggalLahirIbu'));
			$this->M_calonsiswa->setPendidikanAyah($this->input->post('inputPendidikanAyah'));
			$this->M_calonsiswa->setPendidikanIbu($this->input->post('inputPendidikanIbu'));
			$this->M_calonsiswa->setPekerjaanAyah($this->input->post('inputPekerjaanAyah'));
			$this->M_calonsiswa->setPekerjaanIbu($this->input->post('inputPekerjaanIbu'));

			$this->M_calonsiswa->setPenghasilanAyah($this->input->post('inputPenghasilanAyah'));
			$this->M_calonsiswa->setPenghasilanIbu($this->input->post('inputPenghasilanIbu'));
			$this->M_calonsiswa->setEmailAyah($this->input->post('inputEmailAyah'));
			$this->M_calonsiswa->setEmailIbu($this->input->post('inputEmailIbu'));
			$this->M_calonsiswa->setAlamatOrtu($this->input->post('inputAlamatOrtu'));
			$this->M_calonsiswa->setHPOrtu($this->input->post('inputHPOrtu'));

			$this->M_calonsiswa->setPrestasi($this->input->post('inputPrestasi'));

			$this->M_calonsiswa->setBinSmt1($this->input->post('inputBinSmt1'));
			$this->M_calonsiswa->setBinSmt2($this->input->post('inputBinSmt2'));
			$this->M_calonsiswa->setBinSmt3($this->input->post('inputBinSmt3'));
			$this->M_calonsiswa->setBinSmt4($this->input->post('inputBinSmt4'));
			$this->M_calonsiswa->setBinSmt5($this->input->post('inputBinSmt5'));
			$this->M_calonsiswa->setBingSmt1($this->input->post('inputBingSmt1'));
			$this->M_calonsiswa->setBingSmt2($this->input->post('inputBingSmt2'));
			$this->M_calonsiswa->setBingSmt3($this->input->post('inputBingSmt3'));
			$this->M_calonsiswa->setBingSmt4($this->input->post('inputBingSmt4'));
			$this->M_calonsiswa->setBingSmt5($this->input->post('inputBingSmt5'));
			$this->M_calonsiswa->setMatSmt1($this->input->post('inputMatSmt1'));
			$this->M_calonsiswa->setMatSmt2($this->input->post('inputMatSmt2'));
			$this->M_calonsiswa->setMatSmt3($this->input->post('inputMatSmt3'));
			$this->M_calonsiswa->setMatSmt4($this->input->post('inputMatSmt4'));
			$this->M_calonsiswa->setMatSmt5($this->input->post('inputMatSmt5'));
			$this->M_calonsiswa->setIpaSmt1($this->input->post('inputIpaSmt1'));
			$this->M_calonsiswa->setIpaSmt2($this->input->post('inputIpaSmt2'));
			$this->M_calonsiswa->setIpaSmt3($this->input->post('inputIpaSmt3'));
			$this->M_calonsiswa->setIpaSmt4($this->input->post('inputIpaSmt4'));
			$this->M_calonsiswa->setIpaSmt5($this->input->post('inputIpaSmt5'));
			$this->M_calonsiswa->setIpsSmt1($this->input->post('inputIpsSmt1'));
			$this->M_calonsiswa->setIpsSmt2($this->input->post('inputIpsSmt2'));
			$this->M_calonsiswa->setIpsSmt3($this->input->post('inputIpsSmt3'));
			$this->M_calonsiswa->setIpsSmt4($this->input->post('inputIpsSmt4'));
			$this->M_calonsiswa->setIpsSmt5($this->input->post('inputIpsSmt5'));
			$this->M_calonsiswa->setAgamaSmt1($this->input->post('inputAgamaSmt1'));
			$this->M_calonsiswa->setAgamaSmt2($this->input->post('inputAgamaSmt2'));
			$this->M_calonsiswa->setAgamaSmt3($this->input->post('inputAgamaSmt3'));
			$this->M_calonsiswa->setAgamaSmt4($this->input->post('inputAgamaSmt4'));
			$this->M_calonsiswa->setAgamaSmt5($this->input->post('inputAgamaSmt5'));
			$this->M_calonsiswa->setPpknSmt1($this->input->post('inputPpknSmt1'));
			$this->M_calonsiswa->setPpknSmt2($this->input->post('inputPpknSmt2'));
			$this->M_calonsiswa->setPpknSmt3($this->input->post('inputPpknSmt3'));
			$this->M_calonsiswa->setPpknSmt4($this->input->post('inputPpknSmt4'));
			$this->M_calonsiswa->setPpknSmt5($this->input->post('inputPpknSmt5'));
			$this->M_calonsiswa->setPenjasSmt1($this->input->post('inputPenjasSmt1'));
			$this->M_calonsiswa->setPenjasSmt2($this->input->post('inputPenjasSmt2'));
			$this->M_calonsiswa->setPenjasSmt3($this->input->post('inputPenjasSmt3'));
			$this->M_calonsiswa->setPenjasSmt4($this->input->post('inputPenjasSmt4'));
			$this->M_calonsiswa->setPenjasSmt5($this->input->post('inputPenjasSmt5'));
			$this->M_calonsiswa->setSeniSmt1($this->input->post('inputSeniSmt1'));
			$this->M_calonsiswa->setSeniSmt2($this->input->post('inputSeniSmt2'));
			$this->M_calonsiswa->setSeniSmt3($this->input->post('inputSeniSmt3'));
			$this->M_calonsiswa->setSeniSmt4($this->input->post('inputSeniSmt4'));
			$this->M_calonsiswa->setSeniSmt5($this->input->post('inputSeniSmt5'));

			if ($this->input->post('inputLembaga')=='MA Unggulan Amanatul Ummah')
			{
				$data['psbmau'] = $this->M_calonsiswa->getPSBMAU();
				$nomorpsb = $this->zerofill($data['psbmau']+1, 3);
				$lembaga = 'MAU';
			}
			if ($this->input->post('inputLembaga')=='MBI Amanatul Ummah')
			{
				$data['psbmbi'] = $this->M_calonsiswa->getPSBMBI();
				$nomorpsb = $this->zerofill($data['psbmbi']+1, 3);
				$lembaga = 'MBI';
			}
			if ($this->input->post('inputKelompok')=='Gelombang 1')
				$urutkelompok = 'G1';
			if ($this->input->post('inputKelompok')=='Gelombang 2')
				$urutkelompok = 'G2';
			if ($this->input->post('inputKelompok')=='Gelombang 3')
				$urutkelompok = 'G3';
			if ($this->input->post('inputKelompok')=='Prestasi')
				$urutkelompok = 'P1';

			$tahunmasuk = SUBSTR($this->input->post('inputTahunMasuk'), 2);
			$nopendaftaran = 'PSB'.$lembaga.$urutkelompok.$tahunmasuk.$nomorpsb;  //belum ada nomor pendaftaran
			$this->M_calonsiswa->setNoPendaftaran($nopendaftaran);	

			$this->do_unggahfoto($nopendaftaran); //unggah foto

			$query = $this->M_calonsiswa->addCalonSiswaFromAdmin();

			$this->session->set_flashdata('tambah_calonsiswa_berhasil','Anda berhasil menambah data calon siswa');
			$this->load->helper('url');
			redirect('admin/datasiswa','location');
		}

	}

	public function do_cetakexcel()
	{
		$this->load->library('session');
		$this->load->library("PHPExcel");
		$login = $this->session->userdata('login');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$this->load->model('M_calonsiswa');
			
			$lembaga = $this->input->post('inputCariLembaga');
			$kelompok = $this->input->post('inputCariKelompok');
			$tahunmasuk = $this->input->post('inputCariTahunMasuk');

			$this->M_calonsiswa->setLembaga($lembaga);
			$this->M_calonsiswa->setKelompok($kelompok);
			$this->M_calonsiswa->setTahunMasuk($tahunmasuk);

			$data['datasiswa'] = $this->M_calonsiswa->cariDataSiswa();
			$data['namalembaga'] = $lembaga;
			$data['namakelompok'] = $kelompok;
			$data['namatahunmasuk'] = $tahunmasuk;

			if($data['namalembaga'] == 'MA Unggulan Amanatul Ummah')
				$data['namalembaga'] = 'MAU';
			else if($data['namalembaga'] == 'MBI Amanatul Ummah')
				$data['namalembaga'] = 'MBI';

			$this->load->view('admin/v_cetakexcel', $data);
		}
	}

	/*KELOLA TIAP SISWA*/
	public function updatedatasiswa($nopendaftaran)
	{
		$this->load->library('session');
		$login = $this->session->userdata('login');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$data="";
			//menu active
			$data=array(	
				'dashboard_active' 			=> 'class=""',
				'datasiswa_active' 			=> 'class="active"',
				'pencariansiswa_active' 	=> 'class=""',
				'referensi_active' 			=> 'class=""',
				'admin_active' 				=> 'class=""',
				'tambahadmin_active' 		=> 'class=""',
				'profil_active' 			=> 'class=""',
				'resetpassword_active' 		=> 'class=""'
				);

			//title head
			$data['title'] = 'Update Calon Siswa | PSB MAU-MBI Amanatul Ummah Surabaya';
	
			$data['namaadmin'] = $this->session->userdata('nama');

			$this->load->model('M_referensi');

			$data['_lembaga'] = $this->M_referensi->getLembaga();
			$lembaga = $this->input->get('lembaga'); 

			$queryproses = $this->M_referensi->getProsesPenerimaanAktif($lembaga);
			if($queryproses->num_rows()>0)
			{
				foreach ($queryproses->result() as $row) {
					$data['idprosespenerimaan'] = $row->idprosespenerimaan;
					$data['proses'] = $row->proses;
				}
			}

			$data['_kelompok'] = $this->M_referensi->getKelompok('1');
			$data['_tahunmasuk'] = $this->M_referensi->getTahunMasuk($lembaga);

			$data['_agama'] = $this->M_referensi->getAgama();
			$data['_pekerjaan'] = $this->M_referensi->getPekerjaan();
			$data['_kondisi'] = $this->M_referensi->getKondisi();
			$data['_penghasilan'] = $this->M_referensi->getPenghasilan();
			$data['_statusortu'] = $this->M_referensi->getStatusOrtu();
			$data['_suku'] = $this->M_referensi->getSuku();
			$data['_pendidikan'] = $this->M_referensi->getPendidikan();

			$this->load->model('M_calonsiswa');
			$this->M_calonsiswa->setNoPendaftaran($nopendaftaran);
		
			$query = $this->M_calonsiswa->getCalonSiswaByNoPendaftaran();
			
			if ($query->num_rows()>0)
			{
				foreach ($query->result() as $row)
				{
					//bukan pesan
					$data['idcalonsiswa'] = $row->idcalonsiswa;
					$data['iduser'] = $row->iduser;
					$data['nopendaftaran'] = $row->nopendaftaran;
					$data['lembaga'] = $row->lembaga;
					$data['kelompok'] = $row->kelompok;
					$data['tahunmasuk'] = $row->tahunmasuk;
					$data['nisn'] = $row->nisn;
					$data['nik'] = $row->nik;
					$data['noun'] = $row->noun;
					$data['nama'] = $row->nama;
					$data['panggilan'] = $row->panggilan;
					$data['jeniskelamin'] = $row->jeniskelamin;
					$data['tmplahir'] = $row->tmplahir;
					$data['tgllahir'] = $row->tgllahir;
					$data['agama'] = $row->agama;
					$data['suku'] = $row->suku;
					$data['kondisi'] = $row->kondisi;
					$data['warga'] = $row->warga;
					$data['anakke'] = $row->anakke;
					$data['jsaudara'] = $row->jsaudara;
					$data['alamatsiswa'] = $row->alamatsiswa;
					$data['desa'] = $row->desa;
					$data['rt'] = $row->rt;
					$data['rw'] = $row->rw;
					$data['kecamatan'] = $row->kecamatan;
					$data['kota'] = $row->kota;
					$data['provinsi'] = $row->provinsi;
					$data['kodepos'] = $row->kodepos;
					$data['jarak'] = $row->jarak;
					$data['hpsiswa'] = $row->hpsiswa;
					$data['emailsiswa'] = $row->emailsiswa;
					$data['asalsekolah'] = $row->asalsekolah;
					$data['noijasah'] = $row->noijasah;
					$data['tglijasah'] = $row->tglijasah;
					$data['ketsekolah'] = $row->ketsekolah;
					$data['darah'] = $row->darah;
					$data['berat'] = $row->berat;
					$data['tinggi'] = $row->tinggi;
					$data['ukuransepatu'] = $row->ukuransepatu;
					$data['ukuranbaju'] = $row->ukuranbaju;
					$data['ukurancelana'] = $row->ukurancelana;
					$data['kesehatan'] = $row->kesehatan;
					$data['namaayah'] = $row->namaayah;
					$data['namaibu'] = $row->namaibu;
					$data['almayah'] = $row->almayah;
					$data['almibu'] = $row->almibu;
					$data['statusayah'] = $row->statusayah;
					$data['statusibu'] = $row->statusibu;
					$data['tmplahirayah'] = $row->tmplahirayah;
					$data['tmplahiribu'] = $row->tmplahiribu;
					$data['tgllahirayah'] = $row->tgllahirayah;
					$data['tgllahiribu'] = $row->tgllahiribu;
					$data['pendidikanayah'] = $row->pendidikanayah;
					$data['pendidikanibu'] = $row->pendidikanibu;
					$data['pekerjaanayah'] = $row->pekerjaanayah;
					$data['pekerjaanibu'] = $row->pekerjaanibu;
					$data['penghasilanayah'] = $row->penghasilanayah;
					$data['penghasilanibu'] = $row->penghasilanibu;
					$data['emailayah'] = $row->emailayah;
					$data['emailibu'] = $row->emailibu;
					$data['alamatortu'] = $row->alamatortu;
					$data['hportu'] = $row->hportu;
					$data['hobi'] = $row->hobi;
					$data['foto'] = $row->foto;
					$data['prestasi'] =	$row->prestasi;
					$data['binsmt1'] = $row->binsmt1;
					$data['binsmt2'] = $row->binsmt2;
					$data['binsmt3'] = $row->binsmt3;
					$data['binsmt4'] = $row->binsmt4;
					$data['binsmt5'] = $row->binsmt5;
					$data['bingsmt1'] = $row->bingsmt1;
					$data['bingsmt2'] = $row->bingsmt2;
					$data['bingsmt3'] = $row->bingsmt3;
					$data['bingsmt4'] = $row->bingsmt4;
					$data['bingsmt5'] = $row->bingsmt5;
					$data['matsmt1'] = $row->matsmt1;
					$data['matsmt2'] = $row->matsmt2;
					$data['matsmt3'] = $row->matsmt3;
					$data['matsmt4'] = $row->matsmt4;
					$data['matsmt5'] = $row->matsmt5;
					$data['ipasmt1'] = $row->ipasmt1;
					$data['ipasmt2'] = $row->ipasmt2;
					$data['ipasmt3'] = $row->ipasmt3;
					$data['ipasmt4'] = $row->ipasmt4;
					$data['ipasmt5'] = $row->ipasmt5;
					$data['ipssmt1'] = $row->ipssmt1;
					$data['ipssmt2'] = $row->ipssmt2;
					$data['ipssmt3'] = $row->ipssmt3;
					$data['ipssmt4'] = $row->ipssmt4;
					$data['ipssmt5'] = $row->ipssmt5;
					$data['agamasmt1'] = $row->agamasmt1;
					$data['agamasmt2'] = $row->agamasmt2;
					$data['agamasmt3'] = $row->agamasmt3;
					$data['agamasmt4'] = $row->agamasmt4;
					$data['agamasmt5'] = $row->agamasmt5;
					$data['ppknsmt1'] = $row->ppknsmt1;
					$data['ppknsmt2'] = $row->ppknsmt2;
					$data['ppknsmt3'] = $row->ppknsmt3;
					$data['ppknsmt4'] = $row->ppknsmt4;
					$data['ppknsmt5'] = $row->ppknsmt5;
					$data['penjassmt1']	= $row->penjassmt1;
					$data['penjassmt2']	= $row->penjassmt2;
					$data['penjassmt3']	= $row->penjassmt3;
					$data['penjassmt4']	= $row->penjassmt4;
					$data['penjassmt5']	= $row->penjassmt5;
					$data['senismt1'] = $row->senismt1;
					$data['senismt2'] = $row->senismt2;
					$data['senismt3'] = $row->senismt3;
					$data['senismt4'] = $row->senismt4;
					$data['senismt5'] = $row->senismt5;

				}
			}

			if (($data['_kelompok']->num_rows()>0) && ($queryproses->num_rows()>0))
				$this->load->view('admin/ajax/ajax_select_formsiswa', $data);
			else
				$this->load->view('admin/v_updatedatasiswa', $data);
		}

	}

	public function do_updatedatasiswa()
	{
		$this->load->library('session');
		$login = $this->session->userdata('login');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$this->load->model('M_calonsiswa');
			$this->M_calonsiswa->setIdCalonSiswa($this->input->post('inputIdCalonSiswa'));
			//input penerimaan calon siswa	
			$this->M_calonsiswa->setLembaga($this->input->post('inputLembaga'));
			$this->M_calonsiswa->setKelompok($this->input->post('inputKelompok'));
			$this->M_calonsiswa->setTahunMasuk($this->input->post('inputTahunMasuk'));

			//input data diri calon siswa
			$this->M_calonsiswa->setNISN($this->input->post('inputNISN'));
			$this->M_calonsiswa->setNIK($this->input->post('inputNIK'));
			$this->M_calonsiswa->setNoUN($this->input->post('inputNoUN'));
			$this->M_calonsiswa->setNama($this->input->post('inputNama'));
			$this->M_calonsiswa->setPanggilan($this->input->post('inputPanggilan'));
			$this->M_calonsiswa->setJenisKelamin($this->input->post('inputJenisKelamin'));
			$this->M_calonsiswa->setTempatLahir($this->input->post('inputTempatLahir'));

			$this->M_calonsiswa->setTanggalLahir($this->input->post('inputTanggalLahir'));
			$this->M_calonsiswa->setAgama($this->input->post('inputAgama'));
			$this->M_calonsiswa->setSuku($this->input->post('inputSuku'));
			$this->M_calonsiswa->setKondisi($this->input->post('inputKondisi'));
			$this->M_calonsiswa->setKewarganegaraan($this->input->post('inputKewarganegaraan'));
			$this->M_calonsiswa->setAnakKe($this->input->post('inputAnakKe'));
			$this->M_calonsiswa->setJumlahSaudara($this->input->post('inputJumlahSaudara'));

			$this->M_calonsiswa->setAlamatSiswa($this->input->post('inputAlamatSiswa'));
			$this->M_calonsiswa->setDesa($this->input->post('inputDesa'));
			$this->M_calonsiswa->setRT($this->input->post('inputRT'));
			$this->M_calonsiswa->setRW($this->input->post('inputRW'));
			$this->M_calonsiswa->setKecamatan($this->input->post('inputKecamatan'));
			$this->M_calonsiswa->setKota($this->input->post('inputKota'));
			$this->M_calonsiswa->setProvinsi($this->input->post('inputProvinsi'));
			$this->M_calonsiswa->setKodePos($this->input->post('inputKodePos'));
			$this->M_calonsiswa->setJarak($this->input->post('inputJarak'));
			$this->M_calonsiswa->setHPSiswa($this->input->post('inputHPSiswa'));
			$this->M_calonsiswa->setEmailSiswa($this->input->post('inputEmailSiswa'));
			$this->M_calonsiswa->setAsalSekolah($this->input->post('inputAsalSekolah'));
			$this->M_calonsiswa->setNoIjasah($this->input->post('inputNoIjasah'));
			$this->M_calonsiswa->setTanggalIjasah($this->input->post('inputTanggalIjasah'));
			$this->M_calonsiswa->setKeteranganSekolah($this->input->post('inputKeteranganSekolah'));

			//input fisik calon siswa
			$this->M_calonsiswa->setDarah($this->input->post('inputDarah'));
			$this->M_calonsiswa->setBerat($this->input->post('inputBerat'));
			$this->M_calonsiswa->setTinggi($this->input->post('inputTinggi'));
			$this->M_calonsiswa->setUkuranSepatu($this->input->post('inputUkuranSepatu'));
			$this->M_calonsiswa->setUkuranBaju($this->input->post('inputUkuranBaju'));
			$this->M_calonsiswa->setUkuranCelana($this->input->post('inputUkuranCelana'));
			$this->M_calonsiswa->setKesehatan($this->input->post('inputKesehatan'));
			$this->M_calonsiswa->setHobi($this->input->post('inputHobi'));

			//input data orang tua
			$this->M_calonsiswa->setNamaAyah($this->input->post('inputNamaAyah'));
			$this->M_calonsiswa->setNamaIbu($this->input->post('inputNamaIbu'));
			$this->M_calonsiswa->setAlmAyah($this->input->post('inputAlmAyah'));
			$this->M_calonsiswa->setAlmIbu($this->input->post('inputAlmIbu'));
			$this->M_calonsiswa->setStatusAyah($this->input->post('inputStatusAyah'));
			$this->M_calonsiswa->setStatusIbu($this->input->post('inputStatusIbu'));
			$this->M_calonsiswa->setTempatLahirAyah($this->input->post('inputTempatLahirAyah'));
			$this->M_calonsiswa->setTempatLahirIbu($this->input->post('inputTempatLahirIbu'));

			$this->M_calonsiswa->setTanggalLahirAyah($this->input->post('inputTanggalLahirAyah'));
			$this->M_calonsiswa->setTanggalLahirIbu($this->input->post('inputTanggalLahirIbu'));
			$this->M_calonsiswa->setPendidikanAyah($this->input->post('inputPendidikanAyah'));
			$this->M_calonsiswa->setPendidikanIbu($this->input->post('inputPendidikanIbu'));
			$this->M_calonsiswa->setPekerjaanAyah($this->input->post('inputPekerjaanAyah'));
			$this->M_calonsiswa->setPekerjaanIbu($this->input->post('inputPekerjaanIbu'));

			$this->M_calonsiswa->setPenghasilanAyah($this->input->post('inputPenghasilanAyah'));
			$this->M_calonsiswa->setPenghasilanIbu($this->input->post('inputPenghasilanIbu'));
			$this->M_calonsiswa->setEmailAyah($this->input->post('inputEmailAyah'));
			$this->M_calonsiswa->setEmailIbu($this->input->post('inputEmailIbu'));
			$this->M_calonsiswa->setAlamatOrtu($this->input->post('inputAlamatOrtu'));
			$this->M_calonsiswa->setHPOrtu($this->input->post('inputHPOrtu'));

			$this->M_calonsiswa->setPrestasi($this->input->post('inputPrestasi'));

			$this->M_calonsiswa->setBinSmt1($this->input->post('inputBinSmt1'));
			$this->M_calonsiswa->setBinSmt2($this->input->post('inputBinSmt2'));
			$this->M_calonsiswa->setBinSmt3($this->input->post('inputBinSmt3'));
			$this->M_calonsiswa->setBinSmt4($this->input->post('inputBinSmt4'));
			$this->M_calonsiswa->setBinSmt5($this->input->post('inputBinSmt5'));
			$this->M_calonsiswa->setBingSmt1($this->input->post('inputBingSmt1'));
			$this->M_calonsiswa->setBingSmt2($this->input->post('inputBingSmt2'));
			$this->M_calonsiswa->setBingSmt3($this->input->post('inputBingSmt3'));
			$this->M_calonsiswa->setBingSmt4($this->input->post('inputBingSmt4'));
			$this->M_calonsiswa->setBingSmt5($this->input->post('inputBingSmt5'));
			$this->M_calonsiswa->setMatSmt1($this->input->post('inputMatSmt1'));
			$this->M_calonsiswa->setMatSmt2($this->input->post('inputMatSmt2'));
			$this->M_calonsiswa->setMatSmt3($this->input->post('inputMatSmt3'));
			$this->M_calonsiswa->setMatSmt4($this->input->post('inputMatSmt4'));
			$this->M_calonsiswa->setMatSmt5($this->input->post('inputMatSmt5'));
			$this->M_calonsiswa->setIpaSmt1($this->input->post('inputIpaSmt1'));
			$this->M_calonsiswa->setIpaSmt2($this->input->post('inputIpaSmt2'));
			$this->M_calonsiswa->setIpaSmt3($this->input->post('inputIpaSmt3'));
			$this->M_calonsiswa->setIpaSmt4($this->input->post('inputIpaSmt4'));
			$this->M_calonsiswa->setIpaSmt5($this->input->post('inputIpaSmt5'));
			$this->M_calonsiswa->setIpsSmt1($this->input->post('inputIpsSmt1'));
			$this->M_calonsiswa->setIpsSmt2($this->input->post('inputIpsSmt2'));
			$this->M_calonsiswa->setIpsSmt3($this->input->post('inputIpsSmt3'));
			$this->M_calonsiswa->setIpsSmt4($this->input->post('inputIpsSmt4'));
			$this->M_calonsiswa->setIpsSmt5($this->input->post('inputIpsSmt5'));
			$this->M_calonsiswa->setAgamaSmt1($this->input->post('inputAgamaSmt1'));
			$this->M_calonsiswa->setAgamaSmt2($this->input->post('inputAgamaSmt2'));
			$this->M_calonsiswa->setAgamaSmt3($this->input->post('inputAgamaSmt3'));
			$this->M_calonsiswa->setAgamaSmt4($this->input->post('inputAgamaSmt4'));
			$this->M_calonsiswa->setAgamaSmt5($this->input->post('inputAgamaSmt5'));
			$this->M_calonsiswa->setPpknSmt1($this->input->post('inputPpknSmt1'));
			$this->M_calonsiswa->setPpknSmt2($this->input->post('inputPpknSmt2'));
			$this->M_calonsiswa->setPpknSmt3($this->input->post('inputPpknSmt3'));
			$this->M_calonsiswa->setPpknSmt4($this->input->post('inputPpknSmt4'));
			$this->M_calonsiswa->setPpknSmt5($this->input->post('inputPpknSmt5'));
			$this->M_calonsiswa->setPenjasSmt1($this->input->post('inputPenjasSmt1'));
			$this->M_calonsiswa->setPenjasSmt2($this->input->post('inputPenjasSmt2'));
			$this->M_calonsiswa->setPenjasSmt3($this->input->post('inputPenjasSmt3'));
			$this->M_calonsiswa->setPenjasSmt4($this->input->post('inputPenjasSmt4'));
			$this->M_calonsiswa->setPenjasSmt5($this->input->post('inputPenjasSmt5'));
			$this->M_calonsiswa->setSeniSmt1($this->input->post('inputSeniSmt1'));
			$this->M_calonsiswa->setSeniSmt2($this->input->post('inputSeniSmt2'));
			$this->M_calonsiswa->setSeniSmt3($this->input->post('inputSeniSmt3'));
			$this->M_calonsiswa->setSeniSmt4($this->input->post('inputSeniSmt4'));
			$this->M_calonsiswa->setSeniSmt5($this->input->post('inputSeniSmt5'));

			if ($this->input->post('inputLembaga')=='MA Unggulan Amanatul Ummah')
			{
				$data['psbmau'] = $this->M_calonsiswa->getPSBMAU();
				$nomorpsb = $this->zerofill($data['psbmau']+1, 3);
				$lembaga = 'MAU';
			}
			if ($this->input->post('inputLembaga')=='MBI Amanatul Ummah')
			{
				$data['psbmbi'] = $this->M_calonsiswa->getPSBMBI();
				$nomorpsb = $this->zerofill($data['psbmbi']+1, 3);
				$lembaga = 'MBI';
			}
			if ($this->input->post('inputKelompok')=='Gelombang 1')
				$urutkelompok = 'G1';
			if ($this->input->post('inputKelompok')=='Gelombang 2')
				$urutkelompok = 'G2';
			if ($this->input->post('inputKelompok')=='Gelombang 3')
				$urutkelompok = 'G3';
			if ($this->input->post('inputKelompok')=='Prestasi')
				$urutkelompok = 'P1';


			$tahunmasuk = SUBSTR($this->input->post('inputTahunMasuk'), 2);
			//$nomorpendaftaran dikasih kondisi apabila sudah punya nopendaftaran maka nomor psb tetap
			if($this->input->post('inputNoPendaftaran') !='')
			{
				$nopsbtetap = SUBSTR($this->input->post('inputNoPendaftaran'), -3);
				$nopendaftaran = 'PSB'.$lembaga.$urutkelompok.$tahunmasuk.$nopsbtetap;
			}
			else
			{
				$nopendaftaran = 'PSB'.$lembaga.$urutkelompok.$tahunmasuk.$nomorpsb;
			}
			
			$this->M_calonsiswa->setNoPendaftaran($nopendaftaran);	

			$this->do_unggahfoto($nopendaftaran); //unggah foto mestinya harus bisa upload foto ketika edit

			$query = $this->M_calonsiswa->updateDataSiswaFromAdmin();

			$this->session->set_flashdata('update_datasiswa_berhasil','Anda berhasil mengubah data siswa');
			$this->load->helper('url');
			redirect('admin/datasiswa','location');
		}

	}

	public function detailsiswa($nopendaftaran)
	{
		$this->load->library('session');
		$login = $this->session->userdata('login');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$data="";
			//title head
			$data['title']='Detail Siswa | PSB MAU-MBI Amanatul Ummah Surabaya';

			$this->load->model('M_calonsiswa');
			$this->M_calonsiswa->setNoPendaftaran($nopendaftaran);
			
			$query = $this->M_calonsiswa->getCalonSiswaByNoPendaftaran();
			
			if ($query->num_rows()>0)
			{
				foreach ($query->result() as $row)
				{
					//bukan pesan
					$data['iduser'] = $row->iduser;
					$data['nopendaftaran'] = $row->nopendaftaran;
					$data['lembaga'] = $row->lembaga;
					$data['kelompok'] = $row->kelompok;
					$data['tahunmasuk'] = $row->tahunmasuk;
					$data['nisn'] = $row->nisn;
					$data['nik'] = $row->nik;
					$data['noun'] = $row->noun;
					$data['nama'] = $row->nama;
					$data['panggilan'] = $row->panggilan;
					$data['jeniskelamin'] = $row->jeniskelamin;
					$data['tmplahir'] = $row->tmplahir;
					$data['tgllahir'] = $row->tgllahir;
					$data['agama'] = $row->agama;
					$data['suku'] = $row->suku;
					$data['kondisi'] = $row->kondisi;
					$data['warga'] = $row->warga;
					$data['anakke'] = $row->anakke;
					$data['jsaudara'] = $row->jsaudara;
					$data['alamatsiswa'] = $row->alamatsiswa;
					$data['desa'] = $row->desa;
					$data['rt'] = $row->rt;
					$data['rw'] = $row->rw;
					$data['kecamatan'] = $row->kecamatan;
					$data['kota'] = $row->kota;
					$data['provinsi'] = $row->provinsi;
					$data['kodepos'] = $row->kodepos;
					$data['jarak'] = $row->jarak;
					$data['hpsiswa'] = $row->hpsiswa;
					$data['emailsiswa'] = $row->emailsiswa;
					$data['asalsekolah'] = $row->asalsekolah;
					$data['noijasah'] = $row->noijasah;
					$data['tglijasah'] = $row->tglijasah;
					$data['ketsekolah'] = $row->ketsekolah;
					$data['darah'] = $row->darah;
					$data['berat'] = $row->berat;
					$data['tinggi'] = $row->tinggi;
					$data['ukuransepatu'] = $row->ukuransepatu;
					$data['ukuranbaju'] = $row->ukuranbaju;
					$data['ukurancelana'] = $row->ukurancelana;
					$data['kesehatan'] = $row->kesehatan;
					$data['namaayah'] = $row->namaayah;
					$data['namaibu'] = $row->namaibu;
					$data['almayah'] = $row->almayah;
					$data['almibu'] = $row->almibu;
					$data['statusayah'] = $row->statusayah;
					$data['statusibu'] = $row->statusibu;
					$data['tmplahirayah'] = $row->tmplahirayah;
					$data['tmplahiribu'] = $row->tmplahiribu;
					$data['tgllahirayah'] = $row->tgllahirayah;
					$data['tgllahiribu'] = $row->tgllahiribu;
					$data['pendidikanayah'] = $row->pendidikanayah;
					$data['pendidikanibu'] = $row->pendidikanibu;
					$data['pekerjaanayah'] = $row->pekerjaanayah;
					$data['pekerjaanibu'] = $row->pekerjaanibu;
					$data['penghasilanayah'] = $row->penghasilanayah;
					$data['penghasilanibu'] = $row->penghasilanibu;
					$data['emailayah'] = $row->emailayah;
					$data['emailibu'] = $row->emailibu;
					$data['alamatortu'] = $row->alamatortu;
					$data['hportu'] = $row->hportu;
					$data['hobi'] = $row->hobi;
					$data['foto'] = $row->foto;
					$data['prestasi'] =	$row->prestasi;
					$data['binsmt1'] = $row->binsmt1;
					$data['binsmt2'] = $row->binsmt2;
					$data['binsmt3'] = $row->binsmt3;
					$data['binsmt4'] = $row->binsmt4;
					$data['binsmt5'] = $row->binsmt5;
					$data['bingsmt1'] = $row->bingsmt1;
					$data['bingsmt2'] = $row->bingsmt2;
					$data['bingsmt3'] = $row->bingsmt3;
					$data['bingsmt4'] = $row->bingsmt4;
					$data['bingsmt5'] = $row->bingsmt5;
					$data['matsmt1'] = $row->matsmt1;
					$data['matsmt2'] = $row->matsmt2;
					$data['matsmt3'] = $row->matsmt3;
					$data['matsmt4'] = $row->matsmt4;
					$data['matsmt5'] = $row->matsmt5;
					$data['ipasmt1'] = $row->ipasmt1;
					$data['ipasmt2'] = $row->ipasmt2;
					$data['ipasmt3'] = $row->ipasmt3;
					$data['ipasmt4'] = $row->ipasmt4;
					$data['ipasmt5'] = $row->ipasmt5;
					$data['ipssmt1'] = $row->ipssmt1;
					$data['ipssmt2'] = $row->ipssmt2;
					$data['ipssmt3'] = $row->ipssmt3;
					$data['ipssmt4'] = $row->ipssmt4;
					$data['ipssmt5'] = $row->ipssmt5;
					$data['agamasmt1'] = $row->agamasmt1;
					$data['agamasmt2'] = $row->agamasmt2;
					$data['agamasmt3'] = $row->agamasmt3;
					$data['agamasmt4'] = $row->agamasmt4;
					$data['agamasmt5'] = $row->agamasmt5;
					$data['ppknsmt1'] = $row->ppknsmt1;
					$data['ppknsmt2'] = $row->ppknsmt2;
					$data['ppknsmt3'] = $row->ppknsmt3;
					$data['ppknsmt4'] = $row->ppknsmt4;
					$data['ppknsmt5'] = $row->ppknsmt5;
					$data['penjassmt1']	= $row->penjassmt1;
					$data['penjassmt2']	= $row->penjassmt2;
					$data['penjassmt3']	= $row->penjassmt3;
					$data['penjassmt4']	= $row->penjassmt4;
					$data['penjassmt5']	= $row->penjassmt5;
					$data['senismt1'] = $row->senismt1;
					$data['senismt2'] = $row->senismt2;
					$data['senismt3'] = $row->senismt3;
					$data['senismt4'] = $row->senismt4;
					$data['senismt5'] = $row->senismt5;

				}
			}

			//$this->load->view('admin/v_detailsiswa', $data);
			//$this->load->view('calonsiswa/cetak', $data);

			// dapatkan output html
			$html = $this->output->get_output($this->load->view('admin/v_detailsiswa', $data));
			
			// Load/panggil library dompdfnya
			$this->load->library('dompdf_gen');

			$this->dompdf->set_paper('A4', 'potrait');

			// Convert to PDF
			$this->dompdf->load_html($html);
			$this->dompdf->render();
			
			$link = base_url().'admin/detailsiswa/'.$nopendaftaran;
			$date = date("d/m/Y");

			$canvas = $this->dompdf->get_canvas();
			//header
			$canvas->page_text(34, 15, $date, $font, 8, array(0,0,0));
			$canvas->page_text(210, 15, "PSB MAU-MBI Surabaya [Cetak Bukti Pendaftaran]", $font, 8, array(0,0,0));
			
			//footer
			$canvas->page_text(34, 800, $link, $font, 8, array(0,0,0));
			$canvas->page_text(522, 800, "Page: {PAGE_NUM} of {PAGE_COUNT}", $font, 8, array(0,0,0));
			
			//utk menampilkan preview pdf
			$this->dompdf->stream("Data Siswa-$row->nama.pdf",array('Attachment'=>0));
		}

	}
	public function hapussiswa($nopendaftaran)
	{
		$this->load->library('session');
		$login = $this->session->userdata('login');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$data="";

			$this->load->model('M_calonsiswa');
			$this->M_calonsiswa->setNoPendaftaran($nopendaftaran);
			
			$this->M_calonsiswa->hapusDataSiswa();

			$this->session->set_flashdata('hapus_siswa_berhasil','Anda berhasil menghapus siswa');
			$this->load->helper('url');
			redirect('admin/datasiswa', 'location');
		}
	}

	/*----------------*/

	public function pencariansiswa()
	{
		$this->load->library('session');
		$login = $this->session->userdata('login');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{

			$data="";
			//menu active
			$data=array(	
				'dashboard_active' 			=> 'class=""',
				'datasiswa_active' 			=> 'class=""',
				'pencariansiswa_active' 	=> 'class="active"',
				'referensi_active' 			=> 'class=""',
				'admin_active' 				=> 'class=""',
				'tambahadmin_active' 		=> 'class=""',
				'profil_active' 			=> 'class=""',
				'resetpassword_active' 		=> 'class=""'
				);

			//title head
			$data['title']='Cari Siswa | PSB MAU-MBI Amanatul Ummah Surabaya';
			$data['namaadmin'] = $this->session->userdata('nama');

			$this->load->view('admin/v_pencariansiswa', $data);
		}
	}

	public function referensi()
	{
		$this->load->library('session');
		$login = $this->session->userdata('login');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$data="";
			//menu active
			$data=array(	
				'dashboard_active' 			=> 'class=""',
				'datasiswa_active' 			=> 'class=""',
				'pencariansiswa_active' 	=> 'class=""',
				'referensi_active' 			=> 'class="active"',
				'admin_active' 				=> 'class=""',
				'tambahadmin_active' 		=> 'class=""',
				'profil_active' 			=> 'class=""',
				'resetpassword_active' 		=> 'class=""'
				);

			//title head
			$data['title']='Referensi | PSB MAU-MBI Amanatul Ummah Surabaya';
			$data['namaadmin'] = $this->session->userdata('nama');
		
			$this->load->view('admin/v_referensi', $data);
		}
	}

	/*REFERENSI LEMBAGA*/
	public function referensi_lembaga()
	{
		$this->load->library('session');
		$login = $this->session->userdata('login');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$data="";
			//menu active
			$data=array(	
				'dashboard_active' 			=> 'class=""',
				'datasiswa_active' 			=> 'class=""',
				'pencariansiswa_active' 	=> 'class=""',
				'referensi_active' 			=> 'class="active"',
				'admin_active' 				=> 'class=""',
				'tambahadmin_active' 		=> 'class=""',
				'profil_active' 			=> 'class=""',
				'resetpassword_active' 		=> 'class=""'
				);

			//title head
			$data['title']='Referensi Lembaga | PSB MAU-MBI Amanatul Ummah Surabaya';
			$data['namaadmin'] = $this->session->userdata('nama');
			//notifikasi
			$data['tambah_lembaga_berhasil'] = $this->session->flashdata('tambah_lembaga_berhasil');
			$data['hapus_lembaga_berhasil'] = $this->session->flashdata('hapus_lembaga_berhasil');
			$data['update_lembaga_berhasil'] = $this->session->flashdata('update_lembaga_berhasil');

			$this->load->model('M_referensi');
			$data['query'] = $this->M_referensi->getAllLembaga();
		
			$this->load->view('admin/v_reflembaga', $data);
		}
	}

	public function do_tambahlembaga()
	{
		$this->load->library('session');
		$login = $this->session->userdata('login');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$data="";
			//menu active

			$this->load->model('M_referensi');
			$this->M_referensi->setLembaga($this->input->post('inputLembaga'));
			$this->M_referensi->setUrutan($this->input->post('inputUrutan'));
			$this->M_referensi->setKeterangan($this->input->post('inputKeterangan'));

			$this->M_referensi->addLembaga();

			$this->session->set_flashdata('tambah_lembaga_berhasil', 'Anda berhasil menambahkan lembaga, Silahkan aktifasi lembaga');
			redirect('admin/referensi_lembaga', 'location');
		}
	}
	public function do_hapuslembaga($idlembaga)
	{
		$this->load->library('session');
		$login = $this->session->userdata('login');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$data="";
			//menu active
			$this->load->model('M_referensi');
			$this->M_referensi->setIdLembaga($idlembaga);

			$this->M_referensi->deleteLembaga();
			$this->session->set_flashdata('hapus_lembaga_berhasil', 'Anda berhasil menghapus lembaga');
			redirect('admin/referensi_lembaga', 'location');
		}
	}
	public function do_updatelembaga($idlembaga)
	{
		$this->load->library('session');
		$login = $this->session->userdata('login');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$data="";
			//menu active
			$this->load->model('M_referensi');
			$this->M_referensi->setIdLembaga($idlembaga);
			$this->M_referensi->setLembaga($this->input->post('inputLembaga'));
			$this->M_referensi->setUrutan($this->input->post('inputUrutan'));
			$this->M_referensi->setKeterangan($this->input->post('inputKeterangan'));

			$this->M_referensi->updateLembaga();
			$this->session->set_flashdata('update_lembaga_berhasil', 'Anda berhasil mengubah data lembaga');
			redirect('admin/referensi_lembaga', 'location');
		}
	}

	/* END REFERENSI LEMBAGA*/

	/* REFERENSI TAHUN MASUK */
	public function referensi_tahun()
	{
		$this->load->library('session');
		$login = $this->session->userdata('login');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$data="";
			//menu active
			$data=array(	
				'dashboard_active' 			=> 'class=""',
				'datasiswa_active' 			=> 'class=""',
				'pencariansiswa_active' 	=> 'class=""',
				'referensi_active' 			=> 'class="active"',
				'admin_active' 				=> 'class=""',
				'tambahadmin_active' 		=> 'class=""',
				'profil_active' 			=> 'class=""',
				'resetpassword_active' 		=> 'class=""'
				);

			//title head
			$data['title']='Referensi Tahun Masuk | PSB MAU-MBI Amanatul Ummah Surabaya';
			$data['namaadmin'] = $this->session->userdata('nama');
			//notifikasi
			$data['tambah_tahun_berhasil'] = $this->session->flashdata('tambah_tahun_berhasil');
			$data['tahun_masuk_sudah_ada'] = $this->session->flashdata('tahun_masuk_sudah_ada');
			$data['update_tahun_berhasil'] = $this->session->flashdata('update_tahun_berhasil');
			$data['hapus_tahun_berhasil'] = $this->session->flashdata('hapus_tahun_berhasil');

			$this->load->model('M_referensi');
			$data['_lembaga'] = $this->M_referensi->getLembaga();

			//$data['query'] = $this->M_referensi->getAllTahunMasuk();
			$lembaga = $this->input->get('lembaga');
			$data['query'] = $this->M_referensi->getAllTahunMasuk($lembaga);
			
			if($data['query']->num_rows()>0)
			{
				$data['status'] = 1;
				$data['carilembaga'] = $lembaga;
				$this->load->view('admin/ajax/ajax_table_tahunmasuk', $data);
			}
			else{
				$this->load->view('admin/v_reftahunmasuk', $data);
			}
		
		}

	}

	public function do_tambahtahun()
	{
		$this->load->library('session');
		$login = $this->session->userdata('login');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$data="";

			$this->load->model('M_referensi');

			$lembaga = $this->input->post('inputLembaga');
			$this->M_referensi->setTahunMasuk($this->input->post('inputTahunMasuk'));
			$query = $this->M_referensi->checkTahunMasuk($lembaga);
			if($query->num_rows() > 0)
			{
				$this->session->set_flashdata('tahun_masuk_sudah_ada', 'Tahun Masuk sudah ada pada lembaga '.$lembaga.', Silahkan masukkan tahun lain !');
				redirect('admin/referensi_tahun', 'location');
			}

			$this->M_referensi->setLembaga($lembaga);
			$this->M_referensi->setKeterangan($this->input->post('inputKeterangan'));
			
			$this->M_referensi->addTahunMasuk();
			$this->session->set_flashdata('tambah_tahun_berhasil', 'Anda berhasil menambah tahun masuk pada lembaga '.$lembaga.'');
			redirect('admin/referensi_tahun', 'location');
		}
	}

	public function do_updatetahun($idtahunmasuk)
	{
		$this->load->library('session');
		$login = $this->session->userdata('login');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$data="";
			$this->load->model('M_referensi');
			$lembaga = $this->input->post('inputLembaga');
			$this->M_referensi->setTahunMasuk($this->input->post('inputTahunMasuk'));

			$this->M_referensi->setIdTahunMasuk($idtahunmasuk);
			$this->M_referensi->setLembaga($lembaga);
			$this->M_referensi->setKeterangan($this->input->post('inputKeterangan'));
			$this->M_referensi->updateTahunMasuk();

			$this->session->set_flashdata('update_tahun_berhasil', 'Anda berhasil mengubah data tahun masuk');
			redirect('admin/referensi_tahun', 'location');
		}
	}

	public function do_hapustahun($idtahunmasuk)
	{
		$this->load->library('session');
		$login = $this->session->userdata('login');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$data="";
			$this->load->model('M_referensi');
			$this->M_referensi->setIdTahunMasuk($idtahunmasuk);
			$this->M_referensi->deleteTahunMasuk();
			$this->session->set_flashdata('hapus_tahun_berhasil', 'Anda berhasil menghapus tahun masuk');
			redirect('admin/referensi_tahun', 'location');
		}
	}

	public function do_aktiftahun($idtahunmasuk)
	{
		$this->load->library('session');
		$login = $this->session->userdata('login');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$data="";
			$this->load->model('M_referensi');
			$this->M_referensi->setIdTahunMasuk($idtahunmasuk);
			
			$this->M_referensi->setAktif($this->input->get('aktif'));
			$this->M_referensi->setLembaga($this->input->get('lembaga'));

			//echo $this->input->get('aktif');
			//echo $this->input->get('lembaga');

			$this->M_referensi->setPasifAllTahunMasuk();
			$this->M_referensi->setAktifTahunMasuk();

			redirect('admin/referensi_tahun', 'location');
		}
	}


	/* END REFERENSI TAHUN MASUK */

	/* REFERENSI PROSES PENERIMAAN */
	public function referensi_prosespenerimaan()
	{
		$this->load->library('session');
		$login = $this->session->userdata('login');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$data="";
			//menu active
			$data=array(	
				'dashboard_active' 			=> 'class=""',
				'datasiswa_active' 			=> 'class=""',
				'pencariansiswa_active' 	=> 'class=""',
				'referensi_active' 			=> 'class="active"',
				'admin_active' 				=> 'class=""',
				'tambahadmin_active' 		=> 'class=""',
				'profil_active' 			=> 'class=""',
				'resetpassword_active' 		=> 'class=""'
				);

			//title head
			$data['title']='Referensi Proses Penerimaan | PSB MAU-MBI Amanatul Ummah Surabaya';
			$data['namaadmin'] = $this->session->userdata('nama');
			//notifikasi
			$data['kode_awalan_sudah_ada'] = $this->session->flashdata('kode_awalan_sudah_ada');
			$data['tambah_proses_berhasil'] = $this->session->flashdata('tambah_proses_berhasil');
			$data['update_proses_berhasil'] = $this->session->flashdata('update_proses_berhasil');
			$data['hapus_proses_berhasil'] = $this->session->flashdata('hapus_proses_berhasil');

			$this->load->model('M_referensi');
			$data['_lembaga'] = $this->M_referensi->getLembaga();

			$lembaga = $this->input->post('lembaga');
			$data['query'] = $this->M_referensi->getProsesPenerimaan($lembaga);
			//$data['proses'] = '<script>$(document).ready(function(){$("#ref_proses").submit();});</script>';
			//$data['status'] = 0;
			
			if($data['query']->num_rows()>0)
			{
				$data['status'] = 1;
				$data['carilembaga'] = $lembaga;
				$this->load->view('admin/ajax/ajax_table_prosespenerimaan', $data);
			}
			else{
				$this->load->view('admin/v_refprosespenerimaan', $data);
			}
		}
	}
	public function do_tambahproses()
	{
		$this->load->library('session');
		$login = $this->session->userdata('login');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$data="";

			$this->load->model('M_referensi');

			$lembaga = $this->input->post('inputLembaga');
			$this->M_referensi->setKodeAwalan($this->input->post('inputKodeAwalan'));

			$query = $this->M_referensi->getKodeAwalan();
			if($query->num_rows() > 0)
			{
				$this->session->set_flashdata('kode_awalan_sudah_ada', 'Kode Awalan sudah ada pada lembaga '.$lembaga.', Silahkan masukkan kode awalan lain !');
				redirect('admin/referensi_prosespenerimaan', 'location');
			}

			$this->M_referensi->setProses($this->input->post('inputProses'));
			$this->M_referensi->setLembaga($lembaga);
			$this->M_referensi->setKeterangan($this->input->post('inputKeterangan'));
			
			$this->M_referensi->addProsesPenerimaan();
			$this->session->set_flashdata('tambah_proses_berhasil', 'Anda berhasil menambah proses penerimaan pada lembaga '.$lembaga.'');
			redirect('admin/referensi_prosespenerimaan', 'location');
		}
	}
	public function do_updateproses($idprosespenerimaan)
	{
		$this->load->library('session');
		$login = $this->session->userdata('login');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$data="";
			$this->load->model('M_referensi');
			$lembaga = $this->input->post('inputLembaga');
			$this->M_referensi->setIdProsesPenerimaan($idprosespenerimaan);
			$this->M_referensi->setKodeAwalan($this->input->post('inputKodeAwalan'));
			$this->M_referensi->setProses($this->input->post('inputProses'));
			$this->M_referensi->setLembaga($lembaga);
			$this->M_referensi->setKeterangan($this->input->post('inputKeterangan'));
			
			$this->M_referensi->updateProsesPenerimaan();
			$this->session->set_flashdata('update_proses_berhasil', 'Anda berhasil mengubah proses penerimaan pada lembaga '.$lembaga.'');
			redirect('admin/referensi_prosespenerimaan', 'location');
		}
	}

	public function do_hapusproses($idprosespenerimaan)
	{
		$this->load->library('session');
		$login = $this->session->userdata('login');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$data="";
			$this->load->model('M_referensi');
			$this->M_referensi->setIdProsesPenerimaan($idprosespenerimaan);
			$this->M_referensi->deleteProsesPenerimaan();
			$this->session->set_flashdata('hapus_proses_berhasil', 'Anda berhasil menghapus proses penerimaan');
			redirect('admin/referensi_prosespenerimaan', 'location');
		}
	}

	/* END REFERENSI PROSES PENERIMAAN */

	public function referensi_kelompok()
	{
		$this->load->library('session');
		$login = $this->session->userdata('login');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$data="";
			//menu active
			$data=array(	
				'dashboard_active' 			=> 'class=""',
				'datasiswa_active' 			=> 'class=""',
				'pencariansiswa_active' 	=> 'class=""',
				'referensi_active' 			=> 'class="active"',
				'admin_active' 				=> 'class=""',
				'tambahadmin_active' 		=> 'class=""',
				'profil_active' 			=> 'class=""',
				'resetpassword_active' 		=> 'class=""'
				);

			//title head
			$data['title']='Referensi Kelompok | PSB MAU-MBI Amanatul Ummah Surabaya';
			$data['namaadmin'] = $this->session->userdata('nama');

			$this->load->model('M_referensi');
			$data['_lembaga'] = $this->M_referensi->getLembaga();
			$lembaga = $this->input->post('lembaga');
			$query = $this->M_referensi->getProsesPenerimaanAktif($lembaga);
			if ($query->num_rows()>0){
					foreach ($query->result() as $row)
					{
						$data['idprosespenerimaan']  = $row->idprosespenerimaan;
						$data['proses']  = $row->proses;
					}
				}
			$idprosespenerimaan = $this->input->post('idproses');
			
			$data['query'] = $this->M_referensi->getAllKelompok($idprosespenerimaan);

			if($data['query']->num_rows()>0)
			{
				$data['status'] = 1;
				$data['carilembaga'] = $lembaga;
				//$data['v_tabelkelompok'] = $this->load->view('admin/tabelreferensi/v_tabelkelompok', $data);
				$this->load->view('admin/ajax/ajax_table_kelompok', $data);
				//redirect('admin/referensi_kelompok');
				//$this->load->view('admin/v_refkelompok', $data);
			}
			else{
				$this->load->view('admin/v_refkelompok', $data);
			}
		}
	}

	public function dataadmin()
	{
		$this->load->library('session');
		$login = $this->session->userdata('login');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$data="";
			//menu active
			$data=array(	
				'dashboard_active' 			=> 'class=""',
				'datasiswa_active' 			=> 'class=""',
				'pencariansiswa_active' 	=> 'class=""',
				'referensi_active' 			=> 'class=""',
				'admin_active' 				=> 'class="active"',
				'tambahadmin_active' 		=> 'class=""',
				'profil_active' 			=> 'class=""',
				'resetpassword_active' 		=> 'class=""'
				);

			//title head
			$data['title']='Data Admin | PSB MAU-MBI Amanatul Ummah Surabaya';
			$data['namaadmin'] = $this->session->userdata('nama');
		
			$this->load->view('admin/v_dataadmin', $data);
		}
	}

	public function tambahadmin()
	{
		$this->load->library('session');
		$login = $this->session->userdata('login');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$data="";
			//menu active
			$data=array(	
				'dashboard_active' 			=> 'class=""',
				'datasiswa_active' 			=> 'class=""',
				'pencariansiswa_active' 	=> 'class=""',
				'referensi_active' 			=> 'class=""',
				'admin_active' 				=> 'class=""',
				'tambahadmin_active' 		=> 'class="active"',
				'profil_active' 			=> 'class=""',
				'resetpassword_active' 		=> 'class=""'
				);

			//title head
			$data['title']='Tambah Admin | PSB MAU-MBI Amanatul Ummah Surabaya';
			$data['namaadmin'] = $this->session->userdata('nama');
		
			$this->load->view('admin/v_tambahadmin', $data);
		}
	}
	

	public function profil()
	{
		$this->load->library('session');
		$login = $this->session->userdata('login');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$data="";
			//menu active
			$data=array(	
				'dashboard_active' 			=> 'class=""',
				'datasiswa_active' 			=> 'class=""',
				'pencariansiswa_active' 	=> 'class=""',
				'referensi_active' 			=> 'class=""',
				'admin_active' 				=> 'class=""',
				'tambahadmin_active' 		=> 'class=""',
				'profil_active' 			=> 'class="active"',
				'resetpassword_active' 		=> 'class=""'
				);

			//title head
			$data['title']='Profil Admin | PSB MAU-MBI Amanatul Ummah Surabaya';
			$data['namaadmin'] = $this->session->userdata('nama');
		
			$this->load->view('admin/v_profiladmin', $data);
		}
	}

	public function resetpassword()
	{
		$this->load->library('session');
		$login = $this->session->userdata('login');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
			$data="";
			//menu active
			$data=array(	
				'dashboard_active' 			=> 'class=""',
				'datasiswa_active' 			=> 'class=""',
				'pencariansiswa_active' 	=> 'class=""',
				'referensi_active' 			=> 'class=""',
				'admin_active' 				=> 'class=""',
				'tambahadmin_active' 		=> 'class=""',
				'profil_active' 			=> 'class=""',
				'resetpassword_active' 		=> 'class="active"'
				);

			//title head
			$data['title']='Reset Password Siswa | PSB MAU-MBI Amanatul Ummah Surabaya';
			$data['namaadmin'] = $this->session->userdata('nama');
			//notifikasi
			$data['reset_password_berhasil'] = $this->session->flashdata('reset_password_berhasil');
			$data['email_belum_terdaftar'] = $this->session->flashdata('email_belum_terdaftar');
		
			$this->load->view('admin/v_resetpassword', $data);
		}
	}

	public function do_resetpassword()
	{
		$this->load->library('session');
		$login = $this->session->userdata('login');
		if ($login==false)
		{
			$this->load->helper('url');
			redirect('admin','location');
		}
		else
		{
	
			$this->load->model('M_user');
			$this->M_user->setEmail($this->input->post('inputEmail'));
			$query = $this->M_user->getEmail();
			if($query->num_rows()==0)
			{
				$this->session->set_flashdata('email_belum_terdaftar','Maaf ! Email siswa belum terdaftar');
				redirect('admin/resetpassword', 'location');
			}
			$passwordbaru = $this->input->post('inputPassword');
			$this->M_user->setPassword($passwordbaru);

			$this->M_user->updatePassword();
			$this->session->set_flashdata('reset_password_berhasil', 'Anda berhasil reset password siswa dengan password baru "'.$passwordbaru.'"');
			redirect('admin/resetpassword', 'location');
		}
	}


}



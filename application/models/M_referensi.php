<?php
	class M_referensi extends CI_Model
	{

		private $idagama;
		private $agama;
		private $idpekerjaan;
		private $pekerjaan;
		private $idkelompok;
		private $kelompok;
		//private $urut;
		private $kapasitas;
		private $idkondisi;
		private $kondisi;
		private $idlembaga;
		private $lembaga;
		private $idpenghasilan;
		private $penghasilan;
		private $idstatusortu;
		private $statusortu;
		private $idsuku;
		private $suku;
		private $idtahunmasuk;
		private $tahunmasuk;
		private $idpendidikan;
		private $pendidikan;
		private $idprosespenerimaan;
		private $proses;
		private $kodeawalan;
		private $urutan;
		private $keterangan;
		private $aktif;
		private $ts;


		public function __construct()
		{
			parent::__construct();
		}
		public function setIdAgama($idagama)
		{
			$this->idagama = $idagama;
		} 
		public function setAgama($agama)
		{
			$this->agama = $agama;
		} 
		public function setIdPekerjaan($idpekerjaan)
		{
			$this->idpekerjaan = $idpekerjaan;
		} 
		public function setPekerjaan($pekerjaan)
		{
			$this->pekerjaan = $pekerjaan;
		}
		public function setIdKelompok($idkelompok)
		{
			$this->idkelompok = $idkelompok;
		}  
		public function setKelompok($kelompok)
		{
			$this->kelompok = $kelompok;
		}
		public function setUrutKelompok($urut)
		{
			$this->urut = $urut;
		}    
		public function setKapasitas($idkapasitas)
		{
			$this->idkapasitas = $idkapasitas;
		}	
		public function setIdKondisi($idkondisi)
		{
			$this->idkondisi = $idkondisi;
		}
		public function setKondisi($kondisi)
		{
			$this->kondisi = $kondisi;
		}
		public function setIdLembaga($idlembaga)
		{
			$this->idlembaga = $idlembaga;
		}
		public function setLembaga($lembaga)
		{
			$this->lembaga = $lembaga;
		}
		public function setIdPenghasilan($idpenghasilan)
		{
			$this->idpenghasilan = $idpenghasilan;
		}
		public function setPenghasilan($penghasilan)
		{
			$this->penghasilan = $penghasilan;
		}
		public function setIdStatusOrtu($idstatusortu)
		{
			$this->idstatusortu = $idstatusortu;
		}
		public function setStatusOrtu($statusortu)
		{
			$this->statusortu = $statusortu;
		}
		public function setIdSuku($idsuku)
		{
			$this->idsuku = $idsuku;
		}
		public function setSuku($suku)
		{
			$this->suku = $suku;
		}
		public function setIdTahunMasuk($idtahunmasuk)
		{
			$this->idtahunmasuk = $idtahunmasuk;
		}
		public function setTahunMasuk($tahunmasuk)
		{
			$this->tahunmasuk = $tahunmasuk;
		}		
		public function setIdPendidikan($idpendidikan)
		{
			$this->idpendidikan = $idpendidikan;
		}
		public function setPendidikan($pendidikan)
		{
			$this->pendidikan = $pendidikan;
		}
		public function setUrutan($urutan)
		{
			$this->urutan = $urutan;
		}
		public function setKeterangan($keterangan)
		{
			$this->keterangan = $keterangan;
		}
		public function setIdProsesPenerimaan($idprosespenerimaan)
		{
			$this->idprosespenerimaan = $idprosespenerimaan;
		}
		public function setProses($proses)
		{
			$this->proses = $proses;
		}
		public function setKodeAwalan($kodeawalan)
		{
			$this->kodeawalan = $kodeawalan;
		}
		public function setAktif($aktif)
		{
			$this->aktif = $aktif;
		}

		
		public function getAgama()
		{
			//$this->db->cache_on();
			$query = $this->db->query
			("
				SELECT agama FROM psb_agama
				ORDER BY urutan ASC
			");
			$this->db->close();
			return $query;
		}
		public function getPekerjaan()
		{
			//$this->db->cache_on();
			$query = $this->db->query
			("
				SELECT pekerjaan FROM psb_jenispekerjaan
			");
			$this->db->close();
			return $query;
		}
		public function getKondisi()
		{
			//$this->db->cache_on();
			$query = $this->db->query
			("
				SELECT kondisi FROM psb_kondisisiswa
				ORDER BY urutan ASC
			");
			$this->db->close();
			return $query;
		}
		public function getPendidikan()
		{
			//$this->db->cache_on();
			$query = $this->db->query
			("
				SELECT pendidikan FROM psb_tingkatpendidikan
			");
			$this->db->close();
			return $query;
		}
		public function getPenghasilan()
		{
			//$this->db->cache_on();
			$query = $this->db->query
			("
				SELECT penghasilan FROM psb_penghasilan
				ORDER BY urutan ASC
			");
			$this->db->close();
			return $query;
		}
		public function getStatusOrtu()
		{
			//$this->db->cache_on();
			$query = $this->db->query
			("
				SELECT statusortu FROM psb_statusortu
				ORDER BY urutan ASC
			");
			$this->db->close();
			return $query;
		}
		public function getSuku()
		{
			//$this->db->cache_on();
			$query = $this->db->query
			("
				SELECT suku FROM psb_suku
				ORDER BY urutan ASC
			");
			$this->db->close();
			return $query;
		}


		//KELOMPOK
		public function getKelompok($idprosespenerimaan)
		{
			//$this->db->cache_on();
			$query = $this->db->query
			("
				SELECT kelompok FROM psb_kelompokcalonsiswa
				WHERE idprosespenerimaan = '$idprosespenerimaan'
			");
			$this->db->close();
			return $query;
		}
		public function getAllKelompok($idprosespenerimaan)
		{
			$query = $this->db->query
			("
				SELECT * FROM psb_kelompokcalonsiswa
				WHERE idprosespenerimaan = '$idprosespenerimaan'
			");
			$this->db->close();
			return $query;
		}

		
		//LEMBAGA
		public function getLembaga()
		{
			//$this->db->cache_on();
			$query = $this->db->query
			("
				SELECT lembaga FROM psb_lembaga
				WHERE aktif='1'
				ORDER BY urutan ASC
			");
			$this->db->close();
			return $query;
		}
		public function getAllLembaga()
		{
			//$this->db->cache_on();
			$query = $this->db->query
			("
				SELECT * FROM psb_lembaga
				ORDER BY urutan ASC
			");
			$this->db->close();
			return $query;
		}
		public function addLembaga()
		{
			$query = $this->db->query
			("
				INSERT INTO psb_lembaga(lembaga, urutan, keterangan, aktif, ts)
				VALUES(
					'$this->lembaga',
					'$this->urutan',
					'$this->keterangan',
					'1',
					NOW()
				)
			");
			$this->db->close();
			return $query;
		}
		public function deleteLembaga()
		{
			$query = $this->db->query
			("
				DELETE FROM psb_lembaga
					WHERE idlembaga = '$this->idlembaga'
			");
			$this->db->close();
			return $query;
		}
		public function updateLembaga()
		{
			$query = $this->db->query
			("
				UPDATE psb_lembaga
					SET 
						lembaga = '$this->lembaga',
						urutan = '$this->urutan',
						keterangan = '$this->keterangan',
						ts = NOW()
					WHERE idlembaga = '$this->idlembaga'
			");
			$this->db->close();
			return $query;
		}


		//TAHUN MASUK
		public function getTahunMasuk($lembaga)
		{
			//$this->db->cache_on();
			$query = $this->db->query
			("
				SELECT tahunmasuk FROM psb_tahunmasuk
				WHERE lembaga = '$lembaga' AND aktif='1'
					
			");
			$this->db->close();
			return $query;
		}
		public function getAllTahunMasuk($lembaga)
		{
			//$this->db->cache_on();
			$query = $this->db->query
			("
				SELECT * FROM psb_tahunmasuk
				WHERE lembaga = '$lembaga'
			");
			$this->db->close();
			return $query;
		}
		public function getTahunMasukAktif()
		{
			$query = $this->db->query
			("
				SELECT tahunmasuk FROM psb_tahunmasuk
						WHERE aktif='1'
			");
			if ($query->num_rows()>0){
					foreach ($query->result() as $row)
						$data['tahunmasukaktif'] = $row->tahunmasuk;
				}
			return $data['tahunmasukaktif'];
		}
		public function checkTahunMasuk($lembaga)
		{
			//$this->db->cache_on();
			$query = $this->db->query
			("
				SELECT tahunmasuk FROM psb_tahunmasuk
				WHERE lembaga = '$lembaga' AND tahunmasuk='$this->tahunmasuk'
					
			");
			$this->db->close();
			return $query;
		}
		public function addTahunMasuk()
		{
			//$this->db->cache_on();
			$query = $this->db->query
			("
				INSERT INTO psb_tahunmasuk(tahunmasuk, lembaga, keterangan, ts)
				VALUES(
					'$this->tahunmasuk',
					'$this->lembaga',
					'$this->keterangan',
					NOW()
				)
			");
			$this->db->close();
			return $query;
		}
		public function updateTahunMasuk()
		{
			$query = $this->db->query
			("
				UPDATE psb_tahunmasuk
					SET 
						tahunmasuk = '$this->tahunmasuk',
						lembaga = '$this->lembaga',
						keterangan = '$this->keterangan',
						ts = NOW()
					WHERE idtahunmasuk = '$this->idtahunmasuk'
			");
			$this->db->close();
			return $query;
		}
		public function deleteTahunMasuk()
		{
			//$this->db->cache_on();
			$query = $this->db->query
			("
				DELETE FROM psb_tahunmasuk
				WHERE idtahunmasuk = '$this->idtahunmasuk'
			");
			$this->db->close();
			return $query;
		}
		public function setPasifAllTahunMasuk()
		{
			$query = $this->db->query
			("
				UPDATE psb_tahunmasuk
					SET 
						aktif = '0',
						ts = NOW()
					WHERE lembaga = '$this->lembaga'
			");
			$this->db->close();
			return $query;
		}
		public function setAktifTahunMasuk()
		{
			$query = $this->db->query
			("
				UPDATE psb_tahunmasuk
					SET 
						aktif = '$this->aktif',
						ts = NOW()
					WHERE idtahunmasuk = '$this->idtahunmasuk'
						AND lembaga = '$this->lembaga'
			");
			$this->db->close();
			return $query;
		}

		//PROSES PENERIMAAN CALON SISWA
		public function getProsesPenerimaan($lembaga)
		{
			//$this->db->cache_on();
			$query = $this->db->query
			("
				SELECT * FROM psb_prosespenerimaan
				WHERE lembaga = '$lembaga'
			");
			$this->db->close();
			return $query;
		}
		public function getProsesPenerimaanAktif($lembaga)
		{
			
			$query = $this->db->query
			("
				SELECT * FROM psb_prosespenerimaan
				WHERE lembaga = '$lembaga' AND aktif='1'
			");
			$this->db->close();
			return $query;
		}
		public function addProsesPenerimaan()
		{
			$query = $this->db->query
			("
				INSERT INTO psb_prosespenerimaan(proses, kodeawalan, lembaga, keterangan, ts)
				VALUES(
					'$this->proses',
					'$this->kodeawalan',
					'$this->lembaga',
					'$this->keterangan',
					NOW()
				)
			");
			$this->db->close();
			return $query;
		}
		public function getKodeAwalan()
		{
			$query = $this->db->query
			("
				SELECT kodeawalan FROM psb_prosespenerimaan
				WHERE kodeawalan = '$this->kodeawalan'
			");
			$this->db->close();
			return $query;
		}
		public function updateProsesPenerimaan()
		{
			$query = $this->db->query
			("
				UPDATE psb_prosespenerimaan
					SET 
						proses = '$this->proses',
						kodeawalan = '$this->kodeawalan',
						lembaga = '$this->lembaga',
						keterangan = '$this->keterangan',
						ts = NOW()
					WHERE idprosespenerimaan = '$this->idprosespenerimaan'
			");
			$this->db->close();
			return $query;
		}
		public function deleteProsesPenerimaan()
		{
			$query = $this->db->query
			("
				DELETE FROM psb_prosespenerimaan
					WHERE idprosespenerimaan = '$this->idprosespenerimaan'
			");
			$this->db->close();
			return $query;
		}

		

	}
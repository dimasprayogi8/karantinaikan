<?php
error_reporting(0);
defined('BASEPATH') or exit('No direct script access allowed');
class Administrator extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('form_validation');
		//$this ->load->library('googlemaps');
	}

	function index()
	{
		$data['record'] = $this->model_utama->karantinaikan();
		$this->template->load('administrator/template', 'administrator/view_homebiasa', $data);
	}

	function login()
	{
		if (isset($_POST['submit'])) {
			$pw = md5($this->input->post('b'));
			$salt = "Q30@*YV";
			$username = $this->input->post('a');
			$password = crypt($pw, $salt);
			$cek = $this->model_users->cek_login($username, $password);
			$row = $cek->row_array();
			$total = $cek->num_rows();
			if ($total > 0) {
				//$this->session->set_userdata('upload_image_file_manager',true);
				$this->session->set_userdata(array('username' => $row['username']));
				$username = $row['username'];
				redirect('administrator/home', $username);
			} else {
				$data['title'] = 'Administrator &rsaquo; Log In';
				$this->load->view('administrator/view_homebiasa', $data);
			}
		} else {
			if ($this->session->level != '') {
				redirect('administrator/homebiasa');
			} else {
				$data['title'] = 'Administrator &rsaquo; Log In';
				$this->load->view('administrator/view_login', $data);
			}
		}
	}

	function home()
	{
		cek_session_admin();
		$data['record'] = $this->model_utama->karantinaikan();
		$this->template->load('administrator/template', 'administrator/view_home', $data);
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}

	//-------------- Controller Modul User------------------
	function manajemenuser()
	{
		cek_session_admin();
		$data['record'] = $this->model_users->users();
		$this->template->load('administrator/template', 'administrator/mod_users/view_users', $data);
	}

	function tambah_manajemenuser()
	{
		cek_session_admin();
		$id = $this->session->username;
		if (isset($_POST['submit'])) {
			$this->model_users->users_tambah();
			redirect('administrator/manajemenuser');
		} else {
			$data['rows'] = $this->model_users->users_edit($id)->row_array();
			$this->template->load('administrator/template', 'administrator/mod_users/view_users_tambah', $data);
		}
	}

	function edit_manajemenuser()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$this->model_users->users_update();
			redirect('administrator/manajemenuser');
		} else {
			$data['rows'] = $this->model_users->users_edit($id)->row_array();
			$this->template->load('administrator/template', 'administrator/mod_users/view_users_edit', $data);
		}
	}

	function delete_manajemenuser()
	{
		$id = $this->uri->segment(3);
		$this->model_users->users_delete($id);
		redirect('administrator/manajemenuser');
	}



	//----------------------JENIS--------------------------
	function jenis()
	{
		cek_session_admin();
		$data['jenis'] = $this->model_utama->jenis();
		$this->template->load('administrator/template', 'administrator/mod_kecamatan/view', $data);
	}

	function tambah_jenis()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$kode_jenis = $this->input->post('a');
			$nama_jenis = $this->input->post('b');
			$clean1 = $this->security->xss_clean($kode_jenis);
			$clean2 = $this->security->xss_clean($nama_jenis);
			$cek = $this->model_utama->cek_jenis($clean1, $clean2);
			if ($cek && (!empty($kode_jenis))) {
				echo "<script>alert('Kode Jenis Sudah Ada');
			   		 window.location = '" . base_url('administrator/tambah_jenis') . "'</script>";
			} else {
				$this->model_utama->savejenis();
				redirect('administrator/jenis');
			}
		} else {
			$this->template->load('administrator/template', 'administrator/mod_kecamatan/tambah');
		}
	}

	function edit_jenis()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$this->model_utama->updatejenis();
			redirect('administrator/jenis');
		} else {
			$data['rows'] = $this->model_utama->editjenis($id)->row_array();
			$this->template->load('administrator/template', 'administrator/mod_kecamatan/edit', $data);
		}
	}
	function delete_jenis()
	{
		$id = $this->uri->segment(3);
		$this->model_utama->hapusjenis($id);
		redirect('administrator/jenis');
	}




	//----------------------CLASS--------------------------
	function class()
	{
		cek_session_admin();
		$data['class'] = $this->model_utama->class();
		$this->template->load('administrator/template', 'administrator/mod_class/view', $data);
	}

	function tambah_class()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$kode_class = $this->input->post('a');
			$nama_class = $this->input->post('b');
			$clean1 = $this->security->xss_clean($kode_class);
			$clean2 = $this->security->xss_clean($nama_class);
			$cek = $this->model_utama->cek_class($clean1, $clean2);
			if ($cek && (!empty($kode_class))) {
				echo "<script>alert('Kode Class Sudah Ada');
			   		 window.location = '" . base_url('administrator/tambah_class') . "'</script>";
			} else {
				$this->model_utama->saveclass();
				redirect('administrator/class');
			}
		} else {
			$this->template->load('administrator/template', 'administrator/mod_class/tambah');
		}
	}

	function edit_class()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$this->model_utama->updateclass();
			redirect('administrator/class');
		} else {
			$data['rows'] = $this->model_utama->editclass($id)->row_array();
			$this->template->load('administrator/template', 'administrator/mod_class/edit', $data);
		}
	}
	function delete_class()
	{
		$id = $this->uri->segment(3);
		$this->model_utama->hapusclass($id);
		redirect('administrator/class');
	}

	//----------------------Kelompok--------------------------
	function kelompok()
	{
		cek_session_admin();
		$data['kelompok'] = $this->model_utama->kelompok();
		$this->template->load('administrator/template', 'administrator/mod_kelompok/view', $data);
	}

	function tambah_kelompok()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$kode_kel = $this->input->post('a');
			$nama_kel = $this->input->post('b');
			$clean1 = $this->security->xss_clean($kode_kel);
			$clean2 = $this->security->xss_clean($nama_kel);
			$cek = $this->model_utama->cek_kelompok($clean1, $clean2);
			if ($cek && (!empty($kode_kel))) {
				echo "<script>alert('Kode Kelompok Sudah Ada');
					window.location = '" . base_url('administrator/tambah_kelompok') . "'</script>";
			} else {
				$this->model_utama->savekelompok();
				redirect('administrator/kelompok');
			}
		} else {
			$this->template->load('administrator/template', 'administrator/mod_kelompok/tambah');
		}
	}

	function edit_kelompok()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$this->model_utama->updatekelompok();
			redirect('administrator/kelompok');
		} else {
			$data['rows'] = $this->model_utama->editkelompok($id)->row_array();
			$this->template->load('administrator/template', 'administrator/mod_kelompok/edit', $data);
		}
	}
	function delete_kelompok()
	{
		$id = $this->uri->segment(3);
		$this->model_utama->hapuskelompok($id);
		redirect('administrator/kelompok');
	}

	//----------------------Bentuk--------------------------
	function bentuk()
	{
		cek_session_admin();
		$data['bentuk'] = $this->model_utama->bentuk();
		$this->template->load('administrator/template', 'administrator/mod_bentuk/view', $data);
	}

	function tambah_bentuk()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$kode_bentuk = $this->input->post('a');
			$nama_bentuk = $this->input->post('b');
			$clean1 = $this->security->xss_clean($kode_bentuk);
			$clean2 = $this->security->xss_clean($nama_bentuk);
			$cek = $this->model_utama->cek_bentuk($clean1, $clean2);
			if ($cek && (!empty($kode_bentuk))) {
				echo "<script>alert('Kode Bentuk Sudah Ada');
				window.location = '" . base_url('administrator/tambah_bentuk') . "'</script>";
			} else {
				$this->model_utama->savebentuk();
				redirect('administrator/bentuk');
			}
		} else {
			$this->template->load('administrator/template', 'administrator/mod_bentuk/tambah');
		}
	}

	function edit_bentuk()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$this->model_utama->updatebentuk();
			redirect('administrator/bentuk');
		} else {
			$data['rows'] = $this->model_utama->editbentuk($id)->row_array();
			$this->template->load('administrator/template', 'administrator/mod_bentuk/edit', $data);
		}
	}
	function delete_bentuk()
	{
		$id = $this->uri->segment(3);
		$this->model_utama->hapusbentuk($id);
		redirect('administrator/bentuk');
	}


	//----------------------Perolehan--------------------------
	function perolehan()
	{
		cek_session_admin();
		$data['perolehan'] = $this->model_utama->perolehan();
		$this->template->load('administrator/template', 'administrator/mod_perolehan/view', $data);
	}

	function tambah_perolehan()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$kode_perolehan = $this->input->post('a');
			$nama_perolehan = $this->input->post('b');
			$clean1 = $this->security->xss_clean($kode_perolehan);
			$clean2 = $this->security->xss_clean($nama_perolehan);
			$cek = $this->model_utama->cek_perolehan($clean1, $clean2);
			if ($cek && (!empty($kode_perolehan))) {
				echo "<script>alert('Kode Perolehan Sudah Ada');
				window.location = '" . base_url('administrator/tambah_perolehan') . "'</script>";
			} else {
				$this->model_utama->saveperolehan();
				redirect('administrator/perolehan');
			}
		} else {
			$this->template->load('administrator/template', 'administrator/mod_perolehan/tambah');
		}
	}

	function edit_perolehan()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$this->model_utama->updateperolehan();
			redirect('administrator/perolehan');
		} else {
			$data['rows'] = $this->model_utama->editperolehan($id)->row_array();
			$this->template->load('administrator/template', 'administrator/mod_perolehan/edit', $data);
		}
	}
	function delete_perolehan()
	{
		$id = $this->uri->segment(3);
		$this->model_utama->hapusperolehan($id);
		redirect('administrator/perolehan');
	}

	//----------------------Tujuan--------------------------
	function tujuan()
	{
		cek_session_admin();
		$data['tujuan'] = $this->model_utama->tujuan();
		$this->template->load('administrator/template', 'administrator/mod_tujuan/view', $data);
	}

	function tambah_tujuan()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$kode_tujuan = $this->input->post('a');
			$nama_tujuan = $this->input->post('b');
			$clean1 = $this->security->xss_clean($kode_tujuan);
			$clean2 = $this->security->xss_clean($nama_tujuan);
			$cek = $this->model_utama->cek_tujuan($clean1, $clean2);
			if ($cek && (!empty($kode_tujuan))) {
				echo "<script>alert('Kode Tujuan Sudah Ada');
			window.location = '" . base_url('administrator/tambah_tujuan') . "'</script>";
			} else {
				$this->model_utama->savetujuan();
				redirect('administrator/tujuan');
			}
		} else {
			$this->template->load('administrator/template', 'administrator/mod_tujuan/tambah');
		}
	}

	function edit_tujuan()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$this->model_utama->updatetujuan();
			redirect('administrator/tujuan');
		} else {
			$data['rows'] = $this->model_utama->edittujuan($id)->row_array();
			$this->template->load('administrator/template', 'administrator/mod_tujuan/edit', $data);
		}
	}
	function delete_tujuan()
	{
		$id = $this->uri->segment(3);
		$this->model_utama->hapustujuan($id);
		redirect('administrator/tujuan');
	}

	//----------------------Registrasi--------------------------
	function registrasi()
	{
		cek_session_admin();
		$data['statusregistrasi'] = $this->model_utama->registrasi();
		$this->template->load('administrator/template', 'administrator/mod_registrasi/view', $data);
	}

	function tambah_registrasi()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$kodeSR = $this->input->post('a');
			$namaSR = $this->input->post('b');
			$clean1 = $this->security->xss_clean($kodeSR);
			$clean2 = $this->security->xss_clean($namaSR);
			$cek = $this->model_utama->cek_registrasi($clean1, $clean2);
			if ($cek && (!empty($kodeSR))) {
				echo "<script>alert('Status Registrasi Sudah Ada');
			window.location = '" . base_url('administrator/tambah_registrasi') . "'</script>";
			} else {
				$this->model_utama->saveregistrasi();
				redirect('administrator/registrasi');
			}
		} else {
			$this->template->load('administrator/template', 'administrator/mod_registrasi/tambah');
		}
	}

	function edit_registrasi()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$this->model_utama->updateregistrasi();
			redirect('administrator/registrasi');
		} else {
			$data['rows'] = $this->model_utama->editregistrasi($id)->row_array();
			$this->template->load('administrator/template', 'administrator/mod_registrasi/edit', $data);
		}
	}
	function delete_registrasi()
	{
		$id = $this->uri->segment(3);
		$this->model_utama->hapusregistrasi($id);
		redirect('administrator/registrasi');
	}

	//----------------------Species--------------------------
	function species()
	{
		cek_session_admin();
		$data['suspectiblespecies'] = $this->model_utama->species();
		$this->template->load('administrator/template', 'administrator/mod_species/view', $data);
	}

	function tambah_species()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$kodeSS = $this->input->post('a');
			$namaSS = $this->input->post('b');
			$clean1 = $this->security->xss_clean($kodeSS);
			$clean2 = $this->security->xss_clean($namaSS);
			$cek = $this->model_utama->cek_species($clean1, $clean2);
			if ($cek && (!empty($kodeSS))) {
				echo "<script>alert('Suspectible Species Sudah Ada');
		window.location = '" . base_url('administrator/tambah_species') . "'</script>";
			} else {
				$this->model_utama->savespecies();
				redirect('administrator/species');
			}
		} else {
			$this->template->load('administrator/template', 'administrator/mod_species/tambah');
		}
	}

	function edit_species()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$this->model_utama->updatespecies();
			redirect('administrator/species');
		} else {
			$data['rows'] = $this->model_utama->editspecies($id)->row_array();
			$this->template->load('administrator/template', 'administrator/mod_species/edit', $data);
		}
	}
	function delete_species()
	{
		$id = $this->uri->segment(3);
		$this->model_utama->hapusspecies($id);
		redirect('administrator/species');
	}

	//----------------------Terjangkit--------------------------
	function terjangkit()
	{
		cek_session_admin();
		$data['terjangkit'] = $this->model_utama->terjangkit();
		$this->template->load('administrator/template', 'administrator/mod_terjangkit/view', $data);
	}

	function tambah_terjangkit()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$kodeTerjangkit = $this->input->post('a');
			$namaTerjangkit = $this->input->post('b');
			$clean1 = $this->security->xss_clean($kodeTerjangkit);
			$clean2 = $this->security->xss_clean($namaTerjangkit);
			$cek = $this->model_utama->cek_terjangkit($clean1, $clean2);
			if ($cek && (!empty($kodeTerjangkit))) {
				echo "<script>alert('Terjangkit Sudah Ada');
		window.location = '" . base_url('administrator/tambah_terjangkit') . "'</script>";
			} else {
				$this->model_utama->saveterjangkit();
				redirect('administrator/terjangkit');
			}
		} else {
			$this->template->load('administrator/template', 'administrator/mod_terjangkit/tambah');
		}
	}

	function edit_terjangkit()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$this->model_utama->updateterjangkit();
			redirect('administrator/terjangkit');
		} else {
			$data['rows'] = $this->model_utama->editterjangkit($id)->row_array();
			$this->template->load('administrator/template', 'administrator/mod_terjangkit/edit', $data);
		}
	}
	function delete_terjangkit()
	{
		$id = $this->uri->segment(3);
		$this->model_utama->hapusterjangkit($id);
		redirect('administrator/terjangkit');
	}

	//----------------------Resiko--------------------------
	function resiko()
	{
		cek_session_admin();
		$data['tingkatresiko'] = $this->model_utama->resiko();
		$this->template->load('administrator/template', 'administrator/mod_resiko/view', $data);
	}

	function tambah_resiko()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$kodeTR = $this->input->post('a');
			$namaTR = $this->input->post('b');
			$clean1 = $this->security->xss_clean($kodeTR);
			$clean2 = $this->security->xss_clean($namaTR);
			$cek = $this->model_utama->cek_resiko($clean1, $clean2);
			if ($cek && (!empty($kodeTR))) {
				echo "<script>alert('Tingkat Resiko Sudah Ada');
		window.location = '" . base_url('administrator/tambah_resiko') . "'</script>";
			} else {
				$this->model_utama->saveresiko();
				redirect('administrator/resiko');
			}
		} else {
			$this->template->load('administrator/template', 'administrator/mod_resiko/tambah');
		}
	}

	function edit_resiko()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$this->model_utama->updateresiko();
			redirect('administrator/resiko');
		} else {
			$data['rows'] = $this->model_utama->editresiko($id)->row_array();
			$this->template->load('administrator/template', 'administrator/mod_resiko/edit_r', $data);
		}
	}
	function delete_resiko()
	{
		$id = $this->uri->segment(3);
		$this->model_utama->hapusresiko($id);
		redirect('administrator/resiko');
	}

	//----------------------Diketahui Pemilik--------------------------
	function diketahuipem()
	{
		cek_session_admin();
		$data['diketahuipemilik'] = $this->model_utama->diketahuipem();
		$this->template->load('administrator/template', 'administrator/mod_diketahuipem/view', $data);
	}

	function tambah_diketahuipem()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$kodeDP = $this->input->post('a');
			$namaDP = $this->input->post('b');
			$clean1 = $this->security->xss_clean($kodeDP);
			$clean2 = $this->security->xss_clean($namaDP);
			$cek = $this->model_utama->cek_diketahuipem($clean1, $clean2);
			if ($cek && (!empty($kodeDP))) {
				echo "<script>alert('Diketahui Pemilik Sudah Ada');
		window.location = '" . base_url('administrator/tambah_diketahuipem') . "'</script>";
			} else {
				$this->model_utama->savediketahuipem();
				redirect('administrator/diketahuipem');
			}
		} else {
			$this->template->load('administrator/template', 'administrator/mod_diketahuipem/tambah');
		}
	}

	function edit_diketahuipem()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$this->model_utama->updatediketahuipem();
			redirect('administrator/diketahuipem');
		} else {
			$data['rows'] = $this->model_utama->editdiketahuipem($id)->row_array();
			$this->template->load('administrator/template', 'administrator/mod_diketahuipem/edit', $data);
		}
	}
	function delete_diketahuipem()
	{
		$id = $this->uri->segment(3);
		$this->model_utama->hapusdiketahuipem($id);
		redirect('administrator/diketahuipem');
	}

	//----------------------Tempat Pemasukan--------------------------
	function tempem()
	{
		cek_session_admin();
		$data['tempatpemasukan'] = $this->model_utama->tempem();
		$this->template->load('administrator/template', 'administrator/mod_tempem/view', $data);
	}

	function tambah_tempem()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$kodeTP = $this->input->post('a');
			$namaTP = $this->input->post('b');
			$clean1 = $this->security->xss_clean($kodeTP);
			$clean2 = $this->security->xss_clean($namaTP);
			$cek = $this->model_utama->cek_tempem($clean1, $clean2);
			if ($cek && (!empty($kodeTP))) {
				echo "<script>alert('Kode Tempat Pemasukan Sudah Ada');
		window.location = '" . base_url('administrator/tambah_tempem') . "'</script>";
			} else {
				$this->model_utama->savetempem();
				redirect('administrator/tempem');
			}
		} else {
			$this->template->load('administrator/template', 'administrator/mod_tempem/tambah');
		}
	}

	function edit_tempem()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$this->model_utama->updatetempem();
			redirect('administrator/tempem');
		} else {
			$data['rows'] = $this->model_utama->edittempem($id)->row_array();
			$this->template->load('administrator/template', 'administrator/mod_tempem/edit', $data);
		}
	}
	function delete_tempem()
	{
		$id = $this->uri->segment(3);
		$this->model_utama->hapustempem($id);
		redirect('administrator/tempem');
	}

	//----------------------Permohonan Pemasukan--------------------------
	function perpem()
	{
		cek_session_admin();
		$data['permohonanpemasukan'] = $this->model_utama->perpem();
		$this->template->load('administrator/template', 'administrator/mod_perpem/view', $data);
	}

	function tambah_perpem()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$kodePP = $this->input->post('a');
			$namaPP = $this->input->post('b');
			$clean1 = $this->security->xss_clean($kodePP);
			$clean2 = $this->security->xss_clean($namaPP);
			$cek = $this->model_utama->cek_perpem($clean1, $clean2);
			if ($cek && (!empty($kodePP))) {
				echo "<script>alert('Kode Permohonan Pemasukan Sudah Ada');
		window.location = '" . base_url('administrator/tambah_perpem') . "'</script>";
			} else {
				$this->model_utama->saveperpem();
				redirect('administrator/perpem');
			}
		} else {
			$this->template->load('administrator/template', 'administrator/mod_perpem/tambah');
		}
	}

	function edit_perpem()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$this->model_utama->updateperpem();
			redirect('administrator/perpem');
		} else {
			$data['rows'] = $this->model_utama->editperpem($id)->row_array();
			$this->template->load('administrator/template', 'administrator/mod_perpem/edit', $data);
		}
	}
	function delete_perpem()
	{
		$id = $this->uri->segment(3);
		$this->model_utama->hapusperpem($id);
		redirect('administrator/perpem');
	}



	//----------------------Status Dokumen--------------------------
	function dokumen()
	{
		cek_session_admin();
		$data['statusdokumen'] = $this->model_utama->dokumen();
		$this->template->load('administrator/template', 'administrator/mod_dokumen/view', $data);
	}

	function tambah_dokumen()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$kodeSD = $this->input->post('a');
			$namaSD = $this->input->post('b');
			$clean1 = $this->security->xss_clean($kodeSD);
			$clean2 = $this->security->xss_clean($namaSD);
			$cek = $this->model_utama->cek_dokumen($clean1, $clean2);
			if ($cek && (!empty($kodeSD))) {
				echo "<script>alert('Kode Status Dokumen Sudah Ada');
		window.location = '" . base_url('administrator/tambah_dokumen') . "'</script>";
			} else {
				$this->model_utama->savedokumen();
				redirect('administrator/dokumen');
			}
		} else {
			$this->template->load('administrator/template', 'administrator/mod_dokumen/tambah');
		}
	}

	function edit_dokumen()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$this->model_utama->updatedokumen();
			redirect('administrator/dokumen');
		} else {
			$data['rows'] = $this->model_utama->editdokumen($id)->row_array();
			$this->template->load('administrator/template', 'administrator/mod_dokumen/edit', $data);
		}
	}
	function delete_dokumen()
	{
		$id = $this->uri->segment(3);
		$this->model_utama->hapusdokumen($id);
		redirect('administrator/dokumen');
	}


	//----------------------Kesesuaian isi--------------------------
	function kesesuaian()
	{
		cek_session_admin();
		$data['kesesuaianisi'] = $this->model_utama->kesesuaian();
		$this->template->load('administrator/template', 'administrator/mod_kesesuaian/view', $data);
	}

	function tambah_kesesuaian()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$kodeKI = $this->input->post('a');
			$namaKI = $this->input->post('b');
			$clean1 = $this->security->xss_clean($kodeKI);
			$clean2 = $this->security->xss_clean($namaKI);
			$cek = $this->model_utama->cek_kesesuaian($clean1, $clean2);
			if ($cek && (!empty($kodeKI))) {
				echo "<script>alert('Kode Keseuaian Isi Sudah Ada');
		window.location = '" . base_url('administrator/tambah_kesesuaian') . "'</script>";
			} else {
				$this->model_utama->savekesesuaian();
				redirect('administrator/kesesuaian');
			}
		} else {
			$this->template->load('administrator/template', 'administrator/mod_kesesuaian/tambah');
		}
	}

	function edit_kesesuaian()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$this->model_utama->updatekesesuaian();
			redirect('administrator/kesesuaian');
		} else {
			$data['rows'] = $this->model_utama->editkesesuaian($id)->row_array();
			$this->template->load('administrator/template', 'administrator/mod_kesesuaian/edit', $data);
		}
	}
	function delete_kesesuaian()
	{
		$id = $this->uri->segment(3);
		$this->model_utama->hapuskesesuaian($id);
		redirect('administrator/kesesuaian');
	}


	//----------------------Pengasingan--------------------------
	function pengasingan()
	{
		cek_session_admin();
		$data['pengasingan'] = $this->model_utama->pengasingan();
		$this->template->load('administrator/template', 'administrator/mod_pengasingan/view', $data);
	}

	function tambah_pengasingan()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$kodePengasingan = $this->input->post('a');
			$namaPengasingan = $this->input->post('b');
			$clean1 = $this->security->xss_clean($kodePengasingan);
			$clean2 = $this->security->xss_clean($namaPengasingan);
			$cek = $this->model_utama->cek_pengasingan($clean1, $clean2);
			if ($cek && (!empty($kodeKI))) {
				echo "<script>alert('Kode Pengasingan Sudah Ada');
		window.location = '" . base_url('administrator/tambah_pengasingan') . "'</script>";
			} else {
				$this->model_utama->savepengasingan();
				redirect('administrator/pengasingan');
			}
		} else {
			$this->template->load('administrator/template', 'administrator/mod_pengasingan/tambah');
		}
	}

	function edit_pengasingan()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$this->model_utama->updatepengasingan();
			redirect('administrator/pengasingan');
		} else {
			$data['rows'] = $this->model_utama->editpengasingan($id)->row_array();
			$this->template->load('administrator/template', 'administrator/mod_pengasingan/edit', $data);
		}
	}
	function delete_pengasingan()
	{
		$id = $this->uri->segment(3);
		$this->model_utama->hapuspengasingan($id);
		redirect('administrator/pengasingan');
	}

	//----------------------Status HPIK--------------------------
	function hpik()
	{
		cek_session_admin();
		$data['statushpik'] = $this->model_utama->hpik();
		$this->template->load('administrator/template', 'administrator/mod_hpik/view', $data);
	}

	function tambah_hpik()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$kodeHPIK = $this->input->post('a');
			$namaHPIK = $this->input->post('b');
			$clean1 = $this->security->xss_clean($kodeHPIK);
			$clean2 = $this->security->xss_clean($namaHPIK);
			$cek = $this->model_utama->cek_hpik($clean1, $clean2);
			if ($cek && (!empty($kodeHPIK))) {
				echo "<script>alert('Kode HPIK Sudah Ada');
		window.location = '" . base_url('administrator/tambah_hpik') . "'</script>";
			} else {
				$this->model_utama->savehpik();
				redirect('administrator/hpik');
			}
		} else {
			$this->template->load('administrator/template', 'administrator/mod_hpik/tambah');
		}
	}

	function edit_hpik()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$this->model_utama->updatehpik();
			redirect('administrator/hpik');
		} else {
			$data['rows'] = $this->model_utama->edithpik($id)->row_array();
			$this->template->load('administrator/template', 'administrator/mod_hpik/edit', $data);
		}
	}
	function delete_hpik()
	{
		$id = $this->uri->segment(3);
		$this->model_utama->hapushpik($id);
		redirect('administrator/hpik');
	}

	//----------------------Penahanan--------------------------
	function penahanan()
	{
		cek_session_admin();
		$data['penahanan'] = $this->model_utama->penahanan();
		$this->template->load('administrator/template', 'administrator/mod_penahanan/view', $data);
	}

	function tambah_penahanan()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$kodePenahanan = $this->input->post('a');
			$namaPenahanan = $this->input->post('b');
			$clean1 = $this->security->xss_clean($kodePenahanan);
			$clean2 = $this->security->xss_clean($namaPenahanan);
			$cek = $this->model_utama->cek_hpik($clean1, $clean2);
			if ($cek && (!empty($kodePenahanan))) {
				echo "<script>alert('Kode Penahanan Sudah Ada');
		window.location = '" . base_url('administrator/tambah_penahanan') . "'</script>";
			} else {
				$this->model_utama->savepenahanan();
				redirect('administrator/penahanan');
			}
		} else {
			$this->template->load('administrator/template', 'administrator/mod_penahanan/tambah');
		}
	}

	function edit_penahanan()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$this->model_utama->updatepenahanan();
			redirect('administrator/penahanan');
		} else {
			$data['rows'] = $this->model_utama->editpenahanan($id)->row_array();
			$this->template->load('administrator/template', 'administrator/mod_penahanan/edit', $data);
		}
	}
	function delete_penahanan()
	{
		$id = $this->uri->segment(3);
		$this->model_utama->hapuspenahanan($id);
		redirect('administrator/penahanan');
	}


	//----------------------Pemenuhan Persyaratan--------------------------
	function pemenuhansyarat()
	{
		cek_session_admin();
		$data['pemenuhansyarat'] = $this->model_utama->pemenuhansyarat();
		$this->template->load('administrator/template', 'administrator/mod_pemenuhansyarat/view', $data);
	}

	function tambah_pemenuhansyarat()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$kodePS = $this->input->post('a');
			$namaPS = $this->input->post('b');
			$clean1 = $this->security->xss_clean($kodePS);
			$clean2 = $this->security->xss_clean($namaPS);
			$cek = $this->model_utama->cek_pemenuhansyarat($clean1, $clean2);
			if ($cek && (!empty($kodePS))) {
				echo "<script>alert('Kode Pemenuhan Persyaratan Sudah Ada');
		window.location = '" . base_url('administrator/tambah_pemenuhansyarat') . "'</script>";
			} else {
				$this->model_utama->savepemenuhansyarat();
				redirect('administrator/pemenuhansyarat');
			}
		} else {
			$this->template->load('administrator/template', 'administrator/mod_pemenuhansyarat/tambah');
		}
	}

	function edit_pemenuhansyarat()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$this->model_utama->updatepemenuhansyarat();
			redirect('administrator/pemenuhansyarat');
		} else {
			$data['rows'] = $this->model_utama->editpemenuhansyarat($id)->row_array();
			$this->template->load('administrator/template', 'administrator/mod_pemenuhansyarat/edit', $data);
		}
	}
	function delete_pemenuhansyarat()
	{
		$id = $this->uri->segment(3);
		$this->model_utama->hapuspemenuhansyarat($id);
		redirect('administrator/pemenuhansyarat');
	}

	//----------------------Penolakan--------------------------
	function penolakan()
	{
		cek_session_admin();
		$data['penolakan'] = $this->model_utama->penolakan();
		$this->template->load('administrator/template', 'administrator/mod_penolakan/view', $data);
	}

	function tambah_penolakan()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$kodePenolakan = $this->input->post('a');
			$namaPenolakan = $this->input->post('b');
			$clean1 = $this->security->xss_clean($kodePenolakan);
			$clean2 = $this->security->xss_clean($namaPenolakan);
			$cek = $this->model_utama->cek_penolakan($clean1, $clean2);
			if ($cek && (!empty($kodePenolakan))) {
				echo "<script>alert('Kode Penolakan Sudah Ada');
		window.location = '" . base_url('administrator/tambah_penolakan') . "'</script>";
			} else {
				$this->model_utama->savepenolakan();
				redirect('administrator/penolakan');
			}
		} else {
			$this->template->load('administrator/template', 'administrator/mod_penolakan/tambah');
		}
	}

	function edit_penolakan()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$this->model_utama->updatepenolakan();
			redirect('administrator/penolakan');
		} else {
			$data['rows'] = $this->model_utama->editpenolakan($id)->row_array();
			$this->template->load('administrator/template', 'administrator/mod_penolakan/edit', $data);
		}
	}
	function delete_penolakan()
	{
		$id = $this->uri->segment(3);
		$this->model_utama->hapuspenolakan($id);
		redirect('administrator/penolakan');
	}

	//-------DATA karantina---------------------
	function sdss()
	{
		cek_session_admin();
		$data['record'] = $this->model_utama->karantinaikan();
		$this->template->load('administrator/template', 'administrator/mod_sdss/view', $data);
	}

	//by Sodik
	function karantinaikan()
	{
		cek_session_admin();
		$data['karantinaikan'] = $this->model_utama->karantinaikan();
		$this->template->load('administrator/template', 'administrator/mod_users/view_users', $data);
	}


	//edit by Sodik
	function tambahsdss()
	{
		//cek_session_admin();
		if (isset($_POST['submit'])) {
				$this->model_utama->simpankarantina();
				//ini untuk ambil last id
				$dt = $this->db->query("SELECT * FROM karantinaikan ORDER BY idKarantina DESC LIMIT 1");
				foreach($dt->result_array() as $dataa){
					$d = $dataa['idKarantina'];
				}
				$data['rows'] = $this->model_utama->editsdss($d)->row_array();
				$this->template->load('administrator/template', 'administrator/mod_sdss/view_sdss', $data);
				//redirect('administrator/view_sdss',$data);
		} else {
			$data['camat'] = $this->model_utama->jenis();
			$this->template->load('administrator/template', 'administrator/mod_sdss/tambah', $data);
		}
	}

	//view sdss individual
	function view_sdss()
	{
		$id = $this->uri->segment(3);
		$data['rows'] = $this->model_utama->editsdss($id)->row_array();
		$this->template->load('administrator/template', 'administrator/mod_sdss/view_sdss', $data);
	}

	function edit_sdss()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$this->model_utama->updatesdss();
			redirect('administrator/sdss');
		} else {
			$data['rows'] = $this->model_utama->editsdss($id)->row_array();
			$this->template->load('administrator/template', 'administrator/mod_sdss/edit', $data);
		}
	}

	function deletesdss()
	{
		$id = $this->uri->segment(3);
		$this->model_utama->hapussdss($id);
		redirect('administrator/sdss');
	}


	function cetak_sdss()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		$data['rows'] = $this->model_utama->editsdss($id)->row_array();
		$this->template->load('administrator/template', 'administrator/mod_sdss/pdf', $data);
	}

	//-------LAPORAN---------------------
	function report()
	{
		cek_session_admin();
		$this->template->load('administrator/template', 'administrator/mod_sdss/laporan');
	}
	function excel()
	{
		cek_session_admin();
		$data['record'] = $this->model_utama->datapemudik();
		$data['otg'] = $this->model_utama->data_otg();
		$data['odg'] = $this->model_utama->data_odg();
		$data['odp'] = $this->model_utama->data_odp();
		$data['osp'] = $this->model_utama->data_osp();
		$this->load->view('administrator/mod_pemudik/excel', $data);
	}

	function cetakpdf()
	{
		cek_session_admin();
		$data['record'] = $this->model_utama->karantinaikan();
		$this->load->view('administrator/mod_sdss/cetakpdf', $data);
	}

	function pdf()
	{
		cek_session_admin();
		$data['record'] = $this->model_utama->karantinaikan();
		$this->load->view('administrator/mod_sdss/pdf', $data);
	}

	function exportExcel()
	{
		include "asset/PHPExcel/PHPExcel.php" ;

      // Panggil class PHPExcel nya
      $excel = new PHPExcel();
      // Settingan awal fil excel
      $excel->getProperties()->setCreator('My Notes Code')
                   ->setLastModifiedBy('My Notes Code')
                   ->setTitle("Karantina")
                   ->setSubject("Laporan Tindakan Karantina Ikan dan Produk Perikanan Lainnya")
                   ->setDescription("Laporan Tindakan Karantina Ikan dan Produk Perikanan Lainnya")
                   ->setKeywords("Laporan Tindakan Karantina Ikan dan Produk Perikanan Lainnya");
      // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
      $style_col = array(
        'font' => array('bold' => true), // Set font nya jadi bold
        'alignment' => array(
          'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, // Set text jadi ditengah secara horizontal (center)
          'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
        ),
        'borders' => array(
          'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
          'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
          'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
          'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
        )
      );
      // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
      $style_row = array(
        'alignment' => array(
          'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
        ),
        'borders' => array(
          'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
          'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
          'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
          'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
        )
      );

      $excel->setActiveSheetIndex(0)->setCellValue('A1', "Laporan Tindakan Karantina Ikan dan Produk Perikanan Lainnya"); // Set kolom A1 dengan tulisan "DATA SISWA"
      $excel->getActiveSheet()->mergeCells('A1:C1'); // Set Merge Cell pada kolom A1 sampai E1
      $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
      $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
      $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
      // Buat kolom pertama tabel/ header
      $excel->setActiveSheetIndex(0)->setCellValue('A3', "ID Karantina");
      $excel->setActiveSheetIndex(0)->setCellValue('A4', "Jenis Media Pembawa");
      $excel->setActiveSheetIndex(0)->setCellValue('A5', "Class"); 
      $excel->setActiveSheetIndex(0)->setCellValue('A6', "Kelompok"); 
      $excel->setActiveSheetIndex(0)->setCellValue('A7', "Bentuk/ Jenis/ Pengolahan");
      $excel->setActiveSheetIndex(0)->setCellValue('A8', "Perolehan Media Pembawa");
      $excel->setActiveSheetIndex(0)->setCellValue('A9', "Tujuan Pengunaan");
      $excel->setActiveSheetIndex(0)->setCellValue('A10', "Status Registrasi"); 
      $excel->setActiveSheetIndex(0)->setCellValue('A11', "Suspectible Species"); 
      $excel->setActiveSheetIndex(0)->setCellValue('A12', "Terjangkit");
      $excel->setActiveSheetIndex(0)->setCellValue('A13', "Tingkat Kategori Resiko");
      $excel->setActiveSheetIndex(0)->setCellValue('A14', "Media Pembawa Virus/ Diketahui Pemilik");
      $excel->setActiveSheetIndex(0)->setCellValue('A15', "Melalui Tempat Pemasukan yang Ditetapkan"); 
      $excel->setActiveSheetIndex(0)->setCellValue('A16', "PPPK Online"); 
      $excel->setActiveSheetIndex(0)->setCellValue('A17', "Status Dokumen");
      $excel->setActiveSheetIndex(0)->setCellValue('A18', "Kesesuaian Isi");
      $excel->setActiveSheetIndex(0)->setCellValue('A19', "Pengasingan");
      $excel->setActiveSheetIndex(0)->setCellValue('A20', "Status HPIK"); 
      $excel->setActiveSheetIndex(0)->setCellValue('A21', "Penahanan"); 
      $excel->setActiveSheetIndex(0)->setCellValue('A22', "Pemenuhan Kekurangan Persyaratan");
      $excel->setActiveSheetIndex(0)->setCellValue('A23', "Penolakan");
      $excel->setActiveSheetIndex(0)->setCellValue('A24', "Tindakan Akhir");

      // Apply style header yang telah kita buat tadi ke masing-masing kolom header
      $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('A4')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('A5')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('A6')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('A7')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('A8')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('A9')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('A10')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('A11')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('A12')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('A13')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('A14')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('A15')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('A16')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('A17')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('A18')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('A19')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('A20')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('A21')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('A22')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('A23')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('A24')->applyFromArray($style_col);


      //buat : pada semua baris
      $excel->setActiveSheetIndex(0)->setCellValue('B3', ":");
      $excel->setActiveSheetIndex(0)->setCellValue('B4', ":");
      $excel->setActiveSheetIndex(0)->setCellValue('B5', ":"); 
      $excel->setActiveSheetIndex(0)->setCellValue('B6', ":"); 
      $excel->setActiveSheetIndex(0)->setCellValue('B7', ":");
      $excel->setActiveSheetIndex(0)->setCellValue('B8', ":");
      $excel->setActiveSheetIndex(0)->setCellValue('B9', ":");
      $excel->setActiveSheetIndex(0)->setCellValue('B10', ":"); 
      $excel->setActiveSheetIndex(0)->setCellValue('B11', ":"); 
      $excel->setActiveSheetIndex(0)->setCellValue('B12', ":");
      $excel->setActiveSheetIndex(0)->setCellValue('B13', ":");
      $excel->setActiveSheetIndex(0)->setCellValue('B14', ":");
      $excel->setActiveSheetIndex(0)->setCellValue('B15', ":"); 
      $excel->setActiveSheetIndex(0)->setCellValue('B16', ":"); 
      $excel->setActiveSheetIndex(0)->setCellValue('B17', ":");
      $excel->setActiveSheetIndex(0)->setCellValue('B18', ":");
      $excel->setActiveSheetIndex(0)->setCellValue('B19', ":");
      $excel->setActiveSheetIndex(0)->setCellValue('B20', ":"); 
      $excel->setActiveSheetIndex(0)->setCellValue('B21', ":"); 
      $excel->setActiveSheetIndex(0)->setCellValue('B22', ":");
      $excel->setActiveSheetIndex(0)->setCellValue('B23', ":");
      $excel->setActiveSheetIndex(0)->setCellValue('B24', ":");

      // Apply style header yang telah kita buat tadi ke masing-masing kolom header
      $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('B4')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('B5')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('B6')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('B7')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('B8')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('B9')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('B10')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('B11')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('B12')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('B13')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('B14')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('B15')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('B16')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('B17')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('B18')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('B19')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('B20')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('B21')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('B22')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('B23')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('B24')->applyFromArray($style_col);

      // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
      //ambil data dari foreign key

      $id = $this->uri->segment('3');
      $data = $this->db->query("SELECT * FROM  karantinaikan where idKarantina='$id'");
      foreach ($data->result_array() as $rows)
      {
      	$jen = $this->db->query("select * from jenis where kode_jenis = '$rows[jenisMP]'");
                      foreach($jen->result_array() as $row1)
                      {
                        $jenisMP = $row1[nama_jenis];
                      }

                      $clas = $this->db->query("select * from class where kode_class = '$rows[class]'");
                      foreach($clas->result_array() as $row2)
                      {
                        $class = $row2[nama_class];
                      }

                      $kel = $this->db->query("select * from kelompok where kode_kel = '$rows[kelompok]'");
                      foreach($kel->result_array() as $row3)
                      {
                        $kelompok = $row3[nama_kel];
                      }

                      $ben = $this->db->query("select * from bentuk where kode_bentuk = '$rows[bentuk]'");
                      foreach($ben->result_array() as $row4)
                      {
                        $bentuk = $row4[nama_bentuk];
                      }

                      $pm = $this->db->query("select * from perolehanmedia where kode_media = '$rows[perolehanmedia]'");
                      foreach($pm->result_array() as $row5)
                      {
                        $perolehanmedia = $row5[nama_media];
                      }

                      $tp = $this->db->query("select * from tujuanpenggunaan where kode_JP = '$rows[tujuanPenggunaan]'");
                      foreach($tp->result_array() as $row6)
                      {
                        $tujuanPenggunaan = $row6[nama_JP];
                      }

                      $sr = $this->db->query("select * from statusregistrasi where kodeSR = '$rows[statusRegistrasi]'");
                      foreach($sr->result_array() as $row7)
                      {
                        $statusRegistrasi = $row7[namaSR];
                      }

                      $ss = $this->db->query("select * from suspectiblespecies where kodeSS = '$rows[suspctibleSpecies]'");
                      foreach($ss->result_array() as $row8)
                      {
                        $suspectibleSpecies = $row8[namaSS];
                      }

                      $tj = $this->db->query("select * from terjangkit where kodeTerjangkit = '$rows[terjangkit]'");
                      foreach($tj->result_array() as $row9)
                      {
                        $terjangkit = $row9[namaTerjangkit];
                      }

                      $tr = $this->db->query("select * from tingkatresiko where kodeTR = '$rows[tingkatResiko]'");
                      foreach($tr->result_array() as $row10)
                      {
                        $tingkatResiko = $row10[namaTR];
                      }

                      $dp = $this->db->query("select * from diketahuipemilik where kodeDP = '$rows[diketahuiPemilik]'");
                      foreach($dp->result_array() as $row11)
                      {
                        $diketahuiPemilik = $row11[namaDP];
                      }

                      $tpm = $this->db->query("select * from tempatpemasukan where kodeTP = '$rows[tempatPemasukan]'");
                      foreach($tpm->result_array() as $row12)
                      {
                        $tempatPemasukan = $row12[namaTP];
                      }

                      $pp = $this->db->query("select * from permohonanpemasukan where kodePP = '$rows[permohonanPemasukan]'");
                      foreach($pp->result_array() as $row13)
                      {
                        $permohonanPemasukan = $row13[namaPP];
                      }

                      $sd = $this->db->query("select * from statusdokumen where kodeSD = '$rows[statusDokumen]'");
                      foreach($sd->result_array() as $row14)
                      {
                        $statusDokumen = $row14[namaSD];
                      }

                      $ki = $this->db->query("select * from kesesuaianisi where kodeKI = '$rows[kesesuaianIsi]'");
                      foreach($ki->result_array() as $row15)
                      {
                        $kesesuaianIsi = $row15[namaKI];
                      }

                      $pga = $this->db->query("select * from pengasingan where kodePengasingan = '$rows[pengasingan]'");
                      foreach($pga->result_array() as $row16)
                      {
                        $pengasingan = $row16[namaPengasingan];
                      }

                      $hpik = $this->db->query("select * from statushpik where kodeHPIK = '$rows[statusHPIK]'");
                      foreach($hpik->result_array() as $row17)
                      {
                        $statusHPIK = $row17[namaHPIK];
                      }

                      $pnh = $this->db->query("select * from penahanan where kodePenahanan = '$rows[penahanan]'");
                      foreach($pnh->result_array() as $row18)
                      {
                        $penahanan = $row18[namaPenahanan];
                      }

                      $psy = $this->db->query("select * from pemenuhansyarat where kodePS = '$rows[pemenuhanSyarat]'");
                      foreach($psy->result_array() as $row19)
                      {
                        $pemenuhanSyarat = $row19[namaPS];
                      }

                      $pnl = $this->db->query("select * from penolakan where kodePenolakan = '$rows[penolakan]'");
                      foreach($pnl->result_array() as $row20)
                      {
                        $penolakan = $row20[namaPenolakan];
                      }

                      $ta = $this->db->query("select * from tindakanakhir where kodeTA = '$rows[tindakanAkhir]'");
                      foreach($ta->result_array() as $row21)
                      {
                        $tindakanAkhir = $row21[namaTA];
                      }
      }
            
      //isi cell
      $excel->setActiveSheetIndex(0)->setCellValue('C3', $id);
      $excel->setActiveSheetIndex(0)->setCellValue('C4', $jenisMP);
      $excel->setActiveSheetIndex(0)->setCellValue('C5', $class); 
      $excel->setActiveSheetIndex(0)->setCellValue('C6', $kelompok); 
      $excel->setActiveSheetIndex(0)->setCellValue('C7', $bentuk);
      $excel->setActiveSheetIndex(0)->setCellValue('C8', $perolehanmedia);
      $excel->setActiveSheetIndex(0)->setCellValue('C9', $tujuanPenggunaan);
      $excel->setActiveSheetIndex(0)->setCellValue('C10', $statusRegistrasi); 
      $excel->setActiveSheetIndex(0)->setCellValue('C11', $suspectibleSpecies); 
      $excel->setActiveSheetIndex(0)->setCellValue('C12', $terjangkit);
      $excel->setActiveSheetIndex(0)->setCellValue('C13', $tingkatResiko);
      $excel->setActiveSheetIndex(0)->setCellValue('C14', $diketahuiPemilik);
      $excel->setActiveSheetIndex(0)->setCellValue('C15', $tempatPemasukan); 
      $excel->setActiveSheetIndex(0)->setCellValue('C16', $permohonanPemasukan); 
      $excel->setActiveSheetIndex(0)->setCellValue('C17', $statusDokumen);
      $excel->setActiveSheetIndex(0)->setCellValue('C18', $kesesuaianIsi);
      $excel->setActiveSheetIndex(0)->setCellValue('C19', $pengasingan);
      $excel->setActiveSheetIndex(0)->setCellValue('C20', $statusHPIK); 
      $excel->setActiveSheetIndex(0)->setCellValue('C21', $penahanan); 
      $excel->setActiveSheetIndex(0)->setCellValue('C22', $pemenuhanSyarat);
      $excel->setActiveSheetIndex(0)->setCellValue('C23', $penolakan);
      $excel->setActiveSheetIndex(0)->setCellValue('C24', $tindakanAkhir);
        
      // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
      $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('C4')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('C5')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('C6')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('C7')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('C8')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('C9')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('C10')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('C11')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('C12')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('C13')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('C14')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('C15')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('C16')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('C17')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('C18')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('C19')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('C20')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('C21')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('C22')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('C23')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('C24')->applyFromArray($style_col);
      

      // Set width kolom      
      $excel->getActiveSheet()->getColumnDimension('A')->setWidth(40); //
      $excel->getActiveSheet()->getColumnDimension('B')->setWidth(4); // 
      $excel->getActiveSheet()->getColumnDimension('C')->setWidth(78); // 
      
      // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
      $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
      // Set orientasi kertas jadi LANDSCAPE
      $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
      // Set judul file excel nya
      $excel->getActiveSheet(0)->setTitle("Karantina Ikan");
      $excel->setActiveSheetIndex(0);
      // Proses file excel
      header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
      header('Content-Disposition: attachment; filename="Laporan Tindakan Karantina Ikan dan Produk Perikanan Lainnya.xls"'); // Set nama file excel nya
      header('Cache-Control: max-age=0');
      $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
      $write->save('php://output');
	}

	function exportAll()
	{
		include "asset/PHPExcel/PHPExcel.php" ;

      // Panggil class PHPExcel nya
      $excel = new PHPExcel();
      // Settingan awal fil excel
      $excel->getProperties()->setCreator('My Notes Code')
                   ->setLastModifiedBy('My Notes Code')
                   ->setTitle("Karantina Ikan")
                   ->setSubject("Laporan Tindakan Karantina Ikan dan Produk Perikanan Lainnya")
                   ->setDescription("Laporan Tindakan Karantina Ikan dan Produk Perikanan Lainnya")
                   ->setKeywords("Laporan Tindakan Karantina Ikan dan Produk Perikanan Lainnya");
      // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
      $style_col = array(
        'font' => array('bold' => true), // Set font nya jadi bold
        'alignment' => array(
          'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, // Set text jadi ditengah secara horizontal (center)
          'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
        ),
        'borders' => array(
          'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
          'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
          'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
          'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
        )
      );
      // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
      $style_row = array(
        'alignment' => array(
          'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
        ),
        'borders' => array(
          'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
          'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
          'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
          'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
        )
      );

      $excel->setActiveSheetIndex(0)->setCellValue('A1', "Laporan Tindakan Karantina Ikan dan Produk Perikanan Lainnya"); // Set kolom A1 dengan tulisan "DATA SISWA"
      $excel->getActiveSheet()->mergeCells('A1:V1'); // Set Merge Cell pada kolom A1 sampai E1
      $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
      $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
      $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
      // Buat kolom pertama tabel/ header
      $excel->setActiveSheetIndex(0)->setCellValue('A3', "ID Karantina");
      $excel->setActiveSheetIndex(0)->setCellValue('B3', "Jenis Media Pembawa");
      $excel->setActiveSheetIndex(0)->setCellValue('C3', "Class"); 
      $excel->setActiveSheetIndex(0)->setCellValue('D3', "Kelompok"); 
      $excel->setActiveSheetIndex(0)->setCellValue('E3', "Bentuk/ Jenis/ Pengolahan");
      $excel->setActiveSheetIndex(0)->setCellValue('F3', "Perolehan Media Pembawa");
      $excel->setActiveSheetIndex(0)->setCellValue('G3', "Tujuan Pengunaan");
      $excel->setActiveSheetIndex(0)->setCellValue('H3', "Status Registrasi"); 
      $excel->setActiveSheetIndex(0)->setCellValue('I3', "Suspectible Species"); 
      $excel->setActiveSheetIndex(0)->setCellValue('J3', "Terjangkit");
      $excel->setActiveSheetIndex(0)->setCellValue('K3', "Tingkat Kategori Resiko");
      $excel->setActiveSheetIndex(0)->setCellValue('L3', "Media Pembawa Virus/ Diketahui Pemilik");
      $excel->setActiveSheetIndex(0)->setCellValue('M3', "Melalui Tempat Pemasukan yang Ditetapkan"); 
      $excel->setActiveSheetIndex(0)->setCellValue('N3', "PPPK Online"); 
      $excel->setActiveSheetIndex(0)->setCellValue('O3', "Status Dokumen");
      $excel->setActiveSheetIndex(0)->setCellValue('P3', "Kesesuaian Isi");
      $excel->setActiveSheetIndex(0)->setCellValue('Q3', "Pengasingan");
      $excel->setActiveSheetIndex(0)->setCellValue('R3', "Status HPIK"); 
      $excel->setActiveSheetIndex(0)->setCellValue('S3', "Penahanan"); 
      $excel->setActiveSheetIndex(0)->setCellValue('T3', "Pemenuhan Kekurangan Persyaratan");
      $excel->setActiveSheetIndex(0)->setCellValue('U3', "Penolakan");
      $excel->setActiveSheetIndex(0)->setCellValue('V3', "Tindakan Akhir");

      // Apply style header yang telah kita buat tadi ke masing-masing kolom header
      $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('L3')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('M3')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('N3')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('O3')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('P3')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('Q3')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('R3')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('S3')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('T3')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('U3')->applyFromArray($style_col);
      $excel->getActiveSheet()->getStyle('V3')->applyFromArray($style_col);

      //ambil data dari foreign key
      $no = 1;
      $num_rows = 4;
      $data = $this->db->query("SELECT * FROM  karantinaikan");
      foreach ($data->result_array() as $rows)
      {
      				  $jen = $this->db->query("select * from jenis where kode_jenis = '$rows[jenisMP]'");
                      foreach($jen->result_array() as $row1)
                      {
                        $jenisMP = $row1[nama_jenis];
                      }

                      $clas = $this->db->query("select * from class where kode_class = '$rows[class]'");
                      foreach($clas->result_array() as $row2)
                      {
                        $class = $row2[nama_class];
                      }

                      $kel = $this->db->query("select * from kelompok where kode_kel = '$rows[kelompok]'");
                      foreach($kel->result_array() as $row3)
                      {
                        $kelompok = $row3[nama_kel];
                      }

                      $ben = $this->db->query("select * from bentuk where kode_bentuk = '$rows[bentuk]'");
                      foreach($ben->result_array() as $row4)
                      {
                        $bentuk = $row4[nama_bentuk];
                      }

                      $pm = $this->db->query("select * from perolehanmedia where kode_media = '$rows[perolehanmedia]'");
                      foreach($pm->result_array() as $row5)
                      {
                        $perolehanmedia = $row5[nama_media];
                      }

                      $tp = $this->db->query("select * from tujuanpenggunaan where kode_JP = '$rows[tujuanPenggunaan]'");
                      foreach($tp->result_array() as $row6)
                      {
                        $tujuanPenggunaan = $row6[nama_JP];
                      }

                      $sr = $this->db->query("select * from statusregistrasi where kodeSR = '$rows[statusRegistrasi]'");
                      foreach($sr->result_array() as $row7)
                      {
                        $statusRegistrasi = $row7[namaSR];
                      }

                      $ss = $this->db->query("select * from suspectiblespecies where kodeSS = '$rows[suspctibleSpecies]'");
                      foreach($ss->result_array() as $row8)
                      {
                        $suspectibleSpecies = $row8[namaSS];
                      }

                      $tj = $this->db->query("select * from terjangkit where kodeTerjangkit = '$rows[terjangkit]'");
                      foreach($tj->result_array() as $row9)
                      {
                        $terjangkit = $row9[namaTerjangkit];
                      }

                      $tr = $this->db->query("select * from tingkatresiko where kodeTR = '$rows[tingkatResiko]'");
                      foreach($tr->result_array() as $row10)
                      {
                        $tingkatResiko = $row10[namaTR];
                      }

                      $dp = $this->db->query("select * from diketahuipemilik where kodeDP = '$rows[diketahuiPemilik]'");
                      foreach($dp->result_array() as $row11)
                      {
                        $diketahuiPemilik = $row11[namaDP];
                      }

                      $tpm = $this->db->query("select * from tempatpemasukan where kodeTP = '$rows[tempatPemasukan]'");
                      foreach($tpm->result_array() as $row12)
                      {
                        $tempatPemasukan = $row12[namaTP];
                      }

                      $pp = $this->db->query("select * from permohonanpemasukan where kodePP = '$rows[permohonanPemasukan]'");
                      foreach($pp->result_array() as $row13)
                      {
                        $permohonanPemasukan = $row13[namaPP];
                      }

                      $sd = $this->db->query("select * from statusdokumen where kodeSD = '$rows[statusDokumen]'");
                      foreach($sd->result_array() as $row14)
                      {
                        $statusDokumen = $row14[namaSD];
                      }

                      $ki = $this->db->query("select * from kesesuaianisi where kodeKI = '$rows[kesesuaianIsi]'");
                      foreach($ki->result_array() as $row15)
                      {
                        $kesesuaianIsi = $row15[namaKI];
                      }

                      $pga = $this->db->query("select * from pengasingan where kodePengasingan = '$rows[pengasingan]'");
                      foreach($pga->result_array() as $row16)
                      {
                        $pengasingan = $row16[namaPengasingan];
                      }

                      $hpik = $this->db->query("select * from statushpik where kodeHPIK = '$rows[statusHPIK]'");
                      foreach($hpik->result_array() as $row17)
                      {
                        $statusHPIK = $row17[namaHPIK];
                      }

                      $pnh = $this->db->query("select * from penahanan where kodePenahanan = '$rows[penahanan]'");
                      foreach($pnh->result_array() as $row18)
                      {
                        $penahanan = $row18[namaPenahanan];
                      }

                      $psy = $this->db->query("select * from pemenuhansyarat where kodePS = '$rows[pemenuhanSyarat]'");
                      foreach($psy->result_array() as $row19)
                      {
                        $pemenuhanSyarat = $row19[namaPS];
                      }

                      $pnl = $this->db->query("select * from penolakan where kodePenolakan = '$rows[penolakan]'");
                      foreach($pnl->result_array() as $row20)
                      {
                        $penolakan = $row20[namaPenolakan];
                      }

                      $ta = $this->db->query("select * from tindakanakhir where kodeTA = '$rows[tindakanAkhir]'");
                      foreach($ta->result_array() as $row21)
                      {
                        $tindakanAkhir = $row21[namaTA];
                      }

                      //isi cell
	      $excel->setActiveSheetIndex(0)->setCellValue('A'.$num_rows, $rows[idKarantina]);
	      $excel->setActiveSheetIndex(0)->setCellValue('B'.$num_rows, $jenisMP);
	      $excel->setActiveSheetIndex(0)->setCellValue('C'.$num_rows, $class); 
	      $excel->setActiveSheetIndex(0)->setCellValue('D'.$num_rows, $kelompok); 
	      $excel->setActiveSheetIndex(0)->setCellValue('E'.$num_rows, $bentuk);
	      $excel->setActiveSheetIndex(0)->setCellValue('F'.$num_rows, $perolehanmedia);
	      $excel->setActiveSheetIndex(0)->setCellValue('G'.$num_rows, $tujuanPenggunaan);
	      $excel->setActiveSheetIndex(0)->setCellValue('H'.$num_rows, $statusRegistrasi); 
	      $excel->setActiveSheetIndex(0)->setCellValue('I'.$num_rows, $suspectibleSpecies); 
	      $excel->setActiveSheetIndex(0)->setCellValue('J'.$num_rows, $terjangkit);
	      $excel->setActiveSheetIndex(0)->setCellValue('K'.$num_rows, $tingkatResiko);
	      $excel->setActiveSheetIndex(0)->setCellValue('L'.$num_rows, $diketahuiPemilik);
	      $excel->setActiveSheetIndex(0)->setCellValue('M'.$num_rows, $tempatPemasukan); 
	      $excel->setActiveSheetIndex(0)->setCellValue('N'.$num_rows, $permohonanPemasukan); 
	      $excel->setActiveSheetIndex(0)->setCellValue('O'.$num_rows, $statusDokumen);
	      $excel->setActiveSheetIndex(0)->setCellValue('P'.$num_rows, $kesesuaianIsi);
	      $excel->setActiveSheetIndex(0)->setCellValue('Q'.$num_rows, $pengasingan);
	      $excel->setActiveSheetIndex(0)->setCellValue('R'.$num_rows, $statusHPIK); 
	      $excel->setActiveSheetIndex(0)->setCellValue('S'.$num_rows, $penahanan); 
	      $excel->setActiveSheetIndex(0)->setCellValue('T'.$num_rows, $pemenuhanSyarat);
	      $excel->setActiveSheetIndex(0)->setCellValue('U'.$num_rows, $penolakan);
	      $excel->setActiveSheetIndex(0)->setCellValue('V'.$num_rows, $tindakanAkhir);

	      //style
	      $excel->getActiveSheet()->getStyle('A'.$num_rows)->applyFromArray($style_col);
	      $excel->getActiveSheet()->getStyle('B'.$num_rows)->applyFromArray($style_col);
	      $excel->getActiveSheet()->getStyle('C'.$num_rows)->applyFromArray($style_col);
	      $excel->getActiveSheet()->getStyle('D'.$num_rows)->applyFromArray($style_col);
	      $excel->getActiveSheet()->getStyle('E'.$num_rows)->applyFromArray($style_col);
	      $excel->getActiveSheet()->getStyle('F'.$num_rows)->applyFromArray($style_col);
	      $excel->getActiveSheet()->getStyle('G'.$num_rows)->applyFromArray($style_col);
	      $excel->getActiveSheet()->getStyle('H'.$num_rows)->applyFromArray($style_col);
	      $excel->getActiveSheet()->getStyle('I'.$num_rows)->applyFromArray($style_col);
	      $excel->getActiveSheet()->getStyle('J'.$num_rows)->applyFromArray($style_col);
	      $excel->getActiveSheet()->getStyle('K'.$num_rows)->applyFromArray($style_col);
	      $excel->getActiveSheet()->getStyle('L'.$num_rows)->applyFromArray($style_col);
	      $excel->getActiveSheet()->getStyle('M'.$num_rows)->applyFromArray($style_col);
	      $excel->getActiveSheet()->getStyle('N'.$num_rows)->applyFromArray($style_col);
	      $excel->getActiveSheet()->getStyle('O'.$num_rows)->applyFromArray($style_col);
	      $excel->getActiveSheet()->getStyle('P'.$num_rows)->applyFromArray($style_col);
	      $excel->getActiveSheet()->getStyle('Q'.$num_rows)->applyFromArray($style_col);
	      $excel->getActiveSheet()->getStyle('R'.$num_rows)->applyFromArray($style_col);
	      $excel->getActiveSheet()->getStyle('S'.$num_rows)->applyFromArray($style_col);
	      $excel->getActiveSheet()->getStyle('T'.$num_rows)->applyFromArray($style_col);
	      $excel->getActiveSheet()->getStyle('U'.$num_rows)->applyFromArray($style_col);
	      $excel->getActiveSheet()->getStyle('V'.$num_rows)->applyFromArray($style_col);
      }

      // Set width kolom
         
      $excel->getActiveSheet()->getColumnDimension('A')->setWidth(11); //
      $excel->getActiveSheet()->getColumnDimension('B')->setWidth(32); // 
      $excel->getActiveSheet()->getColumnDimension('C')->setWidth(32); //
      $excel->getActiveSheet()->getColumnDimension('D')->setWidth(32); //
      $excel->getActiveSheet()->getColumnDimension('E')->setWidth(60); // 
      $excel->getActiveSheet()->getColumnDimension('F')->setWidth(32); //
      $excel->getActiveSheet()->getColumnDimension('G')->setWidth(50); //
      $excel->getActiveSheet()->getColumnDimension('H')->setWidth(32); // 
      $excel->getActiveSheet()->getColumnDimension('I')->setWidth(24); //
      $excel->getActiveSheet()->getColumnDimension('J')->setWidth(16); //
      $excel->getActiveSheet()->getColumnDimension('K')->setWidth(32); // 
      $excel->getActiveSheet()->getColumnDimension('L')->setWidth(24); //
      $excel->getActiveSheet()->getColumnDimension('M')->setWidth(32); //
      $excel->getActiveSheet()->getColumnDimension('N')->setWidth(16); // 
      $excel->getActiveSheet()->getColumnDimension('O')->setWidth(16); //
      $excel->getActiveSheet()->getColumnDimension('P')->setWidth(16); //
      $excel->getActiveSheet()->getColumnDimension('Q')->setWidth(16); // 
      $excel->getActiveSheet()->getColumnDimension('R')->setWidth(16); //
      $excel->getActiveSheet()->getColumnDimension('S')->setWidth(16); //
      $excel->getActiveSheet()->getColumnDimension('T')->setWidth(24); // 
      $excel->getActiveSheet()->getColumnDimension('U')->setWidth(16); //
      $excel->getActiveSheet()->getColumnDimension('V')->setWidth(16); //
      
      // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
      $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
      // Set orientasi kertas jadi LANDSCAPE
      $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
      // Set judul file excel nya
      $excel->getActiveSheet(0)->setTitle("Karantina Ikan");
      $excel->setActiveSheetIndex(0);
      // Proses file excel
      header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
      header('Content-Disposition: attachment; filename="Laporan Tindakan Karantina Ikan dan Produk Perikanan Lainnya.xls"'); // Set nama file excel nya
      header('Cache-Control: max-age=0');
      $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
      $write->save('php://output');
	}

	
	//----------------------Data Registrasi--------------------------
	function dregistrasi()
	{
		//cek_session_admin();
		$data['dataregistrasi'] = $this->model_utama->dregistrasi();
		$this->template->load('administrator/template', 'administrator/mod_dregistrasi/view', $data);
	}

	function tambah_dregistrasi()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$kodeDR = $this->input->post('a');
			$namaDR = $this->input->post('b');
			$jenisMP = $this->input->post('c');
			$sr = $this->input->post('d');
			$clean1 = $this->security->xss_clean($kodeDR);
			$clean2 = $this->security->xss_clean($namaDR);
			$clean3 = $this->security->xss_clean($jenisMP);
			$clean4 = $this->security->xss_clean($sr);
			$cek = $this->model_utama->cek_dregistrasi($clean1, $clean2, $clean3, $clean4);
			if ($cek && (!empty($kodeDR))) {
				echo "<script>alert('Kode Data Registrasi Sudah Ada');
		window.location = '" . base_url('administrator/tambah_dregistrasi') . "'</script>";
			} else {
				$this->model_utama->savedregistrasi();
				redirect('administrator/dregistrasi');
			}
		} else {
			$this->template->load('administrator/template', 'administrator/mod_dregistrasi/tambah');
		}
	}

	function edit_dregistrasi()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$this->model_utama->updatedregistrasi();
			redirect('administrator/dregistrasi');
		} else {
			$data['rows'] = $this->model_utama->editdregistrasi($id)->row_array();
			$this->template->load('administrator/template', 'administrator/mod_dregistrasi/edit_r', $data);
		}
	}
	function delete_dregistrasi()
	{
		$id = $this->uri->segment(3);
		$this->model_utama->hapusdregistrasi($id);
		redirect('administrator/dregistrasi');
	}


	//----------------------Data Kategori Resiko--------------------------
	function dresiko()
	{
		cek_session_admin();
		$data['datakategoriresiko'] = $this->model_utama->dresiko();
		$this->template->load('administrator/template', 'administrator/mod_dresiko/view', $data);
	}

	function tambah_dresiko()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$kodeDKR = $this->input->post('a');
			$namaDKR = $this->input->post('b');
			$jenisMP = $this->input->post('c');
			$tkr = $this->input->post('d');
			$clean1 = $this->security->xss_clean($kodeDKR);
			$clean2 = $this->security->xss_clean($namaDKR);
			$clean3 = $this->security->xss_clean($jenisMP);
			$clean4 = $this->security->xss_clean($tkr);
			$cek = $this->model_utama->cek_dregistrasi($clean1, $clean2, $clean3, $clean4);
			if ($cek && (!empty($kodeDR))) {
				echo "<script>alert('Kode Data Tingkat Kategori Resiko Sudah Ada');
		window.location = '" . base_url('administrator/tambah_dresiko') . "'</script>";
			} else {
				$this->model_utama->savedresiko();
				redirect('administrator/dresiko');
			}
		} else {
			$this->template->load('administrator/template', 'administrator/mod_dresiko/tambah');
		}
	}

	function edit_dresiko()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$this->model_utama->updatedresiko();
			redirect('administrator/dresiko');
		} else {
			$data['rows'] = $this->model_utama->editdresiko($id)->row_array();
			$this->template->load('administrator/template', 'administrator/mod_dresiko/edit_r', $data);
		}
	}
	function delete_dresiko()
	{
		$id = $this->uri->segment(3);
		$this->model_utama->hapusdresiko($id);
		redirect('administrator/dresiko');
	}



	//----------------------Data Suspectible Species--------------------------
	function dsuspect()
	{
		cek_session_admin();
		$data['datasuspect'] = $this->model_utama->dsuspect();
		$this->template->load('administrator/template', 'administrator/mod_dsuspect/view', $data);
	}

	function tambah_dsuspect()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$kodeDS = $this->input->post('a');
			$namaDS = $this->input->post('b');
			$jenisMP = $this->input->post('c');
			$ss = $this->input->post('d');
			$clean1 = $this->security->xss_clean($kodeDS);
			$clean2 = $this->security->xss_clean($namaDS);
			$clean3 = $this->security->xss_clean($jenisMP);
			$clean4 = $this->security->xss_clean($sr);
			$cek = $this->model_utama->cek_dregistrasi($clean1, $clean2, $clean3, $clean4);
			if ($cek && (!empty($kodeDS))) {
				echo "<script>alert('Kode Data Suspectible Species Sudah Ada');
		window.location = '" . base_url('administrator/tambah_dsuspect') . "'</script>";
			} else {
				$this->model_utama->savedsuspect();
				redirect('administrator/dsuspect');
			}
		} else {
			$this->template->load('administrator/template', 'administrator/mod_dsuspect/tambah');
		}
	}

	function edit_dsuspect()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$this->model_utama->updatedsuspect();
			redirect('administrator/dsuspect');
		} else {
			$data['rows'] = $this->model_utama->editdsuspect($id)->row_array();
			$this->template->load('administrator/template', 'administrator/mod_dsuspect/edit_r', $data);
		}
	}
	function delete_dsuspect()
	{
		$id = $this->uri->segment(3);
		$this->model_utama->hapusdsuspect($id);
		redirect('administrator/dsuspect');
	}



	//----------------------Data Terjangkit--------------------------
	function dterjangkit()
	{
		cek_session_admin();
		$data['dataterjangkit'] = $this->model_utama->dterjangkit();
		$this->template->load('administrator/template', 'administrator/mod_dterjangkit/view', $data);
	}

	function tambah_dterjangkit()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$kodeDT = $this->input->post('a');
			$namaDT = $this->input->post('b');
			$jenisMP = $this->input->post('c');
			$st = $this->input->post('d');
			$clean1 = $this->security->xss_clean($kodeDT);
			$clean2 = $this->security->xss_clean($namaDT);
			$clean3 = $this->security->xss_clean($jenisMP);
			$clean4 = $this->security->xss_clean($st);
			$cek = $this->model_utama->cek_dterjangkit($clean1, $clean2, $clean3, $clean4);
			if ($cek && (!empty($kodeDT))) {
				echo "<script>alert('Kode Data Terjangkit Sudah Ada');
		window.location = '" . base_url('administrator/tambah_dterjangkit') . "'</script>";
			} else {
				$this->model_utama->savedterjangkit();
				redirect('administrator/dterjangkit');
			}
		} else {
			$this->template->load('administrator/template', 'administrator/mod_dterjangkit/tambah');
		}
	}

	function edit_dterjangkit()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$this->model_utama->updatedterjangkit();
			redirect('administrator/dterjangkit');
		} else {
			$data['rows'] = $this->model_utama->editdterjangkit($id)->row_array();
			$this->template->load('administrator/template', 'administrator/mod_dterjangkit/edit_r', $data);
		}
	}
	function delete_dterjangkit()
	{
		$id = $this->uri->segment(3);
		$this->model_utama->hapusdterjangkit($id);
		redirect('administrator/dterjangkit');
	}

	//----------------------Gambar Dokumen--------------------------
	function gamdokumen()
	{
		cek_session_admin();
		$data['gamdokumen'] = $this->model_utama->gamdokumen();
		$this->template->load('administrator/template', 'administrator/mod_gamdokumen/view', $data);
	}

	function tambah_gamdokumen()
	{
		cek_session_admin();
		if (isset($_POST['submit'])) {
			$kode_gam = $this->input->post('a');
			$nama_gam = $this->input->post('b');
			// $gambar = $this->input->post('c');
			$ket = $this->input->post('d');
			$gambar = $_FILES['file'];
			$clean1 = $this->security->xss_clean($kode_gam);
			$clean2 = $this->security->xss_clean($nama_gam);
			$clean3 = $this->security->xss_clean($gambar);
			$clean4 = $this->security->xss_clean($ket);
			$cek = $this->model_utama->cek_gamdokumen($clean1, $clean2, $clean3, $clean4);
			if ($gambar = '') {
			} else {
				$config['upload_path'] = './assets/';
				$config['allowed_types'] = 'jpg|png|gif';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('gambar')) {
					echo "Upload Gagal";
					die();
				} else {
					$gambar = $this->upload->data('file');
				}
			}
			if ($cek && (!empty($kode_gam))) {
				echo "<script>alert('Kode Gambar Dokumen Sudah Ada');
		window.location = '" . base_url('administrator/tambah_gamdokumen') . "'</script>";
			} else {
				$this->model_utama->savegamdokumen();
				redirect('administrator/gamdokumen');
			}
		} else {
			$this->template->load('administrator/template', 'administrator/mod_gamdokumen/tambah');
		}
	}

	function edit_gamdokumen()
	{
		cek_session_admin();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$this->model_utama->updategamdokumen();
			redirect('administrator/gamdokumen');
		} else {
			$data['rows'] = $this->model_utama->editgamdokumen($id)->row_array();
			$this->template->load('administrator/template', 'administrator/mod_gamdokumen/edit', $data);
		}
	}
	function delete_gamdokumen()
	{
		$id = $this->uri->segment(3);
		$this->model_utama->hapusgamdokumen($id);
		redirect('administrator/gamdokumen');
	}

	function contoh_dokumen()
	{
		$this->template->load('administrator/template', 'administrator/mod_gamdokumen/view_static');
	}

	

}

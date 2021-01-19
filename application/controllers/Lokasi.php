<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lokasi extends CI_Controller {

    public function __construct(){
        parent::__construct();
            $this->load->helper('url','form');    
            $this->load->model('LokasiModel');
    }
    
    public function index() {
        $data['lokasi'] = $this->LokasiModel->view();
        $this->template->load('administrator/template', 'administrator/lokasi/view_tampil',$data);  
    }

    public function add() {    
        $this->template->load('administrator/template', 'administrator/lokasi/view_add');
    }
    
    public function save() {
        $data=array('nama_lokasi' => $this->input->post('nama_lokasi'),
                    'keterangan' => $this->input->post('keterangan'));
        $this->LokasiModel->insert_lokasi($data);    
        redirect('lokasi');        
    }

    public function detail(){  
        $nama_alat = $this->uri->segment(3);
        $data = array(
                    'detail'=>$this->lokasiModel->getdetail($nama_alat));
        $this->load->view('v_detail');
    }

    public function delete()
    {
    $id = $this->uri->segment(3);
    $this->LokasiModel->hapus($id);
    redirect('lokasi');
    }

    function form_edit()
    {
        cek_session_admin();
        $id = $this->uri->segment(3);
        if (isset($_POST['submit'])) {
          $this->saveUpdate($id);
          redirect('lokasi');
        } else {
          $data['rows'] = $this->LokasiModel->edit($id)->row_array();
          $this->template->load('administrator/template', 'administrator/lokasi/edit', $data);
        }
    }
    function saveUpdate()
    {
        $id = $this->input->post('id');
        $data=array('nama_lokasi' => $this->input->post('nama_lokasi'),
                    'keterangan' => $this->input->post('keterangan'));

        $this->db->where('id', $id);
        $this->db->update('texteditor', $data);   
        redirect('lokasi'); 
    }

    
}
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class LokasiModel extends CI_Model {
    
    public function __construct(){
        parent::__construct();
            
    }    
    
    public function view(){
         return $this->db->query("SELECT * from texteditor ORDER BY nama_lokasi ASC");
    }

    function insert_lokasi($data){
       $this->db->insert('texteditor', $data);  
    }

    public function getdetail($nama_alat){
        $sql = "SELECT * FROM texteditor 
                WHERE nama_lokasi = '".$nama_lokasi."'";                           
        return $this->db->query($sql)->row_array();  
    }

    public function hapus($id)
    {
        return $this->db->query("DELETE FROM texteditor WHERE id='$id'");
    }

    public function edit($id)
    {
        return $this->db->query("SELECT * FROM  texteditor where id='$id'");
    }

}    
?>
<?php 
class Model_users extends CI_model{
    function cek_login($username,$password){
        return $this->db->query("SELECT * FROM users where username='".$this->db->escape_str($username)."' AND password='".$this->db->escape_str($password)."'");
    }
    
	function users(){
		return $this->db->query("SELECT * FROM users");
	}

	function users_tambah(){
        $pw = md5($this->input->post('b'));
        $salt = "Q30@*YV";
        $datadb = array('username'=>$this->db->escape_str($this->input->post('a')),
                        'password'=>crypt($pw, $salt),
                        'nama'=>$this->db->escape_str($this->input->post('c')));
        $this->db->insert('users',$datadb);
    }

    function users_edit($id){
        return $this->db->query("SELECT * FROM users where username='$id'");
    }

    function users_update(){
        if (trim($this->input->post('b'))==''){
            $datadb = array('username'=>$this->db->escape_str($this->input->post('a')),
                            'nama'=>$this->db->escape_str($this->input->post('c')));
            $this->db->where('username',$this->input->post('id'));
            $this->db->update('users',$datadb);
        }else{
            $pw = md5($this->input->post('b'));
      	    $salt = "Q30@*YV";
            $datadb = array('username'=>$this->db->escape_str($this->input->post('a')),
                            'password'=>crypt($pw, $salt),
                            'nama'=>$this->db->escape_str($this->input->post('c')));
            $this->db->where('username',$this->input->post('id'));
            $this->db->update('users',$datadb);
        }
    }

    function users_delete($id){
        return $this->db->query("DELETE FROM users where username='$id'");
    }

}
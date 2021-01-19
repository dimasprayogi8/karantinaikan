<?php
class Model_utama extends CI_model
{

    //---------------Jenis----------------------------
    function jenis()
    {
        return $this->db->query("SELECT * from jenis ORDER BY nama_jenis ASC");
    }
    
    function savejenis()
    {
        $datadb = array(
            'kode_jenis' => $this->db->escape_str($this->input->post('a')),
            'nama_jenis' => $this->db->escape_str($this->input->post('b'))
        );
        $this->db->insert('jenis', $datadb);
    }
    function editjenis($id)
    {
        return $this->db->query("SELECT * FROM  jenis where kode_jenis='$id'");
    }
    function updatejenis()
    {
        $datadb = array(
            'nama_jenis' => $this->db->escape_str($this->input->post('b')),
        );
        $this->db->where('kode_jenis', $this->input->post('a'));
        $this->db->update('jenis', $datadb);
    }
    function hapusjenis($id)
    {
        return $this->db->query("DELETE FROM jenis WHERE kode_jenis='$id'");
    }
    function cek_jenis($clean1, $clean2)
    {
        $q = $this->db->query("SELECT * FROM jenis where kode_jenis='$clean1' OR nama_jenis ='$clean2' ");
        if ($this->db->affected_rows() > 0) {
            $row = $q->row();
            return $row;
        }
    }

    //---------------Class----------------------------
    function class()
    {
        return $this->db->query("SELECT * from class ORDER BY nama_class ASC");
    }
    function saveclass()
    {
        $datadb = array(
            'kode_class' => $this->db->escape_str($this->input->post('a')),
            'nama_class' => $this->db->escape_str($this->input->post('b'))
        );
        $this->db->insert('class', $datadb);
    }
    function editclass($id)
    {
        return $this->db->query("SELECT * FROM  class where kode_class='$id'");
    }
    function updateclass()
    {
        $datadb = array(
            'nama_class' => $this->db->escape_str($this->input->post('b')),
        );
        $this->db->where('kode_class', $this->input->post('a'));
        $this->db->update('class', $datadb);
    }
    function hapusclass($id)
    {
        return $this->db->query("DELETE FROM class WHERE kode_class='$id'");
    }
    function cek_class($clean1, $clean2)
    {
        $q = $this->db->query("SELECT * FROM class where kode_class='$clean1' OR nama_class ='$clean2' ");
        if ($this->db->affected_rows() > 0) {
            $row = $q->row();
            return $row;
        }
    }

    //---------------Kelompok----------------------------
    function kelompok()
    {
        return $this->db->query("SELECT * from kelompok ORDER BY nama_kel ASC");
    }
    function savekelompok()
    {
        $datadb = array(
            'kode_kel' => $this->db->escape_str($this->input->post('a')),
            'nama_kel' => $this->db->escape_str($this->input->post('b'))
        );
        $this->db->insert('kelompok', $datadb);
    }
    function editkelompok($id)
    {
        return $this->db->query("SELECT * FROM  kelompok where kode_kel='$id'");
    }
    function updatekelompok()
    {
        $datadb = array(
            'nama_kel' => $this->db->escape_str($this->input->post('b')),
        );
        $this->db->where('kode_kel', $this->input->post('a'));
        $this->db->update('kelompok', $datadb);
    }
    function hapuskelompok($id)
    {
        return $this->db->query("DELETE FROM kelompok WHERE kode_kel='$id'");
    }
    function cek_kelompok($clean1, $clean2)
    {
        $q = $this->db->query("SELECT * FROM kelompok where kode_kel ='$clean1' OR nama_kel ='$clean2' ");
        if ($this->db->affected_rows() > 0) {
            $row = $q->row();
            return $row;
        }
    }

    //---------------Bentuk----------------------------
    function bentuk()
    {
        return $this->db->query("SELECT * from bentuk ORDER BY nama_bentuk ASC");
    }
    function savebentuk()
    {
        $datadb = array(
            'kode_bentuk' => $this->db->escape_str($this->input->post('a')),
            'nama_bentuk' => $this->db->escape_str($this->input->post('b'))
        );
        $this->db->insert('bentuk', $datadb);
    }
    function editbentuk($id)
    {
        return $this->db->query("SELECT * FROM  bentuk where kode_bentuk='$id'");
    }
    function updatebentuk()
    {
        $datadb = array(
            'nama_bentuk' => $this->db->escape_str($this->input->post('b')),
        );
        $this->db->where('kode_bentuk', $this->input->post('a'));
        $this->db->update('bentuk', $datadb);
    }
    function hapusbentuk($id)
    {
        return $this->db->query("DELETE FROM bentuk WHERE kode_bentuk='$id'");
    }
    function cek_bentuk($clean1, $clean2)
    {
        $q = $this->db->query("SELECT * FROM bentuk where kode_bentuk ='$clean1' OR nama_bentuk ='$clean2' ");
        if ($this->db->affected_rows() > 0) {
            $row = $q->row();
            return $row;
        }
    }


    //---------------Perolehan----------------------------
    function perolehan()
    {
        return $this->db->query("SELECT * from perolehanmedia ORDER BY nama_media ASC");
    }
    function saveperolehan()
    {
        $datadb = array(
            'kode_media' => $this->db->escape_str($this->input->post('a')),
            'nama_media' => $this->db->escape_str($this->input->post('b'))
        );
        $this->db->insert('perolehanmedia', $datadb);
    }
    function editperolehan($id)
    {
        return $this->db->query("SELECT * FROM  perolehanmedia where kode_media='$id'");
    }
    function updateperolehan()
    {
        $datadb = array(
            'nama_media' => $this->db->escape_str($this->input->post('b')),
        );
        $this->db->where('kode_media', $this->input->post('a'));
        $this->db->update('perolehanmedia', $datadb);
    }
    function hapusperolehan($id)
    {
        return $this->db->query("DELETE FROM perolehanmedia WHERE kode_media='$id'");
    }
    function cek_perolehan($clean1, $clean2)
    {
        $q = $this->db->query("SELECT * FROM perolehanmedia where kode_media ='$clean1' OR nama_media ='$clean2' ");
        if ($this->db->affected_rows() > 0) {
            $row = $q->row();
            return $row;
        }
    }

    //---------------Tujuan----------------------------
    function tujuan()
    {
        return $this->db->query("SELECT * from tujuanpenggunaan ORDER BY nama_JP ASC");
    }
    function savetujuan()
    {
        $datadb = array(
            'kode_JP' => $this->db->escape_str($this->input->post('a')),
            'nama_JP' => $this->db->escape_str($this->input->post('b'))
        );
        $this->db->insert('tujuanpenggunaan', $datadb);
    }
    function edittujuan($id)
    {
        return $this->db->query("SELECT * FROM  tujuanpenggunaan where kode_JP='$id'");
    }
    function updatetujuan()
    {
        $datadb = array(
            'nama_JP' => $this->db->escape_str($this->input->post('b')),
        );
        $this->db->where('kode_JP', $this->input->post('a'));
        $this->db->update('tujuanpenggunaan', $datadb);
    }
    function hapustujuan($id)
    {
        return $this->db->query("DELETE FROM tujuanpenggunaan WHERE kode_JP='$id'");
    }
    function cek_tujuan($clean1, $clean2)
    {
        $q = $this->db->query("SELECT * FROM tujuanpenggunaan where kode_JP ='$clean1' OR nama_JP ='$clean2' ");
        if ($this->db->affected_rows() > 0) {
            $row = $q->row();
            return $row;
        }
    }

    //---------------REGISTRASI----------------------------
    function registrasi()
    {
        return $this->db->query("SELECT * from statusregistrasi ORDER BY kodeSR ASC");
    }
    function saveregistrasi()
    {
        $datadb = array(
            'kodeSR' => $this->db->escape_str($this->input->post('a')),
            'namaSR' => $this->db->escape_str($this->input->post('b'))
        );
        $this->db->insert('statusregistrasi', $datadb);
    }
    function editregistrasi($id)
    {
        return $this->db->query("SELECT * FROM  statusregistrasi where kodeSR ='$id'");
    }
    function updateregistrasi()
    {
        $datadb = array(
            'namaSR' => $this->db->escape_str($this->input->post('b')),
        );
        $this->db->where('kodeSR', $this->input->post('a'));
        $this->db->update('statusregistrasi', $datadb);
    }
    function hapusregistrasi($id)
    {
        return $this->db->query("DELETE FROM statusregistrasi WHERE kodeSR='$id'");
    }
    function cek_registrasi($clean1, $clean2)
    {
        $q = $this->db->query("SELECT * FROM statusregistrasi where kodeSR ='$clean1' OR namaSR ='$clean2' ");
        if ($this->db->affected_rows() > 0) {
            $row = $q->row();
            return $row;
        }
    }

    //--------------Species----------------------------
    function species()
    {
        return $this->db->query("SELECT * from suspectiblespecies ORDER BY kodeSS ASC");
    }
    function savespecies()
    {
        $datadb = array(
            'kodeSS' => $this->db->escape_str($this->input->post('a')),
            'namaSS' => $this->db->escape_str($this->input->post('b'))
        );
        $this->db->insert('suspectiblespecies', $datadb);
    }
    function editspecies($id)
    {
        return $this->db->query("SELECT * FROM  suspectiblespecies where kodeSS ='$id'");
    }
    function updatespecies()
    {
         $datadb = array(
            'namaSS' => $this->db->escape_str($this->input->post('b')),
        );
        $this->db->where('kodeSS', $this->input->post('a'));
        $this->db->update('suspectiblespecies', $datadb);
    }
    function hapusspecies($id)
    {
        return $this->db->query("DELETE FROM suspectiblespecies WHERE kodeSS='$id'");
    }
    function cek_species($clean1, $clean2)
    {
        $q = $this->db->query("SELECT * FROM suspectiblespecies where kodeSS ='$clean1' OR namaSS ='$clean2' ");
        if ($this->db->affected_rows() > 0) {
            $row = $q->row();
            return $row;
        }
    }

    //--------------Terjangkit----------------------------
    function terjangkit()
    {
        return $this->db->query("SELECT * FROM terjangkit ORDER BY kodeTerjangkit ASC");
    }

    function saveterjangkit()
    {
        $datadb = array(
            'kodeTerjangkit' => $this->db->escape_str($this->input->post('a')),
            'namaTerjangkit' => $this->db->escape_str($this->input->post('b'))
        );
        $this->db->insert('terjangkit', $datadb);
    }

    function editterjangkit($id)
    {
        return $this->db->query("SELECT * FROM  terjangkit where kodeTerjangkit ='$id'");
    }

    function updateterjangkit()
    {
        $datadb = array(
            'namaTerjangkit' => $this->db->escape_str($this->input->post('b')),
        );
        $this->db->where('kodeTerjangkit', $this->input->post('a'));
        $this->db->update('terjangkit', $datadb);
    }
    function hapusterjangkit($id)
    {
        return $this->db->query("DELETE FROM terjangkit WHERE kodeTerjangkit='$id'");
    }
    function cek_terjangkit($clean1, $clean2)
    {
        $q = $this->db->query("SELECT * FROM terjangkit where kodeTerjangkit ='$clean1' OR namaTerjangkit ='$clean2' ");
        if ($this->db->affected_rows() > 0) {
            $row = $q->row();
            return $row;
        }
    }


    //--------------Resiko----------------------------
    function resiko()
    {
        return $this->db->query("SELECT * from tingkatresiko ORDER BY kodeTR ASC");
    }
    function saveresiko()
    {
        $datadb = array(
            'kodeTR' => $this->db->escape_str($this->input->post('a')),
            'namaTR' => $this->db->escape_str($this->input->post('b'))
        );
        $this->db->insert('tingkatresiko', $datadb);
    }
    function editresiko($id)
    {
        return $this->db->query("SELECT * FROM  tingkatresiko where kodeTR ='$id'");
    }
    function updateresiko()
    {
        $datadb = array(
            'namaTR' => $this->db->escape_str($this->input->post('b')),
        );
        $this->db->where('kodeTR', $this->input->post('a'));
        $this->db->update('tingkatresiko', $datadb);
    }
    function hapusresiko($id)
    {
        return $this->db->query("DELETE FROM tingkatresiko WHERE kodeTR='$id'");
    }
    function cek_resiko($clean1, $clean2)
    {
        $q = $this->db->query("SELECT * FROM tingkatresiko where kodeTR ='$clean1' OR namaTR ='$clean2' ");
        if ($this->db->affected_rows() > 0) {
            $row = $q->row();
            return $row;
        }
    }

    //--------------Diketahui Pemilik----------------------------
    function diketahuipem()
    {
        return $this->db->query("SELECT * from diketahuipemilik ORDER BY kodeDP ASC");
    }
    function savediketahuipemilik()
    {
        $datadb = array(
            'kodeDP' => $this->db->escape_str($this->input->post('a')),
            'namaDP' => $this->db->escape_str($this->input->post('b'))
        );
        $this->db->insert('diketahuipemilik', $datadb);
    }
    function editdiketahuipem($id)
    {
        return $this->db->query("SELECT * FROM  diketahuipemilik where kodeDP ='$id'");
    }
    function updatediketahuipem()
    {
        $datadb = array(
            'namaDP' => $this->db->escape_str($this->input->post('b')),
        );
        $this->db->where('kodeDP', $this->input->post('a'));
        $this->db->update('diketahuipemilik', $datadb);
    }
    function hapusdiketahuipem($id)
    {
        return $this->db->query("DELETE FROM diketahuipemilik WHERE kodeDP='$id'");
    }
    function cek_diketahuipem($clean1, $clean2)
    {
        $q = $this->db->query("SELECT * FROM diketahuipemilik where kodeDP ='$clean1' OR namaDP ='$clean2' ");
        if ($this->db->affected_rows() > 0) {
            $row = $q->row();
            return $row;
        }
    }


    //--------------Tempat Pemasukan----------------------------
    function tempem()
    {
        return $this->db->query("SELECT * from tempatpemasukan ORDER BY kodeTP ASC");
    }
    function savetempem()
    {
        $datadb = array(
            'kodeTP' => $this->db->escape_str($this->input->post('a')),
            'namaTP' => $this->db->escape_str($this->input->post('b'))
        );
        $this->db->insert('tempatpemasukan', $datadb);
    }
    function edittempem($id)
    {
        return $this->db->query("SELECT * FROM  tempatpemasukan where kodeTP ='$id'");
    }
    function updatetempem()
    {
        $datadb = array(
            'namaTP' => $this->db->escape_str($this->input->post('b')),
        );
        $this->db->where('kodeTP', $this->input->post('a'));
        $this->db->update('tempatpemasukan', $datadb);
    }
    function hapustempem($id)
    {
        return $this->db->query("DELETE FROM tempatpemasukan WHERE kodeTP='$id'");
    }
    function cek_tempem($clean1, $clean2)
    {
        $q = $this->db->query("SELECT * FROM tempatpemasukan where kodeTP ='$clean1' OR namaTP ='$clean2' ");
        if ($this->db->affected_rows() > 0) {
            $row = $q->row();
            return $row;
        }
    }


     //--------------Permohonan Pemasukan----------------------------
    function perpem()
    {
        return $this->db->query("SELECT * from permohonanpemasukan ORDER BY kodePP ASC");
    }
    function saveperpem()
    {
        $datadb = array(
            'kodePP' => $this->db->escape_str($this->input->post('a')),
            'namaPP' => $this->db->escape_str($this->input->post('b'))
        );
        $this->db->insert('permohonanpemasukan', $datadb);
    }
    function editperpem($id)
    {
        return $this->db->query("SELECT * FROM  permohonanpemasukan where kodePP ='$id'");
    }
    function updateperpem()
    {
        $datadb = array(
            'namaPP' => $this->db->escape_str($this->input->post('b')),
        );
        $this->db->where('kodePP', $this->input->post('a'));
        $this->db->update('permohonanpemasukan', $datadb);
    }
    function hapusperpem($id)
    {
        return $this->db->query("DELETE FROM permohonanpemasukan WHERE kodePP='$id'");
    }
    function cek_perpem($clean1, $clean2)
    {
        $q = $this->db->query("SELECT * FROM permohonanpemasukan where kodePP ='$clean1' OR namaPP ='$clean2' ");
        if ($this->db->affected_rows() > 0) {
            $row = $q->row();
            return $row;
        }
    }


    //--------------Status Dokumen----------------------------
    function dokumen()
    {
        return $this->db->query("SELECT * from statusdokumen ORDER BY kodeSD ASC");
    }
    function savedokumen()
    {
        $datadb = array(
            'kodeSD' => $this->db->escape_str($this->input->post('a')),
            'namaSD' => $this->db->escape_str($this->input->post('b'))
        );
        $this->db->insert('statusdokumen', $datadb);
    }
    function editdokumen($id)
    {
        return $this->db->query("SELECT * FROM  statusdokumen where kodeSD ='$id'");
    }
    function updatedokumen()
    {
        $datadb = array(
            'namaSD' => $this->db->escape_str($this->input->post('b')),
        );
        $this->db->where('kodeSD', $this->input->post('a'));
        $this->db->update('statusdokumen', $datadb);
    }
    function hapusdokumen($id)
    {
        return $this->db->query("DELETE FROM statusdokumen WHERE kodeSD='$id'");
    }
    function cek_dokumen($clean1, $clean2)
    {
        $q = $this->db->query("SELECT * FROM statusdokumen where kodeSD ='$clean1' OR namaSD ='$clean2' ");
        if ($this->db->affected_rows() > 0) {
            $row = $q->row();
            return $row;
        }
    }

    //--------------Kesesuaian Isi----------------------------
    function kesesuaian()
    {
        return $this->db->query("SELECT * from kesesuaianisi ORDER BY kodeKI ASC");
    }
    function savekesesuaian()
    {
        $datadb = array(
            'kodeKI' => $this->db->escape_str($this->input->post('a')),
            'namaKI' => $this->db->escape_str($this->input->post('b'))
        );
        $this->db->insert('kesesuaianisi', $datadb);
    }
    function editkesesuaian($id)
    {
        return $this->db->query("SELECT * FROM  kesesuaianisi where kodeKI ='$id'");
    }
    function updatekesesuaian()
    {
        $datadb = array(
            'namaKI' => $this->db->escape_str($this->input->post('b')),
        );
        $this->db->where('kodeKI', $this->input->post('a'));
        $this->db->update('kesesuaianisi', $datadb);
    }
    function hapuskesesuaian($id)
    {
        return $this->db->query("DELETE FROM kesesuaianisi WHERE kodeKI='$id'");
    }
    function cek_kesesuaian($clean1, $clean2)
    {
        $q = $this->db->query("SELECT * FROM kesesuaianisi where kodeKI ='$clean1' OR namaKI ='$clean2' ");
        if ($this->db->affected_rows() > 0) {
            $row = $q->row();
            return $row;
        }
    }

    //--------------Pengasingan----------------------------
    function pengasingan()
    {
        return $this->db->query("SELECT * from pengasingan ORDER BY kodePengasingan ASC");
    }
    function savepengasingan()
    {
        $datadb = array(
            'kodePengasingan' => $this->db->escape_str($this->input->post('a')),
            'namaPengasingan' => $this->db->escape_str($this->input->post('b'))
        );
        $this->db->insert('pengasingan', $datadb);
    }
    function editpengasingan($id)
    {
        return $this->db->query("SELECT * FROM  pengasingan where kodePengasingan ='$id'");
    }
    function updatepengasingan()
    {
        $datadb = array(
            'namaPengasingan' => $this->db->escape_str($this->input->post('b')),
        );
        $this->db->where('kodePengasingan', $this->input->post('a'));
        $this->db->update('pengasingan', $datadb);
    }
    function hapuspengasingan($id)
    {
        return $this->db->query("DELETE FROM pengasingan WHERE kodePengasingan='$id'");
    }
    function cek_pengasingan($clean1, $clean2)
    {
        $q = $this->db->query("SELECT * FROM pengasingan where kodePengasingan ='$clean1' OR namaPengasingan ='$clean2' ");
        if ($this->db->affected_rows() > 0) {
            $row = $q->row();
            return $row;
        }
    }


    //--------------Status HPIK----------------------------
    function hpik()
    {
        return $this->db->query("SELECT * from statushpik ORDER BY kodeHPIK ASC");
    }
    function savehpik()
    {
        $datadb = array(
            'kodeHPIK' => $this->db->escape_str($this->input->post('a')),
            'namaHPIK' => $this->db->escape_str($this->input->post('b'))
        );
        $this->db->insert('statushpik', $datadb);
    }
    function edithpik($id)
    {
        return $this->db->query("SELECT * FROM  statushpik where kodeHPIK ='$id'");
    }
    function updatehpik()
    {
        $datadb = array(
            'namaHPIK' => $this->db->escape_str($this->input->post('b')),
        );
        $this->db->where('kodeHPIK', $this->input->post('a'));
        $this->db->update('statushpik', $datadb);
    }
    function hapushpik($id)
    {
        return $this->db->query("DELETE FROM statushpik WHERE kodeHPIK='$id'");
    }
    function cek_hpik($clean1, $clean2)
    {
        $q = $this->db->query("SELECT * FROM statushpik where kodeHPIK ='$clean1' OR namHPIK ='$clean2' ");
        if ($this->db->affected_rows() > 0) {
            $row = $q->row();
            return $row;
        }
    }


    //--------------penahanan----------------------------
    function penahanan()
    {
        return $this->db->query("SELECT * from penahanan ORDER BY kodePenahanan ASC");
    }
    function savepenahanan()
    {
        $datadb = array(
            'kodePenahanan' => $this->db->escape_str($this->input->post('a')),
            'namaPenahanan' => $this->db->escape_str($this->input->post('b'))
        );
        $this->db->insert('penahanan', $datadb);
    }
    function editpenahanan($id)
    {
        return $this->db->query("SELECT * FROM  penahanan where kodePenahanan ='$id'");
    }
    function updatepenahanan()
    {
        $datadb = array(
            'namaPenahanan' => $this->db->escape_str($this->input->post('b')),
        );
        $this->db->where('kodePenahanan', $this->input->post('a'));
        $this->db->update('statusPenahanan', $datadb);
    }
    function hapuspenahanan($id)
    {
        return $this->db->query("DELETE FROM penahanan WHERE kodePenahanan='$id'");
    }
    function cek_penahanan($clean1, $clean2)
    {
        $q = $this->db->query("SELECT * FROM penahanan where kodePenahanan ='$clean1' OR namPenahanan ='$clean2' ");
        if ($this->db->affected_rows() > 0) {
            $row = $q->row();
            return $row;
        }
    }


    //--------------pemenuhan Persyaratan----------------------------
    function pemenuhansyarat()
    {
        return $this->db->query("SELECT * from pemenuhansyarat ORDER BY kodePS ASC");
    }
    function savepemenuhansyarat()
    {
        $datadb = array(
            'kodePS' => $this->db->escape_str($this->input->post('a')),
            'namaPS' => $this->db->escape_str($this->input->post('b'))
        );
        $this->db->insert('pemenuhansyarat', $datadb);
    }
    function editpemenuhansyarat($id)
    {
        return $this->db->query("SELECT * FROM  pemenuhansyarat where kodePS ='$id'");
    }
    function updatepemenuhansyarat()
    {
        $datadb = array(
            'namaPS' => $this->db->escape_str($this->input->post('b')),
        );
        $this->db->where('kodePS', $this->input->post('a'));
        $this->db->update('pemenuhansyarat', $datadb);
    }
    function hapuspemenuhansyarat($id)
    {
        return $this->db->query("DELETE FROM pemenuhansyarat WHERE kodePS='$id'");
    }
    function cek_pemenuhansyarat($clean1, $clean2)
    {
        $q = $this->db->query("SELECT * FROM pemenuhansyarat where kodePS ='$clean1' OR namPS ='$clean2' ");
        if ($this->db->affected_rows() > 0) {
            $row = $q->row();
            return $row;
        }
    }



    //--------------Penolakan----------------------------
    function penolakan()
    {
        return $this->db->query("SELECT * from penolakan ORDER BY kodePenolakan ASC");
    }
    function savepenolakan()
    {
        $datadb = array(
            'kodePenolakan' => $this->db->escape_str($this->input->post('a')),
            'namaPenolakan' => $this->db->escape_str($this->input->post('b'))
        );
        $this->db->insert('penolakan', $datadb);
    }
    function editpenolakan($id)
    {
        return $this->db->query("SELECT * FROM  penolakan where kodePenolakan ='$id'");
    }
    function updatepenolakan()
    {
        $datadb = array(
            'namaPenolakan' => $this->db->escape_str($this->input->post('b')),
        );
        $this->db->where('kodePenolakan', $this->input->post('a'));
        $this->db->update('penolakan', $datadb);
    }
    function hapuspenolakan($id)
    {
        return $this->db->query("DELETE FROM penolakan WHERE kodePenolakan='$id'");
    }
    function cek_penolakan($clean1, $clean2)
    {
        $q = $this->db->query("SELECT * FROM penolakan where kodePenolakan ='$clean1' OR namPenolakan ='$clean2' ");
        if ($this->db->affected_rows() > 0) {
            $row = $q->row();
            return $row;
        }
    }

    //karantinaikan
    function karantinaikan()
    {
        return $this->db->query("SELECT * from karantinaikan ORDER BY nama_ikan ASC");
    }

    //save karantina
    function simpankarantina()
    {
        $TT = $this->db->escape_str($this->input->post('penolakan'));
        $OO = $this->db->escape_str($this->input->post('kesesuaian_isi'));
        $QQ = $this->db->escape_str($this->input->post('status_hpik'));
        $NN = $this->db->escape_str($this->input->post('status_dokumen'));
        $LL = $this->db->escape_str($this->input->post('tempat_ditetapkan'));
        $JJ = $this->db->escape_str($this->input->post('kategori_resiko'));

        //rule C.50
        /*
        if($TT == 2)
        {
            $tindakanAkhir = 1;
        }
        else if ($TT == 3)
        {
            if($OO == 1)
            {
                $tindakanAkhir = 5;
            }
            else
            {
                $tindakanAkhir = 4;
            }
        }
        else{
            if($NN == 1 OR $NN == 3)
            {
                $tindakanAkhir = 3;
            }
            else
            {
                if($LL == 1)
                {
                    $tindakanAkhir = 2;
                }
                else{
                    if($JJ == 2){
                        $tindakanAkhir = 2;
                    }
                    else{
                        $tindakanAkhir = 3;
                    }
                }
            }
        }*/

        //rule CTree
        if ($TT == 2)
        {
            $tindakanAkhir = 1;
        }
        else
        {
            if($QQ == 4)
            {
                $tindakanAkhir = 5;
            }
            else
            {
                if($NN == 3)
                {
                    $tindakanAkhir = 3;
                }
                else if($NN == 2)
                {
                    if($LL == 1)
                    {
                        $tindakanAkhir = 2;
                    }
                    else
                    {
                        if($JJ == 2)
                        {
                            $tindakanAkhir = 2;
                        }
                        else
                        {
                            $tindakanAkhir = 3;
                        }
                    }
                }
                else{
                    if($LL == 2)
                    {
                        $tindakanAkhir = 3;
                    }
                    else
                    {
                        $tindakanAkhir = 4;
                    }
                }
            }
        }

        $datadb = array(
            'nama_ikan' => $this->db->escape_str($this->input->post('nama_ikan')),
            'jenisMP' => $this->db->escape_str($this->input->post('media_pembawa')), //A
            'class' => $this->db->escape_str($this->input->post('class')), //B
            'kelompok' => $this->db->escape_str($this->input->post('kelompok')), //C
            'bentuk' => $this->db->escape_str($this->input->post('bentuk_jenis')), //D
            'perolehanmedia' => $this->db->escape_str($this->input->post('perolehan_media')), //E
            'tujuanPenggunaan' => $this->db->escape_str($this->input->post('tujuan_penggunaan')), //F
            'statusRegistrasi' => $this->db->escape_str($this->input->post('status_registrasi')), //G
            'suspctibleSpecies' => $this->db->escape_str($this->input->post('susceptible_species')), //H
            'terjangkit' => $this->db->escape_str($this->input->post('terjangkit')), //I
            'tingkatResiko' => $JJ, //J
            'diketahuiPemilik' => $this->db->escape_str($this->input->post('diketahui')), //K
            'tempatPemasukan' => $LL, //L
            'permohonanPemasukan' => $this->db->escape_str($this->input->post('ppk_online')), //M
            'statusDokumen' => $NN, //N
            'kesesuaianIsi' => $OO, //O
            'pengasingan' => $this->db->escape_str($this->input->post('pengasingan')), //P
            'statusHPIK' => $QQ, //Q
            'penahanan' => $this->db->escape_str($this->input->post('penahanan')), //R
            'pemenuhanSyarat' => $this->db->escape_str($this->input->post('kekurangan')), //S
            'penolakan' => $TT,
            'tindakanAkhir' => $tindakanAkhir
        );

        $this->db->insert('karantinaikan', $datadb);
    }

    //hapus sdss
    function hapussdss($id)
    {
        return $this->db->query("DELETE FROM karantinaikan WHERE idKarantina = '$id'");
    }

    //editsdss
    function editsdss($id)
    {
        return $this->db->query("SELECT * FROM karantinaikan where idKarantina='$id'");
    }

    function updatesdss()
    {


        $TT = $this->db->escape_str($this->input->post('penolakan'));
        $OO = $this->db->escape_str($this->input->post('kesesuaian_isi'));
        $QQ = $this->db->escape_str($this->input->post('status_hpik'));
        $NN = $this->db->escape_str($this->input->post('status_dokumen'));
        $LL = $this->db->escape_str($this->input->post('tempat_ditetapkan'));
        $JJ = $this->db->escape_str($this->input->post('kategori_resiko'));

        /*
        //rule C.50
        if($TT == 2)
        {
            $tindakanAkhir = 1;
        }
        else if ($TT == 3)
        {
            if($OO == 1)
            {
                $tindakanAkhir = 5;
            }
            else
            {
                $tindakanAkhir = 4;
            }
        }
        else{
            if($NN == 1 OR $NN == 3)
            {
                $tindakanAkhir = 3;
            }
            else
            {
                if($LL == 1)
                {
                    $tindakanAkhir = 2;
                }
                else{
                    if($JJ == 2){
                        $tindakanAkhir = 2;
                    }
                    else{
                        $tindakanAkhir = 3;
                    }
                }
            }
        }
        */

        //rule CTree
        if ($TT == 2)
        {
            $tindakanAkhir = 1;
        }
        else
        {
            if($QQ == 4)
            {
                $tindakanAkhir = 5;
            }
            else
            {
                if($NN == 3)
                {
                    $tindakanAkhir = 3;
                }
                else if($NN == 2)
                {
                    if($LL == 1)
                    {
                        $tindakanAkhir = 2;
                    }
                    else
                    {
                        if($JJ == 2)
                        {
                            $tindakanAkhir = 2;
                        }
                        else
                        {
                            $tindakanAkhir = 3;
                        }
                    }
                }
                else{
                    if($LL == 2)
                    {
                        $tindakanAkhir = 3;
                    }
                    else
                    {
                        $tindakanAkhir = 4;
                    }
                }
            }
        }
        
         $datadb = array(
            'nama_ikan' => $this->db->escape_str($this->input->post('nama_ikan')),
            'jenisMP' => $this->db->escape_str($this->input->post('media_pembawa')), //A
            'class' => $this->db->escape_str($this->input->post('class')), //B
            'kelompok' => $this->db->escape_str($this->input->post('kelompok')), //C
            'bentuk' => $this->db->escape_str($this->input->post('bentuk_jenis')), //D
            'perolehanmedia' => $this->db->escape_str($this->input->post('perolehan_media')), //E
            'tujuanPenggunaan' => $this->db->escape_str($this->input->post('tujuan_penggunaan')), //F
            'statusRegistrasi' => $this->db->escape_str($this->input->post('status_registrasi')), //G
            'suspctibleSpecies' => $this->db->escape_str($this->input->post('susceptible_species')), //H
            'terjangkit' => $this->db->escape_str($this->input->post('terjangkit')), //I
            'tingkatResiko' => $JJ, //J
            'diketahuiPemilik' => $this->db->escape_str($this->input->post('diketahui')), //K
            'tempatPemasukan' => $LL, //L
            'permohonanPemasukan' => $this->db->escape_str($this->input->post('ppk_online')), //M
            'statusDokumen' => $NN, //N
            'kesesuaianIsi' => $OO, //O
            'pengasingan' => $this->db->escape_str($this->input->post('pengasingan')), //P
            'statusHPIK' => $QQ, //Q
            'penahanan' => $this->db->escape_str($this->input->post('penahanan')), //R
            'pemenuhanSyarat' => $this->db->escape_str($this->input->post('kekurangan')), //S
            'penolakan' => $TT,
            'tindakanAkhir' => $tindakanAkhir
        );
        $this->db->where('idKarantina', $this->input->post('idKarantina'));
        $this->db->update('karantinaikan', $datadb);
    }

    
    //--------------Data Registrasi----------------------------
    function dregistrasi()
    {
        return $this->db->query("SELECT * from dataregistrasi ORDER BY kodeDR ASC");
    }
    function savedregistrasi()
    {
        $datadb = array(
            'namaDR' => $this->db->escape_str($this->input->post('b')),
            'jenisMP' => $this->db->escape_str($this->input->post('c')),
            'sr' => $this->db->escape_str($this->input->post('d'))
        );
        $this->db->insert('dataregistrasi', $datadb);
    }
    function editdregistrasi($id)
    {
        return $this->db->query("SELECT * FROM  dataregistrasi where kodeDR ='$id'");
    }
    function updatedregistrasi()
    {
        $datadb = array(
            'namaDR' => $this->db->escape_str($this->input->post('b')),
            'jenisMP' => $this->db->escape_str($this->input->post('c')),
            'sr' => $this->db->escape_str($this->input->post('d')),
        );
        $this->db->where('kodeDR', $this->input->post('a'));
        $this->db->update('dataregistrasi', $datadb);
    }
    function hapusdregistrasi($id)
    {
        return $this->db->query("DELETE FROM dataregistrasi WHERE kodeDR='$id'");
    }
    function cek_dregistrasi($clean1, $clean2, $clean3, $clean4)
    {
        $q = $this->db->query("SELECT * FROM dataregistrasi where kodeDR ='$clean1' OR namaDR ='$clean2' OR jenisMP ='$clean3' OR sr ='$clean4'");
        if ($this->db->affected_rows() > 0) {
            $row = $q->row();
            return $row;
        }
    }



    //--------------Data Kategori Resiko----------------------------
    function dresiko()
    {
        return $this->db->query("SELECT * from datakategoriresiko ORDER BY kodeDKR ASC");
    }
    function savedresiko()
    {
        $datadb = array(
            'namaDKR' => $this->db->escape_str($this->input->post('b')),
            'jenisMP' => $this->db->escape_str($this->input->post('c')),
            'tkr' => $this->db->escape_str($this->input->post('d'))
        );
        $this->db->insert('datakategoriresiko', $datadb);
    }
    function editdresiko($id)
    {
        return $this->db->query("SELECT * FROM  datakategoriresiko where kodeDKR ='$id'");
    }
    function updatedresiko()
    {
        $datadb = array(
            'namaDKR' => $this->db->escape_str($this->input->post('b')),
            'jenisMP' => $this->db->escape_str($this->input->post('c')),
            'tkr' => $this->db->escape_str($this->input->post('d')),
        );
        $this->db->where('kodeDKR', $this->input->post('a'));
        $this->db->update('datakategoriresiko', $datadb);
    }
    function hapusdresiko($id)
    {
        return $this->db->query("DELETE FROM datakategoriresiko WHERE kodeDKR='$id'");
    }
    function cek_dresiko($clean1, $clean2, $clean3, $clean4)
    {
        $q = $this->db->query("SELECT * FROM datakategoriresiko where kodeDKR ='$clean1' OR namaDKR ='$clean2' OR jenisMP ='$clean3' OR tkr ='$clean4'");
        if ($this->db->affected_rows() > 0) {
            $row = $q->row();
            return $row;
        }
    }

    //--------------Data Suspectible Species----------------------------
    function dsuspect()
    {
        return $this->db->query("SELECT * from datasuspect ORDER BY kodeDS ASC");
    }
    function savedsuspect()
    {
        $datadb = array(
            'namaDS' => $this->db->escape_str($this->input->post('b')),
            'jenisMP' => $this->db->escape_str($this->input->post('c')),
            'ss' => $this->db->escape_str($this->input->post('d'))
        );
        $this->db->insert('datasuspect', $datadb);
    }
    function editdsuspect($id)
    {
        return $this->db->query("SELECT * FROM  datasuspect where kodeDS ='$id'");
    }
    function updatedsuspect()
    {
        $datadb = array(
            'namaDS' => $this->db->escape_str($this->input->post('b')),
            'jenisMP' => $this->db->escape_str($this->input->post('c')),
            'ss' => $this->db->escape_str($this->input->post('d')),
        );
        $this->db->where('kodeDS', $this->input->post('a'));
        $this->db->update('datasuspect', $datadb);
    }
    function hapusdsuspect($id)
    {
        return $this->db->query("DELETE FROM datasuspect WHERE kodeDS='$id'");
    }
    function cek_dsuspect($clean1, $clean2, $clean3, $clean4)
    {
        $q = $this->db->query("SELECT * FROM datasuspect where kodeDS ='$clean1' OR namaDS ='$clean2' OR jenisMP ='$clean3' OR ss ='$clean4'");
        if ($this->db->affected_rows() > 0) {
            $row = $q->row();
            return $row;
        }
    }



    //--------------Data Terjangkit----------------------------
    function dterjangkit()
    {
        return $this->db->query("SELECT * from dataterjangkit ORDER BY kodeDT ASC");
    }
    function savedterjangkit()
    {
        $datadb = array(
            'kodeDT' => $this->db->escape_str($this->input->post('a')),
            'namaDT' => $this->db->escape_str($this->input->post('b')),
            'jenisMP' => $this->db->escape_str($this->input->post('c')),
            'st' => $this->db->escape_str($this->input->post('d'))
        );
        $this->db->insert('dataterjangkit', $datadb);
    }
    function editdterjangkit($id)
    {
        return $this->db->query("SELECT * FROM  dataterjangkit where kodeDT ='$id'");
    }
    function updatedterjangkit()
    {
        $datadb = array(
            'namaDT' => $this->db->escape_str($this->input->post('b')),
            'jenisMP' => $this->db->escape_str($this->input->post('c')),
            'st' => $this->db->escape_str($this->input->post('d')),
        );
        $this->db->where('kodeDT', $this->input->post('a'));
        $this->db->update('dataterjangkit', $datadb);
    }
    function hapusdterjangkit($id)
    {
        return $this->db->query("DELETE FROM dataterjangkit WHERE kodeDT='$id'");
    }
    function cek_dterjangkit($clean1, $clean2, $clean3, $clean4)
    {
        $q = $this->db->query("SELECT * FROM dataterjangkit where kodeDT ='$clean1' OR namaDT ='$clean2' OR jenisMP ='$clean3' OR st ='$clean4'");
        if ($this->db->affected_rows() > 0) {
            $row = $q->row();
            return $row;
        }
    }


    //--------------Data Gambar Dokumen----------------------------
    function gamdokumen()
    {
        return $this->db->query("SELECT * from gamdokumen ORDER BY kode_gam ASC");
    }
    function savegamdokumen()
    {
        $datadb = array(
            'nama_gam' => $this->db->escape_str($this->input->post('b')),
            'gambar' => $this->db->escape_str($this->input->post('file')),
            'ket' => $this->db->escape_str($this->input->post('c'))
        );
        $this->db->insert('gamdokumen', $datadb);
    }
    function editgamdokument($id)
    {
        return $this->db->query("SELECT * FROM  gamdokumen where kode_gam ='$id'");
    }
    function updategamdokumen()
    {
        $datadb = array(
            'nama_gam' => $this->db->escape_str($this->input->post('b')),
            'gambar' => $this->db->escape_str($this->input->post('c')),
            'ket' => $this->db->escape_str($this->input->post('d')),
        );
        $this->db->where('kode_gam', $this->input->post('a'));
        $this->db->update('gamdokumen', $datadb);
    }
    function hapusgamdokumen($id)
    {
        return $this->db->query("DELETE FROM gamdokumen WHERE kode_gam='$id'");
    }
    function cek_gamdokumen($clean1, $clean2, $clean3, $clean4)
    {
        $q = $this->db->query("SELECT * FROM gamdokumen where kode_gam ='$clean1' OR nama_gam ='$clean2' OR gambar ='$clean3' OR ket ='$clean4'");
        if ($this->db->affected_rows() > 0) {
            $row = $q->row();
            return $row;
        }
    }

}

<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Keluarga extends CI_Controller {

    public $auth;
    public $group;
    public $id_company;
    public $id_wedding;

    public function __construct() {
        parent::__construct();
        $this->load->model(array('wedding_model'));
        $this->auth = $this->session->userdata('auth');
        $this->group = $this->auth['group'];
        $this->id_company = $this->auth['company'];
        $this->id_wedding = $this->auth['id_wedding'];
        checkToken();
    }

    public function index() {
        $id = $this->id_wedding;
        $data = array(
            'id_wedding' => $id,
            'ayahpria' => $this->db->query("SELECT * FROM keluarga WHERE id_wedding = '$id' AND HUBUNGAN = 'AYAH' AND id_pengantin = 'pria'")->row(),
            'ibupria' => $this->db->query("SELECT * FROM keluarga WHERE id_wedding = '$id' AND HUBUNGAN = 'IBU' AND id_pengantin = 'pria'")->row(),
            'saudara_pria' => $this->db->query("SELECT * FROM keluarga WHERE id_wedding = '$id' AND HUBUNGAN not in ('AYAH', 'IBU') AND id_pengantin = 'pria'")->result(),
            'ayahwanita' => $this->db->query("SELECT * FROM keluarga WHERE id_wedding = '$id' AND HUBUNGAN = 'AYAH' AND id_pengantin = 'wanita'")->row(),
            'ibuwanita' => $this->db->query("SELECT * FROM keluarga WHERE id_wedding = '$id' AND HUBUNGAN = 'IBU' AND id_pengantin = 'wanita'")->row(),
            'saudara_wanita' => $this->db->query("SELECT * FROM keluarga WHERE id_wedding = '$id' AND HUBUNGAN not in ('AYAH', 'IBU') AND id_pengantin = 'wanita'")->result(),
        );
        render('keluarga', $data);
    }

    public function saveOrtu() {
        $tipe = $_POST['tipe'];
        $key = array();
        if ($tipe == "pria") {
            $key['id_pengantin'] = "pria";
        } else {
            $key['id_pengantin'] = "wanita";
        }
        $key['id_wedding'] = $this->id_wedding;
        $key['hubungan'] = 'AYAH';
        $cek_ayah = $this->db->get_where('keluarga', $key)->result();
        if (empty($cek_ayah)) {
            $ayah['id_wedding'] = $key['id_wedding'];
            $ayah['id_pengantin'] = $key['id_pengantin'];
            $ayah['hubungan'] = 'AYAH';
            $ayah['nama'] = $_POST['ayah'];
            $ayah['no_hp'] = $_POST['nohpayah'];
            $this->db->insert('keluarga', $ayah);
        } else {
            $ayah['hubungan'] = 'AYAH';
            $ayah['nama'] = $_POST['ayah'];
            $ayah['no_hp'] = $_POST['nohpayah'];
            $this->db->update('keluarga', $ayah, $key);
        }
        $keyibu['id_pengantin'] = $key['id_pengantin'];
        $keyibu['id_wedding'] = $key['id_wedding'];
        $keyibu['hubungan'] = 'IBU';
//        print_r($keyibu);
        $cek_ibu = $this->db->get_where('keluarga', $keyibu)->result();
//        print_r($cek_ibu);
        if (empty($cek_ibu)) {
            $ibu['id_wedding'] = $key['id_wedding'];
            $ibu['id_pengantin'] = $key['id_pengantin'];
            $ibu['hubungan'] = 'IBU';
            $ibu['nama'] = $_POST['ibu'];
            $ibu['no_hp'] = $_POST['nohpibu'];
            $this->db->insert('keluarga', $ibu);
        } else {
            $ibu['hubungan'] = 'IBU';
            $ibu['nama'] = $_POST['ibu'];
            $ibu['no_hp'] = $_POST['nohpibu'];
            $this->db->update('keluarga', $ibu, $keyibu);
        }
        $result['code'] = 200;
        echo json_encode($result);
    }

    function getKeluarga() {
        $key['id'] = $_GET['id'];
        $data = $this->db->get_where('keluarga', $key)->row();
        echo json_encode($data);
    }

    function deleteKeluarga() {
        $key['id'] = $_GET['id'];
        $this->db->delete('keluarga', $key);
        $data['code'] = 200;
        echo json_encode($data);
    }

    public function saveSaudara() {
        $tipe = $_POST['tipe'];
        $data = array();
        if ($tipe == "pria") {
            $data['id_pengantin'] = "pria";
        } else {
            $data['id_pengantin'] = "wanita";
        }
        $data['id_wedding'] = $this->id_wedding;
        $data['nama'] = $_POST['nama'];
        $data['hubungan'] = $_POST['hubungan'];
        $data['no_hp'] = $_POST['nohp'];
        if (isset($_POST['idsaudara']) && $_POST['idsaudara'] != "") {
            $key['id'] = $_POST['idsaudara'];
            $this->db->update('keluarga', $data, $key);
        } else {
            $this->db->insert('keluarga', $data);
        }
        $result['code'] = 200;
        echo json_encode($result);
    }

}

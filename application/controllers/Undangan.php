<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Undangan extends CI_Controller {

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
            'undangan' => $this->db->query("SELECT * FROM undangan WHERE id_wedding = '$id'")->result(),
        );
        render('undangan', $data);
    }

    public function addUndangan() {
        $id = $this->id_wedding;
        $data = array(
            'id_wedding' => $id
        );
        render('addUndangan', $data);
    }

    public function add() {
        $id = $this->id_wedding;
        if ($_POST['id_undangan'] == "") {
            $data = array(
                'id_wedding' => $id,
                // 'id_pengantin' => $_POST[''],
                'nama' => $_POST['nama_lengkap'],
                'alamat' => $_POST['alamat_undangan'],
                'tipe_undangan' => $_POST['tipe_undangan']
            );
            $this->db->insert('undangan', $data);
            $this->wedding_model->insertLog($_POST['id_wedding'], "Menambah data undangan");
            $result = array(
                'code' => 200
            );
            echo json_encode($result);
        } else {
            $key['id'] = $_POST['id_undangan'];
            $data = array(
                'id_wedding' => $id,
                // 'id_pengantin' => $_POST[''],
                'nama' => $_POST['nama_lengkap'],
                'alamat' => $_POST['alamat_undangan'],
                'tipe_undangan' => $_POST['tipe_undangan']
            );
            $this->db->update('undangan', $data, $key);
            $this->wedding_model->insertLog($_POST['id_wedding'], "Merubah data undangan");
            $result = array(
                'code' => 200
            );
            echo json_encode($result);
        }
    }

    public function delete() {
        $id = $this->id_wedding;
        $key['id'] = $_GET['id'];
        $this->db->delete('undangan', $key);
        $result = array(
            'code' => 200
        );
        echo json_encode($result);
        $this->wedding_model->insertLog($id, "Menghapus data undangan");
        $this->index();
    }

}

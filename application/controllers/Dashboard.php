<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
        $data = $this->wedding_model->getOneData($this->id_wedding);
        $data = array(
            'wedding' => $data,
            'logs' => $this->db->query("SELECT a.*,b.user_real_name  FROM log_aktivitas a "
                    . "LEFT JOIN app_user b "
                    . "ON a.id_user = b.user_id "
                    . "WHERE a.id_wedding = '$this->id_wedding' ORDER BY datetime DESC LIMIT 10")->result(),
        );
        render('dashboard', $data);
    }

    public function biodata() {
        $id = $this->id_wedding;
        $data = array(
            'pria' => $this->db->query("SELECT * FROM pengantin WHERE id_wedding = '$id' AND gender = 'L'")->row(),
            'wanita' => $this->db->query("SELECT * FROM pengantin WHERE id_wedding = '$id' AND gender = 'P'")->row(),
            'id_wedding' => $id,
            'data_agama' => $this->db->query("SELECT * FROM agama ORDER BY agama ASC")->result(),
        );
        render('biodata', $data);
    }

    public function saveBiodataPria() {
        $id = $this->id_wedding;
        $data['id_wedding'] = $id;
        $data['gender'] = "L";
        $data['nama_lengkap'] = isset($_POST["nama_lengkap_pria"]) ? $_POST["nama_lengkap_pria"] : "";
        $data['nama_panggilan'] = $_POST['nama_panggilan_pria'];
        $data['alamat_sekarang'] = $_POST['alamat_sekarang_pria'];
        $data['alamat_nikah'] = $_POST['alamat_nikah_pria'];
        $data['tempat_lahir'] = $_POST['tempat_lahir_pria'];
        $data['tanggal_lahir'] = toYMD($_POST['tanggal_lahir_pria']);
        $data['no_hp'] = $_POST['no_hp_pria'];
        $data['email'] = $_POST['email_pria'];
        $data['agama'] = $_POST['agama_pria'];
        $data['pendidikan'] = $_POST['pendidikan_pria'];
        $data['hobi'] = $_POST['hobi_pria'];
        $data['sosmed'] = 1;
        $data['status'] = 1;

        if (isset($_FILES)) {
            $path = realpath(APPPATH . '../../files/images/');

            $this->upload->initialize(array(
                'upload_path' => $path,
                'allowed_types' => 'png|jpg|gif',
                'max_size' => '5000',
                'max_width' => '3000',
                'max_height' => '3000'
            ));

            if ($this->upload->do_upload('foto_pria')) {
                $data_upload = $this->upload->data();
                $this->image_lib->initialize(array(
                    'image_library' => 'gd2',
                    'source_image' => $path . '/' . $data_upload['file_name'],
                    'maintain_ratio' => false,
                    //  'create_thumb' => true,
                    'overwrite' => TRUE
                ));
                if ($this->image_lib->resize()) {
                    $data['photo'] = $data_upload['raw_name'] . $data_upload['file_ext'];
                } else {
                    $data['photo'] = $data_upload['file_name'];
                }
            } else {
//                $data['photo'] = "";
            }
        } else {
//            $data['photo'] = "";
        }
        $key['id'] = $_POST['id'];
        $this->db->update('pengantin', $data, $key);
        $this->wedding_model->insertLog($id, "Merubah biodata pengantin pria");
        $result = array('code' => 200);
        echo json_encode($result);
//        redirect(base_url() . "Dashboard/biodata");
    }

    public function saveBiodataWanita() {
        $id = $this->id_wedding;
        $_POST = $this->input->post();
        $data['id_wedding'] = $id;
        $data['gender'] = "P";
        $data['nama_lengkap'] = $_POST["nama_lengkap_wanita"];
        $data['nama_panggilan'] = $_POST['nama_panggilan_wanita'];
        $data['alamat_sekarang'] = $_POST['alamat_sekarang_wanita'];
        $data['alamat_nikah'] = $_POST['alamat_nikah_wanita'];
        $data['tempat_lahir'] = $_POST['tempat_lahir_wanita'];
        $data['tanggal_lahir'] = toYMD($_POST['tanggal_lahir_wanita']);
        $data['no_hp'] = $_POST['no_hp_wanita'];
        $data['email'] = $_POST['email_wanita'];
        $data['agama'] = $_POST['agama_wanita'];
        $data['pendidikan'] = $_POST['pendidikan_wanita'];
        $data['hobi'] = $_POST['hobi_wanita'];
        $data['sosmed'] = $_POST['sosmed_wanita'];
        $data['status'] = 1;
        if (isset($_FILES)) {
            $path = realpath(APPPATH . '../../files/images/');

            $this->upload->initialize(array(
                'upload_path' => $path,
                'allowed_types' => 'png|jpg|gif',
                'max_size' => '5000',
                'max_width' => '3000',
                'max_height' => '3000'
            ));

            if ($this->upload->do_upload('foto_wanita')) {
                $data_upload = $this->upload->data();
                $this->image_lib->initialize(array(
                    'image_library' => 'gd2',
                    'source_image' => $path . '/' . $data_upload['file_name'],
                    'maintain_ratio' => false,
                    //  'create_thumb' => true,
                    'overwrite' => TRUE
                ));
                if ($this->image_lib->resize()) {
                    $data['photo'] = $data_upload['raw_name'] . $data_upload['file_ext'];
                } else {
                    $data['photo'] = $data_upload['file_name'];
                }
            } else {
//                $data['photo'] = "";
            }
        } else {
//            $data['photo'] = "";
        }
        $key['id'] = $_POST['id'];
        $this->db->update('pengantin', $data, $key);
        $this->wedding_model->insertLog($id, "Merubah biodata pengantin pria");
        $result = array('code' => 200);
        echo json_encode($result);
    }

    public function meeting() {
        $id = $this->id_wedding;
        $data = array(
            'meeting' => $this->db->query("SELECT * FROM jadwal_meeting WHERE id_wedding = '$id' ORDER BY tanggal DESC")->result(),
            'wedding' => $this->db->query("SELECT * FROM wedding WHERE id = '$id'")->row()
        );
        render('meeting', $data);
    }

    public function vendor() {
        $id = $this->id_wedding;
        $data = array(
            'vendor' => $this->db->query("SELECT a.*,b.nama_kategori FROM vendor_pengantin a "
                    . "LEFT JOIN kategori_vendor b "
                    . "ON a.id_kategori = b.id "
                    . "WHERE a.id_wedding = '$id'")->result(),
        );
        render('vendor', $data);
    }

    public function addVendor() {
        $id = $this->id_wedding;
        $data = array(
            'vendor' => $this->db->query("SELECT a.*,b.nama_kategori FROM vendor_pengantin a "
                    . "LEFT JOIN kategori_vendor b "
                    . "ON a.id_kategori = b.id "
                    . "WHERE a.id_wedding = '$id'")->result(),
            'kategori_vendor' => $this->db->get('kategori_vendor')->result(),
            'id_wedding' => $id
        );
        render('addVendor', $data);
    }

    public function saveVendor() {
        $post = $_POST;
        $id = $this->id_wedding;
        $data = array(
            'id_kategori' => $post['vendor'],
            'id_vendor' => $post['kategori_vendor'],
            'id_wedding' => $post['id_wedding'],
            'nama_vendor' => $post['nama_vendor'],
            'cp' => $post['cp'],
            'nohp_cp' => $post['nohp'],
            'biaya' => $post['biaya'],
            'dibayaroleh' => $post['bayar_oleh'],
        );
        $this->db->insert('vendor_pengantin', $data);
        $this->wedding_model->insertLog($id_wedding, "Menambah data vendor");
        $this->vendor();
    }

    public function deleteVendor() {
        $id = $this->id_wedding;
        $id_vendor = $_GET['id'];
        $key['id'] = $id_vendor;
        $this->db->delete('vendor_pengantin', $key);
        $this->wedding_model->insertLog($id, "Menghapus data vendor");
        $this->vendor();
    }

    public function payment() {
        $id = $this->id_wedding;
        $data = array(
            'vendor' => $this->db->query("SELECT a.*,b.nama_kategori FROM vendor_pengantin a "
                    . "LEFT JOIN kategori_vendor b "
                    . "ON a.id_kategori = b.id "
                    . "WHERE a.id_wedding = '$id' ORDER BY a.status ASC")->result(),
        );
        render('payment', $data);
    }

    public function detailPayment() {
        $id_wedding = $this->id_wedding;
        $id = $_GET['id'];
        $data = array(
            'id_wedding' => $id_wedding,
            'payment' => $this->db->query("SELECT a.*,b.nama_kategori FROM vendor_pengantin a "
                    . "LEFT JOIN kategori_vendor b "
                    . "ON a.id_kategori = b.id "
                    . "WHERE a.id_wedding = '$id_wedding' AND a.id='$id'")->row(),
            'detail' => $this->db->query("SELECT * FROM payment WHERE id_vendor = '$id' ORDER BY tanggal_bayar ASC")->result()
        );
        render('detailPayment', $data);
    }

    public function editPayment() {
        $id_wedding = $this->id_wedding;
        $id = $_GET['id'];
        $data = array(
            'id_wedding' => $id_wedding,
            'payment' => $this->db->query("SELECT a.*,b.nama_kategori FROM vendor_pengantin a "
                    . "LEFT JOIN kategori_vendor b "
                    . "ON a.id_kategori = b.id "
                    . "WHERE a.id_wedding = '$id_wedding' AND a.id='$id'")->row(),
        );
        render('editPayment', $data);
    }
    
    public function doPayment() {
        $id_wedding = isset($_POST['id_wedding']) ? $_POST['id_wedding'] : "";
        $key['id'] = $_POST['id_payment_pengantin'];
        $vendor = $this->db->get_where('vendor_pengantin', $key)->row();
        $total_terbayar = $vendor->terbayar;
        $total_biaya = $vendor->biaya;
        $temp_terbayar = $total_terbayar + $_POST['terbayar'];
        if($temp_terbayar >= $total_biaya){
            $status = 2;
        }else if($temp_terbayar < $total_biaya){
            $status = 1;
        }
        $upvendor['status'] = $status;
        $upvendor['terbayar'] = $temp_terbayar;
        $this->db->update('vendor_pengantin', $upvendor, $key);
        $data['id_vendor'] = $_POST['id_payment_pengantin'];
        $data = array(
            'id_vendor' => $_POST['id_payment_pengantin'],
            'terbayar' => $_POST['terbayar'],
            'tanggal_bayar' => date('Y-m-d', strtotime($_POST['tanggal_bayar'])),
            'cara_pembayaran' => $_POST['cara'],
            'dibayarke' => $_POST['dibayarke']
        );
        if (isset($_FILES)) {
            $path = realpath(APPPATH . '../../files/bukti/');
            $this->upload->initialize(array(
                'upload_path' => $path,
                'allowed_types' => 'png|jpg|gif|docx|doc|xls|xlsx|pdf',
                'max_size' => '5000',
                'max_width' => '3000',
                'max_height' => '3000'
            ));

            if ($this->upload->do_upload('bukti')) {
                $data_upload = $this->upload->data();
                $this->image_lib->initialize(array(
                    'image_library' => 'gd2',
                    'source_image' => $path . '/' . $data_upload['file_name'],
                    'maintain_ratio' => false,
                    'overwrite' => TRUE
                ));
                if ($this->image_lib->resize()) {
                    $data['bukti'] = $data_upload['raw_name'] . $data_upload['file_ext'];
                } else {
                    $data['bukti'] = $data_upload['file_name'];
                }
            }
        }
        $data['status'] = 0;
        
        $this->db->insert('payment', $data);
        $this->wedding_model->insertLog($id_wedding, "Payment vendor " . $_POST['nama_vendor_payment']);
        $result = array(
            'code' => 200
        );
        echo json_encode($result);
    }

    public function contactus() {
        $id = $this->id_company;
        $data = array(
            'company' => $this->db->query("SELECT * FROM company WHERE id = '$id'")->row(),
        );
        render('contactus', $data);
    }

    public function layout() {
        $id = $this->id_wedding;
        $data = array(
            'layout' => $this->db->query("SELECT * FROM layout WHERE id_wedding = '$id'")->result(),
        );
        render('layout', $data);
    }

    public function log() {
        $id = $this->id_wedding;
        $data = array(
            'log' => $this->db->query("SELECT a.*,b.user_real_name  FROM log_aktivitas a "
                    . "LEFT JOIN app_user b "
                    . "ON a.id_user = b.user_id "
                    . "WHERE a.id_wedding = '$id' ORDER BY datetime DESC LIMIT 10")->result(),
        );
        render('log', $data);
    }

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */
<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Gallery extends CI_Controller
{
    public $id_wedding;

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('wedding_model'));
        $this->auth = $this->session->userdata('auth');
        $this->id_wedding = $this->auth['id_wedding'];
        checkToken();
    }

    public function index()
    {
        $data['gallery'] = $this->db->query("SELECT * FROM gallery WHERE id_wedding = '" . $this->id_wedding . "'")->result();
        $data['id'] = $this->id_wedding;
        render('gallery', $data);
    }

    public function saveImage()
    {
        $data['file'] = '';
        if (isset($_FILES)) {
            $path = realpath(APPPATH . '../../files/images/');

            $this->upload->initialize(array(
                'upload_path' => $path,
                'allowed_types' => 'png|jpg|gif',
                'max_size' => '15000',
                'max_width' => '3000',
                'max_height' => '3000',
            ));

            if ($this->upload->do_upload('file')) {
                $data_upload = $this->upload->data();
                $this->image_lib->initialize(array(
                    'image_library' => 'gd2',
                    'source_image' => $path . '/' . $data_upload['file_name'],
                    'maintain_ratio' => false,
                    //  'create_thumb' => true,
                    'overwrite' => true,
                ));
                if ($this->image_lib->resize()) {
                    $data['file'] = $data_upload['raw_name'] . $data_upload['file_ext'];
                } else {
                    $data['file'] = $data_upload['file_name'];
                }
            }
            //echo $this->upload->display_errors();
            if ($data['file'] != "") {
                $data['id_wedding'] = $_POST['id_wedding'];
                $this->db->insert('gallery', $data);
                $result['code'] = 200;
                echo json_encode($result);
            } else {
                $result['code'] = 400;
                echo json_encode($result);

            }
        }
    }

    public function deleteImage()
    {
        $id = $_GET['id'];
        $key['id'] = $id;
        $this->db->delete('gallery', $key);
        header("location: " . base_url() . "Gallery?_=" . time());
    }

}

<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function index() {
        $data['splashscreen'] = getSetting('splashscreen');
        // print_r($data);
        // exit();
        $this->load->view('welcome_message', $data);
        //redirect(base_url() . "Login");
    }

}

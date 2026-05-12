<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mahasiswa_model');
    }

    public function index()
    {
        $this->load->view('mahasiswa_view');
    }

    public function get_data()
    {
        $data = $this->Mahasiswa_model->get_data();

        echo json_encode($data);
    }

    public function save()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'nim' => $this->input->post('nim'),
            'jurusan' => $this->input->post('jurusan')
        );

        $this->Mahasiswa_model->save_data($data);

        echo json_encode(array("status" => true));
    }
}
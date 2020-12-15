<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Complaint extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = "Send a Complaint";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['type'] = $this->db->get('type_complaint')->result_array();


        $this->form_validation->set_rules('description', 'Description', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('complaint/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'email' => $this->input->post('email'),
                'type_id' => $this->input->post('type_id'),
                'description' => $this->input->post('description'),
                'created' => time(),
                'status' => 0
            ];
            $this->db->insert('complaint', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Your has been updated !
          </div>');
            redirect('complaint/list');
        }
    }
    public function list()
    {
        $sessionEmail = $this->session->userdata('email');
        $data['title'] = "List My Complaint";
        $data['user'] = $this->db->get_where('user', ['email' => $sessionEmail])->row_array();

        $query = "SELECT `complaint`.*,`type_complaint`.`type`
          FROM `complaint` JOIN `type_complaint`
          ON `complaint`.`type_id` = `type_complaint`.`id`
          WHERE `complaint`.`email` = '$sessionEmail'
        ";
        $data['list'] = $this->db->query($query)->result_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('complaint/list', $data);
        $this->load->view('templates/footer');
    }
}

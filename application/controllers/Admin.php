<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }


    public function index()
    {
        $data['title'] = "Dashboard";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['customer_complaint'] = $this->db->get('complaint')->num_rows();
        $data['users'] = $this->db->get('user')->num_rows();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function customerComplaint()
    {
        $sessionEmail = $this->session->userdata('email');
        $data['title'] = "Customer Complaint";
        $data['user'] = $this->db->get_where('user', ['email' => $sessionEmail])->row_array();
        $query = "SELECT `complaint`.*,`type_complaint`.`type`
          FROM `complaint` JOIN `type_complaint`
          ON `complaint`.`type_id` = `type_complaint`.`id`
          ORDER BY `complaint`.`created` DESC
        ";


        if ($this->input->post('search') == 'search-complaint') {
            $keyword = $this->input->post('keyword');

            $query = "SELECT `complaint`.*,`type_complaint`.`type`
            FROM `complaint` JOIN `type_complaint`
            ON `complaint`.`type_id` = `type_complaint`.`id`
            WHERE `description` LIKE  '%$keyword%' OR
            `type` LIKE  '%$keyword%' OR
            `email` LIKE '%$keyword%'
            ORDER BY `complaint`.`created` DESC
             ";

            $data['list'] = $this->db->query($query)->result_array();
        } else {
            $data['list'] = $this->db->query($query)->result_array();
        }



        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('complaint/complaint_admin', $data);
        $this->load->view('templates/footer');
    }
    public function complaintDone($id)
    {
        $customer_complaint = $this->db->get_where('complaint', ['id' => $id])->row_array();
        if ($customer_complaint['status'] == 0) {
            $this->db->set('status', 1);
            $this->db->where('id', $id);
            $this->db->update('complaint');
            redirect('admin/customerComplaint');
        } elseif ($customer_complaint['status'] == 1) {
            $this->db->set('status', 0);
            $this->db->where('id', $id);
            $this->db->update('complaint');
            redirect('admin/customerComplaint');
        }
    }

    public function complaintDelete($id)
    {
        $this->db->delete('complaint', ['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> List Customer was removed ! </div>');
        redirect('admin/customerComplaint');
    }

    public function complaintEdit()
    {
        $id = $this->uri->segment(3);
        $data['title'] = "Customer Complaint";
        $data['title2'] = "Edit Customer Complaint";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['type'] = $this->db->get('type_complaint')->result_array();

        $query = "SELECT `complaint`.*,`type_complaint`.`type`
          FROM `complaint` JOIN `type_complaint`
          ON `complaint`.`type_id` = `type_complaint`.`id`
          WHERE `complaint`.`id` = '$id'
        ";
        $data['list'] = $this->db->query($query)->row_array();

        $this->form_validation->set_rules('description', 'Description', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('complaint/complaint_admin_edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'email' => $this->input->post('email'),
                'type_id' => $this->input->post('type_id'),
                'description' => $this->input->post('description')
            ];
            $this->db->where('id', $id);
            $this->db->update('complaint', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Your has been updated !
          </div>');
            redirect('admin/customerComplaint');
        }
    }


    public function complaintDetail()
    {
        $id = $this->uri->segment(3);
        $data['title'] = "Customer Complaint";
        $data['title2'] = "Detail Customer Complaint";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['type'] = $this->db->get('type_complaint')->result_array();

        $query = "SELECT `complaint`.*,`type_complaint`.`type`
          FROM `complaint` JOIN `type_complaint`
          ON `complaint`.`type_id` = `type_complaint`.`id`
          WHERE `complaint`.`id` = '$id'
        ";
        $data['list'] = $this->db->query($query)->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('complaint/complaint_admin_detail', $data);
        $this->load->view('templates/footer');
    }


    public function listUser()
    {

        $data['title'] = "List User";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $query = "SELECT `user`.*,`user_role`.`role`
          FROM `user` JOIN `user_role`
          ON `user`.`role_id` = `user_role`.`id`
          ORDER BY `user`.`date_created` DESC
        ";



        if ($this->input->post('search') == 'search-user') {
            $keyword = $this->input->post('keyword');

            $query = "SELECT `user`.*,`user_role`.`role`
            FROM `user` JOIN `user_role`
            ON `user`.`role_id` = `user_role`.`id`
            WHERE `name` LIKE  '%$keyword%' OR
            `email` LIKE  '%$keyword%' OR
            `role` LIKE '%$keyword%'
            ORDER BY `user`.`date_created` DESC
             ";

            $data['list_user'] = $this->db->query($query)->result_array();
        } else {
            $data['list_user'] = $this->db->query($query)->result_array();
        }


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/user_admin_list', $data);
        $this->load->view('templates/footer');
    }

    public function userDelete($id)
    {

        $users = $this->db->get('user')->result_array();
        $user =  $this->db->get_where('user', ['id' => $id])->row_array();
        if ($user['role_id'] == 2) {
            $this->db->delete('user', ['id' => $id]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> User was removed ! </div>');
            redirect('admin/listUser');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> This user cannot be removed ! </div>');
            redirect('admin/listUser');
        }
    }
}

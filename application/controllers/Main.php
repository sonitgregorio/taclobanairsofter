<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller
{
    public function index()
    {
        if($this->session->has_userdata('userid')){
            redirect('/admin_home');
        } else {
            $this->load->view('templates/header');
            $this->load->view('templates/nav');
            $this->load->view('pages/home/home_page');
            $this->load->view('templates/footer');
        };
    }

    public function login_user()
    {
        $this->load->model('home');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $result = $this->home->verify_user($username, $password);
        if(!empty($result)){
            $this->session->set_userdata('userid', $result['id']);
            $this->session->set_userdata('cid', $result['pid']);
            $this->session->set_userdata('img', $result['image']);
            $this->session->set_userdata('name', $result['first_name'] . ' ' . $result['last_name']);
            redirect('/admin_home');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Invalid Username / Password</div>');
            redirect('/');
        }
    }
}

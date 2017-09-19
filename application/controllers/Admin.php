<?php

class Admin extends CI_Controller
{
    public function admin_home()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/nav');
        $this->load->view('templates/admin_nav');
        $this->load->view('pages/admin/admin_home');
        $this->load->view('templates/footer');
    }

    public function logout()
    {
        $this->session->unset_userdata('userid');
        redirect('/');
    }

    public function products($id = 0)
    {
        $this->load->model('home');
        if ($id == 0) {
            $data['product'] = array(
                'id' => '',
                'item_name' => '',
                'serial' => '',
                'quantity' => '',
                'price' => '',
                'image' => 'no_image.png'
            );
        } else {
            $data['product'] = $this->home->getProductRecord($id);
        }

        $this->load->view('templates/header');
        $this->load->view('templates/nav');
        $this->load->view('templates/admin_nav');
        $this->load->view('pages/admin/product_list', $data);
        $this->load->view('templates/footer');
    }

    public function save_products()
    {

        $config['upload_path'] = './assets/images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('picture')) {
            print_r($this->upload->display_errors());
        } else {
            $filename = $this->upload->data('file_name');
        }
        $this->load->model('home');
        $record_id = $this->input->post('record_id');
        $data = array(
            'item_name' => $this->input->post('item_name'),
            'quantity' => $this->input->post('quantity'),
            'price' => $this->input->post('price'),
            'serial' => $this->input->post('serial'),
            'image' => $filename
        );

        if ($record_id == '') {
            $result = $this->home->validateProduct($this->input->post('serial'));
            if (empty($result)) {
                $this->home->insert_product($data);
                $this->session->set_flashdata('message', '<div class="alert alert-success">Product Added.</div>');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Duplicate Serial No.</div>');
            }
        } else {
            $this->home->updateProdutRecord($data, $record_id);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Product Updated.</div>');
        }
        redirect('/products');
    }

    public function delete_products($id)
    {
        $this->load->model('home');
        $this->home->deleteProducts($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Product Deleted.</div>');
        redirect('/products');
    }

    public function userManagement($id = 0)
    {
        $this->load->model('home');
        if ($id == 0) {
            $data = array(
                'id' => '',
                'first_name' => '',
                'last_name' => '',
                'dob' => '',
                'work' => '',
                'contact' => '',
                'gender' => '',
                'pob' => '',
                'location' => '',
                'email' => ''
            );
        } else {
            $data = $this->home->getContactRecord($id);
        }

        $user_access = array(
            'username' => '',
            'password' => '',
            'position' => ''
        );

        $record['member'] = $data;
        $record['access'] = $user_access;
        $this->load->model('home');
        $this->load->view('templates/header');
        $this->load->view('templates/nav');
        $this->load->view('templates/admin_nav');
        $this->load->view('pages/admin/user_list', $record);
        $this->load->view('pages/admin/announcement');
        $this->load->view('templates/footer');
    }

    public function save_contact()
    {
        $this->load->model('home');
        $record_id = $this->input->post('record_id');
        $data = array(
            'first_name' => $this->input->post('firstname'),
            'last_name' => $this->input->post('lastname'),
            'dob' => $this->input->post('dob'),
            'work' => $this->input->post('work'),
            'contact' => $this->input->post('contact'),
            'gender' => $this->input->post('gender'),
            'pob' => $this->input->post('pob'),
            'location' => $this->input->post('location'),
            'email' => $this->input->post('email'),
        );


        if ($record_id == '') {
            $validate = $this->home->validateUser($this->input->post('username'));
            $user_access = array(
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'position' => $this->input->post('position'),
            );

            $record['member'] = $data;
            $record['access'] = $user_access;
            if (empty($validate)) {
                $return_id = $this->home->saveContact($data);
                $user_access['pid'] = $return_id;
                $this->home->insertUserAccess($user_access);
                $this->session->set_flashdata('message', '<div class="alert alert-success">Member Added.</div>');
                redirect('/userManagement');

            } else {
                $record['member']['id'] = '';
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Duplicate Username</div>');
                $this->load->view('templates/header');
                $this->load->view('templates/nav');
                $this->load->view('templates/admin_nav');
                $this->load->view('pages/admin/user_list', $record);
                $this->load->view('templates/footer');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success">Member Updated.</div>');
            $this->db->where('id', $record_id);
            $this->db->update('contacts', $data);
            redirect('/userManagement');
        }
    }

    public function deleteContact($id)
    {
        $this->load->model('home');
        $this->home->deleteContactRecord($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Member Deleted.</div>');
        redirect('userManagement');
    }
}
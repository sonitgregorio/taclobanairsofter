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
                'image' => 'no_image.png',
                'short_description' => ''
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
            $filename = 'no_image.png';
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
            'image' => $filename,
            'short_description' => $this->input->post('short_description')
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
        $this->db->where('id', $id);
        $result = $this->db->get('products')->row_array();
        if ($result['quantity'] <= 0) {
            $this->home->deleteProducts($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Product Deleted.</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Item Cannot be Deleted.</div>');
        }

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
//        $this->load->view('pages/admin/announcement');
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
            'image' => 'person.png'
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


                if  ($this->input->post('type_of_registration') == 0)
                {
                    redirect('/userManagement');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-success">Account Successfully Created. Please Login .</div>');
                    redirect('/');
                }

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

    public function store_list()
    {
        $this->load->model('home');
        $this->load->view('templates/header');
        $this->load->view('templates/nav');
        $this->load->view('templates/admin_nav');
        $this->load->view('pages/admin/store');
        $this->load->view('templates/footer');
    }

    public function save_to_cart()
    {
        $quantity = $this->input->post('quantity');
        $price = $this->input->post('price_modals');
        $cid = $this->session->userdata('cid');
        $pid = $this->input->post('pid');
        $status = 0;

        $data = array(
            'product' => $pid,
            'quantity' => $quantity,
            'cid' => $cid,
            'price' => $price,
            'status' => $status
        );
        $this->db->insert('cart', $data);

        $this->db->where('id', $pid);
        $products = $this->db->get('products')->row_array();

        $data = array(
            'quantity' => $products['quantity'] - $quantity
        );
        $this->db->where('id', $pid);
        $this->db->update('products', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Successfully Added</div>');
        redirect('/store');
    }

    public function my_cart()
    {
        $this->load->model('home');
        $this->load->view('templates/header');
        $this->load->view('templates/nav');
        $this->load->view('templates/admin_nav');
        $this->load->view('pages/admin/cart');
        $this->load->view('templates/footer');
    }

    public function account_settings()
    {
        $this->load->model('home');
        $this->load->view('templates/header');
        $this->load->view('templates/nav');
        $this->load->view('templates/admin_nav');
        $this->load->view('pages/admin/account_settings');
        $this->load->view('templates/footer');
    }

    public function save_account()
    {
        print_r($_REQUEST);

        $config['upload_path'] = './assets/images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('picture')) {
            print_r($this->upload->display_errors());
            $filename = 'person.png';
        } else {
            $filename = $this->upload->data('file_name');
        }

        $data = array(
            'first_name' => $_REQUEST['firstname'],
            'last_name' => $_REQUEST['lastname'],
            'dob' => $_REQUEST['dob'],
            'pob' => $_REQUEST['pob'],
            'work' => $_REQUEST['work'],
            'location' => $_REQUEST['address'],
            'contact' => $_REQUEST['contact'],
            'email' => $_REQUEST['email'],
        );

        if ($filename != 'person.png')
            $data['image'] = $filename;

        $this->db->where('id', $this->session->userdata('cid'));
        $this->db->update('contacts', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Account Successfully Updated.</div>');
        redirect('/account_settings');
    }

    public function delete_from_cart($id)
    {
        $this->db->where('id', $id);
        $cart = $this->db->get('cart')->row_array();
        $this->db->where('id', $id);
        $this->db->delete('cart');

        $this->db->where('id', $cart['product']);
        $products = $this->db->get('products')->row_array();

        $this->db->where('id', $products['id']);
        $data = array(
            'quantity' => $cart['quantity'] + $products['quantity']
        );
        $this->db->update('products', $data);
        $this->session->set_flashdata('message_from', '<div class="alert alert-success">Item removed!</div>');
        redirect('/my_cart');

    }

    public function update_cart()
    {
        $data = array(
            'status' => 1
        );
        $this->db->where('cid', $this->session->userdata('cid'));
        $this->db->update('cart', $data);
        $this->session->set_flashdata('message_from', '<div class="alert alert-success">Transaction Successfully Completed.</div>');
        redirect('/my_cart');
    }

    public function viewOrders()
    {
        $this->load->model('home');
        $this->load->view('templates/header');
        $this->load->view('templates/nav');
        $this->load->view('templates/admin_nav');
        $this->load->view('pages/admin/view_orders');
        $this->load->view('templates/footer');
    }

    public function sales()
    {
        $this->load->model('home');
        $this->load->view('templates/header');
        $this->load->view('templates/nav');
        $this->load->view('templates/admin_nav');
        $this->load->view('pages/admin/sales');
        $this->load->view('templates/footer');
    }
    public function paid_item($id){
        $data = array(
            'status' => 1
        );
        $this->db->where('id', $id);
        $this->db->update('cart', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Item successfully updated</div>');
        redirect('/viewOrders');
    }

}
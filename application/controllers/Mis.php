<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mis extends CI_Controller
{
    
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *         http://example.com/index.php/welcome
     *    - or -
     *         http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url'); //url helper
        $this->load->database(); //manual connection to the database
        $this->load->model('Main_model'); //model
        $this->load->helper('form'); //form validations
        $this->load->library('encryption'); //password
        $this->load->library('session'); //log in
        $this->check_isvalidated();
        
    }

    private function check_isvalidated()
    {
        if ($this->session->userdata('validated')) {
            redirect('User');
        }
    }

    public function user_search()
    {
        $data['records'] = $this->Main_model->search_propM();
        
        $this->load->view('usertemplate/header');
        $this->load->view('properties_wo_session', $data);
        $this->load->view('usertemplate/footer');
    }

    public function user_sort()
    {
       $data['records'] = $this->Main_model->sortPriceM();
        $this->load->view('usertemplate/header');
        $this->load->view('properties_wo_session', $data);
        $this->load->view('usertemplate/footer');
    }
    
    public function index()
    {
        $id = $this->uri->segment(3);
        $this->load->helper('url');
        $this->load->view('usertemplate/header');
        $this->load->view('home');
        $this->load->view('usertemplate/footer');
    }
    
    public function sendMessage()
    {
        $name    = $this->input->post('name');
        $email   = $this->input->post('email');
        $content = $this->input->post('message');
        $date = date("Y-m-d H:i:s");
        
        $data = array(
            'name' => $name,
            'email' => $email,
            'message' => $content,
            'date_sent' =>$date
        );
        
        $this->Main_model->sendMessageM($data);
        $message = "You have successfully sent a message, well be in touch with you soon!";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
    
    public function contact()
    {
        $this->load->view('usertemplate/header');
        $this->load->view('contact');
        $this->load->view('usertemplate/footer');
    }
    public function searchproperty()
    {
        $data['records'] = $this->Main_model->search_propM();
        $this->load->view('usertemplate/header');
        $this->load->view('properties', $data);
        $this->load->view('usertemplate/footer');
    }
    public function property()
    {
        $unsold = 'UNSOLD';
        $adminApproval = 1;

        $this->db->select('*');
        $this->db->from('property');
        $this->db->join('user', 'property.User_Id_Seller = user.User_Id');
        $this->db->where('property.Sold_status', $unsold);
        $this->db->where('property.admin_approval', $adminApproval);
        $query = $this->db->get();
        
        $data['records'] = $query->result();
        
        $this->load->helper('url');
        $this->load->view('usertemplate/header');
        $this->load->view('properties_wo_session', $data);
        $this->load->view('usertemplate/footer');
    }
    
    public function view()
    {
        
        $Property_id = $this->uri->segment(3);
        $this->db->select('*');
        $this->db->from('property');
        $this->db->join('broker', 'property.Broker_id = broker.Broker_id');
        $this->db->join('user', 'property.User_id = user.User_id');
        $this->db->where('property.Property_id', $Property_id);
        
        $query = $this->db->get();
        
        $data['records']     = $query->result();
        $data['Property_id'] = $Property_id;
        
        $this->db->select('*');
        $this->db->from('property_images');
        $this->db->where('property_images.Property_id', $Property_id);
        
        $query2           = $this->db->get();
        $data['records2'] = $query2->result();
        
        $this->load->view('usertemplate/header');
        $this->load->view('frontview', $data);
        $this->load->view('usertemplate/footer');
    }
    
    public function register()
    {
        
        $id = $this->uri->segment(3);
        $this->load->helper('url');
        $this->load->view('usertemplate/header');
        $this->load->view('login_reg');
        $this->load->view('usertemplate/footer');
        $this->load->library('encryption');
    }

    public function userlogin()
    {
        $result = $this->Main_model->validateUser();
        
        if (!$result) {
            
            $this->load->view('usertemplate/header');
            $this->load->view('login_error');
            $this->load->view('user_login');
            $this->load->view('usertemplate/footer');
        } else {
            redirect('User');
        }
    }

    public function add_user()
    {
        $password = $this->input->post('password');
        $encPass  = $this->encryption->encrypt($password);
        
        $userData = array(
            'User_lname' => $this->input->post('lname'),
            'User_fname' => $this->input->post('fname'),
            'User_emailadd' => $this->input->post('email'),
            'User_password' => $encPass
            
        );
        
        $this->Main_model->insert_user($userData);
        
        $this->load->view('usertemplate/header');
        $this->load->view('user_login');
        $this->load->view('usertemplate/footer');
    }
    public function login()
    {
        
        $userid = isset($_SESSION['User_Id']) ? $_SESSION['User_Id'] : 0;
        
        if (!empty($userid)) {
            redirect('User');
        } else {
            $id = $this->uri->segment(3);
            $this->load->helper('url');
            $this->load->view('usertemplate/header');
            $this->load->view('user_login');
            $this->load->view('usertemplate/footer');
        }
        
    }
}
?>
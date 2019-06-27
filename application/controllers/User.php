<?php
class User extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('paypal_lib');
        $this->load->database(); //manual connection to the database
        $this->load->model('Main_model');
        $this->load->helper('form');
        $this->load->library('encryption');
        $this->load->library('session');
        $this->check_isvalidated();
    }
    
    public function index()
    {
        // If the user is validated, then this function will run
        
        $id = $_SESSION['User_Id'];
        
        
        $this->db->where('User_Id', $id);
        
        $query           = $this->db->get("user");
        $data['records'] = $query->result();
        
        $this->db->select('*');
        $this->db->from('property');
        $this->db->join('user', 'property.User_Id_seller = user.User_Id');
        $this->db->where('property.User_Id_seller', $id);
        
        $query2           = $this->db->get();
        $data['records2'] = $query2->result();
        
        $this->load->view('usertemplate/header');
        $this->load->view('user_page');
        $this->load->view('usertemplate/footer');
    }

    private function check_isvalidated()
    {
        if (!$this->session->userdata('validated')) {
            redirect('Mis/login');
        }
    }
    
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Mis/login');
    }
    public function contact()
    {
        $id = $_SESSION['User_Id'];
        
        $this->db->where('User_id', $id);
        
        $query = $this->db->get("user");
        
        $data['records'] = $query->row_array();
        
        $this->load->view('usertemplate/header');
        $this->load->view('user_contact', $data);
        $this->load->view('usertemplate/footer');
    }
    public function register()
    {
        $this->load->view('usertemplate/header');
        $this->load->view('login_reg');
        $this->load->view('usertemplate/footer');
    }
    public function yourproperty()
    {
        $id = $_SESSION['User_Id'];
        
        $this->db->where('User_id', $id);
        
        $query = $this->db->get("user");
        
        $data['records'] = $query->result();
        
        $this->load->view('usertemplate/header');
        $this->load->view('your_property', $data);
        $this->load->view('usertemplate/footer');
    }
    
    public function submitproperty()
    {
        $this->load->helper('form');
        $propId = $this->uri->segment('3');
        $query  = $this->db->get_where("property", array(
            "Property_id" => $propId
        ));
        
        $data['records']    = $query->result();
        $data['old_propId'] = $propId;
        
        //Query for images
        $this->db->select('*');
        $this->db->from('property_images');
        $this->db->where('property_images.Property_id', $propId);
        
        $query2 = $this->db->get();
        
        $data['records2'] = $query2->result();
        
        $this->load->view('usertemplate/header');
        $this->load->view('submit_property', $data);
        $this->load->view('usertemplate/footer');
    }
    
    public function update($pid)
    {
        $id = $_SESSION['User_Id'];
        
        $this->db->where('User_id', $id);
        
        $query = $this->db->get("user");
        
        $data['records'] = $query->result();
        
        //Query for a single property detail
        $this->load->helper('form');
        $propId = $this->uri->segment('3');
        $query  = $this->db->get_where("property", array(
            "Property_id" => $pid
        ));
        
        $data['records']    = $query->row_array();
        $data['old_propId'] = $propId;
        
        //Query for images
        $this->db->select('*');
        $this->db->from('property_images');
        $this->db->where('property_images.Property_id', $propId);
        
        $query2 = $this->db->get();
        
        $data['records2'] = $query2->result();
        
        $this->load->view('usertemplate/header');
        $this->load->view('update_property', $data);
        $this->load->view('usertemplate/footer');
    }
    public function update_prop($pid)
    {
        $id = $_SESSION['User_Id'];
        
        $this->db->where('User_id', $id);
        
        $query = $this->db->get("user");
        
        $data['records'] = $query->result();
        $config          = array(
            'upload_path' => 'assets/img/',
            'allowed_types' => 'gif|png|jpg|jpeg'
        );
        
        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload('userfile')) {

            $error = array(
                'error' => $this->upload->display_errors()
            );
            echo "ERROR DETECTED";
            foreach ($error as $e) {
                echo $e;
            }

        } else {

            $upload_data = $this->upload->data();
            $file_name   = $upload_data['file_name'];
            $picMainLoc  = "http://[::1]/property_solutions_v2/assets/img/" . $file_name;
            $getimage    = $this->Main_model->getimage($pid);
            $data        = array(
                'Property_title' => $this->input->post('title'),
                'Property_price' => $this->input->post('price'),
                'Property_type' => $this->input->post('type'),
                'Property_detail' => $this->input->post('detail'),
                'pa_province' => $this->input->post('province'),
                'pa_city' => $this->input->post('city'),
                'pa_barangay' => $this->input->post('brgy'),
                'pa_street' => $this->input->post('street'),
                'Property_saleas' => $this->input->post('for'),
                'Property_areasize' => $this->input->post('sqm'),
                'Number_of_bedroom' => $this->input->post('bed'),
                'Number_of_bathroom' => $this->input->post('bath'),
            );
            
            $this->Main_model->updateProp($data, $pid);
            redirect('User/property');
            
        }
        
        
    }
    public function do_upload()
    {
        $id = $_SESSION['User_Id'];
        
        $this->db->where('User_id', $id);
        
        $query = $this->db->get("user");
        
        $data['records'] = $query->result();
        
        
        $pid = $this->input->post('id');
        
        $config['upload_path']   = './assets/img';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = 0;
        $config['max_width']     = 0;
        $config['max_height']    = 0;
        
        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload('userfile')) {
            $error = array(
                'error' => $this->upload->display_errors()
            );
            
            echo "ERROR DETECTED";
            foreach ($error as $e) {
                echo $e;
            }
        } else {
            $upload_data = $this->upload->data();
            
            $this->Main_model->insertImage($upload_data['file_name'], $pid);
            
            $data = array(
                'upload_data' => $this->upload->data()
            );
            
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    
    public function changepassword()
    {
        $this->load->view('usertemplate/header');
        $this->load->view('change_pass');
        $this->load->view('usertemplate/footer');
    }
    public function changepass()
    {
        
        $getpass = $_POST['p2'];
        $this->Main_model->changepass($this->session->userdata('User_Id'), $getpass);
    }
    
    
    public function deleteImg()
    {
        $image_id = $this->uri->segment('3');
        
        $this->Main_model->deleteImgM($image_id);
        
        $this->db->select('Image')->from('property_images')->where('image_id', $image_id);
        
        $query = $this->db->get();
        
        $row = $query->result();
        
        foreach ($row as $r) {
            unlink($r->Image);
        }
        
        redirect($_SERVER['HTTP_REFERER']);
    }
    
    public function userprofile()
    {
        $id = $_SESSION['User_Id'];
        
        $data['records'] = $this->db->get_where('user', array(
            'User_Id' => $id
        ))->row_array();
        
        $this->load->view('usertemplate/header');
        $this->load->view('user_profile', $data);
        $this->load->view('usertemplate/footer');
    }

    public function updateProfile()
    {
        $config = array(
            'upload_path' => 'assets/img',
            'allowed_types' => 'gif|png|jpg|jpeg'
        );
        
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('updatepic')) {
            $upload_data = $this->upload->data();
            $file_name   = $upload_data['file_name'];
            $picMainLoc  = "http://[::1]/property_solutions_v2/assets/img/" . $file_name;
            $old_User_id = $this->input->post('old_id');
            
            $data = array(
                'User_fname' => $this->input->post('fname'),
                'User_lname' => $this->input->post('lname'),
                'User_emailadd' => $this->input->post('email'),
                'image' => $picMainLoc
                
            );
            $this->Main_model->updateProfileM($data, $old_User_id);
            redirect('User/userprofile');
        } else {
            echo " RELOAD PAGE!";
        }
    }
    public function submitted()
    {
        $id = $_SESSION['User_Id'];
        $this->db->where('User_Id', $id);
        
        $query = $this->db->get("user");
        
        $data['records'] = $query->result();
        $this->db->select('*');
        $this->db->from('property');
        $this->db->where('User_Id_Seller', $id);
        
        $query2           = $this->db->get();
        $data['records2'] = $query2->result();
        
        $this->load->helper('url');
        
        $this->load->view('usertemplate/header');
        $this->load->view('user_submit', $data);
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
        $this->load->view('properties', $data);
        $this->load->view('usertemplate/footer');
    }

    public function user_search()
    {
        
        $data['records'] = $this->Main_model->search_propM();
        
        $this->load->view('usertemplate/header');
        $this->load->view('properties', $data);
        $this->load->view('usertemplate/footer');
    }

    public function user_sort()
    {
       $data['records'] = $this->Main_model->sortPriceM();
       $this->load->view('properties', $data);
    }

    public function view()
    {
        
        $Property_id = $this->uri->segment(3);
        $this->db->select('*');
        $this->db->from('property');
        $this->db->join('user', 'property.User_Id_seller = user.User_Id');
        $this->db->where('property.Property_id', $Property_id);
        
        $query = $this->db->get();
        
        $data['records']     = $query->result();
        $data['Property_id'] = $Property_id;
        
        $this->db->select('*');
        $this->db->from('property_images');
        $this->db->where('property_images.Property_id', $Property_id);
        
        $query2           = $this->db->get();

        $data['records2'] = $query2->result();

        $this->db->select('*');
        $this->db->from('staff');
        $this->db->where('staff.designation', 'Proprietor');

        $query3 = $this->db->get();

        $data['records3'] = $query3->result();

        $this->load->view('usertemplate/header');
        $this->load->view('user_view', $data);
        $this->load->view('usertemplate/footer');
        
    }
    
    public function addyourproperty()
    {
        $id = $_SESSION['User_Id'];
        
        //IMAGE UPLOAD ===============
        $config = array(
            'upload_path' => 'assets/img/',
            'allowed_types' => 'gif|png|jpg|jpeg',
            'encryption' => true
        );
        
        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload('main_pic')) {
            $error = array(
                'error' => $this->upload->display_errors()
            );
            echo "ERROR DETECTED";
            foreach ($error as $e) {
                echo $e;
            }
        } else {
            $upload_data = $this->upload->data();
            $file_name   = $upload_data['file_name'];
            $picMainLoc  = "http://[::1]/property_solutions_v2/assets/img/" . $file_name;
            $this->upload->do_upload('userfile');
            $upload_data2 = $this->upload->data();
            //add
            $data = array(
                'Property_title' => $this->input->post('title'),
                'Property_price' => $this->input->post('price'),
                'Property_type' => $this->input->post('type'),
                'Property_detail' => $this->input->post('detail'),
                'pa_province' => $this->input->post('province'),
                'pa_city' => $this->input->post('city'),
                'pa_barangay' => $this->input->post('brgy'),
                'pa_street' => $this->input->post('street'),
                'Property_saleas' => $this->input->post('for'),
                'Property_areasize' => $this->input->post('sqm'),
                'Number_of_bedroom' => $this->input->post('bed'),
                'Number_of_bathroom' => $this->input->post('bath'),
                'User_Id_Seller' => $id,
                'Property_picmain' => $picMainLoc,
                'admin_approval' => "UNAPPROVED",
                'Sold_status' => "UNSOLD"
            );
            
            
            $this->Main_model->addPropertyM($data);
            redirect('User/property');
            
        }
        
    }

    public function delete($pid)
    {
        $this->Main_model->delete($pid);
        redirect('User/submitted');
    }
    
    public function sendMessage()
    {
        $name    = $this->input->post('name');
        $email   = $this->input->post('email');
        $content = $this->input->post('message');
        
        $data = array(
            'name' => $name,
            'email' => $email,
            'message' => $sfname,
            'Seller_mi' => $message
        );
        
        $this->Main_model->sendMessageM($data);
        $message = "You have successfully sent a message, well be in touch with you soon!";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }

    public function reserveProperty(){
        $pid        = $this->input->post('propertyID');
        $uid        = $this->input->post('userID');
        $date       = $this->input->post('dateReserved');
        $contact    = $this->input->post('contactNo');

        $data = array(
            'Property_id'       => $pid,
            'User_Id'           => $uid,
            'Res_date'          => $date,
            'buyer_contact'     => $contact
        );

        $this->Main_model->reserveProperty($data);
    }

    public function newRequestQuery(){
        $prospectBuyerID    = $this->input->post('prospectBuyerID');
        $datePayment        = $this->input->post('dateOfPayment');
        $message            = $this->input->post('messageToSeller');
        $propID             = $this->input->post('propertyID');

        $data = array(
            'User_ID_prospect' => $prospectBuyerID,
            'date_of_meeting'  => $datePayment,
            'message_to_seller'=> $message,
            'Property_id'      => $propID
        );

        $this->Main_model->requestPurchaseQuery($data);

        $this->load->view('usertemplate/header');
        $this->load->view('user_request_success');
        $this->load->view('usertemplate/footer');
    }

    public function manageSales(){
        $this->load->view('usertemplate/header');
        $this->load->view('user_manageSales');
        $this->load->view('usertemplate/footer');
    }

    //PAYPAL CONTROLLER FUNCTIONS

    function buy(){
        $Property_id = $this->uri->segment(3);

        // Set variables for paypal form
        $returnURL = base_url().'paypal/success';
        $cancelURL = base_url().'paypal/cancel';
        $notifyURL = base_url().'paypal/ipn';
        
        $Property_title = $this->Main_model->getPropertyTitle($Property_id)->Property_title;
        $Property_price = $this->Main_model->getPropertyPrice($Property_id)->Property_price;

        // Get current user ID from the session
        $userID = $_SESSION['User_Id'];
        
        // Add fields to paypal form
        $this->paypal_lib->add_field('return', $returnURL);
        $this->paypal_lib->add_field('cancel_return', $cancelURL);
        $this->paypal_lib->add_field('notify_url', $notifyURL);
        $this->paypal_lib->add_field('item_name', $Property_title);
        $this->paypal_lib->add_field('custom', $userID);
        $this->paypal_lib->add_field('item_number',  $Property_id);
        $this->paypal_lib->add_field('amount', $Property_price);
        
        // Render paypal form
        $this->paypal_lib->paypal_auto_form();
    }

    function viewPurchaseRequest(){

        $this->db->select('*');
        $this->db->from('purchase_request');
        $this->db->join('user', 'purchase_request.User_ID_prospect = user.User_Id');
        $this->db->join('property', 'purchase_request.Property_id = property.Property_id');
        $query = $this->db->get();

        $data['records'] = $query->result();
    
        $this->load->view('usertemplate/header');
        $this->load->view('user_view_purchase_request', $data);
        $this->load->view('usertemplate/footer');
    }
}
?>
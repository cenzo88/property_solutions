<?php
class Main_model extends CI_Model
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('encryption');
    }

    public function getPropertyTitle($id){
         $query = 'SELECT Property_title from property where Property_id = '.$this->db->escape($id);
         return $this->db->query($query)->row();
    }

    public function getPropertyPrice($id){
         $query = 'SELECT Property_price from property where Property_id = '.$this->db->escape($id);
         return $this->db->query($query)->row();
    }

    public function changepass($id, $newpass)
    {
        $data = array(
            'User_password' => $this->encryption->encrypt($newpass)
        );
        return $this->db->where('User_Id', $id)->update('user', $data);
    }
    public function delete($pid)
    {
        $this->db->where('Property_id', $pid);
        return $this->db->delete('property');
    }
    public function search_propM()
    {
        
        $status  = "UNSOLD";
        $type    = $this->input->post('type');
        $sale_as = $this->input->post('sale_as');
        
        $location = $this->input->post('location');
        
        $this->db->group_start()->where('Property_saleas', $sale_as)->where('Property_type', $type)->where('Sold_status', $status)->group_end()->group_start()->or_like('pa_province', $location)->or_like('pa_city', $location)->or_like('pa_barangay', $location)->or_like('pa_street', $location)->group_end();
        
        
        $query = $this->db->get('property');
        return $query->result();
    }
    
    public function validateUser()
    {
        $email    = $this->input->post('email');
        $password = $this->input->post('password');
        
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user.User_emailadd', $email);
        
        $query = $this->db->get();
        
        foreach ($query->result() as $r) {
            $encPass = $r->User_password;
            $decPass = $this->encryption->decrypt($encPass);
            
            if ($query->num_rows() == 1 && $password == $decPass) {
                
                $sessionData = array(
                    'User_Id' => $r->User_Id,
                    'validated' => true
                );
                
                $this->session->set_userdata($sessionData);
                return true;
            }
            return false;
        }
        
    }
    public function insert_user($brokerData)
    {
        if ($this->db->insert("user", $brokerData)) {
            return true;
        }
    }
    public function addPropertyM($data)
    {
        if ($this->db->insert("property", $data)) {
            return true;
        }
    }
    public function insertImage($file_name, $id)
    {
        
        $ci_path = "http://[::1]/realestate/assets/img/" . $file_name;
        
        $data = array(
            'Property_id' => $id,
            'Image' => $ci_path
        );
        
        if ($this->db->insert("property_images", $data)) {
            return true;
        }
    }
    public function updateProfileM($data, $old_User_id)
    {
        $this->db->set($data);
        $this->db->where("User_Id", $old_User_id);
        $this->db->update("user", $data);
    }
    public function getimage($id)
    {
        $this->db->select('*');
        $this->db->where('property_id', $id);
        return $this->db->get('property')->row_array();
    }
    public function updateProp($data, $id)
    {
        $this->db->where('Property_id', $id);
        return $this->db->update('property', $data);
    }
    
    public function sendMessageM($data)
    {
        if ($this->db->insert("messages", $data)) {
            return true;
        }
    }

    public function requestPurchaseQuery($data)
    {
        if ($this->db->insert("purchase_request", $data)) {
            return true;
        }
    }

    //Paypal MODEL

    public function getRows($id = ''){
        $this->db->select('*');
        $this->db->from($this->proTable);
        $this->db->where('status', '1');
        if($id){
            $this->db->where('id', $id);
            $query  = $this->db->get();
            $result = $query->row_array();
        }else{
            $this->db->order_by('name', 'asc');
            $query  = $this->db->get();
            $result = $query->result_array();
        }
        
        // return fetched data
        return !empty($result)?$result:false;
    }
    
    /*
     * Insert data in the database
     * @param data array
     */
    public function insertTransaction($data){
        $insert = $this->db->insert($this->transTable,$data);
        return $insert?true:false;
    }

    public function sortPriceM(){
         $max = $this->input->post('priceRangeMax');
         $min = $this->input->post('priceRangeMin');

         $this->db->where('Property_price >=', $min)
         ->where('Property_price <=', $max);

         $query = $this->db->get('Property');
         return $query->result();
    }
    
    
}
?>
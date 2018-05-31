<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class Home extends CI_Controller {
 
     function __construct()
     {
         parent::__construct();
         if($this->session->userdata('login'))
         { 
            redirect('login');
         }
     }
   
     function index()
     {
        if($this->session->userdata('logged_in'))
        {
            $mobilenumber = $this->input->post('mobilenumber');
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            
            $this->load->library('googlemaps');
            $config = array();
            $this->googlemaps->initialize($config);
            //'Maitidevi, Kathmandu 44600, Nepal';
            $this->load->model("user");

            $loc  = $this->user->getlocation();

            foreach ($loc as $coordinate) 
            {
             
              $marker = array();
              $marker['position'] = $coordinate->latitude.','.$coordinate->longitude;
              $this->googlemaps->add_marker($marker);
            }
            $data["location"] = $loc;

            $data['map'] = $this->googlemaps->create_map();

            $this->load->view('homeview', $data);
          }
         else
          {
           //If no session, redirect to login page
           redirect('login', 'refresh');
          }
       }

    function victimview()
    {
      if ($this->session->userdata('logged_in')) 
      {
        $fetchvictim = $this->input->post('fetchvictim');
        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];

        $this->load->library('googlemaps');
        $config = array();
        $this->googlemaps->initialize($config);

        $this->load->model("user");

        $loc  = $this->user->getlocation();
        $data['victimprofile'] = $this->user->getvictimdetail($fetchvictim);
        //print_r($this->user->getvictimdetail());

        foreach ($loc as $coordinate) 
        {
         
          $marker = array();
          $marker['position'] = $coordinate->latitude.','.$coordinate->longitude;;
          $this->googlemaps->add_marker($marker);
        }

        $data["location"] = $loc;
        $data['map'] = $this->googlemaps->create_map();

        $data['branchlist'] = $this->user->branchlist();
        $this->load->view('victim_view', $data);

      }
      else
      {
        redirect('login', 'refresh');
      }
    } 
  
    function search()
    {      
        if ($this->session->userdata('logged_in'))
        {
          $triggered_id = $this->input->post('triggered_id');
          //print_r($trigger_id);
          $session_data = $this->session->userdata('logged_in');
          $data['username'] = $session_data['username'];
          $username = $session_data['username'];

          $this->load->library('googlemaps');
          $config = array();
          $this->googlemaps->initialize($config);
          
          $this->load->model("user");
          $loc  = $this->user->getlocation();
          $data['victimdetail'] = $this->user->searchvictimdetail($triggered_id);
          //$se = $this->user->searchvictimdetail($triggered_id);
          //print_r($trigger_id);
          //print_r($se);
          foreach ($loc as $coordinate) 
          {
           
            $marker = array();
            $marker['position'] = $coordinate->latitude.','.$coordinate->longitude;;
            $this->googlemaps->add_marker($marker);
          }
          $data["location"] = $loc;
          $data['map'] = $this->googlemaps->create_map();

          $this->load->view('searchview', $data);
       }
       else
       {
          $this->session->set_userdata('error_msg',"Victim history not found");
          redirect('home/search');
       }
    }
  
   function add()
   {
      if ($this->session->userdata('logged_in')) 
      {
        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];

        $this->load->library('googlemaps');
        $config = array();
        $this->googlemaps->initialize($config);
          //'Maitidevi, Kathmandu 44600, Nepal';
        $this->load->model("user");
        $loc  = $this->user->getlocation();

          foreach ($loc as $coordinate) 
          {
           
            $marker = array();
            $marker['position'] = $coordinate->latitude.','.$coordinate->longitude;

            $this->googlemaps->add_marker($marker);
          }

          $data["location"] = $loc;
          $data['map'] = $this->googlemaps->create_map();

        $data['msg'] = $this->session->userdata('succ_msg', "User Added successfully");
        $this->load->view('adduser', $data);
      }
      else
      {
        redirect('login', 'refresh');
      }
    }

    function saveUser()
    {
      $SubmitUser = $this->input->post('SubmitUser');
      if($SubmitUser)
      {
        $first_name = $this->input->post('first_name');
        $middle_name = $this->input->post('middle_name');
        $last_name = $this->input->post('last_name');
        $license_no = $this->input->post('license_no');
        $phonenumber = $this->input->post('phonenumber');
        $branch = $this->input->post('branch');
        $email = $this->input->post('email');
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];
        $agency_id = $session_data['agency_id'];

        $data = array(
        'username' => $username,
        'password' => $password,
        'first_name' => $first_name,
        'middle_name' => $middle_name,
        'last_name' => $last_name,
        'license_no' => $license_no,
        'phonenumber' => $phonenumber,
        'added_by' => $agency_id,
        'branch' => $branch,
        'email' => $email
        );
        
        $this->load->model('user');
        $result = $this->user->save($data);
        if($result)
        {
          $data['msg'] = $this->session->set_userdata('succ_msg','Data Added Succcessfully');
          redirect('home/add');
        }
        else
        {
          $this->session->set_userdata('error_msg',"Error. Please retry.");
          redirect('home/add');
        }
      }
    }
  
    function saveData()
     {
        $feedback = $this->input->post('feedback');
        $vid = $this->input->post('vid');
        $Feeds = array(
          'mobilenumber' => $feedback,
          'feedback' => $feedback
          );

        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];
        $this->load->model('user');

        
        /*$result = $this->user->saveData($data);*/
        $data['branchlist'] = $this->user->branchlist();
        $result = $this->user->updatets($feedback, $vid);

        if($result)
        {
          redirect('home');
        }
        else
        {
          $this->session->set_userdata('error_msg',"Error. Please retry.");
          redirect('home/victim_view');
        }
      }

    function edituser()
    {
      if ($this->session->userdata('logged_in')) 
      {
        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];

        $this->load->library('googlemaps');
        $config = array();
        $this->googlemaps->initialize($config);

        $this->load->model("user");

        $loc  = $this->user->getlocation();
        foreach ($loc as $coordinate) 
        {
         
          $marker = array();
          $marker['position'] = $coordinate->latitude.','.$coordinate->longitude;;
          $this->googlemaps->add_marker($marker);
        }

        $data["location"] = $loc;
        $data['map'] = $this->googlemaps->create_map();

        $agency_id = $session_data['agency_id'];
        $data['sagency'] = $this->user->getRequiredUser($agency_id);
        $this->load->view('edituser', $data);
      }
      else
      {
        redirect('login', 'refresh');
      }
    }
  
    function updateuser()
    {
      $first_name = $this->input->post('first_name');
      $middle_name = $this->input->post('middle_name');
      $last_name = $this->input->post('last_name');
      $license_no = $this->input->post('license_no');
      $phonenumber = $this->input->post('phonenumber');
      $added_by = $this->input->post('added_by');
      $added_date = $this->input->post('added_date');
      $branch = $this->input->post('branch');
      $email = $this->input->post('email');
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      $id = $this->input->post('agency_id');
      $data = array(
      'username' => $username,
      'password' => $password,
      'first_name' => $first_name,
       'middle_name' => $middle_name,
      'last_name' => $last_name,
      'email' => $email,
      'license_no' => $license_no,
      'phonenumber' => $phonenumber,
      'added_by' => $added_by,
      'added_date' => $added_date,
      'branch' => $branch
      );
      
      $session_data = $this->session->userdata('logged_in');
      $data['username'] = $session_data['username'];
      $agency_id = $session_data['agency_id'];
      $this->load->model('user');
      $result = $this->user->update($data, $agency_id);
      if($result)
      {
        redirect('home/edituser');
      }
      else
      {
        $this->session->set_userdata('error_msg', "Error. Please retry.");
        redirect('home/edituser');
      }
    }
 
     function logout()
     {
       $this->session->unset_userdata('logged_in');
       session_destroy();
       redirect('home', 'refresh');
     }
  }

?>
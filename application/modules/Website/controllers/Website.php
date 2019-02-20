<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website extends MX_Controller
{
	function __construct()
	{
        parent::__construct();
        $this->load->model('website_model');
        $this->load->helper(array('form'));
			
	     /* Load form validation library */ 
	     $this->load->library('form_validation');
        // $userdata = $this->session->userdata('userdata');
        // if(empty($userdata['logged_in']))
        // {
        // 	redirect('login');
        // }      
    }

	public function index()
	{
		$this->template->load('template', 'index');
	}
	public function home()
	{
		//echo "hello";die;
		$this->template->load('template', 'home');
	}
	public function about()
	{
		$this->template->load('template', 'about');
	}
	public function service()
	{
		$this->template->load('template', 'service');
	}
	public function blog()
	{
		$this->template->load('template', 'blog');
	}
	public function blog_details()
	{
		$this->template->load('template', 'blog-details');
	}

	public function dashboard()
	{
		$this->template->load('template', 'dashboard');
	}
	public function pricing()
	{
		$this->template->load('template', 'pricing');
	}
	public function contact()
	{
		$this->template->load('template', 'contact');
	}
	public function register()
	{
		

	     /* Set validation rule for name field in the form */ 
	     $this->form_validation->set_rules('name', 'Name', 'required'); 
	     $this->form_validation->set_rules('user_name', 'User Id', 'required'); 
	     $this->form_validation->set_rules('sponser_id', 'Sponser Id', 'required'); 
	     $this->form_validation->set_rules('pos', 'Position', 'required'); 
	     $this->form_validation->set_rules('mobile_number', 'Mobile Number', 'required'); 
	     $this->form_validation->set_rules('password', 'password', 'required'); 
	     $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
			
	     if ($this->form_validation->run() == TRUE)
	     { 
			$name = $this->input->post('name');
			$user_name = $this->input->post('user_name');
			$email = $this->input->post('email');
			//echo $email; die;
			//$btc = $this->input->post('btc');
			$sponser_id = $this->input->post('sponser_id');

			$position = $this->input->post('pos');
			
			// echo $leaf; die;

			$mobile = $this->input->post('mobile_number');
			$password = $this->input->post('password');
			$this->website_model->get_lts_leaf($sponser_id,$position);
			$leaf  =$this->session->flashdata('leaf');
			if($leaf)
			{
				$data = array
				(
					'name'=>$name,
					'email'=>$email,
					'user_name'=>$user_name,
					'sponser_id' =>$leaf,
					'mobile_number'=>$mobile,
					'dreferal'=>$sponser_id,
					'password'=>$password,
					'position'=>$position,
					'join_date'=>date('Y-m-d'),
				);
				$is_username_email = $this->website_model->check_username($user_name);
				if($is_username_email)
				{
					$this->session->set_flashdata('username_exist', 'User Id is Already  Exist');
				}
				else
				{
					$insert_id = $this->website_model->register_data($data);

					if($insert_id)
					{

						$this->session->set_flashdata('reg', 'REGISTRATION SUCCESSFULL');
						redirect('website/login');
						// echo "<script>alert('Registration Successfull')</script>";
					}
					else
					{
						$this->session->set_flashdata('reg', 'Error');
					// echo "<script>alert('Registration Successfull')</script>";
					}
				}
			}
			else
			{
				echo"<script>alert('Leaf Not found')</script>";
			}
	     } 
		$this->template->load('template', 'register');
	}
	public function login()
	{


	     $this->form_validation->set_rules('user_name', 'User Id', 'required'); 
	     $this->form_validation->set_rules('password', 'password', 'required'); 
	     

		if ($this->form_validation->run() == true)
		{ 
			$user_name = $this->input->post('user_name');
			$password = $this->input->post('password');
			$row = $this->website_model->check_login_credentials($user_name,$password);
		//	echo $this->db->last_query(); die;
			//print_r($row); die;
			if($row)
			{
				//print_r($row); die;
				$this->session->set_userdata('userdata',$row);
				redirect('user_panel');
			}
			else
			{
				$this->session->set_flashdata('login','CREDENTIALS DID NOT MATCH');
			}

		}

		$this->template->load('template', 'login');
	}
	public  function is_username_exist()
	{
		$user_name = $this->input->post('user_name');
		// $user_name = 'vicky@001';

		$row = $this->website_model->check_username_for_reg($user_name);
		// echo $this->db->last_query(); die;
		if(!empty($row))
		{
			echo json_encode(1);
		}
		else
		{
			echo json_encode(2);
		}
	}
	public  function is_sponser_exist()
	{
		$sponser_id = $this->input->post('sponser_id');
		// $user_name = 'vicky@001';

		$row = $this->website_model->check_sponser_for_reg($sponser_id);
		// echo $this->db->last_query(); die;
		if(!empty($row))
		{
			echo json_encode(1);
		}
		else
		{
			echo json_encode(2);
		}
	}
}


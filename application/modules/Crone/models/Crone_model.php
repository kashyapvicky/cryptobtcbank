<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Crone_model extends CI_Model
{

	

	public function get_all_active_user()
	{
		// die('model m');
		$today=date('Y-m-d');	
		$this->db->where('status',1);
		// $this->db->where('package_exp_date>',$today);
		$query = $this->db->get('users');
		// echo $this->db->last_query(); die;
		return $query->result_array();

	}
	public function get_its_one_left($user_name)
	{
		$this->db->select('*');
		$this->db->where('sponser_id',$user_name);
		$this->db->where('position','Left');
		$this->db->where('status',1);
		$query = $this->db->get('users');
		// echo $this->db->last_query(); die;
		return $query->row_array();

	}
	public function get_its_one_right($user_name)
	{
		$this->db->select('*');
		$this->db->where('sponser_id',$user_name);
		$this->db->where('position','Right');
		$this->db->where('status',1);
		$query = $this->db->get('users');
		return $query->row_array();
	}
	public function get_left_downline($user_name,$amount,$no_of_user)
	{
		
		 
		$this->db->select('btc,user_name');
		$this->db->where('sponser_id',$user_name);
		$query = $this->db->get('users');
		// echo $this->db->last_query(); die;
		$result = $query->result_array($query);
		if(!empty($result))
		{
			foreach ($result as $key => $value) 
			{
				$no_of_user++;

				$amount+= $value['btc'];

				$this->get_left_downline($value['user_name'],$amount,$no_of_user);
			}
		}
		return $array=array('t_left_amount'=>$amount,'t_left_user'=>$no_of_user);
	}
	public function get_right_downline($user_name,$amount,$no_of_user)
	{
		$this->db->select('btc,user_name');
		$this->db->where('sponser_id',$user_name);
		$query = $this->db->get('users');
		$result = $query->result_array($query);
		// print_r($result);
		if(!empty($result))
		{	
			foreach ($result as $key => $value) 
			{
				$no_of_user++;
				$amount+= $value['btc'];
				$this->get_left_downline($value['user_name'],$amount,$no_of_user);
			}
		}
		return $array=array('t_right_amount'=>$amount,'t_right_user'=>$no_of_user);
	}
	// public function gets_total_left_income($username,$array,$position=Null)
	// {
	// 	// echo $username; echo $total_left_childs_investment; die;
	// 	$this->db->where('sponser_id',$username);
	// 	if(!empty($position) || $position!=Null)
	// 	{
	// 		$this->db->where('position',$position);
	// 	}
	// 	$query=$this->db->get('users');
	// 	$result = $query->result_array();
	// 	 // echo $this->db->last_query();
	// 	 // echo"<br>";
	// 	if(empty($total_left_childs_investment) || !isset($total_left_childs_investment))
	// 	{
	// 		$total_left_childs_investment=0;
	// 	}
	// 	if(!empty($result))
	// 	{
	// 		foreach ($result as $key => $value)
	// 		{
				
				
	// 			 // echo"<pre>";print_r($result);die;
	// 			if(!empty($value['btc']))
	// 			{
	// 				 $array[$value['user_name']] = $value['btc'];
	// 			}
	// 				$this->gets_total_left_income($value['user_name'],$array,Null);
	// 		}
	// 	}
	// 	echo"<pre>";
	// 	print_r($array);
	// }
	public function inser_matching_income($data)
	{
		$this->db->insert('crone_job_income',$data);
		return $this->db->insert_id();
	}
	public function update_wallet_balance($user_id,$amount)
	{
		$this->db->where('id',$user_id);
		$this->db->set('btc', 'btc + ' .$amount, FALSE);
		$query = $this->db->update('users');
		if($query)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	public function is_today_done($flag)
	{
		$today = date('Y-m-d');
		$this->db->select('id');
		$this->db->where('ondate',$today);
		$this->db->where('income_type ',$flag);

		$query = $this->db->get('crone_job_income');
		return $query->row_array();
		// $this->db->where()
	}
	public function get_total_direct_amount($username)
	{
		$this->db->select_sum('btc');

		$this->db->where('dreferal',$username);
		$query = $this->db->get('users');
		return $query->row_array();
	}
	public function insert_direct_income($data)
	{
		$this->db->insert('crone_job_income',$data);
		return $this->db->insert_id();
	}
	public function insert_roi_income($data)
	{
		$this->db->insert('crone_job_income',$data);
		return $this->db->insert_id();
	}
	public function get_latest_transacction_amount($user_id)
	{
		$this->db->select('id,total_income,ondate');
		$this->db->where('user_id',$user_id);
		$this->db->where('income_type',1);
		$this->db->order_by('ondate','DESC');
		$this->db->limit(1);
		$query = $this->db->get('crone_job_income');
		return $query->row_array();
	}
	public function latest_credit_direct_amount($user_id)
	{
		$this->db->select('id,total_income,ondate');
		$this->db->where('user_id',$user_id);
		$this->db->where('income_type',2); // direct income
		$this->db->order_by('ondate','DESC');
		$this->db->limit(1);
		$query = $this->db->get('crone_job_income');
		return $query->row_array();
	}
	public function all_package_holder_user()
	{
		$today=date('Y-m-d');
		$this->db->select('*');
		$this->db->where('package_exp_date>',$today);
		$this->db->where('status',1);
		$query = $this->db->get('users');
		return $query->result_array();

	}
}


?>
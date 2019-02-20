<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class User_panel_model extends CI_Model
{

	public function insert_spinner_transactions($data)
	{
		$this->db->insert('spinner_transaction',$data);
		return $this->db->insert_id();
	}
	public function add_sub_roullete_result($user_id,$amount)
	{
		$this->db->where('id',$user_id);
		
		$this->db->set('btc', 'btc + ' . (int) $amount, FALSE);
		
		$query = $this->db->update('users');
		// echo $this->db->last_query(); die;
		if($query)
		{
			return 1;
		}
		else
		{
			return 0;
		}

	}
	public function get_wallet_amount($user_id)
	{
		$this->db->select('btc');
		$this->db->where('id',$user_id);
		$query = $this->db->get('users');
		return $query->row_array();
	}
	public function get_transactions_details($user_id)
	{
		$this->db->select('u.name,u.user_name,st.result,st.time');
		$this->db->join('spinner_transaction as st','st.user_id=u.id');
		$this->db->where('u.id',$user_id);
		$query = $this->db->get('users as u');
		return $query->result_array();
	}
	public function get_directs_downline($sponser,$user_name)
	{
		$this->db->select('*');
		$this->db->where('sponser_id',$user_name);
		$query = $this->db->get('users');
		return $query->result_array();

	}
	public function get_total_team($user_name)
	{
		$this->db->select('id,name,user_name,email,position,status');
		$this->db->where('sponser_id',$user_name);
		// $this->db->where('position',$pos);
		$query = $this->db->get('users');
		return $query->result_array();
	}
	public function get_all_downlines($user_name)
	{
		$this->db->where('sponser_id',$user_name);
		$query = $this->db->get('users');
		$result = $query->result_array();
		// echo"<pre>";print_r($result); die;
		 // echo"<pre>";print_r($result);

		// if(!empty($result))
		// {
		// 	foreach ($result as $key => $value)
		// 	{	

		// 	}
		// }
		foreach ($result as $key => $value)
		{
			$username = $value['user_name'];
			$resultt = $this->get_all_downliness($username);
			if(!empty($resultt))
			{

				$total_array = array_merge($result,$resultt);
			}
			
		}
		echo"<pre>";print_r($total_array);
	}
	public function get_all_downliness($user_name)
	{
		$this->db->where('sponser_id',$user_name);
		$query = $this->db->get('users');
		$resultt = $query->result_array();
		// echo"<pre>";print_r($result); die;
		 return $resultt;
		
	}
	public function insert_investmente($data)
	{
		$this->db->insert('inv_transactions',$data);
		return $this->db->insert_id();
	}
	public function update_wallet_amount($amount,$user_id,$plan,$exp_date)
	{


		$this->db->where('id',$user_id);
		$this->db->set('btc', 'btc + ' . (int) $amount, FALSE);
		$this->db->set('status',1);
		$this->db->set('package_id',$plan);
		$this->db->set('package_exp_date',$exp_date);

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
	public function insert_withdraw_transactions($data)
	{
		$this->db->insert('withdraw_transactions',$data);
		return $this->db->insert_id();
	}
	public function dec_wallet_amount($amount,$user_id)
	{
		$this->db->where('id',$user_id);
		$this->db->set('btc', 'btc - ' . (int) $amount, FALSE);
		$this->db->update('users');
	}
	public function get_withdraw_history($user_id)
	{
		$this->db->where('user_id',$user_id);
		$query = $this->db->get('withdraw_transactions');
		return $query->result_array();
	}
	public function get_all_left($user_name,$pos)
	{
		$this->db->where('sponser_id',$user_name);
		$this->db->where('position',$pos);
		$query = $this->db->get('users');
		return $query->result_array();
	}
	public function get_all_right($user_name,$pos)
	{
		$this->db->where('sponser_id',$user_name);
		$this->db->where('position',$pos);
		$query = $this->db->get('users');
		return $query->result_array();
	}
	public function get_rest_child($user_name)
	{
		$this->db->where('sponser_id',$user_name);
		// $this->db->where('position',$pos);
		$query = $this->db->get('users');
		$result =  $query->result_array();
		if(!empty($result))
		{
			foreach ($result as $key => $row)
			{
				echo"
                    <tr>
                      <td>".$row['name']."</td>
                      <td>".$row['mobile_number']."</td>
                      <td>".$row['sponser_id']."</td>
                      <td>".$row['position']."</td>
                      <td>".$row['join_date']."</td>
                      <td>".$row['activation_date']."</td>
                      <td>".$row['status']."</td>
                      </tr>
                      ";
					$this->get_rest_child($row['user_name']);
			}
		}
	}

	public function get_all_active_user()
	{
		$today=date('Y-m-d');	
		$this->db->where('status',1);
		$this->db->where('package_exp_date>',$today);
		$query = $this->db->get('users');
		return $query->result_array();

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
	public function get_tree_structure_first_level($username)
	{
		$this->db->select('*');
		$this->db->where('sponser_id',$username);
		$this->db->order_by('position');
		$query = $this->db->get('users');
		return $query->result_array();


	}
	public function get_left_leafs($username)
	{
		$this->db->select('*');
		$this->db->where('sponser_id',$username);
		$query = $this->db->get('users');
		return $query->result_array();
	}
	public function get_right_leafs($username)
	{
		$this->db->select('*');
		$this->db->where('sponser_id',$username);
		$query = $this->db->get('users');
		return $query->result_array();
	}
	public function get_crone_income($user_id)
	{
		$this->db->select('*');
		$this->db->where('user_id',$user_id);
		$query = $this->db->get('crone_job_income');
		return $query->result_array();
	}
	public function get_user_detail($id)
	{
		$this->db->select('*');
		$this->db->where('id',$id);
		$row = $this->db->get('users');
		return $row->row_array();
	}
	public function get_total_withdraw($user_id)
	{
		$this->db->select_sum('amount');
		$this->db->where('user_id',$user_id);
		$query = $this->db->get('withdraw_transactions');
		return $query->row_array();
	}
	public function update_basick_info($data,$user_id)
	{
		$this->db->where('id',$user_id);
		$query = $this->db->update('users',$data);
		if($query)
		{
			return 1;
		}
		else
		{
			return 0;
		}

	}
	public function check_username_for_reg($username)
   {
   	$this->db->select('id,user_name');
   	$this->db->where('user_name',$username);
   	$query = $this->db->get('users');
   	return $query->row_array();
   } 

}


?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crone extends MX_Controller
{
	function __construct()
	{
        parent::__construct();
        $this->load->model('crone_model');
    }
	public function matching_income()
	{
		// die('hello');
		// $total_left_user = 0;
		// $total_right_user = 0;
		$flag=1;		// for matching income
		$row = $this->crone_model->is_today_done($flag);
		if($row)
		{
			die('crone for the day is already executed');
		}
		$users_arrary = $this->crone_model->get_all_active_user();
		if(!empty($users_arrary))
		{
			foreach ($users_arrary as $key => $value)
			{
				// print_r($users_arrary); die;

				$username = $value['user_name'];
				$left_row = $this->crone_model->get_its_one_left($username);
				$right_row = $this->crone_model->get_its_one_right($username);
					// echo $this->db->last_query(); die;
				if(!empty($left_row) && !empty($right_row))
				{
					$total_left_user=1;
					$left_username = $left_row['user_name'];
					$total_left_amount = $left_row['btc'];
					// echo $total_left_amount;die;
					$left_data  =$this->crone_model->get_left_downline($left_username,$total_left_amount,$total_left_user);
					$total_right_user=1;
					$right_username = $right_row['user_name'];
					$total_right_amount = $right_row['btc'];
					$right_data = $this->crone_model->get_right_downline($right_username,$total_right_amount,$total_right_user);
							$t_left_user = $left_data['t_left_user'];
					$t_left_amount = $left_data['t_left_amount'];
					$t_right_user = $right_data['t_right_user'];
					$t_right_amount=$right_data['t_right_amount'];
					if($t_left_amount < $t_right_amount)
					{
						$matching_income = $t_left_amount;
					}


					else
					{
						$matching_income = 	$t_right_amount;
					}
					$latest_transaction_row =$this->crone_model->get_latest_transacction_amount($value['id']);
					// print_r($latest_transaction_row); die;
					if($latest_transaction_row['total_income'])
					{
						
						$latest_transaction_amount = $latest_transaction_row['total_income'];
					}
					else
					{
						$latest_transaction_amount=0;
					}
					$till_today_business = $matching_income;
					$matching_income =  $matching_income - $latest_transaction_amount;
					$percentage = 5;
					$matching_income_percentge = ($matching_income*$percentage)/100;
					$data = array
					(
						'user_id'=>$value['id'],
						'name'=>$value['name'],
						'user_name'=>$value['user_name'],
						'total_income'=>$till_today_business,
						'ondate'=>date('Y-m-d'),
						'income_type'=>1,
						'credit_amount'=>$matching_income_percentge,
					);

					$insert_id  = $this->crone_model->inser_matching_income($data);
					// echo $this->db->last_query(); die;
					if($insert_id)
					{
						$bool = $this->crone_model->update_wallet_balance($value['id'],$matching_income_percentge);
						if($bool)
						{
							echo"Successfully credited";
						}
						else
						{
							echo"error in crone";
						}
					}
				}
				else
				{
					echo"1:1 is not completed";
				}
				
			}
		}
		else
		{
			echo "No User For today";
		}
	}
	public function direct_income()
	{

		$flag=2;		// for matching income
		$row = $this->crone_model->is_today_done($flag);
		if($row)
		{
			die('crone for the day is already executed');
		}
		$users_arrary = $this->crone_model->get_all_active_user();
		if(!empty($users_arrary))
		{
			foreach ($users_arrary as $key => $value)
			{
				// print_r($users_arrary); die;
				$username = $value['user_name'];
				$row = $this->crone_model->get_total_direct_amount($username);
				if(!empty($row['btc']))
				{	
					$percentage = 5;
					$total_direct_investment = $row['btc'];
					$latest_credit_direct_amount = $this->crone_model->latest_credit_direct_amount($value['id']);
					// echo $this->db->last_query(); die;

					if($latest_credit_direct_amount['total_income'])
					{
						$latest_transaction_amount = $latest_credit_direct_amount['total_income'];
					}
					else
					{
							$latest_transaction_amount=0;
					}
					// echo $latest_transaction_amount; die;
					$till_today_business = $total_direct_investment;
					$total_direct_investment = $total_direct_investment - $latest_transaction_amount;
					$total_direct_income = ($total_direct_investment*$percentage)/100;
					// echo $total_direct_income; die;
					$data = array
					(
						'user_id'=>$value['id'],
						'name'=>$value['name'],
						'user_name'=>$value['user_name'],
						'total_income'=>$till_today_business,
						'ondate'=>date('Y-m-d'),
						'income_type'=>2,
						'credit_amount'=>$total_direct_income,
					);
					$insert_id = $this->crone_model->insert_direct_income($data);
					if($insert_id)
					{
						$bool = $this->crone_model->update_wallet_balance($value['id'],$total_direct_income);
						if($bool)
						{
							echo"Successfully credited";
						}
						else
						{
							echo"error in crone";
						}
					}
				}
			}
		}
		else
		{
			echo"No User Found";
		}
	}

	public function roi_income()
	{

		$flag=3;		// for matching income
		$row = $this->crone_model->is_today_done($flag);
		if($row)
		{
			die('crone for the day is already executed');
		}
		$users = $this->crone_model->all_package_holder_user();
		if(!empty($users))
		{

			foreach ($users as $key => $value)
			{
				$package = $value['package_id'];
				if($package==1)
				{
					$amount=50;
					$roi = 1;
				}
				elseif($package==2)
				{	$amount=100;
					$roi = 2;
				}
				elseif($package==3)
				{	$amount=300;
					$roi=3;
				}
				elseif($package==4)
				{
					$amount=500;
					$roi=4;
				}
				elseif($package==5)
				{$amount=1000;
					$roi=5;
				}
				elseif($package==6)
				{
					$amount=50000;
					$roi=6;
				}
				else
				{
					echo"server error :404";die;
				}
				$roi_percentage = ($amount*$roi)/100;
				// echo $total_direct_income; die;
				$data = array
				(
					'user_id'=>$value['id'],
					'name'=>$value['name'],
					'user_name'=>$value['user_name'],
					'total_income'=>$amount,
					'ondate'=>date('Y-m-d'),
					'income_type'=>3,
					'credit_amount'=>$roi_percentage,
				);
				$insert_id = $this->crone_model->insert_roi_income($data);
				// echo $this->db->last_query(); die;
				if($insert_id)
				{
					$bool = $this->crone_model->update_wallet_balance($value['id'],$roi_percentage);
					if($bool)
					{
						echo"Successfully credited";
					}
					else
					{
						echo"error in crone";
					}
				}
				else
				{
					echo"error in roi";
				}
			}
		}
		else
		{
			echo"no user for today";
		}
	}			
}

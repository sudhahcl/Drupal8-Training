<?php 

namespace Drupal\student_module\Services;
use Drupal\Core\Config\ConfigFactoryInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

 Interface SubmissionInterface{
	 public function registervalue($form_value);
	 public function GrantAccess($rolename, $uservalue);
 }
 
 Class SubmissionService implements SubmissionInterface{
		
	public function	registervalue($form_value){
		
		  // $config =  \Drupal::service('config.factory')->getEditable('student_module.settings')->delete();
				
		$config =  \Drupal::service('config.factory')->getEditable('student_module.settings');
		$configvalues = $config->get();
		$countvalue = (count($configvalues)+1);
		
		
		$config = \Drupal::service('config.factory')->getEditable('student_module.settings');
		$config->set($countvalue, $form_value);
		$config->save();	
		
	}
	
	public function GrantAccess($rolename , $uservalue){
		
		 if(!empty($uservalue)){
			 foreach($uservalue  as $userval){
				 if($userval != 0){
					 $formval[] = $userval;
				 }
			 } 
		 }
		 
		 
		 foreach($formval as $frmval){
			 
				$userval = explode('_',$frmval);
				$user_id = $userval[0];
				$user_name = $userval[1];
				$data_id = $userval[2];
				
				$roleinit = \Drupal\user\Entity\User::load($user_id);
				$roleinit->addRole($rolename);
				$roleinit->save();

				$config1 = \Drupal::service('config.factory')->getEditable('student_module.settings');
				$config1->set($data_id .'.status', 'Status Changed');
				$config1->save();	
				
								
								
				// $userroleshget = \Drupal::entityTypeManager()->getStorage('user')->loadByProperties(['uid' => $user_id]);
				// $userrl = reset($userroleshget);
				// if ($userrl) {
						// $user_id = $userrl->id();
						// $Rolevalues = $userrl->getRoles();
				// }
				// print_r($Rolevalues);

				
			}
			
			
		
	}
	
	
		public function denyaccessfun($uservalue){
			
			 if(!empty($uservalue)){
					 foreach($uservalue  as $userval){
						 if($userval != 0){
							 $formval[] = $userval;
						 }
					 } 
				}
		 
		 
		 foreach($formval as $frmval){
			 
				$userval = explode('_',$frmval);
				$user_id = $userval[0];
				$user_name = $userval[1];
				$data_id = $userval[2];
				
				$config1 = \Drupal::service('config.factory')->getEditable('submission_module.settings');
				$config1->set($data_id .'.status', 'Deny Access');
				$config1->save();	
				
			}
			
		}
	
	
 }
<?php 

namespace Drupal\submission_module\Services;
use Drupal\Core\Config\ConfigFactoryInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

 Interface SubmissionInterface{
	 public function registervalue($form_value);
	 public function changepasswordvalue($id , $newpassword);
 }
 
 Class SubmissionService implements SubmissionInterface{
		
	public function	registervalue($form_value){
				
		$config =  \Drupal::service('config.factory')->getEditable('submission_module.settings');
		$configvalues = $config->get('user');
		$countvalue = count($configvalues);
		
		$config = \Drupal::service('config.factory')->getEditable('submission_module.settings');
		$config->set('user.'.$countvalue, $form_value);
		$config->save();		
		
	}
	
	public function changepasswordvalue($id , $newpassword){
		 
		 $currentpassword =  $newpassword;
		 
		$config = \Drupal::service('config.factory')->getEditable('submission_module.settings');
		$config->set('user.'.$id.'.password', $currentpassword);
		$config->save();
		 

	}
 }
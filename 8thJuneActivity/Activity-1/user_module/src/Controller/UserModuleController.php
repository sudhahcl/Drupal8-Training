<?php

  namespace Drupal\user_module\Controller;

class UserModuleController{

	public function hello(){


		
		return array(
			'#title' => 'New Module',
			'#markup' =>  'This is the New Module content'
		);
	}




	public function parms($user){
		$userDetails = 
		array(
			"1"=>array("ID"=>1,"Name"=>'Admin', "Title"=>' Welcome Admin'),
			"2"=>array("ID"=>2,"Name"=>'Hari', "Title"=>' Welcome Hari'),
			"3"=>array("ID"=>3,"Name"=>'Prasath', "Title"=>' Welcome Prasath')
		); 


			 if(in_array($user,$userDetails[$user]))  {

					return array(
			          '#title' => "Hello ".$userDetails[$user]['Title'],
			          '#markup' => 'Hi Please check your name '.$userDetails[$user]['Name'],
			        );

		}else{
			return array(
			          '#title' => "User Not Found ",
			          '#markup' => 'Hi Please check your User Data ',
			        );
		}
		
	}


}


?>
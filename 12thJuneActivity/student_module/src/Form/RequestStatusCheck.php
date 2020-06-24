<?php

namespace Drupal\student_module\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Form\drupal_set_message;
use Drupal\Core\Entity\t;

/**
 * Class Configuration Setting.
 *
 * @package Drupal\student_module\Form
 */
class RequestStatusCheck extends FormBase {

  /**
   * {@inheritdoc}
   */
  // public static function create(ContainerInterface $container) {
  //   return new static(
  //       $container->get('student_module.settings')
  //   );
  // }

  /**
   * {@inheritdoc}
   */

	  
  public function validateForm(array &$form, FormStateInterface $form_state) {
    // valiodate form values
    // if ($form_state->getValue('password_confirm') == '' ) {
      // $msg = t('<strong>=Password is required!</strong>');
      // $form_state->setErrorByName('form', $msg);
    // }
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state ) {
	  
	
	$config =  \Drupal::service('config.factory')->getEditable('student_module.settings');
	$uservalue = $config->get();	
	
	
	if(!empty($uservalue)){
		foreach($uservalue as $key => $value){			
			$keyvalue = $value['userid'].'_'.$value['name'].'_'.$key;	
		  if($value['status'] == 'Pending'){
			$user_content[$keyvalue] =  $value;
		  }
		}
	}

    $header = [
      'name' => $this->t('Name'),
      'rollno' => $this->t('Role No'),
      'email' => $this->t('Email'),
      'rollno' => $this->t('Role No'),
      'userid' => $this->t('User Id'),
      'status' => $this->t('Status'),
    ];

    $form['table'] = [
      '#type' => 'tableselect',
      '#title' => $this->t('Users'),
      '#header' => $header,
      '#options' => $user_content,
      '#empty' => $this->t('No users found'),
    ];

	
	
	 $form['actions']['#type'] = 'actions';

    $form['actions']['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Grant Access'),
      '#button_type' => 'primary',
    );
	
	 $form['actions']['rebuild'] = [
      '#type' => 'submit',
      '#value' => 'Deny Access',
      '#submit' => ['::denayaccessFormSubmit'],
    ];


		
    return $form;
  }


  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'student_module';
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
	 
		$useraccessvalue = $form_state->getValues()['table'];
		$config = \Drupal::service('student_module.regserive')->GrantAccess('student', $useraccessvalue);

		drupal_set_message($this->t("@message", ['@message' => 'Configuration  Access Granted Successfully !!.']));

  }
  
  
      public function denayaccessFormSubmit(array &$form, FormStateInterface $form_state) {
		  
		$useraccessvalue = $form_state->getValues()['table'];
		$config = \Drupal::service('student_module.regserive')->denyaccessfun($useraccessvalue);
		
		drupal_set_message($this->t("@message", ['@message' => 'Access Denyed Successfully !!.']));
  }


  // /**
  //  * {@inheritdoc}
  //  */
  // protected function getEditableConfigNames() {
  //   return ['student_module.settings'];
  // }


}

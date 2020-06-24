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
class SubmissionConfigSettings extends FormBase {

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
    if ($form_state->getValue('name') == '' || $form_state->getValue('rollno') == '' ) {
      $msg = t('<strong>Name and Role is required!</strong>');
      $form_state->setErrorByName('form', $msg);
    }
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
	  
		$current_user = \Drupal::currentUser();
		$user = \Drupal\user\Entity\User::load($current_user->id());


		$user_id = $current_user->id();
		$user_name = $current_user->getUserName();
	
	  
	  // User Name
    $form['name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('name'),
	  '#default_value' => $this->t($user_name),
      '#size' => 60,
      '#maxlength' => 128,
      '#description' => $this->t('name'),
	  '#required' => True,
	  '#disabled' => TRUE,
    ];
		
	// Email
    $form['rollno'] = [
      '#type' => 'textfield',
      '#title' => $this->t('rollno'),
      '#delta' => 2,
      '#description' => $this->t('Roll No'),
	  '#required' => True,
    ];
	
	 $form['userid'] = $user_id;
	
	// Email
    $form['email'] = [
      '#type' => 'email',
      '#title' => $this->t('Email'),
      '#delta' => 2,
      '#description' => $this->t('Email'),
    ];
	
	
	 $form['actions']['#type'] = 'actions';

    $form['actions']['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Save'),
      '#button_type' => 'primary',
    );


		
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

	$current_user = \Drupal::currentUser();
	$user = \Drupal\user\Entity\User::load($current_user->id());

	$user_id = $current_user->id();
	$user_name = $current_user->getUserName();
	$formdata['name'] = $user_name;
	$formdata['rollno'] = $form_state->getValues()['rollno'];
	$formdata['email'] = $form_state->getValues()['email'];
	$formdata['userid'] = $user_id;
	$formdata['status'] = 'Pending';

	$config = \Drupal::service('student_module.regserive')->registervalue($formdata);
	$config =  \Drupal::service('config.factory')->getEditable('student_module.settings');
	$configvalues = $config->get();
	
    drupal_set_message($this->t("@message", ['@message' => 'Configuration Your Request Sent Successfully ']));
	
  }

  // /**
  //  * {@inheritdoc}
  //  */
  // protected function getEditableConfigNames() {
  //   return ['student_module.settings'];
  // }


}

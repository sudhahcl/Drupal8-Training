<?php

namespace Drupal\submission_module\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Form\drupal_set_message;
use Drupal\Core\Entity\t;

/**
 * Class Configuration Setting.
 *
 * @package Drupal\submission_module\Form
 */
class SubmissionConfigSettings extends FormBase {

  /**
   * {@inheritdoc}
   */
  // public static function create(ContainerInterface $container) {
  //   return new static(
  //       $container->get('submission_module.settings')
  //   );
  // }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    // valiodate form values
    if ($form_state->getValue('username') == '' || $form_state->getValue('email') == '' || $form_state->getValue('password') == '') {
      $msg = t('<strong>Username and Email and Password is required!</strong>');
      $form_state->setErrorByName('form', $msg);
    }
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
	  
	  
	  

	  
	  
	  // User Name
    $form['username'] = [
      '#type' => 'textfield',
      '#title' => $this->t('username'),
      '#size' => 60,
      '#maxlength' => 128,
      '#description' => $this->t('User Name'),
	  '#required' => True,
    ];
		
	// Email
    $form['email'] = [
      '#type' => 'email',
      '#title' => $this->t('email'),
      '#delta' => 2,
      '#description' => $this->t('Email'),
	  '#required' => True,
    ];
	
	// Email
    $form['password'] = [
      '#type' => 'password',
      '#title' => $this->t('password'),
      '#delta' => 2,
      '#description' => $this->t('Password'),
	  '#required' => True,
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
    return 'submission_module';
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

	
	$formdata['username'] = $form_state->getValues()['username'];
	$formdata['email'] = $form_state->getValues()['email'];
	$formdata['password'] = $form_state->getValues()['password'];

	$config = \Drupal::service('submission_module.regserive')->registervalue($formdata);
	$config =  \Drupal::service('config.factory')->getEditable('submission_module.settings');
	$configvalues = $config->get();
	
    drupal_set_message($this->t("@message", ['@message' => 'Configuration Inserted Successfully ']));
	
  }

  // /**
  //  * {@inheritdoc}
  //  */
  // protected function getEditableConfigNames() {
  //   return ['submission_module.settings'];
  // }


}

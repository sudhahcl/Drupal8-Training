<?php

namespace Drupal\form_api_module\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Form\drupal_set_message;
use Drupal\Core\Entity\t;

/**
 * Class Configuration Setting.
 *
 * @package Drupal\form_api_module\Form 
 */
class FormAPIElements extends FormBase {

  /**
   * {@inheritdoc}
   */
  // public static function create(ContainerInterface $container) {
  //   return new static(
  //       $container->get('form_api_module.settings')
  //   );
  // }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    // valiodate form values
    if ($form_state->getValue('username') == '' || $form_state->getValue('email') == '') {
      $msg = t('<strong>Username and Email both are required!</strong>');
      $form_state->setErrorByName('form', $msg);
    }
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
	  
	  
	  // Text Example.
    $form['text'] = [
      '#type' => 'textfield',
      '#title' => $this->t('text'),
      '#size' => 60,
      '#maxlength' => 128,
      '#description' => $this->t('Text Field'),
    ];
	
	
	// Select Box.
    $form['SelectBox'] = [
      '#type' => 'weight',
      '#title' => $this->t('SelectBox'),
      '#delta' => 2,
      '#description' => $this->t('Select Box'),
    ];
	
	 // Textarea.
    $form['textara'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Text Area'),
      '#description' => $this->t('Textarea'),
    ];
	
	
	// File.
    $form['file'] = [
      '#type' => 'file',
      '#title' => 'File',
      '#description' => $this->t('File'),
    ];
	
	  
	    // Details.
    $form['details'] = [
      '#type' => 'details',
      '#title' => $this->t('Details'),
      '#description' => $this->t('Details Value Test'),
    ]; 
	
	
	 // Phone.
    $form['phone'] = [
      '#type' => 'tel',
      '#title' => $this->t('Phone'),
      '#description' => $this->t('Phone Number value'),
    ];
	
	
	 // Manage file.
    $form['managed_file'] = [
      '#type' => 'managed_file',
      '#title' => 'Managed file',
      '#description' => $this->t('Manage file Example'),
    ];
	
	
    // Search.
    $form['search'] = [
      '#type' => 'search',
      '#title' => $this->t('Search'),
      '#description' => $this->t('Search Field'),
    ];
	
	
	 // Select.
    $form['favorite'] = [
      '#type' => 'select',
      '#title' => $this->t('Please Select Name'),
      '#options' => [
        'Hari' => $this->t('Hari'),
        'Prasath' => $this->t('Prasath'),
        'Dinesh' => $this->t('Dinesh'),
      ],
      '#empty_option' => $this->t('-select-'),
      '#description' => $this->t('Select Field'),
    ];
	
	
	
	 // Multiple values option elements.
    $form['select_multiple'] = [
      '#type' => 'select',
      '#title' => 'Select (multiple)',
      '#multiple' => TRUE,
      '#options' => [
        'HCL' => 'HCL',
        'TCS' => 'TCS',
        'CTS' => 'CTS',
      ],
      '#default_value' => ['HCL'],
      '#description' => 'Select Multiple Value in Form' ,
    ];
	
	
	// Text format.
    $form['text_format'] = [
      '#type' => 'text_format',
      '#title' => 'Text Format',
      '#format' => 'plain_text',
      '#expected_value' => [
        'value' => 'Text value',
        'format' => 'plain_text',
      ],
      '#textformat_value' => [
        'value' => 'Testvalue',
        'format' => 'filtered_html',
      ],
      '#description' => $this->t('Text format'),
    ];
	
	
	  // Number.
    $form['quantity'] = [
      '#type' => 'number',
      '#title' => $this->t('Quantity'),
      '#description' => $this->t('Number, #type = number'),
    ];

    // Password.
    $form['password'] = [
      '#type' => 'password',
      '#title' => $this->t('Password'),
      '#description' => 'Password',
    ];

    // Password Confirm.
    $form['password_confirm'] = [
      '#type' => 'password_confirm',
      '#title' => $this->t('Confirm Passoword'),
      '#description' => $this->t('Confirm Passowd'),
    ];
	
	    // URL.
    $form['url'] = [
      '#type' => 'url',
      '#title' => $this->t('URL'),
      '#maxlength' => 255,
      '#size' => 30,
      '#description' => $this->t('URL'),
    ];
	
	// Email.
    $form['email'] = [
      '#type' => 'email',
      '#title' => $this->t('Email'),
      '#description' => $this->t('Email'),
    ];
	
	
	    // Date.
    $form['expiration'] = [
      '#type' => 'date',
      '#title' => $this->t('Date'),
      '#default_value' => ['year' => 2020, 'month' => 2, 'day' => 15],
      '#description' => 'Date',
    ];

    // Date-time.
    $form['datetime'] = [
      '#type' => 'datetime',
      '#title' => 'Date Time',
      '#date_increment' => 1,
      '#date_timezone' => drupal_get_user_timezone(),
      '#default_value' => drupal_get_user_timezone(),
      '#description' => $this->t('Date time'),
    ];
	
	// CheckBoxes.
    $form['tests_taken'] = [
      '#type' => 'checkboxes',
      '#options' => ['HCL' => $this->t('HCL'), 'TCS' => $this->t('TCS')],
      '#title' => $this->t('Test'),
      '#description' => 'Checkboxes test',
    ];
	
	
	
	// Table value.
    $options = [
      1 => ['country_name' => 'India', 'code' => 'IND'],
      2 => ['country_name' => 'China', 'code' => 'CHN'],
      3 => ['country_name' => 'United States', 'code' => 'US'],
    ];

    $header = [
      'country_name' => $this->t('Country Name'),
      'code' => $this->t('Country Code'),
    ];

    $form['table'] = [
      '#type' => 'tableselect',
      '#title' => $this->t('Country Details'),
      '#header' => $header,
      '#options' => $options,
      '#empty' => $this->t('No users found'),
    ];
	
	 $form['vechile'] = [
      '#title' => $this->t('Ajax Wheels Example '),
      '#type' => 'select',
      '#options' => $this->getwheelscount(),
      '#empty_option' => $this->t('- Select a  vechile -'),
      '#ajax' => [
        'callback' => '::vehiclewheels',
        'wrapper' => 'wheels-wrapper',
      ],
    ];
	
	
	$form['wheels_wrapper'] = [
      '#type' => 'container',
      '#attributes' => ['id' => 'wheels-wrapper'],
    ];


    $vechile = $form_state->getValue('vechile');
    if (!empty($vechile)) {
      $form['wheels_wrapper']['wheels'] = [
        '#type' => 'select',
        '#title' => $this->t('color'),
        '#options' => $this->getwheelsbasedonvechile($vechile),
      ];
    }

		
    return $form;
  }
  
  
    public function vehiclewheels(array $form, FormStateInterface $form_state) {
    return $form['wheels_wrapper'];
  }
  
  
    protected function getwheelsbasedonvechile($vechile) {
    return $this->getwheels()[$vechile]['wheels'];
  }
  
  
    protected function getwheelscount() {
    return array_map(function ($color_data) {
      return $color_data['name'];
    }, $this->getwheels());
  }

  /**
   * Returns an array of wheels grouped by color vechile.
   *
   * @return array
   *   An associative array of color data, keyed by color vechile.
   */
  protected function getwheels() {
    return [
      'Bike' => [
        'name' => $this->t('Bike'),
        'wheels' => [
          '2wheeler' => $this->t('2wheeler'),
          '4wheeler' => $this->t('4wheeler'),
          '8wheeler' => $this->t('8wheeler'),
        ],
      ],
      'car' => [
        'name' => $this->t('car'),
        'wheels' => [
          '4wheeler' => $this->t('4wheeler'),
          '2wheeler' => $this->t('2wheeler'),
          '8wheeler' => $this->t('8wheeler'),
        ],
      ],
      'lorry' => [
        'name' => $this->t('lorry'),
        'wheels' => [
          '8wheeler' => $this->t('8wheeler'),
		  '2wheeler' => $this->t('2wheeler'),
          '4wheeler' => $this->t('4wheeler'),
        ],
      ],
    ];
  }


  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'form_api_module';
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    
    //$config = \Drupal::config('form_api_module.settings')->getEditable();
    $config = \Drupal::service('config.factory')->getEditable('form_api_module.settings');
    $config->set('user.name', $form_state->getValue('username'));
    $config->set('user.email', $form_state->getValue('email'));
    $config->save();

    drupal_set_message($this->t("@message", ['@message' => 'Configuration Successfully Updated.']));
  }

  // /**
  //  * {@inheritdoc}
  //  */
  // protected function getEditableConfigNames() {
  //   return ['form_api_module.settings'];
  // }


}

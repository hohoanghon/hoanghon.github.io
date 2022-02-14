<?php

namespace Drupal\example_user_register\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Database\Database;
use Drupal\Core\Url;
use Drupal\Core\Routing;

/**
 * Provides the form for adding countries.
 */
class UserRegisterForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'user_register_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {


    
    $form['name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Ho ten'),
      '#required' => TRUE,
      '#maxlength' => 20,
      '#default_value' =>  '',
    ];
	 $form['phone'] = [
      '#type' => 'textfield',
      '#title' => $this->t('So dien thoai'),
      '#required' => TRUE,
      '#maxlength' => 20,
      '#default_value' =>  '',
    ];
    $form['email'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Email'),
      // '#required' => TRUE,
      '#maxlength' => 100,
      '#default_value' => '',
    ];
    // $a = array('male'=>'male');
	$form['age'] = [
      '#type' => 'select',
      '#title' => $this->t('Do tuoi'),
      // '#required' => TRUE,
      // '#maxlength' => 20,
      // '#default_value' => '',
      '#options' => array(0=>'10-20', 1=>'20-30', 2=>'30-50'),
      // '#options' =>$a,
    ];
    $form['age_1'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Nhap tuoi chinh xac'),
      // '#required' => TRUE,
      '#maxlength' => 100,
      '#default_value' => '',
    ];
    // $a = 'aaa@aaa';
    // $b = explode('@', $a);
	 $form['description'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Mo ta ban than'),
      // '#required' => TRUE,
      '#maxlength' => 200,
      '#default_value' => '',
    ];
	
    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#button_type' => 'primary',
      '#default_value' => $this->t('Save') ,
    ];
	
	//$form['#validate'][] = 'studentFormValidate';

    return $form;

  }
  
   /**
   * {@inheritdoc}
   */
  public function validateForm(array & $form, FormStateInterface $form_state) {
       $field = $form_state->getValues();
	   
		$fields["name"] = $field['name'];
		if (!$form_state->getValue('name') || empty($form_state->getValue('name'))) {
            $form_state->setErrorByName('name', $this->t('Vui long cung cap ho ten'));
        }
    if (!$form_state->getValue('phone') || empty($form_state->getValue('phone'))) {
            $form_state->setErrorByName('phone', $this->t('Vui long cung cap so dien thoai'));
        }
    $a = $form_state->getValue('email');
    $b = explode('@', $a);
        if ($b[1] != 'kyanon.digital') {
            $form_state->setErrorByName('email', $this->t('Email khong hop le. Email phai co dang *.@kyanon.digital'));
        }
		if($form_state->getValue('age_1')<18)
		{
      $form_state->setErrorByName('age_1', $this->t('Tuoi khong hop le'));
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array & $form, FormStateInterface $form_state) {
	try{
		$conn = Database::getConnection();
		
		$field = $form_state->getValues();
	   
		$fields["name"] = $field['name'];
		$fields["phone"] = $field['phone'];
    $fields["email"] = $field['email'];
		$fields["age"] = $field['age'];
    $fields["age_1"] = $field['age_1'];
		$fields["description"] = $field['description'];
		
		  $conn->insert('example_user_register')
			   ->fields($fields)->execute();
		  \Drupal::messenger()->addMessage($this->t('Dang ky nguoi dung thanh cong'));
		 
	} catch(Exception $ex){
		\Drupal::logger('example_user_register')->error($ex->getMessage());
	}
    
  }

}
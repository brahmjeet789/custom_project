<?php  
/**  
 * @file  
 * Contains Drupal\custom_project\Form\SiteLocationForm.  
 */  
namespace Drupal\custom_project\Form;  
use Drupal\Core\Form\ConfigFormBase;  
use Drupal\Core\Form\FormStateInterface;  
  
class SiteLocationForm extends ConfigFormBase {  
  /**  
   * function to get configuration Name 
   */  
  protected function getEditableConfigNames() {  
    return [  
      'custom_project.adminsettings',  
    ];  
  }  
  
/**  
  * function to return form 
  */  
  public function getFormId() {  
    return 'site_location_form';  
  }  

/**  
  * function to build the configuration form for site location wise time  
  */  
  public function buildForm(array $form, FormStateInterface $form_state) {  
    $config = $this->config('custom_project.adminsettings');  
  
    $form['country'] = [  
      '#type' => 'textfield',  
      '#title' => $this->t('Country'),  
      '#description' => $this->t('Enter your country name here'), 
    ];  
    $form['city'] = [
      '#type' => 'textfield',
      '#title' => $this->t('City'),
      '#description' => $this->t('Enter your city'),
    ];
    $form['timezone'] = [
      '#title' => t('Timezone'),
      '#type' => 'select',
      '#description' => 'Select the desired pizza crust size.',
      '#options' => array('None' => t('--- SELECT ---'),'America/Chicago' => t('America/Chicago'),'America/New_York' => t('America/New_York'),'Asia/Tokyo' => t('Asia/Tokyo'),'Asia/Dubai' => t('Asia/Dubai'),'Asia/Kolkata' => t('Asia/Kolkata'),'Europe/Amsterdam' => t('Europe/Amsterdam'),'Europe/Oslo' => t('Europe/Oslo'),'Europe/London' => t('Europe/London')),
      '#default_value' => $config->get('timezone'),
    ];
    return parent::buildForm($form, $form_state);  
  }

/**
  * submit handler for site location form 
  */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config('custom_project.adminsettings')
      ->set('timezone', $form_state->getValue('timezone'))
      ->save();
  }
 }

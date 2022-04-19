<?php

namespace Drupal\custom_project;

use Drupal\Core\Config\ConfigFactory;

/**
 * Class CustomService
 * @package Drupal\custom_project\Services
 */
class CustomService {
  /**
  * Configuration Factory.
  *
  * @var \Drupal\Core\Config\ConfigFactory
  */

  protected $configFactory;

  /**
   * CustomService constructor.
   * @param ConfigFactory $configFactory
   */
  public function __construct(ConfigFactory $configFactory) {
    $this->configFactory = $configFactory;
  }


  /**
   * @return \Drupal\Component\Render\MarkupInterface|string
   */
  public function getTime() {
    $timezone = $this->configFactory->get('custom_project.adminsettings')->get('timezone');
    date_default_timezone_set($timezone);
    $date= 'The Current loation is ' .$timezone .' and the current time '. date('dS M Y - g:i A') ;
    return $date;
  }
}

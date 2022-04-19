<?php

namespace Drupal\custom_project\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormBuilderInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
/**
 * Provides a 'TimeLocationBase' Block.
 *
 * @Block(
 *   id = "time_location_block",
 *   admin_label = @Translation("Time Location block"),
 * )
 */

class TimeLocationBlock extends BlockBase implements ContainerFactoryPluginInterface {
  protected $formBuilder;

  public function __construct(array $configuration, $plugin_id, $plugin_definition, $formBuilder) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->formBuilder = $formBuilder;
  }

  /**
   * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
   * @param array $configuration
   * @param string $plugin_id
   * @param mixed $plugin_definition
   *
   * @return static
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('form_builder')
    );
  }
  
  /**
   * {@inheritdoc}
   */
  public function build() {
    $callService = \Drupal::service('custom_project.custom_services');
    $renderable = [
      '#theme' => 'time_location_block',
      '#data' => $callService->getTime(),
    ];
    return $renderable;
  }
  
  /**
   * @return int
   */
  public function getCacheMaxAge() {
    return 0;
  }
}


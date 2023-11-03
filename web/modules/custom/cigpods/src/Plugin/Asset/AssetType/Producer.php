<?php

namespace Drupal\cigpods\Plugin\Asset\AssetType;

use Drupal\farm_entity\Plugin\Asset\AssetType\FarmAssetType;
use Drupal\farm_field\FarmFieldFactory;

/**
 * Provides the Producer asset type.
 *
 * @AssetType(
 * id = "producer",
 * label = @Translation("Producer"),
 * )
 */
class Producer extends FarmAssetType {

  /**
   * {@inheritdoc}
   */
  public function buildFieldDefinitions() {
    $fields = parent::buildFieldDefinitions();

    $field_info = [
      'project' => [
        'label' => 'Project',
        'type' => 'entity_reference',
        'target_type' => 'asset',
        'target_bundle' => 'project',
        'required' => TRUE,
        'multiple' => TRUE,
      ],
      'award' => [
        'label' => 'Award',
        'type' => 'entity_reference',
        'target_type' => 'asset',
        'target_bundle' => 'award',
        'required' => TRUE,
        'multiple' => TRUE,
      ],
      'field_producer_first_name' => [
        'type' => 'string',
        'label' => 'Producer First Name',
        'description' => '',
        'required' => TRUE,
      ],
      'field_producer_last_name' => [
        'type' => 'string',
        'label' => 'Producer Last Name',
        'description' => '',
        'required' => TRUE,
      ],
      'field_producer_headquarter' => [
        'type' => 'string',
        'label' => 'Producer Headquarter',
        'description' => '',
        'required' => FALSE,
      ],
    ];

    $farmFieldFactory = new FarmFieldFactory();
    foreach ($field_info as $name => $info) {

      $fields[$name] = $farmFieldFactory->bundleFieldDefinition($info)
        ->setDisplayConfigurable('form', TRUE)
        ->setDisplayConfigurable('view', TRUE);
    }

    return $fields;

  }

}

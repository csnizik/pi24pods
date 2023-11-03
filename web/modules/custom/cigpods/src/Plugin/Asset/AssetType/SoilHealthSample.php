<?php

namespace Drupal\cigpods\Plugin\Asset\AssetType;

use Drupal\farm_entity\Plugin\Asset\AssetType\FarmAssetType;
use Drupal\farm_field\FarmFieldFactory;

/**
 * Provides the Soil Health Sample asset type.
 *
 * @AssetType(
 * id = "soil_health_sample",
 * label = @Translation("Soil Health Sample"),
 * )
 */
class SoilHealthSample extends FarmAssetType {

  /**
   * {@inheritdoc}
   */
  public function buildFieldDefinitions() {

    $fields = parent::buildFieldDefinitions();

    $field_info = [
      'field_diameter' => [
        'type' => 'fraction',
        'label' => 'Soil Sample Diameter',
        'required' => FALSE,
        'multiple' => FALSE,
      ],
      'field_equipment_used' => [
        'label' => 'Soil Sample Equipment',
        'type' => 'entity_reference',
        'target_type' => 'taxonomy_term',
        'target_bundle' => 'd_equipment',
        'required' => FALSE,
        'multiple' => FALSE,
      ],
      'field_plant_stage_at_sampling' => [
        'label' => 'Soil Sample Plant Stage',
        'type' => 'entity_reference',
        'target_type' => 'taxonomy_term',
        'target_bundle' => 'd_plant_stage',
        'required' => FALSE,
        'multiple' => FALSE,
      ],
      'field_sampling_depth' => [
        'type' => 'fraction',
        'label' => 'Soil Sample Sampleing Depth',
        'required' => FALSE,
        'multiple' => FALSE,
      ],
      'shmu' => [
        'type'  => 'entity_reference',
        'label' => 'Soil Health Management Unit',
        'description' => $this->t('Soil Sample SHMU ID'),
        'target_type' => 'asset',
        'target_bundle' => 'soil_health_management_unit',
        'required' => TRUE,
        'multiple' => FALSE,
      ],
      'field_soil_sample_collection_dat' => [
        'label' => 'Date Sample was collected',
        'type' => 'timestamp',
        'required' => FALSE,
        'description' => '',
      ],
      'field_soil_sample_geofield' => [
        'label' => 'Geofield',
        'type' => 'geofield',
        'required' => FALSE,
        'description' => '',
      ],
      'award' => [
        'label' => 'Award',
        'type' => 'entity_reference',
        'target_type' => 'asset',
        'target_bundle' => 'award',
        'required' => TRUE,
        'multiple' => TRUE,
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

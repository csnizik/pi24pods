<?php

namespace Drupal\cigpods\Plugin\Log\LogType;

use Drupal\farm_entity\Plugin\Log\LogType\FarmLogType;
use Drupal\farm_field\FarmFieldFactory;

/**
 * Provides the Waste Treatment log type.
 *
 * @LogType(
 * id = "csc_waste_treatment",
 * label = @Translation("Waste Treatment"),
 * )
 */
class WasteTreatment extends FarmLogType {

  /**
   * {@inheritdoc}
   */
  public function buildFieldDefinitions() {

    $fields = parent::buildFieldDefinitions();

    $field_info = [
      'csc_project_id' => [
        'type' => 'entity_reference',
        'label' => 'Project ID',
        'description' => 'Project ID',
        'target_type' => 'asset',
        'target_bundle' => 'csc_project_summary',
        'required' => TRUE,
        'multiple' => FALSE,
      ],
      'csc_field_id' => [
        'type' => 'entity_reference',
        'label' => 'Field ID',
        'description' => 'Field ID',
		    'target_type' => 'asset',
		    'target_bundle' => 'csc_field_enrollment',
        'required' => TRUE,
        'multiple' => FALSE,
      ],
      'csc_p629_treatment_type' => [
        'type' => 'list_string',
        'label' => 'Waste Treatment Treatment Type',
        'description' => 'Waste Treatment Treatment Type',
		    'allowed_values' => [
          'Biological' => t(string: 'Biological'),
          'Chemical' => t(string: 'Chemical'),
          'Mechanical' => t(string: 'Mechanical'),
        ],
        'required' => FALSE,
        'multiple' => FALSE,
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

<?php

namespace Drupal\cigpods\Plugin\Log\LogType;

use Drupal\farm_entity\Plugin\Log\LogType\FarmLogType;
use Drupal\farm_field\FarmFieldFactory;

/**
 * Provides the Range Planting log type.
 *
 * @LogType(
 * id = "csc_range_planting",
 * label = @Translation("Range Planting Log"),
 * )
 */
class RangePlanting extends FarmLogType {

  /**
   * {@inheritdoc}
   */
  public function buildFieldDefinitions() {

    $fields = parent::buildFieldDefinitions();

    $field_info = [
        'csc_p550_species_category' => [
            'type' => 'list_string',
            'label' => 'Supplemental Data 550 Species category',
            'description' => 'Supplemental Data 550 Species category',
                'allowed_values' => [
              'Forbs' => t(string: 'Forbs'),
              'Grasses' => t(string: 'Grasses'),
              'Legumes' => t(string: 'Legumes'),
              'Shrubs' => t(string: 'Shrubs'),
              'Trees' => t(string: 'Trees'),
            ],
            'required' => FALSE,
            'multiple' => FALSE,
          ],
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

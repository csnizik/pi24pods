<?php

namespace Drupal\cigpods\Plugin\Asset\AssetType;

use Drupal\farm_entity\Plugin\Asset\AssetType\FarmAssetType;
use Drupal\farm_field\FarmFieldFactory;

/**
 * Provides the LabTestingProfile asset type.
 *
 * @AssetType(
 * id = "lab_testing_profile",
 * label = @Translation("Lab Testing Profile"),
 * )
 */
class LabTestingProfile extends FarmAssetType {

  /**
   * {@inheritdoc}
   */
  public function buildFieldDefinitions() {
    $fields = parent::buildFieldDefinitions();

    // We do not add a "Name" field because we inherit that from the
    // FarmAssetType class.
    $field_info = [
      'ph_method' => [
        'type'  => 'entity_reference',
        'label' => 'PH method',
        'target_type' => 'taxonomy_term',
        'target_bundle' => 'd_ph_method',
        'handler' => 'default',
        'required' => FALSE,
        'multiple' => FALSE,
          // Lower weight shows up first in form.
        'weight' => [
          'form' => 10,
          'view' => 10,
        ],
        'form_display_options' => [
          'label' => 'inline',
          'type' => 'options_select',
        ],
      ],
      'electroconductivity_method' => [
        'type'  => 'entity_reference',
        'label' => 'Electroconductivity Method',
        'target_type' => 'taxonomy_term',
        'target_bundle' => 'd_ec_method',
        'handler' => 'default',
        'required' => FALSE,
        'multiple' => FALSE,
          // Lower weight shows up first in form.
        'weight' => [
          'form' => 11,
          'view' => 11,
        ],
        'form_display_options' => [
          'label' => 'inline',
          'type' => 'options_select',
        ],
      ],
      'nitrate_n_method' => [
        'type'  => 'entity_reference',
        'label' => 'Nitrate-N Method',
        'target_type' => 'taxonomy_term',
        'target_bundle' => 'd_nitrate_n_method',
        'handler' => 'default',
        'required' => FALSE,
        'multiple' => FALSE,
          // Lower weight shows up first in form.
        'weight' => [
          'form' => 12,
          'view' => 12,
        ],
        'form_display_options' => [
          'label' => 'inline',
          'type' => 'options_select',
        ],
      ],
      'phosphorus_method' => [
        'type'  => 'entity_reference',
        'label' => 'Phosphorus Method',
        'target_type' => 'taxonomy_term',
        'target_bundle' => 'd_soil_health_extraction',
        'handler' => 'default',
        'required' => FALSE,
        'multiple' => FALSE,
          // Lower weight shows up first in form.
        'weight' => [
          'form' => 13,
          'view' => 13,
        ],
        'form_display_options' => [
          'label' => 'inline',
          'type' => 'options_select',
        ],
      ],
      'potassium_method' => [
        'type'  => 'entity_reference',
        'label' => 'Potassium Method',
        'target_type' => 'taxonomy_term',
        'target_bundle' => 'd_soil_health_extraction',
        'handler' => 'default',
        'required' => FALSE,
        'multiple' => FALSE,
          // Lower weight shows up first in form.
        'weight' => [
          'form' => 14,
          'view' => 14,
        ],
        'form_display_options' => [
          'label' => 'inline',
          'type' => 'options_select',
        ],
      ],
      'calcium_method' => [
        'type'  => 'entity_reference',
        'label' => 'Calcium Method',
        'target_type' => 'taxonomy_term',
        'target_bundle' => 'd_soil_health_extraction',
        'handler' => 'default',
        'required' => FALSE,
        'multiple' => FALSE,
          // Lower weight shows up first in form.
        'weight' => [
          'form' => 15,
          'view' => 15,
        ],
        'form_display_options' => [
          'label' => 'inline',
          'type' => 'options_select',
        ],
      ],
      'magnesium_method' => [
        'type'  => 'entity_reference',
        'label' => 'Magnesium Method',
        'target_type' => 'taxonomy_term',
        'target_bundle' => 'd_soil_health_extraction',
        'handler' => 'default',
        'required' => FALSE,
        'multiple' => FALSE,
          // Lower weight shows up first in form.
        'weight' => [
          'form' => 16,
          'view' => 16,
        ],
        'form_display_options' => [
          'label' => 'inline',
          'type' => 'options_select',
        ],
      ],
      'sulfur_method' => [
        'type'  => 'entity_reference',
        'label' => 'Sulfur Method',
        'target_type' => 'taxonomy_term',
        'target_bundle' => 'd_soil_health_extraction',
        'handler' => 'default',
        'required' => FALSE,
        'multiple' => FALSE,
          // Lower weight shows up first in form.
        'weight' => [
          'form' => 17,
          'view' => 17,
        ],
        'form_display_options' => [
          'label' => 'inline',
          'type' => 'options_select',
        ],
      ],
      'iron_method' => [
        'type'  => 'entity_reference',
        'label' => 'Iron Method',
        'target_type' => 'taxonomy_term',
        'target_bundle' => 'd_soil_health_extraction',
        'handler' => 'default',
        'required' => FALSE,
        'multiple' => FALSE,
          // Lower weight shows up first in form.
        'weight' => [
          'form' => 18,
          'view' => 18,
        ],
        'form_display_options' => [
          'label' => 'inline',
          'type' => 'options_select',
        ],
      ],
      'manganese_method' => [
        'type'  => 'entity_reference',
        'label' => 'Magnanese Method',
        'target_type' => 'taxonomy_term',
        'target_bundle' => 'd_soil_health_extraction',
        'handler' => 'default',
        'required' => FALSE,
        'multiple' => FALSE,
          // Lower weight shows up first in form.
        'weight' => [
          'form' => 19,
          'view' => 19,
        ],
        'form_display_options' => [
          'label' => 'inline',
          'type' => 'options_select',
        ],
      ],
      'copper_method' => [
        'type'  => 'entity_reference',
        'label' => 'Copper Method',
        'target_type' => 'taxonomy_term',
        'target_bundle' => 'd_soil_health_extraction',
        'handler' => 'default',
        'required' => FALSE,
        'multiple' => FALSE,
          // Lower weight shows up first in form.
        'weight' => [
          'form' => 20,
          'view' => 20,
        ],
        'form_display_options' => [
          'label' => 'inline',
          'type' => 'options_select',
        ],
      ],
      'zinc_method' => [
        'type'  => 'entity_reference',
        'label' => 'Zinc Method',
        'target_type' => 'taxonomy_term',
        'target_bundle' => 'd_soil_health_extraction',
        'handler' => 'default',
        'required' => FALSE,
        'multiple' => FALSE,
          // Lower weight shows up first in form.
        'weight' => [
          'form' => 21,
          'view' => 21,
        ],
        'form_display_options' => [
          'label' => 'inline',
          'type' => 'options_select',
        ],
      ],
      'boron_method' => [
        'type'  => 'entity_reference',
        'label' => 'Boron Method',
        'target_type' => 'taxonomy_term',
        'target_bundle' => 'd_soil_health_extraction',
        'handler' => 'default',
        'required' => FALSE,
        'multiple' => FALSE,
          // Lower weight shows up first in form.
        'weight' => [
          'form' => 22,
          'view' => 22,
        ],
        'form_display_options' => [
          'label' => 'inline',
          'type' => 'options_select',
        ],
      ],
      'aluminum_method' => [
        'type'  => 'entity_reference',
        'label' => 'Aluminum Method',
        'target_type' => 'taxonomy_term',
        'target_bundle' => 'd_soil_health_extraction',
        'handler' => 'default',
        'required' => FALSE,
        'multiple' => FALSE,
          // Lower weight shows up first in form.
        'weight' => [
          'form' => 23,
          'view' => 23,
        ],
        'form_display_options' => [
          'label' => 'inline',
          'type' => 'options_select',
        ],
      ],
      'molybdenum_method' => [
        'type'  => 'entity_reference',
        'label' => 'Molybdenum Method',
        'target_type' => 'taxonomy_term',
        'target_bundle' => 'd_soil_health_extraction',
        'handler' => 'default',
        'required' => FALSE,
        'multiple' => FALSE,
          // Lower weight shows up first in form.
        'weight' => [
          'form' => 24,
          'view' => 24,
        ],
        'form_display_options' => [
          'label' => 'inline',
          'type' => 'options_select',
        ],
      ],
      'field_profile_laboratory' => [
        'type' => 'entity_reference',
        'label' => 'Profile Laboratory',
        'target_type' => 'taxonomy_term',
        'target_bundle' => 'd_laboratory',
        'handler' => 'default',
        'required' => FALSE,
        'multiple' => FALSE,
      ],
      'field_profile_aggregate_stability_method' => [
        'type' => 'entity_reference',
        'label' => 'Aggregate Stability Method',
        'target_type' => 'taxonomy_term',
        'target_bundle' => 'd_aggregate_stability_me',
        'required' => FALSE,
        'multiple' => FALSE,
      ],
      'field_profile_aggregate_stability_unit' => [
        'type' => 'entity_reference',
        'label' => 'Aggregate Stability Unit',
        'target_type' => 'taxonomy_term',
        'target_bundle' => 'd_aggregate_stability_un',
        'required' => FALSE,
        'multiple' => FALSE,
      ],
      'field_profile_respiratory_incubation_days' => [
        'type' => 'entity_reference',
        'label' => 'Days in Respiratory Incubation',
        'target_type' => 'taxonomy_term',
        'target_bundle' => 'd_respiration_incubation',
        'required' => FALSE,
        'multiple' => FALSE,
      ],
      'field_profile_respiration_detection_method' => [
        'type' => 'entity_reference',
        'label' => 'Days in Respiratory Detection',
        'target_type' => 'taxonomy_term',
        'target_bundle' => 'd_respiration_detection_',
        'required' => FALSE,
        'multiple' => FALSE,
      ],
      'project' => [
        'label' => 'Project',
        'type' => 'entity_reference',
        'target_type' => 'asset',
        'target_bundle' => 'project',
        'required' => TRUE,
        'multiple' => TRUE,
      ],
      'field_lab_profile_infiltration_method' => [
        'type'  => 'entity_reference',
        'label' => 'Infiltration Method',
        'description' => $this->t('Lab Test Method Infiltration Method'),
        'target_type' => 'taxonomy_term',
        'target_bundle' => 'd_infiltration_method',
        'handler' => 'default',
        'required' => FALSE,
        'multiple' => FALSE,
      ],

    ];

    $farmFieldFactory = new FarmFieldFactory();

    foreach ($field_info as $name => $info) {
      // Check if it is one of the default fields that we want to disable
      // (I.e. Images)
      $fields[$name] = $farmFieldFactory->bundleFieldDefinition($info)
        ->setDisplayConfigurable('form', TRUE)
        ->setDisplayConfigurable('view', TRUE);
    }

    return $fields;
  }

}

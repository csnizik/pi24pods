<?php

namespace Drupal\cigpods\Plugin\Asset\AssetType;

use Drupal\farm_field\FarmFieldFactory;

use Drupal\farm_entity\Plugin\Asset\AssetType\FarmAssetType;

/**
 * Provides the CIG Project asset type.
 *
 * @AssetType(
 * id = "range_assessment",
 * label = @Translation("Range Assessment"),
 * )
 */
class RangeAssessment extends FarmAssetType {

  /**
   * {@inheritdoc}
   */
  public function buildFieldDefinitions() {
    $fields = parent::buildFieldDefinitions();

    // Note that $fields['name'] is already populated at this point.
    $field_info = [
      'shmu' => [
        'label' => 'Soil Health Management Unit',
        'type' => 'entity_reference',
        'target_type' => 'asset',
        'target_bundle' => 'soil_health_management_unit',
        'required' => TRUE,
        'description' => '',
      ],
      'range_assessment_date' => [
        'label' => 'Date',
        'type' => 'timestamp',
        'required' => TRUE,
        'description' => '',
      ],
      'range_assessment_rills' => [
        'label' => 'Rills',
        'type' => 'string',
        'required' => FALSE,
        'description' => '',

      ],
      'range_assessment_water_flow' => [
        'label' => 'Water Flow Patterns',
        'type' => 'string',
        'required' => FALSE,
        'description' => '',

      ],
      'range_assessment_pedestals' => [
        'label' => 'Pedetals and/or Terracettes',
        'type' => 'string',
        'required' => FALSE,
        'description' => '',

      ],
      'range_assessment_bare_ground' => [
        'label' => 'Bare Ground',
        'type' => 'string',
        'required' => FALSE,
        'description' => '',
      ],
      'range_assessment_gullies' => [
        'label' => 'Gullies',
        'type' => 'string',
        'required' => FALSE,
        'description' => '',
      ],
      'range_assessment_wind_scoured' => [
        'label' => 'Wind-Scoured and/or Depositional Areas',
        'type' => 'string',
        'required' => FALSE,
        'description' => '',
      ],
      'range_assessment_litter_movement' => [
        'label' => 'Litter Movement',
        'type' => 'string',
        'required' => FALSE,
        'description' => '',
      ],
      'range_assessment_soil_surface_resistance' => [
        'label' => 'Soil Surface Resistance to Erosion',
        'type' => 'string',
        'required' => FALSE,
        'description' => '',
      ],
      'range_assessment_soil_surface_loss' => [
        'label' => 'Soil Surface Loss and Degradation',
        'type' => 'string',
        'required' => FALSE,
        'description' => '',
      ],
      'range_assessment_effects_of_plants' => [
        'label' => 'Effects of Plant Community Composition and Distribution on Infiltration',
        'type' => 'string',
        'required' => FALSE,
        'description' => '',
      ],
      'range_assessment_compaction_layer' => [
        'label' => 'Compaction Layer',
        'type' => 'string',
        'required' => FALSE,
        'description' => '',
      ],
      'range_assessment_functional_structural' => [
        'label' => 'Functional/Structural Groups',
        'type' => 'string',
        'required' => FALSE,
        'description' => '',
      ],
      'range_assessment_dead_plants' => [
        'label' => 'Dead or Dying Plants or Plant Parts',
        'type' => 'string',
        'required' => FALSE,
        'description' => '',
      ],
      'range_assessment_litter_cover' => [
        'label' => 'Litter Cover and Depth',
        'type' => 'string',
        'required' => FALSE,
        'description' => '',
      ],
      'range_assessment_annual_production' => [
        'label' => 'Annual Production',
        'type' => 'string',
        'required' => FALSE,
        'description' => '',
      ],
      'range_assessment_invasive_plants' => [
        'label' => 'Invasive Plants Vigor',
        'type' => 'string',
        'required' => FALSE,
        'description' => '',
      ],
      'range_assessment_rc_soil_site_stability' => [
        'label' => 'Soil/Site Stability',
        'type' => 'string',
        'required' => FALSE,
        'description' => '',
      ],
      'range_assessment_rc_hydrologic_function' => [
        'label' => 'Hydrologic Function',
        'type' => 'string',
        'required' => FALSE,
        'description' => '',

      ],
      'range_assessment_rc_biotic_integrity' => [
        'label' => 'Biotic Integrity',
        'type' => 'string',
        'required' => FALSE,
        'description' => '',

      ],
      'range_assessment_vigor_plants' => [
        'label' => 'Rangeland Vigor Plants',
        'type' => 'string',
        'required' => FALSE,
        'description' => '',

      ],
      'range_assessment_rc_soil_site_stability_justification' => [
        'type' => 'string_long',
        'label' => 'Soil and Site Stability Assessment Justification',
        'required' => FALSE,
        'multiple' => FALSE,
        'settings' => [
          'max_length' => 1000,
          'size' => 60,
        ],
        'form_display_options' => [
          'label' => 'inline',
        ],
      ],
      'range_assessment_rc_hydrologic_function_justification' => [
        'type' => 'string_long',
        'label' => 'Hydrologic Assessment Justification',
        'required' => FALSE,
        'multiple' => FALSE,
        'settings' => [
          'max_length' => 1000,
          'size' => 60,
        ],
        'form_display_options' => [
          'label' => 'inline',
        ],
      ],
      'range_assessment_rc_biotic_integrity_justification' => [
        'type' => 'string_long',
        'label' => 'Biotic Integrity Assessment Justification',
        'required' => FALSE,
        'multiple' => FALSE,
        'settings' => [
          'max_length' => 1000,
          'size' => 60,
        ],
        'form_display_options' => [
          'label' => 'inline',
        ],
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

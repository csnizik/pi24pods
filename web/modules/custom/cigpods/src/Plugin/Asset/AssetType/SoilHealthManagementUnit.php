<?php

namespace Drupal\cigpods\Plugin\Asset\AssetType;

use Drupal\farm_entity\Plugin\Asset\AssetType\FarmAssetType;
use Drupal\farm_field\FarmFieldFactory;

/**
 * Provides the Soil Health Management Unit asset type.
 *
 * @AssetType(
 * id = "soil_health_management_unit",
 * label = @Translation("Soil Health Management Unit"),
 * )
 */
class SoilHealthManagementUnit extends FarmAssetType {

  /**
   * {@inheritdoc}
   */
  public function buildFieldDefinitions() {
    $fields = parent::buildFieldDefinitions();

    $field_info = [
      'field_shmu_involved_producer' => [
        'label' => 'Producer',
        'type' => 'entity_reference',
        'target_type' => 'asset',
        'target_bundle' => 'producer',
        'required' => FALSE,
        'description' => '',
      ],
      'field_shmu_type' => [
        'label' => 'Soil Health Management Unit (SHMU) Type',
        'type' => 'entity_reference',
        'target_type' => 'taxonomy_term',
        'target_bundle' => 'd_shmu_type',
        'required' => FALSE,
        'description' => '',

      ],
      'field_shmu_replicate_number' => [
        'label' => 'Replicate Number',
        'type' => 'fraction',
        'required' => FALSE,
        'description' => '',

      ],
      'field_shmu_treatment_narrative' => [
        'label' => 'Treatment Narrative',
        'type' => 'string',
        'required' => FALSE,
        'description' => '',
      ],
      'field_shmu_experimental_design' => [
        'label' => 'Experimental Design',
        'type' => 'entity_reference',
        'target_type' => 'taxonomy_term',
        'target_bundle' => 'd_experimental_design',
        'required' => FALSE,
        'description' => '',

      ],
      'field_shmu_experimental_duration_month' => [
        'label' => 'Experimental Duration Month',
        'type' => 'fraction',
        'required' => FALSE,
        'description' => '',
      ],
      'field_shmu_experimental_duration_year' => [
        'label' => 'Experimental Duration Year',
        'type' => 'fraction',
        'required' => FALSE,
        'description' => '',
      ],
      'field_shmu_experimental_frequency_day' => [
        'label' => 'Experimental Frequency Day',
        'type' => 'fraction',
        'required' => FALSE,
        'description' => '',
      ],
      'field_shmu_experimental_frequency_month' => [
        'label' => 'Experimental Frequency Month',
        'type' => 'fraction',
        'required' => FALSE,
        'description' => '',
      ],
      'field_shmu_experimental_frequency_year' => [
        'label' => 'Experimental Frequency Year',
        'type' => 'fraction',
        'required' => FALSE,
        'description' => '',
      ],
      'field_shmu_latitude' => [
        'label' => 'Latitude',
        'type' => 'fraction',
        'required' => FALSE,
        'description' => '',
      ],
      'field_shmu_longitude' => [
        'label' => 'Longitude',
        'type' => 'fraction',
        'required' => FALSE,
        'description' => '',
      ],
      'field_geofield' => [
        'label' => 'Geofield',
        'type' => 'geofield',
        'required' => FALSE,
        'description' => '',
      ],

      'field_shmu_map_unit_symbol' => [
        'label' => 'Map Unit Symbol',
        'type' => 'string_long',
        'required' => FALSE,
        'description' => '',
      ],

      'field_shmu_surface_texture' => [
        'label' => 'Surface Texture',
        'type' => 'string_long',
        'required' => FALSE,
        'description' => '',
      ],

      'field_shmu_prev_land_use' => [
        'label' => 'Previous Land Use',
        'type' => 'entity_reference',
        'target_type' => 'taxonomy_term',
        'target_bundle' => 'd_land_use',
        'required' => FALSE,
        'description' => '',
      ],
      'field_shmu_prev_land_use_modifiers' => [
        'label' => 'Previous Land Use Modifiers(s)',
        'type' => 'entity_reference',
        'target_type' => 'taxonomy_term',
        'target_bundle' => 'd_land_use_modifiers',
        'required' => FALSE,
        'multiple' => TRUE,
        'description' => '',
      ],
      'field_shmu_date_land_use_changed' => [
        'label' => 'Date Land Use Changed',
        'type' => 'timestamp',
        'required' => FALSE,
        'description' => '',
      ],
      'field_shmu_current_land_use' => [
        'label' => 'Current Land Use',
        'type' => 'entity_reference',
        'target_type' => 'taxonomy_term',
        'target_bundle' => 'd_land_use',
        'required' => FALSE,
        'description' => '',

      ],
      'field_shmu_current_land_use_modifiers' => [
        'label' => 'Current Land Use Modifier(s)',
        'type' => 'entity_reference',
        'target_type' => 'taxonomy_term',
        'target_bundle' => 'd_land_use_modifiers',
        'required' => FALSE,
        'multiple' => TRUE,
        'description' => '',
      ],
      'field_shmu_crop_rotation_sequence' => [
        'label' => 'Crop Rotation Sequence',
        'type' => 'entity_reference',
        'target_type' => 'asset',
        'target_bundle' => 'shmu_crop_rotation',
        'required' => FALSE,
        'multiple' => TRUE,
        'description' => '',
      ],
      'field_current_tillage_system' => [
        'label' => 'Current Tillage System',
        'type' => 'entity_reference',
        'target_type' => 'taxonomy_term',
        'target_bundle' => 'd_tillage_system',
        'required' => FALSE,
        'description' => '',

      ],
      'field_years_in_current_tillage_system' => [
        'label' => 'Years in Current Tillage System',
        'type' => 'fraction',
        'required' => FALSE,
        'description' => '',
      ],
      'field_shmu_previous_tillage_system' => [
        'label' => 'Previous Tillage system',
        'type' => 'entity_reference',
        'target_type' => 'taxonomy_term',
        'target_bundle' => 'd_tillage_system',
        'required' => FALSE,
        'description' => '',
      ],
      'field_years_in_prev_tillage_system' => [
        'label' => 'Years in Previous Tillage System',
        'type' => 'fraction',
        'required' => FALSE,
        'description' => '',
      ],
      'field_shmu_major_resource_concern' => [
        'label' => 'Other Major Resource Concerns',
        'type' => 'entity_reference',
        'target_type' => 'taxonomy_term',
        'target_bundle' => 'd_major_resource_concern',
        'required' => FALSE,
        'multiple' => TRUE,
        'description' => '',
      ],
      'field_shmu_resource_concern' => [
        'label' => 'Other Major Resource Concerns',
        'type' => 'entity_reference',
        'target_type' => 'taxonomy_term',
        'target_bundle' => 'd_major_resource_concern',
        'required' => FALSE,
        'multiple' => TRUE,
        'description' => '',
      ],

      'field_shmu_practices_addressed' => [
        'label' => 'Practices Addressed',
        'type' => 'entity_reference',
        'target_type' => 'taxonomy_term',
        'target_bundle' => 'd_practice',
        'required' => FALSE,
        'multiple' => TRUE,
        'description' => '',
      ],

      'field_shmu_initial_crops_planted' => [
        'label' => 'SHMU initial crops planted',
        'type' => 'entity_reference',
        'target_type' => 'taxonomy_term',
        'target_bundle' => 'd_cover_crop',
        'required' => FALSE,
        'multiple' => TRUE,
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
      // Check if it is one of the default fields that we want to disable
      // (I.e. Images)
      $fields[$name] = $farmFieldFactory->bundleFieldDefinition($info)
        ->setDisplayConfigurable('form', TRUE)
        ->setDisplayConfigurable('view', TRUE);
    }

    return $fields;
  }

}

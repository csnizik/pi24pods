<?php

namespace Drupal\cig_pods_csc\Plugin\Log\LogType;

use Drupal\farm_entity\Plugin\Log\LogType\FarmLogType;
use Drupal\farm_field\FarmFieldFactory;

/**
 * Provides the Field Summary log type.
 *
 * @LogType(
 * id = "csc_field_summary",
 * label = @Translation("FieldSummary"),
 * )
 */
class FieldSummary extends FarmLogType {

  /**
   * {@inheritdoc}
   */
  public function buildFieldDefinitions() {

    $fields = parent::buildFieldDefinitions();

    $field_info = [
      'csc_f_summary_fiscal_year' => [
        'type' => 'string',
        'label' => 'Federal Fiscal Year of report submission',
        'description' => 'Federal Fiscal Year of report submission',
        'required' => TRUE,
        'multiple' => FALSE,
      ],
      'csc_f_summary_fiscal_quarter' => [
        'type' => 'string',
        'label' => 'Federal Fiscal Quarter of report submission',
        'description' => 'Federal Fiscal Quarter of report submission',
        'required' => TRUE,
        'multiple' => FALSE,
      ],
      'csc_f_summary_field_id' => [
        'type' => 'entity_reference',
        'label' => 'Field ID',
        'description' => 'Field ID',
		    'target_type' => 'asset',
		    'target_bundle' => 'csc_field_enrollment',
        'required' => TRUE,
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
      'csc_f_summary_commodity_type' => [
        'type' => 'entity_reference',
        'label' => 'Field Summary Commodity Type',
        'description' => 'Field Summary Commodity Type',
		    'target_type' => 'taxonomy_term',
		    'target_bundle' => 'commodity_term', 
        'required' => TRUE,
        'multiple' => FALSE,
      ],
      'csc_f_summary_practice_type' => [
        'type' => 'entity_reference',
        'label' => 'Practice Type',
        'description' => 'Practice Type',
		    'target_type' => 'taxonomy_term',
		    'target_bundle' => 'practice_type',
        'required' => TRUE,
        'multiple' => TRUE,
      ],
      'csc_fi_summ_date_pract_complete' => [
        'type' => 'timestamp',
        'label' => 'Date Practice Complete',
        'description' => 'Date Practice Complete',
        'required' => TRUE,
        'multiple' => FALSE,
      ],
      'csc_f_summary_contract_end_date' => [
        'type' => 'timestamp',
        'label' => 'Contract End Date',
        'description' => 'Contract End Date',
        'required' => TRUE,
        'multiple' => FALSE,
      ],
      'csc_fi_summ_mmrv_ast_prv' => [
        'type' => 'list_string',
        'label' => 'MMRV assistance provided',
        'description' => 'MMRV assistance provided',
		    'allowed_values' => [
          'Yes' => t(string: 'Yes'),
          'No' => t(string: 'No'),
          "I don't know" => t(string: "I don't Know"),
        ],
        'required' => TRUE,
        'multiple' => FALSE,
      ],
      'csc_fi_summ_marketing_ast_prv' => [
        'type' => 'list_string',
        'label' => 'Marketing assistance provided',
        'description' => 'Marketing assistance provided',
        'allowed_values' => [
          'Yes' => t(string: 'Yes'),
          'No' => t(string: 'No'),
          "I don't know" => t(string: "I don't Know"),
        ],
        'required' => TRUE,
        'multiple' => FALSE,
      ],
      'csc_fi_summ_inc_per_acre_or_hd' => [
        'type' => 'list_string',
        'label' => 'Incentive per acre or head',
        'description' => 'Incentive per acre or head',
        'allowed_values' => [
          'Yes' => t(string: 'Yes'),
          'No' => t(string: 'No'),
          "I don't know" => t(string: "I don't Know"),
        ],
        'required' => TRUE,
        'multiple' => FALSE,
      ],
      'csc_fi_summ_fld_comm_value' => [
        'type' => 'fraction',
        'label' => 'Field Commodity Value',
        'description' => 'Field Commodity Value',
        'required' => TRUE,
        'multiple' => FALSE,
      ],
      'csc_fi_summ_fld_comm_vol' => [
        'type' => 'fraction',
        'label' => 'Field Commodity Volume',
        'description' => 'Field Commodity Volume',
        'required' => TRUE,
        'multiple' => FALSE,
      ],
      'csc_fi_summ_fld_comm_vol_ut' => [
        'type' => 'entity_reference',
        'label' => 'Field Commodity Volume Unit',
        'description' => 'Field Commodity Volume unit',
		    'target_type' => 'taxonomy_term',
        'target_bundle' => 'field_commodity_volume_unit',
        'required' => TRUE,
        'multiple' => FALSE,
      ],
      'csc_fi_summ_fld_comm_vol_ut_otr' => [
        'type' => 'string',
        'label' => 'Other Field Commodity Volume Unit',
        'description' => 'Other Field Commodity Volume Unit',
        'required' => TRUE,
        'multiple' => FALSE,
      ],
      'csc_fi_summ_impl_cost' => [
        'type' => 'fraction',
        'label' => 'Cost of Implementation',
        'description' => 'Cost of Implementation',
        'required' => TRUE,
        'multiple' => FALSE,
      ],
      'csc_fi_summ_impl_cost_ut' => [
        'type' => 'entity_reference',
        'label' => 'Cost of Implementation Unit',
        'description' => 'Cost of Implementation Unit',
		    'target_type' => 'taxonomy_term',
        'target_bundle' => 'cost_unit',
        'required' => TRUE,
        'multiple' => FALSE,
      ],
      'csc_fi_summ_impl_cost_ut_otr' => [
        'type' => 'string',
        'label' => 'Other Cost Unit',
        'description' => 'Other Cost Unit',
        'required' => TRUE,
        'multiple' => FALSE,
      ],
      'csc_fi_summ_impl_cost_coverage' => [
        'type' => 'fraction',
        'label' => 'Cost Coverage',
        'description' => 'Cost Coverage',
        'required' => TRUE,
        'multiple' => FALSE,
      ],
      'csc_fi_summ_fld_ghg_monitor' => [
        'type' => 'entity_reference',
        'label' => 'Field GHG Monitoring',
        'description' => 'Field GHG Monitoring',
        'target_type' => 'taxonomy_term',
        'target_bundle' => 'field_ghg_monitoring',
        'required' => TRUE,
        'multiple' => TRUE,
      ],
      'csc_fi_summ_fld_ghg_monitor_otr' => [
        'type' => 'string',
        'label' => 'Other Field GHG monitoring',
        'description' => 'Other Field GHG monitoring',
        'required' => TRUE,
        'multiple' => FALSE,
      ],
      'csc_fi_summ_fld_ghg_report' => [
        'type' => 'entity_reference',
        'label' => 'Field GHG reporting',
        'description' => 'Field GHG reporting',
        'target_type' => 'taxonomy_term',
        'target_bundle' => 'field_ghg_reporting',
        'required' => TRUE,
        'multiple' => TRUE,
      ],
      'csc_fi_summ_fld_ghg_report_otr' => [
        'type' => 'string',
        'label' => 'Other Field GHG reporting',
        'description' => 'Other Field GHG reporting',
        'required' => TRUE,
        'multiple' => FALSE,
      ],
	    'csc_fi_summ_fld_ghg_verifi' => [
        'type' => 'entity_reference',
        'label' => 'Field GHG verification',
        'description' => 'Field GHG verification',
        'target_type' => 'taxonomy_term',
        'target_bundle' => 'field_ghg_verification',
        'required' => TRUE,
        'multiple' => TRUE,
      ],
      'csc_fi_summ_fld_ghg_verifi_otr' => [
        'type' => 'string',
        'label' => 'Other Field GHG verification',
        'description' => 'Other Field GHG verification',
        'required' => TRUE,
        'multiple' => FALSE,
      ],
	    'csc_fi_summ_fld_ghg_calc' => [
        'type' => 'list_string',
        'label' => 'Field GHG calculations',
        'description' => 'Field GHG calculations',
        'allowed_values' => [
          'Models' => t(string: 'Models'),
          'Direct physical measurements' => t(string: 'Direct physical measurements'),
          'Both' => t(string: 'Both'),
        ],
        'required' => TRUE,
        'multiple' => FALSE,
      ],
	    'csc_fi_summ_fld_ofc_ghg_calc' => [
        'type' => 'list_string',
        'label' => 'Field Official GHG verification',
        'description' => 'Field Official GHG verification',
        'allowed_values' => [
          'Models' => t(string: 'Models'),
          'Direct physical measurements' => t(string: 'Direct physical measurements'),
        ],
        'required' => TRUE,
        'multiple' => FALSE,
      ],
	    'csc_fi_summ_fld_ghg_emission_rd' => [
        'type' => 'fraction',
        'label' => 'Field Official GHG ER',
        'description' => 'Field Official GHG ER',
        'required' => TRUE,
        'multiple' => FALSE,
      ],
	    'csc_fi_summ_fld_co2_stock' => [
        'type' => 'fraction',
        'label' => 'Field Official Carbon Stock',
        'description' => 'Field Official Carbon Stock',
        'required' => TRUE,
        'multiple' => FALSE,
      ],
	    'csc_fi_summ_fld_co2_emission_rd' => [
        'type' => 'fraction',
        'label' => 'Field Official CO2 ER',
        'description' => 'Field Official CO2 ER',
        'required' => TRUE,
        'multiple' => FALSE,
      ],
	    'csc_fi_summ_fld_ch4_emission_rd' => [
        'type' => 'fraction',
        'label' => 'Field Official CH4 ER',
        'description' => 'Field Official CH4 ER',
        'required' => TRUE,
        'multiple' => FALSE,
      ],
	    'csc_fi_summ_fld_n2o_emission_rd' => [
        'type' => 'fraction',
        'label' => 'Field Official N2O ER',
        'description' => 'Field Official N2O ER',
        'required' => TRUE,
        'multiple' => FALSE,
      ],
	    'csc_f_summary_field_offsets' => [
        'type' => 'fraction',
        'label' => 'Field Offsets produced',
        'description' => 'Field Offsets produced',
        'required' => TRUE,
        'multiple' => FALSE,
      ],
	    'csc_f_summary_field_insets' => [
        'type' => 'fraction',
        'label' => 'Field Insets produced',
        'description' => 'Field Insets produced',
        'required' => TRUE,
        'multiple' => FALSE,
      ],
	    'csc_fi_summ_fld_measurement_otr' => [
        'type' => 'list_string',
        'label' => 'Other Field measurement',
        'description' => 'Other Field measurement',
        'allowed_values' => [
          'Yes' => t(string: 'Yes'),
          'No' => t(string: 'No'),
          "I don't know" => t(string: "I don't Know"),
        ],
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
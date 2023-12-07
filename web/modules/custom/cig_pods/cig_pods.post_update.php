<?php
use Drupal\asset\Entity\Asset;
use Drupal\asset\Entity\AssetType;
use Drupal\taxonomy\Entity\Term;
/**
 * @file
 * Post update functions for CIG PODS module.
 */

/**
 * Install the select2 module if needed
 */
 function cig_pods_post_update_enable_select2(&$sandbox = NULL) {
  if (!\Drupal::service('module_handler')->moduleExists('select2')) {
  \Drupal::service('module_installer')->install(['select2']);
  }
}




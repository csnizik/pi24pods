<?php

/**
 * @file
 * Provides Views data for cigpods module.
 */

/**
 * Implements hook_views_data().
 */
function cigpods_views_data() {
  $data = [];

  // Pods project access argument.
  $data['asset']['pods_project_access'] = [
    'title' => 'PODS Project Access',
    'argument' => [
      'id' => 'pods_project_access',
    ],
  ];

  return $data;
}

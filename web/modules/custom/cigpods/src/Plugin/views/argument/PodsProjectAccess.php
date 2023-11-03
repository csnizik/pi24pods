<?php

namespace Drupal\cigpods\Plugin\views\argument;

use Drupal\cigpods\ProjectAccessControlHandler;
use Drupal\views\Plugin\views\argument\ArgumentPluginBase;

/**
 * Filter out assets that are not part of a project the user is assigned to.
 *
 * @ViewsArgument("pods_project_access")
 */
class PodsProjectAccess extends ArgumentPluginBase {

  /**
   * {@inheritdoc}
   */
  public function query($group_by = FALSE) {

    // Delegate to the helper method in ProjectAccessControlHandler.
    ProjectAccessControlHandler::viewsArgumentQueryAlter($this);
  }

}

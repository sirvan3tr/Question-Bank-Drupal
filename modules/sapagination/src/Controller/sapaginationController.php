<?php

namespace Drupal\sapagination\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * An example controller.
 */
class sapaginationController extends ControllerBase {

  /**
   * {@inheritdoc}
   */
  public function content() {
    return array(
      '#type' => 'markup',
      '#markup' => t('Hello World!'),
    );
  }

}

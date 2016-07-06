<?php

namespace Drupal\sapagination\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Entity\EntityInterface;

/**
 * An example controller.
 */
class sapaginationController extends ControllerBase {
  /**
   * {@inheritdoc}
   */
   // we submit a view to the database
  public function bug() {
    $node = entity_create('node', array(
      'type' => 'analytics',
      'title' => 'url='.htmlspecialchars($_GET['url']),
      'field_ip' => htmlspecialchars($_GET['ip']),
      'field_language' => htmlspecialchars($_GET['lang']),
      'field_agent' => htmlspecialchars($_GET['agent']),
      'field_time' => date("Y-m-d H:i:s")
    ));
    $node->save();

    return array(
      '#type' => 'markup',
      '#markup' => t('You should not be seeing this page, go away please!'),
    );
  }

  // this is to do a simple count of views
  public function count() {
    $entities = entity_load_multiple('node', array(1, 2));
    $count = 0;
    foreach($entities as $node) {
      $count = $count + 1;
    }
    return array(
      '#type' => 'markup',
      '#markup' => t('THE COUNT IS: '.$count),
    );
  }

  // main page where we view the articles
  public function pag() {
    return array(
      '#type' => 'markup',
      '#markup' => t('You should not be seeing this page, go away please!'),
    );
  }
}

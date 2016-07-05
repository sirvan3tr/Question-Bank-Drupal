<?php

namespace Drupal\sapagination\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'mainblock' block.
 *
 * @Block(
 * id = "main_block",
 * admin_label = @Translation("main block"),
 * )
 */


class mainblock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {

    return array(
        '#title' => 'we',
        '#description' => 'Lorem ipsum dolar sum amet ..'
      );
  }
}


/**
 * Theme hook
 */
function sapagination_theme($existing, $type, $theme, $path) {
  return array('sapagination' =>
    array(
      'variables' => array(
        'title' => 'Default title',
        'description' => 'a description'
      ),
      'template' => 'block--mainblock'
    )
  );
}

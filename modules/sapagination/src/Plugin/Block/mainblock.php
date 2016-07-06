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
    $markup = '<script type="text/javascript"> var userIP = "'.$_SERVER['REMOTE_ADDR'].'", path = "'.$GLOBALS['base_url'].'"</script>';
    return array(
      'title' => 'This page is being tracked',
      '#markup' => $this->t($markup),
    );
  }
  /*
  public function build() {
    echo 'sup';
    return array(
        '#title' => $_SERVER['REMOTE_ADDR'],
        'description' => 'a description',
        'ip' => 'asdfa',
      );
  }
*/
}


/**
 * Theme hook
 */
function sapagination_theme($existing, $type, $theme, $path) {
  return array('sapagination' =>
          array(
        'variables' => array(
        'title' => 'Default title',
        'description' => 'a description',
        'ip' => 'ip address of user',
      ),
      'template' => 'block--mainblock'
    )
  );
}

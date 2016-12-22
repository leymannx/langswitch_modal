<?php
/**
 * @file
 * Contains \Drupal\langswitch_modal\Plugin\Block\LangswitchButton.
 */

namespace Drupal\langswitch_modal\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'Hello' Block
 *
 * @Block(
 *   id = "langswitch_button",
 *   admin_label = @Translation("Langswitch button"),
 * )
 */
class LangswitchButton extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return \Drupal::formBuilder()
      ->getForm('Drupal\langswitch_modal\Form\LangswitchModal');
  }

}

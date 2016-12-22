<?php

/**
 * @file
 * Contains \Drupal\langswitch_modal\Form\LangswitchModal.
 */

namespace Drupal\langswitch_modal\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\OpenModalDialogCommand;

/**
 * Class LangswitchModal.
 *
 * @package Drupal\langswitch_modal\Form
 */
class LangswitchModal extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'langswitch_modal';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['#attached']['library'][] = 'core/drupal.dialog.ajax';

    $form['actions']['#type']  = 'actions';
    $form['actions']['submit'] = [
      '#type'  => 'submit',
      '#value' => $this->t('Switch language'),
      '#ajax'  => [
        'callback' => '::open_modal',
      ],
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

  }

  public function open_modal(&$form, FormStateInterface $form_state) {

    $block_manager = \Drupal::service('plugin.manager.block');
    $config        = [];
    $plugin_block  = $block_manager->createInstance('language_block:language_interface', $config);
    $render        = $plugin_block->build();

    $title   = $this->t('Choose language');
    $content = $render;
    $options = [
      'dialogClass' => 'popup-dialog-class',
      'width'       => '300',
      'height'      => '300',
    ];

    $response = new AjaxResponse();
    $response->addCommand(new OpenModalDialogCommand($title, $content, $options));

    return $response;
  }

}

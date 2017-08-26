<?php

namespace Drupal\node_visitor\Controller;

/**
 * @file
 * Contains \Drupal\node_orders\Controller\Page.
 */
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\node\Entity\Node;

/**
 * Controller routines for page example routes.
 */
class ConditionalFields extends ControllerBase {

  /**
   * Page Callback.
   */
  public static function init(&$form, FormStateInterface $form_state) {
    $form['field_visitor_group']['widget']['#ajax'] = [
      'callback' => 'Drupal\node_visitor\Controller\ConditionalFields::ajaxCallback',
      'wrapper' => 'edit-field-visitor-ref-activity-wrapper',
      'event' => 'change',
    ];
  }

  /**
   * AJAX Responce.
   */
  public static function ajaxCallback(array &$form, FormStateInterface $form_state) {
    $options = [];
    $tid = $form_state->getValue('field_visitor_group')[0]['target_id'];
    if ($tid > 0) {
      $query = \Drupal::entityQuery('node')
        ->condition('status', 1)
        ->condition('type', 'activity')
        ->condition('field_activity_group', $tid);
      $ids = $query->execute();
      if (!empty($ids)) {
        foreach (Node::loadMultiple($ids) as $nid => $node) {
          $options[$nid] = $node->title->value;
        }
      }
    }
    $id = 'edit-field-visitor-ref-activity-wrapper';
    $form['field_visitor_ref_activity']['#prefix'] = "<div id='$id'>";
    $form['field_visitor_ref_activity']['#suffix'] = "</div>";
    $form['field_visitor_ref_activity']['widget']['#options'] = $options;
    return $form['field_visitor_ref_activity'];
  }

}

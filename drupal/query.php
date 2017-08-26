<?php
use Drupal\node\Entity\Node;

// Nodes.
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

// Tids.
$query = \Drupal::entityQuery('taxonomy_term');
  ->condition('vid', 'project_type');
  ->condition('field_key', $tx_type);
$tids = $query->execute();

// Old.
$query = \Drupal::entityQuery('node');
$query->condition('status', 1);
$query->condition('type', 'payment');
$query->condition('field_payment_ref_orders', $nids, 'IN');
$entity_ids = $query->execute();
$payments = Node::loadMultiple($entity_ids);
return $payments;

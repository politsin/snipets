<?php
use Drupal\node\Entity\Node;
use Drupal\taxonomy\Entity\Term;

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
$types = Term::loadMultiple($tids);

// Query.
public static function query(string $type, int $id = 0) {
  $account = FALSE;
  $query = \Drupal::entityQuery('billing_account')
    ->condition('status', 1)
    ->sort('created', 'ASC')
    ->condition('entity_type', $type)
    ->condition('entity_id', $id)
    ->range(0, 1);
  $ids = $query->execute();
  if (!empty($ids)) {
    $account_id = array_shift($ids);
    $account = \Drupal::entityManager()->getStorage('billing_account')->load($account_id);
  }
  return $account;
}

// Old.
$query = \Drupal::entityQuery('node');
$query->condition('status', 1);
$query->condition('type', 'payment');
$query->condition('field_payment_ref_orders', $nids, 'IN');
$entity_ids = $query->execute();
$payments = Node::loadMultiple($entity_ids);
return $payments;

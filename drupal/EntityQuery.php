<?php
use Drupal\node\Entity\Node;
use Drupal\taxonomy\Entity\Term;

/**
 * Query.
 */
public static function query($entity_type = 'cml') {
  $entities = [];
  $storage = \Drupal::entityManager()->getStorage($entity_type);
  $query = \Drupal::entityQuery($entity_type)
    ->condition('status', 1)
    ->sort('created', 'ASC')
    ->condition('field_status', ['new'], 'IN')
    ->condition('field_file', 'NULL', '!=')
    ->condition('field_project.entity.field_project_tx_type', $value)
    ->sort('created', 'ASC')
    ->range(0, 100);
  $ids = $query->execute();
  if (!empty($ids)) {
    foreach ($storage->loadMultiple($ids) as $id => $entity) {
      $entities[$id] = $entity;
    }
  }
  return $entities;
}

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

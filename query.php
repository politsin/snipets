<?php

$query = \Drupal::entityQuery('node');
$query->condition('status', 1);
$query->condition('type', 'payment');
$query->condition('field_payment_ref_orders', $nids, 'IN');
$entity_ids = $query->execute();
$payments = Node::loadMultiple($entity_ids);
return $payments;

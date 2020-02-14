<?php
use Drupal\node\Entity\Node;
use Drupal\taxonomy\Entity\Term;

use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Entity\EntityRepositoryInterface;

  /**
   * The cml storage.
   *
   * @var \Drupal\Core\Entity\EntityStorageInterface
   */
  protected $cmlStorage;

  /**
   * The entity repository.
   *
   * @var \Drupal\Core\Entity\EntityRepositoryInterface
   */
  protected $entityRepository;

  /**
   * Constructs a new CheckAuth object.
   *
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   Entity Manager service.
   * @param \Drupal\Core\Entity\EntityRepositoryInterface $entity_repository
   *   Entity Repository service.
   */
  public function __construct(
    EntityTypeManagerInterface $entity_type_manager,
    EntityRepositoryInterface $entity_repository
  ) {
    $this->cmlStorage = $entity_type_manager->getStorage('cml');
    $this->entityRepository = $entity_repository;
  }

/** ******************************/
// Storage из EntityTypeManager.
$query = $this->cmlStorage->getQuery()
      ->condition('status', 1)
      ->sort('created', $sort);
$ids = $query->execute();
if (!empty($ids)) {
  foreach ($this->cmlStorage->loadMultiple($ids) as $id => $entity) {
    $entities[$id] = $entity;
  }
}

$cml = $this->cmlStorage->create([
      'name' => "name",
])->save();
// loadEntityByUuid.
$cml = $this->entityRepository->loadEntityByUuid('cml', $cookie);


/**
 * Construct.
 */
public function __construct() {
  $entity_type = 'node';
  $this->storage = \Drupal::entityTypeManager()->getStorage($entity_type);
}

/**
 * Query.
 */
public function query() {
  $entities = [];
  $query = $this->storage->getQuery()
    ->condition('status', 1)
    ->sort('created', 'ASC')
    ->range(0, 100);
  $ids = $query->execute();
  if (!empty($ids)) {
    foreach ($this->storage->loadMultiple($ids) as $id => $entity) {
      $entities[$id] = $entity;
    }
  }
  return $entities;
}


/**
 * Query.
 */
public static function query($entity_type = 'cml') {
  $entities = [];
  $storage = \Drupal::service('entity_type.manager')->getStorage($entity_type);
  $storage = \Drupal::entityTypeManager()->getStorage($entity_type);
  $query = \Drupal::entityQuery($entity_type)
    ->condition('status', 1)
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

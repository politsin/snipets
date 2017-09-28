<?php

namespace Drupal\cmlmigrations\Controller;

/**
 * FeedsToMigration.
 * $op = \Drupal\cmlmigrations\Controller\FeedsToMigration::tovar();
 */
class FeedsToMigration {

  /**
   * Import.
   */
  public static function tovar($table = 'node__feeds_item') {
    $fields = [
      'entity_id',
      'feeds_item_guid',
      'feeds_item_imported',
      'feeds_item_hash',
    ];
    $query = \Drupal::database()->select('node__feeds_item', 'term_feeds');
    $query->fields('term_feeds', $fields);
    $result = $query->execute();
    $output = [];
    $k = 0;
    while ($row = $result->fetchAssoc()) {
      $term_migrated = [
        'source_ids_hash' => $row['feeds_item_hash'],
        'sourceid1' => $row['feeds_item_guid'],
        'destid1' => $row['entity_id'],
        'source_row_status' => 1,
        'rollback_action' => 0,
        'last_imported' => 0,
        'hash' => "",
      ];
      $output[$k] = $term_migrated;
      $k++;
      $hash = hash('sha256', serialize(array_map('strval', [$row['feeds_item_guid']])));
      // Insert the record to table.
      \Drupal::database()->insert('migrate_map_cmlmigrations_node_tovar')
        ->fields([
          'source_ids_hash',
          'sourceid1',
          'destid1',
          'source_row_status',
          'rollback_action',
          'last_imported',
          'hash',
        ])
        ->values(array(
          $hash,
          $row['feeds_item_guid'],
          $row['entity_id'],
          0,
          0,
          0,
          "",
        ))
        ->execute();
    }
    dsm($output);
  }

  /**
   * Import.
   */
  public static function catalog($table = 'taxonomy_term__feeds_item') {
    $fields = [
      'entity_id',
      'feeds_item_guid',
      'feeds_item_imported',
      'feeds_item_hash',
    ];
    $query = \Drupal::database()->select('taxonomy_term__feeds_item', 'term_feeds');
    $query->fields('term_feeds', $fields);
    $result = $query->execute();
    $output = [];
    $k = 0;
    while ($row = $result->fetchAssoc()) {
      $term_migrated = [
        'source_ids_hash' => '000896898ece907c3060eaf4de38c66321fef17cf3a713e143e446d4cef08a2f',
        'sourceid1' => $row['feeds_item_guid'],
        'destid1' => $row['entity_id'],
        'source_row_status' => 1,
        'rollback_action' => 0,
        'last_imported' => 0,
        'hash' => "",
      ];
      $output[$k] = $term_migrated;
      $k++;
      $hash = hash('sha256', serialize(array_map('strval', [$row['feeds_item_guid']])));
      // Insert the record to table.
      \Drupal::database()->insert('migrate_map_cmlmigrations_taxonomy_catalog')
        ->fields([
          'source_ids_hash',
          'sourceid1',
          'destid1',
          'source_row_status',
          'rollback_action',
          'last_imported',
          'hash',
        ])
        ->values(array(
          $hash,
          $row['feeds_item_guid'],
          $row['entity_id'],
          0,
          0,
          0,
          "",
        ))
        ->execute();
    }
    dsm($output);
  }

}

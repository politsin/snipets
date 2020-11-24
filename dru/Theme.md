# Вывод данных в шаблоны

## Вывод блока
```php
<?
function adaptive_preprocess_node(&$variables) {
  if ($variables['view_mode'] == 'full') {
    $node = $variables['node'];
    if ($node->getType() == 'service') {
      $bid = 'block_office_map_adaptive';
      $block = Block::load($bid);
      $render = \Drupal::entityTypeManager()
        ->getViewBuilder('block')
        ->view($block);
      $variables['office_map_block'] = $render;
    }
  }
}
```

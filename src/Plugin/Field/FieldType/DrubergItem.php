<?php

namespace Drupal\druberg\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\TypedData\DataDefinition;

/**
 * Plugin implementation of the 'field_example_rgb' field type.
 *
 * @FieldType(
 *   id = "field_druberg",
 *   label = @Translation("Druberg Master"),
 *   description = @Translation("Like Gutenberg, but Drupal."),
 *   module = "druberg",
 *   default_widget = "field_druberg",
 *   default_formatter = "field_druberg"
 * )
 */
class DrubergItem extends FieldItemBase {

  /**
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition) {
    $fields = [
      'elementtype',
      'heading_value',
      'paragraph_value',
      'heading_setting_alignment',
      'paragraph_setting_alignment',
      'heading_setting_float',
      'paragraph_setting_float',
      'heading_setting_type'
    ];

    $columns = [];

    foreach ($fields as $field) {
      $columns[$field] = [
        'type' => 'text',
        'not null' => FALSE,
      ];
    }

    return [
      'columns' => $columns
    ];
  }

  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    $fields = [
      'elementtype',
      'heading_value',
      'paragraph_value',
      'heading_setting_alignment',
      'paragraph_setting_alignment',
      'heading_setting_float',
      'paragraph_setting_float',
      'heading_setting_type'
    ];

    foreach ($fields as $field) {
      $properties[$field] = DataDefinition::create('string');
    }

    return $properties;
  }
}

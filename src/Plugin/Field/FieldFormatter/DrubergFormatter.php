<?php

namespace Drupal\druberg\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;

/**
 *
 * @FieldFormatter(
 *   id = "field_druberg",
 *   field_types = {
 *     "text"
 *   }
 * )
 */
class DrubergFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function settingsSummary() {
    $summary = [];
    $settings = $this->getSettings();


    return $summary;
  }

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $element = [];

    foreach ($items as $delta => $item) {
      // Render each element as markup.
      $element[$delta] = [
        '#value' => $item->value,
        '#theme' => 'druberg',
      ];
    }

    return $element;
  }
}

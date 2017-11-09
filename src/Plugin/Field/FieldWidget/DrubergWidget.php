<?php

namespace Drupal\druberg\Plugin\Field\FieldWidget;


use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 *
 * @FieldWidget(
 *   id = "field_druberg",
 *   module = "druberg",
 *   field_types = {
 *     "string"
 *   }
 * )
 */
class DrubergWidget extends WidgetBase {
  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $_float = [
      '#type' => 'radios',
      '#options' => [
        'left' => t('< 50%'),
        'none' => t('100%'),
        'right' => t('50% >'),
      ],
      '#default_value' => 'left',
      '#attributes' => [
        'data-twig-suggestion' => 'druberg'
      ]
    ];

    $_text_alignment = [
      '#type' => 'radios',
      '#options' => [
        'left' => t('Left'),
        'center' => t('Center'),
        'right' => t('Right'),
      ],
      '#default_value' => 'left',
      '#attributes' => [
        'data-twig-suggestion' => 'druberg'
      ]

    ];

    $_text_value = [
      '#type' => 'textarea',
      '#module' => 'druberg',
      '#default_value' => '',
      '#attributes' => [
        'data-twig-suggestion' => 'druberg',
        'class' => ['js-druberg-element-value']
      ]
    ];

    $element += [
      '#type' => 'container',
      '#tree' => TRUE,
      '#element_validate' => [
        [static::class, 'validate'],
      ],
      '#module' => 'druberg',
      '#attributes' => [
        'data-twig-suggestion' => 'druberg',
        'class' => ['js-druberg-master']
      ]
    ];

    $element['element-type'] = [
      '#type' => 'select',
      '#title' => t('Element type'),
      '#options' => [
        'heading' => t('Heading'),
        'paragraph' => t('Paragraph'),
      ],
      '#default_value' => 'heading',
      '#attributes' => [
        'data-twig-suggestion' => 'druberg'
      ]
    ];

    $element['heading']['setting']['heading-setting_type'] = [
      '#type' => 'radios',
      '#title' => t('Heading setting - type'),
      '#module' => 'druberg',
      '#options' => [
        'h1' => t('Heading 1 (H1)'),
        'h2' => t('Heading 2 (H2)'),
        'h3' => t('Heading 3 (H3)'),
        'h4' => t('Heading 4 (H4)'),
      ],
      '#default_value' => 'h1',
      '#attributes' => [
        'data-twig-suggestion' => 'druberg'
      ]
    ];

    $element['heading']['heading_value'] = $_text_value;
    $element['paragraph']['paragraph_value'] = $_text_value;

    $element['heading']['setting']['heading-setting_alignment'] = $_text_alignment;
    $element['paragraph']['setting']['paragraph-setting_alignment'] = $_text_alignment;

    $element['heading']['setting']['heading-setting_float'] = $_float;
    $element['paragraph']['setting']['paragraph-setting_float'] = $_float;

    $element['#attached']['library'][] = 'druberg/admin-widget';

    return ['value' => $element];
  }

  /**
   * Validate the field.
   */
  public static function validate($element, FormStateInterface $form_state) {
    dpm('validate');
  }
}

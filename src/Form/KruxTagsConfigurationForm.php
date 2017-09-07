<?php

/**
 * @file
 * Contains \Drupal\krux_tags\Form\KruxTagsConfigurationForm.
 */

namespace Drupal\krux_tags\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Render\Element;

class KruxTagsConfigurationForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'krux_tags_configuration_form';
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $config = $this->config('krux_tags.settings');

    foreach (Element::children($form) as $variable) {
      $config->set($variable, $form_state->getValue($form[$variable]['#parents']));
    }
    $config->save();

    if (method_exists($this, '_submitForm')) {
      $this->_submitForm($form, $form_state);
    }

    parent::submitForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['krux_tags.settings'];
  }

  public function buildForm(array $form, \Drupal\Core\Form\FormStateInterface $form_state) {
    $form = [];

    // Blank on install or uses default values in
    // config/install/krux_tags.settings.yml and config/schema/krux_tags.schema.yml.
    $form['krux_tags_site_name'] = [
      '#type' => 'textfield',
      '#title' => t('Krux Tags Site Name.'),
      '#description' => t('Enter your Krux Tags Site Name'),
      '#default_value' => \Drupal::config('krux_tags.settings')->get('krux_tags_site_name'),
    ];

    $form['krux_tags_data_id'] = [
      '#type' => 'textfield',
      '#title' => t('Krux Tags Data ID.'),
      '#description' => t('Enter your Krux Tags Data ID.'),
      '#default_value' => \Drupal::config('krux_tags.settings')->get('krux_tags_data_id'),
    ];

    $form['krux_tags_script_uri'] = [
      '#type' => 'textfield',
      '#title' => t('Krux Tags Script URI.'),
      '#description' => t('Enter your Krux Tags Script URI,<br>e.g: //cdn.krxd.net/controltag/asdfhjkl.js'),
      '#default_value' => \Drupal::config('krux_tags.settings')->get('krux_tags_script_uri'),
    ];

    return parent::buildForm($form, $form_state);
  }

}
?>

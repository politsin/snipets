<?php
$f = 'Drupal\app\Form';
$extra = [];
$build['features'] = \Drupal::formBuilder()->getForm("{$f}\Form", $extra);
?>

```yaml
app.settings:
  path: '/admin/config/system/app'
  defaults:
    _form: '\Drupal\app\Form\Settings'
    _title: 'App Settings'
  requirements:
    _permission: 'administer site configuration'
```
<?php
namespace Drupal\app\Form;
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
class Settings extends ConfigFormBase {
    /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'app_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['app.settings'];
  }
  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('app.settings');
    $form['general'] = [
      '#type' => 'details',
      '#title' => $this->t('General settings'),
      '#open' => TRUE,
    ];
    $form['general']['foo'] = [
      '#title' => $this->t('Foo'),
      '#default_value' => $config->get('foo'),
      '#type' => 'textfield',
      '#description' => '',
    ];
  }
  
  /**
   * Implements a form submit handler.
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $config = $this->config('app.settings');
    $config
      ->set('foo', $form_state->getValue('foo'))
      ->save();
  }

}
?>

<?php

namespace Drupal\app\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\synhelper\Controller\AjaxResult;

/**
 * Implements the form controller.
 */
class Form extends FormBase {
  private $wrapper = 'app-form';

  /**
   * AJAX ajaxPrev.
   */
  public function ajaxSubmit(array &$form, $form_state) {
    $otvet = "ajax submit:\n";
    $inputs = $form_state->getValue('foo');
    $inputs = str_replace(",", "\n", $inputs);
    $data = [];
    foreach (explode("\n", $inputs) as $input) {
      if ($input = trim($input)) {
        $res = \Drupal::service('idna')->decode($input);
        $data[] = $res;
      }
    }
    return AjaxResult::ajax($this->wrapper, $otvet, $data);
  }

  /**
   * Build the simple form.
   */
  public function buildForm(array $form, FormStateInterface $form_state, $extra = NULL) {
    $form_state->extra = $extra;
    $form_state->setCached(FALSE);
    $form['general'] = [
      '#type' => 'details',
      '#title' => $this->t('General settings'),
      '#open' => TRUE,
      '#suffix' => '<div id="' . $this->wrapper . '"></div>',
      'foo' => [
        '#title' => 'Foo',
        '#type' => 'textarea',
      ],
      'exec' => AjaxResult::button('::ajaxSubmit', 'Submit'),
    ];
    return $form;
  }

  /**
   * Implements a form submit handler.
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $form_state->setRebuild(TRUE);
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'app-form-id';
  }

}



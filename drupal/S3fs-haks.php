<?php

  
  // s3fs change ContentType
  // S3fsStream.php.
  public function stream_flush() {
    ...
    \Drupal::moduleHandler()->alter('s3fs_upload_params', $options[$this->protocol]);
    $options[$this->protocol]['ContentType'] = 'application/x-gzip';

    stream_context_set_option($this->context, $options);
    ...
  }


  // Allow other modules to alter the protections applied to this form.
  \Drupal::moduleHandler()->alter('honeypot_form_protections', $options, $form);

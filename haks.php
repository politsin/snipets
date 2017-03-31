<?php

  // S3fsStream.php.
  public function stream_flush() {
    ...
    \Drupal::moduleHandler()->alter('s3fs_upload_params', $options[$this->protocol]);
    $options[$this->protocol]['ContentType'] = 'application/x-gzip';

    stream_context_set_option($this->context, $options);
    ...
  }

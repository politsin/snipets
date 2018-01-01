<?php

  /**
   * Bytes Formater.
   */
  public static function mem($messg, $precision = 2) {
    $bytes = memory_get_peak_usage();
    $units = array("b", "kb", "mb", "gb", "tb");

    $bytes = max($bytes, 0);
    $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
    $pow = min($pow, count($units) - 1);

    $bytes /= (1 << (10 * $pow));

    $result = round($bytes, $precision) . " " . $units[$pow];
    dsm("$result - $messg");
  }

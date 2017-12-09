use Drupal\Component\Serialization\Json;

  /**
   * Curl.
   */
  public static function curl($url, $data, $type = POST) {
    $json = Json::encode($data);
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $json);
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
      'Content-Type: application/json',
      'Content-Length: ' . strlen($json),
    ]);
    if ($op == 'POST') {
      curl_setopt($curl, CURLOPT_POST, TRUE);
      curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
    }
    $response = curl_exec($curl);
    if ($response === FALSE) {
      $info = curl_getinfo($curl);
      curl_close($curl);
      $message = 'curl fail: ' . print_r($info, TRUE);
      \Drupal::logger('MY_MODULE')->error($message);
      return $message;
    }
    curl_close($curl);
    return JSON::decode($response);
  }

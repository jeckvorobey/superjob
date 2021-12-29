<?php

require_once './config.php';

$url_vacansies = SJ_BASE_URL_API . SJ_VERSION_API . "vacancies/?catalogues=33";
$url_cat = SJ_BASE_URL_API . SJ_VERSION_API . "catalogues/";

$headers = [
  'X-Api-App-Id:' . SJ_SECRET_KEY
];

$options = [
  CURLOPT_URL => $url_vacansies,
  CURLOPT_RETURNTRANSFER => 1,
  CURLOPT_HEADER => 1,
  CURLOPT_HTTPHEADER => $headers
];


$ch = curl_init();

curl_setopt_array($ch, $options);

$response = curl_exec($ch);

$curl_errno = curl_errno($ch);
$curl_error = curl_error($ch);

$data = json_encode($response, true);

curl_close($ch);

if ($curl_errno > 0) {
  return "cURL Error ($curl_errno): $curl_error\n";
  exit;
}

var_dump("Список вакансий SJ:\n" . $response);

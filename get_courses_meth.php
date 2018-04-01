<?php
$url = 'localhost:1234/web_connectors/api/courses/06EmILV2EeWq2A7HIftJ6w';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HTTPGET, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response_json = curl_exec($ch);
curl_close($ch);
$response=json_decode($response_json, true);
?>
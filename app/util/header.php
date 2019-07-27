<?php
 header 'Content-type: application/json';
 header 'Access-Control-Allow-Origin: *';
 $request = filter_input(INPUT_SERVER, 'REQUEST_METHOD', FILTER_SANITIZE_STRING);
 $post = json_decode(file_get_contents('php://input'));
 $result = null;
 $msg = null;
 $uuid = filter_input(INPUT_GET, 'uuid', FILTER_SANITIZE_STRING);
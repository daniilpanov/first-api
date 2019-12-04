<?php
spl_autoload_register(function ($namespace)
{
    $path = str_replace("\\", DIRECTORY_SEPARATOR, $namespace);

    require_once $path . ".php";
});

try {
    $api = new UsersApi();
    echo $api->run();
} catch (Exception $e) {
    header($_SERVER['SERVER_PROTOCOL'] . " 404 API Not Found");
    echo json_encode(array('error' => $e->getMessage()));
}
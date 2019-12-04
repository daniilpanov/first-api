<?php


namespace app\models;


abstract class Request
{
    public $url;
    public $data;
    public $http_version;
    public $protocol;
    public $request;
    public $headers;

    abstract public function getResponse();
}
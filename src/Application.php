<?php


namespace Blankqwq\FactoryCode;


use \Symfony\Component\Console\Application as BasicApplication;

class Application extends BasicApplication
{
    private $name = '快速生成代码脚手架';
    private $version = '0.1';

    public function __construct()
    {
        parent::__construct($this->name, $this->version);
    }




}
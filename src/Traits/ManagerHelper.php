<?php


namespace Blankqwq\FactoryCode\Traits;


use Blankqwq\FactoryCode\Bootstrap;

trait ManagerHelper
{
    protected $manager = null;

    public function __construct(string $name = null)
    {
        $this->manager = Bootstrap::getInstance()->getManager();

        parent::__construct($name);
    }

}
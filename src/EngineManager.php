<?php


namespace Blankqwq\FactoryCode;


use Blankqwq\FactoryCode\Base\Manager;
use Blankqwq\FactoryCode\Engine\BlankPhpEngine;
use Blankqwq\FactoryCode\Engine\DefaultEngine;
use Blankqwq\FactoryCode\Engine\Engine;
use Blankqwq\FactoryCode\Engine\LaravelEngine;

class EngineManager extends Manager
{

    /**
     * @inheritDoc
     * 创建默认引擎
     */
    public function createDefaultDriver($config = []): Engine
    {
        return new DefaultEngine($config);
    }

    /**
     * @param array $config
     * @return Engine
     * 创建laravel引擎
     */
    public function createLaravelDriver($config = []): Engine
    {
        return new LaravelEngine($config);
    }

    /**
     * @param array $config
     * @return Engine
     * 创建blankphp引擎
     */
    public function createBlankPhpDriver($config = []): Engine
    {
        return new BlankPhpEngine($config);
    }
}
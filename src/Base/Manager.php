<?php

namespace Blankqwq\FactoryCode\Base;

use Blankqwq\FactoryCode\Engine\Engine;
use Blankqwq\FactoryCode\Exception\NoDriverException;

abstract class Manager
{
    /**
     * @var Engine
     */
    private $drivers;

    /**
     * @var array
     *            配置文件
     */
    protected $config = [];

    /**
     * @var string
     *             格式化函数名称
     */
    protected $functionName = 'create%sDriver';

    /**
     * @var null
     *           生产工厂
     */
    protected $factory = null;

    /**
     * @var array
     *            驱动集合
     */
    private $driverSet = [];

    public function __construct($config = [])
    {
        $this->config = $config;
    }

    /**
     * @param $name
     * @param Engine|null $engine
     *
     * @return Engine
     *                存入或者取出驱动
     */
    public function driver(string $name, Engine $engine = null): Engine
    {
        return $this->drivers[$name] ?? $this->drivers[$name] = $engine;
    }

    /**
     * @param string $name
     * @param array  $arguments
     *
     * @return Engine
     *                创建驱动
     */
    protected function make(string $name, array $arguments): Engine
    {
        $this->factory->create($name, $arguments);
    }

    /**
     * @param string $name
     *
     * @throws NoDriverException
     *                           创建驱动
     *
     * @return Engine
     */
    public function createDriver($name = 'default'): Engine
    {
        $method = sprintf($this->functionName, ucfirst(strtolower($name)));
        if (method_exists($this, $method)) {
            $driver = $this->{$method}($this->config);
        } else {
            throw new NoDriverException('【'.$name.'】driver is not exist');
        }

        return $this->driver($name, $driver);
    }

    /**
     * @return array
     */
    public function getConfig(): array
    {
        return $this->config;
    }

    /**
     * @param array $config
     *
     * @return Engine
     *                创建默认驱动
     */
    public function createDefaultDriver($config = []): Engine
    {
        $driver = $this->make($this->driverSet['default'], $config);
    }

    /**
     * @param $name
     * @param $arguments
     *
     * @return mixed
     *               驱动中调用方法
     */
    public function __call($name, $arguments)
    {
        return $this->{$name}(...$arguments);
    }
}

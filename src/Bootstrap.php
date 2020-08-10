<?php

namespace Blankqwq\FactoryCode;

use Symfony\Component\Filesystem\Filesystem;

/**
 * Class Bootstrap.
 */
class Bootstrap
{
    /**
     * @var array
     *            配置内容
     */
    protected $config = [];

    /**
     * @var Application
     *                  console Application
     */
    protected $app = null;

    /**
     * @var Bootstrap
     *                单例模式
     */
    protected static $instance = null;

    /**
     * @var EngineManager
     */
    private $manager;

    /**
     * @var Filesystem
     *                 文件系统
     */
    private $fileSystem;

    private function __construct()
    {
        $this->boot();
        $this->defineDir();
        $this->loadConfig();
        $this->createManager();
    }

    public static function getInstance(): ?self
    {
        if (empty(static::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function boot(): void
    {
        $this->app = new Application();
        $this->fileSystem = new Filesystem();
    }

    public function handle(): void
    {
        if (isset($this->config['commands'])) {
            foreach ($this->config['commands'] as $command) {
                $this->app->add(new $command());
            }
        }
        $this->app->run();
    }

    public function defineDir(): void
    {
        define('DS', DIRECTORY_SEPARATOR);
        define('STUB_DEFAULT_DIR', __DIR__.DS.'stub');
        define('CONFIG_DEFAULT_DIR', __DIR__.DS.'config');
    }

    public function loadConfig(): void
    {
        $this->config = require CONFIG_DEFAULT_DIR.DS.'factory_code.php';
    }

    public function createManager(): void
    {
        try {
            $this->manager = new EngineManager($this->config);
            $this->manager->createDriver($this->config['engine']);
        } catch (Exception\NoDriverException $e) {
            echo $e->getMessage();
        }
    }

    public function getFileSystem()
    {
        return $this->fileSystem;
    }

    public function getManager(): EngineManager
    {
        return $this->manager;
    }

    public function getConfig(): array
    {
        return $this->config;
    }
}

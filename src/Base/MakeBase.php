<?php

namespace Blankqwq\FactoryCode\Base;

use Blankqwq\FactoryCode\Bootstrap;
use Blankqwq\FactoryCode\Validate\Validate;
use Symfony\Component\Filesystem\Filesystem;

abstract class MakeBase
{
    /**
     * @var string
     *             当前模板文件
     */
    protected $current = '';

    /**
     * @var string
     *             模板文件后缀
     */
    protected $suffix = '.stub';
    /**
     * @var string
     *             加载的内容
     */
    protected $content = '';

    /**
     * @var Filesystem
     *                 文件系统
     */
    protected $fileSystem;

    /**
     * MakeBase constructor.
     *
     * @param array  $set
     * @param array  $put
     * @param string $stub
     * @param string $suffix
     */
    public function __construct($set = [], $put = [], $stub = '', $suffix = '')
    {
        $this->fileSystem = Bootstrap::getInstance()->getFileSystem();
        $this->loadStub($stub, $suffix);
    }

    public function set($set = []): void
    {
    }

    public function put($put = []): void
    {
    }

    /**
     * 数据写入content.
     */
    public function write(): bool
    {
        //写入文件夹
        return true;
    }

    /**
     * 校验规则.
     */
    public function check(): array
    {
        return Validate::checkFromArray($this->rule(), $this->message(), $this->content);
    }

    /**
     * 加载Stub.
     *
     * @param string $stub
     * @param string $suffix
     */
    public function loadStub(string $stub, string $suffix): void
    {
        if (!empty($this->content)) {
            return;
        }
        $this->generateStubName($stub, $suffix);
        //载入文件
        $this->content = file_get_contents($this->current);
    }

    /**
     * @param $stub
     * @param $suffix
     *
     * @return string
     */
    public function generateStubName($stub, $suffix): string
    {
        if (is_file($this->current)) {
            return $this->current;
        }
        $stub = !empty($stub) ? $stub : $this->current;
        $suffix = !empty($suffix) ? $suffix : $this->suffix;

        return $this->current = $stub.$suffix;
    }

    /**
     * @return array
     *               返回需要校验的规则
     */
    protected function rule(): array
    {
        return [];
    }

    /**
     * @return array
     *               返回对应名称
     */
    protected function message(): array
    {
        return [];
    }
}

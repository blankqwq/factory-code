<?php


namespace Blankqwq\FactoryCode\Base;


use Blankqwq\FactoryCode\Engine\Engine;

abstract class EngineBase implements Engine
{
    protected $stubOption = [];

    /**
     * EngineBase constructor.
     * @param array $config
     * 构造函数
     */
    public function __construct(array $config = [])
    {
        $this->stubOption = array_merge($this->stubOption, $config['stub_option']);
    }

    /**
     * @param $type
     * 引入其他模板文件
     */
    protected function includeStub($type)
    {

    }

    /**
     * 编译模板文件
     */
    protected function compile(): void
    {

    }

    /**
     * 链接其他模板文件
     */
    protected function id(): void
    {

    }

    /**
     * 替换内容
     */
    protected function replace(): void
    {

    }

    /**
     * 加载模板文件
     * @param $stubName
     */
    protected function loadStub($stubName): void
    {

    }

    /**
     * @param $fileName
     * @param $content
     * @return bool
     * 将生成的模板文件写入
     */
    public function putContent($fileName, $content): bool
    {
        return true;
    }

    /**
     * @param $fileName
     * 遵循psr 规范
     * @return bool
     */
    public function phpFix($fileName):bool
    {

    }

}
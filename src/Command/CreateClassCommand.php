<?php


namespace Blankqwq\FactoryCode\Command;


use Blankqwq\FactoryCode\Bootstrap;
use Blankqwq\FactoryCode\Traits\ManagerHelper;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class CreateClassCommand extends Command
{
    use ManagerHelper;

    protected function configure()
    {
        $this->setName('create:class')
            ->setDescription('快速闯将类')
            ->setHelp('这里，你可以创建任何类')
            ->setDefinition(
                new InputDefinition(array(
                    new InputOption('type', '', InputOption::VALUE_REQUIRED, '类型: curd|sort|excel'),
                    new InputOption('name', '', InputOption::VALUE_REQUIRED, '控制器名称: controller name'),
                    new InputOption('stub', '', InputOption::VALUE_OPTIONAL, '指定模板样式'),
                ))
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
//        $input->getOption('type')
        $output->writeln([
            'Start Creating :' . $input->getOption('name') . ' ' . $input->getOption('type'),
            '============',
            '',
        ]);
        //创建子进程添加函数|变量
    }

}
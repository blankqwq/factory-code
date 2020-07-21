<?php

namespace Blankqwq\FactoryCode\Command;

use Blankqwq\FactoryCode\Traits\Helper;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class CreateStubCommand extends Command
{
    use Helper;

    protected function configure()
    {
        $this->setName('create:stub')
            ->setDescription('执行命令创建模板')
            ->setHelp('这里，你可以创建任何文件Model/Controller/等等...')
            ->setDefinition(
                new InputDefinition([
                    new InputOption('type', '', InputOption::VALUE_REQUIRED, '类型: curd|sort|excel'),
                    new InputOption('name', '', InputOption::VALUE_REQUIRED, '控制器名称: controller name'),
                    new InputOption('cache', '', InputOption::VALUE_OPTIONAL, '是否开启缓存 cache'),
                    new InputOption('model', '', InputOption::VALUE_OPTIONAL, '指定模型'),
                ])
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
//        $input->getOption('type')

        $output->writeln([
            'Start Creating :'.$input->getOption('name').' '.$input->getOption('type'),
            '============',
            '',
        ]);
        $output->writeln('Whoa!');
        $output->write('You are about to ');
        $output->write('create a user.');
    }
}

<?php


namespace Blankqwq\FactoryCode\Type\Base;


use Blankqwq\FactoryCode\Base\MakeBase;

class MakeClass extends MakeBase
{
    protected $name;
    protected $type;
    protected $extend;
    protected $uses = [];
    protected $functions=[];
    protected $properties = [];
    protected $implements = [];



}
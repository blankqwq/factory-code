<h1 align="center"> Blankqwq/FactoryCode </h1>

<p align="center"> 每日练习，刻意精进</p>

> 该扩展是自动化脚手架,用于创建项目|快速构建代码等 

## 安装

```shell
$ composer require blankqwq/factoryCode -vvv
```

### 更新


### 简要介绍

> 生成模板 `php bin/factory create:controller --type curd --name UsersController --model User --policy 1 --request 1`

    生成一个UsersController 包含基础代码 增删改查 以及表单校验和权限校验
    
> 创建模板`php bin/factory create:stub --name CreateView --stub view.stub `

> 是否需要高难度编译原理版本 -> 杀鸡焉用牛刀
                使用范围 ->  确认范围与扩展
                改变的只有生产-> 开始的生产是简陋的
#### 编写模板

    @单个名称
    
    #可能出现的名称
    
    %可能出现多个的模板

## License

MIT
### 这是一个自用php函数扩展库后续会持续更新
安装方法
```
composer.json 增加      "parieses/php-help": "^0.1.0"
然后执行composer install
或者
composer require parieses/php-help
```
```
简单使用说明
$data = [['id'=>1,'name'=>'liang'],['id'=>2,'name'=>'dada']];
arrayHelp::ArrayIndex($data,'index');
```
欢迎大家提出问题
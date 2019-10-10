## 这是一个自用php函数扩展库后续会持续更新
安装方法
```
composer.json 增加      "parieses/php-help": "^0.1.0"
然后执行composer install
或者
composer require parieses/php-help
```
demo 运行方法
```
composer install
php demo.php
```
### arrayHelp
#### arrayIndex 示例
```
$data = [['id'=>1,'name'=>'liang'],['id'=>2,'name'=>'dada']];
toolHelp::deBug(arrayHelp::arrayIndex($data,'id'));
```
#### arrayToObject 示例
```
$data = [['id'=>1,'name'=>'liang'],['id'=>2,'name'=>'dada']];
toolHelp::deBug(arrayHelp::arrayToObject($data));
```
#### objectToArray 示例
```
$obj =  (object)$data;
toolHelp::deBug(arrayHelp::objectToArray($obj));
```
#### arrayMultiSort 示例
```
toolHelp::deBug(arrayHelp::arrayMultiSort($data,'id',SORT_ASC));
```
#### arrayToXml 示例
```
$xmlArr = ['name'=>1,'age'=>2];
$xml = arrayHelp::arrayToXml($xmlArr);
toolHelp::deBug($xml);
```
### stringHelp
#### randSole 示例
```
stringHelp::randSole(5,12,1);
```
### timeHelp
#### 当前时间系列
```
echo timeHelp::currentYear();
echo timeHelp::currentMonth();
echo timeHelp::currentDay();
echo timeHelp::currentHour();
echo timeHelp::currentMin();
echo timeHelp::currentSecond();
```
#### dateTime 示例
```
echo timeHelp::dateTime();
```
#### timeStamp 示例
```
echo timeHelp::timeStamp("2018-04-24 15:48:04");
```
#### DValue 示例
```
echo timeHelp::DValue('2018-04-25 15:48:18', '04/03/2018 15:48:12');
```
#### fromTime 示例
```
echo timeHelp::fromTime(timeHelp::timeStamp('2019-10-11 15:48:04'),1);
```
### toolHelp
```
```
欢迎大家提出问题
<?php
require __DIR__ . '/vendor/autoload.php';
use PhpHelp\arrayHelp;
use PhpHelp\stringHelp;
use PhpHelp\toolHelp;
use PhpHelp\timeHelp;
use PhpHelp\whChatHelp;

/*
 * arrayHelp
 */

$data = [['id'=>1,'name'=>'liang'],['id'=>2,'name'=>'dada']];
//toolHelp::deBug(arrayHelp::ArrayIndex($data,'id'));
//toolHelp::deBug(arrayHelp::arrayToObject($data));
$obj =  (object)$data;
//toolHelp::deBug(arrayHelp::objectToArray($obj));
//toolHelp::deBug(arrayHelp::arrayMultiSort($data,'id',SORT_ASC));
$xmlArr = ['name'=>1,'age'=>2];
$xml = arrayHelp::arrayToXml($xmlArr);
//toolHelp::deBug($xml);

/*
 * stringHelp
 */

//echo stringHelp::randSole(5,12,1);

/*
 * timeHelp
 */
//
//echo timeHelp::currentYear();
//echo timeHelp::currentMonth();
//echo timeHelp::currentDay();
//echo timeHelp::currentHour();
//echo timeHelp::currentMin();
//echo timeHelp::currentSecond();
//echo timeHelp::dateTime();
//echo timeHelp::timeStamp("2018-04-24 15:48:04");
//echo '计算时间差 : '.timeHelp::DValue('2018-04-25 15:48:18', '04/03/2018 15:48:12');
//echo timeHelp::fromTime(timeHelp::timeStamp('2019-10-11 15:48:04'),1);
//echo timeHelp::getMicroseconds();
echo timeHelp::timeAgo(time()-3600);
echo toolHelp::getFirstChar('玩');
//请替换成项目数据
echo whChatHelp::getSessionKey("wxb8669*9a3c72",'7d43980c*2df0f9e89','033JxH9G0e1*F9G0JxH9q');

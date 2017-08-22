<?php
//首先需要修改php.ini配置将phar的readonly关闭，默认是不能写phar包的，include是默认开启的。
//phar.readonly = Off
$phar = new Phar('static.phar');
$phar->buildFromDirectory(__DIR__.'/lib', '/\.php$/');
$phar->compressFiles(Phar::GZ);
$phar->stopBuffering();
$phar->setStub($phar->createDefaultStub('Pingpp.php'));


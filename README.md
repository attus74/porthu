# Port.hu API

[![GitHub release](https://img.shields.io/github/release/attus74/porthu.svg)](https://GitHub.com/attus74/porthu/releases/)

API for reading the program of Hungarian TV directory Port.hu

```php

use Attus\PortHu\PortHu;
use Attus\PortHu\Exception\PortHuException;

$portHu = new PortHu();
$portHu->addChannel(5);
$t = time() + 86400;
$portHu->setTimestamp($t);
try {
  $result = $portHu->getProgram();
}
catch (PortHuException $ex) {
  var_dump($ex);
}
```

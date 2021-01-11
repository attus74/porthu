# Port.hu API

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

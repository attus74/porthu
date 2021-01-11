<?php

namespace Attus\PortHu\Exception;

/**
 * Port.Hu Exception
 *
 * @author Attila Németh
 * 11.01.2021
 */
class PortHuException extends \Exception {
  
  public function __construct(string $message = "An error happened at reading Port.hu", int $code = 0, \Throwable $previous = NULL): \Exception {
    return parent::__construct($message, $code, $previous);
  }
  
}

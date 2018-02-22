<?php

namespace Engine\Service\Monolog;

use Engine\Service\AbstractProvider;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class Provider extends AbstractProvider
{
    public $serviceName = 'logger';

    public function init()
    {
        $infoLogger = new Logger('myInfoLogger');
        $infoLogger->pushHandler(new StreamHandler(__DIR__.'/../../../logs/info/myInfoLog', Logger::INFO));
        $this->di->set($this->serviceName,$infoLogger);
    }
}

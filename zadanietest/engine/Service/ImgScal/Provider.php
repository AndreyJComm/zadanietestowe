<?php
/**
 * Created by PhpStorm.
 * User: anmk
 * Date: 22.02.2018
 * Time: 10:47
 */

namespace Engine\Service\ImgScal;

use Engine\Core\ImgScal;
use Engine\Service\AbstractProvider;

class Provider extends AbstractProvider
{
    public $serviceName = 'ImgScal';

    function init()
    {
        $imgScal = new ImgScal();
        $this->di->set($this->serviceName, $imgScal);
    }
}


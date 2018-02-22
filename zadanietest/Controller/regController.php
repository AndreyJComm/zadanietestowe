<?php

namespace Controller;

class regController
{
    private $di;
    private $logger;
    private $scalImg;

    /**
     * @return mixed
     */
    public function getLogger()
    {
        return $this->logger;
    }

    /**
     * @return mixed
     */
    public function getScalImg()
    {
        return $this->scalImg;
    }

    /**
     * regController constructor.
     * @param $di
     */
    public function __construct($di)
    {
        $this->di = $di;
        $this->logger = $this->di->get('logger');
        $this->scalImg = $this->di->get('ImgScal');

    }


    public function logg($mess)
    {
        $this->logger->info($mess);
    }
}

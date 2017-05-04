<?php

class ApiKernel extends AppKernel
{
    const APP_NAME = 'api';

    /**
     * @inheritdoc
     */
    public function getAppName()
    {
        return self::APP_NAME;
    }
}

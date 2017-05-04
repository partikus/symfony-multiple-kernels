<?php

class AdminKernel extends AppKernel
{
    const APP_NAME = 'admin';

    /**
     * @inheritdoc
     */
    public function getAppName()
    {
        return self::APP_NAME;
    }
}

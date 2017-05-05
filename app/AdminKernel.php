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

    public function registerBundles()
    {
        $bundles = parent::registerBundles();
        $bundles[] = new Symfony\Bundle\TwigBundle\TwigBundle();
        $bundles[] = new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle();

        return $bundles;
    }
}

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

    public function registerBundles()
    {
        $bundles = parent::registerBundles();

        if (in_array($this->getEnvironment(), ['dev', 'test'], true)) {
            $bundles[] = new \Symfony\Bundle\TwigBundle\TwigBundle();
        }

        return $bundles;
    }
}

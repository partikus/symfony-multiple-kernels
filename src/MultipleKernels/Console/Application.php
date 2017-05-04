<?php

namespace MultipleKernels\Console;

use Symfony\Bundle\FrameworkBundle\Console\Application as BaseApplication;
use Symfony\Component\Console\Input\InputOption;

class Application extends BaseApplication
{
    /** @var \AppKernel */
    private $kernel;

    public function __construct(\AppKernel $kernel)
    {
        $this->kernel = $kernel;
        parent::__construct($kernel);
        $option = new InputOption(
            '--app-name',
            '-a',
            InputOption::VALUE_OPTIONAL,
            'The app name',
            \ApiKernel::APP_NAME
        );
        $this->getDefinition()->addOption($option);
    }

    /**
     * {@inheritdoc}
     */
    public function getLongVersion()
    {
        $longVersion = parent::getLongVersion();
        return $longVersion . sprintf(' (platform: <comment>%s</>)', $this->kernel->getAppName());
    }
}
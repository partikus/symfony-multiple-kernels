<?php

namespace MultipleKernels\Composer;

use Incenteev\ParameterHandler\Processor;
use Composer\Script\Event;

class ScriptHandler extends \Incenteev\ParameterHandler\ScriptHandler
{
    public static function buildParameters(Event $event)
    {
        $extras = $event->getComposer()->getPackage()->getExtra();

        if (!isset($extras['incenteev-parameters'])) {
            throw new \InvalidArgumentException('The parameter handler needs to be configured through the extra.incenteev-parameters setting.');
        }

        $configs = $extras['incenteev-parameters'];

        if (!is_array($configs)) {
            throw new \InvalidArgumentException('The extra.incenteev-parameters setting must be an array or a configuration object.');
        }

        if (array_keys($configs) !== range(0, count($configs) - 1)) {
            $configs = array($configs);
        }

        self::applyAppName($configs);

        $processor = new Processor($event->getIO());

        foreach ($configs as $config) {
            if (!is_array($config)) {
                throw new \InvalidArgumentException('The extra.incenteev-parameters setting must be an array of configuration objects.');
            }

            $processor->processFile($config);
        }
    }

    private static function applyAppName(&$configs)
    {
        $appName = getenv('APP_NAME') ?: \ApiKernel::APP_NAME;
        foreach ($configs as &$config) {
            $config['file'] = str_replace('APP_NAME', $appName, $config['file']);
            $config['dist-file'] = str_replace('APP_NAME', $appName, $config['dist-file']);
        }
    }
}
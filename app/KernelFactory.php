<?php

final class KernelFactory
{
    public static function create($appName, $env = 'prod', $debug = false)
    {
        switch ($appName) {
            case ApiKernel::APP_NAME:
                return new ApiKernel($env, $debug);
            case AdminKernel::APP_NAME:
                return new AdminKernel($env, $debug);
            default:
                throw new \InvalidArgumentException("Given app('$appName') is not supported");
        }
    }
}

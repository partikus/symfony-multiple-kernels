Symfony Multiple Kernels
========================

Repository presents [Symfony](http://symfony.com/doc/current/index.html) project with multiple kernel approach.

## Multiple Kernels

Symfony [Multiple Kernels](http://symfony.com/doc/current/configuration/multiple_kernels.html) allows you create many independent Kernels. Thanks to that you can: manage the bundles you use and separate configuration for every kernel.
   
## Introduction

Let's assume your project has two parts:

 - `api`
 - `admin`

And just only for `admin` version you need to use `Twig` which is useless for `api` part. To achieve this you have to create two instances of `AppKernel`:

- [`ApiKernel`](app/ApiKernel.php)
- [`AdminKernel`](app/AdminKernel.php)

Those two classes extend from [`AppKernel`](app/AppKernel.php). This way you can get separate bundle list for each kernel.
    
## Configs, Sessions, Caches & Logs

To separate configuration, sessions, caches and logs you need overwrite `AppKernel.php` methods;

 - [`getCacheDir`](app/AppKernel.php#L42)
 - [`getLogDir`](app/AppKernel.php#L47)
 - [`getKernelParameters`](app/AppKernel.php#L52)
 - [`registerContainerConfiguration`](app/AppKernel.php#L62)
 

## New directory structure 

### app
```
app/
├── .htaccess
├── AdminKernel.php
├── ApiKernel.php
├── AppCache.php
├── AppKernel.php
├── KernelFactory.php
├── Resources
│   └── views
├── autoload.php
└── config
    ├── admin
    └── api

```

### cache
```
var/cache/
├── .gitkeep
├── admin
│   └── dev
└── api
    └── dev
```

### sessions

```
var/sessions/
├── .gitkeep
├── admin
│   └── dev
└── api
    └── dev
```

### logs

```
var/logs
├── .gitkeep
├── admin
│   ├── dev.log
│   └── prod.log
└── api
    ├── dev.log
    └── prod.log
```

## Multiple parameters.yml 

Separate parameters require [custom parameters builder](src/MultipleKernels/Composer/ScriptHandler.php),
and replacement in [composer.json](composer.json#L45).

## Switch between Multiple App Kernels

This action can be handle by exporting `APP_NAME` env like `SYMFONY_ENV` or by adding `-a admin` or `--app-name=admin` command's options. e.g. `bin/console --app-name=admin`


<?php

namespace App;

use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;
use Symfony\Component\Routing\RouteCollectionBuilder;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;

class Kernel extends BaseKernel
{
    use MicroKernelTrait;

    public function registerBundles()
    {
        $bundles = [
            new FrameworkBundle(),

        ];

        if ($this->getEnvironment() === 'dev') {

        }

        return $bundles;
    }





    public function getCacheDir(): string
    {
        return dirname(__DIR__) . '/var/cache/' . $this->getEnvironment();
    }



    public function getLogDir(): string
    {
        return dirname(__DIR__) . '/var/log';
    }


    protected function configureContainerConfigurations(LoaderInterface $loader)
    {

    }



}

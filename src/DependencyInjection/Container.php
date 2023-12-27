<?php

namespace App\DependencyInjection;

use Psr\Container\ContainerInterface;

class Container implements ContainerInterface
{
    private array $serviceDefinitions = [];
    private array $services = [];

    public function get($id)
    {
        if (!$this->has($id)) {
            throw new ServiceNotFoundException("Unable to get service in container : Service $id not found");
        }

        if (!array_key_exists($id, $this->services)) {
            $this->services[$id] = $this->createService($id);
        }

        return $this->services[$id];
    }

    public function has($id): bool
    {
        return array_key_exists($id, $this->serviceDefinitions);
    }

    public function set(string $id, callable $callable): self
    {
        $this->serviceDefinitions[$id] = $callable;

        return $this;
    }

    private function createService(string $id)
    {
        if (!$this->has($id)) {
            throw new ServiceNotFoundException("Service $id not found in definitions");
        }

        $serviceDefinition = $this->serviceDefinitions[$id];

        if (is_callable($serviceDefinition)) {
            return $serviceDefinition($this);
        }

        throw new \RuntimeException("Invalid service definition for service $id");
    }
}

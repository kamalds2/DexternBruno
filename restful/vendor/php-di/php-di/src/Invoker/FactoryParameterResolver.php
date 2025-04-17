<?php

declare(strict_types=1);

namespace DI\Invoker;

use Invoker\ParameterResolver\ParameterResolver;
use Psr\Container\ContainerInterface;
use ReflectionFunctionAbstract;

/**
 * Inject the container, the definition or any other service using type-hints.
 *
 * {@internal This class is similar to TypeHintingResolver and TypeHintingContainerResolver,
 *            we use this instead for performance reasons}
 *
 * @author Quim Calpe <quim@kalpe.com>
 * @author Matthieu Napoli <matthieu@mnapoli.fr>
 */
class FactoryParameterResolver implements ParameterResolver
{
    /**
     * @var ContainerInterface
     */
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function getParameters(
    ReflectionFunctionAbstract $reflection,
    array $providedParameters,
    array $resolvedParameters
) : array {
    $parameters = $reflection->getParameters();

    // Skip parameters already resolved
    if (!empty($resolvedParameters)) {
        $parameterNames = array_map(function($parameter) {
            return $parameter->getName();
        }, $resolvedParameters);
        $parameters = array_filter($parameters, function($parameter) use ($parameterNames) {
            return !in_array($parameter->getName(), $parameterNames);
        });
    }

    foreach ($parameters as $index => $parameter) {
        // Get the type hint of the parameter
        $parameterType = $parameter->getType();

        // If the parameter has no type hint, skip it
        if (!$parameterType || $parameterType->getName() === 'void') {
            continue;
        }

        $parameterClassName = $parameterType->getName();

        if ($parameterClassName === 'Psr\Container\ContainerInterface') {
            $resolvedParameters[$index] = $this->container;
        } elseif ($parameterClassName === 'DI\Factory\RequestedEntry') {
            // By convention, the second parameter is the definition
            $resolvedParameters[$index] = $providedParameters[1];
        } elseif ($this->container->has($parameterClassName)) {
            $resolvedParameters[$index] = $this->container->get($parameterClassName);
        }
    }

    return $resolvedParameters;
}

}

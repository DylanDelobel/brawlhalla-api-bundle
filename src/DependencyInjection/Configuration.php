<?php

namespace DylanDelobel\BrawlhallaApiBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{

    /**
     * Generates the configuration tree builder.
     *
     * @return \Symfony\Component\Config\Definition\Builder\TreeBuilder The tree builder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('brawlhalla_api');

        $rootNode
            ->children()
                ->scalarNode('api_key')->info('api_key from the devs')->cannotBeEmpty()
            ->end()
        ;

        return $treeBuilder;
    }
}

<?php

namespace Javer\SphinxBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration
 *
 * @package Javer\SphinxBundle\DependencyInjection
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('javer_sphinx');

        if (!method_exists($treeBuilder, 'getRootNode')) {
            $rootNode = $treeBuilder->root('javer_sphinx');
        } else {
            $rootNode = $treeBuilder->getRootNode();
        }

        $rootNode
            ->children()
                ->scalarNode('host')->defaultValue('127.0.0.1')->end()
                ->scalarNode('port')->defaultValue(9306)->end()
                ->scalarNode('config_path')->defaultValue('%kernel.root_dir%/config/sphinx.conf')->end()
                ->scalarNode('data_dir')->defaultValue('%kernel.cache_dir%/sphinx')->end()
                ->scalarNode('searchd_path')->defaultValue('searchd')->end()
            ->end();

        return $treeBuilder;
    }
}

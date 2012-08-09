<?php

/*
 * This file is a part of Sculpin.
 *
 * (c) Dragonfly Development Inc.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sculpin\Bundle\SculpinBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Configuration.
 *
 * @author Beau Simensen <beau@dflydev.com>
 */
class Configuration implements ConfigurationInterface
{
    /**
    * {@inheritdoc}
    */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder;

        $rootNode = $treeBuilder->root('sculpin');

        $rootNode
            ->children()
                ->scalarNode('source_dir')->defaultValue('%kernel.root_dir%/source')->end()
                ->scalarNode('output_dir')->defaultValue('%kernel.root_dir%/output_%kernel.environment%')->end()
                ->scalarNode('cache_dir')->defaultValue('%kernel.cache_dir%/sculpin')->end()
                ->arrayNode('exclude')
                    ->prototype('scalar')->end()
                ->end()
                ->arrayNode('ignore')
                    ->prototype('scalar')->end()
                ->end()
                ->arrayNode('raw')
                    ->prototype('scalar')->end()
                ->end()
                ->scalarNode('permalink')->defaultValue('pretty')->end()
                ->variableNode('meta')->end()
            ->end();

        return $treeBuilder;
    }
}

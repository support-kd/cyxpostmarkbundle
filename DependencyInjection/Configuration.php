<?php

namespace SupportKd\CyxPostMarkBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('cyx_post_mark');
        $rootNode
            ->children()
                ->scalarNode('account_api_token')
                    ->isRequired()
                ->end()
                ->scalarNode('sender_signature')
                    ->isRequired()
                ->end()
                ->scalarNode('verify_ssl')
                    ->isRequired()
                ->end()
                ->scalarNode('sandbox_mode')
                    ->defaultFalse()
                ->end()
                ->scalarNode('sandbox_email')
                    ->isRequired()
                ->end()

            ->end()
        ;

        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.

        return $treeBuilder;
    }
}

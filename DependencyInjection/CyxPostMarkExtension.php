<?php

namespace SupportKd\CyxPostMarkBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration.
 *
 * @link http://symfony.com/doc/current/cookbook/bundles/extension.html
 */
class CyxPostMarkExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);
        $container->setParameter('cyx_post_mark.account_api_token', $config['account_api_token']);
        $container->setParameter('cyx_post_mark.sender_signature', $config['sender_signature']);
        $container->setParameter('cyx_post_mark.verify_ssl', $config['verify_ssl']);
        $container->setParameter('cyx_post_mark.sandbox_mode', $config['sandbox_mode']);
        $container->setParameter('cyx_post_mark.sandbox_email', $config['sandbox_email']);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }
}

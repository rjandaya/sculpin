<?php

/*
 * This file is a part of Sculpin.
 *
 * (c) Dragonfly Development Inc.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sculpin\Bundle\StandaloneBundle;

use Sculpin\Bundle\StandaloneBundle\DependencyInjection\Compiler\RegisterKernelListenersPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Scope;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Standalone Bundle.
 *
 * Used to prep the Kernel in the case that Sculpin is used outside
 * of a Symfony2 Standard application.
 *
 * @author Beau Simensen <beau@dflydev.com>
 */
class SculpinStandaloneBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new RegisterKernelListenersPass);
    }
}

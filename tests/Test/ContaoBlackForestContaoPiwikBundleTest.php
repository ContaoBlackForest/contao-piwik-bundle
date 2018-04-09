<?php

/**
 * This file is part of contaoblackforest/contao-piwik-bundle.
 *
 * (c) 2014-2018 The ContaoBlackForest team.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * This project is provided in good faith and hope to be usable by anyone.
 *
 * @package    contaoblackforest/contao-piwik-bundle
 * @author     Sven Baumann <baumann.sv@gmail.com>
 * @copyright  2014-2018 The ContaoBlackForest team.
 * @license    hhttps://github.com/ContaoBlackForest/contao-piwik-bundle/blob/master/LICENSE LGPL-3.0
 * @filesource
 */

namespace ContaoBlackForest\PiwikBundle\Test;

use ContaoBlackForest\PiwikBundle\ContaoBlackForestContaoPiwikBundle;
use ContaoBlackForest\PiwikBundle\DependencyInjection\ContaoBlackForestContaoPiwikExtension;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Config\Resource\ComposerResource;
use Symfony\Component\Config\Resource\FileResource;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Class ContaoBlackForestContaoPiwikBundleTest
 *
 * @covers \ContaoBlackForest\PiwikBundle\ContaoBlackForestContaoPiwikBundle
 */
class ContaoBlackForestContaoPiwikBundleTest extends TestCase
{
    public function testCanBeInstantiated()
    {
        $bundle = new ContaoBlackForestContaoPiwikBundle();

        $this->assertInstanceOf(ContaoBlackForestContaoPiwikBundle::class, $bundle);
    }

    public function testReturnsTheContainerExtension()
    {
        $extension = (new ContaoBlackForestContaoPiwikBundle())->getContainerExtension();

        $this->assertInstanceOf(ContaoBlackForestContaoPiwikExtension::class, $extension);
    }

    /**
     * @covers \ContaoBlackForest\PiwikBundle\DependencyInjection\ContaoBlackForestContaoPiwikExtension::load
     */
    public function testLoadExtensionConfiguration()
    {
        $extension = (new ContaoBlackForestContaoPiwikBundle())->getContainerExtension();
        $container = new ContainerBuilder();

        $extension->load([], $container);

        $this->assertInstanceOf(ComposerResource::class, $container->getResources()[0]);
        $this->assertInstanceOf(FileResource::class, $container->getResources()[1]);
        $this->assertSame(
            \dirname(\dirname(__DIR__)) . '/src/Resources/config/services.yml',
            $container->getResources()[1]->getResource()
        );
    }
}

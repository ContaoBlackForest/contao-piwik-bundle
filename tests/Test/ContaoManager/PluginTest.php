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

namespace ContaoBlackForest\PiwikBundle\Test\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use ContaoBlackForest\PiwikBundle\ContaoBlackForestContaoPiwikBundle;
use ContaoBlackForest\PiwikBundle\ContaoManager\Plugin;
use PHPUnit\Framework\TestCase;

/**
 * Class PluginTest
 */
class PluginTest extends TestCase
{
    /**
     * Test get bundles.
     *
     * @cover Plugin::getBundles
     */
    public function testGetBundles()
    {
        $plugin = new Plugin();
        $parser = $this->getMockBuilder(ParserInterface::class)->getMock();

        $bundleConfig1 = BundleConfig::create(ContaoBlackForestContaoPiwikBundle::class)
            ->setLoadAfter(
                [
                    ContaoCoreBundle::class
                ]
            );

        $this->assertArraySubset($plugin->getBundles($parser), [$bundleConfig1]);
    }
}

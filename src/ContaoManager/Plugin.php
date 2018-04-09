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

namespace ContaoBlackForest\PiwikBundle\ContaoManager;

use BlackForest\PiwikBundle\BlackForestPiwikBundle;
use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use ContaoBlackForest\PiwikBundle\ContaoBlackForestContaoPiwikBundle;
use Doctrine\Bundle\DoctrineBundle\DoctrineBundle;
use Stof\DoctrineExtensionsBundle\StofDoctrineExtensionsBundle;

/**
 * Contao Manager plugin.
 */
class Plugin implements BundlePluginInterface
{
    /**
     * {@inheritdoc}
     */
    public function getBundles(ParserInterface $parser)
    {
        return [
            BundleConfig::create(DoctrineBundle::class)
                ->setLoadAfter(
                    [
                        ContaoCoreBundle::class
                    ]
                ),
            BundleConfig::create(StofDoctrineExtensionsBundle::class)
                ->setLoadAfter(
                    [
                        ContaoCoreBundle::class,
                        DoctrineBundle::class
                    ]
                ),
            BundleConfig::create(BlackForestPiwikBundle::class)
                ->setLoadAfter(
                    [
                        ContaoCoreBundle::class,
                        DoctrineBundle::class
                    ]
                ),
            BundleConfig::create(ContaoBlackForestContaoPiwikBundle::class)
                ->setLoadAfter(
                    [
                        ContaoCoreBundle::class,
                        BlackForestPiwikBundle::class
                    ]
                )
        ];
    }
}

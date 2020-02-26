<?php

/**
 * Metadata version
 */
$sMetadataVersion = '2.1';

/**
 * Module information
 */
$aModule = array(
    'id'           => 'stornoxid',
    'title'        => '<span style="font-family:monospace;background-color:#000000;color:#FFFFFF;">&nbsp;pflaesterer&nbsp;</span> - stornoxid',
    'thumbnail'    => 'logo.png',
    'email'        => 'oxid@pflaesterer.org',
    'url'          => 'https://github.com/pflaesterer/stornoxid',
    'description'  => array(
        'en'=>'Adds the possibility to undo a storno on a cancelled order.',
        'de'=>'Ermöglicht die Reaktivierung einer stornierten Bestellung.',
    ),
    'version'      => '1.0.0',
    'author'       => 'Philip Pflästerer',

    'extend'      => [
        \OxidEsales\Eshop\Application\Controller\Admin\OrderList::class => \Pflaesterer\StornOxid\Application\Controller\Admin\OrderList::class,
        \OxidEsales\Eshop\Application\Model\Order::class => \Pflaesterer\StornOxid\Application\Model\Order::class,
        \OxidEsales\Eshop\Application\Model\OrderArticle::class => \Pflaesterer\StornOxid\Application\Model\OrderArticle::class,
    ],
);


<?php

/**
 * Metadata version
 */
$sMetadataVersion = '2.1';

/**
 * Module information
 */
$aModule = [
    'id'          => 'jxvouchershow',
    'title'       => 'jxVoucherShow - Display of created coupons and their use',
    'description' => [
        'de' => 'Anzeige der erzeugten Gutscheine und deren Verwendung.',
        'en' => 'Display of created coupons and their use.',
    ],
    'thumbnail'   => 'jxvouchershow.png',
    'version'     => '1.0.0',
    'author'      => 'Joachim Barthel',
    'url'         => 'https://github.com/job963/jxVoucherShow',
    'email'       => 'jobarthel@gmail.com',
    'extend'      => [],
    'controllers' => [
        'jx_voucherserie_show' => \JxMods\JxVoucherShow\Application\Controller\Admin\JxVoucherSerieShow::class,
    ],
    'templates'   => [
        'jx_voucherserie_show.tpl'        => 'jxmods/jxvouchershow/Application/views/admin/tpl/jx_voucherserie_show.tpl',
        'jx_voucherserie_showdetails.tpl' => 'jxmods/jxvouchershow/Application/views/admin/tpl/jx_voucherserie_showdetails.tpl',
    ],
    'settings'    => [],
];

<?php

$GLOBALS['TL_DCA']['tl_module']['palettes']['staticArticle'] = '{title_legend},name,headline,type;{include_legend},staticArticle;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID';

$GLOBALS['TL_DCA']['tl_module']['fields']['staticArticle'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['staticArticle'],
    'inputType' => 'select',
    'options_callback' => [\Luiswagener\Contao\StaticArticleBundle\DataContainer\Module::class, 'getStaticArticleOptions'],
    'eval' => [
        'mandatory' => true,
        'tl_class' => 'long'
    ],
    'sql' => "int(10) NOT NULL default '0'"
];

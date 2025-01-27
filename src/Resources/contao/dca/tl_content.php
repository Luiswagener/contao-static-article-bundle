<?php

if (\Contao\Input::get('do') == 'staticArticle') {
    $GLOBALS['TL_DCA']['tl_content']['config']['ptable'] = 'tl_static_article';
}

$GLOBALS['TL_DCA']['tl_content']['palettes']['staticArticle'] = '{type_legend},type,headline;{include_legend},staticArticle;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID;{invisible_legend:hide},invisible,start,stop';
$GLOBALS['TL_DCA']['tl_content']['palettes']['staticArticleExtended'] = '{type_legend},type,headline;{include_legend},staticArticleExtended;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID;{invisible_legend:hide},invisible,start,stop';

$GLOBALS['TL_DCA']['tl_content']['fields']['staticArticle'] = [
    'label'            => &$GLOBALS['TL_LANG']['tl_content']['staticArticle'],
    'inputType'        => 'select',
    'options_callback' => [\Luiswagener\Contao\StaticArticleBundle\DataContainer\Module::class, 'getStaticArticleOptions'],
    'eval'             => ['mandatory' => true, 'tl_class' => 'long'],
    'sql'              => "int(10) NOT NULL default '0'"
];

$GLOBALS['TL_DCA']['tl_content']['fields']['staticArticleExtended'] = [
    'label'            => &$GLOBALS['TL_LANG']['tl_content']['staticArticle'],
    'inputType'        => 'select',
    'options_callback' => [\Luiswagener\Contao\StaticArticleBundle\DataContainer\Module::class, 'getStaticArticleOptions'],
    'eval'             => ['mandatory' => true, 'tl_class' => 'long', 'sections'=>true],
    'sql'              => "int(10) NOT NULL default '0'"
];

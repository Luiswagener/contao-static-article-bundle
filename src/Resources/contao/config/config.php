<?php

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ArrayUtil;

$insertPosition = (array_search('article', array_keys($GLOBALS['BE_MOD']['content'])) ?: count($GLOBALS['BE_MOD']['content']) - 1) + 1;
if (version_compare(ContaoCoreBundle::getVersion(), "4.10", "<")) {
    array_insert($GLOBALS['BE_MOD']['content'], $insertPosition, [
        'staticArticle' => [
            'tables' => ['tl_static_article_section', 'tl_static_article', 'tl_content'],
        ]
    ]);
} elseif (version_compare(ContaoCoreBundle::getVersion(), "5.x.x.x", ">=")) {
    ArrayUtil::arrayInsert($GLOBALS['BE_MOD']['content'], $insertPosition, [
        'staticArticle' => [
            'tables' => ['tl_static_article_section', 'tl_static_article', 'tl_content'],
        ]
    ]);
} else {
    ArrayUtil::arrayInsert($GLOBALS['BE_MOD']['content'], $insertPosition, [
        'staticArticle' => [
            'tables' => ['tl_static_article_section', 'tl_static_article', 'tl_content'],
        ]
    ]);
}

$GLOBALS['FE_MOD']['miscellaneous']['staticArticle'] = \Luiswagener\Contao\StaticArticleBundle\FrontendModule\StaticArticle::class;
$GLOBALS['TL_CTE']['includes']['staticArticle'] = \Luiswagener\Contao\StaticArticleBundle\ContentElement\StaticArticle::class;
$GLOBALS['TL_CTE']['includes']['staticArticleExtended'] = \Luiswagener\Contao\StaticArticleBundle\ContentElement\StaticArticleExtended::class;

$GLOBALS['TL_MODELS']['tl_static_article_section'] = \Luiswagener\Contao\StaticArticleBundle\Model\StaticArticleSectionModel::class;
$GLOBALS['TL_MODELS']['tl_static_article'] = \Luiswagener\Contao\StaticArticleBundle\Model\StaticArticleModel::class;


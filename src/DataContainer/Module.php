<?php

namespace Luiswagener\Contao\StaticArticleBundle\DataContainer;

use Contao\DataContainer;
use Luiswagener\Contao\StaticArticleBundle\Model\StaticArticleModel;
use Luiswagener\Contao\StaticArticleBundle\Model\StaticArticleSectionModel;

class Module
{
    public static function getStaticArticleOptions(DataContainer $dc = null): array
    {
        $arrOptions = [];

        $arrSections = [];
        $collArticleSections = StaticArticleSectionModel::findAll(['order' => 'title']);
        if ($collArticleSections) foreach ($collArticleSections as $objArticleSection) {
            $arrOptions[$objArticleSection->title] = [];
            $arrSections[$objArticleSection->id] = $objArticleSection->title;
        }

        if($dc && isset($GLOBALS['TL_DCA'][$dc->table]['fields'][$dc->field]['eval']['sections'])){
            return $arrSections;
        }

        $collArticles = StaticArticleModel::findAll(['order' => 'title']);

        if ($collArticles) foreach ($collArticles as $objArticle) {
            $arrOptions[$arrSections[$objArticle->pid]][$objArticle->id] = $objArticle->title;
        }

        return $arrOptions;
    }



    /**
     * List a front end module
     *
     * @param array $row
     *
     * @return string
     */
    public function listModule(array $row): string
    {
        return '<div class="tl_content_left">'. $row['title'] .'</div>';
    }
}

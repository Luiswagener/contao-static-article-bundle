<?php

namespace Luiswagener\Contao\StaticArticleBundle\FrontendModule;

use Contao\ContentModel;
use Contao\Module;
use Luiswagener\Contao\StaticArticleBundle\Model\StaticArticleModel;

/**
 * @property int $staticArticle
 */
class StaticArticle extends Module
{
    protected $strTemplate = 'mod_static_article';

    protected function compile()
    {
        $arrElements = [];

        $collElements = ContentModel::findPublishedByPidAndTable($this->staticArticle, StaticArticleModel::getTable());

        if ($collElements !== null) {
            while ($collElements->next()) {
                /** @var ContentModel $objRow */
                $objRow = $collElements->current();

                $arrElements[] = $this->getContentElement($objRow, $this->strColumn);
            }
        }

        $this->Template->elements = $arrElements;
    }
}

<?php

namespace Luiswagener\Contao\StaticArticleBundle\ContentElement;

use Contao\ContentElement;
use Contao\ContentModel;
use Luiswagener\Contao\StaticArticleBundle\Model\StaticArticleModel;

/**
 * @property int $staticArticle
 */
class StaticArticleExtended extends ContentElement
{
    protected $strTemplate = 'ce_static_article';

    protected function compile()
    {
        $arrElements = [];

        $objStaticArticles = StaticArticleModel::findBy('pid', $this->staticArticleExtended);

        if ($objStaticArticles) {
            foreach ($objStaticArticles as $objStaticArticle) {
                $collElements = ContentModel::findPublishedByPidAndTable($objStaticArticle->id, StaticArticleModel::getTable());

                if ($collElements !== null) {
                    while ($collElements->next()) {
                        /** @var ContentModel $objRow */
                        $objRow = $collElements->current();

                        $arrElements[] = $this->getContentElement($objRow, $this->strColumn);
                    }
                }
            }
        }

        $this->Template->elements = $arrElements;
    }
}

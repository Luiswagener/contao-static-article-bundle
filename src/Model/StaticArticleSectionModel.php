<?php

namespace Luiswagener\Contao\StaticArticleBundle\Model;

use Contao\Model;
use Contao\Model\Collection;

/**
 * @property int    $tstamp
 * @property string $title
 * @method static StaticArticleSectionModel|Collection|StaticArticleSectionModel[]|null findAll(array $options = [])
 */
class StaticArticleSectionModel extends Model
{
    protected static $strTable = 'tl_static_article_section';
}


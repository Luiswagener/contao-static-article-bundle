<?php

namespace Luiswagener\Contao\StaticArticleBundle\Model;

use Contao\Model;
use Contao\Model\Collection;

/**
 * @property int    $pid
 * @property int    $tstamp
 * @property string $title
 * @method static StaticArticleModel|Collection|StaticArticleModel[]|null findAll(array $options = [])
 */
class StaticArticleModel extends Model
{
    protected static $strTable = 'tl_static_article';
}
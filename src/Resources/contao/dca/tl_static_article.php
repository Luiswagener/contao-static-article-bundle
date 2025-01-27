<?php
use Contao\DC_Table;

$GLOBALS['TL_DCA']['tl_static_article'] = [
    'config' => [
        'dataContainer' => DC_Table::class,
        'ptable' => 'tl_static_article_section',
        'ctable' => ['tl_content'],
        'enableVersioning' => true,
        'sql' => [
            'keys' => [
                'id' => 'primary',
                'pid' => 'index',
            ],
        ],
    ],

    'list' => [
        'sorting' => [
            'mode' => 4,
            'flag' => 1,
            'panelLayout' => 'sort,search,filter,limit',
            'fields' => ['title'],
//            'disableGrouping' => true,
            'headerFields' => ['title'],
            'child_record_callback' => [\Luiswagener\Contao\StaticArticleBundle\DataContainer\Module::class, 'listModule'],
        ],
        'label' => [
            'fields' => ['title'],
            'format' => '%s',
        ],
        'operations' => [
            'edit' => [
                'label' => &$GLOBALS['TL_LANG']['tl_static_article']['edit'],
                'href' => 'table=tl_content',
                'icon' => 'edit.svg',
            ],
            'editheader' => [
                'label' => &$GLOBALS['TL_LANG']['tl_static_article']['editheader'],
                'href' => 'act=edit',
                'icon' => 'header.svg',
            ],
            'copy' => [
                'label' => &$GLOBALS['TL_LANG']['tl_static_article']['copy'],
                'href' => 'act=paste&amp;mode=copy',
                'icon' => 'copy.svg',
            ],
            'cut' => array
            (
                'label' => &$GLOBALS['TL_LANG']['tl_static_article']['cut'],
                'href' => 'act=paste&amp;mode=cut',
                'icon' => 'cut.svg'
            ),
            'delete' => [
                'label' => &$GLOBALS['TL_LANG']['tl_static_article']['delete'],
                'href' => 'act=delete',
                'icon' => 'delete.svg',
                'attributes' => 'onclick="if(!confirm(\'' . ($GLOBALS['TL_LANG']['MSC']['deleteConfirm'] ?? null) . '\'))return false;Backend.getScrollOffset()"',
            ],
        ],
    ],

    'palettes' => [
        'default' => '{title_legend},title',
    ],

    'fields' => [
        'id' => [
            'sql' => "int(10) unsigned NOT NULL auto_increment",
        ],
        'pid' => [
            'sql' => "int(10) unsigned NOT NULL default '0'",
        ],
        'tstamp' => [
            'sql' => "int(10) unsigned NOT NULL default '0'",
        ],
        'title' => [
            'label' => &$GLOBALS['TL_LANG']['tl_static_article']['title'],
            'sorting' => true,
            'inputType' => 'text',
            'eval' => ['mandatory' => true, 'tl_class' => 'w50', 'maxlength' => 255],
            'sql' => "varchar(255) NOT NULL default ''",
        ],
    ],
];


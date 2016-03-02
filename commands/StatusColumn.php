<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\grid\DataColumn;

/**
 * SerialColumn displays a column of row numbers (1-based).
 *
 * To add a SerialColumn to the [[GridView]], add it to the [[GridView::columns|columns]] configuration as follows:
 *
 * ```php
 * 'columns' => [
 *     // ...
 *     [
 *         'class' => 'yii\grid\SerialColumn',
 *         // you may configure additional properties here
 *     ],
 * ]
 * ```
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class StatusColumn extends DataColumn
{
    /**
     * @inheritdoc
     */
    public $header = 'Статус';
    public $label = 'Статус';
    public $attribute = 'status';
    public $enableSorting = true;
    public $format = 'raw';

    /**
     * @inheritdoc
     */
    protected function renderDataCellContent($model, $key, $index)
    {
        switch ($model->status) {
            case 1:
                return "<div style='background-color: red; min-width: 32px; min-height: 32px;'></div>";
                break;
            case 2:
                return "<div style='background-color: yellow; min-width: 32px; min-height: 32px;'></div>";
                break;
            case 3:
                return "<div style='background-color: green; min-width: 32px; min-height: 32px;'></div>";
                break;
            
            default:
                return "<div style='background-color: #fff;'></div>";
                break;
        }
    }
}

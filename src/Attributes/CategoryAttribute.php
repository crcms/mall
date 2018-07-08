<?php

namespace CrCms\Mall\Attributes;

use CrCms\AttributeContract\AbstractAttributeContract;

/**
 * Class CategoryAttribute
 * @package CrCms\Category\Attributes
 */
class CategoryAttribute extends AbstractAttributeContract
{
    /**
     *
     */
    const STATUS_UNDEFINED = 0;

    /**
     *
     */
    const STATUS_ENABLE = 1;

    /**
     *
     */
    const STATUS_HIDDEN = 2;

    /**
     *
     */
    const STATUS_DISABLE = 3;

    /**
     *
     */
    const KEY_STATUS = 'status';

    /**
     * @return array
     */
    protected function attributes(): array
    {
        return [
            static::KEY_STATUS => [
                static::STATUS_UNDEFINED => trans('mall::app.status.undefined'),
                static::STATUS_ENABLE =>  trans('mall::app.status.enable'),
                static::STATUS_HIDDEN =>  trans('mall::app.status.hidden'),
                static::STATUS_DISABLE =>  trans('mall::app.status.disable')
            ]
        ];
    }
}
<?php
/**
 * Select 2 plugin for Craft CMS
 *
 * Select2 Model
 *
 * @author    Jason Mayo
 * @copyright Copyright (c) 2016 Jason Mayo
 * @link      bymayo.co.uk
 * @package   Select2
 * @since     1
 */

namespace Craft;

class Select2Model extends BaseModel
{
    /**
     * @return array
     */
    protected function defineAttributes()
    {
        return array_merge(parent::defineAttributes(), array());
    }

}
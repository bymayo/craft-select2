<?php
/**
 * Select2 plugin for Craft CMS 3.x
 *
 * Fieldtype that uses the Select2 jQuery plugin as a replacement to <select> fields to enable better filtering of options.
 *
 * @link      http://bymayo.co.uk
 * @copyright Copyright (c) 2018 ByMayo
 */

namespace bymayo\select2\models;

use bymayo\select2\Select2;

use Craft;
use craft\base\Model;

/**
 * @author    ByMayo
 * @package   Select2
 * @since     2.0.0
 */
class Settings extends Model
{
    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $someAttribute = 'Some Default';

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['someAttribute', 'string'],
            ['someAttribute', 'default', 'value' => 'Some Default'],
        ];
    }
}

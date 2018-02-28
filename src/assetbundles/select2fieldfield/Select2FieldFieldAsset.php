<?php
/**
 * Select2 plugin for Craft CMS 3.x
 *
 * Fieldtype that uses the Select2 jQuery plugin as a replacement to <select> fields to enable better filtering of options.
 *
 * @link      http://bymayo.co.uk
 * @copyright Copyright (c) 2018 ByMayo
 */

namespace bymayo\select2\assetbundles\select2fieldfield;

use Craft;
use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

/**
 * @author    ByMayo
 * @package   Select2
 * @since     2.0.0
 */
class Select2FieldFieldAsset extends AssetBundle
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->sourcePath = "@bymayo/select2/assetbundles/select2fieldfield/dist";

        $this->depends = [
            CpAsset::class,
        ];

        $this->js = [
            'js/Select2Field.js',
        ];

        $this->css = [
            'css/Select2Field.css',
        ];

        parent::init();
    }
}

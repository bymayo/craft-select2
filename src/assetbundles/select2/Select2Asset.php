<?php
/**
 * Select2 plugin for Craft CMS 3.x
 *
 * Fieldtype that uses the Select2 jQuery plugin as a replacement to <select> fields to enable better filtering of options.
 *
 * @link      http://bymayo.co.uk
 * @copyright Copyright (c) 2018 ByMayo
 */

namespace bymayo\select2\assetbundles\Select2;

use Craft;
use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

/**
 * @author    ByMayo
 * @package   Select2
 * @since     2.0.0
 */
class Select2Asset extends AssetBundle
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->sourcePath = "@bymayo/select2/assetbundles/select2/dist";

        $this->depends = [
            CpAsset::class,
        ];

        $this->js = [
            'js/Select2.js',
        ];

        $this->css = [
            'css/Select2.css',
        ];

        parent::init();
    }
}

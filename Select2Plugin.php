<?php
/**
 * Select2 plugin for Craft CMS
 *
 * Fieldtype that uses the popular Select2 jQuery plugin as a replacement to &lt;select&gt; fields.
 *
 * @author    Jason Mayo
 * @copyright Copyright (c) 2016 Jason Mayo
 * @link      bymayo.co.uk
 * @package   Select2
 * @since     1.0.0
 */

namespace Craft;

class Select2Plugin extends BasePlugin
{
	
    /**
     * @return mixed
     */
    public function init()
    {
		craft()->templates->includeCssResource('select2/css/style.css');
    }

    /**
     * @return mixed
     */
    public function getName()
    {
         return Craft::t('Select2');
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return Craft::t('Fieldtype that uses the popular Select2 jQuery plugin as a replacement to &lt;select&gt; fields.');
    }

    /**
     * @return string
     */
    public function getDocumentationUrl()
    {
        return 'https://github.com/bymayo/select2/blob/master/README.md';
    }

    /**
     * @return string
     */
    public function getReleaseFeedUrl()
    {
        return 'https://raw.githubusercontent.com/bymayo/select2/master/releases.json';
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return '1.0.0';
    }

    /**
     * @return string
     */
    public function getSchemaVersion()
    {
        return '1.0.0';
    }

    /**
     * @return string
     */
    public function getDeveloper()
    {
        return 'Jason Mayo';
    }

    /**
     * @return string
     */
    public function getDeveloperUrl()
    {
        return 'bymayo.co.uk';
    }

    /**
     * @return bool
     */
    public function hasCpSection()
    {
        return false;
    }

    /**
     */
    public function onBeforeInstall()
    {
    }

    /**
     */
    public function onAfterInstall()
    {
    }

    /**
     */
    public function onBeforeUninstall()
    {
    }

    /**
     */
    public function onAfterUninstall()
    {
    }

}
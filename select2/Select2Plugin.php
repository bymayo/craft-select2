<?php
/**
 * Select2
 *
 * @author    Jason Mayo
 * @twitter   @madebymayo
 * @package   Points
 *
 */

namespace Craft;

class Select2Plugin extends BasePlugin
{
	
    public function init()
    {
		craft()->templates->includeCssResource('select2/css/style.css');
		craft()->templates->includeJsResource('select2/js/settings.js');
    }

    public function getName()
    {
         return Craft::t('Select2');
    }

    public function getDescription()
    {
        return Craft::t('Fieldtype that uses the popular Select2 jQuery plugin as a replacement to <select> fields.');
    }

    public function getDocumentationUrl()
    {
        return 'https://github.com/madebyshape/select2/blob/master/README.md';
    }

    public function getReleaseFeedUrl()
    {
        return 'https://raw.githubusercontent.com/madebyshape/select2/master/releases.json';
    }

    public function getVersion()
    {
        return '1.0.0';
    }

    public function getSchemaVersion()
    {
        return '1.0.0';
    }

    public function getDeveloper()
    {
        return 'Jason Mayo';
    }

    public function getDeveloperUrl()
    {
        return 'http://bymayo.co.uk';
    }

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
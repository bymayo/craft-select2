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
        return 'https://github.com/bymayo/select2/blob/master/README.md';
    }

    public function getReleaseFeedUrl()
    {
        return 'https://raw.githubusercontent.com/bymayo/select2/master/releases.json';
    }

    public function getVersion()
    {
        return '1.0.1';
    }

    public function getSchemaVersion()
    {
        return '1.0.1';
    }

    public function getDeveloper()
    {
        return 'ByMayo';
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
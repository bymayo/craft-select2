<?php
/**
 * Select2 plugin for Craft CMS
 *
 * Select2 FieldType
 *
 * @author    Jason Mayo
 * @copyright Copyright (c) 2016 Jason Mayo
 * @link      bymayo.co.uk
 * @package   Select2
 * @since     1.0.0
 */

namespace Craft;

class Select2FieldType extends BaseFieldType
{
	
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
    public function defineContentAttribute()
    {
        return AttributeType::Mixed;
    }
    
    /*
	 * Get JSON folder path
	 */
    public function getJsonFolderPath()
    {
	    
	    $config = craft()->config->get('select2'); // Make Global
	    
		$templateFolderPath = craft()->path->getSiteTemplatesPath(); // Make Global
		
		$jsonFolder = ($config['jsonFolder']) ? $config['jsonFolder'] : 'select2';
		
		return $jsonFolderPath = $templateFolderPath . $jsonFolder . '/';
	    
    }
    
    /*
	 * Get JSON Files
	 */
    public function getJsonFiles()
    {
	    
	    $jsonFolderPath = $this->getJsonFolderPath();

		$jsonFiles = [];
				
		if (IOHelper::folderExists($jsonFolderPath)) {
			foreach(glob($jsonFolderPath . '*.json', GLOB_BRACE) as $jsonFile) {
				//array_push($jsonFiles, str_replace($jsonFolderPath, "", $jsonFile));
				$jsonFileName = str_replace($jsonFolderPath, "", $jsonFile);
				$jsonFiles[$jsonFileName] = $jsonFileName;
			}
			return $jsonFiles;
		}
	    
    }
    
    /*
	 * Get JSON File Options
	 */
    public function getJsonFileOptions($list, $json = null)
    {
	    
        // Get List	    
	    if ($list === 'json') {
	        $jsonList = $this->getJsonFolderPath() . $json;		    
	    }
	    else {
	        $jsonList = UrlHelper::getResourceUrl('select2/json/' . $list . '.json');
	    }

        // Get List Contents
        $json = file_get_contents($jsonList);
        
        // Decode to Array
		return json_decode($json, TRUE);
	    
    }

    /**
     * @param string $name
     * @param mixed  $value
     * @return string
     */
    public function getInputHtml($name, $value)
    {
        if (!$value) $value = new Select2Model();

		// Get Field Settings
		$settings = $this->getSettings();

		// Reformat the input name into something that looks more like an ID
        $id = craft()->templates->formatInputId($name);
        
        // Figure out what that ID is going to look like once it has been namespaced
        $namespacedId = craft()->templates->namespaceInputId($id);
        
        // Options to pass to fieldtype jQuery plugin
        $pluginOptions = array(
            'namespaceId' => $namespacedId,
            'limit' => $settings->limit,
            'placeholder' => $settings->placeholder
		);

        $pluginOptions = json_encode($pluginOptions);
        
        // Include Select2
        craft()->templates->includeCssResource('select2/vendor/select2/dist/css/select2.min.css');
        craft()->templates->includeJsResource('select2/vendor/select2/dist/js/select2.full.min.js');
        
        // Include field CSS & JS
        craft()->templates->includeCssResource('select2/css/style.css');
        craft()->templates->includeJsResource('select2/js/field.js');

		// Initialise jQuery plugin and pass options
        craft()->templates->includeJs("$('#{$namespacedId}').Select2FieldType(".$pluginOptions.");");

		// Options to pass to field
        $fieldOptions = array(
            'id' => $id,
            'name' => $name,
            'namespaceId' => $namespacedId,
            'prefix' => craft()->templates->namespaceInputId(""),
            'settings' => $settings,
            'value' => $value,
            'options' => $this->getJsonFileOptions($settings->list, $settings->jsonFile)
		);

        return craft()->templates->render('select2/field/field.twig', $fieldOptions);
    }
    
    protected function defineSettings()
    {
        return array(
            'list' => array(AttributeType::String),
            'jsonFile' => array(AttributeType::String),
            'placeholder' => array(AttributeType::String),
            'multiple' => array(AttributeType::String),
            'limit' => array(AttributeType::String)
        );
    }
    
    public function getSettingsHtml()
    {
	    
        return craft()->templates->render('select2/field/settings.twig', array(
            'settings' => $this->getSettings(),
            'jsonFiles' => $this->getJsonFiles()
        ));
    }
    
    public function prepSettings($settings)
    {
        return $settings;
    }

    /**
     * @param mixed $value
     * @return mixed
     */
    public function prepValueFromPost($value)
    {
        return $value;
    }

    /**
     * @param mixed $value
     * @return mixed
     */
    public function prepValue($value)
    {
        return $value;
    }
}
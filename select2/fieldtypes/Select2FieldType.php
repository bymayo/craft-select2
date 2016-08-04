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

class Select2FieldType extends BaseFieldType
{
	
	
    /**
     * Get Name
     *
	 * @return mixed
     */
    public function getName()
    {
        return Craft::t('Select2');
    }

    /**
     * Entries - List
     *
	 * @return mixed
     */
    public function defineContentAttribute()
    {
        return AttributeType::Mixed;
    }
    
    /**
     * Get JSON Folder Path
     *
	 * @return string
     */
    public function getJsonFolderPath()
    {
	    
	    $config = craft()->config->get('select2'); // Make Global
	    
		$templateFolderPath = craft()->path->getSiteTemplatesPath(); // Make Global
		
		$jsonFolder = ($config['jsonFolder']) ? $config['jsonFolder'] : 'select2';
		
		return $jsonFolderPath = $templateFolderPath . $jsonFolder . '/';
	    
    }
    
    /**
     * Get JSON Files
     *
	 * @return array
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
    
    /**
     * Get JSON File Options
     *
	 * @return array
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
     * Get Input HTML (Field Main Function)
     *
	 * @return mixed
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
            'limit' => ($settings->limit) ? $settings->limit : 1,
            'placeholder' => ($settings->placeholder) ? $settings->placeholder : 'Select an Option',
		);

        $pluginOptions = json_encode($pluginOptions);
        
        craft()->templates->includeCssResource('select2/vendor/select2/css/select2.css');
        craft()->templates->includeJsResource('select2/vendor/select2/js/select2.full.js');
        
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
    
    /**
     * Define Settings
     *
	 * @return array
     */
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
    
    /**
     * Get Settings HTML
     *
	 * @return mixed
     */
    public function getSettingsHtml()
    {
	    
        return craft()->templates->render('select2/field/settings.twig', array(
            'settings' => $this->getSettings(),
            'jsonFiles' => $this->getJsonFiles()
        ));
    }
    
    /**
     * Prep Settings
     *
	 * @return mixed
     */
    public function prepSettings($settings)
    {
        return $settings;
    }

    /**
     * Prep Value from Post
     *
	 * @return mixed
     */
    public function prepValueFromPost($value)
    {
        return $value;
    }

    /**
     * Prep Value
     *
	 * @return mixed
     */
    public function prepValue($value)
    {
        return $value;
    }
}
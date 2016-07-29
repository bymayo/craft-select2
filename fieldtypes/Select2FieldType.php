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

    /**
     * @param string $name
     * @param mixed  $value
     * @return string
     */
    public function getInputHtml($name, $value)
    {
        if (!$value)
            $value = new Select2Model();

		// Reformat the input name into something that looks more like an ID
        $id = craft()->templates->formatInputId($name);
        
        // Figure out what that ID is going to look like once it has been namespaced
        $namespacedId = craft()->templates->namespaceInputId($id);
        
/*
        Select2::log($id);
        Select2::log($namespacedId);
*/
        
        $jsonVars = array(
            'id' => $id,
            'name' => $name,
            'namespace' => $namespacedId,
            'prefix' => craft()->templates->namespaceInputId("")
		);

        $jsonVars = json_encode($jsonVars);
        
        craft()->templates->includeCssResource('select2/vendor/select2/dist/css/select2.min.css');
        craft()->templates->includeJsResource('select2/vendor/select2/dist/js/select2.full.min.js');
        
        craft()->templates->includeCssResource('select2/css/style.css');
        craft()->templates->includeJsResource('select2/js/script.js');

        craft()->templates->includeJs("$('#{$namespacedId}').Select2FieldType(" . $jsonVars . ");");

        $variables = array(
            'id' => $id,
            'name' => $name,
            'namespaceId' => $namespacedId,
            'value' => $value,
            'options' => [
            	['label' => 'Select', 'value' => 'Test'],
            	['label' => 'Select', 'value' => 'Test'],
            	['label' => 'Select', 'value' => 'Test'],
            	['label' => 'Select', 'value' => 'Test'],
            	['label' => 'Select', 'value' => 'Test']
            ]
            );

        return craft()->templates->render('select2/field/field.twig', $variables);
    }
    
    protected function defineSettings()
    {
        return array(
            'multiple' => array(AttributeType::String),
            'limit' => array(AttributeType::String),
            'list' => array(AttributeType::String),
            'json' => array(AttributeType::String)
        );
    }
    
    public function getSettingsHtml()
    {
        return craft()->templates->render('select2/field/settings.twig', array(
            'settings' => $this->getSettings()
        ));
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
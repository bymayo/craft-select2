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

        $id = craft()->templates->formatInputId($name);
        $namespacedId = craft()->templates->namespaceInputId($id);

        craft()->templates->includeCssResource('select2/css/style.css');
        craft()->templates->includeJsResource('select2/js/script.js');
        
        craft()->templates->includeCssResource('select2/vendor/select2/css/select2.min.css');
        craft()->templates->includeJsResource('select2/vendor/select2/js/select2.full.min.js');

/* -- Variables to pass down to our field.js */

        $jsonVars = array(
            'id' => $id,
            'name' => $name,
            'namespace' => $namespacedId,
            'prefix' => craft()->templates->namespaceInputId(""),
            );

        $jsonVars = json_encode($jsonVars);
        craft()->templates->includeJs("$('#{$namespacedId}').Select2FieldType(" . $jsonVars . ");");

/* -- Variables to pass down to our rendered template */

        $variables = array(
            'id' => $id,
            'name' => $name,
            'namespaceId' => $namespacedId,
            'value' => $value,
            'options' => [['label' => 'Select', 'value' => 'Test']]
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
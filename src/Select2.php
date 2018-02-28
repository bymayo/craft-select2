<?php
/**
 * Select2 plugin for Craft CMS 3.x
 *
 * Fieldtype that uses the Select2 jQuery plugin as a replacement to <select> fields to enable better filtering of options.
 *
 * @link      http://bymayo.co.uk
 * @copyright Copyright (c) 2018 ByMayo
 */

namespace bymayo\select2;

use bymayo\select2\models\Settings;
use bymayo\select2\fields\Select2Field as Select2FieldField;

use Craft;
use craft\base\Plugin;
use craft\services\Plugins;
use craft\events\PluginEvent;
use craft\services\Fields;
use craft\events\RegisterComponentTypesEvent;

use yii\base\Event;

/**
 * Class Select2
 *
 * @author    ByMayo
 * @package   Select2
 * @since     2.0.0
 *
 */
class Select2 extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * @var Select2
     */
    public static $plugin;

    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $schemaVersion = '2.0.0';

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;

        Event::on(
            Fields::class,
            Fields::EVENT_REGISTER_FIELD_TYPES,
            function (RegisterComponentTypesEvent $event) {
                $event->types[] = Select2FieldField::class;
            }
        );

        Event::on(
            Plugins::class,
            Plugins::EVENT_AFTER_INSTALL_PLUGIN,
            function (PluginEvent $event) {
                if ($event->plugin === $this) {
                }
            }
        );

        Craft::info(
            Craft::t(
                'select2',
                '{name} plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );
    }

    // Protected Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    protected function createSettingsModel()
    {
        return new Settings();
    }

    /**
     * @inheritdoc
     */
    protected function settingsHtml(): string
    {
        return Craft::$app->view->renderTemplate(
            'select2/settings',
            [
                'settings' => $this->getSettings()
            ]
        );
    }
}

<?php

namespace Kanboard\Plugin\TagManager;

use Kanboard\Core\Translator;
use Kanboard\Core\Plugin\Base;

class Plugin extends Base
{

    public function initialize()
    {
        // Template - Override name should be camelCase e.g. pluginNameExampleCamelCase
        $this->template->setTemplateOverride('project_tag/index', 'tagManager:project_tag/index');
        $this->template->setTemplateOverride('tag/index', 'tagManager:tag/index');

        // CSS - Asset Hook - keep filename lowercase
        $this->hook->on('template:layout:css', array('template' => 'plugins/TagManager/Assets/css/tag-manager.css'));
    }

    public function onStartup()
    {
        Translator::load($this->languageModel->getCurrentLanguage(), __DIR__.'/Locale');
    }

    public function getPluginName()
    {
        return 'TagManager';
    }

    public function getPluginDescription()
    {
        return t('Simplify tags');
    }

    public function getPluginAuthor()
    {
        return 'aljawaid';
    }

    public function getPluginVersion()
    {
        return '1.0.0';
    }

    public function getCompatibleVersion()
    {
        return '>=1.2.20';
    }

    public function getPluginHomepage()
    {
        return 'https://github.com/aljawaid/TagManager';
    }

}

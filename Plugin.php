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

        // Views - Template Hook
        //  - Override name should start lowercase e.g. pluginNameExampleCamelCase
        $this->template->hook->attach('template:project:dropdown', 'tagManager:project_header/dropdown');
        $this->template->hook->attach('template:task:details:bottom', 'tagManager:task/details');

        // CSS - Asset Hook - keep filename lowercase
        $this->hook->on('template:layout:css', array('template' => 'plugins/TagManager/Assets/css/tag-manager.css'));

        // Add Filter
        $tagmodel = $this->tagModel;
        $this->template->hook->attachCallable('template:app:filters-helper:after', 'tagManager:tagfilter', function ($array = array()) use ($tagmodel) {
            if (!empty($array) && $array['id'] >= 1) {
                $project = $this->projectModel->getById($array['id']);

                return ['taglist' => $tagmodel->getAssignableList($array['id'], $project['enable_global_tags'])];
            } else {
                // get global tags
                return ['taglist' => $this->db->hashtable($tagmodel::TABLE)->eq('project_id', 0)->asc('name')->getAll('id', 'name')];
            }
        });
    }

    public function onStartup()
    {
        Translator::load($this->languageModel->getCurrentLanguage(), __DIR__ . '/Locale');
    }

    public function getPluginName()
    {
        return 'TagManager';
    }

    public function getPluginDescription()
    {
        return t('Use tags like you have never used them before. This plugin revamps the whole project and global tags concept to provide the user with a clearer process of creating and associating tags to better improve their workflow.');
    }

    public function getPluginAuthor()
    {
        return 'aljawaid';
    }

    public function getPluginVersion()
    {
        return '1.6.0';
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

<?php

namespace Kanboard\Plugin\TagManager;

use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Translator;

/**
 * Registers TagManager templates, assets and filter integration.
 *
 * Related test file: tests/PluginIntegrationTest.php.
 */
class Plugin extends Base
{
    public function initialize()
    {
        // Register shared presentation logic before rendering plugin templates.
        $this->helper->register(
            'tagManager',
            '\Kanboard\Plugin\TagManager\Helper\TagManagerHelper'
        );

        // Template overrides retain Kanboard's native tag actions and permissions.
        $this->template->setTemplateOverride('project_tag/index', 'tagManager:project_tag/index');
        $this->template->setTemplateOverride('tag/index', 'tagManager:tag/index');

        // Template hooks add navigation, task details and filters.
        $this->template->hook->attach('template:project:dropdown', 'tagManager:project_header/dropdown');
        $this->template->hook->attach('template:task:details:bottom', 'tagManager:task/details');

        // Load the plugin presentation as a static asset.
        $this->hook->on('template:layout:css', array('template' => 'plugins/TagManager/Assets/css/tag-manager.css'));

        // Add a tag filter without trusting optional hook context or missing projects.
        $tagModel = $this->tagModel;
        $this->template->hook->attachCallable(
            'template:app:filters-helper:after',
            'tagManager:tagfilter',
            function (array $context = array()) use ($tagModel) {
                $projectId = isset($context['id']) && is_scalar($context['id'])
                    ? filter_var($context['id'], FILTER_VALIDATE_INT, array('options' => array('min_range' => 1)))
                    : false;

                if ($projectId !== false) {
                    $project = $this->projectModel->getById($projectId);
                    if (!empty($project)) {
                        return array(
                            'taglist' => $tagModel->getAssignableList(
                                $projectId,
                                !empty($project['enable_global_tags'])
                            ),
                        );
                    }
                }

                return array('taglist' => $tagModel->getAssignableList(0, false));
            }
        );
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

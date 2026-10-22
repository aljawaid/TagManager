<?php

namespace Kanboard\Plugin\TagManager;

use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Security\Role;
use Kanboard\Core\Translator;

/**
 * Registers TagManager templates, assets, settings and filter integration.
 *
 * Related test files: tests/PluginIntegrationTest.php and
 * tests/SettingsIntegrationTest.php.
 */
class Plugin extends Base
{
    public const DISPLAY_MODE_KEY = 'tag_manager_display_mode';
    public const DISPLAY_MODE_COLORED = 'colored';
    public const DISPLAY_MODE_TRANSPARENT = 'transparent';

    public function initialize()
    {
        // Tag display settings affect every user and are restricted to administrators.
        $this->applicationAccessMap->add('TagManagerController', '*', Role::APP_ADMIN);
        $this->route->addRoute('/settings/tag-manager', 'TagManagerController', 'show', 'TagManager');

        // Register shared presentation logic before rendering plugin templates.
        $this->helper->register(
            'tagManager',
            '\Kanboard\Plugin\TagManager\Helper\TagManagerHelper'
        );

        // Template overrides retain Kanboard's native tag actions and permissions.
        $this->template->setTemplateOverride('project_tag/index', 'tagManager:project_tag/index');
        $this->template->setTemplateOverride('tag/index', 'tagManager:tag/index');

        // Template hooks add navigation, task details, filters and administrator settings.
        $this->template->hook->attach('template:project:dropdown', 'tagManager:project_header/dropdown');
        $this->template->hook->attach('template:task:details:bottom', 'tagManager:task/details');
        $this->template->hook->attach('template:config:sidebar', 'tagManager:config/sidebar');

        // Load the optional mode as a separate static asset to remain CSP-compatible.
        $this->hook->on('template:layout:css', array('template' => 'plugins/TagManager/Assets/css/tag-manager.css'));
        if ($this->configModel->get(self::DISPLAY_MODE_KEY, self::DISPLAY_MODE_COLORED) === self::DISPLAY_MODE_TRANSPARENT) {
            $this->hook->on(
                'template:layout:css',
                array('template' => 'plugins/TagManager/Assets/css/tag-manager-transparent.css')
            );
        }

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
        return t('Manage project and global tags with clearer navigation, filtering, styling references and accessible display options.');
    }

    public function getPluginAuthor()
    {
        return 'aljawaid';
    }

    public function getPluginVersion()
    {
        return '1.7.1';
    }

    public function getCompatibleVersion()
    {
        return '>=1.2.54';
    }

    public function getPluginHomepage()
    {
        return 'https://github.com/aljawaid/TagManager';
    }
}

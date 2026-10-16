<?php

/**
 * Verifies Plugin.php, Controller/TagManagerController.php,
 * Template/config/settings.php and Assets/css/tag-manager-transparent.css.
 */

use Kanboard\Controller\BaseController;
use Kanboard\Core\Security\Role;
use Kanboard\Plugin\TagManager\Controller\TagManagerController;
use Kanboard\Plugin\TagManager\Plugin;

foreach (array('show', 'save') as $action) {
    tagManagerAssertTrue(
        $container['applicationAuthorization']->isAllowed('TagManagerController', $action, Role::APP_ADMIN),
        'Administrators must retain access to TagManagerController::' . $action . '.'
    );
    tagManagerAssertFalse(
        $container['applicationAuthorization']->isAllowed('TagManagerController', $action, Role::APP_USER),
        'Ordinary users must not access TagManagerController::' . $action . '.'
    );
}

tagManagerAssertSame(
    BaseController::class,
    get_parent_class(TagManagerController::class),
    'The settings controller must not inherit unrelated administrator actions.'
);

$controllerSource = file_get_contents(__DIR__ . '/../Controller/TagManagerController.php');
tagManagerAssertContains('isPost()', $controllerSource, 'Settings writes must require POST requests.');
tagManagerAssertContains('checkCSRFForm()', $controllerSource, 'Settings writes must validate CSRF tokens.');
tagManagerAssertContains('ALLOWED_SETTINGS', $controllerSource, 'Settings writes must use an explicit field allowlist.');
tagManagerAssertContains('array_diff(array_keys($submitted)', $controllerSource, 'Unexpected setting names must be rejected.');

$settingsMarkup = $container['template']->render('tagManager:config/settings', array(
    'values' => array(Plugin::DISPLAY_MODE_KEY => Plugin::DISPLAY_MODE_TRANSPARENT),
    'errors' => array(),
));
tagManagerAssertContains('name="tag_manager_display_mode"', $settingsMarkup, 'The settings form must render the display choice.');
tagManagerAssertContains('value="transparent"', $settingsMarkup, 'The transparent option must be available.');
tagManagerAssertContains('csrf_token', $settingsMarkup, 'The settings form must include Kanboard CSRF protection.');

$transparentCss = file_get_contents(__DIR__ . '/../Assets/css/tag-manager-transparent.css');
tagManagerAssertContains(
    '.task-tags .task-tag[class*="color-"]',
    $transparentCss,
    'Transparent mode must be scoped to rendered task tags.'
);
tagManagerAssertNotContains(
    '.project-tags-table',
    $transparentCss,
    'Transparent mode must not hide colours in the administrator preview table.'
);

$container['configModel']->save(array(Plugin::DISPLAY_MODE_KEY => Plugin::DISPLAY_MODE_TRANSPARENT));
$container['memoryCache']->flush();
tagManagerAssertSame(
    Plugin::DISPLAY_MODE_TRANSPARENT,
    $container['configModel']->get(Plugin::DISPLAY_MODE_KEY),
    'Kanboard configuration storage must retain the selected display mode without a schema migration.'
);

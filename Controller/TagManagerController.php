<?php

namespace Kanboard\Plugin\TagManager\Controller;

use Kanboard\Controller\BaseController;
use Kanboard\Core\Controller\AccessForbiddenException;
use Kanboard\Plugin\TagManager\Plugin;

/**
 * Displays and saves administrator-only TagManager presentation settings.
 *
 * Related test file: tests/SettingsIntegrationTest.php.
 */
class TagManagerController extends BaseController
{
    public const ALLOWED_SETTINGS = array(Plugin::DISPLAY_MODE_KEY);

    /**
     * Display TagManager settings.
     *
     * @param  array $values
     * @param  array $errors
     * @return void
     */
    public function show(array $values = array(), array $errors = array())
    {
        $this->assertAdmin();

        if ($values === array()) {
            $values = array(
                Plugin::DISPLAY_MODE_KEY => $this->configModel->get(
                    Plugin::DISPLAY_MODE_KEY,
                    Plugin::DISPLAY_MODE_COLORED
                ),
            );
        }

        $this->response->html($this->helper->layout->config('tagManager:config/settings', array(
            'title' => t('Settings') . ' &gt; ' . t('Tag appearance'),
            'values' => $values,
            'errors' => $errors,
        )));
    }

    /**
     * Save the validated display mode.
     *
     * @return void
     */
    public function save()
    {
        $this->assertAdmin();

        if (!$this->request->isPost()) {
            throw new AccessForbiddenException();
        }

        $this->checkCSRFForm();

        $submitted = $this->request->getValues();
        if (array_diff(array_keys($submitted), self::ALLOWED_SETTINGS) !== array()) {
            throw new AccessForbiddenException();
        }

        $mode = isset($submitted[Plugin::DISPLAY_MODE_KEY]) && is_scalar($submitted[Plugin::DISPLAY_MODE_KEY])
            ? trim((string) $submitted[Plugin::DISPLAY_MODE_KEY])
            : '';
        $allowedModes = array(Plugin::DISPLAY_MODE_COLORED, Plugin::DISPLAY_MODE_TRANSPARENT);

        if (!in_array($mode, $allowedModes, true)) {
            $this->show(
                array(Plugin::DISPLAY_MODE_KEY => $mode),
                array(Plugin::DISPLAY_MODE_KEY => array(t('Select one of the available options.')))
            );
            return;
        }

        if ($this->configModel->save(array(Plugin::DISPLAY_MODE_KEY => $mode))) {
            $this->languageModel->loadCurrentLanguage();
            $this->flash->success(t('Tag appearance settings saved successfully.'));
        } else {
            $this->flash->failure(t('Unable to save tag appearance settings.'));
        }

        $this->response->redirect($this->helper->url->to(
            'TagManagerController',
            'show',
            array('plugin' => 'TagManager')
        ));
    }

    /**
     * Keep direct calls inside the administrator boundary as defence in depth.
     *
     * @return void
     */
    private function assertAdmin()
    {
        if (!$this->userSession->isAdmin()) {
            throw new AccessForbiddenException();
        }
    }
}

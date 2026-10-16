<?php

use Kanboard\Plugin\TagManager\Plugin;

// The administrator and request-integrity boundaries are covered by tests/SettingsIntegrationTest.php.
$displayMode = isset($values[Plugin::DISPLAY_MODE_KEY])
    ? $values[Plugin::DISPLAY_MODE_KEY]
    : Plugin::DISPLAY_MODE_COLORED;
?>
<div class="page-header">
    <h2>
        <?= t('Tag appearance') ?>
        <?= $this->app->tooltipHTML($this->text->e(t('Choose how tags are displayed on task cards and task details for every user.'))) ?>
    </h2>
</div>

<form method="post" action="<?= $this->url->href('TagManagerController', 'save', array('plugin' => 'TagManager')) ?>" autocomplete="off">
    <?= $this->form->csrf() ?>

    <fieldset class="tag-manager-settings">
        <legend><?= t('Tag style') ?></legend>

        <div class="tag-manager-setting-option">
            <?= $this->form->radio(
                Plugin::DISPLAY_MODE_KEY,
                t('Coloured tags'),
                Plugin::DISPLAY_MODE_COLORED,
                $displayMode === Plugin::DISPLAY_MODE_COLORED
            ) ?>
            <p class="form-help"><?= t('Keep the current filled tag colours.') ?></p>
        </div>

        <div class="tag-manager-setting-option">
            <?= $this->form->radio(
                Plugin::DISPLAY_MODE_KEY,
                t('Transparent tags'),
                Plugin::DISPLAY_MODE_TRANSPARENT,
                $displayMode === Plugin::DISPLAY_MODE_TRANSPARENT
            ) ?>
            <p class="form-help"><?= t('Remove tag fills while retaining the configured colour as a border, improving contrast on coloured task cards.') ?></p>
        </div>

        <?php if (isset($errors[Plugin::DISPLAY_MODE_KEY])): ?>
            <ul class="form-errors">
                <?php foreach ($errors[Plugin::DISPLAY_MODE_KEY] as $error): ?>
                    <li><?= $this->text->e($error) ?></li>
                <?php endforeach ?>
            </ul>
        <?php endif ?>
    </fieldset>

    <div class="form-actions">
        <button type="submit" class="btn btn-blue">
            <i class="fa fa-save" aria-hidden="true"></i> <?= t('Save') ?>
        </button>
        <?= $this->url->link(t('Back to Settings'), 'ConfigController', 'index', array(), false, 'btn') ?>
    </div>
</form>

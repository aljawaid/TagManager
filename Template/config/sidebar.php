<?php

// Adds TagManager to Kanboard's administrator settings navigation.
?>
<li <?= $this->app->checkMenuSelection('TagManagerController', 'show', 'TagManager') ?>>
    <?= $this->url->link(t('Tag appearance'), 'TagManagerController', 'show', array('plugin' => 'TagManager')) ?>
</li>

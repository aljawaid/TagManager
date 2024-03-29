<?php
    $tags = $this->model->tagModel->getAllByProject($project['id']);
    $tagsCount = count($tags);
?>
<?php if ($this->user->hasProjectAccess('ProjectEditController', 'show', $project['id'])): ?>
    <li <?= $this->app->checkMenuSelection('ProjectTagController') ?>>
        <?= $this->url->link('
            <svg width="20px" height="20px" class="project-tags" version="1.1" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="CurrentColor">
                <g fill="none" fill-rule="evenodd" stroke="none" stroke-width="1">
                    <g fill="CurrentColor">
                        <path d="M6.2653953,5 L4.99961498,5 C3.89525812,5 3,5.88743329 3,6.99961498 L3,15 L16.3809027,28.3809027 C17.1646418,29.1646418 18.433119,29.1668566 19.2115341,28.3884415 L19.8626502,27.7373254 C20.6198849,28.1384197 21.5780112,28.0219644 22.2115341,27.3884415 L29.3884415,20.2115341 C30.168017,19.4319586 30.1640508,18.1640508 29.3809027,17.3809027 L16,4 L7.99961498,4 C7.25796139,4 6.61061281,4.40023868 6.2653953,5 L6.2653953,5 L6.2653953,5 Z M6,6 L5.00844055,6 C4.45149422,6 4,6.45699692 4,7.00844055 L4,14.5 L17.0998579,27.671163 C17.488383,28.0618028 18.1183535,28.0613199 18.5042948,27.672744 L19.0865321,27.0865321 L6,14 L6,6 L6,6 Z M15.5,5 L8.00844055,5 C7.45149422,5 7,5.45699692 7,6.00844055 L7,13.5 L20.0998579,26.671163 C20.488383,27.0618028 21.1183535,27.0613199 21.5042948,26.672744 L28.6678854,19.4602516 C29.0550094,19.0704849 29.0531075,18.4413912 28.6620109,18.0535183 L15.5,5 L15.5,5 Z M11.5,12 C12.8807119,12 14,10.8807119 14,9.5 C14,8.11928806 12.8807119,7 11.5,7 C10.1192881,7 9,8.11928806 9,9.5 C9,10.8807119 10.1192881,12 11.5,12 L11.5,12 Z M11.5,11 C12.3284272,11 13,10.3284272 13,9.5 C13,8.67157283 12.3284272,8 11.5,8 C10.6715728,8 10,8.67157283 10,9.5 C10,10.3284272 10.6715728,11 11.5,11 L11.5,11 Z"/>
                    </g>
                </g>
            </svg>' . t('Tags') . '<span class="tag-menu-count">' . $tagsCount . '</span>', 'ProjectTagController', 'index', array('project_id' => $project['id']), false, 'tag-manager-menu') ?>
        <span class="p-menu-global-link">
            <?= $this->url->link(t('Manage Global Tags'), 'TagController', 'index', array(), false, '', t('Go to Global Tags')) ?>
        </span>
    </li>
<?php else: ?>
    <li <?= $this->app->checkMenuSelection('ProjectTagController') ?>>
        <?= $this->url->link('
            <svg width="20px" height="20px" class="project-tags" version="1.1" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="CurrentColor">
                <g fill="none" fill-rule="evenodd" stroke="none" stroke-width="1">
                    <g fill="CurrentColor">
                        <path d="M6.2653953,5 L4.99961498,5 C3.89525812,5 3,5.88743329 3,6.99961498 L3,15 L16.3809027,28.3809027 C17.1646418,29.1646418 18.433119,29.1668566 19.2115341,28.3884415 L19.8626502,27.7373254 C20.6198849,28.1384197 21.5780112,28.0219644 22.2115341,27.3884415 L29.3884415,20.2115341 C30.168017,19.4319586 30.1640508,18.1640508 29.3809027,17.3809027 L16,4 L7.99961498,4 C7.25796139,4 6.61061281,4.40023868 6.2653953,5 L6.2653953,5 L6.2653953,5 Z M6,6 L5.00844055,6 C4.45149422,6 4,6.45699692 4,7.00844055 L4,14.5 L17.0998579,27.671163 C17.488383,28.0618028 18.1183535,28.0613199 18.5042948,27.672744 L19.0865321,27.0865321 L6,14 L6,6 L6,6 Z M15.5,5 L8.00844055,5 C7.45149422,5 7,5.45699692 7,6.00844055 L7,13.5 L20.0998579,26.671163 C20.488383,27.0618028 21.1183535,27.0613199 21.5042948,26.672744 L28.6678854,19.4602516 C29.0550094,19.0704849 29.0531075,18.4413912 28.6620109,18.0535183 L15.5,5 L15.5,5 Z M11.5,12 C12.8807119,12 14,10.8807119 14,9.5 C14,8.11928806 12.8807119,7 11.5,7 C10.1192881,7 9,8.11928806 9,9.5 C9,10.8807119 10.1192881,12 11.5,12 L11.5,12 Z M11.5,11 C12.3284272,11 13,10.3284272 13,9.5 C13,8.67157283 12.3284272,8 11.5,8 C10.6715728,8 10,8.67157283 10,9.5 C10,10.3284272 10.6715728,11 11.5,11 L11.5,11 Z"/>
                    </g>
                </g>
            </svg>' . t('Tags') . '<span class="tag-menu-count">' . $tagsCount . '</span>', 'ProjectViewController', 'show', array('project_id' => $project['id']), false, 'disabled-link') ?>
    </li>
<?php endif ?>

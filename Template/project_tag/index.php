<?php
    $gTags = $this->model->tagModel->getAllByProject(0);
    $gTagsCount = count($gTags);
    $tagsCount = count($tags);
?>

    <div id="ProjectTags" class="tag-page-header">
        <h2 class="">
            <img src="/plugins/TagManager/Assets/icons/project-tags.svg" width="22px" height="22px" class="project-tags">
            <?= t('Project Tags') ?>
        </h2>
    </div>
    <div class="tag-bar">
        <div class="project-tags-bar">
            <svg width="32px" height="32px" class="project-tags" version="1.1" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill='CurrentColor'>
                <g fill="none" fill-rule="evenodd" id="" stroke="none" stroke-width="1">
                    <g fill="CurrentColor" id="">
                        <path d="M6.2653953,5 L4.99961498,5 C3.89525812,5 3,5.88743329 3,6.99961498 L3,15 L16.3809027,28.3809027 C17.1646418,29.1646418 18.433119,29.1668566 19.2115341,28.3884415 L19.8626502,27.7373254 C20.6198849,28.1384197 21.5780112,28.0219644 22.2115341,27.3884415 L29.3884415,20.2115341 C30.168017,19.4319586 30.1640508,18.1640508 29.3809027,17.3809027 L16,4 L7.99961498,4 C7.25796139,4 6.61061281,4.40023868 6.2653953,5 L6.2653953,5 L6.2653953,5 Z M6,6 L5.00844055,6 C4.45149422,6 4,6.45699692 4,7.00844055 L4,14.5 L17.0998579,27.671163 C17.488383,28.0618028 18.1183535,28.0613199 18.5042948,27.672744 L19.0865321,27.0865321 L6,14 L6,6 L6,6 Z M15.5,5 L8.00844055,5 C7.45149422,5 7,5.45699692 7,6.00844055 L7,13.5 L20.0998579,26.671163 C20.488383,27.0618028 21.1183535,27.0613199 21.5042948,26.672744 L28.6678854,19.4602516 C29.0550094,19.0704849 29.0531075,18.4413912 28.6620109,18.0535183 L15.5,5 L15.5,5 Z M11.5,12 C12.8807119,12 14,10.8807119 14,9.5 C14,8.11928806 12.8807119,7 11.5,7 C10.1192881,7 9,8.11928806 9,9.5 C9,10.8807119 10.1192881,12 11.5,12 L11.5,12 Z M11.5,11 C12.3284272,11 13,10.3284272 13,9.5 C13,8.67157283 12.3284272,8 11.5,8 C10.6715728,8 10,8.67157283 10,9.5 C10,10.3284272 10.6715728,11 11.5,11 L11.5,11 Z" id=""/>
                    </g>
                </g>
            </svg>
            <h3 class=""><?= t('Project') ?></h3>
            <ul class="no-bullet">
                <?php if (!empty($tags)): ?>
                    <li class=""><?= $tagsCount ?> <?= t('Tags apply to this project') ?></li>
                <?php endif ?>
            <li class="">
                <?= $this->modal->medium('plus-project-tag', t('Add Project Tag'), 'ProjectTagController', 'create', array('project_id' => $project['id'])) ?>
            </li>

            </ul>
        </div>
        <div class="global-tags-bar">
            <svg width="32px" height="32px" class="global-tag-filled-icon" version="1.1" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill='CurrentColor'>
                <g fill="none" fill-rule="evenodd" id="" stroke="none" stroke-width="1">
                    <g fill="CurrentColor" id="">
                        <path d="M10.7649167,6.02409559 L16.0037425,6.02409559 L29.3846453,19.4049983 C30.1677933,20.1881464 30.1717595,21.4560542 29.392184,22.2356297 L22.2152766,29.4125371 C21.4368615,30.1909522 20.1683843,30.1887374 19.3846453,29.4049983 L6.00374252,16.0240956 L6.00374252,8.02371058 C6.00374252,7.07362502 6.6570569,6.28754955 7.53593968,6.07859634 C7.73291495,6.39703093 7.88811246,6.78815311 7.9807891,7.25523675 C8.79027937,11.3350097 9.59845958,12.8019128 11.4263495,13.0295277 C11.4321936,13.0302554 11.4381757,13.0279965 11.4442807,13.0229386 C11.4640059,13.0237075 11.4838289,13.0240956 11.5037425,13.0240956 C12.3321697,13.0240956 13.0037425,12.3525228 13.0037425,11.5240956 C13.0037425,10.8387248 12.5440837,10.2607132 11.9162291,10.0815238 C11.9163876,10.0741545 11.9161745,10.0699168 11.9155714,10.0690403 C11.6445643,9.67519661 11.3088217,8.61374736 10.9234244,6.67137224 C10.8790088,6.44752126 10.8259603,6.23176583 10.7649167,6.02409559 L10.7649167,6.02409559 L10.7649167,6.02409559 Z M9.94254594,6.86599374 C9.0759337,2.49833017 4.38733577,1.88351324 2.58042986,4.75800079 C1.13153604,7.0629505 2.56511938,11.0240955 5.00374249,11.0240958 L5.00374261,10.0240958 C3.45185332,10.0240956 2.35552373,6.99481898 3.42705511,5.29019031 C4.76966148,3.15432632 8.27787688,3.61435941 8.96166752,7.06061524 C9.77057715,11.1374618 10.3806776,12.024096 12.0037427,12.0240954 L12.0037424,11.0240954 C11.0105849,11.0240958 10.6691155,10.5278522 9.94254594,6.86599374 L9.94254594,6.86599374 Z" id=""/>
                    </g>
                </g>
            </svg>
            <h3 class=""><?= t('Global') ?></h3>
            <ul class="no-bullet">
                <?php if (!empty($gTags)): ?>
                    <li class=""><?= $gTagsCount ?> <?= t('Global Tags Available') ?></li>
                <?php endif ?>
                <?php if ($this->user->isAdmin()): ?>
                    <li class="">
                        <?= $this->modal->medium('plus-global-tag', t('Add Global Tag'), 'TagController', 'create') ?>
                    </li>
                <?php endif ?>
                <li class="global-tag-settings-form">
                    <form method="post" action="<?= $this->url->href('ProjectTagController', 'updateSettings', array('project_id' => $project['id'])) ?>" autocomplete="off">
                        <?= $this->form->csrf() ?>
                        <?= $this->form->checkbox('enable_global_tags', t('Enable global tags for this project'), 1, $project['enable_global_tags'] == 1) ?>
                        <?= $this->modal->submitButtons() ?>
                    </form>
                </li>
            </ul>
        </div>
    </div>

<?php if (empty($tags)): ?>
    <p class="alert"><?= t('There is no specific tag for this project at the moment.') ?></p>

<?php else: ?>
    <details <?php if ($tagsCount < 10): ?> open="" <?php endif ?> class="tag-section-title">
        <summary class="sub-header">
            <svg width="22px" height="22px" class="project-tags" version="1.1" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill='CurrentColor'>
                <g fill="none" fill-rule="evenodd" id="" stroke="none" stroke-width="1">
                    <g fill="CurrentColor" id="">
                        <path d="M6.2653953,5 L4.99961498,5 C3.89525812,5 3,5.88743329 3,6.99961498 L3,15 L16.3809027,28.3809027 C17.1646418,29.1646418 18.433119,29.1668566 19.2115341,28.3884415 L19.8626502,27.7373254 C20.6198849,28.1384197 21.5780112,28.0219644 22.2115341,27.3884415 L29.3884415,20.2115341 C30.168017,19.4319586 30.1640508,18.1640508 29.3809027,17.3809027 L16,4 L7.99961498,4 C7.25796139,4 6.61061281,4.40023868 6.2653953,5 L6.2653953,5 L6.2653953,5 Z M6,6 L5.00844055,6 C4.45149422,6 4,6.45699692 4,7.00844055 L4,14.5 L17.0998579,27.671163 C17.488383,28.0618028 18.1183535,28.0613199 18.5042948,27.672744 L19.0865321,27.0865321 L6,14 L6,6 L6,6 Z M15.5,5 L8.00844055,5 C7.45149422,5 7,5.45699692 7,6.00844055 L7,13.5 L20.0998579,26.671163 C20.488383,27.0618028 21.1183535,27.0613199 21.5042948,26.672744 L28.6678854,19.4602516 C29.0550094,19.0704849 29.0531075,18.4413912 28.6620109,18.0535183 L15.5,5 L15.5,5 Z M11.5,12 C12.8807119,12 14,10.8807119 14,9.5 C14,8.11928806 12.8807119,7 11.5,7 C10.1192881,7 9,8.11928806 9,9.5 C9,10.8807119 10.1192881,12 11.5,12 L11.5,12 Z M11.5,11 C12.3284272,11 13,10.3284272 13,9.5 C13,8.67157283 12.3284272,8 11.5,8 C10.6715728,8 10,8.67157283 10,9.5 C10,10.3284272 10.6715728,11 11.5,11 L11.5,11 Z" id=""/>
                    </g>
                </g>
            </svg>
            <h3 class=""><?= t('Project Tags') ?></h3>
        </summary>
        <p class="tag-title-text"><?= t('The tags in this list are specific to this project') ?></p>
        <table id="" class="project-tags-table table-striped table-scrolling">
            <tr class="">
                <th class=""><?= t('Tag') ?></th>
                <th class=""><?= t('Colour') ?></th>
                <th class=""><?= t('Options') ?></th>
                <th class=""><?= t('Tag ID') ?></th>
            </tr>
        <?php foreach ($tags as $tag): ?>
            <tr class="">
                <td class=""><?= $this->text->e($tag['name']) ?></td>
                <td class=""><?= $this->text->e($colors[$tag['color_id']] ?? '') ?></td>
                <td class="tag-actions">
                    <ul class="">
                        <li class="">
                            <?= $this->modal->medium('project-edit-tag', t('Edit'), 'ProjectTagController', 'edit', array('tag_id' => $tag['id'], 'project_id' => $project['id'])) ?>
                        </li>
                        <?php if ($this->user->isAdmin()): ?>
                            <li class="">
                                <?= $this->modal->confirm('project-convert-tag', t('Change to global tag'), 'ProjectTagController', 'confirmMakeGlobalTag', array('tag_id' => $tag['id'], 'project_id' => $project['id'])) ?>
                            </li>
                        <?php endif ?>
                        <li class="">
                            <?= $this->modal->confirm('project-delete-tag', t('Delete'), 'ProjectTagController', 'confirm', array('tag_id' => $tag['id'], 'project_id' => $project['id'])) ?>
                        </li>
                    </ul>
                </td>
                <td class=""><?= $this->text->e($tag['id']) ?></td>
            </tr>
        <?php endforeach ?>
        </table>
    </details>
<?php endif ?>

    <details <?php if ($gTagsCount < 10): ?> open="" <?php endif ?> class="tag-section-title">
        <summary class="sub-header">
            <svg width="22px" height="22px" class="global-tag-filled-icon" version="1.1" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill='CurrentColor'>
                <g fill="none" fill-rule="evenodd" id="" stroke="none" stroke-width="1">
                    <g fill="CurrentColor" id="">
                        <path d="M10.7649167,6.02409559 L16.0037425,6.02409559 L29.3846453,19.4049983 C30.1677933,20.1881464 30.1717595,21.4560542 29.392184,22.2356297 L22.2152766,29.4125371 C21.4368615,30.1909522 20.1683843,30.1887374 19.3846453,29.4049983 L6.00374252,16.0240956 L6.00374252,8.02371058 C6.00374252,7.07362502 6.6570569,6.28754955 7.53593968,6.07859634 C7.73291495,6.39703093 7.88811246,6.78815311 7.9807891,7.25523675 C8.79027937,11.3350097 9.59845958,12.8019128 11.4263495,13.0295277 C11.4321936,13.0302554 11.4381757,13.0279965 11.4442807,13.0229386 C11.4640059,13.0237075 11.4838289,13.0240956 11.5037425,13.0240956 C12.3321697,13.0240956 13.0037425,12.3525228 13.0037425,11.5240956 C13.0037425,10.8387248 12.5440837,10.2607132 11.9162291,10.0815238 C11.9163876,10.0741545 11.9161745,10.0699168 11.9155714,10.0690403 C11.6445643,9.67519661 11.3088217,8.61374736 10.9234244,6.67137224 C10.8790088,6.44752126 10.8259603,6.23176583 10.7649167,6.02409559 L10.7649167,6.02409559 L10.7649167,6.02409559 Z M9.94254594,6.86599374 C9.0759337,2.49833017 4.38733577,1.88351324 2.58042986,4.75800079 C1.13153604,7.0629505 2.56511938,11.0240955 5.00374249,11.0240958 L5.00374261,10.0240958 C3.45185332,10.0240956 2.35552373,6.99481898 3.42705511,5.29019031 C4.76966148,3.15432632 8.27787688,3.61435941 8.96166752,7.06061524 C9.77057715,11.1374618 10.3806776,12.024096 12.0037427,12.0240954 L12.0037424,11.0240954 C11.0105849,11.0240958 10.6691155,10.5278522 9.94254594,6.86599374 L9.94254594,6.86599374 Z" id=""/>
                    </g>
                </g>
            </svg>
            <h3 class=""><?= t('Global Tags') ?></h3></summary>
        <p class="tag-title-text"><?= t('The tags in this list are global and available for any project') ?></p>


<?php if (empty($gTags)): ?>
    <p class="alert"><?= t('There are no global tags at the moment.') ?></p>

<?php else: ?>
    <table id="" class="table-striped table-scrolling">
        <tr class="">
            <th class=""><?= t('Tag') ?></th>
            <th class=""><?= t('Colour') ?></th>
        </tr>
        <?php foreach ($gTags as $gTag): ?>
            <tr class="">
                <td class="">
                    <?= $this->text->e($gTag['name']) ?>
                </td>
                <td class=""><?= $this->text->e($colors[$gTag['color_id']] ?? '') ?></td>
            </tr>
        <?php endforeach ?>
    </table>
<?php endif ?>

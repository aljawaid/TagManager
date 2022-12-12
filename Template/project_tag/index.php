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
                <th class="" colspan="2"><?= t('CSS Class') ?></th>
                <th class="" colspan="2"><?= t('CSS ID') ?></th>
            </tr>
        <?php foreach ($tags as $tag): ?>
            <tr class="">
                <td class="project-tag-list-item">
                    <svg width="22px" height="22px" class="project-tag-check-filled" version="1.1" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill='CurrentColor'>
                        <g fill="none" fill-rule="evenodd" id="" stroke="none" stroke-width="1">
                            <g fill="none" id="">
                                <path stroke="#000000" d="M6.01331559,16.0133156 L4,14 L4,5.99961498 C4,4.88743329 4.89525812,4 5.99961498,4 L14,4 L27.3809027,17.3809027 C28.1640508,18.1640508 28.168017,19.4319586 27.3884415,20.2115341 L20.2115341,27.3884415 C19.433119,28.1668566 18.1646418,28.1646418 17.3809027,27.3809027 L14.9866844,24.9866844 C15.6282885,23.9791534 16,22.7829857 16,21.5 C16,17.9101489 13.0898511,15 9.5,15 C8.21701435,15 7.02084661,15.3717115 6.01331559,16.0133156 L6.01331559,16.0133156 L6.01331559,16.0133156 Z M9.5,11 C10.3284272,11 11,10.3284272 11,9.5 C11,8.67157283 10.3284272,8 9.5,8 C8.67157283,8 8,8.67157283 8,9.5 C8,10.3284272 8.67157283,11 9.5,11 L9.5,11 Z"/>
                            </g>
                            <g fill="green">
                                <path d="M9.5,27 C12.5375663,27 15,24.5375663 15,21.5 C15,18.4624337 12.5375663,16 9.5,16 C6.46243373,16 4,18.4624337 4,21.5 C4,24.5375663 6.46243373,27 9.5,27 L9.5,27 Z M9,24.2426407 L6.64644661,21.8890873 L7.37867966,21.1568542 L9,22.7781746 L12.1213203,19.6568542 L12.8535534,20.3890873 L9,24.2426407 L9,24.2426407 Z" id=""/>
                            </g>
                        </g>
                    </svg>
                    <?= $this->text->e($tag['name']) ?>
                </td>
                <td class=""><?= $this->text->e($colors[$tag['color_id']] ?? '') ?></td>
                <td class="tag-actions">
                    <ul class="">
                        <li class="">
                            <?= $this->modal->medium('project-edit-tag', t('Edit'), 'ProjectTagController', 'edit', array('tag_id' => $tag['id'], 'project_id' => $project['id'])) ?>
                        </li>
                        <?php if ($this->user->isAdmin()): ?>
                            <li class="">
                                <?= $this->modal->confirm('project-convert-tag', t('Convert'), 'ProjectTagController', 'confirmMakeGlobalTag', array('tag_id' => $tag['id'], 'project_id' => $project['id'])) ?>
                            </li>
                        <?php endif ?>
                        <li class="">
                            <?= $this->modal->confirm('project-delete-tag', t('Delete'), 'ProjectTagController', 'confirm', array('tag_id' => $tag['id'], 'project_id' => $project['id'])) ?>
                        </li>
                    </ul>
                </td>
                <td class=""><?= $this->text->e($tag['id']) ?></td>
                <?php
                $trimmed = str_replace(array(' ', '|'), '-', $this->text->e($tag['name']));
                ?>
                <td><code>class="tag-<?php echo strtolower($trimmed); ?>"</code></td>
                <td><code>.tag-<?php echo strtolower($trimmed); ?></code></td>
                <td><code>id="tagID-<?= $this->text->e($tag['id']) ?>"</code></td>
                <td><code>#tagID-<?= $this->text->e($tag['id']) ?></code></td>
            </tr>
        <?php endforeach ?>
        </table>
    </details>
<?php endif ?>

    <details <?php if ($gTagsCount < 10): ?> open="" <?php endif ?> class="tag-section-title">
        <summary class="sub-header">
            <svg width="22px" height="22px"  class="global-tag" version="1.1" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill='CurrentColor'>
                <g fill="none" fill-rule="evenodd" id="" stroke="none" stroke-width="1">
                    <g fill="CurrentColor" id="">
                        <path d="M11.7611742,6 L17,6 L30.3809027,19.3809027 C31.1640508,20.1640508 31.168017,21.4319586 30.3884415,22.2115341 L23.2115341,29.3884415 C22.433119,30.1668566 21.1646418,30.1646418 20.3809027,29.3809027 L7,16 L7,7.99961498 C7,7.04952943 7.65331438,6.26345396 8.53219717,6.05450075 C8.69626743,6.31974037 8.83135215,6.63541089 8.92546383,7.00340428 C8.40733258,7.04608755 8,7.48465971 8,8.00844055 L8,15.5 L21.0998579,28.671163 C21.488383,29.0618028 22.1183535,29.0613199 22.5042948,28.672744 L29.6678854,21.4602516 C30.0550094,21.0704849 30.0531075,20.4413912 29.6620109,20.0535183 L16.5,7 L11.99111,7 C11.9674956,6.88580831 11.943685,6.76825104 11.9196818,6.64727665 C11.8752663,6.42342567 11.8222178,6.20767024 11.7611742,6 L11.7611742,6 L11.7611742,6 Z M12.4807254,9.00007275 C12.4871445,9.00002428 12.4935694,9 12.5,9 C13.8807119,9 15,10.1192881 15,11.5 C15,12.8807119 13.8807119,14 12.5,14 C11.1192881,14 10,12.8807119 10,11.5 C10,11.3393383 10.0151552,11.1822162 10.0441139,11.0299854 C10.6220636,12.3065487 11.3451994,12.8712697 12.422607,13.0054321 C12.428451,13.0061598 12.4344332,13.003901 12.4405382,12.998843 C12.4602634,12.999612 12.4800864,13 12.5,13 C13.3284272,13 14,12.3284272 14,11.5 C14,10.8146292 13.5403412,10.2366176 12.9124866,10.0574282 C12.9126451,10.0500589 12.912432,10.0458212 12.9118289,10.0449448 C12.7823551,9.85678577 12.6381058,9.51624889 12.4807254,9.00007275 L12.4807254,9.00007275 L12.4807254,9.00007275 Z M10.9388034,6.84189815 C10.0721912,2.47423457 5.38359326,1.85941765 3.57668735,4.7339052 C2.12779353,7.03885491 3.56137686,10.9999999 5.99999997,11.0000002 L6.00000009,10.0000002 C4.44811081,10 3.35178121,6.97072339 4.4233126,5.26609472 C5.76591896,3.13023072 9.27413436,3.59026382 9.95792501,7.03651965 C10.7668346,11.1133662 11.376935,12.0000004 13.0000002,11.9999999 L12.9999999,10.9999999 C12.0068423,11.0000002 11.665373,10.5037566 10.9388034,6.84189815 L10.9388034,6.84189815 Z" id=""/>
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

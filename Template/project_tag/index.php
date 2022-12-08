<?php
    $gTags = $this->model->tagModel->getAllByProject(0);
    $gTagsCount = count($gTags);
    $tagsCount = count($tags);
?>

    <div id="ProjectTags" class="tag-page-header">
        <h2 class="">
            <img src="/plugins/TagManager/Assets/icons/project-tags.svg" width="22px" height="22px" class="project-tags">
            <?= t('Project tags') ?>
        </h2>
    </div>
    <div class="tag-bar">
        <div class="project-tags-bar">
            <img src="/plugins/TagManager/Assets/icons/project-tags.svg" class="project-tags">
            <h3 class="">Project</h3>
            <ul class="no-bullet">
                <?php if (!empty($tags)): ?>
                    <li class=""><?= $tagsCount ?> <?= t('Tags apply to this project') ?></li>
                <?php endif ?>
            <li class="">
                <?= $this->modal->medium('plus', t('Add new project tag'), 'ProjectTagController', 'create', array('project_id' => $project['id'])) ?>
            </li>

            </ul>
        </div>
        <div class="global-tags-bar">
            <img src="/plugins/TagManager/Assets/icons/global-tags.svg" class="">
            <h3 class="">Global</h3>
            <ul class="no-bullet">
                <?php if (!empty($gTags)): ?>
                    <li class=""><?= $gTagsCount ?> <?= t('Global Tags Available') ?></li>
                <?php endif ?>
                <?php if ($this->user->isAdmin()): ?>
                    <li class="">
                        <?= $this->modal->medium('plus', t('Add new global tag'), 'TagController', 'create') ?>
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
            <img src="/plugins/TagManager/Assets/icons/project-tags.svg" width="22px" height="22px" class="project-tags">
            <h3>Project Tags</h3>
        </summary>
        <p class="">The tags in this list are specific to this project only</p>
        <table id="" class="table-striped table-scrolling">
            <tr class="">
                <th class=""><?= t('Tag') ?></th>
                <th class=""><?= t('Color') ?></th>
                <th class="">Options</th>
                <th class="">Tag ID</th>
            </tr>
        <?php foreach ($tags as $tag): ?>
            <tr class="">
                <td class=""><?= $this->text->e($tag['name']) ?></td>
                <td class=""><?= $this->text->e($colors[$tag['color_id']] ?? '') ?></td>
                <td class="">
                    <ul class="">
                        <li class="">
                            <?= $this->modal->medium('edit', t('Edit'), 'ProjectTagController', 'edit', array('tag_id' => $tag['id'], 'project_id' => $project['id'])) ?>
                        </li>
                        <?php if ($this->user->isAdmin()): ?>
                            <li class="">
                                <?= $this->modal->confirm('globe', t('Change to global tag'), 'ProjectTagController', 'confirmMakeGlobalTag', array('tag_id' => $tag['id'], 'project_id' => $project['id'])) ?>
                            </li>
                        <?php endif ?>
                        <li class="">
                            <?= $this->modal->confirm('trash-o', t('Remove'), 'ProjectTagController', 'confirm', array('tag_id' => $tag['id'], 'project_id' => $project['id'])) ?>
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
            <img src="/plugins/TagManager/Assets/icons/global-tags.svg" width="22px" height="22px" class="">
            <h3 class="">Global Tags</h3></summary>
        <p class="">The tags in this list are global and available for any project</p>


<?php if (empty($gTags)): ?>
    <p class="alert"><?= t('There is no global tags at the moment.') ?></p>

<?php else: ?>
    <table id="" class="table-striped table-scrolling">
        <tr class="">
            <th class=""><?= t('Tag') ?></th>
            <th class=""><?= t('Color') ?></th>
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

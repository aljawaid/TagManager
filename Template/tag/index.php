<div class="page-header">
    <h2><?= t('Global Tags') ?></h2>
    <ul>
        <li>
            <?= $this->modal->medium('plus', t('Add Global Tag'), 'TagController', 'create') ?>
        </li>
    </ul>
</div>

<?php if (empty($tags)): ?>
    <p class="alert"><?= t('There is no global tag at the moment.') ?></p>
<?php else: ?>
    <p class="tag-title-text">
        <?= t('The tags in this list are global and available for any project. Use the CSS selectors for further styling. These tags are also not included in any project tag counts.') ?>
    </p>
    <table class="table-striped table-scrolling">
        <thead>
            <tr class="">
                <th class="column-60"><?= t('Tag') ?></th>
                <th class="column-20"><?= t('Colour') ?></th>
                <th><?= t('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($tags as $tag): ?>
            <tr class="">
                <td class=""><?= $this->text->e($tag['name']) ?></td>
                <td class=""><?= $this->text->e($colors[$tag['color_id']] ?? '') ?></td>
                <td class="">
                    <?= $this->modal->medium('edit', t('Edit'), 'TagController', 'edit', array('tag_id' => $tag['id'])) ?>
                    <?= $this->modal->confirm('trash-o', t('Delete'), 'TagController', 'confirm', array('tag_id' => $tag['id'])) ?>
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
<?php endif ?>

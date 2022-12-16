<div class="page-header">
    <h2><?= t('Global tags') ?></h2>
    <ul>
        <li>
            <?= $this->modal->medium('plus', t('Add new tag'), 'TagController', 'create') ?>
        </li>
    </ul>
</div>

<?php if (empty($tags)): ?>
    <p class="alert"><?= t('There is no global tag at the moment.') ?></p>
<?php else: ?>
    <table class="table-striped table-scrolling">
        <thead>
            <tr class="">
                <th class="column-60"><?= t('Tag') ?></th>
                <th class="column-20"><?= t('Color') ?></th>
                <th><?= t('Action') ?></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($tags as $tag): ?>
            <tr class="">
                <td class=""><?= $this->text->e($tag['name']) ?></td>
                <td class=""><?= $this->text->e($colors[$tag['color_id']] ?? '') ?></td>
                <td class="">
                    <?= $this->modal->medium('edit', t('Edit'), 'TagController', 'edit', array('tag_id' => $tag['id'])) ?>
                    <?= $this->modal->confirm('trash-o', t('Remove'), 'TagController', 'confirm', array('tag_id' => $tag['id'])) ?>
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
<?php endif ?>

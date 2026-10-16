<?php if (isset($taglist) && !empty($taglist)): ?>
</div>
<div class="input-addon-item">
    <div class="dropdown">
        <a href="#" class="dropdown-menu dropdown-menu-link-icon" title="<?= t('Tag Filters') ?>" aria-label="<?= t('Tag Filters') ?>"><i class="fa fa-tag fa-fw" aria-hidden="true"></i><i class="fa fa-caret-down" aria-hidden="true"></i></a>
        <ul>
            <li>
                <a href="#" class="filter-helper" data-unique-filter="tag:none"><?= t('No Tag') ?></a>
            </li>
            <?php foreach ($taglist as $tag): ?>
                <li>
                    <a href="#" class="filter-helper" data-unique-filter='tag:"<?= $this->text->e($tag) ?>"'><?= $this->text->e($tag) ?></a>
                </li>
            <?php endforeach ?>
        </ul>
    </div>
<?php endif ?>

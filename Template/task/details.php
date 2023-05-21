<?php
$tags = $this->task->taskTagModel->getTagsByTask($task['id']);
?>

<?php if (!empty($tags)): ?>
    <div id="TaskTagSummaryBar" class="task-tags">
        <ul class="">
            <i class="fa fa-tags pp-grey" title="<?= t('Associated Tags') ?>">&nbsp;</i>
            <?php foreach ($tags as $tag): ?>
                <?php
                $trimmed = str_replace(array(' ', '|'), '-', $this->text->e($tag['name']));
                ?>
                <li id="tagID-<?= $this->text->e($tag['id']) ?>" class="tag-<?php echo strtolower($trimmed); ?>  task-tag <?= $tag['color_id'] ? "color-{$tag['color_id']}" : '' ?>">
                    <?= $this->text->e($tag['name']) ?>
                </li>
            <?php endforeach ?>
       </ul>
    </div>
<?php endif ?>

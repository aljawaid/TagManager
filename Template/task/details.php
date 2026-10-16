<?php

// Adds stable tag selectors to task details and a Task2PDF-safe inline fallback.
$tags = $this->task->taskTagModel->getTagsByTask($task['id']);
$isPrintLayout = isset($printlayout) && $printlayout === true;
$printTagNames = array();

if ($isPrintLayout) {
    foreach ($tags as $tag) {
        $printTagNames[] = $this->text->e($tag['name']);
    }
}
?>

<?php if (!empty($tags) && $isPrintLayout): ?>
    <span class="tag-manager-print-tags">
        <strong><?= t('Associated Tags:') ?></strong>
        <?= implode(', ', $printTagNames) ?>
    </span>
<?php elseif (!empty($tags)): ?>
    <div id="TaskTagSummaryBar" class="task-tags" aria-label="<?= t('Associated Tags') ?>">
        <ul>
            <li class="tag-manager-tags-icon" aria-hidden="true">
                <i class="fa fa-tags"></i>
            </li>
            <?php foreach ($tags as $tag): ?>
                <?php $tagClass = $this->tagManager->getTagCssClass($tag['name'], $tag['id']); ?>
                <li id="tagID-<?= (int) $tag['id'] ?>" class="<?= $this->text->e($tagClass) ?> task-tag<?= $tag['color_id'] ? ' color-' . $this->text->e($tag['color_id']) : '' ?>">
                    <?= $this->text->e($tag['name']) ?>
                </li>
            <?php endforeach ?>
        </ul>
    </div>
<?php endif ?>

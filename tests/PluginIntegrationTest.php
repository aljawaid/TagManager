<?php

/**
 * Verifies Plugin.php, Helper/TagManagerHelper.php and Template/task/details.php.
 */

$plugin = $loadedPlugins['TagManager'];

$tagHelper = $container['helper']->tagManager;
tagManagerAssertSame(
    'tag-release-candidate',
    $tagHelper->getTagCssClass('Release Candidate', 7),
    'Tag names must produce predictable lowercase CSS classes.'
);
tagManagerAssertSame(
    'tag-id-8',
    $tagHelper->getTagCssClass('商品', 8),
    'Names without safe ASCII selector characters must fall back to a stable tag ID.'
);

$projectId = $container['projectModel']->create(array('name' => 'TagManager test project'));
tagManagerAssertTrue($projectId !== false, 'The integration fixture project must be created.');
$taskId = $container['taskCreationModel']->create(array(
    'project_id' => $projectId,
    'title' => 'TagManager test task',
));
tagManagerAssertTrue($taskId !== false, 'The integration fixture task must be created.');

$firstTagId = $container['tagModel']->create($projectId, 'Release Candidate', 'blue');
$secondTagId = $container['tagModel']->create($projectId, '<script>alert(1)</script>', 'red');
tagManagerAssertTrue($firstTagId !== false && $secondTagId !== false, 'The integration fixture tags must be created.');
tagManagerAssertTrue($container['taskTagModel']->associateTag($taskId, $firstTagId), 'The first fixture tag must be associated.');
tagManagerAssertTrue($container['taskTagModel']->associateTag($taskId, $secondTagId), 'The second fixture tag must be associated.');

$webMarkup = $container['template']->render('tagManager:task/details', array('task' => array('id' => $taskId)));
tagManagerAssertContains('id="TaskTagSummaryBar"', $webMarkup, 'Kanboard task details must retain the enhanced tag summary.');
tagManagerAssertContains('tag-release-candidate', $webMarkup, 'Task details must expose the documented safe tag class.');
tagManagerAssertNotContains('<script>', $webMarkup, 'Tag names must not render active markup.');
tagManagerAssertContains('&lt;script&gt;alert(1)&lt;/script&gt;', $webMarkup, 'Tag names must be HTML escaped.');

$printMarkup = $container['template']->render('tagManager:task/details', array(
    'task' => array('id' => $taskId),
    'printlayout' => true,
));
tagManagerAssertContains('class="tag-manager-print-tags"', $printMarkup, 'Task2PDF must receive the compact print representation.');
tagManagerAssertContains('Release Candidate', $printMarkup, 'The Task2PDF representation must retain tag names.');
tagManagerAssertContains('&lt;script&gt;alert(1)&lt;/script&gt;', $printMarkup, 'Task2PDF tag names must remain escaped.');
tagManagerAssertContains(', ', $printMarkup, 'The Task2PDF representation must separate tag names without a list.');
tagManagerAssertNotContains('<div', $printMarkup, 'The Task2PDF hook must not inject block markup into its inline wrapper.');
tagManagerAssertNotContains('<ul', $printMarkup, 'The Task2PDF hook must not inject a list that can overlap PDF content.');

$globalTagId = $container['tagModel']->create(0, 'Global filter tag', 'green');
tagManagerAssertTrue($globalTagId !== false, 'The global filter fixture tag must be created.');
$filterListeners = $container['hook']->getListeners('template:app:filters-helper:after');
$tagFilterListener = null;

foreach ($filterListeners as $listener) {
    if (isset($listener['template']) && $listener['template'] === 'tagManager:tagfilter') {
        $tagFilterListener = $listener;
        break;
    }
}

tagManagerAssertTrue(isset($tagFilterListener['callable']), 'The TagManager filter callback must be registered.');
$globalResult = call_user_func($tagFilterListener['callable'], array('id' => 'not-a-project'));
tagManagerAssertSame(
    array($globalTagId => 'Global filter tag'),
    $globalResult['taglist'],
    'Invalid filter context must safely fall back to global tags.'
);
$missingProjectResult = call_user_func($tagFilterListener['callable'], array('id' => 999999));
tagManagerAssertSame(
    array($globalTagId => 'Global filter tag'),
    $missingProjectResult['taglist'],
    'Missing projects must not cause a filter rendering error.'
);

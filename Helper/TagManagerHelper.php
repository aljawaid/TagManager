<?php

namespace Kanboard\Plugin\TagManager\Helper;

use Kanboard\Core\Base;

/**
 * Provides stable, safe presentation values shared by TagManager templates.
 *
 * Related test file: tests/PluginIntegrationTest.php.
 */
class TagManagerHelper extends Base
{
    /**
     * Build a predictable CSS class without placing raw tag text in markup.
     *
     * @param  string  $name
     * @param  integer $tagId
     * @return string
     */
    public function getTagCssClass($name, $tagId)
    {
        $normalized = function_exists('mb_strtolower')
            ? mb_strtolower((string) $name, 'UTF-8')
            : strtolower((string) $name);
        $slug = preg_replace('/[^a-z0-9_-]+/', '-', $normalized);
        $slug = trim((string) $slug, '-_');

        if ($slug === '') {
            $slug = 'id-' . (int) $tagId;
        }

        return 'tag-' . $slug;
    }
}

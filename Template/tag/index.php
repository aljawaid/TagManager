<div id="GlobalTags" class="tag-page-header">
    <h2 class="">
        <img src="/plugins/TagManager/Assets/icons/global-tag.svg" width="22px" height="22px" class="global-tags">
        <?= t('Global Tags') ?>
    </h2>
</div>

<?php if (empty($tags)): ?>
    <p class="alert"><?= t('There is no global tag at the moment.') ?></p>
<?php else: ?>
    <p class="tag-title-text">
        <?= t('The tags in this list are global and available for any project. Use the CSS selectors for further styling. These tags are also not included in any project tag counts.') ?>
    </p>
    <table class="project-tags-table table-striped table-scrolling">
        <thead>
            <tr class="">
                <th class="t-corner-left"><?= t('Tag') ?></th>
                <th class="text-center"><?= t('Colour') ?></th>
                <th class="text-center" colspan=""><?= t('Tag ID') ?></th>
                <th class="t-corner-right text-center"><?= t('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($tags as $tag): ?>
            <tr class="">
                <td class="project-tag-list-item">
                    <svg version="1.0" width="22px" height="22px" class="global-tag-check-filled" fill="CurrentColor" viewBox="0 0 150.000000 155.000000" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg">
                        <g transform="translate(0.000000,155.000000) scale(0.100000,-0.100000)" fill="CurrentColor" stroke="none">
                            <path stroke="#000000" d="M208 1480 c-51 -15 -94 -49 -118 -92 -33 -57 -34 -153 -2 -214 26
                            -51 75 -94 108 -94 35 0 32 35 -5 54 -87 45 -102 194 -27 264 31 27 43 32 87
                            32 57 0 106 -24 133 -65 9 -14 30 -78 47 -143 17 -64 39 -131 50 -149 19 -30
                            72 -58 90 -47 18 11 9 45 -16 54 -32 12 -48 46 -74 159 -13 52 -31 111 -41
                            132 -26 49 -82 95 -136 108 -49 12 -58 13 -96 1z"/>
                            <path fill="none" stroke="#000000" stroke-width="30" d="M299 1301 l-29 -29 0 -229 0 -229 34 -33 c32 -31 37 -33 67 -22 55
                            19 181 14 246 -11 80 -29 172 -121 201 -201 25 -65 30 -191 11 -246 -11 -32
                            -10 -34 57 -103 38 -38 82 -76 98 -85 58 -30 77 -17 293 200 111 111 207 215
                            213 231 7 20 7 38 0 60 -6 20 -130 151 -358 379 l-348 348 -136 -3 -136 -3 24
                            -94 c20 -79 29 -99 55 -121 43 -35 45 -83 4 -118 -22 -18 -35 -22 -59 -18 -71
                            14 -118 85 -150 223 -21 94 -35 133 -48 133 -5 0 -23 -13 -39 -29z"/>
                            <path fill="green" d="M395 726 c-151 -58 -243 -215 -210 -358 27 -119 107 -210 211 -243
                            154 -48 317 19 384 159 40 85 42 187 6 270 -31 71 -104 140 -173 166 -60 22
                            -168 25 -218 6z m281 -220 c8 -8 14 -17 14 -20 0 -6 -219 -220 -228 -224 -4
                            -1 -37 27 -72 63 -67 68 -71 82 -27 109 13 9 25 2 62 -34 l45 -45 83 83 c45
                            45 88 82 95 82 7 0 20 -6 28 -14z"/>
                        </g>
                    </svg>
                    <?= $this->text->e($tag['name']) ?>
                </td>
                <td class="text-center task-tag <?= $tag['color_id'] ? "color-{$tag['color_id']}" : '' ?>">
                    <?= $this->text->e($colors[$tag['color_id']] ?? '') ?>
                </td>
                <td class="text-center" rowspan="" colspan="">
                    <?= $this->text->e($tag['id']) ?>
                </td>
                <td class="tag-actions">
                    <ul class="">
                        <li class="">
                            <?= $this->modal->medium('global-edit-tag', t('Edit'), 'TagController', 'edit', array('tag_id' => $tag['id'])) ?>
                        </li>
                        <li class="">
                            <?= $this->modal->confirm('global-delete-tag', t('Delete'), 'TagController', 'confirm', array('tag_id' => $tag['id'])) ?>
                        </li>
                    </ul>
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
<?php endif ?>

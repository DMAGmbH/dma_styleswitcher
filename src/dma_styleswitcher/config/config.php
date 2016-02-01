<?php

/**
 * Settings
 */
$GLOBALS['DMA_STYLESWITCHER'] = array
(
    'STYLES' => array
    (
        'normal',
        'high'
    ),
    'CLASS_PREFIX' => 'contrast_'
);

/**
 * Hooks
 */
$GLOBALS['TL_HOOKS']['generatePage'][]      = array('DmaStyleswitcher', 'styleswitcherGeneratePage');
$GLOBALS['TL_HOOKS']['replaceInsertTags'][] = array('DmaStyleswitcher', 'styleswitcherReplaceInsertTags');
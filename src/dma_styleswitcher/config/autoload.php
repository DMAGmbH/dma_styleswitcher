<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2016 Leo Feyer
 *
 * @license LGPL-3.0+
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'DMA',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Classes
	'DMA\DmaStyleswitcher' => 'system/modules/dma_styleswitcher/classes/DmaStyleswitcher.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'styleswitcher_loader'     => 'system/modules/dma_styleswitcher/templates',
	'styleswitcher_togglelink' => 'system/modules/dma_styleswitcher/templates',
));

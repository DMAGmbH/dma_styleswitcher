# DMA Styleswitcher

## Contao Extension

Ermöglicht es per Insert-Tag die Möglichkeit zu schaffen, unterschiedliche CSS-Style-Dateien zu laden.

Standard-Configuration:
```php
$GLOBALS['DMA_STYLESWITCHER'] = array
(
    'STYLES' => array
    (
        'normal',
        'high'
    ),
    'CLASS_PREFIX' => 'contrast_'
);
```

`{{dmastyleswitcher::class}}` gibt den aktuell gewählten Stylekey bsp. zur Nutzung als CSS-Klasse aus, bps. `contrast_normal`.

`{{dmastyleswitcher::toggle::normal::high}}` gibt das HTML für einen „Umschaltlink“ aus.
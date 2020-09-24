# Accordion

The Accordion widget provides a set of panels that can be hidden or shown by clicking on the panel title; depending on the value of `$options['single']`, panels toggle individually or only one panel may be open.

## Usage

```php
Accordion::widget([$config]); // $config must contain an 'items' element
```

## CSS Classes

The following classes are applied in addition to any specified in `$config`; these can be overriden to change the look of the accordion:

* ui-accordion - applied to the surrounding `<div/>`
* ui-accordion__label - applied to accordion label `<label/>`s
* ui-accordion__panel - applied to accordion panel `<div/>`s

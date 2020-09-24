# Tabs

The Tabs widget provides a set of panels that are shown by clicking on the relevant tab.

## Usage

```php
Tabs::widget([$config]); // $config must contain an 'items' element that defines the tabs, their label and content
```

## CSS Classes

The following classes are applied in addition to any specified in `$config`:

* ui-tabs - applied to the surrounding `<div/>`
* ui-tabs__label - applied to tabs label `<label/>`s
* ui-tabs__panel - applied to tabs panel `<div/>`s

## Notes

To be responsive, Tabs acts as an accordion below screen widths of 768px by default.

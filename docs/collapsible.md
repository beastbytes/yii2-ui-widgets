# Collapsible

The Collapsible widget toggles the visiblity of its content.

## Usage

Collapsible can be used in two ways:

```php
Collapsible::begin([$config]);
echo $collapsibleContent;
Collapsible::end();
```

or

```php
Collapsible::widget([$config]); // must contain a 'content' element
```

## CSS Classes

The following classes are applied in addition to any specified in `$config`:

* ui-collapsible - applied to the surrounding `div`
* ui-collapsible__button - applied to the close button `label`
* ui-collapsible__content - applied to the content `div`

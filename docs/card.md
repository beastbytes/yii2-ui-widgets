# Card

The Card widget is a basic presentation component with three sections: an optional header, content (required), and an optional footer.

## Usage

Card can be used in two ways:

```php
Card::begin([$config]);
echo $cardContent;
Card::end();
```

or

```php
Card::widget([$config]); // $config must contain a 'content' element
```

## CSS Classes

The following classes are applied in addition to any specified in `$config`; these can be overriden to change the look of the card:

* ui-card - applied to the surrounding `div`
* ui-card__content - applied to the content `div`
* ui-card__footer - applied to the footer `div` if present
* ui-card__title - applied to the title `div` if present

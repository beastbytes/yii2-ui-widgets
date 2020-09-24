# Dialog

The Dialog widget is an overlay component with three sections: an optional header, content (required), and an optional footer. It has a `<label/>` that shows the dialog and a `<label/>` - typically styled as a button - that hides it. It may also have a `<label/>` that makes the dialog modal, i.e. prevents interaction with the rest of the page while the dialog is visible, depending on the value of `$config['modal']`

## Usage

Dialog can be used in two ways:

```php
Dialog::begin([$config]);
echo $dialogContent;
Dialog::end();
```

or

```php
Dialog::widget([$config]); // $config must contain a 'content' element
```

Whichever method is used, declare the Dialog where the label (`$config['label]`) to show the dialog is to be rendered.

## CSS Classes

The following classes are applied in addition to any specified in `$config`; these can be overriden to change the look of the dialog:

* ui-dialog - applied to the surrounding `div`; this will not usually be styled
* ui-dialog__close - applied to the close button `label`
* ui-dialog__content - applied to the content `div`
* ui-dialog__dialog - applied to the dialog `div` that contains the content and the optional title and footer
* ui-dialog__footer - applied to the footer `div` if present
* ui-dialog__overlay - applied to the overlay `label`
* ui-dialog__title - applied to the title `div` if present
* ui-dialog-open - applied to the `label` that opens the dialog

## Notes

`$config['options']` is applied to the ui-dialog__dialog `div`, i.e. the dialog itself.

`$config['label]` is rendered at the point Dialog is declared. e.g.
```php
?>
<p>Some HTML that will 
<?php Dialog::begin(['label' => 'show the dialog']); ?>
<p>This is the dialog content</p>
<?php Dialog::end(); ?>
.</p>
```
will render as:
```html
<body>
  <!-- some page content -->
  <p>Some HTML that will <label class="ui-dialog-open" for="ui-dialog__control-w0">show the dialog</label>.</p>
  <!-- more page content -->
  <div class="ui-dialog" id="ui-dialog-w0">
    <input class="ui-dialog__control" id="ui-dialog__control-w0" name="ui-dialog__control-w0" type="checkbox">
    <label class="ui-dialog__overlay" for="ui-dialog__control-w0"></label>
    <div class="ui-dialog__dialog">
      <label class="ui-dialog__close" for="ui-dialog__control-w0"></label>
      <div class="ui-dialog__content">
        <p>This is the dialog content</p>
      </div>    
    </div>    
  </div>
</body>
```

The ui-dialog `div` is rendered at the end of the page in order to ensure valid HTML.

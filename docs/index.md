# UiWidgets
A Yii2 Extension that provides ligtweight UI widgets implemented in CSS.

For license information see the [LICENSE](LICENSE.md)-file.

Documentation is at [docs/README.md](docs/README.md).

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist BeastBytes/UiWidgets
```

or add

```json
'BeastBytes/UiWidgets': '~1.0'
```

to the `require` section of your composer.json.

## Contents

* [Accordion](accordion.md)
* [Card](card.md)
* [Collabsible](collapsible.md)
* [Dialog](dialg.md)
* [Tabs](tabs.md)

## Overview

Each widget has an asset that declares it's CSS. The CSS mainly defines widget behaviour but also includes minimal presentational CSS so that the widgets can be used "out of the box"; presentational CSS is clearly commented.

See the relevant widget documentation for the widget's CSS classes. Widget CSS classes use [BEM](http://getbem.com/) naming conventions to minimise specifity.

Definining your own presentation styles can be done in a number of ways:
* Specify an asset bundle to publish that points to your own CSS; this should depend on the widget's asset so that the behaviour is inherited, e.g. for the _Tabs_ widget depend on 'BeastBytes\UiWidgets\TabsAsset'. This is a good option if you are also publishing JavaScript - for example - to update [ARIA](https://www.w3.org/WAI/standards-guidelines/aria/) attributes.
* Add rules in your CSS.
* If you are using a bundler that supports CSS, e.g. Webpack, you can import the widget's and your CSS.

# Yii2 extension to Google Translate API

Google Translate API

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
$ php composer.phar require richweber/yii2-google-translate-api "dev-master"
```

or add

```
"richweber/yii2-google-translate-api": "dev-master"
```

to the ```require``` section of your `composer.json` file.

## Usage

### Identifying your application to Google

If you haven't done so already, create your project's API key by following these steps:

1. Go to the [Google Developers Console](https://console.developers.google.com/?_ga=1.82915478.1231386659.1424296121).
2. Select a project, or create a new one.
3. In the sidebar on the left, **expand APIs & auth**. Next, click **APIs**. In the list of APIs, make sure the status is **ON** for the Google Translate API.
4. In the sidebar on the left, select **Credentials**.
5. To create an API key, click **Create new Key** and select the appropriate key type. Enter the additional information required for that key type and click **Create**.

[Read more...](https://cloud.google.com/translate/v2/using_rest)

### Component Configuration

```php
'components' => [
    ...
    'translate' => [
        'class' => 'richweber\google\translate\Translation',
        'key' => 'INSERT-YOUR-API-KEY',
    ],
    ...
],
```

```php
Yii::$app->translate->translate($source, $target, $text);
```

```php
Yii::$app->translate->discover();
```

```php
Yii::$app->translate->detect($text);
```

### License

**yii2-twitter** is released under the BSD 3-Clause License. See the bundled `LICENSE.md` for details.
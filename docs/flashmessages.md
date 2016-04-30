Flash Messages
==============

This theme provides built in support for special flash messages, there are two components in this implementation:

- `\webtoolsnz\AdminLte\FlashMessage` a model used to create special flash messages
- `\webtools\AdminLte\widgets\FlashMessages` a widget that renders all flash messages of the above kind.

The `FlashMessages` widget is rendered in `views/layouts/content.php` right above the page content, it will only render messages of created using the `FlashMessage` class and ignore all others.


## Creating Flash Messages

For the most part creating flash messages is the same as specified in the [official documentation](http://www.yiiframework.com/doc-2.0/guide-runtime-sessions-cookies.html#flash-data), The only difference being instead of a string, your message must be an instance of `FlashMessage` in order to be rendered by the `FlashMessages` widget.

Below are some examples of creating a message.

```php
use webtoolsnz\AdminLte\FlashMessage;

$message = new FlashMessage();
$message->title = 'An error has occurred!';
$message->type = FlashMessage::TYPE_ERROR;
$message->message = 'Something went horribly wrong.';

\Yii::$app->session->setFlash('error', $message);
```

Alternatively you can define the message inline like so

```php
\Yii::$app->session->setFlash('message', new FlashMessage([
	'type' => FlashMessage::TYPE_SUCCESS,
	'message' => 'Your changes have been saved.'
]));
```

There are different types of message for different occasion:
- `FlashMessage::TYPE_ERROR`
- `FlashMessage::TYPE_SUCCESS`
- `FlashMessage::TYPE_INFO`
- `FlashMessage::TYPE_WARNING`

The default is `FlashMessage::TYPE_INFO`.

!["Flash Message Examples"](/docs/img/flash-messages.png?raw=true)


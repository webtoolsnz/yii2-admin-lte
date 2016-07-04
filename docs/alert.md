Alert Widget
============

The `Alert` widget provides a simple way to provide contextual feedback for typical user actions.

## Public properties
| Property    | Type     | Description |
|-------------|----------|-------------|
| message     | string   | **Required.** Content of the alert, can be HTML  |
| title       | string   | **Optional.** The title to be displayed at the top of the box |
| dismissible | bool     | **Optional.** If true a dismissible button will be inserted into the alert|
| type        | string   | **Optional.** One of the predefined types eg. `Alert::TYPE_SUCCESS` (Defaults to `Alert::TYPE_INFO`) |
| options     | array    | **Optional.** HtmlOptions array for box element |  

## Type Constants

The following constants are available to set the type of `Alert`:

* `Alert::TYPE_INFO`
* `Alert::TYPE_SUCCESS`
* `Alert::TYPE_WARNING`
* `Alert::TYPE_DANGER`


## Examples

```php
use webtoolsnz\AdminLte\widgets\Alert;

echo Alert::widget([
	'type' => Alert::TYPE_SUCCESS,
    'title' => 'Success!',
    'message' => 'Your changes have been saved.',
	'dismissible' => true,
]);
```

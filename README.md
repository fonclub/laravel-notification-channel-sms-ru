# Smsru notifications channel for Laravel 5.5+

Here's the latest documentation on Laravel's Notifications System: 

https://laravel.com/docs/master/notifications

[![Latest Version on Packagist](https://img.shields.io/packagist/v/fomvasss/laravel-notification-channel-sms-ru.svg?style=flat-square)](https://packagist.org/packages/fomvasss/laravel-notification-channel-sms-ru)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/fomvasss/laravel-notification-channel-sms-ru/master.svg?style=flat-square)](https://travis-ci.org/fomvasss/laravel-notification-channel-sms-ru)
[![StyleCI](https://styleci.io/repos/:style_ci_id/shield)](https://styleci.io/repos/:style_ci_id)
[![SensioLabsInsight](https://img.shields.io/sensiolabs/i/:sensio_labs_id.svg?style=flat-square)](https://insight.sensiolabs.com/projects/:sensio_labs_id)
[![Quality Score](https://img.shields.io/scrutinizer/g/fomvasss/laravel-notification-channel-sms-ru.svg?style=flat-square)](https://scrutinizer-ci.com/g/fomvasss/laravel-notification-channel-sms-ru)
[![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/fomvasss/laravel-notification-channel-sms-ru/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/fomvasss/laravel-notification-channel-sms-ru/?branch=master)
[![Total Downloads](https://img.shields.io/packagist/dt/fomvasss/laravel-notification-channel-sms-ru.svg?style=flat-square)](https://packagist.org/packages/fomvasss/laravel-notification-channel-sms-ru)

This package makes it easy to send notifications using [sms.ru](https://sms.ru) (aka SMSRU) with Laravel 5.5+.

## Contents

- [Installation](#installation)
    - [Setting up the SmsRu service](#setting-up-the-SmsRu-service)
- [Usage](#usage)
    - [Available Message methods](#available-methods)
- [Changelog](#changelog)
- [Security](#security)
- [Contributing](#contributing)
- [Credits](#credits)
- [License](#license)


## Installation

Install this package with Composer:

```bash
composer require fomvasss/laravel-notification-channel-sms-ru
```

The service provider gets loaded automatically. Or you can do this manually:
```php
// config/app.php
'providers' => [
    ...
    NotificationChannels\SmsRu\SmsRuServiceProvider::class,
],
```

### Setting up the SmsRu service

Add your SmsRu apiID, default sender name (or phone number) to your `config/services.php`:

```php
// config/services.php
...
'sms_ru' => [
    'api_id'  => env('SMSRU_API_ID'),
],
...
```

## Usage

You can use the channel in your `via()` method inside the notification:

```php
use Illuminate\Notifications\Notification;
use NotificationChannels\SmsRu\SmsRuMessage;
use NotificationChannels\SmsRu\SmsRuChannel;

class AccountApproved extends Notification
{
    public function via($notifiable)
    {
        return [SmsRuChannel::class];
    }

    public function toSmsru($notifiable)
    {
        return (new SmsRuMessage())->content("Hello SMS!!!")->test(true)->translit(false);
    }
}
```

In your notifiable model, make sure to include a `routeNotificationForSmsru()` method, which returns a phone number
or an array of phone numbers.

```php
public function routeNotificationForSmsru()
{
    return $this->phone;
}
```

### Available methods

`from()`: Sets the sender's name or phone number.

`content()`: Set a content of the notification message.

`time()`: Example argument = `time() + 7*60*60` - Postpone shipping for 7 hours.

`translit()`: Text transliteration

`test()`: Test SMS sending (free)

`from()`: Approved letter sender

`parentId()`: You can specify your partner ID if you integrate the code into a foreign system

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Security

If you discover any security related issues, please email fomvasss@gmail.com instead of using the issue tracker.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [fomvasss](https://github.com/fomvasss)
- [zelenin/sms_ru](https://github.com/zelenin/sms_ru)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
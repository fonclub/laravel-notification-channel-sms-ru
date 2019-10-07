<?php

namespace NotificationChannels\SmsRu\Exceptions;

use NotificationChannels\SmsRu\SmsRuMessage;

class CouldNotSendNotification extends \Exception
{
    /**
     * @return static
     */
    public static function missingFrom()
    {
        return new static('Notification was not sent. Missing `from` number.');
    }

    /**
     * @return CouldNotSendNotification
     */
    public static function invalidReceiver()
    {
        return new static("The notifiable did not have a receiving phone number. Add a <routeNotificationForSmsru>
            method or a <phone> attribute to your notifiable.");
    }

    public static function invalidMessageObject($message)
    {
        $className = get_class($message) ?: 'Unknown';

        return new static(
            "Notification was not sent. Message object class `{$className}` is invalid. It should
            be either `".SmsRuMessage::class);
    }
}

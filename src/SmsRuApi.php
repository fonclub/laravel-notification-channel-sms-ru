<?php


namespace NotificationChannels\SmsRu;


class SmsRuApi extends \Zelenin\SmsRu\Api
{
    public function sendMessage($recipient, SmsRuMessage $message)
    {
        $sms = new \Zelenin\SmsRu\Entity\Sms($recipient, $message->content);

        if ($message->time) {
            $sms->time = $message->time;
        }

        if ($message->test) {
            $sms->test = $message->test;
        }

        if ($message->from) {
            $sms->from = $message->from;
        }

        if ($message->translit) {
            $sms->translit = $message->translit;
        }

        if ($message->partnerId) {
            $sms->partner_id = $message->partnerId;
        }

        return $this->smsSend($sms);
    }
}
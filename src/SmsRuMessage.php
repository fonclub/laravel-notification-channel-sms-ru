<?php

namespace NotificationChannels\SmsRu;

use Illuminate\Support\Arr;

class SmsRuMessage
{
    /**
     * The phone number the message should be sent from.
     *
     * @var string
     */
    public $from = '';
    /**
     * The message content.
     *
     * @var string
     */
    public $content = '';

    /**
     * Time of sending a message.
     *
     * @var int
     */
    public $time;

    /**
     * @var string
     */
    public $partnerId;

    /**
     * @var bool
     */
    public $test;

    /**
     * @var bool
     */
    public $translit;

    /**
     * Create a new message instance.
     *
     * @param  string $content
     *
     * @return static
     */
    public static function create($content = '')
    {
        return new static($content);
    }
    /**
     * @param  string  $content
     */
    public function __construct($content = '')
    {
        $this->content = $content;
    }
    /**
     * Set the message content.
     *
     * @param  string  $content
     *
     * @return $this
     */
    public function content($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Set the translit for SMS content.
     *
     * @param  string  $from
     *
     * @return $this
     */
    public function translit(bool $translit = false)
    {
        $this->translit = $translit;

        return $this;
    }

    /**
     * Set the test SMS - imitation sending.
     *
     * @param  string  $from
     *
     * @return $this
     */
    public function test(bool $test = false)
    {
        $this->test = $test;

        return $this;
    }

    /**
     * Set the test partner_id.
     *
     * @param  string  $from
     *
     * @return $this
     */
    public function partnerId($partnerId)
    {
        $this->partnerId = $partnerId;

        return $this;
    }

    /**
     * Set the phone number or sender name the message should be sent from.
     *
     * @param  string  $from
     *
     * @return $this
     */
    public function from($from)
    {
        $this->from = $from;

        return $this;
    }

    /**
     * Postpone shipping for -n- sec.
     *
     * @param null $time
     * @return $this
     */
    public function time(int $time = null)
    {
        $this->time = $time;

        return $this;
    }
}

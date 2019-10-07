<?php

namespace NotificationChannels\SmsRu;

use Illuminate\Support\ServiceProvider;

class SmsRuServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app->singleton(SmsRuApi::class, function ($app) {
            $apiId = $this->app['config']['services.sms_ru.api_id'];
            $client = new SmsRuApi(new \Zelenin\SmsRu\Auth\ApiIdAuth($apiId));

            return $client;
        });
    }

    public function provides(): array
    {
        return [
            SmsRuApi::class,
        ];
    }
}

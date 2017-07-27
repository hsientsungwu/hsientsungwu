<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use Monolog\Logger;
use Monolog\Formatter\LineFormatter;
use Monolog\Handler\SyslogUdpHandler;

class PaperTrailServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        if (env('APP_ENV') != 'local') {
            $output = "%channel%.%level_name%: %message%";
            $formatter = new LineFormatter($output);

            $logger = new Logger('papertrail-com-hsientsungwu-dev');
            $syslogHandler = new SyslogUdpHandler(env('PAPERTRAIL_HOST'), env('PAPERTRAIL_PORT'));
            $syslogHandler->setFormatter($formatter);
            $logger->pushHandler($syslogHandler);

            $logger->addInfo('Monolog test');
        }
    }
}

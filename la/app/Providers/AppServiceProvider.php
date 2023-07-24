<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (env('APP_DEBUG')) {
            DB::listen(
                function ($sql) {

                    $bindings = $sql->bindings;
                    $percentTemp = '^&^';
                    $sql = str_replace(['%', '?'], [$percentTemp, '%s'], $sql->sql);

                    $params = collect($bindings)->map(
                        function ($binding) {
                            return is_numeric($binding) ? $binding : "'{$binding}'";
                        }
                    )->toArray();

                    $str = vsprintf($sql, $params);
                    $query = str_replace($percentTemp, '%', $str);

                    $logFile = fopen(
                        storage_path('logs' . DIRECTORY_SEPARATOR . date('Y-m-d') . '-sql.log'),
                        'a+'
                    );
                    fwrite($logFile, date('Y-m-d H:i:s') . ': ' . $query . PHP_EOL);
                    fclose($logFile);
                }
            );
        }
    }
}

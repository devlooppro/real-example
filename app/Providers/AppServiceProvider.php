<?php

namespace App\Providers;

use App\Classes\AppValidator;
use App\Classes\Translatable;
use App\Classes\TranslationsScanner;
use Brackets\AdminTranslations\TranslationsScanner as DefaultTranslationsScanner;
use Brackets\Translatable\Translatable as DefaultTranslatable;
use Illuminate\Support\Facades\Validator;
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
        $this->app->bind(DefaultTranslationsScanner::class, TranslationsScanner::class);
        $this->app->bind(DefaultTranslatable::class, Translatable::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerValidators();
    }

    /**
     * Register any custom validation rule
     *
     * @return void
     */
    private function registerValidators()
    {
        Validator::resolver(
            function ($translator, $data, $rules, $messages) {
                return new AppValidator($translator, $data, $rules, $messages);
            }
        );
    }
}

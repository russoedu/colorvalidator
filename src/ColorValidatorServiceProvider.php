<?php namespace Russoedu\ColorValidator;

use Illuminate\Support\ServiceProvider;
use Olssonm\IdentityNumber\IdentityNumberFormatter;
use Olssonm\IdentityNumber\IdentityNumber;

class ColorValidatorServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;
    protected $rules = array(
        'hex_color',
    );

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__.'/../lang', 'colorvalidator');
        $this->app->bind('Russoedu\ColorValidator\colorvalidator', function($app)
        {
            $validator = new ColorValidator($app['translator'], [], [], trans('colorvalidator::validation') );
            if (isset($app['validation.presence']))
            {
                $validator->setPresenceVerifier($app['validation.presence']);
            }
            return $validator;
        });
        $this->addNewRules();
    }

    /**
     * Get the list of new rules being added to the validator.
     * @return array
     */
    public function getRules()
    {
        return $this->rules;
    }
    /**
     * Returns the translation string depending on laravel version
     * @return string
     */
    protected function loadTranslator()
    {
        return trans('colorvalidator::validation');
    }
    /**
     * Add new rules to the validator.
     */
    protected function addNewRules()
    {
        foreach($this->getRules() as $rule)
        {
            $this->extendValidator($rule);
        }
    }
    /**
     * Extend the validator with new rules.
     * @param  string $rule
     * @return void
     */
    protected function extendValidator($rule)
    {
        $method = studly_case($rule);
        $translation = trans('colorvalidator::validation');
        $this->app['validator']->extend($rule, 'Russoedu\ColorValidator\colorvalidator@validate' . $method, $translation[$rule]);
    }
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
    }
    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
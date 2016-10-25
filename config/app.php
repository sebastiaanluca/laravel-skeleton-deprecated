<?php

return [
    
    'name' => 'Laravel skeleton application',
    'url' => env('APP_URL', 'http://localhost'),
    
    'env' => env('APP_ENV', 'production'),
    'debug' => env('APP_DEBUG', false),
    
    'timezone' => 'UTC',
    'locale' => 'en',
    'fallback_locale' => 'en',
    
    'key' => env('APP_KEY'),
    'cipher' => 'AES-256-CBC',
    
    'log' => env('APP_LOG', 'single'),
    'log_level' => env('APP_LOG_LEVEL', 'debug'),
    
    'providers' => [
        
        /*
         * Core
         */
        
        Illuminate\Auth\AuthServiceProvider::class,
        Illuminate\Broadcasting\BroadcastServiceProvider::class,
        Illuminate\Bus\BusServiceProvider::class,
        Illuminate\Cache\CacheServiceProvider::class,
        Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
        Illuminate\Cookie\CookieServiceProvider::class,
        Illuminate\Database\DatabaseServiceProvider::class,
        Illuminate\Encryption\EncryptionServiceProvider::class,
        Illuminate\Filesystem\FilesystemServiceProvider::class,
        Illuminate\Foundation\Providers\FoundationServiceProvider::class,
        Illuminate\Hashing\HashServiceProvider::class,
        Illuminate\Mail\MailServiceProvider::class,
        Illuminate\Notifications\NotificationServiceProvider::class,
        Illuminate\Pagination\PaginationServiceProvider::class,
        Illuminate\Pipeline\PipelineServiceProvider::class,
        Illuminate\Queue\QueueServiceProvider::class,
        Illuminate\Redis\RedisServiceProvider::class,
        Illuminate\Auth\Passwords\PasswordResetServiceProvider::class,
        Illuminate\Session\SessionServiceProvider::class,
        Illuminate\Translation\TranslationServiceProvider::class,
        Illuminate\Validation\ValidationServiceProvider::class,
        Illuminate\View\ViewServiceProvider::class,
        
        /*
         * Third-party packages
         */
        
        GrahamCampbell\Exceptions\ExceptionsServiceProvider::class,
        SebastiaanLuca\Router\RouterServiceProvider::class,
        Radic\BladeExtensions\BladeExtensionsServiceProvider::class,
        SebastiaanLuca\Helpers\Html\HtmlServiceProvider::class,
        Barryvdh\Debugbar\ServiceProvider::class,
        Nwidart\Modules\LaravelModulesServiceProvider::class,
        SebastiaanLuca\Helpers\Methods\GlobalMethodsServiceProvider::class,
        SebastiaanLuca\Helpers\Collections\CollectionHelperServiceProvider::class,
        SebastiaanLuca\ConditionalProviders\Providers\EnvironmentProvidersServiceProvider::class,
        
        /*
         * Modules
         */
        
        Theme\Providers\ThemeServiceProvider::class,
        
        /*
         * Application
         */
        
        App\Providers\EventServiceProvider::class,
    
    ],
    
    'local_providers' => [
        Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class,
    ],
    
    'aliases' => [
        'Form' => Collective\Html\FormFacade::class,
        'Html' => Collective\Html\HtmlFacade::class,
    ],

];
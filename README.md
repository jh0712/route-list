Route List
====
這個專案主要目標是想讓route的管理更加輕鬆

The purpose of this project is to easier manage all routes.
#Installation(安裝)
使用下列指令安裝

To install through Composer, by run the following command:
```bash
composer require lkh/route-list --dev
```
已下指令可以將config的設定移至專案內管理

The package will automatically register a service provider and alias.

Optionally, publish the package's configuration and publish stubs by running:
```bash
php artisan vendor:publish --provider="Lkh\RouteList\RouteListServiceProvider"
```

result(執行結果)
```bash
Copied File [/vendor/lkh/route-list/src/config/config.php] To [/config/routelist.php]
Publishing complete.
```

## start use it(開始使用) 
創建所需DB table 以及 載入config

Create db table & load config
```
php artisan migrate
php artisan config:ca
```
執行routelist command

Run command 
```
php artisan route:get-route-list
```
go to url : /route-view

## config setting (config 設定)
```php
return [
    /**
     * The routes to hide with regular expression.
     */
    'filter_regular' => [
        '#^_debugbar#',
        '#^_ignition#',
        '#^routes$#'
    ],
    /**
     * The columns array can help you to change which columns do you want to show for datatable.
     */
    'columns' => [
        'methods'    => ['title' => 'Method'],
        'domain'     => ['title' => 'Domain'],
        'path'       => ['title' => 'Path'],
        'name'       => ['title' => 'Name'],
        'action'     => ['title' => 'Action'],
        'middleware' => ['title' => 'Middleware'],
    ],
    /**
     * The pageLengthOptions array can help you to setting showing item for datatable.
     */
    'pageLengthOptions' => [
        [10, 25, 50, -1],
        [10, 25, 50, "All"]
    ],
    /**
     * choose column to sort.
     * array > 0,1,2,3,4,5
     * asc >> 1,2,3,4
     * desc >> 4,3,2,1
     */
    'tableOrder' => [1, 'asc'],
];

```

## problem solution(常見問題解決方案)
1. composer version
如果你的composer版本是version,你可能會遇到版本問題.<br>
if you use composer version 1, maybe you will see this problem.

```bash
Warning from https://repo.packagist.org: Support for Composer 1 is deprecated and some packages will not be available. You should upgrade to Composer 2. See https://blog.packagist.com/
deprecating-composer-1-support/
Info from https://repo.packagist.org: #StandWithUkraine

```
你可以藉由以下指令調整composer的版本。<br>
you can use this command to change composer version to fix this problem.
```bash
composer self-update --2
```


### hope you enjoy.
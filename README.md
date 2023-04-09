Route List
====
The purpose of this project is to easier manage all routes.
#Installation
To install through Composer, by run the following command:
```bash
composer require lkh/route-list
```
The package will automatically register a service provider and alias.

Optionally, publish the package's configuration and publish stubs by running:
```
php artisan vendor:publish --provider="Lkh\RouteList\RouteListServiceProvider"
```
result
```
Copied File [/vendor/lkh/route-list/src/config/config.php] To [/config/routelist.php]
Publishing complete.
```

## start use it 
Create db table & load config
```
php artisan migrate
php artisan config:ca
```
Run command 
```
php artisan route:get-route-list
```
go to url : /route-view


### hope you enjoy.
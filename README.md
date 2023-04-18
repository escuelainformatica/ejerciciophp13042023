# pasos
```shell
composer create-project laravel/laravel bodega2023
```
crear migraciones:
```shell
php artisan make:migration productomigracion
```


## contexto

```php

$compra=new Compra(); // no tiene un contexto en la base de datos, el objeto es nuevo.
$compra->id=1;
$compra->save(); // insercion

$compra=Compra::find(1); // tiene un contexto en la base de datos, el objeto ya existe.
$compra->cliente="john"; 
$compra->save(); // actualizacion



```
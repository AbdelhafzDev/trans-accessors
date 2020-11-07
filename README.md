Trans Accessor
==================

**Trans Accessor** allows us to simple  accessors and return  translate columns  of an Eloquent model based on app localization. This gives us the ability to organize and reuse them on any model.

## The problem
in your project for example if you have a city model and in this model you have name_en and name_ar so every time your return data in front-end 
or mobile you need to check localization and show the correct one, a simple solution is to append a key and make accessor in this solution you need 
to repeat this in every model that has a localization keys;
 **Trans Accessor** aims at solving this limitation and save your time.



## Installation

The recommended way to install **Trans Accessor** is through [Composer](http://getcomposer.org/)

```bash
$ composer require awobaz/eloquent-mutators
```

The package will automatically register itself if you're using Laravel 5.5+. For Laravel 5.4, you'll have to register the package manually:



## Usage



#### Defining accessors



```php
namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory, \Abdelhafz\TransAccessor\Translatable;

    protected $translatable = ['name'];
}
```


```

## Authors

* [Abdelhafz](eng.abdelhafz@gmail.com) - *Initial work*



## License

**Trans Accessor** is licensed under the [MIT License](http://opensource.org/licenses/MIT).
# Lara Export

Laravel Export

## Requirements

PHP: >=7.4

## Install

```bash
$ composer require rockbuzz/lara-export
```

```php

use Rockbuzz\LaraExport\Export;

class YourController extends Controller
{
    public function index()
    {
        (new Export)
            ->header(['name', 'email'])
            ->data([
                ['name' => 'John Doe', 'email' => 'john@domain.com'],
                ['name' => 'Jane Doe', 'email' => 'jane@domain.com'],
            ])
            //->output(storage_path("app/exports/$filename"), Export::CSV);
            ->save(storage_path("app/exports/$filename"), Export::CSV);
    }

}
```

## License

The Lara Export is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

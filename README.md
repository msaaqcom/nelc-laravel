# NELC Laravel Integration

xAPI Integration with Saudi NELC (National Center for e-Learning) for your Laravel app

# Installation

You can install the package via composer:

```bash
composer require msaaq/nelc-laravel
```

After install the package you need to set API credentials in `config/services.php` file:

```php
[
    // ...
    
    'nelc' => [
        'key' => env('NELC_KEY'),
        'secret' => env('NELC_SECRET'),
        'platform' => env('NELC_PLATFORM'),
        'sandbox' => env('NELC_SANDBOX', false),
    ],
]
```

## Usage

Now you can send xAPI statements to NELC using `Msaaq\NelcLaravel\Nelc` facade:

```php
use Msaaq\NelcLaravel\Nelc;

app(Nelc::class)->sendStatement($statement);
```

Or

```php
use Nelc;

Nelc::sendStatement($statement);
```

Or from your controller like this:

```php
use Msaaq\NelcLaravel\Nelc;

class MyController extends Controller
{
    public function index(Request $request, Nelc $nelc)
    {
        $nelc->sendStatement($statement);
    }
}
```

### Statements

For more information about the statements,
please visit [nelc-xapi-php-sdk](https://github.com/msaaqcom/nelc-xapi-php-sdk#2-send-statement)

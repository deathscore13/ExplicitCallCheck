# ExplicitCallCheck
### Проверка явного вызова метода для PHP 8.0.0+<br><br>

Позволяет проверять был ли метод вызван явно

<br><br>
## Пример проверки явного вызова
```php
// подключение ExplicitCallCheck
require('ExplicitCallCheck.php');

class BaseClass
{
    private int $test;

    public function __construct()
    {
        // проверка на явный вызов конструктора
        if (ExplicitCallCheck::check())
            return;
        
        // инициализация проперти
        $this->test = 0;
    }

    public function set(): void
    {
        // запись какой-либо информации
        $this->test = rand(0, 100500);
    }

    public function get(): int
    {
        return $this->test;
    }
}

// создание объекта и неявный вызов конструктора
$b = new BaseClass();

// запись и вывод какой-либо информации
$b->set();
echo($b->get().PHP_EOL);

// попытка присвоить проперти начальное значение 0
$b->__construct();

// не получилось :(
echo($b->get().PHP_EOL);
```

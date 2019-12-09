## Trabalho

Aplicacao Laravel 5.7.

## Instalação

- Clone o projeto
- Rode o ```composer install```
- Clone o ```.env.example``` e renomeie para ```.env```
- Configure no arquivo ```.env``` as configurações do banco de dados mysql (de preferencia).
- Rode o comando ```php artisan key:generate``` para atualizar a key da apliação.
- Para criar as tabelas de autenticação e dos demais módulos, rode o comando:```php artisan migrate```.
- Para servir a aplicação configure um virtualhost no seu container web ou rode ``` php artisan serve```.


## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).

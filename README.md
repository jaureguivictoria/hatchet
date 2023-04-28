# DevTest

This is a Laravel Application that allows you to upload a CSV with Office information and stores it in the database. It has an API to be consumed by anyone with two endpoints: one to upload the offices information, and another one to list it with several filters.

An example CSV can be found in the repository. Download it [here](https://github.com/jaureguivictoria/hatchet/blob/main/office-data.csv);

The frontend is built using [Livewire](https://laravel-livewire.com/) and TailwindCSS. It is pretty basic functionality, allowing the listing and searching of items by name.

## Configuration

The project works out of the box with Laravel Sail using Docker.

### Prerequisites

- [Composer](https://getcomposer.org/)
- [Laravel](https://laravel.com/docs/10.x#laravel-and-docker)
- [Docker](https://laravel.com/docs/10.x#laravel-and-docker)

### Installation

- Checkout this repo
```console
git clone git@github.com:jaureguivictoria/hatchet.git
```

- Enter the new project folder
```console
cd devtest
```

- Run composer install
```console
composer install
```

- Set your own environment keys
```console
cp .env.example .env
```

- Run sail build
```console
./vendor/bin/sail build
```

- Run sail up
```console
./vendor/bin/sail up
```

- Run the migrations
```console
./vendor/bin/sail artisan migrate
```

- (Optional) Run the office locations seeder
```console
./vendor/bin/sail artisan db:seed 
```

## Frontend

Go to [localhost:80](localhost:80) to see the frontend. There is a single page which contains a paginated table of all the offices information, as well as a various filters to search by name, number of offices, number of tables, square meters and price.


## API Documentation

The API Documentation is in Postman, and can be found here: [add]. 


## Tests

The API Feature tests are inside the ```app/tests/``` folder.

They can be run using the following command:

```console
./vendor/bin/sail artisan test
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

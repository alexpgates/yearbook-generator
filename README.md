# Yearbook Generator

Parse a photo CD provided by Scholastic and generate a simple PDF yearbook for your school.

## Getting Started


### Prerequisites

You'll need a local development environment with PHP 7.1 and MySQL.
The app is built using the [Laravel PHP framework](https://github.com/laravel/). PDF generation is handled using [Spatie](https://github.com/spatie/)'s excellent [Browsershot package](https://github.com/spatie/browsershot), which requires node 7.6.0 or higher and the Puppeteer Node library.

### Installing

- Clone the repository to your local environment, then run `composer install`
- Update your `.env` file appropriately to reference your database
- run `php artisan migrate` to migrate your datbase tables
- run `npm install` or `yarn install` to install dependencies

### Generating your yearbook

- Copy the contents of your scholastic CD to the `storage\app\public\yearbook` directory
- run `php artisan yearbook:parse` - this will build the database with the Scholastic data
- in the `staff_members` directory, fill in appropriate prefix (Mrs. / Ms. / Mr. etc.) and title for each staff member.
- note `teacher_room` is used to determine which pages staff belong on. Any staff member (including the teacher) should have `teacher_room` set to the classroom teacher's last name.
- run `php artisan yearbook:generate` - this will generate PDFs for each classroom and save them in `/storage/generated-yearbook`

## Built With

* [Laravel](https://github.com/laravel/) - Laravel PHP Framework
* [Browsershot](https://github.com/spatie/browsershot) - PDF generation from using a headless Chrome browser
* [Bootstrap 4](https://getbootstrap.com/docs/4.0/getting-started/introduction/) - For page layout

## License

This project is licensed under the GNU General Public License v3.0 - see the [LICENSE.md](LICENSE.md) file for details


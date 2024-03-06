# Hotel Voting App with Laravel and Vue.js

## Description

This project is a web application built with Laravel framework and Vue.js.
I knew this was going to be fun, so I decided to have all the fun and go for the latest Laravel 10 and Vue 3 with the composition API.

## Cool Features

- **Password less logins**: The applications uses `laravel/breeze` in conjunction with the `norbybaru/passwordless-auth` to provide a simple passwordless login system, with magic links being sent via email.
- **User Registration**: The application includes a user registration feature, allowing users to create their own accounts so they can vote.
- **Interactive UI**: The application uses Vue.js to create a dynamic and interactive user interface.
- **Useful database factories and seeders**: to easily populate the database with dummy data for testing purposes. The seeders handle the required logic to properly create polls, contenders, voters and votes.
- **Voting process is queued**: The vote controller dispatches a job to handle the vote process, using Laravel's built-in queue system. This way, the user doesn't have to wait for the vote to be processed, and the system can handle a large number of votes without crashing.

## Installation

1. Clone the repository
2. Run `composer install`
3. Run `npm install`

## Database Seeders

To seed the DB, you can run the following commands:

```php artisan db:seed --class=PollSeeder```
Answer 1 to the question, and it will create the required Hotels poll with its contenders.

Run it again and answer any number bigger than 1, and it will create N polls, each one with 4 contenders.

```php artisan db:seed --class=VoterSeeder```
Answer with any number, and it will create N users with random emails.

```php artisan db:seed --class=VoteSeeder```
Answer with any number, and it will create N votes for EACH poll, obeying the rule that a user can only vote once per poll.


## To-Do (most out of the scope of the challenge, but I'd like to do it anyway)

- [ ] Add a CRUD page to manage polls and contenders
- [ ] Remove requirement for password when registering a new user
- [ ] Improve the user interface (it's not responsive)
- [ ] Add dark theme support (as we are using Tailwind CSS, it's easy to do)
- [ ] Queue the password less emails



## License

This project is licensed under the MIT License.

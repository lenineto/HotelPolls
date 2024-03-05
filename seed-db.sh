#!/bin/bash
php artisan db:seed --class VoterSeeder
php artisan db:seed --class PollSeeder
php artisan db:seed --class ContenderSeeder

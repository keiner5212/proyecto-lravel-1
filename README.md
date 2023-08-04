# Race Information App

## Overview
This web app allows users to view information about upcoming races and register for a race using PayPal. The app is built using Laravel and MySQL for the database, and includes two interfaces: one for users and one for administrators.

## Features
- User authentication: Users can create an account and log in to access the app's features.
- Race information: The app includes information about upcoming races, including date, time, location, and distance.
- Runner registration: Users can register for a race using PayPal.
- PDF receipts: The app generates PDF receipts for runner registrations.
- Sponsor registration: Sponsors can register to support a race.

## Technologies Used
- Laravel: Used as the backend framework for the app.
- MySQL: Used as the database for storing race information and user data.
- PayPal API: Used to process payments for runner registrations.

## Getting Started
To get started with using the app, follow these steps:
1. Clone the repository to your local machine.
2. Install the required dependencies by running `composer install`.
3. Set up a MySQL database and update the `.env` file with your database credentials.
4. Run the migrations by running `php artisan migrate`.
5. Run the app by running `php artisan serve` and navigating to `http://localhost:8000` in your web browser.

# PHP CV Generator
This project was initially cloned from https://github.com/Rishikavishnoi/Resume-Builder which is written in HTML,CSS & JS.
It was modified to include a backend(PHP and MySQL) and also a custom login form.

## Setup
- Clone this repo to the xampp/htdocs directory on your pc (or whatever you use for PHP develpment)
- Create a MySQL database called `cv_generator` and import the `cv_generator.sql` file to that database (using phpmyadmin preferably).
- You're now done with the setup

## Usage
- Open a browser window and load this project on localhost.
- In the login form, you can provide any valid email and use `UBa21PC0412` as the password.
  > This was a class project and as a requirement, the password had to follow the format of our school matricule numbers. This was achieved using regex but you can totally change the implementation in `login.php` if you wish.
- After you Login, you can fill in your details and generate a CV

**NB: Beware that this is a crappy project**

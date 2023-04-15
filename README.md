# Tersea Exercice

This is a mini CRM application that connects a company with its employees. The application has two protected areas, the administrator area and the employee area, both protected by authentication. The administrator can create, modify, or delete a company, invite employees to join a company via email, and search and sort through companies and employees. The employee can only view their own information and the information of their company and its employees.

# Table of contents

-   [Requirements](#requirements)
-   [Getting Started](#getting-started)
-   [Technologies Used](#technologies-used)
-   [Installation](#installation)
-   [Contributing](#contributing)

# Requirements

Before installing and running this application, make sure your system meets the following requirements:

-   PHP >= 8.1
-   Composer 2.2
-   MySQL or MariaDB database

If your system does not meet these requirements, you may need to install or update some of the above software before proceeding with the installation of this application.

# Getting Started

To get started with this project, follow these steps:
1- Clone the repository to your local machine.
2- Install the dependencies using Composer by running the following command in your terminal:

    composer install

3- Create a `.env` file by copying the .env.example file and updating the values as necessary.

    cp .env.example .env

4- Generate an application key by running the following command:

    php artisan key:generate

5- Run database migrations and seed the database with sample data by running the following commands:

    php artisan migrate --seed

6- Start the development server:

    php artisan serve

7- Navigate to http://localhost:8000/ in your web browser to access the application.

[(Back to top)](#table-of-contents)

# Technologies Used

As requested from the exercice, The main framework i used `Laravel 10` with some libraries of `Javascript`.

# Features

As requested also from the exercice, the features deployed here are separated by sides :


### Admin Side

-   Administrator must login first.
-   Administrator can create other administrators.
-   Administrator can create, modify, or delete a company.
-   Administrator can browse a company, see its information, check the list of its employees.
-   Administrator can invite employees to join a company via email invitation.
-   Administrator can cancel an invitation if its not opened yet.
-   Administrator can search and sort through companies and employees and invitations.
-   Administrator actions are traced and listed in the history module with their time stamp.

### Employe Side

-   Employe must login first.
-   Employe can accept an invitation and create his account.
-   Employe can check his information and information about their company and its employees.

# Acknowledgments

Thank you to the team at Tersea for providing this exercise and i am hoping that it gets your attention.
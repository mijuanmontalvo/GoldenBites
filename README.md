
# Project Overview

## GoldenBites

In this repository, information has been generated for Goldenbite, which is a web application for selecting food dishes and making reservations on a specific date. This application is focused on elderly users of a residence and its kitchen. More details below.

### Introduction

Senior residences usually include a regular meal menu in their accommodation service, however, residents sometimes prefer to order extra dishes that are not included in the regular menu.


### Problem Statement

The problem here is that the kitchens of the residences do not know the additional quantity of different dishes that they must prepare and this can generate disorganization in the kitchen, bad service and food waste.


### Solution

Building a web application where residents can generate orders that include special dishes that are not included in the regular daily menu. On the other hand, the web application will allow the kitchen to review the orders made by residents and thus have a clear idea of ​​the additional dishes that need to be prepared for a specific date.

## Technologies Used

- **Frontend**: HTML, CSS, JavaScript
- **Backend**: PHP
- **Database**: MySQL/MariaDB
- **Code editor**: Visual Studio Code

**Note**: For the construction of this web application, XAMPP has been used, which is a free software package that provides a local server development environment. Its name is an acronym that represents its main components: X (multiplatform), Apache (web server), MySQL/MariaDB (database manager), PHP (programming language), and Perl (programming language). This package facilitates the configuration of a local server for the development of web applications, since it includes all the necessary tools in a single installation. XAMPP is widely used by developers looking for a simple and efficient environment to develop web applications locally.


## Installation Steps

To install this web application it is necessary to take the following steps:

- **Step 1**: Download and install XAMPP from the [official website](https://www.apachefriends.org/). More datails here (This web application was built on Windows 11 Home Operating System).
- **Step 2**: Once XAMPP is configured, it will be necessary to clone this repository into the htdocs folder:
```bash
   git clone https://github.com/mijuanmontalvo/GoldenBites
```   
- **Step 3**: Open the Project in Visual Studio Code
Open the cloned project in Visual Studio Code (VS Code).

- **Step 4**: Building or import the database with its respective tables: User, reservation and dish ([Here](/database) is a backup of the database). In PHPMyAdmin, select the "Import" tab and choose the Goldenbites.sql file to import.

- **Step 5**: Serve the Project
Navigate to the index.php file, right-click on it, and select "PHP Server: Serve project". This will serve your project at http://localhost:3000/.

- **Step 6**: Start to use Goldenbites
With the server running and the database set up, navigate to http://localhost:3000/ in your web browser to start using Goldenbites ([here is a user manual](/usermanual)).

**Note**: Once the application is loaded on the PC it will be possible to use the web application or it will be possible to update the code (HTML, PHP, CSS, MySQL) to make improves.

## Usage Instructions


## License

This project is licensed under the MIT License. For more details, see the LICENSE file.

## Basic Contribution Guidelines

Contributions are welcome. If you have any ideas or improvements, you can fork the repository and submit a pull request.

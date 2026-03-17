# Vulnerable PHP Lab

## Project Overview
This is a security training application deliberately filled with common web vulnerabilities. It is structured as a small lab where beginner developers and security researchers can learn how vulnerabilities work by exploiting them in a safe, controlled environment. The lab covers attacks like SQL Injection, Cross-Site Scripting (XSS), Command Injection, Local File Inclusion (LFI), and unrestricted File Uploads.

## Technology Stack
- **PHP**: Used for the backend logic and to intentionally create the server-side vulnerabilities for educational purposes. 
- **MySQL**: The database used to store users and demonstrate data-related vulnerabilities like SQL Injection.
- **Docker & Docker Compose**: Used to easily package and run the application and database together with a single command, without having to configure a web server or database manually on your own machine.
- **HTML/CSS**: Provides the basic structure and styling for the user interface.

## Folder Structure
- `app/` - Contains the main application code (all the PHP files that run the vulnerable challenges).
  - `uploads/` - The directory where user-uploaded files are stored.
- `database/` - Contains initial database setup scripts.
- `directives/` & `execution/` - Helper and workflow documentation directories.

## File Explanations

### `docker-compose.yml`
This file defines how the application starts up in isolated containers. It connects a web server container (running PHP and Apache) with a database container (running MySQL).

### `Dockerfile`
This explains how to build the web server. It starts with a base PHP image, installs the necessary tools to communicate with MySQL, and copies the website's code into the correct web folder.

### `database/init.sql`
This file runs automatically when the database first starts. It creates a `users` table and adds some initial test accounts (like `admin` and `test`) so you have something to practice hacking against.

### `app/index.php`
This is the main landing page of the application, welcoming users to the lab and providing links to the different security challenges.

### `app/dashboard.php`
A secondary menu page that lists the various vulnerabilities you can test. 

### `app/login.php`
This file handles a simple login form. It checks the username and password against the database but does it insecurely. Because the user input is glued directly into the database query without "cleaning" it first, you can use "SQL Injection" to log in without a valid password.

### `app/sql_injection.php`
This file searches for a user by their ID number. Similar to the login page, it connects to the database insecurely, allowing an attacker to type malicious database commands into the search box and extract extra data.

### `app/xss.php`
This file provides a basic comment section. Whatever message you type is bounced right back out onto the screen in the web browser. Since it doesn't sanitize the text, an attacker can input JavaScript code disguised as a comment, and the browser will run it. This is called Cross-Site Scripting (XSS).

### `app/file_upload.php`
This page lets you upload a file. The problem is that it assumes you upload a safe file (like a picture). Since it doesn't verify what kind of file you provide, an attacker might upload a malicious PHP file to run code directly on the server.

### `app/command_injection.php`
This script simulates a network "ping" tool to check if an IP address is reachable. It takes the text you provide and runs it directly on the underlying computer's command line. Without any checks, an attacker can append dangerous system commands to the IP address.

### `app/lfi.php`
This file loads other web pages by passing their name in the URL (e.g., `?page=home.php`). Because it blindly trusts the file path it is given, an attacker can exploit this to read sensitive files located elsewhere on the server. This is known as Local File Inclusion (LFI).

### `app/style.css`
A simple stylesheet that makes the web application look presentable.

## How It All Works Together
When you launch the environment using `docker-compose up`, the `docker-compose.yml` file provisions a PHP web server and a database. The database uses `init.sql` to populate a table with some dummy records. 

A user then visits the main application at `app/index.php`. The index and dashboard pages act as menus, routing the user to various challenges (like `app/login.php` or `app/xss.php`). When the user inputs data on these challenge pages, the PHP scripts take the input and misuse it—by plugging it unsafely into database queries, running it as system commands, or printing it as raw output on the page. This unsafe data flow enables the lab's users to practice exploiting those very flaws.

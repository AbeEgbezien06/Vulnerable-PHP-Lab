# Vulnerable-PHP-Lab
Project Overview

Vulnerable PHP Lab is a small web application designed for cybersecurity learning and practice. It simulates common web vulnerabilities so that students or beginner penetration testers can safely experiment with attacks like:

SQL Injection
Cross-Site Scripting (XSS)
File Upload Exploitation
Command Injection
Local File Inclusion (LFI)

This lab is intentionally insecure and should never be exposed to the public Internet. It is meant for learning and practice onlywas built with an agentic development platform.

Technology Stack
Technology	Purpose
PHP 7.4	Server-side scripting language
MySQL 5.7	Database for storing users and test data
Apache	Web server for serving PHP files
Docker	Containerization platform to easily run the app and database
Docker Compose	Orchestrates the multi-container setup (PHP + MySQL)
HTML/CSS	Frontend structure and basic styling
Optional: Bootstrap	To improve styling (if added)
Folder Structure
vulnerable-php-lab
│
├── docker-compose.yml
├── Dockerfile
│
├── database
│   └── init.sql
│
└── app
    ├── index.php
    ├── login.php
    ├── dashboard.php
    ├── security.php
    ├── sql_injection.php
    ├── xss.php
    ├── file_upload.php
    ├── command_injection.php
    ├── lfi.php
    ├── uploads/
    └── style.css
File-by-File Explanation
1. docker-compose.yml
Purpose: Defines and runs the multi-container Docker environment.
web: Builds the PHP/Apache container using Dockerfile. Exposes port 8080. Depends on the database container.
db: Runs MySQL 5.7, sets root password, and initializes the database using database/init.sql.
Why it matters: This makes the app easy to run anywhere without installing PHP/MySQL directly on your computer.

2. Dockerfile
Purpose: Builds the PHP container.
Uses php:7.4-apache base image
Installs MySQL PHP extension (mysqli)
Copies all app files into Apache's web root (/var/www/html/)
Exposes port 80 for HTTP requests
Why it matters: It creates a ready-to-run PHP environment for your lab.

3. database/init.sql
Purpose: Initializes the MySQL database with tables and test users.
Creates users table with id, username, and password
Inserts sample users (admin, test)

Why it matters: Provides data to practice SQL injection and login bypass attacks.

4. app/index.php
Purpose: The home page or landing page for the lab.
Simple HTML page with links to all vulnerabilities
Uses style.css for basic design
Why it matters: Acts as a navigation hub for beginners to access all exercises.

5. app/login.php
Purpose: Login page for lab authentication.
Uses PHP sessions to store logged-in users
Checks username and password against the users table
Vulnerable to SQL injection because user input is used directly in SQL query
Why it matters: Introduces login bypass vulnerability and teaches session handling.

6. app/dashboard.php
Purpose: User dashboard after login.
Only accessible if logged in (session check)
Displays a sidebar with links to all vulnerability pages
Styled to look like a lab dashboard
Why it matters: Provides central navigation and reinforces session-based access control.

7. app/security.php

Purpose: Security level configuration.
Lets the user choose Low / Medium / High security
Changes how some vulnerabilities behave (e.g., SQL injection query filtering)
Why it matters: Teaches beginners how security measures affect attacks.

8. app/sql_injection.php
Purpose: Practice SQL Injection attacks.
Vulnerable query example:
$query = "SELECT * FROM users WHERE id='$id'";
User can enter 1' OR '1'='1 to bypass restrictions
Why it matters: Demonstrates classic SQL injection.

9. app/xss.php
Purpose: Practice Cross-Site Scripting (XSS).
Displays user-submitted comments without sanitization
Why it matters: Shows how unsanitized input can run malicious scripts.

10. app/file_upload.php
Purpose: Practice file upload exploitation.
Allows users to upload any type of file to uploads/ folder
Vulnerable because it does not restrict file type
Why it matters: Demonstrates how unsafe file uploads can lead to web shells or system compromise.

11. app/command_injection.php
Purpose: Practice command injection.
Takes user input and runs it via system()
Vulnerable because input is not validated
Why it matters: Teaches how unsanitized input can run arbitrary system commands.

12. app/lfi.php
Purpose: Practice Local File Inclusion (LFI).
Uses include($_GET['page']); to load files
Vulnerable because user can include sensitive system files
Why it matters: Demonstrates directory traversal attacks.

13. app/uploads/
Purpose: Stores uploaded files.
Folder where file_upload.php stores files
Can contain images, text files, or malicious PHP files
Why it matters: Simulates a real-world file upload scenario, including potential web shells.

14. app/style.css
Purpose: Provides basic styling.
Styles home page, dashboard, and sidebar
Improves readability and makes navigation easier
Why it matters: Makes the lab visually organized for beginners.

How the Project Works Together
Docker Environment: docker-compose.yml starts PHP + MySQL containers.
Database: init.sql creates a users table for login and SQL injection practice.

Login Flow: login.php → dashboard.php
Uses sessions to track users

Only logged-in users can access the dashboard
Dashboard Navigation: Links to all vulnerability pages:

SQL Injection → sql_injection.php
XSS → xss.php

File Upload → file_upload.php
Command Injection → command_injection.php

LFI → lfi.php
Security Levels: security.php adjusts vulnerability behavior (low/medium/high).

Vulnerable Features: Each page is intentionally insecure to allow safe exploitation and learning.
Uploads Folder: uploads/ stores user-submitted files for file upload testing.

Styling: style.css provides a clean interface to make the lab easy to navigate.

Notes for Beginners
Never expose this lab to the internet. It is intentionally insecure.
Use it in a local environment or isolated VM.

Experiment safely with tools like:
Burp Suite
SQLmap
OWASP ZAP

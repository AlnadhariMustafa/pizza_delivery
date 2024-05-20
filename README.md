# Pizza Delivery Website

## Introduction

This project is a pizza delivery website that allows users to register, log in, recover passwords, and place orders for pizzas. The website is designed with several security measures to protect against various types of attacks, including Client-State Manipulation, Session Hijacking Attacks, Spoofing Authentication Cookies Attacks, and Session Fixation Attacks.

## Features

- User Registration
- User Login
- Password Recovery
- Pizza Ordering
- Secure Session Management

## Security Measures Implemented

1. **SQL Injection Prevention**
   - All user inputs are sanitized using `real_escape_string` and prepared statements.

2. **CSRF Protection**
   - CSRF tokens are implemented for forms to prevent Cross-Site Request Forgery attacks.

3. **Session Cookie Security**
   - Session cookies are set with `HTTPOnly` and `Secure` flags to protect against cookie theft and ensure they are only sent over HTTPS.

4. **Session ID Regeneration**
   - Session IDs are regenerated to prevent session fixation attacks.

5. **Secure Session Start**
   - Sessions are securely started in `config.php` before any output is sent to the browser.

## Files

- `index.php`: Home page with navigation to login, register, recover password, and order pizza.
- `login.php`: Handles user login and session management.
- `register.php`: Handles user registration.
- `recover.php`: Allows users to recover their password.
- `logout.php`: Logs out the user and ends the session.
- `order.php`: Allows logged-in users to place orders for pizzas.
- `config.php`: Contains database connection settings and session configuration.
- `csrf_token.php`: Functions for generating and verifying CSRF tokens.
- `Database.sql`: SQL script to create the required database tables.

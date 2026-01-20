# Secure PHP Login System

A workshop project demonstrating essential PHP security best practices for a login system.

## Features

- **Secure Authentication**: Password hashing with `password_hash()` and verification with `password_verify()`
- **SQL Injection Prevention**: Prepared statements with parameterized queries
- **Input Validation**: Email validation and password strength requirements
- **Output Sanitization**: XSS prevention with `htmlspecialchars()`
- **Session Security**: Secure session management with ID regeneration
- **Secure Cookies**: HttpOnly, Secure, and SameSite attributes
- **Error Handling**: Generic error messages to prevent user enumeration
- **CSRF Protection**: Session-based protection

## Files

- `index.php` - Landing page
- `signup.php` - User registration with password hashing
- `login.php` - Secure login with prepared statements
- `dashboard.php` - Protected user dashboard
- `logout.php` - Secure session termination
- `session.php` - Session configuration and management
- `db.php` - Database connection with PDO
- `setup.sql` - Database schema creation

## Setup Instructions

1. **Create Database**: Run `setup.sql` in phpMyAdmin or MySQL CLI
   ```bash
   mysql -u root < setup.sql
   ```

2. **Configure Database**: Update credentials in `db.php` if needed

3. **Place Files**: Copy all files to your web server's public directory
   ```
   C:\xampp\htdocs\Workshop10\
   ```

4. **Start Apache & MySQL**: Ensure both are running in XAMPP

5. **Access Application**:
   - Homepage: `http://localhost/Workshop10/`
   - Sign Up: `http://localhost/Workshop10/signup.php`
   - Login: `http://localhost/Workshop10/login.php`

## Security Best Practices Implemented

### 1. Password Security
- Passwords are hashed using `PASSWORD_DEFAULT` algorithm
- Minimum password length: 6 characters
- Never store plain-text passwords

### 2. SQL Injection Prevention
- All SQL queries use prepared statements with placeholders
- Disabled prepared statement emulation for true parameterized queries

### 3. Input Validation
- Email validated using `FILTER_VALIDATE_EMAIL`
- Password length checked before processing
- Empty field validation

### 4. Output Encoding
- User data escaped with `htmlspecialchars()` to prevent XSS
- UTF-8 encoding enforced

### 5. Session Security
- Session ID regenerated after login with `session_regenerate_id(true)`
- HttpOnly cookie flag prevents JavaScript access
- Secure flag ensures HTTPS-only transmission
- SameSite attribute set to 'Lax' for CSRF protection

### 6. Error Handling
- Generic error messages ("Invalid email or password") prevent user enumeration
- Specific handling for database errors
- Duplicate email detection (UNIQUE constraint on email field)

### 7. Authentication
- User validation before dashboard access
- Session destruction on logout
- Automatic redirect to login if session is invalid

## Database Schema

```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

## Testing the Application

1. **Sign Up**: Create a new user with email and password
2. **Login**: Use the credentials to log in
3. **Dashboard**: View logged-in user information
4. **Logout**: Securely end the session

## Security Testing

### Test SQL Injection Prevention
- Try entering `' OR '1'='1` in the email field
- The system should reject it as an invalid email

### Test Password Security
- Check database: passwords should be hashed, not plain text
- Use `password_verify()` for verification

### Test Output Encoding
- Create an account with `<script>alert('XSS')</script>` in email
- The script should not execute on the dashboard

### Test Session Security
- Check browser cookies (F12 > Application > Cookies)
- Verify `HttpOnly` flag is set
- Verify `Secure` flag is set (if HTTPS)

## Author

Workshop 10 - PHP Security Best Practices

## License

Educational Project

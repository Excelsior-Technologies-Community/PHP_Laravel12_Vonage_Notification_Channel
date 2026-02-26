# PHP_Laravel12_Vonage_Notification_Channel

A simple Laravel 12 project demonstrating how to send SMS notifications using the Vonage Notification Channel.

---

## Features

- Laravel 12
- User Registration System
- Phone Number Support
- SMS Notification via Vonage
- Queue Support (Database Driver)
- Clean MVC Structure
- Production Ready Setup

---

##  Technologies Used

- PHP 8+
- Laravel 12
- MySQL
- Vonage SMS API
- Laravel Notification System
- Laravel Queue System

---

##  Installation Guide

### Step 1: Clone Repository

```bash
git clone https://github.com/your-username/PHP_Laravel12_Vonage_Notification_Channel.git
cd PHP_Laravel12_Vonage_Notification_Channel
```

---

### Step 2: Install Dependencies

```bash
composer install
```

---

### Step 3: Configure Environment

Copy .env file:

```bash
cp .env.example .env
```

Generate application key:

```bash
php artisan key:generate
```

---

### Step 4: Setup Database

Update `.env`:

```env
DB_DATABASE=vonage_project
DB_USERNAME=root
DB_PASSWORD=
```

Create database:

```sql
CREATE DATABASE vonage_project;
```

Run migrations:

```bash
php artisan migrate
```

---

### Step 5: Install Vonage Notification Channel

```bash
composer require laravel/vonage-notification-channel
```

---

### Step 6: Configure Vonage API

Add in `.env`:

```env
VONAGE_KEY=your_api_key
VONAGE_SECRET=your_api_secret
VONAGE_SMS_FROM=LaravelApp
QUEUE_CONNECTION=database
```

Add to `config/services.php`:

```php
'vonage' => [
    'key' => env('VONAGE_KEY'),
    'secret' => env('VONAGE_SECRET'),
    'sms_from' => env('VONAGE_SMS_FROM'),
],
```

---

### Step 7: Setup Queue

```bash
php artisan queue:table
php artisan migrate
```

Run queue worker:

```bash
php artisan queue:work
```

---

### Step 8: Run Project

```bash
php artisan serve
```

Open in browser:

```
http://127.0.0.1:8000/
```
<img width="354" height="369" alt="image" src="https://github.com/user-attachments/assets/54d78597-a17c-4806-b867-ca2345136000" />

---

##  Project Structure

```
app/
 ├── Models/
 │    └── User.php
 ├── Notifications/
 │    └── WelcomeSmsNotification.php
 ├── Http/Controllers/
 │    └── AuthController.php

resources/views/
 └── register.blade.php

config/
 └── services.php

routes/
 └── web.php
```

---

##  How It Works

1. User registers with name, email, phone, and password.
2. User data is saved in database.
3. Laravel triggers notification.
4. SMS is sent using Vonage API.
5. Queue handles SMS sending in background.

---

##  User Model Configuration

```php
public function routeNotificationForVonage($notification)
{
    return $this->phone;
}
```

---

## SMS Notification Example

```php
public function toVonage($notifiable)
{
    return (new VonageMessage)
        ->content("Hello {$notifiable->name}, Welcome to our Laravel 12 App 🚀");
}
```

---

##  Testing

Use phone number with country code:

```
919876543210
```

For trial accounts:
- Only verified numbers can receive SMS
- Some countries require DLT registration

---

## Important Notes

- Keep your `.env` file private.
- Do NOT commit API credentials.
- Queue worker must be running for SMS to send.
- Trial Vonage accounts have limitations.

---

##  SMS Provider

This project uses:

Vonage SMS API

Official Package:
`laravel/vonage-notification-channel`

---

##  Future Improvements

- Login with SMS OTP
- Two-Factor Authentication (2FA)
- Order Confirmation SMS
- REST API Version
- Admin Dashboard
- SMS Logging System

---

##  Author

Mihir Mehta  
Laravel Developer  

---

##  License

This project is open-source and available under the MIT License.

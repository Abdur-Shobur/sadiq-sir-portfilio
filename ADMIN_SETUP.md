# Admin System Setup Guide

## Overview

This Laravel application includes a comprehensive admin system for managing content, including blogs, events, galleries, and contact messages.

## Features

### Admin Authentication

-   Secure login/logout system
-   Role-based access control (admin/user)
-   Middleware protection for admin routes

### Content Management

-   **Blog Management**: Create, edit, delete blog posts with categories
-   **Event Management**: Manage upcoming, ongoing, and completed events
-   **Gallery Management**: Upload and organize gallery images with categories
-   **Contact Messages**: View and manage contact form submissions

### File Upload System

-   Image upload for blogs, events, and gallery items
-   Automatic file storage in public disk
-   Image preview functionality
-   File validation and size limits

### Dynamic Frontend

-   Frontend components now use dynamic data from database
-   Contact form with AJAX submission
-   Social media links integration

## Installation & Setup

### 1. Database Setup

```bash
# Run migrations
php artisan migrate

# Seed the database with admin user
php artisan db:seed
```

### 2. Storage Setup

```bash
# Create storage link for file uploads
php artisan storage:link
```

### 3. Admin User Credentials

Default admin credentials:

-   **Email**: admin@example.com
-   **Password**: password

**Important**: Change these credentials after first login!

## Admin Panel Access

### Login URL

```
http://your-domain.com/admin/login
```

### Protected Routes

All admin routes are protected by authentication and admin middleware:

-   `/admin/dashboard` - Main dashboard
-   `/admin/blogs` - Blog management
-   `/admin/events` - Event management
-   `/admin/galleries` - Gallery management
-   `/admin/messages` - Contact messages

## API Endpoints

### Public API

-   `GET /api/blogs` - Get published blog posts
-   `GET /api/events` - Get upcoming events
-   `GET /api/galleries` - Get gallery items

### Protected Admin API

-   `GET /api/admin/blogs` - Get all blog posts
-   `POST /api/admin/blogs` - Create new blog post
-   `PUT /api/admin/blogs/{id}` - Update blog post
-   `DELETE /api/admin/blogs/{id}` - Delete blog post

Similar endpoints exist for events, galleries, and messages.

## File Structure

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── Auth/
│   │   │   └── AdminAuthController.php
│   │   └── Admin/
│   │       ├── DashboardController.php
│   │       ├── BlogController.php
│   │       ├── EventController.php
│   │       ├── GalleryController.php
│   │       └── ContactMessageController.php
│   └── Middleware/
│       └── AdminMiddleware.php
├── Models/
│   ├── User.php (updated with role field)
│   ├── Blog.php
│   ├── Event.php
│   ├── Gallery.php
│   └── ContactMessage.php

resources/views/
├── admin/
│   ├── auth/
│   │   └── login.blade.php
│   ├── layouts/
│   │   └── app.blade.php
│   ├── dashboard.blade.php
│   ├── blogs/
│   │   ├── index.blade.php
│   │   └── create.blade.php
│   └── messages/
│       └── index.blade.php

routes/
├── web.php (updated with admin routes)
└── api.php (new API routes)
```

## Usage

### Creating Content

1. Login to admin panel
2. Navigate to desired section (Blogs, Events, Gallery)
3. Click "New" button
4. Fill in required fields
5. Upload images if needed
6. Save content

### Managing Messages

1. Go to Messages section
2. View unread messages (highlighted)
3. Mark messages as read/unread
4. Delete messages when no longer needed

### File Uploads

-   Supported formats: JPEG, PNG, JPG, GIF
-   Maximum file size: 2MB
-   Images are stored in `storage/app/public/` directory
-   Accessible via `/storage/` URL

## Security Features

-   CSRF protection on all forms
-   Input validation and sanitization
-   File upload validation
-   Role-based access control
-   Secure password hashing
-   Session management

## Customization

### Adding New Content Types

1. Create model and migration
2. Create admin controller
3. Add routes to web.php and api.php
4. Create admin views
5. Update dashboard stats

### Modifying Admin Interface

-   Edit `resources/views/admin/layouts/app.blade.php` for layout changes
-   Modify CSS in layout file for styling
-   Add new menu items in sidebar

### API Customization

-   Modify API routes in `routes/api.php`
-   Add new endpoints as needed
-   Implement API authentication if required

## Troubleshooting

### Common Issues

1. **Storage link not working**

    ```bash
    php artisan storage:link
    ```

2. **Permission denied on file uploads**

    ```bash
    chmod -R 775 storage/
    chmod -R 775 bootstrap/cache/
    ```

3. **Admin login not working**

    - Check if admin user exists in database
    - Verify role field is set to 'admin'
    - Run seeder again if needed

4. **Images not displaying**
    - Ensure storage link is created
    - Check file permissions
    - Verify image paths in database

## Support

For additional support or customization requests, please refer to the Laravel documentation or contact the development team.

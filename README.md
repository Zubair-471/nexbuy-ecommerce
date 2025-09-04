# NexBuy E-commerce Platform

A comprehensive, full-stack e-commerce web application built with Laravel 12, featuring a modern UI with Tailwind CSS and Alpine.js. Complete with admin dashboard, user management, and advanced e-commerce functionality.

![Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?style=flat-square&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=flat-square&logo=php&logoColor=white)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-3.1-38B2AC?style=flat-square&logo=tailwind-css&logoColor=white)
![Alpine.js](https://img.shields.io/badge/Alpine.js-3.14-8BC0D0?style=flat-square&logo=alpine.js&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.0+-4479A1?style=flat-square&logo=mysql&logoColor=white)

## 🎯 Live Demo

*Coming Soon - Deploy to your preferred hosting platform*

## ✨ Features

### 🎨 Design & UX
- **Modern E-commerce Design**: Professional product showcase layout
- **Responsive Design**: Perfect on all devices and screen sizes
- **Smooth Animations**: CSS transitions and hover effects
- **Interactive Elements**: Product cards, shopping cart, and user interface
- **Admin Dashboard**: Comprehensive business management interface

### 🛍 E-commerce Features
- **Product Catalog**: Browse products with advanced search and filtering
- **Shopping Cart**: Add, update, and remove items with persistent storage
- **Wishlist Management**: Save favorite products for later purchase
- **Order Management**: Complete order lifecycle from cart to delivery
- **Product Reviews**: Rate and review products with approval workflow
- **Coupon System**: Discount code application and validation
- **User Authentication**: Secure registration and login with email verification

### ⚡ Technical Features
- **Role-Based Access Control**: Granular permissions system
- **Service Layer Architecture**: Clean separation of business logic
- **Database Migrations**: Version-controlled schema changes
- **Comprehensive Testing**: PHPUnit tests for core functionality
- **Performance Optimized**: Caching, indexing, and asset optimization

## 🚀 Quick Start

1. **Clone the repository**
   ```bash
   git clone https://github.com/yourusername/nexbuy.git
   cd nexbuy
   ```

2. **Install dependencies**
   ```bash
   # Install PHP dependencies
   composer install
   
   # Install Node.js dependencies
   npm install
   ```

3. **Environment setup**
   ```bash
   # Copy environment file
   cp .env.example .env
   
   # Generate application key
   php artisan key:generate
   ```

4. **Database setup**
   ```bash
   # Run migrations and seeders
   php artisan migrate --seed
   
   # Create storage link
   php artisan storage:link
   ```

5. **Build assets and start server**
   ```bash
   # Build frontend assets
   npm run build
   
   # Start development server
   php artisan serve
   ```

6. **Access the application**
   - **Frontend**: http://localhost:8000
   - **Admin Panel**: http://localhost:8000/admin

## 🗂 Website Sections

| Section | Description |
|---------|-------------|
| 🏠 **Home** | Product showcase and featured items |
| 🛍 **Products** | Product catalog with search and filters |
| 🛒 **Cart** | Shopping cart management |
| ❤️ **Wishlist** | Saved favorite products |
| 📦 **Orders** | Order history and tracking |
| 👤 **Profile** | User account management |
| 🔧 **Admin Dashboard** | Business metrics and analytics |
| 📊 **Product Management** | CRUD operations for products |
| 👥 **User Management** | Customer account administration |
| 📋 **Order Processing** | Order status and fulfillment |

## 📁 Project Structure

```
nexbuy/
├── app/                    # Application logic
├── database/              # Database migrations and seeders
├── resources/             # Views, CSS, and JavaScript
├── routes/                # Application routes
├── tests/                 # PHPUnit tests
├── composer.json          # PHP dependencies
├── package.json           # Node.js dependencies
└── README.md              # Project documentation
```

## 🎨 Features in Detail

### Product Management
- **Product Cards**: Beautiful product presentation with images
- **Pricing Display**: Clear pricing information with discounts
- **Add to Cart**: Interactive purchase buttons
- **Product Descriptions**: Detailed product information
- **Category Filtering**: Easy product category browsing

### Shopping Cart
- **Persistent Storage**: Cart items saved across sessions
- **Real-time Updates**: Dynamic quantity and price updates
- **Coupon Application**: Discount code validation and application
- **Checkout Process**: Complete order placement workflow

### Admin Dashboard
- **Business Metrics**: Sales, orders, and revenue analytics
- **User Management**: Customer account administration
- **Product Management**: Full CRUD operations for products
- **Order Processing**: Order status updates and tracking
- **Inventory Management**: Stock tracking and management

## 🔧 Customization

### Adding New Products
Update the products through the admin panel or add directly to the database:

```php
// Create new product
$product = Product::create([
    'name' => 'Product Name',
    'description' => 'Product description',
    'price' => 99.99,
    'category_id' => 1,
    'stock' => 100,
    'status' => 'active'
]);
```

### Changing Theme Colors
Edit Tailwind configuration in `tailwind.config.js`:

```javascript
module.exports = {
  theme: {
    extend: {
      colors: {
        primary: '#667eea',
        secondary: '#764ba2',
        accent: '#f59e0b',
      }
    }
  }
}
```

### Adding New Features
1. **Create Migration**: `php artisan make:migration create_feature_table`
2. **Create Model**: `php artisan make:model Feature`
3. **Create Controller**: `php artisan make:controller FeatureController`
4. **Add Routes**: Update `routes/web.php`
5. **Create Views**: Add Blade templates

## 🎯 Browser Support

- **Chrome**: 90+
- **Firefox**: 88+
- **Safari**: 14+
- **Edge**: 90+
- **Mobile**: iOS Safari, Chrome Mobile

## 📊 Performance Features

- **Database Indexing**: Optimized queries with proper indexing
- **Asset Optimization**: Minified CSS/JS with Vite
- **Caching**: Laravel's caching mechanisms
- **Lazy Loading**: Efficient loading of product images
- **CDN Ready**: Optimized for content delivery networks

## 🛍 E-commerce Integration

The application includes:

1. **Shopping Cart**: Complete cart functionality with persistence
2. **Product Database**: Full product management system
3. **Payment Gateway**: Ready for payment processor integration
4. **User Accounts**: Complete user registration and login system
5. **Order Management**: Full order tracking and management

## 🤝 Contributing

1. Fork the project
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 👨‍💻 Author & Contact

* **M. Zubair Tariq**
* 💼 [LinkedIn](https://www.linkedin.com/in/muhammad-zubair-tariq-70209b364)
* 🎯 [Fiverr – ZubairWebWorks](https://www.fiverr.com/ZubairWebWorks)

---

**Made by M. Zubair Tariq**

⭐ **Star this repo if you found it useful!**
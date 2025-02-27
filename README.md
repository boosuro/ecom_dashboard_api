# <p align="center"> Ecom Dashboard API</p>

#### <p align="center"> JWT Auth and Swagger Documentation</p>

## <p align="center"> Dashboard View</p>

# ![Dashboard](screenshots/screencapture-127-0-0-1-8000-dashboard-2022-12-16-12_48_29.png)

## <p align="center"> Login View</p>

# ![Dashboard](screenshots/screencapture-127-0-0-1-8000-login-2022-12-16-12_49_19.png)

## <p align="center"> Products View</p>

# ![Dashboard](screenshots/screencapture-127-0-0-1-8000-product-2022-12-16-12_48_10.png)

## <p align="center"> Product Variants</p>

# ![Dashboard](screenshots/screencapture-127-0-0-1-8000-productvariant-2022-12-16-12_47_55.png)

## <p align="center"> Register View</p>

# ![Dashboard](screenshots/screencapture-127-0-0-1-8000-register-2022-12-16-12_49_35.png)

## <p align="center"> Users View</p>

# ![Dashboard](screenshots/screencapture-127-0-0-1-8000-users-2022-12-16-12_46_36.png)

## <p align="center"> Variant Groups View</p>

# ![Dashboard](screenshots/screencapture-127-0-0-1-8000-variantgroup-2022-12-16-12_47_27.png)

# <p align="center"> Swagger Documentation Views</p>

# ![Swagger](screenshots/screencapture-127-0-0-1-8000-api-documentation-2022-12-16-13_32_24.png)

# ![Swagger](screenshots/screencapture-127-0-0-1-8000-api-documentation-2022-12-16-13_31_25.png)

# ![Swagger](screenshots/screencapture-127-0-0-1-8000-api-documentation-2022-12-16-13_30_22.png)

# ![Swagger](screenshots/screencapture-127-0-0-1-8000-api-documentation-2022-12-16-13_28_21.png)

# ![Swagger](screenshots/screencapture-127-0-0-1-8000-api-documentation-2022-12-16-13_28_48.png)

## Developed with Laravel 9 and PHP 8.0

# How to Setup

1. Clone the repository

```
   git clone https://github.com/boosuro/orderspackphptest.git
```

2. Switch to the repo folder

```
    cd orderspackphptest
```

3a. Install all the dependencies using composer

```
    npm install && npm run dev
```

b. Install all the dependencies using composer

```
    composer install
```

4. Copy the example env file and make the required configuration changes in the .env file

```
    cp .env.example .env
```

5. Generate a new application key

```
    php artisan key:generate
```

6. Generate a new JWT authentication secret key

```
    php artisan jwt:generate
```

7. Run the database migrations (**Set the database connection in .env before migrating**)

```
    php artisan migrate
```

8. Start the local development server

```
    php artisan serve
```

You can now access the server at http://127.0.0.1:8000

**TL;DR command list**

    git clone https://github.com/boosuro/orderspackphptest.git
    cd orderspackphptest
    npm install && npm run dev
    composer install
    cp .env.example .env
    php artisan key:generate
    php artisan jwt:generate

**Make sure you set the correct database connection information before running the migrations**

    php artisan migrate
    php artisan serve

# Swagger API Testing

The api can now be accessed at

    http://127.0.0.1:8000/api/documentation

# Laravel POS System with JWT, Roles, and Repository Pattern

A simple **Point of Sale (POS) system** built with **Laravel**, demonstrating enterprise design patterns such as **Repository Pattern, Service Layer**, and **Role-Based Authorization** with **JWT Authentication**.

---

## Table of Contents
- [Features](#features)
- [Technologies](#technologies)
- [Installation](#installation)
- [Design Patterns Applied](#design-patterns-applied)
- [Testing with Postman](#testing-with-postman)

---

## Features
- User registration & login with JWT authentication.
- Role-based access: **admin** and **customer**.
- Product management (CRUD) restricted to admin.
- Repository pattern for data access.
- Service layer for business logic separation.
- Policies & middleware for authorization.
- API ready for Postman or frontend consumption.

---

## Technologies
- PHP 8 / 9
- Laravel 10
- MySQL / MariaDB
- JWT Authentication (`tymon/jwt-auth`)
- Composer

---

## Installation
Clone the repository:

```bash
git clone https://github.com/salehemussa/pos-designpattern.git
cd <REPO>

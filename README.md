# Gig-App

A web application for managing gigs. Create, view, and organize gigs (or events/services), with user accounts, scheduling, and more.

---

## Table of Contents

- [Features](#features)  
- [Tech Stack](#tech-stack)  
- [Getting Started](#getting-started)  
  - [Prerequisites](#prerequisites)  
  - [Installation](#installation)  
  - [Running Locally](#running-locally)  
- [Contributing](#contributing)  
- [License](#license)  
- [Contact](#contact)

---

## Features

- User registration & authentication  
- Create, edit, delete gigs/events  
- View list of gigs (upcoming/past)  
- Possibly search or filter gigs  
- Dashboard to view your gigs  

---

## Tech Stack

| Component | Technology |
|-----------|------------|
| Backend   | PHP, Laravel |
| Frontend  | Blade templates, JavaScript, CSS framework (Tailwind / Bootstrap / etc.) |
| Build Tools | Vite, npm / yarn |
| Database  | MySQL|
| Testing   | PHPUnit |

---

## Getting Started

### Prerequisites

Make sure you have installed:

- PHP (compatible version for Laravel)  
- Composer  
- Node.js + npm (or yarn)  
- Database server (MySQL)  
- Git  

---

### Installation

1. Clone the repository:  
   ```bash
   git clone https://github.com/mhdGit402/Gig-App.git
   cd Gig-App

2. Copy .env.example to .env and set up your environment variables (DB credentials, etc.):
   ```bash
    cp .env.example .env

3. Install backend dependencies with Composer:
    ```bash
    composer install

4. Install frontend dependencies:
    ```bash
    npm install
    # or
    yarn

5. Generate application key (for Laravel):
   ```bash
   php artisan key:generate

6. Set up the database:
   - Create a database in your DB server
   - Run migrations:
     ```bash
     php artisan migrate

### Running Locally

- Start the local development server and watcher:
   ```bash
    php artisan serve
    npm run dev

Then open your browser at http://localhost:8000 (or whatever port Laravel uses) to see the app.

## Contributing

Contributions are welcome! Please fork the repository and submit a pull request for any enhancements or bug fixes.

### License
This project is licensed under the [MIT](https://choosealicense.com/licenses/mit/) License. See the LICENSE file for details.

### Contact
Created by [@mhdGit402](https://github.com/mhdGit402/)

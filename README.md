# Bus Travel Scheduling System

This project is a **Bus Travel Scheduling System** that helps manage and display bus-related data efficiently. It provides an admin panel for managing buses and a user-friendly interface for end-users to view bus schedules and details. The project includes secure authentication, responsive design, and interactive elements.

---

## Features

### Admin Features
- **Add Bus Details**:
  - Add buses with routes, timing, and images.
- **Update/Delete Bus Details**:
  - Edit or remove bus details from the system.
- **Bus List View**:
  - View a comprehensive list of buses.
- **Authentication**:
  - Secure admin login via `signin.php`.

### User Features
- **View Bus Details**:
  - Search and view bus schedules, including routes and timings.
- **Contact Form**:
  - Allows users to send messages or inquiries.
- **Interactive Design**:
  - Fully responsive interface for all devices.

---

## Technology Stack

- **Frontend**:
  - HTML, CSS, JavaScript
- **Backend**:
  - PHP
- **Database**:
  - MySQL
- **Styling**:
  - Custom CSS stylesheets (`style.css`, `constyle.css`)

---

## Project Structure

```plaintext
Bus_travelScheduling/
├── admin/
│   ├── uploads/                # Stores uploaded bus images
│   ├── admin_view_buses.php    # View all buses in the admin panel
│   ├── be_signin.php           # Backend for admin login
│   ├── delete_bus.php          # Delete bus data
│   ├── delete_bus_form.php     # Form for deleting bus details
│   ├── fetch_bus_info.php      # Fetch bus data for operations
│   ├── index.php               # Admin landing page
│   ├── insert_bus.php          # Backend for inserting bus details
│   ├── listIndex.php           # List all buses (admin view)
│   ├── save_bus.php            # Save bus data to the database
│   ├── signin.php              # Admin login page
│   ├── update_bus.php          # Backend for updating bus details
│   ├── update_bus_form.php     # Form for updating bus details
│   ├── view_bus.php            # View specific bus details
│   ├── view_messages.php       # View user messages
│   ├── css/
│       ├── constyle.css        # Additional CSS styles
│       ├── style.css           # Primary CSS styles
├── images/                     # Directory for static images
├── about.php                   # About page for the system
├── contact.php                 # Contact page
├── contact_form.php            # Backend for handling contact form submissions
├── index.PHP                   # Main landing page for users
├── README.md                   # Project documentation
└── db.sql                      # Database schema
________________________________________
Installation
Prerequisites
•	XAMPP or WAMP (for PHP and MySQL)
•	A web browser
•	Git (optional for cloning the repository)
Steps
1.	Clone the repository:
git clone https://github.com/your-username/bus-travel-scheduling.git
2.	Place the project folder in your server directory:
o	For XAMPP: C:/xampp/htdocs/
o	For WAMP: C:/wamp/www/
3.	Import the db.sql file into your MySQL database.
o	Open phpMyAdmin and create a database (e.g., bus_information).
o	Import the db.sql file.
4.	Update the database configuration in the PHP files (e.g., save_bus.php, be_signin.php):
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bus_information";

5.	Start the server and access the system in your browser:
              http://localhost/Bus_travelScheduling/
________________________________________
Database Schema
buses Table
Column	Type	Description
id	INT (AUTO_INCREMENT)	Unique bus ID
bus_no	VARCHAR(255)	Bus number
bus_image	VARCHAR(255)	Image path
starting_time	TIME	Starting time
dropping_time	TIME	Dropping time
route1 to route15	VARCHAR(255)	Route stops
________________________________________
Usage
Admin Panel
1.	Go to the admin login page: http://localhost/Bus_travelScheduling/admin/signin.php.
2.	Log in using your admin credentials.
3.	Manage buses:
o	Add new buses via insert_bus.php.
o	Update bus details via update_bus_form.php.
o	View messages via view_messages.php.
User Interface
1.	Access the homepage: http://localhost/Bus_travelScheduling/.
2.	View bus schedules and details.
3.	Send inquiries via the contact form.
________________________________________
Screenshots
Admin Dashboard
User Homepage
________________________________________
Future Enhancements
•	Add user registration and login for personalized features.
•	Implement GPS tracking for real-time bus location.
•	Enable advanced search and filtering options.
•	Add an analytics dashboard for admins.
________________________________________
________________________________________
Contact
For any queries, please contact:
•	Author: Rohit
•	GitHub: Your GitHub Profile




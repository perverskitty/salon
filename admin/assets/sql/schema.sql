-- Cloud9 runs MySQL version 5.5
CREATE DATABASE salon_db;
use salon_db;


-- roles table
CREATE TABLE roles (
    id INT PRIMARY KEY,
    role_name VARCHAR(45) NOT NULL,
    created_at TIMESTAMP DEFAULT '0000-00-00 00:00:00',
    changed_at TIMESTAMP DEFAULT NOW() ON UPDATE CURRENT_TIMESTAMP
);


-- users table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(45) NOT NULL,
    last_name VARCHAR(45) NOT NULL,
    email VARCHAR(90) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    tel VARCHAR(30) NOT NULL,
    gender INT NOT NULL,
    role_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT '0000-00-00 00:00:00',
    changed_at TIMESTAMP DEFAULT NOW() ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY(role_id) REFERENCES roles(id)
);


-- favourites table
CREATE TABLE favourites (
    client_id INTEGER NOT NULL,
    staff_id INTEGER NOT NULL,
    created_at TIMESTAMP DEFAULT '0000-00-00 00:00:00',
    changed_at TIMESTAMP DEFAULT NOW() ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY(client_id) REFERENCES users(id),
    FOREIGN KEY(staff_id) REFERENCES users(id),
    PRIMARY KEY(client_id, staff_id)
);


-- days table
CREATE TABLE days (
    id INT PRIMARY KEY,
    day_name VARCHAR(45) NOT NULL,
    created_at TIMESTAMP DEFAULT '0000-00-00 00:00:00',
    changed_at TIMESTAMP DEFAULT NOW() ON UPDATE CURRENT_TIMESTAMP
);


-- schedules table
CREATE TABLE schedules (
    id INT AUTO_INCREMENT PRIMARY KEY,
    staff_id INT NOT NULL,
    day_id INT NOT NULL,
    start_time TIME NOT NULL,
    end_time TIME NOT NULL,
    first_date DATE NOT NULL,
    last_date DATE NOT NULL,
    created_at TIMESTAMP DEFAULT '0000-00-00 00:00:00',
    changed_at TIMESTAMP DEFAULT NOW() ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY(staff_id) REFERENCES users(id),
    FOREIGN KEY(day_id) REFERENCES days(id)
);


-- activities table
CREATE TABLE activities (
    id INT PRIMARY KEY,
    activity_name VARCHAR(45) NOT NULL,
    created_at TIMESTAMP DEFAULT '0000-00-00 00:00:00',
    changed_at TIMESTAMP DEFAULT NOW() ON UPDATE CURRENT_TIMESTAMP
);


-- bookings table
CREATE TABLE bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    booking_date DATE NOT NULL,
    start_time TIME NOT NULL,
    end_time TIME NOT NULL,
    staff_id INT NOT NULL,
    activity_id INT NOT NULL,
    booking_text VARCHAR(255),
    created_at TIMESTAMP DEFAULT '0000-00-00 00:00:00',
    changed_at TIMESTAMP DEFAULT NOW() ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY(staff_id) REFERENCES users(id),
    FOREIGN KEY (activity_id) REFERENCES activities(id)
);


-- categories table
CREATE TABLE categories (
    id INT PRIMARY KEY,
    category_name VARCHAR(45) NOT NULL,
    created_at TIMESTAMP DEFAULT '0000-00-00 00:00:00',
    changed_at TIMESTAMP DEFAULT NOW() ON UPDATE CURRENT_TIMESTAMP
);


-- services table
CREATE TABLE services (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    duration TIME NOT NULL,
    category_id INT NOT NULL,
    cost DECIMAL(8,2) NOT NULL,
    created_at TIMESTAMP DEFAULT '0000-00-00 00:00:00',
    changed_at TIMESTAMP DEFAULT NOW() ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY(category_id) REFERENCES categories(id)
);


-- client_appointments table
CREATE TABLE client_appointments (
    booking_id INTEGER NOT NULL,
    client_id INTEGER NOT NULL,
    service_id INTEGER NOT NULL,
    created_at TIMESTAMP DEFAULT '0000-00-00 00:00:00',
    changed_at TIMESTAMP DEFAULT NOW() ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY(booking_id) REFERENCES bookings(id),
    FOREIGN KEY(client_id) REFERENCES users(id),
    FOREIGN KEY(service_id) REFERENCES services(id),
    PRIMARY KEY(booking_id)
);


-- guest_appointments table
CREATE TABLE guest_appointments (
    booking_id INTEGER NOT NULL,
    service_id INTEGER NOT NULL,
    guest_name VARCHAR(90) NOT NULL,
    guest_tel VARCHAR(30) NOT NULL,
    created_at TIMESTAMP DEFAULT '0000-00-00 00:00:00',
    changed_at TIMESTAMP DEFAULT NOW() ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY(booking_id) REFERENCES bookings(id),
    FOREIGN KEY(service_id) REFERENCES services(id),
    PRIMARY KEY(booking_id)
);


-- opening_times table
CREATE TABLE opening_times (
    id INT AUTO_INCREMENT PRIMARY KEY,
    day_id INT NOT NULL,
    open_time TIME NOT NULL,
    close_time TIME NOT NULL,
    first_date DATE NOT NULL,
    last_date DATE NOT NULL,
    created_at TIMESTAMP DEFAULT '0000-00-00 00:00:00',
    changed_at TIMESTAMP DEFAULT NOW() ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY(day_id) REFERENCES days(id)
);


-- bills table
CREATE TABLE bills (
    id INT AUTO_INCREMENT PRIMARY KEY,
    booking_id INT NOT NULL,
    is_paid BOOLEAN NOT NULL DEFAULT FALSE,
    bill_cost DECIMAL(8,2) NOT NULL,
    created_at TIMESTAMP DEFAULT '0000-00-00 00:00:00',
    changed_at TIMESTAMP DEFAULT NOW() ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY(booking_id) REFERENCES bookings(id)
);


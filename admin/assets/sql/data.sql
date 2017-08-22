-- Cloud9 runs MySQL version 5.5
CREATE DATABASE salon_db;
use salon_db;


-- roles data
INSERT INTO roles (id, role_name, created_at, changed_at) VALUES
('1', 'Manager', null, null),
('2', 'Hairdresser', null, null),
('3', 'Client', null, null);


-- users data
INSERT INTO users (first_name, last_name, email, password, tel, gender, role_id, created_at, changed_at) VALUES
('Peter', 'Cheung', 'peter@test.com', 'peter', '07540111111', '1', '1', null, null),
('Jane', 'Doe', 'jane@test.com', 'jane', '07540222222', '2', '2', null, null),
('John', 'Appleseed', 'john@test.com', 'john', '07540333333', '1', '3', null, null),
('Maggie', 'Smith', 'maggie@test.com', 'maggie', '07540444444', '2', '3', null, null);


-- favourites data
INSERT INTO favourites (client_id, staff_id, created_at, changed_at) VALUES
('3', '2', null, null),
('4', '1', null, null);


-- days data
INSERT INTO days (id, day_name, created_at, changed_at) VALUES
('1', 'Sunday', null, null),
('2', 'Monday', null, null),
('3', 'Tuesday', null, null),
('4', 'Wednesday', null, null),
('5', 'Thursday', null, null),
('6', 'Friday', null, null),
('7', 'Saturday', null, null);


-- schedules data
INSERT INTO schedules (staff_id, day_id, start_time, end_time, first_date, last_date, created_at, changed_at) VALUES
('1', '1', '10:00:00', '14:00:00', '2017-01-01', '2017-12-31', null, null),
('1', '1', '15:00:00', '17:00:00', '2017-01-01', '2017-12-31', null, null),
('1', '2', '10:00:00', '14:00:00', '2017-01-01', '2017-12-31', null, null),
('1', '2', '15:00:00', '19:00:00', '2017-01-01', '2017-12-31', null, null),
('1', '4', '10:00:00', '14:00:00', '2017-01-01', '2017-12-31', null, null),
('1', '4', '15:00:00', '19:00:00', '2017-01-01', '2017-12-31', null, null),
('1', '5', '10:00:00', '14:00:00', '2017-01-01', '2017-12-31', null, null),
('1', '5', '15:00:00', '19:00:00', '2017-01-01', '2017-12-31', null, null),
('1', '6', '10:00:00', '14:00:00', '2017-01-01', '2017-12-31', null, null),
('1', '6', '15:00:00', '19:00:00', '2017-01-01', '2017-12-31', null, null),
('1', '7', '10:00:00', '14:00:00', '2017-01-01', '2017-12-31', null, null),
('1', '7', '15:00:00', '19:00:00', '2017-01-01', '2017-12-31', null, null),
('2', '1', '10:00:00', '13:00:00', '2017-01-01', '2017-12-31', null, null),
('2', '1', '14:00:00', '17:00:00', '2017-01-01', '2017-12-31', null, null),
('2', '2', '10:00:00', '13:00:00', '2017-01-01', '2017-12-31', null, null),
('2', '2', '14:00:00', '19:00:00', '2017-01-01', '2017-12-31', null, null),
('2', '4', '10:00:00', '13:00:00', '2017-01-01', '2017-12-31', null, null),
('2', '4', '14:00:00', '19:00:00', '2017-01-01', '2017-12-31', null, null),
('2', '5', '10:00:00', '13:00:00', '2017-01-01', '2017-12-31', null, null),
('2', '5', '14:00:00', '19:00:00', '2017-01-01', '2017-12-31', null, null),
('2', '6', '10:00:00', '13:00:00', '2017-01-01', '2017-12-31', null, null),
('2', '6', '14:00:00', '19:00:00', '2017-01-01', '2017-12-31', null, null),
('2', '7', '10:00:00', '13:00:00', '2017-01-01', '2017-12-31', null, null),
('2', '7', '14:00:00', '19:00:00', '2017-01-01', '2017-12-31', null, null);


-- activities data
INSERT INTO activities (id, activity_name, created_at, changed_at) VALUES
('1', 'Client appointment', null, null),
('2', 'Guest appointment', null, null),
('3', 'Staff holiday', null, null),
('4', 'Staff training', null, null),
('5', 'Salon refurbishment', null, null),
('6', 'Salon closed', null, null),
('7', 'Misc activity', null, null);


-- bookings data
INSERT INTO bookings (booking_date, start_time, end_time, staff_id, activity_id, booking_text, created_at, changed_at) VALUES
('2017-09-01', '11:00:00', '12:00:00', '1', '1', null, null, null),
('2017-09-06', '15:00:00', '17:00:00', '1', '2', null, null, null),
('2017-09-06', '14:00:00', '19:00:00', '2', '3', 'Dentist appointment.', null, null),
('2017-09-17', '10:00:00', '12:00:00', '2', '4', 'Updating styling skills.', null, null);


-- categories data
INSERT INTO categories (id, category_name, created_at, changed_at) VALUES
('1', 'Mens', null, null),
('2', 'Ladies', null, null),
('3', 'Childrens', null, null),
('4', 'Unisex', null, null);


-- services data
INSERT INTO services (title, duration, category_id, cost, created_at, changed_at) VALUES
('Ladies haircut and shampoo', '01:00:00', '2', '33.33', null, null),
('Mens haircut and shampoo', '01:00:00', '1', '25.00', null, null),
('Childrens haircut and shampoo', '01:00:00', '3', '16.66', null, null),
('Shampoo and blow dry', '01:00:00', '4', '20.83', null, null),
('Perm', '02:00:00', '4', '75.00', null, null),
('Straight perm', '03:00:00', '4', '116.66', null, null),
('Colour', '02:00:00', '4', '66.66', null, null),
('Highlights quarter-head', '02:00:00', '4', '75.00', null, null),
('Highlights half-head', '02:00:00', '4', '91.66', null, null),
('Highlights full-head', '03:00:00', '4', '108.33', null, null),
('Treatment', '02:00:00', '4', '50.00', null, null);


-- client_appointments data
INSERT INTO client_appointments (booking_id, client_id, service_id, created_at, changed_at) VALUES
('1', '3', '2', null, null);


-- guest_appointments data
INSERT INTO guest_appointments (booking_id, service_id, guest_name, guest_tel, created_at, changed_at) VALUES
('2', '7', 'Bob Martin', '09099777888', null, null);


-- opening_times data
-- Monday 2017-01-02 New Year's Day (substitute day)
-- Friday 2017-04-14 Good Friday
-- Monday 2017-04-17 Easter Monday
-- Monday 2017-05-01 Early May Bank Holiday
-- Monday 2017-05-29 Spring Bank Holiday
-- Monday 2017-08-28 Summer Bank Holiday
-- Monday 2017-12-25 Christmas Day
-- Wednesday 2017-12-27 Boxing Day (substitute day)
INSERT INTO opening_times (day_id, open_time, close_time, first_date, last_date, created_at, changed_at) VALUES
('1', '10:00:00', '17:00:00', '2017-01-01', '2017-12-31', null, null),
('2', '10:00:00', '19:00:00', '2017-01-01', '2017-01-01', null, null),
('2', '10:00:00', '19:00:00', '2017-01-03', '2017-04-16', null, null),
('2', '10:00:00', '19:00:00', '2017-04-18', '2017-04-30', null, null),
('2', '10:00:00', '19:00:00', '2017-05-02', '2017-05-28', null, null),
('2', '10:00:00', '19:00:00', '2017-05-30', '2017-08-27', null, null),
('2', '10:00:00', '19:00:00', '2017-08-29', '2017-12-24', null, null),
('2', '10:00:00', '19:00:00', '2017-12-26', '2017-12-31', null, null),
('4', '10:00:00', '19:00:00', '2017-01-01', '2017-12-26', null, null),
('4', '10:00:00', '19:00:00', '2017-12-28', '2017-12-31', null, null),
('5', '10:00:00', '19:00:00', '2017-01-01', '2017-12-31', null, null),
('6', '10:00:00', '19:00:00', '2017-01-01', '2017-04-13', null, null),
('6', '10:00:00', '19:00:00', '2017-04-15', '2017-12-31', null, null),
('7', '10:00:00', '19:00:00', '2017-01-01', '2017-12-31', null, null);



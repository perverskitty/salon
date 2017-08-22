-- HairdresserModel index() method    
SELECT 
    first_name,
    last_name,
    email,
    tel,
    role_name
    users.created_at AS created
FROM users 
INNER JOIN roles 
ON users.role_id = roles.id
WHERE users.role_id = 1 || users.role_id = 2 
ORDER BY users.created_at DESC;


-- ScheduleModel index() method
SELECT 
    day_name AS day,
    CONCAT(start_time, ' to ', end_time) AS shift,
    CONCAT(first_name, ' to ', last_name) AS staff,
    CONCAT(first_date, ' to ', last_date) AS valid
FROM schedules 
INNER JOIN users
ON schedules.staff_id = users.id
INNER JOIN days
ON schedules.day_id = days.id
ORDER BY first_date, day_id, last_name, start_time;


-- ServiceModel index() method
SELECT
    title AS service,
    duration,
    category_name AS category,
    cost
FROM services
INNER JOIN categories
ON services.category_id = categories.id
ORDER BY services.id;


-- ClientModel index() method
SELECT
    first_name,
    last_name,
    email,
    tel,
    users.created_at AS created
FROM users
LEFT JOIN favourites 
ON users.id = favourites.client_id
WHERE users.role_id = 3
ORDER BY users.created_at DESC;


-- BookingModel index() method
SELECT 
    innerTable.date,
    innerTable.start_time AS start,
    innerTable.end_time AS end,
    innerTable.staff,
    innerTable.activity,
    CONCAT(users.first_name, ' ', users.last_name, ' ', users.tel) AS client,
    innerTable.guest,
    innerTable.notes
FROM (SELECT 
    booking_date AS date,
    start_time,
    end_time,
    CONCAT(first_name, ' ', last_name) AS staff,
    activity_name AS activity,
    client_id AS client,
    CONCAT(guest_name, ' ', guest_tel) AS guest, 
    booking_text AS notes
FROM bookings 
INNER JOIN users
ON bookings.staff_id = users.id
INNER JOIN activities
ON bookings.activity_id = activities.id
LEFT JOIN client_appointments
ON bookings.id = client_appointments.booking_id
LEFT JOIN guest_appointments
ON bookings.id = guest_appointments.booking_id) AS innerTable
LEFT JOIN users
ON innerTable.client = users.id
WHERE DATE(innerTable.date) >= DATE(NOW())
ORDER BY innerTable.date, innerTable.start_time, innerTable.staff;


-- Select staff (managers and hairdressers) from users table
SELECT 
    id,
    CONCAT(first_name, ' ', last_name) AS full_name
FROM users
WHERE users.role_id = 1 OR users.role_id = 2;


-- Select categories from categories table
SELECT
    id,
    category_name
FROM categories;
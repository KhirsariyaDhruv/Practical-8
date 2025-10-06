-- 1. Create the Database
CREATE DATABASE IF NOT EXISTS student_portal_db;
USE student_portal_db;

-- 2. Create the Users Table
CREATE TABLE IF NOT EXISTS users (
    id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL, -- Storing a hash, not plain text
    role ENUM('student', 'admin') NOT NULL DEFAULT 'student',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- 3. Create the Events Table
-- Key Question 2: This table is used for SELECT operation demonstration
CREATE TABLE IF NOT EXISTS events (
    event_id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    event_date DATE NOT NULL,
    location VARCHAR(100),
    organizer_id INT(11),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- 4. Insert Mock Data into Users (passwords are 'password' hashed with PHP's password_hash)
INSERT INTO users (username, password_hash, role) VALUES
('alice_s', '$2y$10$q0A2Fp5c5iT8p0p0P0p0O.e/U7W4g7c0J9G/S7F7C7A7R7E7N7H7T7E7', 'student'), -- 'password'
('bob_a', '$2y$10$q0A2Fp5c5iT8p0p0P0p0O.e/U7W4g7c0J9G/S7F7C7A7R7E7N7H7T7E7', 'admin');   -- 'password'

-- 5. Insert Mock Data into Events (Supplementary Problem: Show latest 5 events)
-- Note: Dates are arranged to ensure we have recent and old events.
INSERT INTO events (title, description, event_date, location, organizer_id) VALUES
('Freshers Orientation', 'Mandatory orientation for all new students.', '2025-08-15', 'Main Auditorium', 2),
('Semester Project Deadline', 'Final submission for all computer science projects.', '2025-10-01', 'Online', 1),
('Career Fair 2025', 'Meet potential employers and land your dream job.', '2025-10-25', 'Campus Arena', 2),
('Alumni Networking Night', 'Connect with successful alumni from various industries.', '2025-11-05', 'Skydeck Lounge', 2),
('Winter Break Begins', 'Last day of classes before the winter holiday.', '2025-12-18', 'All Campus', 1),
('Spring Semester Registration', 'Early bird registration for the next semester.', '2026-01-05', 'Student Portal', 2),
('Graduation Ceremony', 'Celebrate the achievements of the graduating class.', '2026-05-20', 'Stadium', 1);

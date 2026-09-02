-- Part A: Create the database
CREATE DATABASE IF NOT EXISTS mydb;
USE mydb;

-- Part B: Create the users table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(100) NOT NULL,
    lastname VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    username VARCHAR(100) NOT NULL
);

-- Part C: Insert sample records
INSERT INTO users (firstname, lastname, email, username)
SELECT * FROM (SELECT 'Juan', 'Dela Cruz', 'juan@example.com', 'juandelacruz') AS sample
WHERE NOT EXISTS (SELECT 1 FROM users WHERE username = 'juandelacruz')
UNION ALL
SELECT * FROM (SELECT 'Maria', 'Santos', 'maria@example.com', 'mariasantos') AS sample
WHERE NOT EXISTS (SELECT 1 FROM users WHERE username = 'mariasantos')
UNION ALL
SELECT * FROM (SELECT 'Pedro', 'Garcia', 'pedro@example.com', 'pedrogarcia') AS sample
WHERE NOT EXISTS (SELECT 1 FROM users WHERE username = 'pedrogarcia')
UNION ALL
SELECT * FROM (SELECT 'Ana', 'Reyes', 'ana@example.com', 'anareyes') AS sample
WHERE NOT EXISTS (SELECT 1 FROM users WHERE username = 'anareyes')
UNION ALL
SELECT * FROM (SELECT 'Jose', 'Mendoza', 'jose@example.com', 'josemendoza') AS sample
WHERE NOT EXISTS (SELECT 1 FROM users WHERE username = 'josemendoza');

-- Verify
SELECT * FROM users;

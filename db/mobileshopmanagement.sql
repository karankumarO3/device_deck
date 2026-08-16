SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE accessories (
  id int(6) UNSIGNED NOT NULL,
  name varchar(50) NOT NULL,
  serial_no varchar(50) NOT NULL,
  brand varchar(50) NOT NULL,
  price decimal(10,2) NOT NULL,
  description text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO accessories (id, name, serial_no, brand, price, description) VALUES
(1, 'Samsung EHS64 Wired Stereo Headset with Remote and', '156481', 'samsung', 499.00, 'black color'),
(2, 'realme Buds Earphones', '156481', 'realme', 499.00, 'black/yellow color');

CREATE TABLE customerdevicedetails (
  id int(11) NOT NULL,
  name varchar(100) NOT NULL,
  mobile varchar(15) NOT NULL,
  address text NOT NULL,
  id_proof varchar(50) NOT NULL,
  payment enum('CARD','CASH') NOT NULL,
  device_name varchar(100) NOT NULL,
  brand varchar(50) NOT NULL,
  serial_no varchar(50) NOT NULL,
  specification text NOT NULL,
  prize decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO customerdevicedetails (id, name, mobile, address, id_proof, payment, device_name, brand, serial_no, specification, prize) VALUES
(1, 'KARAN KUMAR', '07696054697', 'vill. Gurha, Tehsil. Nakodar, Distt. Jalandhar', '69872548713274', 'CASH', 'samsung a34', 'Samsung', 'fgd654184df', 'dsgfdhedsgfdhgedr', 34000.00),
(2, 'RAM MURTI', '09872722117', 'vill. Gurha, Tehsil. Nakodar, Distt. Jalandhar', '69872548713274', 'CASH', 'iphone 13pro', 'Apple', '5198461', 'fdafw', 65000.00),
(3, 'Arsh', '7814859872', 'Nakodar, Jalandhar', '784569321548', 'CARD', 'One Plus 10R', 'OPPO', '186415', '12/256\r\nSnapDragon 8 Gen 2 ', 50000.00),
(4, 'Sameer', '5486921547', 'Jalandhar', '785412369856', 'CARD', 'iPhone 12 Mini', 'Apple', '98131564', '64GB', 35000.00),
(5, 'Karan Saroj', '7842659812', 'Jalandhar ', '658974123658', 'CARD', 'Realme 10+', 'Realme', '216354984', '12/256', 35000.00),
(6, 'Radhika', '8452136984', 'Jalandhar', '658974123658', 'CASH', 'Realme 10', 'Realme', '611968489', '8/128 GB', 35000.00),
(7, 'Roshani', '9854126985', 'Jalandhar 144040', '6548791235512', 'CASH', 'Realme 7', 'Realme', '654897521', '6/64GB\r\nG95', 18000.00);

CREATE TABLE devices (
  id int(6) UNSIGNED NOT NULL,
  name varchar(50) NOT NULL,
  serial_no varchar(50) NOT NULL,
  brand varchar(50) NOT NULL,
  price decimal(10,2) NOT NULL,
  description text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO devices (id, name, serial_no, brand, price, description) VALUES
(1, 'iPhone 13', '1654164815                                        ', 'Apple', 59900.00, 'Super Retina XDR display\r\n15.4 cm / 6.1″ (diagonal) all‑screen OLED display\r\n2532x1170-pixel resolution at 460 ppi\r\nHDR display\r\nTrue Tone\r\nWide colour (P3)\r\nHaptic Touch\r\n20,00,000:1 contrast ratio (typical)\r\n800 nits max brightness (typical); 1,200 nits max brightness (HDR)\r\nFingerprint-resistant oleophobic coating\r\nSupport for display of multiple languages and characters simultaneously'),
(2, 'Realme GT 6', '6518484', 'Realme', 36660.00, '256GB/512GB storage, no card slot\r\n'),
(3, 'S23', '156489415646', 'Samsung', 69900.00, '8/256 GB'),
(4, 'OnePlus Nord CE4 Lite', '2168565416', 'OPPO', 19999.00, 'Snapdragon 695\r\n8GB RAM + 8GB Virtual RAM⁸\r\n256GB Phone + 2TB Expandable');

CREATE TABLE users (
  id int(11) NOT NULL,
  username varchar(50) NOT NULL,
  email varchar(100) NOT NULL,
  password varchar(255) NOT NULL,
  created_at timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO users (id, username, email, password, created_at) VALUES
(1, 'i_admin_03', 'admin@gmail.com', '$2y$10$GKVQjvX2aFninWDefUAbXu85pEtWHZqzI51xJ3.LWYKIXPpz8NW7O', '2024-07-06 08:53:44');

ALTER TABLE accessories
  ADD PRIMARY KEY (id);

ALTER TABLE customerdevicedetails
  ADD PRIMARY KEY (id);

ALTER TABLE devices
  ADD PRIMARY KEY (id);

ALTER TABLE users
  ADD PRIMARY KEY (id),
  ADD UNIQUE KEY email (email);

ALTER TABLE accessories
  MODIFY id int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE customerdevicedetails
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

ALTER TABLE devices
  MODIFY id int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE users
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

CREATE TABLE sell_info (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(255),
    mobile_no VARCHAR(20),
    address TEXT,
    id_proof VARCHAR(255),
    payment_method VARCHAR(50),
    device_name VARCHAR(255),
    serial_no VARCHAR(255),
    brand VARCHAR(255),
    prize DECIMAL(10, 2),
    sell_date DATE NOT NULL,
    description TEXT
);

INSERT INTO sell_info (customer_name, mobile_no, address, id_proof, payment_method, device_name, serial_no, brand, prize, sell_date, description) VALUES
('Aastha', '1234567890', '123 Main St', 'ID1234', 'CASH', 'iPhone 13', '1654164815', 'Apple', 59900.00, '2024-07-01', 'Super Retina XDR display'),
('Roshani', '0987654321', '456 Elm St', 'ID5678', 'CARD', 'Realme GT 6', '6518484', 'Realme', 36660.00, '2024-07-02', '256GB/512GB storage, no card slot'),
('Yuvraj Shreshth', '1122334455', '789 Pine St', 'ID9101', 'CASH', 'S23', '156489415646', 'Samsung', 69900.00, '2024-07-03', '8/256 GB'),
('Karan Saroj', '2233445566', '321 Oak St', 'ID1112', 'CARD', 'OnePlus Nord CE4 Lite', '2168565416', 'OPPO', 19999.00, '2024-07-04', 'Snapdragon 695, 8GB RAM'),
('Radhika', '3344556677', '654 Maple St', 'ID1314', 'CASH', 'iPhone 13', '1654164815', 'Apple', 59900.00, '2024-07-05', 'Super Retina XDR display'),
('Abhinav', '4455667788', '987 Birch St', 'ID1516', 'CARD', 'Realme GT 6', '6518484', 'Realme', 36660.00, '2024-07-06', '256GB/512GB storage, no card slot'),
('Arshdeep', '5566778899', '123 Willow St', 'ID1718', 'CASH', 'S23', '156489415646', 'Samsung', 69900.00, '2024-07-07', '8/256 GB');

INSERT INTO sell_info (customer_name, mobile_no, address, id_proof, payment_method, device_name, serial_no, brand, prize, sell_date, description) VALUES
('Guri', '6677889900', '456 Cedar St', 'ID1920', 'CASH', 'OnePlus Nord CE4 Lite', '2168565416', 'OPPO', 19999.00, '2024-06-01', 'Snapdragon 695, 8GB RAM'),
('Nikita', '7788990011', '789 Oak St', 'ID2122', 'CARD', 'iPhone 13', '1654164815', 'Apple', 59900.00, '2024-06-15', 'Super Retina XDR display'),
('Yuvraj Dadra', '8899001122', '321 Maple St', 'ID2324', 'CASH', 'Realme GT 6', '6518484', 'Realme', 36660.00, '2024-06-30', '256GB/512GB storage, no card slot');

INSERT INTO sell_info (customer_name, mobile_no, address, id_proof, payment_method, device_name, serial_no, brand, prize, sell_date, description) VALUES
('Janvi', '9900112233', '123 Pine St', 'ID2526', 'CASH', 'S23', '156489415646', 'Samsung', 69900.00, '2024-05-10', '8/256 GB'),
('Shobha', '1001122334', '456 Birch St', 'ID2728', 'CARD', 'OnePlus Nord CE4 Lite', '2168565416', 'OPPO', 19999.00, '2024-05-20', 'Snapdragon 695, 8GB RAM'),
('Sanvi', '1112233445', '789 Willow St', 'ID2930', 'CASH', 'iPhone 13', '1654164815', 'Apple', 59900.00, '2024-05-25', 'Super Retina XDR display');


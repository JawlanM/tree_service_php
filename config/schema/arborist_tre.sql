-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2026 at 08:21 PM
-- Server version: 11.8.6-MariaDB
-- PHP Version: 8.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arborist_tre`
--

-- --------------------------------------------------------
--
-- Table structure for table `employees`
--
CREATE TABLE `employees` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(150) NOT NULL,
    `email` varchar(255) NOT NULL,
    `phone` varchar(50) DEFAULT NULL,
    `status` enum('active','inactive') NOT NULL DEFAULT 'active',
    `created_time` datetime DEFAULT current_timestamp(),
    `last_modified` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),PRIMARY KEY (`id`),UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- dump data in `employees`
INSERT INTO `employees` (`id`, `name`, `email`, `phone`, `status`) VALUES
(1, 'James Carter',  'james.carter@arborist.com',  '0411 111 111', 'active'),
(2, 'Priya Nair',    'priya.nair@arborist.com',    '0422 222 222', 'active'),
(3, 'Tom Brennan',   'tom.brennan@arborist.com',   '0433 333 333', 'active'),
(4, 'Sarah Okafor',  'sarah.okafor@arborist.com',  '0444 444 444', 'active'),
(5, 'Liam Hutchins', 'liam.hutchins@arborist.com', '0455 555 555', 'active');

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`name` varchar(100) NOT NULL, PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `services` (`id`, `name`) VALUES
(1, 'Tree Removal'),
(2, 'Pruning & Trimming'),
(3, 'Health Care');

--
-- structure for table ` shift_allocation`
--

CREATE TABLE `shifts` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`shift_date` date NOT NULL,
`shift_type` enum('Morning','Afternoon','Full Day'),
`start_time` time NOT NULL,
`end_time` time NOT NULL,
`service_id` int(11) DEFAULT NULL,
`location` varchar(255) DEFAULT NULL,
`notes` text DEFAULT NULL,
`created_time` datetime DEFAULT current_timestamp(),
PRIMARY KEY (`id`),CONSTRAINT `fk_shift_service` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `shifts` (`shift_date`, `shift_type`, `start_time`, `end_time`, `service_id`, `location`, `notes`) VALUES
('2026-03-23', 'Morning',   '06:00:00', '12:00:00', 2, 'Brighton',    'Crown pruning — council job'),
('2026-03-23', 'Afternoon', '12:00:00', '18:00:00', 3, 'Brighton',    'Post-prune health treatment'),
('2026-03-24', 'Full Day',  '06:00:00', '18:00:00', 1, 'Hawthorn',    'Large gum tree removal'),
('2026-03-25', 'Morning',   '06:00:00', '12:00:00', 1, 'St Kilda',    'Stump grinding & removal'),
('2026-03-25', 'Afternoon', '12:00:00', '18:00:00', 2, 'St Kilda',    'Hedge & shrub trimming'),
('2026-03-26', 'Full Day',  '06:00:00', '18:00:00', 1, 'Toorak',      'Emergency storm damage removal'),
('2026-03-27', 'Morning',   '06:00:00', '12:00:00', 3, 'South Yarra', 'Tree disease inspection & spray'),
('2026-03-28', 'Morning',   '06:00:00', '12:00:00', 2, 'Richmond',    'Fruit tree pruning');



CREATE TABLE `shift_allocations` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`shift_id` int(11) NOT NULL,
`employee_id` int(11) NOT NULL,
`status` enum('assigned','confirmed','cancelled') NOT NULL DEFAULT 'assigned',
`created_time` datetime DEFAULT current_timestamp(),
PRIMARY KEY (`id`),
UNIQUE KEY `unique_allocation` (`shift_id`, `employee_id`),
CONSTRAINT `fk_alloc_shift`    FOREIGN KEY (`shift_id`)    REFERENCES `shifts`    (`id`) ON DELETE CASCADE,
CONSTRAINT `fk_alloc_employee` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `shift_allocations` (shift_id, employee_id, status) VALUES
    (1, 1, 'confirmed'),
    (1, 4, 'confirmed'),
    (2, 2, 'confirmed'),
    (3, 1, 'confirmed'),
    (3, 5, 'confirmed'),
    (4, 3, 'confirmed'),
    (4, 1, 'confirmed'),
    (5, 4, 'confirmed'),
    (6, 1, 'confirmed'),
    (7, 5, 'confirmed');



-- --------------------------------------------------------
--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_time` datetime DEFAULT current_timestamp(),
  `last_modified` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `reset_token_expires` datetime DEFAULT NULL,
  `created_time` datetime NOT NULL DEFAULT current_timestamp(),
  `last_modified` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `role` varchar(50) DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `reset_token`, `reset_token_expires`, `created_time`, `last_modified`, `role`) VALUES
    (1, 'admin', 'admin@example.com', '$2a$12$j/IDjNyowwtBg4pJZFVwu.Irx8RX1.r5.A0UOwXPyRlbU02wtsgD6', NULL, NULL, '2026-03-19 00:53:00', '2026-03-19 01:58:09', 'admin');

INSERT INTO `users` (`id`, `name`, `email`, `password`, `reset_token`, `reset_token_expires`, `created_time`, `last_modified`, `role`) VALUES
    (2, 'James Carter', 'jamescarter@example.com', '$2a$12$S0vIquN3CtHoohakr/ZtH.YQU1D9kaQGXu.39PnsoUQFTZcfR05.y', NULL, NULL, NOW(), NOW(), 'employee');

INSERT INTO `users` (`name`, `email`, `password`, `reset_token`, `reset_token_expires`, `created_time`, `last_modified`, `role`) VALUES
    ('Test Customer', 'customer@example.com', '$2a$12$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uHxL7GDyy', NULL, NULL, NOW(), NOW(), 'customer');


--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

ALTER TABLE shifts
    ADD status ENUM('pending', 'active', 'complete') NOT NULL DEFAULT 'pending';

ALTER TABLE `shifts`
    ADD COLUMN `enquiry_id` int(11) DEFAULT NULL,
    ADD CONSTRAINT `fk_shift_enquiry` FOREIGN KEY (`enquiry_id`) REFERENCES `contact_messages`(`id`) ON DELETE SET NULL,
    ADD CONSTRAINT `fk_shift_customer` FOREIGN KEY (`customer_id`) REFERENCES `customers`(`id`) ON DELETE SET NULL;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

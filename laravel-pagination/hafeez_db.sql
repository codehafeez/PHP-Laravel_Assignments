-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2023 at 10:20 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hafeez_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `firstname`, `lastname`, `email`, `dob`) VALUES
(1, 'John', 'Doe', 'john.doe@example.com', '1990-01-01'),
(2, 'Jane', 'Smith', 'jane.smith@example.com', '1995-02-15'),
(3, 'Michael', 'Johnson', 'michael.johnson@example.com', '1988-07-10'),
(4, 'Sarah', 'Davis', 'sarah.davis@example.com', '1992-11-22'),
(5, 'Robert', 'Wilson', 'robert.wilson@example.com', '1985-09-30'),
(6, 'Alice', 'Brown', 'alice.brown@example.com', '1993-06-10'),
(7, 'David', 'Lee', 'david.lee@example.com', '1987-03-18'),
(8, 'Emily', 'Taylor', 'emily.taylor@example.com', '1998-08-25'),
(9, 'Daniel', 'Clark', 'daniel.clark@example.com', '1991-04-05'),
(10, 'Olivia', 'Walker', 'olivia.walker@example.com', '1989-12-14'),
(11, 'Jacob', 'Anderson', 'jacob.anderson@example.com', '1997-02-27'),
(12, 'Emma', 'Harris', 'emma.harris@example.com', '1994-10-09'),
(13, 'Matthew', 'Martinez', 'matthew.martinez@example.com', '1986-06-16'),
(14, 'Ava', 'Garcia', 'ava.garcia@example.com', '1999-01-12'),
(15, 'James', 'Rodriguez', 'james.rodriguez@example.com', '1996-07-23'),
(16, 'Sophia', 'Lopez', 'sophia.lopez@example.com', '1992-05-03'),
(17, 'Ethan', 'Perez', 'ethan.perez@example.com', '1988-03-21'),
(18, 'Mia', 'Rivera', 'mia.rivera@example.com', '1995-09-02'),
(19, 'Alexander', 'Gonzalez', 'alexander.gonzalez@example.com', '1991-11-11'),
(20, 'Isabella', 'Sanchez', 'isabella.sanchez@example.com', '1987-08-08'),
(21, 'William', 'Ramirez', 'william.ramirez@example.com', '1993-04-17'),
(22, 'Abigail', 'Torres', 'abigail.torres@example.com', '1990-12-26'),
(23, 'Benjamin', 'Flores', 'benjamin.flores@example.com', '1998-10-07'),
(24, 'Sofia', 'Morales', 'sofia.morales@example.com', '1996-06-14'),
(25, 'Michael', 'Reed', 'michael.reed@example.com', '1994-02-23');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_06_06_075131_create_employees_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `phone` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `age`, `phone`) VALUES
(1, 'John Doe', 20, '1234567890'),
(2, 'Alice Johnson', 22, '9876543210'),
(3, 'Michael Smith', 18, '5551234567'),
(4, 'Emily Brown', 21, '9998887776'),
(5, 'David Wilson', 19, '4445556667'),
(6, 'Sarah Anderson', 20, '2223334445'),
(7, 'Daniel Davis', 22, '7778889990'),
(8, 'Olivia Taylor', 19, '3334445556'),
(9, 'Matthew Thompson', 21, '8889990001'),
(10, 'Sophia Martinez', 18, '1112223334'),
(11, 'James Rodriguez', 20, '6667778889'),
(12, 'Emma Thomas', 22, '5556667778'),
(13, 'Jacob White', 19, '2223334445'),
(14, 'Mia Harris', 21, '9998887776'),
(15, 'Ethan Clark', 20, '4445556667'),
(16, 'Ava Rodriguez', 22, '2223334445'),
(17, 'Noah Anderson', 19, '7778889990'),
(18, 'Isabella Garcia', 21, '3334445556'),
(19, 'William Davis', 18, '8889990001'),
(20, 'Charlotte Thompson', 20, '1112223334'),
(21, 'Liam Wilson', 19, '6667778889'),
(22, 'Harper Anderson', 21, '5556667778'),
(23, 'Benjamin Clark', 20, '2223334445'),
(24, 'Amelia Rodriguez', 22, '9998887776'),
(25, 'Henry Davis', 19, '4445556667'),
(26, 'Evelyn Thompson', 20, '2223334445');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

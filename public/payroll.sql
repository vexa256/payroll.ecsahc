-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 18, 2023 at 01:57 PM
-- Server version: 8.0.32-0buntu0.22.04.1
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `payroll`
--

-- --------------------------------------------------------

--
-- Table structure for table `allowances`
--

CREATE TABLE `allowances` (
  `id` bigint UNSIGNED NOT NULL,
  `EmpID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Allowance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Amount` decimal(10,2) NOT NULL,
  `ValidFrom` date NOT NULL,
  `ValidTo` date NOT NULL,
  `AllowanceValidity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `benefits_logs`
--

CREATE TABLE `benefits_logs` (
  `id` bigint UNSIGNED NOT NULL,
  `EmpID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Benefit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Amount` decimal(10,2) NOT NULL,
  `Currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ConversionID` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `USD_To_TSH_Rate` decimal(10,2) DEFAULT NULL,
  `DateEffected` date NOT NULL,
  `Month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clusters`
--

CREATE TABLE `clusters` (
  `id` bigint UNSIGNED NOT NULL,
  `ClusterID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DepartmentID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ClusterName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clusters`
--

INSERT INTO `clusters` (`id`, `ClusterID`, `DepartmentID`, `ClusterName`, `Description`, `created_at`, `updated_at`) VALUES
(1, 'b22add59eae8a85941abc959456e238b', '9df0085a1c6e12775af7462ceec92d48', 'Colleges', 'RSSH: Health Management Information system and M&E', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `constant_benefits`
--

CREATE TABLE `constant_benefits` (
  `id` bigint UNSIGNED NOT NULL,
  `Benefit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `constant_deductions`
--

CREATE TABLE `constant_deductions` (
  `id` bigint UNSIGNED NOT NULL,
  `Deduction` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `contract_expiry_report`
-- (See below for the actual view)
--
CREATE TABLE `contract_expiry_report` (
`ContractExpiry` date
,`days_remaining` int
,`Email` varchar(255)
,`months_remaining` bigint
,`Nationality` varchar(255)
,`PhoneNumber` varchar(255)
,`SoonExpiringStatus` int
,`StaffName` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `currency_conversions`
--

CREATE TABLE `currency_conversions` (
  `id` bigint UNSIGNED NOT NULL,
  `ConversionID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `USD_To_TSH_Rate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PayrollMonth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PayrollYear` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deductions`
--

CREATE TABLE `deductions` (
  `id` bigint UNSIGNED NOT NULL,
  `EmpID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Deduction` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Amount` decimal(10,2) NOT NULL,
  `ValidFrom` date NOT NULL,
  `ValidTo` date NOT NULL,
  `DeductionValidity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deductions_logs`
--

CREATE TABLE `deductions_logs` (
  `id` bigint UNSIGNED NOT NULL,
  `EmpID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Deduction` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Amount` decimal(10,2) NOT NULL,
  `Currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ConversionID` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `USD_To_TSH_Rate` decimal(10,2) DEFAULT NULL,
  `DateEffected` date NOT NULL,
  `Month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint UNSIGNED NOT NULL,
  `DepartmentName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DepartmentID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `DepartmentName`, `DepartmentID`, `Description`, `created_at`, `updated_at`) VALUES
(2, 'Administration', '9df0085a1c6e12775af7462ceec92d48', 'RSSH: Health Management Information system and M&E', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int NOT NULL,
  `StaffName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `HOD` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'false',
  `AssignedPayroll` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PhoneNumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `EmployeeType` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'International Staff',
  `Email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LocalAddress` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PermanentAddress` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PassportOrNationalIdNumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IDScan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Nationality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DOB` date NOT NULL,
  `Designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `RoleID` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ReportsTo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ReportsToRoleID` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DepartmentID` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ClusterID` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `BasicSalary` decimal(10,2) NOT NULL,
  `GrossSalary` decimal(30,2) DEFAULT NULL,
  `EmpID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `StaffCode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `JoiningDate` date NOT NULL,
  `ContractExpiry` date NOT NULL,
  `BankName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `BankBranch` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `AccountName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `AccountNumber` bigint NOT NULL,
  `MonthsToExpiry` bigint DEFAULT NULL,
  `TIN` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `BankCode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `StaffPhoto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `RecordStatus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Contract Active',
  `SoonExpiring` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_04_16_124417_create_employees_table', 1),
(6, '2023_04_16_132341_create_constant_deductions_table', 1),
(7, '2023_04_16_132346_create_percentage_deductions_table', 1),
(8, '2023_04_16_132356_create_percentage_benefits_table', 1),
(9, '2023_04_16_132403_create_constant_benefits_table', 1),
(10, '2023_04_16_132901_create_allowances_table', 1),
(11, '2023_04_16_132909_create_deductions_table', 1),
(12, '2023_04_16_132916_create_taxes_table', 1),
(13, '2023_04_17_083642_create_clusters_table', 1),
(14, '2023_04_17_083648_create_departments_table', 1),
(15, '2023_04_17_083949_create_taxes_logs_table', 1),
(16, '2023_04_17_083956_create_deductions_logs_table', 1),
(17, '2023_04_17_084005_create_benefits_logs_table', 1),
(18, '2023_04_17_084027_create_staff_beneficiaries_table', 1),
(19, '2023_04_17_084047_create_staff_non_salary_benefits_table', 1),
(20, '2023_04_17_084618_create_currecy_conversions_table', 1),
(21, '2023_04_17_091057_create_staff_roles_table', 1),
(22, '2023_04_17_091730_create_staff_docs_table', 1),
(23, '2023_04_17_092549_create_payroll_labels_table', 1),
(24, '2023_04_17_204411_create_contract_expiry_report_view', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payroll_labels`
--

CREATE TABLE `payroll_labels` (
  `id` bigint UNSIGNED NOT NULL,
  `PayrollName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PayrollID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payroll_labels`
--

INSERT INTO `payroll_labels` (`id`, `PayrollName`, `Description`, `PayrollID`, `created_at`, `updated_at`) VALUES
(1, 'spp payroll', 'Timothy', 'b7c111b2ba3a3d6b62ec40076b7d5e40', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `percentage_benefits`
--

CREATE TABLE `percentage_benefits` (
  `id` bigint UNSIGNED NOT NULL,
  `Benefit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PercentageOfSalary` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `percentage_deductions`
--

CREATE TABLE `percentage_deductions` (
  `id` bigint UNSIGNED NOT NULL,
  `Deduction` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PercentageOfSalary` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff_beneficiaries`
--

CREATE TABLE `staff_beneficiaries` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff_docs`
--

CREATE TABLE `staff_docs` (
  `id` bigint UNSIGNED NOT NULL,
  `EmpID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `StaffName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DocumentCategory` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DocumentTitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `DocURL` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DOCID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff_non_salary_benefits`
--

CREATE TABLE `staff_non_salary_benefits` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff_roles`
--

CREATE TABLE `staff_roles` (
  `id` bigint UNSIGNED NOT NULL,
  `ClusterID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `RoleID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `StaffRole` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff_roles`
--

INSERT INTO `staff_roles` (`id`, `ClusterID`, `RoleID`, `StaffRole`, `Description`, `created_at`, `updated_at`) VALUES
(1, 'b22add59eae8a85941abc959456e238b', 'ff1a87298f51d214057fb07e0cf1a765', 'Project Manager', 'RSSH: Health Management Information system and M&E', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

CREATE TABLE `taxes` (
  `id` bigint UNSIGNED NOT NULL,
  `EmpID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tax` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Amount` decimal(10,2) NOT NULL,
  `ValidFrom` date NOT NULL,
  `ValidTo` date NOT NULL,
  `TaxValidity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `taxes_logs`
--

CREATE TABLE `taxes_logs` (
  `id` bigint UNSIGNED NOT NULL,
  `EmpID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tax` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Amount` decimal(10,2) NOT NULL,
  `Currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ConversionID` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `USD_To_TSH_Rate` decimal(10,2) DEFAULT NULL,
  `DateEffected` date NOT NULL,
  `Month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ayebare Timothy', 'vexa256@gmail.com', NULL, '$2y$10$KiW2WEo4AapFkKVrWhfMwe6PyuNshbRfHn2pS/FflQOuMANQRzcxu', 'TGq4jtNVxnssXecEDyGR0d2sS9eXYDmvdB8UJkYrFWqwNX6NKl0xSnJSFB7F', '2023-04-17 06:29:30', '2023-04-17 06:29:30');

-- --------------------------------------------------------

--
-- Structure for view `contract_expiry_report`
--
DROP TABLE IF EXISTS `contract_expiry_report`;

CREATE ALGORITHM=UNDEFINED DEFINER=`hacker`@`%` SQL SECURITY DEFINER VIEW `contract_expiry_report`  AS SELECT `employees`.`StaffName` AS `StaffName`, `employees`.`PhoneNumber` AS `PhoneNumber`, `employees`.`Email` AS `Email`, `employees`.`Nationality` AS `Nationality`, `employees`.`ContractExpiry` AS `ContractExpiry`, (to_days(`employees`.`ContractExpiry`) - to_days('2023-04-17')) AS `days_remaining`, period_diff(extract(year_month from `employees`.`ContractExpiry`),extract(year_month from '2023-04-17')) AS `months_remaining`, ((to_days(`employees`.`ContractExpiry`) - to_days('2023-04-17')) <= 90) AS `SoonExpiringStatus` FROM `employees` WHERE (`employees`.`ContractExpiry` > '2023-04-17') ORDER BY `employees`.`ContractExpiry` ASC  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allowances`
--
ALTER TABLE `allowances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `benefits_logs`
--
ALTER TABLE `benefits_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clusters`
--
ALTER TABLE `clusters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `constant_benefits`
--
ALTER TABLE `constant_benefits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `constant_deductions`
--
ALTER TABLE `constant_deductions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency_conversions`
--
ALTER TABLE `currency_conversions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deductions`
--
ALTER TABLE `deductions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deductions_logs`
--
ALTER TABLE `deductions_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_staffname_unique` (`StaffName`),
  ADD UNIQUE KEY `employees_phonenumber_unique` (`PhoneNumber`),
  ADD UNIQUE KEY `employees_email_unique` (`Email`),
  ADD UNIQUE KEY `employees_passportornationalidnumber_unique` (`PassportOrNationalIdNumber`),
  ADD UNIQUE KEY `employees_empid_unique` (`EmpID`),
  ADD UNIQUE KEY `employees_accountnumber_unique` (`AccountNumber`),
  ADD UNIQUE KEY `employees_staffcode_unique` (`StaffCode`),
  ADD UNIQUE KEY `employees_tin_unique` (`TIN`);

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
-- Indexes for table `payroll_labels`
--
ALTER TABLE `payroll_labels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `percentage_benefits`
--
ALTER TABLE `percentage_benefits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `percentage_deductions`
--
ALTER TABLE `percentage_deductions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `staff_beneficiaries`
--
ALTER TABLE `staff_beneficiaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_docs`
--
ALTER TABLE `staff_docs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_non_salary_benefits`
--
ALTER TABLE `staff_non_salary_benefits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_roles`
--
ALTER TABLE `staff_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taxes`
--
ALTER TABLE `taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taxes_logs`
--
ALTER TABLE `taxes_logs`
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
-- AUTO_INCREMENT for table `allowances`
--
ALTER TABLE `allowances`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `benefits_logs`
--
ALTER TABLE `benefits_logs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clusters`
--
ALTER TABLE `clusters`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `constant_benefits`
--
ALTER TABLE `constant_benefits`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `constant_deductions`
--
ALTER TABLE `constant_deductions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currency_conversions`
--
ALTER TABLE `currency_conversions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deductions`
--
ALTER TABLE `deductions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deductions_logs`
--
ALTER TABLE `deductions_logs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `payroll_labels`
--
ALTER TABLE `payroll_labels`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `percentage_benefits`
--
ALTER TABLE `percentage_benefits`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `percentage_deductions`
--
ALTER TABLE `percentage_deductions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff_beneficiaries`
--
ALTER TABLE `staff_beneficiaries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff_docs`
--
ALTER TABLE `staff_docs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff_non_salary_benefits`
--
ALTER TABLE `staff_non_salary_benefits`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff_roles`
--
ALTER TABLE `staff_roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `taxes`
--
ALTER TABLE `taxes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `taxes_logs`
--
ALTER TABLE `taxes_logs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

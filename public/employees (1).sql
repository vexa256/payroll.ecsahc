-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 17, 2023 at 11:37 PM
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

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `StaffName`, `HOD`, `AssignedPayroll`, `PhoneNumber`, `EmployeeType`, `Email`, `LocalAddress`, `PermanentAddress`, `PassportOrNationalIdNumber`, `IDScan`, `Nationality`, `DOB`, `Designation`, `Gender`, `RoleID`, `ReportsTo`, `ReportsToRoleID`, `DepartmentID`, `ClusterID`, `BasicSalary`, `GrossSalary`, `EmpID`, `StaffCode`, `JoiningDate`, `ContractExpiry`, `BankName`, `BankBranch`, `AccountName`, `AccountNumber`, `MonthsToExpiry`, `TIN`, `BankCode`, `StaffPhoto`, `uuid`, `RecordStatus`, `SoonExpiring`) VALUES
(1, 'Ayebare Timothy Kamukama', 'false', 'b7c111b2ba3a3d6b62ec40076b7d5e40', '256705662121', 'Local Staff', 'mbabazireijunior@gmail.com', 'KISASSI', 'KISASSI', '2222222222', NULL, 'Ugandan', '2023-04-30', NULL, 'Male', 'ff1a87298f51d214057fb07e0cf1a765', 'ff1a87298f51d214057fb07e0cf1a765', NULL, NULL, NULL, '222222.00', NULL, '9f7abdbe4eafccde7a45b2e3a8f7cb11', '222222', '2013-04-24', '2026-06-30', 'Wanyama Kevin Rodney DFCU Bank Nalya', 'Kisasi Ndundu complex', 'Ayebare Timothy', 122333443312233, NULL, '222ddddd', '1111', NULL, NULL, 'Contract Active', 'false');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

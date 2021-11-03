SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `employees` (
  `empID` mediumint(6) UNSIGNED NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `empUN` varchar(50) NOT NULL,
  `password` char(60) NOT NULL,
  `registration_date` datetime NOT NULL,
  `user_level` tinyint(1) UNSIGNED NOT NULL,
  `pay_rate` decimal(10,2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `employees`
  ADD PRIMARY KEY (`empID`),
  ADD KEY `user_name` (`empUN`);

ALTER TABLE `employees`
  MODIFY `empID` mediumint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

CREATE TABLE `timesheet` (
`shiftNum` int(11) UNSIGNED NOT NULL,
`empID` mediumint(6) UNSIGNED NOT NULL,
`start_time` decimal(10,2) NOT NULL DEFAULT '0',
`end_time` decimal(10,2) NOT NULL DEFAULT '0',
`shift_date` varchar(255) NOT NULL,
`num_hours` decimal(10,2) NOT NULL DEFAULT '0',
`approval` varchar(255) NOT NULL,
`amount` decimal(10,2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `timesheet`
ADD PRIMARY KEY (`shiftNum`),
ADD KEY `employee_id` (`empID`);

ALTER TABLE `timesheet`
MODIFY `shiftNum` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

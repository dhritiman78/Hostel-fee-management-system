
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Table structure for table `adminbody`
--

CREATE TABLE `adminbody` (
  `Sl no.` int(11) NOT NULL,
  `Roll` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `borders`
--

CREATE TABLE `borders` (
  `Sl no.` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Roll` varchar(30) NOT NULL,
  `Room` int(11) NOT NULL,
  `Phone` text NOT NULL,
  `Department` varchar(100) NOT NULL,
  `Programme` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `borders`
--

INSERT INTO `borders` (`Sl no.`, `Name`, `Roll`, `Room`, `Phone`, `Department`, `Programme`) VALUES
(51, 'MANASH JYOTI BARMAN', 'ECB23010', 221, '87654678998', 'ECE', 'BTECH'),
(52, 'KISHAN HARLALKA', 'CSB23010', 118, '9954122343', 'CSE', 'BTECH');

-- --------------------------------------------------------

--
-- Table structure for table `controls`
--

CREATE TABLE `controls` (
  `Sl no.` int(11) NOT NULL,
  `Parameter` varchar(100) NOT NULL,
  `Value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `controls`
--

INSERT INTO `controls` (`Sl no.`, `Parameter`, `Value`) VALUES
(1, 'New Border Entry', 0),
(2, 'New mess reciept', 0),
(3, 'Month', 3),
(4, 'Year', 2024);

-- --------------------------------------------------------

--
-- Table structure for table `reciepts`
--

CREATE TABLE `reciepts` (
  `Sl no.` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Roll` varchar(30) NOT NULL,
  `Room` int(11) NOT NULL,
  `Phone` text NOT NULL,
  `Amount` text NOT NULL,
  `Transaction` varchar(50) NOT NULL,
  `Time` varchar(50) NOT NULL,
  `Date` varchar(50) NOT NULL,
  `Reciept` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminbody`
--
ALTER TABLE `adminbody`
  ADD PRIMARY KEY (`Sl no.`);

--
-- Indexes for table `borders`
--
ALTER TABLE `borders`
  ADD PRIMARY KEY (`Sl no.`);

--
-- Indexes for table `controls`
--
ALTER TABLE `controls`
  ADD PRIMARY KEY (`Sl no.`);

--
-- Indexes for table `reciepts`
--
ALTER TABLE `reciepts`
  ADD PRIMARY KEY (`Sl no.`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminbody`
--
ALTER TABLE `adminbody`
  MODIFY `Sl no.` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `borders`
--
ALTER TABLE `borders`
  MODIFY `Sl no.` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `controls`
--
ALTER TABLE `controls`
  MODIFY `Sl no.` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reciepts`
--
ALTER TABLE `reciepts`
  MODIFY `Sl no.` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

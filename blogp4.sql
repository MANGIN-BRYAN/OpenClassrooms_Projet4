-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2018 at 02:02 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogp4`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(3) NOT NULL,
  `titre` varchar(40) NOT NULL,
  `accroche` varchar(200) NOT NULL,
  `contenu` text NOT NULL,
  `publication` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `accroche`, `contenu`, `publication`, `image`) VALUES
(1, 'Article 1', 'Apud has gentes, quarum exordiens initium ab Assyriis ad Nili cataractas porrigitur et confinia Blemmyarum, omnes pari sorte sunt bellatores seminudi coloratis sagulis pube tenus amicti', 'Apud has gentes, quarum exordiens initium ab Assyriis ad Nili cataractas porrigitur et confinia Blemmyarum, omnes pari sorte sunt bellatores seminudi coloratis sagulis pube tenus amicti, equorum adiumento pernicium graciliumque camelorum per diversa se raptantes, in tranquillis vel turbidis rebus: nec eorum quisquam aliquando stivam adprehendit vel arborem colit aut arva subigendo quaeritat victum, sed errant semper per spatia longe lateque distenta sine lare sine sedibus fixis aut legibus: nec idem perferunt diutius caelum aut tractus unius soli illis umquam placet.', '2018-07-14 14:25:52', 'img1.png'),
(2, 'Article 2', 'Apud has gentes, quarum exordiens initium ab Assyriis ad Nili cataractas porrigitur et confinia Blemmyarum, omnes pari sorte sunt bellatores seminudi coloratis sagulis pube tenus amicti, ', 'Apud has gentes, quarum exordiens initium ab Assyriis ad Nili cataractas porrigitur et confinia Blemmyarum, omnes pari sorte sunt bellatores seminudi coloratis sagulis pube tenus amicti, equorum adiumento pernicium graciliumque camelorum per diversa se raptantes, in tranquillis vel turbidis rebus: nec eorum quisquam aliquando stivam adprehendit vel arborem colit aut arva subigendo quaeritat victum, sed errant semper per spatia longe lateque distenta sine lare sine sedibus fixis aut legibus: nec idem perferunt diutius caelum aut tractus unius soli illis umquam placet.', '2018-07-14 14:27:00', 'img2.png'),
(3, 'Article 3', 'Apud has gentes, quarum exordiens initium ab Assyriis ad Nili cataractas porrigitur et confinia Blemmyarum, omnes pari sorte sunt bellatores seminudi coloratis sagulis pube tenus amicti', 'Apud has gentes, quarum exordiens initium ab Assyriis ad Nili cataractas porrigitur et confinia Blemmyarum, omnes pari sorte sunt bellatores seminudi coloratis sagulis pube tenus amicti, equorum adiumento pernicium graciliumque camelorum per diversa se raptantes, in tranquillis vel turbidis rebus: nec eorum quisquam aliquando stivam adprehendit vel arborem colit aut arva subigendo quaeritat victum, sed errant semper per spatia longe lateque distenta sine lare sine sedibus fixis aut legibus: nec idem perferunt diutius caelum aut tractus unius soli illis umquam placet.', '2018-07-14 14:28:21', 'img3.png');

-- --------------------------------------------------------

--
-- Table structure for table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(4) NOT NULL,
  `id_article` int(11) NOT NULL,
  `id_membre` int(3) NOT NULL,
  `commentaire` text NOT NULL,
  `publication` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `commentaires`
--

INSERT INTO `commentaires` (`id`, `id_article`, `id_membre`, `commentaire`, `publication`) VALUES
(1, 3, 1, 'Good idea!!', '2018-08-08 14:54:39'),
(2, 3, 1, 'erewrewr', '2018-08-08 15:13:50');

-- --------------------------------------------------------

--
-- Table structure for table `membres`
--

CREATE TABLE `membres` (
  `id` int(3) NOT NULL,
  `pseudo` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `membres`
--

INSERT INTO `membres` (`id`, `pseudo`, `email`, `password`) VALUES
(1, 'AAA', 'aaa@mail.com', '$2y$10$WhlooSVLWepbAcFCZpzozuq3G3wpu0Zs.l1IImiMipT/0wTXJ32c.'),
(2, 'BBB', 'bbb@mail.com', '$2y$10$aVBRgWsrDq0rCoASxCVTxOzZhi44r0MC4W8qL7RgwNNYSANawicZ6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `membres`
--
ALTER TABLE `membres`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

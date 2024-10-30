-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2024 at 03:20 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auto_news`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `news_id`, `username`, `comment`, `created_at`, `parent_id`) VALUES
(11, 4, 'user', 'jelek beritanya', '2024-07-16 05:39:01', NULL),
(12, 4, 'admin', 'terima kasih atas tanggapannya\r\n', '2024-07-16 05:39:57', 11),
(14, 4, 'aggi', 'apakah benar?', '2024-07-16 06:53:44', 11),
(15, 10, 'jovi', 'ksajdlkas', '2024-07-18 08:05:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `image1`, `image2`, `image3`, `created_at`) VALUES
(1, 'ever heard about car name Lexus LFA??', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'lfa_orange.jpg', 'lfa_white.jpg', 'lfa_yollow.jpg', '2024-07-06 17:58:01'),
(2, 'Porche', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1721288160_porsche_black.jpg', '1721288160_porsche_orange.jpg', '1721288160_porsche_white.jpg', '2024-07-06 17:59:37'),
(4, '2024 Mercedes-Benz CLE 450 Turns Two Coupes Into One', 'A decade ago, you could find a coupe version of almost every Mercedes-Benz sedan, with a cabriolet variant often tagging along for the ride. While that probably made Mercedes customers happy, it might not have been the most efficient-to-produce portfolio.\r\n\r\nA couple of years ago, the folks in charge of that portfolio decided to thin the herd, by effectively putting the E-Class and C-Class coupes into a blender. They have now poured out the latest addition to its lineup: the CLE-Class.\r\n\r\nPowering the CLE 450 is a turbocharged 3.0-liter I6, which works with a 48-volt mild hybrid system to throw 375 hp and 369 lb-ft through a nine-speed automatic transmission. If you want to step down to a four-cylinder, the CLE 300 packs a 2.0-liter turbocharged four-cylinder that sends 255 hp and 295 lb-ft of torque also through a nine-speed automatic.', '1a8be52543d64e97fb33a4ba5ba6e091.jpg', 'CRITICSCORNER-MAIN_i_62.jpg', '036564de643bcd3df433ad62518d4cd9.jpg', '2024-07-06 18:55:08'),
(5, '2024 Lamborghini Huracán Sterrato Is An Attention-Seeking Missile', 'The Lamborghini Huracán is, unfortunately, seeing the end of its run. While the entry-level Lambo has spun off a handful of wild variants in its decade-long run, the team in northern Italy is sending off the V10-powered sports car with a series of variants that include a rally-inspired off-roader.\r\n\r\nThe Lamborghini Huracán Sterrato takes the bones of the Huracán, gives it a lift, slaps on some all-terrain rubber, and adds a set of off-road lights to the nose. There’s also a roof-mounted air intake, which helps your V10 gulp air instead of sand, dirt, or water as you’re blasting through the desert or rally stage.\r\n\r\nThat 5.2-liter V10 sends 602 hp and 413 lb-ft of torque through a seven-speed automatic transmission and into the Lamborghini all-wheel-drive system.', '3fc9cac98cd660e6082cbc9843de3af0.jpg', 'https___hypebeast.com_image_2024_03_lamborghini-huracan-sterrato-test-drive-review-tw.avif', 'qniyswrizchoni9if1qt.avif', '2024-07-16 07:19:41'),
(6, '2024 Lexus LS 500h Is Soft, Quiet, And Luxurious', 'The Lexus LS has been a staple of the brand’s lineup over the last three decades, and it doesn’t seem to be resting on its laurels. While the most recent generation kicked off for the 2018 model year, the mid-cycle refresh has helped it look modern. While there have been updates, the core of what made this Lexus interesting, like the odd drive mode selector, interesting interior details, and hugely comfortable interior remain. Lexus offers the LS with its turbocharged 3.4-liter V6 or this 3.5-liter V6-based hybrid system. In hybrid trim, the LS 500h sends a combined system output of 354 hp to its wheels while netting 26 combined mpg.', '2024_lexus_ls_sedan_500-f-sport_fq_oem_1_1600.avif', '20200707-02-07-1594132325.jpg', 'images.jpg', '2024-07-16 07:21:59'),
(7, '2024 Honda Ridgeline Is Truck Enough', 'In truck enthusiast circles, Honda’s Ridgeline has been a great conversation starter since its inception in 2006. The unit-construction pickup took a brief sabbatical after its initial run but returned for its current, second generation in 2017. The second-gen Ridgeline took advantage of its unibody platform with some interesting packaging solutions, like under-bed storage.\r\n\r\nThe latest addition to the Ridgeline family is the rugged Ridgeline Trailsport, which leans into the adventure lifestyle with off-road-tuned suspension and all-terrain tires. Powering this Ridgeline Trailsport, and the rest of the Ridgeline lineup, is a 3.5-liter V6 that sends 280 hp and 262 lb-ft of torque through a nine-speed automatic and into a standard all-wheel-drive system.', '2024-honda-ridgeline-trailsport-117-660c4ee75bd07.jpg', '2401-Honda-Ridgeline-Exterior.webp', 'images (1).jpg', '2024-07-16 07:24:08'),
(8, '2024 Ferrari 296 GTS Brings Sunshine And Speed', 'The Ferrari 296 GTB and GTS have been in the company’s lineup since 2021 and hold the door open for would-be new Ferrari sports coupe owners.\r\n\r\nFollowing legendary machines like the Ferrari 458, 488, and F8, the 296 GTB has expectedly large shoes to fill—as would be the case with any new Ferrari. We spent time with the V6-powered 296 GTB, which featured the track-focused Assetto Fiorano package, a couple of years ago. Then new, the 296 was predictably good. Well, if you want an open-air experience from your Ferrari, you can also opt for the 296 GTS, which gives you all of the hardware from the coupe-bodied Berlinetta, with the ability to move the top away and let the sunshine in.', '1111.jpg', 'b3df3874-c01f-4805-bc45-89b64d8e9228-666ff2832a4af.jpg', 'download.jpg', '2024-07-16 07:27:45'),
(9, '2024 Toyota Crown Moves The Sedan Upright', 'The sedan has come a long way over the last seven decades. Once dictated by an adult’s ability to wear a hat, the styling has changed dramatically to reflect the styles of the time. Well, ironically, Toyota has gone back to the modern sedan’s origins in the late 1940s to bring the large sedan to modernity.\r\n\r\nWith a market dominated by high-riding utility vehicles, it only makes sense to try that sensibility out on a sedan. This height bump is reflected in the Crown’s 60.6-inch height, which bests the discontinued Avalon by nearly four inches. This height bump comes with only a half-inch more ground clearance, which means the Crown’s shell is substantially taller.\r\n\r\nThis added height gives drivers a more utility-like approach, and also helps with climbing in and out of the interior. Joining this new shape is a similarly new Hybrid Max powertrain, which blends a 2.4-liter turbocharged I4 with a six-speed automatic and an array of electric motors to make 340 hp and 400.4 lb-ft of torque.', '003.webp', '2023_Crown_Platinum_BronzeAgeBiTone_H.jpg', '2024-toyota-crown-supersonicred-profile.jpg', '2024-07-16 07:37:55'),
(10, '2024 Mazda CX-50 Is The Grown Up CX-5', 'Mazda is responsible for some of the most beloved sports cars, race cars, and powertrains to ever hit the pavement. Enthusiast cars have helped put Mazda on the map—and firmly in the hearts of sports car fans around the world—but it’s the crossovers that sell. It only makes sense for Mazda to take its popular CX-5 and give it a slightly larger alternative.\r\n\r\nThat’s exactly what the CX-50 brings to the table. The bones of the CX-5 stick around, but the larger shell comes with a longer wheelbase and slightly heavier curb weight. Powering this CX-50 is the same powerplant you’ll find under the CX-5’s hood. All CX-50s pack 2.5-liter I4s under the hood.\r\n\r\nBase powerplants breathe naturally and send 187 hp and 186 lb-ft of torque to the wheels. Mazda also offers a turbocharged version of this 2.5-liter I4, which cranks the power to 227 hp and 310 lb-ft of torque with 87 octane fuel, or 256 hp and 320 lb-ft of torque with 93 octane gasoline.', '2023_mazda_cx-50_4dr-suv_25-turbo-meridian-edition_fq_oem_1_600.avif', '2023-mazda-cx-50-608761651189157965.jpg', 'DKB5V2KXZ5BKLLW7TXZWDVBCVU.avif', '2024-07-16 07:42:31'),
(11, 'toyota', 'old car', 'toyota_black.jpg', 'toyota_red.jpg', 'toyota_white.jpg', '2024-07-18 08:07:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '$2y$10$O4NbGW7fFfaImRR3E.rOI.5.qCR8TTjIpc6GvUKKZZWSWkt7qSzo.', 'admin'),
(2, 'user', '$2y$10$luOJkzo6u.ga4Rri80u3suVjpKUNh2mhxq4uoN.Xj9.CZwJq4Rcdq', 'user'),
(3, 'aggi', '$2y$10$01pyouNlT6k4THEZ8whx5OhaqhMmP7FY/r8JLfNarHd0Wwlf95LQi', 'user'),
(4, 'jovi', '$2y$10$iYQL/TOYqNmAtR97qCXVBu1wdzY0lZrIGbkK42FNZnjRBba1i09sO', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

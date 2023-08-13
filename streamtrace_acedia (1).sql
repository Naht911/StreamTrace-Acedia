-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 13, 2023 at 10:04 PM
-- Server version: 8.0.33
-- PHP Version: 8.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `streamtrace_acedia`
--

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
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` bigint UNSIGNED NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(1, 'How do I delete my account?', 'You must delete your account information yourself using the ‘Delete my account permanently’ text under your account information (the person icon) on our site. We’re sad to see you go!', '2023-08-12 08:36:28', '2023-08-12 08:36:28'),
(2, 'Is Acedia free?', 'Yes! Acedia is a free website.\r\n\r\nAcedia does however display other services that do charge for a subscription or fee - Netflix, Amazon Prime, or Google Play for example.', '2023-08-12 08:37:34', '2023-08-12 08:37:34'),
(3, 'What is Acedia?', 'Acedia is a free streaming guide, designed to help you find where to watch your favorite movies and shows online.', '2023-08-12 08:40:38', '2023-08-12 08:40:38');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_handle` date DEFAULT NULL,
  `content_handle` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Science-Fiction', 'science-fiction-89', '2023-08-10 01:46:53', '2023-08-10 01:46:53'),
(2, 'Comedy', 'comedy-1', '2023-08-10 01:47:03', '2023-08-10 01:47:03'),
(3, 'Drama', 'drama-19', '2023-08-10 01:47:34', '2023-08-10 01:47:34'),
(4, 'Fantasy', 'fantasy-30', '2023-08-10 01:47:41', '2023-08-10 01:47:41'),
(5, 'Crime', 'crime-18', '2023-08-10 01:47:47', '2023-08-10 01:47:47'),
(6, 'Reality TV', 'reality-tv-50', '2023-08-10 01:48:12', '2023-08-10 01:48:12'),
(7, 'Mystery & Thriller', 'mystery--thriller-42', '2023-08-10 01:48:20', '2023-08-10 01:48:20'),
(8, 'Animation', 'animation-17', '2023-08-10 01:48:28', '2023-08-10 01:48:28'),
(9, 'Action & Adventure', 'action--adventure-39', '2023-08-10 01:48:34', '2023-08-10 01:48:34'),
(10, 'Kids & Family', 'kids--family-93', '2023-08-10 01:48:52', '2023-08-10 01:48:52'),
(11, 'Romance', 'romance-42', '2023-08-10 01:49:20', '2023-08-10 01:49:20'),
(12, 'Horror', 'horror-12', '2023-08-10 02:06:14', '2023-08-10 02:06:14');

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
(5, '2023_08_09_063320_create_streaming_service_provider_table', 1),
(6, '2023_08_09_073527_create_service_plan_table', 1),
(7, '2023_08_09_080950_create_movie_table', 1),
(8, '2023_08_09_082156_create_genre_table', 1),
(9, '2023_08_09_082242_create_movie_genre_table', 1),
(10, '2023_08_09_083711_create_type_price_table', 1),
(11, '2023_08_09_084509_create_movie_resolution_table', 1),
(12, '2023_08_09_084530_create_movie_provider_table', 1),
(13, '2023_08_10_015221_add_poster_url_col_to_movie_table', 1),
(14, '2023_08_10_074940_add_user_id_to_movie_table', 1),
(15, '2023_08_10_124314_rename_movie_provider_col', 2),
(20, '2023_08_10_164322_create_feedback', 3),
(21, '2023_08_10_164327_create_faq', 3),
(22, '2023_08_11_021033_add_updated_at_to_password_reset_tokens_table', 3),
(23, '2023_08_11_035543_changes_streaming_service_provider_table_col', 4),
(25, '2023_08_11_072550_changes_streaming_service_provider_table_col', 5),
(26, '2023_08_11_160835_create_watchlist_table', 6),
(28, '2023_08_11_163155_create_user_streaming_service_table', 7),
(29, '2023_08_12_001322_changes_movie_provider_col', 8),
(30, '2023_08_12_002537_create_movie_tracking_out_table', 9),
(31, '2023_08_12_003339_add_count_view_col_to_movie_table', 10),
(32, '2023_08_12_004218_drop_user_id_form_movie_tracking_out_table', 11),
(33, '2023_08_12_020922_rename_watchlist_table_to_reaction', 12),
(36, '2023_08_12_080428_add_more_cols_and_rename_user_streaming_service_table', 13),
(37, '2023_08_12_073947_create_rating_table', 14),
(38, '2023_08_12_202631_add_is_watched_to_reaction_table', 14),
(39, '2023_08_12_234045_add_is_note_col_to_subscription_table', 15),
(40, '2023_08_13_003032_changes_subscription_table_col', 16),
(41, '2023_08_13_003408_add_subscription_url_to_subscription_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `original_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `synopsis` text COLLATE utf8mb4_unicode_ci,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `release_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `release_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trailer_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `poster_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `count_view` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`id`, `user_id`, `title`, `original_title`, `slug`, `synopsis`, `duration`, `release_date`, `release_year`, `rating`, `country`, `language`, `trailer_url`, `created_at`, `updated_at`, `poster_url`, `count_view`) VALUES
(1, NULL, 'Good Omens', 'Good Omens', 'good-omens-5', '<p style=\"text-align:justify\">Aziraphale, an angel, and Crowley, a demon, join forces to find the Antichrist and stop Armageddon.</p>', '52min', NULL, '2019', NULL, 'United Kingdom', 'English', 'On0RbFjh8tI', '2023-08-10 02:00:50', '2023-08-12 15:33:47', '/uploads/images/poster/good-omens-5-1691658049.png', 4),
(3, NULL, 'Train to Busan', '부산행', 'train-to-busan-64', '<p style=\"text-align:justify\">When a zombie virus pushes Korea into a state of emergency, those trapped on an express train to Busan must fight for their own survival.</p>', '1h 58min', NULL, '2016', NULL, 'South Korea', 'Korean', '1ovgxN2VWNc', '2023-08-10 02:09:15', '2023-08-12 09:02:49', '/uploads/images/poster/train-to-busan-64-1691658555.png', 1),
(4, NULL, 'Below Deck', 'Below Deck', 'below-deck-5', '<p style=\"text-align:justify\">The upstairs and downstairs worlds collide when this young and single crew of &quot;yachties&quot; live, love and work together onboard a luxurious mega yacht while tending to the ever-changing needs of their wealthy, demanding charter guests.</p>', '43min', NULL, '2013', NULL, 'United States', 'English', 'AHL40h6RwRQ', '2023-08-10 02:16:13', '2023-08-12 15:33:40', '/uploads/images/poster/below-deck-5-1691658973.png', 9),
(5, NULL, 'Your Honor', 'Your Honor', 'your-honor-43', '<p style=\"text-align:justify\">New Orleans judge Michael Desiato is forced to confront his own deepest convictions when his son is involved in a hit and run that embroils an organized crime family.</p>', '56min', NULL, '2020', NULL, 'United States', 'English', 'CUkZfD3PsT4', '2023-08-10 02:25:43', '2023-08-12 15:33:57', '/uploads/images/poster/your-honor-43-1691659543.png', 3),
(6, NULL, 'Dexter', 'Dexter', 'dexter-61', '<p style=\"text-align:justify\">Dexter Morgan, a blood spatter pattern analyst for the Miami Metro Police also leads a secret life as a serial killer, hunting down criminals who have slipped through the cracks of justice.</p>', '53min', NULL, '2006', NULL, 'United States', 'English', 'YQeUmSD1c3g', '2023-08-10 02:27:28', '2023-08-10 02:27:28', '/uploads/images/poster/dexter-61-1691659648.png', 0),
(7, NULL, 'Harley Quinn', 'Harley Quinn', 'harley-quinn-49', '<p style=\"text-align:justify\">Harley Quinn has finally broken things off once and for all with the Joker and attempts to make it on her own as the criminal Queenpin of Gotham City.</p>', '23min', NULL, '2019', NULL, 'United States', 'English', 'd0EKXzqDrmE', '2023-08-10 02:29:13', '2023-08-10 02:29:13', '/uploads/images/poster/harley-quinn-49-1691659753.png', 0),
(8, NULL, 'Guardians of the Galaxy Vol. 3', 'Guardians of the Galaxy Vol. 3', 'guardians-of-the-galaxy-vol-3-83', '<p style=\"text-align:justify\">Peter Quill and his band of misfits are back for another epic adventure filled with galactic chaos, explosive action, and plenty of heartwarming moments. In this final chapter of Marvel&rsquo;s trilogy, Peter gears up to face the mission of saving the universe from eternal doom while still reeling from the loss of Gamora.</p>', '2h 30min', NULL, '2023', NULL, 'United States, New Zealand, Canada, France', 'English', 'JqcncLPi9zw', '2023-08-10 02:30:41', '2023-08-10 02:30:41', '/uploads/images/poster/guardians-of-the-galaxy-vol-3-83-1691659841.png', 0),
(9, NULL, 'Spider-Man: Across the Spider-Verse', 'Spider-Man: Across the Spider-Verse', 'spider-man-across-the-spider-verse-99', '<p style=\"text-align:justify\">The second installment of the Oscar winning Spider-verse saga picks up with spider-duo Miles Morales and Gwen Stacy zipping across the multiverse to assemble all the spider-people and&nbsp; save humanity from a deadly new threat.&nbsp;</p>', '2h 20min', NULL, '2023', NULL, 'United States', 'English', 'shW9i6k8cB0', '2023-08-10 02:32:12', '2023-08-10 02:32:12', '/uploads/images/poster/spider-man-across-the-spider-verse-99-1691659932.png', 0),
(10, NULL, 'Sorcerer', 'Sorcerer', 'sorcerer-25', '<p style=\"text-align:justify\">Four men from different parts of the globe, all hiding from their pasts in the same remote South American town, agree to risk their lives transporting several cases of dynamite (which is so old that it is dripping unstable nitroglycerin) across dangerous jungle terrain.</p>', '2h 1min', NULL, '1977', NULL, 'United States, Mexico', 'English', 'RlfJcU3nnl8', '2023-08-10 02:33:55', '2023-08-10 02:33:55', '/uploads/images/poster/sorcerer-25-1691660034.png', 0),
(14, NULL, 'The Night Manager', 'द नाइट मैनेजर', 'the-night-manager-51', '<p style=\"text-align:justify\">Former British soldier Jonathan Pine navigates the shadowy recesses of Whitehall and Washington where an unholy alliance operates between the intelligence community and the secret arms trade. To infiltrate the inner circle of lethal arms dealer Richard Onslow Roper, Pine must himself become a criminal.</p>', '1h 0min', NULL, '2016', NULL, 'United Kingdom', 'English', '6QJQysiUxKc', '2023-08-10 03:01:31', '2023-08-10 03:01:31', '/uploads/images/poster/the-night-manager-51-1691661691.png', 0),
(15, NULL, 'Lust Stories 2', 'Lust Stories 2', 'lust-stories-2-60', '<p style=\"text-align:justify\">Four eminent Indian directors explore sex, desire and love through short films in this sequel to 2018&#39;s Emmy-nominated &#39;Lust Stories&#39;.</p>', '2h 12min', NULL, '2023', NULL, 'India', 'Indian Hindi', 'Z3Z7RocQUXI', '2023-08-10 03:04:17', '2023-08-11 23:53:13', '/uploads/images/poster/lust-stories-2-60-1691661857.png', 1),
(16, NULL, 'Nineteen to Twenty', '19/20', 'nineteen-to-twenty-97', '<p style=\"text-align:justify\">Young men and women who spend the end of their teens and the beginning of their 20s together. Together they experience freedom and &#39;first moments&#39; as adults.</p>', '1h 7mins', NULL, '2023', NULL, 'South Korea', 'Korean', 'yYO74IsKQ0o', '2023-08-10 03:06:33', '2023-08-10 03:06:33', '/uploads/images/poster/nineteen-to-twenty-97-1691661992.png', 0),
(17, NULL, 'The Lincoln Lawyer', 'The Lincoln Lawyer', 'the-lincoln-lawyer-13', '<p style=\"text-align:justify\">An iconoclastic idealist runs his law practice out of the back of his Lincoln Town Car in this series based on Michael Connelly&#39;s bestselling novels.</p>', '49min', NULL, '2022', NULL, 'United States', 'English', 'XI0C81p7vKI', '2023-08-10 03:07:33', '2023-08-10 03:07:33', '/uploads/images/poster/the-lincoln-lawyer-13-1691662052.png', 0),
(18, NULL, 'Suits', 'Suits', 'suits-16', '<p style=\"text-align:justify\">On the run from a drug deal gone bad, brilliant college dropout Mike Ross finds himself working with Harvey Specter, one of New York City&#39;s best lawyers.</p>', '44min', NULL, '2011', NULL, 'United States', 'English', 'Ab2YIbP5xw8', '2023-08-10 03:08:35', '2023-08-11 23:15:41', '/uploads/images/poster/suits-16-1691662115.png', 2),
(19, NULL, 'D.P.', 'D.P.', 'dp-24', '<p style=\"text-align:justify\">A young private&#39;s assignment to capture army deserters reveals the painful reality endured by each enlistee during his compulsory call of duty.</p>', '52min', NULL, '2021', NULL, 'South Korea', 'Korean', 'ru0PmaWoHxM', '2023-08-10 03:09:47', '2023-08-10 03:09:47', '/uploads/images/poster/dp-24-1691662187.png', 0),
(20, NULL, 'I\'m a Virgo', 'I\'m a Virgo', 'im-a-virgo-2', '<p style=\"text-align:justify\">A coming-of-age joyride about Cootie, a 13ft tall young Black man in Oakland, CA. Having grown up hidden away, Cootie soon experiences the beauty and contradictions of the world for the first time. He forms friendships, finds love, navigates awkward situations, and encounters his idol, a real life superhero named The Hero.</p>', '30min', NULL, '2023', NULL, 'United States', 'English', 'PSyKhFwEo7c', '2023-08-10 03:11:02', '2023-08-13 15:00:01', '/uploads/images/poster/im-a-virgo-2-1691662262.png', 27),
(21, NULL, 'The Exorcist', 'The Exorcist', 'the-exorcist-72', '<p style=\"text-align:justify\">Follow the lives of two very different priests tackling one family&rsquo;s case of terrifying demonic possession.</p>\r\n\r\n<p style=\"text-align:justify\">Currently you are able to watch &quot;The Exorcist&quot; streaming on Amazon Prime Video.</p>', '43min', NULL, '2016', NULL, 'United States', 'English', 'PIxpPMyGcpU', '2023-08-10 03:14:12', '2023-08-10 03:14:12', '/uploads/images/poster/the-exorcist-72-1691662452.png', 0),
(25, NULL, 'Station 19', 'Station 19', 'station-19-64', '<p>A group of heroic firefighters at Seattle Fire Station 19&mdash;from captain to newest recruit&mdash;risk their lives and hearts both in the line of duty and off the clock. These brave men and women are like family, literally and figuratively, and together they put their own lives in jeopardy as first responders to save the lives of others.</p>', '38min', NULL, '2018', NULL, 'United States', 'English', '0StAYVc9Gnk', '2023-08-11 20:16:24', '2023-08-11 20:16:24', '/uploads/images/poster/station-19-64-1691810183.png', 0),
(26, NULL, 'Justified: City Primeval', 'Justified: City Primeval', 'justified-city-primeval-2', '<p>In Detroit, a ruthless criminal killer is on the loose and evading capture by the police force. With his formidable defense attorney by his side, the man known as the Oklahoma Wildman is elusive and dangerous. To apprehend him, the Detroit police force employs the skills of U.S. Marshal Raylan Givens. With his famous Stetson in hand, the investigator arrives in Detroit intent on bringing the Wildman in. But when his own daughter unexpectedly gets caught up in the case, things become more complicated for the hardened detective.</p>', '46min', NULL, '2023', NULL, 'United States', 'English', 'N6KEgWSFfaE', '2023-08-12 03:49:14', '2023-08-12 03:49:14', '/uploads/images/poster/justified-city-primeval-2-1691837354.png', 0),
(28, NULL, 'The Marvelous Mrs. Maisel', 'The Marvelous Mrs. Maisel', 'the-marvelous-mrs-maisel-29', '<p>It&rsquo;s 1958 Manhattan and Miriam &ldquo;Midge&rdquo; Maisel has everything she&rsquo;s ever wanted - the perfect husband, kids, and Upper West Side apartment. But when her life suddenly takes a turn and Midge must start over, she discovers a previously unknown talent - one that will take her all the way from the comedy clubs of Greenwich Village to a spot on Johnny Carson&rsquo;s couch.</p>', '55min', NULL, '2017', NULL, 'United States', 'English', 'Nyujqc01ujE', '2023-08-12 04:54:31', '2023-08-12 04:54:31', '/uploads/images/poster/the-marvelous-mrs-maisel-29-1691841270.png', 0),
(29, NULL, 'One Piece', 'ワンピース', 'one-piece-86', '<p>Years ago, the fearsome Pirate King, Gol D. Roger was executed leaving a huge pile of treasure and the famous &quot;One Piece&quot; behind. Whoever claims the &quot;One Piece&quot; will be named the new King of the Pirates.</p>\r\n\r\n<p>Monkey D. Luffy, a boy who consumed a &quot;Devil Fruit,&quot; decides to follow in the footsteps of his idol, the pirate Shanks, and find the One Piece. It helps, of course, that his body has the properties of rubber and that he&#39;s surrounded by a bevy of skilled fighters and thieves to help him along the way.</p>\r\n\r\n<p>Luffy will do anything to get the One Piece and become King of the Pirates!</p>', '23min', NULL, '1999', NULL, 'Japan', 'Japanese', 'MCb13lbVGE0', '2023-08-12 04:58:47', '2023-08-12 04:58:47', '/uploads/images/poster/one-piece-86-1691841527.png', 0),
(30, NULL, 'Killing Eve', 'Killing Eve', 'killing-eve-62', '<p>A security consultant hunts for a ruthless assassin. Equally obsessed with each other, they go head to head in an epic game of cat-and-mouse.</p>\r\n\r\n<p>&nbsp;</p>', '42min', NULL, '2018', NULL, 'Japan', 'Japanese', 'XVTZhOLpXjI', '2023-08-12 05:06:50', '2023-08-12 05:06:50', '/uploads/images/poster/killing-eve-62-1691842010.png', 0),
(31, NULL, 'Saint Cecilia and Pastor Lawrence', '白聖女と黒牧師', 'saint-cecilia-and-pastor-lawrence-98', '<p>Saint Cecilia is beloved by the townspeople&mdash;not only is she elegant and composed, she benevolently shares her wisdom with all who seek it. That is, until the last person has left&mdash;at which point she becomes totally hopeless! Only Pastor Lawrence, is keeping the Saint put together enough to do her duties...and though she may test him, it&#39;s all in a day&#39;s work!</p>', '24min', NULL, '2023', NULL, 'Japan', 'Japanese', 'wF1mEggsXdw', '2023-08-12 05:10:11', '2023-08-12 05:10:11', '/uploads/images/poster/saint-cecilia-and-pastor-lawrence-98-1691842211.png', 0),
(32, NULL, 'Case Closed', '名探偵コナン', 'case-closed-43', '<p>The son of a world famous mystery writer, Jimmy Kudo, has achieved his own notoriety by assisting the local police as a student detective. He has always been able to solve the most difficult of criminal cases using his wits and power of reason.</p>', '25min', NULL, '1996', NULL, 'Japan', 'Japanese', '0rNpSmVmN2U', '2023-08-12 05:20:55', '2023-08-12 05:20:55', '/uploads/images/poster/case-closed-43-1691842855.png', 0),
(33, NULL, 'Heartstopper', 'Heartstopper', 'heartstopper-42', '<p>Teens Charlie and Nick discover their unlikely friendship might be something more as they navigate school and young love in this coming-of-age series.</p>', '32min', NULL, '2022', NULL, 'United Kingdom', 'English', 'FrK4xPy4ahg', '2023-08-12 05:24:51', '2023-08-12 05:24:51', '/uploads/images/poster/heartstopper-42-1691843091.png', 0),
(34, NULL, 'King the Land', 'King the Land', 'king-the-land-23', '<p>The hotel heir and the best employee twisted to change the standard of service and undertook to implement the concept &quot;You will be sincerely smiled at in King&quot;. King is the name of the company and a metaphor for addressing guests as kings.</p>', '1h 11min', NULL, '2023', NULL, 'South Korea', 'Korean', 'AGF16szMOmo', '2023-08-12 05:27:16', '2023-08-12 05:27:16', '/uploads/images/poster/king-the-land-23-1691843235.png', 0),
(35, NULL, 'Mission: Impossible - Rogue Nation', 'Mission: Impossible - Rogue Nation', 'mission-impossible---rogue-nation-86', '<p>Ethan and team take on their most impossible mission yet&mdash;eradicating &#39;The Syndicate&#39;, an International and highly-skilled rogue organization committed to destroying the IMF.</p>', '2h 11min', NULL, '2015', NULL, 'United States', 'English', 'pXwaKB7YOjw', '2023-08-12 05:30:13', '2023-08-12 05:30:13', '/uploads/images/poster/mission-impossible---rogue-nation-86-1691843413.png', 0),
(36, NULL, 'Kohrra', 'कोहरा', 'kohrra-99', '<p>When an NRI bridegroom is found dead days before his wedding in the countryside of Punjab, two cops must unravel the troubling case as turbulence unfolds in their own lives.</p>', '47min', NULL, '2023', NULL, 'India', 'Hindi', 'sAx4aq6396E', '2023-08-12 05:37:20', '2023-08-12 05:37:20', '/uploads/images/poster/kohrra-99-1691843840.png', 0),
(37, NULL, '3 Idiots', '3 Idiots', '3-idiots-74', '<p>Rascal. Joker. Dreamer. Genius... You&#39;ve never met a college student quite like &quot;Rancho.&quot; From the moment he arrives at India&#39;s most prestigious university, Rancho&#39;s outlandish schemes turn the campus upside down&mdash;along with the lives of his two newfound best friends. Together, they make life miserable for &quot;Virus,&quot; the school&rsquo;s uptight and heartless dean. But when Rancho catches the eye of the dean&#39;s daughter, Virus sets his sights on flunking out the &quot;3 idiots&quot; once and for all.</p>', '2h 50min', NULL, '2009', NULL, 'India', 'Hindi', 'DKzBmRRdPXo', '2023-08-12 05:45:38', '2023-08-12 05:45:38', '/uploads/images/poster/3-idiots-74-1691844338.png', 0),
(38, NULL, 'Neymar', 'നെയ്മർ', 'neymar-87', '<p>Kunjava and his friend Sinto bring a new furry friend named Neymar into their lives. Little did they know that their lives were about to be turned upside down.</p>', '2h 40min', NULL, '2023', NULL, 'India', 'Hindi', 'JL6aV21H7Mc', '2023-08-12 05:52:07', '2023-08-12 05:52:07', '/uploads/images/poster/neymar-87-1691844727.png', 0),
(39, NULL, 'Utopia', 'Utopia', 'utopia-7', '<p>Comedy set inside the offices of the &quot;Nation Building Authority&quot;, a newly created government organization responsible for overseeing major infrastructure projects.</p>', '26min', NULL, '2014', NULL, 'Australia', 'English', 'IDNPdLal2Lw', '2023-08-12 06:06:27', '2023-08-12 06:06:27', '/uploads/images/poster/utopia-7-1691845587.png', 0),
(40, NULL, 'Colin from Accounts', 'Colin from Accounts', 'colin-from-accounts-1', '<p>Ashley and Gordon are two single(ish), complex humans who are brought together by a car accident and an injured dog. Flawed, funny people choosing each other and being brave enough to show their true self, scars and all, as they navigate life together.</p>', '27min', NULL, '2022', NULL, 'Australia', 'English', 'CRMnbfZfoMw', '2023-08-12 06:26:28', '2023-08-12 06:26:28', '/uploads/images/poster/colin-from-accounts-1-1691846787.png', 0),
(41, NULL, 'Deadloch', 'Deadloch', 'deadloch-40', '<p>A feminist noir comedy set against a bucolic backdrop with a rising body count.</p>', '59min', NULL, '2023', NULL, 'Australia', 'English', 'mLYb2rMWFkQ', '2023-08-12 06:31:37', '2023-08-12 06:31:37', '/uploads/images/poster/deadloch-40-1691847097.png', 0),
(42, NULL, 'Chicago Fire', 'Chicago Fire', 'chicago-fire-16', '<p>An edge-of-your-seat view into the lives of everyday heroes committed to one of America&#39;s noblest professions. For the firefighters, rescue squad and paramedics of Chicago Firehouse 51, no occupation is more stressful or dangerous, yet so rewarding and exhilarating. These courageous men and women are among the elite who forge headfirst into danger when everyone else is running the other way and whose actions make the difference between life and death.</p>', '41min', NULL, '2012', NULL, 'United States', 'English', 'IIeSDILTE5M', '2023-08-12 06:37:28', '2023-08-12 06:37:28', '/uploads/images/poster/chicago-fire-16-1691847448.png', 0),
(43, NULL, 'The Good Doctor', 'The Good Doctor', 'the-good-doctor-59', '<p>Shaun Murphy, a young surgeon with autism and savant syndrome, relocates from a quiet country life to join a prestigious hospital&#39;s surgical unit. Unable to personally connect with those around him, Shaun uses his extraordinary medical gifts to save lives and challenge the skepticism of his colleagues.</p>', '43min', NULL, '2017', NULL, 'United States', 'English', 'lnY9FWUTY84', '2023-08-12 06:52:28', '2023-08-12 06:52:28', '/uploads/images/poster/the-good-doctor-59-1691848348.png', 0),
(44, NULL, 'Moving', 'Moving', 'moving-22', '<p>Three teenagers concealing their superpowers and their parents who have lived with painful secrets facing great danger over generations.</p>', '36min', NULL, '2023', NULL, 'South Korea', 'Korean', 'SZFRw7MSPog', '2023-08-12 07:11:53', '2023-08-12 07:11:53', '/uploads/images/poster/moving-22-1691849513.png', 0),
(46, NULL, 'Dr. Romantic', '낭만닥터 김사부', 'dr-romantic-17', '<p>An eccentric, triple board-certified virtuoso surgeon leaves a top job in Seoul and ends up at a provincial hospital, where he mentors young doctors.</p>', '57min', NULL, '2016', NULL, 'South Korea', 'Korean', 'd3Xxx8EsEyM', '2023-08-12 07:28:46', '2023-08-12 07:28:46', '/uploads/images/poster/dr-romantic-17-1691850526.png', 0),
(47, NULL, 'Crash Course in Romance', '일타 스캔들', 'crash-course-in-romance-46', '<p>A mother with a heart of gold navigates the cutthroat world of private education when her daughter tries to join a celebrity math instructor&#39;s class.</p>', '1h 13min', NULL, '2023', NULL, 'South Korea', 'Korean', 'M0roNIisQ5w', '2023-08-12 07:34:16', '2023-08-12 07:34:16', '/uploads/images/poster/crash-course-in-romance-46-1691850855.png', 0),
(48, NULL, 'The Wolf of Wall Street', 'The Wolf of Wall Street', 'the-wolf-of-wall-street-21', '<p>A New York stockbroker refuses to cooperate in a large securities fraud case involving corruption on Wall Street, corporate banking world and mob infiltration. Based on Jordan Belfort&#39;s autobiography.</p>', '3h 0min', NULL, '2013', NULL, 'United States', 'English', 'GNGCav9fRhc', '2023-08-12 08:10:16', '2023-08-12 08:10:16', '/uploads/images/poster/the-wolf-of-wall-street-21-1691853015.png', 0),
(50, NULL, 'Pathaan', 'पठान', 'pathaan-13', '<p>A soldier caught by enemies and presumed dead comes back to complete his mission, accompanied by old companions and foes.</p>', '2h 26min', NULL, '2023', NULL, 'India', 'Hindi', 'vqu4z34wENw', '2023-08-12 08:26:57', '2023-08-12 15:59:44', '/uploads/images/poster/pathaan-13-1691854017.png', 21);

-- --------------------------------------------------------

--
-- Table structure for table `movie_genre`
--

CREATE TABLE `movie_genre` (
  `id` bigint UNSIGNED NOT NULL,
  `movie_id` bigint UNSIGNED NOT NULL,
  `genre_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `movie_genre`
--

INSERT INTO `movie_genre` (`id`, `movie_id`, `genre_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 1, 3, NULL, NULL),
(4, 1, 4, NULL, NULL),
(7, 3, 7, NULL, NULL),
(8, 3, 9, NULL, NULL),
(9, 3, 12, NULL, NULL),
(10, 4, 6, NULL, NULL),
(11, 5, 3, NULL, NULL),
(12, 5, 5, NULL, NULL),
(13, 5, 7, NULL, NULL),
(14, 6, 3, NULL, NULL),
(15, 6, 5, NULL, NULL),
(16, 6, 7, NULL, NULL),
(17, 7, 1, NULL, NULL),
(18, 7, 2, NULL, NULL),
(19, 7, 4, NULL, NULL),
(20, 7, 5, NULL, NULL),
(21, 7, 8, NULL, NULL),
(22, 7, 9, NULL, NULL),
(23, 8, 1, NULL, NULL),
(24, 8, 2, NULL, NULL),
(25, 8, 7, NULL, NULL),
(26, 8, 9, NULL, NULL),
(27, 9, 1, NULL, NULL),
(28, 9, 2, NULL, NULL),
(29, 9, 3, NULL, NULL),
(30, 9, 4, NULL, NULL),
(31, 9, 8, NULL, NULL),
(32, 9, 9, NULL, NULL),
(33, 9, 10, NULL, NULL),
(34, 10, 3, NULL, NULL),
(35, 10, 7, NULL, NULL),
(40, 14, 3, NULL, NULL),
(41, 14, 5, NULL, NULL),
(42, 14, 7, NULL, NULL),
(43, 15, 3, NULL, NULL),
(44, 15, 4, NULL, NULL),
(45, 15, 11, NULL, NULL),
(46, 16, 6, NULL, NULL),
(47, 16, 11, NULL, NULL),
(48, 17, 3, NULL, NULL),
(49, 17, 5, NULL, NULL),
(50, 17, 7, NULL, NULL),
(51, 18, 2, NULL, NULL),
(52, 18, 3, NULL, NULL),
(53, 19, 3, NULL, NULL),
(54, 19, 5, NULL, NULL),
(55, 19, 9, NULL, NULL),
(56, 20, 1, NULL, NULL),
(57, 20, 2, NULL, NULL),
(58, 20, 3, NULL, NULL),
(59, 20, 4, NULL, NULL),
(60, 21, 3, NULL, NULL),
(61, 21, 7, NULL, NULL),
(62, 21, 12, NULL, NULL),
(68, 25, 3, NULL, NULL),
(69, 25, 7, NULL, NULL),
(70, 25, 9, NULL, NULL),
(71, 25, 11, NULL, NULL),
(72, 26, 3, NULL, NULL),
(73, 26, 5, NULL, NULL),
(78, 28, 2, NULL, NULL),
(79, 28, 3, NULL, NULL),
(80, 29, 1, NULL, NULL),
(81, 29, 2, NULL, NULL),
(82, 29, 3, NULL, NULL),
(83, 29, 4, NULL, NULL),
(84, 29, 8, NULL, NULL),
(85, 29, 9, NULL, NULL),
(86, 30, 3, NULL, NULL),
(87, 30, 7, NULL, NULL),
(88, 30, 9, NULL, NULL),
(89, 31, 1, NULL, NULL),
(90, 31, 8, NULL, NULL),
(91, 32, 1, NULL, NULL),
(92, 32, 2, NULL, NULL),
(93, 32, 3, NULL, NULL),
(94, 32, 5, NULL, NULL),
(95, 32, 7, NULL, NULL),
(96, 32, 8, NULL, NULL),
(97, 32, 9, NULL, NULL),
(98, 32, 11, NULL, NULL),
(99, 33, 3, NULL, NULL),
(100, 33, 11, NULL, NULL),
(101, 34, 2, NULL, NULL),
(102, 34, 3, NULL, NULL),
(103, 34, 11, NULL, NULL),
(104, 35, 7, NULL, NULL),
(105, 35, 9, NULL, NULL),
(106, 36, 3, NULL, NULL),
(107, 36, 5, NULL, NULL),
(108, 36, 7, NULL, NULL),
(109, 37, 2, NULL, NULL),
(110, 37, 3, NULL, NULL),
(111, 38, 2, NULL, NULL),
(112, 38, 10, NULL, NULL),
(113, 39, 2, NULL, NULL),
(114, 40, 2, NULL, NULL),
(115, 41, 2, NULL, NULL),
(116, 41, 5, NULL, NULL),
(117, 42, 3, NULL, NULL),
(118, 42, 9, NULL, NULL),
(119, 43, 3, NULL, NULL),
(120, 44, 1, NULL, NULL),
(121, 44, 3, NULL, NULL),
(122, 44, 4, NULL, NULL),
(123, 44, 7, NULL, NULL),
(124, 44, 9, NULL, NULL),
(127, 46, 3, NULL, NULL),
(128, 46, 11, NULL, NULL),
(129, 47, 2, NULL, NULL),
(130, 47, 3, NULL, NULL),
(131, 47, 11, NULL, NULL),
(132, 48, 2, NULL, NULL),
(133, 48, 3, NULL, NULL),
(134, 48, 5, NULL, NULL),
(137, 50, 3, NULL, NULL),
(138, 50, 5, NULL, NULL),
(139, 50, 7, NULL, NULL),
(140, 50, 9, NULL, NULL),
(141, 50, 12, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `movie_provider`
--

CREATE TABLE `movie_provider` (
  `id` bigint UNSIGNED NOT NULL,
  `movie_id` bigint UNSIGNED NOT NULL,
  `streaming_service_provider_id` bigint UNSIGNED NOT NULL,
  `price` double(8,2) NOT NULL,
  `type_price_id` bigint UNSIGNED NOT NULL,
  `movie_resolution_id` bigint UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `movie_provider`
--

INSERT INTO `movie_provider` (`id`, `movie_id`, `streaming_service_provider_id`, `price`, `type_price_id`, `movie_resolution_id`, `url`, `created_at`, `updated_at`) VALUES
(1, 1, 8, 10.00, 3, 3, 'https://www.amazon.co.jp/gp/video/detail/0HX5QEE7UHHGOXQA4U9SF3JJ5H/ref=atv_dl_rdr?tag=justwatch-22', '2023-08-11 19:22:10', '2023-08-11 19:22:10'),
(2, 1, 8, 20.00, 3, 2, 'https://www.amazon.co.jp/gp/video/detail/0HX5QEE7UHHGOXQA4U9SF3JJ5H/ref=atv_dl_rdr?tag=justwatch-22', '2023-08-11 19:22:40', '2023-08-11 19:22:40'),
(3, 1, 8, 30.00, 3, 1, 'https://www.amazon.co.jp/gp/video/detail/0HX5QEE7UHHGOXQA4U9SF3JJ5H/ref=atv_dl_rdr?tag=justwatch-22', '2023-08-11 19:22:56', '2023-08-11 19:22:56'),
(4, 3, 9, 15.00, 3, 3, 'https://www.netflix.com/vn/title/80117824', '2023-08-11 19:25:37', '2023-08-11 19:25:37'),
(5, 3, 15, 25.00, 5, 3, 'https://www.amazon.co.jp/gp/video/detail/0LGZQZ0HH6K1V1TJPZXB15XW54/ref=atv_dl_rdr?tag=justwatch-22', '2023-08-11 19:26:37', '2023-08-11 19:26:37'),
(6, 3, 11, 25.00, 5, 3, 'https://play.google.com/store/movies/details/%E6%96%B0%E6%84%9F%E6%9F%93_%E3%83%95%E3%82%A1%E3%82%A4%E3%83%8A%E3%83%AB_%E3%82%A8%E3%82%AF%E3%82%B9%E3%83%97%E3%83%AC%E3%82%B9_%E5%90%B9%E6%9B%BF%E7%89%88?gl=JP&hl=en&id=PQo2lrpL7Ng&pli=1', '2023-08-11 19:27:06', '2023-08-11 19:27:06'),
(7, 3, 10, 30.00, 5, 3, 'https://tv.apple.com/jp/movie/%E6%96%B0%E6%84%9F%E6%9F%93-%E3%83%95%E3%82%A1%E3%82%A4%E3%83%8A%E3%83%AB%E3%82%A8%E3%82%AF%E3%82%B9%E3%83%95%E3%83%AC%E3%82%B9/umc.cmc.74kcjars4r3m6bliewisxh4dr?playableId=tvs.sbd.9001%3A1315636133', '2023-08-11 19:27:34', '2023-08-11 19:27:34'),
(8, 3, 15, 90.00, 4, 3, 'https://www.amazon.co.jp/gp/video/detail/0LGZQZ0HH6K1V1TJPZXB15XW54/ref=atv_dl_rdr?tag=justwatch-22', '2023-08-11 19:28:03', '2023-08-11 19:28:03'),
(9, 3, 10, 95.00, 4, 3, 'https://tv.apple.com/us/movie/train-to-busan/umc.cmc.74kcjars4r3m6bliewisxh4dr', '2023-08-11 19:33:32', '2023-08-11 19:33:32'),
(10, 3, 11, 14.00, 4, 2, 'https://play.google.com/store/movies/details/Train_to_Busan', '2023-08-11 19:34:21', '2023-08-11 19:34:21'),
(11, 3, 14, 12.00, 4, 2, 'https://www.microsoft.com/en-us/p/train-to-busan/8d6kgwx3lnvw', '2023-08-11 19:35:02', '2023-08-11 19:35:02'),
(12, 3, 15, 4.00, 4, 2, 'https://www.amazon.com/gp/video/detail/0HSTKBZPXPFV3B5XBNAF5CY6RX/ref=atv_dl_rdr', '2023-08-11 19:35:42', '2023-08-11 19:35:42'),
(13, 3, 10, 4.00, 5, 2, 'https://tv.apple.com/us/movie/train-to-busan/umc.cmc.74kcjars4r3m6bliewisxh4dr?playableId=tvs.sbd.9001%3A1163982660', '2023-08-11 19:36:09', '2023-08-11 19:36:09'),
(14, 3, 10, 4.00, 5, 1, 'https://tv.apple.com/us/movie/train-to-busan/umc.cmc.74kcjars4r3m6bliewisxh4dr?playableId=tvs.sbd.9001%3A1163982660', '2023-08-11 19:37:28', '2023-08-11 19:37:28'),
(15, 3, 10, 10.00, 4, 1, 'https://tv.apple.com/us/movie/train-to-busan/umc.cmc.74kcjars4r3m6bliewisxh4dr?at=1000l3V2&ct=justwatch_tv&playableId=tvs.sbd.9001%3A1163982660', '2023-08-11 19:37:50', '2023-08-11 19:37:50'),
(16, 4, 13, 0.00, 2, 3, 'https://ondemand.spectrum.net/tv/bravo/9194492/below-deck/', '2023-08-11 19:39:14', '2023-08-11 19:39:14'),
(17, 4, 10, 5.00, 4, 3, 'https://tv.apple.com/us/show/below-deck/umc.cmc.17kjhzzwgeqxdbl3181ev6bfz?at=1000l3V2&ct=justwatch_tv', '2023-08-11 19:39:46', '2023-08-11 19:39:46'),
(18, 4, 15, 5.00, 4, 3, 'https://www.amazon.com/gp/video/detail/0QK8C8KHMDK9GBCPW4RSQDGUWQ/ref=atv_dl_rdr?tag=justus1ktp-20', '2023-08-11 19:40:14', '2023-08-11 19:40:14'),
(19, 4, 14, 4.00, 4, 3, 'https://www.microsoft.com/en-us/p/season-1/8d6kgwzlcnfr', '2023-08-11 19:40:35', '2023-08-11 19:40:35'),
(20, 4, 11, 4.00, 4, 3, 'https://play.google.com/store/tv/show?cdid=tvseason-Yv0dKrxXU2I.P&gl=US&hl=en&id=zv6GP29Zy48.P', '2023-08-11 19:40:56', '2023-08-11 19:40:56'),
(21, 4, 13, 6.00, 3, 3, 'https://ondemand.spectrum.net/tv/bravo/9194492/below-deck/', '2023-08-11 19:41:16', '2023-08-11 19:41:16'),
(22, 4, 13, 6.00, 3, 2, 'https://ondemand.spectrum.net/tv/bravo/9194492/below-deck/', '2023-08-11 19:41:43', '2023-08-11 19:41:43'),
(23, 4, 15, 7.00, 4, 2, 'https://www.amazon.com/gp/video/detail/0QK8C8KHMDK9GBCPW4RSQDGUWQ/ref=atv_dl_rdr?tag=justus1ktp-20', '2023-08-11 19:42:10', '2023-08-11 19:42:10'),
(24, 4, 14, 7.00, 4, 2, 'https://www.microsoft.com/en-us/p/season-1/8d6kgwzlcnfr?activetab=pivot%3aoverviewtab', '2023-08-11 19:42:34', '2023-08-11 19:42:34'),
(25, 4, 11, 7.00, 4, 2, 'https://play.google.com/store/tv/show?cdid=tvseason-Yv0dKrxXU2I.P&gl=US&hl=en&id=zv6GP29Zy48.P', '2023-08-11 19:42:48', '2023-08-11 19:42:48'),
(26, 4, 10, 8.00, 4, 2, 'https://tv.apple.com/us/show/below-deck/umc.cmc.17kjhzzwgeqxdbl3181ev6bfz?at=1000l3V2&ct=justwatch_tv', '2023-08-11 19:43:04', '2023-08-11 19:43:04'),
(27, 5, 10, 9.00, 3, 1, 'https://tv.apple.com/', '2023-08-11 19:44:22', '2023-08-11 19:44:22'),
(28, 5, 13, 9.00, 3, 2, 'https://ondemand.spectrum.net/tv/showtime/18863434/your-honor/', '2023-08-11 19:45:07', '2023-08-11 19:45:07'),
(29, 5, 8, 9.00, 3, 2, 'https://www.amazon.com/gp/video/detail/0H3D98L393O2055HBA2QLHFT5I/ref=atv_dl_rdr?tag=justus1ktp-20', '2023-08-11 19:45:29', '2023-08-11 19:45:29'),
(30, 5, 10, 28.00, 4, 2, 'https://tv.apple.com/us/show/your-honor/umc.cmc.1dmuuj2ejlx54k7nr5uvhos4a', '2023-08-11 19:45:49', '2023-08-11 19:45:49'),
(31, 5, 11, 20.00, 4, 2, 'https://play.google.com/store/tv/show?cdid=tvseason-Mro5c6JuBG0.P&gl=US&hl=en&id=GFSRVmiLqgY.P', '2023-08-11 19:46:07', '2023-08-11 19:46:07'),
(32, 5, 15, 20.00, 4, 2, 'https://www.amazon.com/gp/video/detail/0SKU3FNLIYVTTUXBAD1D9PUJYN/ref=atv_dl_rdr?tag=justus1ktp-20', '2023-08-11 19:46:26', '2023-08-11 19:46:26'),
(33, 5, 8, 0.00, 2, 2, 'https://www.amazon.com/gp/video/detail/0H3D98L393O2055HBA2QLHFT5I/ref=atv_dl_rdr?tag=justus1ktp-20', '2023-08-11 19:46:46', '2023-08-11 19:46:46'),
(34, 6, 10, 0.00, 1, 3, 'https://tv.apple.com/?at=1000l3V2&ct=appletvchannel&itscg=30200&itsct=justwatch_tv', '2023-08-11 19:47:41', '2023-08-11 19:47:41'),
(35, 6, 13, 4.00, 3, 3, 'https://ondemand.spectrum.net/tv/showtime/185267/dexter/', '2023-08-11 19:48:05', '2023-08-11 19:48:05'),
(36, 6, 10, 6.00, 4, 3, 'https://tv.apple.com/us/show/dexter/umc.cmc.2w8cp3aur89y8id4cfk2engfu?at=1000l3V2&ct=justwatch_tv', '2023-08-11 19:48:30', '2023-08-11 19:48:30'),
(37, 6, 15, 5.00, 4, 3, 'https://www.amazon.com/gp/video/detail/0J3OTK4NJH3IDTLQ1S25B31XYA/ref=atv_dl_rdr?tag=justus1ktp-20', '2023-08-11 19:48:51', '2023-08-11 19:48:51'),
(38, 6, 14, 6.00, 4, 3, 'https://www.microsoft.com/en-us/p/season-1/8d6kgwxn0rhn', '2023-08-11 19:49:09', '2023-08-11 19:49:09'),
(39, 6, 11, 5.00, 4, 3, 'https://play.google.com/store/tv/show?cdid=tvseason-nK4HGAkD-Qk&gl=US&hl=en&id=RtwVNp8rCTk', '2023-08-11 19:49:29', '2023-08-11 19:49:29'),
(40, 6, 13, 10.00, 3, 2, 'https://ondemand.spectrum.net/tv/showtime/185267/dexter/', '2023-08-11 19:49:58', '2023-08-11 19:49:58'),
(41, 6, 10, 20.00, 4, 2, 'https://tv.apple.com/us/show/dexter/umc.cmc.2w8cp3aur89y8id4cfk2engfu?at=1000l3V2&ct=justwatch_tv', '2023-08-11 19:50:19', '2023-08-11 19:50:19'),
(42, 6, 15, 21.00, 4, 2, 'https://www.amazon.com/gp/video/detail/0J3OTK4NJH3IDTLQ1S25B31XYA/ref=atv_dl_rdr?tag=justus1ktp-20', '2023-08-11 19:50:35', '2023-08-11 19:50:35'),
(43, 6, 11, 21.00, 4, 2, 'https://play.google.com/store/tv/show?cdid=tvseason-nK4HGAkD-Qk&gl=US&hl=en&id=RtwVNp8rCTk', '2023-08-11 19:50:54', '2023-08-11 19:50:54'),
(44, 7, 10, 31.97, 4, 3, 'https://tv.apple.com/us/show/harley-quinn-a-very-problematic-valentines-day-special/umc.cmc.lu9n719s7e7xwdemxtgr6zir?at=1000l3V2&ct=justwatch_tv', '2023-08-11 19:54:54', '2023-08-11 19:54:54'),
(45, 7, 15, 28.00, 4, 3, 'https://www.amazon.com/gp/video/detail/0JEC8T2O6RITGID50CK9EZSU7D/ref=atv_dl_rdr?tag=justus1ktp-20', '2023-08-11 19:55:14', '2023-08-11 19:55:14'),
(46, 7, 11, 28.00, 4, 3, 'https://play.google.com/store/tv/show?cdid=tvseason-6GJdRAMGf2QuY61K2xy9Ng&gl=US&hl=en&id=FeT7lihJjdm9DEhsZ4FGfw', '2023-08-11 19:55:29', '2023-08-11 19:55:29'),
(47, 7, 14, 14.99, 4, 3, 'https://www.microsoft.com/en-us/p/season-1/8d6kgwxn0kq9', '2023-08-11 19:56:08', '2023-08-11 19:56:08'),
(48, 7, 10, 19.00, 4, 2, 'https://tv.apple.com/us/show/harley-quinn-a-very-problematic-valentines-day-special/umc.cmc.lu9n719s7e7xwdemxtgr6zir?at=1000l3V2&ct=justwatch_tv', '2023-08-11 19:57:17', '2023-08-11 19:57:17'),
(49, 7, 15, 19.99, 4, 2, 'https://www.amazon.com/gp/video/detail/0JEC8T2O6RITGID50CK9EZSU7D/ref=atv_dl_rdr?tag=justus1ktp-20', '2023-08-11 19:57:42', '2023-08-11 19:57:42'),
(50, 7, 14, 14.99, 4, 2, 'https://www.microsoft.com/en-us/p/season-1/8d6kgwxn0kq9?activetab=pivot%3aoverviewtab', '2023-08-11 19:58:05', '2023-08-11 19:58:05'),
(51, 7, 11, 12.99, 4, 2, 'https://play.google.com/store/tv/show?cdid=tvseason--2vf_0HauSs.P&gl=US&hl=en&id=lJSIdR8MY20.P', '2023-08-11 19:58:34', '2023-08-11 19:58:34'),
(52, 8, 10, 19.99, 4, 3, 'https://tv.apple.com/us/movie/guardians-of-the-galaxy-vol-3/umc.cmc.4sfw9bhw8bx6dnyfysc8829rt?at=1000l3V2&ct=justwatch_tv&playableId=tvs.sbd.9001%3A1690698615', '2023-08-11 20:00:11', '2023-08-11 20:00:11'),
(53, 8, 15, 19.99, 4, 3, 'https://www.amazon.com/gp/video/detail/0J4TK07TEWG8MGE1MXWF071204/ref=atv_dl_rdr?tag=justus1ktp-20', '2023-08-11 20:00:33', '2023-08-11 20:00:33'),
(54, 8, 14, 19.99, 4, 3, 'https://www.microsoft.com/en-us/p/guardians-of-the-galaxy-vol-3-bonus-content/8d6kgwxzkqkm', '2023-08-11 20:00:57', '2023-08-11 20:00:57'),
(55, 9, 10, 19.99, 4, 1, 'https://tv.apple.com/us/movie/spider-man-across-the-spider-verse/umc.cmc.2zphwshxw2ejh2znevhod0u01?at=1000l3V2&ct=justwatch_tv&playableId=tvs.sbd.9001%3A1688506685', '2023-08-11 20:02:15', '2023-08-11 20:02:15'),
(56, 9, 15, 19.99, 4, 1, 'https://www.amazon.com/gp/video/detail/0RSBFAFMEUCUTYIRAJUE242PK1/ref=atv_dl_rdr?tag=justus1ktp-20', '2023-08-11 20:02:42', '2023-08-11 20:02:42'),
(57, 9, 11, 19.99, 4, 1, 'https://play.google.com/store/movies/details/Spider_Man_Across_the_Spider_Verse?gl=US&hl=en&id=i2gpaZXJheE.P', '2023-08-11 20:03:04', '2023-08-11 20:03:04'),
(58, 9, 14, 19.99, 4, 1, 'https://www.microsoft.com/en-us/p/spider-man-across-the-spider-verse-bonus/8d6kgwxxjfpc?activetab=pivot%3aoverviewtab', '2023-08-11 20:03:33', '2023-08-11 20:03:33'),
(59, 15, 9, 24.00, 3, 1, 'https://www.netflix.com/vn/title/81479822', '2023-08-11 20:06:06', '2023-08-11 20:06:06'),
(60, 15, 9, 18.00, 3, 2, 'https://www.netflix.com/vn/title/81479822', '2023-08-11 20:06:28', '2023-08-11 20:06:28'),
(61, 15, 9, 9.00, 3, 3, 'https://www.netflix.com/vn/title/81479822', '2023-08-11 20:06:44', '2023-08-11 20:06:44'),
(62, 16, 9, 9.99, 3, 3, 'https://www.netflix.com/vn/title/81651185', '2023-08-11 20:07:59', '2023-08-11 20:07:59'),
(63, 16, 9, 13.99, 3, 2, 'https://www.netflix.com/vn/title/81651185', '2023-08-11 20:08:14', '2023-08-11 20:08:14'),
(64, 16, 9, 19.99, 2, 1, 'https://www.netflix.com/vn/title/81651185', '2023-08-11 20:08:29', '2023-08-11 20:08:29'),
(65, 20, 8, 0.00, 1, 3, 'https://www.amazon.com/gp/video/detail/0MWMRLVWGJ17J0VFQUQNMH6VJ3/ref=atv_dl_rdr?tag=justus1ktp-20', '2023-08-11 20:09:46', '2023-08-11 20:09:46'),
(66, 20, 8, 3.00, 3, 3, 'https://www.amazon.com/gp/video/detail/0MWMRLVWGJ17J0VFQUQNMH6VJ3/ref=atv_dl_rdr?tag=justus1ktp-20', '2023-08-11 20:10:04', '2023-08-11 20:10:04'),
(67, 20, 8, 6.99, 3, 2, 'https://www.amazon.com/gp/video/detail/0MWMRLVWGJ17J0VFQUQNMH6VJ3/ref=atv_dl_rdr?tag=justus1ktp-20', '2023-08-11 20:10:17', '2023-08-11 20:10:17'),
(68, 20, 8, 12.00, 3, 1, 'https://www.amazon.com/gp/video/detail/0MWMRLVWGJ17J0VFQUQNMH6VJ3/ref=atv_dl_rdr?tag=justus1ktp-20', '2023-08-11 20:10:26', '2023-08-11 20:10:26'),
(69, 25, 12, 0.00, 1, 3, 'https://abc.com/shows/station-19/episode-guide/season-06/14-get-it-all-out', '2023-08-11 20:18:25', '2023-08-11 20:18:25'),
(70, 25, 12, 3.99, 3, 3, 'https://abc.com/shows/station-19/episode-guide/season-06/14-get-it-all-out', '2023-08-11 20:18:47', '2023-08-11 20:18:47'),
(71, 25, 15, 5.99, 4, 3, 'https://www.amazon.com/gp/video/detail/0H7JO99SEI9FE75N4O0HS9ZE9Z/ref=atv_dl_rdr?tag=justus1ktp-20', '2023-08-11 20:19:08', '2023-08-11 20:19:08'),
(72, 25, 10, 6.00, 4, 3, 'https://tv.apple.com/us/show/station-19/umc.cmc.1qkqrh4qlpc2a6or04v9b4kw1?at=1000l3V2&ct=justwatch_tv', '2023-08-11 20:19:45', '2023-08-11 20:19:45'),
(73, 25, 11, 5.99, 3, 3, 'https://play.google.com/store/tv/show?cdid=tvseason-NWzBj1DAYsw5C13U1vCz3g&gl=US&hl=en&id=iTQjDlLTTx-JJ4SJQL_Ibg', '2023-08-11 20:20:04', '2023-08-11 20:20:04'),
(74, 25, 15, 9.99, 4, 2, 'https://www.amazon.com/gp/video/detail/0H7JO99SEI9FE75N4O0HS9ZE9Z/ref=atv_dl_rdr?tag=justus1ktp-20', '2023-08-11 20:20:46', '2023-08-11 20:20:46'),
(75, 25, 11, 8.99, 4, 2, 'https://play.google.com/store/tv/show?cdid=tvseason-NWzBj1DAYsw5C13U1vCz3g&gl=US&hl=en&id=iTQjDlLTTx-JJ4SJQL_Ibg', '2023-08-11 20:21:40', '2023-08-11 20:21:40'),
(76, 21, 14, 2.99, 5, 2, 'https://www.microsoft.com/en-us/p/the-exorcist-the-version-youve-never-seen/8d6kgwzl5nq2?activetab=pivot%3aoverviewtab', '2023-08-11 20:22:50', '2023-08-11 20:23:16'),
(77, 21, 10, 3.99, 5, 2, 'https://tv.apple.com/us/movie/the-exorcist/umc.cmc.4gtv6f0u6prw2hg0v988mof2q?at=1000l3V2&ct=justwatch_tv&playableId=tvs.sbd.9001%3A572533870', '2023-08-11 20:24:51', '2023-08-11 20:24:51'),
(78, 21, 11, 3.99, 5, 2, 'https://play.google.com/store/movies/details/The_Exorcist?gl=US&hl=en&id=sFuY0icpASA', '2023-08-11 20:25:13', '2023-08-11 20:25:13'),
(79, 21, 15, 4.79, 5, 2, 'https://www.amazon.com/gp/video/detail/0JP032FI41VT2BYF90PXM3FMJK/ref=atv_dl_rdr?tag=justus1ktp-20', '2023-08-11 20:25:38', '2023-08-11 20:25:38'),
(80, 21, 14, 12.99, 4, 2, 'https://www.microsoft.com/en-us/p/the-exorcist-the-version-youve-never-seen/8d6kgwzl5nq2', '2023-08-11 20:26:14', '2023-08-11 20:26:14'),
(81, 21, 10, 14.99, 4, 2, 'https://tv.apple.com/us/movie/the-exorcist/umc.cmc.4gtv6f0u6prw2hg0v988mof2q?at=1000l3V2&ct=justwatch_tv&playableId=tvs.sbd.9001%3A566691160', '2023-08-11 20:26:31', '2023-08-11 20:26:31'),
(82, 21, 11, 14.99, 4, 2, 'https://play.google.com/store/movies/details/The_Exorcist_The_Version_You_ve_Never_Seen?gl=US&hl=en&id=JOoPZIa80Vg.P', '2023-08-11 20:26:55', '2023-08-11 20:26:55'),
(83, 21, 15, 15.79, 4, 2, 'https://www.amazon.com/gp/video/detail/0SOYHJUVXZIMEYG8ZC5AT955LD/ref=atv_dl_rdr?tag=justus1ktp-20', '2023-08-11 20:28:49', '2023-08-11 20:28:49'),
(84, 21, 14, 2.99, 5, 3, 'https://www.microsoft.com/en-us/p/the-exorcist-the-version-youve-never-seen/8d6kgwzl5nq2', '2023-08-11 20:29:20', '2023-08-11 20:29:20'),
(85, 21, 10, 3.99, 5, 3, 'https://tv.apple.com/us/movie/the-exorcist/umc.cmc.4gtv6f0u6prw2hg0v988mof2q?at=1000l3V2&ct=justwatch_tv&playableId=tvs.sbd.9001%3A572533870', '2023-08-11 20:29:44', '2023-08-11 20:29:44'),
(86, 21, 15, 4.79, 5, 3, 'https://www.amazon.com/gp/video/detail/0JP032FI41VT2BYF90PXM3FMJK/ref=atv_dl_rdr?tag=justus1ktp-20', '2023-08-11 20:30:07', '2023-08-11 20:30:07'),
(87, 21, 15, 7.99, 4, 3, 'https://www.amazon.com/gp/video/detail/0SOYHJUVXZIMEYG8ZC5AT955LD/ref=atv_dl_rdr?tag=justus1ktp-20', '2023-08-11 20:30:30', '2023-08-11 20:30:30'),
(88, 21, 14, 12.99, 4, 3, 'https://www.microsoft.com/en-us/p/the-exorcist-the-version-youve-never-seen/8d6kgwzl5nq2', '2023-08-11 20:30:57', '2023-08-11 20:30:57'),
(89, 21, 10, 14.99, 4, 3, 'https://tv.apple.com/us/movie/the-exorcist/umc.cmc.4gtv6f0u6prw2hg0v988mof2q?at=1000l3V2&ct=justwatch_tv&playableId=tvs.sbd.9001%3A566691160', '2023-08-11 20:31:17', '2023-08-11 20:31:17'),
(90, 19, 9, 3.99, 3, 3, 'https://www.netflix.com/vn/title/81280917', '2023-08-11 20:32:31', '2023-08-11 20:32:31'),
(91, 19, 9, 5.99, 3, 2, 'https://www.netflix.com/vn/title/81280917', '2023-08-11 20:33:18', '2023-08-11 20:33:18'),
(92, 19, 9, 9.99, 3, 1, 'https://www.netflix.com/vn/title/81280917', '2023-08-11 20:33:36', '2023-08-11 20:33:36'),
(93, 18, 9, 8.99, 3, 2, 'https://www.netflix.com/vn/title/70195800', '2023-08-11 20:34:49', '2023-08-11 20:34:49'),
(94, 18, 8, 8.99, 3, 2, 'https://www.amazon.com/gp/video/detail/0Q3A4VZHR1S5SVAHK31J66DFNW/ref=atv_dl_rdr?tag=justus1ktp-20', '2023-08-11 20:35:12', '2023-08-11 20:35:12'),
(95, 18, 10, 16.79, 4, 2, 'https://tv.apple.com/us/show/suits/umc.cmc.3ywscpqclsfy0w2ezs44auwsx?at=1000l3V2&ct=justwatch_tv', '2023-08-11 20:35:35', '2023-08-11 20:35:35'),
(96, 18, 15, 15.99, 4, 2, 'https://www.amazon.com/gp/video/detail/0TVL0JEK3U8MFB7JAP7XGHKZZT/ref=atv_dl_rdr?tag=justus1ktp-20', '2023-08-11 20:35:57', '2023-08-11 20:35:57'),
(97, 18, 11, 16.99, 4, 2, 'https://play.google.com/store/tv/show?cdid=tvseason-qdW6ra7GmH0&gl=US&hl=en&id=O58aI3JQKeo', '2023-08-11 20:36:43', '2023-08-11 20:36:43'),
(98, 17, 8, 0.00, 2, 2, 'https://www.amazon.com/gp/video/detail/0OUAEPD9ORWXN2PMINCQS2N4YN/ref=atv_dl_rdr?tag=justus1ktp-20', '2023-08-11 20:40:51', '2023-08-11 20:40:51'),
(99, 14, 8, 4.99, 3, 3, 'https://www.amazon.co.jp/gp/video/detail/0LY036TFIL3XKJBU7ZAQZAL561/ref=atv_dl_rdr', '2023-08-12 03:24:09', '2023-08-12 03:24:09'),
(100, 14, 8, 7.99, 3, 2, 'https://www.amazon.co.jp/gp/video/detail/0LY036TFIL3XKJBU7ZAQZAL561/ref=atv_dl_rdr', '2023-08-12 03:24:59', '2023-08-12 03:24:59'),
(101, 14, 8, 12.99, 3, 1, 'https://www.amazon.co.jp/gp/video/detail/0LY036TFIL3XKJBU7ZAQZAL561/ref=atv_dl_rdr', '2023-08-12 03:25:17', '2023-08-12 03:25:17'),
(102, 10, 15, 2.89, 5, 3, 'https://www.amazon.com/gp/video/detail/0PYX2QHK24ZGRK4R12NX0INT03/ref=atv_dl_rdr', '2023-08-12 03:30:15', '2023-08-12 03:30:15'),
(103, 10, 10, 2.99, 5, 3, 'https://tv.apple.com/us/movie/sorcerer/umc.cmc.6kblkdgarzc0jzztlugktbq0w?at=1000l3V2&ct=justwatch_tv&playableId=tvs.sbd.9001%3A903321685', '2023-08-12 03:30:39', '2023-08-12 03:30:39'),
(104, 10, 14, 2.99, 5, 3, 'https://www.microsoft.com/en-us/p/sorcerer/8d6kgwzqj41d?activetab=pivot%3aoverviewtab', '2023-08-12 03:31:33', '2023-08-12 03:31:33'),
(105, 10, 13, 3.99, 5, 3, 'https://ondemand.spectrum.net/movies/4070/sorcerer/', '2023-08-12 03:31:56', '2023-08-12 03:31:56'),
(106, 10, 10, 9.99, 4, 3, 'https://tv.apple.com/us/movie/sorcerer/umc.cmc.6kblkdgarzc0jzztlugktbq0w?at=1000l3V2&ct=justwatch_tv&playableId=tvs.sbd.9001%3A903321685', '2023-08-12 03:32:22', '2023-08-12 03:32:22'),
(107, 10, 15, 9.99, 4, 3, 'https://www.amazon.com/gp/video/detail/0PYX2QHK24ZGRK4R12NX0INT03/ref=atv_dl_rdr?tag=justus1ktp-20', '2023-08-12 03:34:00', '2023-08-12 03:34:00'),
(108, 10, 14, 9.99, 4, 3, 'https://www.microsoft.com/en-us/p/sorcerer/8d6kgwzqj41d', '2023-08-12 03:34:34', '2023-08-12 03:34:34'),
(109, 10, 15, 2.89, 5, 2, 'https://www.amazon.com/gp/video/detail/0PYX2QHK24ZGRK4R12NX0INT03/ref=atv_dl_rdr', '2023-08-12 03:35:03', '2023-08-12 03:35:03'),
(110, 10, 10, 2.99, 5, 2, 'https://tv.apple.com/us/movie/sorcerer/umc.cmc.6kblkdgarzc0jzztlugktbq0w?at=1000l3V2&ct=justwatch_tv&playableId=tvs.sbd.9001%3A903321685', '2023-08-12 03:35:24', '2023-08-12 03:35:24'),
(111, 10, 13, 3.99, 5, 2, 'https://ondemand.spectrum.net/movies/4070/sorcerer/', '2023-08-12 03:36:03', '2023-08-12 03:36:03'),
(112, 10, 10, 9.99, 4, 2, 'https://tv.apple.com/us/movie/sorcerer/umc.cmc.6kblkdgarzc0jzztlugktbq0w?at=1000l3V2&ct=justwatch_tv&playableId=tvs.sbd.9001%3A903321685', '2023-08-12 03:36:25', '2023-08-12 03:36:25'),
(113, 10, 14, 9.99, 4, 2, 'https://www.microsoft.com/en-us/p/sorcerer/8d6kgwzqj41d', '2023-08-12 03:36:48', '2023-08-12 03:36:48'),
(114, 10, 15, 10.49, 4, 2, 'https://www.amazon.com/gp/video/detail/0PYX2QHK24ZGRK4R12NX0INT03/ref=atv_dl_rdr', '2023-08-12 03:37:13', '2023-08-12 03:37:13'),
(115, 26, 16, 5.99, 3, 3, 'https://www.fxnowcanada.ca/shows/justified-city-primeval/', '2023-08-12 04:48:13', '2023-08-12 04:48:13'),
(116, 26, 14, 19.99, 4, 3, 'https://www.microsoft.com/en-ca/p/season-1/8d6kgwxxgx1d?activetab=pivot%3aoverviewtab', '2023-08-12 04:48:41', '2023-08-12 04:48:41'),
(117, 26, 10, 18.00, 4, 3, 'https://tv.apple.com/ca/show/justified-city-primeval/umc.cmc.vxwk9jx9x46fkznuw2xaxe3n', '2023-08-12 04:49:04', '2023-08-12 04:49:04'),
(118, 26, 11, 17.99, 4, 3, 'https://play.google.com/store/tv/show?cdid=tvseason-dn1d775eWD4.P&gl=CA&hl=en&id=ujAsDKyY2js.P', '2023-08-12 04:49:25', '2023-08-12 04:49:25'),
(119, 26, 16, 8.49, 3, 2, 'https://www.fxnowcanada.ca/shows/justified-city-primeval/', '2023-08-12 04:49:55', '2023-08-12 04:49:55'),
(120, 26, 14, 20.49, 4, 2, 'https://www.microsoft.com/en-ca/p/season-1/8d6kgwxxgx1d?activetab=pivot%3aoverviewtab', '2023-08-12 04:50:18', '2023-08-12 04:50:18'),
(121, 26, 10, 23.99, 4, 2, 'https://tv.apple.com/ca/show/justified-city-primeval/umc.cmc.vxwk9jx9x46fkznuw2xaxe3n?at=1000l3V2&ct=justwatch_tv', '2023-08-12 04:50:32', '2023-08-12 04:50:32'),
(122, 26, 11, 21.99, 4, 2, 'https://play.google.com/store/tv/show?cdid=tvseason-dn1d775eWD4.P&gl=CA&hl=en&id=ujAsDKyY2js.P', '2023-08-12 04:50:47', '2023-08-12 04:50:47'),
(123, 26, 10, 18.99, 5, 1, 'https://tv.apple.com/ca/show/justified-city-primeval/umc.cmc.vxwk9jx9x46fkznuw2xaxe3n', '2023-08-12 04:51:19', '2023-08-12 04:51:19'),
(124, 28, 8, 0.00, 2, 2, 'https://www.primevideo.com/detail/0O712QFTJP8CX4ST8PL528VE3B/ref=atv_dl_rdr', '2023-08-12 04:55:09', '2023-08-12 04:55:09'),
(125, 28, 8, 3.99, 3, 3, 'https://www.primevideo.com/detail/0O712QFTJP8CX4ST8PL528VE3B/ref=atv_dl_rdr', '2023-08-12 04:55:24', '2023-08-12 04:55:24'),
(126, 28, 8, 6.99, 3, 2, 'https://www.primevideo.com/detail/0O712QFTJP8CX4ST8PL528VE3B/ref=atv_dl_rdr', '2023-08-12 04:55:36', '2023-08-12 04:55:36'),
(127, 28, 8, 8.99, 3, 1, 'https://www.primevideo.com/detail/0O712QFTJP8CX4ST8PL528VE3B/ref=atv_dl_rdr', '2023-08-12 04:55:46', '2023-08-12 04:55:46'),
(128, 29, 8, 0.00, 1, 3, 'https://www.amazon.co.jp/gp/video/detail/0LY1QBP8YE7KMWL5GKMNC1CM8R/ref=atv_dl_rdr?tag=justwatch-22', '2023-08-12 04:59:25', '2023-08-12 04:59:25'),
(129, 29, 9, 5.99, 3, 3, 'https://www.netflix.com/vn/title/80107103', '2023-08-12 05:00:24', '2023-08-12 05:00:24'),
(130, 29, 9, 8.99, 3, 2, 'https://www.netflix.com/vn/title/80107103', '2023-08-12 05:00:37', '2023-08-12 05:00:37'),
(131, 29, 8, 5.49, 3, 3, 'https://www.amazon.co.jp/gp/video/detail/0LY1QBP8YE7KMWL5GKMNC1CM8R/ref=atv_dl_rdr?tag=justwatch-22', '2023-08-12 05:01:03', '2023-08-12 05:01:03'),
(132, 29, 15, 7.99, 5, 3, 'https://www.amazon.co.jp/gp/video/detail/0LY1QBP8YE7KMWL5GKMNC1CM8R/ref=atv_dl_rdr', '2023-08-12 05:01:26', '2023-08-12 05:01:26'),
(133, 29, 8, 9.49, 3, 2, 'https://www.amazon.co.jp/gp/video/detail/0LY1QBP8YE7KMWL5GKMNC1CM8R/ref=atv_dl_rdr?tag=justwatch-22', '2023-08-12 05:01:51', '2023-08-12 05:01:51'),
(134, 29, 15, 8.99, 5, 2, 'https://www.amazon.co.jp/gp/video/detail/0LY1QBP8YE7KMWL5GKMNC1CM8R/ref=atv_dl_rdr', '2023-08-12 05:02:36', '2023-08-12 05:02:36'),
(135, 30, 8, 0.00, 2, 2, 'https://www.amazon.co.jp/gp/video/detail/0TJ9MOOR43M8I5TWCUDV1T2CWI/ref=atv_dl_rdr', '2023-08-12 05:07:49', '2023-08-12 05:07:49'),
(136, 31, 8, 0.00, 1, 3, 'https://www.amazon.co.jp/gp/video/detail/0U8SRBYQIHFB2A4CVEPQQXS4CT/ref=atv_dl_rdr?tag=justwatch-22', '2023-08-12 05:10:41', '2023-08-12 05:10:41'),
(137, 31, 8, 3.99, 3, 3, 'https://www.amazon.co.jp/gp/video/detail/0U8SRBYQIHFB2A4CVEPQQXS4CT/ref=atv_dl_rdr?tag=justwatch-22', '2023-08-12 05:11:17', '2023-08-12 05:11:17'),
(138, 31, 15, 7.99, 5, 3, 'https://www.amazon.co.jp/gp/video/detail/0U8SRBYQIHFB2A4CVEPQQXS4CT/ref=atv_dl_rdr', '2023-08-12 05:11:41', '2023-08-12 05:11:41'),
(139, 31, 17, 3.49, 3, 3, 'https://www.hulu.jp/watch/100152300', '2023-08-12 05:15:19', '2023-08-12 05:15:19'),
(140, 31, 15, 9.49, 5, 2, 'https://www.amazon.co.jp/gp/video/detail/0U8SRBYQIHFB2A4CVEPQQXS4CT/ref=atv_dl_rdr', '2023-08-12 05:17:10', '2023-08-12 05:17:10'),
(141, 31, 17, 8.99, 3, 2, 'https://www.hulu.jp/watch/100152300', '2023-08-12 05:17:36', '2023-08-12 05:17:36'),
(142, 31, 8, 8.99, 3, 2, 'https://www.amazon.co.jp/gp/video/detail/0U8SRBYQIHFB2A4CVEPQQXS4CT/ref=atv_dl_rdr', '2023-08-12 05:17:58', '2023-08-12 05:17:58'),
(143, 32, 8, 4.99, 3, 3, 'https://www.amazon.co.jp/gp/video/detail/0RIEA28Y9KHI4ECRSMBV24KSCW/ref=atv_dl_rdr', '2023-08-12 05:21:39', '2023-08-12 05:21:39'),
(144, 32, 17, 4.99, 3, 3, 'https://www.hulu.jp/watch/60474603', '2023-08-12 05:22:00', '2023-08-12 05:22:00'),
(145, 32, 15, 7.99, 5, 3, 'https://www.amazon.co.jp/gp/video/detail/0QKANOW33IZMMZXWA7UXRXNWOV/ref=atv_dl_rdr', '2023-08-12 05:22:32', '2023-08-12 05:22:32'),
(146, 32, 17, 7.99, 3, 2, 'https://www.hulu.jp/watch/60474603', '2023-08-12 05:23:04', '2023-08-12 05:23:04'),
(147, 33, 9, 12.99, 3, 2, 'https://www.netflix.com/vn/title/81059939', '2023-08-12 05:25:28', '2023-08-12 05:25:28'),
(148, 34, 9, 7.99, 3, 3, 'https://www.netflix.com/vn/title/81671440', '2023-08-12 05:27:48', '2023-08-12 05:27:48'),
(149, 34, 9, 12.99, 3, 2, 'https://www.netflix.com/vn/title/81671440', '2023-08-12 05:27:59', '2023-08-12 05:27:59'),
(150, 35, 9, 5.99, 3, 3, 'https://www.netflix.com/vn/title/80038359', '2023-08-12 05:30:55', '2023-08-12 05:30:55'),
(151, 35, 17, 5.99, 3, 3, 'https://www.hulu.jp/watch/100040730', '2023-08-12 05:31:15', '2023-08-12 05:31:15'),
(152, 35, 8, 5.49, 3, 3, 'https://www.amazon.co.jp/gp/video/detail/0ND545WT98PSW1M3VKH4NK1FFR/ref=atv_dl_rdr', '2023-08-12 05:32:33', '2023-08-12 05:32:33'),
(153, 35, 15, 7.99, 5, 3, 'https://www.amazon.co.jp/gp/video/detail/0ND545WT98PSW1M3VKH4NK1FFR/ref=atv_dl_rdr', '2023-08-12 05:32:58', '2023-08-12 05:32:58'),
(154, 35, 15, 13.99, 4, 3, 'https://www.amazon.co.jp/gp/video/detail/0ND545WT98PSW1M3VKH4NK1FFR/ref=atv_dl_rdr', '2023-08-12 05:34:30', '2023-08-12 05:34:30'),
(155, 36, 9, 20.49, 3, 1, 'https://www.netflix.com/vn/title/81443393', '2023-08-12 05:37:55', '2023-08-12 05:37:55'),
(156, 36, 9, 15.99, 3, 2, 'https://www.netflix.com/vn/title/81443393', '2023-08-12 05:38:05', '2023-08-12 05:38:05'),
(157, 36, 9, 10.49, 3, 3, 'https://www.netflix.com/vn/title/81443393', '2023-08-12 05:38:15', '2023-08-12 05:38:15'),
(158, 37, 8, 3.49, 3, 3, 'https://www.primevideo.com/detail/0LH1GMRIWABG6AFSW62O3BJJHH/ref=atv_dl_rdr', '2023-08-12 05:46:19', '2023-08-12 05:46:19'),
(159, 37, 11, 7.50, 5, 3, 'https://play.google.com/store/movies/details/3_Idiots?gl=IN&hl=en&id=HveVs92disg.P', '2023-08-12 05:46:39', '2023-08-12 05:46:39'),
(160, 37, 10, 7.99, 5, 3, 'https://tv.apple.com/in/movie/3-idiots/umc.cmc.7c2srvr0qpnqcxrdf23lhl9gi?at=1000l3V2&ct=justwatch_tv&playableId=tvs.sbd.9001%3A1530853319', '2023-08-12 05:46:59', '2023-08-12 05:46:59'),
(161, 37, 10, 15.49, 4, 3, 'https://tv.apple.com/in/movie/3-idiots/umc.cmc.7c2srvr0qpnqcxrdf23lhl9gi?at=1000l3V2&ct=justwatch_tv&playableId=tvs.sbd.9001%3A1530853319', '2023-08-12 05:47:14', '2023-08-12 05:47:14'),
(162, 37, 11, 11.49, 4, 3, 'https://play.google.com/store/movies/details/3_Idiots?gl=IN&hl=en&id=HveVs92disg.P', '2023-08-12 05:47:34', '2023-08-12 05:47:34'),
(163, 37, 8, 8.99, 3, 2, 'https://www.primevideo.com/detail/0LH1GMRIWABG6AFSW62O3BJJHH/ref=atv_dl_rdr', '2023-08-12 05:47:58', '2023-08-12 05:47:58'),
(164, 37, 11, 12.49, 5, 2, 'https://play.google.com/store/movies/details/3_Idiots?gl=IN&hl=en&id=HveVs92disg.P', '2023-08-12 05:48:14', '2023-08-12 05:48:14'),
(165, 37, 10, 12.49, 5, 2, 'https://tv.apple.com/in/movie/3-idiots/umc.cmc.7c2srvr0qpnqcxrdf23lhl9gi?playableId=tvs.sbd.9001%3A1530853319', '2023-08-12 05:48:29', '2023-08-12 05:48:29'),
(166, 37, 10, 19.00, 4, 2, 'https://tv.apple.com/in/movie/3-idiots/umc.cmc.7c2srvr0qpnqcxrdf23lhl9gi?at=1000l3V2&ct=justwatch_tv&playableId=tvs.sbd.9001%3A1530853319', '2023-08-12 05:48:48', '2023-08-12 05:48:48'),
(167, 38, 18, 15.49, 3, 1, 'https://www.hotstar.com/in/movies/neymar/1260145231', '2023-08-12 05:57:04', '2023-08-12 05:57:04'),
(168, 38, 18, 9.49, 3, 2, 'https://www.hotstar.com/in/movies/neymar/1260145231', '2023-08-12 05:57:20', '2023-08-12 05:57:20'),
(169, 38, 18, 4.49, 3, 3, 'https://www.hotstar.com/in/movies/neymar/1260145231', '2023-08-12 05:57:30', '2023-08-12 05:57:30'),
(170, 39, 20, 0.00, 1, 3, 'https://iview.abc.net.au/show/utopia/series/1/video/CO1211V001S00', '2023-08-12 06:17:10', '2023-08-12 06:17:10'),
(171, 39, 20, 3.99, 3, 3, 'https://iview.abc.net.au/show/utopia/series/1/video/CO1211V001S00', '2023-08-12 06:17:52', '2023-08-12 06:17:52'),
(172, 39, 19, 3.99, 3, 3, 'https://www.stan.com.au/watch/utopia-2014/season-1', '2023-08-12 06:18:16', '2023-08-12 06:18:16'),
(173, 39, 10, 11.99, 4, 3, 'https://tv.apple.com/au/show/utopia/umc.cmc.4xrwz3v2pzy6agaw0qpxnv6lq?at=1000l3V2&ct=justwatch_tv', '2023-08-12 06:18:34', '2023-08-12 06:18:34'),
(174, 39, 11, 10.49, 4, 3, 'https://play.google.com/store/tv/show?cdid=tvseason-IrzjKu3LDmjbhDYBxmhlDw&gl=AU&hl=en&id=ux7Go7rB1UA', '2023-08-12 06:18:52', '2023-08-12 06:18:52'),
(175, 39, 19, 13.99, 3, 2, 'https://www.stan.com.au/watch/utopia-2014/season-1', '2023-08-12 06:19:18', '2023-08-12 06:19:18'),
(176, 39, 10, 16.49, 4, 2, 'https://tv.apple.com/au/show/utopia/umc.cmc.4xrwz3v2pzy6agaw0qpxnv6lq?at=1000l3V2&ct=justwatch_tv', '2023-08-12 06:19:37', '2023-08-12 06:19:37'),
(177, 39, 11, 16.49, 4, 2, 'https://play.google.com/store/tv/show?cdid=tvseason-IrzjKu3LDmjbhDYBxmhlDw&gl=AU&hl=en&id=ux7Go7rB1UA', '2023-08-12 06:19:52', '2023-08-12 06:19:52'),
(178, 40, 21, 5.49, 3, 3, 'https://binge.com.au/shows/show-colin-from-accounts!18466/season-season-1!18467?irclickid=x1N20LzojxyPTCgXoVQgIXQVUkF1fgzFbwKCyI0&irgwc=1&extcamp=1206980-aff-imp-lnk-acq-gen-mti-bge&channel=affiliate&campaign=11099', '2023-08-12 06:29:29', '2023-08-12 06:29:29'),
(179, 40, 21, 9.49, 3, 2, 'https://binge.com.au/shows/show-colin-from-accounts!18466/season-season-1!18467?irclickid=x1N20LzojxyPTCgXoVQgIXQVUkF1fnwJbwKCyI0&irgwc=1&extcamp=1206980-aff-imp-lnk-acq-gen-mti-bge&channel=affiliate&campaign=11099', '2023-08-12 06:29:54', '2023-08-12 06:29:54'),
(180, 41, 8, 25.49, 3, 1, 'https://www.primevideo.com/detail/0Q0RO7NI77RSJNM4DTE587FXZ4/ref=atv_dl_rdr', '2023-08-12 06:32:21', '2023-08-12 06:32:21'),
(181, 41, 8, 17.50, 3, 2, 'https://www.primevideo.com/detail/0Q0RO7NI77RSJNM4DTE587FXZ4/ref=atv_dl_rdr', '2023-08-12 06:32:44', '2023-08-12 06:32:44'),
(182, 41, 8, 9.59, 3, 3, 'https://www.primevideo.com/detail/0Q0RO7NI77RSJNM4DTE587FXZ4/ref=atv_dl_rdr', '2023-08-12 06:32:57', '2023-08-12 06:32:57'),
(183, 42, 22, 0.00, 1, 3, 'https://7plus.com.au/chicago-fire?episode-id=CHIF-001', '2023-08-12 06:44:42', '2023-08-12 06:44:42'),
(184, 42, 8, 3.49, 3, 3, 'https://www.primevideo.com/detail/0IIFFWOHX0NREN5V6MT2GLY4SB/ref=atv_dl_rdr', '2023-08-12 06:45:25', '2023-08-12 06:45:25'),
(185, 42, 22, 5.50, 3, 3, 'https://7plus.com.au/chicago-fire?episode-id=CHIF-001', '2023-08-12 06:48:25', '2023-08-12 06:48:25'),
(186, 42, 21, 5.99, 3, 3, 'https://binge.com.au/shows/show-chicago-fire!4676/season-season-3!10085?irclickid=x1N20LzojxyPTCgXoVQgIXQVUkF1fGWNbwKCyI0&irgwc=1&extcamp=1206980-aff-imp-lnk-acq-gen-mti-bge&channel=affiliate&campaign=11099', '2023-08-12 06:48:41', '2023-08-12 06:48:41'),
(187, 42, 10, 12.49, 4, 3, 'https://tv.apple.com/au/show/chicago-fire/umc.cmc.5q5hept47ceu91k7tylzrbasa?at=1000l3V2&ct=justwatch_tv', '2023-08-12 06:49:01', '2023-08-12 06:49:01'),
(188, 42, 14, 11.90, 4, 3, 'https://www.microsoft.com/en-au/p/season-1/8d6kgwzlcg44', '2023-08-12 06:49:23', '2023-08-12 06:49:23'),
(189, 42, 8, 7.49, 3, 2, 'https://www.primevideo.com/detail/0IIFFWOHX0NREN5V6MT2GLY4SB/ref=atv_dl_rdr', '2023-08-12 06:49:47', '2023-08-12 06:49:47'),
(190, 42, 21, 7.49, 3, 2, 'https://binge.com.au/shows/show-chicago-fire!4676/season-season-3!10085?irclickid=x1N20LzojxyPTCgXoVQgIXQVUkF1fD0FbwKCyI0&irgwc=1&extcamp=1206980-aff-imp-lnk-acq-gen-mti-bge&channel=affiliate&campaign=11099', '2023-08-12 06:50:06', '2023-08-12 06:50:06'),
(191, 42, 10, 15.50, 4, 2, 'https://tv.apple.com/au/show/chicago-fire/umc.cmc.5q5hept47ceu91k7tylzrbasa?at=1000l3V2&ct=justwatch_tv', '2023-08-12 06:50:29', '2023-08-12 06:50:29'),
(192, 42, 14, 15.90, 4, 2, 'https://www.microsoft.com/en-au/p/season-1/8d6kgwzlcg44?activetab=pivot%3aoverviewtab', '2023-08-12 06:50:45', '2023-08-12 06:50:45'),
(193, 43, 22, 0.00, 2, 3, 'https://7plus.com.au/the-good-doctor?episode-id=GOOD01-001', '2023-08-12 06:52:56', '2023-08-12 06:52:56'),
(194, 43, 22, 3.90, 3, 3, 'https://7plus.com.au/the-good-doctor?episode-id=GOOD01-001', '2023-08-12 06:53:34', '2023-08-12 06:53:34'),
(195, 43, 19, 4.90, 3, 3, 'https://www.stan.com.au/watch/the-good-doctor/season-1', '2023-08-12 06:54:02', '2023-08-12 06:54:02'),
(196, 43, 8, 4.90, 3, 3, 'https://www.primevideo.com/detail/0FEI5ZGAZV0481UGAQMPFN9YY3/ref=atv_dl_rdr?tag=justau2tuk-22', '2023-08-12 06:54:14', '2023-08-12 06:54:14'),
(197, 43, 10, 15.90, 4, 3, 'https://tv.apple.com/au/show/the-good-doctor/umc.cmc.26j01gacgwcviisaauijqd0wh?at=1000l3V2&ct=justwatch_tv', '2023-08-12 06:54:33', '2023-08-12 06:54:33'),
(198, 43, 23, 5.79, 4, 3, 'https://www.telstratv.com/boxoffice/series/the-good-doctor/CAT1658?season=1', '2023-08-12 07:00:48', '2023-08-12 07:00:48'),
(199, 43, 11, 6.79, 4, 3, 'https://play.google.com/store/tv/show?cdid=tvseason-9c50xqOmzcOX7BC_DRGdfQ&gl=AU&hl=en&id=F5Z3dIgbE-DB0PYwW-PgLQ', '2023-08-12 07:01:47', '2023-08-12 07:01:47'),
(200, 43, 14, 5.50, 4, 3, 'https://www.microsoft.com/en-au/p/season-1/8d6kgwxj1jmc?activetab=pivot%3aoverviewtab', '2023-08-12 07:02:11', '2023-08-12 07:02:11'),
(201, 43, 19, 9.49, 3, 2, 'https://www.stan.com.au/watch/the-good-doctor/season-1', '2023-08-12 07:03:40', '2023-08-12 07:03:40'),
(202, 43, 8, 9.79, 3, 2, 'https://www.primevideo.com/detail/0FEI5ZGAZV0481UGAQMPFN9YY3/ref=atv_dl_rdr?tag=justau2tuk-22', '2023-08-12 07:04:00', '2023-08-12 07:04:00'),
(203, 43, 10, 21.49, 4, 2, 'https://tv.apple.com/au/show/the-good-doctor/umc.cmc.26j01gacgwcviisaauijqd0wh?at=1000l3V2&ct=justwatch_tv', '2023-08-12 07:04:16', '2023-08-12 07:04:16'),
(204, 43, 23, 19.50, 4, 2, 'https://www.telstratv.com/boxoffice/series/the-good-doctor/CAT1658?season=1', '2023-08-12 07:04:35', '2023-08-12 07:04:35'),
(205, 43, 11, 19.50, 4, 2, 'https://play.google.com/store/tv/show?cdid=tvseason-9c50xqOmzcOX7BC_DRGdfQ&gl=AU&hl=en&id=F5Z3dIgbE-DB0PYwW-PgLQ', '2023-08-12 07:06:55', '2023-08-12 07:06:55'),
(206, 43, 14, 19.50, 4, 2, 'https://www.microsoft.com/en-au/p/season-1/8d6kgwxj1jmc?activetab=pivot%3aoverviewtab', '2023-08-12 07:07:15', '2023-08-12 07:07:15'),
(207, 43, 19, 34.50, 3, 1, 'https://www.stan.com.au/watch/the-good-doctor/season-1', '2023-08-12 07:07:50', '2023-08-12 07:07:50'),
(208, 44, 18, 4.59, 3, 3, 'https://www.hotstar.com/th/tv/moving/1260143902/senior-year/1260143903', '2023-08-12 07:12:36', '2023-08-12 07:12:36'),
(209, 44, 18, 7.50, 3, 2, 'https://www.hotstar.com/th/tv/moving/1260143902/senior-year/1260143903', '2023-08-12 07:12:45', '2023-08-12 07:12:45'),
(210, 44, 18, 12.90, 3, 1, 'https://www.hotstar.com/th/tv/moving/1260143902/senior-year/1260143903', '2023-08-12 07:12:56', '2023-08-12 07:12:56'),
(211, 46, 9, 5.99, 3, 3, 'https://www.netflix.com/vn/title/80998941', '2023-08-12 07:31:23', '2023-08-12 07:31:23'),
(212, 46, 18, 5.99, 3, 3, 'https://www.hotstar.com/th/tv/dr-romantic/1260140097/episode-1/1260140098', '2023-08-12 07:31:46', '2023-08-12 07:31:46'),
(213, 46, 9, 7.99, 3, 2, 'https://www.netflix.com/vn/title/80998941', '2023-08-12 07:32:18', '2023-08-12 07:32:18'),
(214, 48, 8, 6.50, 3, 3, 'https://www.primevideo.com/detail/0PQIDCRPKKH2EELNOXDPIDDEW0/ref=atv_dl_rdr', '2023-08-12 08:11:09', '2023-08-12 08:11:09'),
(215, 48, 24, 5.59, 3, 3, 'https://lionsgateplay.com/en/movies/the-wolf-of-wall-street/297184808129', '2023-08-12 08:16:39', '2023-08-12 08:16:39'),
(216, 48, 11, 7.50, 5, 3, 'https://play.google.com/store/movies/details/The_Wolf_of_Wall_Street?gl=IN&hl=en&id=Yyc_58AvI-k.P', '2023-08-12 08:17:11', '2023-08-12 08:17:11'),
(217, 48, 11, 15.00, 4, 3, 'https://play.google.com/store/movies/details/The_Wolf_of_Wall_Street?gl=IN&hl=en&id=Yyc_58AvI-k.P', '2023-08-12 08:17:42', '2023-08-12 08:17:42'),
(218, 48, 8, 6.90, 3, 2, 'https://www.primevideo.com/detail/0RLOS4UTKK0OYDN3YRZA6TJ91B/ref=atv_dl_rdr', '2023-08-12 08:18:14', '2023-08-12 08:18:14'),
(219, 48, 24, 6.90, 3, 2, 'https://lionsgateplay.com/en/movies/the-wolf-of-wall-street/297184808129', '2023-08-12 08:18:35', '2023-08-12 08:18:35'),
(220, 48, 11, 10.00, 5, 2, 'https://play.google.com/store/movies/details/The_Wolf_of_Wall_Street?gl=IN&hl=en&id=Yyc_58AvI-k.P', '2023-08-12 08:18:48', '2023-08-12 08:18:48'),
(221, 48, 11, 29.00, 4, 2, 'https://play.google.com/store/movies/details/The_Wolf_of_Wall_Street?gl=IN&hl=en&id=Yyc_58AvI-k.P', '2023-08-12 08:19:18', '2023-08-12 08:19:18'),
(222, 47, 9, 6.90, 3, 3, 'https://www.netflix.com/vn/title/81649877', '2023-08-12 08:19:56', '2023-08-12 08:19:56'),
(223, 47, 9, 8.90, 3, 2, 'https://www.netflix.com/vn/title/81649877', '2023-08-12 08:20:04', '2023-08-12 08:20:04'),
(224, 47, 9, 12.90, 3, 1, 'https://www.netflix.com/vn/title/81649877', '2023-08-12 08:20:19', '2023-08-12 08:20:19'),
(226, 50, 8, 26.90, 3, 1, 'https://www.primevideo.com/detail/0FIVK55HUFIIADBSNC585CZFDP/ref=atv_dl_rdr', '2023-08-12 08:27:24', '2023-08-12 08:27:24'),
(227, 50, 15, 99.00, 5, 1, 'https://www.primevideo.com/detail/0FIVK55HUFIIADBSNC585CZFDP/ref=atv_dl_rdr?tag=justwatch10-21', '2023-08-12 08:27:49', '2023-08-12 08:27:49'),
(228, 50, 8, 32.00, 3, 2, 'https://www.primevideo.com/detail/0FIVK55HUFIIADBSNC585CZFDP/ref=atv_dl_rdr', '2023-08-12 08:28:13', '2023-08-12 08:28:13'),
(229, 50, 15, 99.00, 5, 2, 'https://www.primevideo.com/detail/0FIVK55HUFIIADBSNC585CZFDP/ref=atv_dl_rdr?tag=justwatch10-21', '2023-08-12 08:28:31', '2023-08-12 08:28:31'),
(230, 50, 10, 150.00, 5, 2, 'https://tv.apple.com/in/movie/pathaan/umc.cmc.4m5r5olcjrfbqhe4oxsgdqhes?at=1000l3V2&ct=justwatch_tv&playableId=tvs.sbd.9001%3A1670881249', '2023-08-12 08:28:47', '2023-08-12 08:28:47'),
(231, 50, 11, 150.00, 5, 2, 'https://play.google.com/store/movies/details/Pathaan?gl=IN&hl=en&id=ka199ywdXks.P', '2023-08-12 08:29:01', '2023-08-12 08:29:01'),
(232, 50, 11, 460.00, 4, 2, 'https://play.google.com/store/movies/details/Pathaan?gl=IN&hl=en&id=ka199ywdXks.P', '2023-08-12 08:29:23', '2023-08-12 08:29:23'),
(233, 50, 10, 490.00, 4, 2, 'https://tv.apple.com/in/movie/pathaan/umc.cmc.4m5r5olcjrfbqhe4oxsgdqhes?at=1000l3V2&ct=justwatch_tv&playableId=tvs.sbd.9001%3A1670881249', '2023-08-12 08:30:36', '2023-08-12 08:30:36'),
(234, 50, 8, 26.99, 3, 3, 'https://www.primevideo.com/detail/0FIVK55HUFIIADBSNC585CZFDP/ref=atv_dl_rdr', '2023-08-12 08:31:52', '2023-08-12 08:31:52'),
(235, 50, 15, 99.00, 5, 3, 'https://www.primevideo.com/detail/0FIVK55HUFIIADBSNC585CZFDP/ref=atv_dl_rdr?tag=justwatch10-21', '2023-08-12 08:32:22', '2023-08-12 08:32:22'),
(236, 50, 11, 100.00, 5, 3, 'https://play.google.com/store/movies/details/Pathaan?gl=IN&hl=en&id=ka199ywdXks.P', '2023-08-12 08:32:41', '2023-08-12 08:32:41'),
(237, 50, 10, 150.00, 5, 3, 'https://tv.apple.com/in/movie/pathaan/umc.cmc.4m5r5olcjrfbqhe4oxsgdqhes?playableId=tvs.sbd.9001%3A1670881249', '2023-08-12 08:32:53', '2023-08-12 08:32:53'),
(238, 50, 10, 290.00, 4, 3, 'https://tv.apple.com/in/movie/pathaan/umc.cmc.4m5r5olcjrfbqhe4oxsgdqhes?at=1000l3V2&ct=justwatch_tv&playableId=tvs.sbd.9001%3A1670881249', '2023-08-12 08:33:15', '2023-08-12 08:33:15'),
(239, 50, 11, 310.00, 4, 3, 'https://play.google.com/store/movies/details/Pathaan?gl=IN&hl=en&id=ka199ywdXks.P', '2023-08-12 08:33:31', '2023-08-12 08:33:31');

-- --------------------------------------------------------

--
-- Table structure for table `movie_resolution`
--

CREATE TABLE `movie_resolution` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `movie_resolution`
--

INSERT INTO `movie_resolution` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '4K', NULL, NULL),
(2, 'HD', NULL, NULL),
(3, 'SD', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `movie_tracking_out`
--

CREATE TABLE `movie_tracking_out` (
  `id` bigint UNSIGNED NOT NULL,
  `movie_id` bigint UNSIGNED NOT NULL,
  `streaming_service_provider_id` bigint UNSIGNED DEFAULT NULL,
  `count` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `movie_tracking_out`
--

INSERT INTO `movie_tracking_out` (`id`, `movie_id`, `streaming_service_provider_id`, `count`, `created_at`, `updated_at`) VALUES
(1, 20, 8, 3, '2023-08-11 22:59:01', '2023-08-11 23:52:08');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` bigint UNSIGNED NOT NULL,
  `rating` tinyint NOT NULL DEFAULT '0',
  `movie_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reaction`
--

CREATE TABLE `reaction` (
  `id` bigint UNSIGNED NOT NULL,
  `is_tracked` tinyint NOT NULL DEFAULT '0',
  `is_watched` tinyint(1) NOT NULL DEFAULT '0',
  `is_thumbs_up` tinyint NOT NULL DEFAULT '0',
  `is_thumbs_down` tinyint NOT NULL DEFAULT '0',
  `movie_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reaction`
--

INSERT INTO `reaction` (`id`, `is_tracked`, `is_watched`, `is_thumbs_up`, `is_thumbs_down`, `movie_id`, `user_id`, `created_at`, `updated_at`) VALUES
(8, 0, 0, 1, 0, 50, 1, '2023-08-12 15:21:14', '2023-08-12 16:00:22'),
(9, 1, 0, 0, 0, 20, 1, '2023-08-12 15:33:30', '2023-08-12 16:06:26'),
(10, 0, 0, 0, 0, 4, 1, '2023-08-12 15:33:43', '2023-08-12 15:55:46'),
(11, 0, 0, 0, 0, 1, 1, '2023-08-12 15:33:51', '2023-08-12 15:58:37'),
(12, 0, 0, 0, 0, 5, 1, '2023-08-12 15:34:00', '2023-08-12 15:59:36');

-- --------------------------------------------------------

--
-- Table structure for table `service_plan`
--

CREATE TABLE `service_plan` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `features` text COLLATE utf8mb4_unicode_ci,
  `price` int NOT NULL COMMENT 'unit: usd, cent',
  `duration` int NOT NULL COMMENT 'unit: month',
  `max_profile` int NOT NULL COMMENT 'max profile per account',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `service_provider_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `streaming_service_provider`
--

CREATE TABLE `streaming_service_provider` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `background` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `streaming_service_provider`
--

INSERT INTO `streaming_service_provider` (`id`, `name`, `type`, `description`, `url`, `logo`, `background`, `main_color`, `created_at`, `updated_at`) VALUES
(8, 'Primevideo', NULL, '<p>Prime Video is available as part of the&nbsp;<a href=\"https://www.amazon.com/amazonprime\" target=\"_blank\">Amazon Prime</a>&nbsp;membership, which costs $14.99 per month or $139 annually for an individual.</p>', 'https://www.primevideo.com/offers/nonprimehomepage/ref=dv_web_force_root', 'uploads/images/providers/primevideo-logo-1691804338.jpg', 'uploads/images/providers/primevideo-background-1691804339.jpg', NULL, '2023-08-11 18:38:59', '2023-08-11 18:38:59'),
(9, 'Netflix', NULL, '<p>Netflix is a subscription-based&nbsp;<a href=\"https://help.netflix.com/en/node/85\">streaming service</a>&nbsp;that allows our members to watch TV shows and movies on an internet-connected device.&nbsp;</p>', 'https://www.netflix.com/vn/', 'uploads/images/providers/netflix-logo-1691804484.jpg', 'uploads/images/providers/netflix-background-1691804484.jpg', NULL, '2023-08-11 18:41:24', '2023-08-11 18:41:24'),
(10, 'AppleTV', NULL, '<p>Apple TV is a set-top box&nbsp;that allows a television to become a display screen for Internet content. &nbsp;</p>\r\n\r\n<p>Once connected, Apple TV allows end users to display digital data from their own iOS devices, as well as from a number of partner sources.</p>', 'https://www.apple.com/vn/apple-tv-plus/', 'uploads/images/providers/appletv-logo-1691804861.jpg', 'uploads/images/providers/appletv-background-1691804861.jpg', NULL, '2023-08-11 18:47:42', '2023-08-11 18:47:42'),
(11, 'Google Play', NULL, '<p><strong>Google Play Movies &amp; TV</strong>&nbsp;is an online&nbsp;<a href=\"https://en.wikipedia.org/wiki/Video_on_demand\" title=\"Video on demand\">video on demand</a>&nbsp;service operated by&nbsp;<a href=\"https://en.wikipedia.org/wiki/Google\" title=\"Google\">Google</a>. The service offers movies and television shows for purchase or rental, depending on availability.</p>', 'https://play.google.com/store/movies?hl=vi-VN', 'uploads/images/providers/google-play-logo-1691805238.jpg', 'uploads/images/providers/google-play-background-1691805238.jpg', NULL, '2023-08-11 18:53:58', '2023-08-11 18:53:58'),
(12, 'abc.com', NULL, '<p>The official&nbsp;<em>ABC</em>&nbsp;homepage offers a deeper look at the hit TV series with exclusive content and show&nbsp;<em>information</em>. Watch full episodes of&nbsp;<em>ABC</em>&nbsp;content online.</p>', 'https://abc.com/', 'uploads/images/providers/abc-com-logo-1691805775.png', 'uploads/images/providers/abc-com-background-1691805775.png', NULL, '2023-08-11 19:02:56', '2023-08-11 19:02:56'),
(13, 'Spectrum', NULL, '<p>On Demand service available to residential customers only who subscribe to Spectrum TV&trade; in Digital, TV Select or above. On Demand programming varies by level of service; pricing, ratings and scheduling are subject to change. Trademarks belong to their respective owners.</p>', 'https://ondemand.spectrum.net/', 'uploads/images/providers/spectrum-logo-1691806079.png', 'uploads/images/providers/spectrum-background-1691806079.jpg', NULL, '2023-08-11 19:07:59', '2023-08-11 19:07:59'),
(14, 'Microsoft', NULL, '<p>With Microsoft Movies &amp; TV, you can rent or buy the latest hit movies and commercial-free TV shows and watch them using the Movies &amp; TV app, on your Xbox console and your Windows device. With our huge catalogue of entertainment content, you&rsquo;ll always find something great to watch.</p>', 'https://www.microsoft.com/en-us/store/movies-and-tv', 'uploads/images/providers/microsoft-logo-1691806425.jpg', 'uploads/images/providers/microsoft-background-1691806425.jpg', NULL, '2023-08-11 19:13:45', '2023-08-11 19:13:45'),
(15, 'Amazon', NULL, '<p><strong>Amazon Prime Video</strong>, or simply&nbsp;<strong>Prime Video</strong>, is an American&nbsp;<a href=\"https://en.wikipedia.org/wiki/Video_on_demand#Subscription_models\" title=\"Video on demand\">subscription video on-demand</a>&nbsp;<a href=\"https://en.wikipedia.org/wiki/Over-the-top_media_service\" title=\"Over-the-top media service\">over-the-top</a>&nbsp;<a href=\"https://en.wikipedia.org/wiki/Streaming_media\" title=\"Streaming media\">streaming</a>&nbsp;and&nbsp;<a href=\"https://en.wikipedia.org/wiki/Renting\" title=\"Renting\">rental</a>&nbsp;service of&nbsp;<a href=\"https://en.wikipedia.org/wiki/Amazon_(company)\" title=\"Amazon (company)\">Amazon</a>&nbsp;offered as a standalone service or as part of Amazon&#39;s&nbsp;<a href=\"https://en.wikipedia.org/wiki/Amazon_Prime\" title=\"Amazon Prime\">Prime subscription</a>.</p>', 'https://www.amazon.com/movies-tv-dvd-bluray/b?ie=UTF8&node=2625373011', 'uploads/images/providers/amazon-logo-1691806665.jpg', 'uploads/images/providers/amazon-background-1691806665.jpg', NULL, '2023-08-11 19:17:45', '2023-08-11 19:17:45'),
(16, 'FXnow', NULL, '<p>The&nbsp;<strong>FXNOW </strong>is home to critically-acclaimed shows from FX and FXX. Allows you to watch full episodes of your favourite shows like Snowfall, Atlanta, Better Things, Mayans MC, and many more!</p>', 'https://www.fxnowcanada.ca/', 'uploads/images/providers/fxnow-logo-1691840805.png', 'uploads/images/providers/fxnow-background-1691840805.png', NULL, '2023-08-12 04:46:45', '2023-08-12 04:46:45'),
(17, 'Hulu', NULL, '<p>Hulu (known outside Japan as Hulu Japan) is&nbsp;<em>a Japanese subscription streaming service service owned and operated by</em>&nbsp;Nippon TV.</p>', 'https://www.hulu.jp/', 'uploads/images/providers/hulu-logo-1691842469.png', 'uploads/images/providers/hulu-background-1691842469.jpg', NULL, '2023-08-12 05:14:29', '2023-08-12 05:14:29'),
(18, 'Hotstar', NULL, '<p>Hotstar is&nbsp;<strong>an online video streaming platform</strong>&nbsp;owned by Novi Digital Entertainment Private Limited, a wholly owned subsidiary of Star India Private Limited. Hotstar currently offers over 100,000 hours of TV content and movies across 9 languages, and every major sport covered live.</p>', 'https://www.hotstar.com/in', 'uploads/images/providers/hotstar-logo-1691844990.jpg', 'uploads/images/providers/hotstar-background-1691844990.jpg', NULL, '2023-08-12 05:56:31', '2023-08-12 05:56:31'),
(19, 'Stan', NULL, '<h3>Watch awesome movies from Hollywood blockbusters to cult classics, whatever movie you&rsquo;re in the mood for you&rsquo;ll find it on Stan.</h3>', 'https://www.stan.com.au/', 'uploads/images/providers/stan-logo-1691845328.png', 'uploads/images/providers/stan-background-1691845328.png', NULL, '2023-08-12 06:02:08', '2023-08-12 06:02:08'),
(20, 'iview', NULL, '<p>ABC iview is&nbsp;<strong>a video on demand and catch-up TV service run by the Australian Broadcasting Corporation</strong>. Currently iview video content can only be viewed by users in Australia.</p>', 'https://iview.abc.net.au/', 'uploads/images/providers/iview-logo-1691846201.jpg', 'uploads/images/providers/iview-background-1691846201.jpg', NULL, '2023-08-12 06:16:41', '2023-08-12 06:16:41'),
(21, 'Binge', NULL, '<h2>Entertainment for every mood</h2>\r\n\r\n<p>And with new stuff added daily, there is always something to Binge on BINGE.</p>', 'https://binge.com.au/', 'uploads/images/providers/binge-logo-1691846927.png', 'uploads/images/providers/binge-background-1691846927.jpg', NULL, '2023-08-12 06:28:47', '2023-08-12 06:28:47'),
(22, '7plus', NULL, '<p>Channel 7 or 7Plus is&nbsp;<strong>part of &ldquo;Seven Network&rdquo; and is one of the best free streaming services in the world</strong>. It also offers live TV streaming as well. Though free, you can only watch Channel 7 in Canada when you have access to the platform from Australia.</p>', 'https://7plus.com.au/', 'uploads/images/providers/7plus-logo-1691847848.png', 'uploads/images/providers/7plus-background-1691847848.jpg', NULL, '2023-08-12 06:44:08', '2023-08-12 06:44:08'),
(23, 'Telstra', NULL, '<p>Telstra TV lets you watch and control all of your entertainment - including the big streaming subscription apps, free-to-air and catch up TV, sport, music and movies - without changing HDMI inputs or remotes on your TV.</p>', 'https://www.telstratv.com/boxoffice/', 'uploads/images/providers/telstra-logo-1691848821.png', 'uploads/images/providers/telstra-background-1691848821.png', NULL, '2023-08-12 07:00:21', '2023-08-12 07:00:21'),
(24, 'Lionsgate Play', NULL, '<p>Lionsgate Play,&nbsp;<strong>a premium streaming platform</strong>, is home to premium Indian Originals, blockbuster Hollywood movies and binge worthy TV shows. Stream and download best award-winning movies, tv-series and original web series at your fingertips!</p>', 'https://www.lionsgateplay.com/', 'uploads/images/providers/lionsgate-play-logo-1691853366.png', 'uploads/images/providers/lionsgate-play-background-1691853366.jpg', NULL, '2023-08-12 08:16:06', '2023-08-12 08:16:06');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `streaming_service_id` bigint UNSIGNED DEFAULT NULL,
  `custom_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int DEFAULT NULL,
  `type_price_id` bigint UNSIGNED DEFAULT NULL,
  `subscription_url` text COLLATE utf8mb4_unicode_ci,
  `subscription_date` timestamp NULL DEFAULT NULL,
  `expiration_date` timestamp NULL DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_remind` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`id`, `user_id`, `streaming_service_id`, `custom_name`, `price`, `type_price_id`, `subscription_url`, `subscription_date`, `expiration_date`, `status`, `note`, `is_remind`, `created_at`, `updated_at`) VALUES
(3, 1, 8, NULL, 0, 3, NULL, NULL, '2023-08-18 17:00:00', 1, NULL, 1, '2023-08-12 19:10:09', '2023-08-12 19:10:09'),
(4, 1, NULL, 'Custom name (option)', 1111, 5, 'URL (option)', '2023-08-26 17:00:00', '2023-08-30 17:00:00', 1, 'Note (option)', 1, '2023-08-12 19:11:51', '2023-08-12 19:11:51'),
(5, 1, 9, 'Tài khoản phụ', 1111, 4, 'URL (option)', '2023-08-02 17:00:00', '2023-08-26 17:00:00', 1, 'Note (option)', 1, '2023-08-12 19:15:48', '2023-08-12 19:15:48'),
(6, 1, 22, 'Tên nè', 0, 3, NULL, NULL, '2023-08-16 17:00:00', 1, 'Note nè', 1, '2023-08-12 19:54:59', '2023-08-12 19:54:59');

-- --------------------------------------------------------

--
-- Table structure for table `type_price`
--

CREATE TABLE `type_price` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `type_price`
--

INSERT INTO `type_price` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Free', 'Free', '2023-08-10 12:49:31', '2023-08-09 17:00:00'),
(2, 'Free With Ads', 'Free With Ads', '2023-08-10 12:49:31', '2023-08-09 17:00:00'),
(3, 'Stream', 'Stream', '2023-08-10 12:49:31', '2023-08-09 17:00:00'),
(4, 'Buy', 'Buy one time', '2023-08-10 12:49:31', '2023-08-09 17:00:00'),
(5, 'Rent', 'Paid per stream', '2023-08-10 12:49:31', '2023-08-09 17:00:00');

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
(1, 'Lê Gà Mờ', 'admin@admin.com', NULL, '$2y$10$PtdaRmgCQdI4zeSbMKug3uLRCWHuINhipzB6KeMzGRdu9LgwYZPtG', NULL, '2023-08-11 09:41:25', '2023-08-12 20:22:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `genre_slug_unique` (`slug`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `movie_slug_unique` (`slug`),
  ADD KEY `movie_user_id_foreign` (`user_id`);

--
-- Indexes for table `movie_genre`
--
ALTER TABLE `movie_genre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_genre_movie_id_foreign` (`movie_id`),
  ADD KEY `movie_genre_genre_id_foreign` (`genre_id`);

--
-- Indexes for table `movie_provider`
--
ALTER TABLE `movie_provider`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_provider_movie_id_foreign` (`movie_id`),
  ADD KEY `movie_provider_provider_id_foreign` (`streaming_service_provider_id`),
  ADD KEY `movie_provider_type_price_id_foreign` (`type_price_id`),
  ADD KEY `movie_provider_movie_resolution_id_foreign` (`movie_resolution_id`);

--
-- Indexes for table `movie_resolution`
--
ALTER TABLE `movie_resolution`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movie_tracking_out`
--
ALTER TABLE `movie_tracking_out`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_tracking_out_movie_id_foreign` (`movie_id`),
  ADD KEY `movie_tracking_out_streaming_service_provider_id_foreign` (`streaming_service_provider_id`);

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
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rating_movie_id_foreign` (`movie_id`),
  ADD KEY `rating_user_id_foreign` (`user_id`);

--
-- Indexes for table `reaction`
--
ALTER TABLE `reaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `watchlist_movie_id_foreign` (`movie_id`),
  ADD KEY `watchlist_user_id_foreign` (`user_id`);

--
-- Indexes for table `service_plan`
--
ALTER TABLE `service_plan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_plan_service_provider_id_foreign` (`service_provider_id`);

--
-- Indexes for table `streaming_service_provider`
--
ALTER TABLE `streaming_service_provider`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `streaming_service_provider_name_unique` (`name`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_streaming_service_user_id_foreign` (`user_id`),
  ADD KEY `user_streaming_service_streaming_service_id_foreign` (`streaming_service_id`),
  ADD KEY `user_streaming_service_type_price_id_foreign` (`type_price_id`);

--
-- Indexes for table `type_price`
--
ALTER TABLE `type_price`
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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `movie_genre`
--
ALTER TABLE `movie_genre`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `movie_provider`
--
ALTER TABLE `movie_provider`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `movie_resolution`
--
ALTER TABLE `movie_resolution`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `movie_tracking_out`
--
ALTER TABLE `movie_tracking_out`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reaction`
--
ALTER TABLE `reaction`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `service_plan`
--
ALTER TABLE `service_plan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `streaming_service_provider`
--
ALTER TABLE `streaming_service_provider`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `type_price`
--
ALTER TABLE `type_price`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `movie`
--
ALTER TABLE `movie`
  ADD CONSTRAINT `movie_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `movie_genre`
--
ALTER TABLE `movie_genre`
  ADD CONSTRAINT `movie_genre_genre_id_foreign` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `movie_genre_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `movie_provider`
--
ALTER TABLE `movie_provider`
  ADD CONSTRAINT `movie_provider_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `movie_provider_movie_resolution_id_foreign` FOREIGN KEY (`movie_resolution_id`) REFERENCES `movie_resolution` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `movie_provider_provider_id_foreign` FOREIGN KEY (`streaming_service_provider_id`) REFERENCES `streaming_service_provider` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `movie_provider_type_price_id_foreign` FOREIGN KEY (`type_price_id`) REFERENCES `type_price` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `movie_tracking_out`
--
ALTER TABLE `movie_tracking_out`
  ADD CONSTRAINT `movie_tracking_out_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `movie_tracking_out_streaming_service_provider_id_foreign` FOREIGN KEY (`streaming_service_provider_id`) REFERENCES `streaming_service_provider` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rating_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reaction`
--
ALTER TABLE `reaction`
  ADD CONSTRAINT `watchlist_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `watchlist_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `service_plan`
--
ALTER TABLE `service_plan`
  ADD CONSTRAINT `service_plan_service_provider_id_foreign` FOREIGN KEY (`service_provider_id`) REFERENCES `streaming_service_provider` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subscription`
--
ALTER TABLE `subscription`
  ADD CONSTRAINT `user_streaming_service_streaming_service_id_foreign` FOREIGN KEY (`streaming_service_id`) REFERENCES `streaming_service_provider` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_streaming_service_type_price_id_foreign` FOREIGN KEY (`type_price_id`) REFERENCES `type_price` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_streaming_service_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

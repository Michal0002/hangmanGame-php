<?php
$create[] = "CREATE TABLE `users` (
    `id` int(11) NOT NULL,
    `username` varchar(32) NOT NULL,
    `password` varchar(255) NOT NULL,
    `email` varchar(64) NOT NULL,
    `coins` int(11) NOT NULL,
    `role` enum('admin','user','guest') DEFAULT 'user'
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;";

$create[] = "CREATE TABLE `difficulty` (
    `id` int(11) NOT NULL,
    `name` varchar(64) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;";

$create[] = "CREATE TABLE `words` (
    `id` int(11) NOT NULL,
    `word` varchar(50) NOT NULL,
    `difficulty_id` int(11) DEFAULT NULL,
    `status` enum('accepted','waiting','banned') DEFAULT 'waiting'
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;";
$create[] = "ALTER TABLE `users` ADD PRIMARY KEY (`id`);";
$create[] = "ALTER TABLE `users` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;";
$create[] = "ALTER TABLE `difficulty` ADD PRIMARY KEY (`id`);";
$create[] = "ALTER TABLE `difficulty` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;";
$create[] = "ALTER TABLE `users` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;";
$create[] = "ALTER TABLE `difficulty` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;";
$create[] = "ALTER TABLE `words` ADD CONSTRAINT `words_ibfk_1` FOREIGN KEY (`difficulty_id`) REFERENCES `difficulty1` (`id`);";
$create[] = "ALTER TABLE `words` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;";
$create[] = "ALTER TABLE `words` ADD PRIMARY KEY (`id`), ADD KEY `difficulty_id` (`difficulty_id`);";
$create[] = "ALTER TABLE `words` ADD CONSTRAINT `words_ibfk_1` FOREIGN KEY (`difficulty_id`) REFERENCES `difficulty` (`id`);";
$create[] = "COMMIT;";

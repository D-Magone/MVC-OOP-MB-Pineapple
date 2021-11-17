Database/table setup:

CREATE DATABASE mb-pineapple;

CREATE TABLE `user` ( `id` int(11) NOT NULL AUTO_INCREMENT, `email` varchar(200) NOT NULL, `create_time` date NOT NULL DEFAULT current_timestamp(), PRIMARY KEY (`id`) ) ENGINE=InnoDB AUTO_INCREMENT=440 DEFAULT CHARSET=utf8mb4;

Page, where data is displayed: subscribers.php
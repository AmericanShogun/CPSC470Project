DROP TABLE IF EXISTS `test`;

LOCK TABLES `test` WRITE;

CREATE TABLE `test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `employer` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
);



INSERT INTO `test` VALUES
(1, 'Karl', 'Redacted', 'Marx', 'Communism', 'Lenin Street', 'employer');

UNLOCK TABLES;

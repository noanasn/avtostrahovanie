CREATE DATABASE  IF NOT EXISTS `avtostrahovanie`;
USE `avtostrahovanie`;
-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: localhost    Database: avtostrah
-- ------------------------------------------------------
-- Server version	8.0.32

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `avto`
--

DROP TABLE IF EXISTS `avto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `avto` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Pricep` tinyint(1) DEFAULT NULL,
  `VIN` char(17) DEFAULT NULL,
  `Gos_Znak` char(9) DEFAULT NULL,
  `Power` int DEFAULT NULL,
  `Doc_type` char(3) DEFAULT NULL,
  `Doc_series` char(4) DEFAULT NULL,
  `Doc_number` int DEFAULT NULL,
  `idMarka` int DEFAULT NULL,
  `idModel` int DEFAULT NULL,
  `idSobstvennic` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idMarka` (`idMarka`),
  KEY `idModel` (`idModel`),
  KEY `idSobstvennic` (`idSobstvennic`),
  CONSTRAINT `avto_ibfk_1` FOREIGN KEY (`idMarka`) REFERENCES `marka` (`id`),
  CONSTRAINT `avto_ibfk_2` FOREIGN KEY (`idModel`) REFERENCES `model` (`id`),
  CONSTRAINT `avto_ibfk_3` FOREIGN KEY (`idSobstvennic`) REFERENCES `sobstvennic` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4  ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avto`
--

LOCK TABLES `avto` WRITE;
/*!40000 ALTER TABLE `avto` DISABLE KEYS */;
INSERT INTO `avto` VALUES (1,0,'XT2WL312967183804','У093НН64',204,'СТС','1304',101334,1,1,2),(2,1,'GF4UD605954926372','У975АС79',340,'ПТС','18КО',974756,2,2,3),(3,0,'FA1LK830382543806','К142МК77',149,'ПТС','86НН',857625,3,3,1),(4,0,'XU7RT359487595245','Т294ЕМ84',192,'ПТС','82ВС',449463,4,4,5),(5,1,'GF6JX200610447044','Х186СР08',143,'ПТС','94ТН',797764,5,5,4),(6,0,'WP3HN560787075798','Р742ВТ43',286,'СТС','7569',866543,1,6,2),(7,0,'WE8SG403296540182','К182УН51',635,'ПТС','11ХМ',696893,6,7,6),(8,0,'AH2YW563845304102','К650ХЕ81',279,'ПТС','18ВУ',472128,7,8,7),(9,1,'XK2GV023944577235','Е537УХ98',426,'ПТС','73ТТ',401455,8,9,8),(10,0,'RN1FR607129804789','В313МК27',170,'СТС','1762',475509,9,10,9),(11,0,'ZR6HA771754127528','А424СК11',318,'ПТС','92ТА',961715,10,11,10),(12,1,'XU7XU610192500656','А306ОН47',225,'ПТС','32СВ',981073,11,12,11),(13,0,'XG3LX298948276808','А790КУ98',70,'ПТС','51НН',432381,12,13,12),(14,0,'JS3EU887140164879','Х442ХО08',500,'ПТС','73СО',252393,13,14,13),(15,0,'SA2HE939779663256','О629РО17',600,'СТС','5168',625821,14,15,14),(16,0,'SU2BV985209135769','К387НУ51',154,'ПТС','91КТ',122332,15,16,15),(17,0,'XN0ZE920585303465','Е956НУ93',300,'ПТС','31КН',255631,16,17,16),(18,1,'XY3FS774879178673','Н397ХВ94',140,'ПТС','79ОМ',738507,17,18,17),(19,1,'BW4BS914600713859','Т808ХО19',250,'СТС','4434',913902,18,19,18),(20,0,'ZN7JP871492536634','А017МТ49',150,'ПТС','44ОА',322614,19,20,19),(21,0,'DW1FG253794009216','К718ВХ28',150,'ПТС','63ОУ',602396,20,21,20),(22,0,'YK5AZ119774281865','М084АС22',250,'ПТС','47НМ',863638,21,22,21),(23,1,'ZN6BY717091196292','А828УР93',150,'ПТС','25ТВ',398299,22,23,22),(24,0,'BD6PY747500682415','Н200ЕС11',450,'ПТС','21НВ',888388,23,24,23),(25,0,'LN6AH065388180949','Т222ОХ04',300,'ПТС','43ЕС',482671,24,25,24),(26,1,'JV6NL978505264075','Е111АО15',300,'ПТС','79КЕ',900515,25,26,25),(27,0,'BX7AY705498439392','С409СТ28',110,'ПТС','89ЕТ',723112,26,27,26),(28,0,'ZV1VT652293431721','У899ТЕ43',800,'ПТС','88КО',578761,27,28,27),(29,0,'ET7AA937952373989','Х194ТН49',309,'ПТС','39УК',920972,28,29,28),(30,0,'VB2UD105383924194','М130ОК14',400,'ПТС','87УА',895289,29,30,29),(31,1,'VB9US310263336639','Н898КВ55',125,'ПТС','65НК',963136,30,31,30),(32,0,'XJ7AH269666183452','У952КН62',430,'ПТС','48ОС',225881,31,32,31),(33,0,'AW5KU488560449388','Н233КО81',640,'СТС','7017',659992,32,33,32),(34,0,'FH6EJ131298249878','К975ЕР18',720,'ПТС','20СО',206495,33,34,33),(35,0,'ZY0NS050541907706','Р680ВК74',350,'ПТС','77КМ',884326,34,35,34),(36,0,'UD1NG929332510973','М306ОЕ73',240,'ПТС','46МС',666909,35,36,35),(37,0,'RM7MN630191650315','В598АК93',240,'ПТС','69ВВ',651843,36,37,36),(38,1,'HX8AF011329440841','Н133АР01',150,'СТС','2783',225465,37,38,37),(39,0,'ZB5KT515539006575','У303НВ81',150,'ПТС','37УА',306835,38,39,38),(40,1,'ZL5YG150712580345','У813СМ42',380,'ПТС','98ВЕ',972684,39,40,39),(41,0,'MN6TY137021651352','С244МВ21',150,'ПТС','84КТ',665687,40,41,40),(42,0,'LV6FJ380989307122','Е020ХВ21',600,'ПТС','86НЕ',132911,41,42,41),(43,0,'MF8RT594813959138','К754РТ36',180,'ПТС','18МС',432245,42,43,42),(44,0,'XB2ZF206647904455','Х143ММ13',200,'ПТС','51КС',433070,43,44,43),(45,0,'EF7DL012571686635','Т877ЕМ88',140,'ПТС','47КТ',840412,44,45,44),(46,1,'SE3LH513140653129','Е999ОМ03',416,'ПТС','69КУ',642792,45,46,45),(47,0,'VX9BJ755890657866','У700ОВ27',250,'СТС','3891',989994,46,47,46),(48,0,'DH5HF993061063772','А049РВ51',200,'ПТС','63РУ',351313,47,48,47),(49,0,'ZD7YE048953480012','С353АС61',170,'СТС','5469',432972,48,49,48),(50,1,'WT1MZ667673772972','Р192РР74',120,'СТС','6886',247073,49,50,49);
/*!40000 ALTER TABLE `avto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `drivers`
--

DROP TABLE IF EXISTS `drivers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `drivers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Surname` char(30) DEFAULT NULL,
  `Name` char(30) DEFAULT NULL,
  `Patronymic` char(30) DEFAULT NULL,
  `Series_VU` int DEFAULT NULL,
  `Number_VU` int DEFAULT NULL,
  `Date_Vidach_VU` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4  ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `drivers`
--

LOCK TABLES `drivers` WRITE;
/*!40000 ALTER TABLE `drivers` DISABLE KEYS */;
INSERT INTO `drivers` VALUES (1,'Медведева','Виктория','Максимовна',8604,105962,'2002-02-12'),(2,'Горелов','Дмитрий','Павлович',8253,946611,'2007-06-05'),(3,'Лосева','Вера','Руслановна',5706,219579,'2010-05-27'),(4,'Ковалева','Мария','Марковна',5817,254762,'2020-04-09'),(5,'Григорьев','Даниил','Кириллович',6273,398600,'2017-07-30'),(6,'Кочанов','Петр','Иванович',5698,102458,'2004-01-14'),(7,'Андреев','Филипп','Денисович',4769,662824,'1995-03-22'),(8,'Осипов','Георгий','Макарович',8162,473757,'2010-08-10'),(9,'Тарасова','Софья','Елисеевна',5403,828630,'2017-10-25'),(10,'Дорофеев','Сергей','Михайлович',9385,662174,'1989-06-19'),(11,'Ефремов','Артём','Ильич',6915,442610,'1985-09-11'),(12,'Зайцев','Арсений','Александрович',1615,325976,'2004-09-07'),(13,'Петрова','Софья','Александровна',6525,340340,'2006-09-23'),(14,'Абрамова','Айлин','Максимовна',1448,987979,'2014-11-13'),(15,'Куликов','Максим','Степанович',8716,862466,'2014-04-19'),(16,'Березин','Фёдор','Максимович',1807,507047,'2006-10-13'),(17,'Иванов','Арсений','Степанович',6594,111541,'2014-01-30'),(18,'Беляева','Елизавета','Алексеевна',1260,227863,'1980-01-04'),(19,'Ефремова','Анастасия','Ильинична',5075,778038,'2003-03-28'),(20,'Беляев','Михаил','Тимофеевич',5590,714310,'2014-08-26'),(21,'Лапин','Денис','Мирославович',9081,491961,'2016-05-16'),(22,'Гаврилов','Егор','Даниилович',1330,531099,'2000-07-24'),(23,'Власов','Игорь','Артёмович',8705,443540,'1981-03-22'),(24,'Кудрявцева','Мария','Ивановна',9027,315936,'2011-10-10'),(25,'Бочарова','Екатерина','Вячеславовна',8967,572556,'1992-06-03'),(26,'Демидова','Яна','Александровна',4431,177558,'2017-09-15'),(27,'Попова','Анна','Давидовна',3889,277703,'1992-12-14'),(28,'Яковлев','Данила','Даниилович',3593,106901,'2009-04-29'),(29,'Мельникова','Александра','Андреевна',3829,843548,'2006-05-29'),(30,'Акимов','Михаил','Тимофеевич',3941,177565,'1987-04-19'),(31,'Гусев','Всеволод','Максимович',8985,614379,'1998-09-29'),(32,'Филиппов','Тимур','Максимович',3657,821692,'2006-08-16'),(33,'Воронов','Павел','Семёнович',2567,675255,'2004-04-03'),(34,'Козлов','Артём','Андреевич',1250,279197,'1993-11-12'),(35,'Беликова','Арина','Кирилловна',5185,307703,'2007-03-14'),(36,'Степанов','Матвей','Тимофеевич',2776,297958,'1993-01-07'),(37,'Севастьянов','Арсений','Святославович',2924,658771,'1986-01-18'),(38,'Рудакова','Елизавета','Макаровна',8041,550804,'1982-06-02'),(39,'Андреева','Евгения','Ивановна',9094,900918,'2013-04-03'),(40,'Попова','Вероника','Михайловна',9126,889020,'1999-08-12'),(41,'Громов','Егор','Михайлович',7694,372503,'1981-04-28'),(42,'Кузнецов','Артём','Тимурович',2876,365026,'1980-11-16'),(43,'Демина','Ирина','Васильевна',8680,931046,'1988-06-30'),(44,'Яковлев','Михаил','Матвеевич',9152,736313,'1990-05-11'),(45,'Быкова','Есения','Семёновна',3714,643495,'1993-10-20'),(46,'Козлова','София','Павловна',1516,557358,'2019-10-01'),(47,'Белоусова','София','Георгиевна',2584,733330,'1985-01-17'),(48,'Степанова','Екатерина','Александровна',5320,378767,'1991-12-28'),(49,'Фролова','Анастасия','Данииловна',4142,661167,'1981-03-21'),(50,'Егоров','Глеб','Артёмович',7190,985666,'2020-05-07');
/*!40000 ALTER TABLE `drivers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marka`
--

DROP TABLE IF EXISTS `marka`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `marka` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Nazvanie` char(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4  ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marka`
--

LOCK TABLES `marka` WRITE;
/*!40000 ALTER TABLE `marka` DISABLE KEYS */;
INSERT INTO `marka` VALUES (1,'Audi'),(2,'Volkswagen'),(3,'Toyota'),(4,'Mazda'),(5,'Changan'),(6,'BMW'),(7,'Acura'),(8,'Cadillac'),(9,'Chery'),(10,'Chevrolet'),(11,'Citroen'),(12,'Daewoo'),(13,'Dodge'),(14,'Ferrari'),(15,'Fiat'),(16,'Ford'),(17,'Geely'),(18,'Genesis'),(19,'Haval'),(20,'Honda'),(21,'Hummer'),(22,'Hyundai'),(23,'Infiniti'),(24,'Jaguar'),(25,'Jeep'),(26,'Kia'),(27,'Lamborghini'),(28,'Land Rover'),(29,'Lexus'),(30,'Lifan'),(31,'Maserati'),(32,'Maybach'),(33,'McLaren'),(34,'Mercedes-Benz'),(35,'Mitsubishi'),(36,'Nissan'),(37,'Opel'),(38,'Peugeot'),(39,'Porsche'),(40,'Renault'),(41,'Rolls-Royce'),(42,'Skoda'),(43,'Subaru'),(44,'Suzuki'),(45,'Tesla'),(46,'Volvo'),(47,'УАЗ'),(48,'ГАЗ'),(49,'Lada'),(50,'Aurus');
/*!40000 ALTER TABLE `marka` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model`
--

DROP TABLE IF EXISTS `model`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Nazvanie` char(30) DEFAULT NULL,
`idMarka` char(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4  ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model`
--

LOCK TABLES `model` WRITE;
/*!40000 ALTER TABLE `model` DISABLE KEYS */;
INSERT INTO `model`
VALUES (1, 'Q7',1),
(2, 'Touareg',2),
(3, 'RAV4',3),
(4, 'CX5',4),
(5, 'CS55',5),
(6, 'Q8',1),
(7, 'M5',6),
(8, 'RDX',7),
(9, 'Escalade',8),
(10, 'Tiggo 8',9),
(11, 'Traverse',10),
(12, 'C5 Aircross',11),
(13, 'Matiz',12),
(14, 'Challenger',13),
(15, 'Portofino',14),
(16, 'Fullback',15),
(17, 'Explorer',16),
(18, 'Atlas',17),
(19, 'GV80',18),
(20, 'F7x',19),
(21, 'CR-V',20),
(22, 'H3',21),
(23, 'Creta',22),
(24, 'QX80',23),
(25, 'XF',24),
(26, 'Cherokee',25),
(27, 'Rio',26),
(28, 'Aventador',27),
(29, 'Range Rover Evoque',28),
(30, 'LX',29),
(31, 'Myway',30),
(32, 'Levante',31),
(33, '62',32),
(34, '720S',33),
(35, 'EQC',34),
(36, 'Pajero Sport',35),
(37, 'Ariya',36),
(38, 'Grandland X',37),
(39, '3008',38),
(40, 'Macan',39),
(41, 'Arkana',40),
(42, 'Cullinan',41),
(43, 'Karoq',42),
(44, 'Forester',43),
(45, 'SX4',44),
(46, 'Model S',45),
(47, 'XC40',46),
(48, 'Patriot',47),
(49, 'Газель-Next',48),
(50, 'XRAY',49),
(51, 'Senat',50);

/*!40000 ALTER TABLE `model` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sobstvennic`
--

DROP TABLE IF EXISTS `sobstvennic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sobstvennic` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Surname` char(30) DEFAULT NULL,
  `Name` char(30) DEFAULT NULL,
  `Patronymic` char(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4  ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sobstvennic`
--

LOCK TABLES `sobstvennic` WRITE;
/*!40000 ALTER TABLE `sobstvennic` DISABLE KEYS */;
INSERT INTO `sobstvennic` VALUES (1,'Новиков','Владимир','Кириллович'),(2,'Кузнецов','Артём','Миронович'),(3,'Филиппова','Елена','Максимовна'),(4,'Лаврова','Николь','Тимофеевна'),(5,'Попова','Александра','Дмитриевна'),(6,'Нефедова','Ксения','Марковна'),(7,'Евдокимова','Кира','Алексеевна'),(8,'Поляков','Мирон','Маркович'),(9,'Фролова','Мария','Георгиевна'),(10,'Горячева','София','Георгиевна'),(11,'Самсонов','Марк','Данилович'),(12,'Кузнецова','Анастасия','Владиславовна'),(13,'Нечаев','Эрик','Вячеславович'),(14,'Синицын','Николай','Андреевич'),(15,'Федорова','Есения','Артемьевна'),(16,'Покровская','Варвара','Ивановна'),(17,'Филиппов','Максим','Дмитриевич'),(18,'Давыдова','Анастасия','Георгиевна'),(19,'Никулин','Руслан','Михайлович'),(20,'Волков','Максим','Васильевич'),(21,'Сергеева','Виктория','Львовна'),(22,'Иванов','Арсений','Юрьевич'),(23,'Петухов','Степан','Ибрагимович'),(24,'Воробьева','Аврора','Ильинична'),(25,'Соколов','Дмитрий','Филиппович'),(26,'Егоров','Артём','Львович'),(27,'Моисеева','Вера','Евгеньевна'),(28,'Самойлов','Александр','Миронович'),(29,'Егорова','Василиса','Александровна'),(30,'Коновалов','Даниил','Ярославович'),(31,'Булатов','Ярослав','Фёдорович'),(32,'Шмелев','Артур','Валерьевич'),(33,'Лебедев','Владислав','Никитич'),(34,'Попова','Стефания','Артуровна'),(35,'Парфенов','Максим','Маркович'),(36,'Маркина','Аврора','Ильинична'),(37,'Семенова','Александра','Данииловна'),(38,'Захарова','Вероника','Ильинична'),(39,'Беликова','Полина','Никитична'),(40,'Макаров','Пётр','Германович'),(41,'Галкин','Иван','Иванович'),(42,'Тихонов','Михаил','Ильич'),(43,'Захарова','Ксения','Семёновна'),(44,'Морозова','Маргарита','Фёдоровна'),(45,'Кузьмин','Богдан','Денисович'),(46,'Архипова','Екатерина','Тимофеевна'),(47,'Попова','Валерия','Артёмовна'),(48,'Морозова','Софья','Романовна'),(49,'Кудряшова','Виктория','Ильинична'),(50,'Исаков','Алексей','Адамович');
/*!40000 ALTER TABLE `sobstvennic` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sotrudnik`
--

DROP TABLE IF EXISTS `sotrudnik`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sotrudnik` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Surname` char(30) DEFAULT NULL,
  `Name` char(30) DEFAULT NULL,
  `Patronymic` char(30) DEFAULT NULL,
  `Birthday` date DEFAULT NULL,
  `Login` char(30) DEFAULT NULL,
  `Password` char(30) DEFAULT NULL,
  `Status` char(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4  ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sotrudnik`
--

LOCK TABLES `sotrudnik` WRITE;
/*!40000 ALTER TABLE `sotrudnik` DISABLE KEYS */;
INSERT INTO `sotrudnik` VALUES (1,'Иванов','Марк','Алексеевич','1978-05-03','admin','admin','Администратор'),(2,'Соколов','Матвей','Андреевич','1983-06-25','sokol','sokol83','Оператор'),(3,'Грачев','Ярослав','Тимурович','1999-11-07','grach','grach99','Оператор'),(4,'Фролова','Елизавета','Дмитриевна','1993-12-05','frolova','frolova93','Администратор'),(5,'Осипов','Демид','Артёмович','1987-02-19','osipov','osipov87','Оператор'),(6,'Головин','Сергей','Дмитриевич','2001-04-23','golovin','golovin01','Оператор'),(7,'Агафонова','Полина','Александровна','1985-09-27','agaph','agaph85','Администратор'),(8,'Кочетов','Мирон','Святославович','1976-08-19','kochetov','kochetov76','Оператор'),(9,'Харитонова','Ульяна','Тимуровна','1984-10-26','hariton','hariton84','Оператор'),(10,'Герасимова','Валерия','Никитична','2002-07-06','gerasimova','gerasimova02','Оператор'),(11,'Калмыков','Александр','Максимович','1981-10-26','Kalmi','Kalmi81','Оператор'),(12,'Захарова','Виктория','Владимировна','1978-03-11','Zahar','Zahar78','Оператор'),(13,'Тихомиров','Святослав','Романович','1978-06-14','Tihom','Tihom78','Оператор'),(14,'Трошин','Степан','Александрович','1972-09-13','Troshi','Troshi72','Оператор'),(15,'Мартынова','Александра','Евгеньевна','1997-05-29','Marti','Marti97','Оператор'),(16,'Воронков','Пётр','Семёнович','1981-05-13','Voron','Voron81','Оператор'),(17,'Дементьев','Михаил','Денисович','1982-02-18','Demen','Demen82','Оператор'),(18,'Абрамова','Полина','Егоровна','1966-05-10','Abram','Abram66','Оператор'),(19,'Белов','Фёдор','Даниилович','1969-09-29','Belov','Belov69','Оператор'),(20,'Попова','Софья','Михайловна','1981-07-13','Popov','Popov81','Оператор'),(21,'Петрова','Александра','Георгиевна','1999-03-27','Petro','Petro99','Оператор'),(22,'Петухова','Мия','Львовна','1982-03-18','Petuh','Petuh82','Оператор'),(23,'Журавлева','Варвара','Ильинична','1985-12-13','Jurav','Jurav85','Оператор'),(24,'Глушков','Глеб','Максимович','1983-09-15','Glushk','Glushk83','Оператор'),(25,'Сергеева','Алия','Ярославовна','1967-05-30','Serge','Serge67','Оператор'),(26,'Мельников','Кирилл','Матвеевич','1979-03-02','Meln','Meln79','Оператор'),(27,'Фомин','Иван','Янович','1980-03-10','Fomin','Fomin80','Оператор'),(28,'Архипов','Дмитрий','Владимирович','1991-03-14','Arhip','Arhip91','Оператор'),(29,'Ковалев','Ярослав','Владиславович','1968-12-03','Koval','Koval68','Оператор'),(30,'Ушакова','Елизавета','Александровна','1995-08-22','Ushako','Ushako95','Оператор'),(31,'Григорьев','Денис','Артёмович','1966-08-05','Grigo','Grigo66','Оператор'),(32,'Куликова','Юлия','Антоновна','1990-03-18','Kulik','Kulik90','Оператор'),(33,'Яковлева','Елизавета','Андреевна','1970-03-28','Yakovl','Yakovl70','Оператор'),(34,'Демин','Макар','Константинович','1977-05-16','Demin','Demin77','Оператор'),(35,'Серов','Илья','Миронович','1967-10-11','Serov','Serov67','Оператор'),(36,'Алексеева','Василиса','Артёмовна','1974-04-07','Aleks','Aleks74','Оператор'),(37,'Маслова','Стефания','Егоровна','1975-08-30','Maslo','Maslo75','Оператор'),(38,'Поликарпова','Анастасия','Степановна','1973-01-18','Polik','Polik73','Оператор'),(39,'Лебедев','Кирилл','Андреевич','1992-03-21','Lebed','Lebed92','Оператор'),(40,'Васильев','Богдан','Алексеевич','2002-11-19','Vasil','Vasil02','Оператор'),(41,'Новиков','Михаил','Григорьевич','1993-12-24','Novik','Novik93','Оператор'),(42,'Бирюков','Сергей','Иванович','1989-01-05','Biryuk','Biryuk89','Оператор'),(43,'Назаров','Тимофей','Кириллович','2002-04-28','Nazar','Nazar02','Оператор'),(44,'Грачев','Артём','Алексеевич','1984-10-20','Grache','Grache84','Оператор'),(45,'Панкратова','Лидия','Кирилловна','2002-05-10','Pankr','Pankr02','Оператор'),(46,'Мельникова','Карина','Артуровна','1975-11-11','Meln','Meln75','Оператор'),(47,'Зотова','Сафия','Михайловна','1974-09-28','Zotov','Zotov74','Оператор'),(48,'Рябинин','Артём','Львович','1967-05-16','Ryabin','Ryabin67','Оператор'),(49,'Касьянов','Иван','Николаевич','1991-10-25','Kasya','Kasya91','Оператор'),(50,'Цветкова','Василиса','Андреевна','1964-05-31','Cvetk','Cvetk64','Оператор');
/*!40000 ALTER TABLE `sotrudnik` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `strah_polis`
--

DROP TABLE IF EXISTS `strah_polis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `strah_polis` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Series` char(3) DEFAULT NULL,
  `Number` bigint DEFAULT NULL,
  `Srok_Strah_Ot` date DEFAULT NULL,
  `Srok_Strah_Do` date DEFAULT NULL,
  `Date_Zakluch` date DEFAULT NULL,
  `Date_Vidach` date DEFAULT NULL,
  `Strah_Premiya` decimal(10,2) DEFAULT NULL,
  `idStrahovatel` int NOT NULL,
  `idDrivers` int NOT NULL,
  `idAvto` int NOT NULL,
  `idSotrudnik` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idAvto` (`idAvto`),
  KEY `idDrivers` (`idDrivers`),
  KEY `idSotrudnik` (`idSotrudnik`),
  KEY `idStrahovatel` (`idStrahovatel`),
  CONSTRAINT `strah_polis_ibfk_1` FOREIGN KEY (`idAvto`) REFERENCES `avto` (`id`),
  CONSTRAINT `strah_polis_ibfk_2` FOREIGN KEY (`idDrivers`) REFERENCES `drivers` (`id`),
  CONSTRAINT `strah_polis_ibfk_3` FOREIGN KEY (`idSotrudnik`) REFERENCES `sotrudnik` (`id`),
  CONSTRAINT `strah_polis_ibfk_4` FOREIGN KEY (`idStrahovatel`) REFERENCES `strahovatel` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4  ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `strah_polis`
--

LOCK TABLES `strah_polis` WRITE;
/*!40000 ALTER TABLE `strah_polis` DISABLE KEYS */;
INSERT INTO `strah_polis` VALUES (1,'ХХХ',1819925874,'2021-07-02','2022-07-02','2021-07-01','2021-07-01',7589.52,1,4,2,3),(2,'ЕЕЕ',2901788786,'2022-03-09','2022-09-09','2022-03-08','2022-03-08',23987.23,5,2,3,1),(3,'ССС',4553759866,'2022-11-25','2023-11-25','2022-11-24','2022-11-24',13699.12,3,1,4,2),(4,'ВВВ',5536807493,'2021-08-16','2022-02-16','2021-08-16','2021-08-16',98256.47,4,5,5,6),(5,'МММ',863255561,'2020-05-28','2021-05-28','2020-05-26','2020-05-26',64125.00,2,3,1,4),(6,'ККК',1056987326,'2022-10-05','2023-10-05','2022-10-04','2022-10-04',256348.56,2,3,6,5),(7,'ХХХ',8087793542,'2000-12-15','2001-08-15','2000-12-15','2000-12-15',13492.15,6,44,6,18),(8,'ААВ',4239765201,'1994-11-25','1995-07-25','1994-11-22','1994-11-22',4773.24,7,45,7,29),(9,'МММ',1015772618,'2020-09-10','2021-02-10','2020-09-10','2020-09-10',7793.05,8,46,8,7),(10,'ХХХ',5609336247,'1999-07-17','2000-07-17','1999-07-14','1999-07-15',5806.74,9,47,9,49),(11,'ЕЕЕ',2220855985,'2003-04-11','2003-12-11','2003-04-09','2003-04-10',8175.74,10,48,10,21),(12,'ККК',3228955313,'1998-02-26','1998-12-26','1998-02-23','1998-02-24',8175.74,11,49,11,35),(13,'МММ',3755202867,'2021-03-26','2021-12-26','2021-03-23','2021-03-23',7358.17,12,50,12,39),(14,'МММ',8687839140,'2010-10-28','2011-06-28','2010-10-28','2010-10-28',12142.94,13,7,13,44),(15,'ККК',2100899008,'2016-10-09','2017-03-09','2016-10-07','2016-10-07',8769.90,14,8,14,21),(16,'ЕЕЕ',5105864183,'2018-04-19','2019-02-19','2018-04-19','2018-04-19',8175.74,15,9,15,34),(17,'ИИИ',4753178982,'1992-01-29','1993-01-29','1992-01-26','1992-01-26',7358.17,16,10,16,8),(18,'ХХХ',5448283470,'1987-01-08','1987-08-08','1987-01-07','1987-01-08',7793.05,17,11,17,48),(19,'ЕЕЕ',3855228676,'2012-03-22','2012-09-22','2012-03-22','2012-03-23',8010.97,18,12,18,35),(20,'МММ',6304097194,'2015-05-04','2016-03-04','2015-05-02','2015-05-03',7013.74,19,13,19,47),(21,'ХХХ',6693274933,'2016-05-27','2017-02-27','2016-05-24','2016-05-24',6063.31,20,14,20,41),(22,'МММ',5093061881,'2018-09-28','2019-02-28','2018-09-26','2018-09-27',13492.15,21,15,21,36),(23,'ААВ',8026982666,'2007-09-07','2008-03-07','2007-09-04','2007-09-04',9480.38,22,16,22,8),(24,'ХХХ',1218367229,'2015-07-13','2016-03-13','2015-07-10','2015-07-10',9284.69,23,17,23,15),(25,'ЕЕЕ',8928559808,'2004-07-25','2004-11-25','2004-07-25','2004-07-26',5966.55,24,18,24,46),(26,'ЕЕЕ',4868217340,'2006-04-25','2006-10-25','2006-04-25','2006-04-25',7458.19,25,19,25,9),(27,'МММ',1902212925,'2019-12-28','2020-08-28','2019-12-25','2019-12-26',11025.57,26,20,26,24),(28,'ААС',8970160879,'2017-02-25','2017-09-25','2017-02-23','2017-02-24',6162.25,27,21,27,39),(29,'ААВ',3654289069,'2001-12-17','2002-08-17','2001-12-15','2001-12-16',8263.94,28,22,28,31),(30,'ИИИ',7285283086,'2016-12-05','2017-09-05','2016-12-02','2016-12-03',12142.94,29,23,29,16),(31,'ААВ',5604465917,'2012-11-18','2013-11-18','2012-11-16','2012-11-16',4675.83,30,24,30,28),(32,'ААВ',7303891372,'2008-12-15','2009-07-15','2008-12-14','2008-12-15',6636.27,31,25,31,8),(33,'ААВ',3192136596,'2020-06-17','2021-01-17','2020-06-15','2020-06-16',6296.52,32,26,32,36),(34,'ААВ',3058456371,'2015-03-03','2015-11-03','2015-03-01','2015-03-01',10793.72,33,27,33,31),(35,'ААВ',8323268535,'2010-04-29','2011-04-29','2010-04-29','2010-04-29',12142.94,34,28,34,19),(36,'МММ',5465824943,'2007-05-27','2007-08-27','2007-05-24','2007-05-24',7403.40,35,29,35,47),(37,'ККК',7603636640,'1989-10-11','1990-08-11','1989-10-11','1989-10-11',11805.63,36,30,36,44),(38,'ААС',1459750380,'2000-12-12','2001-04-12','2000-12-09','2000-12-09',6234.44,37,31,37,21),(39,'ККК',9199728284,'2008-03-21','2008-08-21','2008-03-20','2008-03-20',7584.31,38,32,38,28),(40,'МММ',2654088510,'2013-03-10','2013-09-10','2013-03-08','2013-03-08',7013.74,39,33,39,48),(41,'ИИИ',5326676538,'1996-02-18','1996-09-18','1996-02-16','1996-02-17',13492.15,40,34,40,22),(42,'ИИИ',8243170471,'2009-11-25','2010-04-25','2009-11-24','2009-11-24',6746.08,41,35,41,13),(43,'ХХХ',6845710416,'2006-07-25','2007-04-25','2006-07-25','2006-07-25',13263.84,42,36,42,44),(44,'ХХХ',4344190480,'1989-08-24','1989-11-24','1989-08-23','1989-08-24',6963.52,43,37,43,10),(45,'ААВ',6685257161,'2009-01-09','2009-06-09','2009-01-07','2009-01-08',7543.81,44,38,44,43),(46,'ИИИ',7897146216,'2016-06-08','2016-11-08','2016-06-06','2016-06-07',5966.55,45,39,45,6),(47,'ААВ',4998275658,'2000-07-15','2001-01-15','2000-07-12','2000-07-12',6636.27,46,40,46,18),(48,'МММ',3621946695,'1997-09-17','1998-03-17','1997-09-15','1997-09-16',8621.50,47,41,47,17),(49,'ЕЕЕ',2370944938,'1982-07-28','1983-06-28','1982-07-27','1982-07-27',7766.96,48,42,48,14),(50,'ХХХ',4078717390,'1994-07-04','1995-01-04','1994-07-01','1994-07-02',4740.19,49,43,49,25);
/*!40000 ALTER TABLE `strah_polis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `strahovatel`
--

DROP TABLE IF EXISTS `strahovatel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `strahovatel` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Surname` char(30) DEFAULT NULL,
  `Name` char(30) DEFAULT NULL,
  `Patronymic` char(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4  ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `strahovatel`
--

LOCK TABLES `strahovatel` WRITE;
/*!40000 ALTER TABLE `strahovatel` DISABLE KEYS */;
INSERT INTO `strahovatel` VALUES (1,'Федотова','Ольга','Егоровна'),(2,'Муравьев','Максим','Ильич'),(3,'Кузьмина','Мария','Глебовна'),(4,'Авдеева','Анастасия','Артёмовна'),(5,'Фокин','Михаил','Николаевич'),(6,'Воронин','Тимофей','Романович'),(7,'Одинцов','Никита','Михайлович'),(8,'Гуляева','Анастасия','Ивановна'),(9,'Высоцкий','Михаил','Маркович'),(10,'Галкина','Кристина','Ивановна'),(11,'Медведева','Алиса','Николаевна'),(12,'Филиппов','Мирон','Николаевич'),(13,'Леонов','Роман','Дмитриевич'),(14,'Рожков','Евгений','Егорович'),(15,'Ильина','Виктория','Ивановна'),(16,'Некрасова','Марьям','Михайловна'),(17,'Сафонов','Денис','Эмильевич'),(18,'Дубинин','Григорий','Артёмович'),(19,'Овчинникова','Софья','Ивановна'),(20,'Прохорова','Маргарита','Владиславовна'),(21,'Андрианова','Мелания','Денисовна'),(22,'Федорова','Екатерина','Георгиевна'),(23,'Горюнов','Александр','Миронович'),(24,'Морозов','Виктор','Никитич'),(25,'Федоров','Даниил','Иванович'),(26,'Иванова','Алиса','Ибрагимовна'),(27,'Зубова','Полина','Михайловна'),(28,'Богданов','Даниил','Александрович'),(29,'Волкова','Юлия','Ивановна'),(30,'Петров','Илья','Алексеевич'),(31,'Пономарев','Марк','Даниилович'),(32,'Григорьев','Никита','Максимович'),(33,'Комаров','Владимир','Александрович'),(34,'Антонова','Маргарита','Елисеевна'),(35,'Кошелев','Роман','Тимофеевич'),(36,'Емельянова','Кира','Руслановна'),(37,'Иванов','Никита','Маркович'),(38,'Медведева','Василиса','Тимофеевна'),(39,'Иванова','Софья','Алексеевна'),(40,'Виноградова','Эмилия','Матвеевна'),(41,'Игнатьев','Мирон','Даниилович'),(42,'Овчинников','Никита','Михайлович'),(43,'Маслов','Мирон','Дмитриевич'),(44,'Голубева','Элина','Александровна'),(45,'Баранова','Василиса','Алексеевна'),(46,'Сергеев','Евгений','Гордеевич'),(47,'Миронова','Екатерина','Андреевна'),(48,'Новиков','Данил','Вячеславович'),(49,'Лазарева','Анна','Ивановна'),(50,'Белоусов','Даниил','Владимирович');
/*!40000 ALTER TABLE `strahovatel` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-03-06 17:13:21

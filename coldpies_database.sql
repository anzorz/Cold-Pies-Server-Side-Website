-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: coldpies_database
-- ------------------------------------------------------
-- Server version	8.0.34

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
-- Table structure for table `eoi`
--

DROP TABLE IF EXISTS `eoi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `eoi` (
  `EOInumber` int NOT NULL AUTO_INCREMENT,
  `JobReferenceNumber` varchar(5) NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `DateOfBirth` varchar(10) DEFAULT NULL,
  `Gender` varchar(1) DEFAULT NULL,
  `Address` varchar(40) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `PhoneNumber` varchar(12) NOT NULL,
  `Skills` text NOT NULL,
  `OtherSkills` text,
  `Status` varchar(10) NOT NULL,
  PRIMARY KEY (`EOInumber`),
  KEY `FK_JobReferenceNumber` (`JobReferenceNumber`),
  CONSTRAINT `FK_JobReferenceNumber` FOREIGN KEY (`JobReferenceNumber`) REFERENCES `job_description` (`JobReferenceNumber`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eoi`
--

LOCK TABLES `eoi` WRITE;
/*!40000 ALTER TABLE `eoi` DISABLE KEYS */;
INSERT INTO `eoi` VALUES (6,'FSW01','Kiara','Zachary','02/12/2003','f','23 Beumont St, Coburg East, VIC, 3054','kiarazachary@yahoo.com','32659874','HTML, JavaScript, Responsive Design','AA','1'),(7,'FSW01','Muhaimenul','Shanto','07/09/2003','m','417 Lygon st, Brunswick, VIC, 3057','hussainshanto69@gmail.com','04236756473','HTML, CSS, JavaScript, SQL, R','','2');
/*!40000 ALTER TABLE `eoi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_description`
--

DROP TABLE IF EXISTS `job_description`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_description` (
  `JobReferenceNumber` varchar(5) NOT NULL,
  `JobTitle` varchar(100) NOT NULL,
  `JobDescription` longtext,
  `KeyResponsibilities` longtext,
  `RequiredQualifications` longtext,
  `Salary` varchar(50) DEFAULT NULL,
  `ReportsTo` varchar(255) DEFAULT NULL,
  `DetailedDescription` text,
  PRIMARY KEY (`JobReferenceNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_description`
--

LOCK TABLES `job_description` WRITE;
/*!40000 ALTER TABLE `job_description` DISABLE KEYS */;
INSERT INTO `job_description` VALUES ('DA002','Data Analyst','Cold Pies is driven by data-informed decisions. We\'re in pursuit of a Data Analyst who can decipher complex datasets into straightforward business strategies. Work Location: Our modern Melbourne headquarters is the epicenter of our analytical operations. The Role: As our Data Analyst, you\'ll be the beacon of insight, transforming raw data into clear action points for all departments, front-end customer interactions to backend optimizations. We value team players who can collaborate effectively with cross-functional teams and contribute to a positive work environment. If data speaks to you, and your analytical skills are matched with a strong business acumen, we welcome your application.','Analyze complex datasets and extract valuable insights.\nCollaborate with cross-functional teams to define, design, and implement data-driven solutions.\nEnsure data accuracy and integrity by implementing data validation and cleaning processes.\nCreate visualizations and reports to communicate findings and recommendations.','Essential:\nBachelor\'s or Master\'s degree in Statistics, Computer Science, or related field.\n2+ years of experience in a data analysis role.\nExpertise in SQL, R, Python; familiarity with BI tools (e.g., Tableau, Power BI).\nStrong analytical and critical thinking skills.\nExcellent communication abilities.\nPreferable:\nExperience with machine learning techniques and tools.\nKnowledge of data warehousing and ETL processes.\nFamiliarity with cloud platforms (e.g., AWS, Azure, GCP).\nExperience with big data technologies (e.g., Spark, Hadoop).','$100,000 to $120,000 per year',NULL,NULL),('FSW01','Full Stack Web Developer','Cold Pies is a pioneer in the IT industry, crafting an array of delicious treats with passion and precision. Our commitment to quality has garnered a loyal customer base and widespread acclaim. Our work is centered in the vibrant city of Melbourne, a place known for its culinary delights and dynamic culture. At Cold Pies, we\'re proud to contribute to this rich tapestry with our handmade products. We are currently on the lookout for a versatile Full Stack Web Developer who is adept at both front-end and back-end development. Your role will be crucial in enhancing our online presence and customer engagement. We value team players who can collaborate effectively with cross-functional teams and contribute to a positive work environment. If you possess such a skill set in web development and share our passion for quality, we encourage you to apply and join us in our journey of growth and excellence.','Develop scalable front-end and back-end applications for our website.\nCollaborate with cross-functional teams to define, design, and ship new features.\nEnsure the technical feasibility of UI/UX designs and optimize applications for maximum speed and scalability.\nMaintain and improve website functionality and performance.\nIntegrate user-facing elements with server-side logic and functionalities.','Essential:\nBachelor\'s degree in Computer Science or related field.\nAt least 3 years of experience in web development.\nProficiency in HTML, CSS, JavaScript, and responsive design.\nPreferable:\nExperience with specific front-end frameworks (e.g., React, Angular, Vue.js).\nExperience with back-end frameworks (e.g., Node.js, Django, Flask).\nKnowledge of database management systems (e.g., MySQL, PostgreSQL).','$90,000 to $110,000 per year',NULL,NULL);
/*!40000 ALTER TABLE `job_description` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'manager','managecoldpies');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-08-04 15:43:01

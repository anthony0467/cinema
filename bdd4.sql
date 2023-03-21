-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour cinema_anthony
CREATE DATABASE IF NOT EXISTS `cinema_anthony` /*!40100 DEFAULT CHARACTER SET latin1 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `cinema_anthony`;

-- Listage de la structure de la table cinema_anthony. acteur
CREATE TABLE IF NOT EXISTS `acteur` (
  `id_acteur` int NOT NULL AUTO_INCREMENT,
  `id_personne` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_acteur`),
  KEY `id_personne` (`id_personne`),
  CONSTRAINT `acteur__personne` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- Listage des données de la table cinema_anthony.acteur : ~15 rows (environ)
/*!40000 ALTER TABLE `acteur` DISABLE KEYS */;
INSERT INTO `acteur` (`id_acteur`, `id_personne`) VALUES
	(1, 4),
	(2, 5),
	(3, 6),
	(4, 7),
	(5, 8),
	(6, 9),
	(7, 10),
	(8, 11),
	(9, 12),
	(10, 13),
	(11, 14),
	(12, 33),
	(13, 34),
	(14, 35),
	(15, 38),
	(16, 39);
/*!40000 ALTER TABLE `acteur` ENABLE KEYS */;

-- Listage de la structure de la table cinema_anthony. casting
CREATE TABLE IF NOT EXISTS `casting` (
  `id_acteur` int DEFAULT NULL,
  `id_film` int DEFAULT NULL,
  `id_role` int DEFAULT NULL,
  KEY `id_acteur` (`id_acteur`),
  KEY `id_film` (`id_film`),
  KEY `id_role` (`id_role`),
  CONSTRAINT `casting__acteur` FOREIGN KEY (`id_acteur`) REFERENCES `acteur` (`id_acteur`),
  CONSTRAINT `casting__film` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  CONSTRAINT `casting__role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- Listage des données de la table cinema_anthony.casting : ~37 rows (environ)
/*!40000 ALTER TABLE `casting` DISABLE KEYS */;
INSERT INTO `casting` (`id_acteur`, `id_film`, `id_role`) VALUES
	(1, 1, 2),
	(1, 2, 2),
	(1, 3, 2),
	(2, 1, 3),
	(2, 2, 3),
	(2, 3, 3),
	(2, 9, 3),
	(2, 10, 3),
	(3, 1, 5),
	(3, 2, 5),
	(3, 3, 5),
	(3, 8, 5),
	(3, 9, 5),
	(3, 10, 5),
	(4, 1, 10),
	(4, 2, 10),
	(4, 3, 10),
	(5, 8, 6),
	(5, 9, 6),
	(5, 10, 6),
	(6, 4, 1),
	(6, 5, 1),
	(6, 6, 1),
	(7, 5, 4),
	(8, 7, 1),
	(9, 11, 8),
	(9, 7, 8),
	(10, 12, 7),
	(10, 11, 9),
	(10, 7, 9),
	(11, 1, 6),
	(11, 3, 6),
	(1, 13, 11),
	(12, 28, 16),
	(13, 25, 17),
	(14, 14, 18),
	(15, 29, 1),
	(16, 27, 19);
/*!40000 ALTER TABLE `casting` ENABLE KEYS */;

-- Listage de la structure de la table cinema_anthony. categoriser
CREATE TABLE IF NOT EXISTS `categoriser` (
  `id_film` int DEFAULT NULL,
  `id_genre` int DEFAULT NULL,
  KEY `id_film` (`id_film`),
  KEY `id_genre` (`id_genre`),
  CONSTRAINT `categoriser__film` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  CONSTRAINT `categoriser__genre` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- Listage des données de la table cinema_anthony.categoriser : ~30 rows (environ)
/*!40000 ALTER TABLE `categoriser` DISABLE KEYS */;
INSERT INTO `categoriser` (`id_film`, `id_genre`) VALUES
	(1, 1),
	(2, 1),
	(3, 1),
	(4, 2),
	(4, 6),
	(5, 2),
	(5, 6),
	(6, 2),
	(6, 6),
	(7, 2),
	(7, 6),
	(8, 1),
	(9, 1),
	(10, 1),
	(11, 2),
	(11, 6),
	(12, 3),
	(12, 4),
	(12, 5),
	(13, 6),
	(13, 4),
	(14, 3),
	(25, 9),
	(27, 4),
	(27, 8),
	(28, 3),
	(28, 4),
	(28, 6),
	(29, 2),
	(29, 4);
/*!40000 ALTER TABLE `categoriser` ENABLE KEYS */;

-- Listage de la structure de la table cinema_anthony. film
CREATE TABLE IF NOT EXISTS `film` (
  `id_film` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(60) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `annee_sortie_film` int NOT NULL,
  `synopsis` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_bin,
  `duree_minute` int NOT NULL,
  `note` int DEFAULT NULL,
  `affiche` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `id_realisateur` int DEFAULT NULL,
  `nb_like` int DEFAULT '0',
  PRIMARY KEY (`id_film`),
  KEY `id_realisateur` (`id_realisateur`),
  CONSTRAINT `FK_film_realisateur` FOREIGN KEY (`id_realisateur`) REFERENCES `realisateur` (`id_realisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- Listage des données de la table cinema_anthony.film : ~18 rows (environ)
/*!40000 ALTER TABLE `film` DISABLE KEYS */;
INSERT INTO `film` (`id_film`, `titre`, `annee_sortie_film`, `synopsis`, `duree_minute`, `note`, `affiche`, `id_realisateur`, `nb_like`) VALUES
	(1, 'Le seigneur des anneaux la communauté de l\'anneau', 2001, 'Un jeune et timide Hobbit, Frodon Sacquet, hérite d\'un anneau magique. Bien loin d\'être une simple babiole, il s\'agit d\'un instrument de pouvoir absolu qui permettrait à Sauron, le "Seigneur des ténèbres", de régner sur la Terre du Milieu et de réduire en esclavage ses peuples. Frodon doit parvenir, avec l\'aide de la communauté de l\'anneau, jusqu\'à la "Crevasse du Destin" pour le détruire.', 178, 5, 'https://www.ecranlarge.com/media/cache/1600x1200/uploads/image/001/192/5opg6m0yhr21ovs1fni2h1xpkuf-326.jpg', 1, 1),
	(2, 'Le seigneur des anneaux - les deux tours', 2002, ' Après la mort de Boromir et la disparition de Gandalf, la Communauté s\'est scindée en trois. Perdus dans les collines d\'Emyn Muil, Frodon et Sam découvrent qu\'ils sont suivis par Gollum, une créature versatile corrompue par l\'Anneau. Celui-ci promet de conduire les Hobbits jusqu\'à la Porte Noire du Mordor.', 179, 5, 'https://fr.web.img6.acsta.net/medias/nmedia/00/02/54/95/affiche2.jpg', 1, 0),
	(3, 'Le seigneur des anneaux - le retour du roi', 2003, 'Les armées de Sauron ont attaqué Minas Tirith, la capitale du Gondor. Jamais ce royaume autrefois puissant n\'a eu autant besoin de son roi. Cependant, Aragorn trouvera-t-il en lui la volonté d\'accomplir sa destinée ? Tandis que Gandalf s\'efforce de soutenir les forces brisées de Gondor, Théoden exhorte les guerriers de Rohan à se joindre au combat. Cependant, malgré leur courage et leur loyauté, les forces des Hommes ne sont pas de taille à lutter contre les innombrables légions d\'ennemis.', 201, 5, 'https://fr.web.img3.acsta.net/medias/nmedia/18/35/14/33/18366630.jpg', 1, 7),
	(4, 'Batman begins', 2005, 'Comment un homme seul peut-il changer le monde ? Telle est la question qui hante Bruce Wayne depuis cette nuit tragique où ses parents furent abattus sous ses yeux, dans une ruelle de Gotham City. Torturé par un profond sentiment de colère et de culpabilité, le jeune héritier de cette richissime famille fuit Gotham pour un long et discret voyage à travers le monde. Le but de ses pérégrinations : sublimer sa soif de vengeance en trouvant de nouveaux moyens de lutter contre l\'injustice.', 140, 4, 'https://fr.web.img3.acsta.net/pictures/22/10/04/08/52/2484953.jpg', 2, 0),
	(5, 'Batman the dark knight', 2008, 'Batman est plus que jamais déterminé à éradiquer le crime organisé qui sème la terreur en ville. Epaulé par le lieutenant Jim Gordon et par le procureur de Gotham City, Harvey Dent, Batman voit son champ d\'action s\'élargir. La collaboration des trois hommes s\'avère très efficace et ne tarde pas à porter ses fruits jusqu\'à ce qu\'un criminel redoutable vienne plonger la ville de Gotham City dans le chaos.', 152, 5, 'https://fr.web.img2.acsta.net/medias/nmedia/18/63/97/89/18949761.jpg', 2, 0),
	(6, 'Batman the dark knight rises', 2012, 'Il y a huit ans, Batman a disparu dans la nuit : lui qui était un héros est alors devenu un fugitif. L\'arrivée d\'une féline et fourbe cambrioleuse au mystérieux dessein chamboule l\'ordre établi. Bien plus dangereuse encore est l\'apparition de Bane, terroriste masqué dont l\'impitoyable projet pour Gotham pousse Bruce à sortir de l\'exil qu\'il s\'est imposé. Mais bien qu\'il reprenne cape et masque, Batman pourrait ne pas être un adversaire à la taille de Bane...', 164, 3, 'https://fr.web.img3.acsta.net/medias/nmedia/18/83/56/27/20158098.jpg', 2, 4),
	(7, 'Batman v Superman: l\'aube de la justice', 2016, 'Craignant les débordements d\'un superhéros aux pouvoirs infinis, le justicier de Gotham City, lui-même doté d\'une détermination et d\'une force de frappe redoutables, affronte le sauveur des temps modernes adulé de Metropolis sous le regard du monde entier qui se demande quel type de héros lui convient le mieux. Mais pendant que la guerre entre Batman et Superman fait rage, une nouvelle menace se dresse, faisant régner sur l\'humanité une menace plus grande que jamais.', 152, 2, 'https://fr.web.img2.acsta.net/pictures/16/02/03/11/17/130929.jpg', 3, 0),
	(8, 'Le hobbit - un voyage inattendu', 2012, 'Bilbon Sacquet mène une existence paisible dans sa maison, jusqu\'à ce que le magicien Gandalf vienne le chercher pour qu\'il prenne part à une aventure avec un groupe de nains. Ces derniers veulent reconquérir leur royaume, détruit par le terrible dragon cracheur de feu Smaug, qui habite toujours les lieux, planqué sous des milliers de pièces d\'or. Ils devront affronter des orques, des gobelins, des trolls, sympathiser avec les Elfes, leurs ennemis, et affronter des forces maléfiques.', 169, 4, 'https://fr.web.img6.acsta.net/medias/nmedia/18/93/43/35/20273834.jpg', 1, 6),
	(9, 'Le hobbit - la désolation de smaug', 2013, 'Bilbon Sacquet et les Nains continuent leur quête vers la Montagne Solitaire. Les trolls sont à leurs trousses alors qu\'ils s\'engagent dans la dangereuse forêt de Mirkwood. Attaqués par des araignées géantes puis capturés par les Elfes, ils s\'évadent et sont sauvés grâce aux talents au combat de Legolas et de Tauriel. Pendant ce temps, Gandalf est sur la piste de la force sombre qui prépare secrètement son retour à Dol Guldur.', 161, 3, 'https://fr.web.img4.acsta.net/pictures/210/552/21055250_20131106114016251.jpg', 1, 0),
	(10, 'Le hobbit - la bataille des cinq armées', 2014, 'Atteignant enfin la Montagne Solitaire, Thorin et les Nains, aidés par Bilbon le Hobbit, ont réussi à récupérer leur royaume et leur trésor. Ils ont également réveillé le dragon Smaug qui déchaîne désormais sa colère sur les habitants de Lac-ville. À présent, les Nains, les Elfes, les Humains mais aussi les Wrags et les Orques menés par le Nécromancien, convoitent les richesses de la Montagne Solitaire.', 144, 4, 'https://fr.web.img3.acsta.net/pictures/14/11/14/17/43/568445.jpg', 1, 11),
	(11, 'Man of steel', 2013, 'Lorsque Jor-El comprend que sa planète, Krypton, est au bord de l\'annihilation, il décide d\'envoyer son fils unique, Kal-El, sur la planète Terre dans le but de sauver sa race. Kal-El est recueilli par des fermiers qui le nomment Clark et lui apprennent à cacher ses pouvoirs surnaturels pour éviter d\'effrayer les Terriens. Clark grandit et finit par découvrir ses origines.', 143, 2, 'https://fr.web.img3.acsta.net/pictures/210/081/21008110_20130524125237634.jpg', 3, 7),
	(12, 'Danse avec les loups', 1991, 'Dans un avant-poste de l\'Ouest américain, la vie d\'un soldat est transformée au contact d\'une tribu indienne.', 181, 5, 'https://fr.web.img5.acsta.net/medias/nmedia/18/83/23/81/19672460.jpg', 4, 0),
	(13, 'History of violence', 2005, 'Lorsqu\'une paire de petits criminels tente de voler son restaurant de petite ville, Tom Stall les tue rapidement. Au milieu de la couverture médiatique des actions apparemment héroïques de Tom, un étranger menaçant nommé Carl Fogarty arrive en ville et révèle que le père de famille serait en fait un criminel de Philadelphie disparu depuis longtemps. À la grande horreur de sa femme, Edie, et de son fils adolescent, Jack, Tom découvre qu\'il doit affronter son passé violent.', 96, 4, 'https://fr.web.img6.acsta.net/medias/nmedia/18/35/52/32/18449720.jpg', 5, 0),
	(14, 'Avatar 2', 2022, 'Jake Sully et Ney\'tiri ont formé une famille et font tout pour rester aussi soudés que possible. Ils sont cependant contraints de quitter leur foyer et d\'explorer les différentes régions encore mystérieuses de Pandora. Lorsqu\'une ancienne menace refait surface, Jake va devoir mener une guerre difficile contre les humains.', 192, 3, 'https://fr.web.img4.acsta.net/pictures/22/11/02/14/49/4565071.jpg', 6, 17),
	(25, 'Interstellar', 2014, 'Le film raconte les aventures d&rsquo;un groupe d&rsquo;explorateurs qui utilisent une faille r&eacute;cemment d&eacute;couverte dans l&rsquo;espace-temps afin de repousser les limites humaines et partir &agrave; la conqu&ecirc;te des distances astronomiques dans un voyage interstellaire. ', 169, 4, 'https://fr.web.img6.acsta.net/pictures/14/09/24/12/08/158828.jpg', 2, 1),
	(27, 'Titanic', 1997, 'En 1997, l&#039;&eacute;pave du Titanic est l&#039;objet d&#039;une exploration fi&eacute;vreuse, men&eacute;e par des chercheurs de tr&eacute;sor en qu&ecirc;te d&#039;un diamant bleu qui se trouvait &agrave; bord. Frapp&eacute;e par un reportage t&eacute;l&eacute;vis&eacute;, l&#039;une des rescap&eacute;es du naufrage, &acirc;g&eacute;e de 102 ans, Rose DeWitt, se rend sur place et &eacute;voque ses souvenirs. 1912.', 194, 4, 'https://www.chroniquedisney.fr/imgFiliale/20th/1997-titanic-01-big.jpg', 6, 21),
	(28, 'Braveheart', 1995, 'Au XIIIe si&egrave;cle, le jeune William Wallace revient en &Eacute;cosse apr&egrave;s plusieurs ann&eacute;es d&#039;exil. Il &eacute;pouse en secret sa bien-aim&eacute;e Murron, pour &eacute;viter de se plier au droit de cuissage impos&eacute; par le roi d&#039;Angleterre, Edward 1er. Leur ruse est cependant d&eacute;couverte et Murron est ex&eacute;cut&eacute;e.', 178, 5, 'https://fr.web.img4.acsta.net/medias/nmedia/18/73/51/89/19209164.jpg', 8, 0),
	(29, 'The batman', 2022, 'Deux ann&eacute;es &agrave; arpenter les rues en tant que Batman et &agrave; insuffler la peur chez les criminels ont men&eacute; Bruce Wayne au coeur des t&eacute;n&egrave;bres de Gotham City. Avec seulement quelques alli&eacute;s de confiance - Alfred Pennyworth, le lieutenant James Gordon - parmi le r&eacute;seau corrompu de fonctionnaires et de personnalit&eacute;s de la ville, le justicier solitaire s&#039;est impos&eacute; comme la seule incarnation de la vengeance parmi ses concitoyens. Lorsqu&#039;un tueur s&#039;en prend &agrave; l&#039;&eacute;lite de Gotham par une s&eacute;rie de machinations sadiques, une piste d&#039;indices cryptiques envoie le plus grand d&eacute;tective du monde sur une enqu&ecirc;te dans la p&egrave;gre, o&ugrave; il rencontre des personnages tels que Selina Kyle, alias Catwoman, Oswald Cobblepot, alias le Pingouin, Carmine Falcone et Edward Nashton, alias l&rsquo;Homme-Myst&egrave;re. Alors que les preuves s&rsquo;accumulent et que l&#039;ampleur des plans du coupable devient clair, Batman doit forger de nouvelles relations, d&eacute;masquer le coupable et r&eacute;tablir un semblant de justice au milieu de l&rsquo;abus de pouvoir et de corruption s&eacute;vissant &agrave; Gotham City depuis longtemps.', 177, 3, 'https://fr.web.img5.acsta.net/pictures/22/02/16/17/42/3125788.jpg', 10, 9);
/*!40000 ALTER TABLE `film` ENABLE KEYS */;

-- Listage de la structure de la table cinema_anthony. genre
CREATE TABLE IF NOT EXISTS `genre` (
  `id_genre` int NOT NULL AUTO_INCREMENT,
  `nom_genre` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  PRIMARY KEY (`id_genre`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- Listage des données de la table cinema_anthony.genre : ~8 rows (environ)
/*!40000 ALTER TABLE `genre` DISABLE KEYS */;
INSERT INTO `genre` (`id_genre`, `nom_genre`) VALUES
	(1, 'Fantasy'),
	(2, 'Super-héros'),
	(3, 'Aventure'),
	(4, 'Drame'),
	(5, 'Western'),
	(6, 'Action'),
	(8, 'Com&eacute;die'),
	(9, 'Science-fiction');
/*!40000 ALTER TABLE `genre` ENABLE KEYS */;

-- Listage de la structure de la table cinema_anthony. personne
CREATE TABLE IF NOT EXISTS `personne` (
  `id_personne` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `prenom` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `sexe` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `date_naissance` date NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  PRIMARY KEY (`id_personne`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- Listage des données de la table cinema_anthony.personne : ~22 rows (environ)
/*!40000 ALTER TABLE `personne` DISABLE KEYS */;
INSERT INTO `personne` (`id_personne`, `nom`, `prenom`, `sexe`, `date_naissance`, `photo`) VALUES
	(1, 'Jackson', 'Peter', 'H', '1961-10-31', 'https://fr.web.img3.acsta.net/pictures/14/12/04/10/39/195496.jpg'),
	(2, 'Nolan', 'Christopher', 'H', '1970-07-30', 'https://fr.web.img5.acsta.net/c_310_420/pictures/14/10/30/10/59/215487.jpg'),
	(3, 'Snyder', 'Zack', 'H', '1966-03-01', 'https://fr.web.img4.acsta.net/pictures/16/03/23/09/34/047873.jpg'),
	(4, 'Mortensen', 'Viggo', 'H', '1958-10-20', 'https://fr.web.img3.acsta.net/pictures/19/01/16/15/12/2728586.jpg'),
	(5, 'Bloom', 'Orlando', 'H', '1977-01-13', 'https://fr.web.img6.acsta.net/c_310_420/pictures/17/05/19/11/37/294423.jpg'),
	(6, 'McKellen', 'Ian', 'H', '1939-05-25', 'https://fr.web.img2.acsta.net/c_310_420/pictures/14/12/04/10/40/127447.jpg'),
	(7, 'Tyler', 'Liv', 'F', '1977-07-01', 'https://fr.web.img4.acsta.net/c_310_420/pictures/19/08/30/10/22/5000319.jpg'),
	(8, 'Freeman', 'Martin', 'H', '1971-09-08', 'https://fr.web.img5.acsta.net/pictures/18/01/30/10/47/4457967.jpg'),
	(9, 'Bale', 'Christian', 'H', '1974-01-30', 'https://fr.web.img2.acsta.net/pictures/19/01/22/16/22/0699464.jpg'),
	(10, 'Ledger', 'Heath', 'H', '1979-04-04', 'https://fr.web.img6.acsta.net/pictures/15/10/15/16/48/316438.jpg'),
	(11, 'Affleck', 'Ben', 'H', '1972-08-15', 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/70/Ben_Affleck_by_Gage_Skidmore_3.jpg/640px-Ben_Affleck_by_Gage_Skidmore_3.jpg'),
	(12, 'Cavill', 'Henry', 'H', '1983-05-05', 'https://file1.closermag.fr/var/closermag/storage/images/bio-people/biographie-henry-cavill-112749/826373-1-fre-FR/Henry-Cavill.jpg?alias=square500x500&size=x100&format=jpeg'),
	(13, 'Costner', 'Kevin', 'H', '1955-01-18', 'https://fr.web.img6.acsta.net/pictures/15/07/07/12/21/389121.jpg'),
	(14, 'Holm', 'Ian', 'H', '1931-09-12', 'https://upload.wikimedia.org/wikipedia/commons/c/c2/Ian_Holm.jpg'),
	(15, 'Cronenberg', 'David', 'H', '1943-03-15', 'https://fr.web.img4.acsta.net/c_310_420/medias/nmedia/18/35/26/42/20063277.jpg'),
	(16, 'Cameron', 'James', 'H', '1954-08-16', 'https://fr.web.img6.acsta.net/c_310_420/pictures/22/12/07/15/19/3602099.jpg'),
	(32, 'Gibson', 'Mel', 'Homme', '1956-01-03', 'https://fr.web.img4.acsta.net/pictures/16/05/23/10/09/431481.jpg'),
	(33, 'Gibson', 'Mel', 'Homme', '1956-01-03', 'https://fr.web.img4.acsta.net/pictures/16/05/23/10/09/431481.jpg'),
	(34, 'Mcconaughey', 'Matthew', 'Homme', '1969-11-04', 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/bf/Matthew_McConaughey_2019_%2848648344772%29.jpg/1200px-Matthew_McConaughey_2019_%2848648344772%29.jpg'),
	(35, 'Saldana', 'Zoé', 'Femme', '1978-06-19', 'https://cdn-elle.ladmedia.fr/var/plain_site/storage/images/personnalites/zoe-saldana/51304340-1-fre-FR/Zoe-Saldana.jpg'),
	(37, 'Reeves', 'Matt', 'Homme', '1966-04-27', 'https://upload.wikimedia.org/wikipedia/commons/b/bd/Matt_Reeves_%2813949211144%29_CROPPED.jpg'),
	(38, 'Pattinson', 'Robert', 'Homme', '1986-05-13', 'https://fr.web.img3.acsta.net/pictures/17/05/29/13/41/530000.jpg'),
	(39, 'Dicaprio', 'Leonardo', 'Homme', '1974-11-11', 'https://fr.web.img5.acsta.net/pictures/15/06/24/14/36/054680.jpg');
/*!40000 ALTER TABLE `personne` ENABLE KEYS */;

-- Listage de la structure de la table cinema_anthony. realisateur
CREATE TABLE IF NOT EXISTS `realisateur` (
  `id_realisateur` int NOT NULL AUTO_INCREMENT,
  `id_personne` int DEFAULT NULL,
  PRIMARY KEY (`id_realisateur`),
  KEY `id_personne` (`id_personne`),
  CONSTRAINT `FK_realisateur_personne` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- Listage des données de la table cinema_anthony.realisateur : ~8 rows (environ)
/*!40000 ALTER TABLE `realisateur` DISABLE KEYS */;
INSERT INTO `realisateur` (`id_realisateur`, `id_personne`) VALUES
	(1, 1),
	(2, 2),
	(3, 3),
	(4, 13),
	(5, 15),
	(6, 16),
	(8, 32),
	(10, 37);
/*!40000 ALTER TABLE `realisateur` ENABLE KEYS */;

-- Listage de la structure de la table cinema_anthony. role
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int NOT NULL AUTO_INCREMENT,
  `nom_role` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- Listage des données de la table cinema_anthony.role : ~14 rows (environ)
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` (`id_role`, `nom_role`) VALUES
	(1, 'Batman'),
	(2, 'Aragorn'),
	(3, 'Legolas'),
	(4, 'Joker'),
	(5, 'Gandalf'),
	(6, 'Bilbon'),
	(7, 'John Dunbar'),
	(8, 'Superman'),
	(9, 'Jonathan Kent'),
	(10, 'Arwen'),
	(11, 'Tom Stall'),
	(16, 'William Wallace'),
	(17, 'Joseph Cooper'),
	(18, 'Neytiri'),
	(19, 'Jack Dawson');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 16, 2021 at 08:07 PM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `administratorcomments`
--

DROP TABLE IF EXISTS `administratorcomments`;
CREATE TABLE IF NOT EXISTS `administratorcomments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Comment` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `administratorcomments`
--

INSERT INTO `administratorcomments` (`id`, `Comment`) VALUES
(15, 'This Application was made with PHP!');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `UserName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `NewsName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Comment` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `Category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `UserName`, `NewsName`, `Comment`, `Category`) VALUES
(1, 'Administrator', 'Designer molecules could create tailor-made quantum devices', 'Science Rocks!', 'Science'),
(2, 'Administrator', 'Preşedintele Iohannis s-a întâlnit cu Patriahul Daniel. Nu există detalii publice despre discuții', 'Klaus Iohannis ...... o stire despre presedinte!', 'Politics'),
(4, 'Administrator', 'Lora, totul despre relația cu Ionuț Ghenu', 'Interesant', 'Celebrity'),
(10, 'Mihai', 'Gigi Becali și Mihai Rotaru au bătut palma în secret, „Chiar îl admir pentru asta!”', 'Acesta este comentariul lui Mihai', 'Sports'),
(7, 'Mihai', 'Federal judge blocks last-minute Trump rule limiting asylum claims', 'Interesting', 'Politics'),
(8, 'Administrator', 'Federal judge blocks last-minute Trump rule limiting asylum claims', 'Administrator Comment Here', 'Politics'),
(9, 'Administrator', 'Gigi Becali și Mihai Rotaru au bătut palma în secret, „Chiar îl admir pentru asta!”', 'Uau!', 'Sports'),
(11, 'Gabriel', 'Gigi Becali și Mihai Rotaru au bătut palma în secret, „Chiar îl admir pentru asta!”', 'Acesta este comentariul lui Gabriel', 'Sports');

-- --------------------------------------------------------
--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Text` varchar(10000) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `Category`, `Title`, `Text`) VALUES
(1, 'Science', 'Designer molecules could create tailor-made quantum devices', 'Quantum bits made from “designer molecules” are coming into fashion. By carefully tailoring the composition of molecules, researchers are creating chemical systems suited to a variety of quantum tasks.\r\n\r\n“The ability to control molecules … makes them just a beautiful and wonderful system to work with,” said Danna Freedman, a chemist at Northwestern University in Evanston, Ill. “Molecules are the best.” Freedman described her research February 8 at the annual meeting of the American Association for the Advancement of Science, held online.\r\n\r\nQuantum bits, or qubits, are analogous to the bits found in conventional computers. But rather than existing in a state of either 0 or 1, as standard bits do, qubits can possess both values simultaneously, enabling new types of calculations impossible for conventional computers.\r\n\r\nBesides their potential use in quantum computers, molecules can also serve as quantum sensors, devices that can make extremely sensitive measurements, such as sussing out minuscule electromagnetic forces (SN: 3/23/18).\r\n\r\nIn Freedman and colleagues’ qubits, a single chromium ion, an electrically charged atom, sits at the center of the molecule. The qubit’s value is represented by that chromium ion’s electronic spin, a measure of the angular momentum of its electrons. Additional groups of atoms are attached to the chromium; by swapping out some of the atoms in those groups, the researchers can change the qubit’s properties to alter how it functions.\r\n\r\nRecently, Freedman and colleagues crafted molecules to fit one particular need: molecular qubits that respond to light. Lasers can set the values of the qubits and help read out the results of calculations, the researchers reported in the Dec. 11 Science. Another possibility might be to create molecules that are biocompatible, Freedman says, so they can be used for sensing conditions inside living tissue.\r\n\r\nMolecules have another special appeal: All of a given type are exactly the same. Many types of qubits are made from bits of metal or other material deposited on a surface, resulting in slight differences between qubits on an atomic level. But using chemical techniques to build up molecules atom by atom means the qubits are identical, making for better-performing devices. “That’s something really powerful about the bottom-up approach that chemistry affords,” said Freedman.\r\n\r\nScientists are already using individual atoms and ions in quantum devices (SN: 6/29/17), but molecules are more complicated to work with, thanks to their multiple constituents. As a result, molecules are a relatively new quantum resource, Caltech physicist Nick Hutzler said at the meeting. “People don’t even really know what you can do with [molecules] yet.… But people are discovering new things every day.”\r\n\r\n'),
(2, 'Science', 'Drones could help create a quantum internet', '\r\n\r\nThe quantum internet may be coming to you via drone.\r\n\r\nScientists have now used drones to transmit particles of light, or photons, that share the quantum linkage called entanglement. The photons were sent to two locations a kilometer apart, researchers from Nanjing University in China report in a study to appear in Physical Review Letters.\r\n\r\nEntangled quantum particles can retain their interconnected properties even when separated by long distances. Such counterintuitive behavior can be harnessed to allow new types of communication. Eventually, scientists aim to build a global quantum internet that relies on transmitting quantum particles to enable ultrasecure communications by using the particles to create secret codes to encrypt messages. A quantum internet could also allow distant quantum computers to work together, or perform experiments that test the limits of quantum physics.\r\n\r\nQuantum networks made with fiber-optic cables are already beginning to be used (SN: 9/28/20). And a quantum satellite can transmit photons across China (SN: 6/15/17). Drones could serve as another technology for such networks, with the advantages of being easily movable as well as relatively quick and cheap to deploy.\r\n\r\nThe researchers used two drones to transmit the photons. One drone created pairs of entangled particles, sending one particle to a station on the ground while relaying the other to the second drone. That machine then transmitted the particle it received to a second ground station a kilometer away from the first. In the future, fleets of drones could work together to send entangled particles to recipients in a variety of locations.\r\n'),
(3, 'Celebrity', 'Meghan McCain Has Epic Clapback for Troll Criticizing Her Hair Extensions', 'She said what she said! Meghan McCain is not here for the negative feedback she received for her choice to wear hair extensions.\r\n\r\nThe conservative commentator, 36, debuted her chic high ponytail on The View on Tuesday, February 9. She gushed about her new look via her Instagram Stories, writing, “I LOVE A HIGH PONY!”\r\n\r\nDespite McCain’s excitement for her hairdo, one troll took issue with her hair’s longer-than-usual appearance as they sarcastically tweeted, “Meghan’s natural hair grew really fast.”\r\n\r\nThe broadcaster promptly put the hater in their place with her perfectly executed response. “Can a bitch experiment with extensions and hair pieces? It’s the pandemic,” she explained. “I don’t have that much to entertain me anymore.”\r\n\r\nThe social media user’s tweet has since been deleted.\r\n\r\nMcCain continued to experiment with her hair on The View’s Wednesday, February 10, episode. She took inspiration from former Spice Girls member Emma Bunton as she donned high buns.\r\n\r\n“LOVE BABY SPICE BUNS!” she captioned her Instagram Stories selfie, while noting in another, “My EP @bteta44 says I look like [I have] Queen Amidala hair [from Star Wars].”\r\n\r\nThe Arizona native has been very vocal in the past regarding criticism about her appearance. During a March 2020 episode of the daytime talk show, she opened up about the different standards women in the public eye are held to compared to men.\r\n\r\n“I hope this doesn’t come across as arrogant in any way, but I think I’m really good at talking about politics,” she shared at the time. “It’s the only thing I think I’m really good at. But I would like to talk about politics and not have every comment be about the way I look and my weight. It makes you feel weird. Men just don’t have that problem.”\r\n\r\n\r\nShe added, “Everyone talks about how we look on this show all the time. Can’t you just hear what we have to say?”\r\n\r\nThe following month, McCain revealed that she would not be coloring her hair amid the coronavirus pandemic, despite being days away from going gray.\r\n\r\n“Look at this, I’ve got another like, 10 days left before it’s full gray everywhere,” she said on The View in April 2020 while pointing to her roots. “There’s nothing we can do. I’m too scared to use a box product at home because I burned my hair off in high school. This is the world we’re living in.”\r\n\r\nThe former Fox News personality welcomed her first child, daughter Liberty, with husband Ben Domenech in September 2020. Shortly after her little one’s birth, she raved about her entry into parenthood.\r\n\r\n“Motherhood is euphoria. All of the cliches have come true and exceeded well beyond my wildest expectations,” she wrote via Instagram in October 2020. “It is hands down the best thing I have ever done in my entire life and I am completely in awe of our daughter.”\r\n'),
(4, 'Celebrity', 'Lora, totul despre relația cu Ionuț Ghenu', 'Lora, dezvăluiri despre relația cu Ionut Ghenu\r\n\r\nLora a avut un mariaj în trecut cu Dan Badea, un cunoscut comediant, dar relația lor nu a avut succes, ei divorțând oficial pe data de 13 octombrie 2014 după doi ani de relație. Lora este fericită alături de actualul ei partener, Ionuț Ghenu, dar cei doi au trecut prin multe momente grele.\r\n\r\n„A fost o relație atât de încercată și atât de greșit interpretată, am fost acuzați că suntem împreună când eram mai mult colegi, nici măcar prieteni, dar era un membru prea important în echipă ca să pot renunța la el. Când nu am mai avut influențe din exterior și am fost persoane libere, totul s-a schimbat: a venit natural să ne împrietenim, apoi a urmat un scandal mediatic provocat, iar în urma acelui scandal ne-am apropiat foarte mult.”, a spus cântăreața într-un interviu cu revista Viva!.\r\n\r\n\r\n„Apoi, fiind tot pe drumuri împreună, prin țară, la concerte și nu numai, a promovat pe rolul de manager, lucru care a alimentat și mai mult zvonurile referitoare la apropiere. De acolo a fost doar un pas să îi spun că nu voi mai găsi pe nimeni, deoarece lumea credea că sunt cu el.”, a adăugat aceasta.\r\n\r\nMai mult, rudele lui Ionuț Ghenu i-au sprijinit pe cei doi: „Surorile lui, care au fost o parte importantă din povestea noastră, prietenia dintre mine și surorile lui, senzația că ne cunoaștem dintotdeauna și că suntem parte din familie, m-au făcut să-l cunosc mai bine. Aveam o chimie pe care noi nu o conștientizam și a fost cu artificii când am conștientizat-o. A fost o revelație extraordinară.”\r\nLora, cerută în căsătorie de două ori\r\n\r\nLora a fost cerută de două ori în căsătorie de către partenerul ei, Ionuț Ghenu, iar ambele momente au fost superbe, cântăreața amintindu-și cu drag de ele. Aceasta a dezvăluit acum totul despre cum a pus totul la punct iubitul ei, acesta având grijă să îi facă surprize uriașe.\r\n\r\n„A existat o cerere în căsătorie, într-o bărcuță mai fancy, nu s-a pus în genunchi, că nu avea cum, dar m-a urcat pe mine în bărcuță, undeva la jumătate între Serbia și România, iar eu fiind gălățeancă, crescută pe malul Dunării, a fost locul perfect. Mi-a arătat o peșteră frumoasă, iar când m-am întors, el era cu o cutie și inel. A fost un moment atât de frumos!”, a zis vedeta pentru publicația menționată mai sus.\r\n\r\nCât despre a doua cerere în căsătorie, cântăreața a dezvăluit: „Apoi, m-a mai cerut o dată, într-o seară de 8 Martie. M-a trezit din somn după vacanța din Maldive și mi-a oferit un al doilea inel, care are o piatră în culoarea apei din Maldive, ca să ne amintească de acea perioadă frumoasă.”\r\n\r\n'),
(12, 'Politics', 'Federal judge blocks last-minute Trump rule limiting asylum claims', 'A federal judge in California blocked a Trump-era rule that went into effect just a day before Joe Biden took office and sought to dramatically limit the ability of Central American migrants to claim asylum in the United States\r\nThe regulation, which prohibited migrants who have resided in or traveled through third countries from seeking asylum in the US, was part of a concerted effort by the Trump administration to tighten asylum along the US-Mexico border. Courts had previously moved to block the regulation. \r\n\r\n&#34;As with the Interim Rule, the Final Rule deprives vulnerable asylum applicants of essential procedural safeguards designed to avoid arbitrary denials of asylum,&#34; wrote Judge Jon Tigar. &#34;Also, rather than ensure their safety, the rule increases the risk asylum applicants will be subjected to violence...For these reasons, and the additional reasons set forth below, the Court now enjoins the Final Rule from taking effect.&#34;\r\nTigar also found that former acting Homeland Security Secretary Chad Wolf lacked the authority to issue the final rule, becoming the latest in a string of judges who called Wolf&#39;s previous position at the top of the department into question. Wolf stepped down from the role in early January.\r\nIt&#39;s unlikely that the Justice Department will defend the Trump-era asylum rule moving forward, given the Biden administration&#39;s commitment to restoring asylum at the southern border, rather than limiting it.\r\n\r\nBiden, who pledged to reverse former President Donald Trump hardline policies, has called for the review of immigration regulations issued under his predecessor, while cautioning that changes will take time.\r\nLater this week, the administration is expected to begin the gradual entry of migrants subject to a Trump-era asylum policy that forced migrants to wait in Mexico until their immigration court date in the US\r\n\r\n\r\n'),
(6, 'Politics', 'Preşedintele Iohannis s-a întâlnit cu Patriahul Daniel. Nu există detalii publice despre discuții', 'Preşedintele Klaus Iohannis s-a întâlnit marţi cu Patriahul Daniel, la Reşedinţa Patriarhală. Potrivit Agenţiei de Presă Basilica a Patriarhiei Române, nu s-au oferit detalii publice despre discuţiile purtate.\r\n\r\n\r\n“A fost o vizită firească la început de an, o întâlnire oficială în spiritul dialogului dintre două instituţii importante ale societăţii româneşti pe temele actuale ale acesteia”, a declarat purtătorul de cuvânt al Patriarhiei, Vasile Bănescu, conform sursei citate.\r\n\r\nBănescu nu a luat parte la întâlnire.\r\n\r\n\r\n“Preşedintele însuşi nu a făcut nicio declaraţie în acest sens, ceea ce indică nu doar caracterul interinstituţional, ci şi pe cel interpersonal al acestei întâniri”, a afirmat Vasile Bănescu, potrivit Agerpres.\r\n\r\nPatriarhul şi preşedintele s-au mai întâlnit public în luna martie a anului trecut, atunci când Klaus Iohannis a primit Premiul European “Coudenhove-Kalergi”, mai informează Basilica.\r\n\r\n'),
(8, 'Sports', 'India v England Hosts win second Test in Chennai by 317 runs', 'England succumbed to an inevitable 317-run defeat by India on the fourth day of the second Test in Chennai.\r\n\r\nFaced with the hopeless task of chasing 482 on a deteriorating pitch, England lost all 10 wickets to spin as they were bowled out for 164 to leave the four-Test series poised at 1-1.\r\n\r\nOnly captain Joe Root provided prolonged resistance, but even he needed plenty of fortune in his 33, before Moeen Ali chanced his arm for 43 off only 18 balls.\r\n\r\nDebutant left-arm spinner Axar Patel claimed 5-60, while off-spinner Ravichandran Ashwin took 3-53 - and match figures of 8-96 - to go with a century in India&#39;s second innings.\r\n\r\nAfter two matches in Chennai, the series moves to Ahmedabad, with the day-night third Test beginning on 24 February.\r\n\r\nMoeen will miss those matches, choosing to go home as part of England&#39;s rotation policy.\r\n\r\n    &#39;He wants to get out of the bubble&#39; - Moeen chooses to miss final two Tests\r\n    Kohli defends controversial Chennai pitch\r\n    TMS podcast: Analysis of India&#39;s emphatic victory\r\n\r\nIndia fightback leaves series poised\r\n\r\nHalfway through, this series between two Test heavyweights is living up to its billing.\r\n\r\nAfter England produced one of their finest away performances to win the first Test by 227 runs, India have dominated the second, exploiting their expertise in dusty, spinning conditions.\r\n\r\nWhile the tourists cashed in on winning the toss in the first Test, India did the same in the second. Even if this match will be remembered for the pitch, that should not detract from the fact that the home side have been vastly superior.\r\n\r\n    &#39;You may as well play on a beach - Chennai pitch not good enough for Test cricket&#39;\r\n\r\nBetween them, Rohit Sharma and Ashwin made more runs than the entire England team. Ashwin and Axar applied more pressure than England spinners Jack Leach and Moeen, while Rishabh Pant pulled off as many moments of wicketkeeping brilliance as Ben Foakes.\r\n\r\nThe floodlit third Test, played with the pink ball, will add a different dynamic, with pace bowling perhaps having a bigger role.\r\n\r\nOn the line in the final two matches will not only be the outcome of the series, but also a place in the World Test Championship final. England, India or Australia can make it through to meet New Zealand in June.\r\n\r\n    India v England - schedule\r\n\r\nIndia sweep to victory\r\n\r\nFrom 53-3 overnight, England&#39;s only goal on the fourth day was to survive as long as possible on a pitch offering huge and unpredictable turn as well as occasional spitting bounce.\r\n\r\nDan Lawrence tried to be proactive, running at Ashwin&#39;s first ball to be nutmegged, with Pant completing a spectacular diving stumping.\r\n\r\nIn contrast, Ben Stokes was almost shot-less, tormented by Ashwin in making eight from 51 balls before he offered a bat-pad catch.\r\n\r\nWhile Root survived offering a simple chance to Mohammed Siraj off a reverse sweep, Ollie Pope and Foakes were caught miscuing conventional sweeps.\r\n\r\nRoot, though, could do nothing about a snorter from Axar that took the glove and was held at gully.\r\n\r\nWith the game gone, Moeen blazed five mighty sixes and was in with a chance of the fastest half-century in Test cricket, only to be the last man out, stumped by some distance off Kuldeep Yadav.\r\nEngland left to regroup\r\n\r\nThis is the first blemish on a winter that had seen England win their three previous Tests, an overall run of six successive away wins going back to December 2019.\r\n\r\nAlthough defeat in Chennai was reminiscent of their historical struggles in Asia, in particular the 4-0 hammering on their last tour of India, there are still reasons for optimism looking to Ahmedabad.\r\n\r\nIn the one previous pink-ball Test in India, albeit in Kolkata, none of the hosts&#39; spinners took a wicket in the victory over Bangladesh, the only occasion that has happened in an India home win.\r\n\r\nSeamer-friendly conditions in Ahmedabad would be more suitable to England than the turn of Chennai, with seamer James Anderson - rested this week - likely to come back into the side.\r\n\r\nEngland will also have Jonny Bairstow available after he was rested for the first two Tests, with Zak Crawley also potentially fit following a wrist injury. They would provide alternatives to Rory Burns or Lawrence.\r\n\r\nSam Curran and Mark Wood have also rejoined the squad, while Jofra Archer could also be available after missing the second Test with an elbow problem.\r\n&#39;We are very much in this series&#39; - what they said\r\n\r\nEngland captain Joe Root: &#34;Credit has to go to India. They outplayed us in all three departments.\r\n\r\n&#34;We are 1-1 in the series with two important games to come. We are very much in this series. It is set up very nicely.\r\n\r\nIndia captain Virat Kohli: &#34;It was a bit strange in the first game playing at home without the crowd. This game the crowd made a massive difference.\r\n\r\n&#34;Our application with the bat was outstanding. Conditions were challenging for both sides but we showed more application to grit it out. It was a perfect game for us.&#34;\r\n\r\n\r\nPlayer of the match Ravichandran Ashwin: &#34;This wicket is very different to what we played on in the first game. The balls that were doing much were not getting wickets. You had to play on the mind of batsmen to get wickets.\r\n\r\n&#34;It is easy to say &#39;go out bowl and you will get wickets&#39;. It&#39;s not as easy as it looks. It takes a certain amount of guile to be able to do it.&#34;\r\n\r\nFormer England captain Michael Vaughan on The Cricket Social: &#34;England can&#39;t just say &#39;these things happen on these kinds of wickets&#39; because they will come up against India again in the next two Tests on similar kinds of wickets. It&#39;s all about how they improve and learn.&#34;'),
(13, 'Sports', 'Gigi Becali și Mihai Rotaru au bătut palma în secret, „Chiar îl admir pentru asta!”', 'Gigi Becali (62 de ani) și Mihai Rotaru (46 de ani) au făcut pace și anunță o înțelegere inedită. FCSB și CS Universitatea Craiova nu vor mai concura pe piața transferurilor. \r\n\r\n    Pe 7 mai 2017, CS Universitatea Craiova, condusă atunci de Gigi Mulțescu, a trimis o echipă experimentală, cu mulți tineri, în meciul cu Viitorul și a pierdut, scor 0-1. FCSB lupta cu echipa lui Hagi la titlu;\r\n    Pe 31 iulie 2020, FCSB a folosit multe rezerve în meciul cu CFR Cluj, pierdut 0-2. „Feroviarii” concurau cu CS Universitatea Craiova pentru titlu. \r\n\r\nFCSB și CS Universitatea Craiova, alături de CFR Cluj, sunt cele mai potente echipe din Liga 1. Gigi Becali și Mihai Rotaru au convenit să nu mai liciteze unul împotriva celuilalt, pentru același fotbalist. Patronul bucureștenilor va avea prioritate la transferuri în vară, iar rândul oltenilor va veni în următoarea perioadă de transferuri. \r\n\r\n\r\n\r\nGigi Becali a dezvăluit înțelegerea cu Mihai Rotaru\r\n\r\n„Am convenit, am căzut la pace. El a făcut ce a făcut cu Viitorul, eu am făcut ce am făcut cu CFR. Da, recunosc, în meciul ăla m-am răzbunat. Mi-a zis omul (n.r. Mihai Rotaru), cu totul respectul, și chiar îl admir pentru asta: «Tu, că ești mai bătrân, te las pe tine să alegi primul, din respect. Apoi aleg eu. Ca să nu ne mai concurăm. De ce să ne mai concurăm? Prima perioadă alegi tu, a doua eu». A zis să încep eu. Consider că nu are rost să se mai răzbune acum”, a declarat Gigi Becali, la „Digi Sport Special”.\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `newscategory`
--

DROP TABLE IF EXISTS `newscategory`;
CREATE TABLE IF NOT EXISTS `newscategory` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Sports` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Politics` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Celebrity` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Science` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `newscategory`
--

INSERT INTO `newscategory` (`id`, `Sports`, `Politics`, `Celebrity`, `Science`) VALUES
(1, '', '', '', 'Designer molecules could create tailor-made quantum devices'),
(2, '', '', '', 'Drones could help create a quantum internet'),
(3, '', '', 'Meghan McCain Has Epic Clapback for Troll Criticizing Her Hair Extensions', ''),
(4, '', '', 'Lora, totul despre relația cu Ionuț Ghenu', ''),
(6, '', 'Preşedintele Iohannis s-a întâlnit cu Patriahul Daniel. Nu există detalii publice despre discuții', '', ''),
(8, 'India v England Hosts win second Test in Chennai by 317 runs', '', '', ''),
(12, 'Gigi Becali și Mihai Rotaru au bătut palma în secret, „Chiar îl admir pentru asta!”', '', '', ''),
(11, '', 'Federal judge blocks last-minute Trump rule limiting asylum claims', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `usersdata`
--

DROP TABLE IF EXISTS `usersdata`;
CREATE TABLE IF NOT EXISTS `usersdata` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `LastName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `UserName` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `usersdata`
--

INSERT INTO `usersdata` (`id`, `Name`, `LastName`, `UserName`, `Password`, `Email`) VALUES
(2, 'Administrator', 'Administrator', 'Administrator', 'AdministratorPass12', 'Administrator@gmail.com'),
(14, 'Mihai', 'Istrate', 'Mihai', 'Mihai96', 'i.mihai9960@gmail.com'),
(16, 'Gabriel', 'Popescu', 'Gabriel', 'Gabriel007', 'gabriel@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

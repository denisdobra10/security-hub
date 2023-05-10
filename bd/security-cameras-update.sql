-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2023 at 09:36 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `security-cameras`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `products` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `products`) VALUES
(5, 3, '[]');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `products` text NOT NULL,
  `totalPrice` decimal(10,2) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `notes` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `image`, `description`, `price`, `category`) VALUES
(14, 'Camera de exterior Dahua, 5MP, lentila 3.6mm, IR 40m, HAC-HFW1500THP-I4-0360B', '644650337bc03-hac-hfw1500th-i4-1-21_1.jpg', 'Camera de supraveghere pentru exterior, Dahua HAC-HFW1500THP-I4 cu rezolutia de 5 MP si format de imagine 16:9 ideala pentru a supraveghea spatiile largi, de la inaltime.\r\n\r\nCamera permite inregistrarea imaginilor de calitate, chiar si pe timpul noptii. Pe timp de noapte veti putea surprinde cadre pe o distanta de pana la 40 de metri. Camera are o serie de functii care o \"ajuta\" sa redea imagini clare, cu detaliile necesare, fara ca imaginea sa fie sub sau supraexpusa.\r\n\r\nAceasta functie reduce intensitatea luminii orbitoare. De exemplu, este foarte eficienta in recunoasterea numerelor de inmatriculare a masinilor pe timp de noapte.\r\n\r\n\r\nDigital Wide Dynamic Range - D-WDR\r\nD-WDR permite camerei de supraveghere sa filtreze lumina din spatele unui obiect si astfel permite vizualizarea de detalii asupra obiectului. ', '107.99', 'Wired'),
(16, 'Camera supraveghere IP Dome Hikvision, 4 MP, IR 30m, lentila 2.8 mm, PoE, DS-2CD1143G0-I', '644650ccc1dee-cameraiphikvisiong0i.jpg', 'Camera de supraveghere IP tip dome DS-2CD1143G0-I de la Hikvision este alegerea ideala pentru captarea imaginilor la o calitate superioara. Aceasta camera are o rezolutie video de 2560 × 1440 pixeli cu 20 de cadre pe secunda, inregistrarile fiind facute la o calitate inalta, datorita senzorului CMOS de 1/3 inch.\r\n\r\nLentila fixa de 2.8 mm iti permite un unghi vizual de 98° (testat de producatori in conditii optime).\r\n\r\nAceasta camera functioneaza chiar si pe intuneric complet. Va inregistra pana la o distanta de 30m.\r\n\r\nFunctia de detectare miscare reprezinta o calitate foarte importanta a camerei de supraveghere IP Hikvision DS-2CD1143G0-I.\r\n\r\nCamera poate fi setata sa trimita o alarma catre aplicatia mobila sau NVR si sa inceapa inregistrarea doar atunci cand detecteaza miscare in cadru. Astfel pe mediul de stocare ales nu o sa se salveze imagini statice fara miscare.\r\n\r\nTehnologia HLC ajuta la reducerea luminilor puternice pe timp de noapte prin aplicarea unei expuneri mici pe lumini. Astfel o sa puteti identifica peroanele care tin in mana o lanterna sau numarul de inmatriculare a unei masini.', '349.99', 'Wired'),
(17, 'Camera bullet, 2 MP HDCVI, Smart IR 20 m, lentila 3.6mm, Dahua, HAC-B1A21-0360B', '644650f86237b-camera-bullet-dahua-rezolutie-5mp-lentila-fixa-3-6-mm-hdcvi-smart-ir-20m-hac-b1a51-0360b-877.jpg', 'Aceasta camera este 4 in 1. Atentie! Folositi meniul OSD din DVR pentru a schimba din formatul HDCVI in alte formate video. Folositi controller-ul UTC PFM820 (Achizitionat separat) pentru a schimba din formatul HDCVI in formatul video CVBS.\r\n\r\nAceasta camera va inregistra Full HD cu 1920 ×1080 pixeli si 25 de cadre pe secunda. Totodata lentila este fixa de 3.6 mm, astfel unghiul vizual captat este de 93°.\r\n\r\nLED-urile IR incorporate in camera de supraveghere se vor aprinde automat pe timpul noptii sau in momentul in care, cadrul nu dispune de suficienta lumina. Acestea vor capta imagini clare pe distanta de 20 de metri.\r\n\r\nCamera supraveghere cu carcasa rezistenta, compacta. Are un index de protectie IP67. \r\n\r\nAvand indexul de protectie mare, camera este extrem de rezistenta la conditii meteo nefavorabile, cum ar fi: ploi, temperaturi extreme, vant si praf. ', '62.99', 'Wired'),
(18, 'Camera dome 5MP, antivandal IK10, lentila 2.8mm, IR 30m, Dahua HAC-HDBW1500E-028', '6446511bb8967-hac-hdbw1500e-0280b_d.jpg', 'Camera dome Dahua HAC-HDBW1500E-028 inregistreaza imagini la rezolutie superioara de 5 megapixeli. Datorita lentilei fixe de 2.8mm, veti putea obtine imagini cu un camp vizual mare, de 111° (conform fisei tehnice). Astfel, puteti utiliza aceasta camera pentru supraveghea incaperi mari, pentru a obtine imagini de ansamblu.\r\n\r\nPe timp de noapte sau in conditii de iluminare scazute, cu aceasta camera puteti obtine imagini clare pe o distanta de pana la 30 metri. \r\n\r\nFiind o camera all in one, aceasta camera este compatibila cu DVR-uri pe orice tehnologie, astfel ca nu mai trebuie sa va faceti griji daca se potriveste cu DVR-ul dvs., in cazul in care detineti deja unul.\r\n\r\n \r\n\r\nCarcasa metalica, antivandal\r\n\r\nCarcasa acestui model de camera este una compacta, de metal. Mai mult, a fost conceputa sa reziste tentativelor de distrugere. Este cotata cu un index de protectie IK10, ceea ce inseamna ca va rezista la lovituri si atunci cand se incearca smulgerea ei.', '249.99', 'Wired'),
(19, 'Camera dome 5 Megapixeli , IR 30 de metri, lentila fixa de 2.8 mm, audio, IP 67, DS-2CE76H0T-ITMFS', '644651c78a391-camera-dome-5-megapixeli-ir-30-de-metri-lentila-fixa-de-2-8-mp-audio-ip-67-971_1.jpg', 'Camera dome DS-2CE76H0T-ITMFS inregistreaza imagini la o rezolutie mare, de 5 megapixeli. Vine echipata cu o lentila fixa de 2.8 mm, care inregistreaza un cadru mediu, de 85.5°, astfel ca veti putea utiliza aceasta camera pentru supravegherea spatiilor mari, acolo unde aveti nevoie de imagini de ansamblu asupra unei zone. Spre exemplu, o puteti utiliza pentru supravegherea unor birouri, sali de asteptare sau de curs, institutii etc. \r\n\r\nAcest model de camera este echipat cu LED-uri infrarosii microcristaline pentru o foarte buna performanta pe timpul noptii sau atunci cand gradul de iluminare este scazut. Tehnologia Smart IR asigura o iluminare uniforma a imaginilor alb-negru surprinse pe timp de noapte, deoarece camera va compensa automat intensitatea luminii infrarosie in functie de distanta dintre obiecte si previne supra-expunerea atunci cand un obiect se apropie de camera. Astfel, cu ajutorul acestei camere veti putea inregistra imagini pe timp de noapte pe o distanta de pana la 30 metri.\r\n\r\n\r\nAceasta camera suporta AoC, adica Audio over Coaxial. Singura cerinta este ca sa aveti un DVR Hikvision din gama HUHI sau HTHI si sa aiba terminatia \"S\" in coada. ', '161.99', 'Wired'),
(20, 'Camera IP Wireless, 4 MP, microfon, IR30m, Imou Bullet 2C, IPC-F42P', '6446566ad2f10-camera_de_supraveghere_ip_wireless_ipc-f42p_1.jpg', 'Camera de supraveghere IMOU IPC-F42P este dotata cu un senzor performant care poate inregistra la rezolutia de 2560 x 1440 pixeli cu pana la 30 fps.\r\n\r\nUnghiul vizual al lentilei de 2.8 este de 104° iar camera permite apropierea obiectelor prin zoom DIGITAL de 16x.\r\n\r\nImou bullet 2C este dotat cu un algoritm puternic ce permite detectarea persoanelor. Atunci cand detecteaza o persoana camera va trimite o alarma catre aplicatia mobila si va incepe sa inregistreze daca este setata sa inregistreze la detectarea persoanelor.\r\n\r\nIndexul de protectie IP67 garanteaza rezistenta camerei la patrunderea apei si a prafului. Camera este gandita sa reziste la temperaturi cuprinse intre -30°C si +55° daca umiditatea este cuprinsa intre 0 si 95%.', '159.99', 'Wireless'),
(21, 'Camera wireless de exterior DIGICAM', '644656977a938-DIGICAM_10.12.21_UROS_IMAGE_SQUARE_V1.jpg', 'Camera trimite un mesaj de alarmă pe telefonul dvs. inteligent și salvează activitățile vizitatorilor pe cardul de memorie, astfel încât le puteți verifica mai târziu.\r\n\r\nAVEȚI OCHI ÎN FIECARE COLȚ AL LOCUINȚEI DVS. SAU LA SERVICIU\r\nVederea panoramică vă permite să vizualizați tot ceea ce se întâmplă în interiorul și în exteriorul locuinței. Poate fi folosită și ca monitor pentru supravegherea bebelușului.\r\n\r\nASCULTAȚI ȘI VORBIȚI PRIN INTERMEDIUL CAMEREI\r\nMicrofonul încastrat în camera de supraveghere exterioară vă permite să ascultați și să vorbiți prin intermediul aplicației noastre. Sistemul de comunicație cu două canale audio vă permite să vorbiți cu cei dragi sau cu prietenii, în timp ce sen', '229.99', 'Wireless'),
(22, 'Camera IP Wireless, cu baterii 4MP Full HD, detectare miscare, lumina alba VICOHOME CG122', '644656bd3de52-cg122.jpg', 'Aceasta camera functioneaza stand alone, cu sau fara conexiune la internet, si poate stoca imaginile pe un card microSD de maxim 128GB. Pentru a vedea imaginile inregistrate aveti insa nevoie de o conexiune wireless la o retea wireless de 2.4 GHZ. \r\n\r\nDurata de viata a acumulatorului este de 6 luni in conditii normale de utilizare si 12 luni daca sta mereu in stand-by. Bateria se incarca in 10 ore, iar atat bateria cat si alimentatorul sunt incluse. \r\n\r\nDistanta de comunicare wireless este de Maxim 50 de metrii in spatiu deschis.\r\n\r\nAceasta camera dispune de functii inteligente precum detectarea contururilor umane si deosebirea lor de autoturisme si alte obiecte in miscare,  Senzor PIR pentru detectarea miscarii\r\n\r\nDoar senzorul PIR functioneaza atunci cand camera este in stand-by (cand este configurata sa inregistreze la detectarea miscarii), camera fiind dotata cu un sistem de revenire din stand-by foarte rapid. Daca optati pentru inregistrare continua, durata de viata a bateriei va scadea.', '379.99', 'Wireless'),
(23, 'Camera de supraveghere, 8 MP 4K, LED alb 40 m, microfon incorporat, Full color, Dahua, HAC-HFW1809TLM-A-LED-0360B', '644656f14388a-camera_de_supraveghere_8_mp_4k_led_alb_40_m_microfon_incorporat_full_color_hikvision_hac-hfw1809tlm-a-led-0360b_7_.jpg', 'Datorita senzorului de 8 MP cu care este dotata camera poate sa inregistreze imagini 4K de calitate inalta in care se pot observa si cele mai mici detalii. Lentila de 3.6 mm ofera un unghi vizual de 85°.\r\n\r\nCu algoritmul sau avansat de procesare a imaginii si capacitatea de a absorbi cantitati mari de lumina, camera ofera monitorizare color 24/7 care colecteaza informatii clare si foarte detaliate. LED-urile cu lumina alba pot lumina pe o distanta de pana la 40 m.\r\n\r\nTransmisia semnalului audio prin cabluri coaxiale este suportata de camera HDCVI. Adopta o tehnologie unica de procesare si transmisie audio care restabileste sursa audio si elimina zgomotul, asigurand calitatea si fiabilitatea informatiilor audio care sunt colectate. Acest lucru devine important pentru aplicatiile de supraveghere video care folosesc informatii audio ca tip de dovezi suplimentare.', '469.99', 'Wireless'),
(24, 'Set 4 Camere Wifi de Exterior, Jortan Senzor de miscare , Night Vision, Vizualizare live pe telefon', '6446571205d4e-Hiseeu-Wireless-3MP-Wifi-IP-PTZ-Digital-Zoom-Pan-CCTV-Security-Video-Surveillance-Camera-System-Audio.jpg_Q90_900x900.jpg', 'Set 4 Camere Wifi de Exterior Jortan, Senzor de miscare , Night Vision, Vizualizare live pe telefon suport card 128gb/ Configurare Usoara\r\nMENȚINEȚI ÎNTOTDEAUNA TOTUL SUB CONTROL CU TELEFONUL DVS.\r\nCamera trimite un mesaj de alarmă pe telefonul dvs. inteligent și salvează activitățile vizitatorilor pe cardul de memorie, astfel încât le puteți verifica mai târziu.\r\n\r\nAVEȚI OCHI ÎN FIECARE COLȚ AL LOCUINȚEI DVS. SAU LA SERVICIU\r\nVederea panoramică vă permite să vizualizați tot ceea ce se întâmplă în interiorul și în exteriorul locuinței. Poate fi folosită și ca monitor pentru supravegherea bebelușului.\r\n\r\nCONEXIUNE INTELIGENTĂ WIFI\r\nSe conectează foarte ușor la rețeaua WiFi de acasă sau de la birou, permițându-vă să obțineți acces video de oriunde prin intermediul conexiunii de internet. Folosind aplicația extrem de intuitivă, disponibilă atât pentru dispozitivele iOS, cât și pentru cele Android, o să puteți beneficia de transmisii video în timp real.\r\n\r\nASCULTAȚI ȘI VORBIȚI PRIN INTERMEDIUL CAMEREI\r\nMicrofonul încastrat în camera de supraveghere exterioară vă permite să ascultați și să vorbiți prin intermediul aplicației noastre. Sistemul de comunicație cu două canale audio vă permite să vorbiți cu cei dragi sau cu prietenii, în timp ce senzorul de detectare a mișcării emite o alarmă care va îndepărta vizitatorii nedoriți sau animalele.\r\n\r\nÎI CONTROLAȚI DIRECȚIA PRIN INTERMEDIUL TELEFONULUI MOBIL\r\nPermite o rotație orizontală, la 320° & o rotație verticală, la 120, care acoperă tote zonele. Efectul 4x digital zoom vă permite să măriți imaginea pentru a observa obiectele aflate la distanță și pentru a obține cât mai multe detalii sau pentru a micșora imaginea spre a obține o perspectiva mai amplă și mai largă a zonei.\r\n\r\nALERTĂ DE DETECTARE A MIȘCĂRII\r\nO să primiți alerte direct pe telefonul dvs. mobil prin intermediul aplicației, de fiecare dată când este detectată mișcare. Nicio mișcare de natură umană nu o să vă mai poate scăpa de acum înainte, fiindcă o să primiți notificări în acest sens. Nu este necesar să urmăriți transmisia video tot timpul!\r\n\r\nREZISTENTĂ LA APĂ ȘI LA PRAF\r\nCamera este rezistentă la apă, așa că poate fi montată în orice colț din exteriorul locuinței și funcționează perfect indiferent de condițiile atmosferice.', '699.99', 'Wireless'),
(25, 'Camera de supraveghere IP Wireless PTZ, 4MP 2K, Hikvision DS-2DE3A404IW-DE-W(S6), Microfon si difuzor, IR50m, 2.8-12mm  ', '6446573f488ab-imagine_camera_de_supraveghere_ip_wireless_ptz_4mp_2k_hikvision_ds-2de3a404iw-de-w_s6_microfon_si_difuzor_ir50m_poe_darkfighter.jpg', 'Camera DS-2DE3A404IW-DE-W(S6) dispune de un senzor CMOS de 1/2.8\" si inregistreaza imaginile la o rezolutie de 4MP 2K. \r\n\r\n\r\nLentila varifocala de 2.8mm-12mm permite obtinerea unui unghi vizual de 96.7° pana la 31.6°. Astfel, camera poate realiza un zoom optic de pana la 4X, ce faciliteaza surprinderea detalii din zonele mai extinse.\r\n\r\n\r\nFunctia IR permite captarea imaginilor clar, chiar si pe timpul noptii. Imaginile vor fi inregistrate si redate alb-negru, pe o distanta de pana la 50m. \r\n\r\nEchipata cu tehnologia Darkfighter, imaginile surprinse beneficiaza de culori vii, clare, si in conditiile mai slabe de iluminare.\r\n\r\n\r\nCalitatea imaginilor este asigurata si de functia WDR (Wide Dynamic Range) care uniformizeaza luminozitatea imaginii, pentru a crea un nivel inteligibil atat in zonele luminate puternic, cat si in cele cu o luminozitate mai slaba.\r\n\r\n\r\nDe asemenea, camera dispune si de functia PTZ (pan, tilt, zoom). Astfel, aceasta poate fi rotita pana la 360° si inclinata pana la 90°, iar prin aplicatia Hik-Connect puteti controla camera direct de pe telefon.', '469.99', 'Wireless'),
(26, 'Camere de supraveghere Full Color cu microfon, 2MP 1080p, LED ALB 40m, 2.8mm, Dahua, HAC-HDW1239T-A-LED-0280B-S2-RX', '644657d8ac1fd-camere_de_supraveghere_full_color_cu_microfon_2mp_1080p_led_alb_40m_2.8mm_dahua_hac-hdw1239t-a-led-0280b-s2_1.jpg', 'Camera de supraveghere Dahua DH-HAC-HDW1239T(-A)-LED are o rezolutie de inregistrare de 2MP FullHD, si poate sa inregistreze la aceasta rezolutie cu pana al 25 de cadre pe secunda. Lentila de 2.8mm produce un unghi vizual de 107°\r\n\r\nTehnologie Full Color, pentru imagini color 24/7\r\nSenzorul marit, apertura mare si sistemul de iluminare a senzorului permit acestei camere sa capteze imagini mai luminoase decat camerele traditionale, reusind astfel sa inregistreze color chiar si in conditii cu foarte putina lumina. Atunci cand in cadrul supravegheat nu este lumina deloc, camera va aprinde iluminatorul cu LED, care poate sa ilumineze obiecte sau persoane aflate la o distanta de pana la 40m.', '259.99', 'Smart'),
(27, 'Camera Safer, 5 megapixeli, 4 in 1, varifocala cu zoom motorizat, IR 40 m, EXIR 2.0, IP67 SAF-PRO-BM5MP40MTZ-R', '644657fa6976e-camera-de-supraveghere-cu-zoom-motorizat-safer-saf-pro-bm5mp40mtz-rezolutie-de-5-megapixeliu_1.jpg', 'Camera de supraveghere cu rezolutia de 5 megapixeli si lentila varifocala\r\nCamera Safer SAF-PRO-BM5MP40MTZ este dotata cu lentila varifocala de la 2.7 la 13.5 mm si permite efectuarea de zoom optic observand astfel mai multe detalii despre obiectele si persoanele din spatiul supravegheat.\r\n\r\nDaca utilizati un DVR comercializat de noi, puteti sa faceti zoom direct din aplicatia mobila. ATENTIE! Focalizarea trebuie reglata manual, tot din aplicatia mobila. Aceasta camera nu are auto-focus.\r\n\r\nUnghiul vizual este cuprins intre 95.7° si 29.1°  \r\n\r\n	\r\nIluminare nocturna pana la 40m plus tehnologii EXIR 2.0 si Smart IR\r\n\r\nCamera este echipata cu LED-uri infrarosu pentru inregistrarea pe timp de noapte sau in conditii de iluminare scazuta, iar cu ajutorul acestor LED-uri puteti inregistra imagini clare chiar si noaptea, pe o distanta maxima de 40 de metri.\r\n\r\nTehnologia Smart IR ajusteaza automat puterea LED-urilor IR. LED-urile sunt dotate cu tehnologia EXIR 2.0 proiectand lumina infrarosie pe intreg cadrul de iluminare.', '193.99', 'Smart'),
(28, 'Camera de supraveghere IP Wi-Fi dome, 2 MP, IR 30 m, 2.8 mm, slot card MicroSD, Dahua, IPC-HDBW1230DE-SW-0280B', '6446581a99200-camera_de_supraveghere_ip_wi-fi_dome_2_mp_ir_30_m_2.8_mm_slot_card_microsd_dahua_ipc-hdbw1530e-s6_123.jpg', 'Datorita senzorului de 2MP cu care camera este dotata poate sa inregistreze FullHD si sa obtina imagini de calitate buna. Lentila de 2.8 mm oferta un unghi vizual larg de 100°.\r\n\r\nLED-urile IR ajuta camera sa inregistreze pe timp de noapte imagini clare pe o distanta de pana la 30 de metri.\r\n\r\nIPC-HDBW1230DE-SW-0280B de la Dahua este dotata cu un slot pentru card MicroSD cu o capacitate de pana la 256 GB (cardul nu este inclus). Datorita acestui card camera poate inregistra local si nu mai este nevoie de un NVR/DVR pentru a stoca imaginile. Camera poate fi conectata si la NVR/DVR.', '356.99', 'Smart'),
(29, 'Camera de supraveghere analogica, pentru exterior, 2MP, Smart IR 20m, Lentila 2.8mm, IP66, Hikvision, HWT-B120-M', '6446583cba36e-camera_hwt-b120-m.jpg', 'Camera de supraveghere HWT-B120-M dispune de un senzor CMOS si inregistreaza imaginile la rezolutie Full HD de 2MP. Camera beneficiaza si de o lentila fixa de 2.8mm, cu un unghi de viziualizare de 103°.\r\n\r\nCamera este dotata cu un sistem de iluminare inteligent, care are integrata tehnologia Smart IR. Prin intermediul acestei tehnologii, iluminatorul IR isi ajustează automat intensitatea, astfel incat imaginile sa nu fie supraexpuse sau subexpuse.\r\n\r\n\r\nDe asemenea, functia BLC (Backlight Compensation) este menita sa regleze expunerea imaginii pentru a putea scoate in evidenta obiectele intunecate sau cele cu o expunere prea mare.', '95.99', 'Smart'),
(30, 'Camera de supraveghere IP PTZ cu microfon si difuzor, Full HD, IR si LED 30m, Hikvision DS-2DE2C200MW-DE-F1-S7', '64465861e99eb-hik_cam_2.jpg', 'Camera de supraveghere IP DS-2DE2C200MW-DE-F1-S7 dispune de o rezolutie de 2MP, cu un senzor CMOS 1/2.7″ si o lentila de 2.8mm. Aceasta este dotata cu IR si cu LED-uri albe menite sa imbunatateasca calitatea imaginilor captate pe timpul noptii. Astfel, imaginile vor fi clare chiar si in conditiile mai dificile de iluminare, iar acestea vor putea fi inregistrate pe o distanta de pana la 30 m.\r\n\r\nCalitatea imaginii este asigurata si de functia Wide Dynamic Range, care ajuta la uniformizarea luminozitatii imaginii, pentru a crea un nivel inteligibil atat in zonele luminate puternic, cat si in cele cu o luminozitate mai slaba.\r\n\r\nFunctia Backlight Compensation ajuta la reglarea expunerii imaginii pentru a putea scoate in evidenta obiectele intunecate. ', '459.99', 'Smart');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'test', 'test@test.test', '$2y$10$A25vuqIWImCfeBhBYcapVe5MC2jHh1LSWIEzLOmHT.MO3gkMwMWmq'),
(2, 'test', 'test2@test.test', '$2y$10$L/cn6ImuKz.zAX6upQGfRu9eLhI2JamDVehGzeeTDoxYgOH2vpXzO'),
(3, 'Administrator', 'admin@admin.admin', '$2y$10$eU2zCgxI6.7S..0GshhisOJxu5CMy4tQRanDeGbkDPARk7j4P2Zty'),
(6, 'Simion Amalia', 'amaliasimion2002@gmail.com', '$2y$10$9JpyGfJBUEoB7WghfP23mOafRsFmy1rcDtT3hhwPCayFO/7buP0uG');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `products` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `products`) VALUES
(3, 3, '[]');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Erstellungszeit: 29. Sep 2021 um 07:39
-- Server-Version: 5.7.26
-- PHP-Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Datenbank: `movie_tracker`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `favorites`
--

CREATE TABLE `favorites` (
  `id` tinyint(4) NOT NULL,
  `user_id` tinyint(4) NOT NULL,
  `title` varchar(255) NOT NULL,
  `year` varchar(4) NOT NULL,
  `plot_short` text NOT NULL,
  `imdbID` varchar(255) NOT NULL,
  `preview` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `title`, `year`, `plot_short`, `imdbID`, `preview`) VALUES
(2, 2, 'Rambo', '0', 'In Thailand, John Rambo joins a group of mercenaries to venture into war-torn Burma, and rescue a group of Christian aid workers who were kidnapped by the ruthless local infantry unit.', 'tt0462499', 'https://m.media-amazon.com/images/M/MV5BMTI5Mjg1MzM4NF5BMl5BanBnXkFtZTcwNTAyNzUzMw@@._V1_SX300.jpg'),
(6, 2, 'Cinderella', '0', 'A girl named Ella (Cinderella) has the purest heart living in a cruel world filled with evil stepsisters and an evil stepmother out to ruin Ella\'s life. Ella becomes one with her pure heart when she meets the Prince and dances her way to a better life with glass shoes, and a little help from her fairy godmother, of course.', 'tt1661199', 'https://m.media-amazon.com/images/M/MV5BMjMxODYyODEzN15BMl5BanBnXkFtZTgwMDk4OTU0MzE@._V1_SX300.jpg'),
(7, 2, 'Test', '0', 'San Francisco, 1985: Frankie confronts the challenges of being an understudy in a modern dance company as he embarks on a budding relationship with Todd, a veteran dancer in the same company and the bad boy to Frankie\'s innocent. As Frankie and Todd\'s friendship deepens, they navigate a world of risk - it\'s the early years of the epidemic - but also a world of hope, humor, visual beauty and musical relief.', 'tt2407380', 'https://m.media-amazon.com/images/M/MV5BMTQwMDU5NDkxNF5BMl5BanBnXkFtZTcwMjk5OTk4OQ@@._V1_SX300.jpg'),
(8, 2, 'Test', '0', 'San Francisco, 1985: Frankie confronts the challenges of being an understudy in a modern dance company as he embarks on a budding relationship with Todd, a veteran dancer in the same company and the bad boy to Frankie\'s innocent. As Frankie and Todd\'s friendship deepens, they navigate a world of risk - it\'s the early years of the epidemic - but also a world of hope, humor, visual beauty and musical relief.', 'tt2407380', 'https://m.media-amazon.com/images/M/MV5BMTQwMDU5NDkxNF5BMl5BanBnXkFtZTcwMjk5OTk4OQ@@._V1_SX300.jpg'),
(9, 2, 'Die Hard', '0', 'NYPD cop John McClane goes on a Christmas vacation to visit his wife Holly in Los Angeles where she works for the Nakatomi Corporation. While they are at the Nakatomi headquarters for a Christmas party, a group of robbers led by Hans Gruber take control of the building and hold everyone hostage, with the exception of John, while they plan to perform a lucrative heist. Unable to escape and with no immediate police response, John is forced to take matters into his own hands.', 'tt0095016', 'https://m.media-amazon.com/images/M/MV5BZjRlNDUxZjAtOGQ4OC00OTNlLTgxNmQtYTBmMDgwZmNmNjkxXkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_SX300.jpg'),
(10, 2, 'Die Hard', '0', 'NYPD cop John McClane goes on a Christmas vacation to visit his wife Holly in Los Angeles where she works for the Nakatomi Corporation. While they are at the Nakatomi headquarters for a Christmas party, a group of robbers led by Hans Gruber take control of the building and hold everyone hostage, with the exception of John, while they plan to perform a lucrative heist. Unable to escape and with no immediate police response, John is forced to take matters into his own hands.', 'tt0095016', 'https://m.media-amazon.com/images/M/MV5BZjRlNDUxZjAtOGQ4OC00OTNlLTgxNmQtYTBmMDgwZmNmNjkxXkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_SX300.jpg'),
(11, 2, 'Prince', '0', 'PRINCE It\'s Showtime ... Nothing and No One Can Be Trusted..... One of the savviest thieves in the world commits the biggest heist of his life. He wakes up next morning to realize he has a gunshot wound on his arm that he doesn\'t remember getting. In his quest to find answers he discovers his name is Prince, he used to work for a man named Sarang and his girlfriend\'s name is Maya. He is being hunted by the secret service of India- I Grip, the CBI and the biggest white collared criminals in the world. He is the most wanted man in the country because only he knows the whereabouts of the heist, which contains a secret that is linked not only to his loss of memory but threatens the future of the Human Race. Prince can rely only on his razor sharp instincts to salvage himself. The web of deception spins and Prince gets even more entangled. Nothing and no one can be trusted. Every day he meets a new girl claiming to be Maya... Every cop and criminal in the country is out for his blood... He doesn\'t remember where he has hidden the Heist... He doesn\'t know which side of the law he is on... His life is at stake... The future of mankind is at stake... Prince has no one but himself to trust ... Failure is not an option... He has just 5 Days of his life... Time is running out will he survive...', 'tt1455816', 'https://m.media-amazon.com/images/M/MV5BMjY0NzY0ZTItMzIwZS00ZGExLWEyNDEtNzYwZWUxMmE2NWIzXkEyXkFqcGdeQXVyNDY5MTUyNjU@._V1_SX300.jpg'),
(12, 2, 'Test', '0', 'San Francisco, 1985: Frankie confronts the challenges of being an understudy in a modern dance company as he embarks on a budding relationship with Todd, a veteran dancer in the same company and the bad boy to Frankie\'s innocent. As Frankie and Todd\'s friendship deepens, they navigate a world of risk - it\'s the early years of the epidemic - but also a world of hope, humor, visual beauty and musical relief.', 'tt2407380', 'https://m.media-amazon.com/images/M/MV5BMTQwMDU5NDkxNF5BMl5BanBnXkFtZTcwMjk5OTk4OQ@@._V1_SX300.jpg'),
(13, 2, 'Rocky', '0', 'Rocky Balboa is a struggling boxer trying to make the big time, working as a debt collector for a pittance. When heavyweight champion Apollo Creed visits Philadelphia, his managers want to set up an exhibition match between Creed and a struggling boxer, touting the fight as a chance for a \"nobody\" to become a \"somebody\". The match is supposed to be easily won by Creed, but someone forgot to tell Rocky, who sees this as his only shot at the big time.', 'tt0075148', 'https://m.media-amazon.com/images/M/MV5BMTY5MDMzODUyOF5BMl5BanBnXkFtZTcwMTQ3NTMyNA@@._V1_SX300.jpg'),
(14, 2, 'Rocky', '0', 'Rocky Balboa is a struggling boxer trying to make the big time, working as a debt collector for a pittance. When heavyweight champion Apollo Creed visits Philadelphia, his managers want to set up an exhibition match between Creed and a struggling boxer, touting the fight as a chance for a \"nobody\" to become a \"somebody\". The match is supposed to be easily won by Creed, but someone forgot to tell Rocky, who sees this as his only shot at the big time.', 'tt0075148', 'https://m.media-amazon.com/images/M/MV5BMTY5MDMzODUyOF5BMl5BanBnXkFtZTcwMTQ3NTMyNA@@._V1_SX300.jpg'),
(21, 1, 'Rocky', '1976', 'Rocky Balboa is a struggling boxer trying to make the big time, working as a debt collector for a pittance. When heavyweight champion Apollo Creed visits Philadelphia, his managers want to set up an exhibition match between Creed and a struggling boxer, touting the fight as a chance for a \"nobody\" to become a \"somebody\". The match is supposed to be easily won by Creed, but someone forgot to tell Rocky, who sees this as his only shot at the big time.', 'tt0075148', 'https://m.media-amazon.com/images/M/MV5BMTY5MDMzODUyOF5BMl5BanBnXkFtZTcwMTQ3NTMyNA@@._V1_SX300.jpg'),
(22, 1, 'Duster', '2021', 'Set in the 1970\'s Southwest, the life of a gutsy getaway driver for a growing crime syndicate goes from awful to wildly, stupidly, dangerously awful.', 'tt12160826', 'N/A');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'test@movietracker.com', '2e91541e717450bd8ef2ff70cb13439d'),
(2, 'ulf@movietracker.com', '2ab943ddc6a8691a26be4f0e1f4e3763');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

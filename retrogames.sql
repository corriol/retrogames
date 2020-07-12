-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Temps de generació: 12-07-2020 a les 20:58:31
-- Versió del servidor: 10.4.13-MariaDB
-- Versió de PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de dades: `retrogames`
--
CREATE DATABASE IF NOT EXISTS `retrogames2` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `retrogames2`;

-- --------------------------------------------------------

--
-- Estructura de la taula `access`
--

CREATE TABLE `access` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `accessDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de la taula `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Bolcament de dades per a la taula `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Arcade'),
(2, 'Trencaclosques'),
(3, 'Aventures'),
(4, 'Acció'),
(5, 'Plataforma'),
(6, 'Estratègia'),
(7, 'Multijugador');

-- --------------------------------------------------------

--
-- Estructura de la taula `game`
--

CREATE TABLE `game` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `positive` int(11) NOT NULL,
  `negative` int(11) NOT NULL,
  `releaseDate` datetime DEFAULT NULL,
  `userId` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Bolcament de dades per a la taula `game`
--

INSERT INTO `game` (`id`, `image`, `title`, `description`, `positive`, `negative`, `releaseDate`, `userId`, `categoryId`) VALUES
(1, 'cabal.png', 'Cabal', 'Originating in the arcades, Cabal is a shooter where the protagonist runs back and forth along the bottom of the screen, ducking and dodging bullets and grenades from the enemy. The roll maneuver from the arcade was not implemented in the PC version. The player returns fire by moving a target around the screen which also moves the player character and may expose him to enemy fire. \r\n\r\nThe enemies throughout the five levels come thick and fast and there are many of them. They include normal foot soldiers, tanks, helicopters and end of level bosses such as submarines and war machines. Just about everything on the screen can be blown up or shot. There are bonus points to be picked up for destroying buildings and weapons to be picked up from the enemy, such as machine guns and shotguns. A two-player mode is also available.', 1, 1, '2020-07-28 10:04:11', 1, 1),
(2, 'caesar.png', 'Caesar', 'The first in the strategy series set in the Roman Empire’s peak era starts off with you as ruler of a small province, although if you’re successful you will get tougher assignments.\r\n\r\nYou must build the city, placing crucial features such as housing estates, roads, policing, water supply, social events and the like. You’re not restricted to one city – you can build another area, linked by roads, once you’ve got the first one running smoothly. You have slaves at your disposal to build and maintain everything.\r\n\r\nAll this would be easy if you had an infinite supply of money, the civilians didn’t complain about anything, there was no threat of combat, and you didn’t have to keep the people above you happy. Needless to say, all of these problems crop up.\r\n\r\nVia the forums, you will get public opinions, which are affected by how high taxes are, and whether people feel they’re getting value for money. If they don’t they could riot;– what will you tell the Emperor if that happens?\r\n\r\nBarbarian threats are commonplace, so you need to maintain an army, and at times send it into battle. If you own Cohort II, you can fight the battles using that, but otherwise you just issue the orders then learn of the result.', 1, 1, '2020-07-14 10:04:32', 1, 6),
(3, 'cabaret.png', 'Cabaret Asteroids', 'For those of you who have not had the pleasure of Asteroids here is a description: The game is displayed in high contrast black and white, that\'s just black and white, there are no shades of grey in this game. Your ship is a small white triangle, in the centre of a black screen. When the game starts, asteroids, large irregular rock shapes, drift gently into view from the outer edges of the screen. Your ship can rotate in either direction, and fire, so this is what you must do, in order to prevent your ship from being destroyed. As your shots hit the asteroids they break into smaller and smaller fragments, and the directions and speeds imparted to them seem to be highly convincing.\r\n\r\nCabaret Asteroids is a near perfect conversion of Asteroids for the Amiga. Its not in technicolor, there is no music, and the sounds are simple but effective. The playability of the original has not been surpassed though. I really can\'t fault the Cabaret Asteroids conversion, you can play by keyboard or joystick and it feels just like 1980, but without Sting and the guys in the background.', 1, 1, '2020-07-22 10:04:25', 1, 1),
(4, 'alone.gif', 'Alone in the dark', 'Alone in the Dark is a critically acclaimed 1992 action-adventure horror video game originally designed by Frédérick Raynal and developed and published by Infogrames for the PC. In 1994, the game was ported for the 3DO by Krisalis. Alone in the Dark is considered a breakthrough and influential title, being the first 3D game in the genre of survival horror. It has spawned four follow-up games as part of the series, as well as two movies loosely based on them.\r\n   Players choose between a male or female protagonist (Edward Carnby or Emily Hartwood respectively), and are then trapped inside the haunted mansion of Derceto. The player character starts in the attic (the place of Jeremy\'s suicide), having ascended to the top of the mansion without incident, and is tasked with finding a way out of the mansion while avoiding, outsmarting or defeating various supernatural enemies including slave zombies and giant bipedal rat-like creatures. Though able to kill most enemies with simply fists and feet, the player character can also find and utilise weapons.\r\n   Many opponents can be beaten by solving a particular puzzle rather than a straight fight - indeed, a significant number of opponents cannot be killed at all. Much of the game involves exploration and puzzle-solving, and optionally searching the house for clues to what happened before the player\'s arrival.\r\n   The player character can search any area, open and close doors, push certain objects, and pick up some items. Items in inventory can be used, opened, read, thrown, or put down, though not all of these options are offered for every item. Inventory is highly limited, and the player must often discard items to make room. It is possible to discard items that are needed to complete the game, but discarded items remain in play and can be retrieved later, even if the player character leaves the room. Available space in inventory is determined by weight, not number of items; for example, a player may discard a book and two knives yet still not be able to pick up the heavy statuette.\r\n   Unlike its sequels, and much of the survival horror genre, the game is partially non-linear. The player character is initially restricted to the attic and third floor, whose rooms are arranged such that they must be traversed in a linear order. Completing the puzzle at the end of the third floor grants the player character access to the first and second floors. The player can explore the rooms in this area in any order, and can also revisit the attic and third floor if desired. Upon completing a specific puzzle, the player gains access to the caverns beneath the mansion. The caverns are completely linear, and each challenge must be overcome as it is encountered', 2, 1, '2020-07-11 10:04:38', 1, 3),
(5, 'mariobros.gif', 'Super Mario Bros', 'Super Mario Bros. is a 1985 platform video game internally developed by Nintendo EAD and published by Nintendo as a pseudo-sequel to the 1983 game Mario Bros. It was originally released in Japan for the Family Computer on September 13, 1985, and later for the Nintendo Entertainment System in North America in 1985, Europe on May 15, 1987 and Australia in 1987. It is the first of the Super Mario series of games. In Super Mario Bros., the player controls Mario and in a two-player game, a second player controls Mario\'s brother Luigi as he travels through the Mushroom Kingdom in order to rescue Princess Toadstool from the antagonist Bowser.\r\n   The game has been highly influential, popularizing the side-scrolling genre. In 2005, IGN\'s poll named it as The Greatest Game Of All Time. The game also sold enormously well, and was the best-selling game of all time for approximately three decades, until Wii Sports took that title. The commercial success of Super Mario Bros. has caused it to be ported to almost every one of Nintendo\'s major gaming consoles. Nintendo released special red variants of the Wii and Nintendo DSi XL consoles in re-packaged, Mario-themed, limited edition bundles in late 2010 as part of the 25th anniversary of the game\'s release.\r\n   The player takes on the role of the main protagonist of the series, Mario. Mario\'s younger brother, Luigi, is only playable by the second player in the game\'s multiplayer mode, and assumes the same plot role and functionality as Mario. The objective is to race through the Mushroom Kingdom, survive the main antagonist Bowser\'s forces, and save Princess Toadstool. The player moves from the left side of the screen to the right side in order to reach the flag pole at the end of each level.\r\n   The game world has coins scattered around it for Mario to collect, and special bricks marked with a question mark (?), which when hit from below by Mario, may reveal more coins or a special item. Other \'secret\', often invisible, bricks may contain more coins or rare items. If the player gains a red and yellow Super Mushroom, Mario grows to double his size and can take one extra hit from most enemies and obstacles, in addition to being able to break bricks above him. Players are given a certain number of lives, and may gain additional lives by picking up green and orange 1-Up mushrooms, collecting 100 coins, defeating several enemies in a row with a Koopa shell, or bouncing on enemies successively without touching the ground. One life is lost when Mario takes damage while small, falls in a pit, or runs out of time. The game ends when all lives are lost.\r\n   Mario\'s primary attack is jumping on top of enemies, though many enemies have differing responses to this. For example, a Goomba will flatten and be defeated, while a Koopa Troopa will temporarily retract into its shell, allowing Mario to use it as a projectile. These shells may be deflected off a wall to destroy other enemies, though they can also bounce back against Mario, which will hurt or kill him. Another attack, for enemies standing overhead, is to jump up and hit beneath the brick that the enemy is standing on. Another is the Fire Flower; when picked up, this item changes the color of Super Mario\'s outfit and allows him to throw fireballs, or only upgrades Mario to Super Mario if he has not already. A less common item is the Starman, which often appears when Mario hits certain concealed or otherwise invisible blocks. This item makes Mario temporarily invincible to most hazards and capable of defeating enemies on contact.\r\n   The game consists of eight worlds with four sub-levels called \'stages\' in each world. The final stage of each world takes place in a castle where Bowser or one of his decoys are fought. The game also includes some stages taking place underwater, which contain different enemies. In addition, there are bonuses and secret areas in the game. Most secret areas contain more coins for Mario to collect, but some contain \'warp pipes\' that allow Mario to advance to later worlds in the game, skipping over earlier ones.', 1, 1, '2020-07-11 10:04:40', 1, 5),
(6, 'bomberman.gif', 'Bomberman', 'Bomberman is an arcade-style maze-based video game developed by Hudson Soft. The original home computer game Bomber Man was released in 1983 for the MSX, NEC PC-8801, NEC PC-6001, Sharp MZ-700 and FM-7 in Japan, and for the MSX and ZX Spectrum in Europe (in the UK as Eric and the Floaters, and in Spain as Don Pepe Y Los Globos). It had a Japanese sequel known as 3-D Bomberman, in which Bomberman navigates the maze in the first-person. In 1985, Bomberman was released for the Family Computer. It spawned the long-running series with many installments building on its basic gameplay. The earlier game Warp & Warp by Namco is most likely the inspiration for the Bomberman gameplay.\r\n   In the Famicom/NES release, the eponymous character, Bomberman, is a robot that must find his way through a maze while avoiding enemies. Doors leading to further maze rooms are found under rocks, which Bomberman must destroy with bombs. There are items that can help improve Bomberman\'s bombs, such as the Fire ability, which improves the blast range of his bombs. Bomberman will turn human when he escapes and reaches the surface. Each game has 50 levels in total. The original home computer games are more basic and have some different rules.', 1, 1, '2020-07-11 10:04:43', 1, 4),
(7, 'tetris.gif', 'Tetris', 'This version of Tetris is one of many conversions of the famous block-stacking game, as well as the best-known (but not the only) version on Nintendo\'s first home console. The goal is to place pieces made up of four tiles in a ten-by-twenty well, organizing them into complete rows, which disappear. As rows are cleared, the pace of the game increases, and the game ends if the stack reaches the top of the well.\r\n   The game offers two different modes of play, \'Type A\' and \'Type B\'. \'Type A\' is a standard endless mode, where the speed of the game increases every ten lines, with an option for the starting level when beginning the game. \'Type B\', on the other hand, is a race to clear 25 lines, with options for both drop speed and starting garbage. In both modes, successful play is rewarded with cute animations. There are also three different background songs to choose from.', 1, 2, '2020-07-11 10:04:44', 1, 2),
(8, 'contra.gif', 'Contra', 'Contra, known as Probotector and occasionally Gryzor in Europe and Oceania, is a 1987 run and gun action game developed and published by Konami originally released as a coin-operated arcade game on February 20, 1987. A home version was released for the Nintendo Entertainment System in 1988, along with ports for various computer formats, including the MSX2. The home versions were localized in the PAL region as Gryzor on the various computer formats and as Probotector on the NES, released later. Several Contra sequels were produced following the original game.\r\n   In Contra, the player controls one of two armed military commandos named Bill \'Mad Dog\' Rizer and Lance \'Scorpion\' Bean, who are sent on a mission to neutralize a terrorist group called the Red Falcon Organization that is planning to take over the Earth. Details of the game\'s setting varies between supplementary materials: the Japanese versions sets the game in the year 2633 on the fictional \'Galuga archipelago\' near New Zealand, whereas the manual for the American NES version sets the game during the present in an unnamed South American island. The American storyline also changes the identity of \'Red Falcon\' from being the name of a terrorist organization to the name of an alien entity.\r\n   The main character is equipped with a rifle with an unlimited amount of ammunition. The player can also jump, move and fire in eight directions, as well as move or jump simultaneously while firing. A single hit from any enemy, bullet, or other hazard will instantly kill the player character and discard the current weapon. There are over 10 areas in the game. There are two types of stages in Contra. In addition to the standard side view stages, Contra also features stages in which the player character is seen from behind and must move towards the background in order to proceed. Each of these \'3D maze\' stages are set inside the corridor of an enemy base in which the player must fight through the base\'s defenses in order to reach the core of the base. During the 3D maze stages, the upper screen will display a map of the base along with a time limit. Each maze stage is followed by a \'3D fixed\' stage set at the core of the base, in which the player must destroy a series of flashing sensors to expose an even larger sensor and destroy it. Contra also features a two-player cooperative mode. Both players occupy the same screen and must coordinate their actions. One player lagging behind can cause problems for his partner, as the screen will not scroll onward, and a slow player can be fatal to his partner. The European release, Gryzor, does not feature a simultaneous 2-Players mode. Instead, both players take turns: whenever one player dies, the other gets his turn.', 1, 1, '2020-07-11 10:04:46', 1, 4),
(9, 'battlecity.gif', 'Battle City', 'Battle City is a multi-directional shooter video game for the Family Computer produced and published in 1985 by Namco. It is a successor to Namco\'s 1980 Tank Battalion, and would be succeeded itself by the 1991 Tank Force. An arcade version for the Nintendo VS. System would follow, and the game would eventually end up in the Japanese version of Star Fox Assault (a Namco-produced game). There was also a related Game Boy game of the same name.\r\n   The player, controlling a tank, must destroy enemy tanks in each level, which enter the playfield from the top of the screen. The enemy tanks attempt to destroy the player\'s base (represented on the map as a bird, eagle or Phoenix), as well as the human tank itself. A level is completed when the player destroys all 20 enemy Tanks, but the game ends if the player\'s base is destroyed or the player loses all available lives. Battle City contains 35 different stages that are 13 units wide by 13 units high. Each map contains different types of terrain and obstacles. Examples include brick walls that can be destroyed by having either the player\'s Tank or an enemy Tank shoot at them, steel walls that can be destroyed by the player if he has collected three or more power-up stars, bushes that hide Tanks under them, ice fields that make it difficult to control Tank and pools of water which cannot be crossed by Tanks. There are four progressively harder types of enemy Tanks. The game becomes more challenging in later levels, as enemy Tanks may act as decoys to lure players away from their base so that another Tank can destroy it. In addition, flashing Tanks could be destroyed for power-ups. There are several types of power-ups: Tank symbol gives an extra life, star improves player\'s Tank (having one star make shots faster, having two stars allow two simultaneous shots, having three stars allow the player to destroy steel), bomb destroys all visible enemy Tanks, clock freezes all enemy Tanks for a period of time, shovel adds steel walls around the base for a period of time and shield makes player\'s Tank invulnerable to attack for a period of time. Battle City was one of the earlier games to allow two players to play simultaneously. Both players have to defend the base together, and if one player shoots the other, the friendly fire victim would be unable to move for a while (but can still shoot). It was also one of the first NES games to allow players access to an edit mode where they could create custom levels, though these custom levels cannot be saved unlike in similar modes such as the one in Excitebike. The Game Boy version is more challenging, as the screen is too small to display the whole map and only enough to display one part of it; for this reason, a radar was added.', 2, 1, '2020-07-11 10:04:51', 1, 4),
(10, 'princeofpersia.gif', 'Prince of Persia', 'Prince of Persia is a fantasy platform game, originally developed by Jordan Mechner and released in 1989 for the Apple II, that represented a great leap forward in the quality of animation seen in video games. After the original release on the Apple II, Prince of Persia was ported to a wide range of platforms. The game managed to surprise and captivate the player despite being at first glance, repetitive. This was achieved by interspersing intelligent puzzles and deadly traps all along the path the player-controlled Prince had to take to complete the game—all this packaged in fluid, lifelike motion. Prince of Persia influenced a sub-genre known as the cinematic platformer, which imitated the sprawling non-scrolling levels, fluid animation, and control style.\r\n   The game is set in ancient Persia. While the sultan is fighting a war in a foreign land, his vizier Jaffar, a wizard, seizes power. Jaffar\'s only obstacle to the throne is the Sultan\'s daughter (although the game never specifically mentions how). Jaffar locks her in a tower and orders her, under threat of execution, to become his wife. The game\'s nameless protagonist, whom the Princess loves, is thrown into the palace dungeons. The player must lead the protagonist out of the dungeons and to the palace tower, defeating Jaffar and freeing the Princess in under 60 minutes. In addition to guards, various traps and dungeons, the protagonist is further hindered by his own doppelgänger, an apparition of his own self that is conjured out of a magic mirror.', 1, 1, '2020-07-11 10:04:48', 1, 3),
(11, 'punchout.gif', 'Mike Tyson’s Punch-Out!!', 'Punch-Out!!, originally released in North America as Mike Tyson\'s Punch-Out!!, is a boxing sports fighting video game for the Nintendo Entertainment System (NES) developed and published by Nintendo in 1987. Part of the Punch-Out!! series, it is a port of both the Punch-Out!! and Super Punch-Out!! arcade games (particularly the latter) with some variations.\r\n   Punch-Out!! features a boxer known as Little Mac working his way up the professional boxing circuits, facing a series of colorful, fictional boxers, leading to a final fight with real-life boxer, the then-World Heavyweight Champion, which is Mike Tyson in the original version and Mr. Dream in the later version.\r\n   Little Mac has a limited repertoire compared to most of his opponents. His punches are limited to left and right jabs, left and right body blows, and a powerful uppercut. The uppercut can only be used once the player earns a star, which is typically accomplished by counter-punching the opponent directly before or after certain attacks are launched. The player can acquire up to three stars. To perform the uppercut, the player needs to press the start button once a star is earned. To defend, Mac can dodge left or right, duck, and block punches by putting up his guard.\r\n   Little Mac also has a heart meter, which decreases by three upon being struck by an opponent and one upon blocking an attack or an opponent blocking/dodging the player\'s attack. When the heart meter decreases to zero, Little Mac temporarily turns pink and appears exhausted, leaving the player unable to attack but still able to dodge or block. At this point, Mac can regain some hearts (and his normal color palette) only by avoiding the opponent\'s punches. He immediately loses all of his hearts upon being knocked down, but can regain some by getting up.\r\n   A bout can end by knockout (KO), if a fighter is unable to get up within ten seconds after being knocked down; by technical knockout (TKO), if a fighter is knocked down three times in one round; or by decision, if the bout lasts three full rounds without a clear winner. In order to win by decision, the player must accumulate higher than a certain point total by punching the opponent and/or knocking him down (different boxers require different point totals to win by decision). However, some bouts cannot be won in this manner and will automatically result in a loss for the player if the opponent is not knocked out. Mac can only get up three times during any one bout; if he is knocked down a fourth time, he will be unable to rise and thus lose by knockout.\r\n   When Mac loses his first bout to a ranked opponent, he will have a chance to fight a rematch. However, if he loses a Title Bout, he will fall in the rankings - one place for the Minor or Major Circuits, two places for the World Circuit. Losing a rematch causes him to fall one place (unless he is already at the bottom of his circuit), forcing him to fight his way back up. A third loss (not necessarily a consecutive one) ends the game. The exception is the final fight against Mike Tyson/Mr. Dream; a loss to them automatically results in a game over.', 1, 1, '2020-07-11 10:04:53', 1, 4),
(12, 'digdug.gif', 'Dig Dug', 'Dig Dug is an arcade game developed and published by Namco in Japan in 1982. It runs on Namco Galaga hardware, and was later published outside of Japan by Atari, Inc.. A popular game based on a simple concept, it was also released as a video game on many consoles.\r\n   The objective of Dig Dug is to eliminate underground-dwelling monsters by either inflating them with an air pump until they explode, or by dropping rocks on them. There are two kinds of enemies in the game: \'Pookas\' (a race of round red monsters, said to be modeled after tomatoes, that wear yellow goggles), and \'Fygars\' (a race of green dragons that can breathe fire while their wings flash).\r\n   The player\'s character is the eponymous Dig Dug, dressed in white and blue and able to dig tunnels through destructible environments. Dig Dug will be killed if he is caught by either a Pooka or a Fygar, burned by a Fygar\'s fire, or crushed by a rock he has loosened.\r\n   A partially inflated monster will gradually deflate and recover after a few seconds, during which time Dig Dug can pass safely through it. The monsters normally crawl through the tunnels in the dirt but can turn into ghostly eyes and travel slowly through the dirt. The last enemy in a round will try to escape off the top left of the screen - and if he succeeds, the potential points are lost.\r\n   More points will be awarded for exploding an enemy further down in the dirt (the levels are color-coded). Additionally, Fygars are worth double points if exploded horizontally, since they can only breathe fire horizontally in the direction they are facing. Extra points are also awarded for dropping rocks on enemies in order to eliminate them rather than inflating them. If one enemy is killed by the rock, it is worth 1000 points. The next two add 1500 points each, and any after that, add 2000. The act of digging is itself worth points - giving 10 points for each block dug, so some players will do as much of it as possible while the threat from the remaining monsters is minimal.\r\n   After the player drops two rocks, fruits and vegetables and other edible bonus items, such as Galaxian flagships, appear in the center of the play field, and can be collected for points if the player is able to reach them before they disappear. These edible bonus items will appear even if the rocks fail to crush any enemies. In the original arcade version, the most points attainable from a single bonus fruit (or vegetable) is 8000 from the pineapple, which appears in every round of the game from the seventeenth round onwards.\r\n   If the player should drop a rock on an enemy at the same time he or she explodes him, a glitch will occur whereupon all enemies will promptly disappear, but the game will not progress and the player will be free to dig through all dirt. Attaining the next level of play will then remain impossible, but the glitch can be resolved by forcing a rock to drop (unless, of course, there are no rocks remaining).\r\n   The round numbers are represented by flowers in the top right of the screen, and each new round is noted at the beginning of each round. After every fourth round, the color of the dirt will alternate. In successive rounds more monsters appear on each screen, and they move quicker. A round is completed successfully when the last monster is dispatched or succeeds in fleeing. In the original Namco version, the game will end on round 256 (round zero), since the board is essentially an unplayable kill screen; at the start of the round, a Pooka will be placed directly on top of Dig Dug with no way to kill him. Therefore, the game will basically be over at this point, regardless of how many lives a player may have remaining - but the Atari version corrects this problem.', 1, 1, '2020-07-11 10:04:55', 1, 5);

-- --------------------------------------------------------

--
-- Estructura de la taula `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `lastLogin` datetime DEFAULT NULL,
  `active` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Bolcament de dades per a la taula `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`, `lastLogin`, `active`) VALUES
(1, 'user', '$2y$12$nNCoO3E/5Z56CerfX4osJ.arLrWFKU9CIXMNQyF7.x/2eQYVxuyzO', 'ROLE_USER', '2018-01-04 01:01:00', 1),
(10, 'admin', '$2y$10$ToAjqYpdiehR1q/ZpGIBIO8NVhPJFlpnpOsRxvnqVXceJJ.h96Azu', 'ROLE_ADMIN', NULL, 1);

--
-- Índexs per a les taules bolcades
--

--
-- Índexs per a la taula `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Índexs per a la taula `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Índexs per a la taula `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`),
  ADD KEY `categoryId` (`categoryId`);

--
-- Índexs per a la taula `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per les taules bolcades
--

--
-- AUTO_INCREMENT per la taula `access`
--
ALTER TABLE `access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la taula `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT per la taula `game`
--
ALTER TABLE `game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT per la taula `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restriccions per a les taules bolcades
--

--
-- Restriccions per a la taula `access`
--
ALTER TABLE `access`
  ADD CONSTRAINT `access_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`);

--
-- Restriccions per a la taula `game`
--
ALTER TABLE `game`
  ADD CONSTRAINT `game_ibfk_1` FOREIGN KEY (`categoryId`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `game_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

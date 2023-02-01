-- ----------------------
-- dump de la base au 11-Nov-2012
-- ----------------------


-- -----------------------------
-- Structure de la table admin_login
-- -----------------------------
CREATE TABLE `admin_login` (
  `PKNoMembre` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(85) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `key_crypte` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`PKNoMembre`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- -----------------------------
-- Contenu de la table admin_login
-- -----------------------------
INSERT INTO admin_login VALUES(1, 'dominique.roduit@live.emvs.net', '1c6c7046b0bf3a53877345becf177db57a583406', '8fc541d8742c8b8b2367d1f6f80eb67e95014302');
INSERT INTO admin_login VALUES(3, 'thibault.schoenmann@emvs.ch', '2153b0975f6eef41339a47b347bfc9e61dd40afb', 'cb9c2d34a5f3330ec88946763d18d5abfca6ac55');

-- -----------------------------
-- Structure de la table tbl_translations
-- -----------------------------
CREATE TABLE `tbl_translations` (
  `PKNoWord` int(11) NOT NULL AUTO_INCREMENT,
  `fr` text CHARACTER SET latin1 COMMENT 'Français',
  `de` text CHARACTER SET latin1,
  `en` text CHARACTER SET latin1,
  PRIMARY KEY (`PKNoWord`)
) ENGINE=InnoDB AUTO_INCREMENT=311 DEFAULT CHARSET=utf8;

-- -----------------------------
-- Contenu de la table tbl_translations
-- -----------------------------
INSERT INTO tbl_translations VALUES(1, 'Eleves', 'Studenten', 'Students');
INSERT INTO tbl_translations VALUES(2, 'Professeurs', 'Lehrer', 'Teachers');
INSERT INTO tbl_translations VALUES(3, 'Recherche', 'Such nach', 'Search...');
INSERT INTO tbl_translations VALUES(4, 'Projets', 'Projekte', 'Projects');
INSERT INTO tbl_translations VALUES(5, 'Administrateur', 'Administrator', 'Administrator');
INSERT INTO tbl_translations VALUES(6, 'Profil', 'Profil', 'Profil');
INSERT INTO tbl_translations VALUES(7, 'Rechargement dans 2 secondes', 'Erholen Sie sich in 2 Sekunden', 'Reload in 2 seconds');
INSERT INTO tbl_translations VALUES(8, 'Déconnexion', 'Abschaltung', 'Disconnection');
INSERT INTO tbl_translations VALUES(9, 'La page d\'accueil n\'existe pas, veuillez la créer...', 'Die Homepage ist nicht vorhanden, erstellen Sie bitte das ...', 'The home page does not exist, please create it ...');
INSERT INTO tbl_translations VALUES(10, 'La zone d\'administration est indisponible', 'Der Administrationsbereich ist nicht verfügbar', 'The admin area is unavailable');
INSERT INTO tbl_translations VALUES(11, 'Erreur 404', '404-Fehler', '404 error');
INSERT INTO tbl_translations VALUES(12, 'Cette page n\'existe pas', 'Diese Seite existiert nicht', 'This page doesn\'t exist');
INSERT INTO tbl_translations VALUES(13, 'Année', 'Jahr', 'Year');
INSERT INTO tbl_translations VALUES(14, 'Liste des projets', 'Liste der Projekte', 'List of projects');
INSERT INTO tbl_translations VALUES(15, 'Toutes', 'Alle', 'All');
INSERT INTO tbl_translations VALUES(16, 'Profession', 'Beruf', 'Profession');
INSERT INTO tbl_translations VALUES(17, 'Professions', 'Berufe', 'Occupations');
INSERT INTO tbl_translations VALUES(18, 'Tri', 'Sortierung', 'Sorting');
INSERT INTO tbl_translations VALUES(19, 'Ascendant', 'Aszendenten', 'Ascending');
INSERT INTO tbl_translations VALUES(20, 'Descendant', 'Deszendenten', 'Descending');
INSERT INTO tbl_translations VALUES(21, 'Chercher', 'Suche', 'Search');
INSERT INTO tbl_translations VALUES(22, 'Titre du projet', 'Titel des Projekts', 'Title of project');
INSERT INTO tbl_translations VALUES(23, 'Actions', 'Aktionen', 'Actions');
INSERT INTO tbl_translations VALUES(24, 'Afficher', 'Anzeigen', 'Display');
INSERT INTO tbl_translations VALUES(25, 'Editer', 'Bearbeiten', 'Edit');
INSERT INTO tbl_translations VALUES(26, 'Suppr.', 'Lösch.', 'Del.');
INSERT INTO tbl_translations VALUES(27, 'Confirmer la suppression', 'Bestätigen Sie den Löschvorgang', 'Confirm the deletion');
INSERT INTO tbl_translations VALUES(28, 'Ce projet va être éffacé.', 'Dieses Projekt wird gelöscht.', 'This project is going to be erased');
INSERT INTO tbl_translations VALUES(29, 'Voulez-vous poursuivre ?', 'Wollen Sie fortsetzen?', 'Would you continue ?');
INSERT INTO tbl_translations VALUES(30, 'Confirmer', 'Bestätigen', 'Confirm');
INSERT INTO tbl_translations VALUES(31, 'Annuler', 'Abbrechen', 'Cancel');
INSERT INTO tbl_translations VALUES(32, 'Informations sur le projet', 'Project Information', 'Informations about project');
INSERT INTO tbl_translations VALUES(33, 'Francais', 'Französisch', 'French');
INSERT INTO tbl_translations VALUES(34, 'Allemand', 'Deutsch', 'German');
INSERT INTO tbl_translations VALUES(35, 'Titre', 'Titel', 'Title');
INSERT INTO tbl_translations VALUES(36, 'Description', 'Beschreibung', 'Description');
INSERT INTO tbl_translations VALUES(37, 'Réalisation', 'Realisierung', 'Realization');
INSERT INTO tbl_translations VALUES(38, 'Gérer les réalisateurs', 'Geschäftsführer', 'Managing directors');
INSERT INTO tbl_translations VALUES(39, 'Responsabilité', 'Verantwortung', 'Responsibility');
INSERT INTO tbl_translations VALUES(40, 'Gérer les responsables', 'Manager verwalten', 'Managers manage');
INSERT INTO tbl_translations VALUES(41, 'Image', 'Bild', 'Image');
INSERT INTO tbl_translations VALUES(42, 'Enregistrer', 'Bestätigen', 'Save');
INSERT INTO tbl_translations VALUES(43, 'Changer', 'Ändern', 'Change');
INSERT INTO tbl_translations VALUES(44, 'Sélectionnez les élèves ayant réalisé ce projet', 'Wählen Sie Studenten, die dieses Projekt durchgeführt', 'Select students which realized this project');
INSERT INTO tbl_translations VALUES(45, 'Sélectionnez les responsables de ce projet', 'Wählen Sie die Verantwortlichen für dieses Projekt', 'Select those responsible for this project');
INSERT INTO tbl_translations VALUES(46, 'Erreur lors de l\'execution de la requete', 'Fehler Erledigung des Ersuchens', 'Error while executing query');
INSERT INTO tbl_translations VALUES(47, 'Une erreur est survenue lors de l\'enregistrement des valeurs.', 'Ein Fehler ist aufgetreten beim Speichern von Werten.', 'An error has occured while saving');
INSERT INTO tbl_translations VALUES(48, 'Outils d\'administration', 'Verwaltung', 'Admin tools');
INSERT INTO tbl_translations VALUES(49, 'Encore aucun', 'Immer noch keine', 'Still none');
INSERT INTO tbl_translations VALUES(50, 'Les professeurs ont été ajoutés au projet', 'Die Lehrer wurden zu dem Projekt hinzugefügt', 'The teachers were added to the project');
INSERT INTO tbl_translations VALUES(51, 'La liste des élève à été mise à jour', 'Die Liste der Studenten wurde aktualisiert', 'The list of students has been updated');
INSERT INTO tbl_translations VALUES(52, 'Informations du projet enregistrées', 'Projekt-Informationen aufgezeichnet', 'Project information recorded');
INSERT INTO tbl_translations VALUES(53, 'Toutes les sélections', 'Alle Auswahlen', 'All selections');
INSERT INTO tbl_translations VALUES(54, 'Description de l\'image', 'Beschreibung des Bildes', 'Description of the image');
INSERT INTO tbl_translations VALUES(55, 'Nouveau', 'neu', 'New');
INSERT INTO tbl_translations VALUES(56, 'Liste des élèves', 'Liste der Studenten', 'List of students');
INSERT INTO tbl_translations VALUES(57, 'Années', 'Jahre', 'Years');
INSERT INTO tbl_translations VALUES(58, 'Participation', 'Teilnahme', 'Participation');
INSERT INTO tbl_translations VALUES(59, 'Nom/Prénom de l\'élève', 'Name / Vorname des Schülers', 'Name/Firstname of student');
INSERT INTO tbl_translations VALUES(60, 'Cet élève va être éffacé.', 'Diese Schüler werden gelöscht.', 'This student is going to be erased');
INSERT INTO tbl_translations VALUES(61, 'Prénom', 'Vorname', 'Firstname');
INSERT INTO tbl_translations VALUES(62, 'Nom', 'Name', 'Name');
INSERT INTO tbl_translations VALUES(63, 'Nom/Prénom', 'Name/Vorname', 'Name/Firstname');
INSERT INTO tbl_translations VALUES(64, 'Informations sur l\'élève', 'Informationen für Studenten', 'Informations about student');
INSERT INTO tbl_translations VALUES(65, 'Charger une image', 'Laden Sie ein Bild', 'Load image');
INSERT INTO tbl_translations VALUES(66, 'Tous les dossiers', 'Alle Aufzeichnungen', 'All directories');
INSERT INTO tbl_translations VALUES(67, 'Voulez-vous poursuivre', 'Wollen Sie fortsetzen', 'Would you continue ?');
INSERT INTO tbl_translations VALUES(68, 'Ce fichier va être éffacé', 'Diese Datei wird gelöscht', 'This file is going to be erased');
INSERT INTO tbl_translations VALUES(69, 'Confirmer la suppression', 'Bestätigen Sie den Löschvorgang', 'Confirm the deletion');
INSERT INTO tbl_translations VALUES(70, 'Aucun fichier chargé', 'Keine Datei geladen', 'No file loaded');
INSERT INTO tbl_translations VALUES(71, 'Administration', 'Administration', 'Administration');
INSERT INTO tbl_translations VALUES(72, 'Langue de l\'interface', 'Sprache der Benutzeroberfläche', 'Interface language');
INSERT INTO tbl_translations VALUES(73, 'Configuration', 'Konfiguration', 'Configuration');
INSERT INTO tbl_translations VALUES(74, 'Rechargement automatique', 'Automatisches Nachladen an', 'Auto reload');
INSERT INTO tbl_translations VALUES(75, 'Config', 'Konfig', 'Config');
INSERT INTO tbl_translations VALUES(76, 'Gestion des administrateurs', 'Geschäftsführer', 'Managing administrators');
INSERT INTO tbl_translations VALUES(77, 'Administrateurs', 'Administratoren', 'Administrators');
INSERT INTO tbl_translations VALUES(78, 'Cryptage', 'Verschlüsselung', 'Encryption');
INSERT INTO tbl_translations VALUES(79, 'Les mots de passes doivent contenir au moins 5 caractères mais il est inutile qu\'ils contiennent des caractères spéciaux.', 'Passwörter müssen mindestens 5 Zeichen, aber es gibt keine Notwendigkeit, Sonderzeichen enthalten.', 'Passwords must contain at least 5 characters but there is no need to contain special characters.');
INSERT INTO tbl_translations VALUES(80, 'Cet utilisateur va être éffacé.', 'Dieser Benutzer wird gelöscht.', 'This user is going to be erased');
INSERT INTO tbl_translations VALUES(81, 'Informations d\'authentification', 'Authentifizierungsinformationen', 'Authentication information');
INSERT INTO tbl_translations VALUES(82, 'Adresse email', 'E-Mail-Adresse', 'E-mail adress');
INSERT INTO tbl_translations VALUES(83, 'Mot de passe', 'Passwort', 'Password');
INSERT INTO tbl_translations VALUES(84, 'Confirmation du mot de passe', 'Bestätigung des Passworts', 'Password confirmation');
INSERT INTO tbl_translations VALUES(85, 'Le bouton de validation n\'apparaitra qu\'une fois vos informations correctement remplies.', 'Der Submit-Button nicht zu sehen sind Ihre Informationen korrekt ausgefüllt.', 'The submit button does not show up your information correctly filled');
INSERT INTO tbl_translations VALUES(86, 'Nouveau mot de passe', 'Neues Passwort', 'New password');
INSERT INTO tbl_translations VALUES(87, 'Retaper le mot de passe', 'Geben Sie das Kennwort', 'Retype your password');
INSERT INTO tbl_translations VALUES(88, 'Votre profil', 'Ihr Profil', 'Your profil');
INSERT INTO tbl_translations VALUES(89, 'Hôte', 'Host', 'Host');
INSERT INTO tbl_translations VALUES(90, 'Langue', 'Sprache', 'Language');
INSERT INTO tbl_translations VALUES(91, 'Affichage', 'Anzeige', 'Display');
INSERT INTO tbl_translations VALUES(92, 'Aucun projet trouvé', 'Keine Projekte gefunden', 'No project found');
INSERT INTO tbl_translations VALUES(93, 'Aucun professeur trouvé', 'Kein Lehrer gefunden', 'No teacher found');
INSERT INTO tbl_translations VALUES(94, 'Aucun élève trouvé', 'Keine Schüler gefunden', 'No student found');
INSERT INTO tbl_translations VALUES(95, 'E-mail', 'E-Mail', 'E-mail');
INSERT INTO tbl_translations VALUES(96, 'Photo', 'Foto', 'Image');
INSERT INTO tbl_translations VALUES(97, 'Vérifiez si la génération est correcte', 'Prüfen Sie, ob die Erzeugung korrekt ist', 'Verify if the generation is correct');
INSERT INTO tbl_translations VALUES(98, 'Adresse e-mail de l\'élève', 'E-Mail-Adresse des Studenten', 'Student\'s mail adress');
INSERT INTO tbl_translations VALUES(99, 'Erreur lors de l\'execution de la requete', 'Fehler Erledigung des Ersuchens', 'Error while executing query');
INSERT INTO tbl_translations VALUES(100, 'Enregistrer pour sélectionner une image', 'Speichern, um ein Bild auszuwählen', 'Save for select an image');
INSERT INTO tbl_translations VALUES(101, 'Corriger l\'adresse mail', 'Korrigieren Sie die E-Mail-Adresse', 'Correct email address');
INSERT INTO tbl_translations VALUES(102, 'Choisissez maintenant une image', 'Jetzt wählen Sie ein Bild', 'Choose now an image');
INSERT INTO tbl_translations VALUES(103, 'Détacher', 'Trennen', 'Detach');
INSERT INTO tbl_translations VALUES(104, 'Changer', 'Ändern', 'Change');
INSERT INTO tbl_translations VALUES(105, 'L\'image a été détachée avec succès', 'Das Bild wurde erfolgreich abgelöst', 'The image was successfully detached');
INSERT INTO tbl_translations VALUES(106, 'Modifiez si la génération ne convient pas', 'Ändern, wenn die Generation ist nicht geeignet', 'Change if the generation is not suitable');
INSERT INTO tbl_translations VALUES(107, 'Pressez \'CTRL\' pour générer', 'Drücken Sie \'CTRL\' zu generieren', 'Press \'CTRL\' for generate');
INSERT INTO tbl_translations VALUES(108, 'a maintenant une photo', 'hat jetzt ein Foto', 'has now a photo');
INSERT INTO tbl_translations VALUES(109, 'Nouvelle image assignée', 'Neues Bild zugeordnet', 'New image assigned');
INSERT INTO tbl_translations VALUES(110, 'Recharger la page', 'Laden Sie die Seite', 'Reload the page');
INSERT INTO tbl_translations VALUES(111, 'Informations sur le professeur', 'Informationen über den Lehrer', 'Informations about professor');
INSERT INTO tbl_translations VALUES(112, 'Assigner à', 'Zugeordnet nach', 'Assign to');
INSERT INTO tbl_translations VALUES(113, 'Sélectionner vos fichiers', 'Wählen Sie Ihre Dateien', 'Select your files');
INSERT INTO tbl_translations VALUES(114, 'Ajoutez vos fichiez dans la liste d\'attente et cliquez sur le bouton Démarrer', 'Fügen Sie Ihre fichiez in die Warteliste ein und klicken Sie auf die Schaltfläche Start', 'Add your fichiez in the waiting list and click the Start button');
INSERT INTO tbl_translations VALUES(115, 'Génération des miniatures. Fermeture automatique a la fin du traitement. Le chargement peut etre long, ne quittez pas.', 'Erzeugung von Thumbnails. Die automatische Schließung am Ende der Behandlung. Die Beladung kann lange nicht beendet.', 'Generation of thumbnails. Automatic closing at the end of treatment. The loading can be long, do not quit.');
INSERT INTO tbl_translations VALUES(116, 'Adresse e-mail', 'E-Mail-Adresse', 'E-mail');
INSERT INTO tbl_translations VALUES(117, 'Liste des professeurs', 'Liste der Lehrer', 'List of Professors');
INSERT INTO tbl_translations VALUES(118, 'Votre Navigateur ne supporte pas Flash, Silverlight, BrowserPlus ou HTML5', 'Ihr Browser unterstützt kein Flash, Silverlight oder HTML5 BrowserPlus', 'Your browser does not support Flash, Silverlight, or HTML5 BrowserPlus');
INSERT INTO tbl_translations VALUES(119, 'Envoi terminé avec succès', 'Senden Sie erfolgreich abgeschlossen', 'Send completed successfully');
INSERT INTO tbl_translations VALUES(120, 'Archiver', 'Archiv', 'archive');
INSERT INTO tbl_translations VALUES(121, 'Restaurer', 'Wieder.', 'restore');
INSERT INTO tbl_translations VALUES(122, 'Archivage', 'Archivierung', 'archiving');
INSERT INTO tbl_translations VALUES(123, 'Masquer', 'Ausblenden', 'Hide');
INSERT INTO tbl_translations VALUES(124, 'Projet mis à jour', 'Aktualisiert Projekt', 'Updated project');
INSERT INTO tbl_translations VALUES(125, 'Suivant', 'Weiter', 'Next');
INSERT INTO tbl_translations VALUES(126, 'Documents', 'Dokumente', 'Documents');
INSERT INTO tbl_translations VALUES(127, 'Charger des fichiers', 'Dateien hoch zu laden', 'Upload files');
INSERT INTO tbl_translations VALUES(128, 'Tous type de documents', 'Alle diese Dokumente', 'All type of documents');
INSERT INTO tbl_translations VALUES(129, 'Année/Période', 'Zeitraum', 'Year/Period');
INSERT INTO tbl_translations VALUES(130, 'Historique du projet', 'Geschichte des Projekts', 'Project History');
INSERT INTO tbl_translations VALUES(131, 'Nouvelle entrée', 'Neuer Eintrag', 'new entry');
INSERT INTO tbl_translations VALUES(132, 'Pour enregistrer', 'Zum Speichern', 'For save');
INSERT INTO tbl_translations VALUES(133, 'Attribut', 'Attribut', 'attribute');
INSERT INTO tbl_translations VALUES(134, 'Assigner au projet', 'Dem Projekt zugewiesen', 'Assigned to the project');
INSERT INTO tbl_translations VALUES(135, 'Edition de l\'historique du projet', 'Ausgabe des Projekts Geschichte', 'Editing project history');
INSERT INTO tbl_translations VALUES(136, 'Nouvelle entrée dans l\'historique du projet', 'Neuer Eintrag in der Geschichte des Projekts', 'New entry in the history of the project');
INSERT INTO tbl_translations VALUES(137, 'Etendre l\'affichage', 'Erweitern Sie die Anzeige', 'Expand the display');
INSERT INTO tbl_translations VALUES(138, 'Informations', 'Informationen', 'Informations');
INSERT INTO tbl_translations VALUES(139, 'Période', 'Zeitraum', 'Period');
INSERT INTO tbl_translations VALUES(140, 'Fonctionnalités apportées', 'Funktionen zur Verfügung gestellt', 'New functions');
INSERT INTO tbl_translations VALUES(141, 'Elèves executants', 'Studenten Interpreten', 'Students performers');
INSERT INTO tbl_translations VALUES(142, 'Entrez le nom d\'un élève', 'Geben Sie den Namen eines Schülers', 'Type the name of student');
INSERT INTO tbl_translations VALUES(143, 'Professeurs responsables', 'Verantwortlich Lehrer', 'teachers responsible');
INSERT INTO tbl_translations VALUES(144, 'Entrez le nom d\'un professeur', 'Geben Sie den Namen eines Professors', 'Type the name of teacher');
INSERT INTO tbl_translations VALUES(145, 'Elève déjà existant', 'Schüler bereits vorhanden', 'The same student already exist');
INSERT INTO tbl_translations VALUES(146, 'Voulez-vous quand meme l\'ajouter', 'Erinnern Sie sich noch wünschen, um die gleiche hinzufügen', 'Do you still wish to add the same');
INSERT INTO tbl_translations VALUES(147, 'Existe déjà', 'Ist bereits vorhanden', 'already exists');
INSERT INTO tbl_translations VALUES(148, 'Ajouter un élève', 'Fügen Sie ein Student', 'Add student');
INSERT INTO tbl_translations VALUES(149, 'Oui', 'Ja', 'Yes');
INSERT INTO tbl_translations VALUES(150, 'Non', 'Nein', 'No');
INSERT INTO tbl_translations VALUES(151, 'Nouveau projet', 'Neues Projekt', 'New project');
INSERT INTO tbl_translations VALUES(152, 'Date et Salle', 'Datum und Zimmer', 'Date & Room');
INSERT INTO tbl_translations VALUES(153, 'Salle', 'Zimmer-Nr', 'Room');
INSERT INTO tbl_translations VALUES(154, 'Terminer', 'Fertig', 'Finished');
INSERT INTO tbl_translations VALUES(155, 'Gestion des médias liés', 'Verwaltung von Medien zusammen', 'Management of media related');
INSERT INTO tbl_translations VALUES(156, 'Images', 'Bilder', 'Images');
INSERT INTO tbl_translations VALUES(157, 'Vous devez ajouter au minimum un apprentis et un enseignant !', 'Sie müssen sich fügen Sie mindestens einen Lehrling und einen Lehrer!', 'You must add at least one apprentice and a teacher!');
INSERT INTO tbl_translations VALUES(158, 'Indéterminé', 'Unbestimmt', 'Unknow');
INSERT INTO tbl_translations VALUES(159, 'Nom/Prénom du professeur', 'Name / Vorname des Lehrers', 'Teacher\'s name/firstname');
INSERT INTO tbl_translations VALUES(160, 'Apprentis', 'Auszubildende', 'Students');
INSERT INTO tbl_translations VALUES(161, 'Enseignants', 'Lehrpersonen', 'Teachers');
INSERT INTO tbl_translations VALUES(162, 'Documents à générer', 'Dokumente erzeugt werden', 'Documents to generate');
INSERT INTO tbl_translations VALUES(163, 'Affiches de projets', 'Poster-Projekte', 'Posters of projects');
INSERT INTO tbl_translations VALUES(164, 'Toutes périodes', 'Alle Perioden', 'All period');
INSERT INTO tbl_translations VALUES(165, 'Toutes professions', 'Alle Berufe', 'All jobs');
INSERT INTO tbl_translations VALUES(166, 'Affiches à générer', 'Poster erzeugt werden soll', 'Posters to generate');
INSERT INTO tbl_translations VALUES(167, 'Toutes professions', 'Alle Berufe', 'All jobs');
INSERT INTO tbl_translations VALUES(168, 'Edition des données', 'Bearbeiten von Daten', 'Data editing');
INSERT INTO tbl_translations VALUES(169, 'Séparez les noms par des virgules. La casse sera traité lors de la génération.', 'Trennen Sie Namen durch ein Komma. Der Fall wird bearbeitet, wenn die Erzeugung werden.', 'Separate names with commas. The case will be processed when generating.');
INSERT INTO tbl_translations VALUES(170, 'Modifier', 'Bearbeiten', 'Edit');
INSERT INTO tbl_translations VALUES(171, 'Génération des PDF', 'PDF-Erzeugung', 'PDF Generating');
INSERT INTO tbl_translations VALUES(172, 'PDF générés', 'PDF generiert', 'PDF generated');
INSERT INTO tbl_translations VALUES(173, 'La description de certains projets est trop longue pour etre imprimé sur une seul page ! Les projets concernés sont surligné en rouge, veuillez editer les descriptions et les raccourcir', 'Die Beschreibung einiger Projekte ist zu lang, um auf einer einzigen Seite gedruckt werden! Die betroffenen Projekte in rot hervorgehoben werden, editieren Sie bitte die Beschreibungen und die Verkürzung', 'The description of some projects is too long to be printed on a single page! The projects concerned are highlighted in red, please edit the descriptions and shortening');
INSERT INTO tbl_translations VALUES(174, 'Vous devez supprimer', 'Sie müssen mindestens', 'You must delete');
INSERT INTO tbl_translations VALUES(175, 'caractères au minimum', 'löschen Zeichen', 'characteres at least');
INSERT INTO tbl_translations VALUES(176, 'Nombre actuelle', 'Aktuelle Anzahl', 'Current number');
INSERT INTO tbl_translations VALUES(177, 'Maximum autorisé', 'Maximal zulässig', 'Maximum allowed');
INSERT INTO tbl_translations VALUES(178, 'sur', 'von', 'on');
INSERT INTO tbl_translations VALUES(179, 'Génération de l\'archive', 'Generierung des Archivs', 'Generation of the archive');
INSERT INTO tbl_translations VALUES(180, 'Télécharger', 'Laden', 'Download');
INSERT INTO tbl_translations VALUES(181, 'Aucun document à générer', 'Kein Dokument zu erzeugen', 'No document to generate');
INSERT INTO tbl_translations VALUES(182, 'Général', 'Allgemeines', 'General');
INSERT INTO tbl_translations VALUES(183, 'Gestion des salles', 'Raummanagement', 'Room management');
INSERT INTO tbl_translations VALUES(184, 'Générateur', 'Generator', 'Generator');
INSERT INTO tbl_translations VALUES(185, 'Plus évolué', 'Mehr weiterentwickelt', 'more advanced');
INSERT INTO tbl_translations VALUES(186, 'Ajouter des projets à la liste', 'In Projekten auf der Liste', 'Add projects to the list');
INSERT INTO tbl_translations VALUES(187, 'Générer la liste', 'Generieren Sie die Liste', 'Creating a List');
INSERT INTO tbl_translations VALUES(188, 'Afficher les QRCode', 'Zeige QRCode', 'Display QRCode');
INSERT INTO tbl_translations VALUES(189, 'Générer un seul PDF et répartir les projets sur plusieurs pages', 'Generieren Sie ein einzelnes PDF und verteilen die Projekte über mehrere Seiten', 'Generate a single PDF and distribute projects across multiple pages');
INSERT INTO tbl_translations VALUES(190, 'Générer un PDF par projet', 'Ein PDF generieren für jedes Projekt', 'Generate one PDF by project');
INSERT INTO tbl_translations VALUES(191, 'Lancer le processus de génération', 'Starten Sie den Vorgang', 'Run generation process');
INSERT INTO tbl_translations VALUES(192, 'Supprimer les tags HTML', 'Entfernen Sie HTML-Tags', 'Delete HTML tags');
INSERT INTO tbl_translations VALUES(193, 'mais conserver ceux-ci', 'aber sie behalten', 'but conserve these ones');
INSERT INTO tbl_translations VALUES(194, 'Télécharger le PDF complet', 'Laden Sie die komplette PDF', 'Download complete PDF');
INSERT INTO tbl_translations VALUES(195, 'Supprimer', 'Entfernen', 'Delete');
INSERT INTO tbl_translations VALUES(196, 'Ajouter', 'Hinzufügen', 'Add');
INSERT INTO tbl_translations VALUES(197, 'Extérieur', 'Draußen', 'Outside');
INSERT INTO tbl_translations VALUES(198, 'Hall', 'Hall', 'Hall');
INSERT INTO tbl_translations VALUES(199, 'Passerelle', 'Brücke', 'Bridge');
INSERT INTO tbl_translations VALUES(200, 'Ce projet va être archivé.', 'Dieses Projekt werden archiviert.', 'This project is going to be erased');
INSERT INTO tbl_translations VALUES(201, 'Ordre', 'Ordnung', 'Order');
INSERT INTO tbl_translations VALUES(202, 'Salles', 'Zimmer', 'Rooms');
INSERT INTO tbl_translations VALUES(203, 'Ajout d\'une salle', 'Ein Zimmer hinzufügen', 'Add a room');
INSERT INTO tbl_translations VALUES(204, 'No ou nom de la salle', 'Nr. oder Name des Raumes', 'Num. or name of the room');
INSERT INTO tbl_translations VALUES(205, 'Modification d\'une salle', 'Ändern Sie den Raum', 'Changing a room');
INSERT INTO tbl_translations VALUES(206, 'Cette salle va être éffacé.', 'Dieser Raum wird gelöscht.', 'This room is going to be erased');
INSERT INTO tbl_translations VALUES(207, 'Le mot de passe et l\'email ne correspondent pas', 'Das Passwort und die E-Mail stimmt nicht überein', 'The password and the email doesn\'t match');
INSERT INTO tbl_translations VALUES(208, 'Connexion', 'Anschluss', 'Log in');
INSERT INTO tbl_translations VALUES(209, 'Enregistrer mes identifiants', 'Kennwort speichern', 'Save my password');
INSERT INTO tbl_translations VALUES(210, 'Si vous n\'arrivez pas à ajouter correctement les descriptions, sauvegardez et rechargez la page', 'Wenn Sie nicht richtig Beschreibungen hinzufügen, speichern und laden die Seite', 'If you are unable to properly add descriptions, save and reload the page.');
INSERT INTO tbl_translations VALUES(211, 'Traduction', 'Übersetzung', 'Translation');
INSERT INTO tbl_translations VALUES(212, 'Traductions', 'Übersetzungen', 'Translations');
INSERT INTO tbl_translations VALUES(213, 'Nouvelle traduction', 'Neue Übersetzung', 'New translation');
INSERT INTO tbl_translations VALUES(214, 'Cette entrée va être éffacée', 'Dieser Eintrag wird gelöscht', 'This entry will be deleted');
INSERT INTO tbl_translations VALUES(230, 'Vous trouverez ci-dessous quelques uns des', 'Nachfolgend finden Sie einige der', 'You will find below some of');
INSERT INTO tbl_translations VALUES(231, 'Description', 'Beschreibung', 'Description');
INSERT INTO tbl_translations VALUES(232, 'Réalisé par', 'Erstellt durch', 'Directed by');
INSERT INTO tbl_translations VALUES(233, 'Responsable', 'Verantwortlicher', 'Person responsible');
INSERT INTO tbl_translations VALUES(234, 'Accueil', 'Home', 'Home');
INSERT INTO tbl_translations VALUES(235, 'Projets', 'Projekte', 'Projects');
INSERT INTO tbl_translations VALUES(238, 'Vous trouverez ici la liste de nos différents projets', 'Sie finden hier die Liste unserer Projekte', 'Here is a list of our various projects');
INSERT INTO tbl_translations VALUES(239, 'Mots clé', 'Schlüsselwort', 'Keywords');
INSERT INTO tbl_translations VALUES(240, 'Catégories', 'Kategorien', 'Categories');
INSERT INTO tbl_translations VALUES(241, 'Rechercher', 'Suchen', 'Search');
INSERT INTO tbl_translations VALUES(242, 'Nombre de projets', 'Anzahl Projekte', 'Number of Projects');
INSERT INTO tbl_translations VALUES(243, 'Titre', 'Titel', 'Title');
INSERT INTO tbl_translations VALUES(244, 'Année', 'Jahr', 'Year');
INSERT INTO tbl_translations VALUES(245, 'précédent', 'Vorherige', 'previous');
INSERT INTO tbl_translations VALUES(246, 'suivant', 'Weiter', 'Next');
INSERT INTO tbl_translations VALUES(247, 'projets présentés sur ce site. Nous vous souhaitons une excellente visite', 'Projekte auf dieser Seite zu finden. Wir hoffen, Sie genießen Ihren Besuch', 'projects on this site. We hope you enjoy your visit');
INSERT INTO tbl_translations VALUES(248, 'Profession', 'Beruf', 'Profession');
INSERT INTO tbl_translations VALUES(249, 'Vous trouverez ici la liste de nos apprentis', 'Sie finden hier die Liste unserer Auszubildenden', 'Here is a list of our apprentices');
INSERT INTO tbl_translations VALUES(250, 'Vous trouverez ici la liste de nos enseignants', 'Sie finden hier die Liste unserer Lehrpersonen', 'Here is a list of our teachers');
INSERT INTO tbl_translations VALUES(251, 'Nombre de projets', 'Anzahl Projekte', 'Number of Projects');
INSERT INTO tbl_translations VALUES(252, 'Lancement', 'Anfang', 'Running');
INSERT INTO tbl_translations VALUES(253, 'Fichiers liés', 'Verknüpften Dateien', 'Linked files');
INSERT INTO tbl_translations VALUES(254, 'Télécharger les fichiers', 'Herunterladen von Dateien', 'Download files');
INSERT INTO tbl_translations VALUES(255, 'Nom du fichier', 'Dateiname', 'Filename');
INSERT INTO tbl_translations VALUES(256, 'Extension', 'Erweiterung', 'Extension');
INSERT INTO tbl_translations VALUES(257, 'Taille', 'Größe', 'Size');
INSERT INTO tbl_translations VALUES(258, 'Plus', 'Mehr', 'More');
INSERT INTO tbl_translations VALUES(259, 'Moins', 'Weniger', 'Less');
INSERT INTO tbl_translations VALUES(260, 'Liste des fichiers', 'Liste der Dateien', 'List of files');
INSERT INTO tbl_translations VALUES(263, 'Projet sans image', 'Projekt ohne Bild', 'Project without image');
INSERT INTO tbl_translations VALUES(264, 'Principal', 'Allgemeines', 'Principal');
INSERT INTO tbl_translations VALUES(265, 'Descriptions', 'Beschreibungen', 'Descriptions');
INSERT INTO tbl_translations VALUES(266, 'Médias', 'Medien', 'Media');
INSERT INTO tbl_translations VALUES(267, 'Importer', 'Importieren', 'Import');
INSERT INTO tbl_translations VALUES(268, 'Aide', 'Hilfe', 'Help');
INSERT INTO tbl_translations VALUES(269, 'Sélectionner un CSV', 'Wählen Sie eine CSV', 'Select CSV');
INSERT INTO tbl_translations VALUES(270, 'Le fichier doit être au format', 'Das Dateiformat muss sein', 'The file format must be');
INSERT INTO tbl_translations VALUES(271, 'Votre fichier CSV doit contenir les lignes telles que présentées dans la case Résultat', 'Ihre CSV-Datei muss als Linien im Feld Ergebnis präsentiert', 'Your CSV file must contain lines as presented in the Result box');
INSERT INTO tbl_translations VALUES(272, 'Vous devez séparer les lignes par un retour de chariot', 'Sie müssen die Leitungen von einem Wagenrücklauf trennen', 'You must separate the lines by a carriage return');
INSERT INTO tbl_translations VALUES(273, 'Résultat', 'Folge', 'Result');
INSERT INTO tbl_translations VALUES(274, 'Pour générer automatiquement les e-mails, entrez # à la place de l\'adresse mail !', 'Um E-Mails automatisch zu generieren, # anstelle von E-Mail-Adresse eingeben!', 'To automatically generate emails, enter # instead of email address!');
INSERT INTO tbl_translations VALUES(275, 'Importation terminée avec succès', 'Import erfolgreich abgeschlossen', 'Import completed successfully');
INSERT INTO tbl_translations VALUES(276, 'Statut', 'Status', 'Status');
INSERT INTO tbl_translations VALUES(277, 'Deja existant', 'Bereits bestehende', 'Already existing');
INSERT INTO tbl_translations VALUES(278, 'Ajouté', 'Hinzugefügt', 'Added');
INSERT INTO tbl_translations VALUES(279, 'Ne pas importer les doublons', 'Keine Duplikate importieren', 'Do not import duplicates');
INSERT INTO tbl_translations VALUES(280, 'Formation', 'Ausbildung', 'Formation');
INSERT INTO tbl_translations VALUES(281, 'Année début formation', 'Anfang Jahr Ausbildung', 'Year beginning training');
INSERT INTO tbl_translations VALUES(282, 'Terminera sa formation en', 'Seine Ausbildung im Jahr', 'Complete his training in');
INSERT INTO tbl_translations VALUES(283, 'Entrée à l\'école en', 'Schuleintritt im Jahr', 'School entry in');
INSERT INTO tbl_translations VALUES(284, 'Années de formation', 'Prägenden Jahre', 'Formative years');
INSERT INTO tbl_translations VALUES(285, 'Indéfini', 'undefiniert', 'undefined');
INSERT INTO tbl_translations VALUES(286, 'Début', 'Anfang', 'Beginning');
INSERT INTO tbl_translations VALUES(287, 'Aucun projet enregistré jusqu\'à ce jour ', 'Keine Projekte bis dato registriert', 'No projects registered to date');
INSERT INTO tbl_translations VALUES(288, 'Aucun résultat', 'Keine Ergebnisse', 'No results');
INSERT INTO tbl_translations VALUES(289, 'Projets contenant beaucoup de balises HTML ou dont les descriptions sont trop longues', 'Projekte mit vielen HTML-Tags oder deren Beschreibungen sind zu lang', 'Projects with lots of HTML tags or whose descriptions are too long');
INSERT INTO tbl_translations VALUES(290, 'important', 'wichtig', 'important');
INSERT INTO tbl_translations VALUES(291, 'Copiez tout d\'abord votre texte dans le champ suivant pour que tous les tags invisibles soient supprimés. Sélectionnez-le et copiez-le. Vous pouvez maintenant le coller dans les champs de description.', 'Kopieren Sie zuerst Ihren Text in das Feld neben unsichtbaren alle Tags entfernt. Wählen Sie es aus und kopieren Sie sie. Sie können nun fügen Sie ihn in den Feldern Beschreibung.', 'First copy your text into the field next to invisible all tags are removed. Select it and copy it. You can now paste it into the description fields.');
INSERT INTO tbl_translations VALUES(292, 'Aucun projet cette année là', 'Kein Projekt in diesem Jahr', 'No project that year');
INSERT INTO tbl_translations VALUES(293, 'Pas d\'image', 'Kein Bild', 'No picture');
INSERT INTO tbl_translations VALUES(294, 'Cliquez n\'importe où pour retourner à la page', 'Klicken Sie irgendwo auf die Seite zurückkehren', 'Click anywhere to return to the page');
INSERT INTO tbl_translations VALUES(295, 'Agrandir', 'Vergrößern', 'Extend');
INSERT INTO tbl_translations VALUES(296, 'Ce(s) fichier(s) vont être éffacés', 'Diese Dateien werden gelöscht', 'These files will be deleted');
INSERT INTO tbl_translations VALUES(297, 'Afficher tous', 'Alle anzeigen', 'Show all');
INSERT INTO tbl_translations VALUES(298, 'Afficher la sélection', 'Auswahl anzeigen', 'Show selection');
INSERT INTO tbl_translations VALUES(299, 'Supprimer la sélection', 'Ausgewählte löschen', 'Remove Selected');
INSERT INTO tbl_translations VALUES(300, 'Outils', 'Werkzeuge', 'Tools');
INSERT INTO tbl_translations VALUES(301, 'Base de donnée', 'Datenbank', 'Database');
INSERT INTO tbl_translations VALUES(302, 'Configuration PHP', 'PHP-Konfiguration', 'PHP configuration');
INSERT INTO tbl_translations VALUES(303, 'Paramètre', 'Parameter', 'Parameter');
INSERT INTO tbl_translations VALUES(304, 'Valeur globale', 'Gesamtwert', 'Overall value');
INSERT INTO tbl_translations VALUES(305, 'Valeur locale', 'lokaler Wert', 'local value');
INSERT INTO tbl_translations VALUES(306, 'Degré d\'accès', 'Grad des Zugriffs', 'Degree of access');
INSERT INTO tbl_translations VALUES(307, 'Exporter', 'exportieren', 'export');
INSERT INTO tbl_translations VALUES(308, 'Afficher les données', 'Anzeigen von Daten', 'Display data');
INSERT INTO tbl_translations VALUES(309, 'Gestion des médias', 'Media Management', 'Media Management');
INSERT INTO tbl_translations VALUES(310, 'Déplacer la sélection', 'Bewegen Auswahl', 'Move selection');

-- -----------------------------
-- Structure de la table admin_config
-- -----------------------------
CREATE TABLE `admin_config` (
  `PKNoConfig` int(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `value` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `description` text CHARACTER SET latin1,
  `category` int(11) DEFAULT NULL COMMENT '1. Eleves - 2. Prof - 3. Projets - 4. Global',
  PRIMARY KEY (`PKNoConfig`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- -----------------------------
-- Contenu de la table admin_config
-- -----------------------------
INSERT INTO admin_config VALUES(1, 'email_teacher', '[prenom]=*|.|[nom]=*|cfpsion.ch', 'E-mail : prenom.nom@', 2);
INSERT INTO admin_config VALUES(2, 'email_student', '[nom]=*|.|[prenom]=4|live.emvs.net', 'E-mail : prenom.nom@', 1);

-- -----------------------------
-- Structure de la table tbl_professions
-- -----------------------------
CREATE TABLE `tbl_professions` (
  `PKNoProfession` int(10) NOT NULL AUTO_INCREMENT,
  `abbr` varchar(1) DEFAULT NULL,
  `name_fr` varchar(20) DEFAULT NULL,
  `name_de` varchar(20) DEFAULT NULL,
  `name_en` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`PKNoProfession`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- -----------------------------
-- Contenu de la table tbl_professions
-- -----------------------------
INSERT INTO tbl_professions VALUES(1, 'A', 'Automaticien', 'Automatiker', 'Automation');
INSERT INTO tbl_professions VALUES(2, 'E', 'Electronicien', 'Elektroniker', 'Electronics');
INSERT INTO tbl_professions VALUES(3, 'I', 'Informaticien', 'Informatiker', 'Computing');

-- -----------------------------
-- Structure de la table tbl_projects
-- -----------------------------
CREATE TABLE `tbl_projects` (
  `PKNoProject` int(10) NOT NULL AUTO_INCREMENT,
  `title_fr` varchar(45) DEFAULT NULL,
  `title_de` varchar(45) DEFAULT NULL,
  `archive` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`PKNoProject`)
) ENGINE=InnoDB AUTO_INCREMENT=212 DEFAULT CHARSET=utf8;

-- -----------------------------
-- Contenu de la table tbl_projects
-- -----------------------------
INSERT INTO tbl_projects VALUES(2, 'MC Quizzy DS', 'MC Quizzy DS', NULL);
INSERT INTO tbl_projects VALUES(3, 'Wii-Shoot', 'Wii-Shoot', NULL);
INSERT INTO tbl_projects VALUES(4, 'BSS - Brass Score Share', 'BSS - Brass Score Share', NULL);
INSERT INTO tbl_projects VALUES(5, 'Domo-Box', 'Domo-Box', NULL);
INSERT INTO tbl_projects VALUES(6, 'Etiqueteuse', 'Etikettendrucker', NULL);
INSERT INTO tbl_projects VALUES(8, 'Speed_Rails', 'Speed_Rails', NULL);
INSERT INTO tbl_projects VALUES(9, 'Station Météo', 'Wetterstation', NULL);
INSERT INTO tbl_projects VALUES(10, 'Perceuses à colonnes', 'Bohrmaschinen Drehzahl', NULL);
INSERT INTO tbl_projects VALUES(11, 'Élévateur', 'Aufzug', NULL);
INSERT INTO tbl_projects VALUES(13, 'Démonstrateur solaire', 'Solar-Nachweiser', NULL);
INSERT INTO tbl_projects VALUES(14, 'Image virtuelle', 'Virtuelles Bild', NULL);
INSERT INTO tbl_projects VALUES(15, 'Universal Datalogger', NULL, NULL);
INSERT INTO tbl_projects VALUES(16, 'Démarrage moteur', 'Startmöglichkeiten eines Wechselstrom-Motors', NULL);
INSERT INTO tbl_projects VALUES(17, 'Feux au carrefour', 'Lichtsignalanlage', NULL);
INSERT INTO tbl_projects VALUES(18, 'Filtre à bourbes', 'Schlammfilters', NULL);
INSERT INTO tbl_projects VALUES(20, 'Régulateur PID analogique', 'Analog PID-Regulator', NULL);
INSERT INTO tbl_projects VALUES(21, 'Console de jeu V3.0', 'Spielkonsole V3.0', NULL);
INSERT INTO tbl_projects VALUES(22, 'Luft Guitar Hero', 'Luft Guitar Hero', NULL);
INSERT INTO tbl_projects VALUES(23, 'Radius Server', 'Radius Server', NULL);
INSERT INTO tbl_projects VALUES(24, 'VoIP', 'VoIP', NULL);
INSERT INTO tbl_projects VALUES(25, 'Virtual Application', 'Virtual Application', NULL);
INSERT INTO tbl_projects VALUES(26, 'SingGood', 'SingGood', NULL);
INSERT INTO tbl_projects VALUES(27, 'Echecs3D', '3D-Schach', NULL);
INSERT INTO tbl_projects VALUES(28, 'Multicast', 'Multicast', NULL);
INSERT INTO tbl_projects VALUES(29, 'Panneaux - Whiteboard', 'Anzeige-System - Whiteboard', NULL);
INSERT INTO tbl_projects VALUES(30, 'Chaîne de montage SMC', 'Montageanlage', NULL);
INSERT INTO tbl_projects VALUES(31, 'Portes automatisées pour lavage à rouleaux', 'Torautomatisierung', NULL);
INSERT INTO tbl_projects VALUES(33, 'Mélangeur de spectre lumineux', 'Lichtspektrum-Mixer', NULL);
INSERT INTO tbl_projects VALUES(34, 'Amplificateur audio', 'Audio-Verstärker', NULL);
INSERT INTO tbl_projects VALUES(35, 'BiBot XY', 'BiBot XY', NULL);
INSERT INTO tbl_projects VALUES(36, 'Inclinomètre portatif', 'Tragbarer Neigungsmesser', NULL);
INSERT INTO tbl_projects VALUES(37, 'GPS Logger 2', 'GPS – Logger', NULL);
INSERT INTO tbl_projects VALUES(39, 'Clarkconnect', 'Clarkconnect', NULL);
INSERT INTO tbl_projects VALUES(40, 'EMVs Games Collection', 'EMVs Games Collection', NULL);
INSERT INTO tbl_projects VALUES(41, 'Altimètre', 'Höhenmeter', NULL);
INSERT INTO tbl_projects VALUES(42, 'Compte-tour', 'Tourenzähler', NULL);
INSERT INTO tbl_projects VALUES(43, 'WebSite Reader', 'WebSite Reader', NULL);
INSERT INTO tbl_projects VALUES(44, 'Bongo', 'Bongo', NULL);
INSERT INTO tbl_projects VALUES(45, 'ISA security', 'ISA security', NULL);
INSERT INTO tbl_projects VALUES(46, 'MyShopManagment', 'MyShopManagment', NULL);
INSERT INTO tbl_projects VALUES(47, 'TTDB', 'TTDB', NULL);
INSERT INTO tbl_projects VALUES(48, 'Montgol-Math', 'Montgol-Math', NULL);
INSERT INTO tbl_projects VALUES(49, 'ESX', 'ESX', NULL);
INSERT INTO tbl_projects VALUES(50, 'Virtual Graffiti', 'Virtual Graffiti', NULL);
INSERT INTO tbl_projects VALUES(51, 'Lelouch', 'Lelouch', NULL);
INSERT INTO tbl_projects VALUES(52, 'TambourLine', 'TambourLine', NULL);
INSERT INTO tbl_projects VALUES(53, 'Swoop Racer', 'Swoop Racer', NULL);
INSERT INTO tbl_projects VALUES(54, 'Le Pendu', 'Hangman', NULL);
INSERT INTO tbl_projects VALUES(55, 'EMoryVs', 'EMoryVs', NULL);
INSERT INTO tbl_projects VALUES(56, 'PAB', 'PAB', NULL);
INSERT INTO tbl_projects VALUES(57, 'EMVs Game 1', 'EMVs Game 1', NULL);
INSERT INTO tbl_projects VALUES(58, 'Neutrinos 2', 'Neutrinos 2', NULL);
INSERT INTO tbl_projects VALUES(59, 'Vélo électrique', 'Elektro-Fahrrad', NULL);
INSERT INTO tbl_projects VALUES(60, 'Processeur Audio', 'Audio-Prozessoren', NULL);
INSERT INTO tbl_projects VALUES(61, 'GPS Logger 1', 'GPS Logger', NULL);
INSERT INTO tbl_projects VALUES(62, 'Nano robot kit', 'Nano robot kit', NULL);
INSERT INTO tbl_projects VALUES(63, 'Mini API', 'Mini API', NULL);
INSERT INTO tbl_projects VALUES(64, 'Jeu électronique', 'Electronic game', NULL);
INSERT INTO tbl_projects VALUES(65, 'Robot KUKA', 'Robot Kuka', NULL);
INSERT INTO tbl_projects VALUES(67, 'USB CMOS Cam', 'USB CMOS Cam', NULL);
INSERT INTO tbl_projects VALUES(68, 'Console de jeu', 'Spielkonsole', NULL);
INSERT INTO tbl_projects VALUES(69, 'Neutrinos 1', 'Neutrinos 1', NULL);
INSERT INTO tbl_projects VALUES(70, 'Salometer', 'Salometer', NULL);
INSERT INTO tbl_projects VALUES(71, 'Passion Play', 'Passion Play', NULL);
INSERT INTO tbl_projects VALUES(72, 'Unité de production SMC', 'Fertigungsstation SMC', NULL);
INSERT INTO tbl_projects VALUES(73, 'Puck Shooting', 'Puck Shooting', NULL);
INSERT INTO tbl_projects VALUES(74, 'Distributeur automatique', 'Snack-Automat', NULL);
INSERT INTO tbl_projects VALUES(75, 'Diving Air Station', 'Diving Air Station', NULL);
INSERT INTO tbl_projects VALUES(77, 'Banc Moteur', 'Motor Anlauf', NULL);
INSERT INTO tbl_projects VALUES(78, 'Pèse Farine', 'Mehl-Waage', NULL);
INSERT INTO tbl_projects VALUES(79, 'Station de lavage', 'Autowaschanlage', NULL);
INSERT INTO tbl_projects VALUES(80, 'Maquette de train', 'Zug-Lift', NULL);
INSERT INTO tbl_projects VALUES(81, 'Chauffage au Sol', 'Bodenheizung', NULL);
INSERT INTO tbl_projects VALUES(82, 'Table tournante', 'Turntable', NULL);
INSERT INTO tbl_projects VALUES(84, 'EMVs Game 2', 'EMVs Game 2', NULL);
INSERT INTO tbl_projects VALUES(85, 'House-Control', 'House-Control', NULL);
INSERT INTO tbl_projects VALUES(86, 'ISAWS', 'ISAWS', NULL);
INSERT INTO tbl_projects VALUES(87, 'Webcam-Control', 'Webcam-Control', NULL);
INSERT INTO tbl_projects VALUES(88, 'Machine à café électronique', 'eKaffee-Maschine', NULL);
INSERT INTO tbl_projects VALUES(89, 'Robot R2D2', 'R2D2', NULL);
INSERT INTO tbl_projects VALUES(90, 'RobotTank', 'Robot Tank', NULL);
INSERT INTO tbl_projects VALUES(91, 'Gong sur carte SD, Horloge avec real time', 'Real-Time-Uhr', NULL);
INSERT INTO tbl_projects VALUES(92, 'Dimplomacy online Game', 'Dimplomacy online Game', NULL);
INSERT INTO tbl_projects VALUES(93, 'School-Manager', 'School-Manager', NULL);
INSERT INTO tbl_projects VALUES(94, 'Contrôleur vocal', 'Stimmen-Kontroller', NULL);
INSERT INTO tbl_projects VALUES(95, 'Poulailler', 'Hühnerstall', NULL);
INSERT INTO tbl_projects VALUES(96, 'Evolufour', 'Evolufour', NULL);
INSERT INTO tbl_projects VALUES(98, 'Piscine', 'Schwimmbad', NULL);
INSERT INTO tbl_projects VALUES(100, 'D.T.C Medicâble', 'D.T.C medikabel', NULL);
INSERT INTO tbl_projects VALUES(101, 'Stop TV', 'Stop TV', NULL);
INSERT INTO tbl_projects VALUES(102, 'Super Simon', 'Super Simon', NULL);
INSERT INTO tbl_projects VALUES(103, 'Détecteur de fumée photoélectrique', 'Rauchdetektor', NULL);
INSERT INTO tbl_projects VALUES(104, 'Bus 4x4', 'Bus 4x4', NULL);
INSERT INTO tbl_projects VALUES(105, 'Bras 5 axes', 'Arm mit 5 Achsen', NULL);
INSERT INTO tbl_projects VALUES(106, 'Horloge hélicoïdale', 'Drehuhr', NULL);
INSERT INTO tbl_projects VALUES(107, 'Mixage de lumière', 'Lichtmischer', NULL);
INSERT INTO tbl_projects VALUES(108, 'AJAXyo', 'AJAXyo', NULL);
INSERT INTO tbl_projects VALUES(109, 'Inventory Hardware', 'Inventory Hardware', NULL);
INSERT INTO tbl_projects VALUES(110, 'Web Data Center', 'Web Data Center', NULL);
INSERT INTO tbl_projects VALUES(111, 'ODB2', 'ODB2', NULL);
INSERT INTO tbl_projects VALUES(112, 'GEKO Robot', 'GEKO Robot', NULL);
INSERT INTO tbl_projects VALUES(113, 'Domotique- maison Playmobil', 'Domotique- maison Playmobil', NULL);
INSERT INTO tbl_projects VALUES(114, 'Matrice à leds', 'Matrice à leds', NULL);
INSERT INTO tbl_projects VALUES(115, 'Real Time OS', 'Real Time OS', NULL);
INSERT INTO tbl_projects VALUES(116, 'Captive portal', 'Captive portal', NULL);
INSERT INTO tbl_projects VALUES(117, 'Terminal server &amp; Backup', 'Terminal server &amp; Backup', NULL);
INSERT INTO tbl_projects VALUES(118, 'Cybox', 'Cybox', NULL);
INSERT INTO tbl_projects VALUES(119, 'IPaq', 'IPaq', NULL);
INSERT INTO tbl_projects VALUES(120, 'jRemote', 'jRemote', NULL);
INSERT INTO tbl_projects VALUES(121, 'CamCursor', 'CamCursor', NULL);
INSERT INTO tbl_projects VALUES(122, 'ChooseForMe', 'ChooseForMe', NULL);
INSERT INTO tbl_projects VALUES(123, 'GoTiDea', 'GoTiDea', NULL);
INSERT INTO tbl_projects VALUES(124, 'PacMan', 'PacMan', NULL);
INSERT INTO tbl_projects VALUES(125, 'ArkanoisDS', 'ArkanoisDS', NULL);
INSERT INTO tbl_projects VALUES(126, 'EMVs-Project', 'EMVs-Project', NULL);
INSERT INTO tbl_projects VALUES(128, 'Authentification centralisée', 'Zentralisierte Authentifizierung', NULL);
INSERT INTO tbl_projects VALUES(129, 'ISpy', 'ISpy', 1);
INSERT INTO tbl_projects VALUES(130, 'BlueBiBot Remote Control', 'BlueBiBot Remote Control', NULL);
INSERT INTO tbl_projects VALUES(131, 'Réseau Fumg', 'Reseau Fumg', NULL);
INSERT INTO tbl_projects VALUES(132, 'DS-CALC', 'DS-CALC', NULL);
INSERT INTO tbl_projects VALUES(133, 'Comparaison de serveurs de virtualisation', 'Vergleich von Server-Virtualisierung', NULL);
INSERT INTO tbl_projects VALUES(134, 'SpaceStorm', 'SpaceStorm', NULL);
INSERT INTO tbl_projects VALUES(135, 'Interrupteur crépusculaire', 'Dämmerungsschalter', NULL);
INSERT INTO tbl_projects VALUES(136, 'Battle of Europe', 'Battle of Europe', NULL);
INSERT INTO tbl_projects VALUES(137, 'ImmoWeb', 'ImmoWeb', NULL);
INSERT INTO tbl_projects VALUES(138, 'Jeu de dames', 'Checkers', NULL);
INSERT INTO tbl_projects VALUES(139, 'Paramétrage Bluetooth du robot SwissEurobot', 'Einstellen der Bluetooth-Roboter SwissEurobot', NULL);
INSERT INTO tbl_projects VALUES(140, 'Robot SwissEurobot 2010', 'Robot SwissEurobot 2010', NULL);
INSERT INTO tbl_projects VALUES(141, 'Lecteur Ethernet MP3 iMove', 'MP3-Player-Ethernet iMove', NULL);
INSERT INTO tbl_projects VALUES(142, 'Electronisation de l\'aquarium Macquarium', 'Elektronisierung des Aquariums Macquarium', NULL);
INSERT INTO tbl_projects VALUES(143, 'Démonstrateur à pile à combustible', 'Brennstoffzellen-Demonstrator', NULL);
INSERT INTO tbl_projects VALUES(144, 'Internet Authentifier', 'Internet Authentifier', NULL);
INSERT INTO tbl_projects VALUES(145, 'Accéléromètre pour guidage 2 axes', '2-Achsen-Beschleunigungssensor zur Führung', NULL);
INSERT INTO tbl_projects VALUES(147, 'Contrôle de vitesse des perceuses', 'Drehzahlregelung Bohrer', NULL);
INSERT INTO tbl_projects VALUES(148, 'Galvanisation', 'Galvanisierung', NULL);
INSERT INTO tbl_projects VALUES(149, 'Triage de pièces', 'Sorting Teile', NULL);
INSERT INTO tbl_projects VALUES(150, 'Position angulaire Boussole géant', 'Winkelposition Riesen Compass', NULL);
INSERT INTO tbl_projects VALUES(151, '3DIC - 3D Interactive Control', '3DIC - 3D Interactive Control', NULL);
INSERT INTO tbl_projects VALUES(152, 'Accountancy manager', 'Accountancy manager', NULL);
INSERT INTO tbl_projects VALUES(153, 'Diagramme de vie', 'Projekt-CV', NULL);
INSERT INTO tbl_projects VALUES(154, 'TimeLine', 'TimeLine', NULL);
INSERT INTO tbl_projects VALUES(155, 'ByMailPictGallery', 'ByMailPictGallery', NULL);
INSERT INTO tbl_projects VALUES(156, 'Transcription de sons en Langue des Signes', NULL, NULL);
INSERT INTO tbl_projects VALUES(157, 'Contrôle de tâches par reconnaissance vocale', NULL, NULL);
INSERT INTO tbl_projects VALUES(158, 'Application affichant des graphiques en 3D', NULL, NULL);
INSERT INTO tbl_projects VALUES(159, 'Gestion informatique des journaux de classes', NULL, NULL);
INSERT INTO tbl_projects VALUES(160, 'Apprentissage visuel ou auditif des langues', NULL, NULL);
INSERT INTO tbl_projects VALUES(161, 'Minority Report', NULL, NULL);
INSERT INTO tbl_projects VALUES(162, 'VLAN auto switch', 'VLAN auto switch', NULL);
INSERT INTO tbl_projects VALUES(163, 'MaiD : Simulateur de combat aérien', 'MaiD', NULL);
INSERT INTO tbl_projects VALUES(164, 'Wiimote WhiteBoard', 'Wiimote WhiteBoard', NULL);
INSERT INTO tbl_projects VALUES(165, 'Programmation de robots', 'Roboterprogrammierung', NULL);
INSERT INTO tbl_projects VALUES(166, 'Virtual Keyboard', 'Virtual Keyboard', NULL);
INSERT INTO tbl_projects VALUES(167, 'Pupitre Lotto', 'Lotto Schreibtisch', NULL);
INSERT INTO tbl_projects VALUES(168, 'Portique de comptage automatique', 'Gantry automatische Zählung', NULL);
INSERT INTO tbl_projects VALUES(169, 'Four à chataignes électronique', 'Elektronische Ofen Kastanien', NULL);
INSERT INTO tbl_projects VALUES(170, 'Matrice Géante', 'Riesen-Matrix', NULL);
INSERT INTO tbl_projects VALUES(171, 'Mesure de distance par ultra-son', 'Abstandsmessung mittels Ultraschall', NULL);
INSERT INTO tbl_projects VALUES(172, 'Thérémine', 'Thérémine', NULL);
INSERT INTO tbl_projects VALUES(173, 'Stimulateur pour hypersomniaque', 'Herzschrittmacher hypersomniaque', NULL);
INSERT INTO tbl_projects VALUES(174, 'Robot Holonome', 'holonome Roboter', NULL);
INSERT INTO tbl_projects VALUES(175, 'Banc de test pour montre à quartz', 'Testbed für Quarzuhr', NULL);
INSERT INTO tbl_projects VALUES(176, 'Commande d\'un bras 3D Mitsubishi', 'Querlenker Mitsubishi 3D', NULL);
INSERT INTO tbl_projects VALUES(177, 'VHDL sur carte à FPGA', NULL, NULL);
INSERT INTO tbl_projects VALUES(178, 'Drive and Control', 'Drive and Control', NULL);
INSERT INTO tbl_projects VALUES(179, 'Bus de terrain', NULL, NULL);
INSERT INTO tbl_projects VALUES(180, 'ShareBox', 'ShareBox', NULL);
INSERT INTO tbl_projects VALUES(181, 'That\\\'s VS', 'That\\\'s VS', NULL);
INSERT INTO tbl_projects VALUES(182, 'Web panel', NULL, NULL);
INSERT INTO tbl_projects VALUES(183, 'EMVs Transfert', NULL, NULL);
INSERT INTO tbl_projects VALUES(184, 'Smart counter', NULL, NULL);
INSERT INTO tbl_projects VALUES(186, 'IFace', NULL, NULL);
INSERT INTO tbl_projects VALUES(187, 'BitWar', NULL, NULL);
INSERT INTO tbl_projects VALUES(188, 'Robot BiBot BlueTooth', NULL, NULL);
INSERT INTO tbl_projects VALUES(191, 'Accéléro-gyro bras', NULL, NULL);
INSERT INTO tbl_projects VALUES(192, 'Haut-parleur laser', NULL, NULL);
INSERT INTO tbl_projects VALUES(193, 'Horloge typographique', NULL, NULL);
INSERT INTO tbl_projects VALUES(194, 'SwissEurobot 2012', NULL, NULL);
INSERT INTO tbl_projects VALUES(196, 'User Management', NULL, NULL);
INSERT INTO tbl_projects VALUES(197, 'Galvano-laser sur FPGA', NULL, NULL);
INSERT INTO tbl_projects VALUES(198, 'Robot Wii Bibot', NULL, NULL);
INSERT INTO tbl_projects VALUES(199, 'Amplificateur à tube', NULL, NULL);
INSERT INTO tbl_projects VALUES(200, 'Kit DSPic EMVs', NULL, NULL);
INSERT INTO tbl_projects VALUES(203, 'Pilotage par GSM', NULL, NULL);
INSERT INTO tbl_projects VALUES(204, 'Chaîne de montage', 'Produktions-Fliessband', NULL);
INSERT INTO tbl_projects VALUES(205, 'KukaSecure', NULL, NULL);
INSERT INTO tbl_projects VALUES(206, 'Maquette Didactique', 'Didaktisches Versuchsmodell', NULL);
INSERT INTO tbl_projects VALUES(207, 'Robotino', NULL, NULL);
INSERT INTO tbl_projects VALUES(208, 'Virtual Squash', NULL, NULL);
INSERT INTO tbl_projects VALUES(209, 'TravelAssistant', NULL, NULL);
INSERT INTO tbl_projects VALUES(210, 'Conception mécanique 3D', 'Mechanische Konzeption in 3D', NULL);
INSERT INTO tbl_projects VALUES(211, 'Automaticiens 1 et 2', 'Automatiker 1. und 2. Lehrjahr', NULL);

-- -----------------------------
-- Structure de la table tbl_rooms
-- -----------------------------
CREATE TABLE `tbl_rooms` (
  `PKNoRoom` int(11) NOT NULL AUTO_INCREMENT,
  `salle` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `ordre` int(11) DEFAULT NULL,
  PRIMARY KEY (`PKNoRoom`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- -----------------------------
-- Contenu de la table tbl_rooms
-- -----------------------------
INSERT INTO tbl_rooms VALUES(1, 'Extérieur', 1);
INSERT INTO tbl_rooms VALUES(2, 'Hall', 2);
INSERT INTO tbl_rooms VALUES(3, 'Passerelle', 3);
INSERT INTO tbl_rooms VALUES(4, '245', 4);
INSERT INTO tbl_rooms VALUES(5, '244', 5);
INSERT INTO tbl_rooms VALUES(6, '242', 6);
INSERT INTO tbl_rooms VALUES(7, '241', 7);
INSERT INTO tbl_rooms VALUES(8, '239', 8);
INSERT INTO tbl_rooms VALUES(9, '236', 9);
INSERT INTO tbl_rooms VALUES(10, '223', 10);
INSERT INTO tbl_rooms VALUES(11, '221', 11);
INSERT INTO tbl_rooms VALUES(12, '220', 12);
INSERT INTO tbl_rooms VALUES(13, '219', 13);
INSERT INTO tbl_rooms VALUES(14, '224', 14);
INSERT INTO tbl_rooms VALUES(15, '225', 15);
INSERT INTO tbl_rooms VALUES(16, '214a', 16);
INSERT INTO tbl_rooms VALUES(17, '214', 17);
INSERT INTO tbl_rooms VALUES(18, '213', 18);

-- -----------------------------
-- Structure de la table tbl_projects_period
-- -----------------------------
CREATE TABLE `tbl_projects_period` (
  `PKNoProjectPeriod` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`PKNoProjectPeriod`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- -----------------------------
-- Contenu de la table tbl_projects_period
-- -----------------------------
INSERT INTO tbl_projects_period VALUES(1, 'Période 1');
INSERT INTO tbl_projects_period VALUES(2, 'Période 2');
INSERT INTO tbl_projects_period VALUES(3, 'Période 3');

-- -----------------------------
-- Structure de la table tbl_media_dossiers
-- -----------------------------
CREATE TABLE `tbl_media_dossiers` (
  `PKNoMediaDossier` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(95) DEFAULT NULL,
  PRIMARY KEY (`PKNoMediaDossier`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- -----------------------------
-- Contenu de la table tbl_media_dossiers
-- -----------------------------
INSERT INTO tbl_media_dossiers VALUES(1, 'Projets [2012]');
INSERT INTO tbl_media_dossiers VALUES(7, 'Eleves [2012]');
INSERT INTO tbl_media_dossiers VALUES(8, 'Professeurs [2012]');

-- -----------------------------
-- Structure de la table tbl_media_images
-- -----------------------------
CREATE TABLE `tbl_media_images` (
  `PKNoMediaImage` int(11) NOT NULL AUTO_INCREMENT,
  `URL` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `FKNoMediaDossier` int(11) DEFAULT NULL,
  PRIMARY KEY (`PKNoMediaImage`),
  KEY `FKNoMediaDossier` (`FKNoMediaDossier`),
  CONSTRAINT `tbl_media_images_ibfk_1` FOREIGN KEY (`FKNoMediaDossier`) REFERENCES `tbl_media_dossiers` (`PKNoMediaDossier`) ON DELETE SET NULL ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=311 DEFAULT CHARSET=utf8;

-- -----------------------------
-- Contenu de la table tbl_media_images
-- -----------------------------
INSERT INTO tbl_media_images VALUES(1, '0001_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(2, '0002_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(3, '0003_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(4, '0004_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(5, '0005_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(6, '0006_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(7, '0007_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(8, '0008_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(9, '0009_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(10, '0010_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(11, '0011_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(12, '0012_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(13, '0013_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(14, '0014_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(15, '0015_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(16, '0016_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(17, '0017_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(18, '0018_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(19, '0019_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(20, '0020_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(21, '0021_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(22, '0022_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(23, '0023_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(24, '0024_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(25, '0025_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(26, '0026_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(27, '0027_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(28, '0028_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(29, '0029_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(30, '0030_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(31, '0031_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(32, '0032_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(33, '0033_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(34, '0034_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(35, '0035_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(36, '0036_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(37, '0037_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(38, '0039_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(39, '0040_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(40, '0041_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(41, '0042_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(42, '0043_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(43, '0044_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(44, '0045_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(45, '0046_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(46, '0047_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(47, '0048_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(48, '0049_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(49, '0050_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(50, '0051_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(51, '0052_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(52, '0053_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(53, '0054_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(54, '0055_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(55, '0056_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(56, '0057_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(57, '0058_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(58, '0059_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(59, '0060_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(60, '0061_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(61, '0062_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(62, '0063_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(63, '0064_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(64, '0065_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(65, '0066_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(66, '0067_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(67, '0068_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(68, '0069_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(69, '0070_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(70, '0071_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(71, '0072_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(72, '0073_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(73, '0074_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(74, '0075_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(75, '0076_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(76, '0077_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(77, '0078_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(78, '0079_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(79, '0080_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(80, '0081_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(81, '0082_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(82, '0084_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(83, '0085_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(84, '0086_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(85, '0087_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(86, '0088_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(87, '0089_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(88, '0090_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(89, '0091_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(90, '0092_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(91, '0093_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(92, '0094_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(93, '0095_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(94, '0096_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(95, '0098_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(96, '0100_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(97, '0101_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(98, '0102_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(99, '0103_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(100, '0104_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(101, '0105_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(102, '0106_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(103, '0107_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(104, '0108_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(105, '0109_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(106, '0110_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(107, '0111_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(108, '0112_logo.jpg', '2012-03-28 19:06:13', 1);
INSERT INTO tbl_media_images VALUES(134, 'p16tqgs3kbcht1v9cco8s461flu3.jpg', '2012-05-22 16:57:45', 1);
INSERT INTO tbl_media_images VALUES(135, 'p16tqh02sp1tg31j6na74sb79dk3.jpg', '2012-05-22 16:59:52', 1);
INSERT INTO tbl_media_images VALUES(136, 'p16tqh1dd5cjt128m1e5r1rm41cgn3.jpg', '2012-05-22 17:00:35', 1);
INSERT INTO tbl_media_images VALUES(137, 'p16tqh2q8kg0d1cf61bds158fjbb3.jpg', '2012-05-22 17:01:21', 1);
INSERT INTO tbl_media_images VALUES(138, 'p16tqh45nnbac4q3be1s7p11rk3.jpg', '2012-05-22 17:02:06', 1);
INSERT INTO tbl_media_images VALUES(139, 'p16tqh529quhu1mq81j541ohkdr13.jpg', '2012-05-22 17:02:35', 1);
INSERT INTO tbl_media_images VALUES(140, 'p16tqh5u9l14t7olmuv41lat2d53.jpg', '2012-05-22 17:03:03', 1);
INSERT INTO tbl_media_images VALUES(141, 'p16tqh6sc41hvq125phf41opd1iv73.jpg', '2012-05-22 17:03:34', 1);
INSERT INTO tbl_media_images VALUES(142, 'p16tqh7j5r1j159o0eh9uvbgk43.jpg', '2012-05-22 17:03:57', 1);
INSERT INTO tbl_media_images VALUES(143, 'p16tqhb949148717ooun1igg1s2h3.jpg', '2012-05-22 17:05:58', 1);
INSERT INTO tbl_media_images VALUES(144, 'p16tqhc2r71l8quvn1t1lghk1hkh3.jpg', '2012-05-22 17:06:24', 1);
INSERT INTO tbl_media_images VALUES(145, 'p16tqhcvmmkiv1i9s1ic2g0b1v4i3.jpg', '2012-05-22 17:06:54', 1);
INSERT INTO tbl_media_images VALUES(146, 'p16tqhi594k2j95b1tmbt52qa43.jpg', '2012-05-22 17:09:45', 1);
INSERT INTO tbl_media_images VALUES(147, 'p16tqhi594157n1cp6kaf1n21hre4.jpg', '2012-05-22 17:09:45', 1);
INSERT INTO tbl_media_images VALUES(148, 'p16tqhi59412f31eg8dsrk7ib7b5.jpg', '2012-05-22 17:09:45', 1);
INSERT INTO tbl_media_images VALUES(149, 'p16tqhi5941scasve1h3d18olmbt6.jpg', '2012-05-22 17:09:45', 1);
INSERT INTO tbl_media_images VALUES(150, 'p16tqhi59415jaa08vl611uqv27.jpg', '2012-05-22 17:09:45', 1);
INSERT INTO tbl_media_images VALUES(151, 'p16tqhi594e2fm9p1hbg1c291a138.jpg', '2012-05-22 17:09:45', 1);
INSERT INTO tbl_media_images VALUES(152, 'p16tqhnd611o2e1taj9lj13k11co43.jpg', '2012-05-22 17:12:36', 1);
INSERT INTO tbl_media_images VALUES(153, 'p16tqhnd611p8pjg61bd1kqvpmo4.jpg', '2012-05-22 17:12:36', 1);
INSERT INTO tbl_media_images VALUES(154, 'p16tqhnd61svahd9lq41qgs1jar5.jpg', '2012-05-22 17:12:36', 1);
INSERT INTO tbl_media_images VALUES(155, 'p16tqi4ngm49ffo41nrjadd1pdm3.jpg', '2012-05-22 17:19:53', 1);
INSERT INTO tbl_media_images VALUES(156, 'p16tqi5ma31bah1ocgkg41tel16i13.jpg', '2012-05-22 17:20:24', 1);
INSERT INTO tbl_media_images VALUES(157, 'p16tqi684d1j9g92vl5m1flvh3a3.jpg', '2012-05-22 17:20:42', 1);
INSERT INTO tbl_media_images VALUES(158, 'p16tqi6skl1v9fm6skbn1hbhfap3.jpg', '2012-05-22 17:21:03', 1);
INSERT INTO tbl_media_images VALUES(159, 'p16tqi7klv9bpml1gv78v58fp3.jpg', '2012-05-22 17:21:28', 1);
INSERT INTO tbl_media_images VALUES(160, 'p16tqi8h0990d1nooiplddak333.jpg', '2012-05-22 17:21:57', 1);
INSERT INTO tbl_media_images VALUES(161, 'p16tqjl921hnbm0et1c1fse1dp53.jpg', '2012-05-22 17:46:24', 1);
INSERT INTO tbl_media_images VALUES(162, 'p16tqjot34109gq37oulpd18f03.jpg', '2012-05-22 17:48:22', 1);
INSERT INTO tbl_media_images VALUES(163, 'p16tqjsbdr1chmqiaqkv1nd1h0c3.jpg', '2012-05-22 17:50:22', 1);
INSERT INTO tbl_media_images VALUES(164, 'p16tqjv9dl170o5l21n9i1nv1kn83.jpg', '2012-05-22 17:51:51', 1);
INSERT INTO tbl_media_images VALUES(165, 'p16tqk2ifk1scvn20usrbh7qc23.jpg', '2012-05-22 17:53:40', 1);
INSERT INTO tbl_media_images VALUES(166, 'p16tqk5ig119mv1cj21chm99jgc23.jpg', '2012-05-22 17:55:17', 1);
INSERT INTO tbl_media_images VALUES(167, 'p16tqk8ori1u7c49pn8k1mt8b9d3.jpg', '2012-05-22 17:57:02', 1);
INSERT INTO tbl_media_images VALUES(168, 'p16tqkd3u1a3a1u9m122ivce6sc3.jpg', '2012-05-22 17:59:26', 1);
INSERT INTO tbl_media_images VALUES(169, 'p16tqklvhh1um3uorgbt5eap1r3.jpg', '2012-05-22 18:04:15', 1);
INSERT INTO tbl_media_images VALUES(170, 'p16tqkpp22cpe1sj6ns5qio2bd3.jpg', '2012-05-22 18:06:20', 1);
INSERT INTO tbl_media_images VALUES(171, 'p16tqktsidihol8910ri9n51ad93.jpg', '2012-05-22 18:08:49', 1);
INSERT INTO tbl_media_images VALUES(172, 'p16tql8f9u15er13jebqf1arq169g3.jpg', '2012-05-22 18:14:21', 1);
INSERT INTO tbl_media_images VALUES(173, 'p16tqleah212nqhh41o4e1ko6u923.jpg', '2012-05-22 18:17:33', 1);
INSERT INTO tbl_media_images VALUES(174, 'p16tqljql14ej1eco1ieng12im73.jpg', '2012-05-22 18:20:33', 1);
INSERT INTO tbl_media_images VALUES(175, 'p16u4e6b14bej1o73p616ac15kj3.jpg', '2012-05-26 13:23:15', 1);
INSERT INTO tbl_media_images VALUES(176, 'p16ufa8qv71sdkfpo11ilktr1amk3.jpg', '2012-05-30 18:46:21', 7);
INSERT INTO tbl_media_images VALUES(177, 'p16v18rc253chombgibi10n73.jpg', '2012-06-06 18:07:52', 1);
INSERT INTO tbl_media_images VALUES(178, 'p16ve9dt0q22l12h11g9cbr3sv93.jpg', '2012-06-11 19:28:07', 1);
INSERT INTO tbl_media_images VALUES(179, 'p16ve9its71o9icu1jagqvu1a9s3.jpg', '2012-06-11 19:30:51', 1);
INSERT INTO tbl_media_images VALUES(180, 'p16ve9oohq1qgh1h501nimpcpv53.jpg', '2012-06-11 19:34:05', 1);
INSERT INTO tbl_media_images VALUES(181, 'p16veb0v2o59dnoh17b2tie7713.jpg', '2012-06-11 19:55:59', 1);
INSERT INTO tbl_media_images VALUES(182, 'p16veb46gp1vm5sjddnh9fqqkr3.jpg', '2012-06-11 19:57:46', 1);
INSERT INTO tbl_media_images VALUES(183, 'p16veb714t2oq1af71ba6asb1qt13.jpg', '2012-06-11 19:59:19', 1);
INSERT INTO tbl_media_images VALUES(184, 'p16vebdelhcu2sa11k8f11ja1ukv3.jpg', '2012-06-11 20:02:49', 1);
INSERT INTO tbl_media_images VALUES(185, 'p16vebgek2ur1mq8hsc1bae11sv3.jpg', '2012-06-11 20:04:27', 1);
INSERT INTO tbl_media_images VALUES(186, 'p16vebjvpqi08cc019lu182fhvi3.jpg', '2012-06-11 20:06:23', 1);
INSERT INTO tbl_media_images VALUES(187, 'p16vebn9tl1tt91pus1net1uba123c3.jpg', '2012-06-11 20:08:11', 1);
INSERT INTO tbl_media_images VALUES(188, 'p16vebqm1f1prv1o907lr1m3lr0a3.jpg', '2012-06-11 20:10:02', 1);
INSERT INTO tbl_media_images VALUES(189, 'p16vebv2lc1clp1qfo1f301ldt16fg3.jpg', '2012-06-11 20:12:26', 1);
INSERT INTO tbl_media_images VALUES(190, 'p16vec2lqgd4q1q351dag14snu6v3.jpg', '2012-06-11 20:14:24', 1);
INSERT INTO tbl_media_images VALUES(191, 'p16vecnasf19tv1c3jj89cvt1gj13.jpg', '2012-06-11 20:25:41', 1);
INSERT INTO tbl_media_images VALUES(192, 'p16vecre4b17c08pqmmet7e16nl3.jpg', '2012-06-11 20:27:55', 1);
INSERT INTO tbl_media_images VALUES(193, 'p16vecvd9ftm41q7q6u3jus14103.jpg', '2012-06-11 20:30:10', 1);
INSERT INTO tbl_media_images VALUES(194, 'p16vef17q21tm61opc1r4d1ubfhk73.jpg', '2012-06-11 21:06:04', 7);
INSERT INTO tbl_media_images VALUES(195, 'p16vef17q21p0q16u91mkkao9j5a4.jpg', '2012-06-11 21:06:05', 7);
INSERT INTO tbl_media_images VALUES(196, 'p16vef17q2sc6rg2mdr11ei1a3l5.jpg', '2012-06-11 21:06:05', 7);
INSERT INTO tbl_media_images VALUES(197, 'p16vef17q217pt11kek2lha4smv6.jpg', '2012-06-11 21:06:05', 7);
INSERT INTO tbl_media_images VALUES(198, 'p16vef17q210sadc2btb16tf2m87.jpg', '2012-06-11 21:06:05', 7);
INSERT INTO tbl_media_images VALUES(199, 'p16vef17q21e9o7o31ucrlgq1ven8.jpg', '2012-06-11 21:06:05', 7);
INSERT INTO tbl_media_images VALUES(200, 'p16vef17q286c1mpc7f766v69.jpg', '2012-06-11 21:06:05', 7);
INSERT INTO tbl_media_images VALUES(201, 'p16vef17q2s4k1ieecde15qj1vc9a.jpg', '2012-06-11 21:06:05', 7);
INSERT INTO tbl_media_images VALUES(202, 'p16vef17q21il3l8qduo1vbgf36b.jpg', '2012-06-11 21:06:05', 7);
INSERT INTO tbl_media_images VALUES(203, 'p16vef17q2153u1muf16t314j11vpoc.jpg', '2012-06-11 21:06:05', 7);
INSERT INTO tbl_media_images VALUES(204, 'p16vef17q21u7d15u51hng1g9i1ovbd.jpg', '2012-06-11 21:06:05', 7);
INSERT INTO tbl_media_images VALUES(205, 'p16vef17q21r3l1l8r18ls1ti4l6se.jpg', '2012-06-11 21:06:05', 7);
INSERT INTO tbl_media_images VALUES(207, 'p16vfpbn8sse14t6p9nap5onn3.jpg', '2012-06-12 09:25:46', 1);
INSERT INTO tbl_media_images VALUES(208, 'p16vfpghgumag2831ldtimhrj83.jpg', '2012-06-12 09:28:24', 1);
INSERT INTO tbl_media_images VALUES(209, 'p16vfpo2bb24516cr168o4srcsq3.jpg', '2012-06-12 09:32:37', 1);
INSERT INTO tbl_media_images VALUES(210, 'p16vfpo2bc1tdptaa3ih1muq1m1s4.jpg', '2012-06-12 09:32:37', 1);
INSERT INTO tbl_media_images VALUES(211, 'p16vfpo2bcqufad7195ea1tmvr5.jpg', '2012-06-12 09:32:37', 1);
INSERT INTO tbl_media_images VALUES(212, 'p16vfpo2bc1gj14jdh9u1ums41g6.jpg', '2012-06-12 09:32:37', 1);
INSERT INTO tbl_media_images VALUES(213, 'p16vfpo2bc11sb10tmvei1ovd1o917.jpg', '2012-06-12 09:32:37', 1);
INSERT INTO tbl_media_images VALUES(214, 'p16vfpo2bc14c1mf51j7sli8qm8.jpg', '2012-06-12 09:32:37', 1);
INSERT INTO tbl_media_images VALUES(215, 'p16vfpo2bcgmq1tj129u13l6g9q9.jpg', '2012-06-12 09:32:37', 1);
INSERT INTO tbl_media_images VALUES(216, 'p16vfpo2bch101jfhfcf1al9al9a.jpg', '2012-06-12 09:32:37', 1);
INSERT INTO tbl_media_images VALUES(217, 'p16vfpo2bc1m7rf5d12u94t1blb.jpg', '2012-06-12 09:32:37', 1);
INSERT INTO tbl_media_images VALUES(218, 'p16vfpo2bcv8bmsb1u6017qa1hjrc.jpg', '2012-06-12 09:32:37', 1);
INSERT INTO tbl_media_images VALUES(219, 'p16vfpo2bcr0a1ije1l4k1g85d5d.jpg', '2012-06-12 09:32:37', 1);
INSERT INTO tbl_media_images VALUES(220, 'p16vfpo2bc18rc1qv51rian5n1jc6e.jpg', '2012-06-12 09:32:37', 1);
INSERT INTO tbl_media_images VALUES(221, 'p16vfpo2bc8b11pg31p17p3d59f.jpg', '2012-06-12 09:32:37', 1);
INSERT INTO tbl_media_images VALUES(222, 'p16vfpo2bc1anjsla1h328g1tvqg.jpg', '2012-06-12 09:32:37', 1);
INSERT INTO tbl_media_images VALUES(223, 'p16vfpo2bc1rj01v3s1e961tp21v47h.jpg', '2012-06-12 09:32:38', 1);
INSERT INTO tbl_media_images VALUES(224, 'p16vfpo2bc1eb51h66rmh1lpb3fui.jpg', '2012-06-12 09:32:38', 1);
INSERT INTO tbl_media_images VALUES(225, 'p16vfpo2bcfc74rh1vb71naa150jj.jpg', '2012-06-12 09:32:38', 1);
INSERT INTO tbl_media_images VALUES(226, 'p16vfpo2bclic1tvdirttd61f2tk.jpg', '2012-06-12 09:32:38', 1);
INSERT INTO tbl_media_images VALUES(229, 'p16vfsbpfgvun1sbj7enthc9bl3.jpg', '2012-06-12 10:18:15', 1);
INSERT INTO tbl_media_images VALUES(230, 'p16vfsdhop8sv134hnvg6p21oa43.jpg', '2012-06-12 10:19:12', 1);
INSERT INTO tbl_media_images VALUES(232, 'p16vgbu6264jj1vtj1mti19a01jro3.jpg', '2012-06-12 14:50:26', 1);
INSERT INTO tbl_media_images VALUES(233, 'p16vi9tb5j1ntmn3rf6e7618rj3.jpg', '2012-06-13 08:53:31', 8);
INSERT INTO tbl_media_images VALUES(234, 'p16viaat801hdtpm4vrj2s5ql73.jpg', '2012-06-13 09:00:54', 8);
INSERT INTO tbl_media_images VALUES(235, 'p16viriv1oka01tra1p599ta2rn3.jpg', '2012-06-13 14:02:25', 1);
INSERT INTO tbl_media_images VALUES(244, 'p178dp5mqbobp147nset1e4s67f3.jpg', '2012-10-01 11:05:53', 1);
INSERT INTO tbl_media_images VALUES(245, 'p178dpi17u12f618t01r4j17o91shm3.jpg', '2012-10-01 11:12:30', 1);
INSERT INTO tbl_media_images VALUES(246, 'p178dplhsml1q1e98s4729rt93.png', '2012-10-01 11:14:25', 1);
INSERT INTO tbl_media_images VALUES(247, 'p178dpo9ci1jrd1d8ns9t1h3m3bf3.jpg', '2012-10-01 11:15:54', 1);
INSERT INTO tbl_media_images VALUES(248, 'p178dpsmq61j67ab71di5125a1s6g3.jpg', '2012-10-01 11:18:17', 1);
INSERT INTO tbl_media_images VALUES(249, 'p178dq5h341dir1dfkuph2hn4n93.png', '2012-10-01 11:23:06', 1);
INSERT INTO tbl_media_images VALUES(250, 'p178dqkt5k1crd11sucabi8nr1l3.png', '2012-10-01 11:31:30', 1);
INSERT INTO tbl_media_images VALUES(251, 'p178gkiu5gq931c6h1986odhhtb3.jpg', '2012-10-02 13:43:17', 1);
INSERT INTO tbl_media_images VALUES(252, 'p178gm0qsfro1ce2l7k1vvk1sj73.jpg', '2012-10-02 14:08:22', 1);
INSERT INTO tbl_media_images VALUES(253, 'p178gmdmob1pm21dbk1gbd11a61hus3.png', '2012-10-02 14:15:23', 1);
INSERT INTO tbl_media_images VALUES(254, 'p178o27bsjcg7n9lbp41o1o15b43.jpg', '2012-10-05 10:56:32', 1);
INSERT INTO tbl_media_images VALUES(255, 'p179dnb32qe0d1tnf1b28fun1egt3.png', '2012-10-13 20:49:29', 1);
INSERT INTO tbl_media_images VALUES(258, 'p179dqrn5775c14ri128rlo91l563.jpeg', '2012-10-13 21:50:44', 8);
INSERT INTO tbl_media_images VALUES(259, 'p179dr5co71l0216qrvt53fo3a3.jpg', '2012-10-13 21:55:59', 8);
INSERT INTO tbl_media_images VALUES(260, 'p179sbv47trgp55t10li3a01lf43.jpg', '2012-10-19 13:19:24', 1);
INSERT INTO tbl_media_images VALUES(261, 'p179sc620rhk29itj3b11s315983.jpg', '2012-10-19 13:23:03', 1);
INSERT INTO tbl_media_images VALUES(262, 'p17ao82c1uqaf171mkdac4eaen3.jpg', '2012-10-30 08:09:51', 1);
INSERT INTO tbl_media_images VALUES(263, 'p17ao85nb12tg1h9oqsh4svfn93.png', '2012-10-30 08:11:43', 1);
INSERT INTO tbl_media_images VALUES(264, 'p17ao87khu1arf1fl42pf1ub91c973.jpg', '2012-10-30 08:12:47', 1);
INSERT INTO tbl_media_images VALUES(265, 'p17aob4iqmc8h6pt17t4139p1a4m3.jpg', '2012-10-30 09:03:30', 1);
INSERT INTO tbl_media_images VALUES(267, 'p17aobe4ct1heg1929ao0hqf16tu3.png', '2012-10-30 09:08:42', 1);
INSERT INTO tbl_media_images VALUES(268, 'p17aobprs61fkv1beem141c8719863.jpg', '2012-10-30 09:15:05', 1);
INSERT INTO tbl_media_images VALUES(269, 'p17aobvplt1kf37m76ds18eh1v8u3.jpg', '2012-10-30 09:18:22', 1);
INSERT INTO tbl_media_images VALUES(270, 'p17aoc30q61kqiti21cdoobe14ui3.jpg', '2012-10-30 09:20:07', 1);
INSERT INTO tbl_media_images VALUES(271, 'p17aoc5u2l1271n3d14fr66bncf3.jpg', '2012-10-30 09:21:40', 1);
INSERT INTO tbl_media_images VALUES(272, 'p17aokb6p48k8ive129torv43v3.jpg', '2012-10-30 11:44:24', 1);
INSERT INTO tbl_media_images VALUES(273, 'p17aokfnoeqm21ko214c93kvgks3.jpg', '2012-10-30 11:46:50', 1);
INSERT INTO tbl_media_images VALUES(274, 'p17aolh7a0dj71i9j1fva11b11ksl3.jpg', '2012-10-30 12:05:08', 1);
INSERT INTO tbl_media_images VALUES(275, 'p17aotm1eslau1f911v5n7f91rgl3.jpg', '2012-10-30 14:27:35', 1);
INSERT INTO tbl_media_images VALUES(276, 'p17aots0so1fs15hl1afkrfm1e3f3.jpg', '2012-10-30 14:30:52', 1);
INSERT INTO tbl_media_images VALUES(277, 'p17aou2hqs1d6u1lj63vs16ct1i6s3.png', '2012-10-30 14:34:26', 1);
INSERT INTO tbl_media_images VALUES(278, 'p17aovgjh7g5816811cckil2sup3.jpg', '2012-10-30 14:59:34', 1);
INSERT INTO tbl_media_images VALUES(279, 'p17ap0tj70193o7ij1vm31slqsku3.jpg', '2012-10-30 15:24:08', 1);
INSERT INTO tbl_media_images VALUES(280, 'p17bbb6chg8m41b9j1ke01jdt3ch3.jpg', '2012-11-06 18:10:10', 7);
INSERT INTO tbl_media_images VALUES(281, 'p17bbb6chg11dt12efjd7mpq1idl4.jpg', '2012-11-06 18:10:10', 7);
INSERT INTO tbl_media_images VALUES(282, 'p17bbb6chgr3s1aec14gi1e3ua65.jpg', '2012-11-06 18:10:10', 7);
INSERT INTO tbl_media_images VALUES(283, 'p17bbb6chg199kspvb7b1u8sjl6.jpg', '2012-11-06 18:10:10', 7);
INSERT INTO tbl_media_images VALUES(284, 'p17bbb6chg1gpe135t1met1mld7l7.jpg', '2012-11-06 18:10:10', 7);
INSERT INTO tbl_media_images VALUES(285, 'p17bbb6chgn45h041vrocm214s88.jpg', '2012-11-06 18:10:10', 7);
INSERT INTO tbl_media_images VALUES(286, 'p17bbb6chgp6ncl17u4vjh1bcb9.jpg', '2012-11-06 18:10:10', 7);
INSERT INTO tbl_media_images VALUES(287, 'p17bbb6chhrod6gu183015h11o8da.jpg', '2012-11-06 18:10:10', 7);
INSERT INTO tbl_media_images VALUES(288, 'p17bbb6chh1deg1i2ti8c1uj318u4b.jpg', '2012-11-06 18:10:10', 7);
INSERT INTO tbl_media_images VALUES(289, 'p17bbb6chh1q08umbits1ehv96cc.jpg', '2012-11-06 18:10:10', 7);
INSERT INTO tbl_media_images VALUES(290, 'p17bbb6chh5oj1p06nk81k7umpgd.jpg', '2012-11-06 18:10:10', 7);
INSERT INTO tbl_media_images VALUES(291, 'p17bbbepmbpr7gan125naj5cdr3.jpg', '2012-11-06 18:14:33', 7);
INSERT INTO tbl_media_images VALUES(292, 'p17bbbldji1nalsenfnkm86oop3.jpg', '2012-11-06 18:18:11', 7);
INSERT INTO tbl_media_images VALUES(293, 'p17bbbldji1ne4gsr1n0kvek1svl4.jpg', '2012-11-06 18:18:11', 7);
INSERT INTO tbl_media_images VALUES(298, 'stu_9-2012117_185554.jpg', '2012-11-07 18:55:54', 7);
INSERT INTO tbl_media_images VALUES(299, 'stu_19-2012118_090107.jpg', '2012-11-08 09:01:08', 7);
INSERT INTO tbl_media_images VALUES(301, 'stu_20-2012118_091318.jpg', '2012-11-08 09:13:19', 7);
INSERT INTO tbl_media_images VALUES(302, 'stu_26-2012118_091335.jpg', '2012-11-08 09:13:35', 7);
INSERT INTO tbl_media_images VALUES(303, 'stu_21-2012118_091539.jpg', '2012-11-08 09:15:39', 7);
INSERT INTO tbl_media_images VALUES(307, 'p17bg3f5301l721pm06931cou1pn63.png', '2012-11-08 14:31:15', 1);
INSERT INTO tbl_media_images VALUES(308, 'stu_22-2012118_153611.jpg', '2012-11-08 15:36:11', 7);
INSERT INTO tbl_media_images VALUES(309, 'p17bhqgugk1iemjfddbp1f9t13dj3.jpg', '2012-11-09 06:33:24', 1);
INSERT INTO tbl_media_images VALUES(310, 'p17bhqpjd1ue39mtas711adl53.jpg', '2012-11-09 06:38:31', 1);

-- -----------------------------
-- Structure de la table tbl_students
-- -----------------------------
CREATE TABLE `tbl_students` (
  `PKNoStudent` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `email` varchar(85) DEFAULT NULL,
  `YearEntree` int(4) DEFAULT NULL,
  `YearSortie` int(4) DEFAULT NULL,
  `FKNoMediaImage` int(11) DEFAULT NULL,
  `FKNoProfession` int(10) DEFAULT NULL,
  PRIMARY KEY (`PKNoStudent`),
  KEY `FKNoProfession` (`FKNoProfession`),
  KEY `FKNoMediaImage` (`FKNoMediaImage`),
  CONSTRAINT `tbl_students_ibfk_2` FOREIGN KEY (`FKNoMediaImage`) REFERENCES `tbl_media_images` (`PKNoMediaImage`) ON DELETE SET NULL,
  CONSTRAINT `tbl_students_ibfk_3` FOREIGN KEY (`FKNoProfession`) REFERENCES `tbl_professions` (`PKNoProfession`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=378 DEFAULT CHARSET=utf8;

-- -----------------------------
-- Contenu de la table tbl_students
-- -----------------------------
INSERT INTO tbl_students VALUES(1, 'Monnet', 'Yaël', 'yael.monnet@live.emvs.net', 2006, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(2, 'Pitteloud', 'Julien', 'julien.pitteloud@live.emvs.net', 2006, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(3, 'Lapaire', 'Tifany', 'tifany.lapaire@live.emvs.net', 2006, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(4, 'Baehler', 'Yannick', 'yannick.baehler@live.emvs.net', 2006, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(5, 'Gabioud', 'Michael', 'michael.gabioud@live.emvs.net', 2006, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(6, 'Géhanne', 'Maximilien', 'maximilien.gehanne@live.emvs.net', 2006, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(7, 'Vaudan', 'Vladimir', 'vladimir.vaudan@live.emvs.net', 2006, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(8, 'Michaud', 'Théo', 'theo.michaud@live.emvs.net', 2006, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(9, 'Cornut', 'Mathias', 'mathias.cornut@live.emvs.net', 2006, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(10, 'Puleio', 'Licya', 'licya.puleio@live.emvs.net', 2006, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(11, 'Rossier', 'Mathieu', 'mathieu.rossier@live.emvs.net', 2006, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(12, 'Reynard', 'Lionel', 'lionel.reynard@live.emvs.net', 2006, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(13, 'Perret', 'Jérôme', 'jerome.perret@live.emvs.net', 2006, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(14, 'Christen', 'Sacha', 'sacha.christen@live.emvs.net', 2006, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(15, 'Grub', 'Jérôme', 'jerome.grub@live.emvs.net', 2006, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(16, 'Cans', 'Jean-Laurent', 'jean-laurent.cans@live.emvs.net', 2006, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(17, 'Vianin', 'Jérôme', 'jerome.vianin@live.emvs.net', 2006, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(18, 'Demont', 'Pieric', 'pieric.demont@live.emvs.net', 2006, NULL, NULL, 2);
INSERT INTO tbl_students VALUES(19, 'Mariéthoz', 'Eddy', 'eddy.mariethoz@live.emvs.net', 2006, NULL, NULL, 2);
INSERT INTO tbl_students VALUES(20, 'Rossini', 'Thibaud', 'thibaud.rossini@live.emvs.net', 2006, NULL, NULL, 2);
INSERT INTO tbl_students VALUES(21, 'Bittel', 'Yvan', 'yvan.bittel@live.emvs.net', 2006, NULL, NULL, 2);
INSERT INTO tbl_students VALUES(22, 'Clavien', 'Michel-Olivier', 'michel-olivier.clavien@live.emvs.net', 2006, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(23, 'Rebord', 'Jean-Baptiste', 'jean-baptiste.rebord@live.emvs.net', 2006, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(24, 'Farner', 'Lucas', 'lucas.farner@live.emvs.net', 2006, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(26, 'Farquet', 'Flavien', 'flavien.farquet@live.emvs.net', 2006, NULL, NULL, 2);
INSERT INTO tbl_students VALUES(27, 'Della-Bassa', 'Tristan', 'tristan.della-bassa@live.emvs.net', 2006, NULL, NULL, 2);
INSERT INTO tbl_students VALUES(28, 'Salzmann', 'Markus', 'markus.salzmann@live.emvs.net', 2006, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(29, 'Tscherrig', 'Sven', 'sven.tscherrig@live.emvs.net', 2006, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(30, 'Wyssen', 'Pierre-Alain', 'pierre-alain.wyssen@live.emvs.net', 2006, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(31, 'Imwinkelried', 'Martin', 'martin.imwinkelried@live.emvs.net', 2006, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(32, 'Grichting', 'Stefan', 'stefan.grichting@live.emvs.net', 2006, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(33, 'Zaupa', 'Oliver', 'oliver.zaupa@live.emvs.net', 2006, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(34, 'Berchtold', 'Philipp', 'philipp.berchtold@live.emvs.net', 2006, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(36, 'Karlen', 'Simon', 'simon.karlen@live.emvs.net', 2006, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(37, 'Jordan', 'Michael', 'michael.jordan@live.emvs.net', 2006, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(38, 'Tornay', 'Cédric', 'cedric.tornay@live.emvs.net', 2006, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(39, 'Seppey', 'Raphaël', 'raphael.seppey@live.emvs.net', 2006, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(40, 'Gaillet', 'Sébastien', 'sebastien.gaillet@live.emvs.net', 2006, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(41, 'Crettnand', 'Damien', 'damien.crettnand@live.emvs.net', 2006, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(42, 'Perrin', 'Djamile', 'djamile.perrin@live.emvs.net', 2006, NULL, NULL, 2);
INSERT INTO tbl_students VALUES(43, 'Perrin', 'Shawn', 'shawn.perrin@live.emvs.net', 2006, NULL, NULL, 2);
INSERT INTO tbl_students VALUES(44, 'Pfefferlé', 'Nicolas', 'nicolas.pfefferle@live.emvs.net', 2006, NULL, NULL, 2);
INSERT INTO tbl_students VALUES(45, 'Roduit', 'Karim', 'karim.roduit@live.emvs.net', 2006, NULL, NULL, 2);
INSERT INTO tbl_students VALUES(46, 'Steiner', 'Claudio', 'claudio.steiner@live.emvs.net', 2006, NULL, NULL, 2);
INSERT INTO tbl_students VALUES(47, 'Crettaz', 'Alexandre', 'alexandre.crettaz@live.emvs.net', NULL, NULL, NULL, 2);
INSERT INTO tbl_students VALUES(48, 'Vodoz', 'Gabrielle', 'gabrielle.vodoz@live.emvs.net', NULL, NULL, NULL, 2);
INSERT INTO tbl_students VALUES(49, 'Crittin', 'David', 'david.crittin@live.emvs.net', 2007, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(50, 'Aymon', 'Lucien', 'lucien.aymon@live.emvs.net', 2007, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(51, 'Gex', 'Fanny', 'fanny.gex@live.emvs.net', 2007, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(52, 'Girard', 'Sébastien', 'sebastien.girard@live.emvs.net', 2007, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(53, 'Stragiotti', 'Samuel', 'samuel.stragiotti@live.emvs.net', 2007, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(54, 'Ditria', 'Joël', 'joel.ditria@live.emvs.net', 2006, NULL, NULL, 2);
INSERT INTO tbl_students VALUES(55, 'Dubuis', 'Jimmy', 'jimmy.dubuis@live.emvs.net', 2006, NULL, NULL, 2);
INSERT INTO tbl_students VALUES(56, 'Aubert', 'Grégoire', 'gregoire.aubert@live.emvs.net', 2005, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(58, 'Hebeisen', 'Maxime', 'maxime.hebeisen@live.emvs.net', 2005, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(59, 'Marguet', 'Fabian', 'fabian.marguet@live.emvs.net', 2005, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(60, 'Pittet', 'Jean', 'jean.pittet@live.emvs.net', 2005, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(61, 'Ruberti', 'Mauro', 'mauro.ruberti@live.emvs.net', 2005, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(62, 'Badertscher', 'Joys', 'joys.badertscher@live.emvs.net', 2005, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(63, 'Terrani', 'Fabien', 'fabien.terrani@live.emvs.net', 2005, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(64, 'Vogel', 'Jean-Marc', 'jean-marc.vogel@live.emvs.net', 2005, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(65, 'Wampfler', 'Julian', 'julian.wampfler@live.emvs.net', 2005, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(66, 'Berthouzoz', 'Michaël', 'michael.berthouzoz@live.emvs.net', 2007, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(69, 'Chappot', 'Ludovic', 'ludovic.chappot@live.emvs.net', 2005, NULL, NULL, 2);
INSERT INTO tbl_students VALUES(70, 'Melly', 'Mathias', 'mathias.melly@live.emvs.net', 2005, NULL, NULL, 2);
INSERT INTO tbl_students VALUES(71, 'Choulak', 'Lyes', 'lyes.choulak@live.emvs.net', 2005, NULL, NULL, 2);
INSERT INTO tbl_students VALUES(72, 'Darbellay', 'François', 'francois.darbellay@live.emvs.net', 2005, NULL, NULL, 2);
INSERT INTO tbl_students VALUES(73, 'Droz', 'Johan', 'johan.droz@live.emvs.net', 2005, NULL, NULL, 2);
INSERT INTO tbl_students VALUES(74, 'Ganchinho', 'Alexandre', 'alexandre.ganchinho@live.emvs.net', 2005, NULL, NULL, 2);
INSERT INTO tbl_students VALUES(75, 'Karlen', 'Fabian', 'fabian.karlen@live.emvs.net', 2005, NULL, NULL, 2);
INSERT INTO tbl_students VALUES(76, 'Kuonen', 'Sacha', 'sacha.kuonen@live.emvs.net', 2005, NULL, NULL, 2);
INSERT INTO tbl_students VALUES(77, 'Lengen', 'Daniel', 'daniel.lengen@live.emvs.net', 2005, NULL, NULL, 2);
INSERT INTO tbl_students VALUES(78, 'Lovejoy', 'Stéphane', 'stephane.lovejoy@live.emvs.net', 2005, NULL, NULL, 2);
INSERT INTO tbl_students VALUES(79, 'Métrailler', 'Christopher', 'christopher.metrailler@live.emvs.net', 2005, NULL, NULL, 2);
INSERT INTO tbl_students VALUES(80, 'Müller', 'François', 'francois.muller@live.emvs.net', 2005, NULL, NULL, 2);
INSERT INTO tbl_students VALUES(81, 'Papon', 'Charles', 'charles.papon@live.emvs.net', 2005, NULL, NULL, 2);
INSERT INTO tbl_students VALUES(82, 'Sierro', 'Alexandre', 'alexandre.sierro@live.emvs.net', 2005, NULL, NULL, 2);
INSERT INTO tbl_students VALUES(83, 'Andenmatten', 'Oliver', 'oliver.andenmatten@live.emvs.net', 2006, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(85, 'Achille', 'Porto', 'porto.achille@live.emvs.net', 2005, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(86, 'Brechbuehl', 'Daniel', 'daniel.brechbuehl@live.emvs.net', 2005, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(87, 'Broccard', 'Michaël', 'michael.broccard@live.emvs.net', 2005, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(88, 'Demir', 'Erhan', 'erhan.demir@live.emvs.net', 2005, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(89, 'Eggs', 'Julien', 'julien.eggs@live.emvs.net', 2005, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(91, 'Vonschallen', 'Silvan', 'silvan.vonschallen@live.emvs.net', 2005, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(92, 'Reymond', 'Sandy', 'sandy.reymond@live.emvs.net', 2005, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(93, 'Wyden', 'Martin', 'martin.wyden@live.emvs.net', 2005, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(94, 'Zurbriggen', 'David', 'david.zurbriggen@live.emvs.net', 2005, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(95, 'Steiner', 'Florian', 'florian.steiner@live.emvs.net', 2005, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(97, 'Rappaz', 'Jérémie', 'jeremie.rappaz@live.emvs.net', 2005, NULL, NULL, 2);
INSERT INTO tbl_students VALUES(98, 'Trachsel', 'Dimitri', 'dimitri.trachsel@live.emvs.net', 2004, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(99, 'Granges', 'Natacha', 'natacha.granges@live.emvs.net', 2004, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(100, 'Pfammatter', 'Nicolas', 'nicolas.pfammatter@live.emvs.net', 2004, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(101, 'Heldner', 'Yannik', 'yannik.heldner@live.emvs.net', 2004, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(102, 'Fostier', 'Corentin', 'corentin.fostier@live.emvs.net', 2004, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(103, 'Bornet', 'Marc', 'marc.bornet@live.emvs.net', 2004, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(104, 'Majhen', 'Antonio', 'antonio.majhen@live.emvs.net', 2004, NULL, NULL, 2);
INSERT INTO tbl_students VALUES(105, 'Solioz', 'Baptiste', 'baptiste.solioz@live.emvs.net', 2004, NULL, NULL, 2);
INSERT INTO tbl_students VALUES(106, 'Egg', 'Joël', 'joel.egg@live.emvs.net', 2004, NULL, NULL, 2);
INSERT INTO tbl_students VALUES(107, 'Mudry', 'Xavier', 'xavier.mudry@live.emvs.net', 2004, NULL, NULL, 2);
INSERT INTO tbl_students VALUES(108, 'Juon', 'Renato', 'renato.juon@live.emvs.net', 2004, NULL, NULL, 2);
INSERT INTO tbl_students VALUES(109, 'Rossier', 'Alain', 'alain.rossier@live.emvs.net', 2004, NULL, NULL, 2);
INSERT INTO tbl_students VALUES(110, 'Karlen', 'Christoph', 'christoph.karlen@live.emvs.net', 2004, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(111, 'Arnold', 'Joel', 'joel.arnold@live.emvs.net', 2004, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(112, 'Imhof', 'Daniel', 'daniel.imhof@live.emvs.net', 2004, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(113, 'Pichel', 'Jonathan', 'jonathan.pichel@live.emvs.net', 2004, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(114, 'Chavy', 'Benjamin', 'benjamin.chavy@live.emvs.net', 2004, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(115, 'Delaloye', 'Nicolas', 'nicolas.delaloye@live.emvs.net', 2004, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(116, 'Calmes', 'Christophe', 'christophe.calmes@live.emvs.net', 2004, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(117, 'Meier', 'Bastien', 'bastien.meier@live.emvs.net', 2004, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(118, 'Resenterra', 'Jean', 'jean.resenterra@live.emvs.net', 2004, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(119, 'Melly', 'David', 'david.melly@live.emvs.net', 2004, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(120, 'Marmy', 'Jérôme', 'jerome.marmy@live.emvs.net', NULL, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(121, 'Joris', 'Romain', 'romain.joris@live.emvs.net', NULL, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(123, 'Imhasly', 'David', 'david.imhasly@live.emvs.net', 2004, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(124, 'Walker', 'Sandro', 'sandro.walker@live.emvs.net', 2004, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(125, 'Gillioz', 'Yannick', 'yannick.gillioz@live.emvs.net', 2005, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(127, 'Öztürk', 'Olsen', 'olsen.ozturk@live.emvs.net', 2004, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(128, 'Savioz', 'Jonathan', 'jonathan.savioz@live.emvs.net', 2004, NULL, NULL, 2);
INSERT INTO tbl_students VALUES(129, 'Abgottspon', 'Manuel', 'manuel.abgottspon@live.emvs.net', 2004, NULL, NULL, 2);
INSERT INTO tbl_students VALUES(130, 'Genetti', 'Jérémie', 'jeremie.genetti@live.emvs.net', 2004, NULL, NULL, 2);
INSERT INTO tbl_students VALUES(131, 'Freymond', 'Maxime', 'maxime.freymond@live.emvs.net', 2004, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(132, 'Martig', 'Ralf', 'ralf.martig@live.emvs.net', 2004, NULL, NULL, 2);
INSERT INTO tbl_students VALUES(133, 'Cheviron', 'Romain', 'romain.cheviron@live.emvs.net', 2004, NULL, NULL, 2);
INSERT INTO tbl_students VALUES(134, 'Jonneret', 'Pascal', 'pascal.jonneret@live.emvs.net', 2004, NULL, NULL, 2);
INSERT INTO tbl_students VALUES(135, 'Meystre', 'Sébastien', 'sebastien.meystre@live.emvs.net', 2004, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(136, 'Bobylev', 'Siméon', 'simeon.bobylev@live.emvs.net', 2004, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(137, 'Gomes', 'Luis', 'luis.gomes@live.emvs.net', 2004, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(138, 'Kuonen', 'Detlef', 'detlef.kuonen@live.emvs.net', 2004, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(139, 'Dorsaz', 'Mathias', 'mathias.dorsaz@live.emvs.net', 2004, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(140, 'Cachat', 'Joachim', 'joachim.cachat@live.emvs.net', 2004, NULL, NULL, 2);
INSERT INTO tbl_students VALUES(141, 'Bregy', 'Matthias', 'matthias.bregy@live.emvs.net', 2004, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(142, 'Wyer', 'Thomas', 'thomas.wyer@live.emvs.net', 2004, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(143, 'Mabillard', 'Olivier', 'olivier.mabillard@live.emvs.net', 2004, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(144, 'Nieto', 'Michaël', 'michael.nieto@live.emvs.net', 2004, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(145, 'Prest', 'Julien', 'julien.prest@live.emvs.net', 2004, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(156, 'Jäger', 'Andreas', 'andreas.jager@live.emvs.net', 2003, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(157, 'Kuonen', 'Jan', 'jan.kuonen@live.emvs.net', 2003, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(158, 'Rochat', 'Néhémie', 'maxime.freymond@live.emvs.net', 2003, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(159, 'Berger', 'Olivier', 'olivier.berger@live.emvs.net', 2003, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(160, 'Walthert', 'Johan', 'johan.walthert@live.emvs.net', 2003, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(161, 'Berner', 'Yannick', 'yannick.berner@live.emvs.net', 2003, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(162, 'Delalay', 'Yohann', 'yohann.delalay@live.emvs.net', 2003, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(163, 'Walther', 'Joël', 'joel.walther@live.emvs.net', 2003, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(164, 'Steiner', 'Wendelin', 'wendelin.steiner@live.emvs.net', 2003, NULL, NULL, 2);
INSERT INTO tbl_students VALUES(165, 'Dani', 'Batian', 'batian.dani@live.emvs.net', 2003, NULL, NULL, 2);
INSERT INTO tbl_students VALUES(166, 'Fellay', 'Benjamin', 'benjamin.fellay@live.emvs.net', 2003, NULL, NULL, 2);
INSERT INTO tbl_students VALUES(167, 'Frei', 'Mickael', 'mickael.frei@live.emvs.net', 2003, NULL, NULL, 2);
INSERT INTO tbl_students VALUES(168, 'Lattion', 'Emmanuel', 'emmanuel.lattion@live.emvs.net', 2003, NULL, NULL, 2);
INSERT INTO tbl_students VALUES(169, 'Grichting', 'Benjamin', 'benjamin.grichting@live.emvs.net', 2003, NULL, NULL, 2);
INSERT INTO tbl_students VALUES(170, 'Schaller', 'Philipp', 'phillipp.schaller@live.emvs.net', 2003, NULL, NULL, 2);
INSERT INTO tbl_students VALUES(171, 'Ambord', 'Patrick', 'patrick.ambord@live.emvs.net', 2003, NULL, NULL, 2);
INSERT INTO tbl_students VALUES(172, 'Bagnoud', 'Thomas', 'thomas.bagnoud@live.emvs.net', 2003, NULL, NULL, 2);
INSERT INTO tbl_students VALUES(173, 'Perritaz', 'Claude-Alain', 'claude-alain.perritaz@live.emvs.net', 2003, NULL, NULL, 2);
INSERT INTO tbl_students VALUES(174, 'Walpen', 'Sébastien', 'sebastien.walpen@live.emvs.net', 2003, NULL, NULL, 2);
INSERT INTO tbl_students VALUES(175, 'Darbellay', 'Samuel', 'samuel.darbellay@live.emvs.net', 2003, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(176, 'Demir mehmet', 'Volkan', 'demir.volkan@live.emvs.net', 2003, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(177, 'Bellon', 'Steve', 'steve.bellon@live.emvs.net', 2003, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(178, 'Arnau', 'Yannick', 'yannick.arnau@live.emvs.net', 2003, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(179, 'Borter', 'Angelo', 'angelo.borter@live.emvs.net', 2003, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(180, 'Ruppen', 'Christian', 'christian.ruppen@live.emvs.net', 2003, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(181, 'Barras', 'Léonard', 'leonard.barras@live.emvs.net', 2003, NULL, NULL, 2);
INSERT INTO tbl_students VALUES(182, 'Joris', 'Guillaume', 'guillaume.joris@live.emvs.net', 2003, NULL, NULL, 2);
INSERT INTO tbl_students VALUES(183, 'Furrer', 'Dominic', 'dominic.furrer@live.emvs.net', 2003, NULL, NULL, 2);
INSERT INTO tbl_students VALUES(184, 'Hischier', 'Thierry', 'thierry.hischier@live.emvs.net', 2003, NULL, NULL, 2);
INSERT INTO tbl_students VALUES(185, 'Dorsaz', 'Samuel', 'samuel.dorsaz@live.emvs.net', 2003, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(186, 'Jullier', 'Dominique', 'dominique.jullier@live.emvs.net', 2003, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(187, 'Zubriggen', 'Diego', 'diego.zubriggen@live.emvs.net', 2003, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(188, 'Gaillard', 'Benjamin', 'benjamin.gaillard@live.emvs.net', 2003, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(189, 'Lerjen', 'Yann', 'yann.lerjen@live.emvs.net', 2003, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(190, 'Gattlen', 'Philipp', 'philipp.gattlen@live.emvs.net', 2003, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(191, 'Zanella', 'David', 'david.zanella@live.emvs.net', 2003, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(192, 'Al-Rubeiy', 'Hussein', 'hussein.al-rubeiy@live.emvs.net', 2003, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(193, 'Cicognini', 'Jonas', 'jonas.cicognini@live.emvs.net', 2003, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(194, 'Abgottspon', 'Andy', 'andy.abgottspon@live.emvs.net', 2003, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(195, 'Fux', 'Philipp', 'philipp.fux@live.emvs.net', 2003, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(196, 'Jacquérioz', 'Yoan', 'yoan.jacquerioz@live.emvs.net', 2003, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(197, 'Zambon', 'Loïc', 'loic.zambon@live.emvs.net', 2003, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(198, 'Basic', 'Edin', 'edin.basic@live.emvs.net', 2007, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(199, 'Chappoz', 'Antonin', 'antonin.chappoz@live.emvs.net', 2007, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(200, 'Chappuis', 'Christophe', 'christophe.chappuis@live.emvs.net', 2007, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(201, 'Fumeaux', 'Guillaume', 'guillaume.fumeaux@live.emvs.net', 2007, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(202, 'Pouyt', 'Timothée', 'timothee.pouyt@live.emvs.net', 2007, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(203, 'Reitpichler', 'Gregory', 'gregory.reitpichler@live.emvs.net', 2007, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(212, 'Roduit', 'Dominique', 'roduit.domi@live.emvs.net', 2009, 2013, 298, 3);
INSERT INTO tbl_students VALUES(213, 'Treyer', 'Thierry', 'treyer.thie@live.emvs.net', 2009, 2013, 199, 3);
INSERT INTO tbl_students VALUES(214, 'Germanier', 'Estelle', 'germanier.este@live.emvs.net', 2009, 2013, 194, 3);
INSERT INTO tbl_students VALUES(215, 'Robert-Charrue', 'Helena', 'helena.robert-charrue@live.emvs.net', 2008, 2013, 204, 3);
INSERT INTO tbl_students VALUES(216, 'Alter', 'Bastien', 'alter.bast@live.emvs.net', 2009, 2013, 203, 3);
INSERT INTO tbl_students VALUES(217, 'Venetz', 'Claudio', 'claudio.venetz@live.emvs.net', 2007, NULL, NULL, 2);
INSERT INTO tbl_students VALUES(218, 'François-Xavier', 'Rieille', 'rieille.francois-xavier@live.emvs.net', 2007, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(219, 'Strahm', 'Vincent', 'vincent.strahm@live.emvs.net', 2007, NULL, NULL, 3);
INSERT INTO tbl_students VALUES(220, 'Steinmann', 'Benoît', 'benoit.steinmann@live.emvs.net', 2007, NULL, NULL, 2);
INSERT INTO tbl_students VALUES(221, 'Mayencourt', 'Louis', 'louis.mayencourt@live.emvs.net', 2007, NULL, NULL, 2);
INSERT INTO tbl_students VALUES(222, 'Abbet', 'Christian', 'christian.abbet@live.emvs.net', 2007, NULL, NULL, 2);
INSERT INTO tbl_students VALUES(223, 'Gsponer', 'Emilie', 'emilie.gsponer@live.emvs.net', 2007, NULL, NULL, 2);
INSERT INTO tbl_students VALUES(224, 'Pompili', 'Martin', 'martin.pompili@live.emvs.net', 2007, NULL, NULL, 2);
INSERT INTO tbl_students VALUES(225, 'Raboud', 'Valentin', 'valentin.raboud@live.emvs.net', 2007, NULL, NULL, 2);
INSERT INTO tbl_students VALUES(226, 'Siggen', 'Mélinda', 'melinda.siggen@live.emvs.net', 2007, NULL, NULL, 2);
INSERT INTO tbl_students VALUES(258, 'Bearpark', 'Vincent', 'bearpark.vinc@live.emvs.net', 2009, 2013, 202, 3);
INSERT INTO tbl_students VALUES(259, 'Dolt', 'Mathias', 'dolt.math@live.emvs.net', 2009, 2013, NULL, 3);
INSERT INTO tbl_students VALUES(260, 'Duchoud', 'Thibaud', 'duchoud.thib@live.emvs.net', 2009, 2013, NULL, 3);
INSERT INTO tbl_students VALUES(261, 'Ferreira', 'Mario', 'ferreira.mari@live.emvs.net', 2009, 2013, 196, 3);
INSERT INTO tbl_students VALUES(262, 'Junod', 'Damien', 'junod.dami@live.emvs.net', 2009, 2013, 200, 3);
INSERT INTO tbl_students VALUES(263, 'Morel', 'Mathieu', 'morel.math@live.emvs.net', 2009, 2013, 195, 3);
INSERT INTO tbl_students VALUES(264, 'Moret', 'Jérôme', 'moret.jero@live.emvs.net', 2009, 2013, 201, 3);
INSERT INTO tbl_students VALUES(265, 'Mourad', 'Théophane', 'mourad.theo@live.emvs.net', 2009, 2013, NULL, 3);
INSERT INTO tbl_students VALUES(267, 'Normand', 'Christophe', 'normand.chri@live.emvs.net', 2009, 2013, NULL, 3);
INSERT INTO tbl_students VALUES(268, 'Riad', 'Karim', 'riad.kari@live.emvs.net', 2009, 2013, 197, 3);
INSERT INTO tbl_students VALUES(269, 'Roh', 'Steven', 'roh.stev@live.emvs.net', 2009, 2013, 205, 3);
INSERT INTO tbl_students VALUES(270, 'Devènes', 'Steve', 'steve.devenes@live.emvs.net', 2007, 2011, NULL, 2);
INSERT INTO tbl_students VALUES(271, 'May', 'Diogo', 'diogo.may@live.emvs.net', 2007, 2011, NULL, 2);
INSERT INTO tbl_students VALUES(272, 'Beaupain', 'Noémie', 'noemie.beaupain@live.emvs.net', 2007, 2011, NULL, 2);
INSERT INTO tbl_students VALUES(273, 'Quinetero', 'Nathan', 'nathan.quinetero@live.emvs.net', 2007, 2011, NULL, 2);
INSERT INTO tbl_students VALUES(274, 'Viaccoz', 'Fabienne', 'fabienne.viaccoz@live.emvs.net', 2007, 2011, NULL, 1);
INSERT INTO tbl_students VALUES(275, 'Baillifard', 'Yan', 'yan.baillifard@live.emvs.net', 2007, 2011, NULL, 1);
INSERT INTO tbl_students VALUES(276, 'Zermatten', 'Julien', 'julien.zermatten@live.emvs.net', 2007, 2011, NULL, 1);
INSERT INTO tbl_students VALUES(277, 'Rittler', 'Thomas', 'thomas.rittler@live.emvs.net', 2007, 2011, NULL, 1);
INSERT INTO tbl_students VALUES(278, 'Buco', 'Lenny', 'lenny.buco@live.emvs.net', 2007, 2011, NULL, 1);
INSERT INTO tbl_students VALUES(279, 'Baillifard', 'Eugène', 'eugene.baillifard@live.emvs.net', 2007, 2011, NULL, 1);
INSERT INTO tbl_students VALUES(280, 'Caldeira', 'Antony', 'antony.caldeira@live.emvs.net', 2007, 2011, NULL, 1);
INSERT INTO tbl_students VALUES(281, 'Bernard', 'Adrien', 'adrien.bernard@live.emvs.net', 2007, 2011, NULL, 1);
INSERT INTO tbl_students VALUES(282, 'Waldmann', 'Frédéric', 'frederic.waldmann@live.emvs.net', 2007, 2011, NULL, 1);
INSERT INTO tbl_students VALUES(283, 'Mathieu', 'Joël', 'joel.mathieu@live.emvs.net', 2007, 2011, NULL, 1);
INSERT INTO tbl_students VALUES(284, 'Ritz', 'Christian', 'christian.ritz@live.emvs.net', 2007, 2011, NULL, 3);
INSERT INTO tbl_students VALUES(285, 'Jurakic', 'Franjo', 'franjo.jurakic@live.emvs.net', 2007, 2011, NULL, 3);
INSERT INTO tbl_students VALUES(286, 'Imboden', 'Claudio', 'claudio.imboden@live.emvs.net', 2007, 2011, NULL, 3);
INSERT INTO tbl_students VALUES(287, 'Tscherry', 'Etienne', 'etienne.tscherry@live.emvs.net', 2007, 2011, NULL, 3);
INSERT INTO tbl_students VALUES(288, 'Isenschmid', 'David', 'david.isenschmid@live.emvs.net', 2007, 2011, NULL, 3);
INSERT INTO tbl_students VALUES(289, 'Mooser', 'Joel', 'joel.mooser@live.emvs.net', 2007, 2011, NULL, 3);
INSERT INTO tbl_students VALUES(290, 'Heinen', 'Samuel', 'samuel.heinen@live.emvs.net', 2007, 2011, NULL, 3);
INSERT INTO tbl_students VALUES(291, 'Clavien', 'Tony', 'tony.clavien@live.emvs.net', 2008, 2012, NULL, 3);
INSERT INTO tbl_students VALUES(292, 'Espinosa', 'William', 'william.espinosa@live.emvs.net', 2008, 2012, NULL, 3);
INSERT INTO tbl_students VALUES(293, 'Malesevic', 'Yelena', 'yelena.malesevic@live.emvs.net', 2008, 2012, NULL, 3);
INSERT INTO tbl_students VALUES(294, 'Eibl', 'Marcus', 'marcus.eibl@live.emvs.net', 2008, 2012, NULL, 3);
INSERT INTO tbl_students VALUES(295, 'Maillard', 'Dany', 'dany.maillard@live.emvs.net', 2008, 2012, NULL, 3);
INSERT INTO tbl_students VALUES(296, 'Monnet', 'Pauline', 'pauline.monnet@live.emvs.net', 2008, 2012, NULL, 3);
INSERT INTO tbl_students VALUES(297, 'Santamaria', 'Miguel', 'miguel.santamaria@live.emvs.net', 2008, 2012, NULL, 3);
INSERT INTO tbl_students VALUES(298, 'Volery', 'Vivien', 'vivien.volery@live.emvs.net', 2008, 2012, NULL, 3);
INSERT INTO tbl_students VALUES(299, 'Collet', 'Quentin', 'quentin.collet@live.emvs.net', 2008, 2012, NULL, 2);
INSERT INTO tbl_students VALUES(300, 'Briand', 'Bill', 'bill.briand@live.emvs.net', 2008, 2012, NULL, 2);
INSERT INTO tbl_students VALUES(301, 'De Gol', 'Killian', 'killian.de gol@live.emvs.net', 2008, 2012, NULL, 2);
INSERT INTO tbl_students VALUES(302, 'Praz', 'Quentin', 'quentin.praz@live.emvs.net', 2008, 2012, NULL, 2);
INSERT INTO tbl_students VALUES(303, 'Sthioul', 'Quentin', 'quentin.sthioul@live.emvs.net', 2008, 2012, NULL, 2);
INSERT INTO tbl_students VALUES(304, 'Zufferey', 'Laurent', 'laurent.zufferey@live.emvs.net', 2008, 2012, NULL, 2);
INSERT INTO tbl_students VALUES(305, 'Papilloud', 'César', 'cesar.papilloud@live.emvs.net', 2008, 2012, NULL, 1);
INSERT INTO tbl_students VALUES(306, 'Cave', 'Emilien', 'emilien.cave@live.emvs.net', 2008, 2012, NULL, 1);
INSERT INTO tbl_students VALUES(307, 'Torres', 'Oscar', 'torres.osca@live.emvs.net', 2009, 2013, 280, 1);
INSERT INTO tbl_students VALUES(308, 'Vuistiner', 'Dylan', 'vuistiner.dyla@live.emvs.net', 2009, 2013, 287, 1);
INSERT INTO tbl_students VALUES(309, 'Coutaz', 'Roxane', 'roxane.coutaz@live.emvs.net', NULL, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(310, 'Jollien', 'Dominique', 'dominique.jollien@live.emvs.net', 2008, 2012, NULL, 3);
INSERT INTO tbl_students VALUES(311, 'Rouiller', 'Bastien', 'bastien.rouiller@live.emvs.net', 2008, 2012, NULL, 3);
INSERT INTO tbl_students VALUES(312, 'Dos-Santos', 'Frédéric', 'frederic.dos-santos@live.emvs.net', 2008, 2012, NULL, 3);
INSERT INTO tbl_students VALUES(313, 'Roch', 'Maxime', 'maxime.roch@live.emvs.net', 2008, 2012, NULL, 3);
INSERT INTO tbl_students VALUES(314, 'Dayer', 'Yannick', 'yannick.dayer@live.emvs.net', 2008, 2012, NULL, 2);
INSERT INTO tbl_students VALUES(315, 'Coudray', 'Samuel', 'samuel.coudray@live.emvs.net', 2008, 2012, NULL, 2);
INSERT INTO tbl_students VALUES(316, 'Grandjean', 'Lucien', 'lucien.grandjean@live.emvs.net', 2008, 2012, NULL, 2);
INSERT INTO tbl_students VALUES(317, 'Hansen', 'Lenny', 'lenny.hansen@live.emvs.net', 2008, 2012, NULL, 2);
INSERT INTO tbl_students VALUES(318, 'Leopold', 'Florian', 'florian.leopold@live.emvs.net', 2008, 2012, NULL, 2);
INSERT INTO tbl_students VALUES(319, 'Maret', 'Yann', 'yann.maret@live.emvs.net', 2008, 2012, NULL, 2);
INSERT INTO tbl_students VALUES(320, 'Mayoraz', 'André', 'andre.mayoraz@live.emvs.net', 2008, 2012, NULL, 2);
INSERT INTO tbl_students VALUES(321, 'Oggier', 'Thomas', 'thomas.oggier@live.emvs.net', 2008, 2012, NULL, 2);
INSERT INTO tbl_students VALUES(322, 'Reynard', 'Bastien', 'bastien.reynard@live.emvs.net', 2008, 2012, NULL, 2);
INSERT INTO tbl_students VALUES(323, 'Rossier', 'Nicolas', 'nicolas.rossier@live.emvs.net', 2008, 2012, NULL, 2);
INSERT INTO tbl_students VALUES(324, 'Ruffiner', 'Yannick', 'yannick.ruffiner@live.emvs.net', 2008, 2012, NULL, 2);
INSERT INTO tbl_students VALUES(325, 'Sgroi', 'Daniel', 'daniel.sgroi@live.emvs.net', 2008, 2012, NULL, 2);
INSERT INTO tbl_students VALUES(326, 'Todisco', 'Mickaël', 'mickael.todisco@live.emvs.net', 2008, 2012, NULL, 2);
INSERT INTO tbl_students VALUES(327, 'Berthod', 'Ludovic', 'ludovic.berthod@live.emvs.net', 2008, 2012, NULL, 1);
INSERT INTO tbl_students VALUES(328, 'Rhyner', 'Lucien', 'rhyner.luci@live.emvs.net', 2009, 2013, 281, 1);
INSERT INTO tbl_students VALUES(329, 'Lüthi', 'Théo', 'luthi.theo@live.emvs.net', 2009, 2013, 289, 1);
INSERT INTO tbl_students VALUES(330, 'Stjepic', 'Mario', 'mario.stjepic@live.emvs.net', 2008, 2013, NULL, 1);
INSERT INTO tbl_students VALUES(331, 'Carron', 'Bernard', 'bernard.carron@live.emvs.net', 2008, 2012, NULL, 1);
INSERT INTO tbl_students VALUES(332, 'Privet', 'Corentin', 'privet.core@live.emvs.net', 2009, 2013, NULL, 1);
INSERT INTO tbl_students VALUES(333, 'Mottiez', 'Adrien', 'mottiez.adri@live.emvs.net', 2009, 2013, 283, 1);
INSERT INTO tbl_students VALUES(334, 'Kreutzer', 'Benoît', 'benoit.kreutzer@live.emvs.net', NULL, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(335, 'Bonvin', 'Nicolas', 'nicolas.bonvin@live.emvs.net', NULL, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(336, 'Pralong', 'Lionel', 'lionel.pralong@live.emvs.net', NULL, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(337, 'Barman', 'Gaël', 'barman.gael@live.emvs.net', 2009, 2013, 285, 2);
INSERT INTO tbl_students VALUES(338, 'Bayard', 'Mathieu', 'bayard.math@live.emvs.net', 2009, 2013, NULL, 2);
INSERT INTO tbl_students VALUES(339, 'Bonvin', 'Flavien', 'bonvin.flav@live.emvs.net', 2009, 2013, 286, 2);
INSERT INTO tbl_students VALUES(340, 'Botana', 'Juan-José', 'botana.juan@live.emvs.net', 2009, 2013, 282, 2);
INSERT INTO tbl_students VALUES(341, 'Carrupt', 'Aurélien', 'carrupt.aure@live.emvs.net', 2009, 2013, 290, 2);
INSERT INTO tbl_students VALUES(342, 'Girard', 'Nicolas', 'girard.nico@live.emvs.net', 2009, 2013, NULL, 2);
INSERT INTO tbl_students VALUES(343, 'Jaquier', 'David', 'jaquier.davi@live.emvs.net', 2009, 2013, 284, 2);
INSERT INTO tbl_students VALUES(344, 'Roh', 'Vincent', 'roh.vinc@live.emvs.net', 2009, 2013, 291, 2);
INSERT INTO tbl_students VALUES(345, 'Schaffter', 'Sami', 'schaffter.sami@live.emvs.net', 2009, 2013, NULL, 2);
INSERT INTO tbl_students VALUES(346, 'Sierro', 'Nicolas', 'sierro.nico@live.emvs.net', 2009, 2013, 292, 2);
INSERT INTO tbl_students VALUES(347, 'Stjepic', 'Mirko', 'stjepic.mirk@live.emvs.net', 2009, 2013, NULL, 2);
INSERT INTO tbl_students VALUES(348, 'Udressy', 'Cédric', 'udressy.cedr@live.emvs.net', 2009, 2013, 293, 2);
INSERT INTO tbl_students VALUES(349, 'Brunner', 'Jürgen', 'brunner.jurg@live.emvs.net', 2009, 2013, NULL, 2);
INSERT INTO tbl_students VALUES(350, 'Burgener', 'Marco', 'burgener.marc@live.emvs.net', 2009, 2013, NULL, 2);
INSERT INTO tbl_students VALUES(351, 'Moniquet', 'Thomas', 'moniquet.thom@live.emvs.net', 2010, 2014, NULL, 1);
INSERT INTO tbl_students VALUES(352, 'Marcoz', 'Mélina', 'marcoz.meli@live.emvs.net', 2010, 2014, 288, 1);
INSERT INTO tbl_students VALUES(353, 'Tissières', 'Maxime', 'tissieres.maxi@live.emvs.net', NULL, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(354, 'Maye', 'Stéphanie', 'maye.step@live.emvs.net', NULL, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(355, 'Emery', 'Stéphane', 'emery.step@live.emvs.net', NULL, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(356, 'Métrailler', 'Luc', 'metrailler.luc@live.emvs.net', 2009, 2014, NULL, 1);
INSERT INTO tbl_students VALUES(357, 'Turin', 'Colas', 'turin.cola@live.emvs.net', NULL, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(358, 'Catteeuw', 'Jérôme', 'catteeuw.jero@live.emvs.net', NULL, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(359, 'Rivoellant', 'Julien', 'rivoellant.juli@live.emvs.net', NULL, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(360, 'Bagnoud', 'Thomas', 'bagnoud.thom@live.emvs.net', NULL, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(361, 'Devènes', 'Yvan', 'devenes.yvan@live.emvs.net', NULL, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(362, 'Saillen', 'Guillaume', 'saillen.guil@live.emvs.net', NULL, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(363, 'Cordonier', 'Yohan', 'cordonier.yoha@live.emvs.net', NULL, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(364, 'Martins', 'Mélanie', 'martins.mela@live.emvs.net', NULL, NULL, NULL, 1);
INSERT INTO tbl_students VALUES(365, 'Stoffel', 'Cyrill', 'stoffel.cyri@live.emvs.net', 2009, 2013, NULL, 1);
INSERT INTO tbl_students VALUES(366, 'Candelier', 'Alexandre', 'candelier.alex@live.emvs.net', 2010, 2014, NULL, 3);
INSERT INTO tbl_students VALUES(367, 'Donnet-Monay', 'Adrien', 'donnetmona.adri@live.emvs.net', 2010, 2014, NULL, 3);
INSERT INTO tbl_students VALUES(368, 'Dos reis', 'Léo', 'dosreis.leo@live.emvs.net', 2010, 2014, 303, 3);
INSERT INTO tbl_students VALUES(369, 'Dubuis', 'Jérémie', 'dubuis.jere@live.emvs.net', 2009, 2014, 299, 3);
INSERT INTO tbl_students VALUES(370, 'Maret', 'Jonathan', 'maret.jona@live.emvs.net', 2010, 2014, 302, 3);
INSERT INTO tbl_students VALUES(371, 'Michaud', 'Jérémy', 'michaud.jere@live.emvs.net', 2010, 2014, 308, 3);
INSERT INTO tbl_students VALUES(372, 'Richard', 'Loïc', 'richard.loic@live.emvs.net', 2009, 2014, 301, 3);
INSERT INTO tbl_students VALUES(373, 'Honorato', 'Léandro', 'honorato.lean@live.emvs.net', 2011, 2013, NULL, 3);
INSERT INTO tbl_students VALUES(374, 'Borter', 'Sandro', 'borter.sand@live.emvs.net', 2009, 2013, NULL, 1);
INSERT INTO tbl_students VALUES(375, 'Katic', 'Pavo', 'katic.pavo@live.emvs.net', 2009, 2013, NULL, 1);
INSERT INTO tbl_students VALUES(376, 'Moser', 'Thomas', 'moser.thom@live.emvs.net', 2009, 2013, NULL, 1);
INSERT INTO tbl_students VALUES(377, 'Udressy', 'Julien', 'udressy.juli@live.emvs.net', 2011, 2015, NULL, 1);

-- -----------------------------
-- Structure de la table tbl_teachers
-- -----------------------------
CREATE TABLE `tbl_teachers` (
  `PKNoTeacher` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `email` varchar(85) DEFAULT NULL,
  `FKNoMediaImage` int(11) DEFAULT NULL,
  PRIMARY KEY (`PKNoTeacher`),
  KEY `FKNoMediaImage` (`FKNoMediaImage`),
  CONSTRAINT `tbl_teachers_ibfk_1` FOREIGN KEY (`FKNoMediaImage`) REFERENCES `tbl_media_images` (`PKNoMediaImage`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

-- -----------------------------
-- Contenu de la table tbl_teachers
-- -----------------------------
INSERT INTO tbl_teachers VALUES(1, 'Schönmann', 'Thibault', 'thibault.schonmann@emvs.ch', 234);
INSERT INTO tbl_teachers VALUES(2, 'Kippel', 'Alain', 'alain.kippel@emvs.ch', NULL);
INSERT INTO tbl_teachers VALUES(3, 'Caloz', 'Christophe', 'christophe.caloz@emvs.ch', NULL);
INSERT INTO tbl_teachers VALUES(4, 'Bonnard', 'Jérome', 'jerome.bonnard@emvs.ch', NULL);
INSERT INTO tbl_teachers VALUES(5, 'Eggs', 'Nicolas', 'nicolas.eggs@emvs.ch', 259);
INSERT INTO tbl_teachers VALUES(6, 'Gay', 'Philippe', 'philippe.gay@emvs.ch', NULL);
INSERT INTO tbl_teachers VALUES(7, 'Dubuis', 'Bernard', 'bernard.dubuis@emvs.ch', NULL);
INSERT INTO tbl_teachers VALUES(8, 'Rey', 'Yvan', 'yvan.rey@emvs.ch', NULL);
INSERT INTO tbl_teachers VALUES(9, 'Zufferey', 'Christophe', 'christophe.zufferey@emvs.ch', NULL);
INSERT INTO tbl_teachers VALUES(10, 'Gaspoz', 'Frédéric', 'frederic.gaspoz@emvs.ch', NULL);
INSERT INTO tbl_teachers VALUES(11, 'Lehner', 'Stefan', 'stefan.lehner@emvs.ch', NULL);
INSERT INTO tbl_teachers VALUES(12, 'Genolet', 'Antoine', 'antoine.genolet@emvs.ch', NULL);
INSERT INTO tbl_teachers VALUES(13, 'Pardo', 'Yan', 'yan.pardo@emvs.ch', NULL);
INSERT INTO tbl_teachers VALUES(14, 'Chappot', 'Florian', 'florian.chappot@emvs.ch', 258);
INSERT INTO tbl_teachers VALUES(15, 'Fournier', 'Jean-Jacques', 'jean-jacques.fournier@emvs.ch', NULL);
INSERT INTO tbl_teachers VALUES(34, 'Delavy', 'Marcel', 'marcel.delavy@emvs.ch', NULL);
INSERT INTO tbl_teachers VALUES(43, 'Roduit', 'Bertrand', 'bertrand.roduit@emvs.ch', NULL);
INSERT INTO tbl_teachers VALUES(44, 'Rausis', 'Patrick', 'patrick.rausis@cfpsion.ch', NULL);
INSERT INTO tbl_teachers VALUES(45, 'Albasini', 'Alain', 'alain.albasini@cfpsion.ch', NULL);
INSERT INTO tbl_teachers VALUES(46, 'Savioz', 'Patrick', 'patrick.savioz@cfpsion.ch', 233);
INSERT INTO tbl_teachers VALUES(47, 'Fazio', 'Gionatan', 'gionatan.fazio@cfpsion.ch', NULL);
INSERT INTO tbl_teachers VALUES(48, 'Fumeaux', 'Steve', 'steve.fumeaux@cfpsion.ch', NULL);
INSERT INTO tbl_teachers VALUES(49, 'Vouillamoz', 'Steve', 'steve.vouillamoz@cfpsion.ch', NULL);
INSERT INTO tbl_teachers VALUES(50, 'Vouillamoz', 'Christophe', 'christophe.vouillamoz@cfpsion.ch', NULL);

-- -----------------------------
-- Structure de la table tbl_projects_history
-- -----------------------------
CREATE TABLE `tbl_projects_history` (
  `PKNoProjectHistory` int(11) NOT NULL AUTO_INCREMENT,
  `FKNoProject` int(11) DEFAULT NULL,
  `FKNoPeriode` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `desc_fr` longtext,
  `desc_de` longtext,
  `salle` int(6) DEFAULT NULL,
  `FKNoMediaImage` int(11) DEFAULT NULL,
  `FKNoProfession` int(11) DEFAULT NULL,
  PRIMARY KEY (`PKNoProjectHistory`),
  KEY `ForeignProjectID` (`FKNoProject`),
  KEY `ForeignPeriodeID` (`FKNoPeriode`),
  KEY `FKNoMediaImage` (`FKNoMediaImage`),
  KEY `FKNoProfession` (`FKNoProfession`),
  KEY `salle` (`salle`),
  CONSTRAINT `tbl_projects_history_ibfk_1` FOREIGN KEY (`FKNoProject`) REFERENCES `tbl_projects` (`PKNoProject`) ON DELETE CASCADE,
  CONSTRAINT `tbl_projects_history_ibfk_2` FOREIGN KEY (`FKNoPeriode`) REFERENCES `tbl_projects_period` (`PKNoProjectPeriod`) ON DELETE SET NULL ON UPDATE NO ACTION,
  CONSTRAINT `tbl_projects_history_ibfk_3` FOREIGN KEY (`FKNoMediaImage`) REFERENCES `tbl_media_images` (`PKNoMediaImage`) ON DELETE SET NULL,
  CONSTRAINT `tbl_projects_history_ibfk_4` FOREIGN KEY (`FKNoProfession`) REFERENCES `tbl_professions` (`PKNoProfession`),
  CONSTRAINT `tbl_projects_history_ibfk_5` FOREIGN KEY (`salle`) REFERENCES `tbl_rooms` (`PKNoRoom`)
) ENGINE=InnoDB AUTO_INCREMENT=302 DEFAULT CHARSET=utf8;

-- -----------------------------
-- Contenu de la table tbl_projects_history
-- -----------------------------
INSERT INTO tbl_projects_history VALUES(16, 41, NULL, 2009, 'Le but de ce projet est de concevoir un altim&amp;egrave;tre. Le capteur mesure la pression atmosph&amp;eacute;rique et fournit une valeur num&amp;eacute;rique 12 bits. L\'altitude est d&amp;eacute;termin&amp;eacute;e &amp;agrave; partir de la pression et la pression d&amp;eacute;pendant des conditions atmosph&amp;eacute;riques, il est possible d\'avoir deux altitudes pour le m&amp;ecirc;me lieu.', 'Ziel dieses Projektes ist es, einen Höhenmeter zu bauen. Der Fühler misst den Luftdruck und liefert einen digitalen 12-Bit-Wert. Die Höhe wird ausgehend vom normalen und vom wetterabhängigen Luftdruck bestimmt. Es ist daher möglich, zwei Höhenangaben für den selben Standort zu haben.', NULL, 40, 2);
INSERT INTO tbl_projects_history VALUES(17, 34, NULL, 2009, 'Ce projet consiste en un amplificateur audio de 20 W avec des gains diff&amp;eacute;rents allant de 12 &amp;agrave; 36 [dB]. Le circuit et mis dans une boite en plastique noir sur lequel on peut raccorder un mp3 par exemple &amp;agrave; l\'aide d\'une prise Jack.', 'Dieses Projekt besteht aus einem 20W-Audio-Verstärker mit mehreren verschiedenen Verstärkungsstufen, die von 12 bis 36 Dezibel reichen. Der Schaltkreis wird in ein schwarzes Plastikgehäuse gelegt und man wird ein Signal auf einen MP3-Player senden können, beispielsweise mit einem Jack-Stecker.', NULL, 34, 2);
INSERT INTO tbl_projects_history VALUES(18, 11, NULL, 2009, 'Maquette didactique pour l\'enseignement de la programmation sur Siemens (S7-300). Cette maquette est conçue pour être utilisée par des élèves de première année comme ceux de quatrième. Le projet à été imaginé après avoir travaillé avec les maquettes de l\'école. La cabine dessert quatre étages, elle est équipée d\'une porte motorisée. Le moteur principal est piloté par un variateur de vitesse.', 'Didaktisches Versuchsmodell für den Programmierungs-Unterricht auf Siemens (S7-300). Dieses Modell ist so angelegt, dass es sowohl von Lehrlingen des ersten als auch des vierten Jahres benutzt werden kann. Die Projektidee ist der Arbeit mit den Modellen der Schule entsprungen. Der Aufzug bedient vier Stockwerke. Der Fahrgastraum verfügt über eine motorisierte Türe. Der Hauptantrieb wird via Geschwindigkeitsregler gesteuert.', NULL, 11, 1);
INSERT INTO tbl_projects_history VALUES(19, 77, NULL, 2008, 'Ce projet consiste en la conception d\'un simulateur des diff&amp;eacute;rents d&amp;eacute;marrages d\'un moteur &amp;agrave; courant alternatif. On doit pouvoir choisir sur un &amp;eacute;cran tactile les diff&amp;eacute;rents types de d&amp;eacute;marrage : 1. D&amp;eacute;marrage direct 2. D&amp;eacute;marrage &amp;eacute;toile-triangle 3. D&amp;eacute;marrage &amp;eacute;lectronique doux 4. D&amp;eacute;marrage &amp;agrave; l\'aide d\'un convertisseur de fr&amp;eacute;quences', 'Dieses Projekt soll die verschiedenen Startmöglichkeiten eines Wechselstrom-Motors aufzeigen und simulieren. Man kann die verschiedenen Möglichkeiten auf einem Touchscreen auswählen. Die verschiedenen Startmöglichkeiten sind:  1.      Direkt-/Schnellstart 2.      Stern-Dreieck-Start 3.      elektronischer Softstart  4.      Start mit einem Frequenzwandler', NULL, 76, 1);
INSERT INTO tbl_projects_history VALUES(20, 35, NULL, 2009, 'Ce projet a pour but de rendre autonome un robot bibot, robot qui a été devellopé à l\'EMVs et ce à l\'aide d\'une souris optique qui vas permettre au robot de se positionner sur un plan en 2 dimensions.  Le robot doit aller d\'un point à un autre sun plateau de 1m20 sur 2m40 en évitant les obstacles, les coordonées de départ sont fixes mais les coordonnées d\'arrivée sont spécifiée via un PC.', 'Dieses Projekt besteht darin, einen Roboter, welcher an der EMVs entwickelt wurde, unabhängig/selbständig werden zu lassen und zwar mit Hilfe einer optischen Maus, die es dem Roboter ermöglichen wird, sich auf einem 2D-Feld zu positionieren.                                                                          Der Roboter muss auf einem Feld von 1m20 auf 2m40 von einem Punkt zum anderen gelangen, indem er den Hindernissen ausweicht. Die Startposition ist fix, die Zielkoordinaten werden jedoch via PC eingegeben.', NULL, 35, 2);
INSERT INTO tbl_projects_history VALUES(21, 44, NULL, 2008, 'Programmation d\'un jeux de Bongo en C++. Il s\'agit d\'un jeux de logique et de rapidité. Deux dés d\'une valeur de 1 à 3 bambous sont tirés au sort. Sur la base de ce choix aléatoire, le joueur doit déterminer dans une série d\'image d\'animaux, lequel répond à ce choix. Les règles sont complexes et multiples. Par exemple, si les deux dés bambous représentent les deux un bambous, alors l\'image d\'animaux à choisir et celle qui ne se retrouve qu\'une fois. Cela se corse, si les deux dés bambous représentent un chiffre différent.', 'Programmierung eines Bongospiels in C++. Es handelt sich hierbei um ein Logik- und Geschwindigkeitsspiel. Zwei Würfel mit einem Wert von 1 bis 3 Bambusrohren werden ausgelost. Aufgrund dieser zufallsbedingten Wahl muss der Spieler aus einer Reihe von Tierbildern festlegen, welches diesem Los entspricht. Die Regeln sind komplex und vielfältig. Wenn die beiden Bambuswürfel je ein Bambusrohr aufweisen, dann ist dasjenige Tierbild auszuwählen, das nur einmal vorkommt. Schwieriger bzw. spannender wird es, wenn beide Bambuswürfel eine andere Zahl darstellen. ', NULL, 43, 3);
INSERT INTO tbl_projects_history VALUES(22, 105, NULL, 2007, 'Le but de ce projet est d\'optimiser la partie commande d’un robot 5 axes. La nouvelle commande construite à l\'aide de plusieurs microcontrôleurs permet de contrôler 2 axes simultanément et de ce fait de tracer des diagonales avec le bras.', 'Das Ziel dieses Projektes ist, die Steuerung eines Roboters mit 5 Achsen zu optimieren. Die neue Steuerung wird mit Hilfe mehrerer Mikrokontroller ausgeführt. Dabei sollen zwei Achsen simultan kontrolliert werden, um eine Diagonale mit dem Arm zu ziehen.', NULL, 101, 2);
INSERT INTO tbl_projects_history VALUES(23, 4, NULL, 2009, 'But de la réalisation : Créer et modifier des partitions musicales de direction. Partager les partitions avec les musiciens en fonctions de leur instrument.', 'Direktions-Musikstücke (zum Dirigieren) kreieren und ändern. Aufteilung der Kompositionen auf die den Instrumenten entsprechenden Musikregister/Musikanten.', NULL, 4, 3);
INSERT INTO tbl_projects_history VALUES(24, 104, NULL, 2007, 'Au cours de notre 3ème année, nous devons mettre en œuvre un réseau à plusieurs automates. Ce réseau comprend 4 bus de terrain différents : UNITELWAY, ASI, MODBUS et ETHERNET. Grâce au logiciel INTOUCH, présent sur trois ordinateurs, nous pouvons visualiser les différents processus présents.', 'Im Laufe unseres dritten Jahres mussten wir ein Netzwerk von verschiedenen Automaten aufbauen. Dieser Netzwerk hat vier verschiedenen Busse: UNITELWAY, ASI, MODBUS und ETHERNET. In Bezug auf die Software INTOUCH, welche auf drei PCs ist, können wir die verschiedenen Prozesse darstellen.', NULL, 100, 1);
INSERT INTO tbl_projects_history VALUES(25, 30, NULL, 2006, 'L\'automatisation d\'une cha&amp;icirc;ne de montage &amp;eacute;tait &amp;agrave; r&amp;eacute;aliser. A l\'aide d\'un automate industriel et du langage de programmation GRAFCET, les fonctions principales de cette installation ont &amp;eacute;t&amp;eacute; r&amp;eacute;alis&amp;eacute;es. Au niveau de la visualisation et de la commande &amp;agrave; distance, le choix s\'est port&amp;eacute; sur un &amp;eacute;cran tactile (touch panel).', 'Die Automation einer Montageanlage war zu realisieren. Mit Hilfe eines industriellen Automaten und der Programmiersprache GRAFCET wurden die Hauptfunktionen dieser Installation verwirklicht. Für die Visualisation und die Fernbedienung wurde ein Touchscreen verwendet.', NULL, 143, 1);
INSERT INTO tbl_projects_history VALUES(26, 81, NULL, 2008, 'Réalisation de la commande électrique par automate/PC ou régulateur électronique d\'un chauffage au sol. Réalisation, montage et mise en service du coffret électrique.', 'Herstellung einer elektrischen Steuerung mittels Automatik/PX oder eines elektronischen Reglers für eine Bodenheizung. Ausführung, Montage und Inbetriebnahme des elektrischen Gehäuses.', NULL, 80, 1);
INSERT INTO tbl_projects_history VALUES(27, 39, NULL, 2009, 'Le but de ce projet est de configurer un serveur de messagerie pour une PME. Ce serveur de messagerie est capable d\'envoyer et de reçevoir des messages en local et vers Internet. L\'infrastructure est sécurisée par un Firewall. La résolution des DNS est réalisée en externe.', 'Ziel dieses Projektes ist es, einen E-Mail-Server für einen mittelständischen Betrieb zu konfigurieren. Dieser Server muss in der Lage sein, Mitteilungen vor Ort und über Internet zu senden und zu empfangen. Das Ganze muss mit einer Firewall gesichert werden. Die DNS-Auflösung muss extern erfolgen.', NULL, 38, 3);
INSERT INTO tbl_projects_history VALUES(28, 42, NULL, 2009, 'Le projet est un compte-tour pour automobile. Il indique le nombre de tours qu\'effectue le moteur d\'une voiture par minute. On peut y régler la zone rouge du moteur. Inclus dans ce projet, il y a également un générateur d\'étincelle (bougie du moteur). Il produit une étincelle à une distance de 1 à 2 [cm].', 'Das Projekt beinhaltet einen Tourenzähler für Autos. Er zählt demnach die Motorendrehzahl eines Autos. Gleichzeitig kann die kritische/rote Zone des Motors eingestellt werden. In meinem Projekt hat es ebenfalls einen Funken-Generator, der einen Funken von 1 bis 2 cm erzeugt.', NULL, 41, 2);
INSERT INTO tbl_projects_history VALUES(29, 68, NULL, 2008, 'Avant le début de ce projet, un travail très important avait déjà été réalisé par l\'apprenti durant son temps libre. La console réalisée durant ce projet permet l\'affichage d\'animations 2D et 3D. Elle possède un générateur de trame VGA-RGB de 50 images par seconde de 32k couleurs.  Dans cette console, plusieurs processeurs de signaux (DSP) se partagent la gestion des tâches.', 'Vor Beginn dieses Projektes wurde vom Lehrling bereits eine gehörige Vorbereitungszeit während seiner Freizeit geleistet. Die während dieses Projektes entstandene Konsole ermöglicht die Anzeige von zwei- und dreidimensionalen Animationen. Sie verfügt über einen VGB-RGB-Schnittstellen-Generator von 50 Bildern pro Sekunde zu 32k Farben. In dieser Konsole teilen sich mehrere Signalprozessoren die Aufgabenverwaltung.', NULL, 67, 2);
INSERT INTO tbl_projects_history VALUES(30, 21, NULL, 2009, 'Le but de ce projet est de réaliser une console de jeu avec une interface utilisateur complète. Il y a la possibilité de sauvegarder sa progression, ainsi que d\'enregistrer jusqu\'à 7 scores. Un module son a également été ajouté et permet de gérer des mélodies et des sons. L\'animation contenue dans la console est un jeu de plateforme :  un personnage traverse les différents niveaux de gauche à droite sans tomber dans les trous et en évitant les ennemis.', 'Ziel dieses Projektes ist es, eine Spielkonsole mit einer vollständigen Benutzeroberfläche zu errichten. Weiter besteht die Möglichkeit, die erzielten Fortschritte und bis zu sieben Resultate zu speichern. Ein Sound-Modul wurde ebenfalls integriert, was die Verwaltung von Melodien und Tönen ermöglicht. Das in der Konsole enthaltene Spiel ist ein Plattform-Spiel: eine Figur durchquert die verschiedenen Stufen von rechts nach links, ohne in die Löcher zu fallen und den Feinden zu begegnen.', NULL, 21, 2);
INSERT INTO tbl_projects_history VALUES(31, 94, NULL, 2007, 'Le Contrôleur vocal permet de commander son ordinateur grâce à la voix, en minimisant l\'utilisation du clavier et de la souris pour effectuer les actions les plus courantes. - Navigation dans le menu démarrer - Ouverture de programmes divers - Sauvegarde de fichiers - Ouverture de documents - Autres fonctions courantes ...', 'Der Stimmen-Kontroller erlaubt die Steuerung des Computers durch die Stimme, indem die Eingaben von der Tastatur und der PC-Maus minimiert wird, um kürzeste Aktionen auszuführen.  - Navigation im Start-Menus - Verschiedene Programme öffnen - Dateien speichern - Dateien öffnen - Andere geläufige Aktionen ...', NULL, 92, 3);
INSERT INTO tbl_projects_history VALUES(32, 100, NULL, 2007, 'Ce prototype « DTC médicable » doit dérouler, tendre et couper en deux un câble. Une fois le câble sectionné en deux longueurs égales il doit être rembobiné. Ces câbles auront un usage médical. Cette installation est réalisée pour un client externe. ', 'Dieser Prototyp DTC medikabel (Medizin-Kabel) soll ein Kabel abrollen, spannen und in zwei gleich lange Teile schneiden. Danach soll zurückgespult werden. Diese Kabel werden für medizinische Zwecke verwendet. Das Projekt wurde für einen externen Kunden fertig gestellt.', NULL, 96, 1);
INSERT INTO tbl_projects_history VALUES(33, 15, NULL, 2009, 'Cet enregistreur de donn&amp;eacute;es peut m&amp;eacute;moriser environ 5000 valeurs mesur&amp;eacute;es entre 0 et 5 Volts. A l\\\'aide de deux palpeurs on peut r&amp;eacute;gler manuellement le temps entre deux meusures. Avec un ordinateur, les valeurs m&amp;eacute;moris&amp;eacute;es peuvent &amp;agrave; tout temps &amp;ecirc;tre repr&amp;eacute;sent&amp;eacute;es sur ordinateur.', 'Dieser Datalogger kann insgesamt 5000 Messungen speichern, welche jeweils zwischen 0 und 5 Volt sind. Mit zwei Tastern kann man die Zeit zwischen zwei Messungen manuell einstellen. Die gespeicherten Messungen kann man mit Hilfe eines PC wiedergeben.', NULL, 15, 2);
INSERT INTO tbl_projects_history VALUES(34, 16, NULL, 2009, 'Ce projet consiste en la conception d\'un simulateur des différents démarrages d\'un moteur à courant alternatif. On doit pouvoir choisir sur un écran tactile les différents types de démarrage : 1. Démarrage directe 2. Démarrage étoile-triangle 3. Démarrage électronique doux 4. Démarrage à l\'aide d\'un convertisseur de fréquences', 'Dieses Projekt soll die verschiedenen Startmöglichkeiten eines Wechselstrom-Motors aufzeigen und simulieren. Man kann die verschiedenen Möglichkeiten auf einem Touchscreen auswählen. Die verschiedenen Startmöglichkeiten sind:  1.      Direkt-/Schnellstart 2.      Stern-Dreieck-Start 3.      elektronischer Softstart  4.      Start mit einem Frequenzwandler', NULL, 16, 1);
INSERT INTO tbl_projects_history VALUES(35, 13, NULL, 2009, 'Le projet \"Démonstrateur Solaire\" illustre de manière visuelle les différentes étapes entre la source d\'énergie de la Terre, le Soleil, et notre énergie courante, l\'électricité. A l\'aide d\'une cellule photovoltaïque, plus communément appelée panneau solaire, le rayonnement solaire sera transformé en électricité. Cette électricité sera stockée dans une batterie pour pouvoir être utilisée ultérieurement. Le consommateur est ici représenté par un moteur. Ce montage pourra soit fonctionner de manière entièrement autonome ou soit être alimenté par un projecteur qui simule le rayonnement solaire.', 'Der Solar-Nachweiser hat zur Aufgabe, auf bildhafte Weise die verschiedenen Stufen zwischen der Energiequelle unseres Planeten, der Sonne, und unserer alltäglichen Energiequelle, dem elektrischen Strom, aufzuzeigen. Mittels einer Photovoltatik-Zelle, allgemein bekannt als Sonnenkollektor, wird die Sonnenstrahlung in elektrischen Strom umgewandelt. Der erzeugte Strom wird in einer Batterie gespeichert werden, um später für den Antrieb eines Motors genutzt werden zu können. Diese Einrichtung wird entweder als selbständige, unabhängige Einzellösung funktionieren oder über eine Speisung ans Netz (230VAC).', NULL, 13, 2);
INSERT INTO tbl_projects_history VALUES(36, 103, NULL, 2007, 'L\'objectif de ce projet est de réaliser un détecteur de fumée avec une sirène intégrée. Les détecteurs d\'incendie à cellule photoélectrique sont composés d\'une chambre optique, d\'une diode électroluminescente et d\'une cellule photoélectrique. ', 'Das Ziel dieses Projektes ist, einen Rauchdetektor mit einer integrierten Sirene zu realisieren. Die Fotozellen-Branddetektoren sind aus einer optischen Kammer, einer elektroluminiszierenden Diode und einer Fotozelle zusammengesetzt.', NULL, 99, 2);
INSERT INTO tbl_projects_history VALUES(37, 92, NULL, 2007, 'L\'objectif de ce projet est de développer un jeu en ligne au tour par tour. Ce projet est composé de deux volets.  D\'une part, il y a une base de données qui grâce à php est pilotée par l\'utilisateur. Sur la page d\'accueil php, on peut se connecter, gérer les utilisateurs, les joueurs ainsi que les parties. On peut jouer plusieurs parties en même temps. Le déroulement du jeu ainsi que les règles sont gérés par php. D\'autre part, nous avons réalisé une carte dynamique en flash. Avec cette carte, vous pouvez visualiser les unités en votre possession et donner vos différents ordres (attaque, support, ...). Flash et php doivent évidemment communiquer pour que le projet fonctionne de manière cohérente.', 'Das Ziel unseres Projektes ist ein Rundenbasiertes Online Spiel zu programmieren. Als Vorlage dient das Brettspiel Diplomacy. Dieses Projekt ist in 2 Teilbereiche eingeteilt. Zum einen hat es eine Datenbank welche mittels PHP mit dem Enduser verbunden ist. Auf der PHP Homepage kann man sich einloggen und Benutzer, Spieler sowie Spiele erstellen. Man kann an mehreren Spielpartien gleichzeitig teilnehmen. Die Wahl welches Spiel das aktiv sein soll, ist simpel. Per PHP Code ist der gesamte Spielablauf geregelt (Abläufe wie „Einheiten hinzufügen“, “flüchten“, “Regeln anwenden“ usw). Zu geeigneten Zeitpunkten wird ein Flash- Spielkarte(2. Teilbereich) eingebunden. Auf dieser Karte können dann die Einheiten welche im eigenen Besitz sind zu Aktionen  wie „Position halten“, “Angreifen“ oder „Unterstützen“ verleiten. (Jedoch kann pro Einheit nur eine Aktion ausgeführt werden).  PHP und Flash haben miteinander zu kommunizieren.   ', NULL, 90, 3);
INSERT INTO tbl_projects_history VALUES(38, 74, NULL, 2008, 'Le but de ce projet est d\'automatiser un ancien distributeur de friandises. Un écran tactile est intégré sur l\'appareil et permet de sélectionner le produit désiré. ', 'Ziel dieses Projektes ist es, einen älteren Verteiler zu automatisieren. Ein Touch-Screen ist im Verteiler integriert, um ein Produkt zu bestellen.', NULL, 73, 1);
INSERT INTO tbl_projects_history VALUES(39, 74, NULL, 2009, 'Dans le cadre de mon année passerelle au sein de l\'Ecole des Métiers, j\'ai la tâche d\'améliorer le distributeur automatique de la salle des maîtres. Au préalable, d\'autres apprentis avaient remis à neuf ce distributeur des années 80. Lors de ce travail, j\'ai deux buts principaux. Le premier consiste en l\'attribution d\'une application permettant au distributeur de rendre la monnaie. Ce distributeur est une carte de visite de l\'EMVs. C\'est pourquoi mon deuxième objectif est d\'affecter à ce distributeur son rôle de témoin du savoir et du savoir faire qui se transmettent des professeurs aux élèves de générations en générations à l\'Ecole des Métiers du Valais.', 'Im Rahmen meines Passerelle-Jahres an der EMVs habe ich den Auftrag Schokoautomaten des Lehrerzimmers zu verbessern. Im Vorfeld hatten bereits frühere Lehrlinge den Automaten aus den 80er Jahren erneuert. In dieser Arbeit verfolge ich zwei Hauptziele: Als erstes möchte ich den Automaten mit einer Münz-Rückvergütung ausrüsten. Dieser Automat ist zudem eine Visitenkarte der EMVs. Deshalb besteht mein zweites Ziel darin, in diesem Automaten einen Zeitzeugen für das Wissen und Know-how darzustellen, welches von den Lehrern an die Lehrlinge der EMVs von einer Generation an die andere weitervermittelt wird.', NULL, 7, 1);
INSERT INTO tbl_projects_history VALUES(40, 75, NULL, 2008, 'L\'objectif de cette installation est de gérer une installation de gonflage de bouteilles de plongée, ceci à l\'aide d\'un écran tactile et d\'un automate. L\'installation est accessible aux clients selon un horaire prédéfini et chaque utilisateur possède un compte avec un mot de passe personnel. Le fournisseur de service, Monsieur Pellicano, peut accéder à toutes sortes de données, comme le temps de fonctionnement du compresseur, l\'état des comptes clients ainsi que les erreurs en cas de défaut de fonctionnement.', 'Ziel dieser Installation ist es, das Füllen von Taucherflaschen mittels eines Touch-Screens und einer SPS (fr. API) zu automatisieren. Die Installation ist zu bestimmten Zeiten offen und jeder Kunde besitzt ein Konto mit persönlichem Passwort. Der Besitzer, Herr Pellicano, hat Zugriff auf alle Daten wie Laufzeit des Kompressors, den Kontenstand der Kunden sowie auf die Fehler im Falle einer Fehlfunktion.', NULL, 74, 1);
INSERT INTO tbl_projects_history VALUES(41, 5, NULL, 2009, 'Ce projet permet de commander des infrastructures, telles que des lampes, des stores, des appareils électriques, des alarmes, etc... . Tout cette commande automatisée, présente de plus en plus dans les foyers, s’appelle la domotique. En résumé, il s’agit de l’ensemble des technologies informatiques et électroniques qui assurent des fonctions de sécurité (alarmes, accès), de confort (stores, lampes, chauffage) dans un bâtiment.', 'Dieses Projekt ermöglicht die Lenkung von Infrastruktur wie z.B. Lampen, Storen, elektrische Geräte, Alarmanlagen, usw… Diese automatische Lenkung, länger je mehr in Haushalten zur Anwendung kommend, nennt sich Domotik. Allgemein meint man damit die Gesamtheit aller computergesteuerten und elektronischen Technologien, welche im Sicherheitsbereich (Alarme) und beim Komfort (Storen, Lampen, ...) zur Anwendung kommen. ', NULL, 5, 3);
INSERT INTO tbl_projects_history VALUES(42, 27, NULL, 2009, 'Le but de projet &amp;eacute;tait de r&amp;eacute;aliser un logiciel d\'&amp;eacute;chec en 3D avec lequel on joue contre l\'ordinateur sur un &amp;eacute;chiquier en 3D.', 'Das Ziel war es ein Programm zu schreiben in welchem man Schach auf einem 3D Feld spielt und dabei gegen einen Computer antretet.', NULL, 27, 3);
INSERT INTO tbl_projects_history VALUES(43, 55, NULL, 2008, 'Les élèves informaticiens de deuxième année ont réalisé un jeu de Memory interactif. Une partie se déroule en trois manches, le but étant de retrouver toutes les paires en un minimum de temps. Ce jeu a été développée en langage JQuery avec des scripts php pour l\'enregistrement des résultats dans une base de données MySQL.', 'Die InformatikschülerInnen des 2. Jahres haben ein interaktives Memoryspiel realisiert. Ein Spiel erfolgt in drei Läufen, wobei das Ziel darin besteht, die Paare in möglichst kurzer Zeit zu finden. Dieses Spiel wurde in JQuery entwickelt mit PHP-Skripts für die Speicherung der Resultate in einer MySQL-Datenbank.', NULL, 54, 3);
INSERT INTO tbl_projects_history VALUES(44, 57, NULL, 2008, 'Ce projet est destiné à alimenter un jeu réalisé dans une console portative qui fonctionne sous 5V-DC. A l\'aide de deux piles de 1.5 [V] un montage électronique transforme le 3 Volt continu en 5 Volt continu.', 'Dieses Projekt besteht in der Energiezufuhr eines auf einer Tragkonsole entstandenen Spiels. Mit Hilfe zweier 1.5Volt-Batterien wandelt eine Elektronik 3-Volt Gleichstrom in 5-Volt Gleichstrom um.', NULL, 56, 2);
INSERT INTO tbl_projects_history VALUES(45, 84, NULL, 2008, 'Ce projet consiste en un jeu réalisé par la programmation d\'un microprocesseur et intégré dans une console portative. Cette dernière utilise un écran de type Oled. Shoot\'em up est un jeu de tir ou l\'on élimine des ennemis (littéralement tire et avance). ', 'Dieses Projekt besteht darin, dass ein durch Programmierung eines Mikroprozessors entstandenes Spiel in einer tragbaren Konsole integriert ist. Diese benutzt einen Bildschirm des Typs Oled. Shoot\'em up ist ein Schiess-Spiel und durch Beseitigung der Feinde schreitet man voran.', NULL, 82, 2);
INSERT INTO tbl_projects_history VALUES(46, 40, NULL, 2009, 'Collection de jeux informatiques réalisés durant les modules pratiques. Ces jeux ont été réalisés en C++ et en Java.', 'Sammlung von elektronischen Spielen, welche während den praktischen Modulen entwickelt wurden. Diese Spiele wurden in C++ und in Java realisiert.', NULL, 39, 3);
INSERT INTO tbl_projects_history VALUES(48, 49, NULL, 2008, 'Monter un réseau dans lequel les serveurs virtuels seront sauvegardés quotidiennement sur un serveur de backup. Cela permettra en cas de panne du serveur ESX Starter principal de redémarrer le tout sur un autre serveur en un temps minimum pour permettre la réparation de celui-ci. ', 'Ein Netzwerk errichten, auf dem virtuelle Server täglich auf einem Backup-Server gesichert werden. Im Falle einer Panne des ESX Starter Servers wird so die Möglichkeit geboten, in kürzester Zeit alles auf einem anderen Server aufzustarten, um die Reparatur des defekten Servers zu ermöglichen.', NULL, 48, 3);
INSERT INTO tbl_projects_history VALUES(49, 6, NULL, 2009, 'Réalisation d\'une étiqueteuse sur la base d\'une machine existante qui a été rénovée et mise à niveau. Cette étiqueteuse était en service à l\'usine CIBA-GEIGY de Monthey et sera  utilisée pour former les futurs apprentis de l\'école des métiers.', 'Das Projekt besteht darin, einen Etikettendrucker vollumfänglich in der Schule zu renovieren und auf einen höheren Stand zu bringen. Diese Maschine war bei der CIBA-GEIGY in Monthey im Einsatz und wird für die Ausbildung der künftigen Lehrlinge der EMVs benutzt werden.', NULL, 6, 1);
INSERT INTO tbl_projects_history VALUES(50, 96, NULL, 2007, 'Durant ce projet nous avons remis en fonction un ancien four électrique qui a été équipé d’une installation de régulation moderne. 
Ce four peut être régulé en 3 modes : Manuel, Semi-automatique ou Automatique. Nous avons d’abord fait fonctionner l’installation en réalisant les parties manquantes du câblage puis avons du programmer l’affichage des courbes qui nous permettent d’avoir une information visuelle de l’évolution de la température et par là de nous rendre compte des différences de qualité de régulation des 3 modes.', 'Für dieses Projekt müssen wir einen alten Elektro-Ofen wieder funktionsfähig machen, welcher dadurch mit einer modernen Regulation ausgestattet wird. Dieser Ofen kann in drei Einstellungenmoden reguliert werden: Manuell, halbautomatisch, automatisch. Wir haben zuerst die Installation wieder funktionsfähig gemacht, indem wir die fehlenden Verkabelungen/Teile eingebaut haben, dann haben wir die Anzeige der verschiedenen Kurven programmiert, welche uns eine Visualisierung der Temperatur(-kurve) dastellte. Dies hat uns dann schlussendlich die verschiedenen Qualitäten für die drei Einstellungensmoden aufgezeigt.', NULL, 94, 1);
INSERT INTO tbl_projects_history VALUES(51, 17, NULL, 2009, 'Réalisation d\'une maquette pour l\'EMVs et programmation de feux de signalisation d\'un carrefour. Celui-ci est composé d\'un total de 8  (2 x 4) colonnes de feux pour les voitures et 4 colonnes pour les piétons. Le but principal est de garantir un trafic le plus fluide possible même avec une circulation dense. Le carrefour est composé d\'une route principale et d\'une route secondaire.', 'Bau eines Modells für die EMVs und Programmierung einer Lichtsignalanlage für eine Kreuzung. Diese besteht gesamthaft aus 8 Lichtsignalreihen für Autos (2 x 4) und 4 für Fussgänger. Hauptziel ist die Sicherung eines möglichst fliessenden Verkehrs auch bei grossem Verkehrsaufkommen. Die Kreuzung wird aus einer Haupt- und einer Nebenstrasse bestehen.', NULL, 17, 1);
INSERT INTO tbl_projects_history VALUES(52, 18, NULL, 2009, 'Remise à neuf complète de la partie électromécanique d’un filtre à bourbe pour l’entreprise Valélectric Farner SA à St-Pierre-de-Clages. La machine datant de plus de 18 ans, il a fallu reprendre complètement le principe d’automation en intégrant un écran tactile et une commande programmable. Le câblage et la motorisation ont du être remis à neuf Le projet a été finalisé pour les vendanges 2009.', 'Gänzliche Erneuerung des elektromechanischen Teils eines Schlammfilters der Firma Valélectric Farner SA in St-Pierre-de-Clages. Aufgrund des Alters der 18-jährigen Maschine war es notwendig, das Automatisations-Prinzip neu zu konzipieren unter Einbezug eines Touchscreens und einer programmierbaren  Steuerung. Die Verkabelung und der Antrieb mussten rundum erneuert werden. Das Projekt wurde für die Weinlese 2009 zum Abschluss gebracht.', NULL, 18, 1);
INSERT INTO tbl_projects_history VALUES(53, 112, NULL, 2007, 'Le GEKO se compose d\'une plaque en matière plastique, sur laquelle toutes les parties mécaniques sont placées. Le mouvement des jambes est effectué par cylindres pneumatique situé sur la face inférieure du GEKO. A l\'aide des ventouses, le GEKO se tient sur toutes les surfaces polies et les vitres.', 'Der GEKO besteht aus einer Kunststoffträgerplatte, an der alle mechanischen Teile angebracht sind. Die Bewegung der Beine erfolgt durch Pneumatikzylinder an der Unterseite des GEKO. Durch die Saugnäpfe findet der GEKO Halt an glatten Oberflächen und Fensterscheiben.', NULL, 108, 1);
INSERT INTO tbl_projects_history VALUES(54, 91, NULL, 2007, 'Réaliser  une horloge basée sur un real time clock. A l’heure de chaque inter-cours l’horloge envoie sur une liaison bifilaire (4 à 20 mA) un signal de start . Ce signal produit l’activation d’un gong. Le son délivré par le gong doit être stocké sur une carte mémoire SD standard. ', 'Realisierung einer Uhr, basierend auf einer Real-Time-Uhr. Zu jeder Pausen-Zeit soll die Uhr ein Start-Signal durch eine zweidrähtige Leitung (4 bis 20mA) senden. Dieses Signal produziert die Aktivierung eines Gongs. Der Ton des Gongs muss auf einer Standard-SD-Memory-Karte gespeichert sein.', NULL, 89, 2);
INSERT INTO tbl_projects_history VALUES(55, 61, NULL, 2008, 'Appareil portatif qui permet de mémoriser des itinéraires à l\'aide d\'un récepteur GPS. -Connexion avec un PC. -Utilisation d\'un microcontrôleur de type PIC18F2450', 'Traggerät, welches die Speicherung von Wegstrecken mit Hilfe eines satellitengesteuerten Empfängers ermöglicht. - Verbindung mit einem PC - Benutzung eines Mikrocontrollers des Typs PIC18F2450', NULL, 60, 2);
INSERT INTO tbl_projects_history VALUES(56, 37, NULL, 2009, 'Le circuit GPS loggger doit enregistrer les positions GPS provenant d\'un capteur externe sur port série. Le système possède un écran LCD pour régler la fréquence d\'échatillonage des positions. Le circuit doit posséder sa propre alimentation pour une autonomie de 48h en enregistrement.  Les points GPS pourront par la suite être visulaisés sur le logiciel GOOGLE EARTH.', 'Der Navigationslogger-Schaltkreis muss die GPS-Positionen speichern, welche aus einem externen Sensor stammen. Das System verfügt über einen LCD-Bildschirm, um die Auswahl-Frequenz der Positionen zur regulieren. Der Schaltkreis muss über eine Eigenspeisung verfügen, um eine autonome Aufnahmezeit von 48 Stunden zu gewährleisten. Die GPS-Standorte können anschliessend via GOOGLE EARTH gesichtet werden.', NULL, 37, 2);
INSERT INTO tbl_projects_history VALUES(57, 106, NULL, 2007, 'Le but de ce projet est de construire une horloge hélicoïdale. Une horloge utilisant ce principe a déjà été créée à l’EMVs, la différence est que la nouvelle horloge fonctionne sur un plan vertical au lieu d’un plan horizontal. ', 'Das Ziel dieses Projektes ist, eine Drehuhr zu realisieren. Eine Uhr nach diesem Prinzip wurde bereits an der EMVs konstruiert. Der Unterschied zur bestehenden Uhr ist, dass die neue Uhr in vertikaler statt in horizontaler Dreh-Richtung funktioniert.', NULL, 102, 2);
INSERT INTO tbl_projects_history VALUES(58, 85, NULL, 2007, 'Notre projet est inspiré de la technique \"domotique\". Il s\'agit d\'un ensemble de techniques électroniques visant à commander à distance, grâce au Wireless, différentes installations dans la maison. Nous pouvons par exemple commander un store, une lampe, un ventilateur depuis un PC. Ce projet améliore l’habitat. Tout est centralisé. Ce qui est plus facile pour les personnes qui ont de la peine à se déplacer.', 'Unsere Project basiert auf der Technologie der Haus Automatisierung“. Haus Automatisierung ist eine Gesamtheit von elektronischen Techniken, damit können wir verschiedene Elemente kontrollieren. Wir können zum Beispiel ein Lampe oder Rollläden vom PC aus steuern. Haus Automatisierung verbessert das Leben im Haus. Behinderte Personen z.B. können dann leichter im Haus leben.', NULL, 83, 3);
INSERT INTO tbl_projects_history VALUES(59, 14, NULL, 2009, 'Il s\'agit d\'une carte électronique composée d\'une matrice de LEDs 8x8 en rotation sur elle-même à la vitesse de 25 tours par seconde. Cette vitesse permet de tromper l\'œil humain qui voit des formes en 3 dimensions. On peut donc afficher plusieurs formes tels que des sphères, des cônes...', 'Es handelt sich hierbei um eine elektronische Karte bestehend aus einer LEDs 8x8 Matrix, welche sich mit einer Geschwindigkeit von 25 Umdrehungen in der Minute um die eigene Achse dreht. Diese Geschwindigkeit erlaubt es, das menschliche Auge zu täuschen, welches Formen in 3D sieht. Damit können mehrere verschiedene Formen angezeigt werden wie Raumkörper, Kegel, usw.', NULL, 14, 2);
INSERT INTO tbl_projects_history VALUES(60, 36, NULL, 2009, 'Un inclinomètre est un instrument de mesure qui permet de connaître précisément l’angle d’une pente.  Un capteur composé de plusieurs accéléromètres communique avec un processeur. La sortie du capteur est interprétée et affichée à l\'écran.  L\'écran utilise la technologie O-Led (organique-Led), elle offre une meilleure qualité de vision et consomme beaucoup moins d’énergie. ', 'Ein Neigungsmesser ist ein Messinstrument, das den genauen Winkel einer geneigten Bahn berechnet. Ein aus mehreren Beschleunigungsmessern bestehender Messfühler kommuniziert mit einem Prozessor. Der Ausgang des Sensors wird auf dem Bildschirm dargestellt. Der Bildschirm läuft mittels O-LED-Technologie, welche eine bessere Sichtqualität bietet und bedeutend weniger Energie verbraucht.', NULL, 36, 2);
INSERT INTO tbl_projects_history VALUES(61, 54, NULL, 2008, 'Programmation d\'un jeux du pendu en C++. Il s\'agit d\'un jeux de logique classique. Il consiste à deviner, en un minimum de coups, un mot choisi par l\'ordinateur. Pour ce faire, le joueur propose des lettres l\'alphabet. Le mot apparaît petit à petit par les lettres choisies et figurant dans celui-ci.', 'Programmierung des Gehängten-Spiels in C++. Es handelt sich um ein klassisches Logikspiel und besteht darin, in möglichst wenigen Versuchen ein vom PC gewähltes Wort herauszufinden. Dabei schlägt der Spieler verschiedene Buchstaben vor. Das gesuchte Wort erscheint allmählich mittels der gewählten und im Wort vorkommenden Buchstaben.', NULL, 53, 3);
INSERT INTO tbl_projects_history VALUES(62, 109, NULL, 2007, 'L\'objectif de ce projet est d\'inventorier le réseau informatique au niveau ordinateur, serveur, portable et de présenter le résultat dans une page web avec le choix des champs que l\'on veut afficher ou imprimer.', 'Das Ziel dieses Projektes ist, das Inventar eines Informatiknetzwerkes (Computer, Server, Laptop) aufzunehmen und das Resultat in Form einer Internetseite zu präsentieren. Auf der Internetseite können die gewünschten Rubriken ausgewählt werden, welche angezeigt oder ausgedruckt werden sollen.', NULL, 105, 3);
INSERT INTO tbl_projects_history VALUES(63, 22, NULL, 2009, 'Luft Guitar Hero permet de jouer de la guitare de manière virtuelle. L\'utilisateur est filmé par une caméra et porté à l\'écran. En bougeant la main, la guitare sera activée et de la musique pourra être produite. Il est également possible de faire retentir des sons différents en levant et baissant la main gauche qui plaque les accords. Nous avons essayé d\'imiter une guitare avec un maximum de réalisme. On peut choisir entre une guitare accoustique et électrique. Bon plaisir, M. Luft Guitar Hero! Let\'s rock. ', 'Luft Guitar Hero ist ein Spiel in dem man eine virtuelle Gitarre spielen kann. Der Benutzer wird von einer Kamera gefilmt und auf der Leinwand dargestellt. Durch Handbewegung wird die Gitarre angeschlagen und so kann Musik erzeugt werden.  Es können auch verschiedene Töne erzeugt werden in dem man die Griffhand (linke Hand) auf und ab bewegt. Wir haben versucht, eine möglichst realistische Gitarre nachzustellen. Es kann zwischen einer akustischen und einer elektrischen Gitarre gewählt werden.  Viel Spass als Luft Guitar Hero!  Let’s Rock', NULL, 22, 3);
INSERT INTO tbl_projects_history VALUES(64, 88, NULL, 2007, 'L\'objectif de ce projet était de moderniseron une ancienne machine à café professionnelle. La machine a été montée sur un châssis industriel en profils aluminium. Elle a été équipée de la technologie Bluetooth pour assurer son pilotage. La machine comporte 4 microprocesseurs qui communiquent entre eux à l\'aide d\'un bus de terrain I2C.', 'Ziel dieses Projektes ist es, eine professionelle Kaffee-Maschine zu modernisieren. Die Maschine wurde in eine, industrielle Alu-Gehäuse aufgebaut. Sie wurde mit Bluetooth-Technologie ausgestattet, um deren Steuerung sicherszustellen. Die Maschine besitzt vier Prozessoren, welche durch einen I2C-BUS verbunden sind.', NULL, 86, 2);
INSERT INTO tbl_projects_history VALUES(65, 80, NULL, 2008, 'L\'objectif de ce projet est de montrer les possibilités de piloter une maquette de train par un automate programmable au travers d\'un écran d\'exploitation. Pour des raisons de place, cette maquette est réalisée sur deux étages avec un ascenseur pour permettre au train de changer de niveau.', 'Mit diesem Projekt wollen wir eine Modelleisenbahn mit Hilfe eines programmierbaren Automaten, welcher mittels eines Bildschirmes geregelt wird, steuern. Aus Platzgründen wird die Modelleisenbahn auf zwei Etagen ausgeführt. Mittels eines Aufzuges kann der Zug von der einen auf die andere Ebene wechseln.', NULL, 79, 1);
INSERT INTO tbl_projects_history VALUES(66, 2, NULL, 2009, 'Il s\'agit d\'une gestion de questionnaires à choix multiples pour console Nintendo DS. Il est décomposé en deux applications : Une application en java permettant de créer des questionnaires, d\'y ajouter ou modifier des questions. Cette application sert également de serveur de questionnaires pour les Nintendo DS se trouvant à proximité. Une application développée en C et tournant sur la Nintendo DS qui se connecte par Wifi au serveur de questionnaire, permet de choisir un questionnaire, puis affiche les questions correspondantes. A la fin du questionnaire, un résumé est affiché indiquant le nombre de réponses correctes.', 'Dieses Projekt verwaltet Multiple-Choice-Fragebögen für das Nintendo DS. Es ist aufgeteilt in zwei Anwendungsmöglichkeiten: 1. Eine Java-Anwendung mit der Möglichkeit, Fragebögen zu erstellen, Fragen hinzuzufügen bzw. zu ändern. Diese Anwendung dient ebenfalls als Fragebogen-Server für in der Nähe befindliche Nintendo DS-Geräte. 2. Eine in C entwickelte und auf Nintendo DS laufende Anwendung. Diese verbindet sich via WLAN mit dem Fragebogen-Server, ermöglicht die Auswahl eines Fragebogens und zeigt die entsprechenden Fragen an. Am Ende des Fragebogens wird eine Zusammenfassung mit Angabe der Anzahl richtiger Antworten angezeigt.', NULL, 2, 3);
INSERT INTO tbl_projects_history VALUES(67, 33, NULL, 2009, 'Il s\'agit d\'un montage de diodes lumineuses (LEDs) et de capteurs de proximité. Il a pour but de démontrer le mélange des couleurs primaires pour réaliser tout le spectre lumineux.', 'Dieses Projekt beinhaltet eine Montage mit LED-Lampen und Näherungs-Fühlern. Es hat zum Ziel, die Mischung der Grundfarben aufzuzeigen, um so die gesamte Lichtbandbreite zu verwirklichen.', NULL, 33, 2);
INSERT INTO tbl_projects_history VALUES(68, 63, NULL, 2008, 'Le but de ce projet est de réaliser un automate modulable simple. L’automate comprendra une partie centrale fixe et des cartes périphériques modulables. Il s\'agissait de construire une première version avec des liaisons par port numérique, puis une deuxième version avec des liaisons par bus I2C', 'Ziel dieses Projektes ist der Bau eines einfachen modulierbaren Automaten. Der Automat besteht aus einem fixen Zentralteil und modulierbaren Peripherie-Karten. Es galt eine erste Version mit Verbindungen über den digitalen Port, dann eine zweite Version mit Verbindungen über I2C-Bus zu erstellen.', NULL, 62, 2);
INSERT INTO tbl_projects_history VALUES(69, 107, NULL, 2007, 'L\'apprenti  a construit un variateur de lumière numérique 2 canaux. Cet appareil permet de gérer des durées d\'enclenchement programmées et d\'effectuer des mixages de lumière.', 'Der Lehrling hat einen numerischen Zweikanal-Lichtregler konstruiert. Mit diesem Gerät kann die Einschaltdauer programmiert werden sowie Licht gemixt werden.', NULL, 103, 2);
INSERT INTO tbl_projects_history VALUES(70, 48, NULL, 2008, 'Montgol-Math est une application pour la console portable Nintendo DS. Le but du jeu est de ratraper avec un bateau des montgolfières qui tombent, mais pas toutes ! L\'élève doit analyser des calculs qui se situent au dessus des montgolfières pour ne ratraper que ceux qui sont correctes (équations).  L\'avantage d\'avoir développé ce jeu sur la Nintendo DS étant que les enfants assimilent plus facilement le côté jeu.', 'Montgol-Math ist eine Anwendung für die Tragkonsole Nintendo DS. Ziel des Spiels ist es, mit einem Schiff herunterfallende Heissluftballone aufzufangen, aber nicht alle! Der Schüler muss Rechnungen lösen, die sich oberhalb der Ballone befinden, und nur die richtigen auffangen (Gleichungen). Der Vorteil, dieses Spiel auf dem Nintendo DS entwickelt zu haben, liegt darin, dass die Kinder die spielerische Seite leichter verinnerlichen.', NULL, 47, 3);
INSERT INTO tbl_projects_history VALUES(71, 45, NULL, 2008, 'L\'EMVs désire une gestion evoluée du serveur ISA - Gestion de la bande passante internet avec gestion des quotas - Analyse des logs du firewall - Centralisation de l\'Antivirus avec Antivir.', 'Die EMVs wünscht sich eine gut entwickelte Verwaltung des ISA-Servers - Verwaltung der Internet-Bandbreite mittels Quotas -Analyse der Logdateien der Firewall -Zentralisierung des Antivirus mit Antivir', NULL, 44, 3);
INSERT INTO tbl_projects_history VALUES(72, 86, NULL, 2007, 'L\'objectif de ce projet est de projeter en direct sur un mur les images de plusieurs Webcams. Pour cela, toutes les images sont intégrées dans une interface web développée pour ce projet. Dans un deuxième temps, cette interface sera modifiée pour la rendre accessible par les utilisateurs via un site web.', 'Ziel ist es, mit Webcams Live-Bilder via Beamer an eine Wand zu projizieren. Dazu werden alle Bilder in ein Interface (webbasiert, selbst programmiert) eingebunden. Im zweiten Schritt wird ein Interface erstellt, dass von allen Usern als Informations-Website genutzt werden kann.', NULL, 84, 3);
INSERT INTO tbl_projects_history VALUES(73, 64, NULL, 2008, 'Lors du premier semestre un prototype hardware a été créé. Dans cette suite de projet les problèmes hardwares mis en évidence par le premier prototype ont été réglés. La partie software a été restructurée, recrée. Un petit jeu de type Mario a été implémenté pour prouver la viabilité de la solution choisie', 'Während des ersten Semesters wurde ein Hardware-Prototyp kreiert. In der Fortsetzung dieses Projektes wurden die offenkundigen Hardware-Probleme des Prototypen beseitigt. Der Software-Teil wurde neu strukturiert, entwickelt. Ein kleines Spiel nach dem Muster Mario wurde eingebaut, um die Ausführbarkeit der gewählten Lösung zu beweisen.', NULL, 63, 2);
INSERT INTO tbl_projects_history VALUES(74, 51, NULL, 2008, 'Lelouch est un programme écrit en Java permettant de jouer aux échecs en monoposte ou en réseau. L\'interface est issue du package Swing. L\'environnement du programme est fenêtré afin de laisser l\'utilisateur organiser l\'affichage comme il le souhaite. Il est possible de changer l\'apparence de l\'échiquier et de communiquer par messagerie instantanée entre joueurs.', 'Lelouch ist ein in Java verfasstes Programm, welches das Schachspielen alleine oder vernetzt ermöglicht. Die Benutzeroberfläche stammt aus dem Swing-Package. Die Spielumgebung ist in Fenstern angeordnet, damit der Benutzer die Darstellung  seinem Wunsch entsprechend einstellen kann. Es ist möglich, die Darstellung des Schachbrettes zu wechseln und zwischen mehreren Spielern über Chat zu kommunizieren.', NULL, 50, 3);
INSERT INTO tbl_projects_history VALUES(75, 28, NULL, 2009, 'Le but de ce projet était  de distribuer des fichiers depuis le PC de l\'enseignant simultanément vers tous les PC de la salle de classe. Le temps pour copier un fichier vers 1 PC ou vers tous les PC de la classe sera le même car on utilise la méthode de transfert Multicast.', 'Mit einem Multicast, können Dateien an mehrere PC’s gesendet werden ohne dass die Übertragungsgeschwindigkeit reduziert wird. Auf den Empfänger-PC’s läuft durchgehend ein Service, welcher darauf wartet, dass die Sender-Applikation Pakete sendet. In der Sender-Applikation, kann der Ordner ausgewählt werden, welchen man versenden möchte. Zusätzlich können die Empfänger-PC’s gewählt werden, auf welche man die Dateien senden will. Auf den Empfänger-PC‘s werden unter dem Ordner C:Temp die Dateien empfangen. ', NULL, 28, 3);
INSERT INTO tbl_projects_history VALUES(76, 46, NULL, 2008, 'My shop management est un site en ligne crée en PHP. Les clients peuvent passer des commandes à l\'entreprise de vente. Ils peuvent également revoir leurs anciens achats. Les employés de l\'entreprise peuvent: - gérer les catégories, - gérer les produits, - gérer les employés.', 'My shop management ist eine in PHP erstellte Seite. Die Kunden können dem Verkaufsbetrieb ihre Bestellungen übermitteln. Sie können ebenfalls ihre früheren Käufe anschauen. Die Betriebsangestellten können: - die Kategorien verwalten, - die Produkte verwalten, - die Angestellten managen.', NULL, 45, 3);
INSERT INTO tbl_projects_history VALUES(77, 62, NULL, 2008, 'L\'EMVs organise des stages pour les élèves des C.O. Afin de leur faire goûter aux joies de l\'électronique, nous devions leurs proposer un montage motivant, réalisable et d\'un prix de revient de moins de 25.-.', 'Die EMVs organisiert Kurse für OS-SchülerInnen. Um ihnen die Begeisterung für die Elektronik näherzubringen, sollten wir ihnen einen motivierenden und machbaren Aufbau zu einem Höchstpreis von weniger als Fr. 25.- vorschlagen. ', NULL, 61, 2);
INSERT INTO tbl_projects_history VALUES(78, 69, NULL, 2008, 'Réalisé en partenariat avec l\'EPFL, il permet de visualiser les neutrinos du capteur IceCube situé au pôle Sud. IceCube 3D LED MATRIX est un affichage en 3 dimensions. -Résolution d\'affichage de 192 points. -Connexion avec un PC. -Utilisation d\'un microcontrôleur de type PIC18F4550. ', 'In Zusammenarbeit mit der ETH Lausanne (EPFL), ermöglicht dieses Projekt, die Neutrinos des Messfühlers/Sensors IceCube am Südpol darzustellen. IceCube 3D ist eine dreidimensionale Anzeige.  -Anzeigenauflösung von 192 Punkten -Verbindung mit einem PC -Benutzung eines Mikrocontrollers vom Typ PIC18F4550.', NULL, 68, 2);
INSERT INTO tbl_projects_history VALUES(79, 58, NULL, 2008, 'Réalisé en partenariat avec l\'EPFL, il permet de visualiser les neutrinos du capteur IceCube situé au pôle Sud. IceCube 3D est un affichage en 3 dimensions. -Affichage 3D réalisé en faisant tourner un matrice à LED 2D à l\'aide d\'un moteur. -Utilisation d\'un microcontrôleur de type PIC18F458. ', 'In Zusammenarbeit mit der ETH Lausanne (EPFL), ermöglicht dieses Projekt, die Neutrinos des Messfühlers/Sensors IceCube am Südpol darzustellen. IceCube 3D ist eine dreidimensionale Anzeige. Sie erfolgt, indem eine LED 2D-Matrize mit Hilfe eines Motors zum Laufen/Drehen gebracht wird.  -Benutzung eines Mikrocontrollers des Typs PIC18F458 ', NULL, 57, 2);
INSERT INTO tbl_projects_history VALUES(80, 111, NULL, 2007, 'L\'objectif de ce projet est de fabriquer un système permettant la lecture des codes d\'erreur des voitures modernes selon la norme ODB2.', 'Das Ziel dieses Projektes ist, ein System zu entwickeln, welches den Fehlercode von modernen Autos gemäss der Norm ODB2 ausliest.', NULL, 107, 2);
INSERT INTO tbl_projects_history VALUES(81, 56, NULL, 2008, 'Il s\'agit d\'une enceinte active portative équipée d\'un récepteur FM ainsi que d\'une entrée mini-jack permettant d\'y connecter n\'importe quel baladeur.', 'Es handelt sich hierbei um eine tragbare Lautsprecheranlage, ausgerüstet mit einem Radio-Empfänger und einem Minijack-Eingang, an den mobile Musikwiedergabegeräte jeglicher Art angeschlossen werden können.', NULL, 55, 2);
INSERT INTO tbl_projects_history VALUES(82, 29, NULL, 2009, 'Le but de ce projet était d\'évaluer différentes possibilités de gérer des panneaux d\'affichage informatiques. Ces panneaux permettront de diffuser des informations dans le bâtiment de l\'EMVs', 'Gesucht wird eine Lösung für ein News-Anzeige-System.  Dieses soll in der dem Gebäude der EMVs zum Einsatz kommen können.  Das ganze soll digital und möglichst einfach zu bedienen sein. Dazu wird eine bereits existierende Software verwendet,  die auf einem Mini PC mit Windows XP läuft. ', NULL, 29, 3);
INSERT INTO tbl_projects_history VALUES(83, 71, NULL, 2008, 'Nous avons eu pour but de programmer un jeux de fléchettes affichant la cible au-dessus du projecteur et qui analyse à l\'aide d\'une webcam, où la fléchette à touché la cible. Celle-ci sera probablement divisée en quatre parties pour éviter les problèmes éventuels dus à l\'éclairage. Avec plusieurs essais on va marquer les touches de chaque fléchette et additionner les points. Le projet sera réalisé avec Visual Basic 2005. De plus, il devrait finalement être possible de dresser un classement. ', 'Wir haben uns zum Ziel gesetzt, ein Dartspiel zu programmieren, welches die Scheibe über den Beamer anzeigt und per Webcam überprüft, wo der Pfeil getroffen hat. Die Scheibe wird voraussichtlich in 4 Teile eingeteilt, da es sonst zu Problemen mit Lichtverhältnissen kommen kann. Zudem wird bei mehreren Versuchen aufgezeichnet, wo die Pfeile eingesteckt waren, und zählt die Punkte zusammen. Das Projekt wird mit Visual Basic 2005 realisiert. Zusätzlich sollte es später möglich sein eine Rangliste zu erstellen. ', NULL, 70, 3);
INSERT INTO tbl_projects_history VALUES(84, 10, NULL, 2009, 'En salle de mécanique, nous voulons régler les vitesses des perceuses à colonnes. Pour cela nous avons installé un convertisseur de fréquences. Avec l\'aide du convertisseur de fréquences on pourra régler chaque plage de vitesses. Un affichage permet de visualiser la vitesse en cours.', 'Im Mechanik Raum müssen die Bohrmaschinen geschwindigkeits Regelbar sein. Dazu werden Frequenzumrichter eingebaut.  Durch das einsetzen von Frequenzumrichtern ist die stufenlose einstellung der Geschwindigkeit möglich Danach werden die Bohrmaschinen stufenlos geschwindigkeits einstellbar sein. Und eine Anzeige wird die geschwindigkeit anzeigen. ', NULL, 10, 1);
INSERT INTO tbl_projects_history VALUES(85, 78, NULL, 2008, 'Le pèse farine est un projet installé dans la boulangerie Pellet à St-Léonard. Ce système permet au boulanger de gagner un temps considérable. L’utilisateur peut noter le nombre de pains, de croissants, ou autre qu’il désire et l’automate calcule et libère le poids de farine dont le boulanger à besoin.', 'Die Mehl-Waage ist ein Projekt, welches in der Bäckerei Pellet in St. Léonard installiert ist. Dieses System bringt dem Bäcker einen ansehnlichen Zeitgewinn. Der Benutzer kann die gewünschte Anzahl Brote, Gipfel oder anderer Produkte eingeben und der Automat berechnet auf Grund dieser Angaben das erforderliche Mehl, welches anschliessend ausgegeben wird.', NULL, 77, 1);
INSERT INTO tbl_projects_history VALUES(86, 98, NULL, 2007, 'Le but visé par ce projet est l\'automatisation de différentes fonctions d\'une piscine. Jusqu\'à présent mon client, M.Margelisch, devait actionner manuellement son installation. Pour changer cela, un écran tactile et un API a été installé pour gérer la filtration, les buses, les jets ainsi que l\'arrosage des abords de la piscine.', 'Das angestrebte Ziel dieses Projektes ist es, verschiedenen Funktionen eines Schwimmbades zu automatisieren. Bis jetzt musste unser Kunde, Herr Margelisch, seine Schwimmbadinsallation manuell bedienen. Um das zu ändern wurde ein Touch-Screen und eine SPS (fr. API) installiert, um die Filterung, die Rohre, die Wasser-Würfe und die Berieselung des Schwimmbadzugangs zu verwalten.', NULL, 95, 1);
INSERT INTO tbl_projects_history VALUES(88, 31, NULL, 2009, 'Dans une installation de lavage à rouleaux pour voitures, il faut automatiser la porte d\'entrée et de sortie du local. Une liaison entre l\'automate actuel et le nouvel automate est mis en place et toute la partie électromécanique sera remplacée. La nouvelle installation sera pilotée à l\'aide d\'un écran de processus.', 'In einer Auto-Waschanlage sollen das Eingangs- und Ausgangstor des Lokals automatisiert werden. Eine Verbindung zwischen dem gegenwärtigen und dem neuen Automaten wird installiert und der gesamte elektromechanische Teil wird ersetzt. Die neue Installation wird mittels eines Prozessdisplays gesteuert werden.', NULL, 31, 1);
INSERT INTO tbl_projects_history VALUES(89, 95, NULL, 2007, 'Notre projet consiste en l\'automatisation d\'un poulailler. Ce poulailler se trouve à Veyras (Sierre) chez notre client. Nous devons développer un système intelligent de comptage des poules ainsi qu\'une ouverture et fermeture automatisée du poulailler.', 'Unsere Aufgabe ist es einen Hühnerstall zu automatisieren. Der Hühnerstall befindet sich in Veyras (Siders) bei einem Kunden. Wir müssen ein intelligentes System für eine “Hühnerzählung” entwickeln. Die Stalltüre muss automatisch geöffnet und geschlossen werden.', NULL, 93, 1);
INSERT INTO tbl_projects_history VALUES(90, 60, NULL, 2008, 'Il s\'agit d\'une carte son évoluée, composée de plusieurs microcontrôleurs dsPIC. -Mémoire FLASH pour stocker les échantillons. -Bande passante de 11025[Hz]. -Quantification de 16bits en mono. -Utilisation de microcontrôleurs de type dsPIC30F6010A', 'Es handelt sich um eine fortschrittliche Soundkarte, bestehend aus mehreren dsPIC-Mikrocontollern. - FLASH-Speicher, um Muster aufzubewahren - Bandbreite von 11025 Hz - Quantisierung von 16 Bits in Mono -Benutzung von Mikrocontrollern des Typs dsPIC30F6010A              ', NULL, 59, 2);
INSERT INTO tbl_projects_history VALUES(91, 73, NULL, 2008, 'Ce projet consiste en la réalisation et l\'automatisation d\'un lanceur de puck pour permettre aux gardiens de hockey de s\'entraîner de manière autonome. L\'utilisateur pourra choisir différentes séquences d\'entraînement et différents paramètres en fonction de ses désirs.', 'Dieses Projekt besteht in der Erstellung und Automation eines Puck-Abschussgerätes, damit Hockey-Torhüter selbständig trainieren können. Der Benutzer kann verschiedene Trainingssequenzen und verschiedene Parameter, gemäss seinen Wünschen, einstellen.', NULL, 72, 1);
INSERT INTO tbl_projects_history VALUES(92, 89, NULL, 2007, 'Le robot R2D2, développé à l\'EMVs, ne possédait pas, jusqu\'à présent, un software robuste. L\'objectif de ce projet est d\'implémenter un logiciel de démonstration fiable pour le robot R2D2 . Le deuxième objectif est de rendre R2D2 plus \"humain\" en lui rajoutant des réactions humaines (clignement des yeux, etc…)', 'Der Roboter RD2D, an der EMVs entwickelt, besass bis jetzt keine robuste Software. Ziel dieses Projektes ist es, eine verlässliche Software zur Demonstration des Roboters R2D2 zu implementieren. Das zweite Ziel dieses Projektes ist, R2D2 menschlicher zu machen, ihm menschliche Reaktionen (Blinzeln der Augen etc.) hinzuzufügen.', NULL, 87, 2);
INSERT INTO tbl_projects_history VALUES(93, 23, NULL, 2009, 'Le but de ce projet était de comprendre les fonctionnement d\'un serveur RADIUS et de configurer un point d\'accès Wifi. Les utilisateurs voulant accéder au Wifi doivent s\'authentifier auprès du serveur RADIUS. Dès qu\'ils seront authentifiés, ils pourront utiliser l\'accès (Internet) fournis par le Wifi.', 'Mithilfe eines RADIUS-Servers kann mittels verschiedenen Filtern bestimmt werden, ob ein Benutzer auf ein WLAN zugreifen kann oder nicht. Solche Filter sind beispielsweise ein MAC-Filter oder eine Authentifikation mit einem Username und einem Passwort. RADIUS wird verwendet, um die Sicherheit eines WLANs zu erhöhen und sicherzustellen. Mit einem guten Passwort und entsprechender Verschlüsselung ist ein WLAN relativ gut geschützt gegen Unbefugte.', NULL, 23, 3);
INSERT INTO tbl_projects_history VALUES(94, 20, NULL, 2009, 'Ce projet consiste à concevoir et monter une carte didactique qui explique  le fonctionnement d\'un  régulateur PID branché sur un couplage moteur-génératrice. Ce montage est entièrement analogique.  Si l\'on met une charge sur la génératrice ou qu\'on la freine physiquement, celle-ci va ralentir et la tension de sortie va baisser.  Le but de ce régulateur est de remédier à cet écart de tension en comparant la tension de la génératrice à la tension souhaité et de corriger l\'erreur.', 'Dieses Projekt hat zum Ziel eine Lehrkarte zu entwickeln und zu erstellen, welche die Arbeitsweise eines PID-Regulators aufzeigt, der an eine Motor-Generator-Koppelung angeschlossen ist. Die Montage erfolgt vollumfänglich analog. Wird der Generator unter Strom gestellt oder physisch gebremst, so wird dieser sich verlangsamen und die Ausgangsspannung wird sinken. Aufgabe des Regulators ist es, diesem Spannungsunterschied entgegenzuwirken, indem die Generator-Spannung mit der gewünschten Spannung verglichen wird und der fehlerhafte Unterschied korrigiert wird.', NULL, 20, 2);
INSERT INTO tbl_projects_history VALUES(95, 65, NULL, 2008, 'Première mise en service d\'un robot industriel. Démonstration des possibilités de l\'engin en mode manuel.', 'Erste Inbetriebnahme eines industriellen Roboters. Demonstration der Möglichkeiten des Gerätes im manuellen Modus.', NULL, 64, 1);
INSERT INTO tbl_projects_history VALUES(97, 90, NULL, 2007, 'Le but de ce projet est de développer une nouvelle plateforme robotique. La partie mécanique utilise un module à chenilles. Le robot est constitué d\'une carte de pilotage des moteurs connectée par RS232 à un PC embarqué. L\'utilisation d\'un PC embarqué facilitera les projets futurs en offrant une puissance de calcul et une facilité de programmation. ', 'Ziel dieses Projektes ist es, eine neue Roboter-Platform zu entwickeln. Die mechanische Seite besteht aus einem Raupen-Modul. Der Roboter besitzt eine Steuerungs-Karte für Motoren, welche via RS232 an einen Standart-PC angeschlossen ist. Die Benutzung eines Standard-PCs hat den Vorteil für zukünftige Projekte, dass die Rechner-Leistung und die Programmierung erleichtert wird.', NULL, 88, 2);
INSERT INTO tbl_projects_history VALUES(99, 70, NULL, 2008, 'A l\'aide d\'une webcam, la taille d\'une personne peut être mesurée et le résultat est affiché.', 'Mittels einer Webcam wird die Grösse einer Person gemessen und das Resultat angezeigt.', NULL, 69, 3);
INSERT INTO tbl_projects_history VALUES(100, 93, NULL, 2007, 'Ce projet consiste en un site web lié à une base de données. Ce site doit permettre la gestion de l\'agenda d\'une école. Ainsi les élèves peuvent consulter les horaires des classes ainsi que des dates importantes pour l\'école.', 'In unserem Projekt erstellen wir eine Internetseite verknüpft mit einer Datenbank. Diese Seite dient dazu Schüler, Klassen und Stundenpläne zu verwalten oder auch um wichtige Termine in den Kalender einzutragen.', NULL, 91, 3);
INSERT INTO tbl_projects_history VALUES(101, 26, NULL, 2009, 'Le but du projet était d\'analyser des données audio. L\'utilisateur a la possibilité de comparer sa prestation vocale à une référence informatique. Le logiciel analyse le son et dit si ce son ressemble à la référence informatique.', 'In dem Projekt geht es darum, Audiodateien zu analysieren. Dem Benutzer ist es möglich seine Stimme aufzunehem. Danach werden die seine Frequenzen angezeigt.', NULL, 26, 3);
INSERT INTO tbl_projects_history VALUES(102, 8, NULL, 2009, 'Le but de ce projet est de montrer les possibilités de piloter une maquette de train par un automate programmable au travers d\'un écran d\'exploitation. Pour des raisons de place, cette maquette sera réalisée sur deux étages avec un ascenseur pour permettre au train de changer de niveau.', 'Mit diesem Projekt wollen wir eine Modelleisenbahn mit Hilfe eines programmierbaren Automaten, welcher mittels eines Bildschirmes geregelt wird, steuern. Aus Platzgründen wird die Modelleisenbahn auf zwei Etagen ausgeführt. Mittels eines Aufzuges kann der Zug von der einen auf die andere Ebene wechseln.', NULL, 8, 1);
INSERT INTO tbl_projects_history VALUES(103, 79, NULL, 2008, 'L’objectif est de commander une station de lavage de voiture. La maquette peut être commandée soit automatiquement, soit manuellement, à l’aide d’un joystick. Un écran tactile sera aussi connecté afin de choisir les différents paramètres et séquences de nettoyage.', 'Das Ziel besteht darin, eine Wagenwaschanlage zu simulieren. Das Modell kann entweder automatisch oder von Hand mit Hilfe eines Joysticks gesteuert werden. Ein Tastbildschirm wird angeschlossen, um unterschiedliche Parameter und Reinigungssequenzen zu wählen.', NULL, 78, 1);
INSERT INTO tbl_projects_history VALUES(105, 9, NULL, 2009, 'Cette station météo consiste à récupérer des mesures extérieures de températures, vitesse du vent, capteur de pluie etc... dans l\'optique de pouvoir exploiter ces données (par ex.: écran tactile, site officiel de l\'emvs...) la panoplie de capteurs est placée à l\'extérieur, au delà de la passerelle côté sud à proximité de la salle 219. Un coffret est posé à l\'intérieur avec une visualisation des données par écran tactile.', 'Diese Wetterstation soll Aussentemperatur-, Wind- und Regenmengemessungen usw. sammeln, damit diese Daten in der Folge genutzt werden können (z.B. Touchscreen, Webseite der EMVs). Das dazu notwendige Rüstzeug wird draussen installiert und zwar oberhalb des südlichen Laufsteges in der Nähe des Zimmers 219. Im Innern wird ein Gehäuse installiert mit Visualisierung der Daten über Touchscreen.', NULL, 9, 1);
INSERT INTO tbl_projects_history VALUES(106, 101, NULL, 2007, 'L\'objectif de ce projet est de réaliser un circuit électronique qui gère la durée d’utilisation d\'un appareil électrique. Avec ce système, les parents peuvent contrôler le temps que leurs enfants passent devant la télévision, la console de jeux, l\'ordinateur ou autres appareils électriques.', 'Das Ziel dieses Projektes ist, eine elektronische Schaltung zu realisieren, welche die Benutzungsdauer eines Elektrogerätes überwacht. Mit diesem System können Eltern die Zeit kontrollieren, welche ihre Kinder am Fernseher, der Spielkonsole, dem Computer oder anderen Elektrogeräten verbringt.', NULL, 97, 2);
INSERT INTO tbl_projects_history VALUES(107, 102, NULL, 2007, 'L\'objectif de ce projet est de réaliser un jeu de mémoire électronique en se basant sur le jeu des années 80, Le Simon. Le Super Simon est composé de 4 modes de jeu et comporte 6 touches de sélection.', 'Ziel dieses Projektes ist es, das elektronisches Gedächtnisspiel Le Simon der achtziger Jahre nachzubilden. Mit sechs Tasten können die vier möglichen Spielarten ausgeführt werden.', NULL, 98, 2);
INSERT INTO tbl_projects_history VALUES(108, 53, NULL, 2008, 'Swoop Racer est un jeu où il s\'agit de parcourir le plus vite possible une distance. Le joueur doit éviter des obstacles et attraper des cases turbo. Le jeu a été développé en C# et DirectX.', 'Swoop Racer ist ein Spiel, in welchem es darum geht, eine Strecke so schnell wie möglich zu absolvieren. Dabei muss der Spieler Hindernissen ausweichen und Turbofelder erwischen. Entwickelt wurde es mittels Programmiersprache C# und DirectX.', NULL, 52, 3);
INSERT INTO tbl_projects_history VALUES(109, 82, NULL, 2008, 'Le but de ce projet est d\'automatiser une table tournante. Cette installation a été livrée pratiquement complètement montée, mais j\'ai dû rajouter un poste qui reconnaît la couleur. Pour le premier poste, il y a un capteur capacitif qui détecte si la pièce est présente ou non. Si c\'est le cas, la table tourne au poste suivant qui reconnaît la couleur pour déterminer les étapes suivantes du processus. Les autres étapes sont le bon positionnement, le ponçage et l\'éjection des pièces. La commande se fait au travers d\'un écran tactile et peut être sélectionné en Manuel ou Automatique.', 'Das Ziel dieses Projektes ist es, eine Bearbeitungsstation zu realisieren. Die Station wurde montiert und verkabelt geliefert, aber ich habe mich dazu entschieden noch zusätzlich einen Posten zur Farberkennung beizufügen. Am Anfang der Station ist ein kapazitiver Sensor, der erkennt, ob ein Stück vorhanden ist oder nicht. Wenn ein Stück vorhanden ist, geht es zum nächsten Posten, der die Farbe  erkennt und so den späteren Prozessablauf für jedes Stück bestimmt. Die weiteren Posten sind Prüfstelle, Schleifstelle und der Auswurf. Die Steuerung soll mit einem Touch-Screen realisiert werden und man kann zwischen Manuell und Automatisch wählen.', NULL, 81, 1);
INSERT INTO tbl_projects_history VALUES(111, 52, NULL, 2008, 'TambourLine est und logiciel de notation pour les tambours suisses. Par une surface graphique intuitive, des notes, pauses, signes de dynamique, les genres de mesure ainsi que tous les autres symboles du jeux de tambour suisse peuvent être combinés à une marche ou une composition. En plus, le logiciel permet d\'écouter la composition en la jouant, de la mémoriser/enregistrer et de l\'imprimer. ', 'TambourLine ist eine Notationssoftware für Schweizer Tambouren. Über eine intuitiv gestaltete grafische Oberfläche lassen sich Noten, Pausen, Dynamikzeichen, Taktarten sowie alle sonstigen Zeichen des Schweizer Trommelspiels zu einem Marsch oder einer Komposition zusammensetzen. Darüber hinaus kann die Software das Stück vorspielen, speichern und drucken.', NULL, 51, 3);
INSERT INTO tbl_projects_history VALUES(112, 47, NULL, 2008, 'Il s\'agit d\'une application web qui permet la traduction de différents mots techniques apparentés aux différents métiers enseignés dans cette école. Il a été réalisé en PHP 5 lié à une base de données MySql.  Il permet l\'ajout de nouvelles langues ainsi que de nouvelles traductions, tout cela dans une interface intuitive.', 'Es handelt sich hierbei um ein Webanwendung, welche die Übersetzung verschiedener Fachausdrücke ermöglicht, die einander in den verschiedenen an dieser Schule gelehrten Berufe ähneln. Sie wurde in PHPausgeführt, gekoppelt an eine MySql-Datenbank.                                                          Es ermöglicht das Hinzufügen neuer Sprachen und neuer Übersetzungen, all dies mit automatischer Worterkennung. ', NULL, 46, 3);
INSERT INTO tbl_projects_history VALUES(113, 72, NULL, 2008, 'L\'automatisation d\'une chaîne de montage était à réaliser. A l\'aide d\'un automate industriel et du langage de programmation GRAFCET, les fonctions principales de cette installation ont été réalisées. Au niveau de la visualisation et de la commande à distance, le choix s\'est porté sur un touch panel (écran)', 'Die Automation einer Montageanlage war zu realisieren. Mit Hilfe eines industriellen Automaten und der Programmiersprache GRAFCET wurden die Hauptfunktionen dieser Installation verwirklicht. Für die Visualisation und die Fernbedienung wurde ein Touchscreen verwendet.', NULL, 71, 1);
INSERT INTO tbl_projects_history VALUES(114, 67, NULL, 2008, 'Interfaçage d\'une caméra CMOS sur un PC via une liaison USB. -Caméra CMOS (résolution VGA) connectée à un microcontrôleur dsPIC. -Liaison vers le PC à l\'aide d\'un chip FTDI(FT245B). -Programme PC réalisé avec Borland C++.', 'Verbindung einer CMOS-Kamera auf einen PC via USB. - CMOS-Kamera (VGA-Auflösung) an einen dsPIC-Mikocontroller angeschlossen. - Verbindung zum PC mittels eines Chips FTDI(FT245B) -PC-Programm entwickelt mit Borland C++.', NULL, 66, 2);
INSERT INTO tbl_projects_history VALUES(115, 59, NULL, 2008, 'Vélo équipé d\'un moteur et d\'un lot de batteries Gel-plomb. Le but de ce projet est de poursuivre et améliorer les développements effectués l\'année précédente. La puissance fournie au moteur est adaptée à la vitesse de rotation du pédalier ', 'Ein mit Motor und Gelplomp-Batteriensatz ausgerüstetes Fahrrad. Ziel des Projektes ist es, die letztjährigen Entwicklungen weiterzuführen und zu verbessern. Die dem Motor gelieferte Leistung wird der Rotationsgeschwindigkeit des Treters angepasst.', NULL, 58, 2);
INSERT INTO tbl_projects_history VALUES(116, 25, NULL, 2009, 'Le but de ce projet était de comparer différentes logiciels de virtualisation d\'applications. La virtualisation d\'applications permet de ne plus installer directement les applications localement. Il fallait comparer Xenocode et Vmware ThinApp. Il fallait déterminer des critères de comparaison et définir les test à effectuer. Une conlusion devait permettre de choisir le logiciel le plus adapté.  ', 'Ziel war es diverse Applikationen zu  vergleichen. Konkret handelte es sich  um die zwei Programme \'xenocode\' und  \'VMware ThinApp\'. Ziel war es am Schluss  keine Programme mehr lokal installieren  zu müssen. Es wurde anhand einer +/- - Tabelle   entschieden werden, welche Software sich  eigenen würde in die Umgebung der EMVs  einzubinden. Diese Liste/Tabelle wurde in  folgende Kriterien eingeteilt: Einfachheit  der Installation, Einfachheit der  Konfiguration, Preis, Handhabung, Performance, ...', NULL, 25, 3);
INSERT INTO tbl_projects_history VALUES(117, 24, NULL, 2009, 'Le but de ce projet était de comprendre le fonctionnement et d\'installer des équipements pour utiliser de la téléphonie sur Internet (VoIP). Il fallait pouvoir utiliser des téléphones standards et de télépphones connecés sur un Point d\'accès ZyXEL.', 'Ziel des Projektes war es ein VoIP Netzwerk zu erstellen, indem es möglich ist untereinander zu telefonieren und auch über das Festnetz nach aussen telefonieren mit Hilfe des ZyXEL AccesPoints.', NULL, 24, 3);
INSERT INTO tbl_projects_history VALUES(118, 110, NULL, 2007, 'L\'objectif de ce projet est de scanner automatiquement un dossier pour présenter sur internet ses fichiers et d\'y ajouter des annotations automatiques en 2 langues même si un fichier a été ajouté, modifié ou supprimé.', 'Ziel dieses Projektes ist es, automatisch ein Verzeichnis/Ordner zu scannen, um dann auf dem Internet dessen Dateien anzuzeigen und ihm in zwei Sprachen automatisch weitere Informationen anzufügen.', NULL, 106, 3);
INSERT INTO tbl_projects_history VALUES(119, 87, NULL, 2007, 'L’objectif de ce projet est tout d’abord de fournir un système de sécurité fiable, qui ne coûte pas cher et qui est facilement implémentable dans tous types d’endroit où un ordinateur relié à internet est disponible. Pour ce faire nous avons décidé de mettre en place un système de surveillance vidéo.', 'Ziel dieses Projektes ist es, ein verlässliches Sicherheits-/Überwachungs-System zu erstellen, welches nicht viel kostet und welches einfach in jedem Raum/Ort - wo es einen Computer mit Internetanschkuss hat - zu installieren. Um all das zu kreieren, haben wir uns für ein Video-Überwchungssystem entschieden.', NULL, 85, 3);
INSERT INTO tbl_projects_history VALUES(120, 43, NULL, 2008, 'Projet servant à rechercher et à consulter des news en ligne pour des personnes aveugles ou mal-voyantes. Le site www.nouvelliste.ch a été choisi comme base pour ce projet. La navigation est entièrement réalisable par commande vocale et la lecture est effectué par voix de synthèse.', 'Projekt, das der Suche und Benutzung von Online-News für blinde oder sehbehinderte Personen dient. Die Internetseite www.nouvelliste.ch wurde für dieses Projekt als Grundlage gewählt. Das Surfen erfolgt vollumfänglich über stimmliche Steuerung und das Lesen mittels Computerstimme.', NULL, 42, 3);
INSERT INTO tbl_projects_history VALUES(121, 3, NULL, 2009, 'Wii Shoot est un jeu qui utilise plusieurs fonctionnalités de la Wiimote. Le but est de sélectionner (B) plusieurs smileys puis les valider (A) avant qu\'ils n\'atteignent le fond de l\'écran. En fonction de votre score, des murs commencerons à tomber, les toucher vous fera perdre des points et votre sélection.', 'Wii Shoot ist ein Spiel, welches mehrere Funktionsmöglichkeiten des Wiimote benutzt. Das Ziel besteht darin, mehrere Smileys auszuwählen (B) und sie dann einzusetzen (A), bevor sie das Bildschirmende erreichen. Aufgrund Ihrer Punkte werden Mauern herunterfallen. Diese zu berühren hat für Sie Punkte- und Auswahlverluste zur Folge.', NULL, 3, 3);
INSERT INTO tbl_projects_history VALUES(122, 50, NULL, 2008, 'Réalisation d\'un programme graffiti virtuel avec commande Nintendo Wii.', 'Realisierung eines virtuellen Graffitiprogramms mit Nintendo Wii Steuerung ', NULL, 49, 3);
INSERT INTO tbl_projects_history VALUES(123, 75, NULL, 2007, 'L\'objectif de cette installation est de gérer une installation de gonflage de bouteilles de plongée, ceci à l\'aide d\'un écran tactile et d\'un automate. L\'installation est accessible aux clients selon un horaire prédéfini et chaque utilisateur possède un compte avec un mot de passe personnel. Le fournisseur de service, Monsieur Pellicano, peut accéder à toutes sortes de données, comme le temps de fonctionnement du compresseur, l\'état des comptes clients ainsi que les erreurs en cas de défaut de fonctionnement.', 'Ziel dieser Installation ist es, das Füllen von Taucherflaschen mittels eines Touch-Screens und einer SPS (fr. API) zu automatisieren. Die Installation ist zu bestimmten Zeiten offen und jeder Kunde besitzt ein Konto mit persönlichem Passwort. Der Besitzer, Herr Pellicano, hat Zugriff auf alle Daten wie Laufzeit des Kompressors, den Kontenstand der Kunden sowie auf die Fehler im Falle einer Fehlfunktion.', NULL, 74, 3);
INSERT INTO tbl_projects_history VALUES(124, 77, NULL, 2006, 'Ce projet consiste en la conception d\'un simulateur des diff&amp;eacute;rents d&amp;eacute;marrages d\'un moteur &amp;agrave; courant alternatif. On doit pouvoir choisir sur un &amp;eacute;cran tactile les diff&amp;eacute;rents types de d&amp;eacute;marrage :&lt;/p&gt;
&lt;ol&gt;
&lt;li&gt;D&amp;eacute;marrage direct&lt;/li&gt;
&lt;li&gt;D&amp;eacute;marrage &amp;eacute;toile-triangle&lt;/li&gt;
&lt;li&gt;D&amp;eacute;marrage &amp;eacute;lectronique doux&lt;/li&gt;
&lt;li&gt;D&amp;eacute;marrage &amp;agrave; l\'aide d\'un convertisseur de fr&amp;eacute;quences&lt;/li&gt;
&lt;/ol&gt;
&lt;p&gt;&amp;nbsp;', 'Dieses Projekt soll die verschiedenen Startm&amp;ouml;glichkeiten eines Wechselstrom-Motors aufzeigen und simulieren. Man kann die verschiedenen M&amp;ouml;glichkeiten auf einem Touchscreen ausw&amp;auml;hlen. Die verschiedenen Startm&amp;ouml;glichkeiten sind: 1. Direkt-/Schnellstart 2. Stern-Dreieck-Start 3. elektronischer Softstart 4. Start mit einem Frequenzwandler', NULL, 144, 1);
INSERT INTO tbl_projects_history VALUES(125, 113, NULL, 2006, 'La domotique consiste &amp;agrave; automatiser diverses t&amp;acirc;ches que nous ex&amp;eacute;cutons dans une maison comme arroser le jardin, ouvrir la porte du garage, allumer les plaques, r&amp;eacute;gler le chauffage, d&amp;eacute;verrouiller la porte et encore d&amp;rsquo;autres applications. Il y a encore diff&amp;eacute;rents th&amp;egrave;mes dans la domotique tels que des syst&amp;egrave;mes d&amp;rsquo;alarme, gestion de piscine, d&amp;rsquo;arrosage, de multim&amp;eacute;dia, de chauffage, de surveillance et syst&amp;egrave;me d&amp;rsquo;&amp;eacute;clairage. Nous allons simuler la domotique dans une maison &amp;agrave; l&amp;rsquo;&amp;eacute;chelle 1:25', 'Das Ziel der Hausautomation besteht darin, verschiedene Aufgaben wie z.B. Steuerung der Storen, Öffnen der Garagentüre, die Kochplatten an und abstellen, die Heizung regeln und verschiedene weitere Anwendungen zu automatisieren.
Weitere Anwendungsgebiete sind eine Alarmanlage, Aufheizen eines Schwimmbades, Steuern der multimedialen Geräten sowie des Lichtes.
Wir simulieren einige Anwendungen in einem Haus im Massstab 1:25', NULL, 146, 1);
INSERT INTO tbl_projects_history VALUES(126, 80, NULL, 2006, 'L\'objectif de ce projet est de montrer les possibilit&amp;eacute;s de piloter une maquette de train par un automate programmable au travers d\'un &amp;eacute;cran d\'exploitation. Pour des raisons de place, cette maquette est r&amp;eacute;alis&amp;eacute;e sur deux &amp;eacute;tages avec un ascenseur pour permettre au train de changer de niveau.', 'Mit diesem Projekt wollen wir eine Modelleisenbahn mit Hilfe eines programmierbaren Automaten, welcher mittels eines Bildschirmes geregelt wird, steuern. Aus Platzgründen wird die Modelleisenbahn auf zwei Etagen ausgeführt. Mittels eines Aufzuges kann der Zug von der einen auf die andere Ebene wechseln.', NULL, 148, 1);
INSERT INTO tbl_projects_history VALUES(127, 78, NULL, 2006, 'Le p&amp;egrave;se farine est un projet install&amp;eacute; dans la boulangerie Pellet &amp;agrave; St-L&amp;eacute;onard. Ce syst&amp;egrave;me permet au boulanger de gagner un temps consid&amp;eacute;rable. L&amp;rsquo;utilisateur peut noter le nombre de pains, de croissants, ou autre qu&amp;rsquo;il d&amp;eacute;sire et l&amp;rsquo;automate calcule et lib&amp;egrave;re le poids de farine dont le boulanger &amp;agrave; besoin.', 'Die Mehl-Waage ist ein Projekt, welches in der Bäckerei Pellet in St. Léonard installiert ist. Dieses System bringt dem Bäcker einen ansehnlichen Zeitgewinn. Der Benutzer kann die gewünschte Anzahl Brote, Gipfel oder anderer Produkte eingeben und der Automat berechnet auf Grund dieser Angaben das erforderliche Mehl, welches anschliessend ausgegeben wird.', NULL, 142, 1);
INSERT INTO tbl_projects_history VALUES(128, 82, NULL, 2006, NULL, NULL, NULL, 147, 1);
INSERT INTO tbl_projects_history VALUES(129, 91, NULL, 2006, 'R&amp;eacute;aliser une horloge bas&amp;eacute;e sur un real time clock. A l&amp;rsquo;heure de chaque inter-cours l&amp;rsquo;horloge envoie sur une liaison bifilaire (4 &amp;agrave; 20 mA) un signal de start . Ce signal produit l&amp;rsquo;activation d&amp;rsquo;un gong. Le son d&amp;eacute;livr&amp;eacute; par le gong doit &amp;ecirc;tre stock&amp;eacute; sur une carte m&amp;eacute;moire SD standard.', 'Realisierung einer Uhr, basierend auf einer Real-Time-Uhr. Zu jeder Pausen-Zeit soll die Uhr ein Start-Signal durch eine zweidrähtige Leitung (4 bis 20mA) senden. Dieses Signal produziert die Aktivierung eines Gongs. Der Ton des Gongs muss auf einer Standard-SD-Memory-Karte gespeichert sein.', NULL, 135, 2);
INSERT INTO tbl_projects_history VALUES(130, 56, NULL, 2006, 'Il s\'agit d\'une enceinte active portative &amp;eacute;quip&amp;eacute;e d\'un r&amp;eacute;cepteur FM ainsi que d\'une entr&amp;eacute;e mini-jack permettant d\'y connecter n\'importe quel baladeur.', 'Es handelt sich hierbei um eine tragbare Lautsprecheranlage, ausgerüstet mit einem Radio-Empfänger und einem Minijack-Eingang, an den mobile Musikwiedergabegeräte jeglicher Art angeschlossen werden können.', NULL, 134, 2);
INSERT INTO tbl_projects_history VALUES(131, 105, NULL, 2006, 'Le but de ce projet est d\'optimiser la partie commande d&amp;rsquo;un robot 5 axes. La nouvelle commande construite &amp;agrave; l\'aide de plusieurs microcontr&amp;ocirc;leurs permet de contr&amp;ocirc;ler 2 axes simultan&amp;eacute;ment et de ce fait de tracer des diagonales avec le bras.', 'Das Ziel dieses Projektes ist, die Steuerung eines Roboters mit 5 Achsen zu optimieren. Die neue Steuerung wird mit Hilfe mehrerer Mikrokontroller ausgeführt. Dabei sollen zwei Achsen simultan kontrolliert werden, um eine Diagonale mit dem Arm zu ziehen.', NULL, 137, 2);
INSERT INTO tbl_projects_history VALUES(132, 114, NULL, 2006, 'Le travail de ce projet consiste &amp;agrave; r&amp;eacute;aliser une matrice de 8 x 96 leds. Cette matrice est constitu&amp;eacute;e de 12 modules identiques de 8 x 8 leds. Ces 12 modules sont connect&amp;eacute;s au microcontr&amp;ocirc;leur central par l&amp;rsquo;interm&amp;eacute;diaire d&amp;rsquo;une liaison I2C. Benjamin s&amp;rsquo;est occup&amp;eacute; du d&amp;eacute;veloppement de la partie centrale ainsi que de l&amp;rsquo;algorithme d&amp;rsquo;affichage. Philipp a d&amp;eacute;velopp&amp;eacute; les modules matrice, la communication I2C ainsi que la mise en bo&amp;icirc;tier du syst&amp;egrave;me.', 'Dieses Projekt beinhaltet die Erstellung einer Matrix von 8 x 96 Leds. Diese Matrix besteht aus 12 identischen Modulen mit 8x8 Leds. Diese 12 Module sind mittels I2C mit dem zentralen Mikrokontroller verbunden.
Benjamin hat die zentrale Einheit sowie den Algorythmus für die Anzeige entwickelt.
Philipp hat die Matrizen gebaut, die Kommunikation mittels I2C sichergestellt sowie das ganze System in ein entsprechendes Gehäuse untergebracht.', NULL, 138, 2);
INSERT INTO tbl_projects_history VALUES(133, 89, NULL, 2006, 'Le robot R2D2, d&amp;eacute;velopp&amp;eacute; &amp;agrave; l\'EMVs, ne poss&amp;eacute;dait pas, jusqu\'&amp;agrave; pr&amp;eacute;sent, un software robuste. L\'objectif de ce projet est d\'impl&amp;eacute;menter un logiciel de d&amp;eacute;monstration fiable pour le robot R2D2 . Le deuxi&amp;egrave;me objectif est de rendre R2D2 plus &quot;humain&quot; en lui rajoutant des r&amp;eacute;actions humaines (clignement des yeux, etc&amp;hellip;)', 'Der Roboter RD2D, an der EMVs entwickelt, besass bis jetzt keine robuste Software. Ziel dieses Projektes ist es, eine verlässliche Software zur Demonstration des Roboters R2D2 zu implementieren. Das zweite Ziel dieses Projektes ist, R2D2 menschlicher zu machen, ihm menschliche Reaktionen (Blinzeln der Augen etc.) hinzuzufügen.', NULL, 87, 2);
INSERT INTO tbl_projects_history VALUES(135, 30, NULL, 2009, 'L\'automatisation d\'une chaîne de montage était à réaliser. A l\'aide d\'un automate industriel et du langage de programmation GRAFCET, les fonctions principales de cette installation ont été réalisées. Au niveau de la visualisation et de la commande à distance, le choix s\'est porté sur un écran tactile (touch panel).', 'Die Automation einer Montageanlage war zu realisieren. Mit Hilfe eines industriellen Automaten und der Programmiersprache GRAFCET wurden die Hauptfunktionen dieser Installation verwirklicht. Für die Visualisation und die Fernbedienung wurde ein Touchscreen verwendet.', NULL, 30, 1);
INSERT INTO tbl_projects_history VALUES(136, 72, NULL, 2006, 'L\'automatisation d\'une cha&amp;icirc;ne de montage &amp;eacute;tait &amp;agrave; r&amp;eacute;aliser. A l\'aide d\'un automate industriel et du langage de programmation GRAFCET, les fonctions principales de cette installation ont &amp;eacute;t&amp;eacute; r&amp;eacute;alis&amp;eacute;es. Au niveau de la visualisation et de la commande &amp;agrave; distance, le choix s\'est port&amp;eacute; sur un touch panel (&amp;eacute;cran)', 'Die Automation einer Montageanlage war zu realisieren. Mit Hilfe eines industriellen Automaten und der Programmiersprache GRAFCET wurden die Hauptfunktionen dieser Installation verwirklicht. Für die Visualisation und die Fernbedienung wurde ein Touchscreen verwendet.', NULL, 145, 1);
INSERT INTO tbl_projects_history VALUES(137, 95, NULL, 2006, 'Notre projet consiste en l\'automatisation d\'un poulailler. Ce poulailler se trouve &amp;agrave; Veyras (Sierre) chez notre client. Nous devons d&amp;eacute;velopper un syst&amp;egrave;me intelligent de comptage des poules ainsi qu\'une ouverture et fermeture automatis&amp;eacute;e du poulailler.', 'Unsere Aufgabe ist es einen Hühnerstall zu automatisieren. Der Hühnerstall befindet sich in Veyras (Siders) bei einem Kunden. Wir müssen ein intelligentes System für eine “Hühnerzählung” entwickeln. Die Stalltüre muss automatisch geöffnet und geschlossen werden.', NULL, 141, 1);
INSERT INTO tbl_projects_history VALUES(138, 9, NULL, 2006, 'Cette station m&amp;eacute;t&amp;eacute;o consiste &amp;agrave; r&amp;eacute;cup&amp;eacute;rer des mesures ext&amp;eacute;rieures de temp&amp;eacute;ratures, vitesse du vent, capteur de pluie etc... dans l\'optique de pouvoir exploiter ces donn&amp;eacute;es (par ex.: &amp;eacute;cran tactile, site officiel de l\'emvs...) la panoplie de capteurs est plac&amp;eacute;e &amp;agrave; l\'ext&amp;eacute;rieur, au del&amp;agrave; de la passerelle c&amp;ocirc;t&amp;eacute; sud &amp;agrave; proximit&amp;eacute; de la salle 219. Un coffret est pos&amp;eacute; &amp;agrave; l\'int&amp;eacute;rieur avec une visualisation des donn&amp;eacute;es par &amp;eacute;cran tactile.', 'Diese Wetterstation soll Aussentemperatur-, Wind- und Regenmengemessungen usw. sammeln, damit diese Daten in der Folge genutzt werden können (z.B. Touchscreen, Webseite der EMVs). Das dazu notwendige Rüstzeug wird draussen installiert und zwar oberhalb des südlichen Laufsteges in der Nähe des Zimmers 219. Im Innern wird ein Gehäuse installiert mit Visualisierung der Daten über Touchscreen.', NULL, 140, 1);
INSERT INTO tbl_projects_history VALUES(139, 88, NULL, 2006, 'L\'objectif de ce projet &amp;eacute;tait de moderniseron une ancienne machine &amp;agrave; caf&amp;eacute; professionnelle. La machine a &amp;eacute;t&amp;eacute; mont&amp;eacute;e sur un ch&amp;acirc;ssis industriel en profils aluminium. Elle a &amp;eacute;t&amp;eacute; &amp;eacute;quip&amp;eacute;e de la technologie Bluetooth pour assurer son pilotage. La machine comporte 4 microprocesseurs qui communiquent entre eux &amp;agrave; l\'aide d\'un bus de terrain I2C.', 'Ziel dieses Projektes ist es, eine professionelle Kaffee-Maschine zu modernisieren. Die Maschine wurde in eine, industrielle Alu-Gehäuse aufgebaut. Sie wurde mit Bluetooth-Technologie ausgestattet, um deren Steuerung sicherszustellen. Die Maschine besitzt vier Prozessoren, welche durch einen I2C-BUS verbunden sind.', NULL, 136, 2);
INSERT INTO tbl_projects_history VALUES(141, 115, NULL, 2006, 'La but de se projet est de comprendre le fonctionnement du syst&amp;egrave;me d&amp;rsquo;exploitation temps r&amp;eacute;el RTOS de la firme CCS. Ce micro OS est destin&amp;eacute; &amp;agrave; la famille des microcontr&amp;ocirc;leurs PIC de Microchip et se programme en langage C. Dans un premier temps, RTOS a &amp;eacute;t&amp;eacute; install&amp;eacute; sur un mini robot afin d&amp;rsquo;en &amp;eacute;tudier son fonctionnement. Puis le d&amp;eacute;veloppement d&amp;rsquo;un automate la gestion d&amp;rsquo;un syst&amp;egrave;me de chauffage a permis de mettre en &amp;eacute;vidence l&amp;rsquo;utilisation de RTOS dans un application pratique.', 'Mit diesem Projekt wollen wir das Echtheits-Betriebsystem RTOS der Firma CCS verstehen lernen. Dieses Mikro-Betriebsystem gehört zur Familie der PIC-Mikrokontroller und wird in C programmiert. Zuerst wurde RTOS auf einem Miniroboter installiert, um die Funktionsweise zu studieren. Dann wurde ein Automat entwickelt, welcher ein Heizsystem steuert. Anhand dieses Automaten konnte RTOS praktisch verwendet werden.', NULL, 139, 2);
INSERT INTO tbl_projects_history VALUES(143, 116, NULL, 2006, 'L\'objectif de notre projet &amp;eacute;tait de permettre d\'acc&amp;eacute;der &amp;agrave; Internet depuis un ordinateur portable &amp;eacute;quip&amp;eacute; d\'une carte r&amp;eacute;seau &quot;sans-fil&quot;. Pour des raisons de s&amp;eacute;curit&amp;eacute;, il &amp;eacute;tait important que chaque utilisateur soit &quot;authentifi&amp;eacute;&quot; par un nom et un mot de passe pour acc&amp;eacute;der &amp;agrave; Internet. Nous avons recherch&amp;eacute; diff&amp;eacute;rentes m&amp;eacute;thodes &quot;open source&quot; permettant d\'acc&amp;eacute;der &amp;agrave; Internet d\'une fa&amp;ccedil;on s&amp;eacute;curis&amp;eacute;e', 'Das Ziel unseres Projektes war es, einen Internetzugang für einen Laptop mit Wirelesskarte bereitzustellen.
Aus Sicherheitsgründen muss sich jeder Benutzer mit seinem Namen und seinem Passwort authentifizieren, um Zugang zum Internet zu erhalten.
Wir haben verschiedene &quot;open source&quot;-Methoden untersucht, welche diese Auflagen erfüllen sollen.', NULL, 154, 3);
INSERT INTO tbl_projects_history VALUES(144, 117, NULL, 2006, 'L\'EMVs d&amp;eacute;sire permettre &amp;agrave; ses enseignants d\'acc&amp;eacute;der depuis n\'importe quel endroit aux supports de cours et &amp;agrave; la messagerie. Il existe diff&amp;eacute;rentes solutions pour acc&amp;eacute;der aux donn&amp;eacute;es &amp;agrave; distance. Nous avons &amp;eacute;t&amp;eacute; charg&amp;eacute;s d\'&amp;eacute;valuer la solution &quot;Terminal Server&quot; de Microsoft. Les donn&amp;eacute;es sont le bien le plus important d\'une entreprise. Nous avons donc &amp;eacute;valu&amp;eacute; et test&amp;eacute; les diff&amp;eacute;rentes m&amp;eacute;thodes permettant de sauvegarder un syst&amp;egrave;me et de restaurer les donn&amp;eacute;es.', 'Die EMVs hat sich entschieden, den Lehrpersonen von überall her Zugriff auf die Unterlagen der Kurse sowie auf ihr Mail zu gewähren.
Es existieren verschiedene Möglichkeiten für einen Fernzugriff. Wir sollten den &quot;Terminal Server&quot; von Microsoft evaluieren.
Daten können die wichtigsten Informationen einer Firma sein. Wir haben verschiedene Methoden zur Sicherung eines Systems und zum Zurückspielen von Daten evaluiert und getestet.', NULL, 151, 3);
INSERT INTO tbl_projects_history VALUES(145, 118, NULL, 2006, 'Le but de ce projet est de d&amp;eacute;velopper pour l\'entreprise Cybox Sa, un outil avec lequel ils puissent administrer les donn&amp;eacute;es importantes concernant les f&amp;ucirc;ts. Cette application doit permettre: * d\'administrer les informations des clients * de g&amp;eacute;rer les commandes * de g&amp;eacute;rer les informations des f&amp;ucirc;ts * de donner un aper&amp;ccedil;u des niveaux * de fournir des statistiques Tout ceci en permettant l\'acc&amp;egrave;s simultan&amp;eacute; &amp;agrave; la base de donn&amp;eacute;es', 'Ziel des Projektes ist es, für die Firma Cybox SA ein Management Tool zu entwickeln, mit dem sie die wichtigsten Daten, welche mit den verschiedenen Fässern zu tun haben, verwalten können.
Die Funktionnen sind:  
* Kundeninformationen verwalten
* Bestellungen verwalten
* Angaben der Fässer verwalten
* Übersicht des Lagers
* Mehrere Zugriffe zur gleichen Zeit auf die Datenbank
* Statistiken erstellen', NULL, 152, 3);
INSERT INTO tbl_projects_history VALUES(146, 119, NULL, 2006, 'Ce projet permet de g&amp;eacute;rer plusieurs ordinateurs &amp;agrave; l\'aide d\'une application r&amp;eacute;alis&amp;eacute;e sur un PocketPC iPAQ. Le programme r&amp;eacute;alis&amp;eacute; est capable de transf&amp;eacute;rer des ordres tels que &quot;D&amp;eacute;marrage de tous les PC&quot; - &quot;Arr&amp;ecirc;t de tous les PC&quot; - &quot;Inventaire des PC&quot;, ... Le langage de programmation utilis&amp;eacute; est le C++. Le transport des informations entre le PocketPC et le r&amp;eacute;seau informatique est r&amp;eacute;alis&amp;eacute; &amp;agrave; l\'aide de la technologie WiFi. Le second objectif du projet &amp;eacute;tait de proposer un environnement de programmation pour PocketPC. Le choix s\'est port&amp;eacute; sur Microsoft eMbedded Visual C++.', 'Mit diesem Projekt ist es möglich, mehrere Computer mit Hilfe einer Applikation zu steuern, welche auf einem PocketPC iPAQ läuft.
Mit dem realisierten Programm können Befehle wie: &quot;Starten aller Computer&quot; - &quot;Herunterfahren aller Computer&quot; - &quot;Inventar der Computer&quot; , ... ausgeführt werden.
C++ wurde als Programmiersprache gewählt. Die Uebertragung der Informationen zwischen dem PocketPC und dem Informatiknetzwerk erfolgt mittels WiFi.
Das zweite Ziel des Projektes war der Vorschlag einer Programmierumgebung für den PocketPC. Die Wahl fiel auf Microsoft eMbedded Visual C++.', NULL, 149, 3);
INSERT INTO tbl_projects_history VALUES(147, 120, NULL, 2006, 'Ce projet permet de prendre le contr&amp;ocirc;le d\'un ordinateur &amp;agrave; l\'aide d\'un t&amp;eacute;l&amp;eacute;phone portable. Piloter la pr&amp;eacute;sentation d\'un document PowerPoint est un exemple d\'application. Le projet est divis&amp;eacute; en deux partie : un programme install&amp;eacute; sur le t&amp;eacute;l&amp;eacute;phone portable et un autre sur l\'ordinateur. Le langage de programmation utilis&amp;eacute; est Java. Le transport des informations entre le t&amp;eacute;l&amp;eacute;phone portable et l\'ordinateur est r&amp;eacute;alis&amp;eacute; &amp;agrave; l\'aide de la technologie de communication Bluetooth. Ce projet est une reprise d\'un projet r&amp;eacute;alis&amp;eacute; une ann&amp;eacute;e pr&amp;eacute;c&amp;eacute;dente. La plus-value &amp;agrave; apporter consistait &amp;agrave; am&amp;eacute;liorer diff&amp;eacute;rentes partie techniques et d\'en faire un produit qui puisse &amp;ecirc;tre vendu. (Documentation - proc&amp;eacute;dure d\'installation, ...)', 'Mit einem Natel einen Computer steuern, das ist die Idee in diesem Projekt. Als Beispiel wird die Steuerung einer PowerPoint-Präsentation genommen. Das Projekt ist in zwei Teile aufgeteilt: ein Programm installiert auf dem Natel und das andere Programm installiert auf dem Computer.
Die Programmiersprache ist Java. Die Uebertragung der Daten zwischen dem Natel und dem Computer erfolgt mittels Bluetooth.
Dieses Projekt ist die Weiterführung eines vorangegangenen Projektes. Die neuen Ziele waren die Verbesserung verschiedener technischer Aspekte und das Produkt so weit zu entwickeln, dass es verkauft werden könnte (Dokumentation, Installationsanleitung, ...)', NULL, 150, 3);
INSERT INTO tbl_projects_history VALUES(148, 121, NULL, 2006, 'Le but de ce projet est de cr&amp;eacute;er un syst&amp;egrave;me permettant le d&amp;eacute;placement du curseur en d&amp;eacute;pla&amp;ccedil;ant le doigt &amp;agrave; l\'int&amp;eacute;rieur d\'une structure m&amp;eacute;tallique. Il faut que le curseur suive le doigt. Pour cela, nous avons utilis&amp;eacute; 2 webcams et une structure m&amp;eacute;tallique. Le langage de programmation utilis&amp;eacute; est le C++.', 'Das Ziel dieses Projektes ist es, ein System zu erstellen, welches den Mausecursor in Abhängigkeit der Fingerbewegung im Metallgehäuse bewegt.

Für die Realisierung des Projektes wurden zwei Webcams auf eine Metallstruktur befestigt. Die gebrauchte Programmiersprache ist C++.', NULL, 153, 3);
INSERT INTO tbl_projects_history VALUES(150, 122, NULL, 2010, 'Application d\'apprentissage des langues par questions - r&amp;eacute;ponses', NULL, NULL, 155, 3);
INSERT INTO tbl_projects_history VALUES(151, 23, NULL, 2010, 'Le but de ce projet &amp;eacute;tait de comprendre les fonctionnement d\'un serveur RADIUS et de configurer un point d\'acc&amp;egrave;s Wifi. Les utilisateurs voulant acc&amp;eacute;der au Wifi doivent s\'authentifier aupr&amp;egrave;s du serveur RADIUS. D&amp;egrave;s qu\'ils seront authentifi&amp;eacute;s, ils pourront utiliser l\'acc&amp;egrave;s (Internet) fournis par le Wifi.', 'Mithilfe eines RADIUS-Servers kann mittels verschiedenen Filtern bestimmt werden, ob ein Benutzer auf ein WLAN zugreifen kann oder nicht. Solche Filter sind beispielsweise ein MAC-Filter oder eine Authentifikation mit einem Username und einem Passwort. RADIUS wird verwendet, um die Sicherheit eines WLANs zu erhöhen und sicherzustellen. Mit einem guten Passwort und entsprechender Verschlüsselung ist ein WLAN relativ gut geschützt gegen Unbefugte.', NULL, 156, 3);
INSERT INTO tbl_projects_history VALUES(152, 123, NULL, 2010, 'C\'est un projet de gestion de t&amp;acirc;ches qui utilise les principes de la m&amp;eacute;thode GTD (Getting Things Done). L\'application qui est en trois langues ( Fran&amp;ccedil;ais par d&amp;eacute;faut, Allemand et Anglais) permet &amp;agrave; l\'utilisateur de rentrer une t&amp;acirc;che en prenant compte du lieu o&amp;ugrave; elle doit &amp;ecirc;tre r&amp;eacute;alis&amp;eacute;e ainsi que d\'un status indiquant si la t&amp;acirc;che doit &amp;ecirc;tre faite tout de suite ou si elle est report&amp;eacute;e &amp;agrave; une date post&amp;eacute;rieur. L\'application utilise Locale pour d&amp;eacute;finir des zones dans les quelles les t&amp;acirc;ches doivent &amp;ecirc;tre r&amp;eacute;alis&amp;eacute;es.', NULL, NULL, 157, 3);
INSERT INTO tbl_projects_history VALUES(153, 124, NULL, 2010, 'Portage du jeu PacMan en C++', NULL, NULL, 158, 3);
INSERT INTO tbl_projects_history VALUES(154, 125, NULL, 2010, 'Arkano&amp;iuml;DS est un jeu de casse-brique. Il est cod&amp;eacute; en C pour la Nintendo DS. Le jeu consiste &amp;agrave; d&amp;eacute;truire des briques situ&amp;eacute;es en haut de l\'&amp;eacute;cran avec une balle. Le joueur doit d&amp;eacute;placer une raquette en bas de l\'&amp;eacute;cran de gauche &amp;agrave; droite pour faire rebondir la balle. Lorsque la balle touche une brique, la brique dispara&amp;icirc;t. Le joueur a 5 vies. Son score augmente lorsqu\'il casse des briques ou qu\'il attrape des bonus.', 'ArkanoisDs ist ein Spiel zum Zerst&amp;ouml;ren von Ziegelsteinen. Es ist in C f&amp;uuml;r Nintendo DS codiert. Das Spiel besteht darin, mit einem Ball am oberen Bildschirmrand befindliche Ziegelsteine zu zerst&amp;ouml;ren. Der Spieler muss einen Schl&amp;auml;ger am unteren Bildschirmrand hin und her bewegen, damit der Ball wieder aufspringt. Sobald der Ball einen Ziegelstein ber&amp;uuml;hrt, verschwindet dieser. Der Spieler hat f&amp;uuml;nf Leben. Seine Punktzahl steigt, wenn er Ziegelsteine zertr&amp;uuml;mmert oder einen Bonus erwischt.', NULL, 159, 3);
INSERT INTO tbl_projects_history VALUES(166, 108, NULL, 2007, 'Ce projet a &amp;eacute;t&amp;eacute; r&amp;eacute;alis&amp;eacute; par les apprentis informaticiens de 2&amp;egrave;me ann&amp;eacute;e. Il consiste en la r&amp;eacute;alisation d\'une application de chat en ligne. Chaque apprenti a d&amp;eacute;velopp&amp;eacute; de A &amp;agrave; Z son application en utilisant les technologies AJAX, HTML&amp;amp;CSS, PHP, MySql et javascript. Les outils utilis&amp;eacute;s sont notepad++, gimp, inkscape et phpmyadmin.', 'Projekt wurde von den Informatiker-Lehrlingen des zweiten Jahres erstellt. Es geht um eine Realisierung einer online chat-Anwendung. Jeder Lehrling und jede Lehrtochter hat von A bis Z selbst seine Anwendung erstellt, indem er die Technologien von AJAX, HTML&amp;amp;CSS, PHP, MySql und javascript einsetzte. Die eingesetzten Werkzeuge waren notepad++, gimp, inkscape und phpmyadmin.', NULL, 104, 3);
INSERT INTO tbl_projects_history VALUES(171, 126, NULL, 2010, 'Le but de ce projet est de r&amp;eacute;aliser un site internet qui regroupe tout les projets qui ont &amp;eacute;t&amp;eacute; r&amp;eacute;alis&amp;eacute;s &amp;agrave; l\\\'Ecole des M&amp;eacute;tiers. Le site web permet de visualiser, rechercher et administrer les projets, les responsables qui ont g&amp;eacute;r&amp;eacute; un projet, et les apprentis qui ont en r&amp;eacute;alis&amp;eacute; un. Une interface d\\\'adminsitration est &amp;eacute;galement disponible, ainsi qu\\\'une recherche. Le site est compl&amp;egrave;tement bilingue fran&amp;ccedil;ais-allemand.', '&lt;span id=&quot;result_box&quot; lang=&quot;de&quot;&gt;&lt;span class=&quot;hps&quot;&gt;Das Ziel dieses&lt;/span&gt; &lt;span class=&quot;hps&quot;&gt;Projektes ist es,&lt;/span&gt; &lt;span class=&quot;hps&quot;&gt;eine Website&lt;/span&gt;&lt;span&gt;, die alle&lt;/span&gt; &lt;span class=&quot;hps&quot;&gt;Projekte, die&lt;/span&gt; &lt;span class=&quot;hps&quot;&gt;an der School of&lt;/span&gt; &lt;span class=&quot;hps&quot;&gt;Trades&lt;/span&gt; &lt;span class=&quot;hps&quot;&gt;durchgef&amp;uuml;hrt wurden,&lt;/span&gt; &lt;span class=&quot;hps&quot;&gt;sammeln&lt;/span&gt; &lt;span class=&quot;hps&quot;&gt;zu erreichen.&lt;/span&gt; &lt;span class=&quot;hps&quot;&gt;Die Website&lt;/span&gt; &lt;span class=&quot;hps&quot;&gt;erm&amp;ouml;glicht es Ihnen,&lt;/span&gt; &lt;span class=&quot;hps&quot;&gt;Anzeigen, Durchsuchen&lt;/span&gt; &lt;span class=&quot;hps&quot;&gt;und Verwalten von Projekten&lt;/span&gt;&lt;span&gt;,&lt;/span&gt; &lt;span class=&quot;hps&quot;&gt;Manager, die&lt;/span&gt; &lt;span class=&quot;hps&quot;&gt;ein Projekt&lt;/span&gt; &lt;span class=&quot;hps&quot;&gt;geschafft haben&lt;/span&gt;&lt;span&gt;,&lt;/span&gt; &lt;span class=&quot;hps&quot;&gt;und&lt;/span&gt; &lt;span class=&quot;hps&quot;&gt;Lehrlinge, die&lt;/span&gt; &lt;span class=&quot;hps&quot;&gt;erreicht haben.&lt;/span&gt; &lt;span class=&quot;hps&quot;&gt;Ein&lt;/span&gt; &lt;span class=&quot;hps&quot;&gt;adminsitration&lt;/span&gt; &lt;span class=&quot;hps&quot;&gt;Schnittstelle&lt;/span&gt; &lt;span class=&quot;hps&quot;&gt;ist ebenfalls verf&amp;uuml;gbar,&lt;/span&gt; &lt;span class=&quot;hps&quot;&gt;sowie die Forschung&lt;/span&gt;&lt;span&gt;.&lt;/span&gt; &lt;span class=&quot;hps&quot;&gt;Die Seite ist&lt;/span&gt; &lt;span class=&quot;hps&quot;&gt;komplett zweisprachig&lt;/span&gt; &lt;span class=&quot;hps&quot;&gt;in&lt;/span&gt; &lt;span class=&quot;hps&quot;&gt;Franz&amp;ouml;sisch und Deutsch.&lt;/span&gt;&lt;/span&gt;', NULL, 160, 3);
INSERT INTO tbl_projects_history VALUES(174, 126, 3, 2012, 'Le but initial de &amp;laquo; EMVs-Projects &amp;raquo; est de r&amp;eacute;pertorier/archiver tous les projets r&amp;eacute;alis&amp;eacute;s par les &amp;eacute;l&amp;egrave;ves de 3&amp;egrave;me ann&amp;eacute;e. Un ou plusieurs &amp;eacute;l&amp;egrave;ves peuvent participer au d&amp;eacute;veloppement du projet &amp;agrave; diff&amp;eacute;rentes p&amp;eacute;riodes. Une interface personnalis&amp;eacute;e de gestion du contenu a &amp;eacute;t&amp;eacute; d&amp;eacute;velopp&amp;eacute;e pour simplifier la t&amp;acirc;che des enseignants qui peuvent ensuite g&amp;eacute;n&amp;eacute;rer des affiches ou des listes de projet au format PDF. Les interfaces sont enti&amp;egrave;rement bilingues.', 'Das urspr&amp;uuml;ngliche Ziel von EMVS-Projekte ist auf Liste / archiv alle Projekte von Studierenden des dritten Jahres unternommen. Ein oder mehrere Sch&amp;uuml;ler k&amp;ouml;nnen in der Entwicklung des Projekts zu verschiedenen Zeiten zu beteiligen. Eine benutzerdefinierte Schnittstelle von Content-Management wurde entwickelt, um die Aufgabe der Lehrer, dann erstellen Sie k&amp;ouml;nnen Poster oder Projekt-Listen im PDF-Format zu vereinfachen. Die Schnittstellen sind vollst&amp;auml;ndig zweisprachig.', 17, 177, 3);
INSERT INTO tbl_projects_history VALUES(175, 128, 3, 2012, 'Ce projet consiste &amp;agrave; centraliser l&amp;rsquo;authentification des diff&amp;eacute;rents services utilis&amp;eacute;s &amp;agrave; l&amp;rsquo;&amp;eacute;cole. Il permet de g&amp;eacute;rer tous les utilisateurs depuis l&amp;rsquo;Active Directory seulement.
En se connectant sur moodle avec un utilisateur, il va rechercher sur l&amp;rsquo;Active Directory s&amp;rsquo;il existe et s&amp;rsquo;il a les bons param&amp;egrave;tres. Si c&amp;rsquo;est bon, il autorise la connexion et cr&amp;eacute;e automatiquement l&amp;rsquo;utilisateur dans Moodle.', 'Dieses Projekt erm&amp;ouml;glicht es, die Authentifizierung der verschiedenen an der Schule benutzten Dienste zu zentralisieren. Alleine vom Active Directory erm&amp;ouml;glicht es, alle Benutzer zu verwalten.
Indem es sich auf Moodle mit einem User in Verbindung setzt, untersucht es auf dem Active Directory, ob dieser existiert und ob er &amp;uuml;ber die richtigen Parameter verf&amp;uuml;gt. Wenn alles in Ordnung ist, l&amp;auml;sst er die Verbindung zu und erstellt automatisch den User in Moodle.
&lt;div&gt;&amp;nbsp;&lt;/div&gt;', 4, 229, 3);
INSERT INTO tbl_projects_history VALUES(176, 129, 3, 2012, 'R&amp;eacute;aliser une installation de surveillance bas&amp;eacute;e sur des cam&amp;eacute;ras IP. Un &amp;eacute;v&amp;eacute;nement d&amp;eacute;tect&amp;eacute; par la cam&amp;eacute;ra d&amp;eacute;clenchera une action (SMS, Email, Iphone ou Android, &amp;hellip;). Explorer toutes les possibilit&amp;eacute;s du syst&amp;egrave;me. Evaluer toutes les possibilit&amp;eacute;s du syst&amp;egrave;me. Il faudra notamment mettre en &amp;oelig;uvre l&amp;rsquo;id&amp;eacute;e suivante:&lt;br /&gt;Surveillance d&amp;rsquo;un animal &amp;laquo; chien &amp;raquo; (zoo, domicile, v&amp;eacute;t&amp;eacute;rinaire service de r&amp;eacute;veil, &amp;hellip;)&lt;br /&gt;On peut transposer cet exemple &amp;agrave; pour la surveillance d&amp;rsquo;autres &amp;eacute;v&amp;eacute;nements : &lt;br /&gt;d&amp;eacute;tection de pr&amp;eacute;sence devant l&amp;rsquo;entr&amp;eacute;e, b&amp;eacute;b&amp;eacute; qui pleure, &amp;hellip;.', NULL, 5, 232, 3);
INSERT INTO tbl_projects_history VALUES(177, 130, 3, 2012, 'Le projet biBot est un projet de d&amp;eacute;veloppement.&amp;nbsp;Il consiste a d&amp;eacute;velopper une application pour terminaux android.&amp;nbsp;Qui devra piloter un robot cr&amp;eacute;e par les &amp;eacute;lectroniciens.', 'Das biBot-Projekt ist ein Entwicklungsprojekt. Es besteht darin, eine Anwendung f&amp;uuml;r Android-Terminalserver zu entwickeln, welche einen von Elektronikern entwickelten Roboter wird steuern m&amp;uuml;ssen.', NULL, 230, 3);
INSERT INTO tbl_projects_history VALUES(178, 131, NULL, 2010, 'Installation d\'une infrastructure pour PME. Cette installation comprend un serveur DNS, DHCP, de fichiers et de messagerie de base pour envoyer et recevoir des messages. S&amp;eacute;curisation de l\'acc&amp;egrave;s &amp;agrave; l\'aide d\'un firewall. Les serveurs FTP et Web sont plac&amp;eacute;s dans une DMZ. Mise en place d\'un acc&amp;egrave;s Webmail pour la messagerie. D&amp;eacute;finition d\'une strat&amp;eacute;gie globale de backup.', 'Installation einer Infrastruktur f&amp;uuml;r einen mittelst&amp;auml;ndischen Betrieb. Diese besteht aus einem DNS-, DHCP-, File-Server und einem Email-Server, um Nachrichten zu senden und zu empfangen. Sicherung des Zuganges mit Hilfe einer Firewall. Die FTP- und Web-Server sind in einer DMZ platziert. Erstellung eines Webmail-Zuganges f&amp;uuml;r den Email-Server. Definition einer umfassenden Backup-Strategie.', 14, 161, 3);
INSERT INTO tbl_projects_history VALUES(179, 132, NULL, 2010, 'Ce projet est un jeu favorisant l\'apprentissage des calculs pour les enfants. Il est d&amp;eacute;velopp&amp;eacute; en C pour la Nintendo DS.&lt;br /&gt;Il y a deux niveaux: le premier avec des additions, le second avec des soustractions. Le joueur doit r&amp;eacute;pondre aux calculs. Une partie dure 1 min 30. A la fin de la partie, le score du joueur est affich&amp;eacute;.', 'Dieses Projekt besteht aus einem Spiel, welches Kindern das Erlernen des Rechnens erleichtern soll. Es ist in C f&amp;uuml;r Nintendo DS entwickelt. Das Spiel besteht aus zwei Stufen: die erste mit Additionen, die zweite mit Subtraktionen. Der Spieler muss die Rechnungen l&amp;ouml;sen. Ein Spiel dauert 1\'30\'\'. Am Ende des Spiels wird die erzielte Punktzahl angezeigt.', 15, 162, 3);
INSERT INTO tbl_projects_history VALUES(180, 133, NULL, 2010, 'Le but de ce projet est de comparer deux syst&amp;egrave;mes de virtualisation. Le premier est VMware Infrastructure et le second Microsoft Virtual Server. La virtualisation compl&amp;egrave;te d\'un r&amp;eacute;seau ( clients et serveurs) a &amp;eacute;t&amp;eacute; r&amp;eacute;alis&amp;eacute;e avec chacun des produits. Ceci afin de permettre aux clients de se connecter et d\'avoir acc&amp;egrave;s &amp;agrave; leur PC ainsi qu\'aux ressources du r&amp;eacute;seau &amp;agrave; travers une simple page web. L\'ensemble se trouve sur plusieurs serveurs dont les ressources sont partag&amp;eacute;es pour am&amp;eacute;liorer les performances.', 'Ziel dieses Projektes ist der Vergleich zweier Virtualisierungs-Systeme. Das erste ist VMware Infrastructure und das zweite Microsoft Virtual Server. Die vollst&amp;auml;ndige Virtualisierung eines Netzwerkes (Clients und Server) wurde mit beiden Produkten verwirklicht. Die Anwender sollen sich via Webseite einloggen k&amp;ouml;nnen und erhalten so Zugang zu ihrem PC sowie zu den Netzwerkressourcen. Die Virtualisierungsl&amp;ouml;sung befindet sich auf mehreren Servern, damit die Ressourcen verteilt werden k&amp;ouml;nnen zwecks verbesserter Leistung.', 5, 163, 3);
INSERT INTO tbl_projects_history VALUES(181, 134, NULL, 2010, 'SpaceStorm est un jeu en 2D. Il consiste en un petit vaisseau spatial qui peut tirer sur les autres vaisseaux qui sont contr&amp;ocirc;l&amp;eacute;s soit par d\'autres joueurs en LAN soit par une IA. Le jeu &amp;agrave; &amp;eacute;t&amp;eacute; r&amp;eacute;alis&amp;eacute; en java.', 'Space Storm ist ein 2D-Spiel. Es besteht aus einem kleinen Raumschiff, das andere beschiessen kann, welche ihrerseits von anderen Spielern in LAN oder via IA gesteuert werden. Das Spiel wurde in Java erstellt.', 14, 164, 3);
INSERT INTO tbl_projects_history VALUES(182, 135, NULL, 2010, 'L\'interrupteur cr&amp;eacute;pusculaire permet gr&amp;acirc;ce &amp;agrave; deux fonctions de commander l\'alimentation d\'un appareil &amp;eacute;lectrique raccord&amp;eacute; au secteur. Selon l\'intensit&amp;eacute; lumineuse environante ou un pr&amp;eacute;r&amp;eacute;glage d\'une base de temps d&amp;eacute;compt&amp;eacute;e &amp;agrave; rebours, l\'appareil &amp;eacute;lectrique sera aliment&amp;eacute; par l\'interm&amp;eacute;diaire d\'un relais.', 'Der Dimmer erm&amp;ouml;glicht dank zwei Funktionen die Versorgung eines elektrischen Apparates, der ans Netz angeschlossen ist. Je nach Umgebungs-Helligkeit oder aufgrund einer vorregulierten Zeitbasis mit Countdown-Modus wird der Elektroapparat mittels eines Relais gespiesen.', 9, 165, 2);
INSERT INTO tbl_projects_history VALUES(183, 136, NULL, 2010, 'Jeu typique de combats a&amp;eacute;riens. Au commande d\'un avion de type Mirage, le joueur doit faire des prouesses pour &amp;eacute;viter les missiles tir&amp;eacute;s par l\'aviation ennemie.&lt;br /&gt;Plusieurs lieux de combats sont disponibles, comme par exemple au dessus de la ville de Sion.', 'Typisches Luftschlachten-Spiel. Am Steuer eines Flugzeugs des Typs Mirage muss der Spieler k&amp;uuml;hne Man&amp;ouml;ver t&amp;auml;tigen, um den von feindlichen Flugzeugen abgefeuerten Raketen auszuweichen. Mehrere Kampforte sind verf&amp;uuml;gbar, so zum Beispiel auch der Luftraum &amp;uuml;ber der Stadt Sitten.', 17, 166, 2);
INSERT INTO tbl_projects_history VALUES(184, 137, NULL, 2010, 'Ce projet est une application WEB destin&amp;eacute;e &amp;agrave; la gestion immobili&amp;egrave;re.&lt;br /&gt;Les immeubles ou les appartements peuvent &amp;ecirc;tre recherch&amp;eacute;s selon plusieurs crit&amp;egrave;res.&lt;br /&gt;L\'utilisateur peut alors visualiser plusieurs images de l\'objet et le localiser sur Google Earth.', 'Dieses Projekt ist eine WEB-Anwendung zur Immobilienverwaltung. Die Geb&amp;auml;ude und Wohnungen k&amp;ouml;nnen anhand mehrerer Kriterien gesucht werden. Der Benutzer kann anschliessend mehrere Bilder des Objektes anschauen und den Standort auf Google Earth bestimmen.', 17, 167, 3);
INSERT INTO tbl_projects_history VALUES(185, 138, NULL, 2010, 'Le but de ce projet est de perfectionner un jeu de dames cr&amp;eacute;&amp;eacute; dans le module ICH-306 en utilisant le langage de programmation C++. L\'outil principal pour r&amp;eacute;aliser ce programme est CodeGear C++ Builder.', 'Ziel dieses Projektes ist es, das im Modul ICH-306 erstellte Dame-Spiel durch Ben&amp;uuml;tzung der Programmiersprache C++ weiter zu entwickeln. Wichtigstes Werkzeug zur Realisierung dieses Programmes ist CodeGear C++ Builder.', 14, 168, 3);
INSERT INTO tbl_projects_history VALUES(186, 139, NULL, 2010, 'L\'interface de pilotage PC est un programme cod&amp;eacute; avec le logiciel Borland 2009. Depuis celui-ci il est possible de se connecter au robot de SwissEurobot par protocole RS-232 au travers d\'un syst&amp;egrave;me bluetooth.&lt;br /&gt;&lt;br /&gt;Il a plusieurs utilit&amp;eacute;s :&lt;br /&gt;- visualiser en temps r&amp;eacute;el les param&amp;egrave;tres du robot&lt;br /&gt;- modifier certains param&amp;egrave;tres&lt;br /&gt;- param&amp;eacute;trer les d&amp;eacute;placements pour que le robot effectue un parcours &lt;br /&gt;- contr&amp;ocirc;ler le robot manuellement &amp;agrave; l\'aide des fl&amp;egrave;ches du clavier&lt;br /&gt;&lt;br /&gt;Le but du programme est de permettre un d&amp;eacute;bogage du robot avant de l\'utiliser pour le concours, pour faire des tests pendant son d&amp;eacute;veloppement sans devoir le reprogrammer &amp;agrave; chaque fois.', 'Eurobot ist ein europ&amp;auml;ischer Wettbewerb in Robotertechnik. Jedes Jahr &amp;auml;ndert das Wettbewerbsthema. Nachdem die Roboter Rugby und Bowling gespielt, Abf&amp;auml;lle sortiert und Tempel gebaut haben, m&amp;uuml;ssen sie nun m&amp;ouml;glichst viele Lebensmittel sammeln, um sie an diejenigen zu verteilen, die sie ben&amp;ouml;tigen. Eine aus Lehrlingen der Flugbasis Sitten und der EMVs bestehende Mannschaft hat die Farben der Walliser Technik stolz vertreten, indem sie einen total selbst&amp;auml;ndigen Roboter entwickelt hat. Die Mannschaft Rulbi hat sich auf den 7. Platz der Schweizer Ausscheidung gehievt.', 2, 169, 2);
INSERT INTO tbl_projects_history VALUES(187, 140, NULL, 2010, 'Eurobot est un concours Europ&amp;eacute;en de robotique. Chaque ann&amp;eacute;e, le th&amp;egrave;me de la comp&amp;eacute;tition change. Apr&amp;egrave;s avoir jou&amp;eacute; au rugby, au bowling, tri&amp;eacute; des d&amp;eacute;chets et construit des temples, les robots devront ramasser un maximum de denr&amp;eacute;es alimentaires, pour les redistribuer &amp;agrave; ceux qui en ont besoin. Une &amp;eacute;quipe, constitu&amp;eacute;e d\'apprentis de la base a&amp;eacute;rienne de Sion et de l\'EMVs, a fi&amp;egrave;rement d&amp;eacute;fendu les couleurs de la technique valaisanne en d&amp;eacute;veloppant un robot totallement autonome. L\'&amp;eacute;quipe du nom de Rulbi s\'est class&amp;eacute;e &amp;agrave; la 7&amp;egrave;me place des &amp;eacute;liminatoires suisses.', 'Eurobot ist ein europ&amp;auml;ischer Wettbewerb in Robotertechnik. Jedes Jahr &amp;auml;ndert das Wettbewerbsthema. Nachdem die Roboter Rugby und Bowling gespielt, Abf&amp;auml;lle sortiert und Tempel gebaut haben, m&amp;uuml;ssen sie nun m&amp;ouml;glichst viele Lebensmittel sammeln, um sie an diejenigen zu verteilen, die sie ben&amp;ouml;tigen. Eine aus Lehrlingen der Flugbasis Sitten und der EMVs bestehende Mannschaft hat die Farben der Walliser Technik stolz vertreten, indem sie einen total selbst&amp;auml;ndigen Roboter entwickelt hat. Die Mannschaft Rulbi hat sich auf den 7. Platz der Schweizer Ausscheidung gehievt.', 2, 170, 2);
INSERT INTO tbl_projects_history VALUES(188, 141, NULL, 2010, 'Diese Projektidee ist anl&amp;auml;sslich eines k&amp;uuml;rzlich angetroffenen Problems aufgetaucht. Wenn man n&amp;auml;mlich bequem vor seinem PC Musik h&amp;ouml;rt, stellt man fest, dass beim Verlassen des Computers in einen anderen Raum der Ton nicht sehr weit reicht. Es wird also schwierig, seine Lieblings-Musikst&amp;uuml;cke im Wohnzimmer zu h&amp;ouml;ren. iMove bietet hierzu eine Alternative an. Anstatt den Ton via Lautsprecher Ihres Computers zu verbreiten, wird dieser &amp;uuml;bers Ethernet-Netz gesendet, um auf dem entfernten Ger&amp;auml;t empfangen zu werden. iMove sorgt anschliessend daf&amp;uuml;r, die Audiodatei wiederherzustellen, damit Sie sie nutzen k&amp;ouml;nnen, wo immer Sie wollen. Man kann also iMove etwa mit einer Erweiterung Ihrer Computer-Lautsprecher vergleichen. Dar&amp;uuml;ber hinaus ist iMove f&amp;uuml;r Gross und Klein anwendbar, verf&amp;uuml;gt es doch &amp;uuml;ber eine intuitive Benutzeroberfl&amp;auml;che.', 'Diese Projektidee ist anl&amp;auml;sslich eines k&amp;uuml;rzlich angetroffenen Problems aufgetaucht. Wenn man n&amp;auml;mlich bequem vor seinem PC Musik h&amp;ouml;rt, stellt man fest, dass beim Verlassen des Computers in einen anderen Raum der Ton nicht sehr weit reicht. Es wird also schwierig, seine Lieblings-Musikst&amp;uuml;cke im Wohnzimmer zu h&amp;ouml;ren. iMove bietet hierzu eine Alternative an. Anstatt den Ton via Lautsprecher Ihres Computers zu verbreiten, wird dieser &amp;uuml;bers Ethernet-Netz gesendet, um auf dem entfernten Ger&amp;auml;t empfangen zu werden. iMove sorgt anschliessend daf&amp;uuml;r, die Audiodatei wiederherzustellen, damit Sie sie nutzen k&amp;ouml;nnen, wo immer Sie wollen. Man kann also iMove etwa mit einer Erweiterung Ihrer Computer-Lautsprecher vergleichen. Dar&amp;uuml;ber hinaus ist iMove f&amp;uuml;r Gross und Klein anwendbar, verf&amp;uuml;gt es doch &amp;uuml;ber eine intuitive Benutzeroberfl&amp;auml;che.', 9, 171, 2);
INSERT INTO tbl_projects_history VALUES(189, 142, NULL, 2010, 'Le MacQuarium est un aquarium enti&amp;egrave;rement &amp;eacute;lectronis&amp;eacute; mont&amp;eacute; &amp;agrave; l&amp;rsquo;int&amp;eacute;rieur d&amp;rsquo;un &amp;eacute;cran Apple Mac Se. Un microcontr&amp;ocirc;leur permet de rendre l&amp;rsquo;aquarium totalement autonome. &lt;br /&gt;Le changement d&amp;rsquo;eau se fait automatiquement chaque semaine et l&amp;rsquo;&amp;eacute;clairage change pendant la journ&amp;eacute;e. Des capteurs de niveau sont plac&amp;eacute;s directement dans l&amp;rsquo;aquarium et reli&amp;eacute;s au microcontr&amp;ocirc;leur pour le changement d&amp;rsquo;eau. Une &amp;eacute;lectrovanne est raccord&amp;eacute;e &amp;agrave; un robinet d&amp;rsquo;eau pour amener de l&amp;rsquo;eau propre. Un coupe-pression est &amp;eacute;galement pr&amp;eacute;sent derri&amp;egrave;re l&amp;rsquo;&amp;eacute;lectrovanne pour que la pression soit supportable pour les poissons. Une pompe submersible permet de vider l&amp;rsquo;eau de l&amp;rsquo;aquarium.', 'Das MaqQuarium ist ein vollst&amp;auml;ndig elektronifiziertes Aquarium, welches im Innern eines Bildschirmes des Apple Mac Se errichtet wurde. Ein Mikrokontroller erlaubt es, das Aquarium ganz autonom werden zu lassen. Der Wasserwechsel erfolgt automatisch einmal pro Woche und die Belichtung &amp;auml;ndert im Laufe des Tages. Niveau-Messf&amp;uuml;hler sind direkt im Aquarium platziert und am Mikrokontroller f&amp;uuml;r den Wasserwechsel angeschlossen. Ein Magnetventil ist am Wasserhahn angebracht, um sauberes Wasser zuzuf&amp;uuml;hren. Ein Druckreduzierventil ist ebenfalls hinter dem Magnetventil installiert, damit der Wasserdruck f&amp;uuml;r die Fische ertr&amp;auml;glich ist. Eine Tauchpumpe erm&amp;ouml;glicht die Wasserentleerung des Aquariums.', 6, 172, 2);
INSERT INTO tbl_projects_history VALUES(190, 143, NULL, 2010, 'Il s\'agit d\'un d&amp;eacute;monstrateur &amp;agrave; pile &amp;agrave; combustible qui, tout d\'abord, produit de l\'oxyg&amp;egrave;ne et de l\'hydrog&amp;egrave;ne avec l\'&amp;eacute;lectrolyse de l\'eau. &lt;br /&gt;La pile est constitu&amp;eacute;e d\'une membrane &amp;eacute;lectrolyte (qui bloque le passage des &amp;eacute;lectrons et ne laisse passer que des ions) et de deux &amp;eacute;lectrodes: une anode et une cathode. &lt;br /&gt;D\'un c&amp;ocirc;t&amp;eacute;, la pile est aliment&amp;eacute;e en hydrog&amp;egrave;ne qui se dissocie au contact de l\'anode et en pr&amp;eacute;sence d\'un catalyseur pour donner des &amp;eacute;lectrons et des protons.&lt;br /&gt;De l\'autre c&amp;ocirc;t&amp;eacute;, la cathode est aliment&amp;eacute;e en oxyg&amp;egrave;ne qui vient capter les &amp;eacute;lectrons et les protons pour former de l\'eau.&lt;br /&gt;Pour finir, l\'&amp;eacute;cran LCD affiche la tension, le courant, la puissance et le rendement que fournit la pile &amp;agrave; combustble.', 'Es handelt sich um einen Brennstoffzellen-Vorf&amp;uuml;hrer, welcher zuerst Sauerstoff und Wasserstoff mittels Wasser-Elektrolyse produziert. Die Batterie besteht aus einer Elektrolyt-Membrane, welche die Durchl&amp;auml;ssigkeit von Elektronen verhindert und von Ionen zul&amp;auml;sst, und aus zwei Elektroden: einer Anode und einer Kathode. Auf der einen Seite wird die Brennstoffzelle mit Wasserstoff versorgt, welches sich im Kontakt mit der Anode und im Beisein eines Katalysators aufl&amp;ouml;st, um Elektronen und Protonen freizugeben. Auf der anderen Seite wird der Kathode&amp;nbsp; Sauerstoff zugef&amp;uuml;hrt, welcher die Elektronen und Protonen auff&amp;auml;ngt, um Wasser zu produzieren. Schliesslich zeigt der LCD-Bildschirm die Spannung, den Strom, die Leistung und den Wirkungsgrad der Brennstoffzelle an.', 6, 173, 2);
INSERT INTO tbl_projects_history VALUES(191, 33, NULL, 2010, 'Ce projet permet de faire des m&amp;eacute;langes de couleurs. Dans un triangle on d&amp;eacute;place un objet, ce qui nous permet de faire un m&amp;eacute;lange des trois couleurs de base, c\'est-&amp;agrave;-dire le rouge, le bleu et le jaune. Le projet utilise des capteurs &amp;agrave; ultra-sons pour d&amp;eacute;tecter l\'utilisateur. 3 LEDs (rouge, bleu, jaune) fournissent la lumi&amp;egrave;re.', 'Dieses Projekt erm&amp;ouml;glicht Farbmischungen. In einem Dreieck wird ein Objekt verschoben, was eine Vermischung der drei Grundfarben Rot, Blau und Gelb erm&amp;ouml;glicht. Das Projekt ben&amp;uuml;tzt hierbei Ultraschall-Sensoren um den User zu orten. 3 LED-Lampen (rot, blau, gelb) liefern das Licht.', 9, 174, 3);
INSERT INTO tbl_projects_history VALUES(201, 144, 3, 2012, 'Le but du projet est de de s&amp;eacute;curiser l&amp;rsquo;acc&amp;egrave;s &amp;agrave; Internet sur le r&amp;eacute;seau &amp;lsquo;Test&amp;rsquo; de l&amp;rsquo;&amp;eacute;cole.
Les &amp;eacute;l&amp;egrave;ves doivent garder l&amp;rsquo;impression d&amp;rsquo;&amp;ecirc;tre directement connect&amp;eacute; &amp;agrave; Internet pour effectuer les labos n&amp;eacute;cessitant un acc&amp;egrave;s direct Internet. Les professeurs doivent pouvoir choisir si l&amp;rsquo;acc&amp;egrave;s &amp;agrave; Internet est ouvert ou ferm&amp;eacute; et si l&amp;rsquo;attribution des adresses IP se fait automatiquement (via DHCP) ou manuellement. De plus, on contr&amp;ocirc;le les sites consult&amp;eacute;s pour limiter l&amp;rsquo;acc&amp;egrave;s &amp;agrave; des sites tels que Facebook.', 'Ziel des Projektes Authentifiziertes Internet ist es, den Internetzugriff auf dem Test-Netzwerk der Schule zu sichern.
Die Sch&amp;uuml;ler m&amp;uuml;ssen den Eindruck erhalten, direkt mit dem Internet verbunden zu sein, um die Arbeiten zu verrichten, welche einen direkten Internetzugriff voraussetzen. Die Lehrpersonen m&amp;uuml;ssen w&amp;auml;hlen k&amp;ouml;nnen, ob der Zugang zum Internet ge&amp;ouml;ffnet oder geschlossen sein soll und ob die Zuordnung der IP-Adressen automatisch (via DHCP) oder manuell erfolgen soll. Schliesslich werden die besuchten Webseiten kontrolliert, um den Zugang zu Seiten wie Facebook einzuschr&amp;auml;nken.', 5, 250, 3);
INSERT INTO tbl_projects_history VALUES(202, 145, NULL, 2010, '&quot;Ce projet est un guidage de cam&amp;eacute;ra par acc&amp;eacute;l&amp;eacute;rom&amp;egrave;tres. &lt;br /&gt;Des capteurs sont fix&amp;eacute;s sur une paire de lunette vid&amp;eacute;o ce qui permet de d&amp;eacute;tecter &lt;br /&gt;les mouvements de la t&amp;ecirc;te, ces mouvements sont retransmis sur des moteurs&lt;br /&gt;plac&amp;eacute;s de pars et d\'autre de la cam&amp;eacute;ra ce qui a pour effet d\'incliner cette derni&amp;egrave;re.&lt;br /&gt;Ensuite le signal vid&amp;eacute;o de la cam&amp;eacute;ra est envoy&amp;eacute; sur les lunettes vid&amp;eacute;o.&lt;br /&gt;Au final, il suffit de s\'&amp;eacute;quiper des lunettes et de bouger la t&amp;ecirc;te pour piloter la cam&amp;eacute;ra.&quot;', 'Dieses Projekt beinhaltet eine Kameralenkung mittels Beschleunigungsmessern. Sensoren werden an eine Video-Brille montiert, was die Kopfbewegungen registrieren l&amp;auml;sst. Diese Bewegungen werden anschliessend an Motoren weitergeleitet, die an beiden Enden der Kam&amp;eacute;ra fixiert sind, so dass diese sich bewegen wird. Anschliessend wird das Video-Signal der Kamera auf die Video-Brille gesendet. Schliesslich wird erreicht, dass mit Hilfe der Brille die Kamera mittels Kopfbewegungen gesteuert werden kann.', 7, 178, 2);
INSERT INTO tbl_projects_history VALUES(204, 89, NULL, 2010, '&quot;Le projet R2D2 est un robot de taille r&amp;eacute;elle, il doit son nom a sa ressemblance avec le dro&amp;iuml;de de StarWars. Il peut &amp;ecirc;tre diriger &amp;agrave; l\'aide d\'une t&amp;eacute;l&amp;eacute;commande radio-fr&amp;eacute;quence, de type d\'une t&amp;eacute;l&amp;eacute;commande de mod&amp;egrave;le r&amp;eacute;duit. Il est &amp;eacute;quip&amp;eacute; de capteurs &amp;agrave; ultrasons, permettant de d&amp;eacute;tecter des obstacles &amp;eacute;ventuels. En fonction de ses obstacles, la &lt;br /&gt;conduite est modifi&amp;eacute;e afin d\'aider le conducteur &amp;agrave; les &amp;eacute;viter. Ce projet sera mis en commun avec une cam&amp;eacute;ra qui sera d&amp;eacute;plac&amp;eacute;e par acc&amp;eacute;l&amp;eacute;rom&amp;egrave;tre. Ce qui permettra de pouvoir d&amp;eacute;placer une cam&amp;eacute;ra positionn&amp;eacute;e sur le robot pour pouvoir d&amp;eacute;placer le robot sans l\'avoir dans son champ de vision et d&amp;eacute;placer la cam&amp;eacute;ra en fonction de la position de la t&amp;ecirc;te de l\'utilisateur.&quot;', 'Das Projekt R2D2 besteht aus einem Roboter in Lebensgr&amp;ouml;sse. Er verdankt seinen Namen der &amp;Auml;hnlichkeit mit dem Droiden aus StarWars. Er kann mit Hilfe einer Radiofrequenz-Fernsteuerung betrieben werden. Er ist mit Ultraschall-Sensoren ausger&amp;uuml;stet, die es erlauben, allf&amp;auml;llige Hindernisse zu erkennen. Je nach Hindernis wird die Lenkung so beeinflusst, dass der Lenker diese Hindernisse umgeht. Weiter wird eine mittels Beschleunigungsmesser verschiebbare Kamera mit dem Projekt verbunden, was eine auf dem Roboter platzierte Kamera in Bewegung bringen wird, welche ihrerseits den Roboter fortbewegen wird, ohne diesen in ihrem Blickfeld zu haben. Gleichzeitig kann die Kamera je nach Kopfneigung des Users fortbewegt werden.', 7, 179, 2);
INSERT INTO tbl_projects_history VALUES(205, 89, NULL, 2010, '&quot;Le projet R2D2 est un robot de taille r&amp;eacute;elle, il doit son nom a sa ressemblance avec le dro&amp;iuml;de de StarWars. Il peut &amp;ecirc;tre diriger &amp;agrave; l\'aide d\'une t&amp;eacute;l&amp;eacute;commande radio-fr&amp;eacute;quence, de type d\'une t&amp;eacute;l&amp;eacute;commande de mod&amp;egrave;le r&amp;eacute;duit. Il est &amp;eacute;quip&amp;eacute; de capteurs &amp;agrave; ultrasons, permettant de d&amp;eacute;tecter des obstacles &amp;eacute;ventuels. En fonction de ses obstacles, la &lt;br /&gt;conduite est modifi&amp;eacute;e afin d\'aider le conducteur &amp;agrave; les &amp;eacute;viter. Ce projet sera mis en commun avec une cam&amp;eacute;ra qui sera d&amp;eacute;plac&amp;eacute;e par acc&amp;eacute;l&amp;eacute;rom&amp;egrave;tre. Ce qui permettra de pouvoir d&amp;eacute;placer une cam&amp;eacute;ra positionn&amp;eacute;e sur le robot pour pouvoir d&amp;eacute;placer le robot&lt;br /&gt;sans l\'avoir dans son champ de vision et d&amp;eacute;placer la cam&amp;eacute;ra en fonction de la position de la t&amp;ecirc;te de l\'utilisateur.&quot;', 'Das Projekt R2D2 besteht aus einem Roboter in Lebensgr&amp;ouml;sse. Er verdankt seinen Namen der &amp;Auml;hnlichkeit mit dem Droiden aus StarWars. Er kann mit Hilfe einer Radiofrequenz-Fernsteuerung betrieben werden. Er ist mit Ultraschall-Sensoren ausger&amp;uuml;stet, die es erlauben, allf&amp;auml;llige Hindernisse zu erkennen. Je nach Hindernis wird die Lenkung so beeinflusst, dass der Lenker diese Hindernisse umgeht. Weiter wird eine mittels Beschleunigungsmesser verschiebbare Kamera mit dem Projekt verbunden, was eine auf dem Roboter platzierte Kamera in Bewegung bringen wird, welche ihrerseits den Roboter fortbewegen wird, ohne diesen in ihrem Blickfeld zu haben. Gleichzeitig kann die Kamera je nach Kopfneigung des Users fortbewegt werden.', 7, 180, 2);
INSERT INTO tbl_projects_history VALUES(206, 147, NULL, 2010, 'En salle de m&amp;eacute;canique, nous voulons r&amp;eacute;gler les vitesses des perceuses &amp;agrave; colonnes. Pour cela nous avons install&amp;eacute; un convertisseur de fr&amp;eacute;quences pour chaque perceuse. Avec l\'aide du convertisseur de fr&amp;eacute;quences on pourra r&amp;eacute;gler chaque plage de vitesses sans changer la place des courroies. Un affichage permet de visualiser la vitesse en cours.', 'Im mechanischen Raum wollen wir die Geschwindigkeiten der St&amp;auml;nder-/Tischbohrmaschinen regulieren. Dazu haben wir einen Frequenzwandler f&amp;uuml;r jeden Bohrer installiert. Dadurch wird man jede Geschwindigkeitsstufe einstellen k&amp;ouml;nnen, ohne die Position der Antriebsriemen zu &amp;auml;ndern. Eine Anzeige erm&amp;ouml;glicht es, die aktuelle Geschwindigkeit abzulesen.', 8, 181, 1);
INSERT INTO tbl_projects_history VALUES(207, 72, NULL, 2010, 'Le projet SMC est une chaine de production &amp;eacute;lectro-pneumatique miniature. C&amp;rsquo;est une simulation d&amp;rsquo;une cha&amp;icirc;ne de montage. Le processus consiste &amp;agrave; assembler plusieurs pi&amp;egrave;ces tel qu&amp;rsquo;une base, un roulement, un axe et un couvercle.', 'Das Projekt SMC ist ein elektro-pneumatisches Produktionsfliessband. Es handelt sich um eine Fliessband-Simulation. Das Verfahren besteht darin, mehrere Teile miteinander zu verbinden (Grundplatte, Achse, Deckel).', 12, 182, 1);
INSERT INTO tbl_projects_history VALUES(208, 148, NULL, 2010, 'Ce projet est la modernisation compl&amp;egrave;te d\'une ancienne installation de galvanisation. Un chariot transporte les pi&amp;egrave;ces &amp;agrave; traiter d\'un bain &amp;agrave; l\'autre. Il est possible de piloter cette installation en manuelle ou en automatique au travers d\'un &amp;eacute;cran de processus.', 'Dieses Projekt besteht in der vollst&amp;auml;ndigen Modernisierung einer alten Galvanisierungseinrichtung. Ein Wagen transportiert die zu behandelnden Teile von einem Bad ins andere. Es ist m&amp;ouml;glich, diese Insallation manuell oder automatisch zu steuern mit Hilfe eines den Vorgang aufzeigenenden Bildschirms.', 10, 183, 1);
INSERT INTO tbl_projects_history VALUES(209, 82, NULL, 2009, 'Le but de ce projet est d\'automatiser une table tournante. Cette installation a &amp;eacute;t&amp;eacute; livr&amp;eacute;e pratiquement compl&amp;egrave;tement mont&amp;eacute;e, mais j\'ai d&amp;ucirc; rajouter un poste qui reconna&amp;icirc;t la couleur. Pour le premier poste, il y a un capteur capacitif qui d&amp;eacute;tecte si la pi&amp;egrave;ce est pr&amp;eacute;sente ou non. Si c\'est le cas, la table tourne au poste suivant qui reconna&amp;icirc;t la couleur pour d&amp;eacute;terminer les &amp;eacute;tapes suivantes du processus. Les autres &amp;eacute;tapes sont le bon positionnement, le pon&amp;ccedil;age et l\'&amp;eacute;jection des pi&amp;egrave;ces. La commande se fait au travers d\'un &amp;eacute;cran tactile et peut &amp;ecirc;tre s&amp;eacute;lectionn&amp;eacute; en Manuel ou Automatique.', 'Das Ziel dieses Projektes ist es, eine Bearbeitungsstation zu realisieren. Die Station wurde montiert und verkabelt geliefert, aber ich habe mich dazu entschieden noch zus&amp;auml;tzlich einen Posten zur Farberkennung beizuf&amp;uuml;gen. Am Anfang der Station ist ein kapazitiver Sensor, der erkennt, ob ein St&amp;uuml;ck vorhanden ist oder nicht. Wenn ein St&amp;uuml;ck vorhanden ist, geht es zum n&amp;auml;chsten Posten, der die Farbe erkennt und so den sp&amp;auml;teren Prozessablauf f&amp;uuml;r jedes St&amp;uuml;ck bestimmt. Die weiteren Posten sind Pr&amp;uuml;fstelle, Schleifstelle und der Auswurf. Die Steuerung soll mit einem Touch-Screen realisiert werden und man kann zwischen Manuell und Automatisch w&amp;auml;hlen.', NULL, 81, 1);
INSERT INTO tbl_projects_history VALUES(210, 82, NULL, 2010, 'Ce projet consiste en la mise en marche d\'une une table tournante. Pour le premier poste, il y a un capteur capacitif qui d&amp;eacute;tecte si la pi&amp;egrave;ce est pr&amp;eacute;sente ou non. Si c\'est le cas, la table tourne au poste suivant qui reconna&amp;icirc;t la couleur pour d&amp;eacute;terminer les &amp;eacute;tapes suivantes du processus. Les autres &amp;eacute;tapes sont le bon positionnement, le pon&amp;ccedil;age et l\'&amp;eacute;jection des pi&amp;egrave;ces. La commande se fait au travers d\'un &amp;eacute;cran tactile et peut &amp;ecirc;tre s&amp;eacute;lectionn&amp;eacute; en Manuel ou Automatique.', 'Dieses Projekt besteht darin, einen Drehtisch in Gang zu setzen. Am ersten Posten sp&amp;uuml;rt ein kapazitiver Sensor auf, ob das St&amp;uuml;ck vorhanden ist oder nicht. Ist dies der Fall, so dreht sich der Tisch zum zweiten Posten, der die Farbe erkennen muss, um die weiteren Schritte des Vorganges festzulegen. Die weiteren Etappen bestehen in der richtigen Positionierung, im Schleifen und Auswurf der Teile. Die Steuerung erfolgt &amp;uuml;ber ein Touchscreen und kann auf manuell oder automatisch eingestellt werden.&lt;br /&gt;&lt;br /&gt;', 10, 184, 1);
INSERT INTO tbl_projects_history VALUES(211, 6, NULL, 2010, NULL, NULL, 11, 185, 1);
INSERT INTO tbl_projects_history VALUES(212, 11, NULL, 2010, 'Maquette didactique pour l\'enseignement de la programmation sur Siemens (S7-300). Cette maquette est con&amp;ccedil;ue pour &amp;ecirc;tre utilis&amp;eacute;e par des &amp;eacute;l&amp;egrave;ves de premi&amp;egrave;re ann&amp;eacute;e comme ceux de quatri&amp;egrave;me. Le projet &amp;agrave; &amp;eacute;t&amp;eacute; imagin&amp;eacute; apr&amp;egrave;s avoir travaill&amp;eacute; avec le maquettes de l\'&amp;eacute;cole. La cabine dessert quatre &amp;eacute;tages. La cabine est &amp;eacute;quip&amp;eacute;e d\'une porte motoris&amp;eacute;e. Le moteur principal est pilot&amp;eacute; par variateur de vitesse.', 'Didaktisches Modell, um die Programmierung auf Siemens (S7-300) zu lehren. Dieses Modell ist dazu entwickelt, dass es sowohl Lehrlinge des ersten als auch des vierten Jahres benutzen k&amp;ouml;nnen. Das Projekt wurde ausgedacht, nachdem man mit den Modellen der Schule gearbeitet hat. Die Kabine versorgt vier Stockwerke und ist mit einer motorisierten T&amp;uuml;re ausgestattet. Der Hauptantrieb wird &amp;uuml;ber einen Geschwindigkeitswandler gesteuert.', 13, 186, 1);
INSERT INTO tbl_projects_history VALUES(213, 16, NULL, 2010, 'Ce projet consiste &amp;agrave; la conception d\'un simulateur des diff&amp;eacute;rents d&amp;eacute;marrages d\'un moteur &amp;agrave; courant alternatif. On doit pouvoir choisir sur un &amp;eacute;cran tactile les diff&amp;eacute;rents types de d&amp;eacute;marrage :&lt;br /&gt;1. D&amp;eacute;marrage directe&lt;br /&gt;2. D&amp;eacute;marrage &amp;eacute;toile-triangle&lt;br /&gt;3. D&amp;eacute;marrage &amp;eacute;lectronique doux&lt;br /&gt;4. D&amp;eacute;marrage &amp;agrave; l\'aide d\'un convertisseur de fr&amp;eacute;quences', 'Dieses Projekt soll die verschiedenen Startm&amp;ouml;glichkeiten eines Wechselstrom-Motors aufzeigen und simulieren. Man kann die verschiedenen M&amp;ouml;glichkeiten auf einem Touchscreen ausw&amp;auml;hlen. Die verschiedenen Startm&amp;ouml;glichkeiten sind: &lt;br /&gt;1.&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; Direkt-/Schnellstart&lt;br /&gt;2.&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; Stern-Dreieck-Start&lt;br /&gt;3.&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; elektronischer Softstart &lt;br /&gt;4.&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; Start mit einem Frequenzwandler', 11, 187, 1);
INSERT INTO tbl_projects_history VALUES(214, 149, NULL, 2010, 'Maquette didactique&amp;nbsp; destin&amp;eacute;e au pilotage et au param&amp;eacute;trage de moteurs&amp;nbsp; Brushless et moteur pas &amp;agrave; pas.', 'Didaktisches Modell, das der Steuerung und der Parametrierung von Brushless-Motoren und Schrittmotoren dient.', 12, 188, 2);
INSERT INTO tbl_projects_history VALUES(215, 9, NULL, 2010, 'Cette station m&amp;eacute;t&amp;eacute;o consiste &amp;agrave; r&amp;eacute;cup&amp;eacute;rer des mesures ext&amp;eacute;rieures de temp&amp;eacute;ratures, de vitesse du vent, de pluie et de pression pour exploiter ces donn&amp;eacute;es et les afficher sur un serveur Web (Pages Internet). Un essai de pr&amp;eacute;vision m&amp;eacute;t&amp;eacute;o a &amp;eacute;t&amp;eacute; &amp;eacute;galement impl&amp;eacute;ment&amp;eacute;. Ce projet a &amp;eacute;t&amp;eacute; r&amp;eacute;alis&amp;eacute; avec des capteurs professionnels et avec un automate de la marque Wago &amp;eacute;quip&amp;eacute; d&amp;rsquo;un Web Server.', 'Diese Meteostation soll Messungen von Aussentemperaturen, Windgeschwindigkeiten, von Regen und Luftdruck aufzeichnen, um sie anchliessend zu nutzen und auf einem Web-Server (Pages Internet) anzuzeigen. Der Versuch einer Wettervorhersage wurde ebenfalls implementiert. Diese Arbeit wurde mit hochkar&amp;auml;tigen Sensoren und einem Automaten der Marke Wago, ausger&amp;uuml;stet mit einem Web-Server, realisiert.', 13, 189, 1);
INSERT INTO tbl_projects_history VALUES(216, 150, NULL, 2010, 'Ce projet consiste &amp;agrave; d&amp;eacute;montrer des positions angulaires &amp;agrave; l&amp;rsquo;aide d&amp;rsquo;un moteur pas &amp;agrave; pas enti&amp;egrave;rement programm&amp;eacute; par un automate programmable pilot&amp;eacute; par un &amp;eacute;cran tactile. Il est pr&amp;eacute;vu comme support didactique pour les apprentis.', 'Diese Arbeit besteht darin, Eck-Positionen mit Hilfe eines Schrittmotors aufzuzeigen, der vollst&amp;auml;ndig durch einen &amp;uuml;ber Tochscreen steuerbaren, programmierbaren Automaten programmiert wird. Sie ist als didaktische Hilfe f&amp;uuml;r die Lehrlinge gedacht.', 10, 190, 1);
INSERT INTO tbl_projects_history VALUES(217, 65, NULL, 2009, 'Deuxi&amp;egrave;me mise en service d\'un robot industriel. D&amp;eacute;monstration des possibilit&amp;eacute;s de l\'engin en mode manuel et automatique.', 'Erste Inbetriebnahme eines industriellen Roboters. Demonstration der M&amp;ouml;glichkeiten des Ger&amp;auml;tes im manuellen Modus.', NULL, 64, 1);
INSERT INTO tbl_projects_history VALUES(218, 90, NULL, 2008, 'Un robot &amp;agrave; chenilles &amp;eacute;quip&amp;eacute; d\'un PC embarqu&amp;eacute;, d\'un cam&amp;eacute;ra vid&amp;eacute;o et d\'une carte d\'interface doit &amp;ecirc;tre pilot&amp;eacute; au travers d\'une liaison WiFi. La carte de pilotage &amp;agrave; base d\'uP est interfac&amp;eacute;e au PC embarqu&amp;eacute; par une liaison RS-232. Les langages de programmations utilis&amp;eacute;s sont: C++ sous Borland, PHP, Ajax,...', 'Ein Raupenroboter mit eingebautem PC, einer Videokamera und einer Interface-Karte muss mittels einer WiFi-Verbindung gesteuert werden. Die Steuerungskarte basiert auf einem Mikrokontroller und wird mittels RS-232 mit dem PC verbunden. Die verwendeten Programmiersprachen sind: C++ unter Borland, PHP, Ajax, ...', NULL, 65, 2);
INSERT INTO tbl_projects_history VALUES(219, 65, NULL, 2010, 'Mise en service d\'un robot industriel. Programmation d&amp;rsquo;une t&amp;acirc;che sur le robot et ex&amp;eacute;cution du programme en automatique.', 'Inbetriebnahme eines Industrie-Roboters. Programmierung einer Roboteraufgabe und automatische Ausf&amp;uuml;hrung des Programmes.', 13, 64, 1);
INSERT INTO tbl_projects_history VALUES(220, 79, NULL, 2009, 'Le lavage de voiture est un ancien projet qui a &amp;eacute;t&amp;eacute; remis au go&amp;ucirc;t du jour. L\'ancienne armoire de commande a &amp;eacute;t&amp;eacute; compl&amp;egrave;tement int&amp;eacute;gr&amp;eacute;e dans un nouveau chassis roulant. Le pupitre de commande a &amp;eacute;t&amp;eacute; remplac&amp;eacute; par un &amp;eacute;cran d\'exploitation et le programme a &amp;eacute;t&amp;eacute; simplifi&amp;eacute; pour rendre cette maquette r&amp;eacute;elle. Des joysticks permettent d\'effectuer tous les mouvements pour la maintenance.', 'Die Autowaschanlage ist ein altes Projekt was erneuert werden muss. Der alte Schaltkasten wird unter der Waschanlage im neuen Gestell installiert um das bewegen der Anlage zu vereinfachen. &amp;Auml;nderungen beim Programm vereinfachen dann das bedienen und durch die neuen Joysticks wird der CarWash zu einem wahren Erlebnis.', NULL, 12, 1);
INSERT INTO tbl_projects_history VALUES(221, 79, NULL, 2010, 'Le lavage de voiture est un ancien projet qui a &amp;eacute;t&amp;eacute; r&amp;eacute;nov&amp;eacute;. L\'ancienne armoire de commande a &amp;eacute;t&amp;eacute; compl&amp;egrave;tement int&amp;eacute;gr&amp;eacute;e dans un nouveau chassis roulant et un nouvel automate a &amp;eacute;t&amp;eacute; install&amp;eacute;.', 'Die Autowaschanlage ist ein altes Projekt was erneuert werden muss. Der alte Schaltkasten wird unter der Waschanlage im neuen Gestell installiert um das bewegen der Anlage zu vereinfachen und neue SPS wurde installiert.', 11, 12, 1);
INSERT INTO tbl_projects_history VALUES(222, 151, NULL, 2010, 'Notre but consistait de cr&amp;eacute;er un petit simulateur de vol en 3D. Pour obtenir un peu plus d\'interactivit&amp;eacute;, nous avons connect&amp;eacute; le wiimote &amp;agrave; l\'ordinateur, afin de pouvoir naviguer l\'avion en inclinant le wiimote.', 'Our goal was to create a small flightsimulator in 3d space. For a bit more interactivity we connected the wiimote with the computer, so that we are able to navigate the aeroplane by tilting the wiimote.', 5, 191, 3);
INSERT INTO tbl_projects_history VALUES(223, 152, NULL, 2010, 'Notre projet se nomme &quot;Accountancy Manager&quot;, ce qui veut dire &quot;Manager de bilans&quot;. Comme en laisse pr&amp;eacute;sumer le nom, il s\'agit ici d\'un programme servant &amp;agrave; &amp;eacute;tablir des bilans. A l\'aide du programme il est possible d\'&amp;eacute;tablir quelques comptes actifs et passifs, d\'y inscrire des donn&amp;eacute;es et de se laisser calculer les bilans. Le programme a &amp;eacute;t&amp;eacute; &amp;eacute;crit en C#.', 'Unser Projekt nennt sich &quot;Accountancy Manager&quot;, was auf Deutsch &amp;uuml;bersetzt so viel bedeutet wie &quot;Bilanzmanager&quot;. Wie der Name schon vermuten l&amp;auml;sst, handelt es sich hierbei um ein Programm, welches dazu dient, Bilanzen aufzustellen. Es ist m&amp;ouml;glich mit Hilfe des Programms einzelne Aktiv- und Passivkonten zu erstellen, diesen Werte zuzuweisen und sich dadurch die Bilanz erstellen zu lassen. Das Programm wurde mit der Programmiersprache C# geschrieben.', 16, 192, 3);
INSERT INTO tbl_projects_history VALUES(224, 153, NULL, 2010, 'R&amp;eacute;alisation d\'une application, qui consiste &amp;agrave; &amp;eacute;tablir une sorte de diagramme d\'un curriculum vitae d\'une personne, dont les donn&amp;eacute;es et informations fournies seront &amp;eacute;ventuellement sauvegard&amp;eacute;s dans une base de donn&amp;eacute;es. D\'autres entr&amp;eacute;es pourront y &amp;ecirc;tre effectu&amp;eacute;es et trait&amp;eacute;es. L\'application est r&amp;eacute;alis&amp;eacute;e en PHP. Chaque partie mentionn&amp;eacute;e du CV figurera en une couleur diff&amp;eacute;rente sur le diagramme de barres. De plus, plusieurs informations concernant une barre du diagramme seront rendues visibles.', 'Verwirklichung einer Anwendung, welche aus den gegebenen Daten und Informationen von einer Person, welche eventuell sp&amp;auml;ter in einer Datenbank gespeichert werden,ein Lebenslaufdiagramm erstellt. Anschliessend kann man Eintr&amp;auml;ge hinzuf&amp;uuml;gen und bearbeiten. Die Anwendung soll mittels PHP realisiert werden. Jeder Abschnitt, der im Lebenslauf erw&amp;auml;hnt wird, wird im Diagramm mit einer entsprechenden Balkenfarbe dargestellt. Zudem sollen diverse zu einem Balken geh&amp;ouml;rende Informationen sichtbar gemacht werden.', 16, 193, 3);
INSERT INTO tbl_projects_history VALUES(225, 22, NULL, 2010, 'Avec LuftGuitarHero une guitare &amp;agrave; air peut &amp;ecirc;tre jou&amp;eacute;e &amp;agrave; l\'aide de deux gants. Deux niveaux de jeu ainsi que cinq instruments diff&amp;eacute;rents peuvent &amp;ecirc;tre choisis. Une cam&amp;eacute;ra Web reconna&amp;icirc;t les mouvements de ses mains et le programme joue les notes/sons. Le programme laisse &amp;eacute;galement appara&amp;icirc;tre le joueur sur vid&amp;eacute;o-projecteur.', 'Bei LuftGuitarHero kann mittels zwei Handschuhen eine Luftgitarre gespielt werden. Dabei gibt es zwei verschiedene Spielmodi und 5 verschiedene w&amp;auml;hlbare Instrumente. Eine Webcam erkennt, wie der Spieler seine H&amp;auml;nde bewegt und das Programm spielt daraufhin die T&amp;ouml;ne. Ausserdem zeigt das Programm den Spieler auf dem Beamer.', 4, 22, 3);
INSERT INTO tbl_projects_history VALUES(226, 154, NULL, 2010, 'Projet consistant &amp;agrave; analyser des pages historiques du site Internet Wikipedia pour afficher une ligne temporelle avec les &amp;eacute;v&amp;eacute;nements importants de l\'Histoire.', 'Das Vorhaben besteht darin, historische Daten des Internetportals Wikipedia zu analysieren, um daraus eine Zeitleiste mit wichtigen Ereignissen der Geschichte anzuzeigen.', 4, NULL, 3);
INSERT INTO tbl_projects_history VALUES(227, 155, 3, 2012, 'Syst&amp;egrave;me permettant la mise &amp;agrave; jour automatique d&amp;rsquo;une galerie photo diffus&amp;eacute;e par un serveur Web. Les images ainsi affich&amp;eacute;es proviennent de pi&amp;egrave;ces jointes envoy&amp;eacute;es &amp;agrave; un compte mail.
Un processus r&amp;eacute;cup&amp;egrave;re ces fichiers et les enregistre dans le bon dossier contenant les images de la galerie photo. (Infrastructure r&amp;eacute;seau sans fil, Service DNS, Serveur de messagerie, Serveur Web, Programmation)', 'System, welches eine automatische Aktualisierung einer von einem Web-Server &amp;uuml;bertragenen Fotogalerie erm&amp;ouml;glicht. Die so angezeigten Bilder stammen von Datei-Attachments, welche einem E-Mail-Konto gesandt wurden.
Ein Verfahren nimmt diese Dateien auf und speichert sie im richtigen Ordner, welcher die Bilder der Fotogalerie enth&amp;auml;lt. (Drahtloses Netzwerk, DNS-Service, E-Mail-Server, Webserver, Programmierung)
&lt;div&gt;&amp;nbsp;&lt;/div&gt;', 15, 255, 3);
INSERT INTO tbl_projects_history VALUES(228, 156, NULL, 2011, NULL, NULL, NULL, 207, 3);
INSERT INTO tbl_projects_history VALUES(229, 157, NULL, 2011, NULL, NULL, NULL, 208, 3);
INSERT INTO tbl_projects_history VALUES(230, 158, NULL, 2011, NULL, NULL, NULL, 209, 3);
INSERT INTO tbl_projects_history VALUES(231, 159, NULL, 2011, NULL, NULL, NULL, NULL, 3);
INSERT INTO tbl_projects_history VALUES(232, 160, NULL, 2011, NULL, NULL, NULL, 210, 3);
INSERT INTO tbl_projects_history VALUES(233, 161, NULL, 2011, '&amp;laquo;&amp;nbsp; Minority Report&amp;nbsp; &amp;raquo; est une application amenant &amp;agrave; contr&amp;ocirc;ler le pointeur d\'un ordinateur avec la cam&amp;eacute;ra &amp;laquo;&amp;nbsp; Kinect&amp;nbsp; &amp;raquo;. Les mouvements humains sont interpr&amp;eacute;t&amp;eacute;s afin d\'interagir avec le syst&amp;egrave;me d\'exploitation et permettre ainsi de d&amp;eacute;placer une fen&amp;ecirc;tre ou de cliquer. La cam&amp;eacute;ra permet de d&amp;eacute;terminer la profondeur de chaque points film&amp;eacute;s. C\'est cette valeur de profondeur qui est utilis&amp;eacute; pour d&amp;eacute;terminer la position et l\'&amp;eacute;tat (ouvert ou ferm&amp;eacute;) des mains de l\'utilisateur ce qui permet ensuite de piloter le pointeur de l\'ordinateur. L\'application est r&amp;eacute;alis&amp;eacute;e en java et la biblioth&amp;egrave;que processing.', NULL, NULL, 211, 3);
INSERT INTO tbl_projects_history VALUES(234, 162, NULL, 2011, 'Le but de ce projet est de permettre un basculement automatis&amp;eacute; d\'ordinateurs portables dans un VLAN appropri&amp;eacute;. Si l\'ordinateur du visiteur r&amp;eacute;pond &amp;agrave; tous les crit&amp;egrave;res de s&amp;eacute;curit&amp;eacute; fix&amp;eacute;s (version du syst&amp;egrave;me d\'exploitation, service pack install&amp;eacute;, logiciel d&amp;rsquo;antivirus &amp;agrave; jour, compte et mot de passe valides ou autre), il est automatiquement reli&amp;eacute; au VLAN des enseignants authentifi&amp;eacute;s, sinon il est redirig&amp;eacute; vers le VLAN des visiteurs avec un acc&amp;egrave;s limit&amp;eacute; &amp;agrave; Internet.', NULL, NULL, 212, 3);
INSERT INTO tbl_projects_history VALUES(235, 163, NULL, 2011, 'Jeu vid&amp;eacute;o multijoueurs en r&amp;eacute;seau mettant en sc&amp;egrave;ne des avions contr&amp;ocirc;l&amp;eacute;s au moyen du clavier. Chaque joueur pilote un avion dans un environnement 2D. Le joueur pilote son avion sur une vaste carte de jeu, dans laquelle une \'cam&amp;eacute;ra\' le suit. Le but est d\'abattre au moyen de tirs de missile, le plus d\'avions ennemis contr&amp;ocirc;l&amp;eacute;s par les autres joueurs, dans un syst&amp;egrave;me de combat en &amp;eacute;quipe (de 1 &amp;agrave; 6 joueurs par &amp;eacute;quipe). L\'&amp;eacute;quipe vainqueur est celle ayant &amp;eacute;limin&amp;eacute; le plus d\'adversaires.', NULL, NULL, 213, 3);
INSERT INTO tbl_projects_history VALUES(236, 164, NULL, 2011, 'Mise en place d\'un tableau blanc interactif permettant d\'utiliser une wiimote reli&amp;eacute; &amp;agrave; un stylo infrarouge pour dessiner directement sur l\'&amp;eacute;cran du PC projet&amp;eacute; par le vid&amp;eacute;oprojecteur. Le tableau interactif fait office de support; on va d&amp;eacute;placer le stylo infrarouge sur le tableau pour piloter l\'interface d\'un programme de dessin.', NULL, NULL, NULL, 3);
INSERT INTO tbl_projects_history VALUES(237, 165, NULL, 2011, 'Robocode est un jeu ou des robots en forme de tank combattent les uns contre les autres. Chaque robot est programm&amp;eacute;s &amp;agrave; l\'aide du langage java. Les robots peuvent se &amp;laquo; voir &amp;raquo; gr&amp;acirc;ce &amp;agrave; leur radar mais ils n\'arrivent pas &amp;agrave; d&amp;eacute;tecter les projectiles. Ils faut donc qu\'ils utilisent les strat&amp;eacute;gies les plus diverses pour &amp;ecirc;tre le dernier survivant. Plusieurs des robots d&amp;eacute;velopp&amp;eacute;s par les &amp;eacute;l&amp;egrave;ves de l\'EMVs sont pr&amp;eacute;sent&amp;eacute;s.', NULL, NULL, 214, 3);
INSERT INTO tbl_projects_history VALUES(238, 2, NULL, 2011, 'Application de questionnaires &amp;agrave; choix multiples (min. 3) r&amp;eacute;alis&amp;eacute;e sur la console de jeux&amp;nbsp; Nintendo DS. L\'utilisateur doit commencer par choisir un questionnaire parmi ceux qui sont propos&amp;eacute;s (stock&amp;eacute;s sur un serveur Windows atteignable via WiFi), ainsi que le niveau de difficult&amp;eacute;. Les questions sont pos&amp;eacute;es dans un ordre al&amp;eacute;atoire et l\'utilisateur doit y r&amp;eacute;pondre. Chaque question poss&amp;egrave;de plusieurs r&amp;eacute;ponses possibles class&amp;eacute;es al&amp;eacute;atoirement, mais une seule est correcte. A la fin du questionnaire, le score obtenu est affich&amp;eacute;.', NULL, NULL, 215, 3);
INSERT INTO tbl_projects_history VALUES(239, 166, NULL, 2011, 'Ce projet permet de jouer du piano avec les pieds &amp;agrave; l\'aide de la cam&amp;eacute;ra 3D Kinect de Microsoft. Le clavier est repr&amp;eacute;sent&amp;eacute; virtuellement en l\'ajoutant &amp;agrave; l\'image film&amp;eacute;e par la cam&amp;eacute;ra. Lorsque un pied se trouve sur une touche, un son est jou&amp;eacute;. La cam&amp;eacute;ra Kinect g&amp;egrave;re la position du clavier dans l\'espace et est capable de voir si un objet se trouve sur une touche en calculant la profondeur de ce dernier.', NULL, NULL, NULL, 3);
INSERT INTO tbl_projects_history VALUES(241, 168, NULL, 2011, 'Mein Projekt ist ein Personenz&amp;auml;hler der durch zwei Sensoren auf H&amp;uuml;fth&amp;ouml;he herausfindet ob eine Person rein oder raus gegangen ist. Man kann dann die Anzahl der Personen im Inneren, die Anzahl der Leute die bereits gegangen sind oder einfach nur wie viele Leute eingetreten sind &amp;uuml;ber die grossen 7-Segmentanzeigen auf dem Personenz&amp;auml;hler anzeigen. Man kann an der Steuereinheit den Anzeigemodus f&amp;uuml;r die innere und die &amp;auml;ussere Anzeige seperat &amp;auml;ndern sowie die Werte inkrementieren oder wieder auf Null setzen.', NULL, 3, 217, 2);
INSERT INTO tbl_projects_history VALUES(242, 169, NULL, 2011, 'Ce projet consiste &amp;agrave; dimensionner la partie puissance ainsi que&lt;br /&gt;la partie programmation d&amp;rsquo;une commande &amp;agrave; moteur qui servira &amp;agrave; &lt;br /&gt;faire tourner un four &amp;agrave; ch&amp;acirc;taigne pour ne plus &amp;agrave; le faire manuellement.', NULL, NULL, 218, 2);
INSERT INTO tbl_projects_history VALUES(243, 170, NULL, 2011, 'Ce projet consiste &amp;agrave; r&amp;eacute;aliser une matrice &amp;agrave; LEDs mono-couleur g&amp;eacute;ante pouvant &amp;ecirc;tre command&amp;eacute; par un PC via une interface s&amp;eacute;rie.&lt;br /&gt;La matrice &amp;agrave; LEDs a une r&amp;eacute;solution de 152x56 LEDs.&lt;br /&gt;La partie commande int&amp;egrave;gre une RTC pour pouvoir afficher l\'heure, une carte SD pour sauvegarder diff&amp;eacute;rentes images et &lt;br /&gt;un r&amp;eacute;cepteur infrarouge pour offrir &amp;agrave; l\'utilisateur la possibilit&amp;eacute; de s&amp;eacute;lectionner divers param&amp;egrave;tres.', NULL, NULL, 219, 2);
INSERT INTO tbl_projects_history VALUES(244, 170, NULL, 2011, 'Ce projet consiste &amp;agrave; r&amp;eacute;aliser une matrice &amp;agrave; LEDs mono-couleur g&amp;eacute;ante pouvant &amp;ecirc;tre command&amp;eacute; par un PC via une interface s&amp;eacute;rie.&lt;br /&gt;La matrice &amp;agrave; LEDs a une r&amp;eacute;solution de 152x56 LEDs.&lt;br /&gt;La partie commande int&amp;egrave;gre une RTC pour pouvoir afficher l\'heure, une carte SD pour sauvegarder diff&amp;eacute;rentes images et &lt;br /&gt;un r&amp;eacute;cepteur infrarouge pour offrir &amp;agrave; l\'utilisateur la possibilit&amp;eacute; de s&amp;eacute;lectionner divers param&amp;egrave;tres.', NULL, NULL, 219, 2);
INSERT INTO tbl_projects_history VALUES(245, 170, NULL, 2011, 'Ce projet consiste &amp;agrave; r&amp;eacute;aliser une matrice &amp;agrave; LEDs mono-couleur g&amp;eacute;ante pouvant &amp;ecirc;tre command&amp;eacute; par un PC via une interface s&amp;eacute;rie.&lt;br /&gt;La matrice &amp;agrave; LEDs a une r&amp;eacute;solution de 152x56 LEDs.&lt;br /&gt;La partie commande int&amp;egrave;gre une RTC pour pouvoir afficher l\'heure, une carte SD pour sauvegarder diff&amp;eacute;rentes images et &lt;br /&gt;un r&amp;eacute;cepteur infrarouge pour offrir &amp;agrave; l\'utilisateur la possibilit&amp;eacute; de s&amp;eacute;lectionner divers param&amp;egrave;tres.', NULL, NULL, 219, 2);
INSERT INTO tbl_projects_history VALUES(246, 170, NULL, 2011, 'Ce projet consiste &amp;agrave; r&amp;eacute;aliser une matrice &amp;agrave; LEDs mono-couleur g&amp;eacute;ante pouvant &amp;ecirc;tre command&amp;eacute; par un PC via une interface s&amp;eacute;rie.&lt;br /&gt;La matrice &amp;agrave; LEDs a une r&amp;eacute;solution de 152x56 LEDs.&lt;br /&gt;La partie commande int&amp;egrave;gre une RTC pour pouvoir afficher l\'heure, une carte SD pour sauvegarder diff&amp;eacute;rentes images et &lt;br /&gt;un r&amp;eacute;cepteur infrarouge pour offrir &amp;agrave; l\'utilisateur la possibilit&amp;eacute; de s&amp;eacute;lectionner divers param&amp;egrave;tres.', NULL, NULL, 219, 2);
INSERT INTO tbl_projects_history VALUES(247, 171, NULL, 2011, 'Ce projet permet d\'afficher la temp&amp;eacute;rature de la pi&amp;egrave;ce. Gr&amp;acirc;ce &amp;agrave; un algorithme, le PIC calcul la vitesse des ultrasons (du son dans l\'aire).&lt;br /&gt;Ensuite, la diff&amp;eacute;rence entre la radio fr&amp;eacute;quence et les ultrasons nous donne le temps entre les deux cartes.&lt;br /&gt;Nous connaissons maintenant la vitesse &amp;agrave; une certaine temp&amp;eacute;rature et le temps que m\'est les ultrasons, donc nous pouvons en d&amp;eacute;duire la distance.', NULL, NULL, 220, 3);
INSERT INTO tbl_projects_history VALUES(248, 172, NULL, 2011, 'Le Th&amp;eacute;r&amp;eacute;min est l\'un des instruments de musique &amp;eacute;lectronique au monde. Il a &amp;eacute;t&amp;eacute; invent&amp;eacute; par un Russe nomm&amp;eacute; Lev Sergeyevich Termen (Appel&amp;eacute; aussi L&amp;eacute;on Theremin).&lt;br /&gt;Son principe de fonctionnement est le suivant: La tonalit&amp;eacute; de la note varie en fonction de la position de la main par rapport &amp;agrave; l\'antenne verticale et le volume varie en fonction de la position de la main par rapport &amp;agrave; l\'antenne horizontale.&lt;br /&gt;Il &amp;eacute;tait beaucoup utilis&amp;eacute; dans les ann&amp;eacute;es 50 pour faire des musiques d\'ambiance dans les films de science-fiction.&lt;br /&gt;Actuellement il est aussi utilis&amp;eacute; dans un ou deux morceaux de groupes de musiques de diff&amp;eacute;rends genres tel que : Muse, System of a down, The Beach Boys, Radiohead, Led Zeppelin...', NULL, NULL, 221, 2);
INSERT INTO tbl_projects_history VALUES(250, 174, NULL, 2011, 'Le but de ce projet &amp;eacute;tait de r&amp;eacute;aliser une robot holonome,&lt;br /&gt;c\'est &amp;agrave; dire un robot &amp;agrave; trois roues omnidirectionnelles.&lt;br /&gt;&lt;br /&gt;Pour cela les trois moteurs doivent &amp;ecirc;tre d&amp;eacute;phas&amp;eacute;s de&lt;br /&gt;120&amp;deg; chacun.&lt;br /&gt;&lt;br /&gt;Le robot se d&amp;eacute;place dans la direction avant et arri&amp;egrave;re des 3 moteurs.&lt;br /&gt;Les moteurs sont prot&amp;eacute;g&amp;eacute;s par 6 capteurs infrarouges d&amp;eacute;tectant un object &amp;agrave; 5 cm.&lt;br /&gt;&lt;br /&gt;Et le robot est t&amp;eacute;l&amp;eacute;comandable par une t&amp;eacute;l&amp;eacute;comande infrarouge.', NULL, NULL, NULL, 2);
INSERT INTO tbl_projects_history VALUES(251, 167, NULL, 2011, 'Le but de mon projet &amp;eacute;tait de cr&amp;eacute;er un pupitre de loto pour faciliter le travail du crieur.&lt;br /&gt;&lt;br /&gt;Pour cela, une dalle enti&amp;egrave;rement tactile a &amp;eacute;t&amp;eacute; int&amp;eacute;gr&amp;eacute;e au projet, permettant ainsi tr&amp;egrave;s simplement la s&amp;eacute;lection des num&amp;eacute;ro sortant. En plus de cela, un &amp;eacute;cran LCD permet l\\\'affichage de toutes les informations utiles.
On pourra imaginer aussi pouvoir faire jouer des personnes n\\\'&amp;eacute;tant pas pr&amp;eacute;sente lors de la partie, grace &amp;agrave; une m&amp;eacute;moire externe, o&amp;ugrave; sont stock&amp;eacute;e toutes les cartes en jeu.', NULL, NULL, 223, 2);
INSERT INTO tbl_projects_history VALUES(252, 175, NULL, 2011, 'CE PROJET CONSISTE &amp;Agrave; CR&amp;Eacute;ER UN BANC DE TESTS POUR MONTRES &amp;Agrave; QUARTZ. &lt;br /&gt;CELUI-CI DOIT &amp;Ecirc;TRE CAPABLE DE MESURER LE COURANT CIRCULANT DANS&lt;br /&gt;LA MONTRE, L&amp;rsquo;ERREUR DE CELLE-CI SUR UNE JOURN&amp;Eacute;E ET LA R&amp;Eacute;SISTANCE&lt;br /&gt;DE LA BOBINE DE CUIVRE QUI SE TROUVE &amp;Agrave; L&amp;rsquo;INT&amp;Eacute;RIEUR DES MONTRES. &lt;br /&gt;LE BANC DE TESTS DOIT AUSSI &amp;Ecirc;TRE CAPABLE DE G&amp;Eacute;N&amp;Eacute;RER DES IMPULSIONS &lt;br /&gt;ET DES TENSIONS TR&amp;Egrave;S PR&amp;Eacute;CISES. LE TOUT DOIT &amp;Ecirc;TRE INT&amp;Eacute;GR&amp;Eacute; DANS &lt;br /&gt;UN BOITIER ET &amp;Ecirc;TRE ALIMENT&amp;Eacute; PAR LE R&amp;Eacute;SEAU 230V.', NULL, NULL, 224, 2);
INSERT INTO tbl_projects_history VALUES(253, 176, NULL, 2011, NULL, 'Der Move Master II ist ein Roboterarm, welcher 1984 von der EMVs gekauft wurde, da seine Steuerung defekt war. Die Hardware zur Ansteuerung der&lt;br /&gt;Motoren wurde von diversen Sch&amp;uuml;lern komplett neu entwickelt.&lt;br /&gt;&lt;br /&gt;Meine Aufgabe war, die Mikroprozessoren neu zu programmieren, so dass die Steuerung ihre Befehle entweder &amp;uuml;ber einen Joystick, oder &amp;uuml;ber eine&lt;br /&gt;RS232-Verbindung mit einem Computer erhalten kann. Ebenso war eine Software auf dem Computer zu programmieren, welche die Steuerung &amp;uuml;bernehmen kann.', NULL, 225, 2);
INSERT INTO tbl_projects_history VALUES(255, 177, NULL, 2011, 'Ce projet est centr&amp;eacute; sur une carte Altera DE1, un kit de d&amp;eacute;veloppement pr&amp;eacute;vu pour&lt;br /&gt;d&amp;eacute;buter en programmation VHDL sur un FPGA.&lt;br /&gt;Le VHDL est un langage de programmation pour circuit int&amp;eacute;gr&amp;eacute; tr&amp;egrave;s rapides.&lt;br /&gt;Un FPGA est un composant &amp;eacute;lectronique r&amp;eacute;cent, programmable et disposant d\'un tr&amp;egrave;s&lt;br /&gt;grand nombre d\'entr&amp;eacute;es/sorties. Les possibilit&amp;eacute;s sont &amp;eacute;normes gr&amp;acirc;ce &amp;agrave; la rapidit&amp;eacute;&lt;br /&gt;de ce composant et &amp;agrave; sa capacit&amp;eacute; &amp;agrave; g&amp;eacute;rer plusieurs codes en m&amp;ecirc;me temps.&lt;br /&gt;&lt;br /&gt;J\'ai programm&amp;eacute; un pong sur un &amp;eacute;cran VGA d\'ordinateur command&amp;eacute; par un clavier. Je&lt;br /&gt;commande &amp;eacute;galement un robot Fischertechnik.', NULL, NULL, 226, 2);
INSERT INTO tbl_projects_history VALUES(256, 174, NULL, 2011, 'Le but de ce projet &amp;eacute;tait de r&amp;eacute;aliser une robot holonome, c\'est &amp;agrave; dire un robot &amp;agrave; trois roues omnidirectionnelles. Pour cela les trois moteurs doivent &amp;ecirc;tre d&amp;eacute;phas&amp;eacute;s de 120&amp;deg; chacun.&lt;br /&gt;&lt;br /&gt;Le robot se d&amp;eacute;place dans la direction avant et arri&amp;egrave;re des 3 moteurs. Les moteurs sont prot&amp;eacute;g&amp;eacute;s par 6 capteurs infrarouges d&amp;eacute;tectant un object &amp;agrave; 5 cm. Et le robot est t&amp;eacute;l&amp;eacute;comandable par une t&amp;eacute;l&amp;eacute;comande infrarouge.', NULL, NULL, NULL, 2);
INSERT INTO tbl_projects_history VALUES(257, 173, NULL, 2011, 'Ce projet a pour but la conception d\\\'un stimulateur pour une personne souffrant d\\\'hypersomnie.La personne en question a peu de moyens. Il faut donc r&amp;eacute;duire les co&amp;ucirc;ts au maximum. Elle a acc&amp;egrave;s &amp;agrave; un ordinateur, qui toutefois appartient &amp;agrave; une association de sport-handicap. Ses attentes sont de pouvoir se r&amp;eacute;veiller seul le matin, ainsi que la jourm&amp;eacute;e apr&amp;egrave;s ses siestes (en principe 3 par jour). Elle souhaiterait &amp;eacute;galement avoir un syst&amp;egrave;me lui permettant de se r&amp;eacute;veiller de mani&amp;egrave;re s&amp;ucirc;re lorsqu\\\'elle se trouve &amp;agrave; l\\\'ext&amp;eacute;rieur (en train, notamment).&lt;br /&gt;Ce projet consiste donc &amp;agrave; concevoir pour cette personne une sorte de pacemaker, qui permettrait de la r&amp;eacute;veiller, et surtout&amp;nbsp; de la maintenir &amp;eacute;veill&amp;eacute;e. Pour cela, diff&amp;eacute;rents proc&amp;eacute;d&amp;eacute;s peuvent &amp;ecirc;tre mis en oeuvre, par exemple lui passer de la musique variable et al&amp;eacute;atoire, lui mettre une ceinture avec un vibreur ou des lampes flashs pour la r&amp;eacute;veiller. On&lt;br /&gt;pourrait&amp;nbsp;&amp;nbsp; m&amp;ecirc;me&amp;nbsp;&amp;nbsp; envisager&amp;nbsp;&amp;nbsp; de&amp;nbsp;&amp;nbsp; micro-d&amp;eacute;charges&amp;nbsp;&amp;nbsp; &amp;eacute;lectriques.&amp;nbsp;&amp;nbsp; Un&amp;nbsp;&amp;nbsp; des&amp;nbsp;&amp;nbsp; points&amp;nbsp;&amp;nbsp; essentiels&amp;nbsp;&amp;nbsp; est&amp;nbsp;&amp;nbsp; que&amp;nbsp;&amp;nbsp; le&amp;nbsp;&amp;nbsp; syst&amp;egrave;me&amp;nbsp;&amp;nbsp; doit&amp;nbsp;&amp;nbsp; &amp;ecirc;tre portatif, par cons&amp;eacute;quent&amp;nbsp; autonome, de petite taille et discret.', NULL, NULL, 222, 2);
INSERT INTO tbl_projects_history VALUES(258, 150, NULL, 2011, 'Pilotage d\'un moteur pas &amp;agrave; pas par un automate programmable.', NULL, NULL, 190, 1);
INSERT INTO tbl_projects_history VALUES(259, 98, NULL, 2008, 'Le but vis&amp;eacute; par ce projet est l\'automatisation de diff&amp;eacute;rentes fonctions d\'une piscine. Jusqu\'&amp;agrave; pr&amp;eacute;sent, mon client, M.Margelisch, devait actionner manuellement son installation. Pour changer cela, un &amp;eacute;cran tactile et un API ont &amp;eacute;t&amp;eacute; install&amp;eacute;s pour g&amp;eacute;rer la filtration, les buses, les jets ainsi que l\'arrosage des abords de la piscine.', 'Das angestrebte Ziel dieses Projektes ist es, verschiedenen Funktionen eines Schwimmbades zu automatisieren. Bis jetzt musste unser Kunde, Herr Margelisch, seine Schwimmbadinstallation manuell bedienen. Um das zu &amp;auml;ndern, wurde ein Touch-Screen und eine SPS (fr. API) installiert, um die Filterung, die D&amp;uuml;sen, die Wasser-W&amp;uuml;rfe und die Berieselung des Schwimmbadzugangs zu verwalten.', NULL, 75, 1);
INSERT INTO tbl_projects_history VALUES(260, 98, NULL, 2011, 'Maquette,&amp;nbsp; repr&amp;eacute;sentant la gestion par un automate d\'une piscine grandeur r&amp;eacute;el.', NULL, NULL, 75, 1);
INSERT INTO tbl_projects_history VALUES(261, 149, NULL, 2011, 'Ce projet consiste &amp;agrave; trier des pi&amp;egrave;ces de mati&amp;egrave;res diff&amp;eacute;rentes et de les &amp;eacute;vacuer avec un moteur lin&amp;eacute;aire de type brushless.', NULL, NULL, 188, 1);
INSERT INTO tbl_projects_history VALUES(262, 178, NULL, 2011, 'Ce projet est con&amp;ccedil;u enti&amp;egrave;rement avec du mat&amp;eacute;riel Allen-Bradley qui nous a &amp;eacute;t&amp;eacute; offert. Il consiste &amp;agrave; piloter divers moteurs (Brushless et asynchrone) par un automate programmable API et un &amp;eacute;cran tactile HMI.', NULL, NULL, NULL, 1);
INSERT INTO tbl_projects_history VALUES(263, 72, NULL, 2011, 'Ce projet consiste en l\'automatisation d\'une cha&amp;icirc;ne de production &amp;eacute;lectropneumatique miniature. C&amp;rsquo;est une simulation d&amp;rsquo;une cha&amp;icirc;ne de montage. Le processus consiste &amp;agrave; assembler plusieurs pi&amp;egrave;ces tel qu&amp;rsquo;une base, un roulement, un axe et un couvercle.', NULL, NULL, 182, 1);
INSERT INTO tbl_projects_history VALUES(264, 16, NULL, 2011, 'Ce projet consiste &amp;agrave; la conception d\'un simulateur des diff&amp;eacute;rents d&amp;eacute;marrages d\'un moteur &amp;agrave; courant alternatif. On doit pouvoir choisir sur un &amp;eacute;cran tactile les diff&amp;eacute;rents types de d&amp;eacute;marrage :&lt;br /&gt;1. D&amp;eacute;marrage directe&lt;br /&gt;2. D&amp;eacute;marrage &amp;eacute;toile-triangle&lt;br /&gt;3. D&amp;eacute;marrage &amp;eacute;lectronique doux&lt;br /&gt;4. D&amp;eacute;marrage &amp;agrave; l\'aide d\'un convertisseur de fr&amp;eacute;quences', NULL, 11, 76, 1);
INSERT INTO tbl_projects_history VALUES(265, 179, NULL, 2011, 'Le but est de repr&amp;eacute;senter de mani&amp;egrave;re r&amp;eacute;duite, le gestion par des automates programmables de diff&amp;eacute;rentes machines ou appareils utilis&amp;eacute; dans l\'industrie via des bus de terrain.', NULL, 10, NULL, 3);
INSERT INTO tbl_projects_history VALUES(266, 153, 3, 2012, 'Ce projet est une application web qui permet &amp;agrave; un utilisateur quelconque d\\\'entrer les activit&amp;eacute;s&amp;nbsp;qu\\\'il a faites au long de sa vie et de les afficher sous forme de diagramme.
Ces donn&amp;eacute;es pourront, de plus, &amp;ecirc;tre export&amp;eacute;es ou import&amp;eacute;es dans un fichier au format XML.', 'Es handelt sich hierbei um ein Webseite, die es einem beliebigen Nutzer erm&amp;ouml;glicht, die Aktivit&amp;auml;ten w&amp;auml;hrend seines ganzen Lebens einzugeben und sie dann in Diagrammform erscheinen zu lassen.
Diese Daten k&amp;ouml;nnen in einem XML-Dateiformat ex- oder importiert werden.
&lt;div&gt;&amp;nbsp;&lt;/div&gt;', 15, 193, 3);
INSERT INTO tbl_projects_history VALUES(267, 180, 3, 2012, 'ShareBOX est une plateforme de partage. C\\\'est un site web qui permet d\\\'h&amp;eacute;berger des fichiers et des les partager.&amp;nbsp;On peut aussi discuter avec d\\\'autres utilisateurs', 'ShareBOX ist eine Austausch-Plattform. Es handelt sich um eine Webseite, die es erlaubt, Dateien zu hosten und sie auszutauschen. Diese Plattform erm&amp;ouml;glicht auch den Austausch unter den Nutzern.
&lt;div&gt;&amp;nbsp;&lt;/div&gt;', 17, 235, 3);
INSERT INTO tbl_projects_history VALUES(268, 181, NULL, 2012, 'Application d&amp;eacute;velopp&amp;eacute;e pour iPhone! That\\\'s VS est une application qui consiste &amp;agrave; se localiser en Valais par rapport &amp;agrave; des points g&amp;eacute;ographiques importants du Valais : Monthey, Martigny, Sion, Sierre et Vi&amp;egrave;ge.
Elle permet aussi de localiser la position de l\\\'utilisateur, le lieu de l\\\'EMVs et de rechercher un lieu sur la carte.', 'F&amp;uuml;r iPhone entwickelte Anwendung! That\\\'s VS ist eine Anwendung, die der Lokalisierung im Wallis dient unter Ber&amp;uuml;cksichtigung wichtiger geographischer Walliser Bezugspunkte wie: Monthey, Martigny, Sitten, Siders und Visp.
Die Anwendung erm&amp;ouml;glicht es auch, den Standort des Benutzers und der EMVs herauszufinden und einen Ort auf der Karte zu suchen.
&lt;div&gt;&amp;nbsp;&lt;/div&gt;', 4, 246, 3);
INSERT INTO tbl_projects_history VALUES(269, 182, 1, 2012, 'Ce projet consiste &amp;agrave; cr&amp;eacute;er un site web qui affiche en permanence du contenu pr&amp;eacute;alablement planifi&amp;eacute; par l\\\'utilisateur.
L\\\'utilisateur utilisera la zone d\\\'administration pour ajouter du contenu et configurer quand et de quelle mani&amp;egrave;re le contenu doit &amp;ecirc;tre affich&amp;eacute; sur le site web.&lt;br /&gt;&lt;br /&gt;', 'Dieses Projekt dient der Erstellung einer Webseite, welche den vorg&amp;auml;ngig vom User ausgew&amp;auml;hlten Inhalt anzeigen wird.
Der Nutzer wird die Verwaltungszone benutzen, um Inhalte hinzuzuf&amp;uuml;gen und zu konfigurieren, wann und auf welche Weise der Inhalt auf der Webseite zu erscheinen hat.
&lt;div&gt;&amp;nbsp;&lt;/div&gt;', 4, 248, 3);
INSERT INTO tbl_projects_history VALUES(270, 183, 1, 2012, 'EMVs Transfert est un programme qui permet de copier des fichiers en multicast &amp;agrave; travers un r&amp;eacute;seau local sur diff&amp;eacute;rents clients depuis un serveur.
Le serveur est d&amp;eacute;di&amp;eacute; au professeur afin qu\\\'il puisse transf&amp;eacute;rer les fichiers n&amp;eacute;cessaires &amp;agrave; son cours et les clients sont destin&amp;eacute;s aux &amp;eacute;l&amp;egrave;ves pour qu\\\'ils puissent recevoir ces fichiers. Le temps de transfert reste identique quelque soit le nombre de clients, ceci en r&amp;eacute;alisant une copie en multicast.', 'EMVs Transfert ist ein Programm, das von einem Server aus eine Multicast-Kopierung von Dateien &amp;uuml;ber ein Lokalnetz auf verschiedene Kunden erm&amp;ouml;glicht.
Der Server ist dem Lehrer zugeordnet, damit er die f&amp;uuml;r seinen Unterricht notwendigen Dateien &amp;uuml;bermitteln kann und die Kunden sind den Sch&amp;uuml;lern zugewiesen, damit sie die Dateien erhalten k&amp;ouml;nnen. Die Transfertzeit bleibt unabh&amp;auml;ngig von der Kundenzahl identisch, indem auf Multicast eine Kopie erstellt wird.
&lt;div&gt;&amp;nbsp;&lt;/div&gt;', 5, 245, 3);
INSERT INTO tbl_projects_history VALUES(271, 184, 1, 2012, 'Ce projet a pour but de compter les personnes qui passent en un lieu &amp;agrave; l\\\'aide d\\\'un capteur Kinect de Microsoft. Il affiche un historique en temps r&amp;eacute;el sous forme d\\\'un graphique.
Lorsqu&amp;rsquo;on clique sur une des barres du graphique, repr&amp;eacute;sentant 15 minutes de donn&amp;eacute;es, on obtient une vue d&amp;eacute;taill&amp;eacute;e par minute.', 'Das Projekt hat zum Ziel, an einem bestimmten Ort durchlaufende Personen mittels eines Kinect-Rezeptors von Microsoft zu z&amp;auml;hlen. Es zeigt einen Verlauf im Echtzeitmodus in grafischer Form an.
Klickt man auf einen Balken der Grafik, welcher jeweils Daten von 15 Minuten entspricht, erh&amp;auml;lt man eine detaillierte Minuten-&amp;Uuml;bersicht.&amp;nbsp;
&lt;div&gt;&amp;nbsp;&lt;/div&gt;', 4, 247, 3);
INSERT INTO tbl_projects_history VALUES(272, 50, 1, 2012, 'Reprendre l\\\'application d&amp;eacute;velopp&amp;eacute;e pr&amp;eacute;c&amp;eacute;demment pour la Wii remote, en utilisant le p&amp;eacute;riph&amp;eacute;rique Kinect de la console Xbox sur un PC.
L\\\'utilisateur peut dessiner &amp;agrave; la main en utilisant diff&amp;eacute;rentes couleurs (et outils tels que sprays, pinceaux, ...). &lt;br /&gt;Son tableau sera reproduit et affich&amp;eacute; en direct via un beamer.', 'Die ehemals f&amp;uuml;r Wii-remote entwickelte Anwendung wieder aufnehmen, indem das Kinect-Peripherieger&amp;auml;t der Xbox-Konsole auf einem PC verwendet wird.
Der Benutzer kann unter Benutzung verschiedener Farben (und Tools wie Sprays, Pinsel, &amp;hellip;) von Hand zeichnen. Sein Bild wird via Beamer in Echtzeit erstellt und angezeigt.', 15, 244, 3);
INSERT INTO tbl_projects_history VALUES(274, 186, 3, 2012, 'Application d&amp;eacute;velopp&amp;eacute;e pour IPhone.&amp;nbsp;Elle permet d\\\'enregistrer automatiquement des informations de g&amp;eacute;olocalisation dans les photos prises par l\\\'appareil. Ces informations sont stock&amp;eacute;es sous forme de meta-balises directement dans les fichiers des photos.', 'F&amp;uuml;r iPhone entwickelte Anwendung. Sie erm&amp;ouml;glicht die automatische Speicherung von Informationen zur geografischen Lokalisierung in den Fotos, welche vom Ger&amp;auml;t gemacht wurden. Diese Informationen werden in Form von Meta-Tags direkt in den Fotodateien gespeichert.
&lt;div&gt;&amp;nbsp;&lt;/div&gt;
&amp;nbsp;', 17, 246, 3);
INSERT INTO tbl_projects_history VALUES(275, 187, 3, 2012, 'BitWar est un jeu de &amp;laquo; Bullet Hell &amp;raquo; se jouant en multijoueur sur le r&amp;eacute;seau.
Le plus important n&amp;rsquo;est pas de viser ses adversaires, mais plus d&amp;rsquo;esquiver leurs projectiles et de rester en vie le plus longtemps possible. Le moindre impact &amp;eacute;tant mortel.Choisissez votre vaisseau, chacun ayant son propre motif de tir et montrez votre talent &amp;agrave; l&amp;rsquo;esquive !
Ce jeu ne n&amp;eacute;cessite ni installation, ni plug-in. Il se joue dans votre navigateur Web et exploite les derniers standards HTML et JavaScript pour &amp;ecirc;tre accessible sur toutes les plate-formes.', 'BitWar ist ein Bullet Hell-Spiel, welches auf dem Netz mit mehreren Spielern gespielt wird.
Das Wichtigste hierbei ist nicht, auf seine Gegner zu zielen und zu schiessen, sondern eher deren Geschossen auszuweichen und m&amp;ouml;glichst lange am Leben zu bleiben. Die kleinste Ber&amp;uuml;hrung ist n&amp;auml;mlich t&amp;ouml;dlich. W&amp;auml;hlen Sie Ihr Raumschiff aus, jedes mit seinem eigenen Schussmotiv ausgestattet, und zeigen Sie Ihre Ausweichk&amp;uuml;nste!
Dieses Spiel bedarf weder einer Installation noch eines Plug-in. Es spielt sich auf Ihrem Browser und bedient sich der aktuelltsten HTML- und JavaScript-Standarts, um auf allen Plattformen zug&amp;auml;nglich zu sein.', 5, 249, 3);
INSERT INTO tbl_projects_history VALUES(276, 188, NULL, 2012, 'Le but de ce projet est la r&amp;eacute;alisation d&amp;rsquo;un robot pilot&amp;eacute; par un kit Bluetooth &amp;agrave; l&amp;rsquo;aide du PC.
L&amp;rsquo;interface du PC utilise un port s&amp;eacute;rie pour communiquer avec le module Bluetooth. Le robot est capable de se diriger manuellement ou automatiquement tout en &amp;eacute;vitant les obstacles se trouvant sur sa route.', 'Ziel des Projektes ist die Herstellung eines Roboters, welcher mittels eines Bluetooth-Kits mit Hilfe eines PC\\\'s gesteuert wird.
Die PC-Benutzeroberfl&amp;auml;che bedient sich eines Serieanschlusses, um mit dem Bluetooth-Modul zu kommunizieren. Der Roboter ist in der Lage, sich manuell oder automatisch fortzubewegen mit gleichzeitigem Ausweichen allf&amp;auml;llig auf seinem Weg befindlicher Hindernisse.
&lt;div&gt;&amp;nbsp;&lt;/div&gt;', 7, 251, 3);
INSERT INTO tbl_projects_history VALUES(277, 191, NULL, 2012, 'Ceci est un bras robotis&amp;eacute; qui peut &amp;ecirc;tre contr&amp;ocirc;l&amp;eacute; par un module de capteurs acc&amp;eacute;l&amp;eacute;rom&amp;eacute;triques et gyrom&amp;eacute;triques afin de suivre les mouvements du corps.
Les capteurs pourraient se trouver sur la main de l\\\'utilisateur par exemple. Il a fallu d&amp;eacute;velopper le pilotage par acc&amp;eacute;l&amp;eacute;rom&amp;egrave;tres et gyrom&amp;egrave;tres. Ensuite, la carte &amp;eacute;lectronique a &amp;eacute;t&amp;eacute; refaite et le programme de pilotage modifi&amp;eacute; pour la nouvelle carte. Un connecteur USB a &amp;eacute;t&amp;eacute; pr&amp;eacute;vu pour un possible futur d&amp;eacute;veloppement de pilotage par programme sur ordinateur.', 'Dies ist ein vollautomatischer Arm, der &amp;uuml;ber ein Modul von Beschleunigungs- und Winkelgeschwindigkeitssensoren gesteuert werden kann, um K&amp;ouml;rperbewegungen zu folgen.
Die Sensoren k&amp;ouml;nnten sich beispielsweise auf der Hand des Benutzers befinden. Es war n&amp;ouml;tig, die Steuerung mittels Geschwindigkeits- und Winkeldreh-Messern zu entwickeln. Anschliessend wurde die elektronische Karte neu erstellt und das Steuerungsprogramm f&amp;uuml;r die neue Karte angepasst. Ein USB-Anschluss wurde vorgesehen, um eine m&amp;ouml;gliche k&amp;uuml;nftige Steuerung mittels eines Programms auf PC zu entwickeln&amp;nbsp;', 6, 252, 2);
INSERT INTO tbl_projects_history VALUES(278, 192, NULL, 2012, 'J\\\'ai d&amp;ucirc;, lors de mon projet, d&amp;eacute;velopper un syst&amp;egrave;me permettant d\\\'afficher du texte ou des formes g&amp;eacute;om&amp;eacute;triques contre un mur &amp;agrave; l\\\'aide d\\\'un laser.
Pour cela ce sont des haut-parleurs qui, en vibrant vont d&amp;eacute;placer les miroirs fix&amp;eacute;s sur leur membrane et vont ainsi afficher ce que l\\\'on d&amp;eacute;sire contre le mur.', 'W&amp;auml;hrend meines Projektes musste ich ein System entwickeln, welches das Anzeigen von Text oder geometrischen Formen an einer Wand mittels eines Lasers erm&amp;ouml;glicht.
Daf&amp;uuml;r werden vibrierende Lautsprecher auf ihrer Membrane fixierte Spiegel bewegen und auf diese Weise an der Wand das anzeigen, was man sich w&amp;uuml;nscht.&amp;nbsp;', 6, 262, 2);
INSERT INTO tbl_projects_history VALUES(279, 193, NULL, 2012, 'Un carr&amp;eacute; parfait qui pr&amp;ocirc;ne au mur. Une matrice de caract&amp;egrave;res qui forme un deuxi&amp;egrave;me carr&amp;eacute; &amp;agrave; l\\\'int&amp;eacute;rieur. Et surtout un design sublime pour une horloge tr&amp;egrave;s inhabituelle avec son affichage typographique de l\\\'heure.
&lt;ul&gt;
&lt;li&gt;&amp;laquo; Quelle heure est-il ? &amp;raquo;&lt;/li&gt;
&lt;li&gt;&amp;laquo; Il est onze heure moins dix. &amp;raquo;&lt;/li&gt;
&lt;/ul&gt;
G&amp;eacute;n&amp;eacute;ralement quand vous demandez l\\\'heure &amp;agrave; une personne, elle ne vous la donnera que de cette mani&amp;egrave;re. Alors pourquoi ne pas en faire de m&amp;ecirc;me ? Faible en consommation d\\\'&amp;eacute;nergie gr&amp;acirc;ce &amp;agrave; la technologie LED, cet &amp;eacute;tonnant objet lumineux en&amp;nbsp;ravira plus d\\\'un. Un texte indique l\\\'heure et est chang&amp;eacute;e toutes les cinq minutes. Un point lumineux est affich&amp;eacute;&amp;nbsp;chaque minutes dans un des quatre coins de l\\\'horloge. Les lettres sont r&amp;eacute;tro-&amp;eacute;clair&amp;eacute;es &amp;agrave; l\\\'aide de LEDs, plac&amp;eacute;es sous un verre acrylique.', 'Ein perfektes Quadrat an der Wand. Eine Schriftzeichen-Matrix formt ein zweites Quadrat im Innern. Und vor allem ein ausgezeichnetes Design f&amp;uuml;r eine sehr ungew&amp;ouml;hnliche Uhr mit einer typographischen Anzeige der Uhrzeit.
&lt;ul&gt;
&lt;li&gt;Wie sp&amp;auml;t ist es?&lt;/li&gt;
&lt;li&gt;Es ist zehn vor elf.&lt;/li&gt;
&lt;/ul&gt;
Gew&amp;ouml;hnlich, wenn man eine Person nach der Uhrzeit fragt, wird sie sie nur auf diese Weise geben. Also, wieso es nicht auf dieselbe Art und Weise tun? Dieses leuchtende Objekt, sparsam im Energieverbrauch dank LED-Technologie, wird manch einen in Staunen versetzen. Ein Text zeigt die Uhrzeit an und wechselt alle f&amp;uuml;nf Minuten. Ein &amp;nbsp;Punkt leuchtet jede Minute in einer der vier Ecken der Uhr auf. Die Buchstaben werden mittels LED-Lampen hinterleuchtet, welche unter einem Acryl-Glas platziert sind.', 7, 253, 2);
INSERT INTO tbl_projects_history VALUES(280, 194, NULL, 2012, 'Le projet consiste en la r&amp;eacute;alisation du robot secondaire pour le concours Swiss Eurobot.
Il s\\\'agit d\\\'un concours de robotique national ou les robots s\\\'affrontent sur une table de jeu. Le but est de r&amp;eacute;cup&amp;eacute;rer le maximum de point en remplissant diff&amp;eacute;rentes actions. Le th&amp;egrave;me de ce concours est l\\\'&amp;icirc;le au tr&amp;eacute;sors. Les robots se transforment en pirates et partent &amp;agrave; la chasse aux tr&amp;eacute;sors.
Le robot est divis&amp;eacute; en deux parties, une partie m&amp;eacute;canique r&amp;eacute;alis&amp;eacute;e par l\\\'apprenti de 3&amp;egrave;me ann&amp;eacute;e de la base a&amp;eacute;rienne de Sion et une partie &amp;eacute;lectronique r&amp;eacute;alis&amp;eacute;e par moi-m&amp;ecirc;me. Ce projet a impliqu&amp;eacute; une &amp;eacute;troite collaboration entre l\\\'apprenti de la base et moi. Le robot doit suivre une ligne noire et taper dans une bouteille qui repr&amp;eacute;sente les messages qui flottent sur la mer. Il doit g&amp;eacute;rer les obstacles, c\\\'est &amp;agrave; dire l\\\'&amp;eacute;ventuelle pr&amp;eacute;sence d\\\'un robot adverse. Ce robot est autonome et poss&amp;egrave;de une &amp;eacute;lectronique embarqu&amp;eacute;e d&amp;eacute;velopp&amp;eacute;e en fonction de ses besoins.', 'Das Projekt besteht in der Entwicklung eines Sekund&amp;auml;r-Roboters f&amp;uuml;r den Swiss Eurobot-Wettbewerb.
Es handelt sich hierbei um einen nationalen Robotik-Wettbewerb, wo Roboter sich auf einem Spielfeld gegen&amp;uuml;berstehen. Ziel ist es, m&amp;ouml;glichst viele Punkte zu holen, indem verschiedene Handlungen ausgef&amp;uuml;hrt werden m&amp;uuml;ssen. Thema dieses Wettbewerbes ist die Schatzinsel. Die Roboter verwandeln sich in Piraten und gehen auf die Jagd nach dem Schatz.
Der Roboter ist in zwei Teile aufgeteilt: einem mechanischen Teil, entwickelt von einem 3. Jahr-Lehrling der Luftbasis Sitten, und einem von mir entwickelten elektronischen Teil. Eine enge Zusammenarbeit zwischen uns beiden war sehr wichtig. Der Roboter muss einer schwarzen Linie folgen und auf eine Flasche treffen oder ber&amp;uuml;hren, welche als Nachrichten auf dem Meer schwimmen. Er muss &amp;uuml;berdies Hindernisse bew&amp;auml;ltigen, d.h. die m&amp;ouml;gliche Gegenwart eines gegnerischen Roboters. Dieser Roboter ist autonom und verf&amp;uuml;gt &amp;uuml;ber eine eingebettete Elektronik, welche entsprechend seinen Bed&amp;uuml;rfnissen entwickelt wurde.', 2, 263, 2);
INSERT INTO tbl_projects_history VALUES(281, 196, 3, 2012, 'Ce projet permet de manager des utilisateurs dans un environnement Windows.
KoXo, le logiciel utilis&amp;eacute;, permet de cr&amp;eacute;er facilement les utilisateurs dans l\\\'Active Directory. Il permet de g&amp;eacute;n&amp;eacute;rer des comptes e-mail externes tr&amp;egrave;s facilement &amp;agrave; l\\\'aide des scripts pr&amp;eacute;-configur&amp;eacute;s La gestion en est donc simplifi&amp;eacute;e.', 'Dieses Projekt erm&amp;ouml;glicht es, Benutzer in einem Windows-Umfeld zu verwalten.
Die ben&amp;uuml;tzte Software KoXo erlaubt es auf einfache Weise, die User im Active Directory herzustellen. Es erm&amp;ouml;glicht ein einfaches Hervorrufen externer E-Mail-Konten mit Hilfe vorg&amp;auml;ngig konfigurierter Drehb&amp;uuml;cher. Die Handhabung wird dadurch vereinfacht.&amp;nbsp;
&lt;div&gt;&amp;nbsp;&lt;/div&gt;', 4, 254, 2);
INSERT INTO tbl_projects_history VALUES(282, 197, 3, 2012, 'Ce projet consiste &amp;agrave; d&amp;eacute;placer un point fait avec un laser pour former des dessins.
Des miroirs sont utilis&amp;eacute;s pour renvoyer le faisceau. Ils sont control&amp;eacute;s par une FPGA. Plusieurs sortes de formes peuvent &amp;ecirc;tre affich&amp;eacute;es, ainsi que du texte.&lt;br /&gt;&lt;br /&gt;', 'Dieses Projekt besteht darin, einen mit Laser erzeugten Punkt zu bewegen, um Bilder herzustellen.
Spiegel werden benutzt, um den Strahl zu spiegeln. Sie werden durch eine FPGA gesteuert. Mehrere Formenarten sowie Text k&amp;ouml;nnen angezeigt werden.', 9, 270, 2);
INSERT INTO tbl_projects_history VALUES(283, 198, 3, 2012, 'Ce projet permet de piloter un robot avec une manette wii &amp;agrave; l\\\'aide d\\\'une communication bluetooth. La Nunchuck et la Classic poss&amp;egrave;dent plusieurs modes de pilotage.', 'Mit diesem Projekt kann ein Roboter mit einem Wii-Joystick mittels Bluetooth-Kommunikation gesteuert werden. Die Nunchuck und Classic verf&amp;uuml;gen &amp;uuml;ber mehrere Steuerungs-Modi.', 7, 271, 2);
INSERT INTO tbl_projects_history VALUES(284, 199, 3, 2012, 'Ce projet a pour but la conception d\\\'un amplificateur &amp;agrave; tube.
Mais qu\\\'est-ce que les tubes? Les tubes &amp;eacute;lectroniques sont l\\\'anc&amp;ecirc;tre des transistors. Ils sont toujours utilis&amp;eacute;s dans l\\\'audio, surtout dans la Hi-Fi. Les tubes sont utilis&amp;eacute;s en amplification comme des transistors, avec n&amp;eacute;anmoins la diff&amp;eacute;rence que le son change en fonction du tube utilis&amp;eacute;!', 'Das Projekt hat zum Ziel, einen R&amp;ouml;hrenverst&amp;auml;rker zu konzipieren.
Was sind aber diese R&amp;ouml;hren? Die elektronischen R&amp;ouml;hren sind die Vorfahren des Transistors. Sie werden in der Audio-Welt immer noch benutzt, vor allem im Hi-Fi-Bereich. Die R&amp;ouml;hren werden als Verst&amp;auml;rker wie Transistoren benutzt, jedoch mit dem Unterschied, dass der Ton je nach benutzter R&amp;ouml;hre &amp;auml;ndert.', NULL, 264, 2);
INSERT INTO tbl_projects_history VALUES(285, 200, 3, 2012, 'Le but de ce projet est de r&amp;eacute;aliser une carte comprenant un DSPIC qui pourrait remplacer les cartes actuelles de l&amp;rsquo;&amp;eacute;cole des m&amp;eacute;tiers.
Pour une repr&amp;eacute;sentation concr&amp;egrave;te, cette carte commandera un bras articul&amp;eacute;.', 'Ziel dieses Projektes ist es, eine DSPIC beinhaltende Steckkarte zu schaffen, welche die gegenw&amp;auml;rtigen Karten der EMVs ersetzen k&amp;ouml;nnte.
F&amp;uuml;r eine konkrete Vorstellung wird diese Steckkarte einen Gelenkarm steuern.', 6, 265, 2);
INSERT INTO tbl_projects_history VALUES(286, 173, 3, 2012, 'L\\\'hypersomnie est une maladie orpheline qui touche 0.026% de la population. Les personnes atteintes de cette maladie peuvent dormir plus de 10 heures sans se r&amp;eacute;veiller et faire plusieurs siestes durant la journ&amp;eacute;e.
Ce stimulateur permet d\\\'aider ces personnes &amp;agrave; devenir autonome car la plupart des hypersomniaques ont besoin de l\\\'aide d\\\'un tiers au quotidien. L\\\'appareil poss&amp;egrave;de un &amp;eacute;cran tactile o&amp;ugrave; l\\\'heure et la date sont affich&amp;eacute;es. Ces informations peuvent &amp;ecirc;tre modifi&amp;eacute;es dans les r&amp;eacute;glages. Un menu permet de programmer un r&amp;eacute;veil. L\\\'alarme est une lecture al&amp;eacute;atoire de musiques enregistr&amp;eacute;es dans une carte SD et des vibrations. Les stimulations peuvent &amp;eacute;galement &amp;ecirc;tre directement lanc&amp;eacute;es. La musique peut &amp;ecirc;tre &amp;eacute;cout&amp;eacute;e soit avec un casque branch&amp;eacute; au stimulateur soit avec le haut-parleur interne.', 'Die Hypersomnie (Tagesschl&amp;auml;frigkeit) ist eine sehr seltene Krankheit, von der 0.026% der Bev&amp;ouml;lkerung betroffen ist. Betroffene Menschen k&amp;ouml;nnen zehn und mehr Stunden schlafen ohne aufzuwachen und mehrere Mittagsschl&amp;auml;fchen w&amp;auml;hrend des Tages einlegen.
Dieser Stimulator hilft den Betroffenen autonom zu werden, weil die grosse Mehrzahl der von Hypersomnie Betroffenen im Alltag auf die Unterst&amp;uuml;tzung Dritter angewiesen sind. Das Ger&amp;auml;t verf&amp;uuml;gt &amp;uuml;ber einen Touchscreen mit Angabe der Tageszeit und des Datums. Diese Informationen k&amp;ouml;nnen in den Einstellungen ge&amp;auml;ndert werden. Ein Men&amp;uuml; erm&amp;ouml;glicht die Programmierung eines Weckers. Der Alarm besteht aus dem zuf&amp;auml;lligen Abspielen verschiedener auf SD-Karte gespeicherten Musikrichtungen und Vibrationen. Stimulationen k&amp;ouml;nnen auch direkt gestartet werden. Die Musik kann entweder &amp;uuml;ber am Stimulator angeschlossenem Kopfh&amp;ouml;rer oder via eingebautem Lautsprecher abgeh&amp;ouml;rt werden.', 9, 260, 2);
INSERT INTO tbl_projects_history VALUES(287, 15, 3, 2012, 'Utile pour prendre des mesures sur la dur&amp;eacute;e, pratique et transportable, le datalogger est un appreil qui mesure des tensions par rapport &amp;agrave; une &amp;eacute;chelle de pr&amp;eacute;cision et en fonction de certains d&amp;eacute;lais.
Il enregistre les valeurs dans une m&amp;eacute;moire et les envoie ensuite sur un ordinateur pour ensuite les afficher dans un fichier texte.&lt;br /&gt;&lt;br /&gt;', 'N&amp;uuml;tzlich f&amp;uuml;r Messungen auf lange Zeit, praktisch und transportf&amp;auml;hig ist der Datalogger ein Ger&amp;auml;t, welches Spannungen im Verh&amp;auml;ltnis einer Pr&amp;auml;zisionsskala und entsprechend gewissen Fristen misst.
Es speichert die Werte in einem Arbeitsspeicher und sendet sie anschliessend auf einen Computer, um sie als Textdatei anzuzeigen.', 9, 261, 2);
INSERT INTO tbl_projects_history VALUES(288, 167, NULL, 2012, 'Le but de mon projet est de cr&amp;eacute;er un pupitre de loto pour faciliter le travail du crieur. Pour cela, une dalle enti&amp;egrave;rement tactile est int&amp;eacute;gr&amp;eacute;e, permettant ainsi tr&amp;egrave;s simplement la s&amp;eacute;lection des num&amp;eacute;ros sortants.
Un lecteur de code barres communicant avec l&amp;rsquo;appareil permet de contr&amp;ocirc;ler les cartes tr&amp;egrave;s rapidement. En plus de cela, un &amp;eacute;cran LCD permet l\\\'affichage de toutes les informations utiles.
On peut imaginer faire jouer des personnes n\\\'&amp;eacute;tant pas pr&amp;eacute;sentes lors de la partie, gr&amp;acirc;ce &amp;agrave; une m&amp;eacute;moire externe, o&amp;ugrave; sont stock&amp;eacute;es toutes les cartes en jeu.', 'Das Ziel meines Projektes besteht darin, einen Lottotisch zu kreieren, welcher die Arbeit des Ausrufers erleichtert. Dazu wird ein Touchpad eingebaut, was eine einfache Auswahl der ausgelosten Nummern erm&amp;ouml;glicht.
Ein mit dem Ger&amp;auml;t verbundenes Strichcode-Leseger&amp;auml;t erlaubt eine sehr schnelle Kontrolle der Karten. Dar&amp;uuml;berhinaus erm&amp;ouml;glicht ein LCD-Bildschirm die Anzeige aller n&amp;uuml;tzlichen Informationen.
Somit k&amp;ouml;nnen dank einem externen Arbeitsspeicher mit allen gespeicherten Spielkarten selbst nicht anwesende Personen am Spiel teilnehmen.', 8, 269, 2);
INSERT INTO tbl_projects_history VALUES(289, 203, 3, 2012, 'Le bo&amp;icirc;tier con&amp;ccedil;u sert comme commande &amp;agrave; distance d\\\'appareils &amp;eacute;lectriques. Avec son aide, un chauffage de chalet par exemple peut &amp;ecirc;tre enclench&amp;eacute; ou arr&amp;ecirc;t&amp;eacute; de n\\\'importe quel endroit.
Le bo&amp;icirc;tier consiste en deux parties. Un terminal UT864, avec lequel la connexion est &amp;eacute;tablie au r&amp;eacute;seau mobile (GSM) ainsi que du bo&amp;icirc;tier cr&amp;eacute;e soi-m&amp;ecirc;me responsable pour l\\\'exploitation et ex&amp;eacute;cution des ordres. Pour que le tout fonctionne, une carte SIM a &amp;eacute;t&amp;eacute; int&amp;eacute;gr&amp;eacute;e dans le terminal UT864. Ainsi, les donn&amp;eacute;es sont transmises par sms au bo&amp;icirc;tier qui contr&amp;ocirc;le le mot de passe &amp;agrave; cinq chiffres et l\\\'ordre &amp;agrave; un chiffre. Si le mot de passe est en ordre, l\\\'ordre transmis sera effectu&amp;eacute;. Si cela n\\\'est pas le cas, le message sera effac&amp;eacute; et le bo&amp;icirc;tier attend l\\\'ordre suivant.', 'Die entwickelte Schaltung dient zur Fernsteuerung von elektrischen Ger&amp;auml;ten. Ein konkretes Beispiel ist eine Heizung in einem Chalet, die mit Hilfe dieser Schaltung von &amp;uuml;berall ein- und ausgeschaltet werden kann.
Die Schaltung besteht aus zwei Teilen. Ein UT864 Terminal, mit dem die Verbindung zum Mobilen Datennetz (GSM) hergestellt wird und der selbst entwickelten Schaltung, welche f&amp;uuml;r die Auswertung und Ausf&amp;uuml;hrung des Befehls verantwortlich ist. Damit das Ganze funktioniert, muss in das UT864 Terminal eine SIM-Karte eingelegt werden.&lt;br /&gt;Die Befehle werden &amp;uuml;ber eine Kurzmitteilung (SMS) an die Schaltung &amp;uuml;bermittelt. Die Schaltung pr&amp;uuml;ft das 5-stellige Kennwort und den 1-stelligen Befehl. Ist das Kennwort korrekt, wird der Befehl ausgef&amp;uuml;hrt. Ansonsten wird die Nachricht gel&amp;ouml;scht und die Schaltung wartet auf den n&amp;auml;chsten Befehl.', 9, 268, 2);
INSERT INTO tbl_projects_history VALUES(290, 175, NULL, 2012, 'Gr&amp;acirc;ce &amp;agrave; cet appareil il est possible de mesurer la r&amp;eacute;sistance de la bobine int&amp;eacute;gr&amp;eacute;e dans une montre &amp;agrave; quartz. Si la bobine est en bon &amp;eacute;tat, un signal sonore retentit.
Le fonctionnement m&amp;eacute;canique peut &amp;ecirc;tre contr&amp;ocirc;l&amp;eacute; par un g&amp;eacute;n&amp;eacute;rateur &amp;agrave; impulsion. A l\\\'aide de points de mesures on cr&amp;eacute;e le contact avec la bobine et on peut observer la trotteuse se tourner.', 'Mit diesem Ger&amp;auml;t kann man den Widerstand der Spule, welche in einer Quarz-Uhr ist, messen. Wenn die Spulein Ordnung ist, kann man einen Piepston h&amp;ouml;ren.
Die mechanische Funktionalit&amp;auml;t kann mit Hilfe eines Impulsgenerators getestet werden. Mit den Messspitzen macht man Kontakt mit der Spule und dann kann man sehen wieder Sekundenzeiger sich dreht.', 8, 267, 3);
INSERT INTO tbl_projects_history VALUES(291, 204, 3, 2012, 'L&amp;rsquo;ensemble des 9 unit&amp;eacute;s repr&amp;eacute;sentent une cha&amp;icirc;ne de montage qui permet de percer des pi&amp;egrave;ces en aluminium et de peindre des pi&amp;egrave;ces en plastique. Cet ensemble est pilot&amp;eacute; par un bus CAN et fonctionne avec des &amp;eacute;l&amp;eacute;ments &amp;eacute;lectropneumatiques.', 'Die Gesamtheit aller 9 Einheiten ergibt ein Produktions-Fliessband, welches das Bohren von Aluminiumteilen und das Anstreichen von Plastikteilen erm&amp;ouml;glicht. Das Ganze wird von einem CAN-Bus gesteuert und funktioniert mit elektro-pneumatischen Elementen.', 12, 272, 1);
INSERT INTO tbl_projects_history VALUES(292, 30, 3, 2012, 'Cette maquette est une cha&amp;icirc;ne de montage miniature, gr&amp;acirc;ce &amp;agrave; laquelle il est possible d&amp;rsquo;assembler un m&amp;eacute;canisme de rotation.
Pour le montage des diff&amp;eacute;rents composants qui int&amp;egrave;grent le dispositif rotatif, on a d&amp;eacute;velopp&amp;eacute; une s&amp;eacute;rie de 4 manipulateurs, 1 contr&amp;ocirc;le de per&amp;ccedil;age, 1 pince oscillante, 1 pince rotative et 1 potence. La commande de ce projet s&amp;rsquo;effectue depuis un &amp;eacute;cran tactile via un automate programmable.', 'Dieses Modell stellt ein Mini-Fliessband dar, dank welchem es m&amp;ouml;glich ist, einen Rotationsmechanismus aufzubauen.
Zur Zusammensetzung der verschiedenen Komponenten, welche das Rotationsdispositiv beinhalten, wurde eine Serie von vier Manipulatoren, einer Bohr&amp;uuml;berwachung, einer Gelenkklemme bzw. Schwingzange, einer Rotationszange und einem Arm/Ausleger entwickelt. Die Steuerung dieses Projektes erfolgt von einem Touchscreen via speicherprogrammierbarer Steuerung.', 11, 273, 1);
INSERT INTO tbl_projects_history VALUES(293, 74, 3, 2012, 'Ce petit distributeur de petites friandises datant des ann&amp;eacute;es 1970 a &amp;eacute;t&amp;eacute; modernis&amp;eacute; &amp;agrave; l&amp;rsquo;aide d&amp;rsquo;un &amp;eacute;cran tactile et d&amp;rsquo;un automate ainsi que d&amp;rsquo;un monnayeur.', 'Dieser kleine Snack-Automat aus den 70er Jahren wurde mit dem Einbau eines Touchscreens, einer Steuerungs-Automatik und eines M&amp;uuml;nzwechslers modernisiert.', 13, 274, 1);
INSERT INTO tbl_projects_history VALUES(294, 11, 3, 2012, 'C&amp;rsquo;est une maquette qui repr&amp;eacute;sente un ascenseur pour un b&amp;acirc;timent &amp;agrave; 3 &amp;eacute;tages et un attique. Notre but a &amp;eacute;t&amp;eacute; d&amp;rsquo;am&amp;eacute;liorer la partie programmation et surtout la partie m&amp;eacute;canique de la cabine de l&amp;rsquo;ascenseur ainsi que le m&amp;eacute;canisme d&amp;rsquo;ouverture de la porte.', 'Dieses Modell stellt einen Aufzug f&amp;uuml;r ein dreist&amp;ouml;ckiges Haus und einer Attikawohnung dar. Unser Ziel richtete sich auf die Verbesserung des Steuerungs-Bereiches und vor allem des mechanischen Teils der Aufzugskabine sowie des T&amp;uuml;r&amp;ouml;ffnungs-Mechanismus.', 13, 275, 1);
INSERT INTO tbl_projects_history VALUES(295, 205, 3, 2012, 'Ce projet consiste &amp;agrave; s&amp;eacute;curiser la zone de travail du robot Kuka, lors d&amp;rsquo;une intervention humaine.
Pour ce faire, trois s&amp;eacute;curit&amp;eacute;s diff&amp;eacute;rentes sont utilis&amp;eacute;es, &amp;agrave; savoir une barri&amp;egrave;re lumineuse sur la partie grillag&amp;eacute;e, des fins de course de s&amp;eacute;curit&amp;eacute; sur les portes &amp;agrave; battants et une g&amp;acirc;che &amp;eacute;lectrique sur la porte coulissante. Un mouvement sp&amp;eacute;cifique du robot Kuka a aussi &amp;eacute;t&amp;eacute; programm&amp;eacute;.', 'Dieses Projekt besteht darin, w&amp;auml;hrend eines menschlichen Eingriffes den Arbeitsbereich des Kuka-Roboters zu sichern.
Dazu werden drei verschiedene Sicherheiten benutzt: eine Lichtschranke auf dem Gitterbereich, Sicherheitsgrenztaster auf den Fl&amp;uuml;gelt&amp;uuml;ren und einen elektrischen T&amp;uuml;r&amp;ouml;ffner auf der Schiebet&amp;uuml;re. Ebenfalls wurde ein spezifischer Gang des Kuka-Roboters programmiert.', 13, 276, 1);
INSERT INTO tbl_projects_history VALUES(296, 206, 3, 2012, 'Ce projet consiste &amp;agrave; r&amp;eacute;aliser une maquette didactique transportable pour la simulation de pannes.
Elle repr&amp;eacute;sente le processus d&amp;rsquo;une bande transporteuse. Elle sera utilis&amp;eacute;e par les apprentis automaticiens pour s\\\'entra&amp;icirc;ner &amp;agrave; faire face aux probl&amp;egrave;mes et pannes qui apparaissent dans des processus industriels semblables.', 'Das Projekt besteht darin, ein transportf&amp;auml;higes didaktisches Modell zur Pannensimulation herzustellen.
Es stellt den Ablauf eines F&amp;ouml;rderbandes dar und wird von den Automatiker-Lehrlingen benutzt werden, um zu &amp;uuml;ben, wie man auftretenden Schwierigkeiten und Pannen begegnen kann, welche in &amp;auml;hnlichen industriellen Abl&amp;auml;ufen auftreten k&amp;ouml;nnen.', 10, 277, 1);
INSERT INTO tbl_projects_history VALUES(297, 79, 3, 2012, 'Il s&amp;rsquo;agit d&amp;rsquo;une maquette repr&amp;eacute;sentant une station de lavage de voiture automatique qui est command&amp;eacute;e &amp;agrave; l&amp;rsquo;aide d&amp;rsquo;un &amp;eacute;cran tactile.', 'Es handelt sich hierbei um das Modell einer automatischen Autowaschanlage, welche mittels eines Touchscreens gesteuert wird.', 10, 278, 1);
INSERT INTO tbl_projects_history VALUES(298, 207, 3, 2012, 'Ce petit Robot muni d&amp;rsquo;une cam&amp;eacute;ra peut fonctionner soit &amp;agrave; l&amp;rsquo;aide d&amp;rsquo;un joystick ou &amp;ecirc;tre programm&amp;eacute; afin d&amp;rsquo;effectuer de petits d&amp;eacute;placements.', 'Dieser mit einer Kamera ausgestattete Roboter funktioniert entweder mittels eines Joysticks oder kann programmiert werden, um kleine Verschiebungen und Bewegungen auszuf&amp;uuml;hren.', 13, 279, 3);
INSERT INTO tbl_projects_history VALUES(299, 209, 3, 2012, 'Le but de ce projet est d\\\'utiliser l\\\'API de traduction de google pour cr&amp;eacute;er un petit traducteur de voyage. L\\\'application a &amp;eacute;t&amp;eacute; d&amp;eacute;velopp&amp;eacute;e sous Android.
Il sera possible de cr&amp;eacute;er, modifier ou importer une liste de phrases types. Ces phrases seront traduites via l\\\'API de google et stock&amp;eacute;es pour un usage non connect&amp;eacute; &amp;agrave; Internet. Si le temps le permet, l\\\'API textToSpeech d\\\'Android sera utilis&amp;eacute;e pour prononcer les phrases traduites.', NULL, 17, 307, 1);
INSERT INTO tbl_projects_history VALUES(300, 210, 3, 2012, 'A partir de la 2&amp;egrave;me ann&amp;eacute;e d&amp;rsquo;apprentissage, les automaticiens de l&amp;rsquo;EMVs utilisent dans le cadre de leur formation le logiciel de dessin tridimensionnel &amp;laquo; Inventor &amp;raquo;.
Ce logiciel permet la mod&amp;eacute;lisation de pi&amp;egrave;ces m&amp;eacute;caniques complexes, la r&amp;eacute;alisation virtuelle d&amp;rsquo;assemblages, leur mise en plan rapide ainsi que la r&amp;eacute;alisation de pr&amp;eacute;sentations (&amp;eacute;clat&amp;eacute;s et animations) en 3 dimensions.&lt;br /&gt;&lt;br /&gt;', 'Ab dem 2. Lehrjahr ben&amp;uuml;tzen die Automatikerlehrlinge der EMVs im Rahmen ihrer Ausbildung die dreidimensionale Zeichnungssoftware Inventor.
Diese Software erm&amp;ouml;glicht die Modellierung komplexer mechanischer Teile, die virtuelle Umsetzung von Verbunden, deren rasche Planung sowie die Verwirklichung dreidimensionaler Pr&amp;auml;sentationen.', 10, 309, 1);
INSERT INTO tbl_projects_history VALUES(301, 211, NULL, 2012, 'Le team automatique vous pr&amp;eacute;sente des travaux r&amp;eacute;alis&amp;eacute;s en 1&amp;egrave;re et en 2&amp;egrave;me ann&amp;eacute;es. Il s\\\'agit de travaux de m&amp;eacute;canique, de c&amp;acirc;blage et d\\\'&amp;eacute;lectropneumatique', 'Das Automatiker-Team pr&amp;auml;sentiert Ihnen im 1. und 2. Lehrjahr verwirklichte Arbeiten. Es handelt sich hierbei um Arbeiten im Bereich Mechanik, Verkabelung/Verdrahtung und Elektropneumatik.', 11, 310, 2);

-- -----------------------------
-- Structure de la table tbl_history_teachers
-- -----------------------------
CREATE TABLE `tbl_history_teachers` (
  `FKNoTeacher` int(10) DEFAULT NULL,
  `FKNoHistory` int(10) DEFAULT NULL,
  KEY `FKNoTeacher` (`FKNoTeacher`),
  KEY `FKNoHistory` (`FKNoHistory`),
  CONSTRAINT `tbl_history_teachers_ibfk_1` FOREIGN KEY (`FKNoTeacher`) REFERENCES `tbl_teachers` (`PKNoTeacher`) ON DELETE CASCADE,
  CONSTRAINT `tbl_history_teachers_ibfk_2` FOREIGN KEY (`FKNoHistory`) REFERENCES `tbl_projects_history` (`PKNoProjectHistory`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- -----------------------------
-- Contenu de la table tbl_history_teachers
-- -----------------------------
INSERT INTO tbl_history_teachers VALUES(9, 16);
INSERT INTO tbl_history_teachers VALUES(9, 17);
INSERT INTO tbl_history_teachers VALUES(3, 18);
INSERT INTO tbl_history_teachers VALUES(8, 19);
INSERT INTO tbl_history_teachers VALUES(10, 20);
INSERT INTO tbl_history_teachers VALUES(12, 21);
INSERT INTO tbl_history_teachers VALUES(5, 22);
INSERT INTO tbl_history_teachers VALUES(2, 23);
INSERT INTO tbl_history_teachers VALUES(15, 24);
INSERT INTO tbl_history_teachers VALUES(3, 26);
INSERT INTO tbl_history_teachers VALUES(6, 27);
INSERT INTO tbl_history_teachers VALUES(10, 28);
INSERT INTO tbl_history_teachers VALUES(5, 29);
INSERT INTO tbl_history_teachers VALUES(5, 30);
INSERT INTO tbl_history_teachers VALUES(2, 31);
INSERT INTO tbl_history_teachers VALUES(34, 32);
INSERT INTO tbl_history_teachers VALUES(4, 33);
INSERT INTO tbl_history_teachers VALUES(3, 34);
INSERT INTO tbl_history_teachers VALUES(4, 35);
INSERT INTO tbl_history_teachers VALUES(4, 36);
INSERT INTO tbl_history_teachers VALUES(2, 37);
INSERT INTO tbl_history_teachers VALUES(15, 38);
INSERT INTO tbl_history_teachers VALUES(3, 39);
INSERT INTO tbl_history_teachers VALUES(15, 40);
INSERT INTO tbl_history_teachers VALUES(1, 41);
INSERT INTO tbl_history_teachers VALUES(7, 42);
INSERT INTO tbl_history_teachers VALUES(1, 43);
INSERT INTO tbl_history_teachers VALUES(9, 44);
INSERT INTO tbl_history_teachers VALUES(9, 45);
INSERT INTO tbl_history_teachers VALUES(1, 46);
INSERT INTO tbl_history_teachers VALUES(6, 48);
INSERT INTO tbl_history_teachers VALUES(3, 49);
INSERT INTO tbl_history_teachers VALUES(3, 50);
INSERT INTO tbl_history_teachers VALUES(3, 51);
INSERT INTO tbl_history_teachers VALUES(3, 52);
INSERT INTO tbl_history_teachers VALUES(15, 53);
INSERT INTO tbl_history_teachers VALUES(10, 54);
INSERT INTO tbl_history_teachers VALUES(10, 55);
INSERT INTO tbl_history_teachers VALUES(10, 56);
INSERT INTO tbl_history_teachers VALUES(5, 57);
INSERT INTO tbl_history_teachers VALUES(11, 58);
INSERT INTO tbl_history_teachers VALUES(4, 59);
INSERT INTO tbl_history_teachers VALUES(10, 60);
INSERT INTO tbl_history_teachers VALUES(12, 61);
INSERT INTO tbl_history_teachers VALUES(1, 62);
INSERT INTO tbl_history_teachers VALUES(2, 63);
INSERT INTO tbl_history_teachers VALUES(10, 64);
INSERT INTO tbl_history_teachers VALUES(3, 65);
INSERT INTO tbl_history_teachers VALUES(1, 66);
INSERT INTO tbl_history_teachers VALUES(9, 67);
INSERT INTO tbl_history_teachers VALUES(5, 68);
INSERT INTO tbl_history_teachers VALUES(5, 69);
INSERT INTO tbl_history_teachers VALUES(11, 70);
INSERT INTO tbl_history_teachers VALUES(6, 71);
INSERT INTO tbl_history_teachers VALUES(11, 72);
INSERT INTO tbl_history_teachers VALUES(5, 73);
INSERT INTO tbl_history_teachers VALUES(1, 74);
INSERT INTO tbl_history_teachers VALUES(7, 75);
INSERT INTO tbl_history_teachers VALUES(11, 76);
INSERT INTO tbl_history_teachers VALUES(10, 77);
INSERT INTO tbl_history_teachers VALUES(10, 78);
INSERT INTO tbl_history_teachers VALUES(10, 79);
INSERT INTO tbl_history_teachers VALUES(10, 80);
INSERT INTO tbl_history_teachers VALUES(14, 81);
INSERT INTO tbl_history_teachers VALUES(6, 82);
INSERT INTO tbl_history_teachers VALUES(2, 83);
INSERT INTO tbl_history_teachers VALUES(3, 84);
INSERT INTO tbl_history_teachers VALUES(15, 85);
INSERT INTO tbl_history_teachers VALUES(3, 86);
INSERT INTO tbl_history_teachers VALUES(3, 88);
INSERT INTO tbl_history_teachers VALUES(8, 89);
INSERT INTO tbl_history_teachers VALUES(10, 90);
INSERT INTO tbl_history_teachers VALUES(8, 91);
INSERT INTO tbl_history_teachers VALUES(10, 92);
INSERT INTO tbl_history_teachers VALUES(6, 93);
INSERT INTO tbl_history_teachers VALUES(5, 94);
INSERT INTO tbl_history_teachers VALUES(8, 95);
INSERT INTO tbl_history_teachers VALUES(10, 97);
INSERT INTO tbl_history_teachers VALUES(2, 99);
INSERT INTO tbl_history_teachers VALUES(2, 100);
INSERT INTO tbl_history_teachers VALUES(7, 101);
INSERT INTO tbl_history_teachers VALUES(3, 102);
INSERT INTO tbl_history_teachers VALUES(3, 103);
INSERT INTO tbl_history_teachers VALUES(3, 105);
INSERT INTO tbl_history_teachers VALUES(4, 106);
INSERT INTO tbl_history_teachers VALUES(4, 107);
INSERT INTO tbl_history_teachers VALUES(11, 108);
INSERT INTO tbl_history_teachers VALUES(3, 109);
INSERT INTO tbl_history_teachers VALUES(11, 111);
INSERT INTO tbl_history_teachers VALUES(1, 112);
INSERT INTO tbl_history_teachers VALUES(3, 113);
INSERT INTO tbl_history_teachers VALUES(14, 114);
INSERT INTO tbl_history_teachers VALUES(5, 115);
INSERT INTO tbl_history_teachers VALUES(6, 116);
INSERT INTO tbl_history_teachers VALUES(6, 117);
INSERT INTO tbl_history_teachers VALUES(43, 118);
INSERT INTO tbl_history_teachers VALUES(11, 119);
INSERT INTO tbl_history_teachers VALUES(11, 120);
INSERT INTO tbl_history_teachers VALUES(2, 121);
INSERT INTO tbl_history_teachers VALUES(13, 122);
INSERT INTO tbl_history_teachers VALUES(2, 123);
INSERT INTO tbl_history_teachers VALUES(3, 124);
INSERT INTO tbl_history_teachers VALUES(3, 125);
INSERT INTO tbl_history_teachers VALUES(3, 126);
INSERT INTO tbl_history_teachers VALUES(3, 127);
INSERT INTO tbl_history_teachers VALUES(3, 128);
INSERT INTO tbl_history_teachers VALUES(14, 129);
INSERT INTO tbl_history_teachers VALUES(14, 130);
INSERT INTO tbl_history_teachers VALUES(5, 131);
INSERT INTO tbl_history_teachers VALUES(5, 132);
INSERT INTO tbl_history_teachers VALUES(5, 133);
INSERT INTO tbl_history_teachers VALUES(15, 25);
INSERT INTO tbl_history_teachers VALUES(3, 135);
INSERT INTO tbl_history_teachers VALUES(15, 136);
INSERT INTO tbl_history_teachers VALUES(8, 137);
INSERT INTO tbl_history_teachers VALUES(10, 138);
INSERT INTO tbl_history_teachers VALUES(10, 139);
INSERT INTO tbl_history_teachers VALUES(10, 141);
INSERT INTO tbl_history_teachers VALUES(6, 143);
INSERT INTO tbl_history_teachers VALUES(6, 144);
INSERT INTO tbl_history_teachers VALUES(44, 145);
INSERT INTO tbl_history_teachers VALUES(44, 146);
INSERT INTO tbl_history_teachers VALUES(44, 147);
INSERT INTO tbl_history_teachers VALUES(1, 148);
INSERT INTO tbl_history_teachers VALUES(45, 150);
INSERT INTO tbl_history_teachers VALUES(2, 151);
INSERT INTO tbl_history_teachers VALUES(1, 152);
INSERT INTO tbl_history_teachers VALUES(45, 153);
INSERT INTO tbl_history_teachers VALUES(1, 154);
INSERT INTO tbl_history_teachers VALUES(1, 166);
INSERT INTO tbl_history_teachers VALUES(1, 171);
INSERT INTO tbl_history_teachers VALUES(46, 174);
INSERT INTO tbl_history_teachers VALUES(6, 176);
INSERT INTO tbl_history_teachers VALUES(46, 177);
INSERT INTO tbl_history_teachers VALUES(2, 178);
INSERT INTO tbl_history_teachers VALUES(1, 179);
INSERT INTO tbl_history_teachers VALUES(2, 180);
INSERT INTO tbl_history_teachers VALUES(1, 181);
INSERT INTO tbl_history_teachers VALUES(9, 182);
INSERT INTO tbl_history_teachers VALUES(45, 183);
INSERT INTO tbl_history_teachers VALUES(45, 184);
INSERT INTO tbl_history_teachers VALUES(45, 185);
INSERT INTO tbl_history_teachers VALUES(10, 186);
INSERT INTO tbl_history_teachers VALUES(10, 187);
INSERT INTO tbl_history_teachers VALUES(4, 188);
INSERT INTO tbl_history_teachers VALUES(4, 189);
INSERT INTO tbl_history_teachers VALUES(4, 190);
INSERT INTO tbl_history_teachers VALUES(9, 191);
INSERT INTO tbl_history_teachers VALUES(6, 175);
INSERT INTO tbl_history_teachers VALUES(6, 201);
INSERT INTO tbl_history_teachers VALUES(9, 202);
INSERT INTO tbl_history_teachers VALUES(5, 204);
INSERT INTO tbl_history_teachers VALUES(5, 205);
INSERT INTO tbl_history_teachers VALUES(3, 206);
INSERT INTO tbl_history_teachers VALUES(3, 207);
INSERT INTO tbl_history_teachers VALUES(3, 208);
INSERT INTO tbl_history_teachers VALUES(3, 209);
INSERT INTO tbl_history_teachers VALUES(3, 210);
INSERT INTO tbl_history_teachers VALUES(8, 211);
INSERT INTO tbl_history_teachers VALUES(8, 212);
INSERT INTO tbl_history_teachers VALUES(15, 213);
INSERT INTO tbl_history_teachers VALUES(8, 214);
INSERT INTO tbl_history_teachers VALUES(15, 215);
INSERT INTO tbl_history_teachers VALUES(15, 216);
INSERT INTO tbl_history_teachers VALUES(8, 217);
INSERT INTO tbl_history_teachers VALUES(10, 218);
INSERT INTO tbl_history_teachers VALUES(8, 219);
INSERT INTO tbl_history_teachers VALUES(3, 220);
INSERT INTO tbl_history_teachers VALUES(3, 221);
INSERT INTO tbl_history_teachers VALUES(46, 222);
INSERT INTO tbl_history_teachers VALUES(46, 223);
INSERT INTO tbl_history_teachers VALUES(46, 224);
INSERT INTO tbl_history_teachers VALUES(46, 225);
INSERT INTO tbl_history_teachers VALUES(46, 226);
INSERT INTO tbl_history_teachers VALUES(46, 227);
INSERT INTO tbl_history_teachers VALUES(45, 228);
INSERT INTO tbl_history_teachers VALUES(45, 229);
INSERT INTO tbl_history_teachers VALUES(45, 230);
INSERT INTO tbl_history_teachers VALUES(45, 231);
INSERT INTO tbl_history_teachers VALUES(45, 232);
INSERT INTO tbl_history_teachers VALUES(1, 233);
INSERT INTO tbl_history_teachers VALUES(6, 234);
INSERT INTO tbl_history_teachers VALUES(1, 235);
INSERT INTO tbl_history_teachers VALUES(45, 236);
INSERT INTO tbl_history_teachers VALUES(1, 237);
INSERT INTO tbl_history_teachers VALUES(1, 238);
INSERT INTO tbl_history_teachers VALUES(1, 239);
INSERT INTO tbl_history_teachers VALUES(4, 241);
INSERT INTO tbl_history_teachers VALUES(5, 242);
INSERT INTO tbl_history_teachers VALUES(4, 243);
INSERT INTO tbl_history_teachers VALUES(9, 244);
INSERT INTO tbl_history_teachers VALUES(10, 245);
INSERT INTO tbl_history_teachers VALUES(4, 246);
INSERT INTO tbl_history_teachers VALUES(9, 247);
INSERT INTO tbl_history_teachers VALUES(9, 248);
INSERT INTO tbl_history_teachers VALUES(10, 250);
INSERT INTO tbl_history_teachers VALUES(4, 251);
INSERT INTO tbl_history_teachers VALUES(10, 252);
INSERT INTO tbl_history_teachers VALUES(9, 253);
INSERT INTO tbl_history_teachers VALUES(5, 255);
INSERT INTO tbl_history_teachers VALUES(5, 256);
INSERT INTO tbl_history_teachers VALUES(5, 257);
INSERT INTO tbl_history_teachers VALUES(3, 258);
INSERT INTO tbl_history_teachers VALUES(15, 259);
INSERT INTO tbl_history_teachers VALUES(3, 260);
INSERT INTO tbl_history_teachers VALUES(3, 261);
INSERT INTO tbl_history_teachers VALUES(3, 262);
INSERT INTO tbl_history_teachers VALUES(3, 263);
INSERT INTO tbl_history_teachers VALUES(3, 264);
INSERT INTO tbl_history_teachers VALUES(3, 265);
INSERT INTO tbl_history_teachers VALUES(46, 266);
INSERT INTO tbl_history_teachers VALUES(46, 267);
INSERT INTO tbl_history_teachers VALUES(47, 268);
INSERT INTO tbl_history_teachers VALUES(1, 269);
INSERT INTO tbl_history_teachers VALUES(1, 270);
INSERT INTO tbl_history_teachers VALUES(1, 271);
INSERT INTO tbl_history_teachers VALUES(1, 272);
INSERT INTO tbl_history_teachers VALUES(47, 274);
INSERT INTO tbl_history_teachers VALUES(1, 275);
INSERT INTO tbl_history_teachers VALUES(4, 276);
INSERT INTO tbl_history_teachers VALUES(9, 277);
INSERT INTO tbl_history_teachers VALUES(5, 278);
INSERT INTO tbl_history_teachers VALUES(9, 279);
INSERT INTO tbl_history_teachers VALUES(10, 280);
INSERT INTO tbl_history_teachers VALUES(6, 281);
INSERT INTO tbl_history_teachers VALUES(10, 283);
INSERT INTO tbl_history_teachers VALUES(4, 284);
INSERT INTO tbl_history_teachers VALUES(5, 285);
INSERT INTO tbl_history_teachers VALUES(10, 286);
INSERT INTO tbl_history_teachers VALUES(9, 287);
INSERT INTO tbl_history_teachers VALUES(4, 288);
INSERT INTO tbl_history_teachers VALUES(4, 289);
INSERT INTO tbl_history_teachers VALUES(9, 290);
INSERT INTO tbl_history_teachers VALUES(48, 291);
INSERT INTO tbl_history_teachers VALUES(49, 292);
INSERT INTO tbl_history_teachers VALUES(3, 293);
INSERT INTO tbl_history_teachers VALUES(48, 294);
INSERT INTO tbl_history_teachers VALUES(3, 295);
INSERT INTO tbl_history_teachers VALUES(15, 296);
INSERT INTO tbl_history_teachers VALUES(3, 297);
INSERT INTO tbl_history_teachers VALUES(3, 298);
INSERT INTO tbl_history_teachers VALUES(5, 282);
INSERT INTO tbl_history_teachers VALUES(1, 299);
INSERT INTO tbl_history_teachers VALUES(50, 300);
INSERT INTO tbl_history_teachers VALUES(15, 301);

-- -----------------------------
-- Structure de la table tbl_history_students
-- -----------------------------
CREATE TABLE `tbl_history_students` (
  `FKNoStudent` int(10) NOT NULL,
  `FKNoHistory` int(10) NOT NULL,
  KEY `FKNoStudent` (`FKNoStudent`),
  KEY `FKNoHistory` (`FKNoHistory`),
  CONSTRAINT `tbl_history_students_ibfk_1` FOREIGN KEY (`FKNoStudent`) REFERENCES `tbl_students` (`PKNoStudent`) ON DELETE CASCADE,
  CONSTRAINT `tbl_history_students_ibfk_2` FOREIGN KEY (`FKNoHistory`) REFERENCES `tbl_projects_history` (`PKNoProjectHistory`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- -----------------------------
-- Contenu de la table tbl_history_students
-- -----------------------------
INSERT INTO tbl_history_students VALUES(54, 16);
INSERT INTO tbl_history_students VALUES(43, 17);
INSERT INTO tbl_history_students VALUES(15, 18);
INSERT INTO tbl_history_students VALUES(91, 19);
INSERT INTO tbl_history_students VALUES(44, 20);
INSERT INTO tbl_history_students VALUES(8, 21);
INSERT INTO tbl_history_students VALUES(132, 22);
INSERT INTO tbl_history_students VALUES(6, 23);
INSERT INTO tbl_history_students VALUES(131, 24);
INSERT INTO tbl_history_students VALUES(143, 24);
INSERT INTO tbl_history_students VALUES(144, 24);
INSERT INTO tbl_history_students VALUES(145, 24);
INSERT INTO tbl_history_students VALUES(94, 26);
INSERT INTO tbl_history_students VALUES(55, 28);
INSERT INTO tbl_history_students VALUES(81, 29);
INSERT INTO tbl_history_students VALUES(27, 30);
INSERT INTO tbl_history_students VALUES(114, 31);
INSERT INTO tbl_history_students VALUES(115, 31);
INSERT INTO tbl_history_students VALUES(127, 32);
INSERT INTO tbl_history_students VALUES(21, 33);
INSERT INTO tbl_history_students VALUES(22, 34);
INSERT INTO tbl_history_students VALUES(18, 35);
INSERT INTO tbl_history_students VALUES(130, 36);
INSERT INTO tbl_history_students VALUES(110, 37);
INSERT INTO tbl_history_students VALUES(111, 37);
INSERT INTO tbl_history_students VALUES(88, 38);
INSERT INTO tbl_history_students VALUES(10, 39);
INSERT INTO tbl_history_students VALUES(89, 40);
INSERT INTO tbl_history_students VALUES(7, 41);
INSERT INTO tbl_history_students VALUES(8, 41);
INSERT INTO tbl_history_students VALUES(34, 42);
INSERT INTO tbl_history_students VALUES(51, 43);
INSERT INTO tbl_history_students VALUES(52, 43);
INSERT INTO tbl_history_students VALUES(66, 43);
INSERT INTO tbl_history_students VALUES(49, 43);
INSERT INTO tbl_history_students VALUES(71, 44);
INSERT INTO tbl_history_students VALUES(97, 45);
INSERT INTO tbl_history_students VALUES(51, 46);
INSERT INTO tbl_history_students VALUES(52, 46);
INSERT INTO tbl_history_students VALUES(53, 46);
INSERT INTO tbl_history_students VALUES(61, 48);
INSERT INTO tbl_history_students VALUES(9, 49);
INSERT INTO tbl_history_students VALUES(118, 50);
INSERT INTO tbl_history_students VALUES(119, 50);
INSERT INTO tbl_history_students VALUES(23, 51);
INSERT INTO tbl_history_students VALUES(24, 52);
INSERT INTO tbl_history_students VALUES(141, 53);
INSERT INTO tbl_history_students VALUES(142, 53);
INSERT INTO tbl_history_students VALUES(108, 54);
INSERT INTO tbl_history_students VALUES(109, 54);
INSERT INTO tbl_history_students VALUES(75, 55);
INSERT INTO tbl_history_students VALUES(46, 56);
INSERT INTO tbl_history_students VALUES(133, 57);
INSERT INTO tbl_history_students VALUES(98, 58);
INSERT INTO tbl_history_students VALUES(99, 58);
INSERT INTO tbl_history_students VALUES(19, 59);
INSERT INTO tbl_history_students VALUES(20, 59);
INSERT INTO tbl_history_students VALUES(45, 60);
INSERT INTO tbl_history_students VALUES(5, 61);
INSERT INTO tbl_history_students VALUES(28, 63);
INSERT INTO tbl_history_students VALUES(29, 63);
INSERT INTO tbl_history_students VALUES(104, 64);
INSERT INTO tbl_history_students VALUES(93, 65);
INSERT INTO tbl_history_students VALUES(2, 66);
INSERT INTO tbl_history_students VALUES(3, 66);
INSERT INTO tbl_history_students VALUES(42, 67);
INSERT INTO tbl_history_students VALUES(77, 68);
INSERT INTO tbl_history_students VALUES(134, 69);
INSERT INTO tbl_history_students VALUES(60, 70);
INSERT INTO tbl_history_students VALUES(6, 71);
INSERT INTO tbl_history_students VALUES(100, 72);
INSERT INTO tbl_history_students VALUES(101, 72);
INSERT INTO tbl_history_students VALUES(78, 73);
INSERT INTO tbl_history_students VALUES(63, 74);
INSERT INTO tbl_history_students VALUES(36, 75);
INSERT INTO tbl_history_students VALUES(83, 75);
INSERT INTO tbl_history_students VALUES(58, 76);
INSERT INTO tbl_history_students VALUES(76, 77);
INSERT INTO tbl_history_students VALUES(82, 78);
INSERT INTO tbl_history_students VALUES(72, 79);
INSERT INTO tbl_history_students VALUES(140, 80);
INSERT INTO tbl_history_students VALUES(69, 81);
INSERT INTO tbl_history_students VALUES(70, 81);
INSERT INTO tbl_history_students VALUES(37, 82);
INSERT INTO tbl_history_students VALUES(32, 83);
INSERT INTO tbl_history_students VALUES(37, 83);
INSERT INTO tbl_history_students VALUES(85, 83);
INSERT INTO tbl_history_students VALUES(14, 84);
INSERT INTO tbl_history_students VALUES(92, 85);
INSERT INTO tbl_history_students VALUES(123, 86);
INSERT INTO tbl_history_students VALUES(124, 86);
INSERT INTO tbl_history_students VALUES(125, 86);
INSERT INTO tbl_history_students VALUES(39, 88);
INSERT INTO tbl_history_students VALUES(116, 89);
INSERT INTO tbl_history_students VALUES(117, 89);
INSERT INTO tbl_history_students VALUES(74, 90);
INSERT INTO tbl_history_students VALUES(87, 91);
INSERT INTO tbl_history_students VALUES(105, 92);
INSERT INTO tbl_history_students VALUES(106, 92);
INSERT INTO tbl_history_students VALUES(30, 93);
INSERT INTO tbl_history_students VALUES(26, 94);
INSERT INTO tbl_history_students VALUES(40, 95);
INSERT INTO tbl_history_students VALUES(107, 97);
INSERT INTO tbl_history_students VALUES(31, 99);
INSERT INTO tbl_history_students VALUES(34, 99);
INSERT INTO tbl_history_students VALUES(83, 99);
INSERT INTO tbl_history_students VALUES(112, 100);
INSERT INTO tbl_history_students VALUES(113, 100);
INSERT INTO tbl_history_students VALUES(33, 101);
INSERT INTO tbl_history_students VALUES(11, 102);
INSERT INTO tbl_history_students VALUES(91, 103);
INSERT INTO tbl_history_students VALUES(12, 105);
INSERT INTO tbl_history_students VALUES(13, 105);
INSERT INTO tbl_history_students VALUES(128, 106);
INSERT INTO tbl_history_students VALUES(129, 107);
INSERT INTO tbl_history_students VALUES(65, 108);
INSERT INTO tbl_history_students VALUES(95, 109);
INSERT INTO tbl_history_students VALUES(64, 111);
INSERT INTO tbl_history_students VALUES(59, 112);
INSERT INTO tbl_history_students VALUES(86, 113);
INSERT INTO tbl_history_students VALUES(80, 114);
INSERT INTO tbl_history_students VALUES(73, 115);
INSERT INTO tbl_history_students VALUES(32, 116);
INSERT INTO tbl_history_students VALUES(31, 117);
INSERT INTO tbl_history_students VALUES(138, 118);
INSERT INTO tbl_history_students VALUES(139, 118);
INSERT INTO tbl_history_students VALUES(102, 119);
INSERT INTO tbl_history_students VALUES(103, 119);
INSERT INTO tbl_history_students VALUES(56, 120);
INSERT INTO tbl_history_students VALUES(4, 121);
INSERT INTO tbl_history_students VALUES(5, 121);
INSERT INTO tbl_history_students VALUES(62, 122);
INSERT INTO tbl_history_students VALUES(136, 62);
INSERT INTO tbl_history_students VALUES(137, 62);
INSERT INTO tbl_history_students VALUES(114, 123);
INSERT INTO tbl_history_students VALUES(115, 123);
INSERT INTO tbl_history_students VALUES(157, 124);
INSERT INTO tbl_history_students VALUES(156, 124);
INSERT INTO tbl_history_students VALUES(131, 125);
INSERT INTO tbl_history_students VALUES(158, 125);
INSERT INTO tbl_history_students VALUES(159, 126);
INSERT INTO tbl_history_students VALUES(160, 126);
INSERT INTO tbl_history_students VALUES(161, 127);
INSERT INTO tbl_history_students VALUES(162, 127);
INSERT INTO tbl_history_students VALUES(163, 128);
INSERT INTO tbl_history_students VALUES(72, 129);
INSERT INTO tbl_history_students VALUES(164, 129);
INSERT INTO tbl_history_students VALUES(165, 130);
INSERT INTO tbl_history_students VALUES(166, 130);
INSERT INTO tbl_history_students VALUES(167, 131);
INSERT INTO tbl_history_students VALUES(168, 131);
INSERT INTO tbl_history_students VALUES(169, 132);
INSERT INTO tbl_history_students VALUES(170, 132);
INSERT INTO tbl_history_students VALUES(171, 133);
INSERT INTO tbl_history_students VALUES(172, 133);
INSERT INTO tbl_history_students VALUES(173, 133);
INSERT INTO tbl_history_students VALUES(174, 133);
INSERT INTO tbl_history_students VALUES(175, 25);
INSERT INTO tbl_history_students VALUES(176, 25);
INSERT INTO tbl_history_students VALUES(38, 135);
INSERT INTO tbl_history_students VALUES(177, 136);
INSERT INTO tbl_history_students VALUES(143, 136);
INSERT INTO tbl_history_students VALUES(144, 136);
INSERT INTO tbl_history_students VALUES(145, 136);
INSERT INTO tbl_history_students VALUES(178, 137);
INSERT INTO tbl_history_students VALUES(179, 137);
INSERT INTO tbl_history_students VALUES(181, 139);
INSERT INTO tbl_history_students VALUES(182, 139);
INSERT INTO tbl_history_students VALUES(104, 139);
INSERT INTO tbl_history_students VALUES(184, 141);
INSERT INTO tbl_history_students VALUES(180, 138);
INSERT INTO tbl_history_students VALUES(183, 138);
INSERT INTO tbl_history_students VALUES(185, 138);
INSERT INTO tbl_history_students VALUES(186, 143);
INSERT INTO tbl_history_students VALUES(187, 143);
INSERT INTO tbl_history_students VALUES(188, 144);
INSERT INTO tbl_history_students VALUES(189, 144);
INSERT INTO tbl_history_students VALUES(190, 145);
INSERT INTO tbl_history_students VALUES(191, 145);
INSERT INTO tbl_history_students VALUES(192, 146);
INSERT INTO tbl_history_students VALUES(193, 146);
INSERT INTO tbl_history_students VALUES(194, 147);
INSERT INTO tbl_history_students VALUES(195, 147);
INSERT INTO tbl_history_students VALUES(196, 148);
INSERT INTO tbl_history_students VALUES(197, 148);
INSERT INTO tbl_history_students VALUES(50, 150);
INSERT INTO tbl_history_students VALUES(198, 151);
INSERT INTO tbl_history_students VALUES(66, 152);
INSERT INTO tbl_history_students VALUES(199, 153);
INSERT INTO tbl_history_students VALUES(200, 154);
INSERT INTO tbl_history_students VALUES(135, 166);
INSERT INTO tbl_history_students VALUES(49, 171);
INSERT INTO tbl_history_students VALUES(212, 174);
INSERT INTO tbl_history_students VALUES(215, 176);
INSERT INTO tbl_history_students VALUES(201, 178);
INSERT INTO tbl_history_students VALUES(51, 179);
INSERT INTO tbl_history_students VALUES(52, 180);
INSERT INTO tbl_history_students VALUES(203, 180);
INSERT INTO tbl_history_students VALUES(202, 181);
INSERT INTO tbl_history_students VALUES(217, 182);
INSERT INTO tbl_history_students VALUES(218, 183);
INSERT INTO tbl_history_students VALUES(53, 184);
INSERT INTO tbl_history_students VALUES(219, 185);
INSERT INTO tbl_history_students VALUES(220, 186);
INSERT INTO tbl_history_students VALUES(222, 188);
INSERT INTO tbl_history_students VALUES(223, 189);
INSERT INTO tbl_history_students VALUES(224, 189);
INSERT INTO tbl_history_students VALUES(225, 190);
INSERT INTO tbl_history_students VALUES(226, 191);
INSERT INTO tbl_history_students VALUES(214, 175);
INSERT INTO tbl_history_students VALUES(213, 201);
INSERT INTO tbl_history_students VALUES(216, 177);
INSERT INTO tbl_history_students VALUES(50, 27);
INSERT INTO tbl_history_students VALUES(49, 27);
INSERT INTO tbl_history_students VALUES(270, 202);
INSERT INTO tbl_history_students VALUES(272, 204);
INSERT INTO tbl_history_students VALUES(273, 205);
INSERT INTO tbl_history_students VALUES(274, 206);
INSERT INTO tbl_history_students VALUES(275, 207);
INSERT INTO tbl_history_students VALUES(276, 208);
INSERT INTO tbl_history_students VALUES(16, 209);
INSERT INTO tbl_history_students VALUES(277, 210);
INSERT INTO tbl_history_students VALUES(278, 211);
INSERT INTO tbl_history_students VALUES(279, 212);
INSERT INTO tbl_history_students VALUES(280, 213);
INSERT INTO tbl_history_students VALUES(41, 214);
INSERT INTO tbl_history_students VALUES(40, 215);
INSERT INTO tbl_history_students VALUES(281, 216);
INSERT INTO tbl_history_students VALUES(40, 217);
INSERT INTO tbl_history_students VALUES(41, 217);
INSERT INTO tbl_history_students VALUES(79, 218);
INSERT INTO tbl_history_students VALUES(280, 219);
INSERT INTO tbl_history_students VALUES(16, 220);
INSERT INTO tbl_history_students VALUES(282, 221);
INSERT INTO tbl_history_students VALUES(283, 221);
INSERT INTO tbl_history_students VALUES(284, 222);
INSERT INTO tbl_history_students VALUES(285, 222);
INSERT INTO tbl_history_students VALUES(286, 223);
INSERT INTO tbl_history_students VALUES(287, 223);
INSERT INTO tbl_history_students VALUES(288, 224);
INSERT INTO tbl_history_students VALUES(289, 224);
INSERT INTO tbl_history_students VALUES(29, 225);
INSERT INTO tbl_history_students VALUES(28, 225);
INSERT INTO tbl_history_students VALUES(290, 226);
INSERT INTO tbl_history_students VALUES(264, 227);
INSERT INTO tbl_history_students VALUES(291, 228);
INSERT INTO tbl_history_students VALUES(292, 229);
INSERT INTO tbl_history_students VALUES(310, 230);
INSERT INTO tbl_history_students VALUES(293, 231);
INSERT INTO tbl_history_students VALUES(311, 232);
INSERT INTO tbl_history_students VALUES(312, 233);
INSERT INTO tbl_history_students VALUES(294, 234);
INSERT INTO tbl_history_students VALUES(295, 235);
INSERT INTO tbl_history_students VALUES(296, 236);
INSERT INTO tbl_history_students VALUES(313, 237);
INSERT INTO tbl_history_students VALUES(297, 238);
INSERT INTO tbl_history_students VALUES(298, 239);
INSERT INTO tbl_history_students VALUES(221, 187);
INSERT INTO tbl_history_students VALUES(314, 187);
INSERT INTO tbl_history_students VALUES(300, 241);
INSERT INTO tbl_history_students VALUES(315, 242);
INSERT INTO tbl_history_students VALUES(301, 243);
INSERT INTO tbl_history_students VALUES(316, 244);
INSERT INTO tbl_history_students VALUES(317, 245);
INSERT INTO tbl_history_students VALUES(318, 246);
INSERT INTO tbl_history_students VALUES(319, 247);
INSERT INTO tbl_history_students VALUES(320, 248);
INSERT INTO tbl_history_students VALUES(302, 250);
INSERT INTO tbl_history_students VALUES(324, 253);
INSERT INTO tbl_history_students VALUES(303, 255);
INSERT INTO tbl_history_students VALUES(326, 256);
INSERT INTO tbl_history_students VALUES(327, 258);
INSERT INTO tbl_history_students VALUES(125, 259);
INSERT INTO tbl_history_students VALUES(328, 260);
INSERT INTO tbl_history_students VALUES(305, 261);
INSERT INTO tbl_history_students VALUES(329, 262);
INSERT INTO tbl_history_students VALUES(306, 263);
INSERT INTO tbl_history_students VALUES(330, 264);
INSERT INTO tbl_history_students VALUES(307, 265);
INSERT INTO tbl_history_students VALUES(333, 265);
INSERT INTO tbl_history_students VALUES(335, 265);
INSERT INTO tbl_history_students VALUES(260, 266);
INSERT INTO tbl_history_students VALUES(263, 267);
INSERT INTO tbl_history_students VALUES(258, 268);
INSERT INTO tbl_history_students VALUES(261, 269);
INSERT INTO tbl_history_students VALUES(265, 270);
INSERT INTO tbl_history_students VALUES(268, 271);
INSERT INTO tbl_history_students VALUES(269, 272);
INSERT INTO tbl_history_students VALUES(267, 274);
INSERT INTO tbl_history_students VALUES(213, 275);
INSERT INTO tbl_history_students VALUES(337, 276);
INSERT INTO tbl_history_students VALUES(338, 277);
INSERT INTO tbl_history_students VALUES(339, 278);
INSERT INTO tbl_history_students VALUES(340, 279);
INSERT INTO tbl_history_students VALUES(341, 280);
INSERT INTO tbl_history_students VALUES(259, 281);
INSERT INTO tbl_history_students VALUES(342, 282);
INSERT INTO tbl_history_students VALUES(343, 283);
INSERT INTO tbl_history_students VALUES(344, 284);
INSERT INTO tbl_history_students VALUES(345, 285);
INSERT INTO tbl_history_students VALUES(346, 286);
INSERT INTO tbl_history_students VALUES(347, 287);
INSERT INTO tbl_history_students VALUES(322, 251);
INSERT INTO tbl_history_students VALUES(299, 251);
INSERT INTO tbl_history_students VALUES(348, 288);
INSERT INTO tbl_history_students VALUES(304, 257);
INSERT INTO tbl_history_students VALUES(321, 257);
INSERT INTO tbl_history_students VALUES(349, 289);
INSERT INTO tbl_history_students VALUES(323, 252);
INSERT INTO tbl_history_students VALUES(325, 252);
INSERT INTO tbl_history_students VALUES(350, 290);
INSERT INTO tbl_history_students VALUES(353, 292);
INSERT INTO tbl_history_students VALUES(354, 293);
INSERT INTO tbl_history_students VALUES(355, 293);
INSERT INTO tbl_history_students VALUES(356, 294);
INSERT INTO tbl_history_students VALUES(357, 294);
INSERT INTO tbl_history_students VALUES(358, 294);
INSERT INTO tbl_history_students VALUES(359, 294);
INSERT INTO tbl_history_students VALUES(363, 296);
INSERT INTO tbl_history_students VALUES(364, 297);
INSERT INTO tbl_history_students VALUES(365, 298);
INSERT INTO tbl_history_students VALUES(329, 298);
INSERT INTO tbl_history_students VALUES(373, 299);
INSERT INTO tbl_history_students VALUES(351, 291);
INSERT INTO tbl_history_students VALUES(352, 291);
INSERT INTO tbl_history_students VALUES(374, 291);
INSERT INTO tbl_history_students VALUES(375, 291);
INSERT INTO tbl_history_students VALUES(376, 291);
INSERT INTO tbl_history_students VALUES(360, 295);
INSERT INTO tbl_history_students VALUES(361, 295);
INSERT INTO tbl_history_students VALUES(362, 295);
INSERT INTO tbl_history_students VALUES(377, 300);
INSERT INTO tbl_history_students VALUES(377, 301);

-- -----------------------------
-- Structure de la table tbl_history_documents
-- -----------------------------
CREATE TABLE `tbl_history_documents` (
  `PKNoProjectDocument` int(11) NOT NULL AUTO_INCREMENT,
  `source` varchar(45) DEFAULT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `ext` varchar(13) DEFAULT NULL,
  `size` varchar(10) DEFAULT NULL,
  `desc` text,
  `FKNoProjectHistory` int(11) DEFAULT NULL,
  `FKNoProject` int(11) DEFAULT NULL,
  PRIMARY KEY (`PKNoProjectDocument`),
  KEY `FKNoProjectHistory` (`FKNoProjectHistory`),
  KEY `FKNoProject` (`FKNoProject`),
  CONSTRAINT `tbl_history_documents_ibfk_1` FOREIGN KEY (`FKNoProjectHistory`) REFERENCES `tbl_projects_history` (`PKNoProjectHistory`) ON DELETE CASCADE,
  CONSTRAINT `tbl_history_documents_ibfk_2` FOREIGN KEY (`FKNoProject`) REFERENCES `tbl_projects` (`PKNoProject`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- -----------------------------
-- Contenu de la table tbl_history_documents
-- -----------------------------
INSERT INTO tbl_history_documents VALUES(1, 'crashreporteroverride.ini', 'crashreporter-override', '.ini', '713 o', NULL, 175, 128);
INSERT INTO tbl_history_documents VALUES(3, 'liste.pdf', 'Liste des projets 2012', '.pdf', '83.32 Ko', NULL, 174, 126);
INSERT INTO tbl_history_documents VALUES(4, 'posters.pdf', 'Posters 2012', '.pdf', '22.94 Mo', NULL, 174, 126);

-- -----------------------------
-- Structure de la table students_login
-- -----------------------------
CREATE TABLE `students_login` (
  `PKNoMembre` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(85) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `key_crypte` varchar(255) DEFAULT NULL,
  `temp` varchar(15) DEFAULT NULL,
  `actif` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`PKNoMembre`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- -----------------------------
-- Contenu de la table students_login
-- -----------------------------
INSERT INTO students_login VALUES(3, 'dominique.roduit@live.emvs.net', '942a4afcd00871c3128a2242ff44341ad3b448bc', '9b6388beba028377462a373df4d09e660d11e317', NULL, 1);
INSERT INTO students_login VALUES(4, 'thibaud.duchoud@live.emvs.net', 'd68abc69bff064f84e99fd00eda2805f4eda3493', 'c50ba44d780f7c4f58cda3d25accbb52beffa7eb', NULL, 1);
INSERT INTO students_login VALUES(5, 'steven.roh@live.emvs.net', '89f57f80bc49811d31371e5e553e1f6a10a4417d', '80de6567b74683b63df5afb94512b79a837d96ca', NULL, 1);
INSERT INTO students_login VALUES(6, 'mariano.musy@live.emvs.net', '6d2aec116944bd3c286545cf2032ff11197d699b', '4245734754a91e4957ed7a15213bae1804dbf466', NULL, 1);
INSERT INTO students_login VALUES(7, 'vincent.bearpark@live.emvs.net', '04116091ae2115c52c22de7f17006840262d328f', 'a0996f1e1d7182283217f5a57794c422d97711a4', NULL, 1);
INSERT INTO students_login VALUES(8, 'bastien.alter@live.emvs.net', '695a088000b9f10d5e5469ec7783f4f2e8d0a9b8', '7f701ff0c181d08358f1dddbcecaa953193e3a27', NULL, 1);
INSERT INTO students_login VALUES(9, 'roduit.domi@live.emvs.net', '134f2e9582633ae500c48489ecb36cd2f22a5346', '8fc541d8742c8b8b2367d1f6f80eb67e95014302', NULL, 1);
INSERT INTO students_login VALUES(10, 'morel.math@live.emvs.net', '2136c2c4b98ad48a78a2a2ea9a58827a8e870f78', '35c1bd388cf8f222dc19051f87276d1ce2cb15f5', NULL, 1);
INSERT INTO students_login VALUES(11, 'roh.stev@live.emvs.net', 'cbc7d5c0b2fe5443d3307c444ec3d3724858a223', 'c27b07214c4eeb926e3e5bbd2eeaa4e2c11ac50d', NULL, 1);
INSERT INTO students_login VALUES(12, 'riad.kari@live.emvs.net', NULL, NULL, '5Px&U03k7Jd', 0);
INSERT INTO students_login VALUES(13, 'normand.chri@live.emvs.net', '6cc9b6c3e53a4f70268e566691bae94a3b251e84', '997a429b45d463f936a16e872c40c59e3e4b7f71', NULL, 1);
INSERT INTO students_login VALUES(14, 'duchoud.thib@live.emvs.net', NULL, NULL, '1Ie#@93n2Jy', 0);
INSERT INTO students_login VALUES(15, 'moret.jero@live.emvs.net', NULL, NULL, '8Aq$N23s7Ac', 0);
INSERT INTO students_login VALUES(16, 'treyer.thie@live.emvs.net', NULL, NULL, '6Ut#N94e5Np', 0);
INSERT INTO students_login VALUES(17, 'ferreira.mari@live.emvs.net', '5c96898886761b7ba5ad5bbe9842c27a51c30a0f', '5adfec51f3465b9c24c61a1676962c91d884beb6', NULL, 1);
INSERT INTO students_login VALUES(18, 'luthi.theo@live.emvs.net', NULL, NULL, '2Rq%O81x9Iz', 0);
INSERT INTO students_login VALUES(19, 'dubuis.jere@live.emvs.net', '570be125472ca1c1524d2132775f8bf3c573b964', 'c5d79bf08a2d5bd00fe7d050978a1d362d981c25', NULL, 1);
INSERT INTO students_login VALUES(20, 'richard.loic@live.emvs.net', '0d7531d1a461c5b8de0ab515f9b6e31461469a1d', '196cfb4407ae42caf2f8b9c69b5d6f2b4cd6957a', NULL, 1);
INSERT INTO students_login VALUES(21, 'dosreis.leo@live.emvs.net', '2ac99fa9f15b2547cedaf836ce78a40303573b33', '542b75260eca64c9a6529ca2ed205e1c05a397e6', NULL, 1);
INSERT INTO students_login VALUES(22, 'michaud.jere@live.emvs.net', '8357ba7831458b40560d329cd0ea27846a8c3619', '22bb240b9607b8f36827f62daf993fd8584e53d7', NULL, 1);
INSERT INTO students_login VALUES(23, 'jonathan.maret@live.emvs.net', NULL, NULL, '7Os&W45m5Ij', 0);
INSERT INTO students_login VALUES(24, 'donnetmona.adri@live.emvs.net', '3a550ff659962ea497e43a2fa3c8fa57b74507e6', '599ae23c518f47c88dd14089481862ad91308c09', NULL, 1);
INSERT INTO students_login VALUES(25, 'honorato.lean@live.emvs.net', 'fde45c2f7b7a27443d4be815af0b500c91055f9a', '5f1ce91a51aea7e7df42051ed0a7d55fa8973ce1', NULL, 1);
INSERT INTO students_login VALUES(26, 'maret.jona@live.emvs.net', 'dbca9298c9d2cd3e85df041c6bdf9d8533731a40', '2710edcd6e3594df4c5c4d7b5edeb2dc17f9d5b5', NULL, 1);
INSERT INTO students_login VALUES(27, 'candelier.alex@live.emvs.net', '054b8d86861d993ccef961e0948831499315bc11', 'da090250536a60f165dbbaf52f46813cef35f1d2', NULL, 1);

-- -----------------------------
-- Structure de la table tbl_visiteurs
-- -----------------------------
CREATE TABLE `tbl_visiteurs` (
  `PKNoVisiteur` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(16) DEFAULT NULL,
  `navigateur` varchar(100) DEFAULT NULL,
  `os` varchar(50) DEFAULT NULL,
  `pc` tinyint(1) DEFAULT NULL,
  `last_visit` datetime DEFAULT NULL,
  PRIMARY KEY (`PKNoVisiteur`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- -----------------------------
-- Contenu de la table tbl_visiteurs
-- -----------------------------
INSERT INTO tbl_visiteurs VALUES(2, '::1', 'Firefox', 'Windows 7', 1, '2012-11-10 20:52:03');


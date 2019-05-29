DROP TABLE demande;

CREATE TABLE `demande` (
  `mac` varchar(12) NOT NULL,
  `num` int(11) NOT NULL,
  `appareil` varchar(25) NOT NULL,
  `groupeUtilisateur` varchar(15) NOT NULL,
  `dateDemande` date NOT NULL,
  `etat` varchar(10) NOT NULL,
  PRIMARY KEY (`mac`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO demande VALUES("001e331d6a79","216","Téléphone","SLAM","2018-12-10","Demandé");
INSERT INTO demande VALUES("e0d55e69a045","216","Ordinateur","SLAM","2018-12-10","Accepté");
INSERT INTO demande VALUES("b46bfca048ee","216","Autre","SLAM","2018-12-10","Refusé");
INSERT INTO demande VALUES("b46abea048ee","2","Ordinateur","Enseignant","2018-12-10","Demandé");
INSERT INTO demande VALUES("f36bfca048ee","2","Téléphone","Enseignant","2018-12-10","Accepté");
INSERT INTO demande VALUES("b65feaa048ee","2","Tablette","Enseignant","2018-12-10","Refusé");



DROP TABLE port_etudiant;

CREATE TABLE `port_etudiant` (
  `num` int(11) NOT NULL AUTO_INCREMENT,
  `numGroupe` int(11) NOT NULL,
  `nom` char(32) NOT NULL,
  `prenom` char(32) NOT NULL,
  `mel` char(64) NOT NULL,
  `mdp` char(32) NOT NULL,
  `numexam` char(32) DEFAULT NULL,
  `valide` char(1) DEFAULT 'O',
  PRIMARY KEY (`num`)
) ENGINE=InnoDB AUTO_INCREMENT=217 DEFAULT CHARSET=utf8;

INSERT INTO port_etudiant VALUES("216","15","LE FLOUR","Dylan","dylan.leflour25@gmail.com","25b1ee28401b26c2de1df6c474ceda27","","O");



DROP TABLE port_professeur;

CREATE TABLE `port_professeur` (
  `num` int(11) NOT NULL AUTO_INCREMENT,
  `nom` char(32) NOT NULL,
  `prenom` char(32) NOT NULL,
  `mel` char(64) NOT NULL,
  `mdp` char(32) NOT NULL,
  `niveau` int(11) NOT NULL,
  `valide` char(1) DEFAULT 'O',
  PRIMARY KEY (`num`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO port_professeur VALUES("1","ADMIN","Prof","prof.admin@gmail.com","25b1ee28401b26c2de1df6c474ceda27","0","O");
INSERT INTO port_professeur VALUES("2","USER","Prof","prof.user@gmail.com","25b1ee28401b26c2de1df6c474ceda27","1","O");




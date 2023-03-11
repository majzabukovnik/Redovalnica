CREATE TABLE Razredi(
                        id_razreda varchar(3) PRIMARY KEY NOT NULL,
                        smer varchar(20) NOT NULL
);

CREATE TABLE Ucitelji(
                         id_ucitelja varchar(13) PRIMARY KEY NOT NULL,
                         ime varchar(30) NOT NULL,
                         priimek varchar(30) NOT NULL,
                         naslov varchar(60) NOT NULL,
                         telefonska_stevilka varchar(9) NOT NULL CHECK (telefonska_stevilka LIKE '0%'),
                         email varchar(60) NOT NULL CHECK (email LIKE '%@sc-celje.si'),
                         geslo varchar(100) NOT NULL,
                         datum_rojstva date NOT NULL,
                         vloga varchar(3) CHECK (vloga IN ('admin', 'ucitelj')),
                         razrednik varchar(3),
                         FOREIGN KEY (razrednik) REFERENCES Razredi(id_razreda)
);

CREATE TABLE Dijaki(
                       id_dijaka varchar(13) PRIMARY KEY NOT NULL,
                       ime varchar(30) NOT NULL,
                       priimek varchar(30) NOT NULL,
                       naslov varchar(60) NOT NULL,
                       telefonska_stevilka varchar(9) NOT NULL CHECK (telefonska_stevilka LIKE '0%'),
                       email varchar(60) NOT NULL CHECK (email LIKE '%@dijak.sc-celje.si'),
                       geslo varchar(100) NOT NULL,
                       datum_rojstva date NOT NULL,
                       razred varchar(3),
                       FOREIGN KEY (razred) REFERENCES Razredi(id_razreda)
);

CREATE TABLE Predmet(
                        id_predmeta varchar(20) PRIMARY KEY NOT NULL,
                        st_ur int NOT NULL
);

CREATE TABLE Uci(
                    id_uci int PRIMARY KEY AUTO_INCREMENT NOT NULL,
                    id_ucitelja varchar(13) NOT NULL,
                    FOREIGN KEY (id_ucitelja) REFERENCES Ucitelji(id_ucitelja),
                    id_predmeta varchar(20) NOT NULL,
                    FOREIGN KEY (id_predmeta) REFERENCES Predmet(id_predmeta)
);

CREATE TABLE Urnik(
                      id_urnika int NOT NULL PRIMARY KEY,
                      id_razreda varchar(3) NOT NULL,
                      FOREIGN KEY (id_razreda) REFERENCES Razredi(id_razreda),
                      id_uci int NOT NULL,
                      FOREIGN KEY (id_uci) REFERENCES Uci(id_uci),
                      ura int CHECK (ura BETWEEN 0 AND 8),
                      dan varchar(3) CHECK (dan IN ('pon', 'tor', 'sre', 'čet', 'pet'))
);

CREATE TABLE Ocene(
                      id_ocene int PRIMARY KEY NOT NULL AUTO_INCREMENT,
                      id_uci int NOT NULL,
                      FOREIGN KEY (id_uci) REFERENCES Uci(id_uci),
                      id_dijaka varchar(13) NOT NULL,
                      FOREIGN KEY (id_dijaka) REFERENCES Dijaki(id_dijaka),
                      cas datetime DEFAULT CURRENT_TIMESTAMP,
                      ocena int CHECK (ocena BETWEEN 1 AND 5),
                      tip_ocene varchar(10) CHECK tip_ocene IN ('pisna', 'ustna', 'izdelek'),
                      komentar text
);

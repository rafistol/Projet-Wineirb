DROP TABLE IF EXISTS Locaux cascade;
DROP TABLE IF EXISTS Ordi_Serveurs cascade;
DROP TABLE IF EXISTS Routeurs cascade; 
DROP TABLE IF EXISTS Interfaces cascade; 
DROP TABLE IF EXISTS Reseaux cascade; 
DROP TABLE IF EXISTS Ordi_Clients cascade; 
; 

CREATE TABLE Locaux(
	id SERIAL PRIMARY KEY,
	nom VARCHAR
);

CREATE TABLE Reseaux(
	id SERIAL PRIMARY KEY,
	adresseIP VARCHAR
);

CREATE TABLE Routeurs(
	id SERIAL PRIMARY KEY,
	nom VARCHAR,
	id_locaux INTEGER REFERENCES Locaux
);

CREATE TABLE Interfaces(
	id SERIAL PRIMARY KEY,
	nom VARCHAR,
	adresseMAC VARCHAR,
	adresseIP VARCHAR,
	id_routeurs INTEGER REFERENCES Routeurs,
	id_reseaux INTEGER REFERENCES Reseaux
);

CREATE TABLE Ordi_Serveurs(
	id SERIAL PRIMARY KEY,
	nom VARCHAR,
	adresseMAC VARCHAR,
	adresseIP VARCHAR,
	id_reseaux INTEGER REFERENCES Reseaux,
	id_locaux INTEGER REFERENCES Locaux
);


CREATE TABLE Ordi_Clients(
	id SERIAL PRIMARY KEY,
	nom VARCHAR,
	adresseMAC VARCHAR,
	adresseIP VARCHAR,
	id_locaux INTEGER REFERENCES Locaux,
	id_reseaux INTEGER REFERENCES Reseaux
);

CREATE TABLE Reseaux_Locaux(
	id_reseaux INTEGER REFERENCES Reseaux,
	id_locaux INTEGER REFERENCES Locaux
);

INSERT INTO Locaux(nom)
VALUES
('C309'),
('BDE'),
('C307'),
('C006')
;

INSERT INTO Reseaux(adresseIP)
VALUES
('192.168.1.0'),
('192.168.2.0'),
('192.168.3.0'),
('192.168.4.0')
;

INSERT INTO Routeurs(nom, id_locaux)
VALUES
('RouteurA', 1),
('RouteurB', 2),
('RouteurC', 3),
('RouteurD', 4)
;

INSERT INTO Interfaces(nom, adresseMAC, adresseIP, id_routeurs, id_reseaux)
VALUES
('Fa0/0','0F:ER:3D:56:F0:EA', '192.168.1.10', 1, 1),
('Fa0/1','0F:ER:3D:56:F0:E0', '192.168.1.11', 1, 1),
('Fa1/0','0F:ER:3D:56:F0:E1', '192.168.2.10', 2, 2),
('Fa1/1','0F:ER:3D:56:F0:E2', '192.168.2.11', 2, 2),
('Fa2/0','0F:ER:3D:56:F0:E3', '192.168.3.10', 3, 3),
('Fa2/1','0F:ER:3D:56:F0:E4', '192.168.3.11', 3, 3),
('Fa3/0','0F:ER:3D:56:F0:E5', '192.168.4.10', 4, 4),
('Fa3/1','0F:ER:3D:56:F0:E6', '192.168.4.11', 4, 4)
;

INSERT INTO Ordi_Serveurs(nom, adresseMAC, adresseIP, id_reseaux, id_locaux)
VALUES
('Raphael-PC','0F:ER:3D:56:F0:EF', '192.168.1.100', 1 ,1),
('Olivier-PC','0F:ER:3D:56:AD:FE', '192.168.2.100', 2, 2),
('Nicolas-PC','0F:ER:3D:56:EA:0F', '192.168.3.100', 3, 3),
('Truong-PC','0F:ER:3D:56:FF:DF', '192.168.4.100', 4, 4)
;

INSERT INTO Ordi_Clients(nom, adresseMAC, adresseIP, id_reseaux, id_locaux)
VALUES
('Ronald-PC','0F:ER:3D:56:F0:EA', '192.168.1.1', 1 ,1),
('Cyril-PC','0F:ER:3D:56:AD:FA', '192.168.1.2', 1, 1),
('Cyprien-PC','0F:ER:3D:56:EA:0A', '192.168.2.1', 2, 2),
('Guillaume-PC','0F:ER:3D:56:FF:DA', '192.168.2.2', 2, 2),
('Thomas-PC','0F:ER:3D:56:FF:DE', '192.168.3.1', 3, 3),
('Alex-PC','0F:ER:3D:56:FF:DF', '192.168.3.2', 3, 3),
('Léa-PC','0F:ER:3D:56:FF:FF', '192.168.4.1', 4, 4),
('Georges-PC','0F:ER:3D:56:FF:0F', '192.168.4.2', 4, 4)
;

INSERT INTO Reseaux_Locaux(id_reseaux, id_locaux)
VALUES
(1, 1),
(1, 3),
(2, 4),
(2, 2),
(3, 1),
(3, 1),
(4, 2),
(4, 3)
;

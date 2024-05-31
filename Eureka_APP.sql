create database Eureka_Finder;
use eureka_finder;
CREATE TABLE Usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_completo VARCHAR(100),
    cpf VARCHAR(14) UNIQUE,
    celular VARCHAR(15),
    perfil ENUM('Aluno Mauá', 'Ex-Aluno', 'Professor Mauá', 'Colaborador Mauá', 'Familiar de Formando', 'Estudante de Ensino Médio', 'Professor de Ensino Médio', 'Investidor', 'Empresário', 'Outros'),
    email VARCHAR(100) UNIQUE,
    senha VARCHAR(100)
);

DESCRIBE Usuarios;
create table coordenadas( estandes integer, x integer, y integer);
describe coordenadas;
INSERT INTO coordenadas (estandes, x, y)
VALUES 
    (1, 5, 53);
INSERT INTO coordenadas (estandes, x, y)
VALUES 
    (2, 2, 49),
    (3, 3, 49),
    (4, 2, 46),
    (5, 3, 46),
    (6, 2, 43),
    (7, 3, 43),
    (8, 2, 40),
    (9, 3, 40),
    (10, 2, 34)
    ;
INSERT INTO coordenadas (estandes, x, y)
VALUES 
    (11, 3, 34),
    (12, 2, 31),
    (13, 3, 31),
    (14, 2, 28),
    (15, 3, 28),
    (16, 2, 25),
    (17, 3, 25),
    (18, 2, 22),
    (19, 3, 22),
    (20, 2, 16),
    (21, 3, 15),
    (22, 2, 13),
    (23, 3, 12),
    (24, 2, 10),
    (25, 3, 9),
    (26, 2, 7),
    (27, 3, 6),
    (28, 2, 4)
    ;
    INSERT INTO coordenadas (estandes, x, y)
VALUES 
    (40, 8, 49),
    (41, 11, 53),
    (42, 8, 46),
    (43, 10, 37),
    (44, 8, 43),
    (45, 9, 34),
    (46, 8, 40),
    (47, 9, 31),
    (48, 8, 34),
    (49, 9, 29),
    (50, 8, 31),
    (51, 9, 26),
    (52, 8, 28),
    (53, 9, 22),
    (54, 8, 25),
    (55, 10, 18),
    (56, 8, 22),
    (57, 9, 13),
    (58, 8, 15),
    (59, 9, 10),
    (60, 8, 12),
    (61, 9, 7),
    (62, 8, 9),
    (63, 11, 2),
    (64, 8, 5)
    ;
    INSERT INTO coordenadas (estandes, x, y)
VALUES 
    (70, 12, 37),
    (71, 15, 34),
    (72, 14, 35),
    (73, 15, 32),
    (74, 14, 32),
    (75, 15, 30),
    (76, 14, 29),
    (77, 15, 28),
    (78, 14, 27),
    (79, 15, 25),
    (80, 14, 25),
    (81, 15, 22),
    (82, 14, 22),
    (83, 17, 18),
    (84, 14, 16),
    (85, 15, 13),
    (86, 14, 13),
    (87, 15, 10),
    (88, 14, 10),
    (89, 15, 7),
    (90, 14, 7),
    (91, 17, 2)
    ;
    INSERT INTO coordenadas (estandes, x, y)
VALUES 
    (100, 20, 34),
    (101, 21, 48),
    (102, 20, 32),
    (103, 21, 45),
    (104, 20, 30),
    (105, 21, 42),
    (106, 20, 28),
    (107, 21, 39),
    (108, 20, 25),
    (109, 23, 36),
    (110, 20, 22),
    (111, 21, 31),
    (112, 20, 13),
    (113, 21, 28),
    (114, 20, 10),
    (115, 21, 25),
    (116, 20, 7),
    (117, 21, 22),
    (119, 21, 17),
    (121, 21, 14),
    (123, 21, 11),
    (125, 21, 8),
    (127, 23, 2)
    ;
    INSERT INTO coordenadas (estandes, x, y)
VALUES 
    (130, 26, 48),
    (131, 27, 53),
    (132, 26, 45),
    (133, 27, 51),
    (134, 26, 45),
    (135, 27, 49),
    (136, 26, 39),
    (137, 27, 46),
    (138, 26, 31),
    (139, 27, 43),
    (140, 26, 28),
    (141, 27, 40),
    (142, 26, 25),
    (143, 27, 37),
    (144, 26, 22),
    (145, 27, 34),
    (146, 26, 17),
    (147, 27, 32),
    (148, 26, 14),
    (149, 27, 27),
    (150, 26, 11),
    (151, 27, 22),
    (152, 26, 8),
    (153, 27, 19),
    (155, 27, 16),
    (157, 27, 13),
    (159, 27, 10),
    (161, 27, 5)
    ;
INSERT INTO coordenadas (estandes, x, y)
VALUES 
    (900, 24, 59),
    (901, 24, 59),
    (902, 24, 59)
    ;
select x, y from coordenadas where estandes=1;
drop table coordenadas;

CREATE DATABASE dziennik;
USE dziennik;

CREATE TABLE klasy(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nazwa VARCHAR(10),
    wychowawca VARCHAR(50)
);

CREATE TABLE uczniowie(
    id INT AUTO_INCREMENT PRIMARY KEY,
    imie VARCHAR(30),
    nazwisko VARCHAR(30),
    srednia DECIMAL(3,1),
    klasa_id INT
);

CREATE TABLE uzytkownicy(
    id INT AUTO_INCREMENT PRIMARY KEY,
    login VARCHAR(30),
    haslo VARCHAR(30)
);

INSERT INTO klasy(nazwa, wychowawca) VALUES
('1A','Anna Kowalska'),
('1B','Jan Nowak'),
('1C','Maria Wisniewska');

INSERT INTO uczniowie(imie,nazwisko,srednia,klasa_id) VALUES
('Adam','Kowalski',4.5,1),
('Piotr','Nowak',3.8,1),
('Julia','Wisniewska',5.0,1),

('Marek','Wojcik',3.5,2),
('Karolina','Zielinska',4.8,2),
('Pawel','Mazur',4.0,2),

('Kacper','Krawczyk',3.2,3),
('Weronika','Wozniak',4.7,3),
('Jakub','Kaminski',4.1,3);

INSERT INTO uzytkownicy(login,haslo) VALUES
('Anna','Kowalska'),
('Jan','Nowak'),
('Maria','Wisniewska');
create database Relampago
go

use Relampago
go

create table Usuarios(
IdUsuario int primary key identity(1,1),
Usuario varchar(20),
Contrasena varchar(200)
)

create table Caracteristicas(
IdCaracteristica int primary key identity(1,1),
IdUsuario int foreign key references Usuarios(IdUsuario),
Caracteristica varchar(50)
)

create table Requerimientos(
IdRequerimiento int primary key identity(1,1),
IdCaracteristica int foreign key references Caracteristicas(IdCaracteristica),
Requerimiento varchar(100)
)

create table Factores(
IdFactor int primary key identity(1,1),
IdRequerimiento int foreign key references Requerimientos(IdRequerimiento),
Factor varchar(100),
Tipo bit
)

create table Pestel(
IdPestel int primary key identity(1,1),
IdFactor int foreign key references Factores(IdFactor),
Clasificacion bit,
Politico bit,
Econocimo bit,
Social bit,
Tecnologico bit,
Ecologico bit,
Legal bit,
Comentarios text null
)

SELECT * FROM Usuarios
SELECT * FROM Caracteristicas
SELECT * FROM Requerimientos
SELECT * FROM Factores
SELECT * FROM Pestel

DELETE FROM Caracteristicas
DELETE FROM Requerimientos
DELETE FROM Factores
DELETE FROM Pestel

DBCC CHECKIDENT (Caracteristicas, RESEED, 0)
DBCC CHECKIDENT (Requerimientos, RESEED, 0)
DBCC CHECKIDENT (Factores, RESEED, 0)
DBCC CHECKIDENT (Pestel, RESEED, 0)

--Usuarios
INSERT INTO Usuarios VALUES('Dan1','202cb962ac59075b964b07152d234b70')

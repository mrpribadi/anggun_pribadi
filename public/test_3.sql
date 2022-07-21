-- CREATE TABLE
CREATE TABLE department  (
  id_dept int(11) NOT NULL AUTO_INCREMENT,
  nama_dept varchar(100),
  PRIMARY KEY (id_dept)
);

CREATE TABLE level  (
  id_level int(11) NOT NULL AUTO_INCREMENT,
  nama_level varchar(100),
  PRIMARY KEY (id_level)
);

CREATE TABLE jabatan  (
  id_jabatan int(11) NOT NULL AUTO_INCREMENT,
  nama_jabatan varchar(100),
  id_level int(11),
  PRIMARY KEY (id_jabatan)
);

CREATE TABLE karyawan  (
  id_karyawan int(11) NOT NULL AUTO_INCREMENT,
  nik varchar(10) UNIQUE,
  nama varchar(100),
  ttl date,
  alamat text,
  id_jabatan int(11),
  id_dept int(11),
  PRIMARY KEY (id_karyawan)
);

-- INSERT DATA
INSERT INTO department (nama_dept)
VALUES ('IT'), ('Logistik'), ('Finance');

INSERT INTO level (nama_level)
VALUES ('Junior'), ('Officer'), ('Senior');

INSERT INTO jabatan (nama_jabatan, id_level)
VALUES ('Staff', 1), ('Supervisor', 2), ('Manager', 3);

INSERT INTO karyawan (nik, nama, ttl, alamat, id_jabatan)
VALUES ('0123456789', 'Anggun Pribadi', '1990-03-23', 'Jl. Assyafiiyah', 3, 1),
('1234567890', 'Arif Rahman Hakim', '1992-06-01', 'Jl. Kenangan', 2, 2),
('2345678901', 'Cholid Romli', '1986-01-10', 'Jl. Patriot Dalam III', 1, 3);

-- SELECT DATA
SELECT a.*, b.nama_jabatan, c.nama_level, d.nama_dept FROM karyawan AS a
INNER JOIN jabatan AS b ON b.id_jabatan = a.id_jabatan
INNER JOIN level AS c ON c.id_level = b.id_level
INNER JOIN department AS d ON d.id_dept = a.id_dept;

-- UPDATE DATA
UPDATE karyawan SET
nik        = '2223334444',
nama       = 'Agustin Adnan',
ttl        = '1983-08-17',
alamat     = 'Jl. Patriot Dalam',
id_jabatan = 2
WHERE id_karyawan = 3;

-- DELETE DATA
DELETE FROM karyawan WHERE id_karyawan = 3;



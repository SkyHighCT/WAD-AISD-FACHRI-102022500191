CREATE DATABASE IF NOT EXISTS kos_db;
USE kos_db;

CREATE TABLE IF NOT EXISTS penghuni (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    no_ktp VARCHAR(20) NOT NULL,
    pekerjaan VARCHAR(50) NOT NULL,
    no_kamar VARCHAR(10) NOT NULL,
    kontak_darurat VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO penghuni (nama, no_ktp, pekerjaan, no_kamar, kontak_darurat) VALUES
('Julank', '083333333333', 'Mahasiswa', 'A-01', 'Didil (0812111111111)'),
('Julenk', '082222222222', 'Mahasiswa', 'B-03', 'Tia (083111111111)'),
('Julonk', '081111111111', 'Mahasiswa', 'A-05', 'Nana (082111111111)');

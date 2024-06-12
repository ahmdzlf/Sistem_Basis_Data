-- Membuat Table Pelanggan
CREATE TABLE Pelanggan (
    ID_Pelanggan INT AUTO_INCREMENT PRIMARY KEY,
    Nama VARCHAR(100) NOT NULL,
    Alamat VARCHAR(255),
    Tanggal_Lahir DATE,
    Nomor_Telepon VARCHAR(15)
);

-- Menambahkan data ke tabel Pelanggan
INSERT INTO Pelanggan (Nama, Alamat, Tanggal_Lahir, Nomor_Telepon) VALUES
('Ahmad', 'Bekasi', '2004-05-15', '085738567890'),
('Budi', 'Jakarta', '2003-08-22', '081987654321'),
('Citra', 'Bandung', '2000-12-01', '081269340956'),
('Dewi', 'Surabaya', '2002-02-14', '081396435967'),
('Eko', 'Yogyakarta', '2003-11-11', '081123457658');

-- Membuat Table Pegawai
CREATE TABLE Pegawai (
    ID_Pegawai INT AUTO_INCREMENT PRIMARY KEY,
    Nama VARCHAR(100) NOT NULL,
    Jabatan VARCHAR(50),
    Nomor_Telepon VARCHAR(15)
);

-- Menambahkan data ke tabel Pegawai
INSERT INTO Pegawai (Nama, Jabatan, Nomor_Telepon) VALUES
('Fajar', 'Manager', '081352830485'),
('Gita', 'Kasir', '081193845162'),
('Hadi', 'Pegawai', '081124859607'),
('Intan', 'Pegawai', '081175069718'),
('Joko', 'pegawai', '081136479809');

-- Membuat Table Pesanan
CREATE TABLE Pesanan (
    ID_Pesanan INT AUTO_INCREMENT PRIMARY KEY,
    ID_Pelanggan INT,
    ID_Pegawai INT,
    Tanggal_Pesanan DATE NOT NULL,
    Total_Biaya INT,
    Status VARCHAR(50),
    FOREIGN KEY (ID_Pelanggan) REFERENCES Pelanggan(ID_Pelanggan),
    FOREIGN KEY (ID_Pegawai) REFERENCES Pegawai(ID_Pegawai)
);

-- Menambahkan data ke tabel Pesanan
INSERT INTO Pesanan (ID_Pelanggan, ID_Pegawai, Tanggal_Pesanan, Total_Biaya, Status) VALUES
(1, 2, '2024-05-28', 100000, 'Selesai'),
(2, 3, '2024-05-17', 200000, 'Diproses'),
(3, 4, '2024-05-23', 150000, 'Diproses'),
(4, 2, '2024-05-04', 120000, 'Dibatalkan'),
(5, 5, '2024-05-10', 180000, 'Diproses');

-- Membuat Table Layanan
CREATE TABLE Layanan (
    ID_Layanan INT AUTO_INCREMENT PRIMARY KEY,
    Nama_Layanan VARCHAR(100) NOT NULL,
    Harga INT NOT NULL
);

-- Menambahkan data ke tabel Layanan
INSERT INTO Layanan (Nama_Layanan, Harga) VALUES
('Cetak Dokumen', 5000),
('Cetak Foto', 30000),
('Cetak Brosur', 10000),
('Desain Grafis', 150000),
('Cetak Poster', 70000);

-- Membuat Table Detail_Pesanan
CREATE TABLE Detail_Pesanan (
    ID_Pesanan INT,
    ID_Layanan INT,
    Jumlah INT NOT NULL,
    PRIMARY KEY (ID_Pesanan, ID_Layanan),
    FOREIGN KEY (ID_Pesanan) REFERENCES Pesanan(ID_Pesanan),
    FOREIGN KEY (ID_Layanan) REFERENCES Layanan(ID_Layanan)
);

-- Menambahkan data ke tabel Detail_Pesanan
INSERT INTO Detail_Pesanan (ID_Pesanan, ID_Layanan, Jumlah) VALUES
(1, 1, 5),
(2, 2, 3),
(3, 3, 10),
(4, 4, 2),
(5, 5, 7);

-- Membuat Table Keanggotaan
CREATE TABLE Keanggotaan (
    ID_Keanggotaan INT AUTO_INCREMENT PRIMARY KEY,
    ID_Pelanggan INT,
    Nama_Keanggotaan VARCHAR(100),
    Tanggal_Bergabung DATE,
    FOREIGN KEY (ID_Pelanggan) REFERENCES Pelanggan(ID_Pelanggan)
);

-- Menambahkan data ke tabel Keanggotaan
INSERT INTO Keanggotaan (ID_Pelanggan, Nama_Keanggotaan, Tanggal_Bergabung) VALUES
(1, 'Gold', '2023-01-12'),
(2, 'Silver', '2023-02-09'),
(3, 'Bronze', '2023-03-17'),
(4, 'Gold', '2023-04-05'),
(5, 'Silver', '2023-02-10');

-- Untuk Menambah Field Kedalam Table Pelanggan
ALTER TABLE Pelanggan
ADD COLUMN Status_Keanggotaan VARCHAR(255),
ADD COLUMN Tanggal_Bergabung DATE;

-- Mengambil Data Dari Table Keanggotaan Ke Table Pelanggan
UPDATE Pelanggan p
JOIN Keanggotaan k ON p.ID_Pelanggan = k.ID_Pelanggan
SET p.Status_Keanggotaan = k.Nama_Keanggotaan,
    p.Tanggal_Bergabung = k.Tanggal_Bergabung;

-- contactsテールブルを作成

CREATE TABLE IF NOT EXISTS contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    name_kana VARCHAR(100) NOT NULL,
    email VARCHAR(254) NOT NULL,
    gender VARCHAR(10) NOT NULL,
    post VARCHAR(7) NOT NULL,
    prefecture VARCHAR(10) NOT NULL,
    city VARCHAR(100) NOT NULL,
    detail VARCHAR(100) NOT NULL,
    building VARCHAR(100),
    contact VARCHAR(1000) NOT NULL
);
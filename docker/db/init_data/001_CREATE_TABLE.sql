-- contactsテールブルを作成

CREATE TABLE IF NOT EXISTS contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    kanji VARCHAR(100) NOT NULL,
    hurigana VARCHAR(100) NOT NULL,
    email VARCHAR(254) NOT NULL,
    gender VARCHAR(10) NOT NULL,
    post INT(7) NOT NULL,
    todohuken VARCHAR(10) NOT NULL,
    shikutyoson VARCHAR(100) NOT NULL,
    soreikou VARCHAR(100) NOT NULL,
    tatemono VARCHAR(100),
    contact VARCHAR(1000) NOT NULL
);
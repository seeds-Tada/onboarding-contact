-- keiyuテールブルを作成

CREATE TABLE IF NOT EXISTS keiyu (
	id INT AUTO_INCREMENT PRIMARY KEY,
	contacts_id INT NOT NULL,
	keiyu VARCHAR(20) NOT NULL,
	FOREIGN KEY(contacts_id) REFERENCES contacts(id)
);
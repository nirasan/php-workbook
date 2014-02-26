CREATE TABLE questions (
    id          INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title       VARCHAR(255),
    difficulty  TINYINT UNSIGNED,
    body        TEXT,
    source_code TEXT,
    created     DATETIME DEFAULT NULL,
    modified    DATETIME DEFAULT NULL
);


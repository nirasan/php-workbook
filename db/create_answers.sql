CREATE TABLE answers (
    id          INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    question_id INT UNSIGNED,
    username    VARCHAR(255),
    source_code TEXT,
    result      TEXT,
    created     DATETIME DEFAULT NULL,
    modified    DATETIME DEFAULT NULL
);

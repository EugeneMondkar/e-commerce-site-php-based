CREATE TABLE categories (
`cat_id`          INT(8) NOT NULL AUTO_INCREMENT,
`cat_name`        VARCHAR(255) NOT NULL,
`cat_description`     VARCHAR(255) NOT NULL,
UNIQUE INDEX cat_name_unique (cat_name),
PRIMARY KEY (cat_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE topics (
`topic_id`        INT(8) NOT NULL AUTO_INCREMENT,
`topic_subject`       TEXT NOT NULL,
`topic_date`      DATETIME NOT NULL,
`topic_cat`       INT(8) NOT NULL,
`topic_by`        INT(8) NOT NULL,
PRIMARY KEY (topic_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE posts (
`post_id`         INT(8) NOT NULL AUTO_INCREMENT,
`post_content`        TEXT NOT NULL,
`post_date`       DATETIME NOT NULL,
`post_topic`      INT(8) NOT NULL,
`post_by`     INT(8) NOT NULL,
PRIMARY KEY (post_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



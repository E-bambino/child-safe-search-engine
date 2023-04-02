CREATE TABLE searchLogs (
  search_id INT AUTO_INCREMENT,
  child VARCHAR(255) NOT NULL,
  parent VARCHAR (255) NOT NULL,
  status VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (search_id),
  FOREIGN KEY (child) REFERENCES children(username),
  FOREIGN KEY (parent) REFERENCES parents(username)
);

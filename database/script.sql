CREATE DATABASE php_mysql_crud;

use php_mysql_crud;

CREATE TABLE task(
  id INT(11) PRIMARY KEY AUTO_INCREMENT,
  asignatura VARCHAR(255) NOT NULL,
  profesor VARCHAR(255) NOT NULL,
  link_zoom VARCHAR(255) NOT NULL,  
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

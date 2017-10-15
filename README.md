# MYSQL
### initializing the database
open MySql Shell
\sql
\c root@localhost
1234
show databases;
create database petshop;

--drop table users;

CREATE TABLE IF NOT EXISTS users (
  id int(11) NOT NULL AUTO_INCREMENT,
  login varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  pwd varchar(255) NOT NULL,
  type varchar(30) NOT NULL DEFAULT "customer",
  addr varchar(255) DEFAULT NULL,
  status boolean DEFAULT true,
  PRIMARY KEY (id),
  UNIQUE (login)
) ENGINE=InnoDB;

INSERT INTO users (login, email, pwd, type, addr) VALUES
('danilo', 'danilobatistaqueiroz@gmail.com', '$2y$10$84fjoIzq0lCz8V/3eqFuuOc90g1wuo4AMVloT7OuyePDNO5.INec6', 'admin', '');

### creating the user and granting privileges
CREATE USER 'petadmin'@'localhost' IDENTIFIED BY '123';

GRANT ALL PRIVILEGES ON * . * TO 'petadmin'@'localhost';
FLUSH PRIVILEGES;
# .


# CODEIGNITER
### assets images
https://stackoverflow.com/questions/19820314/codeigniter-assets-folder-best-practice
# .


# BOOTSTRAP
### menu bar left right
https://stackoverflow.com/questions/19733447/bootstrap-navbar-with-left-center-and-right-aligned-items
### fixed footer
https://stackoverflow.com/questions/19330611/fixed-footer-in-bootstrap
# .


# ANGULARJS
### organizing the directory structure
https://scotch.io/tutorials/angularjs-best-practices-directory-structure
# .

CREATE TABLE customers (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
first_name VARCHAR(30) NOT NULL,
last_name VARCHAR(30) NOT NULL,
email_adress VARCHAR(50) NOT NULL,
password VARCHAR(50) NOT NULL,
plz int,
straße char,
nr int, 
telephone int,     
reg_date TIMESTAMP
)

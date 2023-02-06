CREATE DATABASE xss_e_commerce;
USE xss_e_commerce;

CREATE TABLE products (
  product_id INT PRIMARY KEY,
  product_name VARCHAR(255),
  product_description TEXT,
  price DECIMAL(10, 2)
);

CREATE TABLE customers (
  customer_id INT PRIMARY KEY AUTO_INCREMENT,
  username VARCHAR(255) NOT NULL UNIQUE,
  first_name VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL
);

CREATE TABLE orders (
  order_item_id INT PRIMARY KEY,
  customer_id INT,
  product_id INT,
  FOREIGN KEY (customer_id) REFERENCES customers (customer_id),
  FOREIGN KEY (product_id) REFERENCES products (product_id)
);

INSERT INTO products (product_id, product_name, product_description, price)
VALUES (1, 'iPhone 12 Pro Max', 'The latest iPhone with advanced camera and display technology', 999.99),
       (2, 'MacBook Pro', 'High performance laptop with cutting-edge features', 1599.99),
       (3, 'Apple Watch Series 6', 'Stylish smartwatch with health and fitness features', 399.99),
       (4, 'AirPods Pro', 'Wireless earbuds with noise cancellation', 249.99),
       (5, 'iPad Pro', 'Powerful tablet with a stunning display', 799.99),
       (6, 'HomePod Mini', 'Smart speaker with exceptional sound quality', 99.99),
       (7, 'Apple TV 4K', 'Streaming device for 4K HDR content', 199.99),
       (8, 'Beats Solo Pro', 'Over-ear headphones with noise cancellation', 299.99),
       (9, 'Magic Keyboard', 'Slim and durable keyboard for iPad and Mac', 99.99),
       (10, 'Apple Pencil', 'Precision stylus for iPad', 99.99),
       (11, 'APPLE PENCIL >:|','bro lol.. u sure this a normal description?<script>alert("stored xss attack!");</script>',6.6);


-- customers table
INSERT INTO customers (customer_id, username, first_name, password)
VALUES (1, 'john_doe1', 'John','password'),
       (2, 'user', 'Pippozzo','password'),
       (3, 'emily', 'Emily','password'),
       (4, 'michael', 'Michael','password'),
       (5, 'olivia', 'Olivia','password'),
       (6, 'william', 'William','password'),
       (7, 'ava', 'Ava','password'),
       (8, 'james', 'James','password'),
       (9, 'isabella', 'Isabella','password'),
       (10, 'oliver', 'Oliver','password');


-- order_items table
INSERT INTO orders (order_item_id, customer_id, product_id)
VALUES (1, 1, 1),(2, 2, 2);



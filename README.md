# Technolectric
E-commerce Website made using HTML, CSS, JavaScript, PHP and SQL. 
### Preview of the website
![image](https://github.com/Dpaace/Technolectric/assets/63782923/babe6ff4-0625-4c62-a574-72e1d5546157)
![image](https://github.com/Dpaace/Technolectric/assets/63782923/3aada70f-c37e-45eb-a234-52a7def91abb)

### Database setup
=> Install Xampp and start the Apache and SQL server
=> Place the cloned file into the xammp -> htdocs folder 

### After the initiation of the server
=> Go to localhost/phpmyadmin/ in the browser URL
=> Click the SQL tab and run the query

CREATE DATABASE techy;

USE techy;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    price DECIMAL(10, 2) NOT NULL
);


CREATE TABLE cart (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);

CREATE TABLE contact_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    message TEXT NOT NULL,
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO `products`(`name`, `description`, `price`, `image_url`) VALUES ('Gaming Mouse','Awesome Gaming Mouse','200','images/mouse.jpg');
INSERT INTO `products`(`name`, `description`, `price`, `image_url`) VALUES ('Gaming Headphone','Awesome Gaming Headphone','300','images/headphone.png');
INSERT INTO `products`(`name`, `description`, `price`, `image_url`) VALUES ('Gaming Mic','Awesome Gaming Mic','400','images/mic.jpg');
INSERT INTO `products`(`name`, `description`, `price`, `image_url`) VALUES ('Gaming PC','Awesome Gaming PC','500','images/pc.jpg');
INSERT INTO `products`(`name`, `description`, `price`, `image_url`) VALUES ('Gaming Monitor','Awesome Gaming Monitor','600','images/monitor.jpg');


### After the query has been
=> Goto localhost/technolectric/index.php to view the website

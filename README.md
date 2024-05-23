# Tours and Travel
E-commerce Website made using HTML, CSS, JavaScript, PHP and SQL. 
### Preview of the website
![image](https://github.com/Dpaace/Technolectric/assets/63782923/e4cc47c1-f08e-4768-9dd0-709c1e158d85)
![image](https://github.com/Dpaace/Technolectric/assets/63782923/4adeb475-62c7-4f5b-8272-57594e2b896e)


### Database setup
=> Install Xampp and start the Apache and SQL server
=> Place the cloned file into the xammp -> htdocs folder 

### After the initiation of the server
=> Go to localhost/phpmyadmin/ in the browser URL
=> Click the SQL tab and run the query

CREATE DATABASE tours_and_travels;

USE tours_and_travels;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE packages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    price DECIMAL(10, 2) NOT NULL
);


CREATE TABLE cart (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    package_id INT NOT NULL,
    quantity INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (package_id) REFERENCES packages(id)
);

ALTER TABLE packages
ADD COLUMN short_description VARCHAR(255) NOT NULL AFTER description,
ADD COLUMN image_url VARCHAR(255) NOT NULL AFTER short_description;


INSERT INTO packages (name, description, short_description, image_url, price)
VALUES 
('Mountain Adventure', 
'Experience the thrill of mountain hiking and breathtaking views. This adventure takes you through rugged trails and serene mountain landscapes, where you will encounter diverse wildlife and stunning vistas. Our experienced guides will ensure your safety and provide fascinating insights into the natural history of the area. Whether you are a seasoned hiker or a beginner, this package offers the perfect mix of challenge and relaxation. Enjoy nights under the stars with campfires and stories, and days filled with exploration and discovery. This is more than just a hike; it is a journey into the heart of nature that will leave you refreshed and inspired.',
'Thrilling mountain hike', 
'images/mountain.jpg', 
299.99),

('Beach Getaway', 
'Relax on the sandy beaches and enjoy the sunshine. This beach getaway package is designed to offer the ultimate relaxation experience. Spend your days lounging on pristine beaches, swimming in crystal-clear waters, and enjoying a variety of water sports. Indulge in delicious seaside cuisine and refreshing tropical drinks. Our resort offers luxurious accommodations with stunning ocean views, private balconies, and all the amenities you need for a comfortable stay. Pamper yourself with spa treatments and unwind with yoga sessions by the sea. This is the perfect escape for anyone looking to recharge and rejuvenate in a beautiful, tranquil setting.',
'Relaxing beach holiday', 
'images/beach.jpg', 
199.99),

('City Tours', 
'Explore the vibrant city life and cultural attractions. Our city tours package takes you to the heart of the most exciting cities. Discover historical landmarks, world-class museums, and iconic architecture. Enjoy guided tours that provide in-depth knowledge about the city’s history, culture, and hidden gems. Savor the local cuisine at famous restaurants and street food markets. Experience the nightlife with visits to trendy bars, theaters, and music venues. This package includes comfortable accommodation in centrally located hotels, ensuring that you are always close to the action. Perfect for travelers who love the hustle and bustle of city life and want to experience it all.',
'Exciting city tour', 
'images/city.jpg', 
149.99);



### After the query has been
=> Goto localhost/travel/index.php to view the website

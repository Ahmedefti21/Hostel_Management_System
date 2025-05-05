Create Table users (
    id INT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100)
);

Create Table orders (
    id INT PRIMARY KEY,
    user_id INT,
    order_date DATE,
    FOREIGN KEY (user_id) REFERENCES users(id)
);


Create Table products (
    id INT PRIMARY KEY,
    name VARCHAR(100),
    price DECIMAL(10, 2)
);
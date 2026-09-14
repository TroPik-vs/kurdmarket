CREATE DATABASE IF NOT EXISTS kurd_market CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE kurd_market;

CREATE TABLE categories (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  icon VARCHAR(20) DEFAULT '🛍️'
);

INSERT INTO categories (name, icon) VALUES
('خواردن و خواردنەوە','🍔'),
('جل و بەرگ','👕'),
('ئەلیکترۆنیات','📱'),
('کەلوپەلی ماڵ','🛋️'),
('جوانکاری','💄'),
('وەرزش','⚽');

CREATE TABLE products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  category_id INT NOT NULL,
  name VARCHAR(200) NOT NULL,
  description TEXT,
  price DECIMAL(10,2) NOT NULL,
  image VARCHAR(500) DEFAULT '',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE
);

INSERT INTO products (category_id,name,description,price,image) VALUES
(1,'پیتزای تایبەت','پیتزای تازە و خۆش',8.00,'https://images.unsplash.com/photo-1513104890138-7c749659a591?auto=format&fit=crop&w=800&q=80'),
(2,'جلێکی مۆدێرن','جل و بەرگی کوالیتی بەرز',35.00,'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?auto=format&fit=crop&w=800&q=80'),
(3,'مۆبایلی زیرەک','مۆبایلی نوێ بۆ بەکارهێنانی ڕۆژانە',299.00,'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?auto=format&fit=crop&w=800&q=80'),
(4,'کورسێکی ماڵ','دیزاینی جوان و ئارام',120.00,'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?auto=format&fit=crop&w=800&q=80'),
(5,'کۆمەڵەی جوانکاری','بۆ ڕووخساری ڕۆژانە',25.00,'https://images.unsplash.com/photo-1596462502278-27bfdc403348?auto=format&fit=crop&w=800&q=80'),
(6,'توپی پێ','توپی کوالیتی بەرز',20.00,'https://images.unsplash.com/photo-1518605368461-929a8c5b6ca0?auto=format&fit=crop&w=800&q=80');

CREATE TABLE admins (
 id INT AUTO_INCREMENT PRIMARY KEY,
 username VARCHAR(100) UNIQUE NOT NULL,
 password VARCHAR(255) NOT NULL
);
INSERT INTO admins(username,password) VALUES ('admin','admin123');

CREATE TABLE orders (
 id INT AUTO_INCREMENT PRIMARY KEY,
 customer_name VARCHAR(150) NOT NULL,
 phone VARCHAR(50) NOT NULL,
 address TEXT NOT NULL,
 total DECIMAL(10,2) NOT NULL,
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE order_items (
 id INT AUTO_INCREMENT PRIMARY KEY,
 order_id INT NOT NULL,
 product_id INT NOT NULL,
 quantity INT NOT NULL,
 price DECIMAL(10,2) NOT NULL,
 FOREIGN KEY(order_id) REFERENCES orders(id) ON DELETE CASCADE
);

<?php //02
 require_once 'functions.php';

createTable('admins', 
              'admin_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
              username VARCHAR(35) NOT NULL,  
              email VARCHAR (100) NOT NULL,
              password VARCHAR(255) NOT NULL,
              created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP');

createTable('members', 
              'member_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
              username VARCHAR(35) NOT NULL, 
              email VARCHAR (100) NOT NULL,
              password VARCHAR(255) NOT NULL, 
              created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP');

createTable('items', 
              'item_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,  
              item_name VARCHAR(255) NOT NULL, 
              item_price DECIMAL(10, 2) NOT NULL, 
              quantity INT NOT NULL,   
              expiry_date DATE, 
              image_path VARCHAR(255) NOT NULL,
              uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
              member_id INT UNSIGNED,
              CONSTRAINT fk_members
              FOREIGN KEY (member_id)
              REFERENCES members(member_id)');

createTable('messages', 
              'id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
              sender VARCHAR(16) NOT NULL,
              recipient VARCHAR(16) NOT NULL,
              message VARCHAR(4096) NOT NULL,
              date DATE,
              time TIME');
              
createTable('user_reviews', 
              'id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
              reviewer VARCHAR(35) NOT NULL,
              reviewee VARCHAR(35) NOT NULL,
              message VARCHAR(4096) NOT NULL,
              rating INT (1) NOT NULL');   
                 
?>

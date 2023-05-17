-- database name: alumniconnect
CREATE TABLE admin (
  admin_id INT AUTO_INCREMENT PRIMARY KEY,
  fname VARCHAR(100) NOT NULL,
  lname VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  password VARCHAR(256) NOT NULL
);

CREATE TABLE member (
  member_id INT AUTO_INCREMENT PRIMARY KEY,
  fname VARCHAR(100) NOT NULL,
  lname VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  password VARCHAR(256) NOT NULL
);

CREATE TABLE alumni (
  alumni_id INT AUTO_INCREMENT PRIMARY KEY,
  fname VARCHAR(100) NOT NULL,
  lname VARCHAR(100) NOT NULL,
  batchyr INT NOT NULL,
  password VARCHAR(256) NOT NULL
);

CREATE TABLE departments (
  department_id INT AUTO_INCREMENT PRIMARY KEY,
  department_name VARCHAR(100) NOT NULL,
  course VARCHAR(120) NOT NULL
);

CREATE TABLE designations (
  designation_id INT AUTO_INCREMENT PRIMARY KEY,
  designation_name VARCHAR(100) NOT NULL
);

CREATE TABLE alumni_profiles (
  alumni_id INT NOT NULL,
  department_id INT NOT NULL,
  designation_id INT NOT NULL,
  address VARCHAR(256),
  email VARCHAR(50) NOT NULL,
  phone_number VARCHAR(20),
  batch_year DATE NOT NULL,
  bio VARCHAR(256),
  occupation VARCHAR(50),
  PRIMARY KEY (alumni_id),
  FOREIGN KEY (alumni_id) REFERENCES alumni(alumni_id),
  FOREIGN KEY (department_id) REFERENCES departments(department_id),
  FOREIGN KEY (designation_id) REFERENCES designations(designation_id)
);

CREATE TABLE alumni_departments (
  alumni_id INT NOT NULL,
  department_id INT NOT NULL,
  PRIMARY KEY (alumni_id, department_id),
  FOREIGN KEY (alumni_id) REFERENCES alumni(alumni_id),
  FOREIGN KEY (department_id) REFERENCES departments(department_id)
);

CREATE TABLE alumni_donations (
  donation_id INT AUTO_INCREMENT PRIMARY KEY,
  alumni_id INT NOT NULL,
  amount INT NOT NULL,
  transaction_date DATE NOT NULL,
  FOREIGN KEY (alumni_id) REFERENCES alumni(alumni_id)
);

CREATE TABLE alumni_social (
  alumni_id INT NOT NULL,
  social_media_name VARCHAR(50) NOT NULL,
  social_media_link VARCHAR(100) NOT NULL,
  PRIMARY KEY (alumni_id, social_media_name),
  FOREIGN KEY (alumni_id) REFERENCES alumni(alumni_id)
);


-- Table for user login information
CREATE TABLE userinfo (
  userid INT AUTO_INCREMENT PRIMARY KEY,
  fname VARCHAR(50) NOT NULL,
  lname VARCHAR(50) NOT NULL,
  email VARCHAR(50) NOT NULL,
  password VARCHAR(50) NOT NULL
);

-- Table for user personal information
CREATE TABLE alumni (
  alumni_id INT AUTO_INCREMENT PRIMARY KEY,
  fname VARCHAR(50) NOT NULL,
  lname VARCHAR(50) NOT NULL,
  batchyr INT NOT NULL,
  progstudy_id INT NOT NULL,
  designation_id INT NOT NULL,
  password VARCHAR(50) NOT NULL
);

-- TABLE FOR program study
CREATE TABLE program_study (
  progstudy_id INT AUTO_INCREMENT PRIMARY KEY,
  alumni_id INT NOT NULL,
  progstudy_name VARCHAR(50) NOT NULL,
  department VARCHAR(50) NOT NULL,
  FOREIGN KEY (alumni_id) REFERENCES alumni(alumni_id)
);

-- Table for designation
CREATE TABLE designation (
  designation_id INT AUTO_INCREMENT PRIMARY KEY,
  designation_name VARCHAR(10) NOT NULL
);

-- User personal contact information or database
CREATE TABLE alumndata (
  contact_id INT AUTO_INCREMENT PRIMARY KEY,
  alumni_id INT NOT NULL,
  email VARCHAR(50) NOT NULL,
  phone VARCHAR(20),
  address VARCHAR(100),
  graduationyr YEAR NOT NULL,
  major VARCHAR(50),
  FOREIGN KEY (alumni_id) REFERENCES alumni(alumni_id)
);

-- Table for alumni social media profiles
CREATE TABLE alumni_social (
  alumni_id INT NOT NULL,
  linkdin VARCHAR(100),
  github VARCHAR(100),
  instagram VARCHAR(100),
  facebook VARCHAR(100),
  twitter VARCHAR(100),
  FOREIGN KEY (alumni_id) REFERENCES alumni(alumni_id)
);

CREATE TABLE administrator (
admin_id INT AUTO_INCREMENT PRIMARY KEY,
fname VARCHAR(50) NOT NULL,
lname VARCHAR(50) NOT NULL,
email VARCHAR(50) NOT NULL,
password VARCHAR(50) NOT NULL
);

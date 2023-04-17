-- Regular registration database
CREATE TABLE userinfo (
  userid INT AUTO_INCREMENT PRIMARY KEY,
  fname VARCHAR(50) NOT NULL,
  lname VARCHAR(50) NOT NULL,
  email VARCHAR(50) NOT NULL,
  password VARCHAR(50) NOT NULL
);


-- TABLE FOR alumni registration jeta verification or liga use kora jaibo
CREATE TABLE program_study (
  alumni_id INT NOT NULL,
  progstudy_id INT AUTO_INCREMENT PRIMARY KEY,
  progstudy_name VARCHAR(50) NOT NULL,
  department VARCHAR(50) NOT NULL,
  FOREIGN KEY (alumni_id) REFERENCES alumni(alumni_id)
);

CREATE TABLE designation (
  designation_id INT AUTO_INCREMENT PRIMARY KEY,
  designation_name VARCHAR(50) NOT NULL
);

CREATE TABLE alumni (
  alumni_id INT AUTO_INCREMENT PRIMARY KEY,
  fname VARCHAR(50) NOT NULL,
  lname VARCHAR(50) NOT NULL,
  batchyr INT NOT NULL,
  progstudy_id INT NOT NULL,
  designation_id INT NOT NULL,
  password VARCHAR(50) NOT NULL,
  FOREIGN KEY (progstudy_id) REFERENCES program_study(progstudy_id),
  FOREIGN KEY (designation_id) REFERENCES designation(designation_id)
);


-- NORMALIZE THIS TABLE
-- User personal contact information or database
CREATE TABLE alumndata (
  contact_id INT AUTO_INCREMENT PRIMARY KEY,
  alumni_id INT NOT NULL,
  email VARCHAR(50) NOT NULL,
  phone DECIMAL,
  address VARCHAR(100),
  graduationyr DATE NOT NULL, -- YYYY-MM-DD
  major VARCHAR(50),

  -- parameters
  FOREIGN KEY (alumni_id) REFERENCES alumni(alumni_id)
);

CREATE TABLE alumni_social (
  alumni_id INT NOT NULL,
  linkdin VARCHAR(100),
  github VARCHAR(100),
  instagram VARCHAR(100),
  facebook VARCHAR(100),
  twitter VARCHAR(100),
  PRIMARY KEY (alumni_id),
  FOREIGN KEY (alumni_id) REFERENCES alumni(alumni_id)
);

-- TODO create donation table

-- TUMRA lagle php my admin o gia akta database
-- banaitai jetar nam "alumniconnect" oito tar pore
-- otar bhitre jaibai, kuno table banaibai na khali
-- enter korbai r sql or akta tab ase ota khulbai otat
-- ou command tin dibai jate sob table bonijai

-- FIRST TABLE FOR alumni registration, as per masuk mia
CREATE TABLE alumni (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    fname VARCHAR(50) NOT NULL,
    lname VARCHAR(50) NOT NULL,
    batchyr INT NOT NULL,
    progstudy VARCHAR(50) NOT NULL,
    designation VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL
);


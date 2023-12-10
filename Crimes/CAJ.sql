CREATE DATABASE CAD;

USE CAD;

CREATE TABLE login (
  id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL,
  password VARCHAR(50) NOT NULL,
  role VARCHAR(20) NOT NULL
);





CREATE TABLE users (
  id INT(11) NOT NULL AUTO_INCREMENT,
  username VARCHAR(50) NOT NULL,
  password VARCHAR(255) NOT NULL,
  role ENUM('advocate', 'police') NOT NULL,
  PRIMARY KEY (id)
);

INSERT INTO users (username, password, role)
VALUES ('gopala', '1234567890', 'advocate'),
	   ('lalith', '1234567980', 'police');


CREATE TABLE cases_adv (
  id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  case_name VARCHAR(255) NOT NULL,
  case_type VARCHAR(255) NOT NULL,
  victim_name VARCHAR(255) NOT NULL,
  accused_name VARCHAR(255) NOT NULL,
  crime_place VARCHAR(255) NOT NULL,
  crime_date DATE NOT NULL,
  crime_time TIME NOT NULL,
  client_name VARCHAR(255) NOT NULL,
  accusation TEXT NOT NULL,
  prosecution_argument TEXT NOT NULL,
  suspects TEXT NOT NULL,
  hearings TEXT NOT NULL,
  defense_arguments TEXT NOT NULL,
  judgement TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO cases_adv (case_name, case_type, victim_name, accused_name, crime_place, crime_date, crime_time, client_name, accusation, prosecution_argument, suspects, hearings, defense_arguments, judgement)
VALUES ('Case XYZ', 'Criminal', 'John Doe', 'Jane Doe', 'New York City', '2022-03-15', '12:30:00', 'ABC Corporation', 'The defendant is accused of theft', 'The prosecution argues that the defendant was caught on camera stealing the item', 'John Smith and Samantha Lee', 'March 15th hearing: The prosecution presented their evidence', 'The defense argues that the defendant was not in the area at the time of the crime', 'The defendant was found guilty and sentenced to 2 years in prison.'),
       ('The Queen is Dead', 'Murder', 'The Queen', 'Snow white', 'The Cliff', '2022-04-12', '12:30:01', 'Snow white', 'The 7 dwarfs says that snow white manipulated them into committing the crime', 'Prosecution claims that the snow white manipulated the seven dwarfs in pushing the queen over the cliff', 'King and Seven Dwarfs', 'Asking her to accept the accusation and make a deal of no jail time', 's everyone believes that snow white is kind and generous we need to make the jury also believe the same by talking about the good deeds she has done to all', 'Snow white is innocent');

CREATE TABLE cases_pol (
  id INT AUTO_INCREMENT PRIMARY KEY,
  case_name VARCHAR(255) NOT NULL,
  case_type VARCHAR(50) NOT NULL,
  victim_name VARCHAR(255) NOT NULL,
  accused_name VARCHAR(255) NOT NULL,
  place_of_crime VARCHAR(255) NOT NULL,
  date DATE NOT NULL,
  time TIME NOT NULL,
  suspects TEXT,
  evidence TEXT,
  culprit TEXT,
  victim_image VARCHAR(255),
  accused_image VARCHAR(255),
  culprit_image VARCHAR(255)
);
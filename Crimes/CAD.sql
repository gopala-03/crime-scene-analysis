CREATE TABLE users (
  id INT(11) NOT NULL AUTO_INCREMENT,
  username VARCHAR(50) NOT NULL,
  password VARCHAR(255) NOT NULL,
  role ENUM('advocate', 'police') NOT NULL,
  PRIMARY KEY (id)
);

INSERT INTO users (username, password, role)
VALUES ('Patrick', '1234567890', 'advocate'),
	   ('Ryan', '1234567980', 'police');


CREATE TABLE cases_adv (
  id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  case_name VARCHAR(255) NOT NULL,
  case_type VARCHAR(255) NOT NULL,
  victim_name VARCHAR(255) NOT NULL,
  accused_name VARCHAR(255) NOT NULL,
  place_of_the_crime VARCHAR(255) NOT NULL,
  date DATE NOT NULL,
  time TIME NOT NULL,
  client_name VARCHAR(255) NOT NULL,
  accusation TEXT NOT NULL,
  suspects TEXT NOT NULL,
  hearings TEXT NOT NULL,
  defense_arguments TEXT NOT NULL,
  judgement TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO cases_adv (case_name, case_type, victim_name, accused_name, place_of_the_crime, date, time, client_name, accusation, suspects, hearings, defense_arguments, judgement)
VALUES ('Case XYZ', 'Criminal', 'John Doe', 'Jane Doe', 'New York City', '2022-03-15', '12:30:00', 'ABC Corporation', 'The defendant is accused of theft', 'John Smith and Samantha Lee', 'March 15th hearing: The prosecution presented their evidence', 'The defense argues that the defendant was not in the area at the time of the crime', 'The defendant was found guilty and sentenced to 2 years in prison.'),
       ('The Queen is Dead', 'Murder', 'The Queen', 'Snow white', 'The Cliff', '2022-04-12', '12:30:01', 'Snow white', 'The 7 dwarfs says that snow white manipulated them into committing the crime', 'King and Seven Dwarfs', 'Asking her to accept the accusation and make a deal of no jail time', 's everyone believes that snow white is kind and generous we need to make the jury also believe the same by talking about the good deeds she has done to all', 'Snow white is innocent');

CREATE TABLE cases_pol (
  id INT AUTO_INCREMENT PRIMARY KEY,
  case_name VARCHAR(255) NOT NULL,
  case_type VARCHAR(50) NOT NULL,
  victim_name VARCHAR(255) NOT NULL,
  accused_name VARCHAR(255) NOT NULL,
  place_of_the_crime VARCHAR(255) NOT NULL,
  date DATE NOT NULL,
  time TIME NOT NULL,
  suspects TEXT,
  evidence TEXT,
  culprit TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO cases_pol (case_name, case_type, victim_name, accused_name, place_of_the_crime, date, time, suspects, evidence, culprit)
VALUES ('Case 1', 'Robbery', 'John Doe', 'Jane Smith', 'Main Street', '2023-04-09', '15:30:00', 'Suspect A, Suspect B', 'Security camera footage', 'Suspect A'),
       ('Case 2', 'Assault', 'Mary Johnson', 'David Lee', 'Park Avenue', '2023-03-15', '18:45:00', 'Suspect C, Suspect D', 'Witness testimony', 'Suspect C'),
       ('Case 3', 'Burglary', 'William Brown', 'Sarah Davis', 'Elm Street', '2023-02-28', '12:00:00', 'Suspect E, Suspect F', 'Fingerprints', 'Suspect E');

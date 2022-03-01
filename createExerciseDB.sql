DROP DATABASE IF EXISTS exerciseDB;

CREATE DATABASE exerciseDB;

USE exerciseDB;

CREATE TABLE Users(
	userId INT AUTO_INCREMENT,
    username VARCHAR(100),
    password VARCHAR(255),
    goalDescription VARCHAR(255),
    age INT,
	PRIMARY KEY(userId)
);

CREATE TABLE Exercises(
	exerciseId INT AUTO_INCREMENT,
	exerciseName VARCHAR(50),
    exerciseDescription VARCHAR(255),
    ppl VARCHAR(10),
    mainMuscle VARCHAR(25),
    secondMuscle VARCHAR(25),
	PRIMARY KEY(exerciseId)
);

CREATE TABLE UserExercises(
	favoriteId INT AUTO_INCREMENT,
    userId INT,
    exerciseId INT,
	PRIMARY KEY(favoriteId),
    FOREIGN KEY(userId) REFERENCES Users(userId),
    FOREIGN KEY(exerciseId) REFERENCES Exercises(exerciseId)
);

INSERT INTO Users(username, password, goalDescription, age)
VALUES
	('combswo', 'password', 'N/A', 20),
    ('wocombs', 'password2', 'N/A', 21);

INSERT INTO Exercises(exerciseName, exerciseDescription, ppl, mainMuscle, secondMuscle)
VALUES
	('Bench Press', 'Push weight up', 'Push', 'Chest', 'Tricep'),
	('Pullup', 'Pull body up over bar', 'Pull', 'Lats', 'Biceps'),
    ('Deadlift', 'Lift weight off ground vertically', 'Pull', 'Lower back', 'Glutes'),
    ('Squat', 'Squat down and up with weight', 'Legs', 'Quads', 'Glutes'),
    ('Pushup', 'Push body off ground', 'Push', 'Chest', 'Triceps');

INSERT INTO UserExercises(userId, exerciseId)
VALUES
	(1, 2),
	(1, 4),
    (2, 2),
    (2, 3);
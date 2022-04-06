-- DROP DATABASE IF EXISTS exerciseDB;

-- CREATE DATABASE exerciseDB;

USE exerciseDB;

/***************************** TABLES ***********/
CREATE TABLE Users(
	userId 			INT AUTO_INCREMENT,
    username 		VARCHAR(100),
    password 		VARCHAR(255),
    goalDescription VARCHAR(255),
    age 			INT,
    mode			BIT				DEFAULT(0),
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
    userId INT,
    exerciseId INT,
    FOREIGN KEY(userId) REFERENCES Users(userId),
    FOREIGN KEY(exerciseId) REFERENCES Exercises(exerciseId)
);

/***************************** INSERT DATA ******/
INSERT INTO Users(username, password, goalDescription, age, mode)
VALUES
	('combswo', 'password', 'N/A', 20, 1),
    ('wocombs', 'password2', 'N/A', 21, 0);


INSERT INTO Exercises(exerciseName, exerciseDescription, ppl, mainMuscle, secondMuscle)
VALUES
	('Barbell Bench Press', 'Press weight up off of chest', 'Push', 'Chest', 'Tricep'),
	('Dumbbell Bench Press', '', 'Push', 'Chest', 'Tricep'),
    ('Incline Dumbbell Bench Press', '', 'Push', 'Chest', 'Tricep'),
    ('Decline Barbell Bench Press', '', 'Push', 'Chest', 'Tricep'),
    ('Chest Flyes', '', 'Push', 'Chest', 'N/A'),
    ('Pushups', '', 'Push', 'Chest', 'Triceps'),
    ('Dumbbell Pullovers', '', 'Push', 'Chest', 'Lats'),
    ('Cable Crossovers', '', 'Push', 'Chest', 'N/A'),
    ('Dips', '', 'Push', 'Triceps', 'Chest'),
    ('Tricep Pushdown', '', 'Push', 'Triceps', 'N/A'),
    ('Skullcrushers', '', 'Push', 'Triceps', 'N/A'),
    ('Tricep Extensions', '', 'Push', 'Triceps', 'N/A'),
    ('Tricep Kickbacks', '', 'Push', 'Triceps', 'N/A'),
    ('Lateral Raises', '', 'Push', 'Lateral Delts', 'N/A'),
    ('Front Raises', '', 'Push', 'Front Delts', 'N/A'),
    ('Rear Raises', '', 'Pull', 'Rear Delts', 'Lower Traps'),
    ('Arnold Press', '', 'Push', 'Front Delts', 'Triceps'),
    ('Lat Pulldowns', '', 'Pull', 'Lats', 'Biceps'),
    ('Pullups', '', 'Pull', 'Lats', 'Biceps'),
    ('Dumbbell Rows', '', 'Pull', 'Lats', 'Lower Traps'),
    ('Barbell Rows', '', 'Pull', 'Lats', 'Lower Back'),
    ('T-Bar Rows', '', 'Pull', 'Lower Traps', 'Lats'),
    ('Low Cable Rows', '', 'Pull', 'Lats', 'Lower Traps'),
    ('Hyperextensions', '', 'Pull', 'Lower Back', 'N/A'),
    ('Good Mornings', '', 'Pull', 'Lower Back', 'N/A'),
    ('Face Pulls', '', 'Pull', 'Rear Delts', 'Lower Traps'),
    ('Shrugs', '', 'Pull', 'Upper Traps', 'N/A'),
    ('W-Raises', '', 'Pull', 'Rotator Cuff', 'Rear Delts'),
    ('Y-Raises', '', 'Pull', 'Lower Traps', 'Rear Delts'),
    ('Waiter Curls', '', 'Pull', 'Biceps', 'N/A'),
    ('Alternating Bicep Curls', '', 'Pull', 'Biceps', 'N/A'),
    ('Hammer Curls', '', 'Pull', 'Biceps', 'Forearms'),
    ('Cross-Body Hammer Curls', '', 'Pull', 'Biceps', 'Forearms'),
    ('Preacher Curls', '', 'Pull', 'Biceps', 'N/A'),
    ('Drag Curls', '', 'Pull', 'Biceps', 'N/A'),
    ('Incline Curls', '', 'Pull', 'Biceps', 'N/A'),
    ('Wrist Curls', '', 'Pull', 'Forearms', 'N/A'),
    ('Back Squat', '', 'Legs', 'Quads', 'Glutes'),
    ('Front Squat', '', 'Legs', 'Quads', 'Glutes'),
    ('Bulgarian Split-Squats', '', 'Legs', 'Quads', 'Hamstrings'),
    ('Deadlifts', '', 'Legs', 'Hamstrings', 'Lower Back'),
    ('Hack Squat', '', 'Legs', 'Quads', 'Glutes'),
    ('Lunges', '', 'Legs', 'Quads', 'Hamstrings'),
    ('Leg Extensions', '', 'Legs', 'Quads', 'N/A'),
    ('Hamstring Curls', '', 'Legs', 'Hamstrings', 'N/A'),
    ('Nordic Curls', '', 'Legs', 'Hamstrings', 'N/A'),
    ('Seated Calf Raises', '', 'Legs', 'Calves', 'N/A'),
    ('Standing Calf Raises', '', 'Legs', 'Calves', 'N/A'),
    ('Hanging Leg Raises', '', 'N/A', 'Abs', 'N/A'),
    ('Planks', '', 'N/A', 'Abs', 'N/A'),
    ('Windshield Wipers', '', 'N/A', 'Abs', 'N/A');

INSERT INTO UserExercises(userId, exerciseId)
VALUES
	(1, 2),
	(1, 4),
    (2, 2),
    (2, 3);
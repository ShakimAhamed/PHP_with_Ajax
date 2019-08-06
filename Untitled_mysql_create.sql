
CREATE TABLE `Course` (
	`course_id` VARCHAR(50) NOT NULL,
	`course_name` VARCHAR(50) NOT NULL,
	`room` VARCHAR(50) NOT NULL,
	PRIMARY KEY (`course_id`)
);

CREATE TABLE `Course_Taken` (
	`student_id` VARCHAR(50) NOT NULL,
	`course_id` VARCHAR(50) NOT NULL,
	PRIMARY KEY (`student_id`,`course_id`)
);

CREATE TABLE `Student` (
	`student_id` VARCHAR(50) NOT NULL,
	`name` VARCHAR(50) NOT NULL,
	`course_id` VARCHAR(50) NOT NULL,
	PRIMARY KEY (`student_id`)
);


ALTER TABLE `Course_Taken` ADD CONSTRAINT `Course_Taken_fk0` FOREIGN KEY (`student_id`) REFERENCES `Student`(`student_id`);

ALTER TABLE `Course_Taken` ADD CONSTRAINT `Course_Taken_fk1` FOREIGN KEY (`course_id`) REFERENCES `Course`(`course_id`);

ALTER TABLE `Student` ADD CONSTRAINT `Student_fk2` FOREIGN KEY (`course_id`) REFERENCES `Course`(`course_id`);

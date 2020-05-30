ALTER TABLE `xin_attendance_time` 
CHANGE COLUMN `clock_in` `clock_in` VARCHAR(255) NULL ,
CHANGE COLUMN `clock_in_ip_address` `clock_in_ip_address` VARCHAR(255) NULL ,
CHANGE COLUMN `clock_out` `clock_out` VARCHAR(255) NULL ,
CHANGE COLUMN `clock_out_ip_address` `clock_out_ip_address` VARCHAR(255) NULL ,
CHANGE COLUMN `clock_in_out` `clock_in_out` VARCHAR(255) NULL ,
CHANGE COLUMN `clock_in_latitude` `clock_in_latitude` VARCHAR(150) NULL ,
CHANGE COLUMN `clock_in_longitude` `clock_in_longitude` VARCHAR(150) NULL ,
CHANGE COLUMN `clock_out_latitude` `clock_out_latitude` VARCHAR(150) NULL ,
CHANGE COLUMN `clock_out_longitude` `clock_out_longitude` VARCHAR(150) NULL ,
CHANGE COLUMN `time_late` `time_late` VARCHAR(255) NULL ,
CHANGE COLUMN `overtime` `overtime` VARCHAR(255) NULL ,
ADD COLUMN `office_shift_id` INT NULL AFTER `attendance_status`;
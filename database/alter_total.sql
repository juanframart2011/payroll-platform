ALTER TABLE `xin_office_shift` 
ADD COLUMN `prefijo` VARCHAR(222) NOT NULL AFTER `sunday_out_time`,
ADD COLUMN `hora_trabajo` VARCHAR(222) NOT NULL AFTER `prefijo`,
CHANGE COLUMN `monday_in_time` `monday_in_time` VARCHAR(222) NULL ,
CHANGE COLUMN `monday_out_time` `monday_out_time` VARCHAR(222) NULL ,
CHANGE COLUMN `tuesday_in_time` `tuesday_in_time` VARCHAR(222) NULL ,
CHANGE COLUMN `tuesday_out_time` `tuesday_out_time` VARCHAR(222) NULL ,
CHANGE COLUMN `wednesday_in_time` `wednesday_in_time` VARCHAR(222) NULL ,
CHANGE COLUMN `wednesday_out_time` `wednesday_out_time` VARCHAR(222) NULL ,
CHANGE COLUMN `thursday_in_time` `thursday_in_time` VARCHAR(222) NULL ,
CHANGE COLUMN `thursday_out_time` `thursday_out_time` VARCHAR(222) NULL ,
CHANGE COLUMN `friday_in_time` `friday_in_time` VARCHAR(222) NULL ,
CHANGE COLUMN `friday_out_time` `friday_out_time` VARCHAR(222) NULL ,
CHANGE COLUMN `saturday_in_time` `saturday_in_time` VARCHAR(222) NULL ,
CHANGE COLUMN `saturday_out_time` `saturday_out_time` VARCHAR(222) NULL ,
CHANGE COLUMN `sunday_in_time` `sunday_in_time` VARCHAR(222) NULL ,
CHANGE COLUMN `sunday_out_time` `sunday_out_time` VARCHAR(222) NULL;

UPDATE `xin_office_shift` SET `hora_trabajo` = '24' WHERE (`office_shift_id` = '1');

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
CHANGE COLUMN `overtime` `overtime` VARCHAR(255) NULL ;
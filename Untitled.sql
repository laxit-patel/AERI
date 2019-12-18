CREATE TABLE `clients` (
  `client_id` int PRIMARY KEY AUTO_INCREMENT,
  `client_name` varchar(255),
  `client_address` varchar(255),
  `client_phone` varchar(255)
);

CREATE TABLE `materials` (
  `material_id` int PRIMARY KEY AUTO_INCREMENT,
  `material_name` varchar(255)
);

CREATE TABLE `tests` (
  `test_id` int PRIMARY KEY AUTO_INCREMENT,
  `test_name` varchar(255),
  `test_material` varchar(255),
  `test_parameters` varchar(255)
);

CREATE TABLE `inwards` (
  `inward_id` int PRIMARY KEY AUTO_INCREMENT,
  `inward_client` varchar(255),
  `inward_type` varchar(255),
  `inward_date_of_sample` varchar(255),
  `inward_material` varchar(255),
  `inward_material_qty` varchar(255),
  `inward_material_test` varchar(255),
  `inward_test_complete_date` varchar(255),
  `inward_description` varchar(255)
);

CREATE TABLE `reports` (
  `reports_id` int PRIMARY KEY AUTO_INCREMENT,
  `reports_inward` varchar(255),
  `reports_worksheet` blob,
  `reports_result` blob
);

ALTER TABLE `tests` ADD FOREIGN KEY (`test_material`) REFERENCES `materials` (`material_id`);

ALTER TABLE `inwards` ADD FOREIGN KEY (`inward_client`) REFERENCES `clients` (`client_id`);

ALTER TABLE `inwards` ADD FOREIGN KEY (`inward_material`) REFERENCES `materials` (`material_id`);

ALTER TABLE `inwards` ADD FOREIGN KEY (`inward_material_test`) REFERENCES `tests` (`test_id`);

ALTER TABLE `reports` ADD FOREIGN KEY (`reports_inward`) REFERENCES `inwards` (`inward_id`);

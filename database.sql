CREATE DATABASE zuri_task_apr_23_2021;

USE zuri_task_apr_23_2021;

CREATE TABLE accounts(
    account_id INT AUTO_INCREMENT,
    first_name VARCHAR(128) NOT NULL,
    last_name VARCHAR(128) NOT NULL,
    username VARCHAR(128) NOT NULL,
    password VARCHAR(128) NOT NULL,
    PRIMARY KEY(account_id)
)ENGINE=InnoDB DEFAULT CHARSET=UTF8;

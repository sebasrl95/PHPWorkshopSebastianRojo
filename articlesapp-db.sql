CREATE DATABASE articlesapp;

USE articlesapp;

CREATE TABLE tb_articles (
id_article INT PRIMARY KEY AUTO_INCREMENT,
title VARCHAR(100) NOT NULL,
description VARCHAR(300) NOT NULL,
image_name VARCHAR(300) NOT NULL
);
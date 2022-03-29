<?php

const HOST = 'http://localhost';
const BASE_URL = '/MyBlog/';

const DB_HOST = 'localhost';
const DB_NAME = 'php4';
const DB_USER = 'root';
const DB_PASS = '';

include_once('core/arr.php');
include_once('core/db.php');
include_once('core/system.php');
include_once('core/auth.php');

include_once('model/articles.php');
include_once('model/categories.php');
include_once('model/visits.php');
include_once('model/user.php');
include_once('model/sessions.php');

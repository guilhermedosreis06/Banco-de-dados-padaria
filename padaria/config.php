<?php

// arquivo config.php
	define("HOST", "localhost");
	define("USER", "root");
	define("PASS", "");
	define("BASE", "padaria");

	$conn = new MySQLi(HOST, USER, PASS, BASE);
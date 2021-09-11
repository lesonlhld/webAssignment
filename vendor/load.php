<?php

/**
 * load.php
 *
 * @author    Le Trung Son    lesonlhld@gmail.com
 */

// Call related files

// Import to Constants
require_once "./system/Constants.php";

// Connect to Databasse
require_once "./system/Database.php";

// Connect to App for routing
require_once "./system/App.php";

// Initialize the App class
new System\App;
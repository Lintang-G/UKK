<?php
session_start();

require_once "../config/database.php";

// CORE
require_once "../core/Controller.php";
require_once "../core/Auth.php";

// MODELS
require_once "../models/User.php";
require_once "../models/Kategori.php";
require_once "../models/Alat.php";
require_once "../models/Peminjaman.php";
require_once "../models/LogAktivitas.php";

// CONTROLLERS
require_once "../controllers/AuthController.php";
require_once "../controllers/PeminjamanController.php";

// ROUTER PALING TERAKHIR
require_once "../core/Router.php";

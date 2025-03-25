<?php
/**
 * Copyright (c) 2025 SwiftInsureX by SKB
 * License: MIT
 */
session_start();
session_unset();
session_destroy();
header('Location: ../insurance-system/login.php');
exit();
?>
<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
session_destroy();
header('location: ./auth_login_boxed.php');
?>

</body>
</html>
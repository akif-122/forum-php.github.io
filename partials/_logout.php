<?php

session_start();
session_unset();
session_destroy();
?>
<!-- 
<script>
    alert("Logout Successful!");
    location.replace("http://localhost/forum")
</script> -->

<?php
header("Location: http://localhost/forum/index.php");
?>
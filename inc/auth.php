<?php
session_start();
if (!isset($_SERVER[''])) {
?>
<script>
	window.location ='login.php';
</script>
<?php
}
?>
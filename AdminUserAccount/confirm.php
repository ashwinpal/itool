<script type="text/javascript">
if(window.confirm("Are you sure you want to delete that record?")) {
  document.location = "delete.php?id=<?php echo $_GET['id'] ?>";
}
else
{
  document.location = "index.php";  
}
</script>


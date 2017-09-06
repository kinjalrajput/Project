<form method="post" enctype="multipart/form-data">
<input type="file" name="file">
<input type="submit">
</form>

<?php
echo "<pre>";
print_r($_FILES);
print_r($_REQUEST);

?>
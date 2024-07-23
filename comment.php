<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bình luận</title>
</head>
<body>
    <h3>Bình luận</h3>
    <form action="comment.php" method="post">
        <input type="text" name="name">
        <input type="hidden" name="idsp" value="<?=$_GET['idsp']?>">
        <textarea name="comment" id="" cols="30" rows="10"></textarea>
        <input type="submit" value="Gửi bình luận" name="guibinhluan">
    </form>
</body>
</html>
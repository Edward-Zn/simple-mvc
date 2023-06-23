<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Form</title>
</head>
<body>
    <form method="post" action="index.php?action=index">
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title"></input><br>
        <label for="info">Text:</label><br>
        <textarea id="info" name="info" rows="4" cols="50"></textarea><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
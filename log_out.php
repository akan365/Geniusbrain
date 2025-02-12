<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOG OUT</title>
</head>
<body backgroung="Images\download.jpeg">
    <div>
        <h1>LOG OUT PAGE</h1>
    </div>
    <div>
        <form action="logout.php" method="POST">
            <div>
                <label>USER NAME</label>
                <input type="text" name="username" placeholder="username">
            </div>
            <div>
                <label>PASSWORD </label>
                <input type="password" name="password" placeholder="password">
            </div>
            <div>
                <button type="submit">LOG OUT</button>
            </div>
        </form>
    </div>
</body>
</html>

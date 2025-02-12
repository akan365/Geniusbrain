<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOG IN</title>
</head>
<body>
    <div>
        <h1>LOG IN PAGE</h1>
    </div>
    <div>
        <form action="login_check.php" method="POST">
            <div>
                <label>USER NAME</label>
                <input type="text" name="username" placeholder="username">
            </div>
            <div>
                <label>PASSWORD </label>
                <input type="password" name="password" placeholder="password">
            </div>
            <div>
                <button type="submit">LOG IN</button>
            </div>
        </form>
    </div>
</body>
</html>
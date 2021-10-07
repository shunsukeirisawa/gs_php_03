<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>本をブックマーク</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>

    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">本をブックマーク（一覧へ）</a></div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <form method="POST" action="insert.php">
        <div class="jumbotron">
            <fieldset>
                <legend>本をブックマーク</legend>
                <label>書籍名：<input type="text" name="bookTitle"></label><br>
                <label>書籍URL：<input type="text" name="bookUrl"></label><br>
                <label>書籍コメント：<textarea name="bookComment" rows="4" cols="40"></textarea></label><br>
                <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>
    <!-- Main[End] -->


</body>

</html>

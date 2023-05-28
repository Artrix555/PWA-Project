<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <title>WELT</title>
    <meta name="description" content="PWA Project">
    <meta name="author" content="Adrian Lokner Lađević">
    <meta name="keywords" content="HTML, CSS, PHP">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="basic-styles.css">
    <link rel="stylesheet" href="class-styles.css">

</head>

<body>

    <header>

        <h1>WELT</h1>

        <nav>
            <ul class="ul">

                <li><a href="index.php">Home</a></li>
                <li><a href="category.php?category=politics">Politics</a></li>
                <li><a href="category.php?category=food">Food</a></li>
                <li><a href="login.php">Administrator</a></li>
            </ul>
        </nav>

    </header>

    <?php
    include 'connect.php';
    define('UPLPATH', 'img/');

    // Get the article ID from the query parameter
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        // rest of your code for displaying the article with the given ID
    } else {
        echo "Article ID not provided.";
    }

    // Query to retrieve the article details from the database
    $sql = "SELECT title, content, picture, date_published, category FROM test WHERE id = " . $id;

    // Execute the query
    $result = mysqli_query($dbc, $sql);

    // Check if the query returned any results
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Display the article details
        echo "<h2>" . strtoupper($row["category"]) . "</h2>";
        echo "<div class='article-content'>";
        echo "<h2>" . $row["title"] . "</h2>";
        echo "<p>Date: " . $row["date_published"] . "</p>";
        echo "<div class=\"img-container-article\">";
        echo "<img src='" . UPLPATH . $row["picture"] . "' alt='" . $row["title"] . "'>";
        echo "</div>";
        echo "<p>" . $row["content"] . "</p>";
    } else {
        echo "Article not found.";
    }
    echo "</div>";

    // Close the database connection
    mysqli_close($dbc);

    ?>

    <footer>

        <h1>WELT</h1>

    </footer>

</body>

</html>
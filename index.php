<?php
include "config.php";
include "functions.php";

$request = $_SERVER["REQUEST_URI"];
$parsed_url = parse_url($request);
$path = trim($parsed_url["path"], "/");

if ($path == "") {
    $articles = get_all_articles("articles");
    include "templates/home.php";
} else {
    $article_file = "articles/" . $path . ".md";
    if (file_exists($article_file)) {
        $article = parse_article($article_file);
        include "templates/article.php";
    } else {
        header("HTTP/1.0 404 Not Found");
        echo "<h1>404 Not Found</h1>";
    }
}
?>

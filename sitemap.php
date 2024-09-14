<?php

header("Content-Type: application/xml; charset=utf-8");

include "config.php";
include "functions.php";

$articles = get_all_articles("articles");

echo '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;

echo "  <url>" . PHP_EOL;
echo "    <loc>" . htmlspecialchars($domain) . "</loc>" . PHP_EOL;
echo "    <changefreq>daily</changefreq>" . PHP_EOL;
echo "    <priority>1.0</priority>" . PHP_EOL;
echo "  </url>" . PHP_EOL;

foreach ($articles as $article) {
    $url = $domain . "/" . $article["path"];
    $lastmod = date("Y-m-d", strtotime($article["meta"]["date"]));

    echo "  <url>" . PHP_EOL;
    echo "    <loc>" . htmlspecialchars($url) . "</loc>" . PHP_EOL;
    echo "    <lastmod>" . htmlspecialchars($lastmod) . "</lastmod>" . PHP_EOL;
    echo "    <changefreq>monthly</changefreq>" . PHP_EOL;
    echo "    <priority>0.8</priority>" . PHP_EOL;
    echo "  </url>" . PHP_EOL;
}

echo "</urlset>";
?>

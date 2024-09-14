<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title><?php echo htmlspecialchars(
        $article["meta"]["title"]
    ); ?> - <?php echo htmlspecialchars($site_name); ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="<?php echo htmlspecialchars(
        $article["meta"]["description"]
    ); ?>">
    <meta name="keywords" content="<?php echo htmlspecialchars(
        implode(", ", explode(",", $article["meta"]["tags"]))
    ); ?>">

    <meta property="og:title" content="<?php echo htmlspecialchars(
        $article["meta"]["title"]
    ); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars(
        $article["meta"]["description"]
    ); ?>">
    <meta property="og:type" content="article">
    <meta property="og:url" content="<?php echo htmlspecialchars(
        $domain . "/" . $path
    ); ?>">
    <meta property="og:site_name" content="<?php echo htmlspecialchars(
        $site_name
    ); ?>">
    <?php if (isset($article["meta"]["thumbnail"])): ?>
        <meta property="og:image" content="<?php echo htmlspecialchars(
            $domain
        ); ?>/content/<?php echo htmlspecialchars(
    $article["meta"]["thumbnail"]
); ?>">
    <?php endif; ?>

    <meta name="twitter:card" content="<?php echo isset(
        $article["meta"]["thumbnail"]
    )
        ? "summary_large_image"
        : "summary"; ?>">
    <meta name="twitter:title" content="<?php echo htmlspecialchars(
        $article["meta"]["title"]
    ); ?>">
    <meta name="twitter:description" content="<?php echo htmlspecialchars(
        $article["meta"]["description"]
    ); ?>">
    <?php if (isset($article["meta"]["thumbnail"])): ?>
        <meta name="twitter:image" content="<?php echo htmlspecialchars(
            $domain
        ); ?>/content/<?php echo htmlspecialchars(
    $article["meta"]["thumbnail"]
); ?>">
    <?php endif; ?>

    <link rel="icon" href="/content/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="/assets/css/theme.css">

    <link href="https://fonts.bunny.net/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <script src="/assets/js/script.js"></script>
</head>

<body class="body">
    <div class="container">
        <header class="header">
            <h1 class="site-title"><a href="/" class="site-link"><?php echo htmlspecialchars(
                $site_name
            ); ?></a></h1>
        </header>

        <div class="article-content">
            <h1 class="article-heading"><?php echo htmlspecialchars(
                $article["meta"]["title"]
            ); ?></h1>
            <?php echo $article["content"]; ?>
        </div>

        <footer class="footer">
            &copy; <?php echo date("Y"); ?> <?php echo htmlspecialchars(
     $site_name
 ); ?>
        </footer>
    </div>
</body>
</html>

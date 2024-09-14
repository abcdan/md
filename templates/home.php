<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title><?php echo htmlspecialchars($site_name); ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="<?php echo htmlspecialchars(
        $description
    ); ?>">
    <meta name="keywords" content="blog, <?php echo htmlspecialchars(
        $site_name
    ); ?>">

    <meta property="og:title" content="<?php echo htmlspecialchars(
        $site_name
    ); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars(
        $description
    ); ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo htmlspecialchars($domain); ?>">
    <meta property="og:site_name" content="<?php echo htmlspecialchars(
        $site_name
    ); ?>">
    <?php if (isset($og_image)): ?>
        <meta property="og:image" content="<?php echo htmlspecialchars(
            $domain
        ); ?>/content/<?php echo htmlspecialchars($og_image); ?>">
    <?php endif; ?>

    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="<?php echo htmlspecialchars(
        $site_name
    ); ?>">
    <meta name="twitter:description" content="<?php echo htmlspecialchars(
        $description
    ); ?>">
    <?php if (isset($og_image)): ?>
        <meta name="twitter:image" content="<?php echo htmlspecialchars(
            $domain
        ); ?>/content/<?php echo htmlspecialchars($og_image); ?>">
    <?php endif; ?>

    <link rel="icon" href="/content/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="/assets/css/theme.css">

    <link href="https://fonts.bunny.net/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <script src="/assets/js/script.js"></script>
</head>

<body class="body">
    <div class="container">
        <header class="header">
            <h1 class="site-title"><?php echo htmlspecialchars(
                $site_name
            ); ?></h1>
            <p class="site-description"><?php echo htmlspecialchars(
                $description
            ); ?></p>
        </header>

        <ul class="article-list">
            <?php foreach ($articles as $article): ?>
                <li class="article-item">
                    <h2 class="article-title">
                        <a href="/<?php echo htmlspecialchars(
                            $article["path"]
                        ); ?>" class="article-link"><?php echo htmlspecialchars(
    $article["meta"]["title"]
); ?></a>
                    </h2>
                    <p class="article-description"><?php echo htmlspecialchars(
                        $article["meta"]["description"]
                    ); ?></p>
                    <small class="article-date"><?php echo htmlspecialchars(
                        date("F j, Y", strtotime($article["meta"]["date"]))
                    ); ?></small>
                    <?php if (isset($article["meta"]["thumbnail"])): ?>
                        <img src="/content/<?php echo htmlspecialchars(
                            $article["meta"]["thumbnail"]
                        ); ?>" alt="Thumbnail" class="article-thumbnail">
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>

        <footer class="footer">
            &copy; <?php echo date("Y"); ?> <?php echo htmlspecialchars(
     $site_name
 ); ?>
        </footer>
    </div>
</body>
</html>

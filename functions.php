<?php
function get_all_articles($dir)
{
    $articles = [];
    $files = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($dir)
    );
    foreach ($files as $file) {
        if ($file->isFile() && $file->getExtension() === "md") {
            $meta = parse_article_meta($file->getPathname());
            $relative_path = str_replace(
                [$dir . "/", ".md"],
                "",
                $file->getPathname()
            );
            $articles[] = [
                "path" => $relative_path,
                "meta" => $meta,
            ];
        }
    }
    usort($articles, function ($a, $b) {
        return strtotime($b["meta"]["date"]) - strtotime($a["meta"]["date"]);
    });
    return $articles;
}

function parse_article($file_path)
{
    $content = file_get_contents($file_path);
    list($meta_section, $markdown_content) = explode("---", $content, 2);
    $meta = parse_meta($meta_section);
    $html_content = markdown_to_html($markdown_content);
    return [
        "meta" => $meta,
        "content" => $html_content,
    ];
}

function parse_article_meta($file_path)
{
    $content = file_get_contents($file_path);
    list($meta_section) = explode("---", $content, 2);
    return parse_meta($meta_section);
}

function parse_meta($text)
{
    $lines = explode("\n", trim($text));
    $meta = [];
    foreach ($lines as $line) {
        if (strpos($line, ":") !== false) {
            list($key, $value) = explode(":", $line, 2);
            $meta[trim($key)] = trim($value);
        }
    }
    return $meta;
}

function markdown_to_html($markdown)
{
    $markdown = preg_replace_callback(
        '/^(#{1,6})\s*(.+)$/m',
        function ($matches) {
            $level = strlen($matches[1]);
            return "<h{$level}>" .
                htmlspecialchars($matches[2]) .
                "</h{$level}>";
        },
        $markdown
    );

    $markdown = preg_replace(
        '/(\*\*|__)(.*?)\1/',
        '<strong>$2</strong>',
        $markdown
    );

    $markdown = preg_replace('/(\*|_)(.*?)\1/', '<em>$2</em>', $markdown);

    $markdown = preg_replace(
        "/\[([^\[]+)\]\((https?:\/\/[^\)]+)\)/",
        '<a href="$2">$1</a>',
        $markdown
    );

    $markdown = preg_replace(
        "/!\[([^\[]+)\]\((https?:\/\/[^\)]+)\)/",
        '<img src="$2" alt="$1">',
        $markdown
    );

    $markdown = preg_replace_callback(
        "/!\[([^\[]+)\]\((.*?)\)/",
        function ($matches) {
            $alt_text = htmlspecialchars($matches[1]);
            $filename = htmlspecialchars($matches[2]);

            if (!preg_match("/^https?:\/\//", $filename)) {
                $filename = "/content/" . $filename;
            }

            return '<img src="' . $filename . '" alt="' . $alt_text . '">';
        },
        $markdown
    );

    $markdown = preg_replace('/^(\*|-)\s+(.+)$/m', '<li>$2</li>', $markdown);
    $markdown = preg_replace("/(<li>.*<\/li>)/s", '<ul>$1</ul>', $markdown);

    $markdown = preg_replace('/^\d+\.\s+(.+)$/m', '<li>$1</li>', $markdown);
    $markdown = preg_replace("/(<li>.*<\/li>)/s", '<ol>$1</ol>', $markdown);

    $markdown = preg_replace(
        "/```(.*?)```/s",
        '<pre><code>$1</code></pre>',
        $markdown
    );

    $markdown = nl2br($markdown);

    return $markdown;
}

?>

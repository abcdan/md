# md ✌️
Really simple, database-less themable blogging software for shared hosting

## What's this?
md is some _really_ simple blogging software that I wrote for my own use. It's designed to be as simple as possible, and to be able to run on shared hosting. It's written in PHP, and doesn't require a database.

Sounds great, right? Because it is! 😄

## Now, what does it do?
- It reads markdown files from a directory
- It parses the metadata at the top of the file
- It renders the markdown content
- It serves you the sweet, sweet blog post

And, it also:
- Makes it with some proper meta data, kinda SEO friendly
- Builds a sitemap.xml on the fly so you can submit it to search engines

## How do I use it?
- Clone this repository, or download the zip or use the template (which is the preferred way)
- Edit the `config.php` file to your liking
- Add your markdown files to the `articles` directory (you can make subdirectories, too!)
- Upload the whole thing to your shared hosting
- If you really want to be fancy, upate update the `/assets/css/theme.css` file to your liking so it looks like you want it to. Out of the box, it's _really_ basic, the goal is to make it truly yours.

That's it! You're ready to go! 🚀

## Supported Markdown
The following Markdown elements are supported and will be rendered to HTML:

### Headings
Use `#`, `##`, `###`, etc., for headings. For example:
```markdown
# This is an H1
## This is an H2
### This is an H3
```

### Bold and Italics
Wrap text in `**` or `__` for bold, and `*` or `_` for italics:
```markdown
**This is bold**
*This is italic*
```

### Links
To create a hyperlink, use `[text](url)` syntax:
```markdown
[Go to Google](https://www.google.com)
```

### Images
To embed images, use `![alt text](url)`:
```markdown
![Logo](https://example.com/logo.png)
```

### Lists
Both unordered and ordered lists are supported:
```markdown
- Item 1
- Item 2

1. First
2. Second
```

### Code Blocks
For inline code, wrap text in backticks:
```markdown
`inline code`
```
For code blocks, use triple backticks:
```markdown
```
Code block
```
```

### Blockquotes
Use `>` to create blockquotes:
```markdown
> This is a blockquote.
```

## What license you got?
MIT. Do whatever you want with it. Just don't blame me if it breaks. 😅

## Can I see it in action?
Sure thing, this is my personal blog: [https://abcdan.fyi](https://abcdan.fyi)

## What's the current version?
The current version is 1.0.2. It's the first version, so it's pretty basic. But at least it works! 🎉

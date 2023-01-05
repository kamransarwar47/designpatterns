<?php
class BlogPost
{
    private Author $author;
    private string $title;
    private string $content;
    private \DateTime $date;

    public function getData(): array
    {
        return [
            'author' => $this->author->fullName(),
            'title' => $this->title,
            'content' => $this->content,
            'timestamp' => $this->date->getTimestamp(),
        ];
    }
}

interface PrintableBlogPost {
    public function print(BlogPost $blogPost);
}

class JsonBlogPostPrinter implements PrintableBlogPost {

    public function print(BlogPost $blogPost)
    {
        return json_encode($blogPost->getData());
    }
}

class HtmlBlogPostPrinter implements PrintableBlogPost {

    public function print(BlogPost $blogPost)
    {
        $post = $blogPost->getData();
        return `<article>
                    <h1>{$post->title}</h1>
                    <article>
                        <p>{$post->timestamp->format('Y-m-d H:i:s')}</p>
                        <p>{$post->author}</p>
                        <p>{$post->content}</p>
                    </article>
                </article>`;
    }
}

$blogPost = new BlogPost();

$htmlPrinter = new HtmlBlogPostPrinter();
$htmlPrinter->print($blogPost);

$jsonPrinter = new JsonBlogPostPrinter();
$jsonPrinter->print($blogPost);
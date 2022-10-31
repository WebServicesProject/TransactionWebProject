<?php
namespace App\Models\DTO;

class BookDTO{
    private string $ISBN;
    private string $title;
    private string $category;
    private string $image_url;




    /**
     * @param string $title
     * @param string $category
     * @param string $image_url
     */
    public function __construct(string $ISBN, string $title, string $category, string $image_url)
    {
        $this->ISBN = $ISBN;
        $this->title = $title;
        $this->category = $category;
        $this->image_url = $image_url;
    }

    /**
     * @return string
     */
    public function getISBN(): string
    {
        return $this->ISBN;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @return string
     */
    public function getImageUrl(): string
    {
        return $this->image_url;
    }
}

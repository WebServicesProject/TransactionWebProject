<?php

namespace App\MyUtils;

use App\Models\DTO\BookDTO;
use stdClass;

class GoogleBookApi{

    private string $queryUrl;

    /**
     * @param string $queryCondition input query condition like book category or trend, such as 'mostpopular', if there are
     * several conditions, use "+" to combine them. For example, "computerscience+mostpopular"
     */
    public function __construct(string $queryCondition)
    {
        $this->queryUrl = 'https://www.googleapis.com/books/v1/volumes?q='.$queryCondition;
    }

    /**
     * Set how many results you want to get
     * @param int $size
     * @return void
     */
    function setResultSize(int $size): void
    {
        $this->queryUrl = $this->queryUrl.'&maxResults='.$size;
    }

    function getResults(){
        return json_decode(file_get_contents($this->queryUrl))->items;
//        return file_get_contents($this->queryUrl);
    }

    function getBigImageUrls(){
        $imageUrls = [];
        $results = $this->getResults();
        foreach ($results as $result){
            $imageUrl = $result->volumeInfo->imageLinks->thumbnail;
            $imageUrl = str_replace('zoom=1','zoom=10',$imageUrl);
            $imageUrl = str_replace('http','https',$imageUrl);
            $imageUrls[] = $imageUrl;
        }
        return $imageUrls;
    }

    function getBookDTO(){
        $flag = false;
        $bookObjs = [];
        $results = $this->getResults();
//        dd($results);
        foreach ($results as $result){
            $volumeInfo = $result->volumeInfo;

            if (!(property_exists($volumeInfo,'categories')
                && property_exists($volumeInfo,'imageLinks')
                && property_exists($volumeInfo,'industryIdentifiers'))
                ){
                continue;
            }
            $title = $volumeInfo->title;
            $category = $volumeInfo->categories[0];
            $imageUrl = $volumeInfo->imageLinks->thumbnail;

            $identifiers = $volumeInfo->industryIdentifiers;

            foreach($identifiers as $identifier){
                if($identifier->type == 'ISBN_13'){
                    $flag = true;
                    $ISBN = $identifier->identifier;
                }
            }
            if(!$flag){
                continue;
            }
            $bookObjs[] = new BookDTO($ISBN,$title,$category,$imageUrl);
        }
        return $bookObjs;

    }
}

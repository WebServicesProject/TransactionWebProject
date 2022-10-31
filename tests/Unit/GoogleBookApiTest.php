<?php

namespace Tests\Unit;

use App\MyUtils\GoogleBookApi;
use Illuminate\Testing\Fluent\AssertableJson;
use PHPUnit\Framework\TestCase;

class GoogleBookApiTest extends TestCase
{

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function test_query_return(){
        $api = new GoogleBookApi('mostpopular');
        $api->setResultSize('20');
//        dd($api->getResults());
        $response = $api->getBookDTO();
        dd($response);

//        foreach($ISBNs as $ISBN){
//            if($ISBN->type == 'ISBN_13'){
//                $ISBN->identifier->assert('9780307433015');
//            }
//        }
    }

    public function test_imageUrl_return(){
        $api = new GoogleBookApi('computerscience+mostpopular');
        $api->setResultSize('3');
        $imageUrls = $api->getBigImageUrls();
        dd($imageUrls[0]);
    }
}

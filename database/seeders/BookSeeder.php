<?php

namespace Database\Seeders;

use App\MyUtils\GoogleBookApi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $api = new GoogleBookApi("computer+mostpopular");
        $api->setResultSize(20);
        $bookObjs = $api->getBookDTO();

        foreach ($bookObjs as $bookObj){
            DB::table('books')->insert([
                'ISBN'=>$bookObj->getISBN(),
                'title'=>$bookObj->getTitle(),
                'category'=>$bookObj->getCategory(),
                'image_url'=>$bookObj->getImageUrl(),
                'quantity'=>random_int(1,10),
                'created_at'=>date('Y-m-d H:i:s', strtotime('now')),
                'updated_at'=>date('Y-m-d H:i:s', strtotime('now'))
            ]);
        }
    }
}

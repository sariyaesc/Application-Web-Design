<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Author;
use App\Models\Category;
use App\Models\Book;
use App\Models\Sale;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class BookstoreSeeder extends Seeder
{
    public function run(): void
    {
        $cat1 = Category::create(['name' => 'Fantasía']);
        $cat2 = Category::create(['name' => 'Ciencia Ficción']);
        $cat3 = Category::create(['name' => 'Clásicos']);

        $auth1 = Author::create(['name' => 'J.K. Rowling']);
        $auth2 = Author::create(['name' => 'Isaac Asimov']);
        $auth3 = Author::create(['name' => 'Miguel de Cervantes']);

        $books = [
            [
                'title' => 'Harry Potter y la Piedra Filosofal',
                'price' => 25.50,
                'stock' => 100,
                'author_id' => $auth1->id,
                'category_id' => $cat1->id
            ],
            [
                'title' => 'Yo, Robot',
                'price' => 18.00,
                'stock' => 50,
                'author_id' => $auth2->id,
                'category_id' => $cat2->id
            ],
            [
                'title' => 'Don Quijote de la Mancha',
                'price' => 30.00,
                'stock' => 20,
                'author_id' => $auth3->id,
                'category_id' => $cat3->id
            ]
        ];

        foreach ($books as $bookData) {
            $book = Book::create($bookData);


            $numberOfSales = rand(1, 5);
            
            for ($i = 0; $i < $numberOfSales; $i++) {
                $quantity = rand(1, 3);
                Sale::create([
                    'book_id' => $book->id,
                    'quantity' => $quantity,
                    'total_price' => $book->price * $quantity,
                    'created_at' => now()->subDays(rand(0, 30)) 
                ]);
            }
        }
    }
}
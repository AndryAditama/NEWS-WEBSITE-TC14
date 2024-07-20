<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class HomeController extends Controller
{
    public function index()
    {
        // Data dummy untuk berita dengan URL gambar dan tanggal
        $news = collect([
            ['id' => 1, 'title' => 'Breaking News: Example Title 1', 'body' => 'This is a short description of the news article number 1. This is a short description of the news article number 1. This is a short description of the news article number 1.', 'category' => 'Politics', 'image_url' => 'https://via.placeholder.com/800', 'date' => '2024-07-20'],
            ['id' => 2, 'title' => 'Tech Update: Example Title 2', 'body' => 'This is a short description of the news article number 2.', 'category' => 'Technology', 'image_url' => 'https://via.placeholder.com/800', 'date' => '2024-07-19'],
            ['id' => 3, 'title' => 'Sports Highlight: Example Title 3', 'body' => 'This is a short description of the news article number 3.', 'category' => 'Sports', 'image_url' => 'https://via.placeholder.com/800', 'date' => '2024-07-18'],
            ['id' => 4, 'title' => 'Entertainment Buzz: Example Title 4', 'body' => 'This is a short description of the news article number 4.', 'category' => 'Entertainment', 'image_url' => 'https://via.placeholder.com/800', 'date' => '2024-07-17'],
            ['id' => 5, 'title' => 'Political Debate: Example Title 5', 'body' => 'This is a short description of the news article number 5.', 'category' => 'Politics', 'image_url' => 'https://via.placeholder.com/800', 'date' => '2024-07-16'],
            ['id' => 6, 'title' => 'Health Alert: Example Title 6', 'body' => 'This is a short description of the news article number 6.', 'category' => 'Health', 'image_url' => 'https://via.placeholder.com/800', 'date' => '2024-07-15'],
            ['id' => 7, 'title' => 'Breaking News: Example Title 7', 'body' => 'This is a short description of the news article number 7.', 'category' => 'Politics', 'image_url' => 'https://via.placeholder.com/800', 'date' => '2024-07-14'],
            ['id' => 8, 'title' => 'Tech Update: Example Title 8', 'body' => 'This is a short description of the news article number 8.', 'category' => 'Technology', 'image_url' => 'https://via.placeholder.com/800', 'date' => '2024-07-13'],
            ['id' => 9, 'title' => 'Sports Highlight: Example Title 9', 'body' => 'This is a short description of the news article number 9.', 'category' => 'Sports', 'image_url' => 'https://via.placeholder.com/800', 'date' => '2024-07-12'],
            ['id' => 10, 'title' => 'Entertainment Buzz: Example Title 10', 'body' => 'This is a short description of the news article number 10.', 'category' => 'Entertainment', 'image_url' => 'https://via.placeholder.com/800', 'date' => '2024-07-11'],
            ['id' => 11, 'title' => 'Political Debate: Example Title 11', 'body' => 'This is a short description of the news article number 11.', 'category' => 'Politics', 'image_url' => 'https://via.placeholder.com/800', 'date' => '2024-07-10'],
            ['id' => 12, 'title' => 'Health Alert: Example Title 12', 'body' => 'This is a short description of the news article number 12.', 'category' => 'Health', 'image_url' => 'https://via.placeholder.com/800', 'date' => '2024-07-09'],
            ['id' => 13, 'title' => 'Breaking News: Example Title 13', 'body' => 'This is a short description of the news article number 13.', 'category' => 'Politics', 'image_url' => 'https://via.placeholder.com/800', 'date' => '2024-07-08'],
            ['id' => 14, 'title' => 'Tech Update: Example Title 14', 'body' => 'This is a short description of the news article number 14.', 'category' => 'Technology', 'image_url' => 'https://via.placeholder.com/800', 'date' => '2024-07-07'],
            ['id' => 15, 'title' => 'Sports Highlight: Example Title 15', 'body' => 'This is a short description of the news article number 15.', 'category' => 'Sports', 'image_url' => 'https://via.placeholder.com/800', 'date' => '2024-07-06'],
            ['id' => 16, 'title' => 'Entertainment Buzz: Example Title 16', 'body' => 'This is a short description of the news article number 16.', 'category' => 'Entertainment', 'image_url' => 'https://via.placeholder.com/800', 'date' => '2024-07-05'],
            ['id' => 17, 'title' => 'Political Debate: Example Title 17', 'body' => 'This is a short description of the news article number 17.', 'category' => 'Politics', 'image_url' => 'https://via.placeholder.com/800', 'date' => '2024-07-04'],
            ['id' => 18, 'title' => 'Health Alert: Example Title 18', 'body' => 'This is a short description of the news article number 18.', 'category' => 'Health', 'image_url' => 'https://via.placeholder.com/800', 'date' => '2024-07-03'],
            ['id' => 19, 'title' => 'Breaking News: Example Title 19', 'body' => 'This is a short description of the news article number 19.', 'category' => 'Politics', 'image_url' => 'https://via.placeholder.com/800', 'date' => '2024-07-02'],
            ['id' => 20, 'title' => 'Tech Update: Example Title 20', 'body' => 'This is a short description of the news article number 20.', 'category' => 'Technology', 'image_url' => 'https://via.placeholder.com/800', 'date' => '2024-07-01'],
            ['id' => 21, 'title' => 'Sports Highlight: Example Title 21', 'body' => 'This is a short description of the news article number 21.', 'category' => 'Sports', 'image_url' => 'https://via.placeholder.com/800', 'date' => '2024-06-30'],
            ['id' => 22, 'title' => 'Entertainment Buzz: Example Title 22', 'body' => 'This is a short description of the news article number 22.', 'category' => 'Entertainment', 'image_url' => 'https://via.placeholder.com/800', 'date' => '2024-06-29'],
            ['id' => 23, 'title' => 'Political Debate: Example Title 23', 'body' => 'This is a short description of the news article number 23.', 'category' => 'Politics', 'image_url' => 'https://via.placeholder.com/800', 'date' => '2024-06-28'],
            ['id' => 24, 'title' => 'Health Alert: Example Title 24', 'body' => 'This is a short description of the news article number 24.', 'category' => 'Health', 'image_url' => 'https://via.placeholder.com/800', 'date' => '2024-06-27'],
        ]);

        // Data dummy untuk kategori editor choice, komunitas, dan opini
        $editorChoiceMain = ['id' => 1, 'title' => 'Feature Main Title', 'category' => 'Feature', 'image_url' => 'https://via.placeholder.com/800x400', 'date' => '2024-07-20'];
        $editorChoiceNews = collect([
            ['id' => 2, 'title' => 'Feature Title 2', 'category' => 'Feature', 'image_url' => 'https://via.placeholder.com/70', 'date' => '2024-07-19'],
            ['id' => 3, 'title' => 'Feature Title 3', 'category' => 'Feature', 'image_url' => 'https://via.placeholder.com/70', 'date' => '2024-07-18'],
            ['id' => 4, 'title' => 'Feature Title 4', 'category' => 'Feature', 'image_url' => 'https://via.placeholder.com/70', 'date' => '2024-07-19'],
            ['id' => 5, 'title' => 'Feature Title 5', 'category' => 'Feature', 'image_url' => 'https://via.placeholder.com/70', 'date' => '2024-07-18'],
            ['id' => 6, 'title' => 'Feature Title 6', 'category' => 'Feature', 'image_url' => 'https://via.placeholder.com/70', 'date' => '2024-07-19'],
            ['id' => 7, 'title' => 'Feature Title 7', 'category' => 'Feature', 'image_url' => 'https://via.placeholder.com/70', 'date' => '2024-07-18'],
        ]);

        $komunitasMain = ['id' => 1, 'title' => 'Komunitas Main Title', 'category' => 'Komunitas', 'image_url' => 'https://via.placeholder.com/800x400', 'date' => '2024-07-20'];
        $komunitasNews = collect([
            ['id' => 2, 'title' => 'Komunitas Title 2', 'category' => 'Komunitas', 'image_url' => 'https://via.placeholder.com/70', 'date' => '2024-07-19'],
            ['id' => 3, 'title' => 'Komunitas Title 3', 'category' => 'Komunitas', 'image_url' => 'https://via.placeholder.com/70', 'date' => '2024-07-18'],
            ['id' => 4, 'title' => 'Komunitas Title 4', 'category' => 'Komunitas', 'image_url' => 'https://via.placeholder.com/70', 'date' => '2024-07-19'],
            ['id' => 5, 'title' => 'Komunitas Title 5', 'category' => 'Komunitas', 'image_url' => 'https://via.placeholder.com/70', 'date' => '2024-07-18'],
            ['id' => 6, 'title' => 'Komunitas Title 6', 'category' => 'Komunitas', 'image_url' => 'https://via.placeholder.com/70', 'date' => '2024-07-19'],
            ['id' => 7, 'title' => 'Komunitas Title 7', 'category' => 'Komunitas', 'image_url' => 'https://via.placeholder.com/70', 'date' => '2024-07-18'],
        ]);

        $opiniMain = ['id' => 1, 'title' => 'Opini Main Title', 'category' => 'Opini', 'image_url' => 'https://via.placeholder.com/800x400', 'date' => '2024-07-20'];
        $opiniNews = collect([
            ['id' => 2, 'title' => 'Opini Title 2', 'category' => 'Opini', 'image_url' => 'https://via.placeholder.com/70', 'date' => '2024-07-19'],
            ['id' => 3, 'title' => 'Opini Title 3', 'category' => 'Opini', 'image_url' => 'https://via.placeholder.com/70', 'date' => '2024-07-18'],
            ['id' => 4, 'title' => 'Opini Title 4', 'category' => 'Opini', 'image_url' => 'https://via.placeholder.com/70', 'date' => '2024-07-19'],
            ['id' => 5, 'title' => 'Opini Title 5', 'category' => 'Opini', 'image_url' => 'https://via.placeholder.com/70', 'date' => '2024-07-18'],
            ['id' => 6, 'title' => 'Opini Title 6', 'category' => 'Opini', 'image_url' => 'https://via.placeholder.com/70', 'date' => '2024-07-19'],
            ['id' => 7, 'title' => 'Opini Title 7', 'category' => 'Opini', 'image_url' => 'https://via.placeholder.com/70', 'date' => '2024-07-18'],
        ]);

        // Paginate the news collection
        $perPage = 6; // Number of items per page
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = $news->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $paginatedNews = new LengthAwarePaginator($currentItems, $news->count(), $perPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath()
        ]);

        $popularNews = [
            ['title' => 'Popular News with title 1', 'image_url' => 'https://via.placeholder.com/80', 'date' => '2024-07-18'],
            ['title' => 'Popular News with title 2', 'image_url' => 'https://via.placeholder.com/80', 'date' => '2024-07-17'],
            ['title' => 'Popular News with title 3', 'image_url' => 'https://via.placeholder.com/80', 'date' => '2024-07-16'],
            ['title' => 'Popular News with title 4', 'image_url' => 'https://via.placeholder.com/80', 'date' => '2024-07-15'],
            ['title' => 'Popular News with title 5', 'image_url' => 'https://via.placeholder.com/80', 'date' => '2024-07-14'],
        ];

        // Data dummy untuk kategori
        $categories = ['Politik', 'Olahraga', 'Teknologi', 'Hiburan', 'Kesehatan'];

        // Data dummy untuk regions
        $regions = ['Jakarta', 'Jawa Timur', 'Jawa Barat', 'Jawa Tengah'];

        return view('user.home', compact('news', 'paginatedNews', 'popularNews', 'categories', 'regions', 'editorChoiceMain', 'editorChoiceNews', 'komunitasMain', 'komunitasNews', 'opiniMain', 'opiniNews'));
    }

    public function category($category)
    {
        // Data dummy untuk berita dengan URL gambar dan tanggal
        $news = collect([
            ['id' => 1, 'title' => 'Breaking News: Example Title 1', 'body' => 'This is a short description of the news article number 1.', 'category' => 'Politics', 'image_url' => 'https://via.placeholder.com/800', 'date' => '2024-07-20'],
            ['id' => 2, 'title' => 'Tech Update: Example Title 2', 'body' => 'This is a short description of the news article number 2.', 'category' => 'Technology', 'image_url' => 'https://via.placeholder.com/800', 'date' => '2024-07-19'],
            ['id' => 3, 'title' => 'Sports Highlight: Example Title 3', 'body' => 'This is a short description of the news article number 3.', 'category' => 'Sports', 'image_url' => 'https://via.placeholder.com/800', 'date' => '2024-07-18'],
            ['id' => 4, 'title' => 'Entertainment Buzz: Example Title 4', 'body' => 'This is a short description of the news article number 4.', 'category' => 'Entertainment', 'image_url' => 'https://via.placeholder.com/800', 'date' => '2024-07-17'],
            ['id' => 5, 'title' => 'Political Debate: Example Title 5', 'body' => 'This is a short description of the news article number 5.', 'category' => 'Politics', 'image_url' => 'https://via.placeholder.com/800', 'date' => '2024-07-16'],
            ['id' => 6, 'title' => 'Health Alert: Example Title 6', 'body' => 'This is a short description of the news article number 6.', 'category' => 'Health', 'image_url' => 'https://via.placeholder.com/800', 'date' => '2024-07-15'],
            ['id' => 7, 'title' => 'Breaking News: Example Title 7', 'body' => 'This is a short description of the news article number 7.', 'category' => 'Politics', 'image_url' => 'https://via.placeholder.com/800', 'date' => '2024-07-14'],
            ['id' => 8, 'title' => 'Tech Update: Example Title 8', 'body' => 'This is a short description of the news article number 8.', 'category' => 'Technology', 'image_url' => 'https://via.placeholder.com/800', 'date' => '2024-07-13'],
            ['id' => 9, 'title' => 'Sports Highlight: Example Title 9', 'body' => 'This is a short description of the news article number 9.', 'category' => 'Sports', 'image_url' => 'https://via.placeholder.com/800', 'date' => '2024-07-12'],
            ['id' => 10, 'title' => 'Entertainment Buzz: Example Title 10', 'body' => 'This is a short description of the news article number 10.', 'category' => 'Entertainment', 'image_url' => 'https://via.placeholder.com/800', 'date' => '2024-07-11'],
            ['id' => 11, 'title' => 'Political Debate: Example Title 11', 'body' => 'This is a short description of the news article number 11.', 'category' => 'Politics', 'image_url' => 'https://via.placeholder.com/800', 'date' => '2024-07-10'],
            ['id' => 12, 'title' => 'Health Alert: Example Title 12', 'body' => 'This is a short description of the news article number 12.', 'category' => 'Health', 'image_url' => 'https://via.placeholder.com/800', 'date' => '2024-07-09'],
            ['id' => 13, 'title' => 'Breaking News: Example Title 13', 'body' => 'This is a short description of the news article number 13.', 'category' => 'Politics', 'image_url' => 'https://via.placeholder.com/800', 'date' => '2024-07-08'],
            ['id' => 14, 'title' => 'Tech Update: Example Title 14', 'body' => 'This is a short description of the news article number 14.', 'category' => 'Technology', 'image_url' => 'https://via.placeholder.com/800', 'date' => '2024-07-07'],
            ['id' => 15, 'title' => 'Sports Highlight: Example Title 15', 'body' => 'This is a short description of the news article number 15.', 'category' => 'Sports', 'image_url' => 'https://via.placeholder.com/800', 'date' => '2024-07-06'],
            ['id' => 16, 'title' => 'Entertainment Buzz: Example Title 16', 'body' => 'This is a short description of the news article number 16.', 'category' => 'Entertainment', 'image_url' => 'https://via.placeholder.com/800', 'date' => '2024-07-05'],
            ['id' => 17, 'title' => 'Political Debate: Example Title 17', 'body' => 'This is a short description of the news article number 17.', 'category' => 'Politics', 'image_url' => 'https://via.placeholder.com/800', 'date' => '2024-07-04'],
            ['id' => 18, 'title' => 'Health Alert: Example Title 18', 'body' => 'This is a short description of the news article number 18.', 'category' => 'Health', 'image_url' => 'https://via.placeholder.com/800', 'date' => '2024-07-03'],
            ['id' => 19, 'title' => 'Breaking News: Example Title 19', 'body' => 'This is a short description of the news article number 19.', 'category' => 'Politics', 'image_url' => 'https://via.placeholder.com/800', 'date' => '2024-07-02'],
            ['id' => 20, 'title' => 'Tech Update: Example Title 20', 'body' => 'This is a short description of the news article number 20.', 'category' => 'Technology', 'image_url' => 'https://via.placeholder.com/800', 'date' => '2024-07-01'],
            ['id' => 21, 'title' => 'Sports Highlight: Example Title 21', 'body' => 'This is a short description of the news article number 21.', 'category' => 'Sports', 'image_url' => 'https://via.placeholder.com/800', 'date' => '2024-06-30'],
            ['id' => 22, 'title' => 'Entertainment Buzz: Example Title 22', 'body' => 'This is a short description of the news article number 22.', 'category' => 'Entertainment', 'image_url' => 'https://via.placeholder.com/800', 'date' => '2024-06-29'],
            ['id' => 23, 'title' => 'Political Debate: Example Title 23', 'body' => 'This is a short description of the news article number 23.', 'category' => 'Politics', 'image_url' => 'https://via.placeholder.com/800', 'date' => '2024-06-28'],
            ['id' => 24, 'title' => 'Health Alert: Example Title 24', 'body' => 'This is a short description of the news article number 24.', 'category' => 'Health', 'image_url' => 'https://via.placeholder.com/800', 'date' => '2024-06-27'],
        ]);

        // Filter berita berdasarkan kategori
        $filteredNews = $news->filter(function ($newsItem) use ($category) {
            return strtolower($newsItem['category']) === strtolower($category);
        });

        // Paginate the filtered news collection
        $perPage = 6; // Number of items per page
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = $filteredNews->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $paginatedNews = new LengthAwarePaginator($currentItems, $filteredNews->count(), $perPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath()
        ]);

        $popularNews = [
            ['title' => 'Popular News with title 1', 'image_url' => 'https://via.placeholder.com/80', 'date' => '2024-07-18'],
            ['title' => 'Popular News with title 2', 'image_url' => 'https://via.placeholder.com/80', 'date' => '2024-07-17'],
            ['title' => 'Popular News with title 3', 'image_url' => 'https://via.placeholder.com/80', 'date' => '2024-07-16'],
            ['title' => 'Popular News with title 4', 'image_url' => 'https://via.placeholder.com/80', 'date' => '2024-07-15'],
            ['title' => 'Popular News with title 5', 'image_url' => 'https://via.placeholder.com/80', 'date' => '2024-07-14'],
        ];

        $categories = ['Politik', 'Olahraga', 'Teknologi', 'Hiburan', 'Kesehatan'];

        return view('user.category', compact('category', 'paginatedNews', 'popularNews', 'categories'));
    }
}


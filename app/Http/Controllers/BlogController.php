<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class BlogController extends Controller
{
  protected $posts_per_page = 3; // $limit

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $posts = Post::with('author')
      ->with('category')
      ->published()
      ->latestFirst()
      ->paginate($this->posts_per_page);

    return view('blog.index', compact('posts'));
  }


  public function category(Category $category)
  {
    $categoryName = $category->title;

    $posts = $category->posts()
      ->with('author')
      ->with('category')
      ->published()
      ->paginate($this->posts_per_page);

    return view('blog.index', compact('posts', 'categoryName'));
  }


  public function author(User $author)
  {
    $authorName = $author->name;

    $posts = $author->posts()
      ->with('author')
      ->with('category')
      ->published()
      ->paginate($this->posts_per_page);

    return view('blog.index', compact('posts', 'authorName'));

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param \App\Post $post
   * @return \Illuminate\Http\Response
   */
  public function show(Post $post)
  {
    return view('blog.show', compact('post'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param \App\Post $post
   * @return \Illuminate\Http\Response
   */
  public function edit(Post $post)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @param \App\Post $post
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Post $post)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param \App\Post $post
   * @return \Illuminate\Http\Response
   */
  public function destroy(Post $post)
  {
    //
  }
}

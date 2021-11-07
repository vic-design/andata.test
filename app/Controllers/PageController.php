<?php


namespace App\Controllers;


use App\Controller;
use App\Models\Comment;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouteCollection;

class PageController extends Controller
{
    /**
     * @param RouteCollection $routes
     */
    public function index(RouteCollection $routes): void
    {
        $this->render('main');
    }

    /**
     * @param RouteCollection $routes
     */
    public function addComment(RouteCollection $routes):void
    {
        $request = Request::createFromGlobals()->request->all();
        $comment = new Comment();
        $comment->name = $request['name'];
        $comment->email = $request['email'];
        $comment->title = $request['title'];
        $comment->text = $request['text'];
        $comment->save();

        $this->showComments($routes);
    }

    public function showComments(RouteCollection $routes):void
    {
        $this->responseJSON(Comment::all());
    }
}
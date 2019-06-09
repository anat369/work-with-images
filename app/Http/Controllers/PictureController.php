<?php

namespace App\Http\Controllers;

use App\Picture;
use Illuminate\Http\Request;

class PictureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pictures = Picture::get()->sortByDesc('id');
        return view('pages.index', [
            'pictures' => $pictures,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function formAddPicture()
    {
        return view('pages.add_picture');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function addPicture(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:300',
            'description' => 'required|max:800',
            'picture' => 'required|image|dimensions:max_width=800,max_height=800|max:500',
            'text' => 'required|max:30',
            'color' => 'required',
            'font' => 'required',
        ]);

        $picture = Picture::upload($request->file('picture'), $request->title, $request->description);

        Picture::writeText($picture->picture, $request->text, 	$request->color, $request->font);

        return redirect()->back()->with('status', 'Картинка успешно добавлена!');
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function viewPicture(int $id)
    {
        $picture = Picture::where('id', $id)->firstOrFail();

        return view('pages.picture', [
            'picture' => $picture,
        ]);
    }

}

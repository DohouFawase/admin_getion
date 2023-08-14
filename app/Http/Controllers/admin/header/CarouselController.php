<?php

namespace App\Http\Controllers\admin\header;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\CarouselFormRequest;
use App\Http\Requests\admin\CategorieFormRequest;
use App\Models\admin\Carousel;
use App\Models\admin\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.carousel.index',[
            'carousels'=> Carousel::orderBy('created_at', 'asc')->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $carousel = new Carousel();

        return view('admin.carousel.form', [
            'carousel' => $carousel
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarouselFormRequest $request)
    {
        //

        $carousel = Carousel::create($this->extractData(new Carousel(), $request));

        return to_route('admin.carousel.index')->with('Le carousel à bien été Créer');



    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Carousel $carousel)
    {
        //
        return view('admin.carousel.form',[
            'carousel'=>$carousel
        ]);
    }




    /**
     * Update the specified resource in storage.
     */
    public function update(CarouselFormRequest $request, Carousel $carousel)
    {
        //
        $carousel->update($this->extractData($carousel, $request));
        return to_route('admin.carousel.index')->with('Le carousel à bien été modifier');
    }

    private function extractData(Carousel $carousel, CarouselFormRequest $request)
    {
        $data = $request->validated();
         /** @var UploadeadFile|null $image*/
         $image = $request->validated('image');
         
         if ($image == null | $image->getError()) {
            # code...
            return $data;
           
         }

         if ($carousel ->image) {
            # code...
            Storage::disk('public')->delete($carousel ->image);
         }
         $data ['image'] = $image->store('carousel', 'public');
         return $data;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

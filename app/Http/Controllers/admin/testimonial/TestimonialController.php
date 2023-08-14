<?php

namespace App\Http\Controllers\admin\testimonial;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\TestimonialFormRequest;
use App\Models\admin\testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.testimonial.index', [
            'testimonials'=> testimonial::orderBy('created_at', 'desc')->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $testimonial= new testimonial();
        $testimonial->fill([
            'name' => 'Cherifath',
            'second_name'=>'TIDJANI',
            'type'=>'Cliente'
        ]);

        return view('admin.testimonial.form',[
           "testimonial" => $testimonial 
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TestimonialFormRequest $request)
    {
        //
        $testimonial = testimonial::create($this->extractData(new testimonial(), $request));
        return  to_route('admin.testimonial.index')->with('success', 'Le Temoignage a bien été crée');
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
    public function edit(testimonial $testimonial)
    {
        //
        return view('admin.testimonial.form', [
            'testimonial' => $testimonial
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TestimonialFormRequest $request, testimonial $testimonial)
    {
        //
        $testimonial->update($this->extractData($testimonial, $request));
        return  to_route('admin.testimonial.index')->with('success', 'Le Temoignage  a bien été Modifie');

    }


    private function extractData(testimonial $testimonial , TestimonialFormRequest $request ):array
    {
        $data = $request->validated();
         /** @var UploadeadFile|null $image*/
        $image = $request->validated('image');
        if ($image === null || $image->getError()) {
            # code...
            return $data;
        }

        if ($testimonial->image) {
            # code...
            Storage::disk('public')->delete($testimonial->image);
        }

        $data['image'] = $image->store('testimonial', 'public');

        return $data;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(testimonial $testimonial)
    {
        //
        Storage::delete($testimonial->image);
        $testimonial->delete();
        return response()->json(['message'=> 'Le temoignages a été bien supprimer']);
    }
}

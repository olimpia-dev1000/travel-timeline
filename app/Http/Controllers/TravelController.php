<?php

namespace App\Http\Controllers;

use App\Models\Travel;
use App\Models\Country;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;

class TravelController extends Controller
{


    public function getPublicTravelsData()
    {
        $allTravels = Travel::count();
        $publicTravels = Travel::where('private', false)->get();

        return ['travels' => $publicTravels, 'count' => $allTravels];
    }

    public function getUserTravels(Request $request)
    {
        $param = $request->query('sortBy');
        $travels = Auth::user()->travels()->get();

        if ($param !== null) {
            $travels = $travels->sortBy($param);
        }
        return view('travels.index', ['travels' => $travels, 'months' => $this->getMonths()]);
    }

    public function create(Request $request)
    {

        $query = $request->get('query');
        $countries = Country::where('country_name', 'LIKE', "%{$query}%")->pluck('country_name');

        return view('travels.create', ['months' => $this->getMonths(), 'countries' => $countries->toJson()]);
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'city' => 'required',
            'country' => 'required',
            'year' => ['required', 'numeric', 'between:1920,2028'],
            'month' => 'required',
            'description' => 'required',
            'private' => 'boolean',
            'travel_pictures' => ['image', 'nullable', 'mimes:jpeg,png,jpg,gif'],

        ]);

        if ($request->hasFile('travel_pictures')) {

            $manager = new ImageManager(new Driver());
            $image = $manager->read($request->file('travel_pictures'));
            $image->scaleDown(900, 600);

            // Set filename

            // $filename = 'travel_pictures/' . Str::uuid() . '.jpg';
            // $originalFilename = pathinfo($request->file('travel_pictures')->getClientOriginalName(), PATHINFO_FILENAME);
            $timestamp = now()->format('Ymd_His');
            $randomString = Str::random(8);
            $filename = 'travel_pictures/' . $timestamp . '_' . $randomString . '.jpg';

            // Encode the image to JPEG format
            $encodedImage = $image->toJpeg();

            // Get the encoded image data as a string
            $imageData = $encodedImage->toString();

            // Store the image
            // Storage::disk('public')->put($filename, $imageData);
            Storage::disk('s3')->put($filename, $imageData);


            // Update the form fields with the new filename
            $formFields['travel_pictures'] = $filename;

            // $formFields['travel_pictures'] = $request->file('travel_pictures')->store('travel_pictures', 'public');
        }

        isset($formFields['private']) ? $formFields['private'] = true : $formFields['private'] = false;
        $formFields['user_id'] = Auth::id();


        Travel::create($formFields);
        return redirect('/travels')->with('message', 'Travel created successfully!');
    }

    public function edit(Travel $travel)
    {

        return view('travels.edit', ['travel' => $travel, 'months' => $this->getMonths()]);
    }

    public function update(Request $request, Travel $travel)
    {
        if ($travel->user_id != Auth::id()) {
            abort(403, 'Unauthorized action');
        }


        $formFields = $request->validate([
            'city' => 'required',
            'country' => 'required',
            'year' => ['required', 'numeric'],
            'month' => 'required',
            'description' => 'required',
            'private' => 'boolean',
            'travel_pictures' => ['image', 'nullable', 'mimes:jpeg,png,jpg,gif'],
        ]);


        if ($request->hasFile('travel_pictures')) {


            if ($travel->travel_pictures) {
                // Storage::disk('public')->delete($travel->travel_pictures);
                Storage::disk('s3')->delete($travel->travel_pictures);
            }


            $manager = new ImageManager(new Driver());
            $image = $manager->read($request->file('travel_pictures'));
            $image->scaleDown(900, 600);

            // Set filename

            // $filename = 'travel_pictures/' . Str::uuid() . '.jpg';
            // $originalFilename = pathinfo($request->file('travel_pictures')->getClientOriginalName(), PATHINFO_FILENAME);
            $timestamp = now()->format('Ymd_His');
            $randomString = Str::random(8);
            $filename = 'travel_pictures/' . $timestamp . '_' . $randomString . '.jpg';

            // Encode the image to JPEG format
            $encodedImage = $image->toJpeg();

            // Get the encoded image data as a string
            $imageData = $encodedImage->toString();

            // Store the image
            // Storage::disk('public')->put($filename, $imageData);
            Storage::disk('s3')->put($filename, $imageData);


            // Update the form fields with the new filename
            $formFields['travel_pictures'] = $filename;

            // $formFields['travel_pictures'] = $request->file('travel_pictures')->store('travel_pictures', 'public');
        } else {
            $formFields['travel_pictures'] = $travel->travel_pictures;
        }

        isset($formFields['private']) ? $formFields['private'] = true : $formFields['private'] = false;
        $travel->update($formFields);

        return redirect('/travels')->with('message', 'Travel updated successfully');
    }

    public function destroy(Travel $travel)
    {
        if ($travel->user_id != Auth::id()) {
            abort(403, 'Unauthorized action');
        }

        if ($travel['travel_pictures']) {
            // Storage::disk('public')->delete($travel['travel_pictures']);
            Storage::disk('s3')->delete($travel['travel_pictures']);
        }

        $travel->delete();
        return redirect('/travels')->with('message', 'Travel deleted successfully');
    }

    public function getMonths()
    {
        return $months = [
            1 => __('months.1'),
            2 => __('months.2'),
            3 => __('months.3'),
            4 => __('months.4'),
            5 => __('months.5'),
            6 => __('months.6'),
            7 => __('months.7'),
            8 => __('months.8'),
            9 => __('months.9'),
            10 => __('months.10'),
            11 => __('months.11'),
            12 => __('months.12'),
        ];
    }
}

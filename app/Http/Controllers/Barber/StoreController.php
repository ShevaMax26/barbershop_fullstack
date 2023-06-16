<?php

namespace App\Http\Controllers\Barber;

use App\Http\Controllers\Controller;
use App\Http\Requests\Barber\StoreRequest;
use App\Models\Barber;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $data['image'] = Storage::disk('public')->put('images', $data['image']);

        Barber::firstOrCreate([
            'phone' => $data['phone'],
        ], $data);

        return redirect()->route('barber.index');
    }
}

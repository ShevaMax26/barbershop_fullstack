<?php

namespace App\Http\Controllers\Barber;

use App\Http\Controllers\Controller;
use App\Http\Requests\Barber\UpdateRequest;
use App\Models\Barber;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Barber $barber)
    {
        $data = $request->validated();
        $data['image'] = Storage::disk('public')->put('image', $data['image']);
        $barber->update($data);

        return redirect()->route('barber.show', compact('barber'));
    }
}

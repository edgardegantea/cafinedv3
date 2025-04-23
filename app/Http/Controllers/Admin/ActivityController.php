<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activities = Activity::orderBy('id', 'desc')->paginate(6);
        // $activities = Activity::orderBy('id', 'desc')->where('is_active', 'true')->orWhere('status', 'publicado')->paginate(6);

        return view('admin.activities.index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Activity $activity)
    {
        $instructors = User::where('role', ['admin', 'docente'])->orderBy('name', 'asc')->get();

        $data = [
            'activity' => $activity,
            'instructors' => $instructors,
        ];

        return view('admin.activities.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Activity $activity)
    {
        $data = $request->validate([
            'image' => 'nullable|image|max:8192',
            'name' => 'required|string|max:255',
            'type' => 'required|in:taller,curso,curso-taller,diplomado',
            'excerpt' => 'nullable|string',
            'description' => 'nullable|string',
            'start_time' => 'nullable|',
            'end_time' => 'nullable|after:start_time',
            'duration' => 'nullable|integer|min:0',
            'location' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'meeting_link' => 'nullable|url|max:255',
            'materials' => 'nullable|string',
            'prerequisites' => 'nullable|string',
            'target_audience' => 'nullable|string|max:255',
            'language' => 'nullable|string|max:50',
            'syllabus_url' => 'nullable|url|max:255',
            'contact_email' => 'nullable|email|max:255',
            'contact_phone' => 'nullable|string|max:20',
            'qr_code_link' => 'nullable|url|max:255',
            'capacity' => 'nullable|integer|min:0',
            'price' => 'nullable|numeric|min:0',
            'syllabus' => 'nullable|string',
            'modules' => 'nullable|integer|min:0',
            'credits' => 'nullable|integer|min:0',
            'frequency' => 'nullable|in:unico,semanal,mensual,otro',
            'methodology' => 'nullable|string',
            'instructor_id' => 'nullable|exists:users,id',
            'status' => 'nullable|in:borrador,publicado,completado,cancelado,archivado',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {

            if ($activity->image_path) {
                Storage::delete($activity->image_path);
            }

            $data['image_path'] = Storage::put('images/activities', $request->file('image'));
        }

        $activity->update($data);

        session()->flash('swal', [
            'icon'  => 'success',
            'title' => '¡Correcto!',
            'text'  => 'Información de actividad actualizada correctamente.',
        ]);

        return redirect()->route('admin.activities.index', $activity);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activity $activity)
    {
        //
    }
}

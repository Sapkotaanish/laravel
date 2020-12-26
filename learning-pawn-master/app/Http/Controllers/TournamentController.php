<?php

namespace App\Http\Controllers;

use App\Tournament;
use App\Traits\FlashAlert;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class TournamentController extends Controller
{
    use FlashAlert;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tournaments = Tournament::paginate(10);
        return view('pages.tournament.index', compact('tournaments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.tournament.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string']
        ]);

        request()->user()->tournaments()->create($request->all());

        return redirect()->route('tournament.index')->with($this->alertCreated());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $tournament = Tournament::findOrFail($id);

            // Jika user yang sedang login ini memiliki role superadmin atau admin
            // Atau jika user yang sedang login ini memiliki permission update-tournament dan user-id yang sama di dalam user dan tournament
            if (request()->user()->hasRole(['superadmin', 'admin']) || request()->user()->isAbleToAndOwns('tournaments-update', $tournament)) {
                return view('pages.tournament.edit', compact('tournament'));
            } else {
                return redirect()->route('tournament.index')->with($this->permissionDenied());
            }

        } catch (ModelNotFoundException $e) {
            return redirect()->route('tournament.index')->with($this->alertNotFound());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $tournament = Tournament::findOrFail($id);

            // Jika user yang sedang login ini memiliki role superadmin atau admin
            // Atau jika user yang sedang login ini memiliki permission update-tournament dan user-id yang sama di dalam user dan tournament
            if(request()->user()->hasRole(['superadmin', 'admin']) || request()->user()->isAbleToAndOwns('tournaments-update', $tournament)) {
                $this->validate($request, [
                    'title' => ['required', 'string', 'max:255'],
                    'body' => ['required', 'string']
                ]);

                $tournament->update($request->all());

                return redirect()->route('tournament.index')->with($this->alertUpdated());
            } else {
                return redirect()->route('tournament.index')->with($this->permissionDenied());
            }

        } catch (ModelNotFoundException $e) {
            return redirect()->route('tournament.index')->with($this->alertNotFound());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $tournament = Tournament::findOrFail($id);

            // Jika user yang sedang login ini memiliki role superadmin
            // Atau jika user yang sedang login ini memiliki permission delete-tournament dan user-id yang sama di dalam user dan tournament
            if(request()->user()->hasRole('superadmin') || request()->user()->isAbleToAndOwns('tournaments-delete', $tournament)) {
                $tournament->delete();

                return redirect()->route('tournament.index')->with($this->alertDeleted());
            } else {
                return redirect()->route('tournament.index')->with($this->permissionDenied());
            }

        } catch (ModelNotFoundException $e) {
            return redirect()->route('tournament.index')->with($this->alertNotFound());
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientModel = new Client();
        $clients = $clientModel->getAllClients();
        return Inertia::render('Clients/Index',[
            'clients' => $clients
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Clients/Create',[]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|string|max:20',
            'phone' => 'required|string|max:10',
            'email' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'nationality' => 'required|string|max:255',
            'dob' => 'nullable|date',
            'educationBackground' => 'nullable|string|max:255',
            'preferredModeofContact' => 'required|string|max:10',
        ]);
        
        $clientModel = new Client();
        $clientModel->storeClient($validated);
        return redirect(route('clients.index'));
    }
}

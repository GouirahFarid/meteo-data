<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateMeteoDataRequest;
use App\Services\MeteoService;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class MeteoDataController extends Controller
{
    public function __construct(public MeteoService $meteoService)
    {
    }

    /**
     * @return Response
     */
    public function show(): Response
    {
        return Inertia::render('Dashboard', [
            'meteoData' => $this->meteoService->get(),
        ]);
    }

    /**
     * @param UpdateMeteoDataRequest $request
     * @return RedirectResponse
     */
    public function update(UpdateMeteoDataRequest $request): RedirectResponse
    {
        $this->meteoService->update($request->validated());
        return to_route('meteo.show');
    }

    /**
     * @return RedirectResponse
     */
    public function generate(): RedirectResponse
    {
        $this->meteoService->collect();
        return to_route('meteo.show');
    }
}

<?php

namespace App\Http\Controllers\Webhook\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Webhook\WebhookRequest;
use App\Models\Webhook\Webhook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WebhookController extends Controller
{
    public function handleGoogleFormWebhook(Request $request)
    {
        Log::error(json_encode($request->all()));

        return $request->all();
    }



    public function index()
    {
        return Webhook::all();
    }

    public function store(WebhookRequest $request)
    {
        return Webhook::create($request->validated());
    }

    public function show(Webhook $webhook)
    {
        return $webhook;
    }

    public function update(WebhookRequest $request, Webhook $webhook)
    {
        $webhook->update($request->validated());

        return $webhook;
    }

    public function destroy(Webhook $webhook)
    {
        $webhook->delete();

        return response()->json();
    }
}

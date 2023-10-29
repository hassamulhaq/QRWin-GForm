<?php

namespace App\Http\Controllers;

use App\Http\Requests\QrCodeRequest;
use App\Models\QrCode;

class QrCodeController extends Controller
{
    public function scan()
    {
        $file = '';

        return view('qrcodes.scan', compact('file'));
    }

    public function index()
    {
        return QrCode::all();
    }

    public function store(QrCodeRequest $request)
    {
        return QrCode::create($request->validated());
    }

    public function show(QrCode $qrCode)
    {
        return $qrCode;
    }

    public function update(QrCodeRequest $request, QrCode $qrCode)
    {
        $qrCode->update($request->validated());

        return $qrCode;
    }

    public function destroy(QrCode $qrCode)
    {
        $qrCode->delete();

        return response()->json();
    }
}

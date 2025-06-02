<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PragmaRX\Google2FA\Google2FA;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
class TwoFactorController extends Controller
{
   public function generate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $google2fa = new Google2FA();

        $secret = $google2fa->generateSecretKey();

        $company = config('app.name');
        $email = $request->email;

        $qrCodeUrl = $google2fa->getQRCodeUrl(
            $company,
            $email,
            $secret
        );

        $renderer = new ImageRenderer(
            new RendererStyle(200),
            new SvgImageBackEnd()
        );

        $writer = new Writer($renderer);
        $qrImage = $writer->writeString($qrCodeUrl);

        return response()->json([
            'secret' => $secret,
            'qr' => 'data:image/svg+xml;base64,' . base64_encode($qrImage),
        ]);
    }
}

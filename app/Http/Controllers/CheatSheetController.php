<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use mikehaertl\wkhtmlto\Pdf;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class CheatSheetController extends Controller
{
    public function index() {
        return view('cheats.index');
    }

    public function compile(Request $request) {
        $body = '<body>' . $request->input('editordata') . '</body>';

        $style = '<style>
                    body.* {
                        font-family: "Times New Roman", Times, serif;
                        font-size: 5px;
                    }
                </style>';

        $html = '<html>' . $style . $body . '</html>';

        $pdf = new Pdf(array(
            'no-outline',         // Make Chrome not complain
            'margin-top'    => 0,
            'margin-right'  => 0,
            'margin-bottom' => 0,
            'margin-left'   => 0,

            // Default page options
            'disable-smart-shrinking',
        ));

        $pdf->addPage($html);

        if (!$pdf->send()) {
            $error = $pdf->getError();
            echo $error;
        }

        return view('cheat.compiled');

    }
}

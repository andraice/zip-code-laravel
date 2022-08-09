<?php

namespace App\Http\Controllers;

use App\Models\ZipCode;
use Illuminate\Http\Request;

class ZipCodeController extends Controller
{
    private function getZipCodes(String $zip_code)
    {
        try {
            $zipCodesList = ZipCode::where('d_codigo', $zip_code)->get();

            if (isset($zipCodesList)) {
                $filledHead = false;

                foreach ($zipCodesList as $item) {

                    if (!$filledHead) {
                        $locality = $item['d_ciudad'];

                        $federal_entity = array(
                            "key" => (int) $item['c_estado'],
                            "name" => $item['d_estado'],
                            "code" => !isset($item['c_CP']) ? null : $item['c_CP']
                        );
                        $municipality = array(
                            "key" => (int) $item['c_mnpio'],
                            "name" => $item['d_mnpio']
                        );

                        $filledHead = true;
                    }

                    $settlements[] = array(
                        "key" => (int) $item['id_asenta_cpcons'],
                        "name" => $item['d_asenta'],
                        "zone_type" => $item['d_zona'],
                        "settlement_type" => array(
                            "name" => $item['d_tipo_asenta']
                        )
                    );
                }

                $results = array(
                    "zip_code" => $zip_code,
                    "locality" => $locality,
                    "federal_entity" => $federal_entity,
                    "settlements" => $settlements,
                    "municipality" => $municipality
                );
            } else {
                return response()->json(['message' => 'Not Found!'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
        return response()->json($results);
    }
}

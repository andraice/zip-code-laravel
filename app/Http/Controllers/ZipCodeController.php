<?php

namespace App\Http\Controllers;

use App\Models\ZipCode;
use Illuminate\Http\Request;

class ZipCodeController extends Controller
{
    public function getZipCodes(String $zip_code)
    {
        try {
            $zipCodesList = ZipCode::select('d_ciudad', 'c_estado', 'd_estado', 'c_CP', 'c_estado', 'd_mnpio', 'id_asenta_cpcons', 'd_asenta', 'd_zona', 'd_tipo_asenta')->where('d_codigo', $zip_code)->get();

            if (isset($zipCodesList)) {

                // extract only first
                foreach ($zipCodesList as $item) {
                    $locality = $item['d_ciudad'];

                    $federal_entity = array(
                        "key" => (int) $item['c_estado'],
                        "name" => strtoupper($item['d_estado']),
                        "code" => !isset($item['c_CP']) ? null : $item['c_CP']
                    );
                    $municipality = array(
                        "key" => (int) $item['c_mnpio'],
                        "name" => strtoupper($item['d_mnpio'])
                    );

                    break;
                }

                // extract all settlements
                foreach ($zipCodesList as $item) {
                    $settlements[] = array(
                        "key" => (int) $item['id_asenta_cpcons'],
                        "name" => strtoupper($item['d_asenta']),
                        "zone_type" => strtoupper($item['d_zona']),
                        "settlement_type" => array(
                            "name" => strtoupper($item['d_tipo_asenta'])
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

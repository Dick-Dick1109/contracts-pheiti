<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContractController extends Controller
{
    public function index(Request $request)
    {
        $contracts = [
            ['name' => 'Nickel Asia Corporation', 'code' => 'MPSA-0118-2020-XIII-EST. 2022', 'type' => 'MPSA', 'type_color' => 'green', 'location' => 'Surigao del Norte, CARAGA', 'status' => 'Active'],
            ['name' => 'OceanaGold Philippines Inc.', 'code' => 'FTAA-000002-V · Est. 1994', 'type' => 'FTAA', 'type_color' => 'blue', 'location' => 'Nueva Vizcaya, Region II', 'status' => 'Active'],
            ['name' => 'Semirara Mining & Power Corp.', 'code' => 'MPSA-093-96-VI · Coal Mining', 'type' => 'MPSA', 'type_color' => 'green', 'location' => 'Antique, Region VI', 'status' => 'Active'],
            ['name' => 'Forum Energy Philippines Corp.', 'code' => 'SC-72 · Petroleum Exploration', 'type' => 'SC', 'type_color' => 'purple', 'location' => 'West Philippine Sea', 'status' => 'Suspended'],
            ['name' => 'Philex Mining Corporation', 'code' => 'MPSA-208-2007-CAR', 'type' => 'FTAA', 'type_color' => 'blue', 'location' => 'Benguet, CAR', 'status' => 'Active'],
            ['name' => 'Malampaya Energy XP Pte. Ltd.', 'code' => 'SC-38 · Deepwater Gas Field', 'type' => 'SC', 'type_color' => 'purple', 'location' => 'Palawan, MIMAROPA', 'status' => 'Under Review'],
        ];

        $resources = [
            ['name' => 'Nickel', 'count' => 342],
            ['name' => 'Gold', 'count' => 342],
            ['name' => 'Coal', 'count' => 342],
            ['name' => 'Hydrocarbons', 'count' => 342],
            ['name' => 'Copper', 'count' => 342],
        ];

        return view('contracts.index', [
            'contracts' => $contracts,
            'resources' => $resources,
            'totalContracts' => '1240+',
            'registeredCompanies' => '86',
            'registeredRegions' => '17',
            'openDataLicense' => 'CC-BY',
            'totalRecords' => '1240',
        ]);
    }
}

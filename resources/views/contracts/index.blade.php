@extends('layouts.app')

@section('content')
{{-- Top Government Bar --}}
<div class="bg-navy-dark text-white text-xs py-4 px-4 md:px-8">
    <div class="w-full max-w-[1400px] mx-auto flex justify-between items-center">
        <div class="flex items-center gap-2">
            <span class="text-red-500 text-[10px]">▶</span>
            <span class="text-[11px]">Official Website of the Philippine Government · Republic of the Philippines</span>
        </div>
        <div class="hidden md:flex gap-6 text-[11px]">
            <a href="#" class="hover:underline">pheiti.dof.gov.ph</a>
            <a href="#" class="hover:underline">dof.gov.ph</a>
            <a href="#" class="hover:underline">gov.ph</a>
        </div>
    </div>
</div>

{{-- Navigation --}}
<nav class="bg-gradient-to-b from-[#002366] to-[#001a4d] text-white py-4 px-4 md:px-8">
    <div class="w-full max-w-[1400px] mx-auto flex justify-between items-center">
        <div class="flex items-center gap-3">
            <img src="{{ asset('img/logo.png') }}" alt="PH-EITI Logo" class="w-10 h-10">
            <div>
                <div class="font-bold text-sm leading-tight">Contracts Portal</div>
                <div class="text-[11px] text-gray-300 leading-tight mt-0.5">Philippine Extractive Industries Transparency Initiative</div>
            </div>
        </div>
        <div class="hidden lg:flex items-center gap-6 text-[13px]">
            <a href="#" class="text-gold">Home</a>
            <a href="#" class="hover:text-gold">All Contracts</a>
            <a href="#" class="hover:text-gold">Contracts Registry</a>
            <a href="#" class="hover:text-gold">Licenses</a>
            <a href="#" class="hover:text-gold">Maps</a>
            <a href="#" class="hover:text-gold">About</a>
            <a href="#" class="hover:text-gold">Contact</a>
            <a href="#" class="bg-yellow-500 text-navy font-semibold px-4 py-2 rounded-full text-[13px] flex items-center gap-1 ml-3">
                Open Data ✓
            </a>
        </div>
    </div>
</nav>

{{-- Hero Section --}}
<section class="bg-gradient-to-b from-[#001a4d] to-[#001233] text-white pt-[8rem] pb-[8rem] px-4 md:px-8 relative overflow-hidden">
    <div class="w-full max-w-[1400px] mx-auto">
        <span class="inline-block bg-green-600 text-white text-[10px] font-semibold px-3 py-1 rounded mb-6">
            ✦ OPEN GOVERNMENT DATA PORTAL
        </span>
        <h1 class="text-3xl md:text-[44px] font-bold leading-tight mb-5">
            Philippine Extractive<br>
            Industries <span class="text-gold">Contracts</span><br>
            & Licenses
        </h1>
        <p class="text-gray-300 text-sm max-w-lg mb-10 leading-relaxed">
            Access official mining agreements, hydrocarbon service contracts, and environmental compliance documents under the EITI framework — transparent, open, and publicly available.
        </p>

        {{-- Search Form --}}
        <form action="{{ route('contracts.index') }}" method="GET" class="bg-white rounded-lg p-5 max-w-4xl">
            @csrf
            <div class="flex items-center gap-3 mb-4">
                <svg class="w-5 h-5 text-gray-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <input type="text" name="search" placeholder="Search by company name, contract number, region..." class="flex-1 text-gray-700 text-sm outline-none py-1.5" value="{{ request('search') }}">
                <button type="submit" class="bg-primary text-white px-5 py-2 rounded text-sm font-semibold flex items-center gap-1.5">
                    🔍 Search
                </button>
            </div>
            <div class="flex flex-wrap gap-5 text-sm">
                <div class="flex items-center gap-2">
                    <label class="text-gray-500 text-[11px] uppercase">Resource</label>
                    <select name="resource" class="border border-gray-300 rounded px-3 py-1.5 text-gray-700 text-[13px]">
                        <option>{{ $selectedResource ?? 'Gold' }}</option>
                        <option>Nickel</option>
                        <option>Coal</option>
                        <option>Copper</option>
                    </select>
                </div>
                <div class="flex items-center gap-2">
                    <label class="text-gray-500 text-[11px] uppercase">Types</label>
                    <select name="type" class="border border-gray-300 rounded px-3 py-1.5 text-gray-700 text-[13px]">
                        <option>{{ $selectedType ?? 'MPSA' }}</option>
                        <option>FTAA</option>
                        <option>Exploration Permit</option>
                        <option>ISAG</option>
                        <option>Service Contract</option>
                    </select>
                </div>
                <div class="flex items-center gap-2">
                    <label class="text-gray-500 text-[11px] uppercase">Region</label>
                    <select name="region" class="border border-gray-300 rounded px-3 py-1.5 text-gray-700 text-[13px]">
                        <option>{{ $selectedRegion ?? 'All Regions' }}</option>
                    </select>
                </div>
            </div>
        </form>
    </div>
</section>

{{-- Stats Bar --}}
<section class="bg-blue-accent text-white py-4 px-4 md:px-8">
    <div class="w-full max-w-[1400px] mx-auto grid grid-cols-2 md:grid-cols-4 gap-6">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 bg-blue-300/30 rounded"></div>
            <div>
                <div class="font-bold text-lg leading-tight">{{ $totalContracts ?? '1240+' }}</div>
                <div class="text-[11px] text-blue-200 mt-0.5">Total Contracts</div>
            </div>
        </div>
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 bg-blue-300/30 rounded"></div>
            <div>
                <div class="font-bold text-lg leading-tight">{{ $registeredCompanies ?? '86' }}</div>
                <div class="text-[11px] text-blue-200 mt-0.5">Registered Companies</div>
            </div>
        </div>
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 bg-blue-300/30 rounded"></div>
            <div>
                <div class="font-bold text-lg leading-tight">{{ $registeredRegions ?? '17' }}</div>
                <div class="text-[11px] text-blue-200 mt-0.5">Registered Companies</div>
            </div>
        </div>
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 bg-blue-300/30 rounded"></div>
            <div>
                <div class="font-bold text-lg leading-tight">{{ $openDataLicense ?? 'CC-BY' }}</div>
                <div class="text-[11px] text-blue-200 mt-0.5">Open Data</div>
            </div>
        </div>
    </div>
</section>

{{-- Main Content --}}
<section class="w-full max-w-[1400px] mx-auto px-4 md:px-8 pt-[8rem] pb-[8rem]">
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
        {{-- Contracts Table --}}
        <div class="lg:col-span-3">
            <div class="mb-5 flex flex-wrap justify-between items-center gap-3">
                <div>
                    <p class="text-[10px] text-gray-500 uppercase font-semibold tracking-wide mb-1">Category Registry</p>
                    <h2 class="text-base font-bold uppercase leading-tight">Active Mining & Hydrocarbon Contracts</h2>
                </div>
                <a href="#" class="border border-gray-300 rounded-full px-4 py-1.5 text-[13px] font-medium hover:bg-gray-100">
                    View all Records →
                </a>
            </div>

            {{-- Filter Tabs --}}
            <div class="flex flex-wrap gap-2 mb-5">
                <button class="bg-primary text-white px-4 py-1.5 rounded-full text-[13px] font-medium">All Contracts</button>
                <button class="border border-gray-300 px-4 py-1.5 rounded-full text-[13px] hover:bg-gray-100">MPSA</button>
                <button class="border border-gray-300 px-4 py-1.5 rounded-full text-[13px] hover:bg-gray-100">FTAA</button>
                <button class="border border-gray-300 px-4 py-1.5 rounded-full text-[13px] hover:bg-gray-100">Exploration Permit</button>
                <button class="border border-gray-300 px-4 py-1.5 rounded-full text-[13px] hover:bg-gray-100">ISAG</button>
                <button class="border border-gray-300 px-4 py-1.5 rounded-full text-[13px] hover:bg-gray-100">Service Contract</button>
            </div>

            {{-- Table --}}
            <div class="bg-white rounded-lg shadow overflow-x-auto">
                <table class="w-full text-[13px]">
                    <thead class="bg-gray-50 text-gray-500 uppercase text-[11px]">
                        <tr>
                            <th class="text-left px-6 py-4 font-medium">Company / Contract Name</th>
                            <th class="text-left px-6 py-4 font-medium">Contract Type</th>
                            <th class="text-left px-6 py-4 font-medium">Location/Region</th>
                            <th class="text-left px-6 py-4 font-medium">Status</th>
                            <th class="text-left px-6 py-4 font-medium">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach($contracts as $contract)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-5">
                                <div class="font-semibold text-gray-900 text-[13px] leading-tight">{{ $contract['name'] }}</div>
                                <div class="text-[11px] text-gray-400 mt-1">{{ $contract['code'] }}</div>
                            </td>
                            <td class="px-6 py-5">
                                <span class="inline-block px-2.5 py-0.5 rounded text-[11px] font-bold
                                    @if($contract['type_color'] === 'green') bg-green-100 text-green-700 border border-green-300
                                    @elseif($contract['type_color'] === 'blue') bg-blue-100 text-blue-700 border border-blue-300
                                    @else bg-purple-100 text-purple-700 border border-purple-300
                                    @endif">
                                    {{ $contract['type'] }}
                                </span>
                            </td>
                            <td class="px-6 py-5 text-gray-600 text-[13px]">{{ $contract['location'] }}</td>
                            <td class="px-6 py-5">
                                @if($contract['status'] === 'Active')
                                    <span class="flex items-center gap-1.5 text-green-600 text-[11px] font-medium">
                                        <span class="w-2 h-2 bg-green-500 rounded-full"></span> Active
                                    </span>
                                @elseif($contract['status'] === 'Suspended')
                                    <span class="inline-block bg-yellow-100 text-yellow-700 text-[11px] px-2 py-0.5 rounded font-medium">Suspended</span>
                                @else
                                    <span class="inline-block bg-orange-100 text-orange-700 text-[11px] px-2 py-0.5 rounded font-medium">Under Review</span>
                                @endif
                            </td>
                            <td class="px-6 py-5">
                                <a href="#" class="text-blue-600 font-semibold text-[12px] hover:underline">VIEW →</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="flex justify-between items-center mt-5 text-[13px] text-gray-500">
                <span>Showing 1-6 of {{ $totalRecords ?? '1240' }} records</span>
                <div class="flex items-center gap-1">
                    <button class="w-8 h-8 flex items-center justify-center rounded hover:bg-gray-200 text-[13px]">&lt;</button>
                    <button class="w-8 h-8 flex items-center justify-center rounded bg-primary text-white text-[13px]">1</button>
                    <button class="w-8 h-8 flex items-center justify-center rounded hover:bg-gray-200 text-[13px]">2</button>
                    <button class="w-8 h-8 flex items-center justify-center rounded hover:bg-gray-200 text-[13px]">3</button>
                    <span class="px-1">...</span>
                    <button class="w-8 h-8 flex items-center justify-center rounded hover:bg-gray-200 text-[13px]">120</button>
                    <button class="w-8 h-8 flex items-center justify-center rounded hover:bg-gray-200 text-[13px]">&gt;</button>
                </div>
            </div>
        </div>

        {{-- Sidebar --}}
        <div class="space-y-6">
            {{-- Browse by Resource --}}
            <div class="bg-white rounded-lg shadow p-5">
                <h3 class="font-bold text-sm mb-4">Browse by Resource</h3>
                <ul class="space-y-3.5">
                    @foreach($resources as $resource)
                    <li class="flex justify-between items-center py-2">
                        <div class="flex items-center gap-3">
                            <div class="w-6 h-6 bg-gray-200 rounded"></div>
                            <span class="text-[13px] text-gray-700">{{ $resource['name'] }}</span>
                        </div>
                        <span class="bg-blue-100 text-blue-700 text-[11px] font-bold px-2 py-0.5 rounded">{{ $resource['count'] }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>

            {{-- Quick Links --}}
            <div class="bg-white rounded-lg shadow p-5">
                <h3 class="font-bold text-sm mb-4">Quick Links</h3>
                <ul class="space-y-3.5">
                    @foreach(['Contracts Registry', 'Licenses — DMPF Registry', 'MMT Reports', 'EIS Documents', 'Interactive Maps', 'Related Links'] as $link)
                    <li class="py-2">
                        <a href="#" class="flex justify-between items-center text-[13px] text-gray-700 hover:text-blue-600">
                            {{ $link }}
                            <span class="text-gray-400">›</span>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>

{{-- Info Cards Section --}}
<section class="bg-gray-100 pt-20 pb-20 px-4 md:px-8">
    <div class="w-full max-w-[1400px] mx-auto grid grid-cols-1 md:grid-cols-3 gap-10">
        <div>
            <div class="w-10 h-10 bg-blue-200 rounded mb-4"></div>
            <h3 class="font-bold text-sm mb-2">About PH-EITI</h3>
            <p class="text-[12px] text-gray-600 leading-relaxed">
                The Philippine Extractive Industries Transparency Initiative promotes transparency and accountability in the management of natural resource revenues, in line with international EITI standards.
            </p>
        </div>
        <div>
            <div class="w-10 h-10 bg-blue-200 rounded mb-4"></div>
            <h3 class="font-bold text-sm mb-2">Open Data Policy</h3>
            <p class="text-[12px] text-gray-600 leading-relaxed">
                All contract data published on this portal is licensed under Creative Commons Attribution 3.0, in accordance with the Open Data Philippines Action Plan and Republic Act No. 10173.
            </p>
        </div>
        <div>
            <div class="w-10 h-10 bg-blue-200 rounded mb-4"></div>
            <h3 class="font-bold text-sm mb-2">Partner Institutions</h3>
            <p class="text-[12px] text-gray-600 leading-relaxed">
                Developed in partnership with the Natural Resource Governance Institute, the World Bank, and the Columbia Center on Sustainable Investment, with support from the EITI Multi-Donor Trust Fund.
            </p>
        </div>
    </div>
</section>

{{-- Footer --}}
<footer class="bg-gradient-to-b from-[#002366] to-[#001233] text-white pt-16 pb-16 px-4 md:px-8">
    <div class="w-full max-w-[1400px] mx-auto grid grid-cols-1 md:grid-cols-4 gap-8 mb-10">
        <div>
            <h4 class="font-bold text-lg mb-2">PH-EITI Contracts Portal</h4>
            <p class="text-[10px] text-gray-400 uppercase mb-3 tracking-wide">Department of Finance · Republic of the Philippines</p>
            <p class="text-[12px] text-gray-400 leading-relaxed mb-4">
                An official government transparency portal providing public access to extractive industry contracts and licenses in compliance with EITI standards.
            </p>
            <div class="flex flex-wrap gap-2">
                <span class="border border-gray-500 text-[11px] px-2 py-0.5 rounded">NRGI</span>
                <span class="border border-gray-500 text-[11px] px-2 py-0.5 rounded">World Bank</span>
                <span class="border border-gray-500 text-[11px] px-2 py-0.5 rounded">CCSI</span>
                <span class="border border-gray-500 text-[11px] px-2 py-0.5 rounded">EITI-MDTF</span>
            </div>
        </div>
        <div>
            <h4 class="font-bold text-gold text-sm mb-3">Contracts</h4>
            <ul class="space-y-2 text-[12px] text-gray-400">
                <li><a href="#" class="hover:text-white">All Contracts</a></li>
                <li><a href="#" class="hover:text-white">Contracts Registry</a></li>
                <li><a href="#" class="hover:text-white">MMT</a></li>
                <li><a href="#" class="hover:text-white">EIS</a></li>
                <li><a href="#" class="hover:text-white">ASDMP</a></li>
                <li><a href="#" class="hover:text-white">Hydrocarbons</a></li>
            </ul>
        </div>
        <div>
            <h4 class="font-bold text-gold text-sm mb-3">Licenses</h4>
            <ul class="space-y-2 text-[12px] text-gray-400">
                <li><a href="#" class="hover:text-white">DMPF Registry</a></li>
                <li><a href="#" class="hover:text-white">Mining Permits</a></li>
                <li><a href="#" class="hover:text-white">Exploration Permits</a></li>
                <li><a href="#" class="hover:text-white">Quarry Permits</a></li>
            </ul>
        </div>
        <div>
            <h4 class="font-bold text-gold text-sm mb-3">Resources</h4>
            <ul class="space-y-2 text-[12px] text-gray-400">
                <li><a href="#" class="hover:text-white">About PH-EITI</a></li>
                <li><a href="#" class="hover:text-white">Interactive Maps</a></li>
                <li><a href="#" class="hover:text-white">Open Data</a></li>
                <li><a href="#" class="hover:text-white">Related Links</a></li>
                <li><a href="#" class="hover:text-white">Contact Us</a></li>
            </ul>
        </div>
    </div>

    {{-- Footer Bottom --}}
    <div class="w-full max-w-[1400px] mx-auto border-t border-gray-700 pt-5 flex flex-wrap justify-between items-center text-[11px] text-gray-500">
        <span>© 2025 PH-EITI / Department of Finance. All content available as open data under CC Attribution 3.0.</span>
        <div class="flex gap-5 mt-2 md:mt-0">
            <a href="#" class="hover:text-white">Privacy Policy</a>
            <a href="#" class="hover:text-white">Terms of Use</a>
            <a href="#" class="hover:text-white">Accessibility</a>
            <a href="#" class="hover:text-white">Site Map</a>
        </div>
    </div>
</footer>
@endsection

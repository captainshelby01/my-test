@extends('layouts.app')

@section('title', 'Admin Dashboard | FDP Digitals')

@section('content')
<div class="bg-gray-100 min-h-screen pb-20">
    {{-- Header --}}
    <div class="bg-black text-white py-12 px-10 mb-10 border-b-4 border-red-600">
        <div class="max-w-7xl mx-auto flex flex-col md:row justify-between items-center text-white gap-6">
            <h1 class="text-3xl font-black uppercase italic">Control <span class="text-red-600">Center</span></h1>
            
            <div class="flex items-center space-x-4">
                <a href="{{ route('admin.leads.export', request()->query()) }}" class="text-[10px] font-black uppercase bg-red-600 px-5 py-3 hover:bg-white hover:text-black transition whitespace-nowrap text-white rounded-md shadow-lg shadow-red-600/20">
                    Download CSV
                </a>
                
                <form method="POST" action="{{ route('logout') }}" class="m-0 p-0">
                    @csrf
                    <button type="submit" class="text-[10px] font-black uppercase border border-white/20 px-5 py-3 hover:bg-white hover:text-black transition whitespace-nowrap text-white rounded-md">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 md:px-10">
        @if(session('success'))
            <div class="mb-6 p-4 bg-black text-white border-l-4 border-red-600 text-[10px] font-bold uppercase tracking-widest animate-pulse">
                {{ session('success') }}
            </div>
        @endif

        {{-- SEARCH & FILTER BAR --}}
        <div class="bg-white p-6 mb-8 rounded-xl border border-gray-200 shadow-sm">
            <form action="{{ route('admin.leads') }}" method="GET" class="flex flex-wrap items-end gap-4">
                <div class="flex-1 min-w-[250px]">
                    <label class="block text-[10px] font-black uppercase text-gray-400 mb-2 tracking-widest">Search Leads</label>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search Name or Email..." 
                        class="w-full border-gray-200 p-3 text-sm rounded-lg focus:ring-2 focus:ring-red-600/20 focus:border-red-600 outline-none transition-all">
                </div>

                <div class="w-full md:w-48">
                    <label class="block text-[10px] font-black uppercase text-gray-400 mb-2 tracking-widest">Service</label>
                    <select name="service" class="w-full border-gray-200 p-3 text-sm rounded-lg outline-none cursor-pointer focus:border-red-600">
                        <option value="">All Services</option>
                        <option value="Web Design" {{ request('service') == 'Web Design' ? 'selected' : '' }}>Web Design</option>
                        <option value="SEO" {{ request('service') == 'SEO' ? 'selected' : '' }}>SEO</option>
                        <option value="Branding" {{ request('service') == 'Branding' ? 'selected' : '' }}>Branding</option>
                    </select>
                </div>

                <button type="submit" class="bg-black text-white px-10 py-3.5 text-[10px] font-black uppercase tracking-widest hover:bg-red-600 transition rounded-lg">
                    Filter
                </button>
                
                @if(request()->filled('search') || request()->filled('service'))
                    <a href="{{ route('admin.leads') }}" class="text-[10px] font-black uppercase text-gray-400 hover:text-red-600 py-3.5">Clear Filters</a>
                @endif
            </form>
        </div>

        {{-- LEADS TABLE --}}
        <div class="bg-white shadow-xl mb-12 border border-gray-200 rounded-xl overflow-hidden">
            <div class="overflow-x-auto"> {{-- Senior Dev Fix: horizontal scroll for mobile --}}
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 text-[10px] font-black uppercase tracking-widest border-b text-gray-500">
                            <th class="p-5">Lead Details</th>
                            <th class="p-5">Received</th>
                            <th class="p-5">Status</th>
                            <th class="p-5">Last Activity</th>
                            <th class="p-5 text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($leads as $lead)
                            @php
                                $statusClasses = match($lead->status) {
                                    'New' => 'bg-blue-50 text-blue-700 border-blue-200',
                                    'Contacted' => 'bg-amber-50 text-amber-700 border-amber-200',
                                    'Closed' => 'bg-emerald-50 text-emerald-700 border-emerald-200',
                                    default => 'bg-gray-50 text-gray-700 border-gray-200',
                                };
                            @endphp
                            <tr class="hover:bg-gray-50/50 transition group">
                                <td class="p-5">
                                    <div class="text-sm font-bold text-black group-hover:text-red-600 transition">{{ $lead->name }}</div>
                                    <div class="text-[9px] text-gray-400 font-bold uppercase tracking-widest mt-0.5">{{ $lead->service ?? 'General Inquiry' }}</div>
                                </td>
                                <td class="p-5 text-xs font-medium text-gray-500">
                                    {{ $lead->created_at->diffForHumans() }}
                                </td>
                                <td class="p-5">
                                    <form action="{{ route('admin.leads.status', $lead->id) }}" method="POST">
                                        @csrf 
                                        @method('PATCH')
                                        <select name="status" onchange="this.form.submit()" 
                                            class="text-[9px] font-black uppercase px-4 py-1.5 border rounded-full cursor-pointer focus:outline-none {{ $statusClasses }}">
                                            <option value="New" {{ $lead->status == 'New' ? 'selected' : '' }}>New</option>
                                            <option value="Contacted" {{ $lead->status == 'Contacted' ? 'selected' : '' }}>Contacted</option>
                                            <option value="Closed" {{ $lead->status == 'Closed' ? 'selected' : '' }}>Closed</option>
                                        </select>
                                    </form>
                                </td>
                                <td class="p-5 text-[10px] font-bold text-gray-400 uppercase">
                                    @if($lead->last_contacted_at)
                                        <span class="text-gray-700">{{ $lead->last_contacted_at->format('M d, H:i') }}</span>
                                    @else
                                        <span class="text-gray-300 italic">No Activity</span>
                                    @endif
                                </td>
                                <td class="p-5 text-right flex justify-end items-center space-x-6">
                                    <button onclick="openModal('{{ addslashes($lead->name) }}', '{{ $lead->service }}', '{{ addslashes($lead->message) }}')" 
                                            class="text-[10px] font-black uppercase text-red-600 hover:text-black transition">View</button>

                                    <form action="{{ route('admin.leads.delete', $lead->id) }}" method="POST" onsubmit="return confirm('Permanently delete this lead?')">
                                        @csrf @method('DELETE')
                                        <button class="text-[10px] font-black uppercase text-gray-300 hover:text-red-600 transition">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="p-20 text-center text-gray-400 font-bold uppercase text-[10px] tracking-[0.3em]">
                                    System clean. No leads detected.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- MODAL STRUCTURE --}}
        <div id="leadModal" class="fixed inset-0 bg-black/90 z-[100] hidden items-center justify-center p-6 backdrop-blur-sm">
            <div class="bg-white max-w-2xl w-full rounded-2xl overflow-hidden shadow-2xl border-t-8 border-red-600 transform scale-95 transition-transform duration-300">
                <div class="p-10">
                    <div class="flex justify-between items-start mb-8">
                        <div>
                            <h2 id="modalName" class="text-3xl font-black uppercase italic text-black leading-none mb-2">Client Name</h2>
                            <p id="modalService" class="text-[10px] font-black uppercase tracking-widest text-red-600">Service Type</p>
                        </div>
                        <button onclick="closeModal()" class="text-gray-300 hover:text-red-600 transition font-black uppercase text-[10px] tracking-widest">Close [ESC]</button>
                    </div>
                    <div class="bg-gray-50 p-8 rounded-xl border border-gray-100">
                        <label class="block text-[9px] font-black uppercase text-gray-400 mb-4 tracking-[0.2em] italic border-b border-gray-200 pb-2">Intelligence Brief / Message</label>
                        <p id="modalMessage" class="text-gray-700 leading-relaxed text-sm whitespace-pre-wrap"></p>
                    </div>
                </div>
                <div class="bg-gray-100 p-6 text-right flex justify-between items-center">
                    <span class="text-[9px] font-bold text-gray-400 uppercase">FDP Internal Communications</span>
                    <button onclick="closeModal()" class="bg-black text-white px-8 py-3 font-black uppercase text-[10px] tracking-widest hover:bg-red-600 transition rounded-lg shadow-lg">Dismiss</button>
                </div>
            </div>
        </div>

        {{-- ADMIN MANAGEMENT --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 mt-10">
            <div class="lg:col-span-2 bg-white p-10 border-2 border-black rounded-2xl shadow-xl">
                <h2 class="text-xl font-black uppercase mb-8 italic">Authorize New <span class="text-red-600">Personnel</span></h2>
                <form action="{{ route('admin.create') }}" method="POST">
                    @csrf
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="mb-4">
                            <label class="block text-[10px] font-black uppercase text-gray-400 mb-2 tracking-widest">Full Name</label>
                            <input type="text" name="name" required class="w-full border-gray-200 p-3.5 rounded-lg outline-none focus:border-black transition">
                        </div>
                        <div class="mb-4">
                            <label class="block text-[10px] font-black uppercase text-gray-400 mb-2 tracking-widest">Official Email</label>
                            <input type="email" name="email" required class="w-full border-gray-200 p-3.5 rounded-lg outline-none focus:border-black transition">
                        </div>
                    </div>
                    <div class="mb-8">
                        <label class="block text-[10px] font-black uppercase text-gray-400 mb-2 tracking-widest">Secure Password</label>
                        <input type="password" name="password" required autocomplete="new-password" class="w-full border-gray-200 p-3.5 rounded-lg outline-none focus:border-black transition">
                    </div>
                    <button type="submit" class="w-full bg-black text-white py-4 font-black uppercase tracking-widest text-xs hover:bg-red-600 transition rounded-lg">Initialize Authorization</button>
                </form>
            </div>

            <div class="bg-zinc-900 p-10 rounded-2xl shadow-xl text-white border-b-4 border-red-600">
                <h2 class="text-[10px] font-black uppercase mb-8 text-gray-500 tracking-[0.3em]">Active Personnel</h2>
                <ul class="space-y-4">
                    @foreach($users as $user)
                        <li class="group">
                            <div class="text-[11px] font-black uppercase text-white group-hover:text-red-600 transition">{{ $user->name }}</div>
                            <div class="text-[9px] text-gray-500 font-bold lowercase tracking-normal">{{ $user->email }}</div>
                            <div class="h-[1px] w-full bg-white/5 mt-4"></div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
    function openModal(name, service, message) {
        document.getElementById('modalName').innerText = name;
        document.getElementById('modalService').innerText = service ? service : 'General Inquiry';
        document.getElementById('modalMessage').innerText = message;
        
        const modal = document.getElementById('leadModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        
        // Modal animation feel
        setTimeout(() => {
            modal.querySelector('div').classList.remove('scale-95');
            modal.querySelector('div').classList.add('scale-100');
        }, 10);
    }

    function closeModal() {
        const modal = document.getElementById('leadModal');
        modal.querySelector('div').classList.remove('scale-100');
        modal.querySelector('div').classList.add('scale-95');
        
        setTimeout(() => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }, 200);
    }
    
    // Close on background click
    window.onclick = function(event) {
        let modal = document.getElementById('leadModal');
        if (event.target == modal) { closeModal(); }
    }

    // Close on Escape key
    document.addEventListener('keydown', function(event) {
        if (event.key === "Escape") { closeModal(); }
    });
</script>
@endsection
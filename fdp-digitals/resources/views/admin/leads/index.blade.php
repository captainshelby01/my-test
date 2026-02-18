@extends('layouts.app')

@section('title', 'Admin Dashboard | FDP Digitals')

@section('content')
<div class="bg-zinc-100 min-h-screen pb-20">
    
    {{-- High-Impact Hero Header --}}
    <div class="bg-black text-white pt-20 pb-16 px-6 md:px-10 border-b-8 border-red-600">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-8">
            <div class="text-center md:text-left">
                <h1 class="text-4xl font-black uppercase italic leading-none mb-2">Control <span class="text-red-600">Center</span></h1>
                <p class="text-zinc-500 text-[10px] font-bold uppercase tracking-[0.4em]">Operations Management System</p>
            </div>
            
            <div class="flex items-center space-x-4">
                <a href="{{ route('admin.leads.export', request()->query()) }}" class="text-[10px] font-black uppercase bg-white text-black px-6 py-4 hover:bg-red-600 hover:text-white transition rounded-none shadow-xl">
                    Export Intelligence (CSV)
                </a>
                
                <form method="POST" action="{{ route('logout') }}" class="m-0">
                    @csrf
                    <button type="submit" class="text-[10px] font-black uppercase border border-white/20 px-6 py-4 hover:bg-white hover:text-black transition rounded-none">
                        Terminate Session
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 md:px-10 -mt-8">
        @if(session('success'))
            <div class="mb-6 p-5 bg-white border-l-8 border-green-500 shadow-xl text-[10px] font-black uppercase tracking-widest text-green-600 flex items-center">
                <span class="mr-3">✓</span> {{ session('success') }}
            </div>
        @endif

        {{-- Briefing / Filter Bar --}}
        <div class="bg-white p-8 mb-10 shadow-2xl border border-zinc-200">
            <form action="{{ route('admin.leads') }}" method="GET" class="flex flex-wrap items-end gap-6">
                <div class="flex-1 min-w-[300px]">
                    <label class="block text-[10px] font-black uppercase text-zinc-400 mb-3 tracking-widest italic">Target Search</label>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Filter by name, email, or intent..." 
                        class="w-full bg-zinc-50 border-zinc-200 p-4 text-xs font-bold uppercase tracking-tight focus:ring-2 focus:ring-red-600/10 focus:border-red-600 outline-none transition-all">
                </div>

                <div class="w-full md:w-64">
                    <label class="block text-[10px] font-black uppercase text-zinc-400 mb-3 tracking-widest italic">Service Sector</label>
                    <select name="service" class="w-full bg-zinc-50 border-zinc-200 p-4 text-xs font-bold uppercase outline-none cursor-pointer focus:border-red-600 appearance-none">
                        <option value="">All Sectors</option>
                        <option value="Web Design" {{ request('service') == 'Web Design' ? 'selected' : '' }}>Web Design</option>
                        <option value="SEO" {{ request('service') == 'SEO' ? 'selected' : '' }}>SEO</option>
                        <option value="Branding" {{ request('service') == 'Branding' ? 'selected' : '' }}>Branding</option>
                    </select>
                </div>

                <button type="submit" class="bg-black text-white px-12 py-4 text-[10px] font-black uppercase tracking-widest hover:bg-red-600 transition shadow-lg">
                    Apply Filter
                </button>
            </form>
        </div>

        {{-- Intelligence Table --}}
        <div class="bg-white shadow-2xl border border-zinc-200 overflow-hidden mb-12">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse min-w-[1000px]">
                    <thead>
                        <tr class="bg-zinc-900 text-[10px] font-black uppercase tracking-[0.2em] text-zinc-500 border-b border-white/5">
                            <th class="p-6">Entity / Intent</th>
                            <th class="p-6">Temporal Data</th>
                            <th class="p-6">Protocol Status</th>
                            <th class="p-6">Activity Log</th>
                            <th class="p-6 text-right">Action Grid</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-100">
                        @forelse($leads as $lead)
                            @php
                                $statusClasses = match($lead->status) {
                                    'New' => 'bg-red-600 text-white',
                                    'Contacted' => 'bg-zinc-800 text-white',
                                    'Closed' => 'bg-zinc-200 text-zinc-600',
                                    default => 'bg-zinc-100 text-zinc-400',
                                };
                            @endphp
                            <tr class="hover:bg-zinc-50 transition group">
                                <td class="p-6">
                                    <div class="text-sm font-black uppercase tracking-tight text-black group-hover:text-red-600 transition">{{ $lead->name }}</div>
                                    <div class="text-[9px] text-zinc-400 font-bold uppercase tracking-widest mt-1">{{ $lead->service ?? 'General Inquiry' }}</div>
                                </td>
                                <td class="p-6 text-[11px] font-bold text-zinc-500 italic">
                                    {{ $lead->created_at->format('d M Y') }}
                                </td>
                                <td class="p-6">
                                    <form action="{{ route('admin.leads.status', $lead->id) }}" method="POST" class="inline-block">
                                        @csrf @method('PATCH')
                                        <select name="status" onchange="this.form.submit()" 
                                            class="text-[9px] font-black uppercase px-4 py-2 border-0 rounded-none cursor-pointer focus:outline-none transition-all {{ $statusClasses }}">
                                            <option value="New" {{ $lead->status == 'New' ? 'selected' : '' }}>New</option>
                                            <option value="Contacted" {{ $lead->status == 'Contacted' ? 'selected' : '' }}>Contacted</option>
                                            <option value="Closed" {{ $lead->status == 'Closed' ? 'selected' : '' }}>Closed</option>
                                        </select>
                                    </form>
                                </td>
                                <td class="p-6 text-[10px] font-bold text-zinc-400 uppercase italic">
                                    {{ $lead->last_contacted_at ? $lead->last_contacted_at->diffForHumans() : 'Standby' }}
                                </td>
                                {{-- ACTION COLUMN FIX --}}
                                <td class="p-6 text-right min-w-[180px]">
                                    <div class="flex justify-end items-center space-x-4">
                                        <button onclick="openModal('{{ addslashes($lead->name) }}', '{{ $lead->service }}', '{{ addslashes($lead->message) }}')" 
                                                class="text-[10px] font-black uppercase text-black hover:text-red-600 transition underline underline-offset-4 decoration-red-600/30">
                                            View
                                        </button>

                                        <form action="{{ route('admin.leads.delete', $lead->id) }}" method="POST" onsubmit="return confirm('Confirm Deletion?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="text-[10px] font-black uppercase text-zinc-300 hover:text-red-600 transition">
                                                Remove
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="p-32 text-center text-zinc-300 font-black uppercase text-[12px] tracking-[0.5em]">
                                    No Data Clusters Detected
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- MODAL STRUCTURE --}}
        <div id="leadModal" class="fixed inset-0 bg-black/90 z-[100] hidden items-center justify-center p-6 backdrop-blur-sm">
            <div class="bg-white max-w-2xl w-full rounded-none overflow-hidden shadow-2xl border-t-8 border-red-600 transform scale-95 transition-transform duration-300">
                <div class="p-10">
                    <div class="flex justify-between items-start mb-8">
                        <div>
                            <h2 id="modalName" class="text-3xl font-black uppercase italic text-black leading-none mb-2">Client Name</h2>
                            <p id="modalService" class="text-[10px] font-black uppercase tracking-widest text-red-600">Service Type</p>
                        </div>
                        <button onclick="closeModal()" class="text-zinc-300 hover:text-red-600 transition font-black uppercase text-[10px] tracking-widest">Close [ESC]</button>
                    </div>
                    <div class="bg-zinc-50 p-8 rounded-none border border-zinc-100">
                        <label class="block text-[9px] font-black uppercase text-zinc-400 mb-4 tracking-[0.2em] italic border-b border-zinc-200 pb-2">Intelligence Brief / Message</label>
                        <p id="modalMessage" class="text-zinc-700 leading-relaxed text-sm whitespace-pre-wrap font-medium"></p>
                    </div>
                </div>
                <div class="bg-zinc-100 p-6 text-right flex justify-between items-center">
                    <span class="text-[9px] font-bold text-zinc-400 uppercase">FDP Internal Communications</span>
                    <button onclick="closeModal()" class="bg-black text-white px-8 py-3 font-black uppercase text-[10px] tracking-widest hover:bg-red-600 transition rounded-none shadow-lg">Dismiss Briefing</button>
                </div>
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
    
    window.onclick = function(event) {
        let modal = document.getElementById('leadModal');
        if (event.target == modal) { closeModal(); }
    }

    document.addEventListener('keydown', function(event) {
        if (event.key === "Escape") { closeModal(); }
    });
</script>
@endsection
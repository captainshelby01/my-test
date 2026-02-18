<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class LeadController extends Controller
{
    /**
     * Display filtered leads dashboard.
     */
    public function index(Request $request)
    {
        $leads = $this->getFilteredLeads($request)->get();
        $users = User::all();

        return view('admin.leads.index', compact('leads', 'users'));
    }

    /**
     * Shared logic for filtering leads to keep code DRY (Don't Repeat Yourself).
     */
    private function getFilteredLeads(Request $request)
    {
        $query = Contact::query();

        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('name', 'like', "%{$searchTerm}%")
                  ->orWhere('email', 'like', "%{$searchTerm}%");
            });
        }

        if ($request->filled('service')) {
            $query->where('service', $request->service);
        }

        return $query->orderBy('created_at', 'desc');
    }

    public function updateStatus(Request $request, $id)
    {
        $lead = Contact::findOrFail($id);
        $lead->status = $request->status;

        if ($request->status === 'Contacted') {
            $lead->last_contacted_at = Carbon::now();
        }

        $lead->save();
        return redirect()->back()->with('success', "Status updated to {$request->status}.");
    }

    public function destroy($id)
    {
        Contact::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Lead successfully purged.');
    }

    /**
     * Streamed CSV Export (Filtered by current search/service criteria).
     */
    public function downloadCsv(Request $request)
    {
        $leads = $this->getFilteredLeads($request)->get();
        $fileName = 'FDP_Leads_Export_' . now()->format('Y-m-d_His') . '.csv';

        $headers = [
            "Content-type"        => "text/csv; charset=UTF-8",
            "Content-Disposition" => "attachment; filename={$fileName}",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];

        return response()->stream(function() use ($leads) {
            $file = fopen('php://output', 'w');
            fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF)); // BOM for Excel UTF-8
            
            fputcsv($file, ['Date Arrived', 'Name', 'Email', 'Service', 'Status', 'Last Contact']);

            foreach ($leads as $lead) {
                fputcsv($file, [
                    $lead->created_at->format('Y-m-d'),
                    $lead->name,
                    $lead->email,
                    $lead->service,
                    $lead->status,
                    $lead->last_contacted_at ? $lead->last_contacted_at->format('Y-m-d H:i') : 'N/A'
                ]);
            }
            fclose($file);
        }, 200, $headers);
    }

    public function storeAdmin(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|min:8',
        ]);

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return redirect()->back()->with('success', 'New Admin authorized.');
    }
}
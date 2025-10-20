<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\ActivityLog;
use App\Models\User;

class LogController extends Controller
{
    /**
     * Afficher les logs système (SuperAdmin uniquement)
     */
    public function index()
    {
        // Logs d'activité (traçabilité des actions utilisateurs)
        $activityLogs = ActivityLog::with('user')
            ->orderBy('performed_at', 'desc')
            ->limit(100)
            ->get();
        
        // Logs système Laravel (erreurs techniques)
        $systemLogs = $this->getSystemLogs();
        
        // Statistiques de traçabilité
        $stats = [
            'total_activities' => ActivityLog::count(),
            'activities_today' => ActivityLog::whereDate('performed_at', today())->count(),
            'unique_users_active' => ActivityLog::whereDate('performed_at', '>=', now()->subDays(7))
                ->distinct('user_id')->count(),
            'system_errors' => $this->countSystemErrors($systemLogs),
            'last_login' => ActivityLog::where('action', 'login')->latest('performed_at')->first(),
        ];
        
        return view('admin.logs.index', compact('activityLogs', 'systemLogs', 'stats'));
    }
    
    private function getSystemLogs()
    {
        $logPath = storage_path('logs/laravel.log');
        $logs = [];
        
        if (File::exists($logPath)) {
            $logContent = File::get($logPath);
            $logLines = array_reverse(explode("\n", $logContent));
            
            // Prendre les 50 dernières lignes de logs système
            $logs = array_slice(array_filter($logLines), 0, 50);
        }
        
        return $logs;
    }
    
    private function getRecentLogins()
    {
        // Simulation des connexions récentes (tu peux implémenter un vrai système plus tard)
        return \App\Models\User::where('updated_at', '>=', now()->subDays(7))->count();
    }
    
    private function countSystemErrors($logs)
    {
        return collect($logs)->filter(function($line) {
            return strpos($line, 'ERROR') !== false;
        })->count();
    }
}

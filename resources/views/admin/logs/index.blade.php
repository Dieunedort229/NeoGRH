<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center animate__animated animate__fadeInDown">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center">
                <i class="fas fa-shield-alt mr-3 text-red-600"></i>
                {{ __('Logs Système') }} - SuperAdmin Only
            </h2>
            <div class="bg-red-100 text-red-800 px-3 py-1 rounded-full text-sm font-medium">
                <i class="fas fa-eye-slash mr-1"></i>
                Mode Invisible
            </div>
        </div>
    </x-slot>

    <div class="min-h-screen bg-gradient-to-br from-red-50 via-gray-50 to-red-50">
        <div class="container mx-auto px-4 py-8">
            
            <!-- Statistiques système -->
            <div class="grid grid-cols-1 md:grid-cols-5 gap-6 mb-8">
                <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Actions Total</p>
                            <p class="text-3xl font-bold text-blue-600">{{ $stats['total_activities'] }}</p>
                        </div>
                        <div class="p-3 bg-blue-100 rounded-lg">
                            <i class="fas fa-history text-blue-600 text-xl"></i>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Actions Aujourd'hui</p>
                            <p class="text-3xl font-bold text-green-600">{{ $stats['activities_today'] }}</p>
                        </div>
                        <div class="p-3 bg-green-100 rounded-lg">
                            <i class="fas fa-calendar-day text-green-600 text-xl"></i>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Utilisateurs Actifs (7j)</p>
                            <p class="text-3xl font-bold text-purple-600">{{ $stats['unique_users_active'] }}</p>
                        </div>
                        <div class="p-3 bg-purple-100 rounded-lg">
                            <i class="fas fa-users text-purple-600 text-xl"></i>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Erreurs Système</p>
                            <p class="text-3xl font-bold text-red-600">{{ $stats['system_errors'] }}</p>
                        </div>
                        <div class="p-3 bg-red-100 rounded-lg">
                            <i class="fas fa-exclamation-triangle text-red-600 text-xl"></i>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Dernière Connexion</p>
                            <p class="text-sm font-bold text-indigo-600">
                                @if($stats['last_login'])
                                    {{ $stats['last_login']->performed_at->diffForHumans() }}
                                @else
                                    Aucune
                                @endif
                            </p>
                        </div>
                        <div class="p-3 bg-indigo-100 rounded-lg">
                            <i class="fas fa-sign-in-alt text-indigo-600 text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Traçabilité des Actions Utilisateurs -->
            <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden mb-8">
                <div class="bg-gradient-to-r from-blue-600 to-blue-800 p-6">
                    <h3 class="text-xl font-semibold text-white flex items-center">
                        <i class="fas fa-user-shield mr-3"></i>
                        Traçabilité des Actions Utilisateurs (100 dernières)
                    </h3>
                    <p class="text-blue-100 text-sm mt-1">Qui a fait quoi, quand et comment</p>
                </div>
                
                <div class="p-6">
                    @if($activityLogs->isEmpty())
                        <div class="text-center py-12">
                            <i class="fas fa-history text-6xl text-gray-300 mb-4"></i>
                            <p class="text-xl text-gray-500">Aucune activité enregistrée</p>
                            <p class="text-gray-400 mt-2">Les actions des utilisateurs apparaîtront ici</p>
                        </div>
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Utilisateur</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Action</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Description</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Moment</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">IP</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($activityLogs as $log)
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="h-8 w-8 rounded-full 
                                                        @if($log->user_role === 'SuperAdmin') bg-red-500
                                                        @elseif($log->user_role === 'Admin') bg-green-500
                                                        @elseif($log->user_role === 'Editeur') bg-blue-500
                                                        @else bg-purple-500
                                                        @endif
                                                        flex items-center justify-center">
                                                        <span class="text-xs font-medium text-white">
                                                            {{ substr($log->user_name, 0, 2) }}
                                                        </span>
                                                    </div>
                                                    <div class="ml-3">
                                                        <div class="text-sm font-medium text-gray-900">{{ $log->user_name }}</div>
                                                        <div class="text-xs text-gray-500">
                                                            <span class="
                                                                @if($log->user_role === 'SuperAdmin') text-red-600
                                                                @elseif($log->user_role === 'Admin') text-green-600
                                                                @elseif($log->user_role === 'Editeur') text-blue-600
                                                                @else text-purple-600
                                                                @endif
                                                                font-medium">
                                                                {{ $log->user_role }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                                    @if(str_contains($log->action, 'create')) bg-green-100 text-green-800
                                                    @elseif(str_contains($log->action, 'update')) bg-blue-100 text-blue-800
                                                    @elseif(str_contains($log->action, 'delete')) bg-red-100 text-red-800
                                                    @elseif(str_contains($log->action, 'login')) bg-yellow-100 text-yellow-800
                                                    @else bg-gray-100 text-gray-800
                                                    @endif">
                                                    {{ $log->action }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-900">
                                                {{ $log->description }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <div>{{ $log->performed_at->format('d/m/Y H:i:s') }}</div>
                                                <div class="text-xs text-gray-400">{{ $log->performed_at->diffForHumans() }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $log->ip_address }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
            <!-- Logs Système Laravel (Erreurs techniques) -->
            <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="bg-gradient-to-r from-gray-800 to-gray-900 p-6">
                    <h3 class="text-xl font-semibold text-white flex items-center">
                        <i class="fas fa-terminal mr-3"></i>
                        Logs Système Laravel (50 dernières entrées)
                    </h3>
                    <p class="text-gray-300 text-sm mt-1">Erreurs techniques et logs de débogage</p>
                </div>
                
                <div class="p-6">
                    @if(empty($systemLogs))
                        <div class="text-center py-12">
                            <i class="fas fa-file-alt text-6xl text-gray-300 mb-4"></i>
                            <p class="text-xl text-gray-500">Aucun log système disponible</p>
                            <p class="text-gray-400 mt-2">Le fichier de log n'existe pas encore</p>
                        </div>
                    @else
                        <div class="bg-black rounded-lg p-4 font-mono text-sm max-h-96 overflow-y-auto">
                            @foreach($systemLogs as $log)
                                @if(!empty(trim($log)))
                                    <div class="mb-1 {{ strpos($log, 'ERROR') !== false ? 'text-red-400' : (strpos($log, 'WARNING') !== false ? 'text-yellow-400' : 'text-green-400') }}">
                                        {{ $log }}
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        
                        <div class="mt-4 text-center">
                            <button onclick="location.reload()" 
                                    class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-6 py-2 rounded-lg hover:from-blue-600 hover:to-indigo-700 transition-all">
                                <i class="fas fa-sync-alt mr-2"></i>
                                Actualiser les Logs
                            </button>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Avertissement SuperAdmin -->
            <div class="mt-8 bg-red-50 border border-red-200 rounded-xl p-6">
                <div class="flex items-start">
                    <i class="fas fa-shield-alt text-red-600 mr-4 mt-1"></i>
                    <div>
                        <h4 class="font-semibold text-red-900">Mode SuperAdmin Invisible</h4>
                        <p class="text-red-700 mt-1">
                            Cette interface n'est visible que par les SuperAdmins. Vos actions ici ne sont pas tracées 
                            dans les logs normaux du système. Utilisez ces privilèges avec responsabilité.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
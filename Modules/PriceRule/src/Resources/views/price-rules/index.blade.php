@extends('pricerule::layouts.app')

@section('title', 'Price Rules')
@section('page-title', 'Price Rules')

@section('content')
<div class="min-h-screen bg-gray-50/80 py-6 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">

        {{-- ============================================================ --}}
        {{-- PAGE HEADER --}}
        {{-- ============================================================ --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
            <div>
                <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 tracking-tight">
                    Price Rules
                </h1>
                <p class="mt-1 text-sm text-gray-500">
                    Manage your discounts, promotions and pricing strategies.
                </p>
            </div>

            <a href="{{ route('admin.price-rules.create') }}"
               class="inline-flex items-center gap-2 px-5 py-2.5 text-sm font-medium text-white bg-indigo-600 rounded-full hover:bg-indigo-700 transition shadow-sm shadow-indigo-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Create Rule
            </a>
        </div>

        {{-- ============================================================ --}}
        {{-- STATS CARDS --}}
        {{-- ============================================================ --}}
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8">

            {{-- Total Rules --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5 relative overflow-hidden group hover:shadow-md transition">
                <div class="absolute -right-3 -top-3 w-16 h-16 rounded-full bg-indigo-50 group-hover:bg-indigo-100 transition"></div>
                <div class="relative">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-10 h-10 rounded-xl bg-indigo-100 flex items-center justify-center">
                            <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                            </svg>
                        </div>
                    </div>
                    <p class="text-xs font-medium text-gray-500 uppercase tracking-wider">Total Rules</p>
                    <h3 class="text-2xl sm:text-3xl font-bold text-gray-900 mt-1">
                        {{ $rules->total() }}
                    </h3>
                </div>
            </div>

            {{-- Active --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5 relative overflow-hidden group hover:shadow-md transition">
                <div class="absolute -right-3 -top-3 w-16 h-16 rounded-full bg-green-50 group-hover:bg-green-100 transition"></div>
                <div class="relative">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-10 h-10 rounded-xl bg-green-100 flex items-center justify-center">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <span class="relative flex h-2.5 w-2.5">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-green-500"></span>
                        </span>
                    </div>
                    <p class="text-xs font-medium text-gray-500 uppercase tracking-wider">Active</p>
                    <h3 class="text-2xl sm:text-3xl font-bold text-green-600 mt-1">
                        {{ $rules->where('status', 'active')->count() }}
                    </h3>
                </div>
            </div>

            {{-- Scheduled --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5 relative overflow-hidden group hover:shadow-md transition">
                <div class="absolute -right-3 -top-3 w-16 h-16 rounded-full bg-amber-50 group-hover:bg-amber-100 transition"></div>
                <div class="relative">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-10 h-10 rounded-xl bg-amber-100 flex items-center justify-center">
                            <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                    </div>
                    <p class="text-xs font-medium text-gray-500 uppercase tracking-wider">Scheduled</p>
                    <h3 class="text-2xl sm:text-3xl font-bold text-amber-500 mt-1">
                        {{ $rules->where('status', 'scheduled')->count() }}
                    </h3>
                </div>
            </div>

            {{-- Expired --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5 relative overflow-hidden group hover:shadow-md transition">
                <div class="absolute -right-3 -top-3 w-16 h-16 rounded-full bg-red-50 group-hover:bg-red-100 transition"></div>
                <div class="relative">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-10 h-10 rounded-xl bg-red-100 flex items-center justify-center">
                            <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/>
                            </svg>
                        </div>
                    </div>
                    <p class="text-xs font-medium text-gray-500 uppercase tracking-wider">Expired</p>
                    <h3 class="text-2xl sm:text-3xl font-bold text-red-500 mt-1">
                        {{ $rules->where('status', 'expired')->count() }}
                    </h3>
                </div>
            </div>

        </div>

        {{-- ============================================================ --}}
        {{-- FILTERS --}}
        {{-- ============================================================ --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 mb-6" x-data="{ open: {{ request()->hasAny(['search', 'status', 'rule_type_id']) ? 'true' : 'false' }} }">

            <button type="button" @click="open = !open"
                    class="w-full flex items-center justify-between p-5 hover:bg-gray-50/50 transition rounded-2xl">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-lg bg-gray-100 flex items-center justify-center">
                        <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                        </svg>
                    </div>
                    <span class="text-sm font-semibold text-gray-900">Filters</span>

                    @if(request()->hasAny(['search', 'status', 'rule_type_id']))
                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-indigo-100 text-indigo-700">
                            ACTIVE
                        </span>
                    @endif
                </div>
                <svg class="w-5 h-5 text-gray-400 transition-transform" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </button>

            <div x-show="open" x-collapse>
                <div class="px-5 pb-5 border-t border-gray-100">
                    <form method="GET" action="{{ route('admin.price-rules.index') }}" class="pt-4">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">

                            {{-- Search --}}
                            <div>
                                <label class="block text-xs font-medium text-gray-600 mb-1.5">Search</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                        </svg>
                                    </div>
                                    <input type="text" name="search" value="{{ request('search') }}"
                                           placeholder="Search by name or slug..."
                                           class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-gray-300 text-sm focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 transition">
                                </div>
                            </div>

                            {{-- Status --}}
                            <div>
                                <label class="block text-xs font-medium text-gray-600 mb-1.5">Status</label>
                                <select name="status"
                                        class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-sm focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 transition">
                                    <option value="">All Status</option>
                                    @foreach(['draft' => '📝 Draft', 'scheduled' => '📅 Scheduled', 'active' => '✅ Active', 'expired' => '⏰ Expired'] as $value => $label)
                                        <option value="{{ $value }}" @selected(request('status') == $value)>
                                            {{ $label }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Rule Type --}}
                            <div>
                                <label class="block text-xs font-medium text-gray-600 mb-1.5">Rule Type</label>
                                <select name="rule_type_id"
                                        class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-sm focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 transition">
                                    <option value="">All Types</option>
                                    @foreach($ruleTypes as $type)
                                        <option value="{{ $type->id }}" @selected(request('rule_type_id') == $type->id)>
                                            {{ $type->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Buttons --}}
                            <div class="flex items-end gap-2">
                                <button type="submit"
                                        class="flex-1 inline-flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-medium text-white bg-indigo-600 rounded-xl hover:bg-indigo-700 transition shadow-sm">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                                    </svg>
                                    Apply
                                </button>

                                <a href="{{ route('admin.price-rules.index') }}"
                                   class="inline-flex items-center justify-center px-4 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-xl hover:bg-gray-50 transition">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                    </svg>
                                </a>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

        </div>

        {{-- ============================================================ --}}
        {{-- RULES TABLE --}}
        {{-- ============================================================ --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

            {{-- Table Header --}}
            <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
                <div class="flex items-center gap-3">
                    <h2 class="text-sm font-semibold text-gray-900">All Rules</h2>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-600">
                        {{ $rules->total() }} total
                    </span>
                </div>

                {{-- View Toggle (optional aesthetic) --}}
                <div class="hidden sm:flex items-center gap-1 bg-gray-100 rounded-lg p-0.5">
                    <button class="p-1.5 rounded-md bg-white shadow-sm text-gray-700" title="Table View">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
                        </svg>
                    </button>
                    <button class="p-1.5 rounded-md text-gray-400 hover:text-gray-600" title="Grid View">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                        </svg>
                    </button>
                </div>
            </div>

            {{-- Table --}}
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-50/80">
                            <th class="text-left px-6 py-3.5 text-[11px] font-semibold text-gray-500 uppercase tracking-wider">
                                Rule
                            </th>
                            <th class="text-left px-6 py-3.5 text-[11px] font-semibold text-gray-500 uppercase tracking-wider">
                                Type
                            </th>
                            <th class="text-left px-6 py-3.5 text-[11px] font-semibold text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th class="text-left px-6 py-3.5 text-[11px] font-semibold text-gray-500 uppercase tracking-wider">
                                Priority
                            </th>
                            <th class="text-left px-6 py-3.5 text-[11px] font-semibold text-gray-500 uppercase tracking-wider">
                                Duration
                            </th>
                            <th class="text-right px-6 py-3.5 text-[11px] font-semibold text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100">

                        @forelse($rules as $rule)
                            <tr class="group hover:bg-indigo-50/30 transition">

                                {{-- Rule Name + Slug --}}
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        {{-- Rule Avatar --}}
                                        <div class="w-9 h-9 rounded-lg flex items-center justify-center text-sm font-bold
                                            @switch($rule->status)
                                                @case('active')    bg-green-100 text-green-700 @break
                                                @case('scheduled') bg-amber-100 text-amber-700 @break
                                                @case('expired')   bg-red-100 text-red-700 @break
                                                @default           bg-gray-100 text-gray-600
                                            @endswitch
                                        ">
                                            {{ strtoupper(substr($rule->name, 0, 2)) }}
                                        </div>
                                        <div>
                                            <a href="{{ route('admin.price-rules.show', $rule) }}"
                                               class="font-semibold text-gray-900 hover:text-indigo-600 transition text-sm">
                                                {{ $rule->name }}
                                            </a>
                                            <p class="text-xs text-gray-400 mt-0.5 font-mono">
                                                {{ $rule->slug }}
                                            </p>
                                        </div>
                                    </div>
                                </td>

                                {{-- Type --}}
                                <td class="px-6 py-4">
                                    @if($rule->type?->name)
                                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg bg-indigo-50 text-indigo-700 text-xs font-medium">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                            </svg>
                                            {{ $rule->type->name }}
                                        </span>
                                    @else
                                        <span class="text-xs text-gray-400">—</span>
                                    @endif
                                </td>

                                {{-- Status --}}
                                <td class="px-6 py-4">
                                    @php
                                        $statusConfig = match($rule->status) {
                                            'active'    => ['class' => 'bg-green-100 text-green-700 ring-green-600/20', 'dot' => 'bg-green-500', 'icon' => '✓'],
                                            'scheduled' => ['class' => 'bg-amber-100 text-amber-700 ring-amber-600/20', 'dot' => 'bg-amber-500', 'icon' => '◷'],
                                            'expired'   => ['class' => 'bg-red-100 text-red-700 ring-red-600/20',       'dot' => 'bg-red-500',   'icon' => '✕'],
                                            default     => ['class' => 'bg-gray-100 text-gray-600 ring-gray-500/20',    'dot' => 'bg-gray-400',  'icon' => '●'],
                                        };
                                    @endphp
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium ring-1 ring-inset {{ $statusConfig['class'] }}">
                                        <span class="w-1.5 h-1.5 rounded-full {{ $statusConfig['dot'] }}"></span>
                                        {{ ucfirst($rule->status) }}
                                    </span>
                                </td>

                                {{-- Priority --}}
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <span class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-gray-100 text-sm font-bold text-gray-700">
                                            {{ $rule->priority }}
                                        </span>
                                    </div>
                                </td>

                                {{-- Duration --}}
                                <td class="px-6 py-4">
                                    <div class="space-y-1">
                                        <div class="flex items-center gap-1.5 text-xs text-gray-500">
                                            <svg class="w-3.5 h-3.5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                            {{ $rule->starts_at?->format('d M Y') ?? '—' }}
                                        </div>
                                        <div class="flex items-center gap-1.5 text-xs text-gray-500">
                                            <svg class="w-3.5 h-3.5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                            {{ $rule->ends_at?->format('d M Y') ?? '—' }}
                                        </div>
                                    </div>
                                </td>

                                {{-- Actions --}}
                                <td class="px-6 py-4">
                                    <div class="flex justify-end items-center gap-1 group-hover:opacity-100 transition">

                                        {{-- View --}}
                                        <a href="{{ route('admin.price-rules.show', $rule) }}"
                                           class="p-2 rounded-lg text-gray-400 hover:text-blue-600 hover:bg-blue-50 transition"
                                           title="View">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                            </svg>
                                        </a>

                                        {{-- Edit --}}
                                        <a href="{{ route('admin.price-rules.edit', $rule) }}"
                                           class="p-2 rounded-lg text-gray-400 hover:text-amber-600 hover:bg-amber-50 transition"
                                           title="Edit">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                            </svg>
                                        </a>

                                        {{-- Duplicate --}}
                                        <a href="{{ route('admin.price-rules.show', $rule) }}?action=duplicate"
                                           class="p-2 rounded-lg text-gray-400 hover:text-indigo-600 hover:bg-indigo-50 transition"
                                           title="Duplicate">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                            </svg>
                                        </a>

                                        {{-- Delete --}}
                                        <form method="POST" action="{{ route('admin.price-rules.destroy', $rule) }}" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    onclick="return confirm('Are you sure you want to delete this rule?')"
                                                    class="p-2 rounded-lg text-gray-400 hover:text-red-600 hover:bg-red-50 transition"
                                                    title="Delete">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>

                            </tr>
                        @empty

                            {{-- Empty State --}}
                            <tr>
                                <td colspan="6" class="px-6 py-20">
                                    <div class="text-center">
                                        <div class="mx-auto w-16 h-16 rounded-2xl bg-indigo-100 flex items-center justify-center mb-4">
                                            <svg class="w-8 h-8 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                            </svg>
                                        </div>
                                        <h3 class="text-base font-semibold text-gray-900 mb-1">
                                            No Price Rules Found
                                        </h3>
                                        <p class="text-sm text-gray-500 mb-5 max-w-sm mx-auto">
                                            Get started by creating your first pricing rule to offer discounts, promotions, and special offers.
                                        </p>
                                        <a href="{{ route('admin.price-rules.create') }}"
                                           class="inline-flex items-center gap-2 px-5 py-2.5 text-sm font-medium text-white bg-indigo-600 rounded-xl hover:bg-indigo-700 transition shadow-sm shadow-indigo-200">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                            </svg>
                                            Create First Rule
                                        </a>
                                    </div>
                                </td>
                            </tr>

                        @endforelse

                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            @if(method_exists($rules, 'links') && $rules->hasPages())
                <div class="border-t border-gray-100 px-6 py-4">
                    <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                        <p class="text-sm text-gray-500">
                            Showing
                            <span class="font-semibold text-gray-700">{{ $rules->firstItem() }}</span>
                            to
                            <span class="font-semibold text-gray-700">{{ $rules->lastItem() }}</span>
                            of
                            <span class="font-semibold text-gray-700">{{ $rules->total() }}</span>
                            results
                        </p>
                        <div>
                            {{ $rules->links() }}
                        </div>
                    </div>
                </div>
            @endif

        </div>

    </div>
</div>
@endsection
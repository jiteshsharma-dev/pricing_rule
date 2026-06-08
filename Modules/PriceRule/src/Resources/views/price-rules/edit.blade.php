{{-- resources/views/pricerule/edit.blade.php --}}
@extends('pricerule::layouts.app')

@section('title', 'Edit: ' . $priceRule->name)
@section('page-title', 'Edit Price Rule')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 via-slate-50 to-indigo-50/30 py-6 px-4 sm:px-6 lg:px-8">

    {{-- ============================================================ --}}
    {{-- PAGE HEADER --}}
    {{-- ============================================================ --}}
    <div class="max-w-7xl mx-auto mb-8">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <div class="flex items-center gap-3 mb-1">
                    <div class="w-10 h-10 rounded-2xl bg-gradient-to-br from-amber-500 to-orange-600 flex items-center justify-center shadow-lg shadow-amber-200">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 tracking-tight">
                            Edit Price Rule
                        </h1>
                        <p class="text-sm text-gray-500">
                            Editing: <strong class="text-gray-700">{{ $priceRule->name }}</strong>
                        </p>
                    </div>
                </div>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('admin.price-rules.show', $priceRule) }}"
                   class="inline-flex items-center gap-2 px-5 py-2.5 text-sm font-medium rounded-full shadow-sm transition-all duration-200
                          text-gray-700 bg-white border border-gray-200 hover:bg-gray-50 hover:border-gray-300 hover:shadow-md">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                    View
                </a>

                <a href="{{ route('admin.price-rules.index') }}"
                   class="inline-flex items-center gap-2 px-5 py-2.5 text-sm font-medium rounded-full shadow-sm transition-all duration-200
                          text-gray-700 bg-white border border-gray-200 hover:bg-gray-50 hover:border-gray-300 hover:shadow-md">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Back
                </a>

                <button type="button" onclick="document.getElementById('priceRuleForm').submit()"
                        class="inline-flex items-center gap-2 px-5 py-2.5 text-sm font-medium text-white bg-gradient-to-r from-indigo-600 to-indigo-700 rounded-full hover:from-indigo-700 hover:to-indigo-800 transition-all duration-200 shadow-lg shadow-indigo-200 hover:shadow-xl hover:shadow-indigo-300">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Update Rule
                </button>
            </div>
        </div>
    </div>

    {{-- ============================================================ --}}
    {{-- VALIDATION ERRORS --}}
    {{-- ============================================================ --}}
    @if($errors->any())
        <div class="max-w-7xl mx-auto mb-6">
            <div class="bg-red-50 border border-red-200 rounded-2xl p-4 shadow-sm">
                <div class="flex items-start gap-3">
                    <div class="flex-shrink-0 w-8 h-8 rounded-xl bg-red-100 flex items-center justify-center">
                        <svg class="w-4 h-4 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-semibold text-red-800">Please fix the following errors:</h3>
                        <ul class="mt-2 text-sm text-red-700 list-disc list-inside space-y-1">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- ============================================================ --}}
    {{-- SUCCESS MESSAGE --}}
    {{-- ============================================================ --}}
    @if(session('success'))
        <div class="max-w-7xl mx-auto mb-6">
            <div class="bg-green-50 border border-green-200 rounded-2xl p-4 shadow-sm">
                <div class="flex items-center gap-3">
                    <div class="flex-shrink-0 w-8 h-8 rounded-xl bg-green-100 flex items-center justify-center">
                        <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
                </div>
            </div>
        </div>
    @endif

    {{-- ============================================================ --}}
    {{-- MAIN FORM --}}
    {{-- ============================================================ --}}
    <form action="{{ route('admin.price-rules.update', $priceRule) }}" method="POST" id="priceRuleForm">
        @csrf
        @method('PUT')

        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                {{-- ====================================================== --}}
                {{-- LEFT COLUMN — Form Sections --}}
                {{-- ====================================================== --}}
                <div class="lg:col-span-2 space-y-6">

                    {{-- ─────────────────────────────────────────────── --}}
                    {{-- RULE DETAILS --}}
                    {{-- ─────────────────────────────────────────────── --}}
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition-shadow duration-300">
                        <h2 class="text-base font-semibold text-gray-900 mb-5 flex items-center gap-2">
                            <div class="w-7 h-7 rounded-lg bg-indigo-100 flex items-center justify-center">
                                <svg class="w-3.5 h-3.5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            Rule Details
                        </h2>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">

                            {{-- Rule Type --}}
                            <div>
                                <label for="rule_type_id" class="block text-sm font-medium text-gray-700 mb-1.5">
                                    Rule Type <span class="text-red-500">*</span>
                                </label>
                                <select name="rule_type_id" id="rule_type_id"
                                        class="w-full rounded-xl border border-gray-200 bg-gray-50/50 text-gray-900 px-4 py-3 text-sm shadow-sm focus:bg-white focus:border-indigo-400 focus:ring-4 focus:ring-indigo-500/10 transition-all duration-200 @error('rule_type_id') border-red-400 ring-2 ring-red-100 @enderror">
                                    <option value="">Select Rule Type</option>
                                    @foreach($ruleTypes as $ruleType)
                                        <option value="{{ $ruleType->id }}" @selected(old('rule_type_id', $priceRule->rule_type_id) == $ruleType->id)>
                                            {{ $ruleType->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('rule_type_id')
                                    <p class="mt-1.5 text-xs text-red-600 flex items-center gap-1">
                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            {{-- Name --}}
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-1.5">
                                    Promotion Name <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="name" id="name" value="{{ old('name', $priceRule->name) }}"
                                       placeholder="e.g. Diwali Mega Sale"
                                       class="w-full rounded-xl border border-gray-200 bg-gray-50/50 text-gray-900 placeholder-gray-400 px-4 py-3 text-sm shadow-sm focus:bg-white focus:border-indigo-400 focus:ring-4 focus:ring-indigo-500/10 transition-all duration-200 @error('name') border-red-400 ring-2 ring-red-100 @enderror">
                                @error('name')
                                    <p class="mt-1.5 text-xs text-red-600 flex items-center gap-1">
                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            {{-- Slug --}}
                            <div>
                                <label for="slug" class="block text-sm font-medium text-gray-700 mb-1.5">
                                    Slug <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="slug" id="slug" value="{{ old('slug', $priceRule->slug) }}"
                                       placeholder="diwali-mega-sale"
                                       class="w-full rounded-xl border border-gray-200 bg-gray-50/50 text-gray-900 placeholder-gray-400 px-4 py-3 text-sm shadow-sm font-mono focus:bg-white focus:border-indigo-400 focus:ring-4 focus:ring-indigo-500/10 transition-all duration-200 @error('slug') border-red-400 ring-2 ring-red-100 @enderror">
                                @error('slug')
                                    <p class="mt-1.5 text-xs text-red-600 flex items-center gap-1">
                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            {{-- Status --}}
                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700 mb-1.5">
                                    Status <span class="text-red-500">*</span>
                                </label>
                                <select name="status" id="status"
                                        class="w-full rounded-xl border border-gray-200 bg-gray-50/50 text-gray-900 px-4 py-3 text-sm shadow-sm focus:bg-white focus:border-indigo-400 focus:ring-4 focus:ring-indigo-500/10 transition-all duration-200 @error('status') border-red-400 ring-2 ring-red-100 @enderror">
                                    @foreach(['draft' => '📝 Draft', 'scheduled' => '📅 Scheduled', 'active' => '✅ Active', 'expired' => '⏰ Expired'] as $value => $label)
                                        <option value="{{ $value }}" @selected(old('status', $priceRule->status) === $value)>{{ $label }}</option>
                                    @endforeach
                                </select>
                                @error('status')
                                    <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Starts At --}}
                            <div>
                                <label for="starts_at" class="block text-sm font-medium text-gray-700 mb-1.5">Start Date</label>
                                <input type="datetime-local" name="starts_at" id="starts_at"
                                       value="{{ old('starts_at', $priceRule->starts_at ? $priceRule->starts_at->format('Y-m-d\TH:i') : '') }}"
                                       class="w-full rounded-xl border border-gray-200 bg-gray-50/50 text-gray-900 px-4 py-3 text-sm shadow-sm focus:bg-white focus:border-indigo-400 focus:ring-4 focus:ring-indigo-500/10 transition-all duration-200 @error('starts_at') border-red-400 ring-2 ring-red-100 @enderror">
                                @error('starts_at')
                                    <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Ends At --}}
                            <div>
                                <label for="ends_at" class="block text-sm font-medium text-gray-700 mb-1.5">End Date</label>
                                <input type="datetime-local" name="ends_at" id="ends_at"
                                       value="{{ old('ends_at', $priceRule->ends_at ? $priceRule->ends_at->format('Y-m-d\TH:i') : '') }}"
                                       class="w-full rounded-xl border border-gray-200 bg-gray-50/50 text-gray-900 px-4 py-3 text-sm shadow-sm focus:bg-white focus:border-indigo-400 focus:ring-4 focus:ring-indigo-500/10 transition-all duration-200 @error('ends_at') border-red-400 ring-2 ring-red-100 @enderror">
                                @error('ends_at')
                                    <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Description --}}
                            <div class="sm:col-span-2">
                                <label for="description" class="block text-sm font-medium text-gray-700 mb-1.5">Description</label>
                                <textarea name="description" id="description" rows="3"
                                          placeholder="Short description about this rule..."
                                          class="w-full rounded-xl border border-gray-200 bg-gray-50/50 text-gray-900 placeholder-gray-400 px-4 py-3 text-sm shadow-sm focus:bg-white focus:border-indigo-400 focus:ring-4 focus:ring-indigo-500/10 transition-all duration-200 resize-none @error('description') border-red-400 ring-2 ring-red-100 @enderror">{{ old('description', $priceRule->description) }}</textarea>
                                @error('description')
                                    <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- ─────────────────────────────────────────────── --}}
                    {{-- ADVANCED SETTINGS --}}
                    {{-- ─────────────────────────────────────────────── --}}
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition-shadow duration-300">
                        <h2 class="text-base font-semibold text-gray-900 mb-5 flex items-center gap-2">
                            <div class="w-7 h-7 rounded-lg bg-violet-100 flex items-center justify-center">
                                <svg class="w-3.5 h-3.5 text-violet-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            Advanced Settings
                        </h2>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            {{-- Priority --}}
                            <div>
                                <label for="priority" class="block text-sm font-medium text-gray-700 mb-1.5">
                                    Priority <span class="text-red-500">*</span>
                                </label>
                                <input type="number" name="priority" id="priority"
                                       value="{{ old('priority', $priceRule->priority) }}" min="0" max="65535"
                                       class="w-full rounded-xl border border-gray-200 bg-gray-50/50 text-gray-900 px-4 py-3 text-sm shadow-sm focus:bg-white focus:border-indigo-400 focus:ring-4 focus:ring-indigo-500/10 transition-all duration-200 @error('priority') border-red-400 ring-2 ring-red-100 @enderror">
                                <p class="mt-1.5 text-xs text-gray-400 flex items-center gap-1">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    Lower number = higher priority
                                </p>
                                @error('priority')
                                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Condition Match --}}
                            <div>
                                <label for="condition_match" class="block text-sm font-medium text-gray-700 mb-1.5">
                                    Condition Match <span class="text-red-500">*</span>
                                </label>
                                <select name="condition_match" id="condition_match"
                                        class="w-full rounded-xl border border-gray-200 bg-gray-50/50 text-gray-900 px-4 py-3 text-sm shadow-sm focus:bg-white focus:border-indigo-400 focus:ring-4 focus:ring-indigo-500/10 transition-all duration-200 @error('condition_match') border-red-400 ring-2 ring-red-100 @enderror">
                                    <option value="all" @selected(old('condition_match', $priceRule->condition_match) === 'all')>Match All Conditions (AND)</option>
                                    <option value="any" @selected(old('condition_match', $priceRule->condition_match) === 'any')>Match Any Condition (OR)</option>
                                </select>
                                @error('condition_match')
                                    <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Toggle Switches --}}
                        <div class="mt-6 grid grid-cols-1 sm:grid-cols-3 gap-4">

                            {{-- Stop Further Rules --}}
                            <div x-data="{ enabled: {{ old('stop_further_rules', $priceRule->stop_further_rules) ? 'true' : 'false' }} }"
                                 class="flex items-center justify-between gap-3 p-4 rounded-xl border-2 transition-all duration-200 cursor-pointer"
                                 :class="enabled ? 'border-red-200 bg-red-50/50' : 'border-gray-100 bg-gray-50/30 hover:border-gray-200'"
                                 @click="enabled = !enabled">
                                <input type="hidden" name="stop_further_rules" :value="enabled ? 1 : 0">
                                <div>
                                    <p class="text-sm font-semibold text-gray-900 flex items-center gap-1.5">
                                        <svg class="w-4 h-4" :class="enabled ? 'text-red-500' : 'text-gray-400'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/>
                                        </svg>
                                        Stop Further Rules
                                    </p>
                                    <p class="text-xs text-gray-500 mt-0.5">Block lower-priority rules</p>
                                </div>
                                <div class="relative flex-shrink-0 w-12 h-7 rounded-full transition-colors duration-300 shadow-inner"
                                     :class="enabled ? 'bg-red-500' : 'bg-gray-300'">
                                    <div class="absolute top-0.5 left-0.5 w-6 h-6 rounded-full bg-white shadow-md transition-transform duration-300 flex items-center justify-center"
                                         :class="enabled ? 'translate-x-5' : 'translate-x-0'">
                                        <svg x-show="enabled" class="w-3 h-3 text-red-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                    </div>
                                </div>
                            </div>

                            {{-- Is Combinable --}}
                            <div x-data="{ enabled: {{ old('is_combinable', $priceRule->is_combinable) ? 'true' : 'false' }} }"
                                 class="flex items-center justify-between gap-3 p-4 rounded-xl border-2 transition-all duration-200 cursor-pointer"
                                 :class="enabled ? 'border-green-200 bg-green-50/50' : 'border-gray-100 bg-gray-50/30 hover:border-gray-200'"
                                 @click="enabled = !enabled">
                                <input type="hidden" name="is_combinable" :value="enabled ? 1 : 0">
                                <div>
                                    <p class="text-sm font-semibold text-gray-900 flex items-center gap-1.5">
                                        <svg class="w-4 h-4" :class="enabled ? 'text-green-500' : 'text-gray-400'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>
                                        </svg>
                                        Is Combinable
                                    </p>
                                    <p class="text-xs text-gray-500 mt-0.5">Stack with other rules</p>
                                </div>
                                <div class="relative flex-shrink-0 w-12 h-7 rounded-full transition-colors duration-300 shadow-inner"
                                     :class="enabled ? 'bg-green-500' : 'bg-gray-300'">
                                    <div class="absolute top-0.5 left-0.5 w-6 h-6 rounded-full bg-white shadow-md transition-transform duration-300 flex items-center justify-center"
                                         :class="enabled ? 'translate-x-5' : 'translate-x-0'">
                                        <svg x-show="enabled" class="w-3 h-3 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                    </div>
                                </div>
                            </div>

                            {{-- Coupon Required --}}
                            <div x-data="{ enabled: {{ old('coupon_required', $priceRule->coupon_required) ? 'true' : 'false' }} }"
                                 class="flex items-center justify-between gap-3 p-4 rounded-xl border-2 transition-all duration-200 cursor-pointer"
                                 :class="enabled ? 'border-purple-200 bg-purple-50/50' : 'border-gray-100 bg-gray-50/30 hover:border-gray-200'"
                                 @click="enabled = !enabled">
                                <input type="hidden" name="coupon_required" :value="enabled ? 1 : 0">
                                <div>
                                    <p class="text-sm font-semibold text-gray-900 flex items-center gap-1.5">
                                        <svg class="w-4 h-4" :class="enabled ? 'text-purple-500' : 'text-gray-400'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/>
                                        </svg>
                                        Coupon Required
                                    </p>
                                    <p class="text-xs text-gray-500 mt-0.5">Needs coupon code</p>
                                </div>
                                <div class="relative flex-shrink-0 w-12 h-7 rounded-full transition-colors duration-300 shadow-inner"
                                     :class="enabled ? 'bg-purple-500' : 'bg-gray-300'">
                                    <div class="absolute top-0.5 left-0.5 w-6 h-6 rounded-full bg-white shadow-md transition-transform duration-300 flex items-center justify-center"
                                         :class="enabled ? 'translate-x-5' : 'translate-x-0'">
                                        <svg x-show="enabled" class="w-3 h-3 text-purple-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- ─────────────────────────────────────────────── --}}
                    {{-- COLLAPSIBLE SECTIONS --}}
                    {{-- ─────────────────────────────────────────────── --}}

                    @php
                    // Prepare existing data for each section
                    $existingConditions     = old('conditions', $priceRule->conditions ? $priceRule->conditions->map(fn($c) => ['field' => $c->field, 'operator' => $c->operator, 'value' => $c->value, 'sort_order' => $c->sort_order])->toArray() : []);
                    $existingActions        = old('actions', $priceRule->actions ? $priceRule->actions->map(fn($a) => ['action_type' => $a->action_type, 'configuration' => is_string($a->configuration) ? json_decode($a->configuration, true) : (is_array($a->configuration) ? $a->configuration : []), 'sort_order' => $a->sort_order])->toArray() : []);
                    $existingProducts       = old('products', $priceRule->products ? $priceRule->products->map(fn($p) => ['product_id' => $p->product_id, 'override_discount_value' => $p->override_discount_value])->toArray() : []);
                    $existingCategories     = old('categories', $priceRule->categories ? $priceRule->categories->map(fn($c) => ['category_id' => $c->category_id, 'include_subcategories' => $c->include_subcategories])->toArray() : []);
                    $existingCustomerGroups = old('customer_groups', $priceRule->customerGroups ? $priceRule->customerGroups->map(fn($g) => ['customer_group_id' => $g->customer_group_id])->toArray() : []);
                    $existingCoupons        = old('coupons', $priceRule->coupons ? $priceRule->coupons->map(fn($c) => ['code' => $c->code, 'type' => $c->type, 'usage_limit' => $c->usage_limit, 'is_active' => $c->is_active])->toArray() : []);
                    $existingSchedules      = old('schedules', $priceRule->schedules ? $priceRule->schedules->map(fn($s) => ['recurrence_type' => $s->recurrence_type, 'day_of_week' => $s->day_of_week, 'day_of_month' => $s->day_of_month, 'time_from' => $s->time_from, 'time_to' => $s->time_to])->toArray() : []);
                    $existingTargets        = old('targets', $priceRule->targets ? $priceRule->targets->map(fn($t) => ['target_type' => $t->target_type, 'target_id' => $t->target_id])->toArray() : []);

                    $sections = [
                        ['id' => 'conditions',      'key' => 'conditions',       'data' => $existingConditions,      'title' => 'Conditions',       'subtitle' => 'When should this rule apply?',   'icon_bg' => 'bg-amber-100',   'icon_color' => 'text-amber-600',   'icon' => 'M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4', 'btn' => 'addCondition()',     'btn_text' => 'Add Condition',  'required' => false],
                        ['id' => 'actions',         'key' => 'actions',          'data' => $existingActions,         'title' => 'Actions',          'subtitle' => 'What discount/action to apply?', 'icon_bg' => 'bg-green-100',   'icon_color' => 'text-green-600',   'icon' => 'M13 10V3L4 14h7v7l9-11h-7z',                                                                                                                      'btn' => 'addAction()',        'btn_text' => 'Add Action',     'required' => true],
                        ['id' => 'products',        'key' => 'products',         'data' => $existingProducts,        'title' => 'Products',         'subtitle' => 'Target specific products',        'icon_bg' => 'bg-blue-100',    'icon_color' => 'text-blue-600',    'icon' => 'M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4',                                                                               'btn' => 'addProduct()',       'btn_text' => 'Add Product',    'required' => false],
                        ['id' => 'categories',      'key' => 'categories',       'data' => $existingCategories,      'title' => 'Categories',       'subtitle' => 'Target specific categories',      'icon_bg' => 'bg-purple-100',  'icon_color' => 'text-purple-600',  'icon' => 'M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z',                  'btn' => 'addCategory()',      'btn_text' => 'Add Category',   'required' => false],
                        ['id' => 'customer-groups', 'key' => 'customer_groups',  'data' => $existingCustomerGroups,  'title' => 'Customer Groups',  'subtitle' => 'Restrict to specific segments',   'icon_bg' => 'bg-teal-100',    'icon_color' => 'text-teal-600',    'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z', 'btn' => 'addCustomerGroup()', 'btn_text' => 'Add Group',     'required' => false],
                        ['id' => 'coupons',         'key' => 'coupons',          'data' => $existingCoupons,         'title' => 'Coupons',          'subtitle' => 'Manage coupon codes',             'icon_bg' => 'bg-rose-100',    'icon_color' => 'text-rose-600',    'icon' => 'M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z',                                'btn' => 'addCoupon()',        'btn_text' => 'Add Coupon',     'required' => false],
                        ['id' => 'schedules',       'key' => 'schedules',        'data' => $existingSchedules,       'title' => 'Schedules',        'subtitle' => 'Set recurring time windows',      'icon_bg' => 'bg-cyan-100',    'icon_color' => 'text-cyan-600',    'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z',                                                                                                    'btn' => 'addSchedule()',      'btn_text' => 'Add Schedule',   'required' => false],
                        ['id' => 'targets',         'key' => 'targets',          'data' => $existingTargets,         'title' => 'Targets',          'subtitle' => 'Store / channel targeting',       'icon_bg' => 'bg-orange-100',  'icon_color' => 'text-orange-600',  'icon' => 'M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z',                                                             'btn' => 'addTarget()',        'btn_text' => 'Add Target',     'required' => false],
                    ];
                    @endphp

                    @foreach($sections as $sec)
                    @php
                        $isOpen = ($sec['id'] === 'actions') ? 'true' : (count($sec['data']) > 0 ? 'true' : 'false');
                    @endphp
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow duration-300"
                         x-data="{ open: {{ $isOpen }} }">

                        <button type="button" @click="open = !open"
                                class="w-full flex items-center justify-between px-6 py-4 hover:bg-gray-50/80 transition-all duration-200">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-xl {{ $sec['icon_bg'] }} flex items-center justify-center shadow-sm">
                                    <svg class="w-4 h-4 {{ $sec['icon_color'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $sec['icon'] }}"/>
                                    </svg>
                                </div>
                                <div class="text-left">
                                    <h3 class="text-sm font-semibold text-gray-900">
                                        {{ $sec['title'] }}
                                        @if($sec['required']) <span class="text-red-500">*</span> @endif
                                    </h3>
                                    <p class="text-xs text-gray-500">{{ $sec['subtitle'] }}</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="inline-flex items-center justify-center w-6 h-6 rounded-full text-[10px] font-bold {{ $sec['icon_bg'] }} {{ $sec['icon_color'] }}" id="{{ $sec['id'] }}-count">
                                    {{ count($sec['data']) }}
                                </span>
                                <svg class="w-5 h-5 text-gray-400 transition-transform duration-300" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </div>
                        </button>

                        <div x-show="open" x-collapse>
                            <div class="px-6 pb-6 border-t border-gray-100">
                                <div class="flex justify-end pt-4 mb-3">
                                    <button type="button" onclick="{{ $sec['btn'] }}"
                                            class="inline-flex items-center gap-1.5 px-4 py-2 text-xs font-semibold text-indigo-700 bg-indigo-50 rounded-lg hover:bg-indigo-100 transition-all duration-200 shadow-sm hover:shadow">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                        </svg>
                                        {{ $sec['btn_text'] }}
                                    </button>
                                </div>

                                <div id="{{ $sec['id'] }}-wrapper" class="space-y-3">
                                    {{-- Populated by JS on DOMContentLoaded --}}
                                </div>

                                <div id="{{ $sec['id'] }}-empty" class="{{ count($sec['data']) > 0 ? 'hidden' : '' }} text-center py-8 text-sm">
                                    <div class="w-12 h-12 rounded-2xl {{ $sec['icon_bg'] }}/50 flex items-center justify-center mx-auto mb-3">
                                        <svg class="w-5 h-5 {{ $sec['icon_color'] }}/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{ $sec['icon'] }}"/>
                                        </svg>
                                    </div>
                                    <p class="text-gray-400">No {{ strtolower($sec['title']) }} added yet.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    {{-- ─── BOTTOM ACTION BAR ─── --}}
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5">
                        <div class="flex items-center justify-between">


                            <div class="flex items-center gap-3">
                                <a href="{{ route('admin.price-rules.index') }}"
                                   class="px-5 py-2.5 text-sm font-medium rounded-xl transition-all duration-200
                                          text-gray-600 bg-gray-100 hover:bg-gray-200">
                                    Cancel
                                </a>
                                <button type="submit"
                                        class="px-6 py-2.5 text-sm font-semibold text-white bg-gradient-to-r from-indigo-600 to-indigo-700 rounded-xl hover:from-indigo-700 hover:to-indigo-800 transition-all duration-200 shadow-lg shadow-indigo-200 hover:shadow-xl">
                                    💾 Update Rule
                                </button>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- ====================================================== --}}
                {{-- RIGHT COLUMN — Live Preview Sidebar --}}
                {{-- ====================================================== --}}
                <div class="lg:col-span-1">
                    <div class="sticky top-6 space-y-6">

                        {{-- Live Preview Card --}}
                        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5 hover:shadow-md transition-shadow duration-300">
                            <h3 class="text-base font-semibold text-gray-900 mb-4 flex items-center gap-2">
                                <span class="relative flex h-2.5 w-2.5">
                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-green-500"></span>
                                </span>
                                Live Preview
                            </h3>

                            <div class="space-y-4">
                                <div class="border-l-[3px] border-amber-400 pl-3 py-1">
                                    <p class="text-[10px] font-bold text-amber-600 uppercase tracking-wider mb-1">When</p>
                                    <p class="text-sm text-gray-700" id="preview-conditions">Loading...</p>
                                </div>
                                <div class="border-l-[3px] border-green-400 pl-3 py-1">
                                    <p class="text-[10px] font-bold text-green-600 uppercase tracking-wider mb-1">Then</p>
                                    <p class="text-sm text-gray-700" id="preview-actions">Loading...</p>
                                </div>
                                <div class="border-l-[3px] border-indigo-400 pl-3 py-1">
                                    <p class="text-[10px] font-bold text-indigo-600 uppercase tracking-wider mb-1">Status</p>
                                    <span id="preview-status" class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-semibold bg-gray-100 text-gray-700">—</span>
                                </div>
                                <div class="border-l-[3px] border-cyan-400 pl-3 py-1">
                                    <p class="text-[10px] font-bold text-cyan-600 uppercase tracking-wider mb-1">Schedule</p>
                                    <p class="text-sm text-gray-700" id="preview-schedule">Loading...</p>
                                </div>
                                <div class="border-l-[3px] border-rose-400 pl-3 py-1">
                                    <p class="text-[10px] font-bold text-rose-600 uppercase tracking-wider mb-1">Coupon</p>
                                    <p class="text-sm text-gray-700" id="preview-coupon">Loading...</p>
                                </div>
                            </div>
                        </div>

                        {{-- Rule Meta Info --}}
                        <div class="bg-gradient-to-br from-gray-50 to-slate-100 rounded-2xl border border-gray-200 p-5">
                            <h4 class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-3">Rule Info</h4>
                            <div class="space-y-3">
                                <div class="flex items-center gap-2 text-xs text-gray-600">
                                    <svg class="w-3.5 h-3.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/></svg>
                                    ID: <strong class="text-gray-900">#{{ $priceRule->id }}</strong>
                                </div>
                                <div class="flex items-center gap-2 text-xs text-gray-600">
                                    <svg class="w-3.5 h-3.5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                    Created: <strong class="text-gray-800">{{ $priceRule->created_at ? $priceRule->created_at->format('d M Y, h:i A') : '—' }}</strong>
                                </div>
                                <div class="flex items-center gap-2 text-xs text-gray-600">
                                    <svg class="w-3.5 h-3.5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                                    Updated: <strong class="text-gray-800">{{ $priceRule->updated_at ? $priceRule->updated_at->format('d M Y, h:i A') : '—' }}</strong>
                                </div>
                                @if($priceRule->updated_at)
                                <div class="flex items-center gap-2 text-xs text-gray-500">
                                    <svg class="w-3.5 h-3.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    {{ $priceRule->updated_at->diffForHumans() }}
                                </div>
                                @endif
                            </div>
                        </div>

                        {{-- Help Card --}}
                        <div class="bg-gradient-to-br from-indigo-50 via-purple-50 to-pink-50 rounded-2xl border border-indigo-100/80 p-5 shadow-sm">
                            <h4 class="text-sm font-semibold text-indigo-900 mb-3 flex items-center gap-1.5">
                                💡 Edit Tips
                            </h4>
                            <ul class="space-y-2.5 text-xs text-indigo-700/90">
                                <li class="flex items-start gap-2">
                                    <span class="mt-1.5 w-1.5 h-1.5 rounded-full bg-indigo-400 flex-shrink-0"></span>
                                    <span>Changes are <strong class="text-indigo-800">not saved</strong> until you click <strong class="text-indigo-800">Update Rule</strong>.</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="mt-1.5 w-1.5 h-1.5 rounded-full bg-indigo-400 flex-shrink-0"></span>
                                    <span>Removing all actions will make the rule <strong class="text-indigo-800">ineffective</strong>.</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="mt-1.5 w-1.5 h-1.5 rounded-full bg-indigo-400 flex-shrink-0"></span>
                                    <span>Set status to <strong class="text-indigo-800">Draft</strong> to temporarily disable.</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="mt-1.5 w-1.5 h-1.5 rounded-full bg-red-400 flex-shrink-0"></span>
                                    <span><strong class="text-red-700">Delete</strong> is permanent and cannot be undone.</span>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </form>
</div>
@endsection

@push('scripts')
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<script>
    // ─── Existing data from server (JSON) ──────────────────────
    var existingConditions     = @json($existingConditions);
    var existingActions        = @json($existingActions);
    var existingProducts       = @json($existingProducts);
    var existingCategories     = @json($existingCategories);
    var existingCustomerGroups = @json($existingCustomerGroups);
    var existingCoupons        = @json($existingCoupons);
    var existingSchedules      = @json($existingSchedules);
    var existingTargets        = @json($existingTargets);

    // ─── Shared CSS ────────────────────────────────────────────
    var inputCls  = 'w-full rounded-xl border border-gray-200 bg-gray-50/50 text-gray-900 placeholder-gray-400 px-4 py-3 text-sm shadow-sm focus:bg-white focus:border-indigo-400 focus:ring-4 focus:ring-indigo-500/10 transition-all duration-200';
    var rowCls    = 'group flex flex-wrap items-center gap-3 p-4 rounded-xl bg-gradient-to-r from-gray-50 to-slate-50 border border-gray-100 hover:border-gray-200 transition-all duration-200';
    var deleteSvg = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>';

    function makeDeleteBtn(rc, sec) {
        return '<button type="button" onclick="removeRow(this,\'' + rc + '\',\'' + sec + '\')" class="p-2.5 text-gray-300 hover:text-red-500 hover:bg-red-50 rounded-xl transition-all duration-200">' + deleteSvg + '</button>';
    }

    // ─── Counters ──────────────────────────────────────────────
    var conditionIndex = 0, actionIndex = 0, productIndex = 0, categoryIndex = 0;
    var customerGroupIndex = 0, couponIndex = 0, scheduleIndex = 0, targetIndex = 0;

    // ─── Helpers ───────────────────────────────────────────────
    function removeRow(btn, rc, sec) { btn.closest('.' + rc).remove(); showEmptyIfNeeded(sec); updatePreview(); }
    function showEmptyIfNeeded(sec) { var w=document.getElementById(sec+'-wrapper'),e=document.getElementById(sec+'-empty'); if(w&&e){w.children.length===0?e.classList.remove('hidden'):e.classList.add('hidden');} }
    function hideEmpty(sec) { var e=document.getElementById(sec+'-empty'); if(e) e.classList.add('hidden'); }
    function esc(v) { var d=document.createElement('div'); d.textContent=v; return d.innerHTML; }

    // ─── Add Condition (with prefill) ──────────────────────────
    function addConditionRow(field, operator, value, sort) {
        var i = conditionIndex++;
        var ops = ['=','!=','>','>=','<','<=','in','not_in','between','contains'];
        var optHtml = '';
        for (var o = 0; o < ops.length; o++) {
            optHtml += '<option value="' + ops[o] + '"' + (ops[o] === operator ? ' selected' : '') + '>' + esc(ops[o]) + '</option>';
        }
        var html = '<div class="condition-row ' + rowCls + '">'
            + '<div class="flex-1 min-w-[140px]"><input type="text" name="conditions[' + i + '][field]" class="' + inputCls + '" placeholder="Field e.g. subtotal" value="' + esc(field || '') + '" oninput="updatePreview()"></div>'
            + '<div class="w-28"><select name="conditions[' + i + '][operator]" class="' + inputCls + '" onchange="updatePreview()">' + optHtml + '</select></div>'
            + '<div class="flex-1 min-w-[140px]"><input type="text" name="conditions[' + i + '][value]" class="' + inputCls + '" placeholder="Value" value="' + esc(value || '') + '" oninput="updatePreview()"></div>'
            + '<div class="w-20"><input type="number" name="conditions[' + i + '][sort_order]" value="' + (sort || i + 1) + '" class="' + inputCls + '" placeholder="Sort"></div>'
            + makeDeleteBtn('condition-row', 'conditions') + '</div>';
        document.getElementById('conditions-wrapper').insertAdjacentHTML('beforeend', html);
        hideEmpty('conditions');
    }
    function addCondition() { addConditionRow('', '=', '', conditionIndex + 1); }

    // ─── Add Action (with prefill) ─────────────────────────────
    function addActionRow(type, value, maxDiscount, sort) {
        var i = actionIndex++;
        var types = { 'percentage_discount': 'Percentage Discount', 'fixed_discount': 'Fixed Discount', 'free_shipping': 'Free Shipping' };
        var optHtml = '';
        for (var k in types) optHtml += '<option value="' + k + '"' + (k === type ? ' selected' : '') + '>' + types[k] + '</option>';
        var html = '<div class="action-row ' + rowCls + '">'
            + '<div class="flex-1 min-w-[150px]"><select name="actions[' + i + '][action_type]" class="' + inputCls + '" onchange="updatePreview()">' + optHtml + '</select></div>'
            + '<div class="flex-1 min-w-[120px]"><input type="number" step="0.01" name="actions[' + i + '][configuration][value]" class="' + inputCls + '" placeholder="Value" value="' + esc(value || '') + '" oninput="updatePreview()"></div>'
            + '<div class="flex-1 min-w-[120px]"><input type="number" step="0.01" name="actions[' + i + '][configuration][max_discount]" class="' + inputCls + '" placeholder="Max Discount" value="' + esc(maxDiscount || '') + '"></div>'
            + '<div class="w-20"><input type="number" name="actions[' + i + '][sort_order]" value="' + (sort || i + 1) + '" class="' + inputCls + '" placeholder="Sort"></div>'
            + makeDeleteBtn('action-row', 'actions') + '</div>';
        document.getElementById('actions-wrapper').insertAdjacentHTML('beforeend', html);
        hideEmpty('actions');
    }
    function addAction() { addActionRow('percentage_discount', '', '', actionIndex + 1); }

    // ─── Add Product (with prefill) ────────────────────────────
    function addProductRow(pid, override) {
        var i = productIndex++;
        var html = '<div class="product-row ' + rowCls + '">'
            + '<div class="flex-1 min-w-[150px]"><input type="number" name="products[' + i + '][product_id]" class="' + inputCls + '" placeholder="Product ID" value="' + esc(pid || '') + '"></div>'
            + '<div class="flex-1 min-w-[150px]"><input type="number" step="0.01" name="products[' + i + '][override_discount_value]" class="' + inputCls + '" placeholder="Override Discount Value" value="' + esc(override || '') + '"></div>'
            + makeDeleteBtn('product-row', 'products') + '</div>';
        document.getElementById('products-wrapper').insertAdjacentHTML('beforeend', html);
        hideEmpty('products');
    }
    function addProduct() { addProductRow('', ''); }

    // ─── Add Category (with prefill) ───────────────────────────
    function addCategoryRow(cid, includeSub) {
        var i = categoryIndex++;
        var checked = (includeSub === undefined || includeSub == 1 || includeSub === true) ? ' checked' : '';
        var html = '<div class="category-row ' + rowCls + '">'
            + '<div class="flex-1 min-w-[150px]"><input type="number" name="categories[' + i + '][category_id]" class="' + inputCls + '" placeholder="Category ID" value="' + esc(cid || '') + '"></div>'
            + '<div class="flex items-center gap-2"><input type="hidden" name="categories[' + i + '][include_subcategories]" value="0">'
            + '<label class="flex items-center gap-2 text-sm text-gray-600 cursor-pointer select-none">'
            + '<input type="checkbox" name="categories[' + i + '][include_subcategories]" value="1" class="w-4 h-4 rounded-md border-gray-300 text-indigo-600 focus:ring-indigo-500 shadow-sm"' + checked + '>'
            + 'Include Subcategories</label></div>'
            + makeDeleteBtn('category-row', 'categories') + '</div>';
        document.getElementById('categories-wrapper').insertAdjacentHTML('beforeend', html);
        hideEmpty('categories');
    }
    function addCategory() { addCategoryRow('', true); }

    // ─── Add Customer Group (with prefill) ─────────────────────
    function addCustomerGroupRow(gid) {
        var i = customerGroupIndex++;
        var html = '<div class="customer-group-row ' + rowCls + '">'
            + '<div class="flex-1"><input type="number" name="customer_groups[' + i + '][customer_group_id]" class="' + inputCls + '" placeholder="Customer Group ID" value="' + esc(gid || '') + '"></div>'
            + makeDeleteBtn('customer-group-row', 'customer-groups') + '</div>';
        document.getElementById('customer-groups-wrapper').insertAdjacentHTML('beforeend', html);
        hideEmpty('customer-groups');
    }
    function addCustomerGroup() { addCustomerGroupRow(''); }

    // ─── Add Coupon (with prefill) ─────────────────────────────
    function addCouponRow(code, type, limit, active) {
        var i = couponIndex++;
        var isActive = (active === undefined || active == 1 || active === true) ? ' checked' : '';
        var html = '<div class="coupon-row ' + rowCls + '">'
            + '<div class="flex-1 min-w-[140px]"><input type="text" name="coupons[' + i + '][code]" class="' + inputCls + ' font-mono uppercase tracking-wider" placeholder="COUPON CODE" value="' + esc(code || '') + '" oninput="updatePreview()"></div>'
            + '<div class="w-28"><select name="coupons[' + i + '][type]" class="' + inputCls + '">'
            + '<option value="shared"' + (type === 'shared' ? ' selected' : '') + '>Shared</option>'
            + '<option value="unique"' + (type === 'unique' ? ' selected' : '') + '>Unique</option>'
            + '</select></div>'
            + '<div class="w-28"><input type="number" name="coupons[' + i + '][usage_limit]" class="' + inputCls + '" placeholder="Limit" value="' + esc(limit || '') + '"></div>'
            + '<div class="flex items-center gap-2"><input type="hidden" name="coupons[' + i + '][is_active]" value="0">'
            + '<label class="flex items-center gap-1.5 text-sm text-gray-600 cursor-pointer select-none">'
            + '<input type="checkbox" name="coupons[' + i + '][is_active]" value="1" class="w-4 h-4 rounded-md border-gray-300 text-indigo-600 focus:ring-indigo-500 shadow-sm"' + isActive + '>'
            + 'Active</label></div>'
            + makeDeleteBtn('coupon-row', 'coupons') + '</div>';
        document.getElementById('coupons-wrapper').insertAdjacentHTML('beforeend', html);
        hideEmpty('coupons');
    }
    function addCoupon() { addCouponRow('', 'shared', '', true); }

    // ─── Add Schedule (with prefill) ───────────────────────────
    function addScheduleRow(recurrence, dow, dom, tf, tt) {
        var i = scheduleIndex++;
        var types = ['daily', 'weekly', 'monthly', 'custom'];
        var optHtml = '';
        for (var t = 0; t < types.length; t++) optHtml += '<option value="' + types[t] + '"' + (types[t] === recurrence ? ' selected' : '') + '>' + types[t].charAt(0).toUpperCase() + types[t].slice(1) + '</option>';
        var html = '<div class="schedule-row ' + rowCls + '">'
            + '<div class="w-32"><select name="schedules[' + i + '][recurrence_type]" class="' + inputCls + '" onchange="updatePreview()">' + optHtml + '</select></div>'
            + '<div class="w-24"><input type="number" name="schedules[' + i + '][day_of_week]" class="' + inputCls + '" placeholder="Day 0-6" value="' + esc(dow || '') + '"></div>'
            + '<div class="w-24"><input type="number" name="schedules[' + i + '][day_of_month]" class="' + inputCls + '" placeholder="Day 1-31" value="' + esc(dom || '') + '"></div>'
            + '<div class="w-32"><input type="time" name="schedules[' + i + '][time_from]" class="' + inputCls + '" value="' + esc(tf || '') + '" onchange="updatePreview()"></div>'
            + '<div class="w-32"><input type="time" name="schedules[' + i + '][time_to]" class="' + inputCls + '" value="' + esc(tt || '') + '" onchange="updatePreview()"></div>'
            + makeDeleteBtn('schedule-row', 'schedules') + '</div>';
        document.getElementById('schedules-wrapper').insertAdjacentHTML('beforeend', html);
        hideEmpty('schedules');
    }
    function addSchedule() { addScheduleRow('daily', '', '', '', ''); }

    // ─── Add Target (with prefill) ─────────────────────────────
    function addTargetRow(type, tid) {
        var i = targetIndex++;
        var html = '<div class="target-row ' + rowCls + '">'
            + '<div class="flex-1 min-w-[150px]"><input type="text" name="targets[' + i + '][target_type]" class="' + inputCls + '" placeholder="Target Type" value="' + esc(type || '') + '"></div>'
            + '<div class="flex-1 min-w-[150px]"><input type="number" name="targets[' + i + '][target_id]" class="' + inputCls + '" placeholder="Target ID" value="' + esc(tid || '') + '"></div>'
            + makeDeleteBtn('target-row', 'targets') + '</div>';
        document.getElementById('targets-wrapper').insertAdjacentHTML('beforeend', html);
        hideEmpty('targets');
    }
    function addTarget() { addTargetRow('', ''); }

    // ─── Live Preview (same as create) ─────────────────────────
    function updatePreview() {
        var statusEl = document.getElementById('status'), previewSt = document.getElementById('preview-status');
        var statusMap = { draft: 'bg-gray-100 text-gray-700', scheduled: 'bg-blue-100 text-blue-700', active: 'bg-green-100 text-green-700', expired: 'bg-red-100 text-red-700' };
        if (statusEl && previewSt) {
            var val = statusEl.value;
            previewSt.textContent = val.charAt(0).toUpperCase() + val.slice(1);
            previewSt.className = 'inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-semibold ' + (statusMap[val] || statusMap.draft);
        }

        var condRows = document.querySelectorAll('.condition-row'), previewCond = document.getElementById('preview-conditions');
        if (previewCond) {
            if (condRows.length === 0) { previewCond.textContent = 'No conditions set — applies to all'; }
            else {
                var parts = [];
                condRows.forEach(function(row) {
                    var f = (row.querySelector('[name*="[field]"]') || {}).value || '?';
                    var o = (row.querySelector('[name*="[operator]"]') || {}).value || '=';
                    var v = (row.querySelector('[name*="[value]"]') || {}).value || '?';
                    if (f || v) parts.push(f + ' ' + o + ' ' + v);
                });
                previewCond.textContent = parts.length ? parts.join(' & ') : 'No conditions set — applies to all';
            }
        }

        var actRows = document.querySelectorAll('.action-row'), previewAct = document.getElementById('preview-actions');
        if (previewAct) {
            if (actRows.length === 0) { previewAct.textContent = 'No action defined yet'; }
            else {
                var ap = [];
                actRows.forEach(function(row) {
                    var type = (row.querySelector('[name*="[action_type]"]') || {}).value || '';
                    var val = (row.querySelector('[name*="[configuration][value]"]') || {}).value || '';
                    var label = type.replace(/_/g, ' ').replace(/\b\w/g, function(c) { return c.toUpperCase(); });
                    if (val) { ap.push('Apply ' + val + (type.indexOf('percentage') !== -1 ? '%' : '₹') + ' ' + label); }
                    else { ap.push(label); }
                });
                previewAct.textContent = ap.join(', ');
            }
        }

        var schedRows = document.querySelectorAll('.schedule-row'), previewSched = document.getElementById('preview-schedule');
        var startsAt = (document.getElementById('starts_at') || {}).value || '';
        var endsAt = (document.getElementById('ends_at') || {}).value || '';
        if (previewSched) {
            if (startsAt || endsAt) {
                var txt = '';
                if (startsAt) txt += 'From ' + new Date(startsAt).toLocaleDateString('en-IN');
                if (endsAt) txt += ' to ' + new Date(endsAt).toLocaleDateString('en-IN');
                if (schedRows.length > 0) txt += ' (' + schedRows.length + ' schedule' + (schedRows.length > 1 ? 's' : '') + ')';
                previewSched.textContent = txt.trim();
            } else if (schedRows.length > 0) {
                previewSched.textContent = schedRows.length + ' recurring schedule' + (schedRows.length > 1 ? 's' : '');
            } else { previewSched.textContent = 'Always active'; }
        }

        var coupRows = document.querySelectorAll('.coupon-row'), previewCoupon = document.getElementById('preview-coupon');
        if (previewCoupon) {
            if (coupRows.length === 0) { previewCoupon.textContent = 'Not required'; }
            else {
                var codes = [];
                coupRows.forEach(function(row) {
                    var code = (row.querySelector('[name*="[code]"]') || {}).value || '';
                    if (code) codes.push(code.toUpperCase());
                });
                previewCoupon.textContent = codes.length ? codes.join(', ') : coupRows.length + ' coupon(s)';
            }
        }
    }

    // ─── Auto Slug (disabled by default for edit) ──────────────
    var nameInput = document.getElementById('name');
    var slugInput = document.getElementById('slug');
    var slugManuallyEdited = true; // true = don't auto-generate on edit

    if (slugInput) slugInput.addEventListener('input', function() { slugManuallyEdited = true; });
    if (nameInput) {
        nameInput.addEventListener('input', function() {
            if (!slugManuallyEdited && slugInput) {
                slugInput.value = this.value.toLowerCase().replace(/[^a-z0-9\s-]/g, '').replace(/\s+/g, '-').replace(/-+/g, '-').trim();
            }
            updatePreview();
        });
    }

    // ─── Populate Existing Data on Load ────────────────────────
    document.addEventListener('DOMContentLoaded', function() {
        // Conditions
        existingConditions.forEach(function(c) {
            addConditionRow(c.field || '', c.operator || '=', c.value || '', c.sort_order || '');
        });

        // Actions
        existingActions.forEach(function(a) {
            var cfg = a.configuration || {};
            addActionRow(a.action_type || '', cfg.value || '', cfg.max_discount || '', a.sort_order || '');
        });

        // Products
        existingProducts.forEach(function(p) {
            addProductRow(p.product_id || '', p.override_discount_value || '');
        });

        // Categories
        existingCategories.forEach(function(c) {
            addCategoryRow(c.category_id || '', c.include_subcategories);
        });

        // Customer Groups
        existingCustomerGroups.forEach(function(g) {
            addCustomerGroupRow(g.customer_group_id || '');
        });

        // Coupons
        existingCoupons.forEach(function(c) {
            addCouponRow(c.code || '', c.type || 'shared', c.usage_limit || '', c.is_active);
        });

        // Schedules
        existingSchedules.forEach(function(s) {
            addScheduleRow(s.recurrence_type || 'daily', s.day_of_week || '', s.day_of_month || '', s.time_from || '', s.time_to || '');
        });

        // Targets
        existingTargets.forEach(function(t) {
            addTargetRow(t.target_type || '', t.target_id || '');
        });

        // Bind live preview listeners
        var statusEl = document.getElementById('status');
        var startsAtEl = document.getElementById('starts_at');
        var endsAtEl = document.getElementById('ends_at');
        if (statusEl) statusEl.addEventListener('change', updatePreview);
        if (startsAtEl) startsAtEl.addEventListener('change', updatePreview);
        if (endsAtEl) endsAtEl.addEventListener('change', updatePreview);

        // Initial preview render
        updatePreview();
    });
</script>
@endpush
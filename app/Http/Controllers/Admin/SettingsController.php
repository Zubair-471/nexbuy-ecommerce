<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SettingsController extends AdminController
{
    /**
     * Display the settings index page.
     */
    public function index()
    {
        // Get current settings from cache or database
        $settings = $this->getSettings();
        
        return view('admin.settings.index', compact('settings'));
    }

    /**
     * Update the settings.
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'store_name' => 'required|string|max:255',
            'store_tagline' => 'nullable|string|max:500',
            'store_email' => 'required|email|max:255',
            'store_phone' => 'nullable|string|max:20',
            'store_address' => 'nullable|string|max:500',
            'store_city' => 'nullable|string|max:100',
            'store_state' => 'nullable|string|max:100',
            'store_zip' => 'nullable|string|max:20',
            'store_country' => 'nullable|string|max:100',
            'store_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'store_open_time' => 'nullable|date_format:H:i',
            'store_close_time' => 'nullable|date_format:H:i',
            'default_currency' => 'nullable|string|max:3',
            'default_language' => 'nullable|string|max:5',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            $settings = $request->except(['_token', '_method', 'store_logo']);
            
            // Handle logo upload
            if ($request->hasFile('store_logo')) {
                $logoPath = $request->file('store_logo')->store('settings', 'public');
                $settings['store_logo'] = $logoPath;
                
                // Remove old logo if exists
                $oldSettings = $this->getSettings();
                if (isset($oldSettings['store_logo']) && Storage::disk('public')->exists($oldSettings['store_logo'])) {
                    Storage::disk('public')->delete($oldSettings['store_logo']);
                }
            }
            
            // Save settings to cache and database
            $this->saveSettings($settings);
            
            return back()->with('success', 'Settings updated successfully!');
            
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to update settings: ' . $e->getMessage());
        }
    }

    /**
     * Get settings from cache or return defaults.
     */
    private function getSettings()
    {
        return Cache::remember('store_settings', 3600, function () {
            // In a real application, you'd fetch from database
            // For now, return default settings
            return [
                'store_name' => 'NexBuy',
                'store_tagline' => 'Your Ultimate Shopping Destination',
                'store_email' => 'info@nexbuy.com',
                'store_phone' => '+1 (555) 123-4567',
                'store_address' => '123 Commerce St',
                'store_city' => 'Business City',
                'store_state' => 'BC',
                'store_zip' => '12345',
                'store_country' => 'United States',
                'store_logo' => null,
                'store_open_time' => '09:00',
                'store_close_time' => '18:00',
                'default_currency' => 'USD',
                'default_language' => 'en',
            ];
        });
    }

    /**
     * Save settings to cache and database.
     */
    private function saveSettings(array $settings)
    {
        // In a real application, you'd save to database
        // For now, just update cache
        Cache::put('store_settings', $settings, 3600);
        
        // You could also save to a settings table here
        // Settings::updateOrCreate(['key' => 'store_settings'], ['value' => json_encode($settings)]);
    }

    /**
     * Reset settings to defaults.
     */
    public function reset()
    {
        try {
            Cache::forget('store_settings');
            
            return back()->with('success', 'Settings reset to defaults successfully!');
            
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to reset settings: ' . $e->getMessage());
        }
    }

    /**
     * Export settings.
     */
    public function export()
    {
        try {
            $settings = $this->getSettings();
            $json = json_encode($settings, JSON_PRETTY_PRINT);
            
            return response($json)
                ->header('Content-Type', 'application/json')
                ->header('Content-Disposition', 'attachment; filename="settings.json"');
                
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to export settings: ' . $e->getMessage());
        }
    }
}

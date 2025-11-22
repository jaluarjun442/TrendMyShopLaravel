<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Setting;

class SettingController extends Controller
{
    // GET /api/v1/app/settings
    public function appLinks()
    {
        // assuming you have only one settings row
        $setting = Setting::query()->first();

        if (!$setting) {
            return response()->json([
                'status'  => false,
                'message' => 'Settings not configured',
            ], 404);
        }

        return response()->json([
            'status' => true,
            'data'   => [
                'about_us'         => $setting->app_about_us_link,
                'privacy_policy'   => $setting->app_privacy_policy_link,
                'terms_conditions' => $setting->app_terms_conditions_link,
                'refund_policy'    => $setting->app_refund_policy_link,
                'help_center'      => $setting->app_help_center_link,
                'contact_us'       => $setting->app_contact_us_link,
                'play_store'       => $setting->app_play_store_link,
            ],
        ]);
    }
}

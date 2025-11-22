<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('app_about_us_link')->nullable()->after('id');
            $table->string('app_privacy_policy_link')->nullable()->after('app_about_us_link');
            $table->string('app_terms_conditions_link')->nullable()->after('app_privacy_policy_link');
            $table->string('app_refund_policy_link')->nullable()->after('app_terms_conditions_link');
            $table->string('app_help_center_link')->nullable()->after('app_refund_policy_link');
            $table->string('app_contact_us_link')->nullable()->after('app_help_center_link');
            $table->string('app_play_store_link')->nullable()->after('app_contact_us_link');
        });
    }

    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn([
                'app_about_us_link',
                'app_privacy_policy_link',
                'app_terms_conditions_link',
                'app_refund_policy_link',
                'app_help_center_link',
                'app_contact_us_link',
                'app_play_store_link',
            ]);
        });
    }
};

<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('mobile_number')->nullable()->after('email');
            $table->string('otp_code')->nullable()->after('mobile_number');
            $table->timestamp('otp_expires_at')->nullable()->after('otp_code');
            $table->boolean('is_mobile_verified')->default(false)->after('otp_expires_at');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['mobile_number', 'otp_code', 'otp_expires_at', 'is_mobile_verified']);
        });
    }
};

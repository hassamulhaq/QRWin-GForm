<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name', 100)->nullable()->after('email');
            $table->string('last_name', 100)->nullable()->after('first_name');
            $table->string('phone')->nullable()->after('last_name');
            $table->string('country')->nullable()->after('phone');
            $table->string('cnic')->nullable()->after('country');
            $table->string('city')->nullable()->after('cnic');
            $table->string('state')->nullable()->after('city');
            $table->string('zip')->nullable()->after('state');
            $table->string('address')->nullable()->after('zip');
            $table->string('address2')->nullable()->after('address');
            $table->string('type', 15)->nullable()->after('address2')->comment('ROP, Sale');
            $table->foreignId('reference_id')->nullable()->after('type')->constrained('users');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'phone',
                'country',
                'city',
                'state',
                'zip',
                'address',
                'address2',
            ]);
        });
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('spells', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('altname')->nullable();
            $table->string('reference')->nullable();
            $table->string('descriptor')->nullable();
            $table->string('spellcraft_dc')->nullable();
            $table->string('spell_resistance')->nullable();
            $table->string('school')->nullable();
            $table->string('subschool')->nullable();
            $table->string('level')->nullable();
            $table->longText('components')->nullable();
            $table->string('casting_time')->nullable();
            $table->string('range')->nullable();
            $table->string('target')->nullable();
            $table->string('area')->nullable();
            $table->string('effect')->nullable();
            $table->string('duration')->nullable();
            $table->string('saving_throw')->nullable();
            $table->string('short_description')->nullable();
            $table->longText('to_develop')->nullable();
            $table->longText('material_components')->nullable();
            $table->longText('arcane_material_components')->nullable();
            $table->longText('focus')->nullable();
            $table->longText('arcane_focus')->nullable();
            $table->longText('wizard_focus')->nullable();
            $table->longText('verbal_focus')->nullable();
            $table->longText('sorcerer_focus')->nullable();
            $table->longText('bard_focus')->nullable();
            $table->longText('cleric_focus')->nullable();
            $table->longText('druid_focus')->nullable();
            $table->longText('description')->nullable();
            $table->longText('xp_cost')->nullable();
            $table->longText('full_text')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spells');
    }
};

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompetencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('competences')->insert([
            [ 'competence_skill' => 'Self-Motivation'],
            [ 'competence_skill' => 'Drive for Results'],
            [ 'competence_skill' => 'Planning and organizing'],
            [ 'competence_skill' => 'Decision Making'],
            [ 'competence_skill' => 'Knowledge Management'],
            [ 'competence_skill' => 'Initiative'],
            [ 'competence_skill' => 'Honesty/integrity'],
            [ 'competence_skill' => 'Efficiency'],
            [ 'competence_skill' => 'Teamwork'],
            [ 'competence_skill' => 'Managing Relationships'],
            [ 'competence_skill' => 'Managing People'],
            [ 'competence_skill' => 'Punctuality'],
            [ 'competence_skill' => 'Expediency'],
            [ 'competence_skill' => 'Reliability'],
            [ 'competence_skill' => 'Ability to follow instructions'],
            [ 'competence_skill' => 'Attitude'],
            [ 'competence_skill' => 'Communication'],
        ]);
    }
}

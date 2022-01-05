<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaladieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('maladies')->insert([
            [
                'nom' => 'acné',
                'curable' => true,
                'traitement' => 'medicament',
            ],
            [
                'nom' => 'acouphènes',
                'curable' => false,
                'traitement' => '',
            ],
            [
                'nom' => 'allergies au soleil',
                'curable' => false,
                'traitement' => '',
            ],
            [
                'nom' => 'Alzheimer',
                'curable' => true,
                'traitement' => 'médicament',
            ],
            [
                'nom' => 'Ampoule',
                'curable' => true,
                'traitement' => 'Eteindre la lumière',
            ],
            [
                'nom' => 'Amygdales',
                'curable' => true,
                'traitement' => 'operation',
            ],
            [
                'nom' => 'angine',
                'curable' => true,
                'traitement' => 'médicament',
            ],
            [
                'nom' => 'anémie',
                'curable' => true,
                'traitement' => 'Injection intramusculaires',
            ],
            [
                'nom' => 'asthme',
                'curable' => false,
                'traitement' => '',
            ],
            [
                'nom' => 'bouton de fièvre',
                'curable' => true,
                'traitement' => 'médicament',
            ],
            [
                'nom' => 'bronchiolite',
                'curable' => true,
                'traitement' => 'On se bouge',
            ],
            [
                'nom' => 'bronchite',
                'curable' => true,
                'traitement' => 'On se bouge',
            ],
            [
                'nom' => 'burn out',
                'curable' => true,
                'traitement' => 'repos',
            ],
            [
                'nom' => 'cataracte',
                'curable' => false,
                'traitement' => '',
            ],
            [
                'nom' => 'cauchemars',
                'curable' => false,
                'traitement' => '',
            ],
            [
                'nom' => 'chlamydia',
                'curable' => true,
                'traitement' => 'serre la',
            ],
            [
                'nom' => 'claquage musculaire',
                'curable' => true,
                'traitement' => 'repos et anti inflammatoire',
            ],
            [
                'nom' => 'cystite',
                'curable' => true,
                'traitement' => 'bois de l\'eau et prend une douche ',
            ],
            [
                'nom' => 'diabète',
                'curable' => false,
                'traitement' => '',
            ],
            [
                'nom' => 'diarrhé',
                'curable' => true,
                'traitement' => 'mange sec',
            ],
            [
                'nom' => 'eczéma',
                'curable' => true,
                'traitement' => 'te gratte pas',
            ],
            [
                'nom' => 'entorse',
                'curable' => true,
                'traitement' => 'repos',
            ],
            [
                'nom' => 'gale',
                'curable' => true,
                'traitement' => 'medicament',
            ],
            [
                'nom' => 'grippe',
                'curable' => true,
                'traitement' => 'medicament',
            ],
            [
                'nom' => 'hernie discale',
                'curable' => false,
                'traitement' => '',
            ],
            [
                'nom' => 'herpes',
                'curable' => true,
                'traitement' => 'medicament',
            ],
            [
                'nom' => 'hypersomnie',
                'curable' => true,
                'traitement' => 'On se bouge',
            ],
            [
                'nom' => 'hémorroide',
                'curable' => true,
                'traitement' => 'arrete de forcer',
            ],
            [
                'nom' => 'hépatite A',
                'curable' => false,
                'traitement' => '',
            ],
            [
                'nom' => 'hépatite B',
                'curable' => true,
                'traitement' => 'Manger peu gras',
            ],
        ]);
    }
}

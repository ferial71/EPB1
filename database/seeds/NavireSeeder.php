<?php

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\factory as Faker;
use Illuminate\Support\Facades\DB;

class NavireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\armateur');
        for ($i=0;$i<10;$i++){
            db::table('armateurs')->insert([
                'nom' => $faker->company,
                'nationalite' => $faker->country,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
        $faker = Faker::create('App\navire');

        for ($i=0;$i<10;$i++){
            db::table('navires')->insert([
                'nom' => $faker->company,
                'pavillon' => $faker->country,
                'longeur'=> $faker->numberBetween($min = 80, $max = 150),
                'largeur'=> $faker->numberBetween($min = 10, $max = 30),
                'imo'=> $faker->numerify('#######'),
                'port_lourd'=> $faker->numerify('####'),
                'tirant_eau'=> $faker->numerify('#.##'),
                'poids'=> $faker->numerify('####'),
                'type'=> $faker->randomElement(['CARGO', 'RO/RO', 'PORTE CONTENEURS', 'PETROLIER', 'BARGE', 'CEREALIER', 'NAVIRE SUCRE','HUILIER','GAZIER']),
                'armateur_id'=> $faker->numberBetween(1,10),

                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
        for ($i=0;$i<10;$i++){
            $user =factory(User::class)->create([
                'name'=>$faker->name,
                'email'=>$faker->email,
            ]);
            $user->assignRole($faker->randomElement(['consignataire','transitaire']));
        }

        $faker = Faker::create('App\cargaison');

        for ($i=0;$i<10;$i++){
            db::table('cargaisons')->insert([
                'tonnage'=> $faker->numerify('####'),
                'nombreColis'=> $faker->numerify('####'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
        $faker = Faker::create('App\adresses');



        for ($i=0;$i<10;$i++){
        db::table('annonce_navs')->insert([
            //$table->unsignedBigInteger('navire_id');
            //            $table->unsignedBigInteger('user_id');
            //            $table->unsignedBigInteger('armateur_id');
            //            $table->unsignedBigInteger('cargaison_id');
            'navire_id'=>$faker->numberBetween(1,10),
            'user_id'=>1,
            'armateur_id'=>$faker->numberBetween(1,10),
            'cargaison_id'=>$faker->numberBetween(1,10),
            'date_dentree'=>$faker->date(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        }

        //$table->string('name')->nullable();
        //            $table->string('poids')->nullable();
        //            $table->string('nature')->nullable();
        //            $table->string('mode_conditionnement')->nullable();
        //            $table->unsignedBigInteger('cargaison_id');

        $faker = Faker::create('App\marchandise');

        for ($i=0;$i<10;$i++){
            db::table('marchandises')->insert([
                //$table->bigIncrements('id');
                //            $table->string('name')->nullable();
                //            $table->string('poids')->nullable();
                //            $table->string('nature')->nullable();
                //            $table->string('mode_conditionnement')->nullable();
                //            $table->unsignedBigInteger('cargaison_id');
                //            $table->timestamps();
                'name'=> $faker->word,
                'poids'=> $faker->numerify('##'),
                //'nature'=> $faker->randomElements(['PLT', 'STC', 'JERRICANS', 'PLASTIC', 'CL', 'ONU', 'AROMES', 'FRUITS','COLIS','GENERATRICE','CSE','COMPENSATEUR']),
                'nature'=> $faker->sentence,
                'mode_conditionnement'=> $faker->word,
                'cargaison_id'=> $faker->numberBetween(1,10),
                'created_at' => Carbon::now(),

                'updated_at' => Carbon::now(),
            ]);
        }
        //dd($faker->numberBetween(1,10));
        for ($i=0;$i<10;$i++){
            db::table('dpquais')->insert([
                'date'=> $faker->date(),
                'estimation_temps_arriver'=> $faker->time(),
                'rade'=> $faker->numerify('#'),

                'annonce_nav_id'=>$faker->numberBetween(1,10),
                'user_id'=> $faker->numberBetween(1,10),
                'marchandise_id'=> $faker->numberBetween(1,10),
                'created_at' => Carbon::now(),

                'updated_at' => Carbon::now(),
            ]);
        }

        for ($i=0;$i<10;$i++){
            db::table('emplacements')->insert([
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
        for ($i=0;$i<10;$i++){
            db::table('cpns')->insert([
                'heur_entree'=> $faker->dateTime,
                'heur_sortie'=> $faker->dateTime,
                'consignes'=> $faker->sentence,
                'created_at' => Carbon::now(),

                'updated_at' => Carbon::now(),
            ]);

        }
        for ($i=0;$i<10;$i++){
            db::table('escales')->insert([
                'created_at' => Carbon::now(),

                'updated_at' => Carbon::now(),
            ]);

        }
        for ($i=0;$i<10;$i++){
            db::table('quais')->insert([
                'numero'=> $faker->numberBetween(1,5),
                'created_at' => Carbon::now(),

                'updated_at' => Carbon::now(),
            ]);

        }

        for ($i=0;$i<10;$i++){
            db::table('manifestes')->insert([
                'natureEscale'=> $faker->word,
                'dEstimation'=> $faker->date(),
                'dCreation'=> $faker->date(),
                'dValidation'=> $faker->date(),
                'valide'=> $faker->randomElement(['valide','non valide']),
                'dpquai_id'=> $faker->numberBetween(1,10),
                'cargaisons_id'=> $faker->numberBetween(1,10),
                'created_at' => Carbon::now(),

                'updated_at' => Carbon::now(),
            ]);

        }
        for ($i=0;$i<10;$i++){
            db::table('bon_commandes')->insert([
                'moyenHumaine'=> $faker->sentence,
                'moyenMateriel'=> $faker->sentence,
                'manifeste_id'=> $faker->numberBetween(1,10),
                'emplacement_id'=> $faker->numberBetween(1,10),
                'created_at' => Carbon::now(),

                'updated_at' => Carbon::now(),
            ]);

        }
        for ($i=0;$i<10;$i++){
            db::table('clients')->insert([
                'nom'=> $faker->company,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

        }
        for ($i=0;$i<10;$i++){
            db::table('bon_enlevements')->insert([
                'emplacement_id'=> $faker->numberBetween(1,10),
                'user_id'=> $faker->numberBetween(1,10),
                'marchandise_id'=> $faker->numberBetween(1,10),
                'created_at' => Carbon::now(),

                'updated_at' => Carbon::now(),
            ]);

        }
        for ($i=0;$i<10;$i++){
            db::table('telephones')->insert([
                'numero_tel'=> $faker->numerify('0# ## ## ## ##'),
                'numero_tel_fix'=> $faker->numerify('+213 ## ## ## ##'),
                'numero_fax'=> $faker->numerify('+213 ## ## ## ##'),
                'client_id'=> $faker->numberBetween(1,10),
                'user_id'=> $faker->numberBetween(1,10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            for ($i=0;$i<10;$i++){
                db::table('adresses')->insert([
                    'rue'=> $faker->streetAddress,
                    'cite'=> $faker->city,
                    'etat'=> $faker->state,
                    'paye'=> $faker->country,
                    'code_postale'=> $faker->postcode,
                    'client_id'=> $faker->numberBetween(1,10),
                    'user_id'=> $faker->numberBetween(1,10),
                    'created_at' => Carbon::now(),

                    'updated_at' => Carbon::now(),
                ]);
            }
        }


    }
}

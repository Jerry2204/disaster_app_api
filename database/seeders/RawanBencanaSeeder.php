<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\RawanBencana;
use Illuminate\Database\Seeder;

class RawanBencanaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RawanBencana::insert([
            [
                'nama_wilayah' => 'Parsaoran',
                'koordinat_lattitude' => '2.655336160983692',
                'koordinat_longitude' => '98.93463450875082',
                'jenis_rawan_bencana' => 'Banjir',
                'level_rawan_bencana' => 'Sedang',
                'user_id' => User::all()->random()->id
            ],
            [
                'nama_wilayah' => 'Motung',
                'koordinat_lattitude' => '2.6455413801775816',
                'koordinat_longitude' => '98.93188889525611',
                'jenis_rawan_bencana' => 'Longsor',
                'level_rawan_bencana' => 'Rendah',
                'user_id' => User::all()->random()->id
            ],
            [
                'nama_wilayah' => 'Motung',
                'koordinat_lattitude' => '2.6494940605130908',
                'koordinat_longitude' => '98.9318279355824',
                'jenis_rawan_bencana' => 'Longsor',
                'level_rawan_bencana' => 'Rendah',
                'user_id' => User::all()->random()->id
            ],
            [
                'nama_wilayah' => 'Motung',
                'koordinat_lattitude' => '2.6491739168974537',
                'koordinat_longitude' => ' 98.93262914907689',
                'jenis_rawan_bencana' => 'Longsor',
                'level_rawan_bencana' => 'Rendah',
                'user_id' => User::all()->random()->id
            ],
            [
                'nama_wilayah' => 'Pardamean',
                'koordinat_lattitude' => '2.598265502715013',
                'koordinat_longitude' => '98.95875536441758',
                'jenis_rawan_bencana' => 'Longsor',
                'level_rawan_bencana' => 'Rendah',
                'user_id' => User::all()->random()->id
            ],
            [
                'nama_wilayah' => 'Sigapiton',
                'koordinat_lattitude' => '2.5859985223924498',
                'koordinat_longitude' => ' 98.94359500674723',
                'jenis_rawan_bencana' => 'Longsor',
                'level_rawan_bencana' => 'Rendah',
                'user_id' => User::all()->random()->id
            ],
            [
                'nama_wilayah' => 'Siboruon',
                'koordinat_lattitude' => '2.297919524391536',
                'koordinat_longitude' => '99.07758866441759',
                'jenis_rawan_bencana' => 'Longsor',
                'level_rawan_bencana' => 'Rendah',
                'user_id' => User::all()->random()->id
            ],
            [
                'nama_wilayah' => 'Siboruon',
                'koordinat_lattitude' => '2.308052542924212',
                'koordinat_longitude' => '99.07210737791203',
                'jenis_rawan_bencana' => 'Longsor',
                'level_rawan_bencana' => 'Rendah',
                'user_id' => User::all()->random()->id
            ],
            [
                'nama_wilayah' => 'Nagatimbul Timur',
                'koordinat_lattitude' => '2.495541410557893',
                'koordinat_longitude' => '99.07210737791203',
                'jenis_rawan_bencana' => 'Banjir',
                'level_rawan_bencana' => 'Rendah',
                'user_id' => User::all()->random()->id
            ],
            [
                'nama_wilayah' => 'Sihiong',
                'koordinat_lattitude' => '2.598297656132579',
                'koordinat_longitude' => '98.95876609325276',
                'jenis_rawan_bencana' => 'Banjir',
                'level_rawan_bencana' => 'Rendah',
                'user_id' => User::all()->random()->id
            ],
            [
                'nama_wilayah' => 'Silombu',
                'koordinat_lattitude' => '2.586019955616967',
                'koordinat_longitude' => '98.9435896363564',
                'jenis_rawan_bencana' => 'Banjir',
                'level_rawan_bencana' => 'Rendah',
                'user_id' => User::all()->random()->id
            ],
            [
                'nama_wilayah' => 'Borbor',
                'koordinat_lattitude' => '2.243781200784132',
                'koordinat_longitude' => '99.31694733373615',
                'jenis_rawan_bencana' => 'Longsor',
                'level_rawan_bencana' => 'Rendah',
                'user_id' => User::all()->random()->id
            ],
            [
                'nama_wilayah' => 'Hite tano',
                'koordinat_lattitude' => '2.3445287162521846',
                'koordinat_longitude' => ' 99.25557101839541',
                'jenis_rawan_bencana' => 'Longsor',
                'level_rawan_bencana' => 'Rendah',
                'user_id' => User::all()->random()->id
            ],

            [
                'nama_wilayah' => 'Lumban Balik',
                'koordinat_lattitude' => '2.3569814754385905',
                'koordinat_longitude' => ' 99.3171701085935',
                'jenis_rawan_bencana' => 'Longsor',
                'level_rawan_bencana' => 'Rendah',
                'user_id' => User::all()->random()->id
            ],

            [
                'nama_wilayah' => 'Lumban Pinasa Saroha',
                'koordinat_lattitude' => '2.2900111837535597',
                'koordinat_longitude' => ' 99.38183866441759',
                'jenis_rawan_bencana' => 'Longsor',
                'level_rawan_bencana' => 'Rendah',
                'user_id' => User::all()->random()->id
            ],

            [
                'nama_wilayah' => 'Lumban rau barat',
                'koordinat_lattitude' => '2.2850647858003295',
                'koordinat_longitude' => ' 99.35516572208796',
                'jenis_rawan_bencana' => 'Longsor',
                'level_rawan_bencana' => 'Rendah',
                'user_id' => User::all()->random()->id
            ],

            [
                'nama_wilayah' => 'Lumban Ruhap',
                'koordinat_lattitude' => '2.331558419049209',
                'koordinat_longitude' => ' 99.29652877791203',
                'jenis_rawan_bencana' => 'Longsor',
                'level_rawan_bencana' => 'Rendah',
                'user_id' => User::all()->random()->id
            ],

            [
                'nama_wilayah' => 'Lumban Ruhap',
                'koordinat_lattitude' => '2.3334414745469014',
                'koordinat_longitude' => ' 99.29620159433246',
                'jenis_rawan_bencana' => 'Longsor',
                'level_rawan_bencana' => 'Rendah',
                'user_id' => User::all()->random()->id
            ],

            [
                'nama_wilayah' => 'Matio',
                'koordinat_lattitude' => '2.328074690330768',
                'koordinat_longitude' => '99.277187988016',
                'jenis_rawan_bencana' => 'Longsor',
                'level_rawan_bencana' => 'Rendah',
                'user_id' => User::all()->random()->id
            ],
            [
                'nama_wilayah' => 'Sosor Ladang',
                'koordinat_lattitude' => '2.4764790044791316',
                'koordinat_longitude' => ' 99.19780363973196',
                'jenis_rawan_bencana' => 'Longsor',
                'level_rawan_bencana' => 'Rendah',
                'user_id' => User::all()->random()->id
              ],

              [
                'nama_wilayah' => 'Sosor Ladang',
                'koordinat_lattitude' => '2.4979000584707336',
                'koordinat_longitude' => ' 99.205767066720771',
                'jenis_rawan_bencana' => 'Longsor',
                'level_rawan_bencana' => 'Rendah',
                'user_id' => User::all()->random()->id
              ],

              [
                'nama_wilayah' => 'Sosor Ladang',
                'koordinat_lattitude' => '22.4997163768892863',
                'koordinat_longitude' => '99.20535232254483',
                'jenis_rawan_bencana' => 'Kebakaran Hutan',
                'level_rawan_bencana' => 'Sedang',
                'user_id' => User::all()->random()->id
              ],

              [
                'nama_wilayah' => 'Siria-ria',
                'koordinat_lattitude' => '2.449921349766355',
                'koordinat_longitude' => '99.24043575137982',
                'jenis_rawan_bencana' => 'Longsor',
                'level_rawan_bencana' => 'Rendah',
                'user_id' => User::all()->random()->id
              ],

              [
                'nama_wilayah' => 'Meranti',
                'koordinat_lattitude' => '2.5180686637504555',
                'koordinat_longitude' => '99.25605559555606',
                'jenis_rawan_bencana' => 'Longsor',
                'level_rawan_bencana' => 'Sedang',
                'user_id' => User::all()->random()->id
              ],

              [
                'nama_wilayah' => 'Meranti',
                'koordinat_lattitude' => '2.5180686637504555',
                'koordinat_longitude' => '99.28219000905051',
                'jenis_rawan_bencana' => 'Kebakaran Hutan',
                'level_rawan_bencana' => 'Sedang',
                'user_id' => User::all()->random()->id
              ],

              [
                'nama_wilayah' => 'Meranti',
                'koordinat_lattitude' => '2.554117897382907',
                'koordinat_longitude' => '99.30289523788568',
                'jenis_rawan_bencana' => 'Kebakaran Hutan',
                'level_rawan_bencana' => 'Sedang',
                'user_id' => User::all()->random()->id
              ],

              [
                'nama_wilayah' => 'Meranti',
                'koordinat_lattitude' => '2.5635496689056927',
                'koordinat_longitude' => '99.30563889555619',
                'jenis_rawan_bencana' => 'Longsor',
                'level_rawan_bencana' => 'Rendah',
                'user_id' => User::all()->random()->id
              ],

              [
                'nama_wilayah' => 'Meranti',
                'koordinat_lattitude' => '2.5648357421198824',
                'koordinat_longitude' => '99.30482509740258',
                'jenis_rawan_bencana' => 'Longsor',
                'level_rawan_bencana' => 'Rendah',
                'user_id' => User::all()->random()->id
              ],

              [
                'nama_wilayah' => 'Meranti',
                'koordinat_lattitude' => '2.5682782321856603',
                'koordinat_longitude' => '99.30289523788579',
                'jenis_rawan_bencana' => 'Longsor',
                'level_rawan_bencana' => 'Sedang',
                'user_id' => User::all()->random()->id
              ],

              [
                'nama_wilayah' => 'Jambu Dolok',
                'koordinat_lattitude' => '2.557333733387929',
                'koordinat_longitude' => '99.37732071089695',
                'jenis_rawan_bencana' => 'Longsor',
                'level_rawan_bencana' => 'Rendah',
                'user_id' => User::all()->random()->id
              ],

              [
                'nama_wilayah' => 'Jambu Dolok',
                'koordinat_lattitude' => '2.5578035881555845',
                'koordinat_longitude' => '99.37665148021533',
                'jenis_rawan_bencana' => 'Longsor',
                'level_rawan_bencana' => 'Rendah',
                'user_id' => User::all()->random()->id
              ],

              [
                'nama_wilayah' => 'Jambu Dolok',
                'koordinat_lattitude' => '2.561475522356501',
                'koordinat_longitude' => '99.37563632905301',
                'jenis_rawan_bencana' => 'Longsor',
                'level_rawan_bencana' => 'Sedang',
                'user_id' => User::all()->random()->id
              ],
              [
                'nama_wilayah' => 'Panamparan',
                'koordinat_lattitude' => '2.3898565956873274',
                'koordinat_longitude' => '99.32014852261086',
                'jenis_rawan_bencana' => 'Longsor',
                'level_rawan_bencana' => 'Rendah',
                'user_id' => User::all()->random()->id
            ],
            [
                'nama_wilayah' => 'Pintu Bosi',
                'koordinat_lattitude' => '2.3615208190191',
                'koordinat_longitude' => '99.16666240847896',
                'jenis_rawan_bencana' => 'Banjir dan longsor',
                'level_rawan_bencana' => 'Rendah',
                'user_id' => User::all()->random()->id
            ],

            [
                'nama_wilayah' => 'Sidulang',
                'koordinat_lattitude' => '2.336988805186341',
                'koordinat_longitude' => '99.18664881479557',
                'jenis_rawan_bencana' => 'Longsor',
                'level_rawan_bencana' => 'Rendah',
                'user_id' => User::all()->random()->id
            ],
            [
                'nama_wilayah' => 'Sidulang',
                'koordinat_lattitude' => '2.3364274912255016',
                'koordinat_longitude' => '99.18118646335111',
                'jenis_rawan_bencana' => 'Longor, puting beliung',
                'level_rawan_bencana' => 'Rendah',
                'user_id' => User::all()->random()->id
            ],
            [
                'nama_wilayah' => 'Sibarani Nasampulu',
                'koordinat_lattitude' => '2.3462195699226314',
                'koordinat_longitude' => '99.12224544607697',
                'jenis_rawan_bencana' => 'Puting beliung ',
                'level_rawan_bencana' => 'Sedang',
                'user_id' => User::all()->random()->id
            ],
            [
                'nama_wilayah' => 'Sidulang',
                'koordinat_lattitude' => '2.3387105999972855',
                'koordinat_longitude' => '99.1907508629288',
                'jenis_rawan_bencana' => 'Longsor',
                'level_rawan_bencana' => 'Sedang',
                'user_id' => User::all()->random()->id
            ],
            [
                'nama_wilayah' => 'Lumban Rau Utara ',
                'koordinat_lattitude' => '2.2835414469689264 ',
                'koordinat_longitude' => '99.40631818465921 ',
                'jenis_rawan_bencana' => 'Banjir',
                'level_rawan_bencana' => 'Sedang',
                'user_id' => User::all()->random()->id
            ],
            [
                'nama_wilayah' => 'Batu Manumpak  ',
                'koordinat_lattitude' => '2.2659821973079124 ',
                'koordinat_longitude' => '99.38590002212425 ',
                'jenis_rawan_bencana' => 'Banjir',
                'level_rawan_bencana' => 'Rendah',
                'user_id' => User::all()->random()->id
            ],
            [
                'nama_wilayah' => 'Jangga Toruan ',
                'koordinat_lattitude' => '2.5459715670257945 ',
                'koordinat_longitude' => '99.08676223403427 ',
                'jenis_rawan_bencana' => 'Longsor',
                'level_rawan_bencana' => 'Rendah',
                'user_id' => User::all()->random()->id
            ],
            [
                'nama_wilayah' => 'Sibaruang ',
                'koordinat_lattitude' => '2.5170326766782782 ',
                'koordinat_longitude' => '99.07388744556854 ',
                'jenis_rawan_bencana' => 'Longsor',
                'level_rawan_bencana' => 'Rendah',
                'user_id' => User::all()->random()->id
            ],
            [
                'nama_wilayah' => 'Sionggang Utara ',
                'koordinat_lattitude' => '2.591991316118423 ',
                'koordinat_longitude' => '99.0351772131359 ',
                'jenis_rawan_bencana' => 'Banjir',
                'level_rawan_bencana' => 'Rendah',
                'user_id' => User::all()->random()->id
            ],
            [
                'nama_wilayah' => 'Sibaruang ',
                'koordinat_lattitude' => '2.517463543719044 ',
                'koordinat_longitude' => ' 99.07499951166744',
                'jenis_rawan_bencana' => 'Longsor',
                'level_rawan_bencana' => 'Rendah',
                'user_id' => User::all()->random()->id
            ],
            [
                'nama_wilayah' => 'Jangga Toruan ',
                'koordinat_lattitude' => '2.556172159550271 ',
                'koordinat_longitude' => '99.08592196554358 ',
                'jenis_rawan_bencana' => 'Banjir',
                'level_rawan_bencana' => 'Tinggi',
                'user_id' => User::all()->random()->id
            ],
            [
                'nama_wilayah' => 'Jangga Dolok ',
                'koordinat_lattitude' => '2.559964026804917 ',
                'koordinat_longitude' => '99.08237843054961 ',
                'jenis_rawan_bencana' => 'Banjir',
                'level_rawan_bencana' => 'Tinggi',
                'user_id' => User::all()->random()->id
            ],
            [
                'nama_wilayah' => 'Lumban Julu ',
                'koordinat_lattitude' => '2.5765436609691843 ',
                'koordinat_longitude' => ' 99.06054736368213',
                'jenis_rawan_bencana' => 'Banjir',
                'level_rawan_bencana' => 'Sedang',
                'user_id' => User::all()->random()->id
            ],
            [
                'nama_wilayah' => 'Jangga Dolok ',
                'koordinat_lattitude' => '2.559964026804917 ',
                'koordinat_longitude' => '99.08237843054961 ',
                'jenis_rawan_bencana' => 'Banjir',
                'level_rawan_bencana' => 'Tinggi',
                'user_id' => User::all()->random()->id
            ],
            [
                'nama_wilayah' => 'Jangga Toruan ',
                'koordinat_lattitude' => '2.556172159550271 ',
                'koordinat_longitude' => '99.08592196554358 ',
                'jenis_rawan_bencana' => 'Banjir',
                'level_rawan_bencana' => 'Tinggi',
                'user_id' => User::all()->random()->id
            ],
            [
                'nama_wilayah' => 'Panindi',
                'koordinat_lattitude' => '2.4300555555555556',
                'koordinat_longitude' => '9.923691666666660',
                'jenis_rawan_bencana' => 'Longsor',
                'level_rawan_bencana' => 'Rendah',
                'user_id' => User::all()->random()->id
            ],

[
    'nama_wilayah' => 'Panindi',
    'koordinat_lattitude' => '2.4383333333333335',
    'koordinat_longitude' => '9.923641666',
    'jenis_rawan_bencana' => 'Kebakaran Hutan',
    'level_rawan_bencana' => 'Rendah',
    'user_id' => User::all()->random()->id
],

[
    'nama_wilayah' => 'Panindi ',
    'koordinat_lattitude' => '2.4357777777777776',
    'koordinat_longitude' => '99.23577777777778',
    'jenis_rawan_bencana' => 'Longsor',
    'level_rawan_bencana' => 'Rendah',
    'user_id' => User::all()->random()->id
],
[
    'nama_wilayah' => 'Panindi ',
    'koordinat_lattitude' => '2.4250555555555554',
    'koordinat_longitude' => '99.23280555555556',
    'jenis_rawan_bencana' => 'Longsor',
    'level_rawan_bencana' => 'Rendah',
    'user_id' => User::all()->random()->id
],
[
    'nama_wilayah' => 'Sibide',
    'koordinat_lattitude' => '2.4300555555555556',
    'koordinat_longitude' => '99.23691666666667',
    'jenis_rawan_bencana' => 'Longsor',
    'level_rawan_bencana' => 'Rendah',
    'user_id' => User::all()->random()->id
],
[
    'nama_wilayah' => 'Sibide ',
    'koordinat_lattitude' => '2.416027777777778',
    'koordinat_longitude' => '99.23219444444444',
    'jenis_rawan_bencana' => 'Longsor',
    'level_rawan_bencana' => 'Rendah',
    'user_id' => User::all()->random()->id
],
[
    'nama_wilayah' => 'Sibide',
    'koordinat_lattitude' => '2.328185',
    'koordinat_longitude' => '99.19685138888889',
    'jenis_rawan_bencana' => 'Longsor',
    'level_rawan_bencana' => 'Rendah',
    'user_id' => User::all()->random()->id
],
[
    'nama_wilayah' => 'Jangga Dolok ',
    'koordinat_lattitude' => '2.559964026804917 ',
    'koordinat_longitude' => '99.08237843054961 ',
    'jenis_rawan_bencana' => 'Longsor',
    'level_rawan_bencana' => 'Rendah',
    'user_id' => User::all()->random()->id
],
[
    'nama_wilayah' => 'Dalihan Natolu',
    'koordinat_lattitude' => '2.416027777777778',
    'koordinat_longitude' => '99.23219444444444',
    'jenis_rawan_bencana' => 'Longsor',
    'level_rawan_bencana' => 'Rendah',
    'user_id' => User::all()->random()->id
],
[
    'nama_wilayah' => 'Simanobak',
    'koordinat_lattitude' => '2.336527777777778 ',
    'koordinat_longitude' => '99.20297222222222',
    'jenis_rawan_bencana' => 'Longsor',
    'level_rawan_bencana' => 'Sedang',
    'user_id' => User::all()->random()->id
],
[
    'nama_wilayah' => 'Ombur',
    'koordinat_lattitude' => '2.339388888888889',
    'koordinat_longitude' => '99.22744444444445',
    'jenis_rawan_bencana' => 'Longsor',
    'level_rawan_bencana' => 'Rendah',
    'user_id' => User::all()->random()->id
],
[
    'nama_wilayah' => 'Ombur ',
    'koordinat_lattitude' => '2.3289444444444445',
    'koordinat_longitude' => '99.23686111111112',
    'jenis_rawan_bencana' => 'Longsor',
    'level_rawan_bencana' => 'Rendah',
    'user_id' => User::all()->random()->id
],
[
    'nama_wilayah' => 'Ombur',
    'koordinat_lattitude' => '2.3273333333333334',
    'koordinat_longitude' => '99.23552777777778',
    'jenis_rawan_bencana' => 'Longsor',
    'level_rawan_bencana' => 'Rendah',
    'user_id' => User::all()->random()->id
],
[
    'nama_wilayah' => 'Meat',
    'koordinat_lattitude' => '2.317111111111111',
    'koordinat_longitude' => '99.00497222222222',
    'jenis_rawan_bencana' => 'Banjir',
    'level_rawan_bencana' => 'Sedang',
    'user_id' => User::all()->random()->id
],
[
    'nama_wilayah' => 'Gur Gur Aek Raja',
    'koordinat_lattitude' => '2.3276944444444443',
    'koordinat_longitude' => '99.01408333333333',
    'jenis_rawan_bencana' => 'Banjir',
    'level_rawan_bencana' => 'Sedang',
    'user_id' => User::all()->random()->id
],
[
    'nama_wilayah' => 'Siregar Aek Nalas',
    'koordinat_lattitude' => '99.05402778',
    'koordinat_longitude' => '2.3975',
    'jenis_rawan_bencana' => 'Longsor',
    'level_rawan_bencana' => 'Rendah',
    'user_id' => User::all()->random()->id
],
[
    'nama_wilayah' => 'Sibuntuon',
    'koordinat_lattitude' => '99.0937222',
    'koordinat_longitude' => '2.4211111',
    'jenis_rawan_bencana' => 'Banjir',
    'level_rawan_bencana' => 'Tinggi',
    'user_id' => User::all()->random()->id
],
[
    'nama_wilayah' => 'Sigumpar Barat',
    'koordinat_lattitude' => '99.053139',
    'koordinat_longitude' => '2.396111 ',
    'jenis_rawan_bencana' => 'Puting Beliung',
    'level_rawan_bencana' => 'Rendah',
    'user_id' => User::all()->random()->id
]





        ]);
    }
}

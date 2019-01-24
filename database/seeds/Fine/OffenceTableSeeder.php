<?php

use Database\TruncateTable;
use Illuminate\Database\Seeder;
use Database\DisableForeignKeys;
use Illuminate\Support\Facades\DB;

/**
 * Class OffenceTableSeeder.
 */
class OffenceTableSeeder extends Seeder
{
    use DisableForeignKeys, TruncateTable;

    /**
     * Run the database seed.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();
        $this->truncate(config('fine.offences_table'));

        $offences = [
            [
                'description' => 'Speeding',
                'description_si' => 'වේගයෙන් පැදවීම',
                'fine' => 1000.00,
                'dip' => 0,
            ],
            [
                'description' => 'Parking',
                'description_si' => 'නැවැත්වීම හෝ නවතා තැබීම',
                'fine' => 500.00,
                'dip' => 0,
            ],
            [
                'description' => 'Signal/directions of Police Officer',
                'description_si' => 'සංඥා සහ පොලිස් නිලධාරින්ගේ විධාන',
                'fine' => 1000.00,
                'dip' => 0,
            ],
            [
                'description' => 'Without D. L.',
                'description_si' => 'බලපත්‍ර නොමැතිව පැදවීම',
                'fine' => 2500.00,
                'dip' => 0,
            ],
            [
                'description' => 'Driving under 18 years of age',
                'description_si' => 'අවු. 18 ට අඩු අය රිය පැදවීම',
                'fine' => 5000.00,
                'dip' => 0,
            ],
            [
                'description' => 'Employing person without D. L.',
                'description_si' => 'බලපත්‍ර නොමැති අයෙකු සේවයේ යෙදවීම',
                'fine' => 3000.00,
                'dip' => 0,
            ],
            [
                'description' => 'R. L. not carried',
                'description_si' => 'ආදායම් බලපත්‍රය රැගෙන නොයෑම',
                'fine' => 500.00,
                'dip' => 0,
            ],
            [
                'description' => 'Contraventing R. L. restrictions',
                'description_si' => 'බලපත්‍ර කොන්දේසි උල්ලංඝනය කිරීම',
                'fine' => 1000.00,
                'dip' => 0,
            ],
            [
                'description' => 'Signals by Driver',
                'description_si' => 'රිය පදවන්නන්ගේ සංඥා',
                'fine' => 500.00,
                'dip' => 0,
            ],
            [
                'description' => 'Position of driver',
                'description_si' => 'රියදුරු සිටිය යුතු ආකාරය',
                'fine' => 100.00,
                'dip' => 0,
            ],
            [
                'description' => 'No. of persons in front seat',
                'description_si' => 'ඉදිරි අසුනේ යාහැකි ගණන',
                'fine' => 100.00,
                'dip' => 0,
            ],
            [
                'description' => 'Sound or light warnings',
                'description_si' => 'ශබ්ද හෝ ආලෝක සංඥා',
                'fine' => 100.00,
                'dip' => 0,
            ],
            [
                'description' => 'Reversing',
                'description_si' => 'පසුපසට පැදවීම',
                'fine' => 20.00,
                'dip' => 0,
            ],
            [
                'description' => 'Riding on Running Boards etc.',
                'description_si' => 'පාපුවරුවේ ගමන් කිරීම යනාදිය',
                'fine' => 100.00,
                'dip' => 0,
            ],
            [
                'description' => 'Precautions unattended vehicle',
                'description_si' => 'නැවැත්වීමේදී ගතයුතු ආරක්ෂක විධි',
                'fine' => 500.00,
                'dip' => 0,
            ],
            [
                'description' => 'Carriage of persons in excess',
                'description_si' => 'වැඩිපුර මගීන් ගෙනයෑම',
                'fine' => 150.00,
                'dip' => 0,
            ],
            [
                'description' => 'Persons who may be carried in lorry',
                'description_si' => 'ලොරියක යා හැකි තැනැත්තන්',
                'fine' => 150.00,
                'dip' => 0,
            ],
            [
                'description' => 'Distribution of advertisements',
                'description_si' => 'දැන්වීම් බෙදාහැරීම්',
                'fine' => 100.00,
                'dip' => 0,
            ],
            [
                'description' => 'Identification Plates',
                'description_si' => 'හැඳිනීමේ තහඩ',
                'fine' => 500.00,
                'dip' => 0,
            ],
            [
                'description' => 'Shape of Identification Plates',
                'description_si' => 'හැඳින්වීමේ තහඩුවේ හැඩය',
                'fine' => 100.00,
                'dip' => 0,
            ],
            [
                'description' => 'Precautions when petrol is taken',
                'description_si' => 'ඉන්ධන ගැනීමේ දී ගතයුතු ආරක්ෂක විධි',
                'fine' => 20.00,
                'dip' => 0,
            ],
            [
                'description' => 'Failing to keep to left of road',
                'description_si' => 'වමෙන් නොපැදවීම',
                'fine' => 500.00,
                'dip' => 0,
            ],
            [
                'description' => 'Obstruction moving from one lane to another',
                'description_si' => 'රිය මග පැනීමෙන් අවහිර කිරීම',
                'fine' => 500.00,
                'dip' => 0,
            ],
            [
                'description' => 'Not allowing traffic to overtake',
                'description_si' => 'ඉස්සර කිරීමට ඉඩ නොදීම',
                'fine' => 500.00,
                'dip' => 0,
            ],
            [
                'description' => 'Overtaking without clear view',
                'description_si' => 'බාධක මැද ඉස්සර කිරීම',
                'fine' => 500.00,
                'dip' => 0,
            ],
            [
                'description' => 'Improper overtaking',
                'description_si' => 'වැරදි ලෙස ඉස්සර කිරීම',
                'fine' => 500.00,
                'dip' => 0,
            ],
            [
                'description' => 'Obstruction while driving along side or overtaking',
                'description_si' => 'සමාන්තරව පැදවීමෙන් හෝ ඉස්සර කිරීමෙන් අවහිර කිරීම',
                'fine' => 500.00,
                'dip' => 0,
            ],
            [
                'description' => 'Obstruction crossing highway',
                'description_si' => 'හරහා යාමෙන් අවහිර කිරීම',
                'fine' => 500.00,
                'dip' => 0,
            ],
            [
                'description' => 'Obstruction entering highway',
                'description_si' => 'මහා මාර්ගයට ඇතුල්වීමෙන් අවහිර කිරීම',
                'fine' => 500.00,
                'dip' => 0,
            ],
            [
                'description' => 'Obstruction moving from one highway to another',
                'description_si' => 'මහා මාර්ගයකින් වෙනත් මහා මාර්ගයකට මාරුවීමෙන් කරන අවහිරය',
                'fine' => 500.00,
                'dip' => 0,
            ],
            [
                'description' => 'Obstructing traffic on main road',
                'description_si' => 'ප්‍රධාන මාර්ගයේ ගමනාගමනය අවහිර කිරීම',
                'fine' => 500.00,
                'dip' => 0,
            ],
            [
                'description' => 'Failing to give way to traffic from the right',
                'description_si' => 'දකුණේ නීති නොපිළිපැදීම',
                'fine' => 500.00,
                'dip' => 0,
            ],
            [
                'description' => 'Not slowing for safe passage on narrow highway',
                'description_si' => 'පටු මාර්ගයකදී ආරක්ෂා රහිතව පැදවීම',
                'fine' => 500.00,
                'dip' => 0,
            ],
            [
                'description' => 'Failing to keep to left when turning left',
                'description_si' => 'වමට හැරවීමේදී වම් අයිනේ නොපැදවීම',
                'fine' => 500.00,
                'dip' => 0,
            ],
            [
                'description' => 'Fail to position vehicle on center of road when turning right',
                'description_si' => 'දකුණට හැරවීමේදී වාහනය මාර්ගයේ මැදට නොගැනීම',
                'fine' => 500.00,
                'dip' => 0,
            ],
        ];

        DB::table(config('fine.offences_table'))->insert($offences);

        $this->enableForeignKeys();
    }
}

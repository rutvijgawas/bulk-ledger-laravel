<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EntryMode;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class EntryModeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EntryMode::factory()->create([
            'id' => 1,
            'Entry_modename' => 'DUE',
            'crdr' => 'D',
            'entrymodeno' => 0,
        ]);
        
        EntryMode::factory()->create([
            'id' => 2,
            'Entry_modename' => 'REVDUE',
            'crdr' => 'C',
            'entrymodeno' => 12,
        ]);

        EntryMode::factory()->create([
            'id' => 3,
                        'Entry_modename' => 'SCHOLARSHIP',
                        'crdr' => 'C',
                        'entrymodeno' => 15,
        ]);
        
        EntryMode::factory()->create([
            'id' => 4,
            'Entry_modename' => 'SCHOLARSHIPREV/REVCONCESSION',
            'crdr' => 'D',
            'entrymodeno' => 16,
        ]);
        EntryMode::factory()->create([
            'id' => 5,
            'Entry_modename' => 'CONCESSION',
            'crdr' => 'C',
            'entrymodeno' => 15,
        ]);
        
        EntryMode::factory()->create([
            'id' => 6,
            'Entry_modename' => 'RCPT',
            'crdr' => 'C',
            'entrymodeno' => 0,
        ]);

        EntryMode::factory()->create([
            'id' => 7,
            'Entry_modename' => 'REVRCPT',
            'crdr' => 'D',
            'entrymodeno' => 0,
        ]);


        EntryMode::factory()->create([
            'id' => 8,
            'Entry_modename' => 'JV',
            'crdr' => 'C',
            'entrymodeno' => 14,
        ]);


        EntryMode::factory()->create([
            'id' => 9,
            'Entry_modename' => 'REVJV',
            'crdr' => 'D',
            'entrymodeno' => 14,
        ]);


        EntryMode::factory()->create([
            'id' => 10,
            'Entry_modename' => 'PMT',
            'crdr' => 'D',
            'entrymodeno' => 1,
        ]);


        EntryMode::factory()->create([
            'id' => 11,
            'Entry_modename' => 'REVPMT',
            'crdr' => 'C',
            'entrymodeno' => 1,
        ]);

        EntryMode::factory()->create([
            'id' => 12,
            'Entry_modename' => 'Fundtransfer',
            'crdr' => '+ ve and -ve',
            'entrymodeno' => 1,
        ]);
    }
}

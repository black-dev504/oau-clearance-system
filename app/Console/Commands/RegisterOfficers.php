<?php

namespace App\Console\Commands;

use App\Models\Unit;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterOfficers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature ='make:demo-user
                            {first_name : The first name of the demo official}
                            {last_name : The last name of the demo official}
                            {--email=email : The email for the demo official}
                            {--role=role : The role of the demo official}
                            {--unit=unit : The assigned unit of the demo official}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $first_name = $this->argument('first_name');
        $last_name = $this->argument('last_name');
        $email = $this->option('email');
        $role = $this->option('role');
        $unit = $this->option('unit');

        $validator = Validator::make([
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'role' => $role,
            'unit' => $unit
        ],[
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'role' => 'required|string|in:student,officer,admin',
            'unit' => 'nullable|string|exists:units,name'
        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }
        }


        $user = User::create([
            'first_name' => $first_name,
            'last_name' => $last_name,
            'password' => Hash::make('password'),
            'email' => $email,
            'role' => $role,
            'unit_id' => $unit ? Unit::where('name', $unit)->value('id') : null
        ]);


        $this->info("Officer {$user->first_name} of {$user->unit->name} unit has been created");

    }

}

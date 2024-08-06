<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Builder;

class ContactTest extends TestCase
{

    use RefreshDatabase;
        
   /**
     * Indicates whether the default seeder should run before each test.
     * @var bool
     */
    protected $seed = true;

    /**
     * A basic feature test example.
     */
    public function test_contact_created(): void
    {
        $contact = Contact::create([
            'user_id' => 1,
            'name' => 'test name',
        ]);
        $contact->phones()->createMany([
            ['phone' => '+380938499546'],
            ['phone' => '+380938499547'],
        ]);
        $contact->emails()->createMany([
            ['email' => 'borzakap@gmail.com'],
        ]);
        $this->assertModelExists($contact);
    }
    
    public function test_find_by_phone_or_email(): void
    {
        $contact = Contact::create([
            'user_id' => 1,
            'name' => 'test name',
        ]);
        $contact->phones()->createMany([
            ['phone' => '+380938499546'],
            ['phone' => '+380938499547'],
        ]);
        $contact->emails()->createMany([
            ['email' => 'borzakap@gmail.com'],
        ]);
        
        $find = Contact::with(['phones', 'emails'])
                ->whereHas('phones', function(Builder $query){
                    $query->where('phone', '+380938499549');
                })->orWhereHas('emails', function(Builder $query){
                    $query->where('email', 'borzakap@gmail.com');
                })->first();
        $this->assertModelExists($find);
    }
    
    public function test_find_by_phone_not_found(): void
    {
        $contact = Contact::create([
            'user_id' => 1,
            'name' => 'test name',
        ]);
        $contact->phones()->createMany([
            ['phone' => '+380938499546'],
            ['phone' => '+380938499547'],
        ]);
        $contact->emails()->createMany([
            ['email' => 'borzakap@gmail.com'],
        ]);
        $find = Contact::with(['phones', 'emails'])
                ->whereHas('phones', function(Builder $query){
                    $query->where('phone', '+380938499549');
                })->first();
        $this->assertEmpty($find);
    }
    
}

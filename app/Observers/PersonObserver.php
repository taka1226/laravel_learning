<?php

namespace App\Observers;

use App\Models\Person;
use Illuminate\Support\Facades\DB;

class PersonObserver
{
    /**
     * Handle the Person "created" event.
     *
     * @param  \App\Models\Person  $person
     * @return void
     */
    public function created(Person $person)
    {
        //
        \Log::debug("HogeHogebbbbb");
    }

    /**
     * Handle the Person "updated" event.
     *
     * @param  \App\Models\Person  $person
     * @return void
     */
    public function updated(Person $person)
    {
        //
        \Log::debug("HogeHogeaaaa");

    }

    /**
     * Handle the Person "deleted" event.
     *
     * @param  \App\Models\Person  $person
     * @return void
     */
    public function deleted(Person $person)
    {
        //
    }

    /**
     * Handle the Person "restored" event.
     *
     * @param  \App\Models\Person  $person
     * @return void
     */
    public function restored(Person $person)
    {
        //
    }

    /**
     * Handle the Person "force deleted" event.
     *
     * @param  \App\Models\Person  $person
     * @return void
     */
    public function forceDeleted(Person $person)
    {
        //
    }

    public function saved(Person $person)
    {
        \Log::debug("Hoge");
        // DB::table('tests')->insert([
        //     'name' => $person->name
        // ]);
    }
}

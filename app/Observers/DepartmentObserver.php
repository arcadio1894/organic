<?php

namespace App\Observers;

use App\Department;
use App\Mail\CreatedDepartmentEmail;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class DepartmentObserver
{
    public function created(Department $department)
    {
        $user = User::find(Auth::user()->id);
        Mail::to('joryes1894@gmail.com')->send(new CreatedDepartmentEmail($user, $department));
    }

    public function updated(Department $department)
    {
        //
    }

    public function deleted(Department $department)
    {
        //
    }

    public function restored(Department $department)
    {
        //
    }

    public function forceDeleted(Department $department)
    {
        //
    }
}

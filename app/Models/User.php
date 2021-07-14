<?php

namespace App\Models;

use Cog\Flag\Traits\Classic\HasActiveFlag;
use Epigra\Sapiens\Traits\PersonTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use Lab404\Impersonate\Models\Impersonate;

use Spatie\Permission\Traits\HasRoles;

// use Cog\Flag\Traits\Classic\HasVerifiedFlag;
// use Cog\Flag\Traits\Classic\HasApprovedFlag;
// use Spatie\Activitylog\Traits\CausesActivity;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use PersonTrait;
    use HasRoles;
    // use Impersonate;
    use HasActiveFlag;
    // use HasVerifiedFlag;
    // use HasApprovedFlag;
    // use CausesActivity;

    protected static function boot()
    {
        /* TODO: Observer'a aktarılması gerekiyor */

        parent::boot();

        static::deleting(function ($user) { // before delete() method call this
            $user->roles()->sync([]);
            $user->permissions()->sync([]);
            // $user->activity()->delete();
        });
    }

    /**
     * Sapiens üzerinde deaktif olan öğeleri arrayden kaldırmayı unutmayın.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'email_verified_at',
        'is_active',
        'has_email_subscription',
        'has_notification_subscription',
        'city_id',
        'avatar',
        'gender',
        'dob',
        'password',
        'has_email_subscription',
        'has_notification_subscription',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Banned at and active scope.
     */

    // public function shouldApplyBannedAtScope()
    // {
    //     return true;
    // }

    public function shouldApplyActiveFlagScope()
    {
        return true;
    }
}

<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Permission\Models\Role as RolePermission;

class Role extends RolePermission
{
    protected $table = 'roles';
    public $fillable = ['name'];

    /**
     * Enums for the Role's Ids
     */
    const SUPER_ADMIN = 1;
    const ADMIN = 2;
    const MANAGER = 3;
    const AGENT = 4;
    const USER = 5;
    const BUSINESS_MANAGER = 6;
    const STAFF = 7;
    const SEO_MANAGER = 8;

    /**
     * One Role Belongs to many users.
     *
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}

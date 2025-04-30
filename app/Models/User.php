<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasName;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Namu\WireChat\Traits\Chatable;
use Illuminate\Support\Collection;
 
class User extends Authenticatable implements MustVerifyEmail, FilamentUser, HasName{

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
    use Chatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'username', 'fname', 'lname', 'cp_num', 'email',
        'password', 'address_id', 
        'role', 'status', 'profile_picture', 'created_at', 'updated_at',
        'dob', 'gender',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'email_verified_at',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function canAccessPanel(\Filament\Panel $panel): bool
    {
        return $this->role === 'admin'; // Allow only admins
    }

    public function getFullNameAttribute()
    {
        return $this->fname . ' ' . $this->lname;
    }

    public function getFilamentName(): string
    {
        return "{$this->fname} {$this->lname}";
    }

    public function getCoverUrlAttribute(): ?string
    {
      return $this->profile_picture ?? null;
    }

    public function getDisplayNameAttribute(): ?string
    {
      return $this->username ?? 'user';
    }

    public function searchChatables(string $query): ?Collection
    {
     $searchableFields = ['username'];
     return User::where(function ($queryBuilder) use ($searchableFields, $query) {
        foreach ($searchableFields as $field) {
                $queryBuilder->orWhere($field, 'LIKE', '%'.$query.'%');
        }
      })
        ->limit(20)
        ->get();
    }

    public function canCreateChats(): bool
    {
     return $this->hasVerifiedEmail();
    }
}

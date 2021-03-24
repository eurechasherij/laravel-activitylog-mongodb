<?php

namespace Spatie\Activitylog\Contracts;

use Illuminate\Support\Collection;
use Jenssegers\Mongodb\Eloquent\Builder as MongoBuilder;
use Jenssegers\Mongodb\Eloquent\Model as MongoModel;
use Jenssegers\Mongodb\Relations\MorphTo as MongoMorphTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

interface Activity
{
    public function subject(): MorphTo;

    public function causer(): MorphTo;

    public function getExtraProperty(string $propertyName);

    public function changes(): Collection;

    public function scopeInLog(MongoBuilder $query, ...$logNames): MongoBuilder;

    public function scopeCausedBy(Builder $query, Model $causer): Builder;

    public function scopeForSubject(Builder $query, Model $subject): Builder;
}

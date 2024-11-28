<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        
        // Macro whereLike pour la recherche
        Builder::macro('whereLike', function ($attributes, string $searchTerm) {
            $this->where(function (Builder $query) use ($attributes, $searchTerm) {
                foreach (Arr::wrap($attributes) as $attribute) {
                    $query->when(
                        str_contains($attribute, '.'),
                        function (Builder $query) use ($attribute, $searchTerm) {
                            [$relationName, $relationAttribute] = explode('.', $attribute);

                            $query->orWhereHas($relationName, function (Builder $query) use ($relationAttribute, $searchTerm) {
                                $query->where($relationAttribute, 'LIKE', "%{$searchTerm}%");
                            });
                        },
                        function (Builder $query) use ($attribute, $searchTerm) {
                            $query->orWhere($this->qualifyColumn($attribute), 'LIKE', "%{$searchTerm}%");
                        }
                    );
                }
            });

            return $this;
        });

        // Macro orderByRelation pour trier par les colonnes des relations
        Builder::macro('orderByRelation', function ($column, $direction = 'asc') {
            $direction = strtolower($direction) === 'desc' ? 'desc' : 'asc';
            
            if (Str::contains($column, '.')) {
                [$relationName, $relationColumn] = explode('.', $column);
        
                // Récupérer le modèle et la relation
                $model = $this->getModel();
                $relation = $model->$relationName();
        
                // Gérer les types de relations "hasOne", "hasMany", "belongsTo", etc.
                if (method_exists($relation, 'getQualifiedForeignKeyName')) {
                    $foreignKey = $relation->getQualifiedForeignKeyName();
                    $ownerKey = $relation->getQualifiedOwnerKeyName();
                } else {
                    $foreignKey = $relation->getQualifiedParentKeyName();
                    $ownerKey = $relation->getQualifiedForeignKeyName();
                }
        
                // Table liée
                $relatedTable = $relation->getRelated()->getTable();
                $relatedKey = $relation->getRelated()->getKeyName();
        
                return $this->leftJoin($relatedTable, $foreignKey, '=', "{$relatedTable}.{$relatedKey}")
                    ->orderBy("{$relatedTable}.{$relationColumn}", $direction)
                    ->select("{$model->getTable()}.*");
            }
        
            // Si pas de relation, on trie simplement par la colonne donnée
            return $this->orderBy($column, $direction);
        });
        
    }
}

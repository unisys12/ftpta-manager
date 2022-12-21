<?php

namespace App\Tables;

use App\Models\Breed;
use App\Models\Canine;
use App\Models\Breeder;
use App\Models\Veternarian;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\SpladeTable;
use ProtoneMedia\Splade\AbstractTable;

class Canines extends AbstractTable
{
    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the user is authorized to perform bulk actions and exports.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        return true;
    }

    /**
     * The resource or query builder.
     *
     * @return mixed
     */
    public function for()
    {
        return Canine::query();
    }

    /**
     * Configure the given SpladeTable.
     *
     * @param \ProtoneMedia\Splade\SpladeTable $table
     * @return void
     */
    public function configure(SpladeTable $table)
    {
        $table
            ->withGlobalSearch(label: "Search by Canine Name", columns: ['name'])
            ->column('id', sortable: true)
            ->column(
                key: 'name',
                sortable: true,
                searchable: true
            )
            ->column(
                key: 'profile_image'
            )
            ->column(
                key: 'breed.name',
                label: 'Breed',
                sortable: true,
                searchable: true
            )
            ->column(
                key: 'user.name',
                label: 'Client',
                sortable: true,
                searchable: true
            )
            ->column(
                key: 'veternarian.business_name',
                label: 'Veternarian',
                sortable: true,
                searchable: true
            )
            ->column(
                key: 'breeder.business_name',
                label: 'Breeder',
                sortable: true,
                searchable: true
            )
            ->column('action')
            ->paginate(10)
            ->selectFilter(
                key: 'breed.name',
                options: Breed::pluck('name', 'id')->toArray()
            )
            ->selectFilter(
                key: 'veternarian.business_name',
                options: Veternarian::pluck('business_name', 'id')->toArray()
            )
            ->selectFilter(
                key: 'breeder.business_name',
                options: Breeder::pluck('business_name', 'id')->toArray()
            )
            ->rowLink(fn (Canine $canine) => route('canines.show', $canine));
    }
}

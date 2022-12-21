<?php

namespace App\Tables;

use App\Models\Veternarian;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;

class Veternarians extends AbstractTable
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
        return Veternarian::query();
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
            ->withGlobalSearch(label: "Search by office name and/or vets name", columns: ['business_name', 'vet_name'])
            ->column('id', sortable: true)
            ->column('business_name', sortable: true)
            ->column('vet_name', sortable: true)
            ->column('address')
            ->column('city')
            ->column('state')
            ->column('zip')
            ->column('phone')
            ->column('email')
            ->column('action')
            ->paginate(10)
            ->selectFilter(
                key: 'city',
                options: Veternarian::pluck('city', 'id')->toArray(),
                label: 'Find by city'
            )
            ->selectFilter(
                key: 'state',
                options: Veternarian::pluck('state', 'id')->toArray(),
                label: 'Find by state'
            )
            ->selectFilter(
                key: 'zip',
                options: Veternarian::pluck('zip', 'id')->toArray(),
                label: 'Find by zip'
            )
            ->rowLink(fn (Veternarian $veternarian) => route('veternarians.show', $veternarian));

        // ->searchInput()
        // ->selectFilter()
        // ->withGlobalSearch()

        // ->bulkAction()
        // ->export()
    }
}

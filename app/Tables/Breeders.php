<?php

namespace App\Tables;

use App\Models\Breeder;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;

class Breeders extends AbstractTable
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
        return Breeder::query();
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
            ->withGlobalSearch(label: "Search by business name and/or breeders name", columns: ['business_name', 'contact_name'])
            ->column('id', sortable: true)
            ->column('business_name', sortable: true)
            ->column('contact_name', sortable: true)
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
                options: Breeder::pluck('city', 'id')->toArray(),
                label: 'Find by city'
            )
            ->selectFilter(
                key: 'state',
                options: Breeder::pluck('state', 'id')->toArray(),
                label: 'Find by state'
            )
            ->selectFilter(
                key: 'zip',
                options: Breeder::pluck('zip', 'id')->toArray(),
                label: 'Find by zip'
            )
            ->rowLink(fn (Breeder $breeder) => route('breeders.show', $breeder));
    }
}

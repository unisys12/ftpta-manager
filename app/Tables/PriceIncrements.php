<?php

namespace App\Tables;

use App\Models\PriceIncrement;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;

class PriceIncrements extends AbstractTable
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
        return PriceIncrement::query();
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
            ->column('id', sortable: true)
            ->column('inc_name', sortable: true)
            ->column('inc_short_name', sortable: true)
            ->column('created_at', sortable: true)
            ->column('updated_at', sortable: true)
            ->column('action')
            ->rowLink(fn (PriceIncrement $priceIncrement) => route('price_increments.show', $priceIncrement));
    }
}

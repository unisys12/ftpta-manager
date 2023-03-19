<?php

namespace App\Tables;

use App\Models\Reserve;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;

class Reserves extends AbstractTable
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
        return Reserve::query();
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
            ->column('title')
            ->column('allDay')
            ->column('start', sortable: true)
            ->column('end', sortable: true)
            ->column('url', hidden: true)
            ->column('editable')
            ->column('action')
            ->paginate(10)
            ->rowLink(fn (Reserve $reserve) => route('reserves.show', ['reserf' => $reserve]));
    }
}

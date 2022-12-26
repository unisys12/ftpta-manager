<?php

namespace App\Tables;

use App\Models\Service;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;

class Services extends AbstractTable
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
        return Service::query();
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
            ->column('img_path')
            ->column('name')
            ->column('description')
            ->column(
                key: 'service_category.name',
                label: 'Category',
                sortable: true
            )
            ->column('price', sortable: true)
            ->column('price_increment.inc_name', label: 'Rate', sortable: true)
            ->column('action')
            ->rowLink(fn (Service $service) => route('service.show', $service))
            ->paginate(10);
    }
}

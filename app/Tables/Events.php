<?php

namespace App\Tables;

use App\Models\User;
use App\Models\Event;
use App\Models\Canine;
use App\Models\Service;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\SpladeTable;
use ProtoneMedia\Splade\AbstractTable;

class Events extends AbstractTable
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
        return Event::query();
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
            ->withGlobalSearch(columns: ['id', 'canine_id', 'user_id', 'service_category_id'])
            ->column('id', sortable: true)
            ->column('allDay')
            ->column('start', sortable: true)
            ->column('end', sortable: true)
            ->column('title')
            ->column('url', hidden: true)
            ->column('editable')
            ->column('overlap')
            ->column(key: 'service.name', label: 'Service', searchable: true)
            ->column(key: 'canine.name', label: 'Canine', searchable: true)
            ->column(key: 'user.name', label: 'User', searchable: true)
            ->rowLink(fn (Event $event) => route('events.show', $event))
            // Would like to rewrite this only display canines with events
            ->selectFilter(
                key: 'canine.name',
                options: Canine::pluck('name', 'id')->toArray()
            )
            ->selectFilter(
                key: 'user.name',
                options: User::pluck('name', 'id')->toArray()
            )
            ->selectFilter(
                key: 'service.name',
                options: Service::pluck('name', 'id')->toArray()
            )
            ->paginate(10);
    }
}

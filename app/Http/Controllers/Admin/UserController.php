<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class UserController extends Controller
{
    public function index()
    {
        $columns = [
            ['key' => 'id', 'label' => '#', 'sortable' => false, 'type' => 'text'],
            ['key' => 'username', 'label' => 'username', 'sortable' => false, 'type' => 'text'],
            // ['key' => 'img_path', 'label' => 'Img', 'sortable' => false, 'type' => 'img'],
            ['key' => 'is_seller', 'label' => 'is_seller', 'sortable' => false, 'type' => 'boolean'],
            ['key' => 'balance', 'label' => 'balance', 'sortable' => true, 'type' => 'text'],
            ['key' => 'created_at', 'label' => 'date', 'sortable' => false, 'type' => 'date'],
        ];
        $stackedColumns = array_column($columns, 'label');
        $hiddenColumns = request()->get('hiddenColumns', []);
        if ($hiddenColumns) {
            $columns = array_filter($columns, function ($column) use ($hiddenColumns) {
                return !in_array($column['label'], $hiddenColumns);
            });
        }
        $get_columns = array_column($columns, 'key');


        $users = User::query(); // Start with the Eloquent query builder

        $sorts = request()->get('sort', []);
        // dd($sorts);

        if (request()->has('min_balance')) {
            $users = $users->minBalance(request()->get('min_balance'));
        }

        if (request()->has('max_balance')) {
            $users = $users->maxBalance(request()->get('max_balance'));
        }

        if (request()->has('search')) {
            $search = request()->get('search');
            $users->where(function ($q) use ($search) {
                $q->where('username', 'LIKE', "%$search%");
            });
        }
        foreach ($sorts as $column => $direction) {
            if (Schema::hasColumn('users', $column) && in_array($direction, ['asc', 'desc'])) {
                $users->orderBy($column, $direction);
            }
        }

        $users = $users->get($get_columns);
        return view('admin.users.index', [
            'stackedColumns' => $stackedColumns,
            'columns' => $columns,
            'sorts' => $sorts,
            'users' => $users,
        ]);
    }
}

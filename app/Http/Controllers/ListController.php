<?php namespace App\Http\Controllers;

use \Illuminate\Http\Request;

class ListController extends Controller
{
    private $key_id;

    public function __construct()
    {
        $this->key_id = $_GET['key_id'];
    }

    public function all()
    {
        return response()->json(\App\ItemList::where('key_id', $this->key_id)->get());
    }

    public function error(string $message='Undefined error')
    {
        return response()->json([
           'error' => $message
        ]);
    }

    public function keyOwnsList(\App\Key $key, int $listId) : bool
    {
        $list = \App\ItemList::where([
            'key_id' => $key->id,
            'id' => $listId
        ])->get();

        return (count($list) > 0);
    }

    public function create(Request $request)
    {
        $name = $request->input('name');
        if (empty($name)) {
            return $this->error('Name must be set');
        }

        $list = new \App\ItemList();
        $list->name = $name;
        $list->key_id = $_GET['key_id'];

        $result = $list->save();

        if (empty($result)) {
            return $this->error('Failed to save list');
        }

        return $this->read($list->id);
    }

    public function createItem(Request $request, int $listId)
    {
        $name = $request->input('name');
        $position = $request->input('position', 0);
        $custom = $request->input('custom', '{}');

        if (empty($name)) {
            return $this->error('Name must be set');
        }

        $item = new \App\Item();
        $item->name = $name;
        $item->list_id = $listId;
        $item->position = $position;
        $item->custom = $custom;

        $result = $item->save();

        if (empty($result)) {
            return $this->error('Failed to save item');
        }

        return $this->read($listId);
    }

    public function read(int $id)
    {
        if (!$this->keyOwnsList(\App\Key::find($_GET['key_id']), $id)) {
            return $this->error('Permission denied or non existent');
        }

        $response = ['list' => \App\ItemList::find($id), 'items' => []];
        $items = \App\Item::where('list_id', $id)->get();

        if (!empty($items)) {
            $response['items'] = $items;
        }

        return response()->json($response);
    }
}

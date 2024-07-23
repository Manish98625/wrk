<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SettingRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class SettingCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class SettingCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Setting::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/setting');
        CRUD::setEntityNameStrings('setting', 'settings');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::setFromDb(); // set columns from db columns.

CRUD::addColumn([
     'name'=> 'name',
     'type=' => 'text',
     'lable' => 'name',
]);


        /**
         * Columns can be defined using the fluent syntax:
         * - CRUD::column('price')->type('number');
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(SettingRequest::class);
        CRUD::setFromDb(); // set fields from db columns.

        /**
         * Fields can be defined using the fluent syntax:
         * - CRUD::field('price')->type('number');
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
    public function setupShowOperation()
    {
        $this->setupShowOperation();

    }

    // public function index()
    // {
    //     return view('backpack.ui::setting');
    // }

    // public function show()
    // {
    //     $this->crud->allowAccess('show');
    //     $this->crud->setOperationSetting('setFromDb', true);

    //     $this->crud->operation('show', function () {
    //         $this->crud->loadDefaultOperationSettingsFromConfig();

    //         if (!method_exists($this, 'setupShowOperation')) {
    //             $this->autoSetupShowOperation();
    //         }
    //     });

    //     $this->crud->operation('list', function () {
    //         $this->crud->addButton('line', 'show', 'view', 'crud::buttons.show', 'beginning');
    //     });

    //     $this->crud->operation(['create', 'update'], function () {
    //         $this->crud->addSaveAction([
    //             'name' => 'save_and_preview',
    //             'visible' => function ($crud) {
    //                 return $crud->hasAccess('show');
    //             },
    //             'redirect' => function ($crud, $request, $itemId = null) {
    //                 $itemId = $itemId ?: $request->input('id');
    //                 $redirectUrl = $crud->route . '/' . $itemId . '/show';
    //                 if ($request->has('_locale')) {
    //                     $redirectUrl .= '?_locale=' . $request->input('_locale');
    //                 }

    //                 return $redirectUrl;
    //             },
    //             'button_text' => trans('backpack::crud.save_action_save_and_preview'),
    //         ]);
    //     });

    //     return view('backpack.ui::setting');

    }
// }

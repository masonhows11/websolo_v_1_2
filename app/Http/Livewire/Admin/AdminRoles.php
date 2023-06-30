<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class AdminRoles extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $name;
    public $role_id;
    public $delete_id;
    public $edit_mode = false;

    protected function rules()
    {
        return [
            'name' => ['required', 'unique:roles,name', 'min:2', 'max:30'],
        ];
    }

    protected $messages = [
        'name.required' => 'نام نقش الزامی است',
        'name.unique' => 'نام نقش تکراری است',
        'name.min' => 'حداقل ۲ کاراکتر وارد کنید',
        'name.max' => 'حداکثر تعداد کاراکتر مجاز',

    ];

    public function storeRole()
    {
        $this->validate();
        if ($this->edit_mode == false) {
            try {
                Role::create(['name' => $this->name]);
                $this->dispatchBrowserEvent('show-result',
                    ['type' => 'success',
                        'message' => 'نقش مورد نظر با موفقیت ایجاد شد']);
                $this->name = '';
            } catch (\Exception $ex) {
                return view('errors_custom.model_store_error');
            }
        } elseif ($this->edit_mode == true) {
            DB::table('roles')
                ->where('id', $this->role_id)
                ->update(['name' => $this->name]);
            $this->name = '';
            $this->edit_mode = false;
            $this->dispatchBrowserEvent('show-result',
                ['type' => 'success',
                    'message' => 'نقش مورد نظر با موفقیت یروز رسانی شد']);
            // session()->flash('success', 'نقش مورد نظر با موفقیت بروز رسانی شد');
        }
    }


    public function deleteConfirmation($id)
    {
        $this->delete_id = $id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    protected $listeners = [
        'deleteConfirmed' => 'deleteRole'
    ];

    public function deleteRole()
    {
        try {
            Role::destroy($this->delete_id);
            $this->dispatchBrowserEvent('show-result',
                ['type' => 'success',
                    'message' => 'رکورد با موفقیت حذف شد']);
        } catch (\Exception $ex) {
           return view('errors_custom.model_not_found');
        }
        return null;
    }

    public function editRole($id)
    {
        $this->edit_mode = true;
        $role = DB::table('roles')->where('id', $id)->first();
        $this->name = $role->name;
        $this->role_id = $role->id;
    }

    public function render()
    {
        return view('livewire.admin.admin-roles')
            ->extends('admin.include.master')
            ->section('admin_main')
            ->with(['roles' => Role::paginate(10)]);
    }
}

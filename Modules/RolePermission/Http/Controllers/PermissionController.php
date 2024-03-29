<?php

namespace Modules\RolePermission\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use Modules\RolePermission\Entities\Role;
use Modules\RolePermission\Entities\Permission;
use Modules\SidebarManager\Entities\PermissionSection;

class PermissionController extends Controller
{

    public function index(Request $request)
    {
        $role_id = $request['id'];
        if ($role_id == null || $role_id == 1) {
            return redirect(route('permission.roles.index'));
        }
        if ($role_id == 3) {
            $backend = 0;
        } else {
            $backend = 1;
        }

        $query = Permission::where('status', 1)->where('backend', $backend);
        if (!showEcommerce()) {
            $query->where('ecommerce', '!=', 1);
        }
        $PermissionList = $query->get();
        $role = Role::with('permissions')->find($role_id);
        $data['role'] = $role;
        $query = PermissionSection::query();
        if (!showEcommerce()) {
            $query->where('ecommerce', '!=', 1);
        }
        $data['sections'] = $query->with('permissions')->orderBy('position')->get();
        $data['permissions'] = Permission::orderBy('position', 'asc')->get();


        return view('rolepermission::permission', $data);
    }

    public function store(Request $request)
    {
        if (demoCheck()) {
            return redirect()->back();
        }

        $validator = Validator::make($request->all(), [
            'role_id' => "required",
            'module_id' => "required|array"
        ]);

        if ($validator->fails()) {
            Toastr::error('Please Select Minimum one Permission', 'Failed');
            return redirect()->back();
        }

        try {
            $array = array_unique($request->module_id);
            $module_array = [];
            foreach ($array as $key => $value) {
                $module_array[$key]['permission_id'] = $value;
                $module_array[$key]['lms_id'] = Auth::user()->lms_id;
            }
            DB::beginTransaction();
            $role = Role::findOrFail($request->role_id);
            $role->permissions()->wherePivot('lms_id', Auth::user()->lms_id)->detach();

            $role->permissions()->attach($module_array);
            DB::commit();
            Cache::forget('PermissionList_' . SaasDomain());
            Cache::forget('RoleList_' . SaasDomain());


            if (isModuleActive('LmsSaas') || isModuleActive('LmsSaasMD')) {
                $domain = SaasDomain();
            } else {
                $domain = 'main';
            }


            if (isModuleActive('Org')) {
                $sidebars = Role::select('id')->get()->pluck('id')->toArray();
            } else {
                $sidebars = User::select('id')->get()->pluck('id')->toArray();
            }
            foreach ($sidebars as $sidebar) {
                Cache::forget('SidebarPermissionList_' . $sidebar . $domain);
            }

            Toastr::success(trans('common.Operation successful'), trans('common.Success'));
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }
}

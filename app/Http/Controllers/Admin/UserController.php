<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Admin\UserContract as AdminUserContract;
use App\Contracts\UserContract;
use App\DataTables\UserDataTable;
use App\Exceptions\CustomException;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminUserUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;

use function Termwind\render;

class UserController extends Controller
{
    public $user;
    public function __construct(AdminUserContract $user)
    {
        $this->user = $user;
    }
    public function index(UserDataTable $userDataTable)
    {
        try {
            return $userDataTable->render('admin.users.index');
        } catch (CustomException $e) {
            flash($e->getMessage())->error();
            return back();
        } catch (\Exception $e) {
            Helper::logMessage('index userController ', 'none', $e->getMessage());
            flash("Something Went Wrong!")->error();
            return back();
        }
    }
    public function edit($id)
    {
        try {
            $user = $this->user->edit($id);
            return view('admin.users.edit', compact('user'));
        } catch (CustomException $th) {
            Flash::error($th->getMessage());
            return back();
        } catch (\Exception $th) {
            Helper::logMessage('user edit', 'id=' . $id, $th->getMessage());
            Flash::error('Something went wrong!');
            return back();
        }
    }
    public function update(AdminUserUpdateRequest $request, string $id)
    {
        try {
            DB::beginTransaction();
            $user = $this->user->update($request->prepareRequest(), $id);
            DB::commit();
            Flash::success('User Record Updated Successfully.');
            // if ($user->deleted_at === null) {
            //     return redirect()->route('admin.users.index');
            // }
            return back();
        } catch (CustomException $th) {
            DB::rollBack();
            Flash::error($th->getMessage());
            return back();
        } catch (\Exception $th) {
            DB::rollBack();
            Helper::logMessage('user update', $request->input(), $th->getMessage());
            Flash::error('Something went wrong!');
            return back();
        }
    }
    // public function show()
    // {
    //     dd('ok');
    // }
    public function destroy($id)
    {
        try {
            $user = $this->user->delete($id);
            Flash::success('User deleted successfully.');
            return redirect()->route('admin.users.index');
        } catch (CustomException $th) {
            Flash::error($th->getMessage());
            return back();
        } catch (\Exception $th) {
            Helper::logMessage('user delete', 'id=' . $id, $th->getMessage());
            Flash::error('Something went wrong!');
            return back();
        }
    }
    // public function show($id)
    // {
    //     try {

    //         return view('admin.users.show', compact(['dashboard', 'contacts', 'user']));
    //     } catch (CustomException $th) {
    //         Flash::error($th->getMessage());
    //         return back();
    //     } catch (\Exception $th) {
    //         Helper::logMessage('show', 'id=' . $id, $th->getMessage());
    //         Flash::error('Something went wrong!');
    //         return back();
    //     }
    // }
}

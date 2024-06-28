<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Admin\HomeContract;
use App\Exceptions\CustomException;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public $home;
    public function __construct(HomeContract $home)
    {
        $this->home = $home;
    }
    public function index()
    {
        try {
            $data = $this->home->index();
            return view('admin.dashboard.home', compact('data'));
        } catch (CustomException $e) {
            flash($e->getMessage())->error();
            return back();
        } catch (\Exception $e) {
            Helper::logMessage('index userController ', 'none', $e->getMessage());
            flash("Something Went Wrong!")->error();
            return back();
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Contracts\DocumentContract;
use App\Exceptions\CustomException;
use App\Helpers\Helper;
use App\Http\Requests\CreateDocumentsRequest;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserDocumentController extends Controller
{
    public $document;
    public function __construct(DocumentContract $document)
    {
        $this->document = $document;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $documents = $this->document->create();
            return view('user.documents.create', compact('documents'));
        } catch (CustomException $e) {
            flash($e->getMessage())->error();
            return back();
        } catch (\Exception $e) {
            Helper::logMessage('personal Information create ', 'none', $e->getMessage());
            flash("Something Went Wrong!")->error();
            return back();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateDocumentsRequest $request)
    {
        try {
            DB::beginTransaction();
            $this->document->store($request->prepareRequest());
            DB::commit();
            flash('Document Saved Successfully.')->success();
            return back();
        } catch (CustomException $th) {
            DB::rollback();
            flash($th->getMessage())->error();
            return back();
        } catch (\Exception $e) {
            DB::rollback();
            Helper::logMessage('document store ', $request->input(), $e->getMessage());
            flash("Something Went Wrong!")->error();
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $document = $this->document->edit($id);
            $user_id = Auth::id();
            $documents = Document::where('user_id', $user_id)->get();
            return view('user.documents.edit', compact(['document', 'documents']));
        } catch (CustomException $e) {
            flash($e->getMessage())->error();
            return back();
        } catch (\Exception $e) {
            Helper::logMessage('documents edit ', 'id=' . $id, $e->getMessage());
            flash("Something Went Wrong!")->error();
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateDocumentsRequest $request, string $id)
    {
        try {
            DB::beginTransaction();
            $this->document->update($request->prepareRequest(), $id);
            DB::commit();
            flash('Documents Updated Successfully.')->success();
            return redirect()->route('user.documents.create');
        } catch (CustomException $th) {
            DB::rollback();
            flash($th->getMessage())->error();
            return back();
        } catch (\Exception $e) {
            DB::rollback();
            Helper::logMessage('documents Update ', $request->input(), $e->getMessage());
            flash("Something Went Wrong!")->error();
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $this->document->delete($id);
            flash('Document Deleted Successfully!')->success();
            return redirect()->route('user.documents.create');
        } catch (CustomException $e) {
            flash($e->getMessage())->error();
            return back();
        } catch (\Exception $e) {
            Helper::logMessage('documents delete ', 'id=' . $id, $e->getMessage());
            flash("Something Went Wrong!")->error();
            return back();
        }
    }
}

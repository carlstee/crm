<?php

namespace App\Http\Controllers;

use App\Knowledge;
use App\KnowledgeCategory;
use Illuminate\Http\Request;

class KnowledgeController extends Controller
{
    public function addKnow()
    {
        $category = KnowledgeCategory::all();
        return view('backend.knowledge_base.add_new', compact('category'));
    }

    public function indexKnowledge()
    {
        $knoledge = Knowledge::orderBy('id', 'desc')->paginate(15);
        return view('backend.knowledge_base.index', compact('knoledge'));
    }

    public function deleteKnowledge($id)
    {
        Knowledge::whereId($id)->delete();
        return redirect()->back()->withMsg('Blog Deleted');
    }

    public function editKnowledge($id)
    {
        $knowledge = Knowledge::find($id);
        $category = KnowledgeCategory::all();
        return view('backend.knowledge_base.edit', compact('knowledge', 'category'));
    }

    public function categoryStore(Request $request)
    {
       $this->validate($request, [
          'name' => 'required'
       ]);

       KnowledgeCategory::create($request->all());
       return redirect()->back()->withMsg('Category Created');
    }

    public function categoryDelete($id)
    {
        KnowledgeCategory::whereId($id)->delete();
        Knowledge::where('category_id',$id)->delete();
        return redirect()->back()->withMsg('Category Deleted With All Blog');
    }

    public function storeKnowledge(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'title' => 'required',
            'detail' => 'required'
        ]);

        Knowledge::create($request->all());
        return redirect()->back()->withMsg('Knowledge Blog Added');
    }

    public function updateKnowledge(Request $request, $id)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'title' => 'required',
            'detail' => 'required'
        ]);

        Knowledge::whereId($id)
        ->update([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'detail' => $request->detail,
        ]);
        return redirect('admin/knowledge/based')->withMsg('Knowledge Blog Added');
    }

    public function customerIndex()
    {
        $knoledge = Knowledge::orderBy('id', 'desc')->paginate(2);
        return view('customer.knowledge_base.index', compact('knoledge'));
    }
}

<?php


namespace App\Http\Controllers;
use App\Http\Requests\EventRequest;
use App\Models\Event;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class LayoutController extends Controller
{
    public function getLayout(){
        return view('admin.layout.master-layout');
    }

    public function getForm(){
        return view('admin.demo.form',['portfolios' => Portfolio::all()]);
    }

    public function processForm(EventRequest $request){
        $eventName = $request->get('eventName');
        $event =new Event($request->all());
        $event->startDate = date('Y-m-d',strtotime($request->get('startDate')));
        $event->endDate = date("Y-m-d", strtotime($request->get('endDate')));
        $event->save();
        return redirect('/table')->with('success',"Create new Event name = $eventName, Success");
    }

    public function getTable(){
        $totalItem = Event::all();
        $limit = 5;
        return view('admin.demo.table',['totalItem' =>$totalItem,
            'limit'=> $limit,
            'items'=>Event::where('status','!=',-1)->paginate($limit),
            'portfolios' => Portfolio::all()
        ]);
    }

    public function search(Request $request){
        $search = $request->get('keyword');
        $portfolio_id = $request->get('portfolio_id');
        $limit = 5;
        $sort = $request->get('sort');
        switch ($sort) {
            case "nameAsc":
                $typeSort = 'asc';
                $column = 'eventName';
                break;
            case "nameDesc":
                $typeSort = 'Desc';
                $column = 'eventName';
                break;
            case "priceAsc":
                $typeSort = 'asc';
                $column = 'ticketPrice';
                break;
            case "priceDesc":
                $typeSort = 'desc';
                $column = 'ticketPrice';
                break;
        }
        $totalItem = Event::all();
        $event = Event::where('status','!=',-1);
        if (isset($search)){
            $event->where('eventName','like','%'.$search.'%')
                ->orWhere('bandNames','like', '%'.$search.'%');
        }
        if (isset($portfolio_id)){
            $event->where('portfolio_id','=', $portfolio_id);
        }
        if (isset($typeSort) && isset($column)){
                $event->orderBy($column, $typeSort);
        }
        $events= $event->paginate($limit)->appends($request->all());
        return view('admin.demo.table',['totalItem' =>$totalItem,
            'limit'=> $limit,
            'items'=> $events,
            'portfolios' => Portfolio::all(),
            'sort' => $sort,
            'keywordHasQuery' => $search,
            'portfolioHasQuery' => $portfolio_id,
        ]);
    }

    public function getDetail(Request $request){
        $id = $request->get('id');
        return view('admin.demo.detail',['item' =>Event::find($id),'portfolios' => Portfolio::all()]);
    }

    public function getEdit(Request $request){
        $id = $request->get('id');
        return view('admin.demo.edit',['item' => Event::find($id),'portfolios' => Portfolio::all()] );
    }

    public function processEdit(EventRequest $request){
        $request->request->remove('_token');
        $id = $request->get('id');
        $event= Event::find($id);
        $request->request->add([
            'startDate' => date('Y-m-d',strtotime($request->get('startDate'))),
            'endDate' => date('Y-m-d',strtotime($request->get('endDate')))
        ]);
        $event->update($request->all());
//        $event = Event::find($id);
//        $event->eventName = $request->get('eventName');
//        $event->bandNames = $request->get('bandNames');
//        $event->portfolio_id = $request->get('portfolio_id');
//        $event->ticketPrice = $request->get('ticketPrice');
//        $event->status = $request->get('status');
//        $event->save();
        return redirect('/table')->with('success',"Update with ID= $id, Success");
    }

    public function getDelete(Request $request){
        $id = $request->get('id');
        $data =[
            'id' =>Event::where('id','=',$id)->value('id'),
            'eventName' =>Event::where('id','=',$id)->value('eventName'),
            'bandNames' =>Event::where('id','=',$id)->value('bandNames')
        ];
        return view('admin.demo.delete',$data);
    }

    public function processDelete(Request $request){
        $id = $request->get('id');
        $event = Event::find($id);
        $event->delete();
        return redirect('/table')->with('success',"Delete hard with ID= $id, Success");
    }
}

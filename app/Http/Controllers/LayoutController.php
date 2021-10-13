<?php


namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Http\Request;

class LayoutController extends Controller
{
    public function getLayout(){
        return view('admin.layout.master-layout');
    }

    public function getForm(){
        return view('admin.demo.form');
    }

    public function processForm(Request $request){
        $event =new Event();
        $event->eventName = $request->get('eventName');
        $event->bandNames = $request->get('bandNames');
        $event->startDate = date('Y-m-d',strtotime($request->get('startDate')));
        $event->endDate = date("Y-m-d", strtotime($request->get('endDate')));
        $event->portfolio = $request->get('portfolio');
        $event->ticketPrice = $request->get('ticketPrice');
        $event->status = $request->get('status');
        $event->save();
        $LayoutController = new LayoutController();
        return $LayoutController->getTable();
    }

    public function getTable(){
        $data = Event::all();
        return view('admin.demo.table',['items'=>$data]);
    }

    public function getDetail(Request $request){
        $id = $request->get('id');
        $data =[
            'id' =>Event::where('id','=',$id)->value('id'),
            'eventName' =>Event::where('id','=',$id)->value('eventName'),
            'bandNames' =>Event::where('id','=',$id)->value('bandNames'),
            'startDate' =>Event::where('id','=',$id)->value('startDate'),
            'endDate' =>Event::where('id','=',$id)->value('endDate'),
            'portfolio' =>Event::where('id','=',$id)->value('portfolio'),
            'ticketPrice' =>Event::where('id','=',$id)->value('ticketPrice'),
            'status' =>Event::where('id','=',$id)->value('status')
        ];
        return view('admin.demo.detail',$data);
    }

    public function getEdit(Request $request){
        $id = $request->get('id');
        $data =[
            'id' =>Event::where('id','=',$id)->value('id'),
            'eventName' =>Event::where('id','=',$id)->value('eventName'),
            'bandNames' =>Event::where('id','=',$id)->value('bandNames'),
            'startDate' =>Event::where('id','=',$id)->value('startDate'),
            'endDate' =>Event::where('id','=',$id)->value('endDate'),
            'portfolio' =>Event::where('id','=',$id)->value('portfolio'),
            'ticketPrice' =>Event::where('id','=',$id)->value('ticketPrice'),
            'status' =>Event::where('id','=',$id)->value('status')
        ];
        return view('admin.demo.edit',$data);
    }

    public function processEdit(Request $request){
        $id = $request->get('id');
        $event = Event::find($id);
        $event->eventName = $request->get('eventName');
        $event->bandNames = $request->get('bandNames');
        $event->startDate = date('Y-m-d',strtotime($request->get('startDate')));
        $event->endDate = date("Y-m-d", strtotime($request->get('endDate')));
        $event->portfolio = $request->get('portfolio');
        $event->ticketPrice = $request->get('ticketPrice');
        $event->status = $request->get('status');
        $event->save();
        $LayoutController = new LayoutController();
        return $LayoutController->getTable();
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
        $LayoutController = new LayoutController();
        return $LayoutController->getTable();
    }
}

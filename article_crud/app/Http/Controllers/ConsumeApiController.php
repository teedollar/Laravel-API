<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConsumeApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = new \GuzzleHttp\Client();
        $request = $client->get('http://larticles.test/api/articles');
        $data = $request->getBody()->getContents();

        if($data)
        {
            $response = json_decode($data, true);

            return view('api.show', ['response' => $response]);
            
        }




        // echo '<pre>';
        // print_r($response);
        // exit();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('api.create');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required | max:35',
            'body' => 'required'
            
        ]);

        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'http://larticles.test/api/article', [

                'form_params' => [

                    'title' => $request->title,
                    'body' => $request->body,

                ]

            ]


        );

        // $response = $response->getBody()->getContents();
        // echo '<pre>';
        // print_r($response);
        if($response){
            return back()->with('message', 'Article published successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = new \GuzzleHttp\Client();
        //$id = 5;
        $request = $client->get('http://larticles.test/api/article/'.$id);
        $data = $request->getBody()->getContents();
        if($data)
        {
            $response = json_decode($data, true);

            return view('api.showOne')->with('response', $response);
            
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $client = new \GuzzleHttp\Client();
        //$id = 5;
        $request = $client->get('http://larticles.test/api/article/'.$id);
        $data = $request->getBody()->getContents();
        if($data)
        {
            $response = json_decode($data, true);

            return view('api.edit')->with('response', $response);
            
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request, [
            'title' => 'required | max:35',
            'body' => 'required'
            
        ]);

        $client = new \GuzzleHttp\Client();
        $response = $client->put('http://larticles.test/api/article/'.$id, [

                'form_params' => [

                    'title' => $request->title,
                    'body' => $request->body,
                ]
            ]
        );

        if($response){
            return redirect()->action('ConsumeApiController@index')->with('message', 'Article updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $client = new \GuzzleHttp\Client();
        $request = $client->delete('http://larticles.test/api/article/'.$id);
        $data = $request->getBody()->getContents();
        if($data)
        { 
            return back()->with('message', 'Article has been deleted successfully');
        }

        
    }
}

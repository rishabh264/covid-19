<?php

    namespace App\Http\Controllers\Api;
    use App\Http\Controllers\Controller;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;
    
    use Goutte\Client;
    use App\Lib\Scraper;

    use App\Models\General;
    use App\Models\Config;

    class GeneralController extends Controller
    {
  
        public function general(){
            $configs = Config::first();
            $status = 2; 
            if ($configs->auto_update ==1){
                $scraper = new Scraper(new Client());
                $scraper->handle($configs->source);
                $status = $scraper->status == 1? 1: 2;
            }
            $data = General::orderBy('created_at', 'desc')->orderBy('updated_at', 'desc')->first()->setHidden(['id']);
         
            return response()->json([
                'success' => true,
                'message' => "Operation performed successfully.", 
                'data' => $data,
                'status' => $status,
                'license'   => 'This API was developed by rishabh singh (https://github.com/rishabh264) using official information from the government websites'
            ]);
        }

        public function report(){
            $scraper = new Scraper(new Client());
 
            $scraper->handle(Config::first()->source);
            $data = General::orderBy('created_at', 'desc')->orderBy('updated_at', 'desc')->get();
         
            return response()->json([
                'success' => true,
                'message' => "Operation performed successfully.", 
                'data' => $data,
                'status' => $scraper->status == 1? 1: 2,
                'license'   => 'This API was developed by rishabh singh (https://github.com/rishabh264) using official information from the government websites'
            ]);
        }
      
        
    }
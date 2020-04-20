<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;
   

    use App\Models\Tip;

    class TipController extends Controller
    {
  
        public function get(Request $request){
            $request->lang? app()->setLocale($request->lang) :app()->setLocale('pt');
            $tips = Tip::paginate(15);
       
            return response()->json([
                'success' => true,
                'message' => "Operation performed successfully.", 
                'data' => $tips,
                'status' => 1,
                'license'   => 'This API was developed by rishabh singh (https://github.com/rishabh264) using official information from the government websites'
            ]);
         
        }
        public function create(Request $request){
       
                $tip = new Tip();
                $tip->image = $request->image;
                $tip->save();
            
                foreach (['pt', 'en', 'es', 'fr'] as $locale) {
                    $tip->translateOrNew($locale)->title = "Title {$locale}";
                    $tip->translateOrNew($locale)->body = "Body {$locale}";
                }
            
                $tip->save();
            
                echo 'Created an tip with some translations!';
           
        }
      
        
    }
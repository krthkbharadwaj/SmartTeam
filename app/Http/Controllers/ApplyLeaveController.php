<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Middleware\Role;
use Illuminate\Support\Facades\Input;
use App\Invoice;
use Session;
use Validator;
use Illuminate\Support\Facades\DB;


class ApplyLeaveController extends Controller
{
	public function index()
	{
		return View::make('apply-leave');
	}
  public function apply_leave(Request $user_details){
		$uid=0;
		//print_r($_POST['img']);exit;
  	if (Auth::check()) {
  		$uid = Auth::user()->id;
  	}

  	$data = $_POST['imageUrl'];
$tm = time();
$source = fopen($data, 'r');
$destination = fopen('leaves/'.$tm.'.jpg', 'w');

stream_copy_to_stream($source, $destination);

fclose($source);
fclose($destination);
	$fid = DB::table('files')->insertGetId(
     array(
           'file_name' => $tm,
           'file_path' => 'leaves',
           'file_ext' => 'jpg'
     )
	);
	
	DB::table('leaves')->insert(
     array(
           'emp_id' => $_POST['empId'],
           'from_date' => date("Y-m-d", strtotime($_POST['from_date'])),
           'to_date' =>  date("Y-m-d", strtotime($_POST['to_date'])),
           'ip_address' => $_POST['IpAddress'],
           'uid' => $uid,
           'img_id' => $fid
     )
	); 
		 $user_details->session()->flash('alert-success', 'Leave was successfully added!');
		 //Session::flash('success', 'Leave was successful added!');
		 return redirect('/');
	}
}
?>

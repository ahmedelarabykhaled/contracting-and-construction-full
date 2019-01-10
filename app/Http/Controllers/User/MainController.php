<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\MainInfo;
use App\SliderImage;
use App\News;
use App\Photo;
use App\Event;
use App\Service;
use App\Project;
use App\ProjectCategory;
use App\Client;
use App\Activity;
use App\Article;
use App\User;
use App\Admin;
use App\Employee;
use Auth;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    public function show()
    {
        $maininfo = MainInfo::find(10);
        if ($maininfo->content == true) {
            return redirect('home');
        }
        else
        {
            return view('stoppage');
        }
    }
    public function index_home()
    {
        $news = News::get();
        $clients = Client::get();
    	$categories = ProjectCategory::get();
    	$services = Service::get();
    	$events = Event::get();
    	$photos = Photo::get();
    	$sliderimages = SliderImage::get();
    	$maininfo = MainInfo::get();
    	return view('user.home',compact('maininfo','sliderimages','news','photos','events','services','categories','clients'));
    }
    public function add(Request $request)
    {
        $a = new MainInfo;
        $a->info = 'status';
        $a->content = true;
        $a->status = true;
        $a->save();
        return back();
    }
    public function index_mediacenter()
    {
        $activities = Activity::get();
        $news = News::get();
        $photos = Photo::get();
        return view('user.mediacenter',compact('activities','news','photos'));
    }
    public function index_services()
    {
        $services = Service::get();
        return view('user.services',compact('services'));
    }
    public function index_projects()
    {
        $projects = Project::get();
        $categories = ProjectCategory::get();
        return view('user.projects',compact('projects','categories'));
    }
    public function index_articles()
    {
        $articles = Article::get();
        return view('user.articles',compact('articles'));
    }
    public function index_contact()
    {
        $maininfo = MainInfo::get();
        return view('user.contact',compact('maininfo'));
    }
    public function user_login()
    {
        return view('user.userlogin');
    }
    public function user_logout()
    {
        Auth::guard('web')->logout();
        return redirect('/home');
    }
    public function user_register()
    {
        return view('user.userregister');
    }
    public function user_register_check(Request $request)
    {

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        Auth::guard('web')->login($user);
        return redirect('/home');
    }
    public function user_check(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('email',$request->email)->get();
        if (sizeof($user) > 0) {
            $pass = $user[0]->password;
            if (Hash::check($request->password,$pass)) {
                Auth::guard('web')->login($user[0]);
                return redirect('/home');
            }
            else
            {
                return 'worng pass';
            }
        }
        else
        {
            return 'all wrong';
        }
    }
    public function employee_login()
    {
        return view('user.employeelogin');
    }
    public function employee_logout()
    {
        Auth::guard('employee')->logout();
        return redirect('/home');
    }

    public function employee_check(Request $request)
    {
        $employee = Employee::where('email',$request->email)->get();
        // return $employee;
        if (sizeof($employee) > 0) {
            // return 'sdfkn';
            $pass = $request->password;
            if (Hash::check($pass,$employee[0]->password)) {

                Auth::guard('employee')->login($employee[0]);
                return redirect('/home');
            }
            return back();
        }
        return back();
    }
    public function employee_register()
    {
        return view('user.employeeregister');
    }
    public function employee_register_check(Request $request)
    {
        $employee = new Employee;
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->password = Hash::make($request->password);
        $employee->save();
        Auth::guard('employee')->login($employee);
        return redirect('/home');
    }
    public function admin_login()
    {
        return view('admin.login');
    }
    public function admin_login_check(Request $request)
    {
        $admin = Admin::where('email',$request->email)->get();
        if (sizeof($admin) > 0) {
            $pass = $request->password;
            if (Hash::check($pass,$admin[0]->password)) {

                Auth::guard('admin')->login($admin[0]);
                return redirect('admin/dashboard');
            }
            return back();
        }
        return back();
    }
    public function admin_register_check(Request $request)
    {
        $admin = new Admin;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->save();
        Auth::guard('admin')->login($admin);
        return redirect('/home');
    }
    public function admin_logout()
    {
        Auth::guard('admin')->logout();
        return redirect('home');
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
use App\Models\TeacherLevel;

class IsValidTeacher
{
    protected $teacher_level = 0;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $teacher = Auth::user();

            $teach_level_obj = TeacherLevel::where('user_id',$teacher->id)->first();
            if(!empty($teach_level_obj))
            {
                $this->teacher_level = $teach_level_obj->level;
            }
        }

        if($this->teacher_level==0) {
            return redirect('teacher/dashboard');
        }

        return $next($request);
    }
}

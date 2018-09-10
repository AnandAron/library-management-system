<?php

class HomeController extends BaseController {

    public $categories_list = array();
    public $branch_list = array();

    public function __construct() {
        $this->categories_list = Categories::select()->orderBy('category')->get();
        $this->branch_list = Branch::select()->orderBy('id')->get();
    }

	public function home(){    
        $categories= Categories::all();

    
    $data[][]="";
    foreach ($categories as $category){
        $data[$category->id-1][0] = Books::select('book_id','title','author','description','category_id','added_at_timestamp')
            ->where('category_id', '=',$category->id)
            ->orderBy('added_at_timestamp')->count();
        $data[$category->id-1][1]=$category->category;
        $m=Books::select('added_at_timestamp')->where('category_id', '=',$category->id)->max('added_at_timestamp');
        $b_id=DB::table('books')
    ->select('book_id')
    ->where('added_at_timestamp', '=', $m)
    ->first();
    $data[$category->id-1][2]=json_decode(json_encode($b_id),true)['book_id'];
    $j=json_encode($data);
    }   
    
        return View::make('panel.index')
            ->with('categories_list', $this->categories_list)
            ->with('branch_list', $this->branch_list)->with('data', $data);
    }
    public function getBookReport()
    {   

    $results=Books::all();
    $cagories=Categories::all();
    $count=Books::count();
    //PDF file is stored under project/public/download/info.pdf
    $output="<table border='1'><tr>
                        <th>Book ID</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>category</th>
                        <th>isbn</th></tr>";
        for ($i=0; $i < $count; $i++) { 
                $category=Categories::select('category')->where('id','=',$results[$i]->category_id)->first();
                      $output.="<tr>
                        <td>".$results[$i]->book_id."</td>
                        <td>".$results[$i]->title."</td>
                        <td>".$results[$i]->author."</td>
                        <td>".$category->category."</td>
                        <td>".$results[$i]->isbn."</td>" ;
                    }            

                    
   
    $output.="</table>";

   header("Content-Type:application/xls");
   header("Content-Disposition:attachment;filename=Books.xls");
   echo $output;
    }
    public function getStudentReport()
    {   

    $results=Student::all();
    $cagories=Branch::all();
    $count=Student::count();
    //PDF file is stored under project/public/download/info.pdf
    $output="<table border='1'><tr>
                        <th>Student ID</th>
                        <th>Roll Number</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Branch</th>
                        <th>Issued Book</th></tr>";
        for ($i=0; $i < $count; $i++) { 
                $branch=Branch::select('branch')->where('id','=',$results[$i]->branch)->first();
                      $output.="<tr>
                        <td>".$results[$i]->student_id."</td>
                        <td>".$results[$i]->roll_num."</td>
                        <td>".$results[$i]->first_name."</td>
                        <td>".$results[$i]->last_name."</td>
                        <td>".$branch."</td> 
                        <td>".$results[$i]->books_issued."</td>";
                    }            

                    
   
    $output.="</table>";

   header("Content-Type:application/xls");
   header("Content-Disposition:attachment;filename=Students.xls");
   echo $output;
    }
    public function getIssueLogReport()
    {   

    $results=IssueLog::all();
    $cagories=Branch::all();
    $count=IssueLog::count();
    //PDF file is stored under project/public/download/info.pdf
    $output="<table border='1'><tr>
                        <th>Book Issue ID</th>
                        <th>Student IDr</th>
                        <th>Issue By</th>
                        <th>Issued at</th>
                        <th>Return Time</th>
                        <th>TimeStamp</th></tr>";
        for ($i=0; $i < $count; $i++) { 
                $category=Categories::select('category')->where('id','=',$results[$i]->category_id)->first();
                      $output.="<tr>
                        <td>".$results[$i]->book_issue_id."</td>
                        <td>".$results[$i]->student_id."</td>
                        <td>".$results[$i]->issue_by."</td>
                        <td>".$results[$i]->issued_at."</td>
                        <td>".$results[$i]->return_time."</td> 
                        <td>".$results[$i]->time_stamp."</td>";
                    }            

                    
   
    $output.="</table>";

   header("Content-Type:application/xls");
   header("Content-Disposition:attachment;filename=Issues.xls");
   echo $output;
    }

    public function renderReport() {
        $db_control = new HomeController();

        return View::make('panel.report');
    }


}

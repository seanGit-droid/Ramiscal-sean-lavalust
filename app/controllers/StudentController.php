<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class StudentController extends Controller
{
    public function index()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['student_access'] = true;
        $data['page_title'] = "Sean's Student Hub";
        $this->call->view('student_home', $data);
    }

    public function profile()
    {
        $data['page_title'] = "Sean Ivan Ramiscal — Profile";
        $data['student'] = [
            'student_id' => 'MCC2024-00146',
            'name'       => 'Sean Ivan Ramiscal',
            'course'     => 'Bachelor of Science in Information Technology',
            'year'       => '3rd Year',
            'section'    => 'BSIT 3-F2',
            'email'      => 'seanivan.ramiscal@minsumindoro.edu.ph',
            'address'    => 'Lalud, Calapan City, Oriental Mindoro',
            'contact'    => '09153103018',
            'skills'     => 'Fashion Styling, UI Design, Trend Curation',
            'hobbies'    => 'Playing Mobile Legends, Riding Motorcycles, Content Creation',
            'bio'        => "Hey! I'm Sean! a 3rd-year IT major at MinSU. Fashion influencer by day, tech student by night, and full-time motorcycle enthusiast in between.",
            'tiktok'     => 'seannn.i',
            'facebook'   => 'Sean Ivan Ramiscal',
        ];
        $this->call->view('student_profile', $data);
    }
}
?>

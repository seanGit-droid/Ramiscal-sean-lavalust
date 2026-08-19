<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class StudentMiddleware
{
    public function handle($next)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!empty($_SESSION['student_access']) && $_SESSION['student_access'] === true) {
            return $next();
        }

        $_SESSION['access_error'] = 'Access Denied: You cannot access the Student Profile page directly. StudentMiddleware has blocked your request.';
        redirect('student');
    }
}
?>

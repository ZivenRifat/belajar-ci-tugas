<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class RedirectFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Tidak ada tindakan yang dilakukan sebelum request
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Cek apakah user sudah login
        if (session()->get('isLoggedIn')) {
            // Jika user sudah login, redirect ke halaman Contact
            return redirect()->to('contact');
        }
    }
}

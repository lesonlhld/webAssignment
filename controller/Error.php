<?php

namespace Controller;

/**
 * Error
 * @author    Le Trung Son    lesonlhld@gmail.com
 */
class Error extends \Controller\Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        // Call notFound function via constants file
        notFound();
    }
}

<?php

namespace Controller;

/**
 * Error
 * @author    Le Trung Son    lesonlhld@gmail.com
 */
class Error extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        // Call notFound function via root controller
        $this->notFound();
    }
}

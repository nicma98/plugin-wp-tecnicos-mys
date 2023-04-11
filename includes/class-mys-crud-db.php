<?php

/**
 * 
 */
class MYS_CRUD_DB
{
    /**
     * 
     */
    private $db;

    /**
     * 
     */
    public function __construct()
    {
        
        global $wpdb;
        $this->db = $wpdb;
        
    }
}
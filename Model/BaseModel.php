<?php


namespace SupportKd\CyxPostMarkBundle\Model;

/**
 * Created by PhpStorm.
 * User: cyx-Rizwan
 * Date: 4/7/2017
 * Time: 10:30 AM
 */
class BaseModel
{
    /**
     * Persist the OAuth access token and session handle somewhere
     * In my example I am just using the session, but in real world, this is should be a storage engine
     *
     * @param array $params the response parameters as an array of key=value pairs
     */
    public $account_api_token = '';
    public $sender_signature = '';
	
    public function __construct($container)
    {
        $this->account_api_token = $container->getParameter('cyx_post_mark.account_api_token');
        $this->sender_signature = $container->getParameter('cyx_post_mark.sender_signature');
        $this->verify_ssl = $container->getParameter('cyx_post_mark.verify_ssl');
        $this->sandbox_mode = $container->getParameter('cyx_post_mark.sandbox_mode');
        $this->sandbox_email = $container->getParameter('cyx_post_mark.sandbox_email');

    }
   
}
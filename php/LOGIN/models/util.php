<?php

/*
 @author Hector Delcid
 */
 $values = filter_input_array(INPUT_GET);
class util {
    

    public function isPostRequest() {
       return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
   }

   public function isGetRequest() {
       return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'GET' );
   }

    public function redirect($page, array $params = array()) {
        header('Location: ' . $this->createLink($page, $params));
        die();
    }

    public function createLink($page, array $params = array()) {
        return $page . '?' .http_build_query($params);
    }

    public function mailMeme($message, $email, $subject){
        // Send
        $headers =  'MIME-Version: 1.0' . "\r\n";
        $headers .= 'From: Meme User <info@address.com>' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        mail($email, $subject, $message, $headers);
    }



}//end class util

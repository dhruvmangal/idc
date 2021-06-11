<?php

class Crypto{
	
	function __construct(){
		$this->cipher= 'AES-128-CTR';
		$this->privateKey= 'axra3_rts_';
		$this->number= 0;
		$this->auth = 'a124578112154858';	
	}
	function __encrypt($str){
		return openssl_encrypt($str, $this->cipher, $this->privateKey, $this->number, $this->auth);
	}
	
	function __decrypt($token){
		return openssl_decrypt($token, $this->cipher, $this->privateKey, $this->number, $this->auth);
	}

}


?>
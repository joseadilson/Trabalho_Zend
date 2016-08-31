<?php

class AulaController extends Zend_Controller_Action {

	public function indexAction() {

	}

	//http://127.0.0.1:8887/zf1-blog/public/aula/param/id/1/nome/unipar  -> acessar pelo zend
	//http://127.0.0.1:8887/zf1-blog/public/aula/param?id=1&nome=unipar  -> acessar por get

	public function paramAction() {

		$params = $this ->getAllParams();  

		$id = $this ->getParam('id', 5); 
		$nome = $this ->getParam('nome');

		$this ->view ->codigo = $id; 
		$this ->view ->nome = $nome;
	}

	public function valnumerosAction() {

		$val = new Zend_Validate_Digits();

		$valor = 'abc';  

		if(!$val ->isValid($valor)) 
		{
			echo "Houve erros: ";
			print_r($val ->getMessages());  
		}

		exit;
	}

	public function valemailAction() {  

		$val = new Zend_Validate_EmailAddress();

		$valor = 'unipar';

		if(!$val ->isValid($valor)) 
		{
			echo "Houve erros: ";
			print_r($val ->getMessages());
		}

		exit;
	}

	public function valalfabeticoAction() { 
		

		$val = new Zend_Validate_Alpha();

		$valor = 123;

		if(!$val ->isValid($valor)) 
		{
			echo "Houve erros: ";
			print_r($val ->getMessages());
		}

		exit;
	}
	
}
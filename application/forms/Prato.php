<?php

class Application_Form_Prato extends Zend_Form {

    public function init() {
        $this->setMethod('post');

        $nomePrato = new Zend_Form_Element_Text('nomePrato', array(  
        		'label' => 'Nome do prato',
        		'required' => true
        	));
        $this ->addElement($nomePrato);


        $categoria = new Zend_Form_Element_Select('idcategoria', array(
        		'label' => 'Categoria',
        		'required' => true 
        	));
        $this ->addElement($categoria);   


 /*       $login = new Zend_Form_Element_Select('idadmin', array(
                'label' => 'Usuario',
                'required' => true 
            ));
        $this ->addElement($login);    
        $login->setMultiOptions($this ->pegarLogin());
        */  
   
        $categoria ->setMultiOptions($this ->pegarCategorias());

        


        $f = new Zend_Filter_Null();
        $categoria ->addFilter($f);


        $preco = new Zend_Form_Element_Textarea('preco', array( 
        	    'label' => 'Preço do prato',
        	    'required' => true
        	));
        $this ->addElement($preco);

         $botao = new Zend_Form_Element_Submit('botao', array( 
                'label' => 'Salvar'
            ));

         $this ->addElement($botao); 
    }

    public function pegarCategorias() {

    	$tab = new Application_Model_DbTable_Categoria();

        $categorias = $tab ->fetchAll() ->toArray();

        $options = array();
        $options[0] = 'Selecione uma Categoria';
        foreach ($categorias as $item)   
        {
        	$idcategoria = $item['idcategoria'];   
        	$nomeCategoria = $item['categoria'];  

        	$options[$idcategoria] = $nomeCategoria;  
        }

        return $options;
    }

    public function pegarLogin() {

        $tabela = new Application_Model_DbTable_Admin();   

        $loginAdmin = $tabela ->fetchAll() ->toArray();   

        $options = array();
        $options[0] = 'Selecione';
        foreach ($loginAdmin as $item)   
        {
            $idadmin = $item['idadmin'];  
            $nome = $item['nome'];  

            $options[$idadmin] = $nome; 
        }

        return $options;
    }

}

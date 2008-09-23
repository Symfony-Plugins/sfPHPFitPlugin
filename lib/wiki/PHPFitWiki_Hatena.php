<?php

/**
 * @author yusuke.hata
 */
class PHPFitWiki_Hatena extends HatenaSyntax implements PHPFitWiki {
  public function __construct($options = array()){
    if(!is_array($options)) throw new Exception('argument is not array.');
    
    $this->options = $options;
    
    $this->addFirstCharSyntax(new HatenaSyntax_Head($this->getOption('headlevel', 3)));
    $this->addFirstCharSyntax(new HatenaSyntax_Table());
    $this->addFirstCharSyntax(new HatenaSyntax_DefinitionList());
    $this->addFirstCharSyntax(new HatenaSyntax_Default());
    $this->addFirstCharSyntax(new HatenaSyntax_Blockquote(false));
    $this->addFirstCharSyntax(new HatenaSyntax_Blockquote(true));
    $this->addFirstCharSyntax(new HatenaSyntax_List());
    $this->addFirstCharSyntax(new HatenaSyntax_List(true));
    
    $this->addMarkupSyntax(new HatenaSyntax_Pre(false, $this->getOption('htmlescape', false)));
    $this->addMarkupSyntax(new HatenaSyntax_Pre(true));
    $this->addInlineSyntax(new HatenaSyntax_Link());
    
    $this->footnoteSyntax = new HatenaSyntax_Footnote($this->getOption('id', ''));
  }
  
  public function parse($text){
    return parent::parse($text);
  }
}

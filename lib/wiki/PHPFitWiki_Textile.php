<?php

/**
 * @author yusuke.hata
 */
class PHPFitWiki_Textile extends HatenaSyntax implements PHPFitWiki {
  public function __construct($options = array()){
    if(!is_array($options)) throw new Exception('argument is not array.');
    
    $this->options = $options;
    
    $this->addFirstCharSyntax(new HatenaSyntax_Head($this->getOption('headlevel', 3)));
    $this->addFirstCharSyntax(new PHPFitWiki_Textile_TableSyntax());
    $this->addFirstCharSyntax(new HatenaSyntax_DefinitionList());
    $this->addFirstCharSyntax(new HatenaSyntax_Default());
    $this->addFirstCharSyntax(new HatenaSyntax_Blockquote(false));
    $this->addFirstCharSyntax(new HatenaSyntax_Blockquote(true));
    $this->addFirstCharSyntax(new PHPFitWiki_Textile_ListSyntax());
    $this->addFirstCharSyntax(new PHPFitWiki_Textile_ListSyntax(true));
    
    $this->addMarkupSyntax(new HatenaSyntax_Pre(false, $this->getOption('htmlescape', false)));
    $this->addMarkupSyntax(new HatenaSyntax_Pre(true));
    $this->addInlineSyntax(new PHPFitWiki_Textile_LinkSyntax());
    
    $this->footnoteSyntax = new HatenaSyntax_Footnote($this->getOption('id', ''));
  }
  
  public function parse($text){
    return parent::parse($text);
  }
}

/**
 * @author yusuke.hata
 */
class PHPFitWiki_Textile_TableSyntax extends HatenaSyntax_Table {
  
  const TYPE_COLSPAN = '\\';
  const TYPE_ROWSPAN = '/';
  const REG_SPAN = '/^(\W)(\d+)\.(.+)/';
  
  /**
   * the Textile style like syntax
   * @return html as table tag
   */
  public function getResult() {
    $table = $this->table;
    $this->table = array();
    
    $result = '<table>' . PHP_EOL;
    foreach($table as $col) {
      $result .= '<tr>';
      foreach($col as $cell) {
        $cellTrimed = trim($cell);
        if('*' == substr($cellTrimed, 0, 1) && '*' == substr($cellTrimed, -1, 1)) {
          $result .= '<td><strong>' . substr($cellTrimed, 1, -1) . '</strong></td>';
        } else {
          if(preg_match(self::REG_SPAN, $cell, $match)){
            $type = $match[1];
            $count = $match[2];
            $body = $match[3];
            if(self::TYPE_COLSPAN === $type){
              $result .= '<td colspan="' . $count . '">' . $body . '</td>';
            } else if(self::TYPE_ROWSPAN === $type){
              $result .= '<td rowspan="' . $count . '">' . $body . '</td>';
            }
          } else {
            $result .= '<td>' . $cell . '</td>';
          }
        }
      }
      $result .= '</tr>' . PHP_EOL;
    }
    $result .= '</table>' . PHP_EOL;
    return $result;
  }
}

/**
 * @author yusuke.hata
 */
class PHPFitWiki_Textile_LinkSyntax implements HatenaSyntax_InlineSyntaxInterface {
  public function parse($line){
    return preg_replace('/\[\[([^\]]*)\]\]/', '<a href="$1">$1</a>', $line);
  }
}

/**
 * @author yusuke.hata
 */
class PHPFitWiki_Textile_ListSyntax extends HatenaSyntax_List {
  public function __construct($orderedFlag = false){
    if($orderedFlag){
      $this->identifier = '#';
    } else {
      $this->identifier = '*';
    }
  }
  public function getIdentifier(){
    return $this->identifier;
  }
  public function countLevel($line)
  {
    $level = 0;
    $len = strlen($line);
    for($i = 0; $i < $len; $i++) {
      if($line[$i] === '#' || $line[$i] === '*') $level++;
      else break;
    }
    
    return $level - 1;
  }
}

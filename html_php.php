<?php
//https://stackoverflow.com/questions/23062537/how-to-convert-html-to-json-using-php
/*
https://www.w3schools.com/jsref/prop_node_nodetype.asp
NodeType	Named Constant
 1	ELEMENT_NODE
 2	ATTRIBUTE_NODE
 3	TEXT_NODE
 4	CDATA_SECTION_NODE
 5	ENTITY_REFERENCE_NODE
 6	ENTITY_NODE
 7	PROCESSING_INSTRUCTION_NODE
 8	COMMENT_NODE
 9	DOCUMENT_NODE
10	DOCUMENT_TYPE_NODE
11	DOCUMENT_FRAGMENT_NODE
12	NOTATION_NODE


$html = <<<EOF
<form class="form-horizontal">
<fieldset>
<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="textarea">Área de texto</label>
  <div class="col-md-4">
    <textarea class="form-control" id="textarea" name="textarea">Teste</textarea>
  </div>
</div>
</fieldset>
</form>
EOF;
*/
//
header("Content-Type: text/plain");
//
if(isset($_POST['item'])){
  $ret = json_encode(html_to_obj(utf8_decode($_POST['item'])), JSON_PRETTY_PRINT);
  $arr = json_decode($ret, true);//Tudo array
  print_r($ret);
}else{
  print "Sem dados";  
}
/*********************************************************************************************/
function html_to_obj($html) {
    $dom = new DOMDocument();
    $dom->loadHTML($html);
    return element_to_obj($dom->documentElement);
}
/*********************************************************************************************/
function element_to_obj($element) {
    //NÃO É PERMITIDO COMENTÁRIOS NA STRING JSON
    if($element->nodeType==8){
      $obj = array( "tag" => 'remark', "nodeType" => 3, 'data'=>$element->data );
      return $obj;
    }
    //
    $obj = array( "tag" => $element->tagName, "nodeType" => $element->nodeType );
    //
    foreach ($element->attributes as $attribute) {
        $obj[$attribute->name] = $attribute->value;
    }
    foreach ($element->childNodes as $subElement) {
        if ($subElement->nodeType == XML_TEXT_NODE) {
            #$obj["html"] = $subElement->wholeText;
            if(strlen(trim($subElement->wholeText)))
            $obj["children"][] = array('tag'=>'#text', 'nodeType' => $subElement->nodeType, 'content' => $subElement->wholeText );
        }
        else {
            $obj["children"][] = element_to_obj($subElement);
        }
    }
    return $obj;
}
?>

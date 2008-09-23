<!doctype html public "-//w3c//dtd html 4.0 transitional//en">
<html>
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <style type="text/css">
    body {
      margin: 0;
      padding: 0;
    }
    div.content {
      line-height: 1.5;
      margin-left: 1em;
      margin-right: 1em;
    }
    
    div.content h1,
    div.content h2,
    div.content h3,
    div.content h4,
    div.content h5 {
      color: #0562A6;
    }
    
    div.content h3 {
      font-size: 120%;
      border-bottom: 1px solid #0562A6;
      border-left: 10px solid #0562A6;
      padding: 3px 5px;
      margin: 1em 0;
    }
    
    div.content h4 {
      font-size: 100%;
      border-left: 10px solid #0562A6;
      padding: 3px 5px;
      margin: 5px 0;
    }
    
    div.content h5 {
      font-size: 100%;
      padding: 3px 5px;
      margin: 5px 0;
      border-bottom: 1px dotted #0562A6;
    }
    
    div.content p {
      padding: 0;
      margin: 1em 0;
    }
    
    div.content ul,
    div.content ol,
    div.content dl {
      margin-top: 3px;
      margin-bottom: 3px;
      padding-top: 0;
      padding-bottom: 0;
      margin-left: 2em;
      padding-left: 0;
    }
    
    div.content li {
      margin-left: 0;
      padding-left: 0;
      margin-bottom: 0.5em;
    }
    
    div.content dt {
      color: #000;
      font-weight: bold;
    }
    
    div.content dd {
      margin-bottom: 0.5em;
      margin-left: 2em;
    }
    
    div.content pre {
      padding: 3px;
      margin: 1em 0 1em 2em;
      font-family: monospace;
      background-color: #F0F8FF;
      width: 90%;
      overflow: auto;
    }
    
    div.content pre.code {
    }
    
    div.content div {
    }
    
    div.content blockquote {
      clear:both;
      border: 1px dashed #666;
      margin-left: 2em;
      margin-right: 0;
      padding: 5px;
    }
    
    div.content hr {
      border: 0 none;
      border-top: 1px solid #000;
      background-color: transparent;
      height: 0;
      margin: 5px 0;
    }
    
    div.content table {
      font-size: 100%;
      border-collapse: collapse;
      margin: 10px 0;
      padding: 0;
    }
    
    div.content table,
    div.content td {
      color: #333;
      border: 1px solid #93B6D8;
    }
    
    div.content td {
      margin: 0;
      padding: 3px 5px;
    }
    
    div.content td.caption {
      font-weight: bold;
      background-color: #93B6D8;
    }
    div.content td.column {
      font-weight: bold;
      background-color: #9ac;
    }
    
    div.content div.footnote {
      margin-top: 1em;
      padding-top: 5px;
      border-top: 1px solid #999;
    }
    </style>
  </head>
  <body>
    <div class="content">
      <?php echo $sf_content ?>
    </div>
  </body>
</html>
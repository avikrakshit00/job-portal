<!doctype html>
<html>
  <head>
    <title>Create POST</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">

      $(document).ready(function (){
        $('.btn_create_post').on('click', function(e){
          e.preventDefault();
          alert()
          var desc = $("#textBox").html();

          console.log(desc);

        });
      });

    var oDoc, sDefTxt;
    function initDoc() {
    oDoc = document.getElementById("textBox");
    sDefTxt = oDoc.innerHTML;
    if (document.compForm.switchMode.checked) { setDocMode(true); }
    }
    function formatDoc(sCmd, sValue) {
    if (validateMode()) { document.execCommand(sCmd, false, sValue); oDoc.focus(); }
    }
    function validateMode() {
    if (!document.compForm.switchMode.checked) { return true ; }
    alert("Uncheck \"Show HTML\".");
    oDoc.focus();
    return false;
    }
    function setDocMode(bToSource) {
    var oContent;
    if (bToSource) {
    oContent = document.createTextNode(oDoc.innerHTML);
    oDoc.innerHTML = "";
    var oPre = document.createElement("pre");
    oDoc.contentEditable = false;
    oPre.id = "sourceText";
    oPre.contentEditable = true;
    oPre.appendChild(oContent);
    oDoc.appendChild(oPre);
    document.execCommand("defaultParagraphSeparator", false, "div");
    } else {
    if (document.all) {
    oDoc.innerHTML = oDoc.innerText;
    } else {
    oContent = document.createRange();
    oContent.selectNodeContents(oDoc.firstChild);
    oDoc.innerHTML = oContent.toString();
    }
    oDoc.contentEditable = true;
    }
    oDoc.focus();
    }
    </script>
    <style type="text/css">
    .intLink { cursor: pointer; }
    img.intLink { border: 0; }
    #toolBar1 select { font-size:10px; }
    #textBox {
    width: 100%  !important;
    height: 200px;
    border: 1px #000000 solid;
    padding: 12px;
    overflow: scroll;
    }
    #textBox #sourceText {
    padding: 0;
    margin: 0;
    min-width: 498px;
    min-height: 200px;
    }
    #editMode label { cursor: pointer; }
    </style>
  </head>
  <body onload="initDoc();" style="background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);">
    <div class="mt-5 shadow shadow-lg   " >
      <div class="row bg-light p-3 shadow shadow-lg" style="width: 88%;margin-left: 6%;">
      <div class="col-md-6">
        <input type="text" hidden class="session_email" value="{{session('email')}}" >
        <label class="text-danger">Heading</label>
        <input type="text" name="heading" required  class="heading form-control border-bottom mb-2 " >
        <label class="text-danger">Company</label>
        <input type="text" name="company" required class="company form-control border-bottom mb-2" >
        <label class="text-danger">Experience</label>
        <input type="number" name="experience" required class="experience form-control border-bottom mb-2" >
        <label class="text-danger">Salary</label>
        <input type="number" name="salary" required class="salary form-control border-bottom mb-2" >

        <label class="text-danger">Job Last Date</label>
        <input type="date" name="end_date" required class="end_date form-control border-bottom mb-2" >
        <label class="text-danger">Location</label>
        <input type="text" name="location" required class="location form-control border-bottom mb-2" >
      </div>
      <div class="col-md-6">
        <div class="container-fluid">
          <div id="toolBar2" style="margin-bottom: 5px;margin-top: 10px;">
            <button type="button" class="intLink" title="Bold" onclick="formatDoc('bold');">B</button>
            <button type="button" class="intLink" title="Italic" onclick="formatDoc('italic');"><i>I</i></button>
            <button type="button" class="intLink" title="Underline" onclick="formatDoc('underline');"><u>U</u></button>
            <button type="button" class="intLink" title="Left align" onclick="formatDoc('justifyleft');">LEFT</button>
            <button type="button" class="intLink" title="Center align" onclick="formatDoc('justifycenter');">CENTER</button>
            <button type="button" class="intLink" title="Right align" onclick="formatDoc('justifyright');">RIGHT</button>
            <button type="button" class="intLink" title="Numbered list" onclick="formatDoc('insertorderedlist');">U LIST</button>
            <button type="button" class="intLink" title="Dotted list" onclick="formatDoc('insertunorderedlist');">UN LIST</button>
            <button type="button" class="intLink" title="Hyperlink" onclick="var sLnk=prompt('Write the URL here','http:\/\/');if(sLnk&&sLnk!=''&&sLnk!='http://'){formatDoc('createlink',sLnk)}">IMG</button>
          </div>
          <form name="compForm">
            <div id="textBox" contenteditable="true" style="height: 350px"><p>Descripton
            </p></div>
            <p id="editMode" style="display: none;" ><input type="checkbox" name="switchMode" id="switchBox" onchange="setDocMode(this.checked);" /> <label for="switchBox">Show HTML</label></p>
            <p>
              <button class="btn btn-danger mt-5 btn_create_post" type="submit">Submit</button>
            </form>
          </div>
        </div>
      </div>

    </div>
    </body>
  </html>

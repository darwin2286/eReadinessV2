
function addData(val1,val2,val3,val4)
{
  if(val1 == "")
  {
    val1 = 0;
  }
  if(val2 == "")
  {
    val2 = 0;
  }
  if(val3 == "")
  {
    val3 = 0;
  }
  if(val4 == "")
  {
    val4 = 0;
  }
  val1 = parseInt(val1);
  val2 = parseInt(val2);
  val3 = parseInt(val3);
  val4 = parseInt(val4);

  var sum = val1 + val2 + val3 + val4;
  return sum;
}

function sumMale()
{
  if($('#male1').val() == "")
  {
    $('#male1').val(0);
  }
  if($('#male2').val() == "")
  {
    $('#male2').val(0);
  }
  if($('#male3').val() == "")
  {
    $('#male3').val(0);
  }
  if($('#male4').val() == "")
  {
    $('#male4').val(0);
  }
  var male1 = parseInt($('#male1').val());
  var male2 = parseInt($('#male2').val());
  var male3 = parseInt($('#male3').val());
  var male4 = parseInt($('#male4').val());

  var sum = male1 + male2 + male3 + male4;
  return sum;
}
function sumFemale()
{

  if($('#female1').val() == "")
  {
    $('#female1').val(0);
  }
  if($('#female2').val() == "")
  {
    $('#female2').val(0);
  }
  if($('#female3').val() == "")
  {
    $('#female3').val(0);
  }
  if($('#female4').val() == "")
  {
    $('#female4').val(0);
  }
  var female1 = parseInt($('#female1').val());
  var female2 = parseInt($('#female2').val());
  var female3 = parseInt($('#female3').val());
  var female4 = parseInt($('#female4').val());

  var sum = female1 + female2 + female3 + female4;
  return sum;
}
$( document ).ready(function() {
  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
 
   $('#contactnameid2').change(function() {
    if($('#contactnameid2').val()==""){
              $('#contactnameid2').addClass("incorrectinput");
              $('#contactnameid2').removeClass("correctinput");
            }
            else{
               $('#contactnameid2').addClass("correctinput");
               $('#contactnameid2').removeClass("incorrectinput");
            }
  });
  $('#contactdesignationid2').change(function() {
    if($('#contactdesignationid2').val()==""){
              $('#contactdesignationid2').addClass("incorrectinput");
              $('#contactdesignationid2').removeClass("correctinput");
            }
            else{
               $('#contactdesignationid2').addClass("correctinput");
               $('#contactdesignationid2').removeClass("incorrectinput");
            }
  });
  $('#contactnumberid2').change(function() {
    if($('#contactnumberid2').val()==""){
              $('#contactnumberid2').addClass("incorrectinput");
              $('#contactnumberid2').removeClass("correctinput");
            }
            else{
               $('#contactnumberid2').addClass("correctinput");
               $('#contactnumberid2').removeClass("incorrectinput");
            }
  });
  $('#contactemailid2').change(function() {
    if(!emailReg.test($('#contactemailid2').val())){
   
              $('#contactemailid2').addClass("incorrectinput");
              $('#contactemailid2').removeClass("correctinput");
            }
            
            else{
             
              $('#contactemailid2').addClass("correctinput");
               $('#contactemailid2').removeClass("incorrectinput");
            }
  
  
            if($('#contactemailid2').val()==""){
              $('#contactemailid2').addClass("incorrectinput");
              $('#contactemailid2').removeClass("correctinput");
            }
            
            
  
            
  });

  if( $('#contactnameid2').val()){
    $('#nextbutton2').prop('disabled', false);
   }
   $('#contactnumberid2').on('keydown',function(e){
    // Allow: backspace, delete, tab, escape, enter and .
    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
               // Allow: Ctrl+A, Command+A
              (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
               // Allow: home, end, left, right, down, up
              (e.keyCode >= 35 && e.keyCode <= 40)) {
                   // let it happen, don't do anything
                   return;
          }
          // Ensure that it is a number and stop the keypress
          if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
              e.preventDefault();
          }
  
  });
  $('#contactnameid2').keyup(function() {
     
            if($('#contactnameid2').val() != '' && $('#contactdesignationid2').val() != '' && $('#contactnumberid2').val() != '' && $('#contactemailid2').val() != ''  && emailReg.test($('#contactemailid2').val())) {
              
              $('#nextbutton2').prop('disabled', false);
            }
            else{
              
              $('#nextbutton2').prop('disabled', true);
            }
         });
         $('#contactdesignationid2').keyup(function() {
         
            if($('#contactnameid2').val() != '' && $('#contactdesignationid2').val() != '' && $('#contactnumberid2').val() != '' && $('#contactemailid2').val() != '' && emailReg.test($('#contactemailid2').val())) {
              
              $('#nextbutton2').prop('disabled', false);
            }
            else{
              $('#nextbutton2').prop('disabled', true);
            }
         });
         $('#contactnumberid2').keyup(function() {
           
            if($('#contactnameid2').val() != '' && $('#contactdesignationid2').val() != '' && $('#contactnumberid2').val() != '' && $('#contactemailid2').val() != '' && emailReg.test($('#contactemailid2').val())) {
             
              $('#nextbutton2').prop('disabled', false);
            }
            else{
              $('#nextbutton2').prop('disabled', true);
            }
         });
         $('#contactemailid2').keyup(function() {
          
            if($('#contactnameid2').val() != '' && $('#contactdesignationid2').val() != '' && $('#contactnumberid2').val() != '' && $('#contactemailid2').val() != '' && emailReg.test($('#contactemailid2').val())) {
          
              $('#nextbutton2').prop('disabled', false);
            }
            else{
              $('#nextbutton2').prop('disabled', true);
            }
         });

    $('#maleTotal').val(sumMale());
    $('#femaleTotal').val(sumFemale());
    $('[id = "totalInformation Systems Planner"]').val(addData($('[id = "Information Systems Planner1"]').val(),$('[id = "Information Systems Planner2"]').val(),$('[id = "Information Systems Planner3"]').val(),$('[id = "Information Systems Planner4"]').val()));
    $('[id = "totalInformation Technology Officer"]').val(addData($('[id = "Information Technology Officer1"]').val(),$('[id = "Information Technology Officer2"]').val(),$('[id = "Information Technology Officer3"]').val(),$('[id = "Information Technology Officer4"]').val()));
    $('[id = "totalDatabase Manager and Administrator"]').val(addData($('[id = "Database Manager and Administrator1"]').val(),$('[id = "Database Manager and Administrator2"]').val(),$('[id = "Database Manager and Administrator3"]').val(),$('[id = "Database Manager and Administrator4"]').val()));
    $('[id = "totalSystems Analyst / Designer"]').val(addData($('[id = "Systems Analyst / Designer1"]').val(),$('[id = "Systems Analyst / Designer2"]').val(),$('[id = "Systems Analyst / Designer3"]').val(),$('[id = "Systems Analyst / Designer4"]').val()));
    $('[id = "totalComputer Programmer"]').val(addData($('[id = "Computer Programmer1"]').val(),$('[id = "Computer Programmer2"]').val(),$('[id = "Computer Programmer3"]').val(),$('[id = "Computer Programmer4"]').val()));
    $('[id = "totalNetwork Administrator"]').val(addData($('[id = "Network Administrator1"]').val(),$('[id = "Network Administrator2"]').val(),$('[id = "Network Administrator3"]').val(),$('[id = "Network Administrator4"]').val()));
    $('[id = "totalICT Hardware Technician"]').val(addData($('[id = "ICT Hardware Technician1"]').val(),$('[id = "ICT Hardware Technician2"]').val(),$('[id = "ICT Hardware Technician3"]').val(),$('[id = "ICT Hardware Technician4"]').val()));
    $('[id = "totalWebmaster"]').val(addData($('[id = "Webmaster1"]').val(),$('[id = "Webmaster2"]').val(),$('[id = "Webmaster3"]').val(),$('[id = "Webmaster4"]').val()));
    $('[id = "totalWeb Designer"]').val(addData($('[id = "Web Designer1"]').val(),$('[id = "Web Designer2"]').val(),$('[id = "Web Designer3"]').val(),$('[id = "Web Designer4"]').val()));
    $('[id = "totalComputer Encoder"]').val(addData($('[id = "Computer Encoder1"]').val(),$('[id = "Computer Encoder2"]').val(),$('[id = "Computer Encoder3"]').val(),$('[id = "Computer Encoder4"]').val()));
    $('[id = "totalComputer Operator"]').val(addData($('[id = "Computer Operator1"]').val(),$('[id = "Computer Operator2"]').val(),$('[id = "Computer Operator3"]').val(),$('[id = "Computer Operator4"]').val()));
    $('[id = "totalOther ICT Position "]').val(addData($('[id = "Other ICT Position 1"]').val(),$('[id = "Other ICT Position 2"]').val(),$('[id = "Other ICT Position 3"]').val(),$('[id = "Other ICT Position 4"]').val()));
});
$('#male1').on('change',function(){
    $('#maleTotal').val(sumMale());
});
$('#male2').on('change',function(){
    $('#maleTotal').val(sumMale());
});
$('#male3').on('change',function(){
    $('#maleTotal').val(sumMale());
});
$('#male4').on('change',function(){
    $('#maleTotal').val(sumMale());
});
$('#female1').on('change',function(){
    $('#femaleTotal').val(sumFemale());
});
$('#female2').on('change',function(){
    $('#femaleTotal').val(sumFemale());
});
$('#female3').on('change',function(){
    $('#femaleTotal').val(sumFemale());
});
$('#female4').on('change',function(){
    $('#femaleTotal').val(sumFemale());
});
$('[id = "Information Systems Planner1"],[id = "Information Systems Planner2"],[id = "Information Systems Planner3"],[id = "Information Systems Planner4"]').on('change',function(){
    $('[id = "totalInformation Systems Planner"]').val(addData($('[id = "Information Systems Planner1"]').val(),$('[id = "Information Systems Planner2"]').val(),$('[id = "Information Systems Planner3"]').val(),$('[id = "Information Systems Planner4"]').val()));
});
$('[id = "Information Technology Officer2"],[id = "Information Technology Officer2"],[id = "Information Technology Officer3"],[id = "Information Technology Officer4"]').on('change',function(){
    $('[id = "totalInformation Technology Officer"]').val(addData($('[id = "Information Technology Officer1"]').val(),$('[id = "Information Technology Officer2"]').val(),$('[id = "Information Technology Officer3"]').val(),$('[id = "Information Technology Officer4"]').val()));
});
$('[id = "Database Manager and Administrator1"],[id = "Database Manager and Administrator2"],[id = "Database Manager and Administrator3"],[id = "Database Manager and Administrator4"]').on('change',function(){
    $('[id = "totalDatabase Manager and Administrator"]').val(addData($('[id = "Database Manager and Administrator1"]').val(),$('[id = "Database Manager and Administrator2"]').val(),$('[id = "Database Manager and Administrator3"]').val(),$('[id = "Database Manager and Administrator4"]').val()));
});
$('[id = "Systems Analyst / Designer1"],[id = "Systems Analyst / Designer2"],[id = "Systems Analyst / Designer3"],[id = "Systems Analyst / Designer4"]').on('change',function(){
    $('[id = "totalSystems Analyst / Designer"]').val(addData($('[id = "Systems Analyst / Designer1"]').val(),$('[id = "Systems Analyst / Designer2"]').val(),$('[id = "Systems Analyst / Designer3"]').val(),$('[id = "Systems Analyst / Designer4"]').val()));
});
$('[id = "Computer Programmer1"],[id = "Computer Programmer2"],[id = "Computer Programmer3"],[id = "Computer Programmer4"]').on('change',function(){
    $('[id = "totalComputer Programmer"]').val(addData($('[id = "Computer Programmer1"]').val(),$('[id = "Computer Programmer2"]').val(),$('[id = "Computer Programmer3"]').val(),$('[id = "Computer Programmer4"]').val()));
});
$('[id = "Network Administrator1"],[id = "Network Administrator2"],[id = "Network Administrator3"],[id = "Network Administrator4"]').on('change',function(){
    $('[id = "totalNetwork Administrator"]').val(addData($('[id = "Network Administrator1"]').val(),$('[id = "Network Administrator2"]').val(),$('[id = "Network Administrator3"]').val(),$('[id = "Network Administrator4"]').val()));
});
$('[id = "ICT Hardware Technician1"],[id = "ICT Hardware Technician2"],[id = "ICT Hardware Technician3"],[id = "ICT Hardware Technician4"]').on('change',function(){
    $('[id = "totalICT Hardware Technician"]').val(addData($('[id = "ICT Hardware Technician1"]').val(),$('[id = "ICT Hardware Technician2"]').val(),$('[id = "ICT Hardware Technician3"]').val(),$('[id = "ICT Hardware Technician4"]').val()));
});
$('[id = "Webmaster1"],[id = "Webmaster2"],[id = "Webmaster3"],[id = "Webmaster4"]').on('change',function(){
    $('[id = "totalWebmaster"]').val(addData($('[id = "Webmaster1"]').val(),$('[id = "Webmaster2"]').val(),$('[id = "Webmaster3"]').val(),$('[id = "Webmaster4"]').val()));
});
$('[id = "Web Designer1"],[id = "Web Designer2"],[id = "Web Designer3"],[id = "Web Designer4"]').on('change',function(){
    $('[id = "totalWeb Designer"]').val(addData($('[id = "Web Designer1"]').val(),$('[id = "Web Designer2"]').val(),$('[id = "Web Designer3"]').val(),$('[id = "Web Designer4"]').val()));
});
$('[id = "Computer Encoder1"],[id = "Computer Encoder2"],[id = "Computer Encoder3"],[id = "Computer Encoder4"]').on('change',function(){
    $('[id = "totalComputer Encoder"]').val(addData($('[id = "Computer Encoder1"]').val(),$('[id = "Computer Encoder2"]').val(),$('[id = "Computer Encoder3"]').val(),$('[id = "Computer Encoder4"]').val()));
});
$('[id = "Computer Operator1"],[id = "Computer Operator2"],[id = "Computer Operator3"],[id = "Computer Operator4"]').on('change',function(){
    $('[id = "totalComputer Operator"]').val(addData($('[id = "Computer Operator1"]').val(),$('[id = "Computer Operator2"]').val(),$('[id = "Computer Operator3"]').val(),$('[id = "Computer Operator4"]').val()));
});
$('[id = "Other ICT Position 1"],[id = "Other ICT Position 2"],[id = "Other ICT Position 3"],[id = "Other ICT Position 4"]').on('change',function(){
    $('[id = "totalOther ICT Position "]').val(addData($('[id = "Other ICT Position 1"]').val(),$('[id = "Other ICT Position 2"]').val(),$('[id = "Other ICT Position 3"]').val(),$('[id = "Other ICT Position 4"]').val()));
});
$('[id = ".Net6"]').on('change',function(){
  var checkBox = document.getElementById(".Net6");
  if (checkBox.checked == true){
    document.getElementById("number.Net6").readOnly = false;
  } else {
    document.getElementById("number.Net6").readOnly = true;
  }
});
$('[id = "Visual Basic7"]').on('change',function(){
  var checkBox = document.getElementById("Visual Basic7");
  if (checkBox.checked == true){
    document.getElementById("numberVisual Basic7").readOnly = false;
  } else {
    document.getElementById("numberVisual Basic7").readOnly = true;
  }
});
$('[id = "Java (SE, EE)8"]').on('change',function(){
  var checkBox = document.getElementById("Java (SE, EE)8");
  if (checkBox.checked == true){
    document.getElementById("numberJava (SE, EE)8").readOnly = false;
  } else {
    document.getElementById("numberJava (SE, EE)8").readOnly = true;
  }
});
$('[id = "PHP9"]').on('change',function(){
  var checkBox = document.getElementById("PHP9");
  if (checkBox.checked == true){
    document.getElementById("numberPHP9").readOnly = false;
  } else {
    document.getElementById("numberPHP9").readOnly = true;
  }
});
$('[id = "HTML10"]').on('change',function(){
  var checkBox = document.getElementById("HTML10");
  if (checkBox.checked == true){
    document.getElementById("numberHTML10").readOnly = false;
  } else {
    document.getElementById("numberHTML10").readOnly = true;
  }
});
$('[id = "Perl11"]').on('change',function(){
  var checkBox = document.getElementById("Perl11");
  if (checkBox.checked == true){
    document.getElementById("numberPerl11").readOnly = false;
  } else {
    document.getElementById("numberPerl11").readOnly = true;
  }
});
$('[id = "Node JS12"]').on('change',function(){
  var checkBox = document.getElementById("Node JS12");
  if (checkBox.checked == true){
    document.getElementById("numberNode JS12").readOnly = false;
  } else {
    document.getElementById("numberNode JS12").readOnly = true;
  }
});
$('[id = "Python13"]').on('change',function(){
  var checkBox = document.getElementById("Python13");
  if (checkBox.checked == true){
    document.getElementById("numberPython13").readOnly = false;
  } else {
    document.getElementById("numberPython13").readOnly = true;
  }
});
$('[id = "Scala14"]').on('change',function(){
  var checkBox = document.getElementById("Scala14");
  if (checkBox.checked == true){
    document.getElementById("numberScala14").readOnly = false;
  } else {
    document.getElementById("numberScala14").readOnly = true;
  }
});
$('[id = "R15"]').on('change',function(){
  var checkBox = document.getElementById("R15");
  if (checkBox.checked == true){
    document.getElementById("numberR15").readOnly = false;
  } else {
    document.getElementById("numberR15").readOnly = true;
  }
});
$('[id = "Go16"]').on('change',function(){
  var checkBox = document.getElementById("Go16");
  if (checkBox.checked == true){
    document.getElementById("numberGo16").readOnly = false;
  } else {
    document.getElementById("numberGo16").readOnly = true;
  }
});
$('[id = "Other25"]').on('change',function(){
  var checkBox = document.getElementById("Other25");
  if (checkBox.checked == true){
    document.getElementById("numberOther25").readOnly = false;
    document.getElementById("otherSubtopic25").readOnly = false;
  } else {
    document.getElementById("numberOther25").readOnly = true;
    document.getElementById("otherSubtopic25").readOnly = true;
  }
});
$('[id = "MS SQL17"]').on('change',function(){
  var checkBox = document.getElementById("MS SQL17");
  if (checkBox.checked == true){
    document.getElementById("numberMS SQL17").readOnly = false;
  } else {
    document.getElementById("numberMS SQL17").readOnly = true;
  }
});
$('[id = "Oracle18"]').on('change',function(){
  var checkBox = document.getElementById("Oracle18");
  if (checkBox.checked == true){
    document.getElementById("numberOracle18").readOnly = false;
  } else {
    document.getElementById("numberOracle18").readOnly = true;
  }
});
$('[id = "MS Access19"]').on('change',function(){
  var checkBox = document.getElementById("MS Access19");
  if (checkBox.checked == true){
    document.getElementById("numberMS Access19").readOnly = false;
  } else {
    document.getElementById("numberMS Access19").readOnly = true;
  }
});
$('[id = "Postgre21"]').on('change',function(){
  var checkBox = document.getElementById("Postgre21");
  if (checkBox.checked == true){
    document.getElementById("numberPostgre21").readOnly = false;
  } else {
    document.getElementById("numberPostgre21").readOnly = true;
  }
});
$('[id = "No SQL22"]').on('change',function(){
  var checkBox = document.getElementById("No SQL22");
  if (checkBox.checked == true){
    document.getElementById("numberNo SQL22").readOnly = false;
    document.getElementById("otherSubtopic22").readOnly = false;
  } else {
    document.getElementById("numberNo SQL22").readOnly = true;
    document.getElementById("otherSubtopic22").readOnly = true;
  }
});
$('[id = "Other26"]').on('change',function(){
  var checkBox = document.getElementById("Other26");
  if (checkBox.checked == true){
    document.getElementById("numberOther26").readOnly = false;
    document.getElementById("otherSubtopic26").readOnly = false;
  } else {
    document.getElementById("numberOther26").readOnly = true;
    document.getElementById("otherSubtopic26").readOnly = true;
  }
});
$('[id = "MySQL20"]').on('change',function(){
  var checkBox = document.getElementById("MySQL20");
  if (checkBox.checked == true){
    document.getElementById("numberMySQL20").readOnly = false;
  } else {
    document.getElementById("numberMySQL20").readOnly = true;
  }
});

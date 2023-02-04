function prikazDatuma(){
    var datum=(new Date()).toDateString();
    var vreme=(new Date()).toLocaleTimeString(); 
    document.getElementById('DatumVreme').innerHTML=`${datum}-${vreme}`;
  }   
   
  setInterval(function(){  prikazDatuma() }, 1000); 
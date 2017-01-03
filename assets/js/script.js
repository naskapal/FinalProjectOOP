// window.onload = function()
// {
//   var a = document.getElementById('delete');
//   a.onclick = function()
//   {
//     var b = confirm("Yakin Hapus?");
//     if (b == true)
//     {
//       window.location = "deleteJob.php?jobID=".concat(document.getElementById('jobID').value);
//     }
//   }
// }

function del( id ){
  var confirmation = confirm("delete?");
  if( confirmation == true )
    window.location = "deleteEvent.php?jobID="+ id;
  else
    return false;
}

function edit(username){
  var confirmation = confirm("confirm edit "+username+"?");

  return confirmation;
}

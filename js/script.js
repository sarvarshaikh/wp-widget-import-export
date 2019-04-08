function selectAll()
{
    var chk_arr =  document.getElementsByName("widget1[]");
    var chklength = chk_arr.length;             
    for(k=0;k< chklength;k++)
    {
        chk_arr[k].checked = true;
    } 
}

function unselectAll()
{
    var chk_arr =  document.getElementsByName("widget1[]");
    var chklength = chk_arr.length;             
    for(k=0;k< chklength;k++)
    {
        chk_arr[k].checked = false;
    } 
}   


function show_block()
{  
    var x = document.getElementById("wie-myDIV");
    x.style.display = "none";

}


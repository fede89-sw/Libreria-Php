function show(){
    var text1=document.getElementsByName('nome_autore')[0];
    var text2=document.getElementsByName('data_autore')[0];
    var button=document.getElementsByName('SalvaAutoreButton')[0];
    text1.style.display="block";
    text2.style.display="block";
    button.style.display="block";
}

function hide(){
    var text1=document.getElementsByName('nome_autore')[0];
    var text2=document.getElementsByName('data_autore')[0];
    var button=document.getElementsByName('SalvaAutoreButton')[0];
    text1.style.display="none";
    text2.style.display="none";
    button.style.display="none";  
}
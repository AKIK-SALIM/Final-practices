let marks=[];
document.getElementById("calculate").addEventListener('click',function(){
    let ct1=Number(document.getElementById("ct-1").value);
    let ct2=Number(document.getElementById("ct-2").value);
    let ct3=Number(document.getElementById("ct-3").value);

    marks=[ct1,ct2,ct3];

    marks.sort((a,b)=>b-a);

    let avg_ct=marks[0]+marks[1];

    let Mid=Number(document.getElementById("mid").value);
    let Final=Number(document.getElementById("final").value);

    let total_marks=avg_ct+Mid+Final;

    let status="";

    if(total_marks>54){
        status="Passed";
    }
    else{
        status="Failed";
    }

    document.getElementById("answer").innerHTML=`Total Marks: ${total_marks} || Best two ct marks: ${avg_ct}||Midterm marks: ${Mid}||Final marks: ${Final}|| Status: ${status}`;
});
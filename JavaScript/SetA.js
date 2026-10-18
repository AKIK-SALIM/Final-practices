let totalHours=0;
let subjects=[];
let session=0;

document.getElementById("add-study").addEventListener('click', function(){

    let subject_name=document.getElementById("sub-name").value;
    let studyhours= Number(document.getElementById("study-hour").value);
    
    totalHours+=studyhours;
    subjects.push(subject_name);

    session++;

    let avg=totalHours/session;

    let feedback="";

    if(session>7 && totalHours<20){
        feedback="Increase your study time";
    }
    else if(totalHours>=0 && totalHours<=5){
        feedback="Start studying regularly!";
    }
    else if(totalHours>=6 && totalHours<=12){
        feedback="Good Process!";
    }
    else if(totalHours>=13 && totalHours<=19){
        feedback="Almost Ready!";
    }
    else{
        feedback="Weekly goal reached!";
    }

    document.getElementById("feedback").innerHTML=`Total: ${totalHours}|| Average: ${avg}|| Subjects: ${subjects.join(", ")}|| Feedback: ${feedback}`;

});
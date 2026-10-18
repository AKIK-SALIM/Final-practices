let attempt=0;
document.getElementById("strengthen").addEventListener('click',function(){
    let pass=document.getElementById("passwordInput").value;
    attempt++;
    let score=0;

    if(pass.length>=6){
        score+=Math.floor(pass.length/2)*10;
    }

    if(/[A-Z]/.test(pass)){
        score+=15;
    }
    if(/[a-z]/.test(pass)){
        score+=15;
    }
    if(/[0-9]/.test(pass)){
        score+=20;
    }
    if(/[!@#$%^&*]/.test(pass)){
        score+=25;
    }

    let stat="";

    if(score>=100){
        stat="Perfect Password";
    }
    else if(score>=91){
        stat="Very Strong";
    }
    else if(score>=71){
        stat="Strong";
    }
    else if(score>=51){
        stat="Medium";
    }
    else if(score>=31){
        stat="Weak";
    }
    else{
        stat="Very weak";
    }
    let text="";

    if(attempt>8 && score<71){
        text="Need to practice!";
    }
    else{
        text="";
    }

    document.getElementById("Output").innerHTML=`Output: ${stat}   ${text}`;

});
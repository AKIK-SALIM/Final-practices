let daily_calorie_goal=2000;
document.getElementById("save").addEventListener('click',function(){
    let firstInput=Number(document.getElementById("first").value);
    let secondInput=Number(document.getElementById("second").value);
    let thirdInput=Number(document.getElementById("third").value);

    let total_calorie=firstInput+secondInput+thirdInput;

    let entries=0;

    entries++;
    
    let daily="";

    if(total_calorie<daily_calorie_goal){
         daily="Your calorie is less than 2000";
    }
    else if(total_calorie>daily_calorie_goal){
        daily="Your calorie is greater than 2000";
    }
    else{
        daily="Your calorie is equal to 2000";
    }

    let feedback="";

    if(entries>10){
        feedback="Be cautious of frequent snacking!"
    }
    else if(total_calorie>=0 && total_calorie<=800){
        feedback="You're off to a healthy start!";
    }
    else if(total_calorie>=801 && total_calorie<=1600){
        feedback="Good progress, keep it balanced!";
    }
    else if(total_calorie>=1601 && total_calorie<=1999){
        feedback="Almost at your limit!";
    }
    else{
        feedback="Goal reached! Stay Mindful!";
    }

    document.getElementById("output").innerHTML=`Total Calorie: ${total_calorie} || Daily feedback: ${daily} || Feedback: ${feedback}`;

});
let heartRate=[];
let SPO2=[];
document.getElementById("save").addEventListener('click',function(){

    let heartr=Number(document.getElementById("heart-rate").value);
    let spO2=Number(document.getElementById("spo2").value );

    let totalHeart=0;
    let totalspo2=0;
    heartRate.push(heartr);
    SPO2.push(spO2);
    let avg_spo2;
    let avg_rate;

    for(let i=0;i<heartRate.length;i++){
        totalHeart+=heartRate[i];
    }
    avg_rate=totalHeart/heartRate.length;

    for(let i=0;i<SPO2.length;i++){
        totalspo2+=SPO2[i];
    }
    avg_spo2=totalspo2/SPO2.length;

    let riskScore=(100-spO2) * 2 + Math.abs(heartr-80)*0.5;

    let feedback="";

    if(riskScore<=10){
        feedback="SAFE";
    }
    else if(riskScore>10 && riskScore<=20){
        feedback="WARNING";
    }
    else if(riskScore>20){
        feedback="DANGER";
    }


    document.getElementById("feeds").innerHTML=`Average Heart rate: ${avg_rate} || Average Oxygen Saturation: ${avg_spo2} || Risk Score: ${riskScore} || Feedback: ${feedback}`;
    
});
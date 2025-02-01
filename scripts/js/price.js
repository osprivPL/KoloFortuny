const actualColor = 808080;
const defaultColor = 262626;
const values = [null,50,100,150,200,250,500]

function setCookie(cname, cvalue) {
    const d = new Date();
    d.setTime(d.getTime() + 24*60*60*1000);
    let expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
async function price() {
    let location = 1;
    let previous = 0;
    let moves = (Math.random() + 1) * 50;
    let time = 50;


    for (let i = 0; i < moves; i++) {
        if (moves / 2 >= 1) {
            time+=2;
        }
        if (location > 6) {
            location = 1
            previous = 6;
        } else if (location === 2) {
            previous = 1
        }

        sessionStorage.setItem("price", values[location]);

        document.getElementById("r" + location).style.backgroundColor = "#" + actualColor;
        document.getElementById("r" + previous).style.backgroundColor = "#" + defaultColor;

        await new Promise(r => setTimeout(r, time));


        location++;
        previous++
    }

    location--;
    if(location === 0){
        location = 6;
    }

    document.getElementById("losuj").disabled = true;
    document.getElementById("strzel").disabled = false;
    document.getElementById("valueP").innerHTML = String(values[location]);
    setCookie("price", values[location]);


}
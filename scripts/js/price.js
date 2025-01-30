async function price() {
    const actualColor = 808080;
    const defaultColor = 262626;
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

        document.getElementById("r" + location).style.backgroundColor = "#" + actualColor;
        document.getElementById("r" + previous).style.backgroundColor = "#" + defaultColor;

        await new Promise(r => setTimeout(r, time));


        location++;
        previous++
    }
    document.getElementById("losuj").disabled = true;
    document.getElementById("strzel").disabled = false;

}
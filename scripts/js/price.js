function price() {
    const actualColor = 808080;
    const defaultColor = 262626;
    let location = 1;
    let previous = 0;
    let moves = (Math.random() + 1) * 100;

    console.log("przed petla");

    for (let i = 0; i < moves; i++) {
        if (location > 6) {
            location = 1
            previous = 6;
        } else if (location === 2) {
            previous = 1
        }

        document.getElementById("r" + location).style.backgroundColor = "#" + actualColor.toString(16);
        document.getElementById("r" + previous).style.backgroundColor = "#" + defaultColor.toString(16);


        location++;
        previous++
    }
    console.log("po petli");

}
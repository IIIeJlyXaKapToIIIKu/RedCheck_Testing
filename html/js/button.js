var count = 0;
document.getElementById("myButton").onclick = function () {
    count++;
    if (count % 2 == 0) {
        document.getElementById("demo").innerHTML = "";
    }
    else {
        var img = document.createElement("img");
        img.src = "https://itgorky.ru/rest/file/1714/PT_Logo_Second_2_Color-RGB%20(2).png";
        document.getElementById("demo").appendChild(img);
    }
}

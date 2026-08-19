let reset = document.getElementById("reset");
reset.addEventListener("click", function() {
    if(window.confirm("Are you sure you want to reset the form? All entered data will be lost.")){
        document.getElementById("title").value = "";
        document.getElementById("content").value = "";
        document.getElementById("title").style.border = "";
        document.getElementById("content").style.border = "";
    }
});

let title = document.getElementById("title");
let content = document.getElementById("content");
let submit = document.getElementById("submit");
submit.addEventListener("click", function(event) {
    if (title.value === "" || content.value === "") {
        event.preventDefault();
        window.alert("Please fill in all fields before submitting the form.");
        title.style.border = "2px solid red";
        content.style.border = "2px solid red";
    }
});
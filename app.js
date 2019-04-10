function addActorInput() {
    let actorInputs = document.getElementById("actor-inputs");
    let inputField = document.createElement("input");
    inputField.style = "margin-bottom: 0px; border-top: 1px solid black";
    inputField.setAttribute("list", "actors");
    inputField.setAttribute("class", "form-control");
    inputField.setAttribute("id", "movie-actors-input");
    inputField.setAttribute("placeholder", "Actor");
    inputField.setAttribute("name", "actor[]");
    actorInputs.append(inputField);
}

var count = 6; //there are 5 notes initially. Start adding from note 6

//inserting a new note
function addNewNote() {
  var newNote_title = document.createElement("p");
  newNote_title.className = "note_title";
  newNote_title.innerHTML = "Note #" + count;
  var newNote_textarea = document.createElement("textarea");
  newNote_textarea.setAttribute("rows", "8");
  newNote_textarea.setAttribute("cols", "25");
  //delete icon
  var deleteIcon = document.createElement("img");
  deleteIcon.setAttribute("src", "trash-fill.svg");
  deleteIcon.setAttribute("alt", "Delete Note");
  deleteIcon.className = "delete-icon";

  //when clicked, must delete the note
  deleteIcon.addEventListener("click", function () {
    var note = this.parentNode;
    note.parentNode.removeChild(note);
  });

  var newNote = document.createElement("div");

  if (count % 2 != 0) {
    newNote.className = "odd_note";
    newNote_textarea.className = "odd_textarea";
  } else {
    newNote.className = "even_note";
    newNote_textarea.className = "even_textarea";
  }

  newNote.appendChild(newNote_title); //title of note
  newNote.appendChild(newNote_textarea); //textarea
  newNote.appendChild(deleteIcon); //delete image
  document.body.appendChild(newNote); //inserting this note in the body of webpage

  count++;
}

//function to delete note; for initial notes
function deleteNote(note) {
  note.parentNode.removeChild(note);
}
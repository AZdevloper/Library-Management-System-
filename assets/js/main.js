
function update( isbn ,title ,author ,publish_year ,langage , id) {

  document.getElementById("book_isbn").value = isbn;
  document.getElementById("book_author").value = author;
  document.getElementById("book_title").value = title;
  document.getElementById("book_lang").value = langage;
  document.getElementById("book_date").value = publish_year;
  document.getElementById("book_id").value = id;



}
// resit form

function resit() {
  document.getElementById("form-task").reset();
}

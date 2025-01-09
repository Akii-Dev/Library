
function setupCheckbox() {
    const books = document.querySelectorAll("#book-status input[type='checkbox']")
    books.forEach(book => {
        book.addEventListener("change", async () => {
            const bookid = book.id
            const checked = book.checked;
            if (checked === true) {
                document.getElementById(`bookp${bookid}`).innerText = "Finished";
            } else if (checked === false) {
                document.getElementById(`bookp${bookid}`).innerText = "On the shelf";
            }

        })
    });

}

setupCheckbox();
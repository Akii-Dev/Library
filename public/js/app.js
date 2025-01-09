const checkboxes = document.querySelectorAll("#book-status input[type='checkbox']");
for (let i = 0; i < checkboxes.length; i++) {
    const checkbox = checkboxes[i];
    checkbox.addEventListener('change', function () {
        const bookid = checkbox.id;
        const checked = checkbox.checked;

        axios.put('/books/toggle-read', {
            id: bookid, 
            isRead: checked
        })
        .then(function () {
            document.getElementById(`bookp${bookid}`).innerText = checked ? "Finished" : "On the shelf";
        })
        .catch(function (error) {
            console.error(error);
        });
    });
}

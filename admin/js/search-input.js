document.addEventListener("DOMContentLoaded", function () {
  const searchInput = document.getElementById("searchInput");
  const dataTable = document
    .getElementById("zctb")
    .getElementsByTagName("tbody")[0];

  // Function to filter table rows based on search input
  function filterTable() {
    const searchText = searchInput.value.toLowerCase();
    const rows = dataTable.getElementsByTagName("tr");
    Array.from(rows).forEach((row) => {
      const cells = row.getElementsByTagName("td");
      let found = false;
      Array.from(cells).forEach((cell) => {
        const text = cell.textContent.toLowerCase();
        if (text.includes(searchText)) {
          found = true;
        }
      });
      row.style.display = found ? "" : "none";
    });
  }

  // Event listener for search input
  searchInput.addEventListener("keyup", filterTable);
});

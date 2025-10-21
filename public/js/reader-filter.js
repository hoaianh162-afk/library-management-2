const searchInput = document.querySelector('.search-box input');
const tableRows = document.querySelectorAll('.reader-table tbody tr');

function filterReaders() {
  const keyword = searchInput.value.trim().toLowerCase();

  tableRows.forEach(row => {
    const maDocGia = row.cells[0].textContent.trim().toLowerCase();
    const tenDocGia = row.cells[1].textContent.trim().toLowerCase();
    const email = row.cells[2].textContent.trim().toLowerCase();
    const soDienThoai = row.cells[3].textContent.trim().toLowerCase();

    const matchKeyword = (
      maDocGia.includes(keyword) || 
      tenDocGia.includes(keyword) || 
      email.includes(keyword) || 
      soDienThoai.includes(keyword)
    );

    if (matchKeyword) {
      row.style.display = "";
    } else {
      row.style.display = "none";
    }
  });
}

searchInput.addEventListener('input', filterReaders);

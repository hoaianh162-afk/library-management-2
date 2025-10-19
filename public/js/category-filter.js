const tableRows = document.querySelectorAll('.category-table tbody tr');

const searchInput = document.querySelector('.search-box input');

function filterCategories() {
  const keyword = searchInput.value.trim().toLowerCase();

  tableRows.forEach(row => {
    const tenDanhMuc = row.cells[1].textContent.trim().toLowerCase(); // Cột TÊN DANH MỤC (cột 1)

    if (tenDanhMuc.includes(keyword)) {
      row.style.display = ""; 
    } else {
      row.style.display = "none"; 
    }
  });
}

searchInput.addEventListener('input', filterCategories);

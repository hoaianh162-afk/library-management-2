const editOverlay = document.getElementById('editOverlay');
const editModal = document.getElementById('editCategoryModal');
const closeEditModal = document.getElementById('closeEditCategoryModal');
const cancelEditBtn = document.getElementById('cancelEditCategory');

const editMa = document.getElementById('editMa');
const editTen = document.getElementById('editTen');
const editMoTa = document.getElementById('editMoTa');

let currentRow = null;

document.addEventListener('click', function (e) {
  const editBtn = e.target.closest('.edit-icon'); 
  if (!editBtn) return;

  currentRow = editBtn.closest('tr'); 
  if (!currentRow) return;

  const cells = currentRow.querySelectorAll('td');

  editMa.value = cells[0].textContent.trim();
  editTen.value = cells[1].textContent.trim();
  editMoTa.value = cells[2].textContent.trim();

  editOverlay.style.display = 'block';
  editModal.style.display = 'block';
});

function closeEditPopup() {
  editOverlay.style.display = 'none';
  editModal.style.display = 'none';
  currentRow = null;
}

if (closeEditModal) closeEditModal.addEventListener('click', closeEditPopup);
if (cancelEditBtn) cancelEditBtn.addEventListener('click', closeEditPopup);
if (editOverlay) editOverlay.addEventListener('click', closeEditPopup);

document.getElementById('editCategoryForm').addEventListener('submit', function (e) {
  e.preventDefault();

  const ten = editTen.value.trim();
  const moTa = editMoTa.value.trim();

  if (!ten) {
    alert("⚠ Vui lòng nhập tên danh mục.");
    return;
  }

  if (currentRow) {
    const cells = currentRow.querySelectorAll('td');
    cells[1].textContent = ten;
    cells[2].textContent = moTa;
  }

  alert('✅ Cập nhật danh mục thành công!');
  closeEditPopup();
});

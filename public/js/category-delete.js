const deleteModal = document.getElementById('deleteModal');
const modalOverlay = document.querySelector('.modal-overlay'); 
const cancelDeleteBtn = document.getElementById('deleteCancelBtn');
const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
const deleteMessage = document.getElementById('deleteMessage');

let rowToDelete = null;

if (!deleteModal || !modalOverlay || !cancelDeleteBtn || !confirmDeleteBtn || !deleteMessage) {
  console.warn('Một hoặc nhiều phần tử của delete modal không tồn tại trong DOM.');
}

document.addEventListener('click', function (e) {
  const delBtn = e.target.closest('.delete-icon');
  if (!delBtn) return;

  rowToDelete = delBtn.closest('tr');
  if (!rowToDelete) return;

  const cells = rowToDelete.querySelectorAll('td');
  const maSach = (cells[0] && cells[0].textContent) ? cells[0].textContent.trim() : '';
  const tenSach = (cells[1] && cells[1].textContent) ? cells[1].textContent.trim() : '';

  deleteMessage.textContent = `Bạn có chắc muốn xóa danh mục "${tenSach}" (Mã: ${maSach})?`;

  deleteModal.style.display = 'block';
  modalOverlay.style.display = 'block';
});

if (cancelDeleteBtn) {
  cancelDeleteBtn.addEventListener('click', closeDeleteModal);
}

if (confirmDeleteBtn) {
  confirmDeleteBtn.addEventListener('click', () => {
    if (rowToDelete) {
      rowToDelete.remove();
      alert('✅ Đã xóa danh mục thành công.');
    }
    closeDeleteModal();
  });
}

if (modalOverlay) {
  modalOverlay.addEventListener('click', closeDeleteModal);
}

function closeDeleteModal() {
  if (deleteModal) deleteModal.style.display = 'none';
  if (modalOverlay) modalOverlay.style.display = 'none';
  rowToDelete = null;
}

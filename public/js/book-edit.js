const editOverlay = document.getElementById('editOverlay');
const editModal = document.getElementById('editModal');
const closeEditModal = document.getElementById('closeEditModal');
const cancelEditBtn = document.getElementById('cancelEditBtn');

const editMa = document.getElementById('editMa');
const editTen = document.getElementById('editTen');
const editTacGia = document.getElementById('editTacGia');
const editTheLoai = document.getElementById('editTheLoai');
const editSoLuong = document.getElementById('editSoLuong');

let currentRow = null;

if (!editOverlay || !editModal) {
  console.warn('editOverlay hoặc editModal không tìm thấy — kiểm tra DOM/ID.');
}

document.addEventListener('click', function (e) {
  const editBtn = e.target.closest('.edit-icon');
  if (!editBtn) return;

  currentRow = editBtn.closest('tr');
  if (!currentRow) return;

  const cells = currentRow.querySelectorAll('td');
  if (!cells || cells.length < 5) return;

  editMa.value = cells[0].textContent.trim();
  editTen.value = cells[1].textContent.trim();
  editTacGia.value = cells[2].textContent.trim();
  editTheLoai.value = cells[3].textContent.trim();
  editSoLuong.value = cells[4].textContent.trim();

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


document.getElementById('editForm').addEventListener('submit', function(e) {
  e.preventDefault();

  const ma = editMa.value.trim();
  const ten = editTen.value.trim();
  const tacGia = editTacGia.value.trim();
  const theLoai = editTheLoai.value.trim();
  const soLuongStr = editSoLuong.value.trim();
  const soLuongNum = Number(soLuongStr);

  if (!ma || !ten || !tacGia || !theLoai) {
    alert("⚠ Vui lòng nhập đầy đủ thông tin (Mã/Tên/Tác giả/Thể loại).");
    return;
  }

  if (!Number.isFinite(soLuongNum) || soLuongNum <= 0) {
    alert("❌ Số lượng phải là số và lớn hơn 0.");
    return;
  }

  if (currentRow) {
    const cells = currentRow.querySelectorAll('td');
    if (cells && cells.length >= 5) {
      cells[0].textContent = ma;
      cells[1].textContent = ten;
      cells[2].textContent = tacGia;
      cells[3].textContent = theLoai;
      cells[4].textContent = String(soLuongNum);
    } else {
      console.warn('Dòng đang chỉnh sửa không có đủ cột để cập nhật.');
    }
  }

  alert('✅ Đã cập nhật sách thành công!');
  closeEditPopup();
});


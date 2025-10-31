console.log('JS is running');

document.addEventListener('DOMContentLoaded', () => {
    const addCategoryModal = document.getElementById('addCategoryModal');
    const addOverlay = document.getElementById('modalOverlay');
    const openAddCategoryModalBtn = document.getElementById('openAddCategoryModal');
    const closeAddCategoryModalBtn = document.getElementById('closeAddCategoryModal');
    const cancelAddCategoryBtn = document.getElementById('cancelAddCategory');
    const addCategoryForm = document.getElementById('addCategoryForm');
    const categoryTableBody = document.querySelector('.category-table tbody');

    function closeAddModal() {
        addCategoryModal.style.display = 'none';
        addOverlay.style.display = 'none';
        addCategoryForm.reset();
    }

    openAddCategoryModalBtn.addEventListener('click', () => {
        addCategoryModal.style.display = 'block';
        addOverlay.style.display = 'block';
    });

    closeAddCategoryModalBtn.addEventListener('click', closeAddModal);
    cancelAddCategoryBtn.addEventListener('click', closeAddModal);
    addOverlay.addEventListener('click', closeAddModal);

    addCategoryForm.addEventListener('submit', function (e) {
        e.preventDefault();
        const formData = new FormData(addCategoryForm);

        const tenDanhMuc = formData.get('tenDanhMuc').trim();
        if (!tenDanhMuc) {
            alert('⚠ Vui lòng nhập tên danh mục.');
            return;
        }

        let duplicate = false;
        document.querySelectorAll('.category-table tbody tr').forEach(row => {
            const existingTen = row.querySelector('td:nth-child(2)').textContent.trim();
            if (existingTen.toLowerCase() === tenDanhMuc.toLowerCase()) {
                duplicate = true;
            }
        });

        if (duplicate) {
            alert('⚠ Tên danh mục đã tồn tại!');
            return;
        }

        fetch('/admin/category-management-admin', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            },
            body: formData
        })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    alert('✅ Thêm danh mục thành công: ' + data.category.tenDanhMuc);

                    if (categoryTableBody) {
                        const newRow = document.createElement('tr');
                        newRow.setAttribute('data-id', data.category.idDanhMuc);
                        newRow.innerHTML = `
                    <td>${data.category.idDanhMuc}</td>
                    <td>${data.category.tenDanhMuc}</td>
                    <td>${data.category.moTa || '-'}</td>
                    <td class="actions-edit-delete">
                        <svg class="edit-icon">...</svg>
                        <svg class="delete-icon">...</svg>
                    </td>
                `;
                        categoryTableBody.appendChild(newRow);
                    }

                    closeAddModal();
                } else {
                    alert('❌ Lỗi: ' + (data.message || 'Không thể thêm danh mục.'));
                }
            })
            .catch(err => console.error('Fetch error:', err));
    });


    function initEditAndDeleteEvents() {
        if (typeof initEditCategoryEvents === 'function') initEditCategoryEvents();
        if (typeof initDeleteCategoryEvents === 'function') initDeleteCategoryEvents();
    }
});

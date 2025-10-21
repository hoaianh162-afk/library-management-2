  document.querySelectorAll('.reset-icon').forEach(icon => {
    icon.addEventListener('click', function() {
      const row = this.closest('tr');

      const email = row.cells[2].textContent.trim();

      const defaultPassword = "12345678";

      alert(`✅ Mật khẩu của tài khoản ${email} đã được đặt lại thành: ${defaultPassword}`);
    });
  });
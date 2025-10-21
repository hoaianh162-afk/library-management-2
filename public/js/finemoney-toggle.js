document.addEventListener("DOMContentLoaded", function() {
  const rows = document.querySelectorAll(".finemoney-table tbody tr");
  const FINE_PER_DAY = 5000; 

  rows.forEach(row => {
    const daysCell = row.querySelector(".dayslate");
    const fineCell = row.querySelector(".finemoney");
    const statusCell = row.querySelector(".status");

    let daysLate = daysCell.textContent.trim();

    if (!isNaN(daysLate) && daysLate !== "-") {
      let fineAmount = parseInt(daysLate) * FINE_PER_DAY;
      fineCell.textContent = fineAmount.toLocaleString("vi-VN");
    } else {
      fineCell.textContent = "-";
    }

    let statusText = statusCell.textContent.trim().toLowerCase();

    if (statusText.includes("đã trả")) {
      statusCell.classList.add("paiding");
      statusCell.textContent = "Đã trả";
    } else if (statusText.includes("chưa trả")) {
      statusCell.classList.add("notyetpaid");
      statusCell.textContent = "Chưa trả";
    } else {
      statusCell.textContent = "-";
    }
  });
});

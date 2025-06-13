import { Chart } from "@/components/ui/chart"
import $ from "jquery"
// Admin Dashboard JavaScript

$(document).ready(() => {
  // Sidebar toggle
  $("#sidebarCollapse").on("click", () => {
    $("#sidebar").toggleClass("active")
    $("#content").toggleClass("active")
  })

  // Close sidebar on mobile when clicking outside
  $(document).on("click", (e) => {
    if ($(window).width() <= 768) {
      if (!$(e.target).closest("#sidebar, #sidebarCollapse").length) {
        $("#sidebar").removeClass("active")
        $("#content").removeClass("active")
      }
    }
  })

  // Time filter change handler for reports
  $("#timeFilter").on("change", function () {
    if ($(this).val() === "custom") {
      $("#customDateRange").show()
    } else {
      $("#customDateRange").hide()
    }
  })

  // Initialize charts if Chart.js is available
  if (typeof Chart !== "undefined") {
    initializeCharts()
  }

  // Form validation
  $("form").on("submit", function (e) {
    var isValid = true
    $(this)
      .find("input[required], select[required], textarea[required]")
      .each(function () {
        if (!$(this).val()) {
          $(this).addClass("is-invalid")
          isValid = false
        } else {
          $(this).removeClass("is-invalid")
        }
      })

    if (!isValid) {
      e.preventDefault()
      alert("Vui lòng điền đầy đủ thông tin bắt buộc!")
    }
  })

  // Remove validation class on input
  $("input, select, textarea").on("input change", function () {
    $(this).removeClass("is-invalid")
  })

  // Select all checkboxes
  $('thead input[type="checkbox"]').on("change", function () {
    var isChecked = $(this).prop("checked")
    $(this).closest("table").find('tbody input[type="checkbox"]').prop("checked", isChecked)
  })

  // Auto-generate slug from name
  $('input[placeholder*="tên"]').on("input", function () {
    var name = $(this).val()
    var slug = name
      .toLowerCase()
      .replace(/[àáạảãâầấậẩẫăằắặẳẵ]/g, "a")
      .replace(/[èéẹẻẽêềếệểễ]/g, "e")
      .replace(/[ìíịỉĩ]/g, "i")
      .replace(/[òóọỏõôồốộổỗơờớợởỡ]/g, "o")
      .replace(/[ùúụủũưừứựửữ]/g, "u")
      .replace(/[ỳýỵỷỹ]/g, "y")
      .replace(/đ/g, "d")
      .replace(/[^a-z0-9 -]/g, "")
      .replace(/\s+/g, "-")
      .replace(/-+/g, "-")
      .trim("-")

    var slugInput = $(this).closest("form").find('input[placeholder*="slug"], input[placeholder*="Slug"]')
    if (slugInput.length && !slugInput.val()) {
      slugInput.val(slug)
    }
  })

  // Number formatting for Vietnamese currency
  $('input[type="number"]').on("blur", function () {
    var value = $(this).val()
    if (value && $(this).attr("placeholder") === "0") {
      // Format as currency if it's a price field
      var formatted = new Intl.NumberFormat("vi-VN").format(value)
      // Don't actually change the input value, just for display purposes
    }
  })

  // Image preview
  $('input[type="file"]').on("change", function () {
    if (this.files && this.files[0]) {
      var reader = new FileReader()
      reader.onload = (e) => {
        var preview = $(this).siblings(".image-preview")
        if (preview.length === 0) {
          preview = $('<div class="image-preview mt-2"><img class="img-thumbnail" style="max-width: 200px;"></div>')
          $(this).after(preview)
        }
        preview.find("img").attr("src", e.target.result)
      }
      reader.readAsDataURL(this.files[0])
    }
  })

  // Tooltip initialization
  $('[data-toggle="tooltip"]').tooltip()

  // Auto-hide alerts
  $(".alert").delay(5000).fadeOut()
})

// Initialize charts
function initializeCharts() {
  // Area Chart for Revenue
  if ($("#myAreaChart").length) {
    var ctx = document.getElementById("myAreaChart")
    var myLineChart = new Chart(ctx, {
      type: "line",
      data: {
        labels: [
          "Tháng 1",
          "Tháng 2",
          "Tháng 3",
          "Tháng 4",
          "Tháng 5",
          "Tháng 6",
          "Tháng 7",
          "Tháng 8",
          "Tháng 9",
          "Tháng 10",
          "Tháng 11",
          "Tháng 12",
        ],
        datasets: [
          {
            label: "Doanh thu",
            lineTension: 0.3,
            backgroundColor: "rgba(78, 115, 223, 0.05)",
            borderColor: "rgba(78, 115, 223, 1)",
            pointRadius: 3,
            pointBackgroundColor: "rgba(78, 115, 223, 1)",
            pointBorderColor: "rgba(78, 115, 223, 1)",
            pointHoverRadius: 3,
            pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
            pointHoverBorderColor: "rgba(78, 115, 223, 1)",
            pointHitRadius: 10,
            pointBorderWidth: 2,
            data: [1850, 1650, 2100, 1950, 2250, 2400, 2650, 2350, 2550, 2750, 2475, 2850],
          },
        ],
      },
      options: {
        maintainAspectRatio: false,
        layout: {
          padding: {
            left: 10,
            right: 25,
            top: 25,
            bottom: 0,
          },
        },
        scales: {
          xAxes: [
            {
              time: {
                unit: "date",
              },
              gridLines: {
                display: false,
                drawBorder: false,
              },
              ticks: {
                maxTicksLimit: 7,
              },
            },
          ],
          yAxes: [
            {
              ticks: {
                maxTicksLimit: 5,
                padding: 10,
                callback: (value, index, values) => value + " triệu",
              },
              gridLines: {
                color: "rgb(234, 236, 244)",
                zeroLineColor: "rgb(234, 236, 244)",
                drawBorder: false,
                borderDash: [2],
                zeroLineBorderDash: [2],
              },
            },
          ],
        },
        legend: {
          display: false,
        },
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          titleMarginBottom: 10,
          titleFontColor: "#6e707e",
          titleFontSize: 14,
          borderColor: "#dddfeb",
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          intersect: false,
          mode: "index",
          caretPadding: 10,
          callbacks: {
            label: (tooltipItem, chart) => {
              var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || ""
              return datasetLabel + ": " + tooltipItem.yLabel + " triệu VNĐ"
            },
          },
        },
      },
    })
  }

  // Pie Chart for Categories
  if ($("#myPieChart").length) {
    var ctxPie = document.getElementById("myPieChart")
    var myPieChart = new Chart(ctxPie, {
      type: "doughnut",
      data: {
        labels: ["Sofa", "Bàn ghế", "Tủ kệ", "Giường ngủ"],
        datasets: [
          {
            data: [45, 28, 18, 9],
            backgroundColor: ["#4e73df", "#1cc88a", "#36b9cc", "#f6c23e"],
            hoverBackgroundColor: ["#2e59d9", "#17a673", "#2c9faf", "#f4b619"],
            hoverBorderColor: "rgba(234, 236, 244, 1)",
          },
        ],
      },
      options: {
        maintainAspectRatio: false,
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          borderColor: "#dddfeb",
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          caretPadding: 10,
        },
        legend: {
          display: false,
        },
        cutoutPercentage: 80,
      },
    })
  }

  // Revenue Chart for Reports page
  if ($("#revenueChart").length) {
    var ctxRevenue = document.getElementById("revenueChart")
    var revenueChart = new Chart(ctxRevenue, {
      type: "line",
      data: {
        labels: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15"],
        datasets: [
          {
            label: "Doanh thu",
            lineTension: 0.3,
            backgroundColor: "rgba(78, 115, 223, 0.05)",
            borderColor: "rgba(78, 115, 223, 1)",
            pointRadius: 3,
            pointBackgroundColor: "rgba(78, 115, 223, 1)",
            pointBorderColor: "rgba(78, 115, 223, 1)",
            pointHoverRadius: 3,
            pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
            pointHoverBorderColor: "rgba(78, 115, 223, 1)",
            pointHitRadius: 10,
            pointBorderWidth: 2,
            data: [85, 92, 78, 95, 88, 105, 98, 87, 93, 102, 89, 96, 91, 88, 94],
          },
        ],
      },
      options: {
        maintainAspectRatio: false,
        layout: {
          padding: {
            left: 10,
            right: 25,
            top: 25,
            bottom: 0,
          },
        },
        scales: {
          xAxes: [
            {
              gridLines: {
                display: false,
                drawBorder: false,
              },
              ticks: {
                maxTicksLimit: 7,
              },
            },
          ],
          yAxes: [
            {
              ticks: {
                maxTicksLimit: 5,
                padding: 10,
                callback: (value, index, values) => value + " triệu",
              },
              gridLines: {
                color: "rgb(234, 236, 244)",
                zeroLineColor: "rgb(234, 236, 244)",
                drawBorder: false,
                borderDash: [2],
                zeroLineBorderDash: [2],
              },
            },
          ],
        },
        legend: {
          display: false,
        },
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          titleMarginBottom: 10,
          titleFontColor: "#6e707e",
          titleFontSize: 14,
          borderColor: "#dddfeb",
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          intersect: false,
          mode: "index",
          caretPadding: 10,
          callbacks: {
            label: (tooltipItem, chart) => {
              var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || ""
              return datasetLabel + ": " + tooltipItem.yLabel + " triệu VNĐ"
            },
          },
        },
      },
    })
  }

  // Category Chart for Reports page
  if ($("#categoryChart").length) {
    var ctx = document.getElementById("categoryChart")
    var categoryChart = new Chart(ctx, {
      type: "doughnut",
      data: {
        labels: ["Sofa", "Bàn ghế", "Tủ kệ", "Giường ngủ"],
        datasets: [
          {
            data: [45, 28, 18, 9],
            backgroundColor: ["#4e73df", "#1cc88a", "#36b9cc", "#f6c23e"],
            hoverBackgroundColor: ["#2e59d9", "#17a673", "#2c9faf", "#f4b619"],
            hoverBorderColor: "rgba(234, 236, 244, 1)",
          },
        ],
      },
      options: {
        maintainAspectRatio: false,
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          borderColor: "#dddfeb",
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          caretPadding: 10,
          callbacks: {
            label: (tooltipItem, chart) => {
              var datasetLabel = chart.labels[tooltipItem.index]
              var value = chart.datasets[0].data[tooltipItem.index]
              return datasetLabel + ": " + value + "%"
            },
          },
        },
        legend: {
          display: false,
        },
        cutoutPercentage: 80,
      },
    })
  }
}

// Utility functions
function formatCurrency(amount) {
  return new Intl.NumberFormat("vi-VN", {
    style: "currency",
    currency: "VND",
  }).format(amount)
}

function formatNumber(number) {
  return new Intl.NumberFormat("vi-VN").format(number)
}

function showAlert(message, type = "success") {
  var alertClass = "alert-" + type
  var alert = $(
    '<div class="alert ' +
      alertClass +
      ' alert-dismissible fade show" role="alert">' +
      message +
      '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
      '<span aria-hidden="true">&times;</span>' +
      "</button>" +
      "</div>",
  )

  $(".container-fluid").prepend(alert)

  setTimeout(() => {
    alert.fadeOut()
  }, 5000)
}

// Export functions
function exportToExcel(tableId, filename) {
  // This would require a library like SheetJS or similar
  console.log("Export to Excel functionality would be implemented here")
}

function printReport() {
  window.print()
}

// Logout function
function logout() {
  if (confirm("Bạn có chắc chắn muốn đăng xuất?")) {
    // Clear session data
    sessionStorage.removeItem("currentUser")
    localStorage.removeItem("rememberedUsername")
    localStorage.removeItem("loginTime")

    // Show logout message
    alert("Đã đăng xuất thành công!")

    // Redirect to login page
    window.location.href = "login.html"
  }
}

// Session timeout warning
let sessionWarningShown = false

setInterval(() => {
  const currentUser = sessionStorage.getItem("currentUser")
  if (currentUser) {
    const userData = JSON.parse(currentUser)
    const loginTime = new Date(userData.loginTime)
    const now = new Date()
    const hoursSinceLogin = (now - loginTime) / (1000 * 60 * 60)

    // Warn at 23 hours (1 hour before expiry)
    if (hoursSinceLogin > 23 && !sessionWarningShown) {
      sessionWarningShown = true
      if (confirm("Phiên đăng nhập sắp hết hạn. Bạn có muốn gia hạn không?")) {
        // Refresh session
        userData.loginTime = new Date().toISOString()
        sessionStorage.setItem("currentUser", JSON.stringify(userData))
        sessionWarningShown = false
      }
    }
  }
}, 60000) // Check every minute

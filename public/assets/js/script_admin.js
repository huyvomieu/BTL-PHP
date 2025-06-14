
// import $ from "jquery"
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

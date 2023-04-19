$(document).ready(function () {
    // Replace all form elements with class DateArea with Pikaday date picker
    $(".DateArea").each(function () {
      const picker = new Pikaday({
        field: this,
        format: "Y-m-d",
        toString(date) {
          const day = date.getDate();
          const month = date.getMonth() + 1;
          const year = date.getFullYear();
          return year + "-" + (month < 10 ? "0" + month : month) + "-" + (day < 10 ? "0" + day : day);
        },
        parse(dateString) {
          const parts = dateString.split("-");
          const year = parseInt(parts[0], 10);
          const month = parseInt(parts[1], 10) - 1;
          const day = parseInt(parts[2], 10);
          return new Date(year, month, day);
        },
        yearRange: [1900, 2050],
        showMonthAfterYear: true,
        use24hour: true,
        showYearSelect: true,
        onOpen() {
          const yearInput = this._picker.querySelector(".pika-select-year");
          if (yearInput) {
            yearInput.classList.add("form-select", "form-select-sm");
          }
        },
      });
    });
    // Submit form data in MySQL default date format
    $("form").submit(function () {
      $(".DateArea").each(function () {
        const date = picker.getMoment();
        $(this).next(".flatpickr-alt-input").val(date ? date.format("YYYY-MM-DD") : null);
      });
    });
  });



window.addEventListener('DOMContentLoaded', function() {


        // Submit form data in MySQL default date format




    function SwitchClass(el, remove, add) {

        var element = $('.'+el);

        if (element.length > 0){
            element.addClass(add);
            element.removeClass(remove);
        }


    }

    SwitchClass('form-select', 'form-select-solid', 'jesus');
});



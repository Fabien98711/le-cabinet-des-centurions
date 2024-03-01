$(document).ready(function () {
  $("#date").kendoDatePicker({
    value: new Date(),
    min: new Date(),
    format: "yyyy-MM-dd",

    disableDates: ["sa", "su"],
  });
});

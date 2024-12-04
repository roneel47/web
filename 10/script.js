function loadTextWithoutJQuery() {
  const xhr = new XMLHttpRequest();
  xhr.open("GET", "textfile.txt", true);
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // Replace content instead of appending
      document.getElementById("textWithoutJQuery").innerText = xhr.responseText;
    }
  };
  xhr.send();
}
$(document).ready(function () {
  $("#loadTextWithJQuery").click(function () {
    $.ajax({
      url: "textfile.txt",
      type: "GET",
      success: function (data) {
        // Replace content instead of appending
        $("#textWithJQuery").text(data);
      },
      error: function () {
        $("#textWithJQuery").text("Failed to load content.");
      },
    });
  });
});
$(document).ready(function () {
  $("#loadJson").click(function () {
    $.getJSON("data.json", function (data) {
      let content = "<ul>";
      $.each(data, function (key, value) {
        content += `<li>${key}: ${value}</li>`;
      });
      content += "</ul>";
      $("#jsonData").html(content);
    });
  });
});
$(document).ready(function () {
  $("#parseJsonButton").click(function () {
    // Simulate JSON data
    const jsonString = '{"name": "John", "age": 25, "city": "New York"}';
    const parsedData = $.parseJSON(jsonString);
    let output = `<p>Name: ${parsedData.name}</p>`;
    output += `<p>Age: ${parsedData.age}</p>`;
    output += `<p>City: ${parsedData.city}</p>`;
    $("#parsedJsonData").html(output);
  });
});

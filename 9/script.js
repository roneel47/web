$(document).ready(function() {
// a. Appends user input to paragraph and list
$("#appendParagraphBtn").click(function() {
const paragraphText = $("#paragraphInput").val();
if (paragraphText) {
$("#myParagraph").append(" " + paragraphText);
$("#paragraphInput").val(""); // Clear the input field
  } else {
alert("Please enter text to add to the paragraph.");
}
});
$("#appendListBtn").click(function() {
const listItemText = $("#listInput").val();
if (listItemText) {
$("#myList").append("<li>" + listItemText + "</li>");
$("#listInput").val(""); // Clear the input field
} else {
alert("Please enter text to add to the list.");
}
});
// b. Animate the div and change CSS properties
$(".animatedDiv").click(function() {
$(this).animate({
width: "180px",
height: "180px",
fontSize: "1.2em",
lineHeight: "180px"
}, 800, function() {
// c. Change the color after animation
$(this).css("background-color", "#ff5733");
});
});
});

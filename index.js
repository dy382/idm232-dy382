// const searchInput = document.getElementById("searchInput");
// const searchButton = document.getElementById("searchButton");

// searchButton.addEventListener('click', () => {
//   const searchTerm = searchInput.value;
//   const fileName = searchTerm + ".txt"; 

//   fetch(fileName)
//     .then(response => {
//       if (response.ok) {
//         // File exists, create a link to it
//         const link = document.createElement("a");
//         link.href = fileName;
//         link.target = "_blank";
//         link.textContent = "Open " + fileName;
//         document.body.appendChild(link);
//       } else {
//         // File not found
//         alert("File not found");
//       }
//     });
// });

  document.getElementById("searchButton").addEventListener("click", function() {
    const searchValue = document.getElementById("searchInput").value.trim();
    if (!searchValue) {
      // You can add additional checks or validation here if needed
      window.location.href = "noresultsfound.html";
    } else {
      // You can replace this with actual search functionality
      window.location.href = "noresultsfound.html"; // Redirect if search doesn't return results
    }
  });
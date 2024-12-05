const response = await fetch(`search.php?query=${encodeURIComponent(query)}`);


document.addEventListener("DOMContentLoaded", () => {
  const searchInput = document.getElementById("searchInput");
  const searchButton = document.getElementById("searchButton");
  const recipeCards = document.getElementById("recipeCards");

  // Fetch recipes dynamically
  const fetchRecipes = async (query = "") => {
      const response = await fetch(`search.php?query=${encodeURIComponent(query)}`);
      const data = await response.text();
      recipeCards.innerHTML = data;
  };

  // Event listener for the search button
  searchButton.addEventListener("click", () => {
      const query = searchInput.value.trim();
      fetchRecipes(query);
  });

  // Event listener for real-time search
  searchInput.addEventListener("input", () => {
      const query = searchInput.value.trim();
      fetchRecipes(query);
  });
});

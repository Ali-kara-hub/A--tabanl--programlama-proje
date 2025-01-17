function filterAnimes() {
    const searchInput = document.getElementById('search-bar').value.toLowerCase();
    const animeBlocks = document.querySelectorAll('.block');

    animeBlocks.forEach(block => {
        const animeTitle = block.getAttribute('data-title').toLowerCase();
        if (animeTitle.includes(searchInput)) {
            block.style.display = 'block';
        } else {
            block.style.display = 'none';
        }
    });
}
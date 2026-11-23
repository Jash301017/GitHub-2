document.addEventListener('DOMContentLoaded', () => {
    const search = document.getElementById('articleSearch');
    const cards = [...document.querySelectorAll('.article-card')];
    const noResults = document.getElementById('noResults');

    if (!search) return;

    search.addEventListener('input', () => {
        const query = search.value.trim().toLocaleLowerCase();
        let visibleCount = 0;

        cards.forEach((card) => {
            const matches = card.dataset.title.includes(query);
            card.classList.toggle('d-none', !matches);
            if (matches) visibleCount += 1;
        });

        noResults?.classList.toggle('d-none', visibleCount !== 0);
    });
});

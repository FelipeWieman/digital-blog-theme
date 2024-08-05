document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('load-more').addEventListener('click', function () {
        let button = this;
        let data = new FormData();
        data.append('action', 'load_more_posts');
        data.append('paged', load_more_params.paged);

        fetch(load_more_params.ajaxurl, {
            method: 'POST',
            body: data
        })
            .then(response => response.text())
            .then(response => {
                if (response == 'no_more_posts') {
                    button.textContent = 'No More Posts'; // Изменяем текст кнопки
                    button.disabled = true; // Деактивируем кнопку
                } else {
                    document.getElementById('post-container').querySelector('.blog-grid').insertAdjacentHTML('beforeend', response); // Добавляем новые посты
                    button.textContent = 'Load More';
                    load_more_params.paged++;
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });
});
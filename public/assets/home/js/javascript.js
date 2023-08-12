// Active
document.querySelectorAll('.header .items a').forEach((link) => {
    link.addEventListener('click', function () {
        this.classList.add('active');
        const siblings = this.parentElement.querySelectorAll('.items a');
        siblings.forEach((sibling) => {
            if (sibling !== this) {
                sibling.classList.remove('active');
            }
        });
    });
});

// Active
document.querySelectorAll('.banner-watch-2 button').forEach((link) => {
    link.addEventListener('click', function () {
        this.classList.add('active');
        const siblings = this.parentElement.querySelectorAll('button');
        siblings.forEach((sibling) => {
            if (sibling !== this) {
                sibling.classList.remove('active');
            }
        });
    });
});

// Active
document.querySelectorAll('.sort-watchlist .top button').forEach((link) => {
    link.addEventListener('click', function () {
        this.classList.add('active');
        const siblings = this.parentElement.querySelectorAll('button');
        siblings.forEach((sibling) => {
            if (sibling !== this) {
                sibling.classList.remove('active');
            }
        });
    });
});

document.addEventListener('click', (e) => {
    const toggleBtn = document.querySelector('.toggleBtn');
    const detailBox = document.querySelector('.toggleBtn .detail');

    if (toggleBtn && detailBox) {
        if (!toggleBtn.contains(e.target) && !detailBox.contains(e.target)) {
            detailBox.classList.remove('active');
            toggleBtn.classList.remove('active');
        } else {
            if (detailBox.classList.contains('active')) {
                detailBox.classList.remove('active');
                toggleBtn.classList.remove('active');
            } else {
                detailBox.classList.add('active');
                toggleBtn.classList.add('active');
            }
        }
    }
});

document.addEventListener('click', (e) => {
    const sortBtn = document.querySelector('.providerBtn');
    const sortBox = document.querySelector('.providerBtn .list-provider');

    if (sortBtn && sortBox) {
        if (!sortBtn.contains(e.target) && !sortBox.contains(e.target)) {
            sortBox.classList.remove('active');
            sortBtn.classList.remove('active');
        } else {
            if (sortBox.classList.contains('active')) {
                sortBox.classList.remove('active');
            } else {
                sortBox.classList.add('active');
                sortBtn.classList.add('active');
            }
        }
    }
});

// Active
document.querySelectorAll('.book').forEach((link) => {
    link.addEventListener('click', function () {
        if (this.classList.contains('active')) {
            this.classList.remove('active');
        } else {
            this.classList.add('active');
        }
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const kookLinks = document.querySelectorAll('.kook');

    kookLinks.forEach((link) => {
        link.addEventListener('click', function () {
            kookLinks.forEach((sibling) => {
                sibling.classList.remove('active');
            });

            this.classList.add('active');
        });
    });
});

window.onload = () => {
    const filterButtons = document.querySelectorAll('.banner-watch-2 .filter button');
    const titleElements = document.querySelectorAll('.banner-watch-2 .title');

    filterButtons.forEach((button) => {
        button.addEventListener('click', () => {
            const filterName = button.getAttribute('data-name');

            titleElements.forEach((title) => {
                const titleDataNames = title.getAttribute('data-name').split(' ');
                if (titleDataNames.includes(filterName) || filterName === 'all') {
                    title.classList.remove('hide');
                    title.classList.add('show');
                } else {
                    title.classList.remove('show');
                    title.classList.add('hide');
                }
            });
        });
    });
};

document.addEventListener('click', (e) => {
    const toggleBtn = document.querySelector('.userBtn');
    const detailBox = document.querySelector('.profile');

    if (toggleBtn && detailBox) {
        if (!toggleBtn.contains(e.target) && !detailBox.contains(e.target)) {
            detailBox.classList.remove('active');
            toggleBtn.classList.remove('active');
        } else {
            if (detailBox.classList.contains('active')) {
                detailBox.classList.remove('active');
                toggleBtn.classList.remove('active');
            } else {
                detailBox.classList.add('active');
                toggleBtn.classList.add('active');
            }
        }
    }
});
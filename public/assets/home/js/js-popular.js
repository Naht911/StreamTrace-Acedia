// Active
document.querySelectorAll('.list-year .item').forEach((link) => {
    link.addEventListener('click', function () {
        if (this.classList.contains('active')) {
            this.classList.remove('active');
        } else {
            this.classList.add('active');
        }
        const siblings = this.parentElement.querySelectorAll('.item');
        siblings.forEach((sibling) => {
            if (sibling !== this) {
                sibling.classList.remove('active');
            }
        });
    });
});

// Reset all selected items
document.querySelector('.list-year .reset').addEventListener('click', function () {
    document.querySelectorAll('.list-year .item.active').forEach((item) => {
        item.classList.remove('active');
    });
});

// Active
document.querySelectorAll('.list-genre .item').forEach((link) => {
    link.addEventListener('click', function () {
        if (this.classList.contains('active')) {
            this.classList.remove('active');
        } else {
            this.classList.add('active');
        }
    });
});

// Reset all selected items
document.querySelector('.list-genre .reset').addEventListener('click', function () {
    document.querySelectorAll('.list-genre .item.active').forEach((item) => {
        item.classList.remove('active');
    });
});

// Active
document.querySelectorAll('.list-price .item').forEach((link) => {
    link.addEventListener('click', function () {
        if (this.classList.contains('active')) {
            this.classList.remove('active');
        } else {
            this.classList.add('active');
        }
    });
});

// Reset all selected items
document.querySelector('.list-price .reset-price').addEventListener('click', function () {
    document.querySelectorAll('.list-prices .item.active').forEach((item) => {
        item.classList.remove('active');
    });
});

// Reset all selected items
document.querySelector('.list-price .reset-quality').addEventListener('click', function () {
    document.querySelectorAll('.list-qualities .item.active').forEach((item) => {
        item.classList.remove('active');
    });
});

// Active
document.querySelectorAll('.list-country .item').forEach((link) => {
    link.addEventListener('click', function () {
        if (this.classList.contains('active')) {
            this.classList.remove('active');
        } else {
            this.classList.add('active');
        }
    });
});

// Reset all selected items
document.querySelector('.list-country .reset').addEventListener('click', function () {
    document.querySelectorAll('.list-country .item.active').forEach((item) => {
        item.classList.remove('active');
    });
});

document.addEventListener('click', (e) => {
    const sortBtn = document.querySelector('.genreBtn');
    const sortBox = document.querySelector('.genreBtn .list-genre');

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

document.addEventListener('click', (e) => {
    const sortBtn = document.querySelector('.yearBtn');
    const sortBox = document.querySelector('.yearBtn .list-year');

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

document.addEventListener('click', (e) => {
    const sortBtn = document.querySelector('.priceBtn');
    const sortBox = document.querySelector('.priceBtn .list-price');

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

document.addEventListener('click', (e) => {
    const sortBtn = document.querySelector('.countryBtn');
    const sortBox = document.querySelector('.countryBtn .list-country');

    if (sortBtn && sortBox) {
        if (!sortBtn.contains(e.target) && !sortBox.contains(e.target)) {
            sortBox.classList.remove('active');
            sortBtn.classList.remove('active');
        } else {
            if (sortBox.classList.contains('active')) {
                sortBox.classList.remove('active');
                resetBox.classList.remove('active');
            } else {
                sortBox.classList.add('active');
                sortBtn.classList.add('active');
            }
        }
    }
});

// Reset all selected items
document.querySelector('.done').addEventListener('click', function () {
    document.querySelectorAll('.sort-popular.active').forEach((item) => {
        item.classList.remove('active');
    });
});

document.addEventListener('click', (e) => {
    const sortBtn = document.querySelector('.sort-popular');
    const sortBox = document.querySelector('.sort-popular .list-top');

    if (sortBtn && sortBox) {
        if (!sortBtn.contains(e.target) && !sortBox.contains(e.target)) {
            sortBox.classList.remove('active');
            sortBtn.classList.remove('active');
        } else {
            if (sortBox.classList.contains('active')) {
                sortBox.classList.remove('active');
                resetBox.classList.remove('active');
            } else {
                sortBox.classList.add('active');
                sortBtn.classList.add('active');
            }
        }
    }
});

var slider = document.getElementById('myRange');
var output = document.getElementById('demo');
output.innerHTML = slider.value;

slider.oninput = function () {
    output.innerHTML = this.value;
};

function resetSlider() {
    slider.value = slider.getAttribute('value'); // Reset to initial value
    output.innerHTML = slider.value;
}

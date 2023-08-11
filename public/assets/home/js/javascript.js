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

// Active
document.querySelectorAll('.fa-bookmark').forEach((link) => {
    link.addEventListener('click', function () {
        if (this.classList.contains('active')) {
            this.classList.remove('active'); 
        } else {
            this.classList.add('active'); 
        }
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
            } else {
                sortBox.classList.add('active');
                sortBtn.classList.add('active');
            }
        }
    }
});

var slider = document.getElementById("myRange");
var output = document.getElementById("demo");
output.innerHTML = slider.value;

slider.oninput = function() {
  output.innerHTML = this.value;
}
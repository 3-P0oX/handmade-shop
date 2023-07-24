var showSidebarButton = document.querySelector('.show-sidebar');
var sidebar = document.getElementById('sidebar');

showSidebarButton.addEventListener('click', function() {
    sidebar.classList.toggle('open');
});

document.addEventListener('DOMContentLoaded', function() {
    var switchLightMode = document.querySelector('.switch-light-mode input[type="checkbox"]');
    var root = document.documentElement;

    switchLightMode.addEventListener('change', function() {
        if (this.checked) {
            root.classList.add('dark-mode');
        } else {
            root.classList.remove('dark-mode');
        }
    });
});


        // تحديد المتغيرات اللازمة
        var slideIndex = 0;
        var slides = document.getElementsByClassName("slide-show");
        var thumbnails = document.getElementsByClassName("thumbnail");

        // عرض الشريط المحدد
        function showSlide() {
            for (var i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slides[slideIndex].style.display = "block";
        }

        // تحديث الصور المصغرة المحددة
        function updateThumbnails() {
            for (var i = 0; i < thumbnails.length; i++) {
                if (i === slideIndex) {
                    thumbnails[i].style.opacity = "1";
                    thumbnails[i].style.border = "var(--border-1)";
                    thumbnails[i].style.width = "55px";
                    thumbnails[i].style.height = "50px";
                } else {
                    thumbnails[i].style.opacity = "0.5";
                    thumbnails[i].style.border = "none";
                    thumbnails[i].style.width = "40px";
                    thumbnails[i].style.height = "40px";
                }
            }
        }

        // عرض الشريط التالي
        function showNextSlide() {
            slideIndex++;
            if (slideIndex >= slides.length) {
                slideIndex = 0;
            }
            showSlide();
            updateThumbnails();
        }

        // عرض الشريط السابق
        function showPreviousSlide() {
            slideIndex--;
            if (slideIndex < 0) {
                slideIndex = slides.length - 1;
            }
            showSlide();
            updateThumbnails();
        }

        // تحديث الشريط بناءً على الصورة المحددة
        function currentSlide(index) {
            slideIndex = index - 1;
            showSlide();
            updateThumbnails();
        }

        // تشغيل الشريط التلقائي
        setInterval(showNextSlide, 8000); // تغيير الصورة كل 3 ثوانٍ

        // عرض الشريط الأول عند تحميل الصفحة
        showSlide();
        updateThumbnails();


        // انتظر تحميل الصفحة
        window.addEventListener('DOMContentLoaded', () => {
            const selectElement = document.getElementById('lists');
            // اضف استماع الحدث على تغيير الخيار
            selectElement.addEventListener('change', () => {
                const selectedOption = selectElement.value;
                switch (selectedOption) {
                    case 'pets':
                        window.location.href = 'https://example.com/pets';
                        break;
                    case 'gaming':
                        window.location.href = 'https://example.com/gaming';
                        break;
                    case 'automotive':
                        window.location.href = 'https://example.com/automotive';
                        break;
                    case 'books':
                        window.location.href = 'https://example.com/pets';
                        break;
                    case 'groceries-drinks':
                        window.location.href = 'https://example.com/gaming';
                        break;
                    case 'deals-savings':
                        window.location.href = 'https://example.com/automotive';
                        break;
                    case 'devices-electronics':
                        window.location.href = 'https://example.com/automotive';
                        break;
                    case 'fashion-beauty':
                        window.location.href = 'https://example.com/automotive';
                        break;
                    // وهكذا لكل خيار في القائمة
                }
            });
            });
